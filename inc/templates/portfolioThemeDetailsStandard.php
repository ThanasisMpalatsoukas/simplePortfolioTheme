<?php
/**
 *
 * This template generates More details metabox data formatted inside the portfolio front-end.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>

<?php

if( $value <= 2 ) {
  $class = 12;
}
else if ( $value <= 4 ) {
  $class = 6;
}
else {
  $class = 4;
}
$output = '';
for ( $i = 0;$i < $value; $i+=2 ){
  $answer = get_post_meta( $post_id , '_choices_answer' . $i , true );
  $number = get_post_meta( $post_id , '_choices_number' . $i , true );
  if ( $i+1 < $value ) {
    $answer2 = get_post_meta( $post_id , '_choices_answer' . ( $i+1 ) , true );
    $number2 = get_post_meta( $post_id , '_choices_number' . ( $i+1 ) , true );
  }
  if ( $i == 0 || $i==4 ) {
    $more_class = 'question-table';
  }
  else {
    $more_class = '';
  }
  ?>
  <div class="col-lg-<?php echo intval( $class ); ?> <?php echo esc_attr( $more_class ); ?>">
    <p class="question"><?php echo esc_html( $number ); ?></p>
    <p class="answer"><?php echo esc_html( $answer ); ?></p>
    <div class="separator">
    </div>
    <?php
  if ( $i+1 < $value ) {
    ?>
    <p class="question"><?php echo esc_html( $number2 ); ?></p>
    <p class="answer"><?php echo esc_html( $answer2 ); ?></p>
    </div>
    <?php
  }
  else {
    ?>
    </div>
    <?php
  }
}
