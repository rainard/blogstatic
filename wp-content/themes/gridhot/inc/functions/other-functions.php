<?php
/**
* More Custom Functions
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Change excerpt length
function gridhot_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }
    $read_more_length = 17;
    if ( gridhot_get_option('read_more_length') ) {
        $read_more_length = gridhot_get_option('read_more_length');
    }
    return apply_filters( 'gridhot_excerpt_length', $read_more_length );
}
add_filter('excerpt_length', 'gridhot_excerpt_length');

// Change excerpt more word
function gridhot_excerpt_more($more) {
    if ( is_admin() ) {
        return $more;
    }
    return '...';
}
add_filter('excerpt_more', 'gridhot_excerpt_more');


if ( ! function_exists( 'wp_body_open' ) ) :
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
     */
    function wp_body_open() { // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedFunctionFound
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
    }
endif;