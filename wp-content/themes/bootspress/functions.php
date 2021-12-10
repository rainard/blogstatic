<?php
/**
 * bootspress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bootspress
 */

// This theme requires WordPress 4.7 or later.
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! defined( 'BOOTSPRESS_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'BOOTSPRESS_VERSION', '0.9.2.1' );
}
if ( ! function_exists( 'bootspress_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bootspress_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bootspress, use a find and replace
		 * to change 'bootspress' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bootspress', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary menu', 'bootspress' ),
				'footer' => esc_html__( 'Footer menu', 'bootspress' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
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

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'bootspress_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 50,
				'width'       => 150,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);
		
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
		
		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
		
		// Add starter content to customize and set up the theme on fresh sites.
		if ( is_customize_preview() ) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support( 'starter-content', bootspress_get_starter_content() );
		}
	}
endif;
add_action( 'after_setup_theme', 'bootspress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bootspress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bootspress_content_width', 640 );
}
add_action( 'after_setup_theme', 'bootspress_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bootspress_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bootspress' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bootspress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	
	// Header After
	register_sidebar(
		array(
			'name'          => esc_html__( 'Header After', 'bootspress' ),
			'id'            => 'header-after',
			'description'   => esc_html__( 'Add widgets here.', 'bootspress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	
	// Footer
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Footer', 'bootspress' ),
			'id' 			=> 'footer',
			'description' 	=> esc_html__( 'Add widgets here.', 'bootspress' ),
			'before_widget' => '<div class="widget-container"><section id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</section></div>',
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
		)
	);
	
	// Colophon
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Colophon', 'bootspress' ),
			'id' 			=> 'colophon',
			'description' 	=> esc_html__( 'Add widgets here.', 'bootspress' ),
			'before_widget' => '<div class="widget-container"><section id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</section></div>',
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
		)
	);
}
add_action( 'widgets_init', 'bootspress_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bootspress_scripts() {
	// Load Bootstrap css before style.css.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), '5.1.3', 'all' );
	
	wp_enqueue_style( 'bootspress-style', get_stylesheet_uri(), array(), BOOTSPRESS_VERSION );
	wp_style_add_data( 'bootspress-style', 'rtl', 'replace' );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Load Bootstrap js script before </body>.
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array(), '5.1.3', true );
}
add_action( 'wp_enqueue_scripts', 'bootspress_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function bootspress_skip_link_focus_fix() {

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	}

	// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'bootspress_skip_link_focus_fix' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Register Custom Navigation Walker.
 *
 * @link https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 */
function bootspress_register_navwalker(){
	require_once( get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php' );
}
add_action( 'after_setup_theme', 'bootspress_register_navwalker' );

/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function bootspress_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'bootspress_bs5_dropdown_data_attribute', 20, 3 );
