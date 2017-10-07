<section class="su-article su-article--not-found">
  <header class="su-header su-article__header">
    <h1 class="su-heading su-heading--one"><?php _e( 'Nothing Found', 'sheru' ); ?></h1>
  </header>

  <section class="su-article__content">
    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

      <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'sheru' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

    <?php elseif ( is_search() ) : ?>

      <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'sheru' ); ?></p>
      <?php get_search_form(); ?>

    <?php else : ?>

      <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'sheru' ); ?></p>
      <?php get_search_form(); ?>

    <?php endif; ?>
  </section>
</section>
