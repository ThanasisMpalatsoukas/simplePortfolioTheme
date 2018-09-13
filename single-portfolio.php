<?php
/**
 *
 *  The single portfolio posts format .
 *
 *  @package perfectPortfolio
 *  @since 1.0.0
 **/

?>

<?php

get_header(); ?>

<div id="main-content" class="main-content">
	<main role="main" id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
    <?php
     // Start the Loop.
    while ( have_posts() ) : the_post();
		?>
    <div class="portfolio-content-background background-image" style="background-image:url('<?php echo esc_attr( get_post_meta( get_the_ID() , '_background_image_value_key' , true ) );?>');">
      <div class="back-button">
        <a href="<?php echo esc_attr( get_home_url() .'#portfolio' ); ?>">
          <div class="back background-image" style="background-image:url('<?php echo esc_attr( get_template_directory_uri() . '/img/icon.png'); ?>')">

          </div><!-- .back .background-image -->
          <p><?php echo esc_html_e( 'BACK'  , 'simplePortfolio' ); ?></p>
        </a>
      </div><!-- .back-button -->
      <div class="container-fluid text-center">
        <h1><?php the_title(); ?></h1>
        <p><?php echo esc_html( get_post_meta( get_the_ID() , '_secondary_text_value_key' , true ) );?></p>
      </div><!-- .container-fluid .text-center -->
    </div><!-- .portfoli-content-background .background-image -->
    <div class="brief-container">
      <div class="my-container" <?php if ( ! empty( $images[0] ) ){ echo 'style="border-bottom:1px solid grey"'; }   ?>>
        <div class="row">
          <div class="col-lg-12">
						<div class="details">
							<h2><?php echo esc_html_e( 'Details'  , 'simplePortfolio' ); ?></h2>
							<div class="row">
              <?php

              /*
              *   _choices_amount metabox holds the data of the amount of "more-details" the user has inputted.
              *   i input the data to the function to get a different format depending on amount of choices
              */

              $value = get_post_meta( $post->ID , '_choices_amount' , true );
              get_standard_portfolio_details( $value,$post->ID );

              ?>
              </div><!-- .row -->
            </div><!-- .detailes -->
            <div class="brief">
              <h2>Brief</h2>
              <?php

              /*
              *  Show the content without the images
              */

              stripFromAttachments_filter( get_the_content() , 'image' );
              ?>
            </div><!-- .brief -->
          </div><!-- .col-lg-12 -->
        </div><!-- .row -->
    	</div><!-- .my-container -->
    	<div class="my-container pictures-default">
      	<div class="row">

        <?php

        /*
        *   Show attachment images from the current post in the single-portfolio format
        */

        show_attachment_images( 'single-portfolio' );

        ?>

      	</div><!-- .row -->
      	<div class="row">
        	<div class="col-lg-4 col-4">

	          <?php
	          if ( isset( $_GET['category'] ) ) :
	            get_last_link_of_portfolio($post->ID , 'portfolio_categories', sanitize_text_field( wp_unslash( $_GET['category'] ) ) );
						endif;
	          ?>

	        </div><!-- .col-lg-4 .col-4 -->
	        <div class="col-lg-4 col-4">

	          <p class="categories-in-between" ><?php echo  esc_html( sanitize_text_field( wp_unslash( $_GET['category'] ) ) ); ?> </p>

	        </div><!-- .col-lg-4 .col-4 -->
	        <div class="col-lg-4 col-4">

	          <?php
	          if ( isset( $_GET['category'] ) ) :
	            get_next_link_of_portfolio($post->ID , 'portfolio_categories',sanitize_text_field( wp_unslash( $_GET['category'] ) ) );
						endif;
	          ?>
	        </div><!-- .col-lg-4 .col-4 -->
	      </div><!-- .row -->
	    </div><!-- .my-container .prtofile-container -->
	  </div><!-- .brief-container -->
	</main><!-- .site-containt -->
	<?php
	endwhile;
	?>
</div><!-- #main-content -->

<?php
