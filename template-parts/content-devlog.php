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
