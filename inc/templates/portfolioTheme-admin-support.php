<?php
/**
 *
 * This template generates the support form.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>

<h1><?php esc_html_e( 'Here are the support options' , 'simplePortfolio' ); ?></h1>

<?php settings_errors(); ?>

<form id="submitForm" method="post" action="options.php" class="portfolio_general_form_support">
	<?php settings_fields( 'portfolio_support' ); ?>
	<?php do_settings_sections( 'portfolio_theme_support' ); ?>
	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
</form>
