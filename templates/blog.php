<?php
/**
 * Template Name: Blog
 */

global $wp_query;

get_header(); ?>

<?php include( locate_template( 'template-parts/archive-hero.php', false, false ) );  ?>

<main id="main_content" class="main-content-wrap" data-router-wrapper>
  <div class="main" data-router-view="blog">
    <div class="inner-wrap">
      <div class="page-default-content clearfix"><!-- class=" .. sidebar-layout" -->
        <article class="main-content">
          <div class="grid-two">
            <?php 
            $wp_query = new WP_Query([
              'post_type'=>'post',
              'posts_per_page'=> get_option( 'posts_per_page' ),
              'post_status' =>'publish' //'future' -> upcoming
            ]);
            while($wp_query->have_posts()): $wp_query->the_post(); ?>
            <?php $featured_image = get_the_post_thumbnail_url($post->ID, 'fp-xlarge') ?>
            <div class="sen-item grid-item">
              <div class="sen-item-image" style="background-image: url(<?php echo $featured_image ? $featured_image : gid() . '/placeholder.jpg' ?>)"></div>
              <div class="sen-item-content-wrap">
                <h2><?php echo $post->post_title ?></h2>
                <time><?php echo get_the_date( 'F d, Y', $post->ID) ?></time>
                <p><?php echo wp_trim_words($post->post_content, 30) ?></p>
              </div>
              <a href="<?php the_permalink($post) ?>"><span class="sr-only">View <?php echo $post->post_title ?></span></a>
            </div>
            <?php wp_reset_postdata(); endwhile;?>
          </div>
          <?php /* Display navigation to next/previous pages when applicable */ ?>
          <?php boost_pagination(); ?>
        </article>
        <?php //get_sidebar() ?>
      </div>

    </div>
  </div>
</main>

<?php get_footer();
