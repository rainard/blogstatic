<?php

function entermag_enqueue_child_styles() {
    $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    $parent_style = 'enternews-style';
    $parent_woocommerce_style = 'enternews-woocommerce-style';
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap' . $min . '.css');
    $deps = array( 'bootstrap', $parent_style);
    /**
     * Load WooCommerce compatibility file.
     */
    if (class_exists('WooCommerce')) {
        wp_enqueue_style($parent_woocommerce_style, get_template_directory_uri() . '/woocommerce.css');

        $font_path = WC()->plugin_url() . '/assets/fonts/';
        $inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

        wp_add_inline_style($parent_woocommerce_style, $inline_font);
        $deps[] = 'enternews-woocommerce-style';
    }

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    
    wp_enqueue_style(
        'entermag-style',
        get_stylesheet_directory_uri() . '/style.css',
        $deps,
        wp_get_theme()->get('Version')
    );


}

add_action('wp_enqueue_scripts', 'entermag_enqueue_child_styles');

function entermag_filter_default_theme_options($defaults) {
    $defaults['header_layout'] = 'header-layout-centered';
    $defaults['select_main_banner_section_layout'] = 'boxed';
    $defaults['secondary_color']   = '#9D090D';
    return $defaults;
}

add_filter('enternews_filter_default_theme_options', 'entermag_filter_default_theme_options', 1);

require get_stylesheet_directory() . '/inc/widgets/widget-posts-carousel.php';


function entermag_widgets() {
        register_widget( 'EnterMag_Posts_Carousel' );
    }
add_action( 'widgets_init', 'entermag_widgets', 10 , 1 );
