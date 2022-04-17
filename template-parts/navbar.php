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
      </nav>
    </div>
  </div>
</div>
