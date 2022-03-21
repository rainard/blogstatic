<?php
/**
 * Inline Style generator
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$zindex = ! empty( $param['zindex'] ) ? $param['zindex'] : '9';
$margin = ! empty( $param['margin'] ) ? $param['margin'] . 'px' : '0';

$css .= '#side-menu-' . $id . ' {';
$css .= 'z-index:' . $zindex . ';';
$css .= '}';

$height = ! empty( $param['height'] ) ? $param['height'] : '40';

$css .= '#side-menu-' . $id . ' .sm-icon, #side-menu-' . $id . ' .sm-label {';
$css .= 'height:' . $height . 'px;';
$css .= 'line-height:' . $height . 'px;';
$css .= '}';

$iconsize = ! empty( $param['iconsize'] ) ? $param['iconsize'] : '24';

$css .= '#side-menu-' . $id . ' .sm-icon {';
$css .= 'width:' . $height . 'px;';
$css .= 'font-size:' . $iconsize . 'px;';
$css .= '}';

$fontsize   = ! empty( $param['fontsize'] ) ? $param['fontsize'] : '24';
$fontstyle  = 'normal';
$fontweight = 'normal';

$css .= '#side-menu-' . $id . ' .sm-label {';
$css .= 'font-size:' . $fontsize . 'px;';
$css .= 'font-style:' . $fontstyle . ';';
$css .= 'font-weight:' . $fontweight . ';';
$css .= '}';

$bwidth = ! empty( $param['bwidth'] ) ? $param['bwidth'] . 'px' : '0';
$bcolor = ! empty( $param['bcolor'] ) ? $param['bcolor'] : 'rgba(0,0,0,0.75)';

$css .= '#side-menu-' . $id . '.-right .sm-item {';
$css .= 'right: calc(-100% + ' . $height . 'px);';
$css .= '}';

$css .= '#side-menu-' . $id . '.-left .sm-item {';
$css .= 'left: calc(-100% + ' . $height . 'px);';
$css .= '}';

$css .= '#side-menu-' . $id . ' .sm-item a {';
$css .= 'border-color: ' . $bcolor . ';';
$css .= 'border-style: solid;';
$css .= '}';

$css .= '#side-menu-' . $id . '.-left .sm-item a {';
$css .= 'border-width: ' . $bwidth . ' ' . $bwidth . ' ' . $bwidth . ' 0;';
$css .= '}';

$css .= '#side-menu-' . $id . '.-right .sm-item a {';
$css .= 'border-width: ' . $bwidth . ' 0 ' . $bwidth . ' ' . $bwidth . ';';
$css .= '}';

$gap = ! empty( $param['gap'] ) ? $param['gap'] . 'px' : '0';

$css .= '#side-menu-' . $id . ' .sm-item {';
$css .= 'margin: ' . $gap . ' 0;';
$css .= '}';

$css .= '#side-menu-' . $id . ' .sm-item:first-child {';
$css .= 'margin-top: 0;';
$css .= '}';

$css .= '#side-menu-' . $id . ' .sm-item:last-child {';
$css .= 'margin-bottom: 0;';
$css .= '}';

if ( ! empty( $param['menu_1']['item_type'] ) ) {
	$count_i = count( $param['menu_1']['item_type'] );
} else {
	$count_i = 0;
}

if ( ! empty( $param['include_mobile'] ) ) {
	$screen = ! empty( $param['screen'] ) ? $param['screen'] : 480;
	$css    .= '
					@media only screen and (max-width: ' . $screen . 'px){
						#side-menu-' . $id . ' {
							display:none;
						}
					}';
}

if ( ! empty( $param['include_more_screen'] ) ) {
	$screen_more = ! empty( $param['screen_more'] ) ? $param['screen_more'] : 1200;
	$css         .= '
					@media only screen and (min-width: ' . $screen_more . 'px){
						#side-menu-' . $id . ' {
							display:none;
						}
					}';
}

$css = trim( preg_replace( '~\s+~s', ' ', $css ) );