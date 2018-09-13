<?php
/**
 *
 * This template generates the testimonials inside the front-page.php file.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>

<div class="testimonials-bg" id="testimonial<?php echo intval( $current ); ?>" >

  <?php if( has_post_thumbnail() ) : ?>
  <div class="circle-container" id="testimonial<?php echo intval( $current ); ?>pic">

    <div class="circle background-image" style="background-image:url('<?php echo esc_attr( get_the_post_thumbnail_url() ); ?>');">
    </div>
  </div>
  <p class="special-p"><?php echo esc_html( get_the_content() ); ?></p>
  <h4><i><?php the_title(); ?></i></h4>

  <?php else: ?>

  <p class="special-p-noimg"><?php echo esc_html( get_the_content() ); ?></p>
  <h4><i><?php the_title(); ?></i></h4>

  <?php endif; ?>

</div><!-- .container-fluid -->
