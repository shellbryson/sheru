<article class="su-article su-article-devlog" id="post-<?php the_ID(); ?>">

  <header class="su-header su-article__header">

    <?php
      if ( is_single() ) {
        $heading_element = "h1";
      } else {
        $heading_element = "h2";
      }
    ?>

    <<?php echo $heading_element ?> class="su-heading su-heading--three su-article__title">
      <a href="<?php echo esc_url( get_permalink() )?>" rel="bookmark" class="su-heading__link">
        <?php echo the_date('Y-m-d') ?> <?php echo the_title() ?>
      </a>
    </<?php echo $heading_element ?>>

  </header>

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
