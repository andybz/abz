import Popup from '../components/team-popup.svelte'

export default {
	init() {},
	finalize() {
		new Popup({
			target: document.body,
		})
	},
}
