<?php
/*
Template Name: Team
*/

$team_members = get_posts([
  'post_type' => 'team',
  'posts_per_page' => -1,
  'post_status' => 'publish'
]);

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php include( locate_template( 'template-parts/hero.php', false, false ) );  ?>

<main id="main_content" class="main-content-wrap">
  <div class='main'>
    <div class='inner-wrap'>
      
      <section class="team-section">
        <div class="team-wrap grid-four">
          <?php foreach ($team_members as $member) { 
              $fields = get_fields($member);
              $featured_image = get_the_post_thumbnail_url($member->ID, 'medium_large'); 
              $title = $fields['title'];
              $data_obj = [
                'name' => $member->post_title,
                'img' => $featured_image,
                'body' => apply_filters('the_content', $member->post_content),
                'title' => $title
              ];
          ?>
            <div class="team-item grid-item" data-member="<?php echo json_encode($data_obj) ?>">
              <div class="team-item-image" style="background-image: url(<?php echo $featured_image ? $featured_image : gid() . '/placeholder.jpg' ?>)"></div>
              <div class="team-item-content">
                <h2><?php echo $member->post_title ?></h2>
                <?php if ($title) { ?>
                  <p><?php echo $title ?></p>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </section>

    </div>
  </div>
</main>

<?php endwhile;?>
<?php get_footer();
