<article class="su-article su-article-first" id="post-<?php the_ID(); ?>">

  <header class="su-header su-article__header">
    <?php the_title( sprintf( '<h1 class="su-heading su-heading--one su-article__title"><a href="%s" rel="bookmark" class="su-heading__link">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
  </header>

  <?php sheru_post_thumbnail(); ?>

  <section class="su-article__content">
    <div class="su-article__buttons">
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
    </div>
  </section>

</article>
