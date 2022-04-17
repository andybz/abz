import sidePanel from 'side-panel-menu-thing'
import BigPicture from 'bigpicture'
import Popup from '../components/popup.svelte'
import { tns } from '../../node_modules/tiny-slider/src/tiny-slider'

const { $, boostPopupOptions } = window

const $body = $(document.body)

export default {
	init() {
		// JavaScript to be fired on all pages
		// const mobileMenu = new sidePanel({
		// 	target: $body[0],
		// 	props: {
		// 		target: $body[0],
		// 		content: document.getElementById('menu'),
		// 		fixed: true,
		// 		width: 320,
		// 	},
		// })
		// $('#toggle_nav').on('click', mobileMenu.show)

		// $(document).on(
		// 	'click',
		// 	'.menu-section .menu-item-has-children > a',
		// 	function (e) {
		// 		e.preventDefault()
		// 		let $el = $(this)
		// 		$el.parent().toggleClass('show-subnav')
		// 	}
		// )
	},
	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
		// class to hide outlines if not using keyboard
		$body.on('mousedown', function () {
			$body.addClass('using-mouse')
		})
		$body.on('keydown', function () {
			$body.removeClass('using-mouse')
		})

		let $blocksGallery = $('.wp-block-gallery .wp-block-image  > a')
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
					noLoader: true,
				})
			})
		}

		let $wpBlockImg = $('.wp-block-image:not(.no-bp)')
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

		let $wpMediaTxtBlockImg = $(
			'.wp-block-media-text:not(.no-bp) .wp-block-media-text__media'
		)
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

		let $homeSliderWrap = document.querySelectorAll('.home-slider-wrap')
		if ($homeSliderWrap.length) {
			$homeSliderWrap.forEach((item) => {
				tns({
					container: item,
					items: 1,
					slideBy: 1,
					autoplay: true,
					nav: true, //dots
					controls: false, //arrows
					touch: true,
					autoplayButtonOutput: false,
					autoplayHoverPause: true,
					speed: 750,
					loop: false,
					rewind: true,
					controlsText: [
						'<span class="sr-only">prev</span><svg viewBox="0 0 32 52"><path fill-rule="evenodd" d="M11 26l21 21-5 5L2 28l-2-2 2-3L27 0l5 5-20 18"/></svg>',
						'<span class="sr-only">Next</span><svg viewBox="0 0 32 52"><path fill-rule="evenodd" d="M21 26L0 47l5 5 25-24 2-2-2-3L5 0 0 5l20 18"/></svg>',
					],
					responsive: {
						767: {
							nav: false, //dots
							controls: true, //arrows
						},
					},
				})
			})
		}
	},
}
