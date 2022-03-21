<?php
$section = 'fox009_wisdom_section_content_archive';

$settings['thumbnail_position'] =
	array(
		array(
			'default'           => 'thumbnail_position',
			'sanitize_callback' => 'fox009_wisdom_sanitize_select'
		),
		array(
			'label'     => __( 'Thumbnail Position', 'fox009-wisdom' ),
			'section'   => $section,
			'choices' => array(
						'left'  => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAABkAgMAAAAZNSFjAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAJUExURQC2/9nZ2f///+v6/B4AAABmSURBVEjHY1hFDFjAMKqMtsqWhhICYaPKBouyYZDeFjCgAq2lWH06OJQR6YXBrGw0eEeDdzR4R4MXt0/DVkL8OMiUDYPgHUTKhklLdRUo1URNBZNgPgysRGlKjSobaGWj/SwaKgMAzIyjh3Eyv/EAAAAASUVORK5CYII=',
						'right' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAABkAgMAAAAZNSFjAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAJUExURQC2/9nZ2f///+v6/B4AAABhSURBVEjHY1hFDFjAMKqMtsqWhhICYaPKBouy4ZjewlYxoAKmAVOGBQw1ZaPBOxq8o8E7Gry4fRq1FOLHQaZsGATvEFM2FFsOq8CJaSo8ScHlV6I0pUaVDbSy0X4WDZUBAEKFncmnudgXAAAAAElFTkSuQmCC',
						'none'  => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAABkAQMAAABelVuzAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAGUExURdnZ2f///09ROQEAAABDSURBVDjLY/iPAf4wDEWxPwxogHH4iA3F8Bt186ibB9zNzGCSkRpiw6WcpH448zMwWDAw2DDwgwQeQOJ8eIgNwfgAAIVf87l23fFDAAAAAElFTkSuQmCC'       
						),
			'type'      => 'image-radio',
		)
	);


$settings['archive_excerpt_length'] =
	array(
		array(
			'default'           => 'archive_excerpt_length',
			'sanitize_callback' => 'absint',
		),
		array(
			'label'      => esc_html__('Enter Excerpt Length ','fox009-wisdom'),
			'section'    => $section,
			'type'      => 'range',
			'input_attrs' 	=> array(
								'min'  => 0,
								'max'  => 500,
								'step' => 1,
							),
		)
	);
	
$settings['archive_excerpt_lines'] =
	array(
		array(
			'transport' 		=> 'postMessage',
			'default'           => 'archive_excerpt_lines',
			'sanitize_callback' => 'absint',
		),
		array(
			'label'      => esc_html__('Enter Excerpt Max-Lines ','fox009-wisdom'),
			'section'    => $section,
			'type'      => 'range',
			'input_attrs' 	=> array(
								'min'  => 1,
								'max'  => 10,
								'step' => 1,
							),
		)
	);
	
$settings['archive_read_more'] =
	array(
		array(
			'transport' 		=> 'postMessage',
			'default'           => 'archive_read_more',
			'sanitize_callback' => 'sanitize_text_field'
		), 
		array(
			'label'     => __( 'Read More Text', 'fox009-wisdom' ),
			'section'   => $section,
			'type'      => 'text',
		)
	);

$settings['archive_read_more_separator'] =
	array(
		array(
			'sanitize_callback' => '__return_false',
		),
		array(
			'section' 	=> $section,
			'type'	  	=> 'separator',
	   )
	);

$settings['archive_post_meta'] =
	array(
		array(
			'default'           => 'archive_post_meta',
			'sanitize_callback' => 'fox009_wisdom_sanitize_sortable'
		),
		array(
			'label'     => __( 'Post Meta', 'fox009-wisdom' ),
			'section'   => $section,
			'choices' 	=> array(
								'auther'  		=> __('Auther','fox009-wisdom'),
								'categories' 	=> __('Categories','fox009-wisdom'), 
								'date'  		=> __('Date','fox009-wisdom'),
								'comments' 		=> __('Comments','fox009-wisdom'),      
							),
			'type'      => 'sortable',
		)
	);
	
$section = 'fox009_wisdom_section_content_single';

$settings['single_featured_image'] =
	array(
		array(
			'default'           => 'single_featured_image',
			'sanitize_callback' => 'absint'
		),
		array(
			'label'     => __( 'Show Featured Image', 'fox009-wisdom'),
			'section'   => $section,
			'type' 		=> 'checkbox',
		)
	);

$settings['single_post_tags'] =
	array(
		array(
			'default'           => 'single_post_tags',
			'sanitize_callback' => 'absint'
		),
		array(
			'label'     => __( 'Display Post Tags', 'fox009-wisdom'),
			'section'   => $section,
			'type' 		=> 'checkbox'
		)
	);
	
$settings['single_post_tags_separator'] =
	array(
		array(
			'sanitize_callback' => '__return_false',
		),
		array(
			'section' 	=> $section,
			'type'	  	=> 'separator',
	   )
	);
	
$settings['single_post_meta'] =
	array(
		array(
			'default'           => 'single_post_meta',
			'sanitize_callback' => 'fox009_wisdom_sanitize_sortable'
		),
		array(
			'label'     => __( 'Post Meta', 'fox009-wisdom' ),
			'section'   => $section,
			'choices' 	=> array(
								'auther'  		=> __('Auther','fox009-wisdom'),
								'categories' 	=> __('Categories','fox009-wisdom'), 
								'date'  		=> __('Date','fox009-wisdom'),
								'comments' 		=> __('Comments','fox009-wisdom'),      
							),
			'type'      => 'sortable',
		)
	);