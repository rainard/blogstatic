<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package bootspress
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses bootspress_header_style()
 */
function bootspress_custom_header_setup() {
	$args = array(
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 1600,
		'height'                 => 50,
		'flex-height'            => false,
		'flex-width'             => false,
		'default-text-color'     => '212529',
		'header-text'            => true,
		'uploads'                => true,		
		'wp-head-callback'       => 'bootspress_header_style',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);

	// Adds support for a custom header image.
	add_theme_support( 'custom-header', $args );

	/*
	 * Register a default header to be displayed by the custom header admin UI.
	 * The %s is replaced with theme template directory URI.
	 * To reference a image in a child theme (ie in the stylesheet directory), use %2$s instead of %s.
	 */
	register_default_headers( array(
		'black' => array(
			'url'           => '%s/assets/images/headers/black.png',
			'thumbnail_url' => '%s/assets/images/headers/black-thumbnail.png',
			'description'   => _x( 'Black', 'header image description', 'bootspress' )
		),
		'gray' => array(
			'url'           => '%s/assets/images/headers/gray.png',
			'thumbnail_url' => '%s/assets/images/headers/gray-thumbnail.png',
			'description'   => _x( 'Gray', 'header image description', 'bootspress' )
		),
		'pink' => array(
			'url'           => '%s/assets/images/headers/pink.png',
			'thumbnail_url' => '%s/assets/images/headers/pink-thumbnail.png',
			'description'   => _x( 'Pink', 'header image description', 'bootspress' )
		),
	) );
}
add_action( 'after_setup_theme', 'bootspress_custom_header_setup' );

if ( ! function_exists( 'bootspress_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see bootspress_custom_header_setup().
	 */
	function bootspress_header_style() {
		$header_image	  = get_header_image();
		$header_textcolor = get_header_textcolor();
		
		// If header image is not set and header text color is set to default (no custom options are set), let's bail.
		// Header text color is then shown from style.css settings.
		if ( empty( $header_image ) && $header_textcolor == get_theme_support( 'custom-header', 'default-text-color' ) )
			return;
		?>
		<style type="text/css" id="bootspress-header-style">
		<?php
			// If custom header is set.
			if ( ! empty( $header_image ) ) :
		?>
			.site-header {
				background: url(<?php header_image(); ?>) no-repeat scroll top;
				background-size: 1600px auto;
				min-height: 50px;
			}
		<?php
			endif;
			
			// If there is no header text.
			if ( ! display_header_text() ) :
		?>
			.site-title,
			.site-title a,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
			
			.site-brand {
				min-height: 50px;
			}
		<?php
			endif;

			// If is set a custom color for the header text.
			if ( ! empty( $header_textcolor ) ) :
		?>
			.site-title,
			#header .site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_textcolor ); ?>;
			}
		<?php endif; ?>
		</style>
	<?php
	}
endif;
