<?php
/**
* Color Settings.
* @package Storefront Eshop
*/

$storefront_eshop_default = storefront_eshop_get_default_theme_options();

$wp_customize->add_setting( 'storefront_eshop_default_text_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'storefront_eshop_default_text_color',
    array(
        'label'      => esc_html__( 'Text Color', 'storefront-eshop' ),
        'section'    => 'colors',
        'settings'   => 'storefront_eshop_default_text_color',
    ) ) 
);

$wp_customize->add_setting( 'storefront_eshop_border_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'storefront_eshop_border_color',
    array(
        'label'      => esc_html__( 'Border Color', 'storefront-eshop' ),
        'section'    => 'colors',
        'settings'   => 'storefront_eshop_border_color',
    ) ) 
);