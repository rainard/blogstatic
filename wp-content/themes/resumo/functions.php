<?php


	add_action( 'after_setup_theme', 'resumo_fn_setup', 50 );

	function resumo_fn_setup(){

		// REGISTER THEME MENU
		if(function_exists('register_nav_menus')){
			register_nav_menus(array('main_menu' 	=> esc_html__('Main Menu','resumo')));
			register_nav_menus(array('mobile_menu' 	=> esc_html__('Mobile Menu','resumo')));
		}

		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_action( 'wp_enqueue_scripts', 'resumo_fn_scripts', 100 ); 
		add_action( 'wp_enqueue_scripts', 'resumo_fn_styles', 100 );
		add_action( 'wp_enqueue_scripts', 'resumo_fn_inline_styles', 150 );
		add_action( 'admin_enqueue_scripts', 'resumo_fn_admin_scripts' );

		// This theme uses post thumbnails
		add_theme_support( 'post-thumbnails' );
		
		
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'html5' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'align-wide' );

		set_post_thumbnail_size( 300, 300, true ); 								// Normal post thumbnails
		add_image_size( 'resumo_fn_thumb-720-9999', 720, 9999, false);			
		add_image_size( 'resumo_fn_thumb-1200-9999', 1200, 9999, false);			

		//Load Translation Text Domain
		load_theme_textdomain( 'resumo', get_template_directory() . '/languages' );


		add_filter(	'widget_tag_cloud_args', 'resumo_fn_tag_cloud_args');

		if ( ! isset( $content_width ) ) $content_width = 1200;

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'wp_list_comments' );
		add_theme_support( 'title-tag' );

		add_editor_style() ;

		
		add_action( 'wp_ajax_nopriv_resumo_fn_ajax_portfolio', 'resumo_fn_ajax_portfolio' );
		add_action( 'wp_ajax_resumo_fn_ajax_portfolio', 'resumo_fn_ajax_portfolio' );
		
		
		
		
		add_action( 'wp_ajax_nopriv_resumo_fn_get_posts', 'resumo_fn_get_posts' );
		add_action( 'wp_ajax_resumo_fn_get_posts', 'resumo_fn_get_posts' );
		
		
		// CONSTANT
		$my_theme 		= wp_get_theme( 'resumo' );
		$version		= '1.0';
		if ( $my_theme->exists() ){
			$version 	= (string)$my_theme->get( 'Version' );
		}
		$version		= 'ver_'.$version;
		define('RESUMO_VERSION', $version);
		define('RESUMO_URI', get_template_directory_uri());
		define('RESUMO_JS', RESUMO_URI . '/assets/js/');
		define('RESUMO_CSS', RESUMO_URI . '/assets/css/');
		register_setting('resumo__options', 'resumo_dismiss_notice', array('default' => ''));
		
		
		
		function resumo_plugins_admin_notice() {
			
			$list 				= '';
			$plugins 			= array();
			include_once ABSPATH . 'wp-admin/includes/plugin.php';
			if(!is_plugin_active('resumo-core/resumo-core.php') && !is_plugin_active('resumo-core-premium/resumo-core.php')){
				$URL			= 'https://frenify.com/project/resumo/';
				$element		= '<a href="'.esc_url($URL).'" target="_blank">Resumo Core</a>';
				array_push($plugins,$element);
			}
			if(!is_plugin_active('elementor/elementor.php')){
				$URL			= 'https://wordpress.org/plugins/elementor/';
				$element		= '<a href="'.esc_url($URL).'" target="_blank">Elementor</a>';
				array_push($plugins,$element);
			}
			if(!empty($plugins)){
				$list 	= '<strong>'; $separator = ', ';
				$count	= count($plugins);
				foreach($plugins as $key => $plugin){
					if(($count > 1) && ($key === ($count - 1))){
						$list 	= rtrim($list,$separator);
						$list .= ' and ';
					}	
					$list .= $plugin . $separator;
				}
				$list  = rtrim($list,$separator);
				$list .= '</strong>';
			}
			if($list != ''){
				$class = 'notice notice-warning resumo-dismiss-notice is-dismissible';

				printf( '<div class="%1$s"><p>We recommend installing the following plugins: %2$s.<br /> Please download the plugins and install them.</p></div>', esc_attr( $class ), $list );

			}

		}
		
		if( get_option( 'resumo_dismiss_notice' ) != true ) {
			add_action( 'admin_notices', 'resumo_plugins_admin_notice' );
		}
		
		
		
		
		/* ------------------------------------------------------------------------ */
		/*  Inlcudes
		/* ------------------------------------------------------------------------ */
		include_once( get_template_directory().'/inc/resumo_fn_functions.php'); 					// Custom Functions
		include_once( get_template_directory().'/inc/resumo_fn_googlefonts.php'); 					// Google Fonts Init
		include_once( get_template_directory().'/inc/resumo_fn_css.php'); 							// Inline CSS
		include_once( get_template_directory().'/inc/resumo_fn_sidebars.php'); 						// Widget Area
		include_once( get_template_directory().'/inc/resumo_fn_pagination.php'); 					// Pagination

}







/* ----------------------------------------------------------------------------------- */
/*  ENQUEUE STYLES AND SCRIPTS
/* ----------------------------------------------------------------------------------- */
	function resumo_fn_scripts() {
		wp_enqueue_script('typed', RESUMO_JS . 'typed.js', array('jquery'), RESUMO_VERSION, FALSE);
		wp_enqueue_script('resumo-fn-init', RESUMO_JS . 'init.js', array('jquery'), RESUMO_VERSION, TRUE);
		
		wp_localize_script('resumo-fn-init', 'fn_object', array(
			'ajax' 		=> admin_url( 'admin-ajax.php' ),
			'siteurl' 	=> esc_url(home_url())
		));
		
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	}
	
	function resumo_fn_admin_scripts() {
		wp_register_script('resumo-fn-admin-js', RESUMO_JS . 'admin.js', array('jquery'), RESUMO_VERSION, FALSE);
		wp_localize_script( 'resumo-fn-admin-js', 'fn_object', array(
            'ajax' 		=> admin_url( 'admin-ajax.php' ), 
        ));
		wp_enqueue_script('resumo-fn-admin-js');
		wp_enqueue_style('resumo-fn-fontello', RESUMO_CSS. 'fontello.css', array(), RESUMO_VERSION, 'all');
		wp_enqueue_style('resumo-fn-admin-style', RESUMO_CSS. 'admin.css', array(), RESUMO_VERSION, 'all');
	}

	function resumo_fn_styles(){
		wp_enqueue_style('resumo-fn-font-url', resumo_fn_font_url(), array(), null );
		wp_enqueue_style('resumo-fn-base', RESUMO_CSS . 'base.css', array(), RESUMO_VERSION, 'all');
		wp_enqueue_style('resumo-fn-skeleton', RESUMO_CSS. 'skeleton.css', array(), RESUMO_VERSION, 'all');
		wp_enqueue_style('resumo-fn-wp-core', RESUMO_CSS. 'wp-core.css', array(), RESUMO_VERSION, 'all');
		wp_enqueue_style('resumo-fn-fontello', RESUMO_CSS. 'fontello.css', array(), RESUMO_VERSION, 'all');
		wp_enqueue_style('resumo-fn-stylesheet', get_stylesheet_uri(), array(), RESUMO_VERSION, 'all' ); // Main Stylesheet
	}

	add_action( 'wp_ajax_resumo_dismiss_notice', 'resumo_dismiss_notice' );

	function resumo_dismiss_notice() {
	  	update_option( 'resumo_dismiss_notice', true );
	}
	/**
	 * Fix skip link focus in IE11.
	 *
	 * This does not enqueue the script because it is tiny and because it is only for IE11,
	 * thus it does not warrant having an entire dedicated blocking script being loaded.
	 *
	 * @link https://git.io/vWdr2
	 */
	function resumo_fn_skip_link_focus_fix() {
		// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
		?>
		<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
		</script>
		<?php
	}
	add_action( 'wp_print_footer_scripts', 'resumo_fn_skip_link_focus_fix' );




/* ----------------------------------------------------------------------------------- */
/*  Tagcloud widget
/* ----------------------------------------------------------------------------------- */
	
	function resumo_fn_tag_cloud_args($args){
		$my_args 	= array('smallest' => 14, 'largest' => 14, 'unit'=>'px', 'orderby'=>'count', 'order'=>'DESC' );
		$args 		= wp_parse_args( $args, $my_args );
		return $args;
	}




?>