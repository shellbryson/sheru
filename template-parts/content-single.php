<article class="su-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="su-header su-article__header">
    <h2 class="su-heading su-heading--two su-article__title">
      <?php the_title() ?>
    </h2>
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
        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'sheru' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
      ) );

      if ( '' !== get_the_author_meta( 'description' ) ) {
        get_template_part( 'template-parts/biography' );
      }
    ?>
  </section>

  <footer class="su-article__footer">
    <?php sheru_entry_meta(); ?>
    <?php
      edit_post_link(
        sprintf(
          /* translators: %s: Name of current post */
          __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'sheru' ),
          get_the_title()
        ),
        '<span class="edit-link">',
        '</span>'
      );
    ?>
  </footer>
</article>
