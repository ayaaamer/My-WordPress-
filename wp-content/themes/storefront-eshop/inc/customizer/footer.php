<?php
/**
* Footer Settings.
*
* @package Storefront Eshop
*/

$storefront_eshop_default = storefront_eshop_get_default_theme_options();

$wp_customize->add_section( 'storefront_eshop_footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Setting', 'storefront-eshop' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'storefront_eshop_theme_option_panel',
	)
);

$wp_customize->add_setting('storefront_eshop_display_footer',
    array(
    'default' => $storefront_eshop_default['storefront_eshop_display_footer'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
)
);
$wp_customize->add_control('storefront_eshop_display_footer',
    array(
        'label' => esc_html__('Enable Footer', 'storefront-eshop'),
        'section' => 'storefront_eshop_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'storefront_eshop_footer_column_layout',
	array(
	'default'           => $storefront_eshop_default['storefront_eshop_footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'storefront_eshop_sanitize_select',
	)
);
$wp_customize->add_control( 'storefront_eshop_footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'storefront-eshop' ),
	'section'     => 'storefront_eshop_footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'storefront-eshop' ),
		'2' => esc_html__( 'Two Column', 'storefront-eshop' ),
		'3' => esc_html__( 'Three Column', 'storefront-eshop' ),
	    ),
	)
);

$wp_customize->add_setting( 'storefront_eshop_footer_widget_title_alignment',
        array(
        'default'           => $storefront_eshop_default['storefront_eshop_footer_widget_title_alignment'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_footer_widget_title_alignment',
        )
    );
    $wp_customize->add_control( 'storefront_eshop_footer_widget_title_alignment',
        array(
        'label'       => esc_html__( 'Footer Widget Title Alignment', 'storefront-eshop' ),
        'section'     => 'storefront_eshop_footer_widget_area',
        'type'        => 'select',
        'choices'     => array(
            'left' => esc_html__( 'Left', 'storefront-eshop' ),
            'center'  => esc_html__( 'Center', 'storefront-eshop' ),
            'right'    => esc_html__( 'Right', 'storefront-eshop' ),
            ),
        )
    );

$wp_customize->add_setting( 'storefront_eshop_footer_copyright_text',
	array(
	'default'           => $storefront_eshop_default['storefront_eshop_footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'storefront_eshop_footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'storefront-eshop' ),
	'section'  => 'storefront_eshop_footer_widget_area',
	'type'     => 'text',
	)
);

$wp_customize->add_setting('storefront_eshop_copyright_font_size',
    array(
        'default'           => $storefront_eshop_default['storefront_eshop_copyright_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_number_range',
    )
);
$wp_customize->add_control('storefront_eshop_copyright_font_size',
    array(
        'label'       => esc_html__('Copyright Font Size', 'storefront-eshop'),
        'section'     => 'storefront_eshop_footer_widget_area',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 5,
           'max'   => 30,
           'step'   => 1,
    	),
    )
);

$wp_customize->add_setting( 'storefront_eshop_footer_widget_background_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_eshop_footer_widget_background_color', array(
    'label'     => __('Footer Widget Background Color', 'storefront-eshop'),
    'description' => __('It will change the complete footer widget background color.', 'storefront-eshop'),
    'section' => 'storefront_eshop_footer_widget_area',
    'settings' => 'storefront_eshop_footer_widget_background_color',
)));

$wp_customize->add_setting('storefront_eshop_footer_widget_background_image',array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'storefront_eshop_footer_widget_background_image',array(
    'label' => __('Footer Widget Background Image','storefront-eshop'),
    'section' => 'storefront_eshop_footer_widget_area'
)));

$wp_customize->add_setting('storefront_eshop_enable_to_the_top',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_enable_to_the_top'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_enable_to_the_top',
    array(
        'label' => esc_html__('Enable To The Top', 'storefront-eshop'),
        'section' => 'storefront_eshop_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'storefront_eshop_to_the_top_text',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_to_the_top_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_to_the_top_text',
    array(
    'label'    => esc_html__( 'To The Top Text', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_footer_widget_area',
    'type'     => 'text',
    )
);