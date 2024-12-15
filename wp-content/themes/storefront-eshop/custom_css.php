<?php

$storefront_eshop_custom_css = "";

	$storefront_eshop_theme_pagination_options_alignment = get_theme_mod('storefront_eshop_theme_pagination_options_alignment', 'Center');
	if ($storefront_eshop_theme_pagination_options_alignment == 'Center') {
		$storefront_eshop_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$storefront_eshop_custom_css .= 'justify-content: center;margin: 0 auto;';
		$storefront_eshop_custom_css .= '}';
	} else if ($storefront_eshop_theme_pagination_options_alignment == 'Right') {
		$storefront_eshop_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$storefront_eshop_custom_css .= 'justify-content: right;margin: 0 0 0 auto;';
		$storefront_eshop_custom_css .= '}';
	} else if ($storefront_eshop_theme_pagination_options_alignment == 'Left') {
		$storefront_eshop_custom_css .= '.navigation.pagination,.navigation.posts-navigation .nav-links{';
		$storefront_eshop_custom_css .= 'justify-content: left;margin: 0 auto 0 0;';
		$storefront_eshop_custom_css .= '}';
	}

	$storefront_eshop_theme_breadcrumb_options_alignment = get_theme_mod('storefront_eshop_theme_breadcrumb_options_alignment', 'Left');
	if ($storefront_eshop_theme_breadcrumb_options_alignment == 'Center') {
	    $storefront_eshop_custom_css .= '.breadcrumbs ul{';
	    $storefront_eshop_custom_css .= 'text-align: center !important;';
	    $storefront_eshop_custom_css .= '}';
	} else if ($storefront_eshop_theme_breadcrumb_options_alignment == 'Right') {
	    $storefront_eshop_custom_css .= '.breadcrumbs ul{';
	    $storefront_eshop_custom_css .= 'text-align: Right !important;';
	    $storefront_eshop_custom_css .= '}';
	} else if ($storefront_eshop_theme_breadcrumb_options_alignment == 'Left') {
	    $storefront_eshop_custom_css .= '.breadcrumbs ul{';
	    $storefront_eshop_custom_css .= 'text-align: Left !important;';
	    $storefront_eshop_custom_css .= '}';
	}

	$storefront_eshop_menu_text_transform = get_theme_mod('storefront_eshop_menu_text_transform', 'Capitalize');
	if ($storefront_eshop_menu_text_transform == 'Capitalize') {
	    $storefront_eshop_custom_css .= '.site-navigation .primary-menu > li a{';
	    $storefront_eshop_custom_css .= 'text-transform: Capitalize !important;';
	    $storefront_eshop_custom_css .= '}';
	} else if ($storefront_eshop_menu_text_transform == 'uppercase') {
	    $storefront_eshop_custom_css .= '.site-navigation .primary-menu > li a{';
	    $storefront_eshop_custom_css .= 'text-transform: uppercase !important;';
	    $storefront_eshop_custom_css .= '}';
	} else if ($storefront_eshop_menu_text_transform == 'lowercase') {
	    $storefront_eshop_custom_css .= '.site-navigation .primary-menu > li a{';
	    $storefront_eshop_custom_css .= 'text-transform: lowercase !important;';
	    $storefront_eshop_custom_css .= '}';
	}

	$storefront_eshop_single_page_content_alignment = get_theme_mod('storefront_eshop_single_page_content_alignment', 'left');
	if ($storefront_eshop_single_page_content_alignment == 'left') {
	    $storefront_eshop_custom_css .= '#single-page .type-page{';
	    $storefront_eshop_custom_css .= 'text-align: left !important;';
	    $storefront_eshop_custom_css .= '}';
	} else if ($storefront_eshop_single_page_content_alignment == 'center') {
	    $storefront_eshop_custom_css .= '#single-page .type-page{';
	    $storefront_eshop_custom_css .= 'text-align: center !important;';
	    $storefront_eshop_custom_css .= '}';
	} else if ($storefront_eshop_single_page_content_alignment == 'right') {
	    $storefront_eshop_custom_css .= '#single-page .type-page{';
	    $storefront_eshop_custom_css .= 'text-align: right !important;';
	    $storefront_eshop_custom_css .= '}';
	}

	$storefront_eshop_footer_widget_title_alignment = get_theme_mod('storefront_eshop_footer_widget_title_alignment', 'left');
	if ($storefront_eshop_footer_widget_title_alignment == 'left') {
	    $storefront_eshop_custom_css .= 'h2.widget-title{';
	    $storefront_eshop_custom_css .= 'text-align: left !important;';
	    $storefront_eshop_custom_css .= '}';
	} else if ($storefront_eshop_footer_widget_title_alignment == 'center') {
	    $storefront_eshop_custom_css .= 'h2.widget-title{';
	    $storefront_eshop_custom_css .= 'text-align: center !important;';
	    $storefront_eshop_custom_css .= '}';
	} else if ($storefront_eshop_footer_widget_title_alignment == 'right') {
	    $storefront_eshop_custom_css .= 'h2.widget-title{';
	    $storefront_eshop_custom_css .= 'text-align: right !important;';
	    $storefront_eshop_custom_css .= '}';
	}

    $storefront_eshop_show_hide_related_product = get_theme_mod('storefront_eshop_show_hide_related_product',true);
    if($storefront_eshop_show_hide_related_product != true){
        $storefront_eshop_custom_css .='.related.products{';
            $storefront_eshop_custom_css .='display: none;';
        $storefront_eshop_custom_css .='}';
    }


	/*-------------------- Global First Color -------------------*/

	$storefront_eshop_global_color = get_theme_mod('storefront_eshop_global_color', '#f5b4b4'); // Add a fallback if the color isn't set

	if ($storefront_eshop_global_color) {
		$storefront_eshop_custom_css .= ':root {';
		$storefront_eshop_custom_css .= '--global-color: ' . esc_attr($storefront_eshop_global_color) . ';';
		$storefront_eshop_custom_css .= '}';
	}	

	/*-------------------- Global First Color -------------------*/

	$storefront_eshop_global_colorr = get_theme_mod('storefront_eshop_global_colorr', '#191f58'); // Add a fallback if the color isn't set

	if ($storefront_eshop_global_colorr) {
		$storefront_eshop_custom_css .= ':root {';
		$storefront_eshop_custom_css .= '--global-colorr: ' . esc_attr($storefront_eshop_global_colorr) . ';';
		$storefront_eshop_custom_css .= '}';
	}	

	/*-------------------- Content Font -------------------*/

	$storefront_eshop_content_typography_font = get_theme_mod('storefront_eshop_content_typography_font', 'roboto'); // Add a fallback if the color isn't set

	if ($storefront_eshop_content_typography_font) {
		$storefront_eshop_custom_css .= ':root {';
		$storefront_eshop_custom_css .= '--font-main: ' . esc_attr($storefront_eshop_content_typography_font) . ';';
		$storefront_eshop_custom_css .= '}';
	}

	/*-------------------- Heading Font -------------------*/

	$storefront_eshop_heading_typography_font = get_theme_mod('storefront_eshop_heading_typography_font', 'roboto'); // Add a fallback if the color isn't set

	if ($storefront_eshop_heading_typography_font) {
		$storefront_eshop_custom_css .= ':root {';
		$storefront_eshop_custom_css .= '--font-head: ' . esc_attr($storefront_eshop_heading_typography_font) . ';';
		$storefront_eshop_custom_css .= '}';
	}