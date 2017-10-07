<?php
$article_excerpt_categories = get_the_category();
$article_excerpt_categories_output = "";
if ( ! empty( $article_excerpt_categories ) ) {
  $article_excerpt_categories_output = esc_html( $article_excerpt_categories[0]->name );
}
?>

<article class="su-article su-article--divider su-article--<?php echo strtolower($article_excerpt_categories_output); ?>" id="post-<?php the_ID(); ?>">
  <header class="su-header su-article__header">
    <h2 class="su-heading su-heading--two su-article__title">
      <a href="<?php the_permalink() ?>" rel="bookmark" class="su-heading__link">
        <?php the_title() ?>
      </a>
    </h2>
    <div class="su-article__date"><?php the_date() ?></div>
  </header>
  <div class="su-article__content">
    <?php
      the_excerpt();
    ?>
    <a href="<?php the_permalink()?>" class="su-article__more">Continue reading <span class="su-article__more-sr-only"><?php the_title() ?></span></a>
  </div>
  <footer class="su-article__footer">
    <div class="su-article-meta su-article-meta--short">
      <?php sheru_entry_meta(); ?>
    </div>
  </footer>
</article>
