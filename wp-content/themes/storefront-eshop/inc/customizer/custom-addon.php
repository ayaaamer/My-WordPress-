<?php
/**
* Custom Addons.
*
* @package Storefront Eshop
*/

$wp_customize->add_section( 'storefront_eshop_theme_pagination_options',
    array(
    'title'      => esc_html__( 'Customizer Custom Settings', 'storefront-eshop' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'storefront_eshop_theme_addons_panel',
    )
);

// Add Pagination Enable/Disable option to Customizer
$wp_customize->add_setting( 'storefront_eshop_enable_pagination', 
    array(
        'default'           => true, // Default is enabled
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_enable_pagination', // Sanitize the input
    )
);

// Add the control to the Customizer
$wp_customize->add_control( 'storefront_eshop_enable_pagination', 
    array(
        'label'    => esc_html__( 'Enable Pagination', 'storefront-eshop' ),
        'section'  => 'storefront_eshop_theme_pagination_options', // Add to the correct section
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting( 'storefront_eshop_theme_pagination_type', 
    array(
        'default'           => 'numeric', // Set "numeric" as the default
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_pagination_type', // Use our sanitize function
    )
);

$wp_customize->add_control( 'storefront_eshop_theme_pagination_type',
    array(
        'label'       => esc_html__( 'Pagination Style', 'storefront-eshop' ),
        'section'     => 'storefront_eshop_theme_pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'numeric'      => esc_html__( 'Numeric (Page Numbers)', 'storefront-eshop' ),
            'newer_older'  => esc_html__( 'Newer/Older (Previous/Next)', 'storefront-eshop' ), // Renamed to "Newer/Older"
        ),
    )
);

$wp_customize->add_setting( 'storefront_eshop_theme_pagination_options_alignments',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_theme_pagination_options_alignments'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'storefront_eshop_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'storefront_eshop_theme_pagination_options_alignments',
    array(
    'label'       => esc_html__( 'Pagination Alignment', 'storefront-eshop' ),
    'section'     => 'storefront_eshop_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'storefront-eshop' ),
        'Right' => esc_html__( 'Right', 'storefront-eshop' ),
        'Left'  => esc_html__( 'Left', 'storefront-eshop' ),
        ),
    )
);

$wp_customize->add_setting( 'storefront_eshop_theme_breadcrumb_options_alignment',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_theme_breadcrumb_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'storefront_eshop_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'storefront_eshop_theme_breadcrumb_options_alignment',
    array(
    'label'       => esc_html__( 'Breadcrumb Alignment', 'storefront-eshop' ),
    'section'     => 'storefront_eshop_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'storefront-eshop' ),
        'Right' => esc_html__( 'Right', 'storefront-eshop' ),
        'Left'  => esc_html__( 'Left', 'storefront-eshop' ),
        ),
    )
);

$wp_customize->add_setting('storefront_eshop_breadcrumb_font_size',
    array(
        'default'           => $storefront_eshop_default['storefront_eshop_breadcrumb_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_number_range',
    )
);
$wp_customize->add_control('storefront_eshop_breadcrumb_font_size',
    array(
        'label'       => esc_html__('Breadcrumb Font Size', 'storefront-eshop'),
        'section'     => 'storefront_eshop_theme_pagination_options',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'storefront_eshop_single_page_content_alignment',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_single_page_content_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'storefront_eshop_sanitize_page_content_alignment',
    )
);
$wp_customize->add_control( 'storefront_eshop_single_page_content_alignment',
    array(
    'label'       => esc_html__( 'Single Page Content Alignment', 'storefront-eshop' ),
    'section'     => 'storefront_eshop_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'storefront-eshop' ),
        'center'  => esc_html__( 'Center', 'storefront-eshop' ),
        'right'    => esc_html__( 'Right', 'storefront-eshop' ),
        ),
    )
);