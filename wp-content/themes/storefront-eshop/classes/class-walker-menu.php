<?php
/**
 * Custom page walker for this theme.
 *
 * @package Storefront Eshop
 */

if (!class_exists('Storefront_Eshop_Walker_Page')) {
    /**
     * CUSTOM PAGE WALKER
     * A custom walker for pages.
     */
    class Storefront_Eshop_Walker_Page extends Walker_Page
    {

        /**
         * Outputs the beginning of the current element in the tree.
         *
         * @param string $storefront_eshop_output Used to append additional content. Passed by reference.
         * @param WP_Post $page Page data object.
         * @param int $storefront_eshop_depth Optional. Depth of page. Used for padding. Default 0.
         * @param array $storefront_eshop_args Optional. Array of arguments. Default empty array.
         * @param int $current_page Optional. Page ID. Default 0.
         * @since 2.1.0
         *
         * @see Walker::start_el()
         */

        public function start_lvl( &$storefront_eshop_output, $storefront_eshop_depth = 0, $storefront_eshop_args = array() ) {
            $storefront_eshop_indent  = str_repeat( "\t", $storefront_eshop_depth );
            $storefront_eshop_output .= "$storefront_eshop_indent<ul class='sub-menu'>\n";
        }

        public function start_el(&$storefront_eshop_output, $page, $storefront_eshop_depth = 0, $storefront_eshop_args = array(), $current_page = 0)
        {

            if (isset($storefront_eshop_args['item_spacing']) && 'preserve' === $storefront_eshop_args['item_spacing']) {
                $t = "\t";
                $n = "\n";
            } else {
                $t = '';
                $n = '';
            }
            if ($storefront_eshop_depth) {
                $storefront_eshop_indent = str_repeat($t, $storefront_eshop_depth);
            } else {
                $storefront_eshop_indent = '';
            }

            $storefront_eshop_css_class = array('page_item', 'page-item-' . $page->ID);

            if (isset($storefront_eshop_args['pages_with_children'][$page->ID])) {
                $storefront_eshop_css_class[] = 'page_item_has_children';
            }

            if (!empty($current_page)) {
                $_current_page = get_post($current_page);
                if ($_current_page && in_array($page->ID, $_current_page->ancestors, true)) {
                    $storefront_eshop_css_class[] = 'current_page_ancestor';
                }
                if ($page->ID === $current_page) {
                    $storefront_eshop_css_class[] = 'current_page_item';
                } elseif ($_current_page && $page->ID === $_current_page->post_parent) {
                    $storefront_eshop_css_class[] = 'current_page_parent';
                }
            } elseif (get_option('page_for_posts') === $page->ID) {
                $storefront_eshop_css_class[] = 'current_page_parent';
            }

            /** This filter is documented in wp-includes/class-walker-page.php */
            $storefront_eshop_css_classes = implode(' ', apply_filters('page_css_class', $storefront_eshop_css_class, $page, $storefront_eshop_depth, $storefront_eshop_args, $current_page));
            $storefront_eshop_css_classes = $storefront_eshop_css_classes ? ' class="' . esc_attr($storefront_eshop_css_classes) . '"' : '';

            if ('' === $page->post_title) {
                /* translators: %d: ID of a post. */
                $page->post_title = sprintf(__('#%d (no title)', 'storefront-eshop'), $page->ID);
            }

            $storefront_eshop_args['link_before'] = empty($storefront_eshop_args['link_before']) ? '' : $storefront_eshop_args['link_before'];
            $storefront_eshop_args['link_after'] = empty($storefront_eshop_args['link_after']) ? '' : $storefront_eshop_args['link_after'];

            $storefront_eshop_atts = array();
            $storefront_eshop_atts['href'] = get_permalink($page->ID);
            $storefront_eshop_atts['aria-current'] = ($page->ID === $current_page) ? 'page' : '';

            /** This filter is documented in wp-includes/class-walker-page.php */
            $storefront_eshop_atts = apply_filters('page_menu_link_attributes', $storefront_eshop_atts, $page, $storefront_eshop_depth, $storefront_eshop_args, $current_page);

            $storefront_eshop_attributes = '';
            foreach ($storefront_eshop_atts as $attr => $storefront_eshop_value) {
                if (!empty($storefront_eshop_value)) {
                    $storefront_eshop_value = ('href' === $attr) ? esc_url($storefront_eshop_value) : esc_attr($storefront_eshop_value);
                    $storefront_eshop_attributes .= ' ' . $attr . '="' . $storefront_eshop_value . '"';
                }
            }

            $storefront_eshop_args['list_item_before'] = '';
            $storefront_eshop_args['list_item_after'] = '';
            $storefront_eshop_args['icon_rennder'] = '';
            // Wrap the link in a div and append a sub menu toggle.
            if (isset($storefront_eshop_args['show_toggles']) && true === $storefront_eshop_args['show_toggles']) {
                // Wrap the menu item link contents in a div, used for positioning.
                $storefront_eshop_args['list_item_after'] = '';
            }


            // Add icons to menu items with children.
            if (isset($storefront_eshop_args['show_sub_menu_icons']) && true === $storefront_eshop_args['show_sub_menu_icons']) {
                if (isset($storefront_eshop_args['pages_with_children'][$page->ID])) {
                    $storefront_eshop_args['icon_rennder'] = '';
                }
            }

            // Add icons to menu items with children.
            if (isset($storefront_eshop_args['show_toggles']) && true === $storefront_eshop_args['show_toggles']) {
                if (isset($storefront_eshop_args['pages_with_children'][$page->ID])) {

                    $toggle_target_string = '.page_item.page-item-' . $page->ID . ' > .sub-menu';

                    $storefront_eshop_args['list_item_after'] = '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . __( 'Show sub menu', 'storefront-eshop' ) . '</span>' . storefront_eshop_get_theme_svg( 'chevron-down' ) . '</span></button>';
                }
            }

            if (isset($storefront_eshop_args['show_toggles']) && true === $storefront_eshop_args['show_toggles']) {

                $storefront_eshop_output .= $storefront_eshop_indent . sprintf(
                        '<li%s>%s%s<a%s>%s%s%s</a>%s%s',
                        $storefront_eshop_css_classes,
                        '<div class="submenu-wrapper">',
                        $storefront_eshop_args['list_item_before'],
                        $storefront_eshop_attributes,
                        $storefront_eshop_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $storefront_eshop_args['link_after'],
                        $storefront_eshop_args['list_item_after'],
                        '</div>'
                    );

            }else{

                $storefront_eshop_output .= $storefront_eshop_indent . sprintf(
                        '<li%s>%s<a%s>%s%s%s%s</a>%s',
                        $storefront_eshop_css_classes,
                        $storefront_eshop_args['list_item_before'],
                        $storefront_eshop_attributes,
                        $storefront_eshop_args['link_before'],
                        /** This filter is documented in wp-includes/post-template.php */
                        apply_filters('the_title', $page->post_title, $page->ID),
                        $storefront_eshop_args['icon_rennder'],
                        $storefront_eshop_args['link_after'],
                        $storefront_eshop_args['list_item_after']
                    );

            }

            if (!empty($storefront_eshop_args['show_date'])) {
                if ('modified' === $storefront_eshop_args['show_date']) {
                    $storefront_eshop_time = $page->post_modified;
                } else {
                    $storefront_eshop_time = $page->post_date;
                }

                $storefront_eshop_date_format = empty($storefront_eshop_args['date_format']) ? '' : $storefront_eshop_args['date_format'];
                $storefront_eshop_output .= ' ' . mysql2date($storefront_eshop_date_format, $storefront_eshop_time);
            }
        }
    }
}