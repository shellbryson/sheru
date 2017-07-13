<?php
class sheru_nav_secondary extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $attributes  = !empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= !empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= !empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= !empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    $output .= $indent . '<li id="item-'. $item->ID . '" class="su-nav__tile-wrapper">';
    $output .= $indent . '  <div class="su-nav__secondary-tile">';
    $output .= $indent . '    <a'. $attributes .' class="su-nav__secondary-tile-link">';
    $output .= $indent . '      <div class="su-nav__secondary-tile-content">';
    $output .= $indent . '        <span class="title">x'. esc_attr( $item->description ) .'</span>';
    $output .= $indent . '        <span class="divider"></span>';
    $output .= $indent . '      </div>';
    $output .= $indent . '      <span class="su-nav__shard"></span>';
    $output .= $indent . '      <span class="su-nav__shard"></span>';
    $output .= $indent . '      <span class="su-nav__shard"></span>';
    $output .= $indent . '      <span class="su-nav__shard"></span>';
    $output .= $indent . '      <span class="su-nav__shard"></span>';
    $output .= $indent . '      <span class="su-nav__shard"></span>';
    $output .= $indent . '    </a>';
    $output .= $indent . '  </div>';
    $output .= $indent . '</li>';

    $output .= apply_filters( 'walker_nav_menu_start_el', $output, $item, $depth, $args );
  }
}
?>
