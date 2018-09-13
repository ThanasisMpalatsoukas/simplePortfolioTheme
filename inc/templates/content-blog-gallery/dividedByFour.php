<?php
/**
 *
 * This is the tempalte for the case that ( x%4 == 0) images are added in the images template.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>

<?php
$i = 0;
if ( $max == 2 ) :
  ?>
  <div class="col-lg-6 col-6" style="padding-right:2px;">
    <div class="equal-images background-image"  style="background-image:url('<?php echo esc_attr($images[0] ) ; ?>' ) ;">

    </div>
  </div>
  <div class="col-lg-6 col-6" style="padding-left:0px;">
    <div class="equal-images background-image"  style="background-image:url( '<?php echo esc_attr( $images[1] ) ; ?>' ) ;">

    </div>
  </div>
  <?php
else :

  while ( $i<$amount ) {
    ?>

    <div class="col-lg-6 col-6" style="padding-right:2px;">
      <div class="equal-images background-image"  style="background-image:url( '<?php echo esc_attr( $images[ $i ] ); ?>' ) ;">

      </div>
    </div>
    <div class="col-lg-6 col-6" style="padding-left:0px;">
      <div class="equal-images different-height background-image"  style="background-image:url( '<?php echo esc_attr( $images[ $i+1 ] ) ; ?>' ) ;">

      </div>
    </div>

    <div class="col-lg-6 col-6 second" style="padding-right:2px;">
      <div class="equal-images different-height different-margin background-image"  style="background-image:url( '<?php echo esc_attr( $images[ $i+2 ] ) ; ?>' ) ;">

      </div>
    </div>
    <div class="col-lg-6 col-6 second" style="padding-left:0px;">
      <div class="equal-images  background-image"  style="background-image:url( '<?php echo esc_attr( $images[ $i+3 ] ) ; ?>');">

      </div>
    </div>

    <?php
    $i+=4;
  }

endif;
