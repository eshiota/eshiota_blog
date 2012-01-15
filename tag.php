<?php
/*
Template Name: Tag
*/
?>

<?php get_header(); ?>

<section>
    
  <hgroup>
    <h1 class="main-title"><?php _e("Posts with tag", "eshiota"); ?></h1>
        
    <h2><?= single_tag_title( '', false ) ?></h2>
  </hgroup>

  <?php
    $paginated = false;
    
    if ($wp_query->max_num_pages > 1) {
      $paginated = true;
    }
  ?>

  <div id="post-list" <?= $paginated ? '' : 'class="non-paginated"' ?>>
    <?php 
      if (have_posts()) : while(have_posts()) : the_post();
        get_template_part( 'loop', 'blog' );
      endwhile;
    ?>
  </div>

  <?php else: ?>
    <p><?php _e('This tag has no correspondent posts.'); ?></p>
  <?php endif; ?>

  <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  

</section>

<?php get_footer(); ?>