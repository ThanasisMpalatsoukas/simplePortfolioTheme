<?php
/**
 *
 * This is the tempalte for the case that ( x%3 == 0  ) images are added in the images template.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>

<?php
$i = 0;
while( $i<$amount ) {
  if ( $i%2 == 0 ) :
  ?>

  <div class="col-lg-8 col-8" style="padding-right:2px;">
    <div class="big-image background-image" style="background-image:url( '<?php echo esc_attr( $images[ $i ] ); ?>' );">

    </div>
  </div>
  <div class="col-lg-4 col-4" style="padding-left:0px;">
      <div class="smaller-images background-image" style="background-image:url( '<?php echo esc_attr( $images[ $i+1 ] ); ?>' );">

      </div>
      <div class="smaller-images second background-image" style="background-image:url( '<?php echo esc_attr( $images[ $i+2 ] ); ?>' );">

      </div>
  </div>

  <?php
  $i+=3;
  else:
  ?>
  <div class="col-lg-4 col-4" style="padding-right:2px;margin-top:2px;">
      <div class="smaller-images background-image" style="background-image:url( '<?php echo esc_attr( $images[ $i ] ); ?>' );">

      </div>
      <div class="smaller-images second background-image" style="background-image:url( '<?php echo esc_attr( $images[ $i+1 ] ) ?>' );">

      </div>
  </div>

  <div class="col-lg-8 col-8" style="padding-left:0px;margin-top:2px;">
    <div class="big-image background-image" style="background-image:url( '<?php echo esc_attr( $images[ $i+2 ] ) ?>' );">

    </div>
  </div>
  <?php
  $i+=3;
  endif;
}
