<?php
/**
 * @package WordPress
 * @subpackage eshiota_reloaded
 */
?>
<!-- begin footer -->

<footer>
  
  <aside class="info">
    <h4 class="contact"><?php _e("Find me on Interwebz", "eshiota"); ?></h4>
    
    <address>
      <ul>
        <li><a href="mailto:contato@eshiota.com" title="<?php _e("Open default e-mail client and send me a message", "eshiota"); ?>">contato@eshiota.com</a></li>
        <li><a href="http://www.twitter.com/shiota/" title="<?php _e("Visit my Twitter page", "eshiota"); ?>">twitter.com/shiota</a></li>
        <li><a href="http://github.com/eshiota" title="<?php _e("Visit my Github page", "eshiota"); ?>">github.com/eshiota</a></li>
        <li><a href="http://br.linkedin.com/in/eshiota" title="<?php _e("Visit my Linkedin page", "eshiota"); ?>">Linkedin</a></li>
      </ul>
    </address>
    
    <h4 class="feeds">Feeds</h4>
    
    <ul>
      <li><a href="<?php bloginfo('atom_url'); ?>" title="<?php _e("Open site feed", "eshiota"); ?>"><?php _e("All site entries", "eshiota"); ?></a></li>
      <li><a href="<?php bloginfo('url'); ?>/category/blog/feed/atom" title="<?php _e("Open blog feed", "eshiota"); ?>">Blog</a></li>
      <li><a href="<?php bloginfo('url'); ?>/category/tutorials/feed/atom" title="<?php _e("Open tutorial feed", "eshiota"); ?>"><?php _e("Tutorials", "eshiota"); ?></a></li>
      <li><a href="<?php bloginfo('url'); ?>/category/portfolio/feed/atom" title="<?php _e("Open portfolio feed", "eshiota"); ?>">Portfolio</a></li>
      <li><a href="http://api.flickr.com/services/feeds/photos_public.gne?id=29353094@N07&amp;lang=en-us&amp;format=rss_200" title="<?php _e("Open flickr feed", "eshiota"); ?>">Flickr</a></li>
    </ul>
  </aside>
  
  <aside class="flickr">
    <h4><?php _e("Sights on Flickr", "eshiota"); ?></h4>
    <div id="flicks" class="photo-list">
      <p><?php _e("Loading photos...", "eshiota"); ?></p>
    </div>
  </aside>
  
  <aside class="instagram">
    <h4><?php _e("Instagramming", "eshiota"); ?></h4>
    <div id="instagram" class="photo-list">
      <p><?php _e("Loading photos...", "eshiota"); ?></p>
    </div>
  </aside>
  
  <aside class="colophon">
    <h4>Colophon</h4>
    
    <p><?php _e("No animals were harmed during the development of this site.", "eshiota"); ?></p>
  </aside>
  
</footer>

<?php wp_footer(); ?>

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
<script>window.jQuery || document.write('<script src="<?php bloginfo('stylesheet_directory') ?>/vendors/jquery/jquery-1.6.1.min.js">\x3C/script>')</script>

<script src="<?php bloginfo('stylesheet_directory'); ?>/vendors/jquery/jquery.fittext.js"></script>

<script src="<?php bloginfo('stylesheet_directory'); ?>/javascripts/functions.js"></script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18002060-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>