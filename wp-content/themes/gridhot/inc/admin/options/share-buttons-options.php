<?php
/**
* Share Button options
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_share_buttons_options($wp_customize) {

    $wp_customize->add_section( 'gridhot_section_share', array( 'title' => esc_html__( 'Share Buttons Options', 'gridhot' ), 'panel' => 'gridhot_main_options_panel', 'priority' => 260 ) );

    $wp_customize->add_setting( 'gridhot_options[hide_share_buttons_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_share_buttons_home_control', array( 'label' => esc_html__( 'Hide Share Buttons from Posts Summaries', 'gridhot' ), 'section' => 'gridhot_section_share', 'settings' => 'gridhot_options[hide_share_buttons_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_share_text_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_share_text_home_control', array( 'label' => esc_html__( 'Hide Share Text from Posts Summaries', 'gridhot' ), 'section' => 'gridhot_section_share', 'settings' => 'gridhot_options[hide_share_text_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[share_text_home]', array( 'default' => esc_html__( 'Share:', 'gridhot' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_html', ) );

    $wp_customize->add_control( 'gridhot_share_text_home_control', array( 'label' => esc_html__( 'Share Text for Posts Summaries', 'gridhot' ), 'section' => 'gridhot_section_share', 'settings' => 'gridhot_options[share_text_home]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_share_twitter_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_share_twitter_home_control', array( 'label' => esc_html__( 'Hide Twitter Share Button from Posts Summaries', 'gridhot' ), 'section' => 'gridhot_section_share', 'settings' => 'gridhot_options[hide_share_twitter_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_share_facebook_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_share_facebook_home_control', array( 'label' => esc_html__( 'Hide Facebook Share Button from Posts Summaries', 'gridhot' ), 'section' => 'gridhot_section_share', 'settings' => 'gridhot_options[hide_share_facebook_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_share_pinterest_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_share_pinterest_home_control', array( 'label' => esc_html__( 'Hide Pinterest Share Button from Posts Summaries', 'gridhot' ), 'section' => 'gridhot_section_share', 'settings' => 'gridhot_options[hide_share_pinterest_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_share_linkedin_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_share_linkedin_home_control', array( 'label' => esc_html__( 'Hide Linkedin Share Button from Posts Summaries', 'gridhot' ), 'section' => 'gridhot_section_share', 'settings' => 'gridhot_options[hide_share_linkedin_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[show_share_addthis_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_show_share_addthis_home_control', array( 'label' => esc_html__( 'Show AddThis Button in Posts Summaries', 'gridhot' ), 'section' => 'gridhot_section_share', 'settings' => 'gridhot_options[show_share_addthis_home]', 'type' => 'checkbox', ) );

}