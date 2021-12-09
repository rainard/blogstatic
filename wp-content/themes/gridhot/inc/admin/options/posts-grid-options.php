<?php
/**
* Posts Grid options
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_posts_grid_options($wp_customize) {

    $wp_customize->add_section( 'gridhot_section_posts_grid', array( 'title' => esc_html__( 'Posts Grid Options', 'gridhot' ), 'panel' => 'gridhot_main_options_panel', 'priority' => 160 ) );

    $wp_customize->add_setting( 'gridhot_options[hide_posts_heading]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_posts_heading_control', array( 'label' => esc_html__( 'Hide HomePage Posts Heading', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[hide_posts_heading]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[posts_heading]', array( 'default' => esc_html__( 'Recent Posts', 'gridhot' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field', ) );

    $wp_customize->add_control( 'gridhot_posts_heading_control', array( 'label' => esc_html__( 'HomePage Posts Heading', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[posts_heading]', 'type' => 'text', ) );


    $wp_customize->add_setting( 'gridhot_options[hide_thumbnail_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_thumbnail_home_control', array( 'label' => esc_html__( 'Hide Thumbnails of Featured Images from Posts Grid', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[hide_thumbnail_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_default_thumbnail]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_default_thumbnail_control', array( 'label' => esc_html__( 'Hide Default Thumbnail Image', 'gridhot' ), 'description' => esc_html__( 'The default thumbnail image is shown when there is no featured image is set.', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[hide_default_thumbnail]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[thumbnail_link_home]', array( 'default' => 'yes', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_yes_no' ) );

    $wp_customize->add_control( 'gridhot_thumbnail_link_home_control', array( 'label' => esc_html__( 'Thumbnails Links', 'gridhot' ), 'description' => esc_html__('Do you want thumbnails in the posts grid to be linked to their posts?', 'gridhot'), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[thumbnail_link_home]', 'type' => 'select', 'choices' => array( 'yes' => esc_html__('Yes', 'gridhot'), 'no' => esc_html__('No', 'gridhot') ) ) );


    $wp_customize->add_setting( 'gridhot_options[hide_post_title_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_post_title_home_control', array( 'label' => esc_html__( 'Hide Post Headers from Posts Grid', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[hide_post_title_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[post_title_link_home]', array( 'default' => 'yes', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_yes_no' ) );

    $wp_customize->add_control( 'gridhot_post_title_link_home_control', array( 'label' => esc_html__( 'Posts Titles Links', 'gridhot' ), 'description' => esc_html__('Do you want post titles in the posts grid to be linked to their posts?', 'gridhot'), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[post_title_link_home]', 'type' => 'select', 'choices' => array( 'yes' => esc_html__('Yes', 'gridhot'), 'no' => esc_html__('No', 'gridhot') ) ) );


    $wp_customize->add_setting( 'gridhot_options[hide_post_author_image_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_post_author_image_home_control', array( 'label' => esc_html__( 'Hide Post Author Images from Posts Grid', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[hide_post_author_image_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[author_image_link]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_author_image_link_control', array( 'label' => esc_html__( 'Link Author Image to Author Posts URL', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[author_image_link]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_post_author_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_post_author_home_control', array( 'label' => esc_html__( 'Hide Post Author Names from Posts Grid', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[hide_post_author_home]', 'type' => 'checkbox', ) );


    $wp_customize->add_setting( 'gridhot_options[hide_posted_date_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_posted_date_home_control', array( 'label' => esc_html__( 'Hide Posted Dates from Posts Grid', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[hide_posted_date_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[show_posted_date_box_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_show_posted_date_box_home_control', array( 'label' => esc_html__( 'Show Posted Date Boxes on Posts Thumbnails', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[show_posted_date_box_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_posted_date_year_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_posted_date_year_home_control', array( 'label' => esc_html__( 'Hide Years from Posted Date Boxes', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[hide_posted_date_year_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[date_box_style]', array( 'default' => 'square', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_date_box_style' ) );

    $wp_customize->add_control( 'gridhot_date_box_style_control', array( 'label' => esc_html__( 'Posted Date Boxes Style', 'gridhot' ), 'description' => esc_html__('Select "round" or "square" style for posted date boxes.', 'gridhot'), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[date_box_style]', 'type' => 'select', 'choices' => array( 'square' => esc_html__('Square', 'gridhot'), 'round' => esc_html__('Round', 'gridhot') ) ) );


    $wp_customize->add_setting( 'gridhot_options[hide_comments_link_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_comments_link_home_control', array( 'label' => esc_html__( 'Hide Comment Links from Posts Grid', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[hide_comments_link_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[comments_count_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_comments_count_home_control', array( 'label' => esc_html__( 'Display Comments Counts only on Posts Grid', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[comments_count_home]', 'type' => 'checkbox', ) );


    $wp_customize->add_setting( 'gridhot_options[hide_post_snippet]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_post_snippet_control', array( 'label' => esc_html__( 'Hide Post Snippets from Posts Grid', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[hide_post_snippet]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[read_more_length]', array( 'default' => 17, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_read_more_length' ) );

    $wp_customize->add_control( 'gridhot_read_more_length_control', array( 'label' => esc_html__( 'Auto Post Summary Length', 'gridhot' ), 'description' => esc_html__('Enter the number of words need to display in the post summary. Default is 20 words.', 'gridhot'), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[read_more_length]', 'type' => 'text' ) );


    $wp_customize->add_setting( 'gridhot_options[hide_post_categories_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_post_categories_home_control', array( 'label' => esc_html__( 'Hide Post Categories from Posts Grid', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[hide_post_categories_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridhot_options[hide_post_tags_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_hide_post_tags_home_control', array( 'label' => esc_html__( 'Hide Post Tags from Posts Grid', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[hide_post_tags_home]', 'type' => 'checkbox', ) );


    $wp_customize->add_setting( 'gridhot_options[disable_posts_grid]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_disable_posts_grid_control', array( 'label' => esc_html__( 'Activate Non-Grid Posts', 'gridhot' ), 'description' => __( 'Check this option if you want to disable posts grid and display posts in normal way.', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[disable_posts_grid]', 'type' => 'checkbox', ) );


    $wp_customize->add_setting( 'gridhot_options[featured_nongrid_media_under_post_title]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridhot_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridhot_featured_nongrid_media_under_post_title_control', array( 'label' => esc_html__( 'Move Featured Image to Bottom of Non-Grid Post Title', 'gridhot' ), 'section' => 'gridhot_section_posts_grid', 'settings' => 'gridhot_options[featured_nongrid_media_under_post_title]', 'type' => 'checkbox', ) );

}