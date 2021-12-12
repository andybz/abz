<script>
	import Modal from './modal.svelte'
	import delve from 'dlv'

	const { jQuery, wc_add_to_cart_params } = window

	// const addQtyButton = jQuery('#add_qty')
	// const minusQtyButton = jQuery('#minus_qty')
	const qtyField = jQuery('input[type=number].qty')
	const addToCartButton = jQuery('.single_add_to_cart_button')
	const productForm = jQuery('.cart')

	const { logoAddToCart } = window.modal_object

	let modalContent

	// addQtyButton.on('click', function() {
	// 	let curQty = qtyField.val()
	// 	let newQty = Number(curQty) + 1
	// 	qtyField.val(Math.max(1, Math.min(99, newQty)))
	// })

	// minusQtyButton.on('click', function() {
	// 	let curQty = qtyField.val()
	// 	let newQty = Number(curQty) - 1
	// 	qtyField.val(Math.max(1, Math.min(99, newQty)))
	// })

	qtyField.on('keyup mouseup', function() {
		let newQty = qtyField.val()
		qtyField.val(Math.max(1, Math.min(99, newQty)))
	})

	productForm.on('submit', function(e) {
		e.preventDefault()
		let data = {
			action: 'woocommerce_ajax_add_to_cart',
			product_id: addToCartButton.val(),
			quantity: qtyField.val(),
		}
		sendAddToCartRequest(data)
	})

	function sendAddToCartRequest(data) {
		jQuery.ajax({
			type: 'post',
			url: wc_add_to_cart_params.ajax_url,
			data,
			// beforeSend: function(response) {
			// 	submittingForm = true
			// },
			// complete: function(response) {
			// 	submittingForm = false
			// },
			success: response => {
				if (response.error & response.product_url) {
					window.location = response.product_url
					return
				}
				let content = delve(response, [
					'fragments',
					'div.widget_shopping_cart_content',
				])
				if (content) {
					modalContent = content
				} else {
					window.location.href = '/cart/'
				}
				// update cart icon item num
				let cartCountHTML = delve(response, ['fragments', '#cart_count'])
				if (cartCountHTML) {
					jQuery('#cart_count')[0].outerHTML = cartCountHTML
				}
			},
		})
	}

	function hideModal() {
		modalContent = null
	}
</script>

{#if modalContent}
	<Modal width={600} on:close={hideModal}>
		<div class="modal-header">
			<p>Nice Choice!</p>
		</div>
		<div class="modal-body">
			{@html modalContent}
		</div>
		<a href="/shop/" class="keep-shopping">Keep Shopping</a>
	</Modal>
{/if}
