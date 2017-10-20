<?php
$article_excerpt_categories = get_the_category();
$article_excerpt_categories_output = "";
if ( ! empty( $article_excerpt_categories ) ) {
  $article_excerpt_categories_output = esc_html( $article_excerpt_categories[0]->name );
}
?>

<article class="su-article su-article-project" id="post-<?php the_ID(); ?>">

  <div class="su-article-project__meta">
    <div class="su-article-project__year">
      <?php the_field('acf_project_year'); ?>
    </div>
    <span class="su-article-project__divider"></span>
  </div>

  <div class="su-article-project__excerpt">
    <header class="su-header su-article__header">
      <h2 class="su-heading su-heading--two su-article__title">
        <a href="<?php the_permalink() ?>" rel="bookmark" class="su-heading__link">
          <?php the_title() ?>
        </a>
      </h2>
    </header>
    <div class="su-article__content">
      <?php the_excerpt(); ?>
    </div>
  </div>

</article>
