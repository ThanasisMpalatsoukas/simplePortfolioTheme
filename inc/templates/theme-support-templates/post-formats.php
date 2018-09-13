<?php
/**
 *
 * This is the tempalte for getting the post types checkboxes on the support page.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>
<?php

$formats = array( 'aside', 'gallery','image','video', 'audio' );
$output = '';
foreach ( $formats as $format  ) {
  $checked = ( isset( $options[$format] ) == 1 ? 'checked' : ''  );

?>

  <label><input type="checkbox" id="<?php echo esc_attr( $format ); ?>" name="post_formats[<?php echo esc_attr( $format ); ?>]" value="1" <?php echo esc_attr( $checked ); ?> /> <?php echo esc_html($format ); ?></label><br>

<?php
}
