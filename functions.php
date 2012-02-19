<?php
/**
 * @package WordPress
 * @subpackage eshiota_reloaded
 */

automatic_feed_links();

add_theme_support('post-thumbnails');

add_image_size('portfolio-thumb', 384, 288, true);
add_image_size('portfolio-gallery', 640, 400, true);
    
add_filter('single_template', create_function('$t', 'foreach( (array) get_the_category() as $cat ) { if ( file_exists(TEMPLATEPATH . "/single-{$cat->category_nicename}.php") ) return TEMPLATEPATH . "/single-{$cat->category_nicename}.php"; } return $t;' ));

add_filter('img_caption_shortcode', 'my_img_caption_shortcode_filter', 10, 3);

/**
 * Filter to replace the [caption] shortcode text with HTML5 compliant code
 *
 * @return text HTML content describing embedded figure
 **/
function my_img_caption_shortcode_filter ($val, $attr, $content = null) {
  $capid = '';
  
  extract(shortcode_atts(array(
          'id'    => '',
          'align' => '',
          'width' => '',
          'caption' => ''
  ), $attr));
  
  if (empty($caption)) {
    return $val;
  }
  
  if ($id) {
    $id = esc_attr($id);
    $capid = 'id="figcaption_'. $id . '" ';
    $id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
  }

  return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '">'
         . do_shortcode( $content ) . '<figcaption ' . $capid 
         . 'class="wp-caption-text">' . $caption . '</figcaption></figure>';
}

function curPageURL () {
  $pageURL = 'http';
    
  //check what if its secure or not
  if ($_SERVER["HTTPS"] == "on") {
    $pageURL .= "s";
  }
  
  //add the protocol
  $pageURL .= "://";
  
  //check what port we are on
  if ($_SERVER["SERVER_PORT"] != "80") {
    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
  } else {
    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  }
  
  //cut off everything on the URL except the last 3 characters
  $urlEnd = substr($pageURL, -3);
  
  //strip off the two forward shashes
  $page = str_replace("/", "", $urlEnd);
  
  //return just the number
  return $page;
}

function tagNameToID () {
  $arr = array();
  
  foreach (get_the_tags() as $tag) {
    $arr[$tag->name] = $tag->term_id;
  }
  
  return $arr;
}

function buildTagIDList ($names) {
  $tags = explode(',', $names);
  $list = '';
  $test = get_the_tags();

  foreach (get_the_tags() as $tag) {
    if (in_array($tag->name, $tags)) {
      $list .= $tag->term_id.',';
    }
  }
  
  if ($list[strlen($list)-1] == ',') {
    $list = substr($list, 0, strlen($list)-1);
  }
  
  return $list;
}

function eshiota_comment ($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; 
?>
    
  <li <?php comment_class('group'); ?> id="comment-<?php comment_ID() ?>">
    <article>
      <footer class="group">
        <figure class="comment-avatar">
          <?php if (get_comment_author_url() != "") : ?>
            <a href="<?= get_comment_author_url(); ?>" title="<?php _e('Visit this author\'s website', 'eshiota'); ?>" rel="external nofollow">
              <?= get_avatar($comment->comment_author_email, $size = '50', $default = '' ); ?>
            </a>
          <?php else: ?>
            <?= get_avatar($comment->comment_author_email, $size = '50', $default = '' ); ?>
          <?php endif; ?>
        </figure>
        
        <p class="meta">
          <?php comment_author_link() ?><br />
          <time datetime="<?php comment_date('c') ?>"><?php comment_date('d.m.y @ H:i') ?></time>
        </p>
        
        <p class="reply">
          <?php comment_reply_link(array_merge(
                                   $args,
                                   array('reply_text' => '[reply]',
                                         'depth' => $depth,
                                         'max_depth' => $args['max_depth']
                                   ))
                ) 
          ?>
        </p>
      </footer>
      
      <?php comment_text() ?>
    
      <?php if ($comment->comment_approved == '0') : ?>
        <p class="comment-moderation"><em><?php _e('Your comment is awaiting moderation.', 'eshiota'); ?></em></p>
      <?php endif; ?>
    </article>
<?php
}

function fb_likebt ($url, $ref = 'default') {
  echo '<iframe src="http://www.facebook.com/plugins/like.php?href='.$url.'&amp;layout=button_count&amp;show_faces=false&amp;width=88&amp;action=like&amp;font=trebuchet+ms&amp;colorscheme=light&amp;ref='.$ref.'" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width: 80px; height:20px;"></iframe>';
}

function tw_tweetbt ($url, $text, $lang, $via) {
  echo '<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
  <div>
    <a href="http://twitter.com/share" class="twitter-share-button"
      data-url="'.$url.'"
      data-via="'.$via.'"
      data-text="'.$text.'"
      data-counturl="'.$url.'"
      data-lang="'.$lang.'"
      data-count="none">Tweet</a>
  </div>';
}

?>