    </div>

    <footer id="colophon" class="su-footer" role="contentinfo">

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

      <div class="su-footer__meta">
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
