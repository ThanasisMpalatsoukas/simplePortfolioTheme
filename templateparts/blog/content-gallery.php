<?php
/**
 *
 *  The template for the gallery in blog posts.
 *
 *  @package perfectPortfolio
 *  @since 1.0.0
 **/

?>

<div id="post-<?php the_ID(); ?>" <?php post_class("blog-content-gallery blog-content"); ?>>

  <?php show_attachment_images('content-gallery'); ?>

  <div class="gallery-container" data-time="6" >

    <div class="image0 blog-gallery background-image active"  style="background-image:url('<?php echo esc_attr(get_template_directory_uri() . '/img/w1.jpg'); ?>');">

    </div>
    <div class="image1 blog-gallery background-image"  style="background-image:url('<?php echo esc_attr(get_template_directory_uri() . '/img/w2.jpg'); ?>');">

    </div>
    <div class="image2 blog-gallery background-image"  style="background-image:url('<?php echo esc_attr(get_template_directory_uri() . '/img/w3.jpg'); ?>');">

    </div>

  </div>

  <div class="main-content"><?php

  stripFromAttachments_filter(get_the_content_outside_of_loop() , 'image');

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
