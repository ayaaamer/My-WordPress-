<?php
/**
* Additional Woocommerce Settings.
*
* @package Storefront Eshop
*/

$storefront_eshop_default = storefront_eshop_get_default_theme_options();

// Additional Woocommerce Section.
$wp_customize->add_section( 'storefront_eshop_additional_woocommerce_options',
	array(
	'title'      => esc_html__( 'Additional Woocommerce Options', 'storefront-eshop' ),
	'priority'   => 210,
	'capability' => 'edit_theme_options',
	'panel'      => 'storefront_eshop_theme_option_panel',
	)
);

	$wp_customize->add_setting('storefront_eshop_per_columns',
		array(
		'default'           => $storefront_eshop_default['storefront_eshop_per_columns'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'storefront_eshop_sanitize_number_range',
		)
	);
	$wp_customize->add_control('storefront_eshop_per_columns',
		array(
		'label'       => esc_html__('Product Per Column', 'storefront-eshop'),
		'section'     => 'storefront_eshop_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 10,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('storefront_eshop_product_per_page',
		array(
		'default'           => $storefront_eshop_default['storefront_eshop_product_per_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'storefront_eshop_sanitize_number_range',
		)
	);
	$wp_customize->add_control('storefront_eshop_product_per_page',
		array(
		'label'       => esc_html__('Product Per Page', 'storefront-eshop'),
		'section'     => 'storefront_eshop_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 15,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('storefront_eshop_show_hide_related_product',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_show_hide_related_product'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
	);
	$wp_customize->add_control('storefront_eshop_show_hide_related_product',
	    array(
	        'label' => esc_html__('Enable Related Products', 'storefront-eshop'),
	        'section' => 'storefront_eshop_additional_woocommerce_options',
	        'type' => 'checkbox',
	    )
	);