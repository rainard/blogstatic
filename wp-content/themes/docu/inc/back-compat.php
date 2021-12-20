<?php
/**
 * Docu back compat functionality
 *
 * Prevents Docu from running on WordPress versions prior to 3.6,
 * since this theme is not meant to be backward compatible and relies on
 * many new functions and markup changes introduced in 3.6.
 *
 * @package WordPress
 * @subpackage Docu
 * @since Docu 0.8
 */

/**
 * Prevent switching to Docu on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Docu 0.8
 *
 * @return void
 */
function docu_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'docu_upgrade_notice' );
}
add_action( 'after_switch_theme', 'docu_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Docu on WordPress versions prior to 3.6.
 *
 * @since Docu 0.8
 *
 * @return void
 */
function docu_upgrade_notice() {
	$message = sprintf( __( 'Docu requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'margaha' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Theme Customizer from being loaded on WordPress versions prior to 3.6.
 *
 * @since Docu 0.8
 *
 * @return void
 */
function docu_customize() {
	wp_die( sprintf( __( 'Docu requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'margaha' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'docu_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 3.4.
 *
 * @since Docu 0.8
 *
 * @return void
 */
function docu_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Docu requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'margaha' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'docu_preview' );
