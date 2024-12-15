<?php
/**
* Posts Settings.
*
* @package Storefront Eshop
*/

$storefront_eshop_default = storefront_eshop_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'storefront_eshop_single_posts_settings',
    array(
    'title'      => esc_html__( 'Single Meta Information Settings', 'storefront-eshop' ),
    'priority'   => 35,
    'capability' => 'edit_theme_options',
    'panel'      => 'storefront_eshop_theme_option_panel',
    )
);

$wp_customize->add_setting('storefront_eshop_post_author',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'storefront-eshop'),
        'section' => 'storefront_eshop_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('storefront_eshop_post_date',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'storefront-eshop'),
        'section' => 'storefront_eshop_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('storefront_eshop_post_category',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'storefront-eshop'),
        'section' => 'storefront_eshop_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('storefront_eshop_post_tags',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'storefront-eshop'),
        'section' => 'storefront_eshop_single_posts_settings',
        'type' => 'checkbox',
    )
);

// Archive Post Section.
$wp_customize->add_section( 'storefront_eshop_posts_settings',
    array(
    'title'      => esc_html__( 'Archive Meta Information Settings', 'storefront-eshop' ),
    'priority'   => 36,
    'capability' => 'edit_theme_options',
    'panel'      => 'storefront_eshop_theme_option_panel',
    )
);

$wp_customize->add_setting('storefront_eshop_display_archive_post_sticky_post',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_display_archive_post_sticky_post'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_display_archive_post_sticky_post',
    array(
        'label' => esc_html__('Enable sticky Post', 'storefront-eshop'),
        'section' => 'storefront_eshop_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('storefront_eshop_display_archive_post_image',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_display_archive_post_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_display_archive_post_image',
    array(
        'label' => esc_html__('Enable Posts Image', 'storefront-eshop'),
        'section' => 'storefront_eshop_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('storefront_eshop_display_archive_post_category',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_display_archive_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_display_archive_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'storefront-eshop'),
        'section' => 'storefront_eshop_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('storefront_eshop_display_archive_post_title',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_display_archive_post_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_display_archive_post_title',
    array(
        'label' => esc_html__('Enable Posts Title', 'storefront-eshop'),
        'section' => 'storefront_eshop_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('storefront_eshop_display_archive_post_content',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_display_archive_post_content'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_display_archive_post_content',
    array(
        'label' => esc_html__('Enable Posts Content', 'storefront-eshop'),
        'section' => 'storefront_eshop_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('storefront_eshop_display_archive_post_button',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_display_archive_post_button'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_display_archive_post_button',
    array(
        'label' => esc_html__('Enable Posts Button', 'storefront-eshop'),
        'section' => 'storefront_eshop_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('storefront_eshop_excerpt_limit',
    array(
        'default'           => $storefront_eshop_default['storefront_eshop_excerpt_limit'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_number_range',
    )
);
$wp_customize->add_control('storefront_eshop_excerpt_limit',
    array(
        'label'       => esc_html__('Blog Post Excerpt limit', 'storefront-eshop'),
        'section'     => 'storefront_eshop_posts_settings',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);