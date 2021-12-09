<?php
/**
* Layout Functions
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_hide_footer_widgets() {
    $hide_footer_widgets = FALSE;

    if ( gridhot_get_option('hide_footer_widgets') ) {
        $hide_footer_widgets = TRUE;
    }

    return apply_filters( 'gridhot_hide_footer_widgets', $hide_footer_widgets );
}

function gridhot_is_header_content_active() {
    $header_content_active = TRUE;

    if ( gridhot_get_option('hide_header_content') ) {
        $header_content_active = FALSE;
    }

    return apply_filters( 'gridhot_is_header_content_active', $header_content_active );
}

function gridhot_is_primary_menu_active() {
    $primary_menu_active = TRUE;

    if ( gridhot_get_option('disable_primary_menu') ) {
        $primary_menu_active = FALSE;
    }

    return apply_filters( 'gridhot_is_primary_menu_active', $primary_menu_active );
}

function gridhot_is_menu_social_bar_active() {
    $menu_social_bar_active = TRUE;

    if ( gridhot_get_option('disable_menu_social_bar') ) {
        $menu_social_bar_active = FALSE;
    }

    return apply_filters( 'gridhot_is_menu_social_bar_active', $menu_social_bar_active );
}

function gridhot_is_secondary_menu_active() {
    $secondary_menu_active = TRUE;

    if ( gridhot_get_option('disable_secondary_menu') ) {
        $secondary_menu_active = FALSE;
    }

    return apply_filters( 'gridhot_is_secondary_menu_active', $secondary_menu_active );
}

function gridhot_is_social_buttons_active() {
    $social_buttons_active = TRUE;

    if ( gridhot_get_option('hide_header_social_buttons') ) {
        $social_buttons_active = FALSE;
    }

    return apply_filters( 'gridhot_is_social_buttons_active', $social_buttons_active );
}

function gridhot_is_fitvids_active() {
    $fitvids_active = TRUE;

    if ( gridhot_get_option('disable_fitvids') ) {
        $fitvids_active = FALSE;
    }

    return apply_filters( 'gridhot_is_fitvids_active', $fitvids_active );
}

function gridhot_is_backtotop_active() {
    $backtotop_active = TRUE;

    if ( gridhot_get_option('disable_backtotop') ) {
        $backtotop_active = FALSE;
    }

    return apply_filters( 'gridhot_is_backtotop_active', $backtotop_active );
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gridhot_content_width() {
    $content_width = 897;

    if ( is_singular() ) {
        if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
           $content_width = 1222;
        } else {
            $content_width = 897;
        }
    } else {
        $content_width = 1222;
    }

    $GLOBALS['content_width'] = apply_filters( 'gridhot_content_width', $content_width ); /* phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound */
}
add_action( 'template_redirect', 'gridhot_content_width', 0 );