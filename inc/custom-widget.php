<?php
/**
 * Custom widget for the skillbar area
 *
 * @package simplePortfolio
 * @since simplePortfolio 1.1.1
 **/

?>
<?php

/**
 *
 * Summary
 *
 * Register the skillbar widget.
 *
 * @since 1.0.0
 **/
function wpb_load_widget( ) {
    register_widget( 'skillbar_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );


/**
 * Summary
 *
 * Skillbar_widget Class Doc Comment.
 *
 * Create the skillbar widget.
 *
 * @category    Class
 * @package     simplePortfolio
 * @author      Sakis bal
 *
 * @since   1.0.0
 */
class skillbar_widget extends WP_Widget {

/**
 * Summary
 *
 * The construct function of the class
 *
 * @since 1.0.0
 **/
function __construct( ) {
parent::__construct(

// Base ID of your widget.
'skillbar_widget',

// Widget name will appear in UI.
__( 'Skillbar widget', 'simplePortfolio' ),

// Widget description.
array( 'description' => __( 'Skill bar widget', 'simplePortfolio' ), )
 );
}


/**
 *
 * Summary
 *
 * Creating the widget area on the admin menu.
 *
 * @param array $args {
 *     An array of arguments.
 *
 *     @type Html $before_widget  The html before the widget.
 *
 *     @type Html $after_widget   The html afterthe widget.
 *
 *     @type Html $before_title   The html before the title.
 *
 *     @type Html $after_title    The html after the widget.
 * }
 *
 * @param array $instance {
 *     An array of arguments.
 *
 *     @type String $title  The title of the widget.
 * }
 * @since 1.0.0
 **/
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// Before and after widget arguments are defined by themes.
echo esc_html( $args['before_widget'] );
if ( ! empty( $title ) )
echo esc_html( $args['before_title'] . $title . $args['after_title'] );

// This is where you run the code and display the output.
echo esc_html_e( 'Hello, World!', 'simplePortfolio' );
echo esc_html( $args['after_widget'] );
}

/**
 *
 * Summary
 *
 * Creates the form for the widget.
 *
 * @since 1.0.0
 *
 * @param array $instance {
 *     An array of arguments.
 *
 *     @type String $title  The title of the widget.
 * }
 **/
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = esc_html_e( 'New title', 'simplePortfolio' );
}

if( isset( $instance['percentage'] ) ){
  $percentage = $instance['percentage'];
}
else{
  $percentage = 0;
}


// Widget admin form.
?>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:','simplePortfolio' ); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
<label for="<?php echo esc_attr( $this->get_field_id( 'percentage' ) ); ?>"><?php esc_html_e( 'Percentage:','simplePortfolio' ); ?></label>
<input type="number" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'percentage' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'percentage' ) ); ?>" type="text" value="<?php echo esc_attr( $percentage ); ?>" />

</p>
<?php
}

/**
 *
 * Summary
 *
 * Creates the form for the widget.
 *
 * @since 1.0.0
 *
 * @param array $new_instance {
 *     An array of arguments.
 *
 *     @type String $title         The title of the widget.
 *
 *     @type String $description   The description of the widget.
 * }
 *
 * @param array $old_instance {
 *     An array of arguments.
 *
 *     @type String $title         The title of the widget.
 *
 *     @type String $description   The description of the widget.
 * }
 *
 * @global array $instance {
 *     An array of arguments.
 *
 *     @type String $title         The title of the widget.
 *
 *     @type String $description   The description of the widget.
 * }
 **/
public function update( $new_instance, $old_instance ) {
  $instance = array( );
  $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
  $instance['percentage'] = ( ! empty( $new_instance['percentage'] ) ) ? strip_tags( $new_instance['percentage'] ) : '';
  return $instance;
  }
} // Class wpb_widget ends here
