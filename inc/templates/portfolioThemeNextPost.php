<?php
/**
 *
 * This template generates the next post link inside the portfolio front end.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>
<p class="next" ><a href="<?php if( isset( $_GET['category'] ) ): echo esc_attr( $permalink.'&category='. sanitize_text_field( wp_unslash( $_GET['category'] ) ) ); endif; ?>" >
	<span style="opacity:1;"><?php echo esc_html_e( 'Next post' , 'simplePortfolio' ); ?></span>  </a><span style="opacity:1"><br><?php echo esc_url( $title ); ?></span></p>
