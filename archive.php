<?php
get_header(); ?>

<main class="su-content su-content--archive" id="primary">

  <?php if ( have_posts() ) : ?>

    <header class="su-page-header">
      <h1 class="su-heading su-heading--two"><?php the_archive_title(); ?></h1>
      <h2 class="su-heading__subheading"><?php the_archive_description(); ?></h2>
    </header>

    <?php
    while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/content', get_post_format() );
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
