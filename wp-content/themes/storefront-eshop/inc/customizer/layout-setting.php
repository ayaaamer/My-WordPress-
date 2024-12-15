<?php
/**
* Layouts Settings.
*
* @package Storefront Eshop
*/

$storefront_eshop_default = storefront_eshop_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'storefront_eshop_layout_setting',
	array(
	'title'      => esc_html__( 'Global Layout Settings', 'storefront-eshop' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'      => 'storefront_eshop_theme_option_panel',
	)
);

$wp_customize->add_setting( 'storefront_eshop_global_sidebar_layout',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'storefront_eshop_sanitize_sidebar_option',
    )
);
$wp_customize->add_control( 'storefront_eshop_global_sidebar_layout',
    array(
    'label'       => esc_html__( 'Global Sidebar Layout', 'storefront-eshop' ),
    'section'     => 'storefront_eshop_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'storefront-eshop' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'storefront-eshop' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'storefront-eshop' ),
        ),
    )
);
