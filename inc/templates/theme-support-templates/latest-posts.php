<?php
/**
 *
 * This is the tempalte for getting the latest posts in a <p> format.
 *
 * @package perfectPortfolio
 * @since perfectPortfolio 1.1.1
 **/

?>
<?php

  $args = array(
		'post_type'       => 'blog',
		'posts_per_page' 	=> 4,
	);
  $loop = new WP_Query( $args ); $i = 1;
  if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();

?>

  <p><a href="<?php echo esc_attr( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></p>

<?php
  endwhile;
  endif;

?>
