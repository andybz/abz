<?php
$fields = get_fields();
$featured_image = get_the_post_thumbnail_url($post->ID, 'fp-xlarge') ?? null;
$horizontal_position = $fields['horizontal_position'] ?? null;
$vertical_position = $fields['vertical_position'] ?? null;

  if ($hero_content = get_field('default_hero_content')) {
    //use default_hero_content
  } else {
    $hero_content = '<h1>' . get_the_title() . '</h1>';
  };
?>

<section class="hero">
  <?php if ($featured_image) { ?>
  <div class="hero-background-image"
    style="background-image: url(<?php echo $featured_image ?>); background-position: <?php echo $horizontal_position ?>% <?php echo $vertical_position ?>%">
  </div>
  <?php } ?>
  <div class='main'>
    <div class='inner-wrap'>
      <div class="single-hero-content-wrap">
        <!-- php 8.0 allows for default, and use_svg: true but must past $post_type for earlier versions-->
        <?php echo boost_previous_post_link(get_post_type(), true) ?>
        <?php echo boost_next_post_link(get_post_type(), true) ?>

        <?php echo $hero_content ?>
      </div>
    </div>
  </div>
</section>