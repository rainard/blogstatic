<?php
/**
 * Panels.
 *
 * @package Fox009_wisdom
 * @since   1.0.0
 */
$wp_customize->add_panel(
	'fox009_wisdom_panel_general', 
	array(
		'priority'       => 50,
		'title'          => esc_html__( 'General', 'fox009-wisdom' ),
	)
);

$wp_customize->add_panel(
	'fox009_wisdom_panel_header', 
	array(
		'priority'       => 50,
		'title'          => esc_html__( 'Header', 'fox009-wisdom' ),
	)
);

$wp_customize->add_panel(
	'fox009_wisdom_panel_content', 
	array(
		'priority'       => 50,
		'title'          => esc_html__( 'Content', 'fox009-wisdom' ),
	)
);