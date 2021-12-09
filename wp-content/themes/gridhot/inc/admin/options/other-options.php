<?php
/**
* Other options
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_other_options($wp_customize) {

    $wp_customize->add_section( 'gridhot_section_other_options', array( 'title' => esc_html__( 'Other Options', 'gridhot' ), 'panel' => 'gridhot_main_options_panel', 'priority' => 600 ) );

    $wp_customize->add_setting( 'gridhot_options[enable_widgets_block_editor]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_enable_widgets_block_editor_control', array( 'label' => esc_html__( 'Enable Gutenberg Widget Block Editor', 'gridhot' ), 'section' => 'gridhot_section_other_options', 'settings' => 'gridhot_options[enable_widgets_block_editor]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[disable_loading_animation]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_disable_loading_animation_control', array( 'label' => esc_html__( 'Disable Site Loading Animation', 'gridhot' ), 'section' => 'gridhot_section_other_options', 'settings' => 'gridhot_options[disable_loading_animation]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[disable_fitvids]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_disable_fitvids_control', array( 'label' => esc_html__( 'Disable FitVids.JS', 'gridhot' ), 'description' => esc_html__( 'You can disable fitvids.js script if you are not using videos on your website or if you do not want fluid width videos in your post content.', 'gridhot' ), 'section' => 'gridhot_section_other_options', 'settings' => 'gridhot_options[disable_fitvids]', 'type' => 'checkbox', ) );

}