<?php
/**
 * Fox009 Wisdom Theme Customizer
 *
 * @package Fox009_wisdom
 */
require get_template_directory() . '/inc/customizer/class-customize-control.php';
require get_template_directory() . '/inc/customizer/sanitize.php';

function fox009_wisdom_customize_register( $wp_customize ) {
	
    require get_template_directory() . '/inc/customizer/panel.php';
    require get_template_directory() . '/inc/customizer/section.php';
	
	$settings = array();
    require get_template_directory() . '/inc/customizer/setting/general.php';
    require get_template_directory() . '/inc/customizer/setting/header.php';
	require get_template_directory() . '/inc/customizer/setting/content.php';
    require get_template_directory() . '/inc/customizer/setting/footer.php';
    require get_template_directory() . '/inc/customizer/setting/about.php';
	
	$defaults = fox009_wisdom_default_theme_options();
	foreach($settings as $id => $args){
		if(array_key_exists('default', $args[0]) 
			&& $args[0]['default'] != ''
			&& array_key_exists($args[0]['default'], $defaults)){
			$args[0]['default'] = $defaults[$args[0]['default']];
		}else{
			$args[0]['default'] = '';
		}
			
		if(!array_key_exists('transport', $args[0])){
			$args[0]['transport'] = 'refresh';
		}
		
		$id = 'fox009_wisdom_' . $id;
		$wp_customize->add_setting(
			$id, 
			array(
				'transport'			=> $args[0]['transport'],
				'default'           => $args[0]['default'],
				'sanitize_callback' => $args[0]['sanitize_callback'],
			)
		);
		switch($args[1]['type'])
		{
			case 'color':
				$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $id, $args[1]));
				break;
			default:
				$wp_customize->add_control(new Fox009_Wisdom_Customize_Control($wp_customize, $id, $args[1]));
				break;
		}
		
	}
}
add_action( 'customize_register', 'fox009_wisdom_customize_register' );

function fox009_wisdom_customize_controls_enqueue_scripts() {
	wp_enqueue_style( 'fox009-wisdom-customizer-style', get_template_directory_uri() .'/assets/css/customizer.css', array(), THEME_VERSION, 'all' ); 
	wp_enqueue_script( 'fox009-wisdom-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls.js', array('jquery', 'customize-base', 'jquery-ui-core', 'jquery-ui-sortable'), THEME_VERSION, 'all' );
}
add_action( 'customize_controls_enqueue_scripts', 'fox009_wisdom_customize_controls_enqueue_scripts' );

function fox009_wisdom_customize_preview_init() {
	wp_enqueue_script( 'fox009-wisdom-customizer-preview', get_template_directory_uri() . '/assets/js/customize-preview.js', array('customize-preview'), THEME_VERSION, 'all' );
}
add_action( 'customize_preview_init', 'fox009_wisdom_customize_preview_init' );