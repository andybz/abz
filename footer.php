<?php
  $option_fields = get_fields('options');
  $address_line_one = $option_fields['address_line_one'];
  $address_line_two = $option_fields['address_line_two'];
  $email_address = $option_fields['email_address'];
  $phone = $option_fields['phone'];
?>

<footer id="footer">
  <div class="footer-main">
    <div class="main">
      <div class="inner-wrap">
        <div class="footer-info">
          <div>
            <a href="<?php echo get_site_url() ?>">
              <img src="<?php echo gid() ?>/boost.svg" alt="<?php echo get_bloginfo() ?> Logo">
            </a>
            <?php if ($address_line_one) { ?>
            <address>
              <a href="https://www.google.com/maps?saddr=My+Location&daddr=<?php echo $address_line_one . $address_line_two ?>" target="_blank" rel="noopener noreferrer">
                <?php echo $address_line_one ?><br>
                <?php echo $address_line_two ?>
              </a>
            </address>
            <?php } ?>
            <?php if ($email_address) { ?>
            <p><strong>Email:</strong> <a href="mailto:<?php echo $email_address ?>"><?php echo $email_address ?></a></p>
            <?php } ?>
            <?php if ($phone) { ?>
            <p><strong>Phone:</strong> <?php echo format_phone($phone) ?></p>
            <?php } ?>
          </div>
        </div>
        <div class="footer-links">
          <div>
            <h4>Link Section</h4>
            <?php
              wp_nav_menu( array(
                'menu' => 'Footer 1',
                'container' => false, // remove nav container
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'menu_class' => 'menu-section-list', // adding custom nav class
                'depth' => 2, // limit the depth of the nav
              ) );
            ?>
          </div>
          <div>
            <h4>Link Section</h4>
            <?php
              wp_nav_menu( array(
                'menu' => 'Footer 2',
                'container' => false, // remove nav container
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'menu_class' => 'menu-section-list', // adding custom nav class
                'depth' => 2, // limit the depth of the nav
              ) );
            ?>
          </div>
          <div>
            <h4>Link Section</h4>
            <?php
              wp_nav_menu( array(
                'menu' => 'Footer 3',
                'container' => false, // remove nav container
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'menu_class' => 'menu-section-list', // adding custom nav class
                'depth' => 2, // limit the depth of the nav
              ) );
            ?>
          </div>
          <div>
            <h4>Link Section</h4>
            <?php
              wp_nav_menu( array(
                'menu' => 'Footer 4',
                'container' => false, // remove nav container
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'menu_class' => 'menu-section-list', // adding custom nav class
                'depth' => 2, // limit the depth of the nav
              ) );
            ?>
            <?php include( locate_template( 'template-parts/social-links.php', false, false ) );  ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class='main'>
      <div class='inner-wrap'>
        <p translate="no">Copyright ©
          <?php echo date('Y') ?> Company. All Rights Reserved.</p>
        <p>
          <a class="boost-link" target="_blank" rel="noopener" href="//boostcreative.com" translate="no">Built by <span>BOOST</span> Creative</a>
        </p>
      </div>
    </div>
  </div>
</footer>

<!-- conditional polyfills for svelte -->
<script>
if (!('customElements' in window)) {
  window.requestAnimationFrame = window.requestAnimationFrame.bind(window);
  window.setTimeout = window.setTimeout.bind(window);
  document.write(
    '<script src="https://cdn.jsdelivr.net/combine/npm/promise-polyfill@8.1.0/dist/polyfill.min.js,npm/classlist-polyfill@1.2.0/src/index.js,npm/mdn-polyfills@5.19.0/Array.prototype.fill.js,npm/@webcomponents/webcomponentsjs@2.4.1/webcomponents-bundle.min.js"><\/script>'
  )
}
</script>

<?php wp_footer(); ?>

<?php if ($footer_code = $option_fields['footer_code']) {
  // additional footer code for analytics and whatnot
  echo $footer_code;
} ?>

</body>

</html>