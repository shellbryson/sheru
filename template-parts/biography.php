<?php
/**
 * The template part for displaying an Author biography
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<div class="author-info">
  <div class="author-avatar">
    <?php
    /**
     * Filter the Twenty Sixteen author bio avatar size.
     *
     * @since Twenty Sixteen 1.0
     *
     * @param int $size The avatar height and width size in pixels.
     */
    $author_bio_avatar_size = apply_filters( 'sheru_author_bio_avatar_size', 42 );

    echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
    ?>
  </div>

  <div class="author-description">
    <h2 class="author-title"><span class="author-heading"><?php _e( 'Author:', 'sheru' ); ?></span> <?php echo get_the_author(); ?></h2>

    <p class="author-bio">
      <?php the_author_meta( 'description' ); ?>
      <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
        <?php printf( __( 'View all posts by %s', 'sheru' ), get_the_author() ); ?>
      </a>
    </p>
  </div>
</div>
