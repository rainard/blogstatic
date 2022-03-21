<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Tergeting settings
 *
 * @package     Wow_Plugin
 * @subpackage  Settings
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */


//region Schedule
$weekday = array(
	'label'   => esc_attr__( 'Day of the week', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[weekday]',
		'id'    => 'weekday',
		'value' => isset( $param['weekday'] ) ? $param['weekday'] : 'none',
	],
	'options' => [
		'none' => esc_attr__( 'Everyday', $this->plugin['text'] ),
		'1'    => esc_attr__( 'Monday', $this->plugin['text'] ),
		'2'    => esc_attr__( 'Tuesday', $this->plugin['text'] ),
		'3'    => esc_attr__( 'Wednesday', $this->plugin['text'] ),
		'4'    => esc_attr__( 'Thursday', $this->plugin['text'] ),
		'5'    => esc_attr__( 'Friday', $this->plugin['text'] ),
		'6'    => esc_attr__( 'Saturday', $this->plugin['text'] ),
		'7'    => esc_attr__( 'Sunday ', $this->plugin['text'] ),

	],
	'tooltip' => esc_attr__( 'Select the day of the week when the counter will be displayed.', $this->plugin['text'] ),
	'icon'    => '',
	'func'    => '',
);

$time_start = array(
	'label'   => esc_attr__( 'Time from', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[time_start]',
		'id'    => 'time_start',
		'value' => isset( $param['time_start'] ) ? $param['time_start'] : '00:00',
	],
	'tooltip' => esc_attr__( 'Specify what from time of the day to show the counter', $this->plugin['text'] ),
	'icon'    => '',
);

$time_end = array(
	'label'   => esc_attr__( 'Time to', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[time_end]',
		'id'    => 'time_end',
		'value' => isset( $param['time_end'] ) ? $param['time_end'] : '23:59',
	],
	'tooltip' => esc_attr__( 'Specify what to time of the day to show the counter.', $this->plugin['text'] ),
	'icon'    => '',
);

$set_dates = array(
	'label'   => esc_attr__( 'Set Dates', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[set_dates]',
		'id'    => 'set_dates',
		'value' => isset( $param['set_dates'] ) ? $param['set_dates'] : '',
	],
	'tooltip' => esc_attr__( 'Check this if you want to set the show counter between dates.', $this->plugin['text'] ),
	'icon'    => '',
	'func'    => 'setDate',
);

$date_start = array(
	'label'   => esc_attr__( 'Date Start', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[date_start]',
		'id'    => 'date_start',
		'value' => isset( $param['date_start'] ) ? $param['date_start'] : '',
	],
	'tooltip' => esc_attr__( 'Set the date start.', $this->plugin['text'] ),
	'icon'    => '',
);

$date_end = array(
	'label'   => esc_attr__( 'Date End', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[date_end]',
		'id'    => 'date_end',
		'value' => isset( $param['date_end'] ) ? $param['date_end'] : '',
	],
	'tooltip' => esc_attr__( 'Set the date end', $this->plugin['text'] ),
);


//endregion

//region Users Role
$item_user = array(
	'label'   => esc_attr__( 'Show for users', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[item_user]',
		'id'    => 'item_user',
		'value' => isset( $param['item_user'] ) ? $param['item_user'] : '',
	],
	'options' => [
		'1' => esc_attr__( 'All Users', $this->plugin['text'] ),
		'2' => esc_attr__( 'Authorized Users', $this->plugin['text'] ),
		'3' => esc_attr__( 'Unauthorized Users', $this->plugin['text'] ),
	],
	'icon'    => '',
	'func'    => 'userRole()',
);

// Users role
$add_users      = array( 'all' => array( 'name' => esc_attr__( 'All Users', $this->plugin['text'] ) ) );
$editable_role  = array_reverse( get_editable_roles() );
$editable_roles = array_merge( $add_users, $editable_role );
$users_arr      = array();
foreach ( $editable_roles as $role => $details ) {
	$name                           = translate_user_role( $details['name'] );
	$users_arr[ esc_attr( $role ) ] = $name;
}

$user_role = array(
	'label'   => esc_attr__( 'User Role', $this->plugin['text'] ),
	'attr'    => [
		'name'  => 'param[user_role]',
		'id'    => 'user_role',
		'value' => isset( $param['user_role'] ) ? $param['user_role'] : 'all',
	],
	'options' => $users_arr,
);
//endregion

//region languages
$language = array(
	'label'    => esc_attr__( 'Language dependency', $this->plugin['text'] ),
	'checkbox' => [
		'name'  => 'param[language_checkbox]',
		'id'    => 'language_checkbox',
		'class' => 'checkLabel',
		'value' => isset( $param['language_checkbox'] ) ? $param['language_checkbox'] : 0,
	],
	'attr'     => [
		'name'  => 'param[language]',
		'id'    => 'language',
		'value' => isset( $param['language'] ) ? $param['language'] : 'en',
	],
	'options'  => [
		'ar'  => 'العربية',
		'az'  => 'Azərbaycan dili',
		'bg'  => 'Български',
		'bn'  => 'বাংলা',
		'bs'  => 'Bosanski',
		'ca'  => 'Català',
		'ceb' => 'Cebuano',
		'cs'  => 'Čeština‎',
		'cy'  => 'Cymraeg',
		'da'  => 'Dansk',
		'de'  => 'Deutsch',
		'el'  => 'Ελληνικά',
		'en'  => 'English',
		'eo'  => 'Esperanto',
		'es'  => 'Español',
		'et'  => 'Eesti',
		'eu'  => 'Euskara',
		'fa'  => 'فارسی',
		'fi'  => 'Suomi',
		'fr'  => 'Français',
		'gd'  => 'Gàidhlig',
		'gl'  => 'Galego',
		'haz' => 'هزاره گی',
		'he'  => 'עִבְרִית',
		'hi'  => 'हिन्दी',
		'hr'  => 'Hrvatski',
		'hu'  => 'Magyar',
		'hy'  => 'Հայերեն',
		'id'  => 'Bahasa Indonesia',
		'is'  => 'Íslenska',
		'it'  => 'Italiano',
		'ja'  => '日本語',
		'ka'  => 'ქართული',
		'ko'  => '한국어',
		'lt'  => 'Lietuvių kalba',
		'mk'  => 'Македонски јазик',
		'mr'  => 'मराठी',
		'ms'  => 'Bahasa Melayu',
		'my'  => 'ဗမာစာ',
		'nb'  => 'Norsk bokmål',
		'nl'  => 'Nederlands',
		'nn'  => 'Norsk nynorsk',
		'oc'  => 'Occitan',
		'pl'  => 'Polski',
		'ps'  => 'پښتو',
		'pt'  => 'Português',
		'ro'  => 'Română',
		'ru'  => 'Русский',
		'sk'  => 'Slovenčina',
		'sl'  => 'Slovenščina',
		'sq'  => 'Shqip',
		'sr'  => 'Српски језик',
		'sv'  => 'Svenska',
		'th'  => 'ไทย',
		'tl'  => 'Tagalog',
		'tr'  => 'Türkçe',
		'ug'  => 'Uyƣurqə',
		'uk'  => 'Українська',
		'vi'  => 'Tiếng Việt',
		'zh'  => '简体中文',
	],
	'tooltip'  => esc_attr__( 'Choose the language in which the counter will be displayed.', $this->plugin['text'] ),
);
//endregion


