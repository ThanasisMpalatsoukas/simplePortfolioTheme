<?php
/**
 *
 *  NO social links on top.
 *
 *  @package perfectPortfolio
 *  @since 1.3.5
 **/

?>
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



	<div class="front-page-container">
		<div class="front-page container-fluid">
			<div class="row">
				<div class="container-fluid header-photo background-image" style="background-image:url('<?php getImage( 'content_main_page_bg' , 'main.jpg' ); ?>');">
					<div style="width:100%;">
						<h1 id="first-name"><?php echo esc_html( get_option( 'first_name' ) ); ?></h1>
					</div>
					<div class="col-lg-10 info-on-image">
						<div class="phone-container">
							<p><span>phone:</span></p>
							<p><?php echo esc_html( get_option( 'phone_number' ) ); ?></p>
						</div>
						<div class="email-container">
							<p><span>email:</span></p>
							<p><?php echo esc_html( get_option( 'email' ) ); ?></p>
						</div>
					</div><!-- .col-lg-4 -->
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
