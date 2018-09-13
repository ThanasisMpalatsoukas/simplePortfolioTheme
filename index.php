<?php
/**
 *
 *  This is the page that displays the posts.
 *
 *  @package PortfolioTheme
 **/

?>
<?php
get_header();
?>

<div class="blogMain clearfix">
  <div class="my-container">
    <div class="row">

      <div class="col-lg-9 col-12 header">
       <a href="<?php echo esc_url( get_home_url() . '/#blog-posts' ); ?>">
       <?php if ( get_option( 'content_logo' ) ) : ?>
           <div class="home-icon background-image" style="background-image:url('<?php echo esc_attr( get_option ( 'content_logo' ) ); ?>')">

           </div><!-- .home-icon .background-image -->
       <?php else: ?>
         <div class="home-icon background-image">
           <h3><?php echo esc_html_e( 'Home'  , 'simplePortfolio' ); ?></h3>
         </div><!-- .home-icon .background-image -->
       <?php endif; ?>
       </a>
     </div><!-- .col-lg-12 .col-lg-9 .header -->


      <div class="col-lg-3 col-md-3 col-3">

      </div><!-- .col-lg-3 .col-md-3 .col-3 -->

      <div class="col-lg-5 col-md-12 col-12 headerContainer">
        <h1><?php echo esc_html_e( 'My personal blog'  , 'simplePortfolio' ); ?></h1>
        <h2><?php echo esc_html_e( 'Our everyday thoughts are presented here Case studies, video presentations and photo-shootings below.'  , 'simplePortfolio' ); ?></h2>
      </div><!-- .col-lg-5 .col-md-12 .col-12 .headerContainer -->

      <?php

      /*
      * If someone has clicked a category the "blog/category" is displayed on the page
      * @since v1.1.1
      */

      $category = get_category( get_query_var( 'cat' ) );
      if ( empty( $category->errors ) ){

        $page_for_posts = get_permalink( get_option( 'page_for_posts' ) );

        echo '<div class="col-lg-3 offset-4 whereweare">
                <h4><a href="'.esc_url( $page_for_posts ).'">blog</a>/<span style="opacity:0.7;"><a href="'.esc_url( get_home_url() ).'?cat='.intval( $category->term_id ).'">'.esc_html( $category->name ).'</a></span></h4>
              </div>';
      }

      /*
      * If someone has clicked a tag the "blog/tag" is displayed on the page
      * @since v1.1.1
      */

      $tag =  get_query_var( 'tag' ) ;
      if ( ! empty( $tag ) ){

        $page_for_posts = get_permalink( get_option( 'page_for_posts' ) );

        echo '<div class="col-lg-3 offset-4 whereweare">
                <h4><a href="'.esc_url( $page_for_posts ).'">blog</a>/<span style="opacity:0.7;"><a href="'.esc_url( get_home_url() ).'?tag='.esc_html( $tag ).'">'.esc_html( $tag ).'</a></span></h4>
              </div>';
      }
      ?>

      <div class="col-lg-9 col-md-12 col-12">

        <?php

        /*
        *
        * if someone has clicked on a category the loop is showing the posts of that category.
        *
        * if someone has clicked on a tag (which is created with a custom-taxonomy) i show the posts with the coresponding tags
        *
        */

        $category = get_category( get_query_var( 'cat' ) );
        $tag = get_term_by( 'slug',get_query_var( 'tag' ),'tag' );
        if($tag!=''){
          $tax_query =  array(
						array(
							'taxonomy' 	=> 'tag',
							'field' 		=> 'term_id',
							'terms' 		=> $tag->term_id,
						)
					);
        }
        else{
          $tax_query = '';
        }

        $categoryId = '';
        if( isset( $category->term_id ) ):
          $categoryId = $category->term_id;
        endif;

        $args = array(
                      'post_type'       => 'blog',
                      'cat'             => $categoryId,
                      'tax_query'       => $tax_query ,
                      'posts_per_page' 	=> 6,
                      'paged'					  => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1
                      );
			 $loop = new WP_Query($args); $i = 1; ?>

      <?php
			if ( $loop->have_posts() ) :
				while ( $loop->have_posts() ) : $loop->the_post();
	 				get_template_part( 'templateparts/content', get_post_format() );
				endwhile;
      endif;
      wp_reset_query();
      ?>

      </div><!-- .col-lg-9 .col-md-12 col-12 -->

      <!-- HERE IS THE SIDEBAR WITH THE INFO FROM THE USER -->

			<?php

			/*
			* Show the prtfolie picture if its active
			*/
			$profile_picture = esc_html( get_option( 'profile_picture' ) );
			if ( isset( $profile_picture ) && '' != $profile_picture ) {
			?>

      <div class="col-lg-3 col-md-0 col-0">
        <div class="profile-container">
          <h3><i><?php echo esc_html( get_option( 'first_name' ) ); ?></i></h3>
          <div class="profile_picture background-image" style="background-image:url('<?php echo esc_attr( get_option( 'profile_picture' ) ); ?>')">

          </div><!-- .profile_picture .background-image -->
          <p><?php echo  esc_html( get_option( 'profile_brief' ) ); ?></p>
        </div><!-- .profile-container -->
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
      </div><!-- .col-lg-3 .col-md-0 .col-0 -->
			<?php
			}
			else{
			?>
      <div class="col-lg-3 col-md-0 col-0">
        <div class="profile-container" style="height:130px;">
          <h3><i><?php echo esc_html( get_option( 'first_name' ) ); ?></i></h3>
          <p style="margin-top:10px;"><?php echo  esc_html( get_option( 'profile_brief' ) ); ?></p>
        </div><!-- .profile-container -->
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
      </div><!-- .col-lg-3 .col-md-0 .col-0 -->
      <?php
			}

			/*
			*
			* A weird way to paginate.
			*
			*/

			$big = 999999999; // need an unlikely integer.
			?>
			<div class="col-lg-6 offset-3 text-center blog-pagination">
			<?php
			echo paginate_links( array(
			  'base'		 => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			  'format'	 => '?paged=%#%',
			  'current'	 => max( 1, get_query_var( 'paged' ) ),
			  'total' 	 => $loop->max_num_pages
			) );

			wp_reset_postdata();

			   ?>
    		</div><!-- .col-lg-6 .offset-3 .text-center .blog-pagination -->
      </div><!-- .row -->
    </div><!-- .my-container -->
  </div><!-- .my-container -->
</div><!-- .blogMain -->

<?php

get_footer();

?>
