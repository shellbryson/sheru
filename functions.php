<?php

if ( ! function_exists( 'sheru_setup' ) ) :
function sheru_setup() {
  load_theme_textdomain( 'sheru' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'title-tag' );

  function get_cat_slug($cat_id) {
    //$cat_id = $cat_id;
    $category = get_category($cat_id);
    return $category['slug'];
  }

  /**
   * SHERU - NAVIGATION
   * Custom navigation registration and setup.
   */
  require_once('functions/sheru-nav-primary.php');
  require_once('functions/sheru-nav-secondary.php');

  add_filter('wp_nav_menu_items','sheru_nav_primary_append_toggles', 10, 2);

  register_nav_menus( array(
    'sheru-top'  => __( 'Sheru Top Level Menu', 'sheru' ),
    'sheru-secondary'  => __( 'Sheru Secondary Level Menu', 'sheru' )
  ) );

  /**
   * SHERU
   * Remove admin bar spacing (handled via CSS instead)
   */
  add_action('get_header', 'sheru_filter_head');

  function sheru_filter_head() {
    remove_action('wp_head', '_admin_bar_bump_cb');
  }

  /**
   * SHERU
   * Removes the meta tag identifying WordPress
   */
  remove_action('wp_head', 'wp_generator');

  /**
   * SHERU
   * Add custom post types
   */
  require_once('functions/sheru-custom-post-types.php');

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 1200, 9999 );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

  /*
   * Enable support for Post Formats.
   *
   * See: https://codex.wordpress.org/Post_Formats
   */
  add_theme_support( 'post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
    'gallery',
    'status',
    'audio',
    'chat',
  ) );

  // Indicate widget sidebars can use selective refresh in the Customizer.
  add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // sheru_setup
add_action( 'after_setup_theme', 'sheru_setup' );

/**
 * SHERU
 * Gets a category ID from its Slug
 */
function sheru_get_category_id_from_slug( $slug ) {
  $idObj = get_category_by_slug( $slug );
  $id = $idObj->term_id;
  return $id;
}

/**
 * SHERU
 * Filter home categories to those specified here
 */
function sheru_home_category( $query ) {
  $categories = array();
  array_push($categories, sheru_get_category_id_from_slug( "code" ));
  array_push($categories, sheru_get_category_id_from_slug( "dev-projects" ));
  array_push($categories, sheru_get_category_id_from_slug( "blog" ));
  if ( $query->is_home() && $query->is_main_query() ) {
    $query->set( 'category__in', $categories);
  }
}
add_action( 'pre_get_posts', 'sheru_home_category' );

/**
 * SHERU
 * Remove named categories from Categories Widget
 */
function sheru_exclude_catergory_from_widget( $args ){
  $excluded_categories = array();
  array_push($excluded_categories, sheru_get_category_id_from_slug( "blog" ));
  array_push($excluded_categories, sheru_get_category_id_from_slug( "frontpage" ));
  $args["exclude"] = $excluded_categories;
  return $args;
}
add_filter( 'widget_categories_args', 'sheru_exclude_catergory_from_widget');

/**
 * SHERU
 * Remove the word 'archive' or 'categories' from archive pages.
 */
 function sheru_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'sheru_archive_title' );

/**
 * SHERU
 * A widget that lists the latest posts, excluding specified Category names.
 */
function sheru_posts($args) {
  echo $args['before_widget'];
  echo $args['before_title'] . 'My Unique Widget' .  $args['after_title'];
  echo $args['after_widget'];

  echo "Your Widget Test";

  $slug = "blog";

  $args = array(
    'posts_per_page' => 5,
    'category__not_in' => array( sheru_get_category_id_from_slug( $slug ) )
  );

  $sheru_posts = new WP_Query($args);

  if($sheru_posts->have_posts() ) :
    echo '<ul>';
    while ( $sheru_posts->have_posts() ) : $sheru_posts->the_post();
      echo '<li>';
      echo '<a href="'.the_permalink().'">';
      the_title();
      echo '</a>';
      echo '</li>';
    endwhile;
    echo '</ul>';
  endif;

}

/**
 * SHERU
 * Returns version of this template
 */
function sheru_get_theme_version() {
  $sheru_theme = wp_get_theme();
  $sheru_theme_version = $sheru_theme->get('Version');


  $fileName = "ui/version.txt";
     $pluginDirectory = plugin_dir_path( __FILE__ );
     $filePath = $pluginDirectory . $fileName;
     $fileContents = file_get_contents($filePath);

  $version_string = $fileContents . " (theme: " .  $sheru_theme_version . ")";

  return $version_string;

}

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function sheru_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'sheru_content_width', 840 );
}
add_action( 'after_setup_theme', 'sheru_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function sheru_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Sidebar', 'sheru' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Add widgets here to appear in your sidebar.', 'sheru' ),
    'before_widget' => '<section id="%1$s" class="su-widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="su-heading su-heading--two su-widget__heading">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Content Bottom 1', 'sheru' ),
    'id'            => 'sidebar-2',
    'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'sheru' ),
    'before_widget' => '<section id="%1$s" class="su-widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="su-heading su-heading--two su-widget__heading">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Content Bottom 2', 'sheru' ),
    'id'            => 'sidebar-3',
    'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'sheru' ),
    'before_widget' => '<section id="%1$s" class="su-widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="su-heading su-heading--two su-widget__heading">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'sheru_widgets_init' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function sheru_javascript_detection() {
  echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'sheru_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function sheru_scripts() {

  // Add Genericons, used in the main stylesheet.
  wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

  // Theme stylesheet.
  wp_enqueue_style( 'sheru-style', get_stylesheet_uri() );

  wp_enqueue_style( 'fabric', get_template_directory_uri() . '/ui/styles/build.min.css', array(), '1.1.0' );
  wp_enqueue_script( 'sheru-script', get_template_directory_uri() . '/ui/scripts/build.min.js', array(), '1.1.0', true );

  wp_enqueue_script( 'sheru-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160816', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

  if ( is_singular() && wp_attachment_is_image() ) {
    wp_enqueue_script( 'sheru-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
  }

  wp_enqueue_script( 'sheru-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );

  wp_localize_script( 'sheru-script', 'screenReaderText', array(
    'expand'   => __( 'expand child menu', 'sheru' ),
    'collapse' => __( 'collapse child menu', 'sheru' ),
  ) );
}
add_action( 'wp_enqueue_scripts', 'sheru_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function sheru_body_classes( $classes ) {
  // Adds a class of custom-background-image to sites with a custom background image.
  if ( get_background_image() ) {
    $classes[] = 'custom-background-image';
  }

  // Adds a class of group-blog to sites with more than 1 published author.
  if ( is_multi_author() ) {
    $classes[] = 'group-blog';
  }

  // Adds a class of no-sidebar to sites without active sidebar.
  if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    $classes[] = 'no-sidebar';
  }

  // Adds a class of hfeed to non-singular pages.
  if ( ! is_singular() ) {
    $classes[] = 'hfeed';
  }

  return $classes;
}
add_filter( 'body_class', 'sheru_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function sheru_hex2rgb( $color ) {
  $color = trim( $color, '#' );

  if ( strlen( $color ) === 3 ) {
    $r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
    $g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
    $b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
  } else if ( strlen( $color ) === 6 ) {
    $r = hexdec( substr( $color, 0, 2 ) );
    $g = hexdec( substr( $color, 2, 2 ) );
    $b = hexdec( substr( $color, 4, 2 ) );
  } else {
    return array();
  }

  return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function sheru_content_image_sizes_attr( $sizes, $size ) {
  $width = $size[0];

  840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

  if ( 'page' === get_post_type() ) {
    840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
  } else {
    840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
    600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
  }

  return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'sheru_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function sheru_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
  if ( 'post-thumbnail' === $size ) {
    is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
    ! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
  }
  return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'sheru_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function sheru_widget_tag_cloud_args( $args ) {
  $args['largest'] = 1;
  $args['smallest'] = 1;
  $args['unit'] = 'em';
  return $args;
}
add_filter( 'widget_tag_cloud_args', 'sheru_widget_tag_cloud_args' );
