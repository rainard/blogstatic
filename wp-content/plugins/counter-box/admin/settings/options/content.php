<?php
/**
 * Content for notification
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

$content = array(
	'label' => esc_attr__( 'Content', $this->plugin['text'] ),
	'attr'  => [
		'name'  => 'param[content]',
		'id'    => 'counterBoxContent',
		'value' => isset( $param['content'] ) ? $param['content'] : '',
	],
);
