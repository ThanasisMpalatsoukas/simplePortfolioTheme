<?php
/**
 *
 *  This is the template for the footer
 *
 *  @package perfectPortfolio
 **/

?> 
<footer role="contentinfo">
	<div class="information-container">
		<div class="row">

			<div class="col-lg-4 contact-information">
				<h4><?php echo esc_html_e( 'Contact information'  , 'simplePortfolio' ); ?></h4>
				<address style='opacity:0.8;'>
				<?php
				echo esc_html( get_option( 'first_name' ) );
				?>
				<br/>
				<?php
				echo esc_html( get_option( 'adress' ) );
				?>
				<br/>
				<?php
				echo esc_html( get_option( 'state' ) );
				?>
				<br/>
				<?php
				echo esc_html( get_option( 'country' ) );
				?>
				<br/>
				<?php
				echo esc_html( get_option( 'phone_number' ) );
				?>
				<br/>
				Email: <a href="<?php echo esc_html( get_option( 'email' ) ); ?>"><i><?php echo esc_html( get_option( 'email' ) ); ?></i></a><br/>
				</address>
			</div><!-- .col-lg-4 .contact-information -->
			<div class="col-lg-4 contact-information text-center">
				<h4><?php echo esc_html_e( 'useful links' , 'simplePortfolio'	); ?></h4>

				<?php
				$content_portfolio = get_option( 'content_portfolio' );

				if ( isset( $content_portfolio ) && 1 == $content_portfolio ) :
					if ( is_front_page() ) :
						$url = '#portfolio';
					else :
						$url = get_home_url( null,'?#portfolio' );
					endif;
					?>
					<p><a href="<?php echo esc_url( $url ); ?>"><i><?php echo esc_html_e( 'portfolio' , 'simplePortfolio' ); ?></i></a></p>
				<?php

				endif;

				?>

				<?php

				// Show the blog option on the footer if its active.
				$content_blog = get_option( 'content_blog' );

				if ( isset( $content_blog ) && 1 == $content_blog ) :
					if ( is_front_page() ) :
						$url = '#blog-posts';
					else :
						$url = get_home_url( null,'?#blog-posts' );
					endif;
				?>

				<p><a href="<?php echo esc_url( $url ); ?>"><i><?php echo esc_html_e( 'blog' , 'simplePortfolio'	); ?></i></a></p>

				<?php
				endif;
				?>

				<?php

				/*
				* Show the testimonials option on the footer if its active
				*/

				$content_testimonials = get_option( 'content_testimonials' );


				if ( isset( $content_testimonials ) && 1 == $content_testimonials ) :
					if ( is_front_page() ) :
						$url = '#testimonials';
					else :
						$url = get_home_url( null,'?#testimonials' );
					endif;
				?>

				<p><a href="<?php echo esc_url( $url ); ?>"><i><?php echo esc_html_e( 'testimonials' , 'simplePortfolio'	); ?></i></a></p>

				<?php

				endif;

				if ( is_front_page() ) :
					$url = '#most-information-all';
				else :
					$url = get_home_url( null,'?#most-information-all' );
				endif;
				?>

				<p><a href="<?php echo esc_url( $url ); ?>"><i><?php echo esc_html_e( 'about me' , 'simplePortfolio'	); ?></i></a></p>
		  </div><!-- .col-lg-4 .contact-information .text-center -->
		  <div class="col-lg-4 text-center latest-posts">
				<h4>Latest posts</h4>
				<?php
				the_latest_posts();
				?>
			</div><!-- .col-lg-4 .text-center .latest-posts -->

		</div><!-- .row -->
		<div class="social-media-personal">
			<div class="flex-space">

			</div><!-- .flex-space  -->
			<div class="flex-space">
			<?php
			if ( get_option( 'facebook_checkbox' ) ) : ?>
			  <a href="<?php echo esc_html( get_option( 'facebook_link' ) ); ?>">
					<div class="social-personal background-image" style="background-image:url(<?php echo esc_html( get_template_directory_uri() . '/img/facebook-b.png' ); ?>)">

					</div><!-- .social-personal .background-image -->
				</a>
			<?php endif; ?>
			<?php

			if ( get_option( 'linkedin_checkbox' ) ) : ?>
			  <a href="<?php echo esc_html( get_option( 'linkedin_link' ) ); ?>">
					<div class="social-personal background-image" style="background-image:url(<?php echo esc_html( get_template_directory_uri() . '/img/linkedin-b.png' ); ?>)">

					</div><!-- .social-personal .background-image -->
			  </a>
			<?php endif;

			?>
			<?php

			if ( get_option( 'twitter_checkbox' ) ) :

			?>
			<a href="<?php echo esc_html( get_option( 'twitter_link' ) ); ?>">
				<div class="social-personal background-image" style="background-image:url(<?php echo esc_html( get_template_directory_uri() . '/img/twitter-b.png' ); ?>)">

				</div><!-- .social-personal .background-image -->
			</a>
			<?php
			endif;

			if ( get_option( 'instagram_checkbox' ) ) : ?>
			<a href="<?php echo esc_html( get_option( 'instagram_link' ) ); ?>">
				<div class="social-personal background-image" style="background-image:url(<?php echo esc_html( get_template_directory_uri() . '/img/instagram-b.png' ); ?>)">

				</div><!-- .social-personal .background-image -->
			</a>
			<?php
			endif;
			?>
			</div><!-- .flex-space -->
			<div class="flex-space">

			</div><!-- .flex-space -->
		</div><!-- .social-media-personal -->
	</div><!-- .information-container -->
</footer>
<div class="copyright text-center">
  <p>@2018 <?php echo esc_html_e( 'Developed and designed by' , 'simplePortfolio'	); ?> thanasis mpalatsoukas <?php echo esc_html_e( 'all rights reserved' , 'simplePortfolio'	); ?></p>
</div><!-- .copyright .text-center -->
<?php wp_footer(); ?>

</body>
</html>
