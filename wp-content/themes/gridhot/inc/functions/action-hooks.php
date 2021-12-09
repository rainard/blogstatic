<?php
/**
* Custom Hooks
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_before_header() {
    do_action('gridhot_before_header');
}

function gridhot_after_header() {
    do_action('gridhot_after_header');
}

function gridhot_before_main_content() {
    do_action('gridhot_before_main_content');
}
add_action('gridhot_before_main_content', 'gridhot_top_widgets', 20 );
add_action('gridhot_before_main_content', 'gridhot_top_left_right_widgets', 40 );

function gridhot_after_main_content() {
    do_action('gridhot_after_main_content');
}
add_action('gridhot_after_main_content', 'gridhot_bottom_widgets', 10 );

function gridhot_sidebar_one() {
    do_action('gridhot_sidebar_one');
}
add_action('gridhot_sidebar_one', 'gridhot_sidebar_one_widgets', 10 );

function gridhot_before_single_post() {
    do_action('gridhot_before_single_post');
}

function gridhot_before_single_post_title() {
    do_action('gridhot_before_single_post_title');
}

function gridhot_after_single_post_title() {
    do_action('gridhot_after_single_post_title');
}

function gridhot_top_single_post_content() {
    do_action('gridhot_top_single_post_content');
}

function gridhot_bottom_single_post_content() {
    do_action('gridhot_bottom_single_post_content');
}

function gridhot_after_single_post_content() {
    do_action('gridhot_after_single_post_content');
}

function gridhot_after_single_post() {
    do_action('gridhot_after_single_post');
}

function gridhot_before_single_page() {
    do_action('gridhot_before_single_page');
}

function gridhot_before_single_page_title() {
    do_action('gridhot_before_single_page_title');
}

function gridhot_after_single_page_title() {
    do_action('gridhot_after_single_page_title');
}

function gridhot_after_single_page_content() {
    do_action('gridhot_after_single_page_content');
}

function gridhot_after_single_page() {
    do_action('gridhot_after_single_page');
}

function gridhot_before_comments() {
    do_action('gridhot_before_comments');
}

function gridhot_after_comments() {
    do_action('gridhot_after_comments');
}

function gridhot_before_footer() {
    do_action('gridhot_before_footer');
}

function gridhot_after_footer() {
    do_action('gridhot_after_footer');
}

function gridhot_before_nongrid_post_title() {
    do_action('gridhot_before_nongrid_post_title');
}

function gridhot_after_nongrid_post_title() {
    do_action('gridhot_after_nongrid_post_title');
}