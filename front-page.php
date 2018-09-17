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
		<?php
		$front_page_template = get_option( 'content_front_page_template' );
		if( isset( $front_page_template ) ):
		    get_template_part( 'templateparts/front-page/'. $front_page_template );
		else :
		    get_template_part( 'templateparts/front-page/default.php' );
		endif;
		?>
    <div class="most-information" >
      <div class="container-fluid" id="most-information-all">
        <div class="row">

          <div class="col-lg-6 objectives showUp" id="text1">

            <h2 class="showup-information" id="objectives"><span><?php echo esc_html_e( 'OBJECTIVES'  , 'simplePortfolio' ); ?></span></h2>

            <p class="showup-information-p"><?php echo esc_html( get_option( 'content_objectives' ) ); ?></p>

          </div><!-- .col-lg-6 .objectives -->

          <div class="col-lg-6 objectives showUp" id="text2">

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

		<?php
		$testimonials_bg = get_option( 'content_testimonials_bg' );
		if ( isset( $testimonials_bg	) && '' != $testimonials_bg	) :
		?>
    <div class="testimonials container-fluid  background-image show-up-testimonials" id="testimonials" style="background-image:url('<?php getImage( 'content_testimonials_bg' , '' ); ?>');">
		<?php
		else:
		?>
		<div class="testimonials container-fluid  background-image show-up-testimonials" id="testimonials" style="background-color:#c0392b;">
		<?php
		endif;
		?>
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

            <h2 id="portfolio"><?php echo esc_html_e( 'PORTFOLIO'  , 'simplePortfolio' ); ?></h2>


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



                      <?php


											set_query_var('category' , 'All');
											set_query_var('max' , $loop->max_num_pages);
											set_query_var('page' , 1);

											$portfolio_template = get_option('content_portfolio_template');

											if( ! isset( $portfolio_template ) ) :
												get_template_part( 'templateparts/portfolio/default' );
											else :
												get_template_part( 'templateparts/portfolio/' . $portfolio_template );
											endif;

											?>


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

						<?php
						$blog_background = get_option( 'content_blog_bg_2'	);
						if( ! isset( $blog_background ) && '' != $blog_background	) :
						?>
				    <div class="blog container-fluid background-image"  style="background-image:url('<?php echo esc_attr( esc_url( getImage( 'content_blog_bg_2' , '' ) ) ); ?>')">
						<?php
						else :
						?>
						<div class="blog container-fluid background-image" style="background-color:#3498db;">
						<?php
						endif;
						?>
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

			          <?php $i++; endwhile; ?>
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
