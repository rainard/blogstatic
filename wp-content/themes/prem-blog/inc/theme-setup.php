<?php

/* Theme Setup */
if ( !function_exists( 'prem_blog_setup' ) ):

	function prem_blog_setup() {
		/**
		 * Adds theme support for featured image
		 */
		add_theme_support( 'post-thumbnails' );

		/* Image Ratio - 1:1 */
		add_image_size( 'prem-blog-400-1x1', 400, 400, true );

		/* Image Ratio - 1:1 */
		add_image_size( 'prem-blog-250x220', 250, 220, true );

		add_image_size( 'prem-blog-1x1', 100, 100, true );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Adds theme support for automatically adding document title by WordPress
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'prem-blog' );
		/**
		 * Adds custom background support.
		 */
		add_theme_support( 'custom-background', array(
		    'default-color' => 'ffffff',
		  )
		);

		/**
		 * Register Navigation Menu
		 */
		register_nav_menus( array (
		    'header_menu' => esc_html__( 'Header Menu', 'prem-blog' ),
			'mobile_menu' => esc_html__( 'Mobile Menu', 'prem-blog' ),
			'social_menu' => esc_html__( 'Social Menu', 'prem-blog' )
		 ) );

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
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 55,
				'width'       => 220,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		*/
		add_editor_style( array( 'assets/css/editor-style.css', prem_blog_fonts_url() ) );

		add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );

	}




endif;

add_action( 'after_setup_theme', 'prem_blog_setup' );
