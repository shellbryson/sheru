<?php

// SECONDARY NAVIGATION, walk the menu items that have been added in WP admin
class sheru_nav_secondary extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

    $object = $item->object;
    $type = $item->type;
    $title = $item->title;
    $description = $item->description;
    $permalink = $item->url;

    // Adds custom classes as defined in WP menu confuration. For Tiles, we have:
    // `tile-background--classname` for applying custom background images.
    // Eg:
    // `tile-category-devlog`
    $classes = join(' ', $item->classes );

    // Build the attributes for the Tile link
    $attributes  = !empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= !empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= !empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= !empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    // Build the HTML
    $output .= '<li class="su-nav__tile-wrapper">';
    $output .= '  <div class="su-nav__secondary-tile">';
    $output .= '    <a'. $attributes .' class="su-nav__secondary-tile-link tile-background '. $classes .'">';
    $output .= '      <div class="su-nav__secondary-tile-content">';
    $output .= '        <span class="title">'. $title .'</span>';
    $output .= '        <span class="divider"></span>';
    $output .= '      </div>';
    $output .= '      <span class="su-nav__shard"></span>';
    $output .= '      <span class="su-nav__shard"></span>';
    $output .= '      <span class="su-nav__shard"></span>';
    $output .= '      <span class="su-nav__shard"></span>';
    $output .= '      <span class="su-nav__shard"></span>';
    $output .= '      <span class="su-nav__shard"></span>';
    $output .= '    </a>';
    $output .= '  </div>';
    $output .= '</li>';

  }
}
?>
