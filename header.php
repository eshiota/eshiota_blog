<?php
/**
 * @package WordPress
 * @subpackage eshiota_reloaded
 */
?>

<!DOCTYPE html>

<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6 orn<?= rand(1,4); ?>"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7 orn<?= rand(1,4); ?>"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8 orn<?= rand(1,4); ?>"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="no-js ie9 orn<?= rand(1,4); ?>"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js orn<?= rand(1,4); ?>"> <!--<![endif]-->

<head profile="http://gmpg.org/xfn/11">
  <meta charset="UTF-8" />

  <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

  <link rel="stylesheet" media="screen" href="<?php bloginfo('stylesheet_url'); ?>"/>
  
  <script src="http://use.typekit.com/hko1pkc.js"></script>
  <script>try{Typekit.load();}catch(e){}</script>
  
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
</head>

<body <?php body_class($cat); ?>>

<header class="group">
  <h1><a href="<?php bloginfo('url'); ?>/" title="<?php _e("Go back to Home page", "eshiota"); ?>"><?php bloginfo('name'); ?></a></h1>
  
  <nav>
    <h2><?php _e("Navigation", "eshiota"); ?></h2>
    
    <ul class="group">
      <li class="about">
        <a href="<?php bloginfo('url') ?>/about" title="<?php _e("Read more about me", "eshiota"); ?>"><?php _e("About", "eshiota"); ?></a>
      </li>
      <li class="blog">
        <a href="<?php bloginfo('url') ?>/blog" title="<?php _e("Read my articles, quotes and rants", "eshiota"); ?>">Blog</a>
      </li>
      <li class="tutorials">
        <a href="<?php bloginfo('url') ?>/tutorials" title="<?php _e("View my tutorials about design and development", "eshiota"); ?>"><?php _e("Tutorials", "eshiota"); ?></a>
      </li>
      <li class="portfolio">
        <a href="<?php bloginfo('url') ?>/portfolio" title="<?php _e("View my works and projects", "eshiota"); ?>">Portfolio</a>
      </li>
    </ul>
  </nav>
</header>

<!-- end header.php -->