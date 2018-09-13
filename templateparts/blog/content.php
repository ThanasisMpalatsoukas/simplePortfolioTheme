<?php
/**
 *
 *  The template for the standard in blog posts.
 *
 *  @package perfectPortfolio
 *  @since 1.0.0
 **/

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('blog-content-default blog-content'); ?>>

  <div class="mainImage background-image" style="background-image:url('<?php echo esc_html(get_the_post_thumbnail_url()); ?>');">

  </div>

  <div class="main-content"><?php

  the_content_outside_of_loop();
  echo get_the_term_list( get_the_ID(), 'tag', '<p class="post-tags">Tags:', '', '</p>' );
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
