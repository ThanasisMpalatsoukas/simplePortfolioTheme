<?php
/**
 *
 * This template generates the blog posts in the front-page.php file.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>
<div class="col-lg-4 col-md-12 col-sm-12 col-12">
  <a href="<?php the_permalink(); ?>">
  <div class="post">
    <div class="post-image background-image" style="background-image:url('<?php echo esc_attr( get_the_post_thumbnail_url() ); ?>')">
      <div class="colored-icon">
        <p><?php esc_html_e( 'READ MORE' , 'simplePortfolio' ); ?></p>
      </div>
    </div>
    <div class="post-content">
      <h3><?php the_category( ',' ); ?></h3>
      <h2><?php the_title(); ?></h2>
      <p><?php echo esc_attr( excerpt( 15 ) ); ?></p>
    </div>
  </div>
</a>
</div>
