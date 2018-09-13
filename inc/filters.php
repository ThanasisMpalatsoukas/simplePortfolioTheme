<?php
/**
 * Custom filters for the theme.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>

<?php

/**
 *
 * Summary
 *
 * Striping content from images and videos.
 *
 * @param Html   $content   The content of the current post.
 * @param String $type      The type of content we want to strip.
 *
 * @since 1.0.0
 **/
function stripFromAttachments_filter( $content , $type ) {

  if ( $type == 'image' ) {

    $content = preg_replace( "/<img\s[^>]*?src\s*=\s*['\"]([^'\"]*?)['\"][^>]*?>/i", " ", $content );
    $content = apply_filters( 'the_content', $content );
    $content = str_replace( ']]>', ']]>', $content);
    echo $content;

  }

  if ($type == 'video') {
    $content = preg_replace( "/(?:<iframe[^>]*)(?:(?:\/>)|(?:>.*?<\/iframe>))/i", " ", $content );
    $content = apply_filters( 'the_content', $content );
    $content = str_replace( ']]>', ']]>', $content );
    return $content;
  }

}
