<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Overwrite parent theme background defaults and registers support for WordPress features.
add_action( 'after_setup_theme', 'lalita_background_setup' );
function lalita_background_setup() {
	add_theme_support( "custom-background",
		array(
			'default-color' 		 => '111111',
			'default-image'          => '',
			'default-repeat'         => 'repeat',
			'default-position-x'     => 'left',
			'default-position-y'     => 'top',
			'default-size'           => 'auto',
			'default-attachment'     => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		)
	);
}

// Overwrite theme URL
function lalita_theme_uri_link() {
	return 'https://wpkoi.com/adarsa-wpkoi-wordpress-theme/';
}

// Overwrite parent theme's blog header function
add_action( 'lalita_after_header', 'lalita_blog_header_image', 11 );
function lalita_blog_header_image() {

	if ( ( is_front_page() && is_home() ) || ( is_home() ) ) { 
		$blog_header_image 			=  lalita_get_setting( 'blog_header_image' ); 
		$blog_header_title 			=  lalita_get_setting( 'blog_header_title' ); 
		$blog_header_text 			=  lalita_get_setting( 'blog_header_text' ); 
		$blog_header_button_text 	=  lalita_get_setting( 'blog_header_button_text' ); 
		$blog_header_button_url 	=  lalita_get_setting( 'blog_header_button_url' ); 
		if ( $blog_header_image != '' ) { ?>
		<div class="page-header-image grid-parent page-header-blog" style="background-image: url('<?php echo esc_url($blog_header_image); ?>') !important;">
        	<div class="page-header-noiseoverlay"></div>
        	<div class="page-header-blog-inner">
                <div class="page-header-blog-content-h grid-container">
                    <div class="page-header-blog-content">
                    <?php if ( $blog_header_title != '' ) { ?>
                        <div class="page-header-blog-text">
                            <?php if ( $blog_header_title != '' ) { ?>
                            <h2><?php echo wp_kses_post( $blog_header_title ); ?></h2>
                            <div class="clearfix"></div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="page-header-blog-content page-header-blog-content-b">
                	<?php if ( $blog_header_text != '' ) { ?>
                	<div class="page-header-blog-text">
						<?php if ( $blog_header_title != '' ) { ?>
                        <p><?php echo wp_kses_post( $blog_header_text ); ?></p>
                        <div class="clearfix"></div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <div class="page-header-blog-button">
                        <?php if ( $blog_header_button_text != '' ) { ?>
                        <a class="read-more button" href="<?php echo esc_url( $blog_header_button_url ); ?>"><?php echo esc_html( $blog_header_button_text ); ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
		</div>
		<?php
		}
	}
}

// Extra cutomizer functions
if ( ! function_exists( 'adarsa_customize_register' ) ) {
	add_action( 'customize_register', 'adarsa_customize_register' );
	function adarsa_customize_register( $wp_customize ) {
				
		// Add Adarsa customizer section
		$wp_customize->add_section(
			'adarsa_layout_effects',
			array(
				'title' => __( 'Adarsa Effects', 'adarsa' ),
				'priority' => 24,
			)
		);
		
		
		// BG dots
		$wp_customize->add_setting(
			'adarsa_settings[bg_dots]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'adarsa_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'adarsa_settings[bg_dots]',
			array(
				'type' => 'select',
				'label' => __( 'BG dots', 'adarsa' ),
				'choices' => array(
					'enable' => __( 'Enable', 'adarsa' ),
					'disable' => __( 'Disable', 'adarsa' )
				),
				'settings' => 'adarsa_settings[bg_dots]',
				'section' => 'adarsa_layout_effects',
				'priority' => 1
			)
		);
		
		
		// Magic cursor
		$wp_customize->add_setting(
			'adarsa_settings[magic_cursor]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'adarsa_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'adarsa_settings[magic_cursor]',
			array(
				'type' => 'select',
				'label' => __( 'Magic cursor', 'adarsa' ),
				'choices' => array(
					'enable' => __( 'Enable', 'adarsa' ),
					'disable' => __( 'Disable', 'adarsa' )
				),
				'settings' => 'adarsa_settings[magic_cursor]',
				'section' => 'adarsa_layout_effects',
				'priority' => 2
			)
		);
		
		// Blog post background
		$wp_customize->add_setting(
			'adarsa_settings[blog_bg]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'adarsa_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'adarsa_settings[blog_bg]',
			array(
				'type' => 'select',
				'label' => __( 'Blog post background', 'adarsa' ),
				'choices' => array(
					'enable' => __( 'Enable', 'adarsa' ),
					'disable' => __( 'Disable', 'adarsa' )
				),
				'settings' => 'adarsa_settings[blog_bg]',
				'section' => 'adarsa_layout_effects',
				'priority' => 3
			)
		);
		
		// Add navigation extra button text
		$wp_customize->add_setting(
			'adarsa_settings[nav_btn_text]',
			array(
				'default' => '',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'adarsa_settings[nav_btn_text]',
			array(
				'type' => 'text',
				'label' => __( 'Extra button text', 'adarsa' ),
				'section' => 'adarsa_layout_effects',
				'settings' => 'adarsa_settings[nav_btn_text]',
				'priority' => 25
			)
		);
		
		// Add navigation extra button url
		$wp_customize->add_setting(
			'adarsa_settings[nav_btn_url]',
			array(
				'default' => '',
				'type' => 'option',
				'sanitize_callback' => 'esc_url'
			)
		);

		$wp_customize->add_control(
			'adarsa_settings[nav_btn_url]',
			array(
				'type' => 'text',
				'label' => __( 'Extra button URL', 'adarsa' ),
				'section' => 'adarsa_layout_effects',
				'settings' => 'adarsa_settings[nav_btn_url]',
				'priority' => 25
			)
		);
		
	}
}

//Sanitize choices.
if ( ! function_exists( 'adarsa_sanitize_choices' ) ) {
	function adarsa_sanitize_choices( $input, $setting ) {
		// Ensure input is a slug
		$input = sanitize_key( $input );

		// Get list of choices from the control
		// associated with the setting
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it;
		// otherwise, return the default
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}


// Adarsa extra colors
if ( ! function_exists( 'adarsa_extra_colors_css' ) ) {
	function adarsa_extra_colors_css() {
		// Get our settings
		$lalita_settings = wp_parse_args(
			get_option( 'lalita_settings', array() ),
			lalita_get_color_defaults()
		);
		
		$bg_color = get_background_color();
		
		$adarsa_extracolors = 'header .main-navigation .main-nav ul li a.wpkoi-nav-btn {background-color: ' . esc_attr( $lalita_settings[ 'navigation_text_color' ] ) . '; color: ' . esc_attr( $lalita_settings[ 'navigation_background_color' ] ) . ';} header .main-navigation .main-nav ul li a.wpkoi-nav-btn:hover {background-color: ' . esc_attr( $lalita_settings[ 'navigation_text_hover_color' ] ) . '; color: ' . esc_attr( $lalita_settings[ 'navigation_background_color' ] ) . ';}.transparent-header.home .main-navigation.is_stuck {background-color: #' . esc_attr( $bg_color ) . ';}';

		return $adarsa_extracolors;
	}
}


// The dynamic styles of the parent theme added inline to the parent stylesheet.
// For the customizer functions it is better to enqueue after the child theme stylesheet.
if ( ! function_exists( 'adarsa_remove_parent_dynamic_css' ) ) {
	add_action( 'init', 'adarsa_remove_parent_dynamic_css' );
	function adarsa_remove_parent_dynamic_css() {
		remove_action( 'wp_enqueue_scripts', 'lalita_enqueue_dynamic_css', 50 );
	}
}

// Enqueue this CSS after the child stylesheet, not after the parent stylesheet.
if ( ! function_exists( 'adarsa_enqueue_parent_dynamic_css' ) ) {
	add_action( 'wp_enqueue_scripts', 'adarsa_enqueue_parent_dynamic_css', 50 );
	function adarsa_enqueue_parent_dynamic_css() {
		$css = lalita_base_css() . lalita_font_css() . lalita_advanced_css() . lalita_spacing_css() . lalita_no_cache_dynamic_css() .adarsa_extra_colors_css();

		// escaped secure before in parent theme
		wp_add_inline_style( 'lalita-child', $css );
	}
}

//Adds custom classes to the array of body classes.
if ( ! function_exists( 'adarsa_body_classes' ) ) {
	add_filter( 'body_class', 'adarsa_body_classes' );
	function adarsa_body_classes( $classes ) {
		// Get Customizer settings
		$adarsa_settings = get_option( 'adarsa_settings' );
		
		$bg_dots 	    = 'enable';
		$blog_bg		= 'enable';
		
		if ( isset( $adarsa_settings['bg_dots'] ) ) {
			$bg_dots = $adarsa_settings['bg_dots'];
		}
		
		if ( isset( $adarsa_settings['blog_bg'] ) ) {
			$blog_bg = $adarsa_settings['blog_bg'];
		}
		
		// BG dots
		if ( $bg_dots != 'disable' ) {
			$classes[] = 'adarsa-bg-dots';
		}
		
		// Blog post background
		if ( $blog_bg != 'disable' ) {
			$classes[] = 'adarsa-blog-bg';
		}
		
		return $classes;
	}
}

// Add buton to main menu
if ( ! function_exists( 'adarsa_navigation_button' ) ) {
	add_filter( 'wp_nav_menu_items', 'adarsa_navigation_button', 11, 2 );
	/**
	 * Add the extra button to the navigation.
	 *
	 */
	function adarsa_navigation_button( $nav, $args ) {
		// Get Customizer settings
		$adarsa_settings = get_option( 'adarsa_settings' );
		
		// If our primary menu is set, add the extra button.
		if ( ( isset( $adarsa_settings['nav_btn_url'] ) ) && ( isset( $adarsa_settings['nav_btn_text'] ) ) && ( isset( $args->theme_location ) ) ) {
			if ( ( $args->theme_location == 'primary' ) && ( $adarsa_settings['nav_btn_url'] != '' ) ) {
				return $nav . '<li class="wpkoi-nav-btn-h"><div class="nav-btn-border"><a class="wpkoi-nav-btn button" href="' . esc_url( $adarsa_settings['nav_btn_url'] ) . '">' . esc_html( $adarsa_settings['nav_btn_text'] ) . '</a></div></li>';
			}
		}
		
	    return $nav;
	}
}

// Magic mouse
if ( ! function_exists( 'adarsa_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'adarsa_scripts' );
	/**
	 * Enqueue scripts and styles
	 */
	function adarsa_scripts() {

		$dir_uri = get_stylesheet_directory_uri();
		// Get Customizer settings
		$adarsa_settings = get_option( 'adarsa_settings' );
		$magic_cursor  = 'enable';
		if ( isset( $adarsa_settings['magic_cursor'] ) ) {
			$magic_cursor = $adarsa_settings['magic_cursor'];
		}
		
		if ( $magic_cursor != 'disable' ) {
			wp_enqueue_style( 'adarsa-magic-mouse', esc_url( $dir_uri ) . "/css/magic-mouse.min.css", false, LALITA_VERSION, 'all' );
			wp_enqueue_script( 'adarsa-magic-mouse', esc_url( $dir_uri ) . "/js/magic-mouse.min.js", array( 'jquery'), LALITA_VERSION, true );
		}
	}
}