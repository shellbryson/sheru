<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

  <section id="primary" class="su-content">
    <main id="main" class="su-main" role="main">

    <?php if ( have_posts() ) : ?>

      <header class="su-page-header">
        <h2 class="su-heading su-heading--two"><?php printf( __( 'Search Results for: %s', 'sheru' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
      </header>

      <?php
      // Start the loop.
      while ( have_posts() ) : the_post();

        /**
         * Run the loop for the search to output the results.
         * If you want to overload this in a child theme then include a file
         * called content-search.php and that will be used instead.
         */
        get_template_part( 'template-parts/excerpt', 'search' );

      // End the loop.
      endwhile;

      // Previous/next page navigation.
      the_posts_pagination( array(
        'prev_text'          => __( 'Previous page', 'sheru' ),
        'next_text'          => __( 'Next page', 'sheru' ),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'sheru' ) . ' </span>',
      ) );

    // If no content, include the "No posts found" template.
    else :
      get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>

    </main>
  </section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
