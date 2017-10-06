<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <!--
    Sheru Theme and Component Library by Shell Bryson
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
  <div class="su-page" id="page">

      <a class="su-skip-to-content" href="#content">Skip to content</a>

      <header class="su-head">

          <div class="su-nav">

              <nav class="su-nav__wrapper">

                <div class="su-brand">
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
                  <div class="su-brand__logo"></div>
                </div>

                <?php
                if ( has_nav_menu( 'sheru-top' ) ) {
                  wp_nav_menu( array(
                    'theme_location' => 'sheru-top',
                    'container' => false,
                    'menu_class' => 'su-nav__primary',
                    'echo' => true,
                    'depth' => 1,
                    'fallback_cb' => false,
                    'walker' => new sheru_nav_primary())
                  );
                }
                ?>

                <form method="get"
                      class="su-nav-search js-search"
                      id="nav-search"
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
                  <div class="su-nav__scroll su-scrollbar" id="nav-secondary">

                    <?php
                    if ( has_nav_menu( 'sheru-secondary' ) ) {
                      wp_nav_menu( array(
                        'theme_location' => 'sheru-secondary',
                        'container' => false,
                        'menu_class' => 'su-nav__secondary js-nav',
                        'echo' => true,
                        'depth' => 1,
                        'fallback_cb' => false,
                        'walker' => new sheru_nav_secondary())
                      );
                    }
                    ?>

                  </div>
                </div>

              </nav>

          </div>
          <div class="su-logo"></div>

      </header>

      <div class="su-wrapper js-wrapper" id="content">
        <div class="su-logo su-logo--small"></div>
