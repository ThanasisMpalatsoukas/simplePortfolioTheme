<?php
/**
 *
 * This is the skillbar widget template.
 *
 * @package PortfolioTheme
 * @since 1.0.0
 **/

?>
<?php
$widget_data = rh_get_widget_data_for( 'sidebar-3') ;
if( !empty( $widget_data) ) :
?>
<aside role="complementary">
	<div class="container-fluid">
	  <div class="row">
	    <div class="skillbar_container col-lg-12 text-center">
	      <h2><?php echo esc_html_e( 'SKILLS'  , 'simplePortfolio' ); ?></h2>
	      <h3><?php echo esc_html_e( 'my expertises'  , 'simplePortfolio' ); ?></h3>
	      <div class="container">
	        <div class="row">
	          <div class="col-lg-12 skillbar-single-container">
            <?php

            // Retrieving the following data from the $widget_data for the skillbars.
            // Title: string, percentage: number.
            foreach( $widget_data as $widget) {
            ?>

            <div class="skill-text">
              <p style="float:left;"><?php echo esc_html( $widget->title); ?></p>
              <p style="float:right;"><?php echo esc_html( $widget->percentage); ?>%</p>
            </div><!-- .skill-text -->
            <div class="single-skill">
              <div class="skillbar-progress" data-progress="<?php echo esc_html( $widget->percentage); ?>">

              </div><!-- .skillbar-progress -->
            </div><!-- .single-skill -->

            <?php
          	}

          	?>
          	</div><!-- .col-lg-12 .skillbar-single-container -->
        	</div><!-- .row -->
      	</div><!-- .container -->
    	</div><!-- .skillbar_container .col-lg-12 .text-center -->
	  </div><!-- .row -->
	</div><!-- .container-fluid -->
</aside>
<?php endif; ?>
