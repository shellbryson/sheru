<?php

// PRIMARY NAVIGATION, create fixed elements to append to primary nav
function sheru_nav_primary_toggles() {

  $menuItems =  '<li class="su-nav__primary-tile animation-fadein js-toggleMenu">';
  $menuItems .= '  <button class="su-nav__button su-nav__button--title"';
  $menuItems .= '    aria-haspopup="true"';
  $menuItems .= '    aria-owns="nav-secondary"';
  $menuItems .= '    aria-controls="nav-secondary"><span class="su-nav__primary-menu-title">Menu</span>';
  $menuItems .= '    <span class="sr-only">Toggle expanded navigation</span>';
  $menuItems .= '    <i class="fa fa-th-large su-display-small"></i>';
  $menuItems .= '    <i class="fa fa-bars su-display-medium"></i>';
  $menuItems .= '  </button>';
  $menuItems .= '</li>';

  $menuItems .= '<li class="su-nav__primary-tile su-nav__primary-tile--small animation-fadein js-toggleSearch">';
  $menuItems .= '  <button class="su-nav__button"';
  $menuItems .= '    aria-haspopup="true"';
  $menuItems .= '    aria-owns="nav-search"';
  $menuItems .= '    aria-controls="nav-search">';
  $menuItems .= '    <span class="sr-only">Toggle search form</span>';
  $menuItems .= '    <i class="fa fa-search su-display-medium"></i>';
  $menuItems .= '  </button>';
  $menuItems .= '</li>';

  return $menuItems;
}

// PRIMARY NAVIGATION, filters Primary Navigation, adds fixed elements to end
// This function is called as a Filter in functions.php
function sheru_nav_primary_append_toggles( $items, $args ) {
  if( $args->theme_location == 'sheru-top')  {
    $items .= sheru_nav_primary_toggles();
  }
  return $items;
}

// PRIMARY NAVIGATION, walk the menu items that have been added in WP admin
class sheru_nav_primary extends Walker_Nav_Menu {

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

    $indent = str_repeat( "\t", $depth );

    $object = $item->object;
    $type = $item->type;
    $title = $item->title;
    $description = $item->description;
    $permalink = $item->url;

    $attributes  = !empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= !empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= !empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= !empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    $output .= '<li class="su-nav__primary-tile animation-fadein">';
    $output .= '  <a'. $attributes .' class="su-nav__primary-tile-link">'. $title .'</a>';
    $output .= '</li>';

  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "\n";
  }
}
?>
