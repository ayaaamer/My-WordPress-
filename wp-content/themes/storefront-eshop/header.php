<?php
/**
 * Header file for the Storefront Eshop WordPress theme.
 * @package Storefront Eshop
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
  <?php if( get_theme_mod('storefront_eshop_theme_loader',false) == 1 ) { ?>
    <div class="preloader">
      <div class="loader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
  <?php }?>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
if( function_exists('wp_body_open') ){
    wp_body_open();
}
$storefront_eshop_default = storefront_eshop_get_default_theme_options(); ?>

<div id="storefront-eshop-page" class="storefront-eshop-hfeed storefront-eshop-site">
<a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e('Skip to the content', 'storefront-eshop'); ?></a>

<?php
    get_template_part( 'template-parts/header/header', 'layout' );
?>

<div id="content" class="site-content">