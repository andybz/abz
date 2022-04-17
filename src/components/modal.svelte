<script>
	import FocusLocker from 'focus-locker'
	import { fade, fly } from 'svelte/transition'
	import { createEventDispatcher } from 'svelte'

	const dispatch = createEventDispatcher()

	export let width = 600
	export let backgroundColor
	export let closeBtnColor = '#f27d23'

	// bindings
	let modal

	const closeModal = () => {
		dispatch('close')
		document.body.style.overflowY = 'auto' //add class
	}

	const wrapClick = e => e.target === e.currentTarget && closeModal()

	const onShow = () => {
		// show scrollbars
		dispatch('mount')
		// document.documentElement.style.overflowY = 'auto'
		// document.body.style.overflowY = 'auto'
		// restore trapped focus
		FocusLocker.release()
	}

	const onClose = () => {
		// hide scrollbars
		// document.documentElement.style.overflowY = 'hidden'
		// document.body.style.overflowY = 'scroll'
		// focus trap to modal
		FocusLocker.request(modal)
	}
</script>

<svelte:window on:keyup={e => e.keyCode === 27 && closeModal()} />

<div
	class="svelte-modal-wrap boost-popup"
	data-slideout-ignore
	on:click={wrapClick}
	transition:fade={{ duration: 300 }}
	on:introstart={onClose}
	on:outroend={onShow}>
	<div class="main" on:click={wrapClick}>
		<div class="inner-wrap" style={`max-width:${width}px`}>
			<div
				class="svelte-modal"
				in:fly={{ y: 10 }}
				out:fly={{ y: -10 }}
				bind:this={modal}
				style={`background-color: ${backgroundColor}`}>
				<button
					class="close-modal"
					on:click={closeModal}
					style={`background: ${closeBtnColor};`}>
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47.971 47.971">
						<path
							d="M28.228 23.986L47.092 5.122a2.998 2.998 0 0 0 0-4.242 2.998
							2.998 0 0 0-4.242 0L23.986 19.744 5.121.88a2.998 2.998 0 0 0-4.242
							0 2.998 2.998 0 0 0 0 4.242l18.865 18.864L.879 42.85a2.998 2.998 0
							1 0 4.242 4.241l18.865-18.864L42.85 47.091c.586.586 1.354.879
							2.121.879s1.535-.293 2.121-.879a2.998 2.998 0 0 0 0-4.242L28.228
							23.986z" />
					</svg>
					<span class="sr-only">Close Modal</span>
				</button>
				<div class="modal-inner">
					<slot />
				</div>
			</div>
		</div>
	</div>
</div>
