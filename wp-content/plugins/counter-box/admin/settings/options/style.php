<?php
/**
 * Param style
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

$width = array(
	'label'   => esc_attr__( 'Width', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[width]',
		'id'    => 'width',
		'value' => isset( $param['width'] ) ? $param['width'] : '30',
		'min'   => '0',
	],
	'addon'   => [
		'name'    => 'param[width_unit]',
		'value'   => isset( $param['width_unit'] ) ? $param['width_unit'] : 'auto',
		'id'    => 'widthUnit',
		'options' => [
			'auto' => esc_attr__( 'auto', $this->plugin['text'] ),
			'px'   => esc_attr__( 'px', $this->plugin['text'] ),
		],
	],
	'tooltip' => esc_attr__( 'Set the width for counter element.', $this->plugin['text'] ),
);

$height = array(
	'label'   => esc_attr__( 'Height', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[height]',
		'id'    => 'height',
		'value' => isset( $param['height'] ) ? $param['height'] : '30',
		'min'   => '0',
	],
	'addon'   => [
		'name'    => 'param[height_unit]',
		'id'    => 'heightUnit',
		'value'   => isset( $param['height_unit'] ) ? $param['height_unit'] : 'auto',
		'options' => [
			'auto' => esc_attr__( 'auto', $this->plugin['text'] ),
			'px'   => esc_attr__( 'px', $this->plugin['text'] ),
		],
	],
	'tooltip' => esc_attr__( 'Set the height for counter element.', $this->plugin['text'] ),
);

$background = array(
	'label'   => esc_attr__( 'Background', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[background]',
		'id'    => 'background',
		'value' => isset( $param['background'] ) ? $param['background'] : 'rgba(255, 255, 255, 0)',
	],
	'tooltip' => esc_attr__( 'Background of element.', $this->plugin['text'] ),
);

$border_radius = array(
	'label'   => esc_attr__( 'Border Radius', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[border_radius]',
		'id'    => 'border_radius',
		'value' => isset( $param['border_radius'] ) ? $param['border_radius'] : '0',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Specify border radius.', $this->plugin['text'] ),
);

$border_style = array(
	'label'   => esc_attr__( 'Border Style', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[border_style]',
		'id'    => 'border_style',
		'value' => isset( $param['border_style'] ) ? $param['border_style'] : 'none',
	],
	'options' => [
		'none'   => esc_attr__( 'None', $this->plugin['text'] ),
		'solid'  => esc_attr__( 'Solid', $this->plugin['text'] ),
		'dotted' => esc_attr__( 'Dotted', $this->plugin['text'] ),
		'dashed' => esc_attr__( 'Dashed', $this->plugin['text'] ),
		'double' => esc_attr__( 'Double', $this->plugin['text'] ),
		'groove' => esc_attr__( 'Groove', $this->plugin['text'] ),
		'inset'  => esc_attr__( 'Inset', $this->plugin['text'] ),
		'outset' => esc_attr__( 'Outset', $this->plugin['text'] ),
		'ridge'  => esc_attr__( 'Ridge', $this->plugin['text'] ),
	],
	'tooltip' => esc_attr__( 'Choose a border style.', $this->plugin['text'] ),
//	'func'    => 'checkBorder()',
);

$border_width = array(
	'label'   => esc_attr__( 'Border Thickness', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[border_width]',
		'id'    => 'border_width',
		'value' => isset( $param['border_width'] ) ? $param['border_width'] : '1',
		'min'   => '0',
		'step'  => '1',
	],
	'addon'   => [
		'unit' => 'px',
	],
	'tooltip' => esc_attr__( 'Specify border width.', $this->plugin['text'] ),
);

$border_color = array(
	'label' => esc_attr__( 'Border Color', $this->plugin['text'] ),
	'attr'  => [
		'name'  => 'param[border_color]',
		'id'    => 'border_color',
		'value' => isset( $param['border_color'] ) ? $param['border_color'] : 'rgba(255, 255, 255, 0)',

	],
);
