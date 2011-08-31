<?php
    // This is the portfolio post view
?>
<?php get_header(); ?>

<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
    <?php
        // Getting post's attachments
        $args = array(
            'post_type' => 'attachment',
            'numberposts' => -1,
            'post_status' => null,
            'post_parent' => $post->ID
        );
        $attachments = get_posts($args);
        if ($attachments) {
            $count = 1;
            $gallery = '';
            foreach ($attachments as $attachment) {
                $img_src = wp_get_attachment_image_src($attachment->ID, "portfolio-gallery");
                $img_src_full = wp_get_attachment_image_src($attachment->ID, "full");
                $gallery .= "<li". ($count == 1 ? ' class="active"' : '') ." id='job-image-". $attachment->ID ."'>"
                            . "<a href='" . $img_src_full[0] . "' title='View larger version'>"
                            . "<img src='" . $img_src[0] . "' alt='" . $attachment->post_content . "' />"
                            . "</a></li>";
                $count++;
            }
        }
        
        // Getting post's tags
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
        
        // Getting post's subcategories
        $categoriesIds = wp_get_post_categories( $post->ID );
        $count = 0;
        foreach($categoriesIds as $c){
            $cat = get_category($c);
            if($cat->parent != 0) {
                $parentId = $cat->parent;
                $parentCat = get_category($parentId);
                $cats[$count] = array( 'name' => $cat->name, 'slug' => $cat->slug, 'parent_slug' => $parentCat->slug );
                $count++;
            }
        }
    ?>

    <article id="post-<?php the_ID(); ?>" class="project group">
    
        <header>
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
        
        <hgroup>
            <h1 class="main-title"><a href="<?php the_permalink() ?>" title=" - <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

            <h2>
                <?php for($i = 0; $i < sizeOf($cats); $i++) { ?>
                    <a href="/category/<?= $cats[$i]['parent_slug'] ?>/<?= $cats[$i]['slug'] ?>">
                        <?= $cats[$i]['name']; ?></a><?php if($i != sizeOf($cats)-1) : echo ' &middot; '; endif; ?>
                <?php } ?>
            </h2>
        </hgroup>
        
        <div class="post-content group">
            <?php if(!empty($attachments)): ?>
                <section id="project-gallery">
                    <ul>
                        <?php echo $gallery; ?>
                    </ul>
                </section>
            <?php endif; ?>
            
            <section id="project-description">
                <?php the_content(); ?>
            </section>
            
            <?php get_template_part( 'social' ); ?>
        </div>
    </article>
<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>