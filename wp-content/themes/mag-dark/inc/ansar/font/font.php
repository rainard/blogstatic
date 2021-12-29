<?php
/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function magdark_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('DM Serif Display:400|Mukta Vaani:200,300,400,500,600,700,800&display=swap');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $fonts_url;
}
function magdark_scripts_styles() {
    wp_enqueue_style( 'mag-dark-fonts', magdark_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'magdark_scripts_styles' );