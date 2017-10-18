<?php

/**
* SHERU
* Add custom post type for Devlogs
*/
function custom_post_type_devlogs() {

 $labels = array(
   'name'                => _x( 'Devlogs', 'Post Type General Name', 'sheru' ),
   'singular_name'       => _x( 'Devlog', 'Post Type Singular Name', 'sheru' ),
   'menu_name'           => __( 'Devlog', 'sheru' ),
   'all_items'           => __( 'All Devlogs', 'sheru' ),
   'view_item'           => __( 'View Devlog', 'sheru' ),
   'add_new_item'        => __( 'Add New Devlog', 'sheru' ),
   'add_new'             => __( 'Add New', 'sheru' ),
   'edit_item'           => __( 'Edit Devlog', 'sheru' ),
   'update_item'         => __( 'Update Devlog', 'sheru' ),
   'search_items'        => __( 'Search Devlogs', 'sheru' ),
   'not_found'           => __( 'Devlog Not Found', 'sheru' ),
   'not_found_in_trash'  => __( 'Devlog Not found in Trash', 'sheru' ),
 );

 $args = array(
   'label'               => __( 'devlogs', 'sheru' ),
   'description'         => __( 'Live developer logs', 'sheru' ),
   'labels'              => $labels,
   'supports'            => array( 'title', 'editor' ),
   'hierarchical'        => false,
   'public'              => true,
   'show_ui'             => true,
   'show_in_menu'        => true,
   'show_in_nav_menus'   => true,
   'show_in_admin_bar'   => true,
   'menu_position'       => 6,
   'can_export'          => true,
   'has_archive'         => true,
   'exclude_from_search' => false,
   'publicly_queryable'  => true,
   'capability_type'     => 'post',
 );
register_post_type( 'devlogs', $args );
}

add_action( 'init', 'custom_post_type_devlogs', 0 );

/**
* SHERU
* Add custom post type for Frontpage (index)
*/
function custom_post_type_frontpage() {

 $labels = array(
   'name'                => _x( 'Frontpage', 'Post Type General Name', 'sheru' ),
   'singular_name'       => _x( 'Frontpage', 'Post Type Singular Name', 'sheru' ),
   'menu_name'           => __( 'Frontpage', 'sheru' ),
   'all_items'           => __( 'All Frontpage articles', 'sheru' ),
   'view_item'           => __( 'View Fontpage', 'sheru' ),
   'add_new_item'        => __( 'Add New Frontpage', 'sheru' ),
   'add_new'             => __( 'Add New', 'sheru' ),
   'edit_item'           => __( 'Edit Frontpage', 'sheru' ),
   'update_item'         => __( 'Update Frontpage', 'sheru' ),
   'search_items'        => __( 'Search Devlogs', 'sheru' ),
   'not_found'           => __( 'Frontpage Not Found', 'sheru' ),
   'not_found_in_trash'  => __( 'Frontpage Not found in Trash', 'sheru' ),
 );

 $args = array(
   'label'               => __( 'frontpage', 'sheru' ),
   'description'         => __( 'Frontpage content', 'sheru' ),
   'labels'              => $labels,
   'supports'            => array( 'title', 'editor' ),
   'hierarchical'        => false,
   'public'              => true,
   'show_ui'             => true,
   'show_in_menu'        => true,
   'show_in_nav_menus'   => true,
   'show_in_admin_bar'   => true,
   'menu_position'       => 6,
   'can_export'          => true,
   'has_archive'         => true,
   'exclude_from_search' => false,
   'publicly_queryable'  => true,
   'capability_type'     => 'post',
 );
register_post_type( 'frontpage', $args );
}

add_action( 'init', 'custom_post_type_frontpage', 0 );

/**
* SHERU
* Add custom post type for Frontpage (devlogs)
*/
function custom_post_type_frontpage_devlogs() {

 $labels = array(
   'name'                => _x( 'Frontpage: Devlogs', 'Post Type General Name', 'sheru' ),
   'singular_name'       => _x( 'Frontpage: Devlog', 'Post Type Singular Name', 'sheru' ),
   'menu_name'           => __( 'Frontpage: Devlog', 'sheru' ),
   'all_items'           => __( 'All Frontpage Devlog articles', 'sheru' ),
   'view_item'           => __( 'View Fontpage Devlog', 'sheru' ),
   'add_new_item'        => __( 'Add New Frontpage Devlog', 'sheru' ),
   'add_new'             => __( 'Add New', 'sheru' ),
   'edit_item'           => __( 'Edit Frontpage Devlog', 'sheru' ),
   'update_item'         => __( 'Update Frontpage Devlog', 'sheru' ),
   'search_items'        => __( 'Search Frontpage Devlogs', 'sheru' ),
   'not_found'           => __( 'Frontpage Devlog Not Found', 'sheru' ),
   'not_found_in_trash'  => __( 'Frontpage Devlog Not found in Trash', 'sheru' ),
 );

 $args = array(
   'label'               => __( 'frontpage devlog', 'sheru' ),
   'description'         => __( 'Frontpage Devlog content', 'sheru' ),
   'labels'              => $labels,
   'supports'            => array( 'title', 'editor' ),
   'hierarchical'        => false,
   'public'              => true,
   'show_ui'             => true,
   'show_in_menu'        => true,
   'show_in_nav_menus'   => true,
   'show_in_admin_bar'   => true,
   'menu_position'       => 7,
   'can_export'          => true,
   'has_archive'         => true,
   'exclude_from_search' => false,
   'publicly_queryable'  => true,
   'capability_type'     => 'post',
 );
register_post_type( 'frontpage_devlog', $args );
}

add_action( 'init', 'custom_post_type_frontpage_devlogs', 0 );
?>
