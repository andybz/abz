<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<?php include( locate_template( 'template-parts/archive-hero.php', false, false ) );  ?>

<main id="main_content" class="main-content-wrap">
  <div class="main">
    <div class="inner-wrap">
      <div class="page-default-content clearfix">
        <!-- class="sidebar-layout" -->
        <article class="main-content">
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