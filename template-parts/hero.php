<?php
$fields = get_fields();
$featured_image = get_the_post_thumbnail_url($post->ID, 'fp-xlarge');
$horizontal_position = $fields['horizontal_position'];
$vertical_position = $fields['vertical_position'];

  if ($hero_content = get_field('default_hero_content')) {
    //use default_hero_content
  } else {
    $hero_content = '<h1>' . get_the_title() . '</h1>';
  };
?>

<?php if ($featured_image) { ?>
<section class="hero">
  <div class="hero-background-image"
    style="background-image: url(<?php echo $featured_image ?>); background-position: <?php echo $horizontal_position ?>% <?php echo $vertical_position ?>%">
  </div>
  <div class='main'>
    <div class='inner-wrap' id="heroContent">
      <?php echo $hero_content ?>
    </div>
  </div>
</section>
<?php } else if ($hero_content) { ?>
<section class="hero">
  <div class='main'>
    <div class='inner-wrap' id="heroContent">
      <?php echo $hero_content ?>
    </div>
  </div>
</section>
<?php } else { ?>
<!-- display nothing -->
<?php } ?>
