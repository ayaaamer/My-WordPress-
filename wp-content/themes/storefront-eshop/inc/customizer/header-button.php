<?php
/**
* Header Options.
*
* @package Storefront Eshop
*/

$storefront_eshop_default = storefront_eshop_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'storefront_eshop_button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'storefront-eshop' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'storefront_eshop_theme_option_panel',
	)
);

$wp_customize->add_setting( 'storefront_eshop_header_layout_topbar_text',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_header_layout_topbar_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_header_layout_topbar_text',
    array(
    'label'    => esc_html__( 'Header Text', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'storefront_eshop_header_layout_wishlist_text',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_header_layout_wishlist_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_header_layout_wishlist_text',
    array(
    'label'    => esc_html__( 'Wishlist Text', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'storefront_eshop_header_layout_wishlist_link',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_header_layout_wishlist_link'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'storefront_eshop_header_layout_wishlist_link',
    array(
    'label'    => esc_html__( 'Wishlist Link', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_button_header_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'storefront_eshop_header_layout_compare_text',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_header_layout_compare_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_header_layout_compare_text',
    array(
    'label'    => esc_html__( 'Compare Text', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'storefront_eshop_header_layout_compare_link',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_header_layout_compare_link'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'storefront_eshop_header_layout_compare_link',
    array(
    'label'    => esc_html__( 'Compare Link', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_button_header_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'storefront_eshop_header_layout_phone_number',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_header_layout_phone_number'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_header_layout_phone_number',
    array(
    'label'    => esc_html__( 'Header Phone Number', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('storefront_eshop_menu_font_size',
    array(
        'default'           => $storefront_eshop_default['storefront_eshop_menu_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_number_range',
    )
);
$wp_customize->add_control('storefront_eshop_menu_font_size',
    array(
        'label'       => esc_html__('Menu Font Size', 'storefront-eshop'),
        'section'     => 'storefront_eshop_button_header_setting',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 30,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'storefront_eshop_menu_text_transform',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_menu_text_transform'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'storefront_eshop_sanitize_menu_transform',
    )
);
$wp_customize->add_control( 'storefront_eshop_menu_text_transform',
    array(
    'label'       => esc_html__( 'Menu Text Transform', 'storefront-eshop' ),
    'section'     => 'storefront_eshop_button_header_setting',
    'type'        => 'select',
    'choices'     => array(
        'capitalize' => esc_html__( 'Capitalize', 'storefront-eshop' ),
        'uppercase'  => esc_html__( 'Uppercase', 'storefront-eshop' ),
        'lowercase'    => esc_html__( 'Lowercase', 'storefront-eshop' ),
        ),
    )
);

$wp_customize->add_setting('storefront_eshop_sticky',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_sticky'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_sticky',
    array(
        'label' => esc_html__('Enable Sticky Header', 'storefront-eshop'),
        'section' => 'storefront_eshop_button_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('storefront_eshop_theme_loader',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_theme_loader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_theme_loader',
    array(
        'label' => esc_html__('Enable Preloader', 'storefront-eshop'),
        'section' => 'storefront_eshop_button_header_setting',
        'type' => 'checkbox',
    )
);