<?php
/**
 * Includes all the custom function to make the front-end work and the theme support functions.
 *
 * @package simplePortfolio
 * @since simplePortfolio 1.1.1
 **/

?>

<?php

// All the checking for options and checkboxes to enable theme_support.
$options = get_option( 'post_formats' );

add_theme_support( 'post-thumbnails');

add_theme_support( 'title-tag' );

$formats = array( 'gallery', 'image','video' );
$output = array();
foreach ( $formats as $format ) {
  $output[] = ( isset( $options[$format] ) == 1 ? $format : '' );
}
if ( ! empty( $options ) ){
  add_theme_support( 'post-formats' ,  $output );
}

$header = get_option( 'custom_header' );

if (  isset( $header ) == 1 ) {
  add_theme_support( 'custom-header' );
}

$background = get_option( 'custom_background' );

if (  isset( $background ) == 1 ) {
  add_theme_support( 'custom-background' );
}

add_theme_support( 'automatic-feed-links' );


add_action( 'after_setup_theme', 'theme_review_setup' );

/**
 *
 * Summary
 *
 * Input different languages
 *
 * @since 1.3.0
 **/
function theme_review_setup(){
    load_theme_textdomain( 'simplePortfolio', get_template_directory() . '/languages' );
}

/**
 *
 * Summary
 *
 * Checks if the image options exists and echos the image, in other case it goes to the
 * img folder and takes an image from there
 *
 * @param String $image         the options value of the image we want to obtain.
 * @param String $replacement   the replacement of the image from the img folder in case the image doesnt exist.
 * @since 1.0.0
 **/
function getImage( $image , $replacement ){

  $image = get_option( $image );

  if( isset( $image ) ) {
    echo esc_html($image);
		return 0;
  }
  else{
    return 1;
  }
}

/**
 *
 * Summary
 *
 * Checks if the image options exists and echos the image, in other case it goes to the
 * img folder and takes an image from there
 *
 * @param Array $type .
 * @since 1.3.2
 **/
function get_embedded_media( $type = array() ){
	$content = do_shortcode( apply_filters( 'the_content', get_the_content_outside_of_loop() ) );
	$embed = get_media_embedded_in_content( $content, $type );

	if( in_array( 'audio' , $type) ):
		$output = str_replace( '?visual=true', '?visual=false', $embed[0] );
	else:
		$output = $embed[0];
	endif;

	return $output;
}

/**
 *
 * Summary
 *
 * Registerin the sidebars
 *
 * @since 1.0.0
 **/
function wpdocs_theme_slug_widgets_init() {

    register_sidebar( array(
        'name'          => __( 'Blog sidebar', 'simplePortfolio' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts in the blog area.', 'simplePortfolio' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact form', 'simplePortfolio' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'This is where you will copy the shortcode for the contact form.', 'simplePortfolio' ),
        'before_widget' => '<li id="sidebar-2" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Skillbar section', 'simplePortfolio' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Insert the skillbar of the theme here.', 'simplePortfolio' ),
        'before_widget' => '<li id="sidebar-3" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Services section', 'simplePortfolio' ),
        'id'            => 'sidebar-4',
        'description'   => __( 'Insert the services here.', 'simplePortfolio' ),
        'before_widget' => '<li id="sidebar-4" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}

/**
 *
 * Summary
 *
 * Getting the sidebars widget data.
 *
 * @param String $sidebar_id .
 * @return Html $output .
 * @since 1.0.0
 **/
function rh_get_widget_data_for( $sidebar_id ) {

    global $wp_registered_sidebars, $wp_registered_widgets;
    $output = array();
    $sidebars_widgets = wp_get_sidebars_widgets();
    $widget_ids = $sidebars_widgets[ $sidebar_id ];
    if ( ! $widget_ids ) {
        return array();
    }
    foreach ( $widget_ids as $id ) {
        $option_name = $wp_registered_widgets[ $id ]['callback'][0]->option_name;
        $key = $wp_registered_widgets[ $id ]['params'][0]['number'];
        $widget_data = get_option( $option_name );
        $output[] = (object) $widget_data[ $key ];
    }
    return $output;
}

add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );


/**
 *
 * Summary
 *
 * Getting the template to show the latest posts.
 *
 * @since 1.0.0
 **/
function the_latest_posts(){
  get_template_part( 'inc/templates/theme-support-templates/latest-posts' );
}

/**
 *
 * Summary
 *
 * Getting the template to show the testimonials.
 *
 * @param Int $current The current post.
 * @since 1.0.0
 **/
function testimonialsTemplate( $current ) {
  set_query_var( 'current', $current );
  get_template_part( 'inc/templates/portfolioThemeTestimonials' );
}

/**
 *
 * Summary
 *
 * Getting the template to show the portfolio posts.
 *
 * @param Int $current    The current post.
 * @param Int $totalPosts The total number of post.
 * @since 1.0.0
 **/
function portfolioTemplate( $current,$totalPosts ) {
  set_query_var( 'current', $current );
  set_query_var( 'totalPosts', $totalPosts );
  get_template_part( 'inc/templates/portfolioThemePortfolio' );
}

// Added just because of the requirements of the theme.
get_avatar( get_option( 'email' ) );

if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

add_filter( 'post_class', 'remove_blog_function', 20 );

/**
 *
 * Summary
 *
 * Removing the blog class from the post_class .
 *
 * @param array $classes {
 *     An array of arguments.
 *
 *     @type String $key .
 * }
 * @return array $classes .
 * @since 1.0.0
 **/
function remove_blog_function( $classes ) {

    if ( ( $key = array_search( 'blog', $classes ) ) !== false )
        unset( $classes[ $key ] );
    return $classes;
}

/**
 *
 * Summary
 *
 * Getting the template for the image format in the custom post type blog.
 *
 * @since 1.0.0
 **/
function the_image_blog_template() {

  $images = get_the_gallery_format();
  $max = count( $images[1] );
  set_query_var( 'max',$max );
  set_query_var( 'images',$images[1] );
  set_query_var( 'amount',count( $images[1] ) );
  if ( $max%5 == 0 ) {
    get_template_part( 'inc/templates/content-blog-gallery/dividedByFive' );
  }
  else if ( $max%4 == 0 || $max == 2 ) {
    get_template_part('inc/templates/content-blog-gallery/dividedByFour');
  }
  else if ( $max%3 == 0 ) {
    get_template_part('inc/templates/content-blog-gallery/dividedByThree');
  }
}

/**
 *
 * Summary
 *
 * Getting the template for the custom post type blog in the front-page.php .
 *
 * @since 1.0.0
 **/
function showcaseBlog() {
    get_template_part( 'inc/templates/content-blog-gallery/portfolioThemeShowcaseBlog' );
}

/**
 *
 * Summary
 *
 * Getting the content of a specific post outside of the loop.
 *
 * @since 1.0.0
 **/
function the_content_outside_of_loop() {

  global $wp_query;
  $post = $wp_query->post;
  $page_id = $post->ID;
  $page_object = get_page( $page_id );
  $page_content = $page_object->post_content;
  $page_content = apply_filters( 'the_content', $page_content );
  echo $page_content;
}

/**
 *
 * Summary
 *
 * Getting the template for the image format in the custom post type blog.
 *
 * @return Html $page_content .
 * @since 1.0.0
 **/
function get_the_content_outside_of_loop() {

  global $wp_query;
  $post = $wp_query->post;
  $page_id = $post->ID;
  $page_object = get_page( $page_id );
  $page_content = $page_object->post_content;
  $page_content = apply_filters( 'the_content', $page_content) ;
  return $page_content;
}

/**
 *
 * Summary
 *
 * Getting the excerpt with our own limit on letters.
 *
 * @param Int $limit The number of letters we want the excerpt to output.
 * @return Html $excerpt .
 * @since 1.0.0
 **/
function excerpt($limit) {

  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count( $excerpt ) >= $limit) {
    array_pop( $excerpt );
    $excerpt = implode( " ",$excerpt ) . '...';
  } else {
    $excerpt = implode( " ",$excerpt );
  }
  $excerpt = preg_replace( '`[[^]]*]`','',$excerpt );
  return $excerpt;
}

/**
 *
 * Summary
 *
 * Getting the template for the show_attachment_images .
 *
 * @param String $template .
 * @since 1.0.0
 **/
function show_attachment_images( $template ){

   set_query_var( 'template',$template );
   get_template_part( 'inc/templates/theme-support-templates/show-attachment-images' );

}

/**
 *
 * Summary
 *
 * Returning the images of the current post.
 *
 * @return array $images .
 * @since 1.0.0
 **/
function get_the_gallery_format() {
  $content = get_the_content_outside_of_loop();
  preg_match_all( "/<img\s[^>]*?src\s*=\s*['\"]([^'\"]*?)['\"][^>]*?>/", $content, $images );
  return $images;
}

/**
 *
 * Summary
 *
 * Deleting certain widgets not compatitable with the theme .
 *
 * @since 1.0.0
 **/
function unregister_default_wp_widgets() {

  unregister_widget( 'WP_Widget_Search' );
  unregister_widget( 'WP_Widget_Recent_Posts' );

}

add_action( 'widgets_init', 'unregister_default_wp_widgets', 1 );


/**
 *
 * Summary
 *
 * Retrieving the term id using the term name.
 *
 * @param Int    $post_id     the current post id.
 * @param String $taxonomy    the taxonomy we want to get the term from.
 * @param String $given_term  the name of the term we want to get the id from.
 * @param String $action      the action we want to perform.
 * @since 1.0.0
 **/
function get_the_term_names( $post_id , $taxonomy , $given_term , $action ) {

  if ( 'id' == $action ){

    $terms = get_the_terms( $post_id, $taxonomy);
    if( is_array( $terms ) ):
      foreach ( $terms as $term ) {
        if( $term->name == $given_term ){
          $the_term = $term->term_id;
        }
      }
    endif;

    if( isset( $the_term ) ){
      return $the_term;
		}
  }

}

/**
 *
 * Summary
 *
 * Creates the link for the "last" portfolio post
 *
 * @param Int    $post_id        The id of the current post.
 * @param String $taxonomy       Depending on if the current post is currently watching a post which is within a taxonomy, taxonomy will have  a value.
 * @param String $given_term     Essentially the category which the post we view is into.
 * @since 1.0.0
 **/
function get_last_link_of_portfolio( $post_id , $taxonomy , $given_term ) {


  $all_terms = get_the_term_names( $post_id , $taxonomy, $given_term  , 'id' );

  if( $given_term == 'All' ){
    $args = [
      'post_type' => 'portfolio',
    ];
  }
  else{
    $args = [
      'post_type' => 'portfolio',
      'tax_query' => [
          [
              'taxonomy' => $taxonomy,
              'terms' => $all_terms,
              'include_children' => false
            ],
        ],
    ];
  }

  $i = 0;
  $state = false;
	$offset = 0;
  $loop = new WP_Query( $args );

  if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();

    // If the post_id that we passed here is equal to the id that we are currently looping through set the offset to the current post and the state to true.
    if ( $post_id == get_the_ID() ) {
      $offset = $i;
      $state = true;
    }

    // This if statement has the purpose of capturing the title before the current post.
    // If the first post is the current post we are watching then  title and permalink will be not defined so there is no last page.
    if ( ! $state ){
        $title = get_the_title();
        $permalink = get_the_permalink();
    }

  $i++;

  endwhile;

  endif;

  // If we are not in the first page echo the template for the last post.
  if ( $offset != 0  ) {
      set_query_var( 'permalink',$permalink );
      get_template_part( 'inc/templates/portfolioThemeLastPost' );
  }

  wp_reset_postdata();

}

/**
 *
 * Summary
 *
 * Creates the link for the "last" portfolio post
 *
 * @param Int    $post_id        The id of the current post.
 * @param String $taxonomy       Depending on if the current post is currently watching a post which is within a taxonomy, taxonomy will have  a value.
 * @param String $given_term     Essentially the category which the post we view is into.
 * @since 1.0.0
 **/
function get_next_link_of_portfolio( $post_id , $taxonomy , $given_term ) {

  $all_terms = get_the_term_names( $post_id , $taxonomy , $given_term , 'id' );

  if ( $given_term == 'All'){
    $args = [
      'post_type' => 'portfolio',

    ];
  }
  else{
    $args = [
      'post_type' => 'portfolio',
      'tax_query' => [
          [
              'taxonomy' => $taxonomy,
              'terms' => $all_terms,
              'include_children' => false
            ],
        ],

    ];
  }

  $i = 1;

  $loop = new WP_Query( $args );

  if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();



  if ( $post_id == get_the_ID() ) {
    $offset = $i;
  }

  if( isset( $offset ) && $offset < $loop->post_count && $i == $offset + 1 ) {
    $title = get_the_title();
    $permalink = get_the_permalink();
  }

  $i++;

  endwhile;

  endif;


  // Max is the number of posts that exist here.
  // Offset is the number of posts we have cycled trhough.
  // If offset < max it means there is another page.
  // If offset == 0 it means we are at the first page.
  $max = $i - 1;

  if ( $offset < $max ) {
      set_query_var( 'permalink',$permalink );
      get_template_part( 'inc/templates/portfolioThemeNextPost' );
  }

  wp_reset_postdata();

}

/**
 *
 * Summary
 *
 * Creates the template for the portfolio details .
 *
 * @param String $value .
 * @param Int    $post_id .
 * @since 1.0.0
 **/
function get_standard_portfolio_details( $value,$post_id ) {

  set_query_var( 'value' , $value );
  set_query_var( 'post_id' , $post_id );
  get_template_part( 'inc/templates/portfolioThemeDetailsStandard' );

}

/**
 *
 * Summary
 *
 * Creates the template for the portfolio details on the side image template.
 *
 * @param String $value .
 * @param Int    $post_id .
 * @since 1.0.0
 **/
function get_side_image_portfolio_details( $value,$post_id ) {

  set_query_var( 'value',$value );
  set_query_var( 'post_id',$post_id );
  get_template_part( 'inc/templates/portfolioThemeDetailsSideImage' );

}
