<article id="post-<?php the_ID(); ?>">
  <figure>
    <a href="<?php the_permalink() ?>" title="<?php _e("View project details", "eshiota"); ?> - <?php the_title(); ?>" rel="bookmark">
      <?php echo get_the_post_thumbnail($post->ID, 'portfolio-thumb', array(
        'alt' => get_the_title()
      )); ?>
    </a>
  </figure>
  
  <h1>
    <a href="<?php the_permalink() ?>" title="<?php _e("View project details", "eshiota"); ?> - <?php the_title(); ?>" rel="bookmark">
      <?php the_title(); ?>
    </a>
  </h1>

</article>