<?php
/* Register widget areas.
 */
function story_hub_widgets_init() {
   
        register_sidebar( array(
        'name'          => __( 'Footer 1', 'story-hub' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'story-hub' ),
        'before_widget' => '<section id="%1$s" class="widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="footer-widget-title text--white">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'story-hub' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'story-hub' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s footer-big">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="footer-widget-title text--white ">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'story-hub' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'story-hub' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="footer-widget-title text--white">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'story_hub_widgets_init' );

if ( ! function_exists( 'story_hub_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function story_hub_setup() {
      add_theme_support( 'title-tag' );
      add_theme_support('automatic-feed-links');
      add_theme_support( 'woocommerce' );
      remove_theme_support( 'widgets-block-editor' );
      
      }
      
      // woocommerce images popup code
      add_theme_support( 'wc-product-gallery-zoom' );
      add_theme_support( 'wc-product-gallery-lightbox' );
      add_image_size( 'story-hub-thumbnail-3', 320, 240, true );
    
endif;
add_action( 'after_setup_theme', 'story_hub_setup' );

/**
 * Loads parent and child themes' style.css
 */
function story_hub_parent_enqueue_styles() {

	$parent_style = 'log-book';
  $theme = wp_get_theme();
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', array(), $theme->parent()->get('Version') );
 
}

add_action( 'wp_enqueue_scripts', 'story_hub_parent_enqueue_styles',10,25 );

function story_hub_theme_enqueue_styles() {

  $parent_style = 'log-book';
  
    wp_enqueue_style( 'story-hub',get_stylesheet_directory_uri() . '/style.css',
    array( $parent_style ),wp_get_theme()->get('Version') );
}

add_action( 'wp_enqueue_scripts', 'story_hub_theme_enqueue_styles',11,25 );


require get_stylesheet_directory() . '/widget/story-hub-author-widget.php';
/**
 * Load Dynamic css.
 */
require get_stylesheet_directory() . '/include/dynamic-css.php';


/* Hide sections from WordPress customizer */
function story_hub_hide_customizer_sections( $wp_customize ) {
    $wp_customize->remove_control('readmore_text');
    $wp_customize->remove_section('section_header');
    $wp_customize->remove_control('home_layout');

    
}
add_action( 'customize_register', 'story_hub_hide_customizer_sections', 30);

// remove default "Gallery" widget 
function story_hub_remove_gallery_widget() {
  unregister_widget('Log_Book_Author_Widget'); 
}

add_action('widgets_init', 'story_hub_remove_gallery_widget', 11);

function story_hub_customize_register( $wp_customize ) {
    global $my_theme_defaults;

    $wp_customize->add_setting(
        'log_book_primary_color',
        array( 
            'default' => '#098c1b',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );  
}

add_action( 'customize_register', 'story_hub_customize_register' );

function story_hub_remove_parent_theme_locations()
{
   
    unregister_nav_menu( 'footer-menu' );
}
add_action( 'after_setup_theme', 'story_hub_remove_parent_theme_locations', 20 );