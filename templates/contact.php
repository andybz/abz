<?php
/*
Template Name: Contact
*/

$option_fields = get_fields('options');
$address_line_one = $option_fields['address_line_one'];
$address_line_two = $option_fields['address_line_two'];

$fields = get_fields();

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php include( locate_template( 'template-parts/hero.php', false, false ) );  ?>

<main id="main_content" class="main-content-wrap">
  <div class='main'>
    <div class='inner-wrap'>
      <?php if ( !empty( get_the_content() ) ) { ?>
        <div class="contact-content">
          <?php the_content() ?>
        </div>
      <?php } ?>
      <div class="contact-wrap">
        <div class="contact-sidebar">
          <div class="contact-side-header">
            <h3><?php echo get_bloginfo( 'name' ); ?></h3>
          </div>
          <div class="contact-side-content">
            <?php if ($address_line_one) { ?>
              <div class="side-address">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-svg"><path d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-svg side-svg-hover"><path d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z"/></svg>
                <p><?php echo $address_line_one ?><br><?php echo $address_line_two ?></p>
                <a target="_blank" rel="noopener" href="https://www.google.com/maps?saddr=My+Location&daddr=<?php echo $address_line_one . $address_line_two ?>" class="fillall"><span class="sr-only">Get Directions for <?php echo $address_line_one . $address_line_two ?> on Google Maps</span></a>
              </div>
            <?php } ?>
            <?php if ($phone = $option_fields['phone']) { ?>
              <div class="side-phone">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-svg"><path d="M19.44,13c-.22,0-.45-.07-.67-.12a9.44,9.44,0,0,1-1.31-.39,2,2,0,0,0-2.48,1l-.22.45a12.18,12.18,0,0,1-2.66-2,12.18,12.18,0,0,1-2-2.66L10.52,9a2,2,0,0,0,1-2.48,10.33,10.33,0,0,1-.39-1.31c-.05-.22-.09-.45-.12-.68a3,3,0,0,0-3-2.49h-3a3,3,0,0,0-3,3.41A19,19,0,0,0,18.53,21.91l.38,0a3,3,0,0,0,2-.76,3,3,0,0,0,1-2.25v-3A3,3,0,0,0,19.44,13Zm.5,6a1,1,0,0,1-.34.75,1.05,1.05,0,0,1-.82.25A17,17,0,0,1,4.07,5.22a1.09,1.09,0,0,1,.25-.82,1,1,0,0,1,.75-.34h3a1,1,0,0,1,1,.79q.06.41.15.81a11.12,11.12,0,0,0,.46,1.55l-1.4.65a1,1,0,0,0-.49,1.33,14.49,14.49,0,0,0,7,7,1,1,0,0,0,.76,0,1,1,0,0,0,.57-.52l.62-1.4a13.69,13.69,0,0,0,1.58.46q.4.09.81.15a1,1,0,0,1,.79,1Z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-svg side-svg-hover"><path d="M19.44,13c-.22,0-.45-.07-.67-.12a9.44,9.44,0,0,1-1.31-.39,2,2,0,0,0-2.48,1l-.22.45a12.18,12.18,0,0,1-2.66-2,12.18,12.18,0,0,1-2-2.66L10.52,9a2,2,0,0,0,1-2.48,10.33,10.33,0,0,1-.39-1.31c-.05-.22-.09-.45-.12-.68a3,3,0,0,0-3-2.49h-3a3,3,0,0,0-3,3.41A19,19,0,0,0,18.53,21.91l.38,0a3,3,0,0,0,2-.76,3,3,0,0,0,1-2.25v-3A3,3,0,0,0,19.44,13Zm.5,6a1,1,0,0,1-.34.75,1.05,1.05,0,0,1-.82.25A17,17,0,0,1,4.07,5.22a1.09,1.09,0,0,1,.25-.82,1,1,0,0,1,.75-.34h3a1,1,0,0,1,1,.79q.06.41.15.81a11.12,11.12,0,0,0,.46,1.55l-1.4.65a1,1,0,0,0-.49,1.33,14.49,14.49,0,0,0,7,7,1,1,0,0,0,.76,0,1,1,0,0,0,.57-.52l.62-1.4a13.69,13.69,0,0,0,1.58.46q.4.09.81.15a1,1,0,0,1,.79,1Z"/></svg>
                <p><?php echo $phone ?></p>
                <a href="tel:<?php echo $phone ?>" class="fillall">
                  <span class="sr-only">Call <?php echo get_bloginfo( 'name' ); ?></span>
                </a>
              </div>
            <?php } ?>
            <?php if ($email = $option_fields['email_address']) { ?>
              <div class="side-email">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-svg"><path d="M19,4H5A3,3,0,0,0,2,7V17a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4ZM5,6H19a1,1,0,0,1,1,1l-8,4.88L4,7A1,1,0,0,1,5,6ZM20,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V9.28l7.48,4.57a1,1,0,0,0,1,0L20,9.28Z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="side-svg side-svg-hover"><path d="M19,4H5A3,3,0,0,0,2,7V17a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4ZM5,6H19a1,1,0,0,1,1,1l-8,4.88L4,7A1,1,0,0,1,5,6ZM20,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V9.28l7.48,4.57a1,1,0,0,0,1,0L20,9.28Z"/></svg>
                <p><?php echo $email ?></p>
                <a href="mailto:<?php echo $email ?>" target="_blank" rel="noopener noreferrer" aria-label="( opens in new tab )" class="fillall">
                  <span class="sr-only">Email <?php echo get_bloginfo( 'name' ); ?></span>
                </a>
              </div>
            <?php } ?>

          <?php if ($address_line_one) { ?>
            <div class="contact-iframe">
              <iframe src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=<?php echo urlencode($address_line_one .' '. $address_line_two) ?>'&z=14&output=embed" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          <?php } ?>
          </div>
        </div>
        <?php if ($contact_form_id = $fields['contact_form_id']) { ?>
          <div class="contact-form-wrap">
            <?php echo gravity_form( $contact_form_id, $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = false, $tabindex = true, $echo = true );?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</main>

<?php endwhile;?>
<?php get_footer();
