<?php
/**
 * Moving Company Lite: Block Patterns
 *
 * @package Moving Company Lite
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'moving-company-lite',
		array( 'label' => __( 'Moving Company Lite', 'moving-company-lite' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'moving-company-lite/banner-section',
		array(
			'title'      => __( 'Banner Section', 'moving-company-lite' ),
			'categories' => array( 'moving-company-lite' ),
			'content'    => "<!-- wp:cover {\"customOverlayColor\":\"#0c3c8e\",\"align\":\"full\",\"className\":\"banner-sec p-0\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim banner-sec p-0\" style=\"background-color:#0c3c8e\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"className\":\"banner-outer-boxes mb-0\"} -->\n<div class=\"wp-block-columns alignwide banner-outer-boxes mb-0\"><!-- wp:column -->\n<div class=\"wp-block-column\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"9%\",\"className\":\"banner-social\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center banner-social\" style=\"flex-basis:9%\"><!-- wp:social-links {\"align\":\"right\",\"className\":\"is-style-logos-only mt-5\"} -->\n<ul class=\"wp-block-social-links alignright is-style-logos-only mt-5\"><!-- wp:social-link {\"url\":\"www.facebook.com\",\"service\":\"facebook\"} /-->\n\n<!-- wp:social-link {\"url\":\"www.twitter.com\",\"service\":\"twitter\"} /-->\n\n<!-- wp:social-link {\"url\":\"www.instagram.com\",\"service\":\"instagram\"} /-->\n\n<!-- wp:social-link {\"url\":\"www.youtube.com\",\"service\":\"youtube\"} /--></ul>\n<!-- /wp:social-links --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"90%\",\"className\":\"banner-slider\"} -->\n<div class=\"wp-block-column banner-slider\" style=\"flex-basis:90%\"><!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":10510,\"minHeight\":550,\"className\":\"banner-box\"} -->\n<div class=\"wp-block-cover has-background-dim banner-box\" style=\"background-image:url(" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png);min-height:550px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"className\":\"m-0\"} -->\n<div class=\"wp-block-columns alignwide m-0\"><!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"40%\",\"className\":\"ps-lg-5\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center ps-lg-5\" style=\"flex-basis:40%\"><!-- wp:group {\"className\":\"banner-content-box\"} -->\n<div class=\"wp-block-group banner-content-box\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":4,\"className\":\"mb-0\",\"style\":{\"color\":{\"text\":\"#14b5f0\"},\"typography\":{\"fontSize\":18}}} -->\n<h4 class=\"has-text-align-left mb-0 has-text-color\" style=\"color:#14b5f0;font-size:18px\">Te obtinuit ut adepto satis somno</h4>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"left\",\"level\":1,\"className\":\"mt-0 pt-1\",\"style\":{\"color\":{\"text\":\"#0c3c8e\"}}} -->\n<h1 class=\"has-text-align-left mt-0 pt-1 has-text-color\" style=\"color:#0c3c8e\">Te obtinuit ut adepto satis somno</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"className\":\"mb-0\",\"style\":{\"color\":{\"text\":\"#0c3c8e\"},\"typography\":{\"fontSize\":15}}} -->\n<p class=\"has-text-align-left mb-0 has-text-color\" style=\"color:#0c3c8e;font-size:15px\">Lorem ipsum dolor sit amet consectetue somno</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"left\",\"className\":\"mb-0\"} -->\n<div class=\"wp-block-buttons alignleft mb-0\"><!-- wp:button {\"borderRadius\":0,\"style\":{\"color\":{\"background\":\"#14b5f0\"}},\"textColor\":\"white\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-white-color has-text-color has-background no-border-radius\" style=\"background-color:#14b5f0\">ORDER MOVING</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'moving-company-lite/contact-section',
		array(
			'title'      => __( 'Contact Section', 'moving-company-lite' ),
			'categories' => array( 'moving-company-lite' ),
			'content'    => "<!-- wp:columns {\"align\":\"full\",\"className\":\"contact-details mb-0\"} -->\n<div class=\"wp-block-columns alignfull contact-details mb-0\"><!-- wp:column {\"width\":\"40%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:40%\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"contact-main-box\"} -->\n<div class=\"wp-block-column contact-main-box\"><!-- wp:cover {\"minHeight\":100,\"customGradient\":\"linear-gradient(70deg,rgb(20,181,240) 37%,rgb(12,59,141) 37%)\",\"className\":\"py-0 my-0\"} -->\n<div class=\"wp-block-cover has-background-dim has-background-gradient py-0 my-0\" style=\"background:linear-gradient(70deg,rgb(20,181,240) 37%,rgb(12,59,141) 37%);min-height:100px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"className\":\"contact-boxes mb-0 ps-5\"} -->\n<div class=\"wp-block-columns contact-boxes mb-0 ps-5\"><!-- wp:column {\"width\":\"33.33%\",\"className\":\"topbar-content-box1\"} -->\n<div class=\"wp-block-column topbar-content-box1\" style=\"flex-basis:33.33%\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":5,\"className\":\"mb-0\",\"fontSize\":\"medium\"} -->\n<h5 class=\"has-text-align-left mb-0 has-medium-font-size\">E-mail Us Now</h5>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"className\":\"mb-0\",\"style\":{\"typography\":{\"fontSize\":14}}} -->\n<p class=\"has-text-align-left mb-0\" style=\"font-size:14px\">support@movers.com</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"66.66%\",\"className\":\"topbar-content-box2\"} -->\n<div class=\"wp-block-column topbar-content-box2\" style=\"flex-basis:66.66%\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":5,\"className\":\"mb-0\",\"fontSize\":\"medium\"} -->\n<h5 class=\"has-text-align-left mb-0 has-medium-font-size\">Open Hours</h5>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"className\":\"mb-0\",\"style\":{\"typography\":{\"fontSize\":14}}} -->\n<p class=\"has-text-align-left mb-0\" style=\"font-size:14px\">Mon - Fri:9:00AM - 5:00PM Sat - Sun: Closed</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);

	register_block_pattern(
		'moving-company-lite/services-section',
		array(
			'title'      => __( 'Services Section', 'moving-company-lite' ),
			'categories' => array( 'moving-company-lite' ),
			'content'    => "<!-- wp:cover {\"overlayColor\":\"white\",\"align\":\"wide\",\"className\":\"services-section m-0\"} -->\n<div class=\"wp-block-cover alignwide has-white-background-color has-background-dim services-section m-0\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"className\":\"mb-lg-5\",\"style\":{\"color\":{\"text\":\"#0c3c8e\"},\"typography\":{\"fontSize\":40}}} -->\n<h2 class=\"has-text-align-center mb-lg-5 has-text-color\" style=\"color:#0c3c8e;font-size:40px\">Packers &amp; Movers Services</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns {\"align\":\"wide\",\"className\":\"serv-boxes m-0 px-lg-5\"} -->\n<div class=\"wp-block-columns alignwide serv-boxes m-0 px-lg-5\"><!-- wp:column {\"className\":\"services-box mb-4 p-3\"} -->\n<div class=\"wp-block-column services-box mb-4 p-3\"><!-- wp:image {\"align\":\"center\",\"id\":10660,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/services-1.png\" alt=\"\" class=\"wp-image-10660\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"className\":\"mb-2\",\"style\":{\"typography\":{\"fontSize\":25},\"color\":{\"text\":\"#14b5f0\"}}} -->\n<h3 class=\"has-text-align-center mb-2 has-text-color\" style=\"color:#14b5f0;font-size:25px\">Services Title 1</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"text-center mb-0\",\"style\":{\"typography\":{\"fontSize\":14},\"color\":{\"text\":\"#a5afcb\"}}} -->\n<p class=\"has-text-align-center text-center mb-0 has-text-color\" style=\"color:#a5afcb;font-size:14px\">Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys standard.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"services-box mb-4 p-3\"} -->\n<div class=\"wp-block-column services-box mb-4 p-3\"><!-- wp:image {\"align\":\"center\",\"id\":10661,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/services-2.png\" alt=\"\" class=\"wp-image-10661\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"className\":\"mb-2\",\"style\":{\"typography\":{\"fontSize\":25},\"color\":{\"text\":\"#14b5f0\"}}} -->\n<h3 class=\"has-text-align-center mb-2 has-text-color\" style=\"color:#14b5f0;font-size:25px\">Services Title 2</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"text-center mb-0\",\"style\":{\"typography\":{\"fontSize\":14},\"color\":{\"text\":\"#a5afcb\"}}} -->\n<p class=\"has-text-align-center text-center mb-0 has-text-color\" style=\"color:#a5afcb;font-size:14px\">Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys standard.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"services-box three mb-4 p-3\"} -->\n<div class=\"wp-block-column services-box three mb-4 p-3\"><!-- wp:image {\"align\":\"center\",\"id\":10662,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/services-3.png\" alt=\"\" class=\"wp-image-10662\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"className\":\"mb-2\",\"style\":{\"typography\":{\"fontSize\":25},\"color\":{\"text\":\"#14b5f0\"}}} -->\n<h3 class=\"has-text-align-center mb-2 has-text-color\" style=\"color:#14b5f0;font-size:25px\">Services Title 3</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"text-center mb-0\",\"style\":{\"typography\":{\"fontSize\":14},\"color\":{\"text\":\"#a5afcb\"}}} -->\n<p class=\"has-text-align-center text-center mb-0 has-text-color\" style=\"color:#a5afcb;font-size:14px\">Lorem Ipsum has been the industrys standard. Lorem Ipsum has been the industrys standard.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);
}