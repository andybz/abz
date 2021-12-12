<?php
/**
 * The template for displaying all single posts and attachments
 */


add_theme_support( 'wp-block-styles' );

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php include( locate_template( 'template-parts/single-hero.php', false, false ) );  ?>
<main id="main_content" class="main-content-wrap" datd-router-wrapper>
  <div class="main" data-router-view="single-post-<?php echo $post->ID;?>">
    <div class="inner-wrap">
      <?php if($sidebar = false) { ?>
      <!-- sidebar layout: set to false if not desired -->
      <div class="page-default-content sidebar-layout clearfix">
        <div><?php get_sidebar('single') ?>
          <article class="main-content">
            <?php the_content() ?>
          </article>
        </div>
        <div class="single-post-btn-wrap">
          <?php echo boost_previous_post_link() ?>
          <a href="<?php echo get_post_type_archive_link(get_queried_object()->post_type) ?>">All Posts</a>
          <?php echo boost_next_post_link() ?>
        </div>
      </div>
      <?php } else { ?>
      <div class="page-default-content">
        <div class="single-meta-wrap">
          <time><?php echo date('F d, Y', strtotime($post->post_date)) ?></time>
          <?php $terms = get_the_terms($post->ID, 'category');  
          if ($terms) { ?>
          <span>|</span>
          <ul>
            <?php 
        
              foreach($terms as $term) { ?>
            <li><a href="<?php echo get_category_link($term);?>"><?php echo $term->name;?><?php echo strcmp($term->term_id, end($terms)->term_id) ? ',':'';?></a></li>
            <?php } ?>
          </ul>
          <?php } ?>
        </div>
        <?php the_content() ?>
        <div class="single-post-btn-wrap">
          <?php echo boost_previous_post_link() ?>
          <a href="<?php echo get_post_type_archive_link(get_queried_object()->post_type) ?>">All Posts</a>
          <?php echo boost_next_post_link() ?>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</main>

<?php endwhile;?>
<?php get_footer();