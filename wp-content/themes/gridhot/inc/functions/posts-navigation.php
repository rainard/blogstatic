<?php
/**
* Posts navigation functions
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'gridhot_wp_pagenavi' ) ) :
function gridhot_wp_pagenavi() {
    ?>
    <nav class="navigation posts-navigation gridhot-clearfix" role="navigation">
        <?php wp_pagenavi(); ?>
    </nav><!-- .navigation -->
    <?php
}
endif;

if ( ! function_exists( 'gridhot_posts_navigation' ) ) :
function gridhot_posts_navigation() {
    if ( !(gridhot_get_option('hide_posts_navigation')) ) {
        if ( function_exists( 'wp_pagenavi' ) ) {
            gridhot_wp_pagenavi();
        } else {
            if ( gridhot_get_option('posts_navigation_type') === 'normalnavi' ) {
                the_posts_navigation(array('prev_text' => esc_html__( 'Older posts', 'gridhot' ), 'next_text' => esc_html__( 'Newer posts', 'gridhot' )));
            } else {
                the_posts_pagination(array('mid_size' => 2, 'prev_text' => esc_html__( '&larr; Newer posts', 'gridhot' ), 'next_text' => esc_html__( 'Older posts &rarr;', 'gridhot' )));
            }
        }
    }
}
endif;

if ( ! function_exists( 'gridhot_post_navigation' ) ) :
function gridhot_post_navigation() {
    global $post;
    if ( !(gridhot_get_option('hide_post_navigation')) ) {
            the_post_navigation(array('prev_text' => esc_html__( '%title &rarr;', 'gridhot' ), 'next_text' => esc_html__( '&larr; %title', 'gridhot' )));
    }
}
endif;