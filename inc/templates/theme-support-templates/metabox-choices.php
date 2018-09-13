<?php
/**
 *
 * This is the tempalte for getting more details metabox in the admin panel in the right format.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>
<button id="more_choices" class="button button-secondary">More details </button>
<div id="more-choices-box"><input type="hidden" name="counting-elements-field" id="counting-elements-field" value="<?php echo intval( $value ) ?>"/>

<?php
  for ( $i = 0; $i < $value ; $i++ ){
    $answer = get_post_meta(  $post->ID , '_choices_answer'.$i , true );
    $number = get_post_meta(  $post->ID , '_choices_number'.$i , true );

    ?>
    <label id="lnumber<?php echo intval( $i ); ?>" for="number<?php echo intval( $i ); ?>" ><?php __( 'Choose the name of the detail' , 'simplePortfolio' ); ?> </label>
    <input id="number<?php echo intval( $i ); ?>" name="number<?php echo intval( $i ); ?>" value="<?php echo esc_attr( $number ); ?>" style="margin-bottom: 30px; margin-right: 15px; margin-left: 15px;" />
    <label id="lanswer<?php echo intval( $i ); ?>" for="answer<?php echo intval( $i ); ?>" ><?php __( 'Choose the value of the detail' , 'simplePortfolio' ); ?></label>
    <input id="answer<?php echo intval( $i ); ?>" name="answer<?php echo intval( $i ); ?>" value="<?php echo esc_attr( $answer ); ?>" style="margin-bottom: 30px; margin-right: 15px; margin-left: 15px;" />
    <button id="button<?php echo intval( $i ); ?>" class="add-choices-state button button-primary"><?php __( 'Romove detail' , 'simplePortfolio' ); ?></button><br class="br<?php echo intval( $i ); ?>"></br><br class="br<?php echo intval( $i ); ?>"></br>

    <?php
  }
?>


</div>
<button type="submit" class="button button-primary" ><?php __( 'Submit' , 'simplePortfolio' ); ?></button>
