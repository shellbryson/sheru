<?php
get_header(); ?>

<main class="su-content" id="primary">
    <?php

    while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/content', 'single' );

      if ( comments_open() || get_comments_number() ) {
        comments_template();
      }

      if ( is_singular( 'attachment' ) ) {
        the_post_navigation( array(
          'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'sheru' ),
        ) );
      } elseif ( is_singular( 'post' ) ) {
        the_post_navigation( array(
          'next_text' => '<span class="su-post-navigation__next" aria-hidden="true">' . __( 'Next', 'sheru' ) . '</span> ' .
            '<span class="sr-only">' . __( 'Next post:', 'sheru' ) . '</span> ' .
            '<span class="post-title">%title</span>',
          'prev_text' => '<span class="su-post-navigation__previous" aria-hidden="true">' . __( 'Previous', 'sheru' ) . '</span> ' .
            '<span class="sr-only">' . __( 'Previous post:', 'sheru' ) . '</span> ' .
            '<span class="post-title">%title</span>',
        ) );
      }
    endwhile;
    ?>
  <?php get_sidebar( 'content-bottom' ); ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
