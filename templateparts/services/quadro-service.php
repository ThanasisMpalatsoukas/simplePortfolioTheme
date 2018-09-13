<?php
/**
 *
 *  The format for 4 service widgets.
 *
 *  @package perfectPortfolio
 *  @since 1.0.0
 **/

?>
<div class="custom-container-4 single-service-container">
  <div class="row">
    <?php

    foreach ( $widget_data as $widget ) {
      ?>

      <div class="col-lg-3 mt-5">

        <div class="single-service">
          <div class="single-service-upper">
            <h2><?php echo esc_html( $widget->title ); ?></h2>
          </div>
          <div class="single-service-main-body">
            <p><?php echo esc_html( $widget->description ); ?>
            </p>
          </div>
        </div>

      </div>

      <?php

    ?>

  </div>
</div>
