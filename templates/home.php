<?php
/*
Template Name: Home
*/

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<main id="main_content" class="main-content-wrap">
  <div class='main'>
    <div class='inner-wrap'>
      <?php the_content() ?>
    </div>
  </div>
</main>

<?php endwhile;?>
<?php get_footer();