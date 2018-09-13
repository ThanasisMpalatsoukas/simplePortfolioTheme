<?php
/**
 *
 * This is the template for the portfolio custom post type
 *
 * ---------------------
 *   INFO:
 *
 *    To create the side images you need to post the images on the
 *    content area of the theme and the pictures will automatically
 *    get into the side image format.
 *
 * ---------------------
 *
 * @package perfectPortfolio
 *
 * Template Name: side image
 * Template Post Type: portfolio
 **/

?>
<?php
get_header();
while ( have_posts() ) : the_post();
?>

<div class="side-image">
	<div class="my-container back-button" style="padding-left:25px;" >
		<a href='<?php echo esc_url( get_home_url() . '#portfolio' ); ?>' >
			<div class="back background-image" style="background-image:url( '<?php echo esc_attr( get_template_directory_uri() . '/img/back.png' ); ?>' )">
			</div><!-- .back .background-image -->
			<p>BACK</p>
		</a>
	</div><!-- .my-container .back-button -->
	<div class="my-container">
		<div class="row">

		  <div class="col-lg-12 brief ">
				<h1>

				<?php the_title(); ?>

				</h1>
				<h2>
				<?php


				// Echo the categories of this portfolio post.
				$taxonomy = 'portfolio_categories';
				$terms = get_the_terms( get_the_ID(),$taxonomy ); // Get all terms of a taxonomy.


				if ( $terms && ! is_wp_error( $terms ) ) :

				?>

				<?php

				foreach ( $terms as $term ) {

					esc_html( $term->name );

				}

				?>

				<?php endif;  ?>

				</h2>
				<div class="right-image">
				<?php


				// Strip all content from the images and echo the content.
				$content = get_the_content();
				preg_match_all( "/<img\s[^>]*?src\s*=\s*['\"]([^'\"]*?)['\"][^>]*?>/", $content, $images );
				$i = 0;
				foreach ( $images[1] as $image_src ) :
					?>
					<div class="background-image images" style="background-image:url( <?php echo esc_attr( $images[1][ $i ] ); ?> )">

					</div>
					<?php
					$i++;
				endforeach;

					?>
				</div><!-- .right-image -->
				<?php


				// Strip all content from the text and store the.
				// images url inside the $image variable.
				stripFromAttachments_filter( get_the_content() , 'image' );

				?>
				<h3>Details</h3>
				<?php
				$value = get_post_meta( $post->ID , '_choices_amount' , true );
				get_side_image_portfolio_details( $value,$post->ID );
				?>
			</div><!-- .col-lg-12 -->
		</div><!-- .row -->
	</div><!-- .my-container -->

	<div class="container">
		<div class="row">
		  <div class="col-lg-4 col-5">

				<?php
				if ( isset( $_GET['category'] ) ) :
					get_last_link_of_portfolio( $post->ID , 'portfolio_categories',sanitize_text_field( wp_unslash( $_GET['category'] ) ) );
				endif;
				?>

		  </div><!-- .col-lg-4 .col-5 -->
		  <div class="col-lg-4 col-2">



		  </div><!-- .col-lg-4 .col-2 -->
		  <div class="col-lg-4 col-5">

				<?php
				if ( isset( $_GET['category'] ) ) :
					get_next_link_of_portfolio( $post->ID , 'portfolio_categories',sanitize_text_field( wp_unslash( $_GET['category'] ) ) );
				endif;
				?>


		  </div><!-- .col-lg-4 .col-5 -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!--custom-page-t1 -->

<?php
endwhile;
