<?php
	/*------------------- Global First Color -------------*/

	$moving_company_lite_first_color = get_theme_mod('moving_company_lite_first_color');

	$moving_company_lite_custom_css = '';

	if($moving_company_lite_first_color != false){
		$moving_company_lite_custom_css .='.social-media .custom-social-icons i:hover, .more-btn, input[type="submit"], #footer .tagcloud a:hover, #sidebar .custom-social-icons i, #footer .custom-social-icons i, #footer-2, #sidebar h3, .pagination .current, .pagination a:hover, #sidebar .tagcloud a:hover, #comments input[type="submit"], nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .scrollup i, #comments a.comment-reply-link, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #footer .more-button, #sidebar .more-button, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .nav-previous a:hover, .nav-next a:hover, #preloader, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__label{';
			$moving_company_lite_custom_css .='background-color: '.esc_attr($moving_company_lite_first_color).';';
		$moving_company_lite_custom_css .='}';
	}
	if($moving_company_lite_first_color != false){
		$moving_company_lite_custom_css .='.wp-block-button, .wp-block-button__link{';
			$moving_company_lite_custom_css .='background-color: '.esc_attr($moving_company_lite_first_color).'!important;';
		$moving_company_lite_custom_css .='}';
	}
	if($moving_company_lite_first_color != false){
		$moving_company_lite_custom_css .='a, #footer .custom-social-icons i:hover, #footer li a:hover, .post-main-box:hover h2, #sidebar ul li a:hover, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .entry-content a, .post-main-box:hover h2 a, .main-navigation ul.sub-menu a:hover, .main-navigation a:hover, .entry-content a, #sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, #footer a.custom_read_more:hover, .post-main-box:hover .post-info a, .single-post .post-info:hover a, .logo .site-title a:hover, #slider .inner_carousel h1 a:hover, .call-info i:hover{';
			$moving_company_lite_custom_css .='color: '.esc_attr($moving_company_lite_first_color).';';
		$moving_company_lite_custom_css .='}';
	}
	if($moving_company_lite_first_color != false){
		$moving_company_lite_custom_css .='.call-info i{';
			$moving_company_lite_custom_css .='border-color: '.esc_attr($moving_company_lite_first_color).';';
		$moving_company_lite_custom_css .='}';
	}
	if($moving_company_lite_first_color != false){
		$moving_company_lite_custom_css .='.more-btn:before, .more-button:before, .wp-block-button:before{';
			$moving_company_lite_custom_css .='border-left-color: '.esc_attr($moving_company_lite_first_color).';';
		$moving_company_lite_custom_css .='}';
	}
	if($moving_company_lite_first_color != false){
		$moving_company_lite_custom_css .='.main-navigation ul ul{';
			$moving_company_lite_custom_css .='border-top-color: '.esc_attr($moving_company_lite_first_color).';';
		$moving_company_lite_custom_css .='}';
	}
	if($moving_company_lite_first_color != false){
		$moving_company_lite_custom_css .='#serv-section h3, #footer h3:after, .main-navigation ul ul, #footer .wp-block-search .wp-block-search__label:after{';
			$moving_company_lite_custom_css .='border-bottom-color: '.esc_attr($moving_company_lite_first_color).';';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_custom_css .='@media screen and (max-width:720px) {';
		if($moving_company_lite_first_color != false){
			$moving_company_lite_custom_css .='.top-bar, .info-box{
			background-color:'.esc_attr($moving_company_lite_first_color).';
			}';
		}
	$moving_company_lite_custom_css .='}';

	/*------------------------------ Global Second Color -----------*/

	$moving_company_lite_second_color = get_theme_mod('moving_company_lite_second_color');

	if($moving_company_lite_second_color != false){
		$moving_company_lite_custom_css .='.social-media, .more-btn:hover, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, #footer, .pagination span, .pagination a, #sidebar .custom-social-icons i:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce span.onsale, #sidebar .more-button:hover, .woocommerce nav.woocommerce-pagination ul li a, .nav-previous a, .nav-next a, .call-info i{';
			$moving_company_lite_custom_css .='background-color: '.esc_attr($moving_company_lite_second_color).';';
		$moving_company_lite_custom_css .='}';
	}
	if($moving_company_lite_second_color != false){
		$moving_company_lite_custom_css .='.wp-block-button:hover, .wp-block-button .wp-block-button__link:hover{';
			$moving_company_lite_custom_css .='background-color: '.esc_attr($moving_company_lite_second_color).'!important;';
		$moving_company_lite_custom_css .='}';
	}
	if($moving_company_lite_second_color != false){
		$moving_company_lite_custom_css .='#slider .inner_carousel h1 a, #slider .inner_carousel p, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, h1, h2, h3, h4, h5, h6, .post-main-box h2, .post-navigation a, .woocommerce-message::before, .woocommerce-info::before, h2.woocommerce-loop-product__title, .woocommerce div.product .product_title, .woocommerce .quantity .qty, .post-main-box h2 a, nav.woocommerce-MyAccount-navigation ul li a:hover, .call-info p a:hover, .info-box p a:hover, .copyright a:hover{';
			$moving_company_lite_custom_css .='color: '.esc_attr($moving_company_lite_second_color).';';
		$moving_company_lite_custom_css .='}';
	}
	if($moving_company_lite_second_color != false){
		$moving_company_lite_custom_css .='.woocommerce .quantity .qty,.call-info i{';
			$moving_company_lite_custom_css .='border-color: '.esc_attr($moving_company_lite_second_color).';';
		$moving_company_lite_custom_css .='}';
	}
	if($moving_company_lite_second_color != false){
		$moving_company_lite_custom_css .='.woocommerce-message, .woocommerce-info{';
			$moving_company_lite_custom_css .='border-top-color: '.esc_attr($moving_company_lite_second_color).';';
		$moving_company_lite_custom_css .='}';
	}
	if($moving_company_lite_second_color != false){
		$moving_company_lite_custom_css .='.more-btn:hover:before, #sidebar .more-button:hover:before, .wp-block-button:before:hover{';
			$moving_company_lite_custom_css .='border-left-color: '.esc_attr($moving_company_lite_second_color).';';
		$moving_company_lite_custom_css .='}';
	}
	if($moving_company_lite_second_color != false){
		$moving_company_lite_custom_css .='nav.woocommerce-MyAccount-navigation ul li{
		box-shadow: 2px 2px 0 0 '.esc_attr($moving_company_lite_second_color).';
		}';
	}
	if($moving_company_lite_second_color != false || $moving_company_lite_first_color != false){
	$moving_company_lite_custom_css .='.box:hover{
		background: linear-gradient(to right, '.esc_attr($moving_company_lite_second_color).', '.esc_attr($moving_company_lite_first_color).');
		}';
	}
	if($moving_company_lite_second_color != false || $moving_company_lite_first_color != false){
	$moving_company_lite_custom_css .='.top-bar{
		background: linear-gradient(60deg, '.esc_attr($moving_company_lite_second_color).' 74.5%, '.esc_attr($moving_company_lite_first_color).' 32%) repeat scroll 0 0;
		}';
	}
	if($moving_company_lite_first_color != false || $moving_company_lite_second_color != false){
	$moving_company_lite_custom_css .='.info-box{
		background: linear-gradient(60deg, '.esc_attr($moving_company_lite_first_color).' 41%, '.esc_attr($moving_company_lite_second_color).' 32%) repeat scroll 0 0;
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$moving_company_lite_theme_lay = get_theme_mod( 'moving_company_lite_width_option','Full Width');
    if($moving_company_lite_theme_lay == 'Boxed'){
		$moving_company_lite_custom_css .='body{';
			$moving_company_lite_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$moving_company_lite_custom_css .='}';
		$moving_company_lite_custom_css .='.scrollup i{';
		  $moving_company_lite_custom_css .='right: 100px;';
		$moving_company_lite_custom_css .='}';
		$moving_company_lite_custom_css .='.scrollup.left i{';
		  $moving_company_lite_custom_css .='left: 100px;';
		$moving_company_lite_custom_css .='}';
	}else if($moving_company_lite_theme_lay == 'Wide Width'){
		$moving_company_lite_custom_css .='body{';
			$moving_company_lite_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$moving_company_lite_custom_css .='}';
		$moving_company_lite_custom_css .='.scrollup i{';
		  $moving_company_lite_custom_css .='right: 30px;';
		$moving_company_lite_custom_css .='}';
		$moving_company_lite_custom_css .='.scrollup.left i{';
		  $moving_company_lite_custom_css .='left: 30px;';
		$moving_company_lite_custom_css .='}';
	}else if($moving_company_lite_theme_lay == 'Full Width'){
		$moving_company_lite_custom_css .='body{';
			$moving_company_lite_custom_css .='max-width: 100%;';
		$moving_company_lite_custom_css .='}';
	}

	/*------------------ Slider Opacity -------------------*/

	$moving_company_lite_theme_lay = get_theme_mod( 'moving_company_lite_slider_opacity_color','0.6');
	if($moving_company_lite_theme_lay == '0'){
		$moving_company_lite_custom_css .='#slider img{';
			$moving_company_lite_custom_css .='opacity:0';
		$moving_company_lite_custom_css .='}';
		}else if($moving_company_lite_theme_lay == '0.1'){
		$moving_company_lite_custom_css .='#slider img{';
			$moving_company_lite_custom_css .='opacity:0.1';
		$moving_company_lite_custom_css .='}';
		}else if($moving_company_lite_theme_lay == '0.2'){
		$moving_company_lite_custom_css .='#slider img{';
			$moving_company_lite_custom_css .='opacity:0.2';
		$moving_company_lite_custom_css .='}';
		}else if($moving_company_lite_theme_lay == '0.3'){
		$moving_company_lite_custom_css .='#slider img{';
			$moving_company_lite_custom_css .='opacity:0.3';
		$moving_company_lite_custom_css .='}';
		}else if($moving_company_lite_theme_lay == '0.4'){
		$moving_company_lite_custom_css .='#slider img{';
			$moving_company_lite_custom_css .='opacity:0.4';
		$moving_company_lite_custom_css .='}';
		}else if($moving_company_lite_theme_lay == '0.5'){
		$moving_company_lite_custom_css .='#slider img{';
			$moving_company_lite_custom_css .='opacity:0.5';
		$moving_company_lite_custom_css .='}';
		}else if($moving_company_lite_theme_lay == '0.6'){
		$moving_company_lite_custom_css .='#slider img{';
			$moving_company_lite_custom_css .='opacity:0.6';
		$moving_company_lite_custom_css .='}';
		}else if($moving_company_lite_theme_lay == '0.7'){
		$moving_company_lite_custom_css .='#slider img{';
			$moving_company_lite_custom_css .='opacity:0.7';
		$moving_company_lite_custom_css .='}';
		}else if($moving_company_lite_theme_lay == '0.8'){
		$moving_company_lite_custom_css .='#slider img{';
			$moving_company_lite_custom_css .='opacity:0.8';
		$moving_company_lite_custom_css .='}';
		}else if($moving_company_lite_theme_lay == '0.9'){
		$moving_company_lite_custom_css .='#slider img{';
			$moving_company_lite_custom_css .='opacity:0.9';
		$moving_company_lite_custom_css .='}';
		}

	/*----------------Slider Content Layout -------------------*/

	$moving_company_lite_theme_lay = get_theme_mod( 'moving_company_lite_slider_content_option','Left');
    if($moving_company_lite_theme_lay == 'Left'){
		$moving_company_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel h1{';
			$moving_company_lite_custom_css .='text-align:left; left:10%; right:45%';
		$moving_company_lite_custom_css .='}';
	}else if($moving_company_lite_theme_lay == 'Center'){
		$moving_company_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel h1{';
			$moving_company_lite_custom_css .='text-align:center; left:30%; right:30%; clip-path:none; padding: 5px;';
		$moving_company_lite_custom_css .='}';
		$moving_company_lite_custom_css .='#slider .more-btn{';
			$moving_company_lite_custom_css .='text-align:center; right:40%; position:absolute; margin: 10px 0;';
		$moving_company_lite_custom_css .='}';
		$moving_company_lite_custom_css .='#slider .inner_carousel p{';
			$moving_company_lite_custom_css .='padding: 5px;';
		$moving_company_lite_custom_css .='}';
	}else if($moving_company_lite_theme_lay == 'Right'){
		$moving_company_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel h1{';
			$moving_company_lite_custom_css .='text-align:right; left:44%; right:10%; clip-path: polygon(9% 0%, 93% 0%, 93% 100%, 0% 100%); padding: 0px 15px;';
		$moving_company_lite_custom_css .='}';
		$moving_company_lite_custom_css .='#slider .more-btn{';
			$moving_company_lite_custom_css .='text-align:right; right:15%; position:absolute; margin: 10px 0;';
		$moving_company_lite_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$moving_company_lite_slider_content_padding_top_bottom = get_theme_mod('moving_company_lite_slider_content_padding_top_bottom');
	$moving_company_lite_slider_content_padding_left_right = get_theme_mod('moving_company_lite_slider_content_padding_left_right');
	if($moving_company_lite_slider_content_padding_top_bottom != false || $moving_company_lite_slider_content_padding_left_right != false){
		$moving_company_lite_custom_css .='#slider .carousel-caption{';
			$moving_company_lite_custom_css .='top: '.esc_attr($moving_company_lite_slider_content_padding_top_bottom).'; bottom: '.esc_attr($moving_company_lite_slider_content_padding_top_bottom).';left: '.esc_attr($moving_company_lite_slider_content_padding_left_right).';right: '.esc_attr($moving_company_lite_slider_content_padding_left_right).';';
		$moving_company_lite_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$moving_company_lite_slider_height = get_theme_mod('moving_company_lite_slider_height');
	if($moving_company_lite_slider_height != false){
		$moving_company_lite_custom_css .='#slider img{';
			$moving_company_lite_custom_css .='height: '.esc_attr($moving_company_lite_slider_height).';';
		$moving_company_lite_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$moving_company_lite_theme_lay = get_theme_mod( 'moving_company_lite_blog_layout_option','Default');
    if($moving_company_lite_theme_lay == 'Default'){
		$moving_company_lite_custom_css .='.post-main-box{';
			$moving_company_lite_custom_css .='';
		$moving_company_lite_custom_css .='}';
	}else if($moving_company_lite_theme_lay == 'Center'){
		$moving_company_lite_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .post-main-box .more-btn{';
			$moving_company_lite_custom_css .='text-align:center;';
		$moving_company_lite_custom_css .='}';
		$moving_company_lite_custom_css .='.post-info, .post-main-box .more-btn{';
			$moving_company_lite_custom_css .='margin-top:10px;';
		$moving_company_lite_custom_css .='}';
		$moving_company_lite_custom_css .='.post-main-box .more-btn{';
			$moving_company_lite_custom_css .='margin:0 auto;';
		$moving_company_lite_custom_css .='}';
		$moving_company_lite_custom_css .='.post-info hr{';
			$moving_company_lite_custom_css .='margin:10px auto;';
		$moving_company_lite_custom_css .='}';
	}else if($moving_company_lite_theme_lay == 'Left'){
		$moving_company_lite_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .post-main-box .more-btn, #our-services p{';
			$moving_company_lite_custom_css .='text-align:Left;';
		$moving_company_lite_custom_css .='}';
		$moving_company_lite_custom_css .='.post-main-box .more-btn{';
			$moving_company_lite_custom_css .='margin:20px 0;';
		$moving_company_lite_custom_css .='}';
		$moving_company_lite_custom_css .='.post-info hr{';
			$moving_company_lite_custom_css .='margin-bottom:10px;';
		$moving_company_lite_custom_css .='}';
		$moving_company_lite_custom_css .='.post-main-box h2{';
			$moving_company_lite_custom_css .='margin-top:10px;';
		$moving_company_lite_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$moving_company_lite_resp_stickyheader = get_theme_mod( 'moving_company_lite_stickyheader_hide_show',false);
	if($moving_company_lite_resp_stickyheader == true && get_theme_mod( 'moving_company_lite_sticky_header',false) != true){
    	$moving_company_lite_custom_css .='.header-fixed{';
			$moving_company_lite_custom_css .='position:static;';
		$moving_company_lite_custom_css .='} ';
	}
    if($moving_company_lite_resp_stickyheader == true){
    	$moving_company_lite_custom_css .='@media screen and (max-width:575px) {';
		$moving_company_lite_custom_css .='.header-fixed{';
			$moving_company_lite_custom_css .='position:fixed;';
		$moving_company_lite_custom_css .='} }';
	}else if($moving_company_lite_resp_stickyheader == false){
		$moving_company_lite_custom_css .='@media screen and (max-width:575px){';
		$moving_company_lite_custom_css .='.header-fixed{';
			$moving_company_lite_custom_css .='position:static;';
		$moving_company_lite_custom_css .='} }';
	}

	$moving_company_lite_resp_slider = get_theme_mod( 'moving_company_lite_resp_slider_hide_show',false);
	if($moving_company_lite_resp_slider == true && get_theme_mod( 'moving_company_lite_slider_arrows', false) == false){
    	$moving_company_lite_custom_css .='#slider{';
			$moving_company_lite_custom_css .='display:none;';
		$moving_company_lite_custom_css .='} ';
	}
    if($moving_company_lite_resp_slider == true){
    	$moving_company_lite_custom_css .='@media screen and (max-width:575px) {';
		$moving_company_lite_custom_css .='#slider{';
			$moving_company_lite_custom_css .='display:block;';
		$moving_company_lite_custom_css .='} }';
	}else if($moving_company_lite_resp_slider == false){
		$moving_company_lite_custom_css .='@media screen and (max-width:575px) {';
		$moving_company_lite_custom_css .='#slider{';
			$moving_company_lite_custom_css .='display:none;';
		$moving_company_lite_custom_css .='} }';
	}

	$moving_company_lite_resp_sidebar = get_theme_mod( 'moving_company_lite_sidebar_hide_show',true);
    if($moving_company_lite_resp_sidebar == true){
    	$moving_company_lite_custom_css .='@media screen and (max-width:575px) {';
		$moving_company_lite_custom_css .='#sidebar{';
			$moving_company_lite_custom_css .='display:block;';
		$moving_company_lite_custom_css .='} }';
	}else if($moving_company_lite_resp_sidebar == false){
		$moving_company_lite_custom_css .='@media screen and (max-width:575px) {';
		$moving_company_lite_custom_css .='#sidebar{';
			$moving_company_lite_custom_css .='display:none;';
		$moving_company_lite_custom_css .='} }';
	}

	$moving_company_lite_resp_scroll_top = get_theme_mod( 'moving_company_lite_resp_scroll_top_hide_show',true);
	if($moving_company_lite_resp_scroll_top == true && get_theme_mod( 'moving_company_lite_hide_show_scroll',true) != true){
    	$moving_company_lite_custom_css .='.scrollup i{';
			$moving_company_lite_custom_css .='visibility:hidden !important;';
		$moving_company_lite_custom_css .='} ';
	}
    if($moving_company_lite_resp_scroll_top == true){
    	$moving_company_lite_custom_css .='@media screen and (max-width:575px) {';
		$moving_company_lite_custom_css .='.scrollup i{';
			$moving_company_lite_custom_css .='visibility:visible !important;';
		$moving_company_lite_custom_css .='} }';
	}else if($moving_company_lite_resp_scroll_top == false){
		$moving_company_lite_custom_css .='@media screen and (max-width:575px){';
		$moving_company_lite_custom_css .='.scrollup i{';
			$moving_company_lite_custom_css .='visibility:hidden !important;';
		$moving_company_lite_custom_css .='} }';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$moving_company_lite_navigation_menu_font_size = get_theme_mod('moving_company_lite_navigation_menu_font_size');
	if($moving_company_lite_navigation_menu_font_size != false){
		$moving_company_lite_custom_css .='.main-navigation a{';
			$moving_company_lite_custom_css .='font-size: '.esc_attr($moving_company_lite_navigation_menu_font_size).';';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_sticky_header_padding = get_theme_mod('moving_company_lite_sticky_header_padding');
	if($moving_company_lite_sticky_header_padding != false){
		$moving_company_lite_custom_css .='.header-fixed{';
			$moving_company_lite_custom_css .='padding: '.esc_attr($moving_company_lite_sticky_header_padding).';';
		$moving_company_lite_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$moving_company_lite_search_padding_top_bottom = get_theme_mod('moving_company_lite_search_padding_top_bottom');
	$moving_company_lite_search_padding_left_right = get_theme_mod('moving_company_lite_search_padding_left_right');
	$moving_company_lite_search_font_size = get_theme_mod('moving_company_lite_search_font_size');
	$moving_company_lite_search_border_radius = get_theme_mod('moving_company_lite_search_border_radius');
	if($moving_company_lite_search_padding_top_bottom != false || $moving_company_lite_search_padding_left_right != false || $moving_company_lite_search_font_size != false || $moving_company_lite_search_border_radius != false){
		$moving_company_lite_custom_css .='.search-box i{';
			$moving_company_lite_custom_css .='padding-top: '.esc_attr($moving_company_lite_search_padding_top_bottom).'; padding-bottom: '.esc_attr($moving_company_lite_search_padding_top_bottom).';padding-left: '.esc_attr($moving_company_lite_search_padding_left_right).';padding-right: '.esc_attr($moving_company_lite_search_padding_left_right).';font-size: '.esc_attr($moving_company_lite_search_font_size).';border-radius: '.esc_attr($moving_company_lite_search_border_radius).'px;';
		$moving_company_lite_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$moving_company_lite_featured_image_border_radius = get_theme_mod('moving_company_lite_featured_image_border_radius', 0);
	if($moving_company_lite_featured_image_border_radius != false){
		$moving_company_lite_custom_css .='.box-image img, .feature-box img{';
			$moving_company_lite_custom_css .='border-radius: '.esc_attr($moving_company_lite_featured_image_border_radius).'px;';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_single_blog_post_navigation_show_hide = get_theme_mod('moving_company_lite_single_blog_post_navigation_show_hide',true);
	if($moving_company_lite_single_blog_post_navigation_show_hide != true){
		$moving_company_lite_custom_css .='.post-navigation{';
			$moving_company_lite_custom_css .='display: none;';
		$moving_company_lite_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$moving_company_lite_footer_background_color = get_theme_mod('moving_company_lite_footer_background_color');
	if($moving_company_lite_footer_background_color != false){
		$moving_company_lite_custom_css .='#footer{';
			$moving_company_lite_custom_css .='background-color: '.esc_attr($moving_company_lite_footer_background_color).';';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_copyright_font_size = get_theme_mod('moving_company_lite_copyright_font_size');
	if($moving_company_lite_copyright_font_size != false){
		$moving_company_lite_custom_css .='.copyright p{';
			$moving_company_lite_custom_css .='font-size: '.esc_attr($moving_company_lite_copyright_font_size).';';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_copyright_padding_top_bottom = get_theme_mod('moving_company_lite_copyright_padding_top_bottom');
	if($moving_company_lite_copyright_padding_top_bottom != false){
		$moving_company_lite_custom_css .='#footer-2{';
			$moving_company_lite_custom_css .='padding-top: '.esc_attr($moving_company_lite_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($moving_company_lite_copyright_padding_top_bottom).';';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_copyright_alignment = get_theme_mod('moving_company_lite_copyright_alignment');
	if($moving_company_lite_copyright_alignment != false){
		$moving_company_lite_custom_css .='.copyright p{';
			$moving_company_lite_custom_css .='text-align: '.esc_attr($moving_company_lite_copyright_alignment).';';
		$moving_company_lite_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$moving_company_lite_scroll_to_top_font_size = get_theme_mod('moving_company_lite_scroll_to_top_font_size');
	if($moving_company_lite_scroll_to_top_font_size != false){
		$moving_company_lite_custom_css .='.scrollup i{';
			$moving_company_lite_custom_css .='font-size: '.esc_attr($moving_company_lite_scroll_to_top_font_size).';';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_scroll_to_top_padding = get_theme_mod('moving_company_lite_scroll_to_top_padding');
	$moving_company_lite_scroll_to_top_padding = get_theme_mod('moving_company_lite_scroll_to_top_padding');
	if($moving_company_lite_scroll_to_top_padding != false){
		$moving_company_lite_custom_css .='.scrollup i{';
			$moving_company_lite_custom_css .='padding-top: '.esc_attr($moving_company_lite_scroll_to_top_padding).';padding-bottom: '.esc_attr($moving_company_lite_scroll_to_top_padding).';';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_scroll_to_top_width = get_theme_mod('moving_company_lite_scroll_to_top_width');
	if($moving_company_lite_scroll_to_top_width != false){
		$moving_company_lite_custom_css .='.scrollup i{';
			$moving_company_lite_custom_css .='width: '.esc_attr($moving_company_lite_scroll_to_top_width).';';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_scroll_to_top_height = get_theme_mod('moving_company_lite_scroll_to_top_height');
	if($moving_company_lite_scroll_to_top_height != false){
		$moving_company_lite_custom_css .='.scrollup i{';
			$moving_company_lite_custom_css .='height: '.esc_attr($moving_company_lite_scroll_to_top_height).';';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_scroll_to_top_border_radius = get_theme_mod('moving_company_lite_scroll_to_top_border_radius');
	if($moving_company_lite_scroll_to_top_border_radius != false){
		$moving_company_lite_custom_css .='.scrollup i{';
			$moving_company_lite_custom_css .='border-radius: '.esc_attr($moving_company_lite_scroll_to_top_border_radius).'px;';
		$moving_company_lite_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$moving_company_lite_social_icon_font_size = get_theme_mod('moving_company_lite_social_icon_font_size');
	if($moving_company_lite_social_icon_font_size != false){
		$moving_company_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$moving_company_lite_custom_css .='font-size: '.esc_attr($moving_company_lite_social_icon_font_size).';';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_social_icon_padding = get_theme_mod('moving_company_lite_social_icon_padding');
	if($moving_company_lite_social_icon_padding != false){
		$moving_company_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$moving_company_lite_custom_css .='padding: '.esc_attr($moving_company_lite_social_icon_padding).';';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_social_icon_width = get_theme_mod('moving_company_lite_social_icon_width');
	if($moving_company_lite_social_icon_width != false){
		$moving_company_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$moving_company_lite_custom_css .='width: '.esc_attr($moving_company_lite_social_icon_width).';';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_social_icon_height = get_theme_mod('moving_company_lite_social_icon_height');
	if($moving_company_lite_social_icon_height != false){
		$moving_company_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$moving_company_lite_custom_css .='height: '.esc_attr($moving_company_lite_social_icon_height).';';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_social_icon_border_radius = get_theme_mod('moving_company_lite_social_icon_border_radius');
	if($moving_company_lite_social_icon_border_radius != false){
		$moving_company_lite_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$moving_company_lite_custom_css .='border-radius: '.esc_attr($moving_company_lite_social_icon_border_radius).'px;';
		$moving_company_lite_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$moving_company_lite_products_padding_top_bottom = get_theme_mod('moving_company_lite_products_padding_top_bottom');
	if($moving_company_lite_products_padding_top_bottom != false){
		$moving_company_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$moving_company_lite_custom_css .='padding-top: '.esc_attr($moving_company_lite_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($moving_company_lite_products_padding_top_bottom).'!important;';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_products_padding_left_right = get_theme_mod('moving_company_lite_products_padding_left_right');
	if($moving_company_lite_products_padding_left_right != false){
		$moving_company_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$moving_company_lite_custom_css .='padding-left: '.esc_attr($moving_company_lite_products_padding_left_right).'!important; padding-right: '.esc_attr($moving_company_lite_products_padding_left_right).'!important;';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_products_box_shadow = get_theme_mod('moving_company_lite_products_box_shadow');
	if($moving_company_lite_products_box_shadow != false){
		$moving_company_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$moving_company_lite_custom_css .='box-shadow: '.esc_attr($moving_company_lite_products_box_shadow).'px '.esc_attr($moving_company_lite_products_box_shadow).'px '.esc_attr($moving_company_lite_products_box_shadow).'px #ddd;';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_products_border_radius = get_theme_mod('moving_company_lite_products_border_radius', 0);
	if($moving_company_lite_products_border_radius != false){
		$moving_company_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$moving_company_lite_custom_css .='border-radius: '.esc_attr($moving_company_lite_products_border_radius).'px;';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_products_button_border_radius = get_theme_mod('moving_company_lite_products_button_border_radius', 0);
	if($moving_company_lite_products_button_border_radius != false){
		$moving_company_lite_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$moving_company_lite_custom_css .='border-radius: '.esc_attr($moving_company_lite_products_button_border_radius).'px;';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_woocommerce_sale_font_size = get_theme_mod('moving_company_lite_woocommerce_sale_font_size');
	if($moving_company_lite_woocommerce_sale_font_size != false){
		$moving_company_lite_custom_css .='.woocommerce span.onsale{';
			$moving_company_lite_custom_css .='font-size: '.esc_attr($moving_company_lite_woocommerce_sale_font_size).';';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_woocommerce_sale_border_radius = get_theme_mod('moving_company_lite_woocommerce_sale_border_radius', 0);
	if($moving_company_lite_woocommerce_sale_border_radius != false){
		$moving_company_lite_custom_css .='.woocommerce span.onsale{';
			$moving_company_lite_custom_css .='border-radius: '.esc_attr($moving_company_lite_woocommerce_sale_border_radius).'px;';
		$moving_company_lite_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$moving_company_lite_site_title_font_size = get_theme_mod('moving_company_lite_site_title_font_size');
	if($moving_company_lite_site_title_font_size != false){
		$moving_company_lite_custom_css .='.logo h1, .logo p.site-title{';
			$moving_company_lite_custom_css .='font-size: '.esc_attr($moving_company_lite_site_title_font_size).';';
		$moving_company_lite_custom_css .='}';
	}

	// Site tagline Font Size
	$moving_company_lite_site_tagline_font_size = get_theme_mod('moving_company_lite_site_tagline_font_size');
	if($moving_company_lite_site_tagline_font_size != false){
		$moving_company_lite_custom_css .='.logo p.site-description{';
			$moving_company_lite_custom_css .='font-size: '.esc_attr($moving_company_lite_site_tagline_font_size).';';
		$moving_company_lite_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$moving_company_lite_preloader_bg_color = get_theme_mod('moving_company_lite_preloader_bg_color');
	if($moving_company_lite_preloader_bg_color != false){
		$moving_company_lite_custom_css .='#preloader{';
			$moving_company_lite_custom_css .='background-color: '.esc_attr($moving_company_lite_preloader_bg_color).';';
		$moving_company_lite_custom_css .='}';
	}

	$moving_company_lite_preloader_border_color = get_theme_mod('moving_company_lite_preloader_border_color');
	if($moving_company_lite_preloader_border_color != false){
		$moving_company_lite_custom_css .='.loader-line{';
			$moving_company_lite_custom_css .='border-color: '.esc_attr($moving_company_lite_preloader_border_color).'!important;';
		$moving_company_lite_custom_css .='}';
	}