<?php
/**
* Header Banner Options.
*
* @package Storefront Eshop
*/

$storefront_eshop_default = storefront_eshop_get_default_theme_options();
$storefront_eshop_post_category_list = storefront_eshop_post_category_list();

$wp_customize->add_section( 'storefront_eshop_header_banner_setting',
    array(
    'title'      => esc_html__( 'Slider Settings', 'storefront-eshop' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'storefront_eshop_theme_home_pannel',
    )
);

$wp_customize->add_setting('storefront_eshop_display_header_title',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_display_header_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_display_header_title',
    array(
        'label' => esc_html__('Enable / Disable Title', 'storefront-eshop'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('storefront_eshop_display_header_text',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_display_header_text',
    array(
        'label' => esc_html__('Enable / Disable Tagline', 'storefront-eshop'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('storefront_eshop_header_banner',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_header_banner',
    array(
        'label' => esc_html__('Enable Slider', 'storefront-eshop'),
        'section' => 'storefront_eshop_header_banner_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'storefront_eshop_header_banner_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'storefront_eshop_sanitize_select',
    )
);
$wp_customize->add_control( 'storefront_eshop_header_banner_cat',
    array(
    'label'       => esc_html__( 'Slider Post Category', 'storefront-eshop' ),
    'section'     => 'storefront_eshop_header_banner_setting',
    'type'        => 'select',
    'choices'     => $storefront_eshop_post_category_list,
    )
);

$wp_customize->add_setting( 'storefront_eshop_homepage_section_shipping_title',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_homepage_section_shipping_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_homepage_section_shipping_title',
    array(
    'label'    => esc_html__( 'Free Shipping Title', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'storefront_eshop_homepage_section_shipping_text',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_homepage_section_shipping_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_homepage_section_shipping_text',
    array(
    'label'    => esc_html__( 'Free Shipping Text', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'storefront_eshop_homepage_section_exchange_title',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_homepage_section_exchange_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_homepage_section_exchange_title',
    array(
    'label'    => esc_html__( 'Return Exchange Title', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'storefront_eshop_homepage_section_exchange_text',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_homepage_section_exchange_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_homepage_section_exchange_text',
    array(
    'label'    => esc_html__( 'Return Exchange Text', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'storefront_eshop_homepage_section_support_title',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_homepage_section_support_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_homepage_section_support_title',
    array(
    'label'    => esc_html__( 'Quality Support Title', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'storefront_eshop_homepage_section_support_text',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_homepage_section_support_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_homepage_section_support_text',
    array(
    'label'    => esc_html__( 'Quality Support Text', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'storefront_eshop_homepage_section_shopping_title',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_homepage_section_shopping_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_homepage_section_shopping_title',
    array(
    'label'    => esc_html__( 'Safe Shopping Title', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'storefront_eshop_homepage_section_shopping_text',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_homepage_section_shopping_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_homepage_section_shopping_text',
    array(
    'label'    => esc_html__( 'Safe Shopping Text', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_header_banner_setting',
    'type'     => 'text',
    )
);

// Product Settings

$wp_customize->add_section( 'storefront_eshop_product_column_setting',
    array(
    'title'      => esc_html__( 'Product Settings', 'storefront-eshop' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'storefront_eshop_theme_home_pannel',
    )
);

$wp_customize->add_setting('storefront_eshop_product_section',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_product_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_product_section',
    array(
        'label' => esc_html__('Enable Product Section', 'storefront-eshop'),
        'section' => 'storefront_eshop_product_column_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'storefront_eshop_product_heading',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_product_heading'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_product_heading',
    array(
    'label'    => esc_html__( 'Section Heading', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_product_column_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'storefront_eshop_product_button_text',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_product_button_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_product_button_text',
    array(
    'label'    => esc_html__( 'Button Text', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_product_column_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'storefront_eshop_product_button_link',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_product_button_link'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'storefront_eshop_product_button_link',
    array(
    'label'    => esc_html__( 'Button Link', 'storefront-eshop' ),
    'section'  => 'storefront_eshop_product_column_setting',
    'type'     => 'url',
    )
);

$storefront_eshop_args = array(
    'type'                     => 'product',
    'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'term_group',
    'order'                    => 'ASC',
    'hide_empty'               => false,
    'hierarchical'             => 1,
    'number'                   => '',
    'taxonomy'                 => 'product_cat',
    'pad_counts'               => false
);

$categories = get_categories($storefront_eshop_args);
$cat_posts = array();
$m = 0;
$cat_posts[]='Select';
foreach($categories as $category){
    if($m==0){
        $default = $category->slug;
        $m++;
    }
    $cat_posts[$category->slug] = $category->name;
}

$wp_customize->add_setting('storefront_eshop_featured_product_category',array(
    'default'   => 'select',
    'sanitize_callback' => 'storefront_eshop_sanitize_select',
));
$wp_customize->add_control('storefront_eshop_featured_product_category',array(
    'type'    => 'select',
    'choices' => $cat_posts,
    'label' => __('Select category to display products ','storefront-eshop'),
    'section' => 'storefront_eshop_product_column_setting',
));