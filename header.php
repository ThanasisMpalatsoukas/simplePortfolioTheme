<?php
/**
 *
 * This is the template for the header
 *
 * @package perfectPortfolio
 **/

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url"           content="<?php global $wp;echo esc_url( home_url( $wp->request ) ); ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Check my wordpress website" />
    <meta property="og:description"   content="" />
    <meta property="og:image"         content="<?php global $wp;echo esc_url( home_url( $wp->request ) ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>

    <?php wp_head(); ?>

  </head>
  <body <?php $class = ""; if( is_single() ){ $class = "single-body"; } body_class( $class ); ?>>
