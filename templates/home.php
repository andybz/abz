<?php
/*
Template Name: Home
*/

$fields = get_fields();

//hero
$slides = $fields['slides'];
$video_display = $fields['video_display'];
$video_file = $fields['video_file'];
$video_url = $fields['video_url'];
$video_content = $fields['video_content'];
$video_button_link = $fields['video_button_link'];
$video_button_text = $fields['video_button_text'];

//buckets
$buckets = $fields['buckets'];

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php //include( locate_template( 'template-parts/hero.php', false, false ) );  ?>
<?php if ($video_display) { ?>
  <section class="home-video">
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
              <?php if ($video_button_link) { ?>
                <a href="<?php echo $video_button_link ?>" class="btn"><?php echo $video_button_text ?></a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </section>
<?php } else { ?>
  <section class="home-slider">
    <div class="home-slider-wrap" id="homeSliderWrap">
      <?php if ($slides) { ?>
      <?php foreach ($slides as $slide) { ?>
        <?php 
          $button_link = $slide['button_link'];  
        ?>
        <div class="home-slide">
          <div class="home-slide-image" style="background-image: url(<?php echo $slide['background_image']['sizes']['fp-xlarge'] ?>)"></div>
          <div class="main">
            <div class="inner-wrap">
              <div class="home-slide-content">
                <?php echo $slide['content']; ?>
                <?php if ($button_link) { ?>
                  <a href="<?php echo $button_link ?>" class="btn"><?php echo $slide['button_text'] ?></a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <?php } ?>
    </div>
  </section>
<?php } ?>

<main id="main_content" class="main-content-wrap">
  <div class='main'>
    <div class='inner-wrap'>

      <?php if ($buckets) { ?>
        <section class="home-buckets">
          <div class="home-buckets-wrap grid-three">
            <?php foreach ($buckets as $bucket) { ?>
              <?php 
                $content = $bucket['content'];  
                $link = $bucket['link'];  
              ?>
              <div class="home-bucket grid-item">
                <div class="home-bucket-image" style="background-image: url(<?php echo $bucket['background_image']['sizes']['large'] ?>)"></div>
                <?php if ($content) { ?>
                  <div class="home-bucket-content">
                    <?php echo $content ?>
                  </div>
                <?php } ?>
                <?php if ($link) { ?>
                  <a href="<?php echo $link ?>"><span class="sr-only">View <?php echo str_replace("/","",$link) ?></span></a>
                <?php } ?>

              </div>
            <?php } ?>
          </div>
        </section>
      <?php } ?>

      <?php the_content() ?>
    </div>
  </div>
</main>

<?php endwhile;?>
<?php get_footer();