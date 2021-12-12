<?php get_header(); ?>

<?php
	$featured_image = get_the_post_thumbnail_url(get_the_ID(), 'fp-xlarge');
	if (empty($featured_image)) {
		$featured_image = gid() . '/placeholder.jpg';
	}
?>

<section class="hero">
  <div class="hero-background-image" style="background-image:url(<?php echo $featured_image ?>)"></div>
  <div class='main'>
    <div class='inner-wrap'>
      <div class="hero-inner">
        <h1><?php echo 'Results for "' . get_search_query() . '"' ?></h1>
      </div>
    </div>
  </div>
</section>

<main id="main_content" class="main-content-wrap">
  <div class="main">
    <div class="inner-wrap">

      <div class="page-default-content clearfix"><!-- sidebar-layout" -->
        <article class="main-content">
          <?php if ( have_posts() ) : ?>

          <ul class="search-results">

            <?php while ( have_posts() ) : the_post(); ?>
            <?php
							$post_type = get_post_type();
							$post_type_object = get_post_type_object($post_type)
						?>
            <li>
              <div class="search-result" data-label="<?php echo $post_type_object->labels->singular_name ?>">
                <h2>
                  <?php the_title() ?> <span class="search-result-type">
                    <?php echo $post_type_object->labels->singular_name ?>
                  </span>
                </h2>
                <div class="search-result-content">
                  <?php
										if ($exerpt = wp_trim_words(get_the_excerpt(), 20)) {
											echo $exerpt;
										}
									?>
                  <?php // echo excerpt(40) ?>
                </div>
                <a href="<?php the_permalink() ?>"><span class="sr-only">View</span></a>
              </div>
            </li>
            <?php endwhile; ?>

          </ul>

          <?php else : // no results ?>

          <h2>No results found</h2>

          <?php endif; ?>
          <?php boost_pagination(); ?>
        </article>

        <?php get_sidebar() ?>
      </div>

    </div>
  </div>
</main>

<?php get_footer();
