<?php
$section = 'fox009_wisdom_section_general_container';

$settings['container_layout'] =
	array(
		array(
			'transport'			=> 'postMessage',
			'default'           => 'container_layout',
			'sanitize_callback' => 'fox009_wisdom_sanitize_select',
		),
		array(
			'label'   => __( 'Layout', 'fox009-wisdom' ),
			'section' => $section,
			'choices' => array(
							'full' 	=> 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAABkAgMAAAAZNSFjAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAJUExURQC2/9nZ2f///+v6/B4AAAA+SURBVEjH7dexDQAgDANB10xHw36pMyUTRHJHFP7rG8DWcdqCzWPpFG9Y0Uo5wWAwGAwGg8G+YJ0HLe9jHLtJFTO8qw1jEgAAAABJRU5ErkJggg==',
							'limit' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAABkAgMAAAAZNSFjAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAJUExURQC2/9nZ2f///+v6/B4AAABASURBVEjHYwglBgQwjCobfspWEQMWDKCyBQxogGlVA5Q1qmxU2aiyUWWjykaVjSobVTaqbFTZoG7QjvY+hp0yAFqtY+6Z339JAAAAAElFTkSuQmCC',
						),
			'type'    => 'image-radio',
		)
	);

$settings['container_max_width'] =
	array(
		array(
			'transport'			=> 'postMessage',
			'default'           => 'container_max_width',
			'sanitize_callback' => 'fox009_wisdom_sanitize_number',
		),
		array(
			'label'     => __( 'Max-Width (1240-2520px)', 'fox009-wisdom' ),
			'section'   => $section,
			'type'    	=> 'range',
			'input_attrs' => array(
							'min'  => 1240,
							'max'  => 2520,
							'step' => 1,
						),
		)
	);

$settings['container_max_width_separator'] =
	array(
		array(
			'sanitize_callback' => '__return_false',
		),
		array(
			'setting' 	=> 'container_width_separator]',
			'section' 	=> $section,
			'type'	  	=> 'separator',
	   )
	);

$settings['primary_color'] =
	array(
		array(
			'transport'			=> 'postMessage',
			'default'           => 'primary_color',
			'sanitize_callback' => 'sanitize_hex_color',
		),
		array(
			'label'     => esc_html__( 'Primary Color', 'fox009-wisdom' ),
			'section' 	=> $section,
			'type'	  	=> 'color',
	   )
	);

$background_color = $wp_customize->get_control('background_color');
$background_color->section = $section;
$background_color->priority = 100;

$settings['background_color_separator'] =
	array(
		array(
			'sanitize_callback' => '__return_false',
		),
		array(
			'setting' 	=> 'container_width_separator]',
			'section' 	=> $section,
			'type'	  	=> 'separator',
			'priority'	=> 110,
	   )
	);	
	
$settings['font_size'] =
	array(
		array(
			'transport' 		=> 'postMessage',
			'default'           => 'font_size',
			'sanitize_callback' => 'absint',
		),
		array(
			'label'      => esc_html__('Enter Root Font Size','fox009-wisdom'),
			'section'    => $section,
			'type'      => 'range',
			'priority'	=> 110,
			'input_attrs' 	=> array(
								'min'  => 10,
								'max'  => 24,
								'step' => 1,
							),
		)
	);
	
$settings['font_size_separator'] =
	array(
		array(
			'sanitize_callback' => '__return_false',
		),
		array(
			'setting' 	=> 'container_width_separator]',
			'section' 	=> $section,
			'type'	  	=> 'separator',
			'priority'	=> 110,
	   )
	);	
	
$background_image = $wp_customize->get_control('background_image');
$background_image->section = $section;
$background_image->priority = 120;

$background_preset = $wp_customize->get_control('background_preset');
$background_preset->section = $section;
$background_preset->priority = 120;

$background_position = $wp_customize->get_control('background_position');
$background_position->section = $section;
$background_position->priority = 120;

$background_size = $wp_customize->get_control('background_size');
$background_size->section = $section;
$background_size->priority = 120;


$background_repeat = $wp_customize->get_control('background_repeat');
$background_repeat->section = $section;
$background_repeat->priority = 120;

$background_attachment = $wp_customize->get_control('background_attachment');
$background_attachment->section = $section;
$background_attachment->priority = 120;

$section = 'fox009_wisdom_section_general_sidebar';

$right_sidebar='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAABkAgMAAAAZNSFjAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAJUExURQC2/9nZ2f///+v6/B4AAABBSURBVEjHYwglBgQwjCobfspWEQMWDKCypehuDlvVwAABo8pGlY0qG1U2qmxU2aiyUWWjykaVDeoG7WjvY9gpAwCDft84Mz5sRAAAAABJRU5ErkJggg==';
$left_sidebar='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAABkAgMAAAAZNSFjAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAJUExURQC2/9nZ2f///+v6/B4AAABASURBVEjHYwglBgQwjCobfspWEQMWDKCyBQwQoLUSw/WjykaVjSobVTaqbFTZqLJRZaPKRpUN6gbtaO9j2CkDABOdxuEjgFwjAAAAAElFTkSuQmCC';
$none_sidebar='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAABkAQMAAABelVuzAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAGUExURdnZ2f///09ROQEAAAAnSURBVDjLY2AYBQz/McAfCsX+oJk/KjYqNio2KjYqRliMumXxCAMAJRImS6GDO+UAAAAASUVORK5CYII=';
$default_sidebar='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAABkAQMAAABelVuzAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAGUExURdnZ2f///09ROQEAAAEjSURBVDjL7dQxTgUhEAbgIVtgh62JCVfwBhzB61gYWfMuxlaWXmHeDaakIPAG2PcEwbzW+JxmyZdsZpn8swD/BWmo8Ncs6vpUjQU1mm8tgMln6k1ObCn23JnIZ0xnM9lKm+PZQjU7mF7NaDgx0qP5iZWrjraw1SnsFlUUCTTJpLxVKKrxdEDj0pr0YEE70ViSNLMnA3rbOsMXc0wfWKz2ZXtl+/xmQfM3U29xNDex7SeL0L8LbDQxbC1Wc52pYuvM2r5BbXn2yzXzupi8ZqRdMZ4V2Us2cDd5sdWiNb1x1vCNbXHpgGy6ZpIe2cSa3h3bQ80ugSl3W4FN1Iz73RxbLKbYbJnLl5m8TWz3Ce+sSmLfrbwiZBPlFB/CLfxzfoXdWJ0A0CNqg13OfIIAAAAASUVORK5CYII=';

$settings['default_sidebar_layout'] =
	array(
		array(
			'default'			=> 'default_sidebar_layout',
			'sanitize_callback' => 'fox009_wisdom_sanitize_select'
		),
		array(
			'choices'   => array(
								'right' => $right_sidebar,
								'left'  => $left_sidebar,
								'none'  => $none_sidebar
							),
			'label'		=> __( 'Default Sidebar Layout', 'fox009-wisdom'),
			'section'   => $section,
			'type'	  	=> 'image-radio',
		)
	);
$settings['sidebar_layout_home'] =
	array(
		array(
			'default'			=> 'sidebar_layout_home',
			'sanitize_callback' => 'fox009_wisdom_sanitize_select'
		),
		array(
			'choices'   => array(
								'default'  	=> $default_sidebar,
								'right' 	=> $right_sidebar,
								'left'  	=> $left_sidebar,
								'none'  	=> $none_sidebar
							),
			'label'		=> __( 'Sidebar Layout Of Home', 'fox009-wisdom'),
			'section'   => $section,
			'type'	  	=> 'image-radio',
		)
	);
	
$settings['sidebar_layout_archive'] =
	array(
		array(
			'default'			=> 'sidebar_layout_archive',
			'sanitize_callback' => 'fox009_wisdom_sanitize_select'
		),
		array(
			'choices'   => array(
								'default'  	=> $default_sidebar,
								'right' 	=> $right_sidebar,
								'left'  	=> $left_sidebar,
								'none'  	=> $none_sidebar
							),
			'label'		=> __( 'Sidebar Layout Of Archive', 'fox009-wisdom'),
			'section'   => $section,
			'type'	  	=> 'image-radio',
		)
	);
	
$settings['sidebar_layout_search'] =
	array(
		array(
			'default'			=> 'sidebar_layout_search',
			'sanitize_callback' => 'fox009_wisdom_sanitize_select'
		),
		array(
			'choices'   => array(
								'default'  	=> $default_sidebar,
								'right' 	=> $right_sidebar,
								'left'  	=> $left_sidebar,
								'none'  	=> $none_sidebar
							),
			'label'		=> __( 'Sidebar Layout Of Search Result', 'fox009-wisdom'),
			'section'   => $section,
			'type'	  	=> 'image-radio',
		)
	);

$settings['sidebar_layout_single'] =
	array(
		array(
			'default'			=> 'sidebar_layout_single',
			'sanitize_callback' => 'fox009_wisdom_sanitize_select'
		),
		array(
			'choices'   => array(
								'default'  	=> $default_sidebar,
								'right' 	=> $right_sidebar,
								'left'  	=> $left_sidebar,
								'none'  	=> $none_sidebar
							),
			'label'		=> __( 'Sidebar Layout Of Single Post', 'fox009-wisdom'),
			'section'   => $section,
			'type'	  	=> 'image-radio',
		)
	);

$settings['sidebar_layout_page'] =
	array(
		array(
			'default'			=> 'sidebar_layout_page',
			'sanitize_callback' => 'fox009_wisdom_sanitize_select'
		),
		array(
			'choices'   => array(
								'default'  	=> $default_sidebar,
								'right' 	=> $right_sidebar,
								'left'  	=> $left_sidebar,
								'none'  	=> $none_sidebar
							),
			'label'		=> __( 'Sidebar Layout Of Page', 'fox009-wisdom'),
			'section'   => $section,
			'type'	  	=> 'image-radio',
		)
	);
	
$settings['sidebar_layout_404'] =
	array(
		array(
			'default'			=> 'sidebar_layout_404',
			'sanitize_callback' => 'fox009_wisdom_sanitize_select'
		),
		array(
			'choices'   => array(
								'default'  	=> $default_sidebar,
								'right' 	=> $right_sidebar,
								'left'  	=> $left_sidebar,
								'none'  	=> $none_sidebar
							),
			'label'		=> __( 'Sidebar Layout Of 404', 'fox009-wisdom'),
			'section'   => $section,
			'type'	  	=> 'image-radio',
		)
	);

$settings['sidebar_layout_separator'] =
	array(
		array(
			'sanitize_callback' => '__return_false',
		),
		array(
			'section' 	=> $section,
			'type'	  	=> 'separator',
	   )
	);

$settings['sidebar_width'] =
	array(
		array(
			'transport'			=> 'postMessage',
			'default'           => 'sidebar_width',
			'sanitize_callback' => 'fox009_wisdom_sanitize_number',
		),
		array(
			'label'     => __( 'Max-Width (10-50%)', 'fox009-wisdom' ),
			'section'   => $section,
			'type'    	=> 'range',
			'input_attrs' => array(
							'min'  => 10,
							'max'  => 50,
							'step' => 1,
						),
		)
	);


$section = 'fox009_wisdom_section_general_breadcrumbs';

$settings['enable_breadcrumbs'] =
	array(
		array(
			'default'           => 'enable_breadcrumbs',
			'sanitize_callback' => 'fox009_wisdom_sanitize_select'
		),
		array(
			'label' => esc_html__('Enable Breadcrumbs', 'fox009-wisdom'),
			'section'   => $section,
			'type' => 'checkbox'
		)
	);

$settings['enable_breadcrumbs_separator'] =
	array(
		array(
			'sanitize_callback' => '__return_false',
		),
		array(
			'section' 	=> $section,
			'type'	  	=> 'separator',
	   )
	);

$settings['disable_breadcrumbs_home'] =
	array(
		array(
			'default'           => 'disable_breadcrumbs_home',
			'sanitize_callback' => 'absint'
		),
		array(
			'label' => esc_html__('Disable Breadcrumbs in Home', 'fox009-wisdom'),
			'section'   => $section,
			'type' => 'checkbox'
		)
	);

$settings['disable_breadcrumbs_archive'] =
	array(
		array(
			'default'           => 'disable_breadcrumbs_archive',
			'sanitize_callback' => 'absint'
		),
		array(
			'label' => esc_html__('Disable Breadcrumbs in Archive', 'fox009-wisdom'),
			'section'   => $section,
			'type' => 'checkbox'
		)
	);

$settings['disable_breadcrumbs_search'] =
	array(
		array(
			'default'           => 'disable_breadcrumbs_search',
			'sanitize_callback' => 'absint'
		),
		array(
			'label' => esc_html__('Disable Breadcrumbs in Search Results', 'fox009-wisdom'),
			'section'   => $section,
			'type' => 'checkbox'
		)
	);

$settings['disable_breadcrumbs_single'] =
	array(
		array(
			'default'           => 'disable_breadcrumbs_single',
			'sanitize_callback' => 'absint'
		),
		array(
			'label' => esc_html__('Disable Breadcrumbs in Single Post', 'fox009-wisdom'),
			'section'   => $section,
			'type' => 'checkbox'
		)
	);

$settings['disable_breadcrumbs_page'] =
	array(
		array(
			'default'           => 'disable_breadcrumbs_page',
			'sanitize_callback' => 'absint'
		),
		array(
			'label' => esc_html__('Disable Breadcrumbs in Page', 'fox009-wisdom'),
			'section'   => $section,
			'type' => 'checkbox'
		)
	);

$settings['disable_breadcrumbs_404'] =
	array(
		array(
			'default'           => 'disable_breadcrumbs_404',
			'sanitize_callback' => 'absint'
		),
		array(
			'label' => esc_html__('Disable Breadcrumbs in 404', 'fox009-wisdom'),
			'section'   => $section,
			'type' => 'checkbox'
		)
	);

$settings['disable_breadcrumbs_separator'] =
	array(
		array(
			'sanitize_callback' => '__return_false',
		),
		array(
			'section' 	=> $section,
			'type'	  	=> 'separator',
	   )
	);

$settings['breadcrumbs_separator'] =
	array(
		array(
			'default'           => 'breadcrumbs_separator',
			'sanitize_callback' => 'sanitize_text_field',
		),
		array(
			'label'           => __( 'Breadcrumbs Separator', 'fox009-wisdom' ),
			'section'         => $section,
			'type'            => 'text',
		)
	);

$section = 'fox009_wisdom_section_general_button';

$settings['button_color'] =
	array(
		array(
			'transport'			=> 'postMessage',
			'default'           => 'button_color',
			'sanitize_callback' => 'sanitize_hex_color',
		),
		array(
			'label'   => esc_html__( 'Text Color', 'fox009-wisdom' ),
			'section' => $section,
			'type'	  => 'color',
		)
	);

$settings['button_color_separator'] =
	array(
		array(
			'sanitize_callback' => '__return_false',
		),
		array(

			'section' 	=> $section,
			'type'	  	=> 'separator',
		)
	);

$settings['button_border_radius'] =
	array(
		array(
			'transport'			=> 'postMessage',
			'default'           => 'button_border_radius',
			'sanitize_callback' => 'fox009_wisdom_sanitize_number',
		),
		array(
			'label'         => __( 'Border Radius (px)', 'fox009-wisdom' ),
			'section'       => $section,
			'type'    		=> 'range',
			'input_attrs' 	=> array(
								'min'  => 0,
								'max'  => 30,
								'step' => 1,
							),
		)
	);	