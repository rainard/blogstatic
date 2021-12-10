<?php
/**
 * BootsPress Starter Content
 *
 * @link https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
 *
 * @package bootspress
 * @since BootsPress 0.9.2
 */

/**
 * Function to return the array of starter content for the theme.
 *
 * Passes it through the `bootspress_starter_content` filter before returning.
 *
 * @since BootsPress 0.9.2
 *
 * @return array A filtered array of args for the starter_content.
 */
function bootspress_get_starter_content() {

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		// Specify widgets.
		'widgets'     => array(
			// Place three widgets in the sidebar area.
			'sidebar-1' => array(
				'custom_html_about' => array( 'custom_html', array(
					'title' => esc_html_x( 'About', 'Theme starter content', 'bootspress' ),
					'content' => '<p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>',
				) ),
				'archives',
				'meta_custom' => array( 'meta', array(
					'title' => esc_html_x( 'Elsewhere', 'Theme starter content', 'bootspress' ),
				) ),
			),


			// Add the custom html widget to the header-after area.
			'header-after' => array(
				'custom_html_header_after' => array( 'custom_html', array(
					'content' => '
						<div class="text-white rounded bg-dark"><div class="col-md-6 px-0">
						<h1 class="display-4 fst-italic">' . esc_html_x( 'Title of a longer featured blog post', 'Theme starter content', 'bootspress' ) . '</h1>
						<p class="lead my-3">' . esc_html_x( 'Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.', 'Theme starter content', 'bootspress' ) . '</p>
						<p class="lead mb-0"><a href="#" class="text-white fw-bold">' . esc_html_x( 'Continue reading...', 'Theme starter content', 'bootspress' ) . '</a></p>
						</div></div>',
				) ),
			),
		),
		
		// Specify the core-defined pages to create.
		'posts'     => array(
			'about' => array(
				'template' => 'full-width.php',
			),
			'contact' => array(
				'template' => 'full-width.php',
			),
		),
		
		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "menu-1" (Primary menu) location.
			'menu-1' => array(
				'name'  => esc_html__( 'Primary menu', 'bootspress' ),
				'items' => array(
					'link_home',
					'page_about',
					'page_contact',
				),
			),

			// Assign a menu to the "footer" (Footer menu) location.
			'footer'  => array(
				'name'  => esc_html__( 'Footer menu', 'bootspress' ),
				'items' => array(
					'link_back_to_top' => array(
						'title' => esc_html_x( 'Back to top', 'Theme starter content', 'bootspress' ),
						'url'   => '#',
					),
				),
			),
		),
		
		// Set options.
		'options'   => array(
			'blogdescription' => '',
			'bootspress_google_font_family' => 'Playfair Display:700,900',
			'bootspress_google_font_subset' => 'latin,latin-ext',
		),
	);

	/**
	 * Filters the array of starter content.
	 *
	 * @since BootsPress 0.9.2
	 *
	 * @param array $starter_content Array of starter content.
	 */
	return apply_filters( 'bootspress_starter_content', $starter_content );
}
