<?php
/**
 * Enqueing all the files needed for the theme.
 *
 * @package simplePortfolio
 * @since simplePortfolio 1.1.1
 **/

?>
<?php

/**
 *
 * Summary
 *
 * Register the admin javascript and css files.
 *
 * @param String $hook .
 * @since 1.0.0
 **/
function simplePortfolio_enqueue_files( $hook ) {

  if ( $hook == 'toplevel_page_portfolio_theme' ) {

    wp_register_style( 'portfolio_admin' , get_template_directory_uri() . '/css/portfolio.admin.css', array(), '1.0.0' , 'all' );
    wp_enqueue_style( 'portfolio_admin' );


  }

  wp_enqueue_media();

  wp_register_script( 'simplePortfolio-admin-script' , get_template_directory_uri() . '/js/simplePortfolio.admin.js' , array('jquery') , '1.0.0' , true );
  wp_enqueue_script( 'simplePortfolio-admin-script' );


}

add_action( 'admin_enqueue_scripts' , 'simplePortfolio_enqueue_files' );

/**
 *
 * Summary
 *
 * Register the front-end javascript and css files.
 *
 * @since 1.0.0
 **/
function simplePortfolio_enqueue_files_frontEnd() {

  wp_enqueue_style( 'bootstrap',get_template_directory_uri() . '/css/bootstrap.css' , '4.1.1' , 'all' );

  wp_enqueue_style( 'simplePortfolio',get_template_directory_uri() . '/css/simplePortfolio.css' , '1.0.0' , 'all' );

  wp_enqueue_script( 'boostrap' , get_template_directory_uri() . '/js/bootstrap.js' , array('jquery') , '4.1.1' , true) ;

  wp_register_script( 'simplePortfolioportfolio' , get_template_directory_uri() . '/js/simplePortfolio-portfolios.js' , array('jquery') , '4.1.1' , true );

  wp_enqueue_script( 'simplePortfolioportfolio');

  wp_register_script( 'simplePortfolioBlog' , get_template_directory_uri() . '/js/simplePortfolioSingleBlog.js' , '4.1.1' , true );

  wp_enqueue_script( 'simplePortfolioBlog' );

  if ( is_front_page() || is_page_template('CustomPageT2' ) ) {
      wp_enqueue_script( 'simplePortfolio' , get_template_directory_uri() . '/js/simplePortfolio.js' , array('jquery') , '4.1.1' , true );

      wp_localize_script(
    		'simplePortfolio',
    		'urlforajax',
    		array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    	);
  }

}

/**
 *
 * Summary
 *
 * Register the comment-reply javastript file.
 *
 * @since 1.0.0
 **/
function wpse218049_enqueue_comments_reply() {

    if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        wp_enqueue_script( 'comment-reply', 'wp-includes/js/comment-reply', array(), false, true );
    }
}
add_action( 'wp_enqueue_scripts', 'wpse218049_enqueue_comments_reply' );

add_action( 'wp_enqueue_scripts' , 'simplePortfolio_enqueue_files_frontEnd' );
