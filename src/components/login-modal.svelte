<script>
	// import Modal from './modal.svelte'
	import { onMount } from 'svelte'
	import FocusLocker from 'focus-locker'
	import { fade, fly } from 'svelte/transition'
	import { createEventDispatcher } from 'svelte'

	//generic modal
	const dispatch = createEventDispatcher()

	// bindings
	let modal
	let heroContent = document.getElementById('contentWrap')

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

	//login modal
	export let loginLinks = jQuery('#login')
	export let loginLinksMobile = jQuery('#menu-mobile-menu > .member-links > a')

	const { ajaxUrl, loadingMessage, lostPassUrl } = window.login_form_object

	let securityToken = false
	let shown = false
	let username = ''
	let email = ''
	let firstName = ''
	let lastName = ''
	let password = ''
	let unit_number = ''
	let status = false
	let disabledForm = false
	let redirectUrl = '/home/'
	let register = false

	// refs
	let usernameField
	let firstNameField

	const showModal = () => {
		shown = true
		// show scrollbars
		dispatch('mount')
		// document.documentElement.style.overflowY = 'auto'
		// document.body.style.overflowY = 'auto'
		// restore trapped focus
		FocusLocker.release()
		if (heroContent) {
			heroContent.style.opacity = 0
		}
		document.documentElement.style.overflowY = 'hidden'
		// focus on username
		setTimeout(() => usernameField.focus(), 20)
		// get security token
		if (!securityToken) {
			jQuery.get('/wp-json/boost-api/v1/get-token').done(function(res) {
				if (res) {
					securityToken = jQuery(res).val()
				}
			})
		}
	}

	function hideModal() {
		shown = false
		if (heroContent) {
			heroContent.style.opacity = 1
		}
		document.documentElement.style.overflowY = 'auto'
	}

	const wrapClick = e => e.target === e.currentTarget && hideModal()

	const switchState = newState => {
		status = ''
		register = newState
		setTimeout(() => (newState ? firstNameField : usernameField).focus(), 20)
	}

	const formSubmit = e => {
		if (disabledForm) {
			return
		}
		e.preventDefault()
		if (!securityToken) {
			status = 'Error checking credentials. Redirecting to login page...'
			setTimeout(() => {
				window.location.href = '/wp-login.php'
			}, 999)
			return
		}
		// disable submit for 1 second
		disabledForm = true
		setTimeout(() => {
			disabledForm = false
		}, 999)
		status = loadingMessage
		let action = register ? 'ajaxregister' : 'ajaxlogin'
		let data = {
			action,
			username,
			password,
			firstName,
			lastName,
			email,
			unit_number,
			security: securityToken,
		}
		jQuery.ajax({
			type: 'POST',
			dataType: 'json',
			url: ajaxUrl,
			data,
			success: data => {
				status = data.message
				if (data.loggedin === true) {
					window.location.href = redirectUrl
					// if (data.redirect_url) {
					// 	// window.location.href = window.location.href
					// } else {
					// 	window.location.reload()
					// }
				}
			},
			error: data => {
				status = 'Error checking credentials. Redirecting to login page...'
				setTimeout(() => {
					window.location.href = '/wp-login.php'
				}, 999)
				return
			},
		})
	}

	onMount(() => {
		loginLinks.on('click', function(e) {
			e.preventDefault()
			if (this.href) {
				redirectUrl = this.href
			}
			showModal()
		})
		loginLinksMobile.on('click', function(e) {
			e.preventDefault()
			if (this.href) {
				redirectUrl = this.href
			}
			showModal()
		})

		// modal hide on escape press
		document.body.addEventListener('keyup', function(e) {
			if (e.keyCode === 27) {
				hideModal()
			}
		})
	})
</script>

{#if shown}
	<div
		class="svelte-modal-wrap login-modal"
		data-slideout-ignore
		on:click={wrapClick}
		transition:fade={{ duration: 300 }}
		on:introstart={onClose}
		on:outroend={onShow}>
		<div class="main">
			<div class="inner-wrap">
				<div
					class="svelte-modal"
					in:fly={{ y: 10 }}
					out:fly={{ y: -10 }}
					bind:this={modal}>
					<button class="close-modal" on:click={hideModal}>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47.971 47.971">
							<path
								d="M28.228 23.986L47.092 5.122a2.998 2.998 0 0 0 0-4.242 2.998
								2.998 0 0 0-4.242 0L23.986 19.744 5.121.88a2.998 2.998 0 0
								0-4.242 0 2.998 2.998 0 0 0 0 4.242l18.865 18.864L.879
								42.85a2.998 2.998 0 1 0 4.242 4.241l18.865-18.864L42.85
								47.091c.586.586 1.354.879 2.121.879s1.535-.293 2.121-.879a2.998
								2.998 0 0 0 0-4.242L28.228 23.986z" />
						</svg>
						<span class="sr-only">Close Modal</span>
					</button>
					<div class="modal-inner">
						<div class="inner-login-modal-wrap">
							<div class="modal-head">
								{#if register}
									<h2>Register</h2>
								{:else}
									<h2>Login</h2>
								{/if}
							</div>
							<div class="modal-body">
								<form
									id="login"
									action="login"
									method="post"
									on:submit={formSubmit}>
									{#if status}
										<p class="status">{status}</p>
									{/if}
									{#if register}
										<div class="form-input-wrap">
											<input
												id="firstname"
												type="text"
												name="firstname"
												bind:value={firstName}
												bind:this={firstNameField}
												autocomplete="given-name"
												required />
											<label for="firstname">First Name</label>
										</div>
										<div class="form-input-wrap">
											<input
												id="lastname"
												type="text"
												name="lastname"
												bind:value={lastName}
												autocomplete="family-name"
												required />
											<label for="lastname">Last Name</label>
										</div>
										<div class="form-input-wrap email-wrap">
											<input
												id="emailAddress"
												type="email"
												name="emailAddress"
												bind:value={email}
												autocomplete="email"
												required />
											<label for="emailAddress">Email Address</label>
										</div>
										<div class="form-input-wrap unit-number-wrap">
											<input
												id="unit_number"
												type="number"
												name="unit_number"
												bind:value={unit_number}
												required />
											<label for="unit_number">Unit Number</label>
										</div>
									{:else}
										<div class="form-input-wrap">
											<input
												id="username"
												type="text"
												name="username"
												bind:this={usernameField}
												bind:value={username}
												autocomplete="username"
												required />
											<label for="username">Email or Username</label>
										</div>
									{/if}
									<div class="form-input-wrap password-wrap">
										<input
											id="password"
											type="password"
											name="password"
											bind:value={password}
											required
											autocomplete="current-password" />
										<label for="password">Password</label>
									</div>
									<div class="form-submit-wrap" class:register>
										<input
											type="submit"
											name=""
											value={`${register ? 'Register' : 'Log In'}`}
											class="btn"
											disabled={disabledForm} />
									</div>
								</form>
								<div class="login-options-wrap">
									<div class="state-select">
										{#if !register}
											<button on:click={() => switchState(true)}>
												Register
											</button>
										{:else}
											<button on:click={() => switchState()}>Login</button>
										{/if}
									</div>
									<h2 class="sr-only">
										{`${register ? 'Register' : 'Log in'}`}
									</h2>
									{#if !register}
										<p class="having-trouble">
											<a href={lostPassUrl}>Forgot Password</a>
										</p>
									{/if}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="login-modal-info">
				<div class="inner-wrap">
					<p>
						Here you will find links to the members only material on our
						website. You will find Meeting Minutes, Condo Documents, Bussinesses
						Owned/Operated by our members and our online Vessel Launch Request
						form.
					</p>
				</div>
			</div> -->
		</div>
	</div>
{/if}
