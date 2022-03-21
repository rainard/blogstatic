<?php
$section = 'fox009_wisdom_section_footer_bottom';

$settings['custom_copyright_text'] =
	array(
		array(
			'transport' 		=> 'postMessage',
			'default'           => 'custom_copyright_text',
			'sanitize_callback' => 'wp_kses_post'
		),
		array(
			'label'     => __( 'Custom Copyright Text', 'fox009-wisdom' ),
			'section'   => $section,
			'type'      => 'textarea',
		)
	);
