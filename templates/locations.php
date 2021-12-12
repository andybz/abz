<?php
/*
Template Name: Locations
*/

add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style('mapbox', 'https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css',  false, null);
	wp_enqueue_script('mapbox', 'https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js', ['jquery'], null, true);
}, 5);

$locations = get_posts([
  'post_type' => 'locations',
  'posts_per_page' => -1,
  'post_status' => 'publish',
]);

if ($locations) {
  $locations = array_map(function($location) {
    $location_fields = get_fields($location);
    $location_categories = wp_get_object_terms($location->ID, 'locations_categories', ['fields' => 'names']);

    return [
      'name' => $location->post_title,
      'coordinates' => $location_fields['coordinates'],
      'date' => $location_fields['event_date'],
      'img' => get_the_post_thumbnail_url($location, 'medium_large'),
      'url' => get_permalink($location),
      'locationCategories' => $location_categories,
   ];
  }, $locations); 
}

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<main id="main_content" class="main-content-wrap">
  <h1 class="sr-only">Locations</h1>
  <noscript>Please enable JavaScript to view Locations</noscript>
  <section class="locations-wrap" id="locations_wrap" data-locations="<?php echo data_attribute($locations) ?>"></section>
</main>

<?php endwhile;?>
<?php get_footer();