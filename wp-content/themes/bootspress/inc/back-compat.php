<?php
/**
 * Back compat functionality.
 *
 * Prevents the theme from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that.
 *
 * @package bootspress
 * @since BootsPress 0.9.2
 */

/**
 * Display upgrade notice on theme switch.
 *
 * @since BootsPress 0.9.2
 *
 * @return void
 */
function bootspress_switch_theme() {
	add_action( 'admin_notices', 'bootspress_upgrade_notice' );
}
add_action( 'after_switch_theme', 'bootspress_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * the theme on WordPress versions prior to 4.7.
 *
 * @since BootsPress 0.9.2
 *
 * @global string $wp_version WordPress version.
 *
 * @return void
 */
function bootspress_upgrade_notice() {
	echo '<div class="error"><p>';
	printf(
		/* translators: %s: WordPress Version. */
		esc_html__( 'This theme requires WordPress 4.7 or newer. You are running version %s. Please upgrade.', 'bootspress' ),
		esc_html( $GLOBALS['wp_version'] )
	);
	echo '</p></div>';
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since BootsPress 0.9.2
 *
 * @global string $wp_version WordPress version.
 *
 * @return void
 */
function bootspress_customize() {
	wp_die(
		sprintf(
			/* translators: %s: WordPress Version. */
			esc_html__( 'This theme requires WordPress 4.7 or newer. You are running version %s. Please upgrade.', 'bootspress' ),
			esc_html( $GLOBALS['wp_version'] )
		),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'bootspress_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since BootsPress 0.9.2
 *
 * @global string $wp_version WordPress version.
 *
 * @return void
 */
function bootspress_preview() {
	if ( isset( $_GET['preview'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
		wp_die(
			sprintf(
				/* translators: %s: WordPress Version. */
				esc_html__( 'This theme requires WordPress 4.7 or newer. You are running version %s. Please upgrade.', 'bootspress' ),
				esc_html( $GLOBALS['wp_version'] )
			)
		);
	}
}
add_action( 'template_redirect', 'bootspress_preview' );
