<?php
/**
 *
 * This template generates the last post link inside the portfolio front end.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>
<p class="last" ><a href="<?php if ( isset( $_GET['category'] ) ) : echo esc_attr( $permalink.'&category='. sanitize_text_field( wp_unslash( $_GET['category'] ) ) ); endif; ?>" ><?php echo esc_html_e( 'Last post' , 'simplePortfolio' ); ?>
</a>
	<span style="opacity:1"><br><?php echo esc_html( $title ); ?></span></p>
