<?php
/**
* Widget Functions.
*
* @package Storefront Eshop
*/

function storefront_eshop_widgets_init(){

	register_sidebar(array(
	    'name' => esc_html__('Main Sidebar', 'storefront-eshop'),
	    'id' => 'sidebar-1',
	    'description' => esc_html__('Add widgets here.', 'storefront-eshop'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));


    $storefront_eshop_default = storefront_eshop_get_default_theme_options();
    $storefront_eshop_footer_column_layout = absint( get_theme_mod( 'storefront_eshop_footer_column_layout',$storefront_eshop_default['storefront_eshop_footer_column_layout'] ) );

    for( $storefront_eshop_i = 0; $storefront_eshop_i < $storefront_eshop_footer_column_layout; $storefront_eshop_i++ ){
    	
    	if( $storefront_eshop_i == 0 ){ $storefront_eshop_count = esc_html__('One','storefront-eshop'); }
    	if( $storefront_eshop_i == 1 ){ $storefront_eshop_count = esc_html__('Two','storefront-eshop'); }
    	if( $storefront_eshop_i == 2 ){ $storefront_eshop_count = esc_html__('Three','storefront-eshop'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'storefront-eshop').$storefront_eshop_count,
	        'id' => 'storefront-eshop-footer-widget-'.$storefront_eshop_i,
	        'description' => esc_html__('Add widgets here.', 'storefront-eshop'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'storefront_eshop_widgets_init');