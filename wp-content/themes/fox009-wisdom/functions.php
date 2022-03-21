<?php
/**
 * Fox009 Wisdom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fox009_wisdom
 */
$fox009_wisdom_theme_data = wp_get_theme();
if ( ! defined( 'THEME_VERSION' ) ) {
	define( 'THEME_VERSION', $fox009_wisdom_theme_data->get( 'Version' ) );
}

if ( ! function_exists( 'fox009_wisdom_setup' ) ) :

	function fox009_wisdom_setup() {

		load_theme_textdomain( 'fox009-wisdom', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size(320, 180, true);

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'fox009-wisdom' ),
				'social' 	=> esc_html__( 'Social', 'fox009-wisdom' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 60,
				'width'       => 180,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_editor_style( './assets/css/style-editor.css' );
		
		
		add_theme_support(
			'custom-background',
			apply_filters(
				'fox009_wisdom_custom_background_args',
				array(
					'default-color' => 'f7f7f7',
					'default-image' => '',
				)
			)
		);


	}
endif;
add_action( 'after_setup_theme', 'fox009_wisdom_setup' );

function fox009_wisdom_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fox009_wisdom_content_width', 800 );
}
add_action( 'after_setup_theme', 'fox009_wisdom_content_width', 0 );

function fox009_wisdom_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'fox009-wisdom' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fox009-wisdom' ),
			'before_widget' => '<section id="%1$s" class="widget shadow %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fox009_wisdom_widgets_init' );

function fox009_wisdom_scripts() {
	wp_enqueue_style( 'fox009-amber-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '4.7.0' );
	
	wp_enqueue_style( 'fox009-wisdom-font-tangerine', '//fonts.googleapis.com/css?family=Tangerine', array(), THEME_VERSION);	
	
	wp_enqueue_style( 'fox009-wisdom-style', get_stylesheet_uri(), array(), THEME_VERSION );
		
	wp_enqueue_style( 'fox009-wisdom-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), THEME_VERSION );
	

	wp_enqueue_script( 'fox009-wisdom-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), THEME_VERSION, true );
	
	wp_enqueue_script( 'fox009-wisdom-skip-link', get_template_directory_uri() . '/assets/js/skip.js', array('jquery'), THEME_VERSION, true );
	
	wp_enqueue_script( 'fox009-wisdom-post-toggle', get_template_directory_uri() . '/assets/js/post-toggle.js', array('jquery'), THEME_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fox009_wisdom_scripts' );

require get_template_directory() . '/inc/custom-css.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/breadcrumbs.php';

require get_template_directory() . '/inc/block-patterns.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

