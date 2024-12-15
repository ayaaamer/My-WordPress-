<?php
//about theme info
add_action( 'admin_menu', 'vw_storefront_gettingstarted' );
function vw_storefront_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Storefront', 'vw-storefront'), esc_html__('About VW Storefront', 'vw-storefront'), 'edit_theme_options', 'vw_storefront_guide', 'vw_storefront_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_storefront_admin_theme_style() {
   wp_enqueue_style('vw-storefront-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-storefront-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_storefront_admin_theme_style');

//guidline for about theme
function vw_storefront_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-storefront' );
?>

<div class="wrapper-info">
    <div class="col-left sshot-section">
    	<h2><?php esc_html_e( 'Welcome to VW Storefront Theme', 'vw-storefront' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-storefront'); ?></p>
    </div>
    <div class="col-right coupen-section">
    	<div class="logo-section">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
		</div>
		<div class="logo-right">			
			<div class="update-now">
				<h4><?php esc_html_e('Try Premium ','vw-storefront'); ?></h4>
				<h4><?php esc_html_e('VW Storefront Theme','vw-storefront'); ?></h4>
				<h4 class="disc-text"><?php esc_html_e('at 20% Discount','vw-storefront'); ?></h4>
				<h4><?php esc_html_e('Use Coupon','vw-storefront'); ?> ( <span><?php esc_html_e('vwpro20','vw-storefront'); ?></span> ) </h4> 
				<div class="info-link">
					<a href="<?php echo esc_url( VW_STOREFRONT_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-storefront' ); ?></a>
					
				</div>
			</div>
		</div>   
		<div class="logo-img">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_storefront_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-storefront' ); ?></button>
			
		  	<button class="tablinks" onclick="vw_storefront_open_tab(event, 'storefront_pro')"><?php esc_html_e( 'Get Premium', 'vw-storefront' ); ?></button>
		  	<button class="tablinks" onclick="vw_storefront_open_tab(event, 'free_pro')"><?php esc_html_e( 'Free Vs Premium', 'vw-storefront' ); ?></button>
		  	<button class="tablinks" onclick="vw_storefront_open_tab(event, 'get_bundle')"><?php esc_html_e( 'Get 250+ Themes Bundle at $99', 'vw-storefront' ); ?></button>
		</div>

		<?php 
			$vw_storefront_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_storefront_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Storefront_Plugin_Activation_Settings::get_instance();
				$vw_storefront_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-storefront-recommended-plugins">
				    <div class="vw-storefront-action-list">
				        <?php if ($vw_storefront_actions): foreach ($vw_storefront_actions as $key => $vw_storefront_actionValue): ?>
				                <div class="vw-storefront-action" id="<?php echo esc_attr($vw_storefront_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_storefront_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_storefront_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_storefront_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-storefront'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_storefront_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-storefront' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('VW Storefront is a feature-rich theme for building online stores, eCommerce sites, etc. It keeps eCommerce businesses at its focus and includes all the features that are suitable and necessary for establishing any kind of online shopping store like interior store, books store, photo store, movies store, car workshop, supermarket, gadget store, digital marketplace, jewellery shop, fashion shop, affiliate store, apparel store, Kitchen and Dining Mats, Personal Safety decorative stores, digital Storefront, Electric Scooters,E-commerce, Retail, Marketplace, Online Store, Business, Smart Watches, Dash Cam, Video Doorbells, Skateboards, Hoverboards, Enamel Pins, Selfie Drones, E bazar, accessories shop, online food order platforms, novelty shop, toys shop, merchant, book depot, Boutique, furniture shop, Baby Rompers, Face Masks, book depot, clothing, electronic, Custom print T-shirt, bikers accessories, hand tools store, protective kits retailer, e shopay, boutiques market, shopkeeper, Jewelry Product Market, Smart Home Products and Accessories, AR/VR Headsets, Hardware, 3D Assets Stores, retail Store, home appliances shop, grocery store. This lightweight and streamlined theme has integration with Woocommerce that facilitates setting up online stores and selling products. The elegant and sophisticated layout of this theme attracts the audience. All the content and design elements are assured to look pixel-perfect as the theme possesses a retina-ready design. This Bootstrap-based theme is a perfect option using which you can create an online brand store that matches the brand as it gives you the power to personalize the overall look of your site. Using the customization options, you can transform everything from start to end. It also includes secure and clean codes that are optimized for delivering the best SEO performance. Thanks to its responsive design, your website will look fabulous on computers, laptops, tablets, and other hand-held devices. Many shortcodes, Hero content, Product Slider, custom widgets, Footer Widgets, Header Media and page building tools are included. The Call To Action (CTA) buttons make your site interactive and user-friendly. This well-documented theme has social sharing options, plugin integration, and many useful elements for setting up a great storefront site.','vw-storefront'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-storefront' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-storefront' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_STOREFRONT_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-storefront' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-storefront'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-storefront'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-storefront'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-storefront'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-storefront'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_STOREFRONT_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-storefront'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-storefront'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-storefront'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_STOREFRONT_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-storefront'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-storefront' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-storefront'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-storefront'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_top_header') ); ?>" target="_blank"><?php esc_html_e('Top Header','vw-storefront'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-grid-view"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_product_section') ); ?>" target="_blank"><?php esc_html_e('Featured Product','vw-storefront'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-storefront'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-storefront'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-storefront'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-share"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons Settings','vw-storefront'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-storefront'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_storefront_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-storefront'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-storefront'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-storefront'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-storefront'); ?></span><?php esc_html_e(' Go to ','vw-storefront'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-storefront'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-storefront'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-storefront'); ?></span><?php esc_html_e(' Go to ','vw-storefront'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-storefront'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-storefront'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-storefront'); ?> <a class="doc-links" href="https://preview.vwthemesdemo.com/docs/free-vw-storefront/" target="_blank"><?php esc_html_e('Documentation','vw-storefront'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="storefront_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-storefront' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('This Storefront WordPress Theme is an intuitive and smartly designed theme that manages to make your store website look simply amazing. You can not only craft a website for single stores but also use it for making multiple vendor websites as well. It has so many useful elements using which you will be able to add so many shopping options for your website. WP Storefront WordPress Theme has a nicely crafted header and top bar with shopping options such as login or sign up options for users. There are plenty of pagination options and its sticky navigation will make your audience stay on your page for a little longer and explore more products. The theme also allows you to manage the content of different sections and adjust the order according to your priority. You can list all your products category wise and start selling them online through your website.','vw-storefront'); ?></p>
		    </div>
		    <div class="col-right-pro">
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_STOREFRONT_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-storefront'); ?></a>
					<a href="<?php echo esc_url( VW_STOREFRONT_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-storefront'); ?></a>
					<a href="<?php echo esc_url( VW_STOREFRONT_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-storefront'); ?></a>
					<a href="<?php echo esc_url( VW_STOREFRONT_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get 250+ Themes Bundle at $99', 'vw-storefront'); ?></a>
				</div>
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-storefront' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-storefront'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-storefront'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-storefront'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-storefront'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-storefront'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-storefront'); ?></td>
								<td class="table-img"><?php esc_html_e('13', 'vw-storefront'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-storefront'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-storefront'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-storefront'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-storefront'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-storefront'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-storefront'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-storefront'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_STOREFRONT_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-storefront'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="get_bundle" class="tabcontent">		  	
		   <div class="col-left-pro">
		   	<h3><?php esc_html_e( 'WP Theme Bundle', 'vw-storefront' ); ?></h3>
		    	<p><?php esc_html_e('Enhance your website effortlessly with our WP Theme Bundle. Get access to 250+ premium WordPress themes and 5+ powerful plugins, all designed to meet diverse business needs. Enjoy seamless integration with any plugins, ultimate customization flexibility, and regular updates to keep your site current and secure. Plus, benefit from our dedicated customer support, ensuring a smooth and professional web experience.','vw-storefront'); ?></p>
		    	<div class="feature">
		    		<h4><?php esc_html_e( 'Features:', 'vw-storefront' ); ?></h4>
		    		<p><?php esc_html_e('250+ Premium Themes & 5+ Plugins.', 'vw-storefront'); ?></p>
		    		<p><?php esc_html_e('Seamless Integration.', 'vw-storefront'); ?></p>
		    		<p><?php esc_html_e('Customization Flexibility.', 'vw-storefront'); ?></p>
		    		<p><?php esc_html_e('Regular Updates.', 'vw-storefront'); ?></p>
		    		<p><?php esc_html_e('Dedicated Support.', 'vw-storefront'); ?></p>
		    	</div>
		    	<p>Upgrade now and give your website the professional edge it deserves, all at an unbeatable price of $99!</p>
		    	<div class="pro-links">
					<a href="<?php echo esc_url( VW_STOREFRONT_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'vw-storefront'); ?></a>
					<a href="<?php echo esc_url( VW_STOREFRONT_THEME_BUNDLE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'vw-storefront'); ?></a>
				</div>
		   </div>
		   <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/bundle.png" alt="" />
		   </div>		    
		</div>
		
	</div>
</div>
<?php } ?>