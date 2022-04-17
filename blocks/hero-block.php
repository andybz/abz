<?php 
$fields = get_fields();

//Video
$video_display = $fields['video_display'];
if ($video_display) {
  $video_url = $fields['video_url'];
  $video_file = $fields['video_file'];
  $video_content = $fields['video_content'];
  $video_buttons = $fields['video_buttons'];
}

//Slides
$slides = $fields['slides'] ?? '';

//Static
$static_display = $fields['static_display'];
if ($static_display) {
  $static_content = $fields['static_content'] ?: '<h1>' . get_the_title() . '</h1>';
  $static_buttons = $fields['static_buttons'];
  $featured_image = get_the_post_thumbnail_url($post->ID, 'fp-xlarge');
  $horizontal_position = $fields['horizontal_position'];
  $vertical_position = $fields['vertical_position'];
}
?>

<?php if ($video_display) { ?>
<section class="home-video section-full">
  <div class="home-video-wrap">
    <?php if ($video_file) { ?>
    <video src="<?php echo $video_file['url'] ?>" autoplay playsinline loop muted data-object-fit="cover">
    </video>
    <?php } else { ?>
    <?php if (strpos($video_url, 'youtu') !== false) { ?>
    <iframe src="https://www.youtube.com/embed/<?php echo get_youtube_id($video_url) ?>?autoplay=1" frameborder="0" allow='autoplay'></iframe>
    <?php } else { ?>
    <iframe title="vimeo-player" src="https://player.vimeo.com/video/<?php echo get_vimeo_id($video_url) ?>?autoplay=1" frameborder="0" allowfullscreen allow='autoplay'></iframe>
    <?php } ?>
    <?php } ?>
  </div>
  <?php if ($video_content) { ?>
  <div class="video-content-wrap">
    <div class="main">
      <div class="inner-wrap">
        <div class="video-content">
          <?php echo $video_content ?>
          <?php if ($video_buttons) { ?>
          <div class="hero-btn-wrap">
            <?php foreach ($video_buttons as $button) { ?>
            <a href="<?php echo $button['link'] ?>" class="btn"
              <?php echo $button['new_tab'] ? 'target="_blank" rel="noopener noreferrer" aria-label="( opens in new tab )"' : '' ?>><?php echo $button['text'] ?></a>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</section>
<?php } else if ($static_display) { 
if ($featured_image) { ?>
<section class="hero section-full">
  <div class="hero-background-image"
    style="background-image: url(<?php echo $featured_image ?>); background-position: <?php echo $horizontal_position ?>% <?php echo $vertical_position ?>%">
  </div>
  <div class='main'>
    <div class='inner-wrap' id="heroContent">
      <?php echo $static_content ?>
      <?php if ($static_buttons) { ?>
      <div class="hero-btn-wrap">
        <?php foreach ($static_buttons as $button) { ?>
        <a href="<?php echo $button['link'] ?>" class="btn"
          <?php echo $button['new_tab'] ? 'target="_blank" rel="noopener noreferrer" aria-label="( opens in new tab )"' : '' ?>><?php echo $button['text'] ?></a>
        <?php } ?>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php } else { ?>
<section class="hero section-full">
  <div class='main'>
    <div class='inner-wrap' id="heroContent">
      <?php echo $static_content ?>
      <?php if ($static_buttons) { ?>
      <div class="hero-btn-wrap">
        <?php foreach ($static_buttons as $button) { ?>
        <a href="<?php echo $button['link'] ?>" class="btn"
          <?php echo $button['new_tab'] ? 'target="_blank" rel="noopener noreferrer" aria-label="( opens in new tab )"' : '' ?>><?php echo $button['text'] ?></a>
        <?php } ?>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php } ?>
<?php } else { ?>
<section class="home-slider section-full">
  <div class="home-slider-wrap">
    <?php if ($slides) { ?>
    <?php foreach ($slides as $slide) { ?>
    <?php 
      $button_link = $slide['button_link'];  
      $buttons = $slide['buttons'];
      $video_file = $slide['video_file'];
      $video_url = $slide['video_url'];
      $slide_content = $slide['content'];
    ?>
    <div class="home-slide">
      <?php if ($video_file || $video_url) { ?>
      <div class="home-video-wrap">
        <?php if ($video_file) { ?>
        <video src="<?php echo $video_file['url'] ?>" autoplay playsinline loop muted data-object-fit="cover">
        </video>
        <?php } else { ?>
        <?php if (strpos($video_url, 'youtu') !== false) { ?>
        <iframe src="https://www.youtube.com/embed/<?php echo get_youtube_id($video_url) ?>?autoplay=1" frameborder="0" allow='autoplay'></iframe>
        <?php } else { ?>
        <video src="<?php echo $video_url ?>" autoplay playsinline loop muted data-object-fit="cover" poster="<?php echo gid() ?>/video-placeholder.jpeg"></video>
        <div class="video-placeholder" style="background-image: url(<?php echo gid() ?>/video-placeholder.jpeg)"></div>
        <!-- <iframe title="vimeo-player" src="https://player.vimeo.com/video/<?php //echo get_vimeo_id($video_url) ?>?autoplay=1" frameborder="0" allowfullscreen
          allow='autoplay'></iframe> -->
        <?php } ?>
        <?php } ?>
      </div>
      <?php if ($slide_content) { ?>
      <div class="video-content-wrap">
        <div class="main">
          <div class="inner-wrap">
            <div class="video-content home-slide-content">
              <?php echo $slide_content ?>
              <?php if ($buttons) { ?>
              <div class="hero-btn-wrap">
                <?php foreach ($buttons as $button) { ?>
                <a href="<?php echo $button['link'] ?>" class="btn"
                  <?php echo $button['new_tab'] ? 'target="_blank" rel="noopener noreferrer" aria-label="( opens in new tab )"' : '' ?>><?php echo $button['text'] ?></a>
                <?php } ?>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php } else { ?>
      <div class="home-slide-image" style="background-image: url(<?php echo $slide['background_image']['sizes']['fp-xlarge'] ?>)"></div>
      <div class="main">
        <div class="inner-wrap">
          <div class="home-slide-content">
            <?php echo $slide['content']; ?>
            <?php if ($buttons) { ?>
            <div class="hero-btn-wrap">
              <?php foreach ($buttons as $button) { ?>
              <a href="<?php echo $button['link'] ?>" class="btn"
                <?php echo $button['new_tab'] ? 'target="_blank" rel="noopener noreferrer" aria-label="( opens in new tab )"' : '' ?>><?php echo $button['text'] ?></a>
              <?php } ?>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <?php } ?>
    <?php } ?>
  </div>
</section>
<?php } ?>
