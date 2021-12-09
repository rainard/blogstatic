<?php
/**
* Sanitize callback functions
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_sanitize_checkbox( $input ) {
    return ( ( isset( $input ) && ( true == $input ) ) ? true : false );
}

function gridhot_sanitize_html( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function gridhot_sanitize_yes_no( $input, $setting ) {
    $valid = array('yes','no');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function gridhot_sanitize_date_box_style( $input, $setting ) {
    $valid = array('square','round');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function gridhot_sanitize_posts_navigation_type( $input, $setting ) {
    $valid = array('normalnavi','numberednavi');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function gridhot_sanitize_email( $input, $setting ) {
    if ( '' != $input && is_email( $input ) ) {
        $input = sanitize_email( $input );
        return $input;
    } else {
        return $setting->default;
    }
}

function gridhot_sanitize_logo_location( $input, $setting ) {
    $valid = array('beside-title','above-title');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function gridhot_sanitize_secondary_menu_location( $input, $setting ) {
    $valid = array(
            'before-header' => esc_html__('Before Header', 'gridhot'),
            'after-header' => esc_html__('After Header', 'gridhot'),
            'before-footer' => esc_html__('Before Footer', 'gridhot'),
            'after-footer' => esc_html__( 'After Footer', 'gridhot' )
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function gridhot_sanitize_read_more_length( $input, $setting ) {
    $input = absint( $input ); // Force the value into non-negative integer.
    return ( 0 < $input ) ? $input : $setting->default;
}

function gridhot_sanitize_positive_integer( $input, $setting ) {
    $input = absint( $input ); // Force the value into non-negative integer.
    return ( 0 < $input ) ? $input : $setting->default;
}

function gridhot_sanitize_positive_float( $input, $setting ) {
    $input = (float) $input;
    return ( 0 < $input ) ? $input : $setting->default;
}