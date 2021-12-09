<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_widgets_init() {

register_sidebar(array(
    'id' => 'gridhot-sidebar-one',
    'name' => esc_html__( 'Sidebar 1 Widgets', 'gridhot' ),
    'description' => esc_html__( 'This widget area is located on the left-hand side of your web page.', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-side-widget widget gridhot-widget-box %2$s"><div class="gridhot-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridhot-widget-header"><div class="gridhot-widget-header-inside"><h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2></div></div>'));

register_sidebar(array(
    'id' => 'gridhot-home-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Default HomePage)', 'gridhot' ),
    'description' => esc_html__( 'This full-width widget area is located after the header of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-main-widget widget gridhot-widget-box %2$s"><div class="gridhot-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridhot-widget-header"><div class="gridhot-widget-header-inside"><h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2></div></div>'));

register_sidebar(array(
    'id' => 'gridhot-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Everywhere)', 'gridhot' ),
    'description' => esc_html__( 'This full-width widget area is located after the header of your website. Widgets of this widget area are displayed on every page of your website.', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-main-widget widget gridhot-widget-box %2$s"><div class="gridhot-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridhot-widget-header"><div class="gridhot-widget-header-inside"><h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2></div></div>'));

register_sidebar(array(
    'id' => 'gridhot-home-top-widgets',
    'name' => esc_html__( 'Above Content Widgets (Default HomePage)', 'gridhot' ),
    'description' => esc_html__( 'This widget area is located at the top of the main content (above posts) of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-main-widget widget gridhot-widget-box %2$s"><div class="gridhot-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridhot-widget-header"><div class="gridhot-widget-header-inside"><h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2></div></div>'));

register_sidebar(array(
    'id' => 'gridhot-top-widgets',
    'name' => esc_html__( 'Above Content Widgets (Everywhere)', 'gridhot' ),
    'description' => esc_html__( 'This widget area is located at the top of the main content (above posts) of your website. Widgets of this widget area are displayed on every page of your website.', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-main-widget widget gridhot-widget-box %2$s"><div class="gridhot-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridhot-widget-header"><div class="gridhot-widget-header-inside"><h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2></div></div>'));

register_sidebar(array(
    'id' => 'gridhot-home-left-top-widgets',
    'name' => esc_html__( 'Top Left Widgets (Default HomePage)', 'gridhot' ),
    'description' => esc_html__( 'This widget area is located at the left top of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-main-widget widget gridhot-widget-box %2$s"><div class="gridhot-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridhot-widget-header"><div class="gridhot-widget-header-inside"><h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2></div></div>'));

register_sidebar(array(
    'id' => 'gridhot-left-top-widgets',
    'name' => esc_html__( 'Top Left Widgets (Everywhere)', 'gridhot' ),
    'description' => esc_html__( 'This widget area is located at the left top of your website. Widgets of this widget area are displayed on every page of your website.', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-main-widget widget gridhot-widget-box %2$s"><div class="gridhot-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridhot-widget-header"><div class="gridhot-widget-header-inside"><h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2></div></div>'));

register_sidebar(array(
    'id' => 'gridhot-home-right-top-widgets',
    'name' => esc_html__( 'Top Right Widgets (Default HomePage)', 'gridhot' ),
    'description' => esc_html__( 'This widget area is located at the right top of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-main-widget widget gridhot-widget-box %2$s"><div class="gridhot-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridhot-widget-header"><div class="gridhot-widget-header-inside"><h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2></div></div>'));

register_sidebar(array(
    'id' => 'gridhot-right-top-widgets',
    'name' => esc_html__( 'Top Right Widgets (Everywhere)', 'gridhot' ),
    'description' => esc_html__( 'This widget area is located at the right top of your website. Widgets of this widget area are displayed on every page of your website.', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-main-widget widget gridhot-widget-box %2$s"><div class="gridhot-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridhot-widget-header"><div class="gridhot-widget-header-inside"><h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2></div></div>'));

register_sidebar(array(
    'id' => 'gridhot-home-bottom-widgets',
    'name' => esc_html__( 'Below Content Widgets (Default HomePage)', 'gridhot' ),
    'description' => esc_html__( 'This widget area is located at the bottom of the main content (below posts) of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-main-widget widget gridhot-widget-box %2$s"><div class="gridhot-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridhot-widget-header"><div class="gridhot-widget-header-inside"><h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2></div></div>'));

register_sidebar(array(
    'id' => 'gridhot-bottom-widgets',
    'name' => esc_html__( 'Below Content Widgets (Everywhere)', 'gridhot' ),
    'description' => esc_html__( 'This widget area is located at the bottom of the main content (below posts) of your website. Widgets of this widget area are displayed on every page of your website.', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-main-widget widget gridhot-widget-box %2$s"><div class="gridhot-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridhot-widget-header"><div class="gridhot-widget-header-inside"><h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2></div></div>'));

register_sidebar(array(
    'id' => 'gridhot-home-fullwidth-bottom-widgets',
    'name' => esc_html__( 'Bottom Full Width Widgets (Default HomePage)', 'gridhot' ),
    'description' => esc_html__( 'This full-width widget area is located before the footer of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-main-widget widget gridhot-widget-box %2$s"><div class="gridhot-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridhot-widget-header"><div class="gridhot-widget-header-inside"><h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2></div></div>'));

register_sidebar(array(
    'id' => 'gridhot-fullwidth-bottom-widgets',
    'name' => esc_html__( 'Bottom Full Width Widgets (Everywhere)', 'gridhot' ),
    'description' => esc_html__( 'This full-width widget area is located before the footer of your website. Widgets of this widget area are displayed on every page of your website.', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-main-widget widget gridhot-widget-box %2$s"><div class="gridhot-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridhot-widget-header"><div class="gridhot-widget-header-inside"><h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2></div></div>'));

register_sidebar(array(
    'id' => 'gridhot-single-post-bottom-widgets',
    'name' => esc_html__( 'Single Post Bottom Widgets', 'gridhot' ),
    'description' => esc_html__( 'This widget area is located at the bottom of single post of any post type (except attachments and pages).', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-main-widget widget gridhot-widget-box %2$s"><div class="gridhot-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridhot-widget-header"><div class="gridhot-widget-header-inside"><h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2></div></div>'));

register_sidebar(array(
    'id' => 'gridhot-top-footer',
    'name' => esc_html__( 'Footer Top Widgets', 'gridhot' ),
    'description' => esc_html__( 'This widget area is located on the top of the footer of your website.', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'gridhot-footer-1',
    'name' => esc_html__( 'Footer 1 Widgets', 'gridhot' ),
    'description' => esc_html__( 'This widget area is the column 1 of the footer of your website.', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'gridhot-footer-2',
    'name' => esc_html__( 'Footer 2 Widgets', 'gridhot' ),
    'description' => esc_html__( 'This widget area is the column 2 of the footer of your website.', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'gridhot-footer-3',
    'name' => esc_html__( 'Footer 3 Widgets', 'gridhot' ),
    'description' => esc_html__( 'This widget area is the column 3 of the footer of your website.', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'gridhot-footer-4',
    'name' => esc_html__( 'Footer 4 Widgets', 'gridhot' ),
    'description' => esc_html__( 'This widget area is the column 4 of the footer of your website.', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'gridhot-bottom-footer',
    'name' => esc_html__( 'Footer Bottom Widgets', 'gridhot' ),
    'description' => esc_html__( 'This widget area is located on the bottom of the footer of your website.', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'gridhot-404-widgets',
    'name' => esc_html__( '404 Page Widgets', 'gridhot' ),
    'description' => esc_html__( 'This widget area is located on the 404(not found) page of your website.', 'gridhot' ),
    'before_widget' => '<div id="%1$s" class="gridhot-main-widget widget gridhot-widget-box %2$s"><div class="gridhot-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridhot-widget-header"><div class="gridhot-widget-header-inside"><h2 class="gridhot-widget-title"><span class="gridhot-widget-title-inside">',
    'after_title' => '</span></h2></div></div>'));

}
add_action( 'widgets_init', 'gridhot_widgets_init' );


function gridhot_sidebar_one_widgets() {
    dynamic_sidebar( 'gridhot-sidebar-one' );
}

function gridhot_top_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'gridhot-home-fullwidth-widgets' ) || is_active_sidebar( 'gridhot-fullwidth-widgets' ) ) : ?>
<div class="gridhot-outer-wrapper">
<div class="gridhot-top-wrapper-outer gridhot-clearfix">
<div class="gridhot-featured-posts-area gridhot-top-wrapper gridhot-clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'gridhot-home-fullwidth-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'gridhot-fullwidth-widgets' ); ?>
</div>
</div>
</div>
<?php endif; ?>

<?php }


function gridhot_top_widgets() { ?>

<?php if ( is_active_sidebar( 'gridhot-home-top-widgets' ) || is_active_sidebar( 'gridhot-top-widgets' ) ) : ?>
<div class="gridhot-featured-posts-area gridhot-featured-posts-area-top gridhot-clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'gridhot-home-top-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'gridhot-top-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function gridhot_top_left_right_widgets() { ?>

<div class="gridhot-left-right-wrapper gridhot-clearfix">

<?php if ( is_active_sidebar( 'gridhot-home-left-top-widgets' ) || is_active_sidebar( 'gridhot-left-top-widgets' ) ) : ?>
<div class="gridhot-left-top-wrapper">
<div class="gridhot-featured-posts-area gridhot-featured-posts-area-top gridhot-clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'gridhot-home-left-top-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'gridhot-left-top-widgets' ); ?>
</div>
</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'gridhot-home-right-top-widgets' ) || is_active_sidebar( 'gridhot-right-top-widgets' ) ) : ?>
<div class="gridhot-right-top-wrapper">
<div class="gridhot-featured-posts-area gridhot-featured-posts-area-top gridhot-clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'gridhot-home-right-top-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'gridhot-right-top-widgets' ); ?>
</div>
</div>
<?php endif; ?>

</div>

<?php }


function gridhot_bottom_widgets() { ?>

<?php if ( is_active_sidebar( 'gridhot-home-bottom-widgets' ) || is_active_sidebar( 'gridhot-bottom-widgets' ) ) : ?>
<div class='gridhot-featured-posts-area gridhot-featured-posts-area-bottom gridhot-clearfix'>
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'gridhot-home-bottom-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'gridhot-bottom-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function gridhot_bottom_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'gridhot-home-fullwidth-bottom-widgets' ) || is_active_sidebar( 'gridhot-fullwidth-bottom-widgets' ) ) : ?>
<div class="gridhot-outer-wrapper">
<div class="gridhot-bottom-wrapper-outer gridhot-clearfix">
<div class="gridhot-featured-posts-area gridhot-bottom-wrapper gridhot-clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'gridhot-home-fullwidth-bottom-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'gridhot-fullwidth-bottom-widgets' ); ?>
</div>
</div>
</div>
<?php endif; ?>

<?php }


function gridhot_404_widgets() { ?>

<?php if ( is_active_sidebar( 'gridhot-404-widgets' ) ) : ?>
<div class="gridhot-featured-posts-area gridhot-featured-posts-area-top gridhot-clearfix">
<?php dynamic_sidebar( 'gridhot-404-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function gridhot_post_bottom_widgets() {
    if ( is_singular() ) {
        global $post;
        if ( is_active_sidebar( 'gridhot-single-post-bottom-widgets' ) ) : ?>
            <div class="gridhot-featured-posts-area gridhot-clearfix">
            <?php dynamic_sidebar( 'gridhot-single-post-bottom-widgets' ); ?>
            </div>
        <?php endif;
    }
}