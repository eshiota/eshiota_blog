<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>

<h2 id="comments"><?php _e('Comments', 'eshiota'); ?> (<?php comments_number('0', '1', '%'); ?>)</h2>

<div class="post-comments-content">
    <?php if ( have_comments() ) : ?>
        <ol id="commentlist">
            <?php wp_list_comments('type=comment&callback=eshiota_comment&style=ol'); ?>
        </ol>
    <?php else : // If there are no comments yet ?>
        <p class="empty"><?php _e('There are no comments on this post. Be the first!', 'eshiota'); ?></p>
    <?php endif; ?>

    <?php if ( comments_open() ) : ?>
        <div id="respond">
            <h3 id="postcomment"><?php comment_form_title("What are your thoughts?", 'Reply to %s' ); ?></h3>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" novalidate>
                <p>
                    <label for="author"><?php _e('Name (mandatory)', 'eshiota'); ?></label>
                    <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" />
                </p>

                <p>
                    <label for="email"><?php _e('Email (will not be published)', 'eshiota'); ?></label>
                    <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2"  />
                </p>

                <p>
                    <label for="url">Website</label>
                    <input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
                </p>

                <p>
                    <label for="comment"><?php _e('Comment', 'eshiota'); ?></label>
                    <textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
                </p>

                <p class="submit">
                    <input name="submit" type="submit" id="submit" class="submit-bt" tabindex="5" value="<?php esc_attr_e('Submit comment'); ?>" />
                    <?php comment_id_fields(); ?>
                </p>
        
                <?php do_action('comment_form', $post->ID); ?>
            </form>
        </div>
    <?php else : // Comments are closed ?>
        <p><?php _e('This post is closed for comments.', 'eshiota'); ?></p>
    <?php endif; ?>
</div>