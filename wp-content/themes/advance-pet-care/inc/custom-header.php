<?php
/**
 * @package advance-pet-care
 * @subpackage advance-pet-care
 * @since advance-pet-care 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses advance_pet_care_header_style()
*/

function advance_pet_care_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'advance_pet_care_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1355,
		'height'                 => 150,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'advance_pet_care_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'advance_pet_care_custom_header_setup' );

if ( ! function_exists( 'advance_pet_care_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see advance_pet_care_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'advance_pet_care_header_style' );
function advance_pet_care_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$advance_pet_care_custom_css = "
        #header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'advance-pet-care-basic-style', $advance_pet_care_custom_css );
	endif;
}
endif; // advance_pet_care_header_style