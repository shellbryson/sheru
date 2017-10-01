<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article class="su-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="su-header su-article__header">
    <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
      <span class="sticky-post"><?php _e( 'Featured', 'sheru' ); ?></span>
    <?php endif; ?>

    <?php the_title( sprintf( '<h2 class="su-title su-title--two su-article__title"><a href="%s" rel="bookmark" class="su-title__link">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
  </header>

  <?php sheru_post_thumbnail(); ?>

  <section class="entry-content su-article__content">
    <?php
      /* translators: %s: Name of current post */
      the_content( sprintf(
        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'sheru' ),
        get_the_title()
      ) );

      wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'sheru' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'sheru' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
      ) );
    ?>
  </section><!-- .entry-content -->

  <footer class="entry-footer su-article__footer">
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
  </footer><!-- .entry-footer -->
</article><!-- #post-## -->
