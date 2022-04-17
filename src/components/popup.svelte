<script>
	import Modal from './modal.svelte'
	import { getConfiguredCache } from 'money-clip'

	export let options = {}

	let closeBtnColor = options.colors.pu_close_color

	let showModal

	// get a version of the cache lib with options pre-applied
	const cache = getConfiguredCache({
		// version: options.version ? options.version : 1,
		version: options.version,
		maxAge: options.hours ? options.hours * 3600000 : 1,
		name: 'popup',
	})

	function hideModal() {
		cache.set('hide', true)
		showModal = false
		document.documentElement.style.overflowY = 'visible'
	}

	function onMount(node) {
		// hide modal if link inside modal is clicked
		let links = node.querySelectorAll('a')
		for (let index = 0; index < links.length; index++) {
			let a = links[index]
			a.addEventListener('click', hideModal)
		}

		document.documentElement.style.overflowY = 'hidden'
	}

	setTimeout(() => {
		cache.get('hide').then(hidden => {
			if (!hidden) {
				showModal = true
			}
		})
	}, options.wait * 1000)
</script>

{#if showModal && options.content}
	<Modal
		on:close={hideModal}
		width={options.width ? options.width : 600}
		backgroundColor={options.colors.pu_background_color}
		{closeBtnColor}>
		<div class="popup-wrap" use:onMount>
			{#if options.logo && options.logo.image}
				<div
					class="popup-header"
					style={`padding: ${options.headerPadding}px; background-color: ${options.colors.pu_header_color};`}>
					<img
						src={options.logo.image}
						alt={options.logo.alt ? options.logo.alt : ''}
						style={options.logo.width && options.logo.width > 0 ? 'width:' + options.logo.width.toString() + 'px;' : null} />
				</div>
			{/if}
			<div class="pu-inner" style={`padding: 0 ${options.bodyPadding}px`}>
				{@html options.content}
				{#if options.buttonText && options.buttonURL}
					<a
						href={options.buttonURL}
						class="btn"
						target={options.newTab ? '_blank' : '_self'}
						rel="noopener noreferrer"
						style={options.buttonColor ? 'background-color:' + options.buttonColor : ''}>
						{options.buttonText}
					</a>
				{/if}
			</div>
		</div>
	</Modal>
{/if}
