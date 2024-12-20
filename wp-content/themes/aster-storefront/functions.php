<?php
/**
 * Aster Storefront functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aster_storefront
 */

$aster_storefront_theme_data = wp_get_theme();
if( ! defined( 'ASTER_STOREFRONT_THEME_VERSION' ) ) define ( 'ASTER_STOREFRONT_THEME_VERSION', $aster_storefront_theme_data->get( 'Version' ) );
if( ! defined( 'ASTER_STOREFRONT_THEME_NAME' ) ) define( 'ASTER_STOREFRONT_THEME_NAME', $aster_storefront_theme_data->get( 'Name' ) );
if( ! defined( 'ASTER_STOREFRONT_THEME_TEXTDOMAIN' ) ) define( 'ASTER_STOREFRONT_THEME_TEXTDOMAIN', $aster_storefront_theme_data->get( 'TextDomain' ) );

/**
 * Include wptt webfont loader.
 */
require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/theme-library/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/theme-library/function-files/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/theme-library/function-files/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/theme-library/customizer.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/theme-library/function-files/google-fonts.php';

/**
 * Dynamic CSS
 */
require get_template_directory() . '/theme-library/dynamic-css.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/theme-library/function-files/class-breadcrumb-trail.php';

/**
 * Getting Started
*/
require get_template_directory() . '/theme-library/getting-started/getting-started.php';

/**
 * Demo Import
*/
require get_parent_theme_file_path( '/theme-wizard/config.php' );


if ( ! defined( 'ASTER_STOREFRONT_VERSION' ) ) {
	define( 'ASTER_STOREFRONT_VERSION', '1.0.0' );
}

if ( ! function_exists( 'aster_storefront_setup' ) ) :
	
	function aster_storefront_setup() {
		
		load_theme_textdomain( 'aster-storefront', get_template_directory() . '/languages' );

		add_theme_support( 'woocommerce' );

		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'aster-storefront' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'woocommerce',
			)
		);

		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'gallery',
			'audio', 
		) );

		add_theme_support(
			'custom-background',
			apply_filters(
				'aster_storefront_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'aster_storefront_setup' );

function aster_storefront_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aster_storefront_content_width', 640 );
}
add_action( 'after_setup_theme', 'aster_storefront_content_width', 0 );

function aster_storefront_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'aster-storefront' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'aster-storefront' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		)
	);

	$aster_storefront_footer_widget_column = get_theme_mod('aster_storefront_footer_widget_column','4');
	for ($i=1; $i<=$aster_storefront_footer_widget_column; $i++) {
		register_sidebar( array(
			'name' => __( 'Footer  ', 'aster-storefront' )  . $i,
			'id' => 'aster-storefront-footer-widget-' . $i,
			'description' => __( 'The Footer Widget Area', 'aster-storefront' )  . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<div class="widget-header"><h4 class="widget-title">',
			'after_title' => '</h4></div>',
		) );
	}	
}
add_action( 'widgets_init', 'aster_storefront_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aster_storefront_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Slick style.
	wp_enqueue_style( 'aster-storefront-slick-style', get_template_directory_uri() . '/resource/css/slick' . $min . '.css', array(), '1.8.1' );

	// Fontawesome style.
	wp_enqueue_style( 'aster-storefront-fontawesome-style', get_template_directory_uri() . '/resource/css/fontawesome' . $min . '.css', array(), '5.15.4' );

	// Google fonts.
	wp_enqueue_style( 'aster-storefront-google-fonts', wptt_get_webfont_url( aster_storefront_get_fonts_url() ), array(), null );

	// Main style.
	wp_enqueue_style( 'aster-storefront-style', get_template_directory_uri() . '/style.css', array(), ASTER_STOREFRONT_VERSION );

	// RTL style.
	wp_style_add_data('aster-storefront-style', 'rtl', 'replace');

	// Navigation script.
	wp_enqueue_script( 'aster-storefront-navigation-script', get_template_directory_uri() . '/resource/js/navigation' . $min . '.js', array(), ASTER_STOREFRONT_VERSION, true );

	// Slick script.
	wp_enqueue_script( 'aster-storefront-slick-script', get_template_directory_uri() . '/resource/js/slick' . $min . '.js', array( 'jquery' ), '1.8.1', true );

	// Custom script.
	wp_enqueue_script( 'aster-storefront-custom-script', get_template_directory_uri() . '/resource/js/custom' . $min . '.js', array( 'jquery' ), ASTER_STOREFRONT_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aster_storefront_scripts' );


// Enqueue Customizer live preview script
function aster_storefront_customizer_live_preview() {
    wp_enqueue_script(
        'aster-storefront-customizer',
        get_template_directory_uri() . '/js/customizer.js',
        array('jquery', 'customize-preview'),
        '',
        true
    );
}
add_action('customize_preview_init', 'aster_storefront_customizer_live_preview');


function aster_storefront_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html( get_theme_mod( 'primary_color', '#ff0000' ) ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'aster_storefront_customize_css' );


function add_custom_script_in_footer() {
    if ( get_theme_mod( 'aster_storefront_enable_sticky_header', false ) ) {
        ?>
        <script>
            jQuery(document).ready(function($) {
                $(window).on('scroll', function() {
                    var scroll = $(window).scrollTop();
                    if (scroll > 0) {
                        $('.navigation-part.hello').addClass('is-sticky');
                    } else {
                        $('.navigation-part.hello').removeClass('is-sticky');
                    }
                });
            });
        </script>
        <?php
    }
}
add_action( 'wp_footer', 'add_custom_script_in_footer' );

function aster_storefront_enqueue_selected_fonts() {
    $aster_storefront_fonts_url = aster_storefront_get_fonts_url();
    if (!empty($aster_storefront_fonts_url)) {
        wp_enqueue_style('aster-storefront-google-fonts', $aster_storefront_fonts_url, array(), null);
    }
}
add_action('wp_enqueue_scripts', 'aster_storefront_enqueue_selected_fonts');

function aster_storefront_layout_customizer_css() {
    $aster_storefront_margin = get_theme_mod('aster_storefront_layout_width_margin', 50);
    ?>
    <style type="text/css">
        body.site-boxed--layout #page  {
            margin: 0 <?php echo esc_attr($aster_storefront_margin); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_storefront_layout_customizer_css');

function aster_storefront_blog_layout_customizer_css() {
    // Retrieve the blog layout option
    $aster_storefront_blog_layout_option = get_theme_mod('aster_storefront_blog_layout_option_setting', 'Left');

    // Initialize custom CSS variable
    $aster_storefront_custom_css = '';

    // Generate custom CSS based on the layout option
    if ($aster_storefront_blog_layout_option === 'Default') {
        $aster_storefront_custom_css .= '.mag-post-detail { text-align: center; }';
    } elseif ($aster_storefront_blog_layout_option === 'Left') {
        $aster_storefront_custom_css .= '.mag-post-detail { text-align: left; }';
    } elseif ($aster_storefront_blog_layout_option === 'Right') {
        $aster_storefront_custom_css .= '.mag-post-detail { text-align: right; }';
    }

    // Output the combined CSS
    ?>
    <style type="text/css">
        <?php echo wp_kses($aster_storefront_custom_css, array( 'style' => array(), 'text-align' => array() )); ?>
    </style>
    <?php
}
add_action('wp_head', 'aster_storefront_blog_layout_customizer_css');

function aster_storefront_sidebar_width_customizer_css() {
    $aster_storefront_sidebar_width = get_theme_mod('aster_storefront_sidebar_width', '30');
    ?>
    <style type="text/css">
        .right-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: auto <?php echo esc_attr($aster_storefront_sidebar_width); ?>%;
        }
        .left-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: <?php echo esc_attr($aster_storefront_sidebar_width); ?>% auto;
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_storefront_sidebar_width_customizer_css');

if ( ! function_exists( 'aster_storefront_get_page_title' ) ) {
    function aster_storefront_get_page_title() {
        $aster_storefront_title = '';

        if (is_404()) {
            $aster_storefront_title = esc_html__('Page Not Found', 'aster-storefront');
        } elseif (is_search()) {
            $aster_storefront_title = esc_html__('Search Results for: ', 'aster-storefront') . esc_html(get_search_query());
        } elseif (is_home() && !is_front_page()) {
            $aster_storefront_title = esc_html__('Blogs', 'aster-storefront');
        } elseif (function_exists('is_shop') && is_shop()) {
            $aster_storefront_title = esc_html__('Shop', 'aster-storefront');
        } elseif (is_page()) {
            $aster_storefront_title = get_the_title();
        } elseif (is_single()) {
            $aster_storefront_title = get_the_title();
        } elseif (is_archive()) {
            $aster_storefront_title = get_the_archive_title();
        } else {
            $aster_storefront_title = get_the_archive_title();
        }

        return apply_filters('aster_storefront_page_title', $aster_storefront_title);
    }
}

if ( ! function_exists( 'aster_storefront_has_page_header' ) ) {
    function aster_storefront_has_page_header() {
        // Default to true (display header)
        $aster_storefront_return = true;

        // Custom conditions for disabling the header
        if ('hide-all-devices' === get_theme_mod('aster_storefront_page_header_visibility', 'all-devices')) {
            $aster_storefront_return = false;
        }

        // Apply filters and return
        return apply_filters('aster_storefront_display_page_header', $aster_storefront_return);
    }
}

if ( ! function_exists( 'aster_storefront_page_header_style' ) ) {
    function aster_storefront_page_header_style() {
        $aster_storefront_style = get_theme_mod('aster_storefront_page_header_style', 'default');
        return apply_filters('aster_storefront_page_header_style', $aster_storefront_style);
    }
}

function aster_storefront_page_title_customizer_css() {
    $aster_storefront_layout_option = get_theme_mod('aster_storefront_page_header_layout', 'left');
    ?>
    <style type="text/css">
        .asterthemes-wrapper.page-header-inner {
            <?php if ($aster_storefront_layout_option === 'flex') : ?>
                display: flex;
                justify-content: space-between;
                align-items: center;
            <?php else : ?>
                text-align: <?php echo esc_attr($aster_storefront_layout_option); ?>;
            <?php endif; ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_storefront_page_title_customizer_css');

function aster_storefront_pagetitle_height_css() {
    $aster_storefront_height = get_theme_mod('aster_storefront_pagetitle_height', 50);
    ?>
    <style type="text/css">
        header.page-header {
            padding: <?php echo esc_attr($aster_storefront_height); ?>px 0;
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_storefront_pagetitle_height_css');

function aster_storefront_site_logo_width() {
    $aster_storefront_site_logo_width = get_theme_mod('aster_storefront_site_logo_width', 200);
    ?>
    <style type="text/css">
        .site-logo img {
            max-width: <?php echo esc_attr($aster_storefront_site_logo_width); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_storefront_site_logo_width');

function aster_storefront_menu_font_size_css() {
    $aster_storefront_menu_font_size = get_theme_mod('aster_storefront_menu_font_size', 15);
    ?>
    <style type="text/css">
        .main-navigation a {
            font-size: <?php echo esc_attr($aster_storefront_menu_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_storefront_menu_font_size_css');

function aster_storefront_sidebar_widget_font_size_css() {
    $aster_storefront_sidebar_widget_font_size = get_theme_mod('aster_storefront_sidebar_widget_font_size', 21);
    ?>
    <style type="text/css">
        h2.wp-block-heading {
            font-size: <?php echo esc_attr($aster_storefront_sidebar_widget_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'aster_storefront_sidebar_widget_font_size_css');