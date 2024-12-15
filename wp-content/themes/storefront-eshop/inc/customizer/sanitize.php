<?php
/**
* Custom Functions.
*
* @package Storefront Eshop
*/

if( !function_exists( 'storefront_eshop_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function storefront_eshop_sanitize_sidebar_option( $storefront_eshop_input ){

        $storefront_eshop_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $storefront_eshop_input,$storefront_eshop_metabox_options ) ){

            return $storefront_eshop_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'storefront_eshop_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function storefront_eshop_sanitize_checkbox( $storefront_eshop_checked ) {

		return ( ( isset( $storefront_eshop_checked ) && true === $storefront_eshop_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'storefront_eshop_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function storefront_eshop_sanitize_select( $storefront_eshop_input, $storefront_eshop_setting ) {
        $storefront_eshop_input = sanitize_text_field( $storefront_eshop_input );
        $storefront_eshop_choices = $storefront_eshop_setting->manager->get_control( $storefront_eshop_setting->id )->choices;
        return ( array_key_exists( $storefront_eshop_input, $storefront_eshop_choices ) ? $storefront_eshop_input : $storefront_eshop_setting->default );
    }

endif;