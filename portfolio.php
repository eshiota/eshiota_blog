<?php
/*
Template Name: Portfolio
*/
get_header();
?>

<section>
    
    <h1 class="main-title"><?php _e("Portfolio", "eshiota"); ?></h1>

    <?php
        query_posts('cat='.get_cat_ID('Portfolio').'&showposts=9&paged='.curPageURL());

        $paginated = false;
        if ($wp_query->max_num_pages > 1) :
            $paginated = true;
        endif;
    ?>

    <div id="portfolio-list" <?= $paginated ? '' : 'class="non-paginated"' ?>>
        <?php 
            if (have_posts()) : while(have_posts()) : the_post();
                get_template_part( 'loop', 'portfolio' );
            endwhile;
        ?>
    </div>

    <?php else: ?>
        <p><?php _e('There are no portfolio jobs yet. Stay tuned!', 'eshiota'); ?></p>
    <?php endif; ?>

    <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  

</section><!-- body > section -->

<?php get_footer(); ?>