<?php
$section = 'fox009_wisdom_section_about_theme';

$settings['about_theme'] = 
	array(
		array(
			'default' => '',
			'sanitize_callback' => '__return_true'
		),
		array(
			'section'   	=> $section,
			'label'     	=> __('About Fox009 Wisdom', 'fox009-wisdom'),
			'description'   => esc_html__('Fox009 Wisdom is a concise, neat and beautiful WordPress Theme for your blog site.', 'fox009-wisdom'),
			'type'			=> 'link',
			'heading'		=> 'h2',
			'parameters'	=> array(
								'href' => 'http://www.fox009.cn/fox009-wisdom/',
								'inner'=> esc_html__( 'Fox009 Wisdom', 'fox009-wisdom' )
								),
		)
	);

$settings['about_documentation'] =
	array(
		array(
			'default' => '',
			'sanitize_callback' => '__return_true'
		),
		array(
			'section'   	=> $section,
			'description'   => esc_html__('Read the document to use the theme better.', 'fox009-wisdom'),
			'label'     	=> __('Documentation', 'fox009-wisdom'),
			'type'			=> 'link',
			'heading'		=> 'h3',
			'parameters'	=> array(
								'href' => 'http://www.fox009.cn/forums/topic/fox009-wisdom/',
								'inner'=> esc_html__( 'Fox009 Wisdom Documentation', 'fox009-wisdom' )
								),
		)
	);

$settings['about_support'] =
	array(
		array(
			'default' => '',
			'sanitize_callback' => '__return_true'
		),
		array(
			'section'		=> $section,
			'description' 	=> esc_html__('If you need support, please contact us, we will be happy to assist!', 'fox009-wisdom'),
			'label'     	=> __('Support', 'fox009-wisdom'),
			'type'			=> 'link',
			'heading'		=> 'h3',
			'parameters'	=> array(
								'href' => 'http://www.fox009.cn/forums/forum/support/fox009-wisdom/',
								'inner'=> esc_html__( 'Fox009 Wisdom Support', 'fox009-wisdom' )
								),
		)
	);

$settings['about_rate'] =
	array(
		array(
			'default' => '',
			'sanitize_callback' => '__return_true'
		),
		array(
			'section'   => $section,
			'description' 	=> esc_html__('If you like Fox009 Wisdom, please rate the Theme. It is the best encouragement!',	'fox009-wisdom'),
			'label'     => __('Rate The Theme', 'fox009-wisdom'),
			'type'			=> 'link',
			'heading'		=> 'h3',
			'parameters'	=> array(
								'href' => 'https://wordpress.org/support/theme/fox009-wisdom/reviews/#new-post',
								'inner'=> esc_html__( 'Add Your Review', 'fox009-wisdom' )
								),
		)
	);	