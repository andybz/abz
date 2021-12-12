<script>
	import { onMount } from 'svelte'
	import { fade } from 'svelte/transition'
	import lozad from 'lozad'
	//import locations data
	export let locations = []
	console.log('locations:', locations)
	//Define map node element
	let mapEl
	//Define map on load
	let map
	//Define map icon
	const icon = L.icon({
		iconUrl: '/wp-content/uploads/2021/01/boost-marker.png',
		iconSize: [43, 54],
		iconAnchor: [22, 54],
		popupAnchor: [0, -59],
	})
	//Define marker on load
	let marker = new L.marker()
	//Define empty allCoords array
	let allCoords = []
	// lazyload lozad observer
	let observer = lozad('.pgi-image')
	//Reformat location coordinates into array
	locations = locations.map(location => {
		let { coordinates } = location
		// split coords into array
		coordinates = coordinates.split(', ')
		// Populate allCoords array
		allCoords.push(coordinates)
		//Return object to locations with updated coordinates
		return Object.assign(location, {
			coordinates,
		})
	})

	onMount(() => {
		//onMount runs on page load
		//if locations do not exist, return (do not continue running function)
		if (!locations.length) {
			return
		}
		//Define Mapbox Access Token
		L.mapbox.accessToken =
			'pk.eyJ1IjoiY2FuLWJvb3N0IiwiYSI6ImNrMWlhdjNoaTAxY2EzZW93Yjc5aXQza3gifQ.hPrMxRcmQixJ_-wXA-0aJA'
		//Create map element and bind it to map node
		map = L.mapbox
			.map(mapEl)
			.addLayer(
				L.mapbox.styleLayer(
					'mapbox://styles/can-boost/ckk77t2y504sh18qyhzja3cun'
				)
			)
		locations.forEach(location => {
			//loop through each location and create markers with coordinates
			marker = new L.marker(location.coordinates, { icon })
			marker.bindPopup(`
			<div class="pgi-image" style="background-image:url(${location.img})"></div>
			<div class="pgi-content">
				<h3>${location.name}</h3>
				<h4>${location.date}</h4>
			</div>
			<a href="${location.url}"><span class="sr-only">View</span></a>
		`)
			map.addLayer(marker)
		})

		map.scrollWheelZoom.disable()
		// fit map to markers
		map.fitBounds(allCoords, { maxZoom: 14 })
		//set position of zoom control
		map.zoomControl.setPosition('bottomright')
	})
</script>

<div class="locations-map" id="map" bind:this={mapEl} data-slideout-ignore />
