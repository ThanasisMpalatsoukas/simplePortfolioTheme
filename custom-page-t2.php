<?php
/**
 *
 * This is the template for the portfolio custom post type
 *
 * ---------------------
 *   INFO:
 *
 *    To create the gallery you need to post the images on the
 *    content area of the theme and the pictures will automatically
 *    get into the gallery format.
 *
 * ---------------------
 *
 * @package perfectPortfolio
 *
 * Template Name: Gallery
 * Template Post Type: portfolio
 **/

?>

<?php

get_header();
while ( have_posts() ) : the_post();

?>

<div class="side-image">
	<div class="my-container back-button" style="padding-left:25px;" >
		<a href="<?php echo esc_url( get_home_url() . '#portfolio' ); ?>">
			<div class="back background-image" style="background-image:url('<?php echo esc_attr( get_template_directory_uri() . '/img/back.png' ); ?>')">

			</div><!-- .back .background-image -->
			<p>BACK</p>
		</a>
	</div><!-- .side-image -->
	<div class="my-container">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-12 brief">
			<h1>
			<?php the_title(); ?>
			</h1>
			<h2>

			<?php

			$taxonomy = 'portfolio_categories';
			$terms = get_the_terms( get_the_ID(),$taxonomy ); // Get all terms of a taxonomy.

			if ( $terms && ! is_wp_error( $terms ) ) :

				foreach ( $terms as $term ) :

					esc_html( $term->name );

				endforeach;

			endif;

			?>

			</h2>
			<div class="right-image" data-interval="5">
				<div class="custom-carousel">
					<?php


					// Strip the content from the images.
					$content = get_the_content();
					preg_match_all( "/<img\s[^>]*?src\s*=\s*['\"]([^'\"]*?)['\"][^>]*?>/", $content, $images );
					$i = 1;
					foreach ( $images[1] as $image_src ) :

						if ( 1 == $i ) :
							$active = 'active';
						else :
							$active = '';
						endif;

					?>

					<div class="cc<?php echo intval( $i ); ?> cc background-image <?php echo esc_html( $active ); ?>" data-carousel='<?php echo intval( $i ); ?>' style="background-image:url( '<?php echo esc_attr( $images[1][ $i - 1 ] ); ?>' )">
						<div>

						</div>
					</div><!-- .cc .background-image -->

					<?php
					$i++;
					endforeach;
					?>
				</div><!-- .custom-carousel -->

			</div><!-- .right-image -->
			<?php stripFromAttachments_filter( get_the_content() , 'image' ); ?>

			<h3>Details</h3>
			<?php

			$value = get_post_meta( $post->ID , '_choices_amount' , true );
			get_side_image_portfolio_details( $value,$post->ID );

			?>



			</div>
		</div><!-- .row -->
	</div><!-- .my-container -->

	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-5">

			<?php
			if ( isset( $_GET['category'] ) ) :
				$category = sanitize_text_field( wp_unslash( $_GET['category'] ) );
				get_last_link_of_portfolio( $post->ID , 'portfolio_categories', $category );
			endif;
			?>

			</div><!-- .col-lg-4 .col-5 -->
			<div class="col-lg-4 col-2">

			</div><!-- .col-lg-4 .col-2 -->
			<div class="col-lg-4 col-5">

			<?php
			if ( isset( $_GET['category'] ) ) :
				$category = sanitize_text_field( wp_unslash( $_GET['category'] ) );
				get_next_link_of_portfolio( $post->ID , 'portfolio_categories', $category );
			endif;
			?>

			</div><!-- .col-lg-4 .col-5 -->
		</div><!-- .row -->
	</div><!-- .container -->

</div><!--custom-page-t2 -->

<?php
endwhile;
?>
