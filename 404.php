<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="su-content">
  <main id="main" class="site-main" role="main">

    <section class="error-404 not-found">
      <header class="su-page-header">
        <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'sheru' ); ?></h1>
      </header>

      <div class="page-content">
        <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'sheru' ); ?></p>

        <?php get_search_form(); ?>
      </div>
    </section>

  </main>

  <?php get_sidebar( 'content-bottom' ); ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
