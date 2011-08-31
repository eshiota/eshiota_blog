<?php
/*
Template Name: Sobre
*/
?>

<?php get_header(); ?>

<article>

    <h1 class="main-title"><?php _e("About Shiota", "eshiota"); ?></h1>

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>

</article>

<?php get_footer(); ?>