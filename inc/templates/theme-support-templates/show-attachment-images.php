<?php
/**
 *
 * This is the tempalte for getting the attachment images in the single portfolio tempalate.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>
<?php

if ( $template == 'single-portfolio' ) {
  $images = get_the_gallery_format();
  $max = count( $images[1] );
  if ( $max > 4 ) {
    $colspan = 3;
    $height = '300px';
  }
  else if ( $max == 3 ) {
    $colspan = 4;
    $height = '400px';
  }
  else {
    $colspan = 6;
    $height = '500px';
  }
  $i = 0;
  foreach ( $images[1] as $image_src ) {
  ?>

  <div class="col-lg-<?php echo intval( $colspan ); ?>">
    <div class="picture background-image" style="background-image:url( <?php echo esc_attr( $images[1][ $i ] ); ?> );height:<?php echo esc_attr( $height ); ?>">
    </div>
  </div>

  <?php
    $i++;
  }
}

?>
