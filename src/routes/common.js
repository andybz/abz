import sidePanel from 'side-panel-menu-thing'
import BigPicture from 'bigpicture'
import Popup from '../components/popup.svelte'
import LoginModal from '../components/login-modal.svelte'

const { $, boostPopupOptions } = window

const $body = $(document.body)

export default {
	init() {
		// JavaScript to be fired on all pages
		const mobileMenu = new sidePanel({
			target: $body[0],
			props: {
				target: $body[0],
				content: document.getElementById('menu'),
				fixed: true,
				width: 320,
			},
		})
		$('#toggle_nav').on('click', mobileMenu.show)

		$(document).on(
			'click',
			'.menu-section .menu-item-has-children > a',
			function (e) {
				e.preventDefault()
				let $el = $(this)
				$el.parent().toggleClass('show-subnav')
			}
		)
	},
	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
		let $article = $('article.main-content')

		// class to hide outlines if not using keyboard
		$body.on('mousedown', function () {
			$body.addClass('using-mouse')
		})
		$body.on('keydown', function () {
			$body.removeClass('using-mouse')
		})

		// article enlarge images
		if ($article.length) {
			$article
				.find(
					'.wp-block-image a[href*=".jpg"], .wp-block-image a[href*=".jpeg"]'
				)
				.on('click', function (e) {
					const $this = $(this)
					const $imgEls = $this.find('img')
					e.preventDefault()
					BigPicture({
						el: $imgEls.length ? $imgEls[0] : this,
						imgSrc: this.href,
					})
				})
		}

		let $blocksGallery = $('.blocks-gallery-item > figure > a')
		if ($blocksGallery.length) {
			let $caption = $('.blocks-gallery-item__caption')
			if ($caption) {
				$caption.each(function () {
					$(this).siblings('a')[0].setAttribute('data-caption', $(this).text())
				})
			}

			$blocksGallery.each(function (index, el) {
				el.setAttribute('data-bp', el.href)
			})

			$blocksGallery.on('click', function (e) {
				e.preventDefault()
				BigPicture({
					el: this,
					gallery: '.wp-block-gallery',
					loop: true,
				})
			})
		}

		let $wpBlockImg = $('.wp-block-image')
		if ($wpBlockImg.length) {
			$wpBlockImg.on('click', function (e) {
				const $this = $(this)
				const $imgEls = $this.find('img')
				e.preventDefault()
				BigPicture({
					el: $imgEls.length ? $imgEls[0] : this,
					imgSrc: this.href,
				})
			})
		}

		let $wpMediaTxtBlockImg = $('.wp-block-media-text__media')
		if ($wpMediaTxtBlockImg.length) {
			$wpMediaTxtBlockImg.on('click', function (e) {
				const $this = $(this)
				const $imgEls = $this.find('img')
				e.preventDefault()
				BigPicture({
					el: $imgEls.length ? $imgEls[0] : this,
					imgSrc: this.href,
				})
			})
		}
		if (boostPopupOptions) {
			new Popup({
				target: document.body,
				props: {
					options: boostPopupOptions,
				},
			})
		}

		//login modal
		if (window.login_form_object) {
			new LoginModal({
				target: document.body,
				props: {
					loginLinks: $('#login'),
					loginLinksMobile: $('#menu-mobile-menu > .login > a'),
				},
			})
		}
	},
}
