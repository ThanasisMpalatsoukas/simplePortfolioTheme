<?php
/**
 *
 * Ajax is mainly used here to paginate the portfolio in the front-page
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>

<?php
add_action( 'wp_ajax_portfolioThemePagination','portfolioThemePagination' );
add_action( 'wp_ajax_nopriv_portfolioThemePagination' ,'portfolioThemePagination' );

add_action( 'wp_ajax_portfolioThemePaginationByCategory','portfolioThemePaginationByCategory' );
add_action( 'wp_ajax_nopriv_portfolioThemePaginationByCategory' ,'portfolioThemePaginationByCategory' );

add_action( 'wp_ajax_portfolioThemeSendEmail','portfolioThemeSendEmail' );
add_action( 'wp_ajax_nopriv_portfolioThemeSendEmail' ,'portfolioThemeSendEmail' );

/**
 *
 * Summary
 *
 * The pagination functionality, information here is sent from javascript.
 *
 * @since 1.0.0
 *
 * @global Int     $page        The current page we are on.
 * @global String  $category    The currrent category that the user has clicked on.
 * @global Int     $max         The max number of posts that exist within this category.
 **/
function portfolioThemePagination() {

  if ( isset( $_POST['page'] ) ):
    $page = intval( $_POST['page'] );
	endif;
  if ( isset( $_POST['category'] ) ) :
    $category = sanitize_text_field( wp_unslash($_POST['category']));
	endif;
  if ( isset( $_POST['max'] ) ) :
    $max = intval($_POST['max'] );
	endif;
  set_query_var( 'page' , $page );
  set_query_var( 'category' , $category );
  set_query_var( 'max' , $max );
  get_template_part( 'templateparts/portfolio/'  . get_option('content_portfolio_template')  );

  wp_die();
}

/**
 *
 * Summary
 *
 * The pagination functionality, information here is sent from javascript.
 *
 * @since 1.0.0
 *
 * @global Int     $page        The current page we are on.
 * @global String  $category    The currrent category that the user has clicked on.
 * @global Int     $max         The max number of posts that exist within this category.
 **/
function portfolioThemePaginationByCategory() {

	if ( isset( $_POST['category'] ) ) :
		$category = sanitize_text_field( wp_unslash($_POST['category']));
	endif;
	if ( isset( $_POST['max'] ) ) :
		$max = intval($_POST['max'] );
	endif;

  set_query_var( 'page' , 1 );
	set_query_var( 'category' , $category );
  set_query_var( 'max' , $max );
  get_template_part( 'templateparts/portfolio/' . get_option('content_portfolio_template') );

  wp_die();
}

/**
 *
 * Summary
 *
 * The pagination functionality, information here is sent from javascript.
 *
 * @since 1.0.0
 *
 * @global String  $name     .
 * @global String  $email   .
 * @global String  $message  .
 **/
function portfolioThemeSendEmail() {

	if ( isset( $_POST['name'] ) &&  $_POST['name']!=''  ) :
		$name = sanitize_text_field( wp_unslash($_POST['name']));
	else :
		return 1;
	endif;
	if ( isset( $_POST['message'] ) &&   strlen($_POST['message']) > 20 ) :
		$message = sanitize_text_field( wp_unslash( $_POST['message'] ) );
	else :
		return 2;
	endif;
	if ( isset( $_POST['email'] ) && filter_var( $_POST['email'] , FILTER_VALIDATE_EMAIL) ) :
		$email = sanitize_text_field( wp_unslash( $_POST['email'] ) );
	else:
		return 3;
	endif;

	$post_id = wp_insert_post(
									array(
											'post_title'  => $name,
											'post_date'   => $_SESSION['cal_startdate'],
											'post_content'=> $message,
											'post_type'   => 'messages',
											'post_status' => 'publish', /* Or "draft", if required */
											)
									);

	update_post_meta( $post_id, '_simple_email' , $email );


}
