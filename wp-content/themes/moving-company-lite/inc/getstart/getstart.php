<?php
//about theme info
add_action( 'admin_menu', 'moving_company_lite_gettingstarted' );
function moving_company_lite_gettingstarted() {    	
	add_theme_page( esc_html__('About Moving Company Lite', 'moving-company-lite'), esc_html__('About Moving Company Lite', 'moving-company-lite'), 'edit_theme_options', 'moving_company_lite_guide', 'moving_company_lite_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function moving_company_lite_admin_theme_style() {
   wp_enqueue_style('moving-company-lite-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('moving-company-lite-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'moving_company_lite_admin_theme_style');

//guidline for about theme
function moving_company_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'moving-company-lite' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Moving Company Lite Theme', 'moving-company-lite' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','moving-company-lite'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Moving Company at 20% Discount','moving-company-lite'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','moving-company-lite'); ?> ( <span><?php esc_html_e('vwpro20','moving-company-lite'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( MOVING_COMPANY_LITE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'moving-company-lite' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="moving_company_lite_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'moving-company-lite' ); ?></button>
			<button class="tablinks" onclick="moving_company_lite_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'moving-company-lite' ); ?></button>
			<button class="tablinks" onclick="moving_company_lite_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'moving-company-lite' ); ?></button>	
		  	<button class="tablinks" onclick="moving_company_lite_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'moving-company-lite' ); ?></button>
		  	<button class="tablinks" onclick="moving_company_lite_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'moving-company-lite' ); ?></button>
		</div>

		<!-- Tab content -->
		<?php
			$moving_company_lite_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$moving_company_lite_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Moving_Company_Lite_Plugin_Activation_Settings::get_instance();
				$moving_company_lite_actions = $plugin_ins->recommended_actions;
				?>
				<div class="moving-company-lite-recommended-plugins">
				    <div class="moving-company-lite-action-list">
				        <?php if ($moving_company_lite_actions): foreach ($moving_company_lite_actions as $key => $moving_company_lite_actionValue): ?>
				                <div class="moving-company-lite-action" id="<?php echo esc_attr($moving_company_lite_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($moving_company_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($moving_company_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($moving_company_lite_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','moving-company-lite'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($moving_company_lite_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'moving-company-lite' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('Moving Company Lite is an excellent WordPress theme available in the international online market with the main focus on the logistics related business. As a result, it is good for the movers and packers related businesses, warehouse packers, transportation companies and the websites related to the logistics companies. Armed with the exclusive features like the Bootstrap Framework, CTA, retina ready, translation ready, multipurpose, responsive, stunning, secure plus clean code, customization options, personalization options and much more, it is good for the career services as well as the logistic companies and also for the companies that are related to the shipping and trucking business. With this theme of premium level, you can craft an exclusive website related to the warehouse as well as freight services. Moving Company Lite is a theme of premium category solely designed by the experts in this area and has high applicability for the logistic services as well as the transportation companies. It is interactive, animated and with shortcodes as a result making it a good option to craft the websites related to the delivery and shipping companies, cargo hubs, freight service providers, ware house as well as carrier services. It is also good for shipment services. ','moving-company-lite'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'moving-company-lite' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'moving-company-lite' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( MOVING_COMPANY_LITE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'moving-company-lite' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'moving-company-lite'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'moving-company-lite'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'moving-company-lite'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'moving-company-lite'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'moving-company-lite'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( MOVING_COMPANY_LITE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'moving-company-lite'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'moving-company-lite'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'moving-company-lite'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( MOVING_COMPANY_LITE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'moving-company-lite'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'moving-company-lite' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','moving-company-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Section','moving-company-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Settings','moving-company-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','moving-company-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','moving-company-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=moving_company_lite_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','moving-company-lite'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','moving-company-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','moving-company-lite'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','moving-company-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','moving-company-lite'); ?></a>
								</div> 
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','moving-company-lite'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','moving-company-lite'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','moving-company-lite'); ?></span><?php esc_html_e(' Go to ','moving-company-lite'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','moving-company-lite'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','moving-company-lite'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','moving-company-lite'); ?></span><?php esc_html_e(' Go to ','moving-company-lite'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','moving-company-lite'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','moving-company-lite'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','moving-company-lite'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-moving-company-lite/" target="_blank"><?php esc_html_e('Documentation','moving-company-lite'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Moving_Company_Lite_Plugin_Activation_Settings::get_instance();
			$moving_company_lite_actions = $plugin_ins->recommended_actions;
			?>
				<div class="moving-company-lite-recommended-plugins">
				    <div class="moving-company-lite-action-list">
				        <?php if ($moving_company_lite_actions): foreach ($moving_company_lite_actions as $key => $moving_company_lite_actionValue): ?>
				                <div class="moving-company-lite-action" id="<?php echo esc_attr($moving_company_lite_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($moving_company_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($moving_company_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($moving_company_lite_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','moving-company-lite'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($moving_company_lite_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'moving-company-lite' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','moving-company-lite'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','moving-company-lite'); ?></span></b></p>
	              	<div class="moving-company-lite-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','moving-company-lite'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

	            <div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
							<h3><?php esc_html_e( 'Link to customizer', 'moving-company-lite' ); ?></h3>
							<hr class="h3hr">
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','moving-company-lite'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','moving-company-lite'); ?></a>
									</div>
								</div>
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','moving-company-lite'); ?></a>
									</div>
									
									<div class="row-box2">
										<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','moving-company-lite'); ?></a>
									</div>
								</div>

								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','moving-company-lite'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','moving-company-lite'); ?></a>
									</div> 
								</div>
								
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','moving-company-lite'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','moving-company-lite'); ?></a>
									</div> 
								</div>
							</div>
					</div>	
				</div>					
	        </div>
		</div>	

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Moving_Company_Lite_Plugin_Activation_Settings::get_instance();
			$moving_company_lite_actions = $plugin_ins->recommended_actions;
			?>
				<div class="moving-company-lite-recommended-plugins">
				    <div class="moving-company-lite-action-list">
				        <?php if ($moving_company_lite_actions): foreach ($moving_company_lite_actions as $key => $moving_company_lite_actionValue): ?>
				                <div class="moving-company-lite-action" id="<?php echo esc_attr($moving_company_lite_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($moving_company_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($moving_company_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($moving_company_lite_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'moving-company-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="moving-company-lite-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','moving-company-lite'); ?></a>
			   </div>

			   <div class="link-customizer-with-guternberg-ibtana">
					<h3><?php esc_html_e( 'Link to customizer', 'moving-company-lite' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','moving-company-lite'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','moving-company-lite'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','moving-company-lite'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','moving-company-lite'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','moving-company-lite'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','moving-company-lite'); ?></a>
							</div> 
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=moving_company_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','moving-company-lite'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','moving-company-lite'); ?></a>
							</div> 
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'moving-company-lite' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Moving company WordPress theme is a premium category WordPress theme available in the online international market and is full of splendid features making it highly demandable for the businesses related to the cargo and logistics. It is responsive, elegant, clean and multipurpose making it one of the finest choices for the movers and packers and also for the carrier services. Moving company WordPress theme comes with the fast page load time making it an exclusive one for the shipping, trucking and the freight services. This theme is SEO and mobile friendly having the optimised codes making it a fine choice to make the website related to the warehouse or any kind of business related to the logistics as well as transportation. It is a stunning with translation features making it a good one for the freight service provider websites. Moving company WordPress theme is totally professional.','moving-company-lite'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( MOVING_COMPANY_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'moving-company-lite'); ?></a>
					<a href="<?php echo esc_url( MOVING_COMPANY_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'moving-company-lite'); ?></a>
					<a href="<?php echo esc_url( MOVING_COMPANY_LITE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'moving-company-lite'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'moving-company-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'moving-company-lite'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'moving-company-lite'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'moving-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'moving-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'moving-company-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'moving-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'moving-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'moving-company-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'moving-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'moving-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'moving-company-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'moving-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'moving-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('16', 'moving-company-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'moving-company-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'moving-company-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'moving-company-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'moving-company-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'moving-company-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'moving-company-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'moving-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( MOVING_COMPANY_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'moving-company-lite'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'moving-company-lite'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'moving-company-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( MOVING_COMPANY_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'moving-company-lite'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'moving-company-lite'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'moving-company-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( MOVING_COMPANY_LITE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'moving-company-lite'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'moving-company-lite'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'moving-company-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( MOVING_COMPANY_LITE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'moving-company-lite'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'moving-company-lite'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'moving-company-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( MOVING_COMPANY_LITE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','moving-company-lite'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'moving-company-lite'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'moving-company-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( MOVING_COMPANY_LITE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'moving-company-lite'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>