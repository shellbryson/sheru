<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<section class="no-results not-found su-article">
  <header class="su-header su-article__header">
    <h1 class="page-title su-title su-title--one"><?php _e( 'Nothing Found', 'sheru' ); ?></h1>
  </header>

  <section class="page-content entry-content su-article__content">
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
