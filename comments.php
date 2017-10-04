<?php
if ( post_password_required() ) {
  return;
}
?>

<div id="comments" class="su-article-comments">

  <?php if ( have_comments() ) : ?>
    <h2 class="su-heading su-heading--two su-article-comments__heading">
      <?php
        $comments_number = get_comments_number();
        if ( 1 === $comments_number ) {
          /* translators: %s: post title */
          printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'sheru' ), get_the_title() );
        } else {
          printf(
            /* translators: 1: number of comments, 2: post title */
            _nx(
              '%1$s thought on &ldquo;%2$s&rdquo;',
              '%1$s thoughts on &ldquo;%2$s&rdquo;',
              $comments_number,
              'comments title',
              'sheru'
            ),
            number_format_i18n( $comments_number ),
            get_the_title()
          );
        }
      ?>
    </h2>

    <?php the_comments_navigation(); ?>

    <ol class="su-article-comments__list">
      <?php
        wp_list_comments( array(
          'style'       => 'ol',
          'short_ping'  => true,
          'avatar_size' => 42,
        ) );
      ?>
    </ol><!-- .comment-list -->

    <?php the_comments_navigation(); ?>

  <?php endif; // Check for have_comments(). ?>

  <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
  ?>
    <p class="su-article__no-comments"><?php _e( 'Comments are closed.', 'sheru' ); ?></p>
  <?php endif; ?>

  <?php
    comment_form( array(
      'title_reply_before' => '<h2 id="reply-title" class="su-heading su-heading--two su-article-comments__heading">',
      'title_reply_after'  => '</h2>',
    ) );
  ?>

</div>
