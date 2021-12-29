<?php
	
	/*---------------------------Theme color option-------------------*/
	$advance_pet_care_theme_color_first = get_theme_mod('advance_pet_care_theme_color_first');

	$advance_pet_care_custom_css = '';

	$advance_pet_care_custom_css .='input[type="submit"], .cart_icon i, #slider .inner_carousel .get-apt-btn a:hover,#welcome .discover-btn a:hover, #footer input[type="submit"], .copyright, #footer .tagcloud a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #comments a.comment-reply-link, .meta-nav:hover,.primary-navigation li a:hover, .read-more-btn a:hover, .tags p a:hover, #footer form.woocommerce-product-search button{';
		$advance_pet_care_custom_css .='background-color: '.esc_attr($advance_pet_care_theme_color_first).';';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_custom_css .='h4,h5,h6, .read-moresec a,section h4, section .innerlightbox, #comments a time,.woocommerce div.product span.price, .woocommerce .quantity .qty, h3.widget-title a, #footer li a:hover, .new-text h1 a,.new-text h2 a, .pet-top i, .comment-meta.commentmetadata a, a.added_to_cart.wc-forward, span.tagged_as a, #comments p a,  .primary-navigation ul ul a, .primary-navigation ul ul a:hover, .tags i, .metabox a:hover, .primary-navigation a:focus,.new-text p a,.entry-content a , #comments p a, #commentform p a, .woocommerce-MyAccount-content a, nav.woocommerce-MyAccount-navigation a, .woocommerce-info a, tr.woocommerce-cart-form__cart-item.cart_item a, a.shipping-calculator-button{';
		$advance_pet_care_custom_css .='color: '.esc_attr($advance_pet_care_theme_color_first).';';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_custom_css .='.read-moresec a, #footer input[type="search"], .woocommerce .quantity .qty, .primary-navigation ul ul, .read-more-btn a:hover, .tags p a:hover,.tags p a, #footer form.woocommerce-product-search button{';
		$advance_pet_care_custom_css .='border-color: '.esc_attr($advance_pet_care_theme_color_first).';';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_custom_css .='.primary-navigation ul ul li:first-child{';
		$advance_pet_care_custom_css .='border-top-color: '.esc_attr($advance_pet_care_theme_color_first).';';
	$advance_pet_care_custom_css .='}';


	/*---------------------------Theme color option-------------------*/
	$advance_pet_care_theme_color_second = get_theme_mod('advance_pet_care_theme_color_second');

	$advance_pet_care_custom_css .='.read-moresec a:hover, #header .main-menu, #slider i, #slider .inner_carousel .get-apt-btn a, #welcome .discover-btn a, .read-more-btn a, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar input[type="submit"], #sidebar .tagcloud a:hover,.pagination .current, .pagination a:hover, #menu-sidebar input[type="submit"], #sidebar form.woocommerce-product-search button{';
		$advance_pet_care_custom_css .='background-color: '.esc_attr($advance_pet_care_theme_color_second).';';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_custom_css .='nav.woocommerce-MyAccount-navigation ul li, #sidebar ul li a:hover:before, #comments input[type="submit"].submit{';
		$advance_pet_care_custom_css .='background-color: '.esc_attr($advance_pet_care_theme_color_second).'!important;';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_custom_css .='.woocommerce-message::before, .logo a, .pet-top p.color{';
		$advance_pet_care_custom_css .='color: '.esc_attr($advance_pet_care_theme_color_second).';';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_custom_css .='.woocommerce-message{';
		$advance_pet_care_custom_css .='border-top-color: '.esc_attr($advance_pet_care_theme_color_second).';';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_custom_css .='.read-more-btn a, .read-moresec a:hover, #sidebar form.woocommerce-product-search button{';
		$advance_pet_care_custom_css .='border-color: '.esc_attr($advance_pet_care_theme_color_second).';';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_custom_css .='#sidebar ul li a:hover, #sidebar ul li a:active, #sidebar ul li a:focus{';
		$advance_pet_care_custom_css .='color: '.esc_attr($advance_pet_care_theme_color_second).'!important;';
	$advance_pet_care_custom_css .='}';

	// media
	$advance_pet_care_custom_css .='@media screen and (max-width:1000px) {';
	if($advance_pet_care_theme_color_first != false || $advance_pet_care_theme_color_second != false){
	$advance_pet_care_custom_css .='.primary-navigation a:focus, #menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a, #contact-info, .primary-navigation ul ul a:focus{
	background-image: linear-gradient(-90deg, '.esc_attr($advance_pet_care_theme_color_first).' 0%, '.esc_attr($advance_pet_care_theme_color_second).' 120%);
		}';
	}
	$advance_pet_care_custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$advance_pet_care_theme_lay = get_theme_mod( 'advance_pet_care_theme_options','Default');
    if($advance_pet_care_theme_lay == 'Default'){
		$advance_pet_care_custom_css .='body{';
			$advance_pet_care_custom_css .='max-width: 100%;';
		$advance_pet_care_custom_css .='}';
		$advance_pet_care_custom_css .='.page-template-custom-home-page .middle-header{';
			$advance_pet_care_custom_css .='width: 97.3%';
		$advance_pet_care_custom_css .='}';
	}else if($advance_pet_care_theme_lay == 'Container'){
		$advance_pet_care_custom_css .='body{';
			$advance_pet_care_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$advance_pet_care_custom_css .='}';
		$advance_pet_care_custom_css .='.page-template-custom-home-page .middle-header{';
			$advance_pet_care_custom_css .='width: 97.7%';
		$advance_pet_care_custom_css .='}';
		$advance_pet_care_custom_css .='.serach_outer{';
			$advance_pet_care_custom_css .='width: 97.7%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$advance_pet_care_custom_css .='}';
	}else if($advance_pet_care_theme_lay == 'Box Container'){
		$advance_pet_care_custom_css .='body{';
			$advance_pet_care_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$advance_pet_care_custom_css .='}';
		$advance_pet_care_custom_css .='.serach_outer{';
			$advance_pet_care_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; right:0';
		$advance_pet_care_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/
	$advance_pet_care_theme_lay = get_theme_mod( 'advance_pet_care_slider_image_opacity','0.6');
	if($advance_pet_care_theme_lay == '0'){
		$advance_pet_care_custom_css .='#slider img{';
			$advance_pet_care_custom_css .='opacity:0';
		$advance_pet_care_custom_css .='}';
	}else if($advance_pet_care_theme_lay == '0.1'){
		$advance_pet_care_custom_css .='#slider img{';
			$advance_pet_care_custom_css .='opacity:0.1';
		$advance_pet_care_custom_css .='}';
	}else if($advance_pet_care_theme_lay == '0.2'){
		$advance_pet_care_custom_css .='#slider img{';
			$advance_pet_care_custom_css .='opacity:0.2';
		$advance_pet_care_custom_css .='}';
	}else if($advance_pet_care_theme_lay == '0.3'){
		$advance_pet_care_custom_css .='#slider img{';
			$advance_pet_care_custom_css .='opacity:0.3';
		$advance_pet_care_custom_css .='}';
	}else if($advance_pet_care_theme_lay == '0.4'){
		$advance_pet_care_custom_css .='#slider img{';
			$advance_pet_care_custom_css .='opacity:0.4';
		$advance_pet_care_custom_css .='}';
	}else if($advance_pet_care_theme_lay == '0.5'){
		$advance_pet_care_custom_css .='#slider img{';
			$advance_pet_care_custom_css .='opacity:0.5';
		$advance_pet_care_custom_css .='}';
	}else if($advance_pet_care_theme_lay == '0.6'){
		$advance_pet_care_custom_css .='#slider img{';
			$advance_pet_care_custom_css .='opacity:0.6';
		$advance_pet_care_custom_css .='}';
	}else if($advance_pet_care_theme_lay == '0.7'){
		$advance_pet_care_custom_css .='#slider img{';
			$advance_pet_care_custom_css .='opacity:0.7';
		$advance_pet_care_custom_css .='}';
	}else if($advance_pet_care_theme_lay == '0.8'){
		$advance_pet_care_custom_css .='#slider img{';
			$advance_pet_care_custom_css .='opacity:0.8';
		$advance_pet_care_custom_css .='}';
	}else if($advance_pet_care_theme_lay == '0.9'){
		$advance_pet_care_custom_css .='#slider img{';
			$advance_pet_care_custom_css .='opacity:0.9';
		$advance_pet_care_custom_css .='}';
	}

	/*----------Slider Content Alignment ------------*/
	$advance_pet_care_slider_lay = get_theme_mod( 'advance_pet_care_slider_content_alignment','Left');
    if($advance_pet_care_slider_lay == 'Left'){
		$advance_pet_care_custom_css .='#slider .carousel-caption, #slider .inner_carousel,#slider .inner_carousel h1{';
			$advance_pet_care_custom_css .='text-align:left; left:10%; right:50%;';
		$advance_pet_care_custom_css .='}';
		$advance_pet_care_custom_css .='
		@media screen and (max-width: 720px){
		#slider .carousel-caption{';
		$advance_pet_care_custom_css .='left: 15%; right: 40%;';
		$advance_pet_care_custom_css .='} }';

	}else if($advance_pet_care_slider_lay == 'Center'){
		$advance_pet_care_custom_css .='#slider .carousel-caption, #slider .inner_carousel,#slider .inner_carousel h1{';
			$advance_pet_care_custom_css .='text-align:center; left:15%; right:15%;';
		$advance_pet_care_custom_css .='}';

	}else if($advance_pet_care_slider_lay == 'Right'){
		$advance_pet_care_custom_css .='#slider .carousel-caption, #slider .inner_carousel,#slider .inner_carousel h1{';
			$advance_pet_care_custom_css .='text-align:right; right:10%; left:50%;';
		$advance_pet_care_custom_css .='}';
		$advance_pet_care_custom_css .='
		@media screen and (max-width: 720px){
		#slider .carousel-caption{';
		$advance_pet_care_custom_css .='left: 40%; right: 15%;';
		$advance_pet_care_custom_css .='} }';
	}

	/*------------------------------ Button Settings option-----------------------*/
	$advance_pet_care_button_padding_top_bottom = get_theme_mod('advance_pet_care_button_padding_top_bottom');
	$advance_pet_care_button_padding_left_right = get_theme_mod('advance_pet_care_button_padding_left_right');
	$advance_pet_care_custom_css .='.new-text .read-more-btn a, #slider .inner_carousel .get-apt-btn a, #comments .form-submit input[type="submit"], #welcome .discover-btn a{';
		$advance_pet_care_custom_css .='padding-top: '.esc_attr($advance_pet_care_button_padding_top_bottom).'px; padding-bottom: '.esc_attr($advance_pet_care_button_padding_top_bottom).'px; padding-left: '.esc_attr($advance_pet_care_button_padding_left_right).'px; padding-right: '.esc_attr($advance_pet_care_button_padding_left_right).'px; display:inline-block;';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_button_border_radius = get_theme_mod('advance_pet_care_button_border_radius');
	$advance_pet_care_custom_css .='.new-text .read-more-btn a, #slider .inner_carousel .get-apt-btn a, #comments .form-submit input[type="submit"], #welcome .discover-btn a{';
		$advance_pet_care_custom_css .='border-radius: '.esc_attr($advance_pet_care_button_border_radius).'px;';
	$advance_pet_care_custom_css .='}';

	/*-----------------------------Responsive Setting --------------------*/
	$advance_pet_care_stickyheader = get_theme_mod( 'advance_pet_care_responsive_sticky_header',false);
	if($advance_pet_care_stickyheader == true && get_theme_mod( 'advance_pet_care_sticky_header') == false){
    	$advance_pet_care_custom_css .='.fixed-header{';
			$advance_pet_care_custom_css .='position:static;';
		$advance_pet_care_custom_css .='} ';
	}
    if($advance_pet_care_stickyheader == true){
    	$advance_pet_care_custom_css .='@media screen and (max-width:575px) {';
		$advance_pet_care_custom_css .='.fixed-header{';
			$advance_pet_care_custom_css .='position:fixed;';
		$advance_pet_care_custom_css .='} }';
	}else if($advance_pet_care_stickyheader == false){
		$advance_pet_care_custom_css .='@media screen and (max-width:575px) {';
		$advance_pet_care_custom_css .='.fixed-header{';
			$advance_pet_care_custom_css .='position:static;';
		$advance_pet_care_custom_css .='} }';
	}

	$advance_pet_care_slider = get_theme_mod( 'advance_pet_care_responsive_slider',false);
	if($advance_pet_care_slider == true && get_theme_mod( 'advance_pet_care_slider_hide', false) == false){
    	$advance_pet_care_custom_css .='#slider{';
			$advance_pet_care_custom_css .='display:none;';
		$advance_pet_care_custom_css .='} ';
	}
    if($advance_pet_care_slider == true){
    	$advance_pet_care_custom_css .='@media screen and (max-width:575px) {';
		$advance_pet_care_custom_css .='#slider{';
			$advance_pet_care_custom_css .='display:block;';
		$advance_pet_care_custom_css .='} }';
	}else if($advance_pet_care_slider == false){
		$advance_pet_care_custom_css .='@media screen and (max-width:575px) {';
		$advance_pet_care_custom_css .='#slider{';
			$advance_pet_care_custom_css .='display:none;';
		$advance_pet_care_custom_css .='} }';
	}

	$advance_pet_care_slider = get_theme_mod( 'advance_pet_care_responsive_scroll',true);
	if($advance_pet_care_slider == true && get_theme_mod( 'advance_pet_care_enable_disable_scroll', true) == false){
    	$advance_pet_care_custom_css .='#scroll-top{';
			$advance_pet_care_custom_css .='display:none !important;';
		$advance_pet_care_custom_css .='} ';
	}
    if($advance_pet_care_slider == true){
    	$advance_pet_care_custom_css .='@media screen and (max-width:575px) {';
		$advance_pet_care_custom_css .='#scroll-top{';
			$advance_pet_care_custom_css .='visibility: visible !important;';
		$advance_pet_care_custom_css .='} }';
	}else if($advance_pet_care_slider == false){
		$advance_pet_care_custom_css .='@media screen and (max-width:575px) {';
		$advance_pet_care_custom_css .='#scroll-top{';
			$advance_pet_care_custom_css .='visibility: hidden !important;';
		$advance_pet_care_custom_css .='} }';
	}

	$advance_pet_care_sidebar = get_theme_mod( 'advance_pet_care_responsive_sidebar',true);
    if($advance_pet_care_sidebar == true){
    	$advance_pet_care_custom_css .='@media screen and (max-width:575px) {';
		$advance_pet_care_custom_css .='#sidebar{';
			$advance_pet_care_custom_css .='display:block;';
		$advance_pet_care_custom_css .='} }';
	}else if($advance_pet_care_sidebar == false){
		$advance_pet_care_custom_css .='@media screen and (max-width:575px) {';
		$advance_pet_care_custom_css .='#sidebar{';
			$advance_pet_care_custom_css .='display:none;';
		$advance_pet_care_custom_css .='} }';
	}

	$advance_pet_care_loader = get_theme_mod( 'advance_pet_care_responsive_preloader', true);
	if($advance_pet_care_loader == true && get_theme_mod( 'advance_pet_care_preloader_option', true) == false){
    	$advance_pet_care_custom_css .='#loader-wrapper{';
			$advance_pet_care_custom_css .='display:none;';
		$advance_pet_care_custom_css .='} ';
	}
    if($advance_pet_care_loader == true){
    	$advance_pet_care_custom_css .='@media screen and (max-width:575px) {';
		$advance_pet_care_custom_css .='#loader-wrapper{';
			$advance_pet_care_custom_css .='display:block;';
		$advance_pet_care_custom_css .='} }';
	}else if($advance_pet_care_loader == false){
		$advance_pet_care_custom_css .='@media screen and (max-width:575px) {';
		$advance_pet_care_custom_css .='#loader-wrapper{';
			$advance_pet_care_custom_css .='display:none;';
		$advance_pet_care_custom_css .='} }';
	}

	/*------------------ Skin Option -------------------*/

	$advance_pet_care_theme_lay = get_theme_mod( 'advance_pet_care_background_skin_mode','Transpert Background');
    if($advance_pet_care_theme_lay == 'With Background'){
		$advance_pet_care_custom_css .='#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.content-sec,.front-page-content,.background-img-skin,.noresult-content{';
			$advance_pet_care_custom_css .='background-color: #fff; ';
		$advance_pet_care_custom_css .='}';
		$advance_pet_care_custom_css .='.background-img-skin{';
			$advance_pet_care_custom_css .='margin: 2% 0; ';
		$advance_pet_care_custom_css .='}';
	}else if($advance_pet_care_theme_lay == 'Transpert Background'){
		$advance_pet_care_custom_css .='#sidebar aside,.page-box .new-text, .page-box-single .new-text,.page-box-single{';
			$advance_pet_care_custom_css .='background-color: transparent;';
		$advance_pet_care_custom_css .='}';
	}

	/*------------ Woocommerce Settings  --------------*/
	$advance_pet_care_top_bottom_product_button_padding = get_theme_mod('advance_pet_care_top_bottom_product_button_padding', 10);
	$advance_pet_care_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
		$advance_pet_care_custom_css .='padding-top: '.esc_attr($advance_pet_care_top_bottom_product_button_padding).'px; padding-bottom: '.esc_attr($advance_pet_care_top_bottom_product_button_padding).'px;';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_left_right_product_button_padding = get_theme_mod('advance_pet_care_left_right_product_button_padding', 16);
	$advance_pet_care_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
		$advance_pet_care_custom_css .='padding-left: '.esc_attr($advance_pet_care_left_right_product_button_padding).'px; padding-right: '.esc_attr($advance_pet_care_left_right_product_button_padding).'px;';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_product_button_border_radius = get_theme_mod('advance_pet_care_product_button_border_radius', 0);
	$advance_pet_care_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
		$advance_pet_care_custom_css .='border-radius: '.esc_attr($advance_pet_care_product_button_border_radius).'px;';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_show_related_products = get_theme_mod('advance_pet_care_show_related_products',true);
	if($advance_pet_care_show_related_products == false){
		$advance_pet_care_custom_css .='.related.products{';
			$advance_pet_care_custom_css .='display: none;';
		$advance_pet_care_custom_css .='}';
	}

	$advance_pet_care_show_wooproducts_border = get_theme_mod('advance_pet_care_show_wooproducts_border', false);
	if($advance_pet_care_show_wooproducts_border == true){
		$advance_pet_care_custom_css .='.products li{';
			$advance_pet_care_custom_css .='border: 1px solid #cccccc;';
		$advance_pet_care_custom_css .='}';
	}

	$advance_pet_care_top_bottom_wooproducts_padding = get_theme_mod('advance_pet_care_top_bottom_wooproducts_padding',0);
	$advance_pet_care_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$advance_pet_care_custom_css .='padding-top: '.esc_attr($advance_pet_care_top_bottom_wooproducts_padding).'px !important; padding-bottom: '.esc_attr($advance_pet_care_top_bottom_wooproducts_padding).'px !important;';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_left_right_wooproducts_padding = get_theme_mod('advance_pet_care_left_right_wooproducts_padding',0);
	$advance_pet_care_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$advance_pet_care_custom_css .='padding-left: '.esc_attr($advance_pet_care_left_right_wooproducts_padding).'px !important; padding-right: '.esc_attr($advance_pet_care_left_right_wooproducts_padding).'px !important;';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_wooproducts_border_radius = get_theme_mod('advance_pet_care_wooproducts_border_radius',0);
	$advance_pet_care_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$advance_pet_care_custom_css .='border-radius: '.esc_attr($advance_pet_care_wooproducts_border_radius).'px;';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_wooproducts_box_shadow = get_theme_mod('advance_pet_care_wooproducts_box_shadow',0);
	$advance_pet_care_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$advance_pet_care_custom_css .='box-shadow: '.esc_attr($advance_pet_care_wooproducts_box_shadow).'px '.esc_attr($advance_pet_care_wooproducts_box_shadow).'px '.esc_attr($advance_pet_care_wooproducts_box_shadow).'px #eee;';
	$advance_pet_care_custom_css .='}';

	/*-------------- Footer Text -------------------*/
	$advance_pet_care_copyright_content_align = get_theme_mod('advance_pet_care_copyright_content_align','center');
	if($advance_pet_care_copyright_content_align != false){
		$advance_pet_care_custom_css .='.copyright{';
			$advance_pet_care_custom_css .='text-align: '.esc_attr($advance_pet_care_copyright_content_align).' !important;';
		$advance_pet_care_custom_css .='}';
	}

	$advance_pet_care_footer_content_font_size = get_theme_mod('advance_pet_care_footer_content_font_size', 16);
	$advance_pet_care_custom_css .='.copyright p{';
		$advance_pet_care_custom_css .='font-size: '.esc_attr($advance_pet_care_footer_content_font_size).'px;';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_copyright_padding = get_theme_mod('advance_pet_care_copyright_padding', 15);
	$advance_pet_care_custom_css .='.copyright{';
		$advance_pet_care_custom_css .='padding-top: '.esc_attr($advance_pet_care_copyright_padding).'px !important; padding-bottom: '.esc_attr($advance_pet_care_copyright_padding).'px !important;';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_footer_widget_bg_color = get_theme_mod('advance_pet_care_footer_widget_bg_color');
	$advance_pet_care_custom_css .='#footer{';
		$advance_pet_care_custom_css .='background-color: '.esc_attr($advance_pet_care_footer_widget_bg_color).';';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_footer_widget_bg_image = get_theme_mod('advance_pet_care_footer_widget_bg_image');
	if($advance_pet_care_footer_widget_bg_image != false){
		$advance_pet_care_custom_css .='#footer{';
			$advance_pet_care_custom_css .='background: url('.esc_attr($advance_pet_care_footer_widget_bg_image).');';
		$advance_pet_care_custom_css .='}';
	}

	// scroll to top
	$advance_pet_care_scroll_font_size_icon = get_theme_mod('advance_pet_care_scroll_font_size_icon', 22);
	$advance_pet_care_custom_css .='#scroll-top .fas{';
		$advance_pet_care_custom_css .='font-size: '.esc_attr($advance_pet_care_scroll_font_size_icon).'px;';
	$advance_pet_care_custom_css .='}';

	// Slider Height 
	$advance_pet_care_slider_image_height = get_theme_mod('advance_pet_care_slider_image_height');
	$advance_pet_care_custom_css .='#slider img{';
		$advance_pet_care_custom_css .='height: '.esc_attr($advance_pet_care_slider_image_height).'px;';
	$advance_pet_care_custom_css .='}';

	// Display Blog Post 
	$advance_pet_care_display_blog_page_post = get_theme_mod( 'advance_pet_care_display_blog_page_post','Without Box');
    if($advance_pet_care_display_blog_page_post == 'In Box'){
		$advance_pet_care_custom_css .='.page-box{';
			$advance_pet_care_custom_css .='border:1px solid #c5c5c5; margin:25px 0;';
		$advance_pet_care_custom_css .='}';
	}

	// slider overlay
	$advance_pet_care_slider_overlay = get_theme_mod('advance_pet_care_slider_overlay', true);
	if($advance_pet_care_slider_overlay == false){
		$advance_pet_care_custom_css .='#slider img{';
			$advance_pet_care_custom_css .='opacity:1;';
		$advance_pet_care_custom_css .='}';
	} 
	$advance_pet_care_slider_image_overlay_color = get_theme_mod('advance_pet_care_slider_image_overlay_color', true);
	if($advance_pet_care_slider_overlay != false){
		$advance_pet_care_custom_css .='#slider{';
			$advance_pet_care_custom_css .='background-color: '.esc_attr($advance_pet_care_slider_image_overlay_color).';';
		$advance_pet_care_custom_css .='}';
	}

	// site title and tagline font size option
	$advance_pet_care_site_title_size_option = get_theme_mod('advance_pet_care_site_title_size_option', 37);{
	$advance_pet_care_custom_css .='.logo h1, .logo p.site-title{';
	$advance_pet_care_custom_css .='font-size: '.esc_attr($advance_pet_care_site_title_size_option).'px;';
		$advance_pet_care_custom_css .='}';
	}

	$advance_pet_care_site_tagline_size_option = get_theme_mod('advance_pet_care_site_tagline_size_option', 13);{
	$advance_pet_care_custom_css .='.pet-top p{';
	$advance_pet_care_custom_css .='font-size: '.esc_attr($advance_pet_care_site_tagline_size_option).'px;';
		$advance_pet_care_custom_css .='}';
	}

	// woocommerce product sale settings
	$advance_pet_care_border_radius_product_sale = get_theme_mod('advance_pet_care_border_radius_product_sale',0);
	$advance_pet_care_custom_css .='.woocommerce span.onsale {';
		$advance_pet_care_custom_css .='border-radius: '.esc_attr($advance_pet_care_border_radius_product_sale).'px;';
	$advance_pet_care_custom_css .='}';

	$advance_pet_care_align_product_sale = get_theme_mod('advance_pet_care_align_product_sale', 'Right');
	if($advance_pet_care_align_product_sale == 'Right' ){
		$advance_pet_care_custom_css .='.woocommerce ul.products li.product .onsale{';
			$advance_pet_care_custom_css .=' left:auto; right:0;';
		$advance_pet_care_custom_css .='}';
	}elseif($advance_pet_care_align_product_sale == 'Left' ){
		$advance_pet_care_custom_css .='.woocommerce ul.products li.product .onsale{';
			$advance_pet_care_custom_css .=' left:0; right:auto;';
		$advance_pet_care_custom_css .='}';
	}

	$advance_pet_care_product_sale_font_size = get_theme_mod('advance_pet_care_product_sale_font_size',14);
	$advance_pet_care_custom_css .='.woocommerce span.onsale{';
		$advance_pet_care_custom_css .='font-size: '.esc_attr($advance_pet_care_product_sale_font_size).'px;';
	$advance_pet_care_custom_css .='}';


	// preloader background option
	$advance_pet_care_loader_background_color_settings = get_theme_mod('advance_pet_care_loader_background_color_settings');
	$advance_pet_care_custom_css .='#loader-wrapper .loader-section{';
		$advance_pet_care_custom_css .='background-color: '.esc_attr($advance_pet_care_loader_background_color_settings).';';
	$advance_pet_care_custom_css .='} ';

	// fixed header padding option
	$advance_pet_care_sticky_header_padding_settings = get_theme_mod('advance_pet_care_sticky_header_padding_settings', 0);
	$advance_pet_care_custom_css .='.fixed-header{';
		$advance_pet_care_custom_css .='padding: '.esc_attr($advance_pet_care_sticky_header_padding_settings).'px;';
	$advance_pet_care_custom_css .='}';

	// woocommerce Product Navigation
	$advance_pet_care_products_navigation = get_theme_mod('advance_pet_care_products_navigation', 'Yes');
	if($advance_pet_care_products_navigation == 'No'){
		$advance_pet_care_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$advance_pet_care_custom_css .='display: none;';
		$advance_pet_care_custom_css .='}';
	}






