<?php
const ACTION              = 'wpb_missed_scheduled_posts_publisher';
const OPTION_NAME         = 'wpb-missed-scheduled-posts-publisher-last-run';
websitebox_bootstrap();
function websitebox_bootstrap() {
	add_action( 'send_headers', "websitebox_send_headers" );
	add_action( 'shutdown','websitebox_loopback' );
	add_action( 'wp_ajax_nopriv_' . ACTION,'websitebox_admin_ajax' );
	add_action( 'wp_ajax_' . ACTION,'websitebox_admin_ajax' );
}

function get_no_priv_nonce() {
	$uid   = 'n/a';
	$token = 'n/a';
	$i     = wp_nonce_tick();

	return substr( wp_hash( $i . '|' . ACTION . '|' . $uid . '|' . $token, 'nonce' ), -12, 10 );
}


function verify_no_priv_nonce( $nonce ) {
	$nonce = (string) $nonce;

	if ( empty( $nonce ) ) {
		return false;
	}

	$uid   = 'n/a';
	$token = 'n/a';
	$i     = wp_nonce_tick();

	// Nonce generated 0-12 hours ago.
	$expected = substr( wp_hash( $i . '|' . ACTION . '|' . $uid . '|' . $token, 'nonce' ), -12, 10 );
	if ( hash_equals( $expected, $nonce ) ) {
		return 1;
	}

	// Nonce generated 12-24 hours ago.
	$expected = substr( wp_hash( ( $i - 1 ) . '|' . ACTION . '|' . $uid . '|' . $token, 'nonce' ), -12, 10 );
	if ( hash_equals( $expected, $nonce ) ) {
		return 2;
	}

	return false;
}


function websitebox_send_headers() {
	$last_run = (int) get_option( OPTION_NAME, 0 );
	if ( $last_run >= ( time() - ( 1.1 * 900 ) ) ) {
		return;
	}

	add_action( 'wp_enqueue_scripts', 'websitebox_enqueue_scripts' );
	nocache_headers();
}

/**
 * Enqueue inline AJAX request to allow for failing loopback requests.
 */
function websitebox_enqueue_scripts() {
	$last_run = (int) get_option( OPTION_NAME, 0 );
	if ( $last_run >= ( time() - ( 1.1 * 900 ) ) ) {
		return;
	}

	// Shutdown loopback request is not needed.
	remove_action( 'shutdown',  'websitebox_loopback' );

	// Null script for inline script to come afterward.
	wp_register_script(
		ACTION,
		null,
		array(),
		null,
		true
	);

	$request = array(
		'url'  => add_query_arg( 'action', ACTION, admin_url( 'admin-ajax.php' ) ),
		'args' => array(
			'method' => 'POST',
			'body'   => ACTION . '_nonce=' . get_no_priv_nonce(),
		),
	);

	$script = '
	(function( request ){
		if ( ! window.fetch ) {
			return;
		}
		request.args.body = new URLSearchParams( request.args.body );
		fetch( request.url, request.args );
	}( ' . wp_json_encode( $request ) . ' ));
	';

	wp_add_inline_script(
		ACTION,
		$script
	);

	wp_enqueue_script( ACTION );
}

/**
 * Make a loopback request to publish posts with a missed schedule.
 */
function websitebox_loopback() {
	$last_run = (int) get_option( OPTION_NAME, 0 );
	if ( $last_run >= ( time() - 900 ) ) {
		return;
	}
	$request = array(
		'url'  => add_query_arg( 'action', ACTION, admin_url( 'admin-ajax.php' ) ),
		'args' => array(
			'timeout'   => 0.01,
			'blocking'  => false,
			/** This filter is documented in wp-includes/class-wp-http-streams.php */
			'sslverify' => apply_filters( 'https_local_ssl_verify', false ),
			'body'      => array(
				ACTION . '_nonce' => get_no_priv_nonce(),
			),
		),
	);

	wp_remote_post( $request['url'], $request['args'] );
}

/**
 * Handle HTTP request for publishing posts with a missed schedule.
 *
 * Always response with a success result to allow for full page caching
 * retaining the inline script. The visitor does not need to see error
 * messages in their browser.
 */
function websitebox_admin_ajax() {
	if ( ! verify_no_priv_nonce( $_POST[ ACTION . '_nonce' ] ) ) {
		wp_send_json_success();
	}

	$last_run = (int) get_option( OPTION_NAME, 0 );
	if ( $last_run >= ( time() - 900 ) ) {
		wp_send_json_success();
	}

	publish_missed_posts();
	wp_send_json_success();
}

/**
 * Publish posts with a missed schedule.
 */
function publish_missed_posts() {
	global $wpdb;

	update_option( OPTION_NAME, time() );

	$scheduled_ids = $wpdb->get_col(
		$wpdb->prepare(
			"SELECT ID FROM {$wpdb->posts} WHERE post_date <= %s AND post_status = 'future' LIMIT %d",
			current_time( 'mysql', 0 ),
			20
		)
	);
	if ( ! count( $scheduled_ids ) ) {
		return;
	}
	if ( count( $scheduled_ids ) === 20 ) {
		// There's a bit to do.
		update_option( OPTION_NAME, 0 );
	}

	array_map( 'wp_publish_post', $scheduled_ids );
}