<?php
/**
 * bootspress Theme Customizer
 *
 * @package bootspress
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bootspress_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'bootspress_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'bootspress_customize_partial_blogdescription',
			)
		);
	}
	
	/**
	 * Google Font.
	 */
	$wp_customize->add_section(
		'bootspress_google_font',
		array(
			'title'			=> __( 'Google Font', 'bootspress' ),
			'priority'		=> 130,
			'description'   => 'Integrate the fonts into your CSS. All you need to do is add the font name to your CSS styles. For example: "font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif; If You want to add more than one font just separate them with pipe "|", for example: "Open Sans:400|Inconsolata:400,700". Default subset is "latin,latin-ext"',
		)
	);
	
    $wp_customize->add_setting(
    	'bootspress_google_font_family',
    	array(
			'default' 			=> 'Playfair Display:700,900',
			'sanitize_callback' => 'sanitize_text_field',
    	)
    );
	
   $wp_customize->add_control(
   		'bootspress_google_font_family',
   		array(
			'label'		=> __( 'Google Font family', 'bootspress' ),
        	'section' => 'bootspress_google_font',
        	'type'    => 'text',
    	)
	);
	
    $wp_customize->add_setting(
    	'bootspress_google_font_subset',
    	array(
			'default' 			=> 'latin,latin-ext',
			'sanitize_callback' => 'sanitize_text_field',
    	)
	);
	
   $wp_customize->add_control(
   		'bootspress_google_font_subset',
   		array(
			'label'	  => __( 'Google Font subset', 'bootspress' ),
        	'section' => 'bootspress_google_font',
        	'type'    => 'text',
    	)
	);
}
add_action( 'customize_register', 'bootspress_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function bootspress_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function bootspress_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bootspress_customize_preview_js() {
	wp_enqueue_script( 'bootspress-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), BOOTSPRESS_VERSION, true );
}
add_action( 'customize_preview_init', 'bootspress_customize_preview_js' );

if ( ! function_exists( 'bootspress_customizer_google_fonts_url' ) ) :
/**
 * Google Font URL.
 */
function bootspress_customizer_google_fonts_url() {
	$fonts_url = '';
	$fonts = get_theme_mod( 'bootspress_google_font_family' );
	$subsets = get_theme_mod( 'bootspress_google_font_subset' );
		
	if ( ! empty ( $subsets ) ) {
		$query_args = array(
			'family' => urlencode( $fonts  ),
			'subset' => urlencode( $subsets ),
		);
	} else {
		$query_args = array(
			'family' => urlencode( $fonts  ),
		);		
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}
endif; // bootspress_customizer_google_fonts_url

/**
 * Enqueue Google Font style.
 */
function bootspress_enqueue_style_google_font_url() {
    wp_enqueue_style( 'bootspress-google-font', bootspress_customizer_google_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'bootspress_enqueue_style_google_font_url' );

/**
 * Adding Google Font to the editor.
 */
function bootspress_add_editor_style_customizer_google_fonts_url() {
    add_editor_style( bootspress_customizer_google_fonts_url() );
}
add_action( 'after_setup_theme', 'bootspress_add_editor_style_customizer_google_fonts_url' );
