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
  <main id="main" class="su-main" role="main">

    <section class="su-article__content error-404 not-found">
      <header class="su-page-header">
        <h1 class="su-heading su-heading--one">Uh-oh, can't find that page. Error <span class="su-article__404">404</span>.</h1>
      </header>

      <p>Please let <a href="https://twitter.com/sherucode">@sherucode</a> know!</p>
      <p>
        You can use the search at the top of the page if you are looking for something specific.
      </p>
    </section>

  </main>

  <?php get_sidebar( 'content-bottom' ); ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
