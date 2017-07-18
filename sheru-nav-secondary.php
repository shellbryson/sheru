<?php
class sheru_nav_secondary extends Walker_Nav_Menu {
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

    $output .= '<li id="item-'. $item->ID . '" class="su-nav__tile-wrapper">';
    $output .= '  <div class="su-nav__secondary-tile">';
    $output .= '    <a'. $attributes .' class="su-nav__secondary-tile-link">';
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
