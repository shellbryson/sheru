<?php
get_header(); ?>

<main class="su-content" id="primary">

  <article class="su-article su-article--404>" id="post-<?php the_ID(); ?>">
    <header class="su-header su-article__header">
      <h1 class="su-heading su-heading--one">Uh-oh, can't find that page. Error <span class="su-heading__highlight">404</span>.</h1>
    </header>

    <section class="su-article__content">
      <p>Please let <a href="https://twitter.com/sherucode">@sherucode</a> know!</p>
      <p>
        You can use the search at the top of the page if you are looking for something specific.
      </p>
    </section>

  </article>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
