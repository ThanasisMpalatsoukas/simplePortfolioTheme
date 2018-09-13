<?php
/**
 *
 * This template generates the content form.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>

<h1><?php esc_html_e( 'Check which content you want to have inside your theme' , 'simplePortfolio' ); ?></h1>

<?php settings_errors(); ?>

<form id="submitForm_content" method="post" action="options.php" class="portfolio_general_form_content">
	<?php settings_fields( 'portfolio_content' ); ?>
	<?php do_settings_sections( 'portfolio_theme_content' ); ?>
	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
</form>
