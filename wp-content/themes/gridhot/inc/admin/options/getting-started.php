<?php
/**
* Getting started options
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_getting_started($wp_customize) {

    $wp_customize->add_section( 'gridhot_section_getting_started', array( 'title' => esc_html__( 'Getting Started', 'gridhot' ), 'description' => esc_html__( 'Thanks for your interest in GridHot! If you have any questions or run into any trouble, please visit us the following links. We will get you fixed up!', 'gridhot' ), 'panel' => 'gridhot_main_options_panel', 'priority' => 5, ) );

    $wp_customize->add_setting( 'gridhot_options[documentation]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new GridHot_Customize_Button_Control( $wp_customize, 'gridhot_documentation_control', array( 'label' => esc_html__( 'Documentation', 'gridhot' ), 'section' => 'gridhot_section_getting_started', 'settings' => 'gridhot_options[documentation]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => esc_url( 'https://themesdna.com/gridhot-wordpress-theme/' ), 'button_target' => '_blank', ) ) );

    $wp_customize->add_setting( 'gridhot_options[contact]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new GridHot_Customize_Button_Control( $wp_customize, 'gridhot_contact_control', array( 'label' => esc_html__( 'Contact Us', 'gridhot' ), 'section' => 'gridhot_section_getting_started', 'settings' => 'gridhot_options[contact]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => esc_url( 'https://themesdna.com/contact/' ), 'button_target' => '_blank', ) ) );

}