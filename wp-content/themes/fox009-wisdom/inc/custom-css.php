<?php

if(!function_exists('fox009_wisdom_custom_css')){

    function fox009_wisdom_custom_css(){
		$primary_color = fox009_wisdom_theme_options('primary_color');
		$primary_color_rgb = fox009_wisdom_rgb_color($primary_color);
		$button_color = fox009_wisdom_theme_options('button_color');
		$button_border_radius = fox009_wisdom_theme_options('button_border_radius');
		$sidebar_width = fox009_wisdom_theme_options('sidebar_width');
		$primary_width = 100 - $sidebar_width;
		$background_color = get_background_color();	
		$font_size = fox009_wisdom_theme_options('font_size');
		$custom_css = ':root {' .
					'--primary-color: ' . $primary_color . ';' .
					'--primary-color-rgb: ' . $primary_color_rgb . ';' .
					'--button-color: ' . $button_color . ';' .
					'--button-border-radius: ' . $button_border_radius . 'px;' .
					'--primary-column-width:' . $primary_width . '%;' .
					'--sidebar-column-width:' . $sidebar_width . '%;' .
					'background-color: #' . $background_color . ';' .
					'font-size:' . $font_size .'px;' .
					'}';
		$container_layout = fox009_wisdom_theme_options('container_layout');	
		if($container_layout == 'limit'){
			$container_max_width = fox009_wisdom_theme_options('container_max_width');
			$custom_css .=	'.container {' .
						'max-width: ' . $container_max_width . 'px;' .
						'}';
		}
					
		$site_title_font_size = fox009_wisdom_theme_options('site_title_font_size');
		$custom_css .= '.site-branding .site-title{' .
					'font-size:' . $site_title_font_size . 'rem;' .
					'}';
					
		$main_menu_transform = fox009_wisdom_theme_options('main_menu_transform');
		$custom_css .= '.site-header .menu a{' .
					'text-transform:' . $main_menu_transform . ';' .
					'}';
		
		$main_menu_padding = fox009_wisdom_theme_options('main_menu_padding');
		$custom_css .= '.main-navigation ul.nav-menu>li{' .
					'padding: 0 ' . $main_menu_padding . 'px;' .
					'}';
					
		$archive_excerpt_lines = fox009_wisdom_theme_options('archive_excerpt_lines');
		$custom_css .= '.main-content.posts .post-summary{' .
					'-webkit-line-clamp: ' . $archive_excerpt_lines .
					'}';
						
		wp_add_inline_style('fox009-wisdom-style', $custom_css);	
	}
}
add_action('wp_enqueue_scripts', 'fox009_wisdom_custom_css', 100);

if(!function_exists('fox009_wisdom_rgb_color')){

    function fox009_wisdom_rgb_color($hex){

		$hex = sanitize_hex_color($hex);
		if($hex == ''){
			return '255, 255, 255';
		}
		$hex = substr($hex,1);
		$decimal = hexdec($hex);
		if($decimal <= 0xfff) {
		  $r = ($decimal>>0x8)*0x11;
		  $g = ($decimal>>0x4&0xf)*0x11;
		  $b = ($decimal&0xf)*0x11;
		}else{
		  $r = $decimal>>0x10;
		  $g = $decimal>>0x8&0xff;
		  $b = $decimal&0xff;
		}
		return $r . ', ' . $g . ', ' . $b;
	}
}