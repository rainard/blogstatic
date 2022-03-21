<?php

namespace Stax\Customizer\Core\Types;

class Control {

	/**
	 * Control ID
	 *
	 * @var string the control ID.
	 */
	public $id;

	/**
	 * Setting arguments.
	 *
	 * @var array args passed into settings.
	 */
	public $setting_args = [];

	/**
	 * Control arguments.
	 *
	 * @var array args passed into controls.
	 */
	public $control_args = [];

	/**
	 * Custom control if applies.
	 *
	 * @var null|string
	 */
	public $custom_control = null;

	/**
	 * The Partials array
	 *
	 * @var null|array
	 */
	public $partial = null;

	/**
	 * Control constructor
	 *
	 * @param string $id the control id.
	 * @param array  $setting_args the add_setting array.
	 * @param array  $control_args the add_control array.
	 * @param string $custom_control [optional] this should be added if the control is a custom control.
	 * @param array  $partial [optional] this should be added if the control is a selective refresh control..
	 */
	public function __construct( $id, $setting_args, $control_args, $custom_control = null, $partial = null ) {
		$this->id             = $id;
		$this->setting_args   = $setting_args;
		$this->control_args   = $control_args;
		$this->custom_control = $custom_control;
		$this->partial        = $partial;
	}

}
