<?php
  $archive_fields = get_fields(get_queried_object());
  $horizontal_position = $archive_fields['horizontal_position'];
  $vertical_position = $archive_fields['vertical_position'];

  if ($hero_content = $archive_fields['default_hero_content']) {
    //use default_hero_content
  } else {
    if (get_queried_object()->post_title) { 
      $hero_content = '<h1>' . get_queried_object()->post_title . '</h1>';
    } else {
      //category pages
      $hero_content = '<h1>' . get_queried_object()->name . '</h1>';
    }
  }
  $featured_image = get_the_post_thumbnail_url(get_queried_object(), 'fp-xlarge');
?>
<section class="hero">
  <div class="hero-background-image"
    style="background-image: url(<?php echo $featured_image ? $featured_image : gid() . '/placeholder.jpg'?>); background-position: <?php echo $horizontal_position ?>% <?php echo $vertical_position ?>%">
  </div>
  <div class='main'>
    <div class='inner-wrap'>
      <?php echo $hero_content ?>
    </div>
  </div>
</section>
