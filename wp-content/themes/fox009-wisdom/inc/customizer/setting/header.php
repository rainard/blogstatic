<?php
$section = 'fox009_wisdom_section_header_site_identity';

$wp_customize->get_control( 'custom_logo' )->section = $section;

$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
$wp_customize->get_control( 'blogname' )->section = $section;

$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
$wp_customize->get_control( 'blogdescription' )->section = $section;

$wp_customize->get_control( 'site_icon' )->section = $section;

$section = 'fox009_wisdom_section_header_layout';


$settings['header_main_menu'] =
	array(
		array(
			'default'           => 'header_main_menu',
			'sanitize_callback' => 'absint'
		), 
		array(
			'label'     => __( 'Header Main Menu', 'fox009-wisdom' ),
			'section'   => $section,
			'type' 		=> 'checkbox'
		)
	);

$settings['header_social_menu'] =
	array(
		array(
			'default'           => 'header_social_menu',
			'sanitize_callback' => 'absint'
		), 
		array(
			'label'     => __( 'Header Social Menu ', 'fox009-wisdom' ),
			'section'   => $section,
			'type' 		=> 'checkbox'
		)
	);

$settings['site_title_font_size'] =
	array(
		array(
			'transport' 		=> 'postMessage',
			'default'           => 'site_title_font_size',
			'sanitize_callback' => 'fox009_wisdom_sanitize_number',
		),
		array(
			'label'         => __( 'Site Title Font Size (rem)', 'fox009-wisdom' ),
			'section'       => $section,
			'type'    		=> 'range',
			'input_attrs' 	=> array(
								'min'  => 1,
								'max'  => 4,
								'step' => 0.1,
							),
		)
	);

$section = 'fox009_wisdom_section_header_navigation';

$settings['main_menu_transform'] =
	array(
		array(
			'transport' 		=> 'postMessage',
			'default'           => 'main_menu_transform',
			'sanitize_callback' => 'fox009_wisdom_sanitize_select'
		), 
		array(
			'label'     => __( 'Navigation Transform', 'fox009-wisdom' ),
			'section'   => $section,
			'choices'   => array(
							'none'     => esc_html__('Default', 'fox009-wisdom'),
							'capitalize'    => esc_html__('Capitalize', 'fox009-wisdom'),
							'uppercase'    => esc_html__('Uppercase', 'fox009-wisdom'),
							'lowercase'    => esc_html__('Lowercase', 'fox009-wisdom'),
							),
			'type' 		=> 'select'
		)
	);

$settings['main_menu_padding'] = 
	array(
		array(
			'transport' 		=> 'postMessage',
			'default'           => 'main_menu_padding',
			'sanitize_callback' => 'fox009_wisdom_sanitize_number'
		), 
		array(
			'label'     => __( 'Main Navigation Padding(px)', 'fox009-wisdom' ),
			'section'   => $section,
			'type'    		=> 'range',
			'input_attrs' 	=> array(
								'min'  => 0,
								'max'  => 100,
								'step' => 1,
							),
		)
	);

$settings['main_menu_text'] =
	array(
		array(
			'transport' 		=> 'postMessage',
			'default'           => 'main_menu_text',
			'sanitize_callback' => 'sanitize_text_field',
		),
		array(
			'label'   => __( 'Main Menu Toggle Button Text', 'fox009-wisdom' ),
			'section' => $section,
			'type'    => 'text',
		)
	);
