<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article class="su-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="su-header su-article__header">
    Individual project<?php the_title( '<h1 class="su-title su-title--one su-article__title">', '</h1>' ); ?>
  </header>

  <?php sheru_excerpt(); ?>

  <?php sheru_post_thumbnail(); ?>

  <section class="entry-content su-article__content">


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
