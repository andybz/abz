let observer = null

export default {
	init() {
		observer = new IntersectionObserver(
			//callback
			function (entries) {
				entries.map(function (entry) {
					let el = entry.target
					if (entry.isIntersecting) {
						el.classList.add('animate')
						// if (entry.intersectionRatio >= 0.75) {
						// }
					} // else { el.classList.remove('animate') }
				})
			},
			{
				//options
				root: null, //viewport when set to null

				//between 0.0 (default) and 1.0 as decimal percentage of amount of the el must be in-frame before triggering effects
				threshold: 0.1, //10% of respective element

				//margin buffer from edge of root (viewport in this case)
				rootMargin: '-10%',
			}
		)
		//blog animation
		document.querySelectorAll('.sen-item').forEach(function (item) {
			observer.observe(item)
		})
	},
	finalize() {
		// JavaScript to be fired on the blog page, after the init JS
	},
}
