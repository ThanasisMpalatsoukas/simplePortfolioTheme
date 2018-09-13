<?php
/**
 *
 * This is the front page of the theme
 * ---------------------
 *   INFO:
 *
 *   To make the theme work properly you need to set the
 *   settings > reading , to static page and assign a random page
 *   as front-page
 *
 * ---------------------
 *
 * @package perfectPortfolio
 **/

?>

<?php get_header(); ?>

<main role="main">
	<header role="banner">
		<input type="hidden" id="loading" name="loading" value="<?php echo esc_attr( get_option( 'content_loading' ) ); ?>">
		<div class="loading-dot">
		  <h2><?php echo esc_html_e( 'Loading'  , 'simplePortfolio' ); ?>...</h2>
		  <div class="simple-box">
				<div class="simple-dot simple-1">

				</div><!-- .simple-dot .simple-1 -->
				<div class="simple-dot simple-2">

				</div><!-- .simple-dot .simple-2 -->
				<div class="simple-dot simple-3">

				</div><!-- .simple-dot .simple-3 -->
				<div class="simple-dot simple-4">

				</div><!-- .simple-dot .simple-4 -->
		  </div><!-- .simple-box -->
		</div><!-- .loading-dot -->

		<div class="big-menu text-center">
			<div class="exit-button background-image" style="background-image:url('<?php echo esc_attr( get_template_directory_uri() . '/img/cancel.png' ); ?>')">

			</div>
			<div class="row">
				<div class="col-lg-12 menu-container">
					<a class="big-menu-button" href="<?php echo '#objectives'; ?>"><?php echo esc_html_e( 'ABOUT ME'  , 'simplePortfolio' ); ?></a>
				</div><!-- .col-lg-12 -->
				<?php
				$content_testimonials = get_option( 'content_testimonials' );

		    if ( isset( $content_testimonials ) && 1 == $content_testimonials ) :
				?>
				<div class="col-lg-12 menu-container">
					<a class="big-menu-button" href="<?php echo '#testimonials'; ?>"><?php echo esc_html_e( 'TESTIMONIALS'  , 'simplePortfolio' ); ?></a>
				</div><!-- .col-lg-12 -->
				<?php
				endif;

				$content_portfolio = get_option( 'content_portfolio' );

		    if ( isset( $content_portfolio ) && 1 == $content_portfolio ) :
				?>
				<div class="col-lg-12 menu-container">
					<a class="big-menu-button" href="<?php echo '#portfolio'; ?>"><?php echo esc_html_e( 'PORTFOLIO'  , 'simplePortfolio' ); ?></a>
				</div><!-- .col-lg-12 -->
				<?php
				endif;

				$content_portfolio = get_option( 'content_blog' );

		    if ( isset( $content_portfolio ) && 1 == $content_portfolio ) :
				?>
				<div class="col-lg-12 menu-container">
					<a class="big-menu-button" href="<?php echo '#blog-posts'; ?>"><?php echo esc_html_e( 'BLOG'  , 'simplePortfolio' ); ?></a>
				</div><!-- .col-lg-12 -->
				<?php
				endif;
				$contact = get_option( 'content_contact' );

				if ( isset( $contact ) && 'checked' == $contact ):
				?>
				<div class="col-lg-12 menu-container">
					<a class="big-menu-button" href="<?php echo '#contact-me'; ?>"><?php echo esc_html_e( 'CONTACT ME'  , 'simplePortfolio' ); ?></a>
				</div><!-- .col-lg-12 -->
				<?php endif; ?>
			</div><!-- .row -->
		</div><!-- .big-menu -->

		<div class="front-page-top container-fluid">
			<div class="row">
				<div class="col-lg-12 menu-icon-container">
					<div class="menu-icon">
						<div class="menu-icon-picture background-image" style="background-image:url('<?php echo esc_attr( get_template_directory_uri() . '/img/menu.png' ); ?>')">

						</div><!-- .menu-icon-picture .background-image -->
					</div><!-- .menu-icon -->
				</div><!-- .col-lg-12 -->
				<div class="phone-container">
				  <div class="email-png background-image" style="background-image:url('<?php echo esc_attr( get_template_directory_uri() . '/img/call.png' ); ?>')">

				  </div><!-- .email-png .background-image -->
				  <p><?php echo esc_html( get_option( 'phone_number' ) ); ?></p>
				</div>
				  <div class="email-container">
						<div class="email-png background-image" style="background-image:url( '<?php echo esc_attr( get_template_directory_uri() . '/img/message.png' ); ?>')">

						</div><!-- .email-png .background-image -->
						<p><?php echo esc_html( get_option( 'email' ) ); ?></p>
				  </div>
				</div><!-- .col-lg-4 -->
			</div><!-- .row -->
		</div><!-- .front-page-top .container-fluid -->
		<div class="front-page-upper-header container-fluid">
			<div class="row">
				<div class="col-lg-3 logo-outter-container">

					<div class="logo-container text-center">

						<?php

						if ( get_option( 'content_logo' ) != '' && ! empty( get_option( 'content_logo' ) ) ) :

						?>

						<div class="logo background-image" style="background-image:url( '<?php echo esc_attr( get_option( 'content_logo' ) ); ?>' )">
						</div><!-- .logo -->

						<?php

						endif;

						?>

						<h2 style="color:#000;">
						<?php

						echo esc_html( get_bloginfo( 'name' ) );

						?>
						</h2>
						<h3 style="color:#000;">

						<?php

						echo esc_html( get_bloginfo( 'description' ) );

						?>
						</h3>
					</div><!-- .logo-container -->

				</div><!-- .col-lg-6 .logo-container -->
				<div class="col-lg-3 col-12 offset-lg-5 offset-0">
					<div class="social-links-container">

						<?php if ( get_option( 'facebook_checkbox' ) ) : ?>

						<div class="link">
							<a href="<?php echo esc_attr( get_option( 'facebook_link' ) ); ?>">
								<div class="facebook-link background-image" style="background-image:url('<?php echo esc_attr( get_template_directory_uri() . '/img/facebook-b.png' ); ?>')">

								</div>
							</a>
						</div>

						<?php endif; ?>

						<?php if ( get_option( 'twitter_checkbox' ) ) : ?>

						<div class="link">
							<a href="<?php echo esc_attr( get_option( 'twitter_link' ) ); ?>">
								<div class="facebook-link background-image" style="background-image:url('<?php echo esc_attr( get_template_directory_uri() . '/img/twitter-b.png' ); ?>')">

								</div>
							</a>
						</div>

						<?php endif; ?>

						<?php if ( get_option( 'linkedin_checkbox' ) ) : ?>

						<div class="link">
							<a href="<?php echo esc_attr( get_option( 'linkedin_link' ) ); ?>">
								<div class="facebook-link background-image" style="background-image:url('<?php echo esc_attr( get_template_directory_uri() . '/img/linkedin-b.png' ); ?>')">

								</div>
							</a>
						</div>

						<?php endif; ?>

						<?php if ( get_option( 'instagram_checkbox' ) ) : ?>

						<div class="link">
							<a href="<?php echo esc_attr( get_option( 'instagram_link' ) ); ?>">
								<div class="facebook-link background-image" style="background-image:url('<?php echo esc_attr( get_template_directory_uri() . '/img/instagram-b.png' ); ?>')">

								</div>
							</a>
						</div>

						<?php endif; ?>

					</div><!-- .social-links-container -->
				</div><!-- .col-lg-6 -->
			</div><!-- .row -->
		</div><!-- .front-page-upper .container-fluid -->

		<div class="front-page-container">
			<div class="front-page container-fluid">
				<div class="row">
					<div class="container-fluid header-photo background-image" style="background-image:url('<?php getImage( 'content_main_page_bg' , 'main.jpg' ); ?>');">
						<div style="width:100%;">
							<h1 id="first-name"><?php echo esc_html( get_option( 'first_name' ) ); ?></h1>
						</div>

						<?php

						/*
						* Show the prtfolie picture if its active
						*/
						$profile_picture = esc_html( get_option( 'profile_picture' ) );
						if ( isset( $profile_picture ) && '' != $profile_picture ) {
						?>


						<div class="col-lg-6 col-md-12 profile-picture-outside">

							<div class="profile-picture-container">
								<div class="profile-picture background-image" style="background-image:url('<?php getImage( 'profile_picture' , 'profile.jpg' ); ?>');">

								</div><!-- .profile-picture .background-image -->
							</div><!-- .profile-picture-container -->

						</div><!-- col-lg-6 .col-md-12 .prtfolie-picture-outside -->

						<div class="col-lg-6 col-md-12 col-sm-12 col-12 profile-text-container">

						  <div class="profile-text">
								<p id="profile-text-p"></p>
								<input type="hidden"id="profile-text-animation-timer" value="
								<?php

								$timer = get_option( 'profile_brief_keyboard_animation_timer' );
								if ( isset( $timer ) ) :
									echo esc_attr( $timer );
								else :
									echo 200;
								endif;
								?>">

								<input type="hidden" id="profile-hidden-text" value="<?php  echo esc_attr( get_option( 'profile_brief' ) ); ?>">
								<input type="hidden" id="profile-text-animation" value="<?php echo esc_attr( get_option( 'profile_brief_keyboard_animation' ) ); ?>">
						  </div><!-- .profile-text -->

						</div><!-- col-lg-6 -->
						<?php
						} // End if().
						else {
						?>

						<div class="col-lg-12 profile-text-container-full col-12">
							<div class="profile-text">
								<p id="profile-text-p"></p>
								<input type="hidden" name="" id="profile-text-animation-timer" value="
								<?php
								$timer = esc_html( get_option( 'profile_brief_keyboard_animation_timer' ) );
								if ( isset( $timer ) ) :
									echo esc_attr( get_option( 'profile_brief_keyboard_animation_timer' ) );
								else :
									echo 200;
								endif;
								?>">
								<input type="hidden" id="profile-hidden-text" value="<?php  echo esc_attr( get_option( 'profile_brief' ) ); ?>">
								<input type="hidden" id="profile-text-animation" value="<?php echo esc_attr( get_option( 'profile_brief_keyboard_animation' ) ); ?>">
							</div><!-- .profile-text -->
						</div><!-- col-lg-12 .profile-text-container-full -->
						<?php
								}
						?>
						<a href="#most-information-all">
							<div style="width:100%">
								<p class="more-info"><?php echo esc_html_e( 'Click below to see more'  , 'simplePortfolio' ); ?></p>
								<div class="background-image triangle" style="background-image:url('<?php echo esc_attr( get_template_directory_uri() . '/img/icon.png' ); ?>')">

								</div><!-- .background-image .triangle -->
							</div>
						</a>
					</div><!--container-fluid -->
				</div><!--row -->
			</div><!--front-page -->
		</header>
    <div class="most-information" >
      <div class="container-fluid" id="most-information-all">
        <div class="row">

          <div class="col-lg-6 objectives">

            <h2 class="showup-information" id="objectives"><span><?php echo esc_html_e( 'OBJECTIVES'  , 'simplePortfolio' ); ?></span></h2>

            <p class="showup-information-p"><?php echo esc_html( get_option( 'content_objectives' ) ); ?></p>

          </div><!-- .col-lg-6 .objectives -->

          <div class="col-lg-6 objectives">

            <h2 class="showup-information"><span><?php echo esc_html_e( 'ABOUT ME'  , 'simplePortfolio' ); ?></span></h2>

            <p class="showup-information-p"><?php echo esc_html( get_option( 'content_aboutme' ) ); ?></p>

          </div><!-- .col-lg-6 .objectives -->

        </div><!-- row -->
      </div><!-- .container-fluid -->

    </div><!-- .most-information -->

    <?php

    /*
    * Show the testimonials if its selected
    */
    $content_testimonials = get_option( 'content_testimonials' );

    if ( isset( $content_testimonials ) && 1 == $content_testimonials ) :
		?>

    <div class="testimonials container-fluid  background-image show-up-testimonials" id="testimonials" style="background-image:url('<?php getImage( 'content_testimonials_bg' , 'testimonials.jpg' ); ?>');">
      <div class="left-triangle background-image" style="background-image:url('<?php echo esc_attr( get_template_directory_uri() . '/img/icon.png' ); ?>');">

      </div><!-- .left-triangle .background-image -->

      <div class="right-triangle background-image" style="background-image:url('<?php echo esc_attr( get_template_directory_uri() . '/img/icon.png' ); ?>');">

      </div><!-- .right-triangle .background-image -->
      <h2><?php echo esc_html_e( 'TESTIMONIALS'  , 'simplePortfolio' ); ?></h2>
      <?php

      $args = array(
				'post_type' => 'testimonials',
			);

      $loop = new WP_Query($args); $i = 1;

      if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) : $loop->the_post();
          testimonialsTemplate( $i );
          $i++;
        endwhile;
      ?>
        <div class="dots">
        <?php

        for ($j = 1; $j<$i; $j++ ) :

				?>
	        <div id="dot<?php echo intval( $j ); ?>" data-number="<?php echo intval( $j ); ?>" class="dot-inside">
	          <div>

	          </div>
	        </div><!-- #dot -->
				<?php

        endfor;

        ?>
        </div><!-- .dots -->
        <?php

        else :

	        ?>
	        <h2 style="margin-top:50px;padding-left:50px;padding-right:50px;"><?php echo esc_html_e( 'PLEASE MAKE A POST IN THE TESTIMONIALS TO MAKE IT SHOW UP HERE OR DEACTIVATE THE TESTIMONIALS OPTION'  , 'simplePortfolio' ); ?></h2>
	        <?php

        endif;

        ?>
        <?php

				wp_reset_postdata();

				?>



				<input type="hidden" id="numberOfImages" value="<?php echo intval( $i-1 ); ?>">
        </div><!-- .testimonials -->

        <?php endif; ?>
        <?php get_sidebar( 'services' ); ?>
        <?php

        /*
        * show the portfolio if its acitve
        */
        $content_testimonials = get_option( 'content_portfolio' );
        if ( isset( $content_testimonials ) && 1 == $content_testimonials ) : ?>

        <div class="portfolio">

          <div class="container-fluid">

            <h2 id="portfolio" ><?php echo esc_html_e( 'PORTFOLIO'  , 'simplePortfolio' ); ?></h2>


              <div class="categories">
                <ul class="categories-container">
                  <li class="chosen categories-single" data-id="0"><?php echo esc_html_e( 'All'  , 'simplePortfolio' ); ?></li>
                  <?php

                  $taxonomy = 'portfolio_categories';
                  $terms = get_terms( $taxonomy ); // Get all terms of a taxonomy.

                  if ( $terms && !is_wp_error( $terms ) ) :
                    foreach ( $terms as $term ) :

                  ?>
                  <li class="categories-single" data-id="<?php echo esc_attr( $term->term_id ); ?>"><?php echo esc_html( $term->name ); ?></li>
                  <?php

                    endforeach;
                  endif;

                  ?>

                    </ul>
                  </div><!-- .categories -->

                  <div class="my-container portfolio-container" style="position:relative;">
                    <div class="posts-container">
                      <div class="row">

                      <?php


                      $args = array(
                      	'post_type'       => 'portfolio',
                      	'posts_per_page'  =>'8',
                      	'paged' => ( get_query_var('page') ? get_query_var('page') : 1),
                      );

                      $loop = new WP_Query($args); $i = 1;

                      if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
                      portfolioTemplate( $i , wp_count_posts( 'portfolio' ) ); ?>



                      <?php $i++; ?>
                      <?php endwhile; ?>
										</div><!-- .row -->
                    <div class="container-fluid">
                      <div class="row">

                        <div class="col-lg-4">

                        <?php if ( $page != 1 ) : ?>
                          <div class="last-posts text-center">
                            <p><a class="btn btn-default last-page" data-max="<?php echo intval( $loop->max_num_pages ); ?>" data-page="1"><?php echo esc_html_e( 'LAST'  , 'simplePortfolio' ); ?></a></p>
                          </div><!-- .last-posts .text-center -->
                        <?php endif; ?>

                        </div><!-- .col-lg-4 -->

                        <div class="col-lg-4 text-center">
                          <div class="current-post">

                          </div><!-- .current-post -->
                        </div><!-- .col-lg-4 .text-center -->

                        <div class="col-lg-4">
                        <?php if ( $loop->max_num_pages != 1 ) : ?>
                          <div class="next-posts text-center">
                            <p><a class="btn btn-default next-page" data-max="<?php echo intval( $loop->max_num_pages ); ?>" data-page="1" ><?php echo esc_html_e( 'NEXT'  , 'simplePortfolio' ); ?></a></p>
                          </div>
                        <?php endif; ?>

                        </div><!-- .col-lg-4 -->

                      </div><!-- .col-lg-4 -->
                    </div><!-- .container-fluid -->
                    <?php else : ?>
                        <h2><?php echo esc_html_e( 'PLEASE POST A PORTFOLIO POST HERE OR DEACTIVE THE PORTFOLIO SECTION TOTALLY'  , 'simplePortfolio' ); ?></h2>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
									</div><!-- .container -->
			      		</div><!-- .container-fluid -->
			    		</div><!-- .portfolio -->
			   		</div>
					  <?php endif; ?>
					  <?php get_sidebar( 'skillbar' ); ?>
					  <?php

				    /*
				    * Show the blog if its activated
				    */

				    $content_blog = get_option('content_blog');

				    if ( isset( $content_blog ) && 1 == $content_blog ) : ?>
				    <div class="blog container-fluid background-image"  style="background-image:url('<?php echo esc_attr( esc_url( getImage( 'content_blog_bg_2' , '' ) ) ); ?>')">
				      <div class="white-space container-fluid">

				      </div><!-- .white-space .container-fluid -->
				      <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><h2><?php echo esc_html_e( 'VISIT MY BLOG'  , 'simplePortfolio' ); ?></h2></a>
				      <h3><?php echo esc_html_e( 'Get informed by the latest news of web development'  , 'simplePortfolio' ); ?></h3>
				      <div class="my-container some-posts">
				        <div class="row" id="blog-posts">
			          <?php


			          $args = array(
			          	'post_type'       => 'blog',
			           	'posts_per_page'  =>'3',
		            );
			 					$loop = new WP_Query($args); $i = 1;
							  if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

		              <div class="col-lg-4 col-md-12 col-sm-12 col-12">
		                <a href="<?php the_permalink(); ?>">
			                <div class="post">
			                  <div class="post-image background-image" style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url() ); ?>')">
			                    <div class="colored-icon">
			                      <p><?php echo esc_html_e( 'READ MORE'  , 'simplePortfolio' ); ?></p>
			                    </div><!-- .colored-icon -->
			                  </div><!-- .white-space .container-fluid-->
			                  <div class="post-content">
			                    <h3><?php the_category( ',' ); ?></h3>
			                    <h2><?php the_title(); ?></h2>
			                    <p><?php echo esc_html( excerpt( 15 ) ); ?></p>
			                  </div><!-- .post-content -->
			                </div><!-- .post -->
			              </a>
			            </div><!-- .col-lg-4 .col-md-12 .col-sm-12 .col-12 -->

			          <?php endwhile; ?>
			        <?php else: ?>
			          <h2><?php echo esc_html_e( ' PLEASE DEACITVATE THE BLOG SECTION OR INSERT POSTS TO IT '  , 'simplePortfolio' ); ?></h2>
			      <?php endif; ?>
			    </div><!-- .row #blog-posts -->
			  </div><!-- .my-container .some-posts -->
			</div><!-- .blog .container-fluid .background-image -->
		  <?php endif; ?>
  		<div class="hidden-x background-image" style="background-image:url('<?php echo esc_url( get_template_directory_uri() . '/img/close.png' ); ?>');">

  		</div><!-- .hidden-x .background-image -->

			<?php

			/*
			* This area will be displayed only if the contact-form-7 plugin is downloaded
			*/

			?>
			<?php
			$contact = get_option( 'content_contact' );

			if ( isset( $contact ) && 'checked' == $contact ):
			?>
		  <div class="container-fluid contact-me " id="contact-me">
		    <div class="contact-me-outter-container text-center">

		      <h2><?php echo esc_html_e( 'YOU CAN CONTACT ME RIGHT HERE'  , 'simplePortfolio' ); ?></h2>
		      <h3><?php echo esc_html_e( 'Dont be afraid to say hi'  , 'simplePortfolio' ); ?></h3>

		        <div class="contact-me-button text-center">
		          <p><?php echo esc_html_e( 'Contact me'  , 'simplePortfolio' ); ?></p>
		        </div><!-- .contact-me-button .text-center -->

		      <div class="form-style-5">
						<form class="contact-me-form" >
							<label for="email">Email (required)</label>
							<input type="email" id="form_email" name="email" value="" >
							<label for="full_name">Full Name (required)</label>
							<input type="text" id="form_name" name="full_name" value="" >
							<label for="message">Message (required | min:20 letters)</label>
							<textarea cols="5" id="form_message" rows="15" type="text" name="message" value="" ></textarea>
							<input type="submit" class="submit-email" value="Send the message!" />
							<p class="HappyMessage" style="display:none;border:1px solid green;">The message has successfully been sent!</p>
							<p class="sadMessage" style="display:none;border:1px solid red;">There has been an error with the message :( , try again later.</p>
						</form>
		        <?php //dynamic_sidebar( 'sidebar-2' ); ?>
		      </div><!-- .form-style-5 -->
		    </div><!-- .contact-me-outter-container .text-center -->
		  </div><!-- .contact-me .container-fluid -->
			<?php
			endif;
			?>
	</div><!-- .front-page-container -->
</main>

<?php get_footer(); ?>
