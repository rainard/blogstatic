<?php
/**
 * Sanitization: Select
 */
function prem_blog_sanitize_select( $input ) {
  $valid = array(
    'full-width'    =>  'Full Width',
    'container'     =>  'In container',
  );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Sanitization: Alpha color
 */
function prem_blog_sanitize_alpha_color( $color ) {
  if ( '' === $color ) {
    return '';
  }
  if ( false === strpos( $color, 'rgba' ) ) {
    /* Hex sanitize */
    return sanitize_hex_color( $color );
  }
  /* rgba sanitize */
  $color = str_replace( ' ', '', $color );
  sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
  return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
}

function prem_blog_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
