<article class="su-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="su-header su-article__header">
    <?php the_title( '<h1 class="su-heading su-heading--one">', '</h1>' ); ?>
  </header>

  <?php sheru_post_thumbnail(); ?>

  <div class="su-article__content">
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
    ?>
  </div>

  <?php
    edit_post_link(
      sprintf(
        /* translators: %s: Name of current post */
        __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'sheru' ),
        get_the_title()
      ),
      '<footer class="entry-footer"><span class="edit-link">',
      '</span></footer>'
    );
  ?>

</article>
