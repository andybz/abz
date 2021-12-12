<?php

 // ERROR LOG LOCATION
 ini_set( 'error_log', get_template_directory() . '/debug.txt' );

// Theme assets
require_once( 'library/enqueue-scripts.php' );

// Cleanup / Custom functions
require_once( 'library/theme-setup.php' );

//svg includes
require_once( 'library/svg-includes.php' );

// Custom blocks
// require_once( 'library/blocks.php' );

// Custom Post Types (CPTs)
require_once( 'cpt/cpt-team.php' );