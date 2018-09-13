<?php
/**
 *
 *  The template for portfolio standard format.
 *
 *  @package perfectPortfolio
 *  @since 1.0.0
 **/

?>
<div class="blog-image-container-default blog-container" >
  <div class="row">
    <div class="col-lg-5 col-5 col-md-6 col-sm-6 col-6 col-12">
      <div class="image-block background-image" style="background-image:url('<?php echo esc_attr( get_the_post_thumbnail_url() ); ?>')">
        <div class="overlay-default overlay">
          <a href="<?php the_permalink(); ?>">
            <p><?php echo esc_html_e( 'Click here to see more'  , 'simplePortfolio' ); ?></p>
          </a>
        </div>
        <div class="icon-default-container">
          <div class="icon-default background-image" style="background-image:url('<?php echo esc_attr( get_template_directory_uri(). '/img/text-document.png' ); ?>')">

          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-7 col-7 col-md-6 col-sm-6 col-6 col-12">
      <div class="main-text-container-default">
        <div class="main-text-default">
          <h2><?php the_title(); ?></h2>
          <p><?php  echo esc_html( excerpt( 50 ) ); ?></p>
          <div class="row">
            <div class="col-lg-1">
              <div class="date background-image"  style="background-image:url('<?php echo esc_attr( get_template_directory_uri(). '/img/calendar.png' ); ?>')">

              </div>
            </div>
            <div class="col-lg-4 col-7 date-text">
              <p><?php echo get_the_date(); ?></p>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-1">
              <div class="date background-image"  style="background-image:url('<?php echo esc_attr( get_template_directory_uri(). '/img/folder.png' ); ?>')">

              </div>
            </div>
            <div class="col-lg-4 col-7  date-text">
              <p><?php echo the_category( ',' ); ?></p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
