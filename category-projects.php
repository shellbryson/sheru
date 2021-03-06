<?php
get_header(); ?>

  <main class="su-content su-content-projects" id="primary">

    <?php
      query_posts(array(
        'post_type' => 'fp_projects',
        'showposts' => 1
      ) );
    ?>

    <?php if ( have_posts() ) : ?>

    <?php
      while (have_posts()) : the_post();
        get_template_part( 'template-parts/first-projects', get_post_format() );
      endwhile;
      wp_reset_query();
    ?>

    <?php endif; ?>

    <?php if ( have_posts() ) : ?>

      <?php

      while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/excerpt-projects', get_post_format() );
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

<?php get_sidebar(); ?>
<?php get_footer(); ?>
