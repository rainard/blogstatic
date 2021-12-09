<?php
/**
* GridHot functions and definitions.
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

define( 'GRIDHOT_PROURL', 'https://themesdna.com/gridhot-pro-wordpress-theme/' );
define( 'GRIDHOT_CONTACTURL', 'https://themesdna.com/contact/' );
define( 'GRIDHOT_THEMEOPTIONSDIR', get_template_directory() . '/inc/admin' );

require_once( GRIDHOT_THEMEOPTIONSDIR . '/customizer.php' );

/**
 * This function return a value of given theme option name from database.
 *
 * @since 1.0.0
 *
 * @param string $option Theme option to return.
 * @return mixed The value of theme option.
 */
function gridhot_get_option($option) {
    $gridhot_options = get_option('gridhot_options');
    if ((is_array($gridhot_options)) && (array_key_exists($option, $gridhot_options))) {
        return $gridhot_options[$option];
    }
    else {
        return '';
    }
}

function gridhot_is_option_set($option) {
    $gridhot_options = get_option('gridhot_options');
    if ((is_array($gridhot_options)) && (array_key_exists($option, $gridhot_options))) {
        return true;
    } else {
        return false;
    }
}

if ( ! function_exists( 'gridhot_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gridhot_setup() {
    
    global $wp_version;

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on GridHot, use a find and replace
     * to change 'gridhot' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'gridhot', get_template_directory() . '/languages' );

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
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );

    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'gridhot-1222w-autoh-image', 1222, 9999, false );
        add_image_size( 'gridhot-897w-autoh-image', 897, 9999, false );
        add_image_size( 'gridhot-684w-autoh-image', 684, 9999, false );
        add_image_size( 'gridhot-360w-270h-image', 360, 270, true );
    }

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
    'primary' => esc_html__('Primary Menu', 'gridhot'),
    'secondary' => esc_html__('Secondary Menu', 'gridhot')
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    $markup = array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' );
    add_theme_support( 'html5', $markup );

    add_theme_support( 'custom-logo', array(
        'height'      => 37,
        'width'       => 280,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    // Support for Custom Header
    add_theme_support( 'custom-header', apply_filters( 'gridhot_custom_header_args', array(
    'default-image'          => '',
    'default-text-color'     => 'ffffff',
    'width'                  => 1920,
    'height'                 => 400,
    'flex-width'            => true,
    'flex-height'            => true,
    'wp-head-callback'       => 'gridhot_header_style',
    'uploads'                => true,
    ) ) );

    // Set up the WordPress core custom background feature.
    $background_args = array(
            'default-color'          => 'efefef',
            'default-image'          => get_template_directory_uri() .'/assets/images/background.png',
            'default-repeat'         => 'repeat',
            'default-position-x'     => 'left',
            'default-position-y'     => 'top',
            'default-size'     => 'auto',
            'default-attachment'     => 'fixed',
            'wp-head-callback'       => '_custom_background_cb',
            'admin-head-callback'    => 'admin_head_callback_func',
            'admin-preview-callback' => 'admin_preview_callback_func',
    );
    add_theme_support( 'custom-background', apply_filters( 'gridhot_custom_background_args', $background_args) );
    
    // Support for Custom Editor Style
    add_editor_style( 'css/editor-style.css' );

    if ( !(gridhot_get_option('enable_widgets_block_editor')) ) {
        remove_theme_support( 'widgets-block-editor' );
    }

}
endif;
add_action( 'after_setup_theme', 'gridhot_setup' );

require_once( trailingslashit( get_template_directory() ) . 'inc/functions/layout-functions.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/functions/widgets-init.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/functions/share-buttons.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/functions/social-buttons.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/functions/post-author-bio-functions.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/functions/postmeta-functions.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/functions/posts-navigation.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/functions/menu-functions.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/functions/header-functions.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/functions/css-functions.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/functions/other-functions.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/functions/action-hooks.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/functions/media-functions.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/functions/enqueue-scripts.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/admin/custom.php' );