<?php
/**
 *
 *  The template for the videos in blog posts.
 *
 *  @package perfectPortfolio
 *  @since 1.0.0
 **/

?>

<div id="post-<?php the_ID(); ?>" <?php post_class("blog-content-video blog-content"); ?>>

  <div class="mainImage background-image">
    <?php echo get_embedded_media( array('video','iframe') ); ?>
  </div>

  <div class="main-content"><?php

  $content = stripFromAttachments_filter(get_the_content_outside_of_loop() , 'video');
	echo $content;
	
  ?></div>


</div><!-- .blog-content-default -->

<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
