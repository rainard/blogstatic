<?php
/**
* Footer options
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_footer_options($wp_customize) {

    $wp_customize->add_section( 'gridhot_section_footer', array( 'title' => esc_html__( 'Footer Options', 'gridhot' ), 'panel' => 'gridhot_main_options_panel', 'priority' => 280 ) );

    $wp_customize->add_setting( 'gridhot_options[footer_text]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_html', ) );

    $wp_customize->add_control( 'gridhot_footer_text_control', array( 'label' => esc_html__( 'Footer copyright notice', 'gridhot' ), 'section' => 'gridhot_section_footer', 'settings' => 'gridhot_options[footer_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_footer_widgets]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_footer_widgets_control', array( 'label' => esc_html__( 'Hide Footer Widgets', 'gridhot' ), 'section' => 'gridhot_section_footer', 'settings' => 'gridhot_options[hide_footer_widgets]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[disable_backtotop]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_disable_backtotop_control', array( 'label' => esc_html__( 'Disable Back to Top Button', 'gridhot' ), 'section' => 'gridhot_section_footer', 'settings' => 'gridhot_options[disable_backtotop]', 'type' => 'checkbox', ) );

}