<?php
/**
 * The searchform.php template. 
 * 
 * Template for displaying search forms. Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package bootspress
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label.
 */
$bootspress_unique_id = wp_unique_id( 'search-form-' );
$bootspress_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>
<form role="search" <?php echo $bootspress_aria_label; ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $bootspress_unique_id ); ?>" class="screen-reader-text"><?php _e( 'Search&hellip;', 'bootspress' ); ?></label>
	<input type="search" id="<?php echo esc_attr( $bootspress_unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'bootspress' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo _x( 'Search', 'submit button', 'bootspress' ); ?></button>
</form>
