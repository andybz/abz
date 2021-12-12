import svelte from 'rollup-plugin-svelte'
import resolve from '@rollup/plugin-node-resolve'
import commonjs from '@rollup/plugin-commonjs'
import { terser } from 'rollup-plugin-terser'
import buble from '@rollup/plugin-buble'
import browsersync from 'rollup-plugin-browsersync'
import filesize from 'rollup-plugin-filesize'

const production = !process.env.ROLLUP_WATCH
const homeDir = process.env.HOME

let svelteCss = ''

export default {
	input: 'src/index.js',
	output: {
		sourcemap: true,
		format: 'iife',
		name: 'app',
		file: 'build/bundle.js',
	},
	plugins: [
		svelte({
			dev: !production,
			// Extract CSS into a separate file
			css: (css) => {
				if (svelteCss !== css.code) {
					svelteCss = css.code
					css.write('src/styles/_components.scss', false)
				}
			},
		}),

		// If you have external dependencies installed from
		// npm, you'll most likely need these plugins. In
		// some cases you'll need additional configuration -
		// consult the documentation for details:
		// https://github.com/rollup/rollup-plugin-commonjs
		resolve(),
		commonjs(),

		production &&
			buble({
				transforms: { dangerousForOf: true },
			}),

		production && terser(),

		filesize({
			showMinifiedSize: !production,
			showGzippedSize: production,
		}),

		!production &&
			browsersync({
				notify: false,
				host: 'localhost',
				port: 3000,
				https: {
					key: `${homeDir}/.hank/localhost.key`,
					cert: `${homeDir}/.hank/localhost.crt`,
				},
				ghostMode: false,
				logLevel: 'silent',
				files: [
					'**/*.php',
					'build/*.css',
					'build/*.js',
					'!node_modules',
					'!.git',
				],
				proxy: 'https://starter.boost',
			}),
	],
}
