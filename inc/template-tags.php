<?php
if ( ! function_exists( 'sheru_entry_meta' ) ) :
function sheru_entry_meta() {

  if ( 'post' === get_post_type() ) {
    $author_avatar_size = apply_filters( 'sheru_author_avatar_size', 20 );
    printf( '<span class="su-article-meta__byline"><span class="su-article-meta__author vcard">%1$s<span class="sr-only">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
      get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
      _x( 'Author', 'Used before post author name.', 'sheru' ),
      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
      get_the_author()
    );
  }

  if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
    sheru_entry_date();
  }

  $format = get_post_format();
  if ( current_theme_supports( 'post-formats', $format ) ) {
    printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
      sprintf( '<span class="sr-only">%s </span>', _x( 'Format', 'Used before post format.', 'sheru' ) ),
      esc_url( get_post_format_link( $format ) ),
      get_post_format_string( $format )
    );
  }

  if ( 'post' === get_post_type() ) {
    sheru_entry_taxonomies();
  }

  if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
    echo '<span class="su-article-meta__comment">';
    comments_popup_link( sprintf( __( 'Leave a comment<span class="sr-only"> on %s</span>', 'sheru' ), get_the_title() ) );
    echo '</span>';
  }
}
endif;

// end

if ( ! function_exists( 'sheru_entry_date' ) ) :
function sheru_entry_date() {
  $time_string = '<time class="su-article-meta__published" datetime="%1$s">%2$s</time>';

  if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		printf( '<span class="su-article-meta__updated">Updated on %1$s</span>',
			get_the_modified_date()
		);
  }


}
endif;

if ( ! function_exists( 'sheru_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own sheru_entry_taxonomies() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function sheru_entry_taxonomies() {
  $categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'sheru' ) );
  if ( $categories_list && sheru_categorized_blog() ) {
    printf( '<span class="su-article-meta__categories"><span class="sr-only">%1$s </span>%2$s</span>',
      _x( 'Categories', 'Used before category names.', 'sheru' ),
      $categories_list
    );
  }

  $tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'sheru' ) );
  if ( $tags_list ) {
    printf( '<span class="tags-links"><span class="sr-only">%1$s </span>%2$s</span>',
      _x( 'Tags', 'Used before tag names.', 'sheru' ),
      $tags_list
    );
  }
}
endif;

if ( ! function_exists( 'sheru_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own sheru_post_thumbnail() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function sheru_post_thumbnail() {
  if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
    return;
  }

  if ( is_singular() ) :
  ?>

  <div class="post-thumbnail">
    <?php the_post_thumbnail(); ?>
  </div><!-- .post-thumbnail -->

  <?php else : ?>

  <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
    <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
  </a>

  <?php endif; // End is_singular()
}
endif;

if ( ! function_exists( 'sheru_excerpt' ) ) :
  /**
   * Displays the optional excerpt.
   *
   * Wraps the excerpt in a div element.
   *
   * Create your own sheru_excerpt() function to override in a child theme.
   *
   * @since Twenty Sixteen 1.0
   *
   * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
   */
  function sheru_excerpt( $class = 'entry-summary' ) {
    $class = esc_attr( $class );

    if ( has_excerpt() || is_search() ) : ?>
      <div class="<?php echo $class; ?>">
        <?php the_excerpt(); ?>
      </div><!-- .<?php echo $class; ?> -->
    <?php endif;
  }
endif;

if ( ! function_exists( 'sheru_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * Create your own sheru_excerpt_more() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function sheru_excerpt_more() {
  $link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
    esc_url( get_permalink( get_the_ID() ) ),
    /* translators: %s: Name of current post */
    sprintf( __( 'Continue reading<span class="sr-only"> "%s"</span>', 'sheru' ), get_the_title( get_the_ID() ) )
  );
  return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'sheru_excerpt_more' );
endif;

if ( ! function_exists( 'sheru_categorized_blog' ) ) :
/**
 * Determines whether blog/site has more than one category.
 *
 * Create your own sheru_categorized_blog() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return bool True if there is more than one category, false otherwise.
 */
function sheru_categorized_blog() {
  if ( false === ( $all_the_cool_cats = get_transient( 'sheru_categories' ) ) ) {
    // Create an array of all the categories that are attached to posts.
    $all_the_cool_cats = get_categories( array(
      'fields'     => 'ids',
      // We only need to know if there is more than one category.
      'number'     => 2,
    ) );

    // Count the number of categories that are attached to the posts.
    $all_the_cool_cats = count( $all_the_cool_cats );

    set_transient( 'sheru_categories', $all_the_cool_cats );
  }

  if ( $all_the_cool_cats > 1 ) {
    // This blog has more than 1 category so sheru_categorized_blog should return true.
    return true;
  } else {
    // This blog has only 1 category so sheru_categorized_blog should return false.
    return false;
  }
}
endif;

/**
 * Flushes out the transients used in sheru_categorized_blog().
 *
 * @since Twenty Sixteen 1.0
 */
function sheru_category_transient_flusher() {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
  }
  // Like, beat it. Dig?
  delete_transient( 'sheru_categories' );
}
add_action( 'edit_category', 'sheru_category_transient_flusher' );
add_action( 'save_post',     'sheru_category_transient_flusher' );

if ( ! function_exists( 'sheru_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Twenty Sixteen 1.2
 */
function sheru_the_custom_logo() {
  if ( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo();
  }
}
endif;
