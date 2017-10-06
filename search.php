<?php
get_header(); ?>

<main class="su-content" id="primary">

  <?php if ( have_posts() ) : ?>

    <header class="su-page-header">
      <h2 class="su-heading su-heading--two"><?php printf( __( 'Search Results for: %s', 'sheru' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
    </header>

    <?php
    while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/excerpt', 'search' );
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
