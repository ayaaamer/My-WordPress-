<?php

require get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function storefront_eshop_register_recommended_plugins() {
	$plugins = array(		
		array(
			'name'             => __( 'YITH WooCommerce Wishlist', 'storefront-eshop' ),
			'slug'             => 'yith-woocommerce-wishlist',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Google Language Translator', 'storefront-eshop' ),
			'slug'             => 'google-language-translator',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WooCommerce Currency Switcher', 'storefront-eshop' ),
			'slug'             => 'woocommerce-currency-switcher',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WooCommerce', 'storefront-eshop' ),
			'slug'             => 'woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'storefront_eshop_register_recommended_plugins' );