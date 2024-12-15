<?php
/**
* Sidebar Metabox.
*
* @package Storefront Eshop
*/

$storefront_eshop_post_sidebar_fields = array(
    'global-sidebar' => array(
        'id'        => 'post-global-sidebar',
        'value' => 'global-sidebar',
        'label' => esc_html__( 'Global sidebar', 'storefront-eshop' ),
    ),
    'right-sidebar' => array(
        'id'        => 'post-left-sidebar',
        'value' => 'right-sidebar',
        'label' => esc_html__( 'Right sidebar', 'storefront-eshop' ),
    ),
    'left-sidebar' => array(
        'id'        => 'post-right-sidebar',
        'value'     => 'left-sidebar',
        'label'     => esc_html__( 'Left sidebar', 'storefront-eshop' ),
    ),
    'no-sidebar' => array(
        'id'        => 'post-no-sidebar',
        'value'     => 'no-sidebar',
        'label'     => esc_html__( 'No sidebar', 'storefront-eshop' ),
    ),
);