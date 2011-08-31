<article id="post-<?php the_ID(); ?>">
    <h1><a href="<?php the_permalink() ?>" title="<?php _e("Read full post", "eshiota"); ?> - <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

    <p class="meta">
        <span class="datetime"><?php the_time('m.d.y') ?></span>
    
        <a href="<?php comments_link(); ?>" title="<?php _e("View comments on this post", "eshiota"); ?>">
            <?php comments_number( 'No comments', '1 comment', '% comments' ); ?>
        </a>
    </p>

    <?php the_excerpt(); ?>

    <p class="readmore">
        <a href="<?php the_permalink() ?>" title="<?php _e("Read full post", "eshiota"); ?>"><?php _e("Read full post", "eshiota"); ?></a>
    </p>
</article>