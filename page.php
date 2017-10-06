<?php
get_header(); ?>

  <div id="primary" class="su-content su-content--page">
    <main id="main" class="su-main">

    <?php if ( have_posts() ) : ?>

      <?php if ( is_home() && ! is_front_page() ) : ?>
        <header>
          <h1 class="sr-only"><?php single_post_title(); ?></h1>
        </header>
      <?php endif; ?>

      <?php

      while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content', get_post_format() );
      endwhile;

      // Previous/next page navigation.
      the_posts_pagination( array(
        'prev_text'          => __( 'Previous page', 'sheru' ),
        'next_text'          => __( 'Next page', 'sheru' ),
        'before_page_number' => '<span class="su-post-navigation sr-only">' . __( 'Page', 'sheru' ) . ' </span>',
      ) );

    // If no content, include the "No posts found" template.
    else :
      get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>

    </main>
  </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
