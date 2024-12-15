<?php
/**
 * Sample implementation of the Custom Header feature
 * @package Storefront Eshop
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses storefront_eshop_header_style()
 */
function storefront_eshop_custom_header_setup()
{
    add_theme_support('custom-header',
        apply_filters('storefront_eshop_custom_header_args', array(
            'default-image' => '',
            'default-text-color' => '000000',
            'width' => 1920,
            'height' => 400,
            'flex-height' => true,
            'flex-width' => true,
            'wp-head-callback' => 'storefront_eshop_header_style',
        )));
}

add_action('after_setup_theme', 'storefront_eshop_custom_header_setup');

if (!function_exists('storefront_eshop_header_style')) :
    /**
     * Styles the header image and text displayed on the blog
     *
     * @see storefront_eshop_custom_header_setup().
     */
    function storefront_eshop_header_style()
    {
        $storefront_eshop_header_text_color = get_header_textcolor();

        if (get_theme_support('custom-header', 'default-text-color') === $storefront_eshop_header_text_color) {
            return;
        }

        ?>
        <style type="text/css">
            <?php
                if ( 'blank' == $storefront_eshop_header_text_color ) :
            ?>
            .header-titles .custom-logo-name,
            .site-description {
                display: none;
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
            }

            <?php
                else :
            ?>
            .header-titles .custom-logo-name:not(:hover):not(:focus),
            .site-description {
                color: #<?php echo esc_attr( $storefront_eshop_header_text_color ); ?>;
            }

            <?php endif; ?>
        </style>
        <?php
    }
endif;