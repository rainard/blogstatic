<?php
/**
 * Settings parameters
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */


$type = array(
	'label'   => esc_attr__( 'Type of counter', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[type]',
		'id'    => 'counterType',
		'value' => isset( $param['type'] ) ? $param['type'] : '',
	],
	'options' => [
		'CountToDate'    => esc_attr__( 'Countdown to date', $this->plugin['text'] ),
		'ContFromDate'   => esc_attr__( 'Count from date', $this->plugin['text'] ),
		'CountToWeekday' => esc_attr__( 'Countdown to week day', $this->plugin['text'] ),
		'Timer'          => esc_attr__( 'Timer', $this->plugin['text'] ),
		'UserTimer'      => esc_attr__( 'Timer for each user', $this->plugin['text'] ),
		'TimerStopGo'    => esc_attr__( 'Timer Stop & Go', $this->plugin['text'] ),
		'Counter'        => esc_attr__( 'Counter', $this->plugin['text'] ),
	],
	'help'    => esc_attr__( 'More about types on https://wow-estore.com/docs/counter-box-main-settings/', $this->plugin['text'] ),
);

$default_date = !isset( $param['date'] ) ? date('Y-m-d') : '';

$date = array(
	'label'   => esc_attr__( 'Date', $this->plugin['text'] ),
	'attr'    => [
		'name'        => 'param[date]',
		'id'          => 'counterDate',
		'value'       => isset( $param['date'] ) ? $param['date'] : $default_date,
		'placeholder' => esc_attr__( '', $this->plugin['text'] ),
	],
	'help'    => esc_attr__( '', $this->plugin['text'] ),
	'icon'    => '',
	'tooltip' => esc_attr__( 'Enter the date', $this->plugin['text'] ),
);

$time = array(
	'label'   => esc_attr__( 'Time', $this->plugin['text'] ),
	'attr'    => [
		'name'        => 'param[time]',
		'id'          => 'counterTime',
		'value'       => isset( $param['time'] ) ? $param['time'] : '23:59',
		'placeholder' => esc_attr__( '', $this->plugin['text'] ),
	],
	'help'    => esc_attr__( '', $this->plugin['text'] ),
	'icon'    => '',
	'tooltip' => esc_attr__( 'Enter the time', $this->plugin['text'] ),
);

$weekday = array(
	'label'   => esc_attr__( 'Day of the week', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[dayweek]',
		'id'    => 'dayweek',
		'value' => isset( $param['dayweek'] ) ? $param['dayweek'] : 'everyday',
	],
	'options' => [
		'everyday'  => esc_attr__( 'Everyday', $this->plugin['text'] ),
		'Monday'    => esc_attr__( 'Monday', $this->plugin['text'] ),
		'Tuesday'   => esc_attr__( 'Tuesday', $this->plugin['text'] ),
		'Wednesday' => esc_attr__( 'Wednesday', $this->plugin['text'] ),
		'Thursday'  => esc_attr__( 'Thursday', $this->plugin['text'] ),
		'Friday'    => esc_attr__( 'Friday', $this->plugin['text'] ),
		'Saturday'  => esc_attr__( 'Saturday', $this->plugin['text'] ),
		'Sunday'    => esc_attr__( 'Sunday ', $this->plugin['text'] ),

	],
	'tooltip' => esc_attr__( 'Set the countdown for day of week. Countdown will be to the time of weekday and then refresh', $this->plugin['text'] ),
);

$timezone = array(
	'label'   => esc_attr__( 'Timezone', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[timezone]',
		'id'    => 'timezone',
		'value' => isset( $param['timezone'] ) ? $param['timezone'] : '+00:00',
	],
	'options' => [
		'-12:00' => esc_attr__( '-12:00', $this->plugin['text'] ),
		'-11:30' => esc_attr__( '-11:30', $this->plugin['text'] ),
		'-11:00' => esc_attr__( '-11:00', $this->plugin['text'] ),
		'-10:30' => esc_attr__( '-10:30', $this->plugin['text'] ),
		'-10:00' => esc_attr__( '-10:00', $this->plugin['text'] ),
		'-09:30' => esc_attr__( '-09:30', $this->plugin['text'] ),
		'-09:00' => esc_attr__( '-09:00', $this->plugin['text'] ),
		'-08:30' => esc_attr__( '-08:30', $this->plugin['text'] ),
		'-08:00' => esc_attr__( '-08:00', $this->plugin['text'] ),
		'-07:30' => esc_attr__( '-07:30', $this->plugin['text'] ),
		'-07:00' => esc_attr__( '-07:00', $this->plugin['text'] ),
		'-06:30' => esc_attr__( '-06:30', $this->plugin['text'] ),
		'-06:00' => esc_attr__( '-06:00', $this->plugin['text'] ),
		'-05:30' => esc_attr__( '-05:30', $this->plugin['text'] ),
		'-05:00' => esc_attr__( '-05:00', $this->plugin['text'] ),
		'-04:30' => esc_attr__( '-04:30', $this->plugin['text'] ),
		'-04:00' => esc_attr__( '-04:00', $this->plugin['text'] ),
		'-03:30' => esc_attr__( '-03:30', $this->plugin['text'] ),
		'-03:00' => esc_attr__( '-03:00', $this->plugin['text'] ),
		'-02:30' => esc_attr__( '-02:30', $this->plugin['text'] ),
		'-02:00' => esc_attr__( '-02:00', $this->plugin['text'] ),
		'-01:30' => esc_attr__( '-01:30', $this->plugin['text'] ),
		'-01:00' => esc_attr__( '-01:00', $this->plugin['text'] ),
		'-00:30' => esc_attr__( '-00:30', $this->plugin['text'] ),
		'+00:00' => esc_attr__( '00:00', $this->plugin['text'] ),
		'+0:30'  => esc_attr__( '+0:30', $this->plugin['text'] ),
		'+01:00' => esc_attr__( '+01:00', $this->plugin['text'] ),
		'+1:30'  => esc_attr__( '+1:30', $this->plugin['text'] ),
		'+02:00' => esc_attr__( '+02:00', $this->plugin['text'] ),
		'+02:30' => esc_attr__( '+02:30', $this->plugin['text'] ),
		'+03:00' => esc_attr__( '+03:00', $this->plugin['text'] ),
		'+03:30' => esc_attr__( '+03:30', $this->plugin['text'] ),
		'+04:00' => esc_attr__( '+04:00', $this->plugin['text'] ),
		'+04:30' => esc_attr__( '+04:30', $this->plugin['text'] ),
		'+05:00' => esc_attr__( '+05:00', $this->plugin['text'] ),
		'+5:30'  => esc_attr__( '+5:30', $this->plugin['text'] ),
		'+05:45' => esc_attr__( '+05:45', $this->plugin['text'] ),
		'+06:00' => esc_attr__( '+06:00', $this->plugin['text'] ),
		'+06:30' => esc_attr__( '+06:30', $this->plugin['text'] ),
		'+07:00' => esc_attr__( '+07:00', $this->plugin['text'] ),
		'+07:30' => esc_attr__( '+07:30', $this->plugin['text'] ),
		'+08:00' => esc_attr__( '+08:00', $this->plugin['text'] ),
		'+08:30' => esc_attr__( '+08:30', $this->plugin['text'] ),
		'+08:45' => esc_attr__( '+08:45', $this->plugin['text'] ),
		'+09:00' => esc_attr__( '+09:00', $this->plugin['text'] ),
		'+09:30' => esc_attr__( '+09:30', $this->plugin['text'] ),
		'+10:00' => esc_attr__( '+10:00', $this->plugin['text'] ),
		'+10:30' => esc_attr__( '+10:30', $this->plugin['text'] ),
		'+11:00' => esc_attr__( '+11:00', $this->plugin['text'] ),
		'+11:30' => esc_attr__( '+11:30', $this->plugin['text'] ),
		'+12:00' => esc_attr__( '+12:00', $this->plugin['text'] ),
		'+12:45' => esc_attr__( '+12:45', $this->plugin['text'] ),
		'+13:00' => esc_attr__( '+13:00', $this->plugin['text'] ),
		'+13:45' => esc_attr__( '+13:45', $this->plugin['text'] ),
		'+14:00' => esc_attr__( '+14:00', $this->plugin['text'] ),

	],
	'help'    => esc_attr__( '', $this->plugin['text'] ),
	'icon'    => '',
	'func'    => '',
	'tooltip' => esc_attr__( 'Set timezone for counter.', $this->plugin['text'] )
);

$day = array(
	'label'   => esc_attr__( 'Days', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[day]',
		'id'    => 'counterDay',
		'value' => isset( $param['day'] ) ? $param['day'] : '1',
		'min'   => '0',
		'step'  => '1',
	],
	'help'    => esc_attr__( '', $this->plugin['text'] ),
	'tooltip' => esc_attr__( 'Set the days for timer', $this->plugin['text'] ),
);

$hours = array(
	'label'   => esc_attr__( 'Hours', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[hours]',
		'id'    => 'counterHours',
		'value' => isset( $param['hours'] ) ? $param['hours'] : '1',
		'min'   => '0',
		'step'  => '1',
	],
	'help'    => esc_attr__( '', $this->plugin['text'] ),
	'tooltip' => esc_attr__( 'Set the hours for timer', $this->plugin['text'] ),
);

$minutes = array(
	'label'   => esc_attr__( 'Minutes', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[minutes]',
		'id'    => 'counterMinutes',
		'value' => isset( $param['minutes'] ) ? $param['minutes'] : '1',
		'min'   => '0',
		'step'  => '1',
	],
	'help'    => esc_attr__( '', $this->plugin['text'] ),
	'tooltip' => esc_attr__( 'Set the minutes for timer', $this->plugin['text'] ),
);

$seconds = array(
	'label'   => esc_attr__( 'Seconds', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[seconds]',
		'id'    => 'counterSeconds',
		'value' => isset( $param['seconds'] ) ? $param['seconds'] : '10',
		'min'   => '0',
		'step'  => '1',
	],
	'help'    => esc_attr__( '', $this->plugin['text'] ),
	'tooltip' => esc_attr__( 'Set the seconds for timer', $this->plugin['text'] ),
);

$start = array(
//	'label' => esc_attr__( 'Starting number', $this->plugin['text'] ),
	'attr'  => [
		'name'  => 'param[start]',
		'id'    => 'start',
		'class' => 'check-number',
		'value' => isset( $param['start'] ) ? $param['start'] : '1',
		'step'    => 'any',
	],
	'addon' => [
		'unit'    => 'start',
	],
	'help'  => esc_attr__( '', $this->plugin['text'] ),
);

$finish = array(
//	'label' => esc_attr__( 'Finish number', $this->plugin['text'] ),
	'attr'  => [
		'name'  => 'param[finish]',
		'id'    => 'finish',
		'class' => 'check-number',
		'value' => isset( $param['finish'] ) ? $param['finish'] : '5',
		'step'    => 'any',
	],
	'addon' => [
		'unit'    => 'finish',
	],

	'help'  => esc_attr__( '', $this->plugin['text'] ),
);

$speed_min = array(
	'label' => esc_attr__( '', $this->plugin['text'] ),
	'attr' => [
		'name'   => 'param[speed_min]',
		'id'     => 'speed_min',
		'class' => 'check-number',
		'value'    => isset( $param['speed_min'] ) ? $param['speed_min'] : '1',
		'step'    => 'any',
	],
	'addon' => [
		'unit'    => 'min',
	],
	'help' => esc_attr__( '', $this->plugin['text'] ),
);

$speed_max = array(
	'label' => esc_attr__( '', $this->plugin['text'] ),
	'attr' => [
		'name'   => 'param[speed_max]',
		'id'     => 'speed_max',
		'class' => 'check-number',
		'value'    => isset( $param['speed_max'] ) ? $param['speed_max'] : '1',
		'step'    => 'any',
	],
	'addon' => [
		'unit'    => 'max',
	],
	'help' => esc_attr__( '', $this->plugin['text'] ),
);

$increment_min = array(
	'label' => esc_attr__( '', $this->plugin['text'] ),
	'attr' => [
		'name'   => 'param[increment_min]',
		'id'     => 'increment_min',
		'class' => 'check-number',
		'value'    => isset( $param['increment_min'] ) ? $param['increment_min'] : '1',
		'step'    => 'any',
	],
	'addon' => [
		'unit'    => 'min',
	],
	'help' => esc_attr__( '', $this->plugin['text'] ),
);

$increment_max = array(
	'label' => esc_attr__( '', $this->plugin['text'] ),
	'attr' => [
		'name'   => 'param[increment_max]',
		'id'     => 'increment_max',
		'class' => 'check-number',
		'value'    => isset( $param['increment_max'] ) ? $param['increment_max'] : '1',
		'step'    => 'any',
	],
	'addon' => [
		'unit'    => 'max',
	],
	'help' => esc_attr__( '', $this->plugin['text'] ),
);

$rounding = array(
	'label' => esc_attr__( 'Rounding numbers', $this->plugin['text'] ),
	'attr' => [
		'name'   => 'param[rounding]',
		'id'     => 'rounding',
		'value'    => isset( $param['rounding'] ) ? $param['rounding'] : '0',
		'min'         => '0',
		'step'        => '1',
	],
	'help' => esc_attr__( '', $this->plugin['text'] ),
	'tooltip' => esc_attr__( 'Rounds the number after the decimal point. Enter the required number of decimal places', $this->plugin['text'] ),
);

$delimiter = array(
	'label'   => esc_attr__( 'Delimiter of number', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[delimiter]',
		'id'    => 'delimiter',
		'value' => isset( $param['delimiter'] ) ? $param['delimiter'] : '0',
	],

	'help'    => esc_attr__( '', $this->plugin['text'] ),
	'icon'    => '',
	'func'    => '',
	'tooltip' => esc_attr__( 'Divide numbers by digits', $this->plugin['text'] ),
);

$remember = array(
	'label'   => esc_attr__( 'Remember number for user', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[remember]',
		'id'    => 'remember',
		'value' => isset( $param['remember'] ) ? $param['remember'] : '0',
	],
	'help'    => esc_attr__( '', $this->plugin['text'] ),
	'icon'    => '',
	'func'    => '',
	'tooltip' => esc_attr__( 'Remember numbers for user', $this->plugin['text'] ),
);