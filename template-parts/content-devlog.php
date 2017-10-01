<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article class="su-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="su-article__content">
    <p>
      <span><?php the_time('g:i'); ?></span>
      <span><?php the_time('m/j/y'); ?></span>
    </p>
    <?php
    the_content();
    ?>
  </div>

</article>
