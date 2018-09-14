<?php
/**
 *
 * Creates the pages inside the appearance menu neccessary for the theme .
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>

<?php

add_action( 'admin_menu','portfolioTheme_add_admin_page' );


/**
 * Summary
 *
 * Creates the pages ( Settings, Support , Content ) on the appearance menu at the admin panel
 *
 * @since 1.0.0
 **/
function portfolioTheme_add_admin_page() {


	add_theme_page( 'Settings' , esc_html( __( 'General' , 'simplePortfolio' ) ), 'install_themes' , 'portfolio_theme' , 'portfolio_theme_create_page' );

  add_theme_page( 'PortfolioThemeSupport' , esc_html( __( 'Support' , 'simplePortfolio' ) ) , 'install_themes' , 'portfolio_theme_support' , 'portfolio_theme_support_create_page' );

  add_theme_page( 'portfolio_theme_Content' , esc_html( __( 'Content' , 'simplePortfolio' ) ) , 'install_themes'  , 'portfolio_theme_content' , 'portfolio_theme_content_create_page' );

  add_action( 'admin_init', 'portfolioTheme_custom_settings' );

}

/**
 * Summary
 *
 * Gets the tempalte part for the admin page .
 *
 * @since 1.0.0
 **/
function portfolio_theme_create_page() {
  	get_template_part( 'inc/templates/portfolioTheme','admin' );
}

/**
 * Summary
 *
 * Gets the tempalte part for the Support page .
 *
 * @since 1.0.0
 **/
function portfolio_theme_support_create_page() {
    get_template_part( 'inc/templates/portfolioTheme','admin-support' );
}

/**
 * Summary
 *
 * Gets the tempalte part for the Content page .
 *
 * @since 1.0.0
 **/
function portfolio_theme_content_create_page() {
    get_template_part( 'inc/templates/portfolioTheme','admin-content' );
}

/**
 * Summary
 *
 * Creates all the settings for the following pages: Settings | Support | Content .
 *
 * @since 1.0.0
 **/
function portfolioTheme_custom_settings() {

  register_setting( 'portfolioTheme_personalization' , 'first_name' ) ;
  register_setting( 'portfolioTheme_personalization' , 'email' ) ;
  register_setting( 'portfolioTheme_personalization' , 'adress' ) ;
  register_setting( 'portfolioTheme_personalization' , 'state' ) ;
  register_setting( 'portfolioTheme_personalization' , 'country' ) ;
  register_setting( 'portfolioTheme_personalization' , 'phone_number' ) ;
  register_setting( 'portfolioTheme_personalization' , 'facebook_checkbox' ) ;
  register_setting( 'portfolioTheme_personalization' , 'facebook_link' ) ;
  register_setting( 'portfolioTheme_personalization' , 'instagram_checkbox' ) ;
  register_setting( 'portfolioTheme_personalization' , 'instagram_link' ) ;
  register_setting( 'portfolioTheme_personalization' , 'linkedin_checkbox' ) ;
  register_setting( 'portfolioTheme_personalization' , 'linkedin_link' ) ;
  register_setting( 'portfolioTheme_personalization' , 'twitter_checkbox' ) ;
  register_setting( 'portfolioTheme_personalization' , 'twitter_link' ) ;
  register_setting( 'portfolioTheme_personalization' , 'profile_picture' ) ;
  register_setting( 'portfolioTheme_personalization' , 'profile_brief' , 'brief_check' ) ;
  register_setting( 'portfolioTheme_personalization' , 'profile_brief_keyboard_animation' ) ;
  register_setting( 'portfolioTheme_personalization' , 'profile_brief_keyboard_animation_timer','time_checker' ) ;

  add_settings_section( 'portfolioTheme-general-options' , 'General Options' , 'portfolioTheme_general_options' , 'portfolio_theme' ) ;

  add_settings_field( 'general_first_name' , esc_html( __( 'Full name' , 'simplePortfolio' ) ), 'portfolioTheme_general_first_name' , 'portfolio_theme' , 'portfolioTheme-general-options' ) ;
  add_settings_field( 'generalesc_html( __mail' , esc_html( __( 'Email adress' , 'simplePortfolio' ) ) , 'portfolioTheme_generalesc_html( __mail' , 'portfolio_theme' , 'portfolioTheme-general-options' ) ;
  add_settings_field( 'general_adress' , esc_html( __( 'Adress' , 'simplePortfolio' ) ) , 'portfolioTheme_general_adress' , 'portfolio_theme' , 'portfolioTheme-general-options' ) ;
  add_settings_field( 'general_state' , esc_html( __( 'State' , 'simplePortfolio' ) ) , 'portfolioTheme_general_state' , 'portfolio_theme' , 'portfolioTheme-general-options' ) ;
  add_settings_field( 'general_country' , esc_html( __( 'Country' , 'simplePortfolio' ) ) , 'portfolioTheme_general_country' , 'portfolio_theme' , 'portfolioTheme-general-options' ) ;
  add_settings_field( 'general_phone_number' , esc_html( __( 'Phone number' , 'simplePortfolio' ) ) , 'portfolioTheme_general_phone_number' , 'portfolio_theme' , 'portfolioTheme-general-options' ) ;
  socialMediaHelper( 'facebook',esc_html( __( 'Do you have facebook?' , 'simplePortfolio' ) ) ) ;
  socialMediaHelper( 'instagram',esc_html( __( 'Do you have instagram?' , 'simplePortfolio' ) ) ) ;
  socialMediaHelper( 'linkedin',esc_html( __( 'Do you have linkedin?' , 'simplePortfolio' ) ) ) ;
  socialMediaHelper( 'twitter',esc_html( __( 'Do you have twitter?' , 'simplePortfolio' ) ) ) ;
  add_settings_field( 'general_phone_number' , esc_html( __( 'Phone number' , 'simplePortfolio' ) ) , 'portfolioTheme_general_phone_number' , 'portfolio_theme' , 'portfolioTheme-general-options' ) ;
  add_settings_field( 'general_profile_brief' , esc_html( __( 'brief intro of what you do' , 'simplePortfolio' ) ) , 'portfolioTheme_general_brief' , 'portfolio_theme','portfolioTheme-general-options' ) ;
  add_settings_field( 'general_profile_brief_keyboard_animation' , esc_html( __( 'Keyboard on animation on main text' , 'simplePortfolio' ) ) , 'portfolioTheme_general_profile_animation' , 'portfolio_theme','portfolioTheme-general-options' ) ;
  add_settings_field( 'general_profile_brief_keyboard_animation_timer' , esc_html( __( 'Milli seconds per letter' , 'simplePortfolio' ) ) , 'portfolioTheme_general_profile_animation_timer' , 'portfolio_theme','portfolioTheme-general-options' ) ;
  add_settings_field( 'general_profile_pricture' , esc_html( __( 'Porfile picture' , 'simplePortfolio' ) ) , 'portfolioTheme_general_profile_picture' , 'portfolio_theme','portfolioTheme-general-options' ) ;

  // Theme support .
  register_setting( 'portfolio_support' , 'post_formats' ) ;
  register_setting( 'portfolio_support' , 'custom_background' ) ;
  register_setting( 'portfolio_support' , 'custom_header' ) ;

  add_settings_section(  'portfolioTheme-general-support' , 'General support' , 'portfolioTheme_general_support' , 'portfolio_theme_support' ) ;

  add_settings_field(  'support_post_formats' , 'post formats' , 'portfolioTheme_support_post_formats' , 'portfolio_theme_support' , 'portfolioTheme-general-support' ) ;
  add_settings_field(  'support_header' , 'custom header' , 'portfolioTheme_support_header' , 'portfolio_theme_support' , 'portfolioTheme-general-support' ) ;
  add_settings_field(  'support_background' , 'custom background' , 'portfolioTheme_support_background' , 'portfolio_theme_support' , 'portfolioTheme-general-support' ) ;

  // Theme content .
  register_setting( 'portfolio_content' , 'content_blog' );
  register_setting( 'portfolio_content' , 'content_testimonials_bg' );
  register_setting( 'portfolio_content' , 'content_logo' );
	register_setting( 'portfolio_content' , 'content_contact' );
  register_setting( 'portfolio_content' , 'content_loading' );
	register_setting( 'portfolio_content' , 'content_front_page_template' );
	register_setting( 'portfolio_content' , 'content_portfolio_template' );
  register_setting( 'portfolio_content' , 'content_testimonials' );
  register_setting( 'portfolio_content' , 'content_portfolio' );
  register_setting( 'portfolio_content' , 'content_main_page_bg' );
  register_setting( 'portfolio_content' , 'content_aboutme' );
  register_setting( 'portfolio_content' , 'content_objectives' );
  register_setting( 'portfolio_content' , 'content_blog_bg_2' );

  add_settings_section( 'portfolioTheme-general-content' , 'General content' , 'portfolioTheme_general_content' , 'portfolio_theme_content' );

  add_settings_field( 'content_logo_field' , esc_html( __( 'Your logo' , 'simplePortfolio' ) ) , 'portfolioTheme_content_logo' , 'portfolio_theme_content' , 'portfolioTheme-general-content' );
  add_settings_field( 'content_loading_field' , esc_html( __( 'Enable/disable loading screen' , 'simplePortfolio' ) ) , 'portfolioTheme_content_loading' , 'portfolio_theme_content' , 'portfolioTheme-general-content' );
	add_settings_field( 'content_contact_field' , esc_html( __( 'Enable/disable contact form' , 'simplePortfolio' ) ) , 'portfolioTheme_content_contact' , 'portfolio_theme_content' , 'portfolioTheme-general-content' );
  add_settings_field( 'content_blog_field' , esc_html( __( 'Enable/disable blog' , 'simplePortfolio' ) ) , 'portfolioTheme_content_blog' , 'portfolio_theme_content' , 'portfolioTheme-general-content' );
  add_settings_field( 'content_portfolio_field' , esc_html( __( 'Enable/disable the portfolio' , 'simplePortfolio' ) ) , 'portfolioTheme_content_portfolio' , 'portfolio_theme_content' , 'portfolioTheme-general-content' );
  add_settings_field( 'content_testimonials_field' , esc_html( __( 'Enable/disable testimonials' , 'simplePortfolio' ) ) , 'portfolioTheme_content_testimonials' , 'portfolio_theme_content' , 'portfolioTheme-general-content' );
	add_settings_field( 'content_front_page_template_field' , esc_html( __( 'choose the front page template' , 'simplePortfolio' ) ) , 'portfolioTheme_content_front_page_callback' , 'portfolio_theme_content' , 'portfolioTheme-general-content' );
	add_settings_field( 'content_portfolio_template_field' , esc_html( __( 'choose the front portfolio template' , 'simplePortfolio' ) ) , 'portfolioTheme_content_portfolio_callback' , 'portfolio_theme_content' , 'portfolioTheme-general-content' );
  add_settings_field( 'content_aboutme_field' , esc_html( __( 'about yourself' , 'simplePortfolio' ) ) , 'portfolioTheme_content_aboutme' , 'portfolio_theme_content' , 'portfolioTheme-general-content' );
  add_settings_field( 'content_objecitves_field' , esc_html( __( 'Your objectives' , 'simplePortfolio' ) ) , 'portfolioTheme_content_objectives' , 'portfolio_theme_content' , 'portfolioTheme-general-content' );
  add_settings_field( 'content_testimonials_bg_field' , esc_html( __( 'Testimonials background image' , 'simplePortfolio' ) ) , 'portfolioTheme_content_testimonials_bg' , 'portfolio_theme_content' , 'portfolioTheme-general-content' );
  add_settings_field( 'content_main_bg' , esc_html( __( 'main background image' , 'simplePortfolio' ) ) , 'portfolioTheme_content_main_bg' , 'portfolio_theme_content' , 'portfolioTheme-general-content' );
  add_settings_field( 'content_blog_bg' , esc_html( __( 'blog background image' , 'simplePortfolio' ) ) , 'portfolioTheme_content_blog_bg_2' , 'portfolio_theme_content','portfolioTheme-general-content' );
}

/**
 * Summary
 *
 * Helper function helping to add settings field .
 *
 * @param String $social_media  The social media to be used as a vraiable (for example 'facebook' ) .
 * @param String $text          the text used to generate on the front end .
 *
 * @since 1.0.0
 **/
function socialMediaHelper( $social_media,$text ) {

  $social_media = esc_html( $social_media );
  $text = esc_html( $text );

  add_settings_field( 'general_' . $social_media . '_checkbox' , $text , 'portfolioTheme_general_' . $social_media . '_checkbox' , 'portfolio_theme' , 'portfolioTheme-general-options' );
  add_settings_field( 'general_' . $social_media . '_link' , $social_media , 'portfolioTheme_general_' . $social_media . '_link' , 'portfolio_theme' , 'portfolioTheme-general-options' );
}

/**
 * Summary
 *
 * Helper function helping to add the social media on the front end of the
 * admin menu .
 *
 * @param String $social_media  The social media to be used as a vraiable ( for example 'facebook' ) .
 * @since 1.0.0
 **/
function socialMediaHelperLink( $social_media ) {

  $social_media = esc_attr( $social_media );

  $facebook_link = get_option( $social_media . '_link' );

  if ( get_option( $social_media . '_checkbox' ) == 'checked' ) {
    $disabled = '';
  }
  else {
    $disabled = 'disabled';
  }

  $disabled = esc_attr( $disabled );
  $facebook_link = esc_attr( $facebook_link );

  echo '<input type="text" id="' . esc_attr( $social_media ) . '-link" name="' . esc_attr( $social_media ) . '_link' . '" value="' . esc_attr( $facebook_link ) . '" ' . esc_attr( $disabled ) . '/>';
}


/**
 * Summary
 *
 * Callback function to create facebook checkbox .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_facebook_checkbox() {
  $checkbox = get_option( 'facebook_checkbox' );
  echo '<input type="checkbox" name="facebook_checkbox" id="facebook_checkbox" value="checked" ' . esc_attr( $checkbox ) . '/>';
}


/**
 * Summary
 *
 * Callback function to create instagram checkbox .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_instagram_checkbox() {
  $checkbox = get_option( 'instagram_checkbox' );
  echo '<input type="checkbox" name="instagram_checkbox" id="instagram_checkbox" value="checked" ' . esc_attr( $checkbox ) . '/>';
}


/**
 * Summary
 *
 * Callback function to create linkedin checkbox .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_linkedin_checkbox() {
  $checkbox = get_option( 'linkedin_checkbox' );
  echo '<input type="checkbox" name="linkedin_checkbox" id="linkedin_checkbox" value="checked" ' . esc_attr( $checkbox ) . '/>';
}


/**
 * Summary
 *
 * Callback function to create twitter checkbox .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_twitter_checkbox() {
  $checkbox = get_option( 'twitter_checkbox' );
  echo '<input type="checkbox" name="twitter_checkbox" id="twitter_checkbox" value="checked" ' . esc_attr( $checkbox ) . '/>';
}


/**
 * Summary
 *
 * Callback function to create facebooj link .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_facebook_link() {
  socialMediaHelperLink( 'facebook' );
}


/**
 * Summary
 *
 * Callback function to create twiiter link .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_twitter_link() {
  socialMediaHelperLink( 'twitter' );
}


/**
 * Summary
 *
 * Callback function to create instagram link .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_instagram_link() {
  socialMediaHelperLink( 'instagram' );
}

/**
 * Summary
 *
 * Callback function to create linkedin link .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_linkedin_link() {
  socialMediaHelperLink( 'linkedin' );
}

/**
 * Summary
 *
 * Callback function to create email input .
 *
 * @since 1.0.0
 **/
function portfolioTheme_generalesc_html( ) {
  $email = esc_attr( get_option( 'email' ) );
  echo '<input type="text" name="email" value="' . esc_attr( $email ) . '"></input>';
}

/**
 * Summary
 *
 * Callback function to create state input .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_state() {
  $state = esc_attr( get_option( 'state' ) );
  echo '<input type="text" name="state" value="' . esc_attr( $state ) . '"></input>';
}

/**
 * Summary
 *
 * Callback function to create country input .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_country() {
  $country = esc_attr( get_option( 'country' ) );
  echo '<input type="text" name="country" value="' . esc_attr( $country ) . '"></input>';
}

/**
 * Summary
 *
 * Callback function to create phone number input .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_phone_number() {
  $phone = esc_attr( get_option( 'phone_number' ) );
  echo '<input type="text" name="phone_number" value="' . esc_attr( $phone ) . '"></input>';
}

/**
 * Summary
 *
 * Callback function to create adress input
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_adress() {
  $adress = esc_attr( get_option( 'adress' ) );
  echo '<input type="text" name="adress" value="' . esc_attr( $adress ) . '"></input>';
}

/**
 * Summary
 *
 * Callback function to create content html text .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_content() {
  echo 'Here you can enable and disable certain options for the content of the theme';
}


/**
 * Summary
 *
 * Callback function to create choises for the front-page template .
 *
 * @since 1.3.5
 **/
function portfolioTheme_content_front_page_callback() {
	$option = get_option( 'content_front_page_template' );

	if ( ! isset( $option ) ):
		$option = 'default';
	endif;

	$selection = array( 'default' , 'info-on-image' , 'no-logo' );

	echo '<select name="content_front_page_template" id="content_front_page_template">';

	foreach ( $selection as $select ):
		if( $select == $option ):
			echo '<option value="' . $select . '" selected>' . esc_html( $select ) . '</option>';
		else:
			echo '<option value="' . $select . '" >' . esc_html( $select ) . '</option>';
		endif;
	endforeach;

	echo '</select>';
}

/**
 * Summary
 *
 * Callback function to create choiices for the portfolio template .
 *
 * @since 1.3.5
 **/
function portfolioTheme_content_portfolio_callback() {
	$option = get_option( 'content_portfolio_template' );

	if ( ! isset( $option ) ):
		$option = 'default';
	endif;

	$selection = array( 'default' , 'column-2' , 'column-3' , 'column-4' );

	echo '<select name="content_portfolio_template" id="content_portfolio_template">';

	foreach ( $selection as $select ):
		if( $select == $option ):
			echo '<option value="' . $select . '" selected>' . esc_html( $select ) . '</option>';
		else:
			echo '<option value="' . $select . '" >' . esc_html( $select ) . '</option>';
		endif;
	endforeach;

	echo '</select>';
}

/**
 * Summary
 *
 * Callback function to create timer input .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_profile_animation_timer() {
  $option = get_option( 'profile_brief_keyboard_animation_timer' );
  $animation = get_option( 'profile_brief_keyboard_animation' );

  $animation = ( $animation );

  if ( isset( $animation ) ) {
    $disabled = 1;
  }
  else {
    $disabled = 'disabled';
  }

  $disabled = esc_attr( $disabled );

  if ( !isset( $option ) ) {
    $option = 200;
  }

  echo '<label><input type="number" name="profile_brief_keyboard_animation_timer" id="profile_brief_keyboard_animation_timer" value="' . esc_attr( $option ) . '" ' . esc_attr( $disabled ) . '/>' . esc_html( __( '200ms is the default value' , 'simplePortfolio' ) ) . '</label>';

}

/**
 * Summary
 *
 * Callback function to create animation checkbox .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_profile_animation() {
  $option = get_option( 'profile_brief_keyboard_animation' );
  $checked = ( isset( $option ) == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" name="profile_brief_keyboard_animation" id="profile_brief_keyboard_animation" value="1" ' . esc_attr( $checked ) . ' />' . esc_html( __( 'Enable or disable keyboard animation' , 'simplePortfolio' ) ) . '</label>';
}

/**
 * Summary
 *
 * Callback function to create options html .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_options() {
  echo esc_html( __( 'This is the general options menu' , 'simplePortfolio' ) );
}

/**
 * Summary
 *
 * Callback function to create support html .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_support() {
  echo esc_html( __( 'This is the genera support menu' , 'simplePortfolio' ) );
}

/**
 * Summary
 *
 * Callback function to get the post-formats template .
 *
 * @since 1.0.0
 **/
function portfolioTheme_support_post_formats() {
  $options = get_option(  'post_formats' );
  set_query_var( 'options',$options );
  get_template_part( 'inc/templates/theme-support-templates/post-formats' );
}


/**
 * Summary
 *
 * Callback function to create the full name input .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_first_name() {
  $first_name = esc_attr( get_option( 'first_name' ) );
  echo '<input type="text" name="first_name" value="' . esc_attr( $first_name ) . '"></input>';
}

/**
 * Summary
 *
 * Callback function to create the brief textarea .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_brief() {
  $brief = esc_attr( get_option( 'profile_brief' ) );

  if ( !isset( $brief ) ) {
    $brief = 'write something nice about yourself';
  }

  echo '<textarea type="text" rows="12" cols="100" name="profile_brief" value="' . esc_attr( $brief ) . '">' . esc_html( $brief ) . '</textarea>';
}

/**
 * Summary
 *
 * Callback function to create profile picture input .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_profile_picture() {
  $picture = esc_attr( get_option( 'profile_picture' ) );

  if ( get_option( 'profile_checkbox' )!='checked' ) {
    $disabled = 'disabled';
  }
  else {
    $disabled = '';
  }

  $cant_remove = false;

  if ( !isset( $picture ) ) {
    $cant_remove = true;
    $picture = get_template_directory()  . '/img/profile.jpg';
  }

  if ( $cant_remove ) {

    echo '<input type="button" value="Upload profile picture" id="upload-button" class="button button-secondary" /><input id="profile_url" type="hidden" name="profile_picture" value="' . esc_attr( $picture ) . '"></input>
    <div id="profile_url_placeholder" style="width:300px;height:300px;background-position:center;margin:50px;background-size:cover;background-image:url()"></div>';

  }
  else {

    echo '<input type="button" value="Upload profile picture" id="upload-button" class="button button-secondary" /><input id="profile_url" type="hidden" name="profile_picture" value="' . esc_attr( $picture ) . '"></input>
    <input type="button" class="button button-secondary" value="Remove" id="remove-picture" />
    <div id="profile_url_placeholder" style="width:300px;height:300px;background-position:center;margin:50px;background-size:cover;background-image:url( ' . esc_attr( $picture ) . ' )"></div>';

  }

}

/**
 * Summary
 *
 * Callback function to create loading checkbox .
 *
 * @since 1.0.0
 **/
function portfolioTheme_content_loading() {
  $checkbox = get_option( 'content_loading' );
  echo '<input type="checkbox" value="checked" name="content_loading" ' . esc_attr( $checkbox ) . ' />';
}

/**
 * Summary
 *
 * Callback function to create loading checkbox .
 *
 * @since 1.0.0
 **/
function portfolioTheme_content_contact() {
  $checkbox = get_option( 'content_contact' );
  echo '<input type="checkbox" value="checked" name="content_contact" ' . esc_attr( $checkbox ) . ' />';
}

/**
 * Summary
 *
 * Callback function to create the logo input .
 *
 * @since 1.0.0
 **/
function portfolioTheme_content_logo() {
  $picture = esc_attr( get_option( 'content_logo' ) );

  if ( !isset( $picture ) || $picture == '' ) {
    $disabled = 'disabled';
  }
  else {
    $disabled = '';
  }

    echo '<input type="button" value="Upload logo" id="upload-logo-button" class="button button-secondary" /><input id="content_logo" type="hidden" name="content_logo" value="' . esc_attr( $picture ) . '"></input>
    <input type="button" class="button button-secondary" value="Remove" id="remove-logo" ' . esc_attr( $disabled ) . '/>';


    if ( $disabled == '' ) :
      echo '<div id="content_logo_placeholder" style="width:300px;height:300px;background-position:center;margin:50px;background-size:cover;background-image:url( ' . esc_attr( $picture ) . ' )"></div>';
    else:
      echo '<div id="content_logo_placeholder" style="width:0px;height:0px;background-position:center;margin:50px;background-size:cover;background-image:url()"></div>';
    endif;

}

/**
 * Summary
 *
 * Callback function to create profile picture checkbox .
 *
 * @since 1.0.0
 **/
function portfolioTheme_general_profile_checkbox() {
  $checkbox = get_option( 'profile_checkbox' );
  echo ( '<input type="checkbox" name="profile_checkbox" value="checked" ' . esc_attr( $checkbox ) . '/>' );
}

/**
 * Summary
 *
 * Callback function to check the input of the brief .
 *
 * @since 1.0.0
 *
 * @param String $input  .
 * @return String $input
 **/
function brief_check(  $input ) {
  if (  empty(  $input ) ) {
    $input = 'say something nice about yourself';
  }
  return $input;
}

/**
 * Summary
 *
 * Callback function check the $input of the timer aniamtion .
 *
 * @since 1.0.0
 *
 * @param String $input  .
 * @return Int $input
 **/
function time_checker(  $input ) {
  if (  empty( $input ) || $input < 1 ) {
    $input = 200;
  }
  return $input;
}

/**
 * Summary
 *
 * Callback function to create blog bg input .
 *
 * @since 1.0.0
 **/
function portfolioTheme_content_blog_bg_2() {

  $options = get_option( 'content_blog_bg_2' );

  if ( !isset( $options ) ) {
    $options = get_template_directory()  . '/img/testimonials.jpg';
  }

  echo '<input type="button" class="button button-secondary"  id="upload_content_blog_bg" value="Upload Blog Background"/><input type="hidden" id="content_blog_bg_2" name="content_blog_bg_2" value="' . esc_attr( $options ) . '" />
  <input type="button" class="button button-secondary" value="reset to default" id="remove-bloggy-bg" />
  <div id="upload_content_blog_bg_placeholder" style="width:300px;height:300px;background-position:center;margin:50px;background-size:cover;background-image:url( ' . esc_attr( $options ) . ' )"></div>';

}

/**
 * Summary
 *
 * Callback function to create the content background input field .
 *
 * @since 1.0.0
 **/
function portfolioTheme_content_blog() {

  $options = get_option( 'content_blog' );
  $checked = ( isset( $options ) == 1 ? 'checked' : '' );
  echo  '<label><input type="checkbox" name="content_blog" id="content_blog" value="1" ' . esc_attr( $checked ) . ' />' . esc_html( __( 'Enable or disable blog function' , 'simplePortfolio' ) ) . '</label>';

}

/**
 * Summary
 *
 * Callback function to create the portfolio checkbox .
 *
 * @since 1.0.0
 **/
function portfolioTheme_content_portfolio() {

  $options = get_option( 'content_portfolio' );
  $checked = ( isset( $options ) == 1 ? 'checked' : '' );
  echo  '<label><input type="checkbox" name="content_portfolio" id="content_portfolio" value="1" ' . esc_attr( $checked ) . ' />' . esc_html( __( 'Enable or disable portfolio function' , 'simplePortfolio' ) ) . '</label>';

}

/**
 * Summary
 *
 * Callback function to create the testimonials background field .
 *
 * @since 1.0.0
 **/
function portfolioTheme_content_testimonials_bg() {

  $options = get_option( 'content_testimonials_bg' );

  if ( !isset( $options ) ) {
    $options = get_template_directory()  . '/img/testimonials.jpg';
  }

  echo '<input type="button" class="button button-secondary"  id="upload_testimonials_bg" value="Upload Testimonials Background"/><input type="hidden" id="content_testimonials_bg" name="content_testimonials_bg" value="' . esc_attr( $options ) . '" />
  <input type="button" class="button button-secondary" value="reset to default" id="remove-blog-bg" />
  <div id="upload_testimonials_bg_placeholder" style="width:300px;height:300px;background-position:center;margin:50px;background-size:cover;background-image:url( ' . esc_attr( $options ) . ' )"></div>';

}

/**
 * Summary
 *
 * Callback function to create the blog content background field .
 *
 * @since 1.0.0
 **/
function portfolioTheme_content_main_bg() {

  $options = get_option( 'content_main_page_bg' );

  if ( !isset( $options ) ) {
    $options = get_template_directory()  . '/img/main.jpg';
  }

  echo  '<input type="button" class="button button-secondary"  id="upload_main_bg" value="Upload Main background image"/><input type="hidden" id="content_main_page_bg" name="content_main_page_bg" value="' . esc_attr( $options ) . '" />
  <input type="button" class="button button-secondary" value="reset to default" id="remove-main-bg" />
  <div id="upload_main_bg_placeholder" style="width:300px;height:300px;background-position:center;margin:50px;background-size:cover;background-image:url( ' . esc_attr( $options ) . ' )"></div>';

}

/**
 * Summary
 *
 * Callback function to create the objectives textarea input field .
 *
 * @since 1.0.0
 **/
function portfolioTheme_content_objectives() {

  $options = get_option( 'content_objectives' );
  if ( empty( $options ) || $options == '' ) {
    $options = "What is your objective?What do you do";
  }
  echo  '<textarea type="text" name="content_objectives" id="content_objectives" rows="12" cols="100" value="' . esc_attr( $options ) . '">' . esc_html( $options ) . '</textarea>';

}

/**
 * Summary
 *
 * Callback function to create the about me textarea input field .
 *
 * @since 1.0.0
 **/
function portfolioTheme_content_aboutme() {

  $options = get_option( 'content_aboutme' );
  if ( empty( $options ) || $options == '' ) {
    $options = "write something nice about yourself";
  }
  echo  '<textarea type="text" name="content_aboutme" id="content_aboutme" rows="12" cols="100" value="' . esc_attr( $options ) . '">' . esc_html( $options ) . '</textarea>';

}

/**
 * Summary
 *
 * Callback function to create the testimonials checkbox field .
 *
 * @since 1.0.0
 **/
function portfolioTheme_content_testimonials() {

  $options = get_option( 'content_testimonials' );
  $checked = ( isset( $options ) == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" name="content_testimonials" id="content_testimonials" value="1" ' . esc_attr( $checked ) . ' />' . esc_html( __( 'Enable or disable testimonials function' , 'simplePortfolio' ) ) . '</label>';

}



/**
 * Summary
 *
 * Callback function to create teh custom_header chekcbox .
 *
 * @since 1.0.0
 **/
function portfolioTheme_support_header() {

  $options = get_option( 'custom_header' );
  $checked = ( isset( $options ) == 1  ? 'checked' : '' );
  echo '<label><input type="checkbox" name="custom_header" id="custom_header" value="1" ' . esc_attr( $checked ) . ' /></label>';

}

/**
 * Summary
 *
 * Callback function to create the custom_backgroundcheckbox .
 *
 * @since 1.0.0
 **/
function portfolioTheme_support_background() {

  $options = get_option( 'custom_background' );
  $checked = ( isset( $options ) == 1  ? 'checked' : '' );
  echo  '<label><input type="checkbox" name="custom_background" id="custom_background" value="1" ' . esc_attr( $checked ) . ' /></label>';

}
