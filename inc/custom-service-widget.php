<?php
/**
 * Custom widget for the service area
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
 * Register the service widget.
 *
 * @since 1.0.0
 **/
function wpb_load_service_widget() {
    register_widget( 'service_widget' );
}
add_action( 'widgets_init', 'wpb_load_service_widget' );


/**
 * Service_widget Class Doc Comment
 *
 * Summary
 *
 * Create the service widget.
 *
 * @category    Class
 * @package     simplePortfolio
 * @author      Sakis bal
 *
 * @since   1.0.0
 */
class service_widget extends WP_Widget {

/**
 * Summary
 *
 * The construct function of the class
 *
 * @since 1.0.0
 **/
function __construct() {
parent::__construct(

// Base ID of your widget.
'service_widget',

// Widget name will appear in UI.
__('Service widget', 'simplePortfolio'),

// Widget description.
array( 'description' => __( 'Service widget', 'simplePortfolio' ), )
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
echo esc_html($args['before_widget']);
if ( ! empty( $title ) )
echo esc_html($args['before_title'] . $title . $args['after_title']);

// This is where you run the code and display the output.
echo esc_html_e( 'Hello, World!', 'simplePortfolio' );
echo esc_html($args['after_widget']);
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
$title = __( 'New title', 'simplePortfolio' );
}

if(isset($instance['description'])){
  $description = $instance['description'];
}
else{
  $description = 'Lorem ipsum';
}


// Widget admin form.
?>
<p>
<label for="<?php echo esc_attr($this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'simplePortfolio'); ?></label>
<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
<label for="<?php echo esc_attr($this->get_field_id( 'description' )); ?>"><?php esc_html_e( 'Description:','simplePortfolio'); ?></label>
<textarea cols="15" rows="24" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'description' )); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" >
  <?php echo esc_html( $description ); ?></textarea>

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
public function update( $new_instance , $old_instance ) {
  $instance = array();
  $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
  $instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
  return $instance;
  }
} // Class wpb_widget ends here.
