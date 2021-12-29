<?php
/**
 * Theme functions and definitions
 *
 * @package Mag Dark
 */
if ( ! function_exists( 'magdark_enqueue_styles' ) ) :
	/**
	 * @since 0.1
	 */
	function magdark_enqueue_styles() {
		wp_enqueue_style( 'newsup-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'magdark-style', get_stylesheet_directory_uri() . '/style.css', array( 'newsup-style-parent' ), '1.0' );
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_dequeue_style( 'newsup-default',get_template_directory_uri() .'/css/colors/default.css');
		wp_enqueue_style( 'magdark-default-css', get_stylesheet_directory_uri()."/css/colors/default.css" );
		if(is_rtl()){
		wp_enqueue_style( 'newsup_style_rtl', trailingslashit( get_template_directory_uri() ) . 'style-rtl.css' );
	    }
		
	}

endif;
add_action( 'wp_enqueue_scripts', 'magdark_enqueue_styles', 9999 );

function magdark_theme_setup() {

//Load text domain for translation-ready
load_theme_textdomain('mag-dark', get_stylesheet_directory() . '/languages');

require( get_stylesheet_directory() . '/hooks/hooks.php' );
require( get_stylesheet_directory() . '/hooks/hook-header-section.php' );
require( get_stylesheet_directory() . '/customizer-default.php' );
require( get_stylesheet_directory() . '/frontpage-options.php' );
require( get_stylesheet_directory() . '/inc/ansar/font/font.php' );


// custom header Support
			$args = array(
			'default-image'		=>  get_stylesheet_directory_uri() .'/images/head-back.jpg',
			'width'			=> '1600',
			'height'		=> '600',
			'flex-height'		=> false,
			'flex-width'		=> false,
			'header-text'		=> true,
			'default-text-color'	=> '#143745'
		);
		add_theme_support( 'custom-header', $args );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
		'top_right' => __( 'Top Header menu', 'mag-dark' ),
		) );
} 
add_action( 'after_setup_theme', 'magdark_theme_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function magdark_widgets_init() {
	

	register_sidebar( array(
		'name'          => esc_html__( 'Front-Page Left Sidebar Section', 'mag-dark'),
		'id'            => 'front-left-page-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="mg-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="mg-wid-title"><h6>',
		'after_title'   => '</h6></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front-Page Right Sidebar Section', 'mag-dark'),
		'id'            => 'front-right-page-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="mg-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="mg-wid-title"><h6>',
		'after_title'   => '</h6></div>',
	) );

}
add_action( 'widgets_init', 'magdark_widgets_init' );


function magdark_remove_some_widgets(){
// Unregister Frontpage sidebar
unregister_sidebar( 'front-page-sidebar' );
}
add_action( 'widgets_init', 'magdark_remove_some_widgets', 11 );

function magdark_menu(){ ?>
<script>
jQuery('a,input').bind('focus', function() {
    if(!jQuery(this).closest(".menu-item").length && ( jQuery(window).width() <= 992) ) {
    jQuery('.navbar-collapse').removeClass('show');
}})
</script>
<?php }
add_action( 'wp_footer', 'magdark_menu' );