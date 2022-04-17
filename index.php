<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 */

$args = array(
  'post_type' => 'post',
  'orderby'   => 'publish_date',
  'order'     => 'DESC',
  'post_status' => 'publish',
);
$query = new WP_Query( $args );

$page_for_posts_id = get_option( 'page_for_posts' );
$page_for_posts_obj = get_post($page_for_posts_id, ARRAY_A);
$page_for_posts_content = $page_for_posts_obj['post_content'];

get_header(); ?>

<?php include( locate_template( 'template-parts/archive-hero.php', false, false ) );  ?>

<main id="main_content" class="main-content-wrap">
  <div class="main">
    <div class="inner-wrap">
      <div class="page-default-content clearfix">

        <article class="main-content">
          <?php if ($page_for_posts_content) { ?>
          <?php echo $page_for_posts_content ?>
          <?php } ?>
          <div class="grid-two">
            <?php while ( have_posts() ) : the_post(); 
            $categories = get_the_category(); $cat_arr = [];
             foreach ($categories as $category) {
              $cat_arr [] = [
                'name' => $category->cat_name,
                'link' => get_category_link($category->term_id)
              ];
            }; 
            $featured_image = get_the_post_thumbnail_url($post->ID, 'fp-xlarge'); ?>
            <div class="sen-item grid-item">
              <div class="sen-item-image" style="background-image: url(<?php echo $featured_image ? $featured_image : gid() . '/placeholder.jpg' ?>)"></div>
              <div class="sen-item-content-wrap">
                <h2><?php echo $post->post_title ?></h2>
                <time><?php echo get_the_date( 'F d, Y', $post->ID) ?></time>
                <div class="cat-wrap">
                  <?php foreach ($cat_arr as $category) { ?>
                  <a href="<?php echo $category['link'] ?>"><?php echo $category['name'] ?><span>,</span></a>
                  <?php } ?>
                </div>
                <p><?php echo wp_trim_words($post->post_content, 30) ?></p>
              </div>
              <a href="<?php the_permalink($post) ?>"><span class="sr-only">View <?php echo $post->post_title ?></span></a>
            </div>
            <?php endwhile;?>
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