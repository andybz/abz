const execa = require('execa')
const promptly = require('promptly')
const Listr = require('listr')
const { Observable } = require('rxjs')
const { bold, green } = require('kleur')
const fs = require('fs')

const dest = 'example.com'
const themeDir = 'boost'
// change root to name of user on server (ls -l to view user)
const serverUser = 'root'
// change host to different remote server if necessary
const host = 'boostcreative.design'

let skipBuild = ~process.argv.indexOf('--skip-build')

let version
let newVersion
let styleDotCssContent = ''

;(async () => {
	// verify config
	console.log(
		`Site: ${green().bold(dest)}\nTheme Folder: ${green().bold(themeDir)}\n`
	)

	const choice = await promptly.choose('Is this configuration correct? (y/n)', [
		'y',
		'n',
	])

	if (choice !== 'y') {
		console.log(bold().red('\nPlease update the config in scripts/deploy.js\n'))
		return
	}

	// get version info
	try {
		styleDotCssContent = fs.readFileSync('style.css', 'utf8')
		version = styleDotCssContent.toString().match(/\d+(\.\d+\.\d+)+/)[0]
		newVersion = version.split('.')
		newVersion[2] = Number(newVersion[2]) + 1
		newVersion = newVersion.join('.')
	} catch (e) {
		console.log('Error:', e.stack)
		return
	}

	// get ssh passphrase then run tasks
	console.log('')
	execa('ssh-add', ['-K']).then(() => {
		console.log('')
		// run tasks
		tasks
			.run()
			.catch((err) => console.error(err))
			.then(() => console.log(''))
	})

	const tasks = new Listr([
		{
			title: 'Verifying configuration',
			task: () =>
				execa('ssh', [
					`root@${host}`,
					'-p',
					'57822',
					`[ -d /home/${dest} ] && echo true || echo false`,
				]).then((result) => {
					if (result.stdout !== 'true') {
						// console.log('observer', observer)
						throw new Error(
							bold().red(
								`The folder ${dest} does not exist on the remote host. Please check configuration.`
							)
						)
					}
				}),
		},
		{
			title: 'Checking file status',
			task: () =>
				new Listr([
					{
						title: 'Checking git status',
						task: () =>
							execa('git', ['status', '--porcelain']).then((result) => {
								if (result.stdout !== '') {
									throw new Error(
										bold().red(
											`Unclean working tree. Commit or stash changes first.`
										)
									)
								}
							}),
					},
					{
						title: 'Checking remote history',
						task: () =>
							execa('git', [
								'rev-list',
								'--count',
								'--left-only',
								'@{u}...HEAD',
							]).then((result) => {
								if (result.stdout !== '0') {
									throw new Error(
										bold().red('Remote history differs. Please pull changes.')
									)
								}
							}),
					},
				]),
		},
		{
			title: 'Bumping theme version',
			task: () => {
				let newStyleDotCssContent = styleDotCssContent.replace(
					version,
					newVersion
				)
				fs.writeFileSync('style.css', newStyleDotCssContent, 'utf8')
			},
		},
		{
			title: 'Committing release & pushing to remote repo',
			task: () =>
				new Listr([
					{
						title: 'Adding files',
						task: () => execa('git', ['add', '-A']),
					},
					{
						title: 'Committing',
						task: () => execa('git', ['commit', '-m', `Release ${newVersion}`]),
					},
					{
						title: 'Tagging',
						task: () => execa('git', ['tag', `v${newVersion}`]),
					},
					{
						title: 'Pushing',
						task: () => execa('git', ['push']),
					},
					{
						title: 'Pushing tags',
						task: () => execa('git', ['push', '--tags']),
					},
				]),
		},
		{
			title: 'Building production theme',
			skip: () => skipBuild,
			task: () => execa('npm', ['run', 'build']),
		},
		{
			title: 'Updating live site',
			task: () =>
				new Observable((observer) => {
					observer.next('Making sure theme folder exists on server')
					// make sure folder exists
					execa('ssh', [
						'-p',
						'57822',
						`root@${host}`,
						'mkdir',
						'-p',
						`/home/${dest}/public_html/wp-content/themes/${themeDir}`,
					]).then(() => {
						// push files using rsync
						observer.next('Transferring theme files')
						execa('rsync', [
							'-rvtuhoge',
							'ssh -p 57822',
							'--usermap',
							`*:${serverUser}`,
							'--groupmap',
							`*:${serverUser}`,
							'--exclude',
							'.git',
							'--exclude',
							'node_modules',
							'--exclude',
							'debug.txt',
							'--exclude',
							'packaged',
							'--exclude',
							'scripts',
							'.',
							`root@${host}:/home/${dest}/public_html/wp-content/themes/${themeDir}`,
						]).then(() => {
							observer.next('Purging cache')
							execa('ssh', [
								'-p',
								'57822',
								`root@${host}`,
								`cd /home/${dest}/public_html && wp litespeed-purge all --allow-root`,
							]).then(() => observer.complete())
						})
					})
				}),
		},
	])
})()
