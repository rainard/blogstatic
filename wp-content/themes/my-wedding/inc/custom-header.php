<?php
/**
 * Custom header implementation
 */

function my_wedding_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'my_wedding_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1400,
		'height'             => 75,
		'flex-width'         => true,
		'flex-height'        => true,
		'wp-head-callback'   => 'my_wedding_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'my_wedding_custom_header_setup' );

if ( ! function_exists( 'my_wedding_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see my_wedding_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'my_wedding_header_style' );
function my_wedding_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        #header {
			background-image:url('".esc_url(get_header_image())."');
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'my-wedding-basic-style', $custom_css );
	endif;
}
endif; // my_wedding_header_style