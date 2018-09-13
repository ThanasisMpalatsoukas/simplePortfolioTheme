<?php
/**
 *
 * This template generates the portfolio posts on the front-page.php file in the start.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>

<?php if ( $current <= 4 && $current%2 == 1 ) : ?>

<div class="col-lg-3 col-md-12 col-12 col-sm-12 offset-lg-0 offset-md-0 offset-sm-0 offset-0 col-12 single-post">

  <div class="masonry">

    <div class="upper-photo background-image" style="background-image:url( '<?php echo esc_attr( get_the_post_thumbnail_url() ); ?>' )">
      <div class="inner-icon" style="display:none;">
        <div class="background-image eyes" style="background-image:url( '<?php echo esc_attr( get_template_directory_uri() . '/img/eye-close-up.png' ); ?>' );">

        </div>
        <h4><?php the_title(); ?></h4>
        <p><i>press to see more</i></p>
        <input type="hidden" class="portfolio_href" value="<?php esc_attr( the_permalink() ); ?>">
      </div>
    </div>
    <div class="job-title">
      <p><?php $str = strtoupper( get_the_title() ); echo esc_html( $str ); ?></p>
    </div>

  </div>

</div><!-- .col-lg-3 -->
<?php endif; ?>

<?php if ( $current <= 4 && $current%2 == 0 ) : ?>

  <div class="col-lg-3 col-md-12 col-12 col-sm-12 offset-lg-0 offset-md-0 offset-sm-0 offset-0 col-12  single-post-e">

    <div class="masonry">

      <div class="upper-photo background-image" style="background-image:url( '<?php echo esc_html( get_the_post_thumbnail_url() ); ?>' )">
        <div class="inner-icon" style="display:none;">
          <div class="background-image eyes" style="background-image:url( '<?php echo esc_html( get_template_directory_uri() . '/img/eye-close-up.png' ); ?>' );">

          </div>
          <h4><?php the_title(); ?></h4>
          <p><i>press to see more</i></p>
          <input type="hidden" class="portfolio_href" value="<?php the_permalink(); ?>">
        </div>
      </div>
      <div class="job-title">

      </div>

    </div>

  </div><!-- .col-lg-3 -->

<?php endif; ?>

<?php if ( $current <= 8 && $current > 4 && $current%2 == 1 ) : ?>

  <?php if ( $current == 5 ) : ?>
  </div>
  <div class="row">

  <div class="col-lg-3 col-md-12 col-12 col-sm-12 offset-lg-0 offset-md-0 offset-sm-0 offset-0 col-12  single-post-s-e">

    <div class="masonry">

      <div class="upper-photo background-image" style="background-image:url( '<?php  echo esc_attr( get_the_post_thumbnail_url() ); ?>' )">
        <div class="inner-icon" style="display:none;">
          <div class="background-image eyes" style="background-image:url( '<?php echo esc_attr( get_template_directory_uri() . '/img/eye-close-up.png' ) ?>' );">

          </div>
          <h4><?php the_title(); ?></h4>
          <input type="hidden" class="portfolio_href" value="<?php the_permalink(); ?>">
          <p><i>press to see more</i></p>
        </div>
      </div>
      <div class="job-title">

      </div>

    </div>

  </div><!-- .col-lg-3 -->

  <?php else: ?>

    <div class="col-lg-3 col-md-12 col-sm-6 col-12 col-sm-12 offset-lg-0 offset-md-0 offset-sm-0 offset-0 col-12  single-post-s-e">

      <div class="masonry">

        <div class="upper-photo background-image" style="background-image:url( '<?php  echo esc_attr( get_the_post_thumbnail_url() ); ?>' )">
          <div class="inner-icon" style="display:none;">
            <div class="background-image eyes" style="background-image:url( '<?php echo esc_attr( get_template_directory_uri() . '/img/eye-close-up.png' ) ?>' );">

            </div>
            <h4><?php the_title(); ?></h4>
            <p><i>press to see more</i></p>
            <input type="hidden" class="portfolio_href" value="<?php the_permalink(); ?>">
          </div>
        </div>
        <div class="job-title">

        </div>

      </div>

    </div><!-- .col-lg-3 -->

  <?php endif; ?>
  <?php endif; ?>

<?php if ( $current <= 8 && $current > 4  && $current%2 == 0 ) : ?>

  <div class="col-lg-3 col-md-12 col-12 col-sm-12 offset-lg-0 offset-md-0 offset-sm-0 offset-0 col-12 single-post-s">

    <div class="masonry">

      <div class="upper-photo background-image" style="background-image:url( '<?php  echo esc_attr( get_the_post_thumbnail_url() ); ?>' )">
        <div class="inner-icon" style="display:none;">
          <div class="background-image eyes" style="background-image:url( '<?php echo esc_attr( get_template_directory_uri() . '/img/eye-close-up.png' ) ?>' );">

          </div>
          <h4><?php the_title(); ?></h4>
          <p><i>press to see more</i></p>
          <input type="hidden" class="portfolio_href" value="<?php the_permalink(); ?>">
        </div>
      </div>
      <div class="job-title">

      </div>

    </div>

  </div><!-- .col-lg-3 -->

<?php endif; ?>

<?php if ( $totalPosts->publish == $current ) : ?>

  </div>

<?php endif; ?>
