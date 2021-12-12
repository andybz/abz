<?php
/**
 * Enqueue all styles and scripts
 */

function boost_scripts() {
	$theme = wp_get_theme();
	$theme_uri = get_template_directory_uri();

	wp_deregister_script( 'wp-embed' );

	// Deregister the jquery version bundled with WordPress.
	// if woocommerce is installed and is a woocommerce respective page, allow jquery
	// if ( function_exists('is_woocommerce') && (is_woocommerce() || is_cart() || is_checkout() || is_account_page()) || is_page('blog')) {
	// 	wp_dequeue_script( 'jquery' );
	// 	wp_deregister_script( 'jquery' );
	// 	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), null, true );
	// } else {
	// 	wp_dequeue_script( 'jquery' );
	// 	wp_deregister_script( 'jquery' );
	// 	wp_enqueue_script( 'jquery', 'https://cdn.jsdelivr.net/npm/cash-dom@8.1.0/dist/cash.min.js', array(), null, true );
	// }

	wp_dequeue_script( 'jquery' );
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, true );

	// fonts - change this to whatever fonts you need
	// wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,600i,700,800&display=swap',  false, null);

	wp_enqueue_style('theme-css', $theme_uri . "/build/bundle.css",  false, $theme->version);
	// theme js
	wp_enqueue_script('theme-js', $theme_uri . "/build/bundle.js", ['jquery'], $theme->version, true);

	boost_popup_enqueues();

	//login modal
	if (!is_user_logged_in()) {
	  wp_localize_script( 'theme-js', 'login_form_object', array(
	  'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'loadingMessage' => __('Checking credentials...'),
		'lostPassUrl' => wp_lostpassword_url()
	  ));
	}

	wp_localize_script( 'theme-js', 'modal_object', array(
		'logoSrc' => gid() . '/boost.svg',
		'logoAddToCart'=> gid() . '/boost.svg'
		));
}
add_action( 'wp_enqueue_scripts', 'boost_scripts', 10 );



// use jquery instead of cash on gravity forms pages
// function gform_enqueue_custom_script() {
// 	wp_dequeue_script( 'jquery' );
// 	wp_deregister_script( 'jquery' );
// 	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), null, true );
// }
// add_action( 'gform_enqueue_scripts', 'gform_enqueue_custom_script', 10);

// admin block css is in theme-setup now. uncomment add_editor_style( 'build/admin.css' ) to use

function tiny_slider_scripts() {
	if (is_front_page()) {
		// tiny css
		wp_enqueue_style('tinyslider', 'https://cdn.jsdelivr.net/npm/tiny-slider@2.9.3/dist/tiny-slider.css',  false, null);
	}
}
add_action( 'wp_enqueue_scripts', 'tiny_slider_scripts', 100 );
	
// boost popup page
acf_add_options_page(array(
  'page_title' 	=> 'Boost Popup',
  'menu_title'	=> 'Boost Popup',
  'menu_slug' 	=> 'popup-settings',
  'icon_url' => 'dashicons-shield-alt'
));

function boost_popup_enqueues() {
	$fields = get_fields('option');
	$post = get_queried_object();
	$pu_enabled = $fields['pu_enabled'] ?? '';
	if (!$pu_enabled) {
		return;
	}

	if ($fields['pu_pages_enabled']) {
    $pu_pages = $fields['pu_pages'];
    if (!in_array($post->ID, $fields['pu_pages'])) {
      return;
    } 
	}
	$logo = $fields['pu_image'];

  if ($logo['image']) {
    $logo = [
      'image' => $logo['image']['sizes']['medium_large'],
      'width' => $logo['width'],
      'alt' => $logo['image']['alt']
    ];
  }

	$popup_options = [
		'enabled' => $fields['pu_enabled'],
		'version' => $fields['pu_version'],
		'wait' => $fields['pu_wait'],
		'hours' => $fields['pu_hours'],
		'width' => $fields['pu_width'],
		'logo' => $logo,
		'content' => $fields['pu_content'],
		'colors' => $fields['pu_color'],
		'headerPadding' => $fields['pu_header_padding'],
		'bodyPadding' => $fields['pu_body_padding'],
		'buttonText' => $fields['pu_button_text'],
		'buttonURL' => $fields['pu_button_url'],
		'buttonColor' => $fields['pu_button_color'],
		'newTab' => $fields['pu_new_tab'],
		'formID' => $fields['pu_form_id'],
		'gfKey' => $fields['pu_gf_key'],
	];

	// return $popup_options;
	wp_localize_script('theme-js', 'boostPopupOptions', $popup_options);
}
