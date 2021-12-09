<?php
/**
* Customizer Options
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Header styles
if ( ! function_exists( 'gridhot_header_style' ) ) :
function gridhot_header_style() {
    $header_text_color = get_header_textcolor();
    //if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) { return; }
    ?>
    <style type="text/css">
    <?php if ( ! display_header_text() ) : ?>
        .gridhot-site-title, .gridhot-site-description {position: absolute;clip: rect(1px, 1px, 1px, 1px);}
    <?php else : ?>
        .gridhot-site-title, .gridhot-site-title a, .gridhot-site-description {color: #<?php echo esc_attr( $header_text_color ); ?>;}
    <?php endif; ?>
    </style>
    <?php
}
endif;