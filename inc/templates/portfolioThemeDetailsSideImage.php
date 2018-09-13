<?php
/**
 *
 * This template generates More details metabox data formatted inside the portfolio posts.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>
<?php

for ( $i = 0; $i < $value; $i++ ) {

  $answer = get_post_meta( $post_id , '_choices_answer' . $i , true);
  $number = get_post_meta( $post_id , '_choices_number' . $i , true);
  $answer = strtoupper( $answer );
  ?>

  <p class="details"><?php echo esc_html( $number ); ?> : <?php echo esc_html( $answer ); ?></p>

  <?php

}
