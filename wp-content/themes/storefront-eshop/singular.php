<?php
/**
 * The template for displaying single posts and pages.
 * @package Storefront Eshop
 * @since 1.0.0
 */
get_header();

    $storefront_eshop_default = storefront_eshop_get_default_theme_options();
    $storefront_eshop_global_sidebar_layout = esc_html( get_theme_mod( 'storefront_eshop_global_sidebar_layout',$storefront_eshop_default['storefront_eshop_global_sidebar_layout'] ) );
    $storefront_eshop_post_sidebar = esc_html( get_post_meta( $post->ID, 'storefront_eshop_post_sidebar_option', true ) );
    $storefront_eshop_sidebar_column_class = 'column-order-1';

    if (!empty($storefront_eshop_post_sidebar)) {
        $storefront_eshop_global_sidebar_layout = $storefront_eshop_post_sidebar;
    }

    if ($storefront_eshop_global_sidebar_layout == 'left-sidebar') {
        $storefront_eshop_sidebar_column_class = 'column-order-2';
    } ?>

    <div id="single-page" class="singular-main-block">
        <div class="wrapper">
            <div class="column-row">
                <div id="primary" class="content-area <?php echo $storefront_eshop_sidebar_column_class; ?>">
                    <main id="site-content" class="" role="main">
                        <?php
                            storefront_eshop_breadcrumb();
                        if( have_posts() ): ?>
                            <div class="article-wraper">
                                <?php while (have_posts()) :
                                    the_post();
                                    get_template_part('template-parts/content', 'single');
                                    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && !post_password_required() ) { ?>
                                        <div class="comments-wrapper">
                                            <?php comments_template(); ?>
                                        </div>
                                    <?php
                                    }
                                endwhile; ?>
                            </div>
                        <?php
                        else :
                            get_template_part('template-parts/content', 'none');
                        endif;

                        /**
                         * Navigation
                         * 
                         * @hooked storefront_eshop_related_posts - 20  
                         * @hooked storefront_eshop_single_post_navigation - 30  
                        */

                        do_action('storefront_eshop_navigation_action'); ?>
                    </main>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
<?php
get_footer();