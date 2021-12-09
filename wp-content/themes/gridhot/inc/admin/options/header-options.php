<?php
/**
* Header options
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_header_options($wp_customize) {

    // Header
    $wp_customize->add_section( 'gridhot_section_header', array( 'title' => esc_html__( 'Header Options', 'gridhot' ), 'panel' => 'gridhot_main_options_panel', 'priority' => 120 ) );

    $wp_customize->add_setting( 'gridhot_options[hide_tagline]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_tagline_control', array( 'label' => esc_html__( 'Hide Tagline', 'gridhot' ), 'section' => 'gridhot_section_header', 'settings' => 'gridhot_options[hide_tagline]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_header_content]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_header_content_control', array( 'label' => esc_html__( 'Hide Header Content', 'gridhot' ), 'section' => 'gridhot_section_header', 'settings' => 'gridhot_options[hide_header_content]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[logo_location]', array( 'default' => 'above-title', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_logo_location' ) );

    $wp_customize->add_control( 'gridhot_logo_location_control', array( 'label' => esc_html__( 'Logo Location', 'gridhot' ), 'description' => esc_html__('Select how you want to display the site logo with site title and tagline.', 'gridhot'), 'section' => 'title_tagline', 'settings' => 'gridhot_options[logo_location]', 'type' => 'select', 'choices' => array( 'beside-title' => esc_html__( 'Before Site Title and Tagline', 'gridhot' ), 'above-title' => esc_html__( 'Above Site Title and Tagline', 'gridhot' ) ), 'priority'   => 8 ) );


    $wp_customize->add_setting( 'gridhot_options[hide_header_image]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_header_image_control', array( 'label' => esc_html__( 'Hide Header Image from Everywhere', 'gridhot' ), 'section' => 'header_image', 'settings' => 'gridhot_options[hide_header_image]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[remove_header_image_link]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_remove_header_image_link_control', array( 'label' => esc_html__( 'Remove Link from Header Image', 'gridhot' ), 'section' => 'header_image', 'settings' => 'gridhot_options[remove_header_image_link]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_header_image_details]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_header_image_details_control', array( 'label' => esc_html__( 'Hide both Title and Description from Header Image', 'gridhot' ), 'description' => esc_html__('If you checked this option, header image title and description will be hidden from all screen sizes.', 'gridhot'), 'section' => 'header_image', 'settings' => 'gridhot_options[hide_header_image_details]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_header_image_title]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_header_image_title_control', array( 'label' => esc_html__( 'Hide Title from Header Image', 'gridhot' ), 'description' => esc_html__('If you checked this option, header image title will be hidden from all screen sizes. This option has no effect if you have checked the option: "Hide both Title and Description from Header Image"', 'gridhot'), 'section' => 'header_image', 'settings' => 'gridhot_options[hide_header_image_title]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_header_image_description]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_header_image_description_control', array( 'label' => esc_html__( 'Hide Description from Header Image', 'gridhot' ), 'description' => esc_html__('If you checked this option, header image description will be hidden from all screen sizes. This option has no effect if you have checked the option: "Hide both Title and Description from Header Image"', 'gridhot'), 'section' => 'header_image', 'settings' => 'gridhot_options[hide_header_image_description]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[header_image_custom_text]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_header_image_custom_text_control', array( 'label' => esc_html__( 'Add Custom Title/Custom Description to Header Image', 'gridhot' ), 'section' => 'header_image', 'settings' => 'gridhot_options[header_image_custom_text]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[header_image_custom_title]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_html', ) );

    $wp_customize->add_control( 'gridhot_header_image_custom_title_control', array( 'label' => esc_html__( 'Header Image Custom Title', 'gridhot' ), 'section' => 'header_image', 'settings' => 'gridhot_options[header_image_custom_title]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'gridhot_options[header_image_custom_description]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_html', ) );

    $wp_customize->add_control( 'gridhot_header_image_custom_description_control', array( 'label' => esc_html__( 'Header Image Custom Description', 'gridhot' ), 'section' => 'header_image', 'settings' => 'gridhot_options[header_image_custom_description]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'gridhot_options[header_image_destination]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridhot_header_image_destination_control', array( 'label' => esc_html__( 'Header Image Destination URL', 'gridhot' ), 'description' => esc_html__( 'Enter the URL a visitor should go when he/she click on the header image. If you did not enter a URL below, header image will be linked to the homepage of your website.', 'gridhot' ), 'section' => 'header_image', 'settings' => 'gridhot_options[header_image_destination]', 'type' => 'text' ) );

}