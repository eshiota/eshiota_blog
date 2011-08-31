<?php
    // This is the blog post view
?>
<?php get_header(); ?>

<?php

$tags = get_the_tags();
$count = 1;
if($tags){
    foreach($tags as $tag){
        $tags_content .= '<a href="'.get_tag_link($tag->term_id).'" title="View posts with the tag "'. $tag->name .'">'. $tag->name .'</a>';
        if($count != count($tags)){
            $tags_content .= ", ";
        }
        $count++;
    }
}
?>
<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" class="post">
    
        <header>
            <time datetime="<?php the_time('Y-m-d') ?>">
                <span class="day"><?php the_time('d') ?></span>
                <abbr class="month"><?php the_time('M') ?></abbr>
                <span class="year"><?php the_time('Y') ?></span>
            </time>
            <?php if($tags): ?>
                <p class="post-tags">
                    <strong>Tags</strong>
                    <?= $tags_content; ?>
                </p>
            <?php endif; ?>
            <nav>
                <h2>Posts navigation</h2>
            
                <ul>
                    <li class="prev">
                        <?php previous_post_link('%link', 'Previous', true); ?>
                        <?php if(!get_adjacent_post(true, '', true)) { echo '<span class="disabled">Previous</span>'; } // if there are no older articles ?>
                    </li>
                    <li class="next">
                        <?php next_post_link('%link', 'Next', true); ?>
                        <?php if(!get_adjacent_post(true, '', false)) { echo '<span class="disabled">Next</span>'; } // if there are no newer articles ?>
                    </li>
                </ul>
            </nav>
        </header>
        
        <div class="post-content">
            <h1 class="main-title"><a href="<?php the_permalink() ?>" title=" - <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            
            <?php the_content(); ?>
            
            <?php get_template_part( 'social' ); ?>
        </div>
        
        <section class="post-comments">
            <?php comments_template(); ?>
        </section>
        
    </article>
<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>