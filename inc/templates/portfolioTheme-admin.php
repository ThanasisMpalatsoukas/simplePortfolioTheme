<?php
/**
 *
 * This template generates the admin form.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>

<h1><?php esc_html_e( 'Create here the tihng you want to register' , 'simplePortfolio' ); ?></h1>

<?php settings_errors(); ?>

<form id="submitForm" method="post" action="options.php" class="portfolio_general_form">
	<?php settings_fields( 'portfolioTheme_personalization' ); ?>
	<?php do_settings_sections( 'portfolio_theme' ); ?>
	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
</form>
