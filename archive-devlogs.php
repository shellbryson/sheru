<?php
get_header(); ?>

<main class="su-content" id="primary">

  <h1>Devlog viewer (based on archive)</h1>

  <?php if ( have_posts() ) : ?>

    <?php
    while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/content-devlog', get_post_format() );
    endwhile;

    the_posts_pagination( array(
      'prev_text'          => __( 'Previous page', 'sheru' ),
      'next_text'          => __( 'Next page', 'sheru' ),
      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'sheru' ) . ' </span>',
    ) );

  else :
    get_template_part( 'template-parts/content', 'none' );
  endif;
  ?>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
