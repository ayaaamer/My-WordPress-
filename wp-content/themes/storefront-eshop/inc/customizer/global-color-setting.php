<?php
/**
* Global Color Settings.
*
* @package Storefront Eshop
*/

$storefront_eshop_default = storefront_eshop_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'storefront_eshop_global_color_setting',
	array(
	'title'      => esc_html__( 'Global Color Settings', 'storefront-eshop' ),
	'priority'   => 1,
	'capability' => 'edit_theme_options',
	'panel'      => 'storefront_eshop_theme_option_panel',
	)
);

$wp_customize->add_setting( 'storefront_eshop_global_color',
    array(
    'default'           => '#f5b4b4',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'storefront_eshop_global_color',
    array(
        'label'      => esc_html__( 'Global Color 1', 'storefront-eshop' ),
        'section'    => 'storefront_eshop_global_color_setting',
        'settings'   => 'storefront_eshop_global_color',
    ) ) 
);

$wp_customize->add_setting( 'storefront_eshop_global_colorr',
    array(
    'default'           => '#191f58',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'storefront_eshop_global_colorr',
    array(
        'label'      => esc_html__( 'Global Color 2', 'storefront-eshop' ),
        'section'    => 'storefront_eshop_global_color_setting',
        'settings'   => 'storefront_eshop_global_colorr',
    ) ) 
);