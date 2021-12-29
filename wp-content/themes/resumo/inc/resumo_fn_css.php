<?php

function resumo_fn_inline_styles() {
	
	global $resumo_fn_option;
	
	
	wp_enqueue_style('resumo_fn_inline', get_template_directory_uri().'/assets/css/inline.css', array(), '1.0', 'all');
	/************************** START styles **************************/
	$resumo_fn_custom_css 		= "";
	
	// heading color
	if(isset($resumo_fn_option['heading_color']) && $resumo_fn_option['heading_color'] != ''){
		$resumo_fn_custom_css .= ":root{--hc: {$resumo_fn_option['heading_color']}}";
	}
	// body color
	if(isset($resumo_fn_option['body_color']) && $resumo_fn_option['body_color'] != ''){
		$resumo_fn_custom_css .= ":root{--bc: {$resumo_fn_option['body_color']}}";
	}
	// primary color
	if(isset($resumo_fn_option['primary_color']) && $resumo_fn_option['primary_color'] != ''){
		$resumo_fn_custom_css .= ":root{--mc: {$resumo_fn_option['primary_color']}}";
	}
	// magic cursor options
	$blog_desc__switcher 		= array('with_image','no_image');
	if(isset($resumo_fn_option['blog_desc__switcher'])){
		$blog_desc__switcher 	= $resumo_fn_option['blog_desc__switcher'];
	}
	$with_image 	= 'no';
	$no_image 		= 'no';
	if(!empty($blog_desc__switcher)){
		foreach($blog_desc__switcher as $key => $value) {
			if($value == 'with_image'){$with_image 	= 'yes';}
			if($value == 'no_image'){$no_image 		= 'yes';}
		}
	}
	if($with_image == 'no'){
		$resumo_fn_custom_css .= ".resumo_fn_postlist .item_1 .fn__desc{display: none;}";
	}
	if($no_image == 'no'){
		$resumo_fn_custom_css .= ".resumo_fn_postlist .item_0 .fn__desc{display: none;}";
	}
		
	/****************************** END styles *****************************/
	if(isset($resumo_fn_option['custom_css'])){
		$resumo_fn_custom_css .= "{$resumo_fn_option['custom_css']}";	
	}

	$resumo_fn_custom_css = wp_kses($resumo_fn_custom_css,'post');
	wp_add_inline_style( 'resumo_fn_inline', $resumo_fn_custom_css );

			
}

?>