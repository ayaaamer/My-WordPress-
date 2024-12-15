<?php
/**
* Body Classes.
* @package Storefront Eshop
*/
 
 if (!function_exists('storefront_eshop_body_classes')) :

    function storefront_eshop_body_classes($storefront_eshop_classes) {

        $storefront_eshop_default = storefront_eshop_get_default_theme_options();
        global $post;
        // Adds a class of hfeed to non-singular pages.
        if ( !is_singular() ) {
            $storefront_eshop_classes[] = 'hfeed';
        }

        // Adds a class of no-sidebar when there is no sidebar present.
        if ( !is_active_sidebar( 'sidebar-1' ) ) {
            $storefront_eshop_classes[] = 'no-sidebar';
        }

        $storefront_eshop_global_sidebar_layout = esc_html( get_theme_mod( 'storefront_eshop_global_sidebar_layout',$storefront_eshop_default['storefront_eshop_global_sidebar_layout'] ) );

        if ( is_active_sidebar( 'sidebar-1' ) ) {
            if( is_single() || is_page() ){
                $storefront_eshop_post_sidebar = esc_html( get_post_meta( $post->ID, 'storefront_eshop_post_sidebar_option', true ) );
                if (empty($storefront_eshop_post_sidebar) || ($storefront_eshop_post_sidebar == 'global-sidebar')) {
                    $storefront_eshop_classes[] = esc_attr( $storefront_eshop_global_sidebar_layout );
                } else{
                    $storefront_eshop_classes[] = esc_attr( $storefront_eshop_post_sidebar );
                }
            }else{
                $storefront_eshop_classes[] = esc_attr( $storefront_eshop_global_sidebar_layout );
            }
            
        }
        
        return $storefront_eshop_classes;
    }

endif;

add_filter('body_class', 'storefront_eshop_body_classes');