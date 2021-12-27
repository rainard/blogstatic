<?php
/**
 * Sections.
 *
 * @package Fox009_wisdom
 * @since   1.0.0
 */
$wp_customize->add_section( 
	'fox009_wisdom_section_general_container',
	array(
		'title' => __( 'Container', 'fox009-wisdom' ),
		'panel' => 'fox009_wisdom_panel_general',
	)
);


$wp_customize->add_section( 
	'fox009_wisdom_section_general_sidebar',
	array(
		'title' => __( 'Sidebar', 'fox009-wisdom' ),
		'panel' => 'fox009_wisdom_panel_general',
	)
);

$wp_customize->add_section( 
	'fox009_wisdom_section_general_breadcrumbs',
	array(
		'title' => __( 'Breadcrumbs', 'fox009-wisdom' ),
		'panel' => 'fox009_wisdom_panel_general',
	)
);

$wp_customize->add_section( 
	'fox009_wisdom_section_general_button',
	array(
		'title' => __( 'Button', 'fox009-wisdom' ),
		'panel' => 'fox009_wisdom_panel_general',
	)
);

$wp_customize->add_section( 
	'fox009_wisdom_section_header_site_identity',
	array(
		'title' => __( 'Site Identity', 'fox009-wisdom' ),
		'panel' => 'fox009_wisdom_panel_header',
		'priority' => 100,
	)
);

$header_image = $wp_customize->get_section('header_image');
$header_image->panel = 'fox009_wisdom_panel_header';
$header_image->priority = 200;
		
$wp_customize->add_section( 
	'fox009_wisdom_section_header_layout',
	array(
		'title' => __( 'Layout', 'fox009-wisdom' ),
		'panel' => 'fox009_wisdom_panel_header',
		'priority' => 300,
	)
);

$wp_customize->add_section( 
	'fox009_wisdom_section_header_navigation',
	array(
		'title' => __( 'Navigation', 'fox009-wisdom' ),
		'panel' => 'fox009_wisdom_panel_header',
		'priority' => 400,
	)
);

$wp_customize->add_section( 
	'fox009_wisdom_section_content_archive',
	array(
		'title' => __( 'Blog/Archive', 'fox009-wisdom' ),
		'panel' => 'fox009_wisdom_panel_content',
	)
);

$wp_customize->add_section( 
	'fox009_wisdom_section_content_single',
	array(
		'title' => __( 'Single Post', 'fox009-wisdom' ),
		'panel' => 'fox009_wisdom_panel_content',
	)
);

$wp_customize->add_section( 
	'fox009_wisdom_section_footer_bottom',
	array(
		'title' => __( 'Footer', 'fox009-wisdom' ),
		'priority' => 50,
	)
);

$wp_customize->add_section( 
	'fox009_wisdom_section_about_theme',
	array(
		'title' => __( 'About', 'fox009-wisdom' ),
		'priority' => 50,
	)
);

