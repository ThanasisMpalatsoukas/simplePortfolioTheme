<?php
/**
 *
 * This is the service widget template.
 *
 * @package PortfolioTheme
 * @since 1.0.0
 **/

?>
<?php

$widget_data = rh_get_widget_data_for( 'sidebar-4' );
if ( ! empty( $widget_data ) ) :
  ?>
<aside role="complementary">
	<div class="services-sidebar-container">
	  <h2><?php echo esc_html_e( 'SERVICES'  , 'simplePortfolio' ); ?></h2>
	  <h3><?php echo esc_html_e( 'best services around the town'  , 'simplePortfolio' ); ?></h3>
	    <?php

	      // Retrieving the following data from the $widget_data and passing them to the template part.
	      // Title: string , description: string.
	      $max = count( $widget_data );


	      // Depending on the amount of services i display a different format.
	      if ( $max == 1 ) :
	        set_query_var( 'title',$widget_data[0]->title );
	        set_query_var( 'description',$widget_data[0]->description );
	        get_template_part( 'templateparts/services/single-service' );
	      elseif ( $max == 2 ) :
	        set_query_var( 'title_1',$widget_data[0]->title );
	        set_query_var( 'description_1',$widget_data[0]->description );
	        set_query_var( 'title_2',$widget_data[1]->title );
	        set_query_var( 'description_2',$widget_data[1]->description );
	        get_template_part( 'templateparts/services/double-service' );
	      elseif ( $max == 3  ):
	        set_query_var( 'widget_data',$widget_data );
	        get_template_part( 'templateparts/services/triple-service' );
	      elseif ( $max == 4 ) :
	        set_query_var( 'widget_data',$widget_data );
	        get_template_part( 'templateparts/services/quadro-service' );
	      elseif ( $max == 5 ) :
	        set_query_var( 'widget_data',$widget_data );
	        get_template_part( 'templateparts/services/five-service' );
	      else :
	        echo "<h2>You need to insert less than 5 services in this area</h2>";
	      endif;
	    ?>


	</div><!-- .service-sidebar-container -->
</aside>
<?php endif;
