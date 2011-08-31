<?php
/**
 * @package WordPress
 * @subpackage eshiota_reloaded
 */
get_header(); ?>

<section>

    <header>
        <hgroup id="headline">
            <h1><?php _e("Hi, I'm <em>Eduardo Shiota Yasuda</em>, and I'm here to show some", "eshiota"); ?></h1>
        
            <h2><?php _e("Arts <span class='amp'>&</span> Crafts", "eshiota"); ?></h2>

            <h3><?php _e("Carefully crafted interfaces with technique and love", "eshiota"); ?></h3>
        </hgroup>

        <p><?php _e("I'm a <strong>Front-end Developer</strong>, aspiring <strong>UX Designer</strong> and part-time <strong>Graphic Designer</strong>. I love clean, semantic, readable <strong>code</strong>; usable, organized <strong>interfaces</strong>; and modern, clean <strong>layouts</strong>.", "eshiota"); ?></p>

        <p><?php _e("Oh, and I love sushi.", "eshiota"); ?></p>

        <p class="more"><a href="<?php bloginfo('url') ?>/about" title="<?php _e("Read more about me", "eshiota") ?>"><?php _e("Read more", "eshiota") ?></a></p>
    </header>

    <div class="group">
        <?php query_posts('posts_per_page=1&cat='.get_cat_ID('Blog')); ?>
        
        <section class="latest-blogpost">
            <h2><?php _e("Latest blogpost", "eshiota"); ?></h2>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article>
                    <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>

                    <?php the_excerpt(); ?>

                    <p class="readmore">
                        <a href="<?php the_permalink() ?>" title="<?php _e("Read full post", "eshiota"); ?>"><?php _e("Read full post", "eshiota"); ?></a>
                    </p>
                </article>
            <?php endwhile; else: ?>
    	        <p><?php _e("There are no posts in the blog. What a shame!", "eshiota"); ?></p>
    	    <?php endif; ?>
        </section>
    </div>

</section>

<?php get_footer(); ?>