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

      <?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>

        <div class="su-nav">

          <?php if ( has_nav_menu( 'primary' ) ) : ?>

            <nav class="su-nav__wrapper">

              <header class="su-brand">
                <div class="su-brand__wrapper">

                  <h1 class="su-brand__title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="su-brand__link">Sheru</a>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="su-brand__link su-brand__link--hidden">Shell Bryson</a>
                  </h1>

                  <?php
                  $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) : ?>

                  <div class="su-brand__subtitle">
                    <?php echo $description; ?>
                  </div>

                  <?php endif; ?>
                </div>
              </header>

              <ol class="su-nav__primary">
                <li class="su-nav__primary-tile animation-fadein">
                  <a href="/code-tips" class="su-nav__primary-tile-link">Code</a>
                </li>
                <li class="su-nav__primary-tile animation-fadein">
                  <a href="/blog" class="su-nav__primary-tile-link">Projects</a>
                </li>
                <li class="su-nav__primary-tile animation-fadein">
                  <a href="/projects" class="su-nav__primary-tile-link">Blog</a>
                </li>

                <li class="su-nav__primary-tile animation-fadein js-toggleMenu">
                  <button class="su-nav__button"
                    aria-haspopup="true"
                    aria-owns="nav-secondary"
                    aria-controls="nav-secondary">
                    <span class="sr-only">Toggle expanded navigation</span>
                    <i class="fa fa-th-large su-display-small"></i>
                    <i class="fa fa-bars su-display-medium"></i>
                  </button>
                </li>

                <li class="su-nav__primary-tile su-nav__primary-tile--small animation-fadein js-toggleSearch">
                  <button class="su-nav__button"
                    aria-haspopup="true"
                    aria-owns="nav-search"
                    aria-controls="nav-search">
                    <span class="sr-only">Toggle search form</span>
                    <i class="fa fa-search su-display-medium"></i>
                  </button>
                </li>

              </ol>

              <form method="get"
                    class="su-nav-search js-search"
                    action="<?php echo esc_url( home_url( '/' ) ); ?>"
                    role="search">
                <label class="su-nav-search__label">
                  <span class="sr-only">Search for:</span>
                  <input type="search"
                         class="su-forms__input su-nav-search__input"
                         placeholder="Search"
                         id="search-input"
                         role="search"
                         name="s"
                         value="<?php echo get_search_query(); ?>"
                  />
                </label>
                <button type="submit" class="su-nav-search__submit">
                  <i class="fa fa-search"></i>
                  <span class="sr-only">Submit search</span>
                </button>
              </form>

              <div class="su-nav__scroll-wrap">

                <div class="su-nav__action js-nav-control">
                  <div class="su-nav__action-inner">
                  </div>
                </div>

                <div class="su-nav__scroll su-scrollbar">
                  <?php
                  wp_nav_menu( array(
                    'container' => false,
                    'menu_class' => 'su-nav__secondary js-nav',
                    'echo' => true,
                    'depth' => 1,
                    // Prevents callback crashing menu if menu empty
                    'fallback_cb' => false,
                    'walker' => new sheru_nav_secondary())
                  );
                  ?>
                </div>

              </div>

            </nav>
          <?php endif; ?>

        </div>

      <?php endif; ?>

    </header>

    <div id="content" class="su-wrapper js-wrapper">
