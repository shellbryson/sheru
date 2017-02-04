<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <!--
    Sheru Theme by Shell Bryson
    author URL: https://sheru.uk
  -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="su-site">
  <div class="site-inner">
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sheru' ); ?></a>

    <header class="su-head">

      <div class="su-brand">
          <!--<?php sheru_the_custom_logo(); ?>-->

          <?php if ( is_front_page() && is_home() ) : ?>
            <h1 class="su-brand__title">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="su-brand__link"><?php bloginfo( 'name' ); ?></a>
            </h1>
          <?php else : ?>
            <p class="su-brand__title">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="su-brand__link"><?php bloginfo( 'name' ); ?></a>
            </p>
          <?php endif;

          $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?>

          <!--<p class="site-description"><?php echo $description; ?></p>-->

          <?php endif; ?>
      </div>

      <form role="search" method="get" class="su-navigation-search"
            action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label class="su-forms__label">
          <span class="sr-only"><?php echo _x( 'Search for:', 'label', 'sheru' ); ?></span>
          <input type="search" class="su-forms__input su-navigation-search__input"
                 placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'sheru' ); ?>"
                 value="<?php echo get_search_query(); ?>" name="s" />
        </label>
        <button type="submit" class="su-navigation-search__submit">
          <i class="fa fa-search"></i>
          <span class="sr-only"><?php echo _x( 'Search', 'submit button', 'sheru' ); ?></span>
        </button>
      </form>

      <?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>

        <div class="su-navigation">

          <?php if ( has_nav_menu( 'primary' ) ) : ?>

          <nav class="su-navigation__wrapper">
            <?php
            wp_nav_menu( array(
                'container' => false,
                'menu_class' => 'su-navigation__menu js-navigation',
                'echo' => true,
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'depth' => 0,
                'walker' => new description_walker())
            );
            ?>

            <div class="su-navigation__primary-mobile">
              <ul class="su-navigation__menu-mobile">
                <li class="su-navigation__item su-navigation__item--tile">
                  <a href="/code-tips">Code</a>
                </li>
                <li class="su-navigation__item su-navigation__item--tile">
                  <a href="/blog">Projects</a>
                </li>
                <li class="su-navigation__item su-navigation__item--tile">
                  <a href="/projects">Blog</a>
                </li>
                <li class="su-navigation__item su-navigation__item--tile js-toggle">
                  <a href="#">
                    <i class="fa fa-th-large su-display-small"></i>
                    <i class="fa fa-bars su-display-medium"></i>
                  </a>
                </li>
              </ul>
            </div>

          </nav>
        <?php endif; ?>

      </div>

      <?php endif; ?>

    </header>

      <?php if ( get_header_image() ) : ?>
        <?php
          /**
           * Filter the default sheru custom header sizes attribute.
           *
           * @since Twenty Sixteen 1.0
           *
           * @param string $custom_header_sizes sizes attribute
           * for Custom Header. Default '(max-width: 709px) 85vw,
           * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
           */
          $custom_header_sizes = apply_filters( 'sheru_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
        ?>
        <div class="header-image">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
          </a>
        </div>
      <?php endif; // End header image check. ?>

    <div id="content" class="su-content">
