<?php
/**
 * Recommended plugins
 *
 * @package log-book
 * @version 1.0.1
 */
if ( ! function_exists( 'log_book_recommended_plugins' ) ) :
	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.1
	 */
	function log_book_recommended_plugins() {
		
		$plugins = array(

			array(
				'name'     => esc_html__( 'Thememiles Toolseet', 'log-book' ),
				'slug'     => 'thememiles-toolset',
				'required' => false,
			),

			array(
				'name'     => esc_html__( 'Getwid – Gutenberg Blocks', 'log-book' ),
				'slug'     => 'getwid',
				'required' => false,
			),
	
		);
		tgmpa( $plugins );
	}
endif;
add_action( 'tgmpa_register', 'log_book_recommended_plugins' );
