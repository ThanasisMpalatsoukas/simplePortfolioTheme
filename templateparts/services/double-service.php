<?php
/**
 *
 *  The format for 2 service widgets.
 *
 *  @package perfectPortfolio
 *  @since 1.0.0
 **/

?>
<div class="container-fluid single-service-container">
  <div class="row">
    <div class="col-lg-4 offset-lg-2">

      <div class="single-service">
        <div class="single-service-upper">
          <h2><?php echo esc_html( $title_1 ); ?></h2>
        </div>
        <div class="single-service-main-body">
          <p><?php echo esc_html( $description_1 ); ?>
          </p>
        </div>
      </div>

    </div>
    <div class="col-lg-4 mt-lg-0 mt-sm-4 mt-5">

      <div class="single-service">
        <div class="single-service-upper">
          <h2><?php echo esc_html( $title_2 ); ?></h2>
        </div>
        <div class="single-service-main-body">
          <p><?php echo esc_html( $description_2 ); ?>
          </p>
        </div>
      </div>

    </div>
  </div>
</div>
