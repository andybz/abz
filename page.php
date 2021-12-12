<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 */

add_theme_support( 'wp-block-styles' );

 get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php include( locate_template( 'template-parts/hero.php', false, false ) );  ?>

<main id="main_content" class="main-content-wrap">
  <div class="main">
    <div class="inner-wrap">
      <?php if ($sidebar = false) { ?>
      <!-- sidebar layout: set to false if not desired -->
      <div class="page-default-content sidebar-layout clearfix">
        <article class="main-content">
          <?php the_content() ?>
        </article>
        <?php get_sidebar() ?>
      </div>
      <?php } else { ?>
      <div class="page-default-content">
        <?php the_content() ?>
      </div>
      <?php } ?>
    </div>
  </div>
</main>

<?php endwhile;?>
<?php get_footer();