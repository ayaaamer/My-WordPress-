<?php
/**
 *
 * Pagination Functions
 *
 * @package Storefront Eshop
 */

/**
 * Pagination for archive.
 */
function storefront_eshop_render_posts_pagination() {
    // Get the setting to check if pagination is enabled
    $storefront_eshop_is_pagination_enabled = get_theme_mod( 'storefront_eshop_enable_pagination', true );

    // Check if pagination is enabled
    if ( $storefront_eshop_is_pagination_enabled ) {
        // Get the selected pagination type from the Customizer
        $storefront_eshop_pagination_type = get_theme_mod( 'storefront_eshop_theme_pagination_type', 'numeric' );

        // Check if the pagination type is "newer_older" (Previous/Next) or "numeric"
        if ( 'newer_older' === $storefront_eshop_pagination_type ) :
            // Display "Newer/Older" pagination (Previous/Next navigation)
            the_posts_navigation(
                array(
                    'prev_text' => __( '&laquo; Newer', 'storefront-eshop' ),  // Change the label for "previous"
                    'next_text' => __( 'Older &raquo;', 'storefront-eshop' ),  // Change the label for "next"
                    'screen_reader_text' => __( 'Posts navigation', 'storefront-eshop' ),
                )
            );
        else :
            // Display numeric pagination (Page numbers)
            the_posts_pagination(
                array(
                    'prev_text' => __( '&laquo; Previous', 'storefront-eshop' ),
                    'next_text' => __( 'Next &raquo;', 'storefront-eshop' ),
                    'type'      => 'list', // Display as <ul> <li> tags
                    'screen_reader_text' => __( 'Posts navigation', 'storefront-eshop' ),
                )
            );
        endif;
    }
}
add_action( 'storefront_eshop_posts_pagination', 'storefront_eshop_render_posts_pagination', 10 );