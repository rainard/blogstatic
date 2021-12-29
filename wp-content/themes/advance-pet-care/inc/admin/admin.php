<?php
//about theme info
add_action( 'admin_menu', 'advance_pet_care_abouttheme' );
function advance_pet_care_abouttheme() {    	
	add_theme_page( esc_html__('About Pet Care Theme', 'advance-pet-care'), esc_html__('About Pet Care Theme', 'advance-pet-care'), 'edit_theme_options', 'advance_pet_care_guide', 'advance_pet_care_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function advance_pet_care_admin_theme_style() {
   wp_enqueue_style('advance-pet-care-custom-admin-style', esc_url(get_template_directory_uri()) .'/inc/admin/admin.css');
}
add_action('admin_enqueue_scripts', 'advance_pet_care_admin_theme_style');

//guidline for about theme
function advance_pet_care_mostrar_guide() {
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
 <div class="wrapper-info">
	<div class="header">
	 	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/logo.png"  />
	 	<h2><?php esc_html_e('Welcome to Advance Pet Care Theme', 'advance-pet-care'); ?></h2>
 		<p><?php esc_html_e('Most of our outstanding theme is elegant, responsive, multifunctional, SEO friendly has amazing features and functionalities that make them highly demanding for designers and bloggers, who ought to excel in web development domain. Our Themeshopy has got everything that an individual and group need to be successful in their venture.', 'advance-pet-care'); ?></p>
		<div class="main-button">
			<a href="<?php echo esc_url( ADVANCE_PET_CARE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'advance-pet-care'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_PET_CARE_LIVE_DEMO ); ?>"><?php esc_html_e('Live Demo', 'advance-pet-care'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_PET_CARE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'advance-pet-care'); ?></a>
		</div>
	</div>
	<div class="button-bg">
	<button role="tab" class="tablink" onclick="openPage('Home', this, '')"><?php esc_html_e('Lite Theme Setup', 'advance-pet-care'); ?></button>
	<button role="tab" class="tablink" onclick="openPage('Contact', this, '')"><?php esc_html_e('Premium Theme info', 'advance-pet-care'); ?></button>
	</div>
	<div id="Home" class="tabcontent tab1">
	  	<h3><?php esc_html_e('How to set up homepage', 'advance-pet-care'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( ADVANCE_PET_CARE_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'advance-pet-care'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_PET_CARE_CONTACT ); ?>"><?php esc_html_e('Support', 'advance-pet-care'); ?></a>
			<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Start Customizing', 'advance-pet-care'); ?></a>
		</div>
	  	<div class="documentation">
		  	<div class="image-docs">
				<ul>
					<li> <b><?php esc_html_e('Step 1.', 'advance-pet-care'); ?></b> <?php esc_html_e('Follow these instructions to setup Home page.', 'advance-pet-care'); ?></li>
					<li> <b><?php esc_html_e('Step 2.', 'advance-pet-care'); ?></b> <?php esc_html_e(' Create Page to set template: Go to Dashboard >> Pages >> Add New Page.Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.', 'advance-pet-care'); ?></li>
				</ul>
		  	</div>
		  	<div class="doc-image">
		  		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/home-page-template.png"  />	
		  	</div>
		  	<div class="clearfixed">
				<div class="doc-image1">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/set-front-page.png" />	
			    </div>
			    <div class="image-docs1">
				    <ul>
						<li> <b><?php esc_html_e('Step 3.', 'advance-pet-care'); ?></b> <?php esc_html_e('Set the front page: Go to Setting -> Reading --> Set the front page display static page to home page', 'advance-pet-care'); ?></li>
					</ul>
			  	</div>
			</div>
		</div>
	</div>
	<div id="Contact" class="tabcontent">
	 	<h3><?php esc_html_e('Premium Theme Info', 'advance-pet-care'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( ADVANCE_PET_CARE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'advance-pet-care'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_PET_CARE_LIVE_DEMO ); ?>"><?php esc_html_e('Live Demo', 'advance-pet-care'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_PET_CARE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'advance-pet-care'); ?></a>
		</div>
	  	<div class="features-section">
	  		<div class="col-4">
	  			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/screenshot.png"  />
	  			<p><?php esc_html_e( 'This pet WordPress theme is refreshing, colourful, dynamic and appealing. It is the best fit for pet shops, pet grooming, animal training, pet consultant, pet selling store, animal food seller and other relevant websites. This multipurpose theme is built to serve a wide range of websites with high-level functionality and amazing features. Its interface is easy to learn, so much so that even a person with no coding knowledge can make full use of it to build a beautiful and efficient website. This pet WordPress theme comes with so many options of header and footer and many other styles of layouts that every time you will get a different look. To make it run flawlessly on varying screen sizes and browsers, it is made responsive and compatible with all browsers. To ensure its smooth working, it gives you access to customer support and regular theme updates.', 'advance-pet-care' ); ?></p>
	  		</div>
	  		<div class="col-4">
	  			<h4><?php esc_html_e( 'Theme Features', 'advance-pet-care' ); ?></h4>
				<ul>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Theme options using customizer API', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Responsive Design', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Favicon, Logo, Title and Tagline Customization', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advanced Color Options and Color Pallets', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( '100+ Font Family Options', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Slider with a Number of Slider Images Upload Option Available.', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Support to Add Custom CSS/JS', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'SEO Friendly', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Pagination Option', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Compatible With Different WordPress Famous Plugins Like Contact Form 7 and Woocommerce', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Enable-Disable Options on All Sections', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Footer Customization Options', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Fully Integrated with Font Awesome Icon', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Short Codes', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Background Image Option', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Page Templates', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Featured Product Images, HD Images and Video display', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Allow To Set Site Title, Tagline, Logo', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Make Post About Firms News, Events, Achievements and So On.', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Left and Right Sidebar', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Sticky Post & Comment Threads', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Parallax Image-Background Section', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Customizable Home Page', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Full-Width Template', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'advance-pet-care' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Social Media Feature', 'advance-pet-care' ); ?></li>
				</ul>
			</div>
		</div>
	</div>

<script>
	function openPage(pageName,elmnt,color) {
	    var i, tabcontent, tablinks;
	    tabcontent = document.getElementsByClassName("tabcontent");
	    for (i = 0; i < tabcontent.length; i++) {
	        tabcontent[i].style.display = "none";
	    }
	    tablinks = document.getElementsByClassName("tablink");
	    for (i = 0; i < tablinks.length; i++) {
	        tablinks[i].style.backgroundColor = "";
	    }
	    document.getElementById(pageName).style.display = "block";
	    elmnt.style.backgroundColor = color;
	}
</script>
<?php } ?>