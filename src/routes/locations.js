import Locations from '../components/locations.svelte'

export default {
	init() {
		let $locationsWrap = $('#locations_wrap')
		if ($locationsWrap.length) {
			new Locations({
				target: $locationsWrap[0],
				props: $locationsWrap.data(),
			})
		}
	},
	finalize() {},
}
