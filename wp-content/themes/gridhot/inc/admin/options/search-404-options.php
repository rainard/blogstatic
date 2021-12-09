<?php
/**
* 404 options
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_search_404_options($wp_customize) {

    $wp_customize->add_section( 'gridhot_section_search_404', array( 'title' => esc_html__( 'Search and 404 Pages Options', 'gridhot' ), 'panel' => 'gridhot_main_options_panel', 'priority' => 340 ) );

    $wp_customize->add_setting( 'gridhot_options[no_search_heading]', array( 'default' => esc_html__( 'Nothing Found', 'gridhot' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_html', ) );

    $wp_customize->add_control( 'gridhot_no_search_heading_control', array( 'label' => esc_html__( 'No Search Results Heading', 'gridhot' ), 'description' => esc_html__( 'Enter a heading to display when no search results are found.', 'gridhot' ), 'section' => 'gridhot_section_search_404', 'settings' => 'gridhot_options[no_search_heading]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[no_search_results]', array( 'default' => esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'gridhot' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_html', ) );

    $wp_customize->add_control( 'gridhot_no_search_results_control', array( 'label' => esc_html__( 'No Search Results Message', 'gridhot' ), 'description' => esc_html__( 'Enter a message to display when no search results are found.', 'gridhot' ), 'section' => 'gridhot_section_search_404', 'settings' => 'gridhot_options[no_search_results]', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'gridhot_options[error_404_heading]', array( 'default' => esc_html__( 'Oops! That page can not be found.', 'gridhot' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_html', ) );

    $wp_customize->add_control( 'gridhot_error_404_heading_control', array( 'label' => esc_html__( '404 Error Page Heading', 'gridhot' ), 'description' => esc_html__( 'Enter the heading for the 404 error page.', 'gridhot' ), 'section' => 'gridhot_section_search_404', 'settings' => 'gridhot_options[error_404_heading]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridhot_options[error_404_message]', array( 'default' => esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'gridhot' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_html', ) );

    $wp_customize->add_control( 'gridhot_error_404_message_control', array( 'label' => esc_html__( 'Error 404 Message', 'gridhot' ), 'description' => esc_html__( 'Enter a message to display on the 404 error page.', 'gridhot' ), 'section' => 'gridhot_section_search_404', 'settings' => 'gridhot_options[error_404_message]', 'type' => 'textarea', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_404_search]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_404_search_control', array( 'label' => esc_html__( 'Hide Search Box from 404 Page', 'gridhot' ), 'section' => 'gridhot_section_search_404', 'settings' => 'gridhot_options[hide_404_search]', 'type' => 'checkbox', ) );

}