    </div>

    <footer id="colophon" class="su-foot" role="contentinfo">
      <nav class="su-footer__navigation" role="navigation" aria-label="Site navigation">
        <ul class="su-footer__navigation-menu">
          <li class="su-footer__navigation-item">
            <a href="/code-tips">Code</a>
          </li>
          <li class="su-footer__navigation-item">
            <a href="/blog">Projects</a>
          </li>
          <li class="su-footer__navigation-item">
            <a href="/projects">Blog</a>
          </li>
        </ul>
      </nav>

      <?php if ( has_nav_menu( 'social' ) ) : ?>
        <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'sheru' ); ?>">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'social',
              'menu_class'     => 'social-links-menu',
              'depth'          => 1,
              'link_before'    => '<span class="screen-reader-text">',
              'link_after'     => '</span>',
            ) );
          ?>
        </nav>
      <?php endif; ?>

      <div class="site-info">
        <span class="site-title">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php bloginfo( 'name' ); ?>
          </a>
        </span>
        version <?php echo sheru_get_theme_version();?></php>
      </div>
    </footer>

</div>

<?php wp_footer(); ?>
</body>
</html>
