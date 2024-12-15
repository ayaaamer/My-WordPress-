<?php
/**
* Typography Settings.
*
* @package Storefront Eshop
*/

$storefront_eshop_default = storefront_eshop_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'storefront_eshop_typography_setting',
	array(
	'title'      => esc_html__( 'Typography Settings', 'storefront-eshop' ),
	'priority'   => 21,
	'capability' => 'edit_theme_options',
	'panel'      => 'storefront_eshop_theme_option_panel',
	)
);

// -----------------  Font array
$storefront_eshop_fonts = array(
    'bad-script' => 'Bad Script',
    'bitter'     => 'Bitter',
    'charis-sil' => 'Charis SIL',
    'cuprum'     => 'Cuprum',
    'exo-2'      => 'Exo 2',
    'jost'       => 'Jost',
    'open-sans'  => 'Open Sans',
    'oswald'     => 'Oswald',
    'play'       => 'Play',
    'roboto'     => 'Roboto',
    'outfit'     => 'Outfit',
    'ubuntu'     => 'Ubuntu',
);

 // -----------------  General text font
 $wp_customize->add_setting( 'storefront_eshop_content_typography_font', array(
    'default'           => 'roboto',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'storefront_eshop_radio_sanitize',
) );
$wp_customize->add_control( 'storefront_eshop_content_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General Content font', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_typography_setting',
    'settings' => 'storefront_eshop_content_typography_font',
    'choices'  => $storefront_eshop_fonts,
) );

 // -----------------  General Heading font
$wp_customize->add_setting( 'storefront_eshop_heading_typography_font', array(
    'default'           => 'roboto',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'storefront_eshop_radio_sanitize',
) );
$wp_customize->add_control( 'storefront_eshop_heading_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General heading font', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_typography_setting',
    'settings' => 'storefront_eshop_heading_typography_font',
    'choices'  => $storefront_eshop_fonts,
) );