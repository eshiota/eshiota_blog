<?php
/*
Template Name: Blog
*/
get_header(); ?>

<section>
    
    <h1 class="main-title"><?php _e("Latest blogposts", "eshiota"); ?></h1>

    <?php
        query_posts('cat='.get_cat_ID('Blog').'&showposts=10&paged='.curPageURL());

        $paginated = false;
        if ($wp_query->max_num_pages > 1) :
            $paginated = true;
        endif;
    ?>

    <div id="post-list" <?= $paginated ? '' : 'class="non-paginated"' ?>>
        <?php 
            if (have_posts()) : while(have_posts()) : the_post();
                get_template_part( 'loop', 'blog' );
            endwhile;
        ?>
    </div>

    <?php else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>

    <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  

</section><!-- body > section -->

<?php get_footer(); ?>