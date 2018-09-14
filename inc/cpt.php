<?php
/**
 * Custom Header functionality for Twenty Fifteen
 *
 * @package perfectPortfolio
 * @since 1.1.1
 **/

?>

<?php

add_action( 'admin_menu','remove_default_post_type' );

/**
 *
 * Summary
 *
 * Removes the edit function in the front end .
 *
 * @since 1.0.0
 **/
function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

/**
 *
 * Summary
 *
 * Adds the metaboxes and the save functions for them .
 *
 * @since 1.0.0
 **/
function portfolioTheme_cpt() {
  add_action( 'add_meta_boxes' , 'portfolioTheme_portfolio_add_meta_box' );
  add_action( 'save_post' , 'portfolioTheme_save_background' );
  add_action( 'add_meta_boxes' , 'portfolioTheme_choices_add_meta_box' );
  add_action( 'save_post' , 'portfolioTheme_save_choices' );
	add_action(	'add_meta_boxes' , 'portfolioTheme_messages_add_meta_box');
}


add_filter( 'enter_title_here', 'wpb_change_title_text' );

/**
 *
 * Summary
 *
 * Callback function from the add filter above .
 *
 * @since 1.0.0
 *
 * @param  Int $title   Is getting passed from the add filter on line 47 .
 **/
function wpb_change_title_text( $title ) {
     $screen = get_current_screen();

     if  ( 'testimonials' == $screen->post_type ) {
          $title = esc_html_e( 'Enter the name of the person here and his words below' , 'simplePortfolio' );
     }

     if ( 'portfolio' == $screen->post_type ) {
          $title = esc_html_e( 'Enter the jobs title here and the description below' , 'simplePortfolio' );
     }

     return $title;
}

add_filter( 'enter_title_here', 'wpb_change_title_text' );


add_action( 'init', 'portfolioTheme_cpt' );

/**
 *
 * Summary
 *
 * Adds the Header metabox .
 *
 * @since 1.0.0
 **/
function portfolioTheme_portfolio_add_meta_box() {
  add_meta_box( 'background_image' , esc_html( 'Header' , 'simplePortfolio' ) , 'portfolioTheme_project_background_callback','portfolio' );
}

/**
 *
 * Summary
 *
 * Adds the Email metabox .
 *
 * @since 1.0.0
 **/
function portfolioTheme_messages_add_meta_box(){
	add_meta_box( 'email' , esc_html( 'Email' , 'simplePortfolio' ) , 'portfolioTheme_email_callback','messages' );
}

/**
 *
 * Summary
 *
 * Adds the Choose details metabox .
 *
 * @since 1.0.0
 **/
function portfolioTheme_choices_add_meta_box() {
  add_meta_box( 'portfolio_choices' , esc_html( 'Choose the details' , 'simplePortfolio' ) , 'portfolioTheme_project_choices_callback','portfolio' );
}


/**
 *
 * Summary
 *
 * Creates the front-end for the Choose the details metabox .
 *
 * @since 1.0.0
 *
 * @param Object $post  .
 **/
function portfolioTheme_project_choices_callback( $post ) {

  wp_nonce_field( 'portfolioTheme_save_choices','portfolioTheme_choices_meta_box_nonce' );

  $value = get_post_meta( $post->ID , '_choices_amount' , true );

  if ( !isset( $value ) || $value < 0 ) {
    $value = 0;
    $output = '';
  }
  else{
    set_query_var( 'value',$value );
    get_template_part( 'inc/templates/theme-support-templates/metabox-choices' );
  }
}

/**
 *
 * Summary
 *
 * Creates the front-end for the email metabox .
 *
 * @since 1.3.3
 *
 * @param Object $post  .
 **/
function portfolioTheme_email_callback( $post ) {

  add_post_meta( $post->ID , '_simple_email', true );

}

/**
 *
 * Summary
 *
 * Callback function used to save the Choose the details metabox information .
 *
 * @since 1.0.0
 *
 * @param Int $post_id  .
 **/
function portfolioTheme_save_choices( $post_id ) {

    if ( isset( $_POST['counting-elements-field'] ) ):
        $my_data = intval( $_POST['counting-elements-field'] );
    else:
        $my_data = 0;
    endif;
    update_post_meta( $post_id , '_choices_amount' , $my_data );
    for( $i = 0;$i < $my_data; $i++ ) {

      if ( isset( $_POST['answer' . $i] ) ):

        $my_data_more = sanitize_text_field( wp_unslash( $_POST[ 'answer' . $i ] ) );
        update_post_meta( $post_id , '_choices_answer' . $i , $my_data_more );

      endif;

      if ( isset( $_POST['number' . $i] ) ):

        $my_data_more = sanitize_text_field( wp_unslash( $_POST[ 'number' . $i ] ) );
        update_post_meta( $post_id , '_choices_number' . $i , $my_data_more );

      endif;
    }
}

/**
 *
 * Summary
 *
 * Creates the front-end for the Headers metabox .
 *
 * @since 1.0.0
 *
 * @param Object $post  .
 **/
function portfolioTheme_project_background_callback( $post ) {

  global $post;
  $id = $post->id;
  wp_nonce_field( 'portfolioTheme_save_background','portfolioTheme_background_meta_box_nonce' );

  $value = get_post_meta( $post->ID , '_background_image_value_key' , true );

  if ( $value=='' ) {
    $value = get_template_directory_uri() . '/img/default-portfolio . jpeg';
  }

  $term = get_page_template_slug( $id );
  if ( $term == 'custome-page-t1.php' || $term == 'custome-page-t2.php' ) {
    $text = esc_html_e( 'This is disabled for this template' , 'simplePortfolio' );
    $disabled = 'disabled';
  }
  else{
    $text = esc_html_e( 'background image: big images are preffered ( 1800px min )' , 'simplePortfolio' );
    $disabled = '';
  }

  echo '<label for="portfolioTheme_background_image_field">' . esc_html( $text ) . '</label><br><br>';

  echo '<input type="button" style="" id="portfolioTheme_background_image_click" class="button button-secondary" value="insert image" ' . esc_html( $disabled ) . '/>
  <input type="button" style="" id="portfolioTheme_background_image_remove" class="button button-primary" value="reset image" ' . esc_html( $disabled ) . '/>
  <input type="hidden" id="portfolioTheme_background_image_field" name="portfolioTheme_background_image_field" value="' . esc_attr( $value ) . '" />';

  echo '<img src="' . esc_attr( $value ) . '" id="portfolioTheme_background_image_placeholder" height="200" width="200" style="margin:25px;margin-left:20%;" /><br><br>';

  wp_nonce_field( 'portfolioTheme_save_secondary_text','portfolioTheme_secondary_text_meta_box_nonce' );

  $value = get_post_meta( $post->ID , '_secondary_text_value_key' , true );

  if ( $value=='' ) {
    $value = 'This is the small excerpt where you will say something';
  }

  echo '<label for="portfolioTheme_secondary_text_field">Secondary text</label><br><br>';
  echo '<textarea type="text" id="portfolioTheme_secondary_text_field" name="portfolioTheme_secondary_text_field" cols="70" rows="2" value="' . esc_attr( $value ) . '" >' . esc_html( $value ) . '</textarea>';

}



/**
 *
 * Summary
 *
 * The callback function for the saving proccess of the Headers matebox .
 *
 * @since 1.0.0
 *
 * @param Int $post_id  .
 **/
function portfolioTheme_save_background( $post_id ) {

  if ( isset( $_POST['portfolioTheme_background_meta_box_nonce'] ) && isset( $_POST['portfolioTheme_background_image_field'] ) && isset( $_POST['portfolioTheme_secondary_text_meta_box_nonce'] ) && isset( $_POST['portfolioTheme_secondary_text_field'] ) ):

    $check1 = checkForSecurity( sanitize_text_field( wp_unslash( $_POST['portfolioTheme_background_meta_box_nonce'] ) ) ,'portfolioTheme_save_background', $post_id , sanitize_text_field( wp_unslash( $_POST['portfolioTheme_background_image_field'] ) ) );
    $check2 = checkForSecurity( sanitize_text_field( wp_unslash( $_POST['portfolioTheme_secondary_text_meta_box_nonce'] ) ) ,'portfolioTheme_save_secondary_text', $post_id , sanitize_text_field( wp_unslash( $_POST['portfolioTheme_secondary_text_field'] ) ) );

    if ( $check1 != 1 || $check2 !=1 ) {
      echo esc_html( $check1 ) . ' ' . esc_html( $check2 );
    }



    $my_data = sanitize_text_field( wp_unslash( $_POST['portfolioTheme_background_image_field'] ) );
    $my_data_more = sanitize_text_field( wp_unslash( $_POST['portfolioTheme_secondary_text_field'] ) );

    update_post_meta( $post_id , '_background_image_value_key' , $my_data );
    update_post_meta( $post_id , '_secondary_text_value_key' , $my_data_more );

  endif;
}

/**
 *
 * Summary
 *
 * Creates the front-end for the Choose the details metabox .
 *
 * @since 1.0.0
 *
 * @param Object $post  .
 * @param String $save      The nonce of the metabox .
 * @param Int    $post_id  .
 * @param String $field     The metabox field .
 **/
function checkForSecurity( $post , $save , $post_id , $field ) {

  if ( ! isset( $post ) && get_post_status() != 'trash' ) {
    return 'POST IS NOT SET';
  }

  if ( ! wp_verify_nonce( $post , $save ) ) {
    return 'NOUNCE HAS NOT BEEN VERIFIED';
  }

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return 'AUTOSAVE IS BEING TRIGGERED';
  }

  if( ! current_user_can( 'edit_post' , $post_id )  && ! current_user_can( 'edit_post' , $post_id ) ) {
    return 'CURRENT USER CANT EDIT THIS';
  }

  return 1;

}
