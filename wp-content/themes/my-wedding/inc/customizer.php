<?php
/**
 * My Wedding: Customizer
 *
 * @subpackage My Wedding
 * @since 1.0
 */

use WPTRT\Customize\Section\My_Wedding_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( My_Wedding_Button::class );

	$manager->add_section(
		new My_Wedding_Button( $manager, 'my_wedding_pro', [
			'title'      => __( 'My Wedding Pro', 'my-wedding' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'my-wedding' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/wordpress-wedding-theme/', 'my-wedding')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'my-wedding-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'my-wedding-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function my_wedding_customize_register( $wp_customize ) {

	$wp_customize->add_setting('my_wedding_logo_margin',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('my_wedding_logo_margin',array(
		'label' => __('Logo Margin','my-wedding'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('my_wedding_logo_top_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'my_wedding_sanitize_float'
	));
	$wp_customize->add_control('my_wedding_logo_top_margin',array(
		'type' => 'number',
		'description' => __('Top','my-wedding'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('my_wedding_logo_bottom_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'my_wedding_sanitize_float'
	));
	$wp_customize->add_control('my_wedding_logo_bottom_margin',array(
		'type' => 'number',
		'description' => __('Bottom','my-wedding'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('my_wedding_logo_left_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'my_wedding_sanitize_float'
	));
	$wp_customize->add_control('my_wedding_logo_left_margin',array(
		'type' => 'number',
		'description' => __('Left','my-wedding'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('my_wedding_logo_right_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'my_wedding_sanitize_float'
 	));
 	$wp_customize->add_control('my_wedding_logo_right_margin',array(
		'type' => 'number',
		'description' => __('Right','my-wedding'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('my_wedding_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'my_wedding_sanitize_checkbox'
	));
	$wp_customize->add_control('my_wedding_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','my-wedding'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('my_wedding_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'my_wedding_sanitize_checkbox'
	));
	$wp_customize->add_control('my_wedding_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','my-wedding'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_panel( 'my_wedding_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'my-wedding' ),
		'description' => __( 'Description of what this panel does.', 'my-wedding' ),
	) );

	$wp_customize->add_section( 'my_wedding_theme_options_section', array(
    	'title'      => __( 'General Settings', 'my-wedding' ),
		'priority'   => 30,
		'panel' => 'my_wedding_panel_id'
	) );

	$wp_customize->add_setting('my_wedding_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'my_wedding_sanitize_choices'
	));
	$wp_customize->add_control('my_wedding_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','my-wedding'),
		'section' => 'my_wedding_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','my-wedding'),
		   'Right Sidebar' => __('Right Sidebar','my-wedding'),
		   'One Column' => __('One Column','my-wedding'),
		   'Three Columns' => __('Three Columns','my-wedding'),
		   'Four Columns' => __('Four Columns','my-wedding'),
		   'Grid Layout' => __('Grid Layout','my-wedding')
		),
	));

	$wp_customize->add_setting('my_wedding_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'my_wedding_sanitize_choices'
	));
	$wp_customize->add_control('my_wedding_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','my-wedding'),
        'section' => 'my_wedding_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','my-wedding'),
            'Right Sidebar' => __('Right Sidebar','my-wedding'),
            'One Column' => __('One Column','my-wedding')
        ),
	));

	$wp_customize->add_setting('my_wedding_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'my_wedding_sanitize_choices'
	));
	$wp_customize->add_control('my_wedding_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','my-wedding'),
        'section' => 'my_wedding_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','my-wedding'),
            'Right Sidebar' => __('Right Sidebar','my-wedding'),
            'One Column' => __('One Column','my-wedding')
        ),
	));

	$wp_customize->add_setting('my_wedding_archive_page_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'my_wedding_sanitize_choices'
	));
	$wp_customize->add_control('my_wedding_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','my-wedding'),
        'section' => 'my_wedding_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','my-wedding'),
            'Right Sidebar' => __('Right Sidebar','my-wedding'),
            'One Column' => __('One Column','my-wedding'),
		   'Three Columns' => __('Three Columns','my-wedding'),
		   'Four Columns' => __('Four Columns','my-wedding'),
            'Grid Layout' => __('Grid Layout','my-wedding')
        ),
	));

	//home page slider
	$wp_customize->add_section( 'my_wedding_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'my-wedding' ),
		'priority' => null,
		'panel' => 'my_wedding_panel_id'
	) );

	$wp_customize->add_setting('my_wedding_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'my_wedding_sanitize_checkbox'
	));
	$wp_customize->add_control('my_wedding_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','my-wedding'),
	   	'section' => 'my_wedding_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'my_wedding_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'my_wedding_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'my_wedding_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'my-wedding' ),
			'description' => __('Image Size (1600px x 600px)', 'my-wedding' ),
			'section' => 'my_wedding_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	$wp_customize->add_setting('my_wedding_slider_date',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('my_wedding_slider_date',array(
	   	'type' => 'text',
	   	'label' => __('Date','my-wedding'),
	   	'section' => 'my_wedding_slider_section',
	));

	$wp_customize->add_setting('my_wedding_slider_time',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('my_wedding_slider_time',array(
	   	'type' => 'text',
	   	'label' => __('Time','my-wedding'),
	   	'section' => 'my_wedding_slider_section',
	));

	//Service Section
	$wp_customize->add_section('my_wedding_about_section',array(
		'title'	=> __('About Section','my-wedding'),
		'description'=> __('This section will appear below the slider.','my-wedding'),
		'panel' => 'my_wedding_panel_id',
	));

	$args =  array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$psts[]='Select';  
	foreach($post_list as $post){
		$psts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('my_wedding_groom_post',array(
		'sanitize_callback' => 'my_wedding_sanitize_choices',
	));
	$wp_customize->add_control('my_wedding_groom_post',array(
		'type'    => 'select',
		'choices' => $psts,
		'label' => __('Select post','my-wedding'),
		'section' => 'my_wedding_about_section',
	));

	$wp_customize->add_setting( 'my_wedding_bride_groom_image', array(
	   'default' => '',
	   'sanitize_callback' => 'esc_url_raw'
  	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'my_wedding_bride_groom_image', array(
  		'label' => __('Bride & Groom Photo','my-wedding'),
	   'section' => 'my_wedding_about_section',
  	)));

	$wp_customize->add_setting('my_wedding_bride_post',array(
		'sanitize_callback' => 'my_wedding_sanitize_choices',
	));
	$wp_customize->add_control('my_wedding_bride_post',array(
		'type'    => 'select',
		'choices' => $psts,
		'label' => __('Select post','my-wedding'),
		'section' => 'my_wedding_about_section',
	));

	//Footer
    $wp_customize->add_section( 'my_wedding_footer', array(
    	'title'  => __( 'Footer Text', 'my-wedding' ),
		'priority' => null,
		'panel' => 'my_wedding_panel_id'
	) );

	$wp_customize->add_setting('my_wedding_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'my_wedding_sanitize_checkbox'
    ));
    $wp_customize->add_control('my_wedding_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','my-wedding'),
       'section' => 'my_wedding_footer'
    ));

    $wp_customize->add_setting('my_wedding_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('my_wedding_footer_copy',array(
		'label'	=> __('Footer Text','my-wedding'),
		'section' => 'my_wedding_footer',
		'setting' => 'my_wedding_footer_copy',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'my_wedding_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'my_wedding_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'my_wedding_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'my_wedding_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'my-wedding' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'my-wedding' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'my_wedding_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'my_wedding_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'my_wedding_customize_register' );

function my_wedding_customize_partial_blogname() {
	bloginfo( 'name' );
}

function my_wedding_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function my_wedding_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function my_wedding_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}