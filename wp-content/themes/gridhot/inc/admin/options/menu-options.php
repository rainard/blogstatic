<?php
/**
* Menu options
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_menu_options($wp_customize) {

    $wp_customize->add_section( 'gridhot_section_menu_options', array( 'title' => esc_html__( 'Menu Options', 'gridhot' ), 'panel' => 'gridhot_main_options_panel', 'priority' => 100 ) );

    $wp_customize->add_setting( 'gridhot_options[primary_menu_text]', array( 'default' => esc_html__( 'Menu', 'gridhot' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field', ) );

    $wp_customize->add_control( 'gridhot_primary_menu_text_control', array( 'label' => esc_html__( 'Primary Menu Mobile Text', 'gridhot' ), 'section' => 'gridhot_section_menu_options', 'settings' => 'gridhot_options[primary_menu_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'gridhot_options[disable_primary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_disable_primary_menu_control', array( 'label' => esc_html__( 'Disable Primary Menu', 'gridhot' ), 'section' => 'gridhot_section_menu_options', 'settings' => 'gridhot_options[disable_primary_menu]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[secondary_menu_text]', array( 'default' => esc_html__( 'Menu', 'gridhot' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field', ) );

    $wp_customize->add_control( 'gridhot_secondary_menu_text_control', array( 'label' => esc_html__( 'Secondary Menu Mobile Text', 'gridhot' ), 'section' => 'gridhot_section_menu_options', 'settings' => 'gridhot_options[secondary_menu_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'gridhot_options[disable_menu_social_bar]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_disable_menu_social_bar_control', array( 'label' => esc_html__( 'Disable Secondary Menu + Social Area', 'gridhot' ), 'description' => esc_html__('If you checked this option, secondary menu and all buttons will disappear. There is no any effect from these options: "Disable Secondary Menu", "Hide Social Area", "Hide Search Button", "Show Login/Logout Button".', 'gridhot'), 'section' => 'gridhot_section_menu_options', 'settings' => 'gridhot_options[disable_menu_social_bar]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[disable_secondary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_disable_secondary_menu_control', array( 'label' => esc_html__( 'Disable Secondary Menu', 'gridhot' ), 'description' => esc_html__('This option has no effect if you have checked the option: "Disable Secondary Menu + Social Area".', 'gridhot'), 'section' => 'gridhot_section_menu_options', 'settings' => 'gridhot_options[disable_secondary_menu]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[secondary_menu_location]', array( 'default' => 'before-header', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_secondary_menu_location' ) );

    $wp_customize->add_control( 'gridhot_secondary_menu_location_control', array( 'label' => esc_html__( 'Select Secondary Menu Location', 'gridhot' ), 'description' => esc_html__('Select where you want to display secondary menu.', 'gridhot'), 'section' => 'gridhot_section_menu_options', 'settings' => 'gridhot_options[secondary_menu_location]', 'type' => 'select', 'choices' => array( 'before-header' => esc_html__('Before Header', 'gridhot'), 'after-header' => esc_html__('After Header', 'gridhot'), 'before-footer' => esc_html__('Before Footer', 'gridhot'), 'after-footer' => esc_html__('After Footer', 'gridhot') ) ) );

    $wp_customize->add_setting( 'gridhot_options[center_secondary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_center_secondary_menu_control', array( 'label' => esc_html__( 'Center Secondary Menu', 'gridhot' ), 'section' => 'gridhot_section_menu_options', 'settings' => 'gridhot_options[center_secondary_menu]', 'type' => 'checkbox', ) );

}