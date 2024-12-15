<?php
/**
 * Storefront Eshop Theme Customizer
 * @package Storefront Eshop
 */

/** Sanitize Functions. **/
	require get_template_directory() . '/inc/customizer/default.php';

if (!function_exists('storefront_eshop_customize_register')) :

function storefront_eshop_customize_register( $wp_customize ) {

	require get_template_directory() . '/inc/customizer/custom-classes.php';
	require get_template_directory() . '/inc/customizer/sanitize.php';
	require get_template_directory() . '/inc/customizer/typography.php';
	require get_template_directory() . '/inc/customizer/header-button.php';
	require get_template_directory() . '/inc/customizer/colors.php';
	require get_template_directory() . '/inc/customizer/post.php';
	require get_template_directory() . '/inc/customizer/footer.php';
	require get_template_directory() . '/inc/customizer/layout-setting.php';
	require get_template_directory() . '/inc/customizer/global-color-setting.php';
	require get_template_directory() . '/inc/customizer/homepage-content.php';
	require get_template_directory() . '/inc/customizer/custom-addon.php';
	require get_template_directory() . '/inc/customizer/additional-woocommerce.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'colors' )->panel = 'storefront_eshop_theme_colors_panel';
	$wp_customize->get_section( 'colors' )->title = esc_html__('Color Options','storefront-eshop');
	$wp_customize->get_section( 'title_tagline' )->panel = 'storefront_eshop_theme_general_settings';
	$wp_customize->get_section( 'header_image' )->panel = 'storefront_eshop_theme_general_settings';
	$wp_customize->get_section( 'background_image' )->panel = 'storefront_eshop_theme_general_settings';

	if ( isset( $wp_customize->selective_refresh ) ) {
		
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.header-titles .custom-logo-name',
			'render_callback' => 'storefront_eshop_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'storefront_eshop_customize_partial_blogdescription',
		) );

	}

	$wp_customize->add_panel( 'storefront_eshop_theme_general_settings',
		array(
			'title'      => esc_html__( 'General Settings', 'storefront-eshop' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel( 'storefront_eshop_theme_colors_panel',
		array(
			'title'      => esc_html__( 'Color Settings', 'storefront-eshop' ),
			'priority'   => 15,
			'capability' => 'edit_theme_options',
		)
	);

	// Theme Options Panel.
	$wp_customize->add_panel( 'storefront_eshop_theme_footer_option_panel',
		array(
			'title'      => esc_html__( 'Footer Setting', 'storefront-eshop' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Template Options
	$wp_customize->add_panel( 'storefront_eshop_theme_home_pannel',
		array(
			'title'      => esc_html__( 'Frontpage Settings', 'storefront-eshop' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Theme Addons Panel.
	$wp_customize->add_panel( 'storefront_eshop_theme_addons_panel',
		array(
			'title'      => esc_html__( 'Theme Addons', 'storefront-eshop' ),
			'priority'   => 5,
			'capability' => 'edit_theme_options',
		)
	);
	
	// Theme Options Panel.
	$wp_customize->add_panel( 'storefront_eshop_theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'storefront-eshop' ),
			'priority'   => 5,
			'capability' => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting('storefront_eshop_logo_width_range',
	    array(
	        'default'           => $storefront_eshop_default['storefront_eshop_logo_width_range'],
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'storefront_eshop_sanitize_number_range',
	    )
	);
	$wp_customize->add_control('storefront_eshop_logo_width_range',
	    array(
	        'label'       => esc_html__('Logo width', 'storefront-eshop'),
	        'description'       => esc_html__( 'Specify the range for logo size with a minimum of 200px and a maximum of 700px, in increments of 20px.', 'storefront-eshop' ),
	        'section'     => 'title_tagline',
	        'type'        => 'range',
	        'input_attrs' => array(
	           'min'   => 200,
	           'max'   => 700,
	           'step'   => 20,
        	),
	    )
	);

	// Register custom section types.
	$wp_customize->register_section_type( 'Storefront_Eshop_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Storefront_Eshop_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Storefront Eshop Pro', 'storefront-eshop' ),
				'pro_text' => esc_html__( 'Upgrade To Pro', 'storefront-eshop' ),
				'pro_url'  => esc_url('https://www.omegathemes.com/products/eshop-wordpress-theme'),
				'priority'  => 1,
			)
		)
	);
}

endif;
add_action( 'customize_register', 'storefront_eshop_customize_register' );

/**
 * Customizer Enqueue scripts and styles.
 */

if (!function_exists('storefront_eshop_customizer_scripts')) :

    function storefront_eshop_customizer_scripts(){
    	
    	wp_enqueue_script('jquery-ui-button');
    	wp_enqueue_style('storefront-eshop-customizer', get_template_directory_uri() . '/lib/custom/css/customizer.css');
        wp_enqueue_script('storefront-eshop-customizer', get_template_directory_uri() . '/lib/custom/js/customizer.js', array('jquery','customize-controls'), '', 1);

        $ajax_nonce = wp_create_nonce('storefront_eshop_ajax_nonce');
        wp_localize_script( 
		    'storefront-eshop-customizer',
		    'storefront_eshop_customizer',
		    array(
		        'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
		        'ajax_nonce' => $ajax_nonce,
		     )
		);
    }

endif;

add_action('customize_controls_enqueue_scripts', 'storefront_eshop_customizer_scripts');
add_action('customize_controls_init', 'storefront_eshop_customizer_scripts');

function storefront_eshop_customize_preview_js() {
	wp_enqueue_script( 'storefront-eshop-customizer-preview', get_template_directory_uri() . '/lib/custom/js/customizer-preview.js', array( 'customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'storefront_eshop_customize_preview_js' );

if (!function_exists('storefront_eshop_customize_partial_blogname')) :
	function storefront_eshop_customize_partial_blogname() {
		bloginfo( 'name' );
	}
endif;

if (!function_exists('storefront_eshop_customize_partial_blogdescription')) :
	function storefront_eshop_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
endif;