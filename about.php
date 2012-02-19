<?php
/*
Template Name: Sobre
*/
?>

<?php get_header(); ?>

<section>

  <h1 class="main-title"><?php _e("About Shiota", "eshiota"); ?></h1>

  <div class="section-content">
    <?php if (have_posts()) while (have_posts()) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; ?>
  </div>

</section>

<?php get_footer(); ?>