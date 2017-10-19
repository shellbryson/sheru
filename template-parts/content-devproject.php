<article class="su-article su-article-devproject" id="post-<?php the_ID(); ?>">

  <header class="su-header su-article__header">
    <?php if ( is_single() ) : ?>
      <?php the_title( sprintf( '<h1 class="su-heading su-heading--one su-article__title"><a href="%s" rel="bookmark" class="su-heading__link">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
    <?php else : ?>
      <?php the_title( sprintf( '<h2 class="su-heading su-heading--two su-article__title"><a href="%s" rel="bookmark" class="su-heading__link">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    <?php endif; ?>
  </header>

  <?php sheru_post_thumbnail(); ?>

  <section class="su-article__content">
    <?php

      the_content();

      wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'sheru' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="sr-only">' . __( 'Page', 'sheru' ) . ' </span>%',
        'separator'   => '<span class="sr-only">, </span>',
      ) );
    ?>
  </section>

  <footer class="su-article__footer">

    <div  class="su-article__meta">
      <?php sheru_entry_meta(); ?>
    </div>
    <?php
      edit_post_link(
        sprintf(
          /* translators: %s: Name of current post */
          __( 'Edit<span class="sr-only"> "%s"</span>', 'sheru' ),
          get_the_title()
        ),
        '<span class="edit-link">',
        '</span>'
      );
    ?>
  </footer>
</article>
