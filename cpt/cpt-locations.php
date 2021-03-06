<?php

// Register Custom Post Type
function boost_location_post_type() {
  $labels = array(
    'name'                  => 'Locations',
    'singular_name'         => 'Locations',
    'menu_name'             => 'Locations',
    'name_admin_bar'        => 'Locations',
    'archives'              => 'Location Archives',
    'parent_item_colon'     => 'Location Store',
    'all_items'             => 'All Locations',
    'add_new_item'          => 'Add New Location',
    'add_new'               => 'Add New Location',
    'new_item'              => 'New Location',
    'edit_item'             => 'Edit Location',
    'update_item'           => 'Update Location',
    'view_item'             => 'View Location',
    'search_items'          => 'Search Location',
    'not_found'             => 'Location Not found',
    'not_found_in_trash'    => 'Location Not found in Trash',
    'featured_image'        => 'Featured Image',
    'set_featured_image'    => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image'    => 'Use as featured image',
    'insert_into_item'      => 'Insert into Location',
    'uploaded_to_this_item' => 'Uploaded to this Location',
    'items_list'            => 'Location list',
    'items_list_navigation' => 'Location list navigation',
    'filter_items_list'     => 'Filter Location list',
  );

  $args = array(
    'label'                 => 'Locations',
    'description'           => 'Locations',
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail' ),
    'hierarchical'          => true,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'show_in_rest'			    => true,    
    // 'menu_position'         => 7,
    'menu_icon'             => 'dashicons-admin-site',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'show_admin_column'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );

  register_post_type( 'locations', $args );

  //Taxonomy
  $tax_labels = array(
    'name'                  => 'Category',
    'singular_name'         => 'Category',
    'menu_name'             => 'Categories',
    'name_admin_bar'        => 'Categories',
    'archives'              => 'Category Archives',
    'parent_item_colon'     => 'Parent Category:',
    'all_items'             => 'All Categories',
    'add_new_item'          => 'Add New Category',
    'add_new'               => 'Add New Category',
    'new_item'              => 'New Category',
    'edit_item'             => 'Edit Category',
    'update_item'           => 'Update Category',
    'view_item'             => 'View Category',
    'search_items'          => 'Search Category',
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'featured_image'        => 'Featured Image',
    'set_featured_image'    => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image'    => 'Use as featured image',
    'insert_into_item'      => 'Insert into category',
    'uploaded_to_this_item' => 'Uploaded to this category',
    'items_list'            => 'Categories list',
    'items_list_navigation' => 'Categories list navigation',
    'filter_items_list'     => 'Filter categories list',
  );
  $tax_args = array(
    'label'                 => 'Category',
    'description'           => 'Categories',
    'labels'                => $tax_labels,
    'show_in_rest'          => true,
    'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    'hierarchical'          => true,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-tickets-alt',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'show_admin_column'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_taxonomy( 'locations_categories', 'locations', $tax_args );
}
add_action( 'init', 'boost_location_post_type', 0 );
