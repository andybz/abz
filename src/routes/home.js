import Example from '../components/example.svelte'
import { tns } from '../../node_modules/tiny-slider/src/tiny-slider'

export default {
	init() {
		new Example({
			target: document.querySelector('#main_content .inner-wrap'),
		})
		const $homeSliderWrap = $('#homeSliderWrap')
		if ($homeSliderWrap.length) {
			tns({
				container: '#homeSliderWrap',
				items: 1,
				slideBy: 1,
				autoplay: true,
				nav: true, //dots
				controls: false, //arrows
				touch: true,
				autoplayButtonOutput: false,
				autoplayHoverPause: true,
				speed: 750,
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
		}
	},
	finalize() {
		// JavaScript to be fired on the home page, after the init JS
	},
}
