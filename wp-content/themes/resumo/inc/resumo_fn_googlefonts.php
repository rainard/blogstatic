<?php
function resumo_fn_fonts() {
	global $resumo_fn_option;
	$customfont = '';
	
	$default = array(
					'arial',
					'verdana',
					'trebuchet',
					'georgia',
					'times',
					'tahoma',
					'helvetica');
	$bodyFont = $navFont = $navMobFont = $headingFont = $blockquoteFont = $extraFont = '';
	if(isset($resumo_fn_option['body_font']['font-family'])){$bodyFont = $resumo_fn_option['body_font']['font-family'];}
	if(isset($resumo_fn_option['nav_font']['font-family'])){$navFont = $resumo_fn_option['nav_font']['font-family'];}
	if(isset($resumo_fn_option['nav_mob_font']['font-family'])){$navMobFont = $resumo_fn_option['nav_mob_font']['font-family'];}
	if(isset($resumo_fn_option['heading_font']['font-family'])){$headingFont = $resumo_fn_option['heading_font']['font-family'];}
	if(isset($resumo_fn_option['blockquote_font']['font-family'])){$blockquoteFont = $resumo_fn_option['blockquote_font']['font-family'];}
	if(isset($resumo_fn_option['extra_font']['font-family'])){$extraFont = $resumo_fn_option['extra_font']['font-family'];}
	
	$googlefonts = array(
					$bodyFont,
					$navFont,
					$navMobFont,
					$headingFont,
					$blockquoteFont,
					$extraFont,
					);
	$googlefonts = array_filter($googlefonts);

				
	foreach($googlefonts as $getfonts) {
		if(!in_array($getfonts, $default)) {
			$customfont = str_replace(' ', '+', $getfonts). ':400,400italic,500,500italic,600,600italic,700,700italic|' . $customfont;
		}
	}
	
	if($customfont != '' && isset($resumo_fn_option)){
		$protocol = is_ssl() ? 'https' : 'http';
		wp_enqueue_style( 'resumo_fn_googlefonts', "$protocol://fonts.googleapis.com/css?family=" . substr_replace($customfont ,"",-1) . "&subset=latin,cyrillic,greek,vietnamese" );
	}	
}
add_action( 'wp_enqueue_scripts', 'resumo_fn_fonts' );
?>