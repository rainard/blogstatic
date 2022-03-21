<?php
/**
* Plugin Name: WP File Download Light
* Plugin URI: https://www.joomunited.com/wordpress-products/wp-file-download
* Description: WP File Download, a new way to manage files in WordPress
* Author: Joomunited
* Version: 1.3.3
* Tested up to: 4.9.8
* Text Domain: wp-smart-editor
* Domain Path: /app/languages
* Author URI: https://www.joomunited.com
*/

// Prohibit direct script loading
defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

// If we activated full version do not use this free version
if (defined('WPFD_PLUGIN_FILE')) {
	wp_die(__('Full version of WP File Download has been activated! Please deactivate it if you want to use free version!', 'wp-smart-editor'));
	return false;
};

//Check plugin requirements
if (version_compare(PHP_VERSION, '5.3', '<')) {
    if( !function_exists('wpfd_disable_plugin') ){
        function wpfd_disable_plugin(){
            if ( current_user_can('activate_plugins') && is_plugin_active( plugin_basename( __FILE__ ) ) ) {
                deactivate_plugins( __FILE__ );
                unset( $_GET['activate'] );
            }
        }
    }

    if( !function_exists('wpfd_show_error') ){
        function wpfd_show_error(){
            echo '<div class="error"><p><strong>WP File Download</strong> need at least PHP 5.3 version, please update php before installing the plugin.</p></div>';
        }
    }

    //Add actions
    add_action( 'admin_init', 'wpfd_disable_plugin' );
    add_action( 'admin_notices', 'wpfd_show_error' );

    //Do not load anything more
    return;
}

use Joomunited\WPFramework\v1_0_4\Application;

include_once('framework' . DIRECTORY_SEPARATOR . 'ju-libraries.php');

if(!defined('WPFDL_PLUGIN_FILE')) {
    define('WPFDL_PLUGIN_FILE',__FILE__);
}
define( 'WPFDL_VERSION', '1.3.3' );

include_once('app'.DIRECTORY_SEPARATOR.'autoload.php');
include_once('app'.DIRECTORY_SEPARATOR.'install.php');
include_once('app'.DIRECTORY_SEPARATOR.'functions.php');

//Initialise the application        
$app = Application::getInstance('wpfd',__FILE__);
$app->init();

if(is_admin()) {
    //config section        
    if(!defined('JU_BASE')){
        define( 'JU_BASE', 'https://www.joomunited.com/' );
    }
}