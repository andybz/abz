import BigPicture from 'bigpicture'
import SingleProduct from '../components/single-product.svelte'
import SingleProductVariation from '../components/single-product-variation.svelte'

export default {
	init() {
		const $singleProdGallery = $('.woocommerce-product-gallery__wrapper')

		if ($singleProdGallery.length) {
			//add bp attirbute to gallery elems for BigPicture
			$singleProdGallery[0]
				.querySelectorAll('.woocommerce-product-gallery__image  > a > img')
				.forEach((elem) =>
					elem.setAttribute('data-bp', elem.getAttribute('data-large_image'))
				)

			$('.woocommerce-product-gallery__image > a').on('click', function (e) {
				e.preventDefault()
				BigPicture({
					el: this.querySelector('img'),
					gallery: $singleProdGallery[0].querySelectorAll(
						'.woocommerce-product-gallery__image  > a > img'
					),
				})
			})
		}

		if ($('.single-product').length) {
			if ($('.variations_form').length) {
				console.log('variation')
				new SingleProductVariation({
					target: document.body,
				})
			} else {
				console.log('single')
				new SingleProduct({
					target: document.body,
				})
			}
		}
	},
	finalize() {
		// JavaScript to be fired on the blog page, after the init JS
	},
}
