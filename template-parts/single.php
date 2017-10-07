<article class="su-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="su-header su-article__header">
    <h1 class="su-heading su-heading--two su-article__title">
      <?php the_title() ?>
    </h1>
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

      if ( '' !== get_the_author_meta( 'description' ) ) {
        get_template_part( 'template-parts/biography' );
      }
    ?>
  </section>

  <footer class="su-article__footer">
    <div class="su-article-meta">
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
