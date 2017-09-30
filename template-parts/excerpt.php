<article class="su-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="su-header su-article__header">
    <h2 class="su-heading su-heading--two su-article__title">
      <a href="<?php esc_url( get_permalink() ) ?>" rel="bookmark" class="su-heading__link">
        <?php the_title() ?>
      </a>
    </h2>
    <div class="su-article__date"><?php the_date() ?></div>
  </header>
  <section class="su-article__content">
    <?php
      the_excerpt();
    ?>
    <a href="<?php esc_url( get_permalink() ) ?>" class="su-article__more">Continue reading <span class="su-article__more-sr-only"><?php the_title() ?></span></a>
  </section>
  <footer class="su-article__footer">
    <div class="su-article-meta">
      <?php sheru_entry_meta(); ?>
    </div>
  </footer>
</article>
