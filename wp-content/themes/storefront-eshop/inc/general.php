<?php

function storefront_eshop_enqueue_fonts() {
    $storefront_eshop_default_font_content = 'roboto';
    $storefront_eshop_default_font_heading = 'roboto';

    $storefront_eshop_font_content = esc_attr(get_theme_mod('storefront_eshop_content_typography_font', $storefront_eshop_default_font_content));
    $storefront_eshop_font_heading = esc_attr(get_theme_mod('storefront_eshop_heading_typography_font', $storefront_eshop_default_font_heading));

    $storefront_eshop_css = '';

    // Always enqueue main font
    $storefront_eshop_css .= '
    :root {
        --font-main: ' . $storefront_eshop_font_content . ', ' . (in_array($storefront_eshop_font_content, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('storefront-eshop-style-font-general', get_template_directory_uri() . '/fonts/' . $storefront_eshop_font_content . '/font.css');

    // Always enqueue header font
    $storefront_eshop_css .= '
    :root {
        --font-head: ' . $storefront_eshop_font_heading . ', ' . (in_array($storefront_eshop_font_heading, ['bitter', 'charis-sil']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('storefront-eshop-style-font-h', get_template_directory_uri() . '/fonts/' . $storefront_eshop_font_heading . '/font.css');

    // Add inline style
    wp_add_inline_style('storefront-eshop-style-font-general', $storefront_eshop_css);
}
add_action('wp_enqueue_scripts', 'storefront_eshop_enqueue_fonts', 50);