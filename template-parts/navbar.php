<div class="navbar-wrap">
  <div class="main">
    <div class="inner-wrap">
      <nav class="navbar">
        <a href="<?php echo get_site_url() ?>" class="logo-link">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/boost.svg" alt="<?php echo get_bloginfo() ?> Logo">
        </a>
        <button id="toggle_nav" class="toggle-nav">
          <em class="hamburger">
            <div></div>
            <div></div>
            <div></div>
          </em>
          <span class="sr-only">Toggle mobile menu</span>
        </button>
        <?php
          // header menu
          wp_nav_menu( array(
            'menu' => get_term(get_nav_menu_locations()['primary-navigation'], 'nav_menu')->name,
            'container' => false, // remove nav container
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'menu_class' => 'header-links', // adding custom nav class
            'depth' => 2, // limit the depth of the nav
            'theme_location' => 'Primary Navigation'
          ) );
        ?>
        <div class="navbar-login">
          <?php if (is_user_logged_in()) { ?>
          <p>Account</p>
          <?php } else { ?>
          <p>Log In</p>
          <?php } ?>
          <a href="/my-account/" id="login"><span class="sr-only">Account Log In</span></a>
        </div>

        <?php $cart_count = WC()->cart->get_cart_contents_count();?>
        <div class="navbar-cart">
          <span class="cart-count" id="cart_count"><?php echo $cart_count ?></span>
          <a href="/cart/">
            <span class="sr-only">View Cart</span>
            <?php insert_svg('cart') ?>
          </a>
        </div>

      </nav>
    </div>
  </div>
</div>
