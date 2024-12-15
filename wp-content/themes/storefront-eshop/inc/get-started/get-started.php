<?php
/**
 * Added Omega Page. */

/**
 * Add a new page under Appearance
 */
function storefront_eshop_menu()
{
	add_theme_page(__('Omega Options', 'storefront-eshop'), __('Omega Options', 'storefront-eshop'), 'edit_theme_options', 'storefront-eshop-theme', 'storefront_eshop_page');
}
add_action('admin_menu', 'storefront_eshop_menu');

// Add Getstart admin notice
function storefront_eshop_admin_notice() { 
    global $pagenow;
    $theme_args = wp_get_theme();
    $meta = get_option( 'storefront_eshop_admin_notice' );
    $name = $theme_args->get( 'Name' );
    $current_screen = get_current_screen();

    if ( ! $meta ) {
        if ( is_network_admin() ) {
            return;
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( $current_screen->base != 'appearance_page_storefront-eshop-theme' ) {
            ?>
            <div class="notice notice-success notice-content">
                <h2><?php esc_html_e('Thank You for installing Storefront Eshop Theme!', 'storefront-eshop') ?> </h2>
                <div class="info-link">
                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=storefront-eshop-theme' ) ); ?>"><?php esc_html_e('Omega Options', 'storefront-eshop'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(STOREFRONT_ESHOP_LITE_DOCS_PRO); ?>" target="_blank"> <?php esc_html_e('Documentation', 'storefront-eshop'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(STOREFRONT_ESHOP_BUY_NOW); ?>" target="_blank"> <?php esc_html_e('Upgrade to Pro', 'storefront-eshop'); ?></a>
                </div>
                <div class="info-link">
                    <a href="<?php echo esc_url(STOREFRONT_ESHOP_DEMO_PRO); ?>" target="_blank"> <?php esc_html_e('Premium Demo', 'storefront-eshop'); ?></a>
                </div>
                <p class="dismiss-link"><strong><a href="?storefront_eshop_admin_notice=1"><?php esc_html_e( 'Dismiss', 'storefront-eshop' ); ?></a></strong></p>
            </div>
            <?php
        }
    }
}
add_action( 'admin_notices', 'storefront_eshop_admin_notice' );

if ( ! function_exists( 'storefront_eshop_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
 */
function storefront_eshop_update_admin_notice() {
    if ( isset( $_GET['storefront_eshop_admin_notice'] ) && $_GET['storefront_eshop_admin_notice'] == '1' ) {
        update_option( 'storefront_eshop_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'storefront_eshop_update_admin_notice' );

// After Switch theme function
add_action( 'after_switch_theme', 'storefront_eshop_getstart_setup_options' );
function storefront_eshop_getstart_setup_options() {
    update_option( 'storefront_eshop_admin_notice', false );
}


/**
 * Enqueue styles for the help page.
 */
function storefront_eshop_admin_scripts($hook)
{
	wp_enqueue_style('storefront-eshop-admin-style', get_template_directory_uri() . '/inc/get-started/get-started.css', array(), '');
}
add_action('admin_enqueue_scripts', 'storefront_eshop_admin_scripts');

/**
 * Add the theme page
 */
function storefront_eshop_page(){
$storefront_eshop_user = wp_get_current_user();
$storefront_eshop_theme = wp_get_theme();
?>
<div class="das-wrap">
  <div class="storefront-eshop-panel header">
    <div class="storefront-eshop-logo">
      <span></span>
      <h2><?php echo esc_html( $storefront_eshop_theme ); ?></h2>
    </div>
    <p>
      <?php
        $storefront_eshop_theme = wp_get_theme();
        echo wp_kses_post( apply_filters( 'omega_theme_description', esc_html( $storefront_eshop_theme->get( 'Description' ) ) ) );
      ?>
    </p>
    <a class="btn btn-primary" href="<?php echo esc_url(admin_url('/customize.php?'));
?>"><?php esc_html_e('Edit With Customizer - Click Here', 'storefront-eshop'); ?></a>
  </div>

  <div class="das-wrap-inner">
    <div class="das-col das-col-7">
      <div class="storefront-eshop-panel">
        <div class="storefront-eshop-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('If you are facing any issue with our theme, submit a support ticket here.', 'storefront-eshop'); ?></h3>
          </div>
          <a href="<?php echo esc_url( STOREFRONT_ESHOP_SUPPORT_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Theme Support.', 'storefront-eshop'); ?></a>
        </div>
      </div>
      <div class="storefront-eshop-panel">
        <div class="storefront-eshop-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Please write a review if you appreciate the theme.', 'storefront-eshop'); ?></h3>
          </div>
          <a href="<?php echo esc_url( STOREFRONT_ESHOP_REVIEW_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Rank this topic.', 'storefront-eshop'); ?></a>
        </div>
      </div>
       <div class="storefront-eshop-panel">
        <div class="storefront-eshop-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our lite theme documentation to set up our lite theme as seen in the screenshot.', 'storefront-eshop'); ?></h3>
          </div>
          <a href="<?php echo esc_url( STOREFRONT_ESHOP_LITE_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Documentation.', 'storefront-eshop'); ?></a>
        </div>
      </div>
    </div>
    <div class="das-col das-col-3">
      <div class="upgrade-div">
        <h4>
          <strong>
            <?php esc_html_e('Premium Features Include:', 'storefront-eshop'); ?>
          </strong>
        </h4>
        <ul>
          <li>
            <?php esc_html_e('One Click Demo Content Importer', 'storefront-eshop'); ?>
          </li>
          <li>
            <?php esc_html_e('Woocommerce Plugin Compatibility', 'storefront-eshop'); ?>
          </li>
          <li>
            <?php esc_html_e('Multiple Section for the templates', 'storefront-eshop'); ?>            
          </li>
          <li>
            <?php esc_html_e('For a better user experience, make the top of your menu sticky.', 'storefront-eshop'); ?>  
          </li>
        </ul>
        <div class="text-center">
          <a href="<?php echo esc_url( STOREFRONT_ESHOP_BUY_NOW ); ?>" target="_blank"
            class="btn btn-success"><?php esc_html_e('Upgrade Pro $40', 'storefront-eshop'); ?></a>
        </div>
      </div>
      <div class="storefront-eshop-panel">
        <div class="storefront-eshop-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Kindly view the premium themes live demo.', 'storefront-eshop'); ?></h3>
          </div>
          <a class="btn btn-primary demo" href="<?php echo esc_url( STOREFRONT_ESHOP_DEMO_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Live Demo.', 'storefront-eshop'); ?></a>
        </div>
        <div class="storefront-eshop-panel-content pro-doc">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our pro theme documentation to set up our premium theme as seen in the screenshot.', 'storefront-eshop'); ?></h3>
          </div>
          <a href="<?php echo esc_url( STOREFRONT_ESHOP_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Pro Documentation.', 'storefront-eshop'); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}