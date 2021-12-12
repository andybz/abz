<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php
  if ($hero_content = get_field('default_hero_content')) {
    //use default_hero_content
  } else {
    $hero_content = '<h1>' . get_the_title() . '</h1>';
  }
?>

<section class="hero">
<div class="hero-background-image" style="background-image: url(<?php echo gid() . '/placeholder.jpg'?>)"></div>
  <div class='main'>
    <div class='inner-wrap'>
      <div class="product-hero-content">
        <?php echo $hero_content ?>
      </div>
      <div class="breadcrumb-wrap">
        <?php 
        $breadcrumbs = array(
          'delimiter' => ' » ',
        );
          woocommerce_breadcrumb($breadcrumbs);
        ?>
        </div>
    </div>
  </div>
</section>

<main id="main_content" class="main-content-wrap">

<section class="single-product-wrap">
  <div class="main">
    <div class="inner-wrap">
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
    </div>
  </div>
</section>
	
</main>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
