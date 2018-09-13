<?php
/**
 *
 *  The single blog posts format .
 *
 *  @package simplePortfolio
 *  @since 1.0.0
 **/

?>
<?php

get_header();

?>

<div class="blogMain">
  <div class="my-container">
    <div class="row">

      <div class="col-lg-7 col-6 col-sm-6 header">
       <a href="<?php echo esc_attr( get_home_url() . '/#blog-posts' ); ?>">
         <div class="home-icon background-image" style="background-image:url('<?php echo esc_attr( get_option( 'content_logo' ) ); ?>')">

         </div>
       </a>
      </div><!-- .col-lg-7 .col-6 .col-sm-6 .header -->

      <div class="col-lg-5 col-sm-6 col-5">
        <a href="<?php $page_for_posts = get_permalink( get_option( 'page_for_posts' ) ); echo esc_attr( $page_for_posts ); ?>" >
          <div class="back-blog-container">

            <div class="background-image back-blog" style="background-image:url('<?php echo esc_attr( get_template_directory_uri() . '/img/back.png' ); ?>');">
            </div>
            <p>BACK</p>

          </div><!-- .back-blog-container -->
        </a>

      </div><!-- .col-lg-5 .col-sm-6 .col-5 -->

      <div class="col-lg-5 col-md-5 col-sm-12 col-12  headerContainer">
        <h1><?php echo esc_html( strtoupper( get_the_title() ) ); ?></h1>
        <h6><?php echo get_the_date(); ?></h6>
      </div><!-- .col-lg-5 .col-md-5 .col-sm-12 .col-12 .headerContainer -->

      <div class="col-lg-3 col-md-4 col-sm-12 col-12 offset-0 offset-sm-0 offset-md-3 offset-lg-4 whereweare">
        <h4><a href="<?php $page_for_posts = get_permalink( get_option( 'page_for_posts' ) ); echo esc_attr( $page_for_posts ); ?>">blog</a>/<span style="opacity:0.7;"><?php the_title(); ?></span></h4>
      </div><!-- .col-lg-3 .col-md-4 .col-sm-12 .col-12 .offset-0 .offset-sm-0 .offset-md-3 .offset-lg-4 .whereweare -->

      <div class="col-lg-8 col-md-9 col-12">

        <?php get_template_part( 'templateparts/blog/content', get_post_format() ); ?>

      </div><!-- .col-lg-8 .col-md-9 .col-12 -->

      <div class="col-lg-3 col-12 col-md-2 offset-0 offset-sm-0 offset-md-1 offset-lg-1 ">
        <div class="profile-container">
          <h3><i><?php echo esc_html(get_option( 'first_name' ) ); ?></i></h3>
          <div class="profile_picture background-image" style="background-image:url('<?php echo esc_attr( get_option( 'profile_picture' ) ); ?>')">

          </div><!-- .profile_picture .background-image -->
          <p><?php echo esc_html( get_option( 'profile_brief' ) ); ?></p>
        </div><!-- .profile-container -->
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
      </div><!-- .col-lg-3 .col-12 .col-md-2 .offset-0 .offset-sm-0 .offset-md-1 .offset-lg-1 -->

			<div class="col-lg-8">

      <?php

      if ( comments_open( get_the_ID() ) ) :

        /**
         *  Summary
         *
         *  The template for portfolio gallery format.
         *
         *  @package simplePortfolio
         *  @return Html $comments .
         *  @since 1.0.0
         **/
        function get_comments_now()
        {
                $comments = get_comments( array(
									'post_id' => get_the_ID() ,
									'status' => 'approve',
									)
								);
                $comments = wp_list_comments( array( 'style' => 'ol' ), $comments );
                return $comments;
        }

        comments_template();
        comment_form();
        paginate_comments_links();

    	endif;



      ?>
      <?php

      /*
      * Here is the links for the blog posts, connecting one with another
      */

     	$defaults = array(
    		'before'           => '<p>' . __( 'Pages:', 'simplePortfolio' ),
    		'after'            => '</p>',
    		'link_before'      => '',
    		'link_after'       => '',
    		'next_or_number'   => 'number',
    		'separator'        => ' ',
    		'nextpagelink'     => __( 'Next page', 'simplePortfolio'),
    		'previouspagelink' => __( 'Previous page', 'simplePortfolio' ),
    		'pagelink'         => '%',
    		'echo'             => 1
    	);

      echo wp_link_pages( $defaults );

			?>
			</div><!-- .col-lg-8 -->
		</div><!-- .row -->
	</div><!-- .my-container -->
</div><!-- .blogMain -->

<?php get_footer(); ?>
