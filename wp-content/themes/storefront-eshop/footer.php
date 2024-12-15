<?php
/**
 * The template for displaying the footer
 * @package Storefront Eshop
 * @since 1.0.0
 */

/**
 * Toogle Contents
 * @hooked storefront_eshop_content_offcanvas - 30
*/

do_action('storefront_eshop_before_footer_content_action'); ?>

</div>

<footer id="site-footer" role="contentinfo">

    <?php
    /**
     * Footer Content
     * @hooked storefront_eshop_footer_content_widget - 10
     * @hooked storefront_eshop_footer_content_info - 20
    */

    do_action('storefront_eshop_footer_content_action'); ?>

</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>