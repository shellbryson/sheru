<?php
get_header(); ?>

<main class="su-content su-content-devlog" id="primary">

  <?php
    query_posts(array(
      'post_type' => 'frontpage_devlog',
      'showposts' => 1
    ) );

    if ( have_posts() ) :

      while (have_posts()) : the_post();
        get_template_part( 'template-parts/first-devlog', get_post_format() );
      endwhile;
      wp_reset_query();

    endif;
  ?>

  <?php if ( have_posts() ) : ?>

    <?php
    while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/content-devlog', get_post_format() );
    endwhile;

    the_posts_pagination( array(
      'prev_text'          => __( 'Previous page', 'sheru' ),
      'next_text'          => __( 'Next page', 'sheru' ),
      'before_page_number' => '<span class="su-post-navigation sr-only">' . __( 'Page', 'sheru' ) . ' </span>',
    ) );

  else :
    get_template_part( 'template-parts/content', 'none' );
  endif;
  ?>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
