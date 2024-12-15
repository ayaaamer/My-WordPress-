<?php
/**
 * Custom Functions.
 *
 * @package Storefront Eshop
 */

if( !function_exists( 'storefront_eshop_storefront_eshop_fonts_url' ) ) :

    //Google Fonts URL
    function storefront_eshop_storefront_eshop_fonts_url(){

        $storefront_eshop_font_families = array(
            'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
        );

        $storefront_eshop_fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $storefront_eshop_font_families ),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2' );

        return esc_url_raw($storefront_eshop_fonts_url);

    }

endif;

if ( ! function_exists( 'storefront_eshop_sub_menu_toggle_button' ) ) :

    function storefront_eshop_sub_menu_toggle_button( $storefront_eshop_args, $storefront_eshop_item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $storefront_eshop_args->theme_location == 'storefront-eshop-primary-menu' && isset( $storefront_eshop_args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $storefront_eshop_args->before = '<div class="submenu-wrapper">';
            $storefront_eshop_args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $storefront_eshop_item->classes ) ) {

                $storefront_eshop_toggle_target_string = '.menu-item.menu-item-' . $storefront_eshop_item->ID . ' > .sub-menu';

                // Add the sub menu toggle
                $storefront_eshop_args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $storefront_eshop_toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'storefront-eshop' ) . '</span>' . storefront_eshop_get_theme_svg( 'chevron-down' ) . '</span></button>';

            }

            // Close the wrapper
            $storefront_eshop_args->after .= '</div><!-- .submenu-wrapper -->';
            // Add sub menu icons to the main menu without toggles (the fallback menu)

        }elseif( $storefront_eshop_args->theme_location == 'storefront-eshop-primary-menu' ) {

            if ( in_array( 'menu-item-has-children', $storefront_eshop_item->classes ) ) {

                $storefront_eshop_args->before = '<div class="link-icon-wrapper">';
                $storefront_eshop_args->after  = storefront_eshop_get_theme_svg( 'chevron-down' ) . '</div>';

            } else {

                $storefront_eshop_args->before = '';
                $storefront_eshop_args->after  = '';

            }

        }

        return $storefront_eshop_args;

    }

endif;

add_filter( 'nav_menu_item_args', 'storefront_eshop_sub_menu_toggle_button', 10, 3 );

if ( ! function_exists( 'storefront_eshop_the_theme_svg' ) ):
    
    function storefront_eshop_the_theme_svg( $storefront_eshop_svg_name, $storefront_eshop_return = false ) {

        if( $storefront_eshop_return ){

            return storefront_eshop_get_theme_svg( $storefront_eshop_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in storefront_eshop_get_theme_svg();.

        }else{

            echo storefront_eshop_get_theme_svg( $storefront_eshop_svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in storefront_eshop_get_theme_svg();.

        }
    }

endif;

if ( ! function_exists( 'storefront_eshop_get_theme_svg' ) ):

    function storefront_eshop_get_theme_svg( $storefront_eshop_svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $storefront_eshop_svg = wp_kses(
            Storefront_Eshop_SVG_Icons::get_svg( $storefront_eshop_svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
                'polyline' => array(
                    'fill'      => true,
                    'points'    => true,
                ),
                'line' => array(
                    'fill'      => true,
                    'x1'      => true,
                    'x2' => true,
                    'y1'    => true,
                    'y2' => true,
                ),
            )
        );
        if ( ! $storefront_eshop_svg ) {
            return false;
        }
        return $storefront_eshop_svg;

    }

endif;

if( !function_exists( 'storefront_eshop_post_category_list' ) ) :

    // Post Category List.
    function storefront_eshop_post_category_list( $storefront_eshop_select_cat = true ){

        $storefront_eshop_post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $storefront_eshop_post_cat_cat_array = array();
        if( $storefront_eshop_select_cat ){

            $storefront_eshop_post_cat_cat_array[''] = esc_html__( '-- Select Category --','storefront-eshop' );

        }

        foreach ( $storefront_eshop_post_cat_lists as $storefront_eshop_post_cat_list ) {

            $storefront_eshop_post_cat_cat_array[$storefront_eshop_post_cat_list->slug] = $storefront_eshop_post_cat_list->name;

        }

        return $storefront_eshop_post_cat_cat_array;
    }

endif;

if( !function_exists('storefront_eshop_single_post_navigation') ):

    function storefront_eshop_single_post_navigation(){

        $storefront_eshop_default = storefront_eshop_get_default_theme_options();
        $storefront_eshop_twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'twp_disable_ajax_load_next_post', true ) );
        $storefront_eshop_current_id = '';
        $article_wrap_class = '';
        global $post;
        $storefront_eshop_current_id = $post->ID;
        if( $storefront_eshop_twp_navigation_type == '' || $storefront_eshop_twp_navigation_type == 'global-layout' ){
            $storefront_eshop_twp_navigation_type = get_theme_mod('twp_navigation_type', $storefront_eshop_default['twp_navigation_type']);
        }

        if( $storefront_eshop_twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

            if( $storefront_eshop_twp_navigation_type == 'theme-normal-navigation' ){ ?>

                <div class="navigation-wrapper">
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'prev_text' => '<span class="arrow" aria-hidden="true">' . storefront_eshop_the_theme_svg('arrow-left',$storefront_eshop_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Previous post:', 'storefront-eshop') . '</span><span class="post-title">%title</span>',
                        'next_text' => '<span class="arrow" aria-hidden="true">' . storefront_eshop_the_theme_svg('arrow-right',$storefront_eshop_return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Next post:', 'storefront-eshop') . '</span><span class="post-title">%title</span>',
                    )); ?>
                </div>
                <?php

            }else{

                $storefront_eshop_next_post = get_next_post();
                if( isset( $storefront_eshop_next_post->ID ) ){

                    $storefront_eshop_next_post_id = $storefront_eshop_next_post->ID;
                    echo '<div loop-count="1" next-post="' . absint( $storefront_eshop_next_post_id ) . '" class="twp-single-infinity"></div>';

                }
            }

        }

    }

endif;

add_action( 'storefront_eshop_navigation_action','storefront_eshop_single_post_navigation',30 );

if( !function_exists('storefront_eshop_content_offcanvas') ):

    // Offcanvas Contents
    function storefront_eshop_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <?php echo esc_html__('Close', 'storefront-eshop'); ?>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'storefront-eshop'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('storefront-eshop-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'storefront-eshop-primary-menu',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new Storefront_Eshop_Walker_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'storefront_eshop_before_footer_content_action','storefront_eshop_content_offcanvas',30 );

if( !function_exists('storefront_eshop_footer_content_widget') ):

    function storefront_eshop_footer_content_widget(){

        $storefront_eshop_default = storefront_eshop_get_default_theme_options();
            $storefront_eshop_footer_column_layout = absint(get_theme_mod('storefront_eshop_footer_column_layout', $storefront_eshop_default['storefront_eshop_footer_column_layout']));
            $storefront_eshop_footer_sidebar_class = 12;
            if($storefront_eshop_footer_column_layout == 2) {
                $storefront_eshop_footer_sidebar_class = 6;
            }
            if($storefront_eshop_footer_column_layout == 3) {
                $storefront_eshop_footer_sidebar_class = 4;
            }
            ?>
           
            <?php if ( get_theme_mod('storefront_eshop_display_footer', false) == true ) : ?>
                <div class="footer-widgetarea">
                    <div class="wrapper">
                        <div class="column-row">

                            <?php for ($i=0; $i < $storefront_eshop_footer_column_layout; $i++) {
                                ?>
                                <div class="column <?php echo 'column-' . absint($storefront_eshop_footer_sidebar_class); ?> column-sm-12">
                                    <?php dynamic_sidebar('storefront-eshop-footer-widget-' . $i); ?>
                                </div>
                           <?php } ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php

    }

endif;

add_action( 'storefront_eshop_footer_content_action','storefront_eshop_footer_content_widget',10 );

if( !function_exists('storefront_eshop_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function storefront_eshop_footer_content_info(){

        $storefront_eshop_default = storefront_eshop_get_default_theme_options(); ?>
        <div class="site-info">
            <div class="wrapper">
                <div class="column-row">

                    <div class="column column-9">
                        <div class="footer-credits">

                            <div class="footer-copyright">

                                <?php
                                $storefront_eshop_footer_copyright_text = wp_kses_post( get_theme_mod( 'storefront_eshop_footer_copyright_text', $storefront_eshop_default['storefront_eshop_footer_copyright_text'] ) );
                                    echo esc_html( $storefront_eshop_footer_copyright_text );
                                    echo '<br>';
                                    echo esc_html__('Theme: ', 'storefront-eshop') . '<a href="' . esc_url('https://www.omegathemes.com/products/free-storefront-wordpress-theme') . '" title="' . esc_attr__('Storefront Eshop ', 'storefront-eshop') . '" target="_blank"><span>' . esc_html__('Storefront Eshop ', 'storefront-eshop') . '</span></a>' . esc_html__('By ', 'storefront-eshop') . '  <span>' . esc_html__('OMEGA ', 'storefront-eshop') . '</span>';
                                    echo esc_html__('Powered by ', 'storefront-eshop') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'storefront-eshop') . '" target="_blank"><span>' . esc_html__('WordPress.', 'storefront-eshop') . '</span></a>';
                                 ?>

                            </div>
                        </div>
                    </div>


                    <div class="column column-3 align-text-right">
                        <a class="to-the-top" href="#site-header">
                            <span class="to-the-top-long">
                                <?php if ( get_theme_mod('storefront_eshop_enable_to_the_top', true) == true ) : ?>
                                    <?php
                                    $storefront_eshop_to_the_top_text = get_theme_mod( 'storefront_eshop_to_the_top_text', __( 'To the Top', 'storefront-eshop' ) );
                                    printf( 
                                        wp_kses( 
                                            /* translators: %s is the arrow icon markup */
                                            '%s %s', 
                                            array( 'span' => array( 'class' => array(), 'aria-hidden' => array() ) ) 
                                        ), 
                                        esc_html( $storefront_eshop_to_the_top_text ),
                                        '<span class="arrow" aria-hidden="true">&uarr;</span>' 
                                    );
                                    ?>
                                <?php endif; ?>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'storefront_eshop_footer_content_action','storefront_eshop_footer_content_info',20 );


if( !function_exists( 'storefront_eshop_main_slider' ) ) :

    function storefront_eshop_main_slider(){

        $storefront_eshop_defaults = storefront_eshop_get_default_theme_options();

        $storefront_eshop_homepage_section_shipping_title = esc_html( get_theme_mod( 'storefront_eshop_homepage_section_shipping_title',
        $storefront_eshop_defaults['storefront_eshop_homepage_section_shipping_title'] ) );

        $storefront_eshop_homepage_section_shipping_text = esc_html( get_theme_mod( 'storefront_eshop_homepage_section_shipping_text',
        $storefront_eshop_defaults['storefront_eshop_homepage_section_shipping_text'] ) );

        $storefront_eshop_homepage_section_exchange_title = esc_html( get_theme_mod( 'storefront_eshop_homepage_section_exchange_title',
        $storefront_eshop_defaults['storefront_eshop_homepage_section_exchange_title'] ) );

        $storefront_eshop_homepage_section_exchange_text = esc_html( get_theme_mod( 'storefront_eshop_homepage_section_exchange_text',
        $storefront_eshop_defaults['storefront_eshop_homepage_section_exchange_text'] ) );

        $storefront_eshop_homepage_section_support_title = esc_html( get_theme_mod( 'storefront_eshop_homepage_section_support_title',
        $storefront_eshop_defaults['storefront_eshop_homepage_section_support_title'] ) );

        $storefront_eshop_homepage_section_support_text = esc_html( get_theme_mod( 'storefront_eshop_homepage_section_support_text',
        $storefront_eshop_defaults['storefront_eshop_homepage_section_support_text'] ) );

        $storefront_eshop_homepage_section_shopping_title = esc_html( get_theme_mod( 'storefront_eshop_homepage_section_shopping_title',
        $storefront_eshop_defaults['storefront_eshop_homepage_section_shopping_title'] ) );

        $storefront_eshop_homepage_section_shopping_text = esc_html( get_theme_mod( 'storefront_eshop_homepage_section_shopping_text',
        $storefront_eshop_defaults['storefront_eshop_homepage_section_shopping_text'] ) );

        $storefront_eshop_defaults = storefront_eshop_get_default_theme_options();
        $storefront_eshop_header_banner = get_theme_mod( 'storefront_eshop_header_banner', $storefront_eshop_defaults['storefront_eshop_header_banner'] );
        $storefront_eshop_header_banner_cat = get_theme_mod( 'storefront_eshop_header_banner_cat' );

        if( $storefront_eshop_header_banner ){

            $storefront_eshop_rtl = '';
            if( is_rtl() ){
                $storefront_eshop_rtl = 'dir="rtl"';
            }

          $storefront_eshop_banner_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 4,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $storefront_eshop_header_banner_cat ) ) );

          if( $storefront_eshop_banner_query->have_posts() ): ?>

            <div class="theme-custom-block theme-banner-block">
                <div class="wrapper">
                    <div class="swiper-container theme-main-carousel swiper-container" <?php echo $storefront_eshop_rtl; ?>>
                        <div class="swiper-wrapper">
                            <?php
                            while( $storefront_eshop_banner_query->have_posts() ):
                                $storefront_eshop_banner_query->the_post();
                                $storefront_eshop_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                                $storefront_eshop_default_image = get_template_directory_uri() . '/assets/images/banner.png'; // Replace with the actual path to your default image  
                                $storefront_eshop_featured_image = isset( $storefront_eshop_featured_image[0] ) ? $storefront_eshop_featured_image[0] : $storefront_eshop_default_image;?>

                                <div class="swiper-slide main-carousel-item">                                 
                                    <div class="theme-article-post">
                                        <div class="entry-thumbnail">
                                            <div class="data-bg data-bg-large" data-background="<?php echo esc_url($storefront_eshop_featured_image); ?>">
                                                <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
                                            </div>
                                            <?php storefront_eshop_post_format_icon(); ?>
                                        </div>                                
                                        <div class="main-carousel-caption">
                                            <div class="post-content">
                                                <header class="entry-header">
                                                    <h2 class="entry-title entry-title-big">
                                                        <a href="<?php the_permalink(); ?>" rel="bookmark"><span><?php the_title(); ?></span></a>
                                                    </h2>
                                                </header>


                                                <div class="entry-content">
                                                    <?php
                                                    if (has_excerpt()) {

                                                      the_excerpt();

                                                    } else {

                                                      echo esc_html(wp_trim_words(get_the_content(), 25, '...'));

                                                    } ?>
                                                </div>

                                                <a href="<?php the_permalink(); ?>" class="btn-fancy btn-fancy-primary" tabindex="0">
                                                  <?php echo esc_html__('Know More', 'storefront-eshop'); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                    <section id="info-header">
                        <div class="header-wrapper">
                            <div class="theme-header-areas header-areas-left">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
                                <div class="header-areas-box">
                                    <?php if( $storefront_eshop_homepage_section_shipping_title ){ ?>
                                        <h6><?php echo esc_html( $storefront_eshop_homepage_section_shipping_title ); ?></h6>
                                    <?php } ?>
                                    <?php if( $storefront_eshop_homepage_section_shipping_text ){ ?>
                                        <p><?php echo esc_html( $storefront_eshop_homepage_section_shipping_text ); ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="theme-header-areas header-areas-left">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg>
                                <div class="header-areas-box">
                                    <?php if( $storefront_eshop_homepage_section_exchange_title ){ ?>
                                        <h6><?php echo esc_html( $storefront_eshop_homepage_section_exchange_title ); ?></h6>
                                    <?php } ?>
                                    <?php if( $storefront_eshop_homepage_section_exchange_text ){ ?>
                                        <p><?php echo esc_html( $storefront_eshop_homepage_section_exchange_text ); ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="theme-header-areas header-areas-right">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg>
                                <div class="header-areas-box">
                                    <?php if( $storefront_eshop_homepage_section_support_title ){ ?>
                                        <h6><?php echo esc_html( $storefront_eshop_homepage_section_support_title ); ?></h6>
                                    <?php } ?>
                                    <?php if( $storefront_eshop_homepage_section_support_text ){ ?>
                                        <p><?php echo esc_html( $storefront_eshop_homepage_section_support_text ); ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="theme-header-areas header-areas-right">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"/></svg>
                                <div class="header-areas-box">
                                    <?php if( $storefront_eshop_homepage_section_shopping_title ){ ?>
                                        <h6><?php echo esc_html( $storefront_eshop_homepage_section_shopping_title ); ?></h6>
                                    <?php } ?>
                                    <?php if( $storefront_eshop_homepage_section_shopping_text ){ ?>
                                        <p><?php echo esc_html( $storefront_eshop_homepage_section_shopping_text ); ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

          <?php
          wp_reset_postdata();
          endif;

        }

    }

endif;

if (!function_exists('storefront_eshop_post_format_icon')):

    // Post Format Icon.
    function storefront_eshop_post_format_icon() {

        $storefront_eshop_format = get_post_format(get_the_ID()) ?: 'standard';
        $storefront_eshop_icon = '';
        $storefront_eshop_title = '';
        if( $storefront_eshop_format == 'video' ){
            $storefront_eshop_icon = storefront_eshop_get_theme_svg( 'video' );
            $storefront_eshop_title = esc_html__('Video','storefront-eshop');
        }elseif( $storefront_eshop_format == 'audio' ){
            $storefront_eshop_icon = storefront_eshop_get_theme_svg( 'audio' );
            $storefront_eshop_title = esc_html__('Audio','storefront-eshop');
        }elseif( $storefront_eshop_format == 'gallery' ){
            $storefront_eshop_icon = storefront_eshop_get_theme_svg( 'gallery' );
            $storefront_eshop_title = esc_html__('Gallery','storefront-eshop');
        }elseif( $storefront_eshop_format == 'quote' ){
            $storefront_eshop_icon = storefront_eshop_get_theme_svg( 'quote' );
            $storefront_eshop_title = esc_html__('Quote','storefront-eshop');
        }elseif( $storefront_eshop_format == 'image' ){
            $storefront_eshop_icon = storefront_eshop_get_theme_svg( 'image' );
            $storefront_eshop_title = esc_html__('Image','storefront-eshop');
        }
        
        if (!empty($storefront_eshop_icon)) { ?>
            <div class="theme-post-format">
                <span class="post-format-icom"><?php echo storefront_eshop_svg_escape($storefront_eshop_icon); ?></span>
                <?php if( $storefront_eshop_title ){ echo '<span class="post-format-label">'.esc_html( $storefront_eshop_title ).'</span>'; } ?>
            </div>
        <?php }
    }

endif;

if ( ! function_exists( 'storefront_eshop_svg_escape' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $storefront_eshop_svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function storefront_eshop_svg_escape( $storefront_eshop_input ) {

        // Make sure that only our allowed tags and attributes are included.
        $storefront_eshop_svg = wp_kses(
            $storefront_eshop_input,
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if ( ! $storefront_eshop_svg ) {
            return false;
        }

        return $storefront_eshop_svg;

    }

endif;

if( !function_exists( 'storefront_eshop_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function storefront_eshop_sanitize_sidebar_option_meta( $storefront_eshop_input ){

        $storefront_eshop_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $storefront_eshop_input,$storefront_eshop_metabox_options ) ){

            return $storefront_eshop_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'storefront_eshop_sanitize_pagination_meta' ) ) :

    // Sidebar Option Sanitize.
    function storefront_eshop_sanitize_pagination_meta( $storefront_eshop_input ){

        $storefront_eshop_metabox_options = array( 'Center','Right','Left');
        if( in_array( $storefront_eshop_input,$storefront_eshop_metabox_options ) ){

            return $storefront_eshop_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'storefront_eshop_product_section' ) ) :

    function storefront_eshop_product_section(){

        $storefront_eshop_defaults = storefront_eshop_get_default_theme_options();

        $storefront_eshop_product_section = get_theme_mod( 'storefront_eshop_product_section', $storefront_eshop_defaults['storefront_eshop_product_section'] );

        $storefront_eshop_product_heading = get_theme_mod( 'storefront_eshop_product_heading', $storefront_eshop_defaults['storefront_eshop_product_heading'] );

        $storefront_eshop_product_button_text = get_theme_mod( 'storefront_eshop_product_button_text', $storefront_eshop_defaults['storefront_eshop_product_button_text'] );

        $storefront_eshop_product_button_link = get_theme_mod( 'storefront_eshop_product_button_link', $storefront_eshop_defaults['storefront_eshop_product_button_link'] );

        if( $storefront_eshop_product_section ){

            $storefront_eshop_catData = get_theme_mod('storefront_eshop_featured_product_category','');
            if ( class_exists( 'WooCommerce' ) ) {
            $storefront_eshop_args = array(
                'post_type' => 'product',
                'posts_per_page' => 100,
                'product_cat' => $storefront_eshop_catData,
                'order' => 'ASC'
            ); ?>

            <div class="theme-product-block">
                <div class="wrapper">
                    <div class="header-wrapper">
                        <div class="theme-header-areas header-areas-left">
                            <?php if( $storefront_eshop_product_heading ){ ?>
                                <h3><?php echo esc_html( $storefront_eshop_product_heading ); ?></h3>
                            <?php } ?>
                        </div>
                        <div class="theme-header-areas header-areas-right">
                            <?php if( $storefront_eshop_product_button_text ){ ?>
                                <a class="product-button" href="<?php echo esc_url( $storefront_eshop_product_button_link ); ?>"><?php echo esc_html( $storefront_eshop_product_button_text ); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="product-image">
                        <?php 
                        $storefront_eshop_loop = new WP_Query( $storefront_eshop_args );
                        if ( $storefront_eshop_loop->have_posts() ) :
                            while ( $storefront_eshop_loop->have_posts() ) : $storefront_eshop_loop->the_post(); 
                                global $product; 
                                $product_id = $product->get_id(); // Get product ID dynamically
                        ?>
                            <div class="grid-items">
                                <figure class="product-img-box">
                                    <?php if (has_post_thumbnail( $storefront_eshop_loop->post->ID )) echo get_the_post_thumbnail($storefront_eshop_loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(wc_placeholder_img_src()).'" />'; ?>
                                    <div class="product-cart">
                                        <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $storefront_eshop_loop->post, $product );} ?>
                                    </div>
                                </figure>
                                <h5 class="product-text"><a href="<?php echo esc_url(get_permalink( $storefront_eshop_loop->post->ID )); ?>"><?php the_title(); ?></a></h5>
                                <h6 class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> "><?php echo $product->get_price_html(); ?></h6>
                                <div class="product-rating"><?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $storefront_eshop_loop->post, $product ); } ?></div>
                            </div>
                        <?php endwhile;
                        else: 
                            // Show fallback static products if no WooCommerce products found
                            ?>
                                <!-- Default 4 Products -->
                                <div class="grid-items">
                                    <figure class="product-img-box">
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/prod1.png' ); ?>" alt="<?php echo esc_attr( __( 'Deal Seeker Product Title', 'storefront-eshop' ) ); ?>" />
                                        <div class="product-cart">
                                            <a href="#"><?php echo esc_html( __( 'Add', 'storefront-eshop' ) ); ?></a>
                                        </div>
                                    </figure>
                                    <h5 class="product-text"><a href="#"><?php echo esc_html( __( 'Deal Seeker Product Title', 'storefront-eshop' ) ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$100', 'storefront-eshop' ); ?></p>
                                </div>
                                <div class="grid-items">
                                    <figure class="product-img-box">
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/prod2.png' ); ?>" alt="<?php echo esc_attr( __( 'Deal Seeker Product Title', 'storefront-eshop' ) ); ?>" />
                                        <div class="product-cart">
                                            <a href="#"><?php echo esc_html( __( 'Add', 'storefront-eshop' ) ); ?></a>
                                        </div>
                                    </figure>
                                    <h5 class="product-text"><a href="#"><?php echo esc_html( __( 'Deal Seeker Product Title', 'storefront-eshop' ) ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$100', 'storefront-eshop' ); ?></p>
                                </div>
                                <div class="grid-items">
                                    <figure class="product-img-box">
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/prod3.png' ); ?>" alt="<?php echo esc_attr( __( 'Deal Seeker Product Title', 'storefront-eshop' ) ); ?>" />
                                        <div class="product-cart">
                                            <a href="#"><?php echo esc_html( __( 'Add', 'storefront-eshop' ) ); ?></a>
                                        </div>
                                    </figure>
                                    <h5 class="product-text"><a href="#"><?php echo esc_html( __( 'Deal Seeker Product Title', 'storefront-eshop' ) ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$100', 'storefront-eshop' ); ?></p>
                                </div>
                                <div class="grid-items">
                                    <figure class="product-img-box">
                                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/prod4.png' ); ?>" alt="<?php echo esc_attr( __( 'Deal Seeker Product Title', 'storefront-eshop' ) ); ?>" />
                                        <div class="product-cart">
                                            <a href="#"><?php echo esc_html( __( 'Add', 'storefront-eshop' ) ); ?></a>
                                        </div>
                                    </figure>
                                    <h5 class="product-text"><a href="#"><?php echo esc_html( __( 'Deal Seeker Product Title', 'storefront-eshop' ) ); ?></a></h5>
                                    <p class="price"><?php echo esc_html( '$100', 'storefront-eshop' ); ?></p>
                                </div>
                            <?php 
                            endif;
                        wp_reset_query();
                        } ?>
                    </div>
                </div>
            </div>
            <?php 
        }
    }

endif;

if( !function_exists( 'storefront_eshop_sanitize_menu_transform' ) ) :

    // Sidebar Option Sanitize.
    function storefront_eshop_sanitize_menu_transform( $storefront_eshop_input ){

        $storefront_eshop_metabox_options = array( 'capitalize','uppercase','lowercase');
        if( in_array( $storefront_eshop_input,$storefront_eshop_metabox_options ) ){

            return $storefront_eshop_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'storefront_eshop_sanitize_page_content_alignment' ) ) :

    // Sidebar Option Sanitize.
    function storefront_eshop_sanitize_page_content_alignment( $storefront_eshop_input ){

        $storefront_eshop_metabox_options = array( 'left','center','right');
        if( in_array( $storefront_eshop_input,$storefront_eshop_metabox_options ) ){

            return $storefront_eshop_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'storefront_eshop_sanitize_footer_widget_title_alignment' ) ) :

    // Footer Option Sanitize.
    function storefront_eshop_sanitize_footer_widget_title_alignment( $storefront_eshop_input ){

        $storefront_eshop_metabox_options = array( 'left','center','right');
        if( in_array( $storefront_eshop_input,$storefront_eshop_metabox_options ) ){

            return $storefront_eshop_input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'storefront_eshop_sanitize_pagination_type' ) ) :

    /**
     * Sanitize the pagination type setting.
     *
     * @param string $storefront_eshop_input The input value from the Customizer.
     * @return string The sanitized value.
     */
    function storefront_eshop_sanitize_pagination_type( $storefront_eshop_input ) {
        // Define valid options for the pagination type.
        $storefront_eshop_valid_options = array( 'numeric', 'newer_older' ); // Update valid options to include 'newer_older'

        // If the input is one of the valid options, return it. Otherwise, return the default option ('numeric').
        if ( in_array( $storefront_eshop_input, $storefront_eshop_valid_options, true ) ) {
            return $storefront_eshop_input;
        } else {
            // Return 'numeric' as the fallback if the input is invalid.
            return 'numeric';
        }
    }

endif;


// Sanitize the enable/disable setting for pagination
if( !function_exists('storefront_eshop_sanitize_enable_pagination') ) :
    function storefront_eshop_sanitize_enable_pagination( $storefront_eshop_input ) {
        return (bool) $storefront_eshop_input;
    }
endif;