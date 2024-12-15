<?php
/**
 * Default Values.
 *
 * @package Storefront Eshop
 */

if ( ! function_exists( 'storefront_eshop_get_default_theme_options' ) ) :
	function storefront_eshop_get_default_theme_options() {

		$storefront_eshop_defaults = array();
		
		// Options.
        $storefront_eshop_defaults['storefront_eshop_logo_width_range']                                  = 300;
		$storefront_eshop_defaults['storefront_eshop_global_sidebar_layout']					            = 'right-sidebar';
        $storefront_eshop_defaults['storefront_eshop_global_colorr']                 = '#191f58';
        $storefront_eshop_defaults['storefront_eshop_theme_breadcrumb_options_alignment']                      = 'Left';
        $storefront_eshop_defaults['storefront_eshop_theme_pagination_options_alignments']                      = 'Center';
        $storefront_eshop_defaults['storefront_eshop_header_layout_topbar_text']      = esc_html__( 'Fast Austrelia Wide Shipping & support@example.com', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_header_layout_wishlist_text']      = esc_html__( 'Wishlist', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_header_layout_wishlist_link']      = esc_url( 'https://www.google.com/', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_header_layout_compare_text']      = esc_html__( 'Compare', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_header_layout_compare_link']      = esc_url( 'https://www.google.com/', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_theme_loader']                 = 0;  
        $storefront_eshop_defaults['storefront_eshop_header_layout_phone_number']       = '+11 231 456 7890';
        $storefront_eshop_defaults['storefront_eshop_homepage_section_shipping_title']      = esc_html__( 'Free Shipping', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_homepage_section_shipping_text']      = esc_html__( 'Free Delivery Worldwide', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_homepage_section_exchange_title']      = esc_html__( 'Return Exchange', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_homepage_section_exchange_text']       = esc_html__( 'Return Exchange 20 Days', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_homepage_section_support_title']      = esc_html__( 'Quality Support', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_homepage_section_support_text']       = esc_html__( 'Free Support Online 24/7', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_homepage_section_shopping_title']      = esc_html__( 'Safe Shopping', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_homepage_section_shopping_text']       = esc_html__( 'Ensure Genuine 100%', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_pagination_layout']         = 'numeric';
		$storefront_eshop_defaults['storefront_eshop_footer_column_layout'] 						 = 3;
        $storefront_eshop_defaults['storefront_eshop_menu_font_size']                 = 15;
        $storefront_eshop_defaults['storefront_eshop_copyright_font_size']                 = 16;
        $storefront_eshop_defaults['storefront_eshop_breadcrumb_font_size']                 = 16;
        $storefront_eshop_defaults['storefront_eshop_excerpt_limit']                 = 10;
        $storefront_eshop_defaults['storefront_eshop_menu_text_transform']                 = 'capitalize';  
         $storefront_eshop_defaults['storefront_eshop_single_page_content_alignment']                 = 'left';
        $storefront_eshop_defaults['storefront_eshop_per_columns']                 = 3;  
        $storefront_eshop_defaults['storefront_eshop_product_per_page']                 = 9;
		$storefront_eshop_defaults['storefront_eshop_footer_copyright_text'] 				     = esc_html__( 'All rights reserved.', 'storefront-eshop' );
        $storefront_eshop_defaults['twp_navigation_type']              			 = 'theme-normal-navigation';
        $storefront_eshop_defaults['storefront_eshop_post_author']                		= 1;
        $storefront_eshop_defaults['storefront_eshop_post_date']                		= 1;
        $storefront_eshop_defaults['storefront_eshop_post_category']                	= 1;
        $storefront_eshop_defaults['storefront_eshop_post_tags']                		= 1;
        $storefront_eshop_defaults['storefront_eshop_floating_next_previous_nav']       = 1;
        $storefront_eshop_defaults['storefront_eshop_header_banner']               		= 1;
        $storefront_eshop_defaults['storefront_eshop_display_header_title']          = 1;
        $storefront_eshop_defaults['storefront_eshop_product_section']                  = 1;
        $storefront_eshop_defaults['storefront_eshop_sticky']                 = 0;
        $storefront_eshop_defaults['storefront_eshop_product_heading']      = esc_html__( 'Featured Products', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_product_button_text']      = esc_html__( 'View All', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_product_button_link']      = esc_url( 'https://www.google.com/', 'storefront-eshop' );
        $storefront_eshop_defaults['storefront_eshop_background_color']               	= '#fff';
        $storefront_eshop_defaults['storefront_eshop_display_footer']            = 0;
        $storefront_eshop_defaults['storefront_eshop_footer_widget_title_alignment']                 = 'left'; 
        $storefront_eshop_defaults['storefront_eshop_show_hide_related_product']          = 1;
        $storefront_eshop_defaults['storefront_eshop_display_archive_post_image']            = 1;
        $storefront_eshop_defaults['storefront_eshop_global_color']                                   = '#f5b4b4';
        $storefront_eshop_defaults['storefront_eshop_display_archive_post_category']          = 1;
        $storefront_eshop_defaults['storefront_eshop_display_archive_post_sticky_post']       = 1;
        $storefront_eshop_defaults['storefront_eshop_display_archive_post_title']             = 1;
        $storefront_eshop_defaults['storefront_eshop_display_archive_post_content']           = 1;
        $storefront_eshop_defaults['storefront_eshop_display_archive_post_button']            = 1;

        $storefront_eshop_defaults['storefront_eshop_enable_to_the_top']                      = 1;
        $storefront_eshop_defaults['storefront_eshop_to_the_top_text']                      = esc_html__( 'To The Top', 'storefront-eshop' );


		// Pass through filter.
		$storefront_eshop_defaults = apply_filters( 'storefront_eshop_filter_default_theme_options', $storefront_eshop_defaults );

		return $storefront_eshop_defaults;
	}
endif;
