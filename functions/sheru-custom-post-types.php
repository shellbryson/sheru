<?php

/**
* SHERU
* Add custom post type for Devlogs
*/
function custom_post_type_devlogs() {

  $labels = array(
    'name'                => _x( 'Dev Logs', 'Post Type General Name', 'sheru' ),
    'singular_name'       => _x( 'Devlog', 'Post Type Singular Name', 'sheru' ),
    'menu_name'           => __( 'Dev Logs', 'sheru' ),
    'all_items'           => __( 'All', 'sheru' ),
    'view_item'           => __( 'View', 'sheru' ),
    'add_new_item'        => __( 'New', 'sheru' ),
    'add_new'             => __( 'New', 'sheru' ),
    'edit_item'           => __( 'Edit', 'sheru' ),
    'update_item'         => __( 'Update', 'sheru' ),
    'search_items'        => __( 'Search', 'sheru' ),
    'not_found'           => __( 'Devlog Not Found', 'sheru' ),
    'not_found_in_trash'  => __( 'Devlog Not found in Trash', 'sheru' ),
  );

  $args = array(
    'label'               => __( 'Dev Logs', 'sheru' ),
    'description'         => __( 'Live developer logs', 'sheru' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
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
    'name'                => _x( 'Intro (index page)', 'Post Type General Name', 'sheru' ),
    'singular_name'       => _x( 'Intro', 'Post Type Singular Name', 'sheru' ),
    'menu_name'           => __( 'Intro', 'sheru' ),
    'all_items'           => __( 'All', 'sheru' ),
    'view_item'           => __( 'View', 'sheru' ),
    'add_new_item'        => __( 'Add', 'sheru' ),
    'add_new'             => __( 'Add', 'sheru' ),
    'edit_item'           => __( 'Edit', 'sheru' ),
    'update_item'         => __( 'Update', 'sheru' ),
    'search_items'        => __( 'Search', 'sheru' ),
    'not_found'           => __( 'Intro: Not Found', 'sheru' ),
    'not_found_in_trash'  => __( 'Intro: Not found in Trash', 'sheru' ),
  );

  $args = array(
    'label'               => __( 'Intro:', 'sheru' ),
    'description'         => __( 'Intro: content', 'sheru' ),
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
* Add custom post type for Frontpage (dev logs)
*/
function custom_post_type_frontpage_devlogs() {

  $labels = array(
    'name'                => _x( 'Intro: Dev Logs', 'Post Type General Name', 'sheru' ),
    'singular_name'       => _x( 'Intro: Dev Log', 'Post Type Singular Name', 'sheru' ),
    'menu_name'           => __( 'Intro: Dev Log', 'sheru' ),
    'all_items'           => __( 'All', 'sheru' ),
    'view_item'           => __( 'View', 'sheru' ),
    'add_new_item'        => __( 'New', 'sheru' ),
    'add_new'             => __( 'New', 'sheru' ),
    'edit_item'           => __( 'Edit', 'sheru' ),
    'update_item'         => __( 'Update', 'sheru' ),
    'search_items'        => __( 'Search', 'sheru' ),
    'not_found'           => __( 'Intro: Devlog Not Found', 'sheru' ),
    'not_found_in_trash'  => __( 'Intro: Devlog Not found in Trash', 'sheru' ),
  );

  $args = array(
    'label'               => __( 'Intro: Dev Log', 'sheru' ),
    'description'         => __( 'Intro: Devlog content', 'sheru' ),
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
    'capability_type'     => 'post'
  );
  register_post_type( 'fp_devlog', $args );
}
add_action( 'init', 'custom_post_type_frontpage_devlogs', 0 );

/**
* SHERU
* Add custom post type for Frontpage (dev projects)
*/
function custom_post_type_frontpage_devprojects() {

  $labels = array(
    'name'                => _x( 'Intro: Dev Project', 'Post Type General Name', 'sheru' ),
    'singular_name'       => _x( 'Intro: Dev Proj', 'Post Type Singular Name', 'sheru' ),
    'menu_name'           => __( 'Intro: Dev Proj', 'sheru' ),
    'all_items'           => __( 'All', 'sheru' ),
    'view_item'           => __( 'View', 'sheru' ),
    'add_new_item'        => __( 'New', 'sheru' ),
    'add_new'             => __( 'New', 'sheru' ),
    'edit_item'           => __( 'Edit', 'sheru' ),
    'update_item'         => __( 'Update', 'sheru' ),
    'search_items'        => __( 'Search', 'sheru' ),
    'not_found'           => __( 'Intro: Development Project Not Found', 'sheru' ),
    'not_found_in_trash'  => __( 'Intro: Development Project Not found in Trash', 'sheru' ),
  );

  $args = array(
    'label'               => __( 'Intro: D Proj', 'sheru' ),
    'description'         => __( 'Intro: Development Project', 'sheru' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 8,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post'
  );
  register_post_type( 'fp_devprojects', $args );
}
add_action( 'init', 'custom_post_type_frontpage_devprojects', 0 );

/**
* SHERU
* Add custom post type for Frontpage (dev projects)
*/
function custom_post_type_frontpage_projects() {

  $labels = array(
    'name'                => _x( 'Intro: Project', 'Post Type General Name', 'sheru' ),
    'singular_name'       => _x( 'Intro: Projects', 'Post Type Singular Name', 'sheru' ),
    'menu_name'           => __( 'Intro: Projects', 'sheru' ),
    'all_items'           => __( 'All', 'sheru' ),
    'view_item'           => __( 'View', 'sheru' ),
    'add_new_item'        => __( 'New', 'sheru' ),
    'add_new'             => __( 'New', 'sheru' ),
    'edit_item'           => __( 'Edit', 'sheru' ),
    'update_item'         => __( 'Update', 'sheru' ),
    'search_items'        => __( 'Search', 'sheru' ),
    'not_found'           => __( 'Intro: Project Not Found', 'sheru' ),
    'not_found_in_trash'  => __( 'Intro: Project Not found in Trash', 'sheru' ),
  );

  $args = array(
    'label'               => __( 'Intro: Projects', 'sheru' ),
    'description'         => __( 'Intro: Project', 'sheru' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 9,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post'
  );
  register_post_type( 'fp_projects', $args );
}
add_action( 'init', 'custom_post_type_frontpage_projects', 0 );
?>
