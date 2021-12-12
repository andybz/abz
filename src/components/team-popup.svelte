<script>
	import { onMount } from 'svelte'
	import { fade, fly } from 'svelte/transition'

	const { $: jQuery } = window

	let shown = false
	let person = false

	onMount(() => {
		jQuery('.grid-item').on('click', e => {
			person = jQuery(e.currentTarget).data('member')
			shown = true
		})
	})

	const closePopup = () => (shown = false)
	const wrapClick = e => e.target === e.currentTarget && closePopup()
</script>

<svelte:window on:keyup={e => e.keyCode === 27 && closePopup()} />

{#if shown && person}
	<div
		class="team-popup-wrap"
		on:click={wrapClick}
		transition:fade={{ duration: 300 }}>
		<div class="main" on:click={wrapClick}>
			<div class="inner-wrap">
				<div class="team-popup" in:fly={{ y: 15 }} out:fly={{ y: -15 }}>
					<!-- person info -->
					<div class="team-popup-inner">
						<div class="tp-row">
							<div class="tp-img">
								<div style={`background-image:url(${person.img})`} />
							</div>
							<div class="tp-content">
								<h2>{person.name}</h2>
								{#if person.title}
									<p class="tp-title">{person.title}</p>
								{/if}
								<div>
									{@html person.body}
								</div>
							</div>
						</div>
					</div>
					<button class="close-popup" on:click={closePopup}>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47.971 47.971">
							<path
								d="M28.228 23.986L47.092 5.122a2.998 2.998 0 0 0 0-4.242 2.998
								2.998 0 0 0-4.242 0L23.986 19.744 5.121.88a2.998 2.998 0 0
								0-4.242 0 2.998 2.998 0 0 0 0 4.242l18.865 18.864L.879
								42.85a2.998 2.998 0 1 0 4.242 4.241l18.865-18.864L42.85
								47.091c.586.586 1.354.879 2.121.879s1.535-.293 2.121-.879a2.998
								2.998 0 0 0 0-4.242L28.228 23.986z" />
						</svg>
					</button>
				</div>
			</div>
		</div>
	</div>
{/if}
