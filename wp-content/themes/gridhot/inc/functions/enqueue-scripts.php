<?php
/**
* Enqueue scripts and styles
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_scripts() {
    wp_enqueue_style('gridhot-maincss', get_stylesheet_uri(), array(), NULL);
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), NULL );
    wp_enqueue_style('gridhot-webfont', '//fonts.googleapis.com/css?family=Oswald:400,700|Frank+Ruhl+Libre:400,700|Domine:400,700&amp;display=swap', array(), NULL);

    $gridhot_fitvids_active = FALSE;
    if ( gridhot_is_fitvids_active() ) {
        $gridhot_fitvids_active = TRUE;
    }
    if ( $gridhot_fitvids_active ) {
        wp_enqueue_script('fitvids', get_template_directory_uri() .'/assets/js/jquery.fitvids.min.js', array( 'jquery' ), NULL, true);
    }

    $gridhot_backtotop_active = FALSE;
    if ( gridhot_is_backtotop_active() ) {
        $gridhot_backtotop_active = TRUE;
    }

    $gridhot_primary_menu_active = FALSE;
    if ( gridhot_is_primary_menu_active() ) {
        $gridhot_primary_menu_active = TRUE;
    }
    $gridhot_secondary_menu_active = FALSE;
    if ( gridhot_is_secondary_menu_active() ) {
        $gridhot_secondary_menu_active = TRUE;
    }

    $gridhot_sticky_sidebar_active = TRUE;
    if ( is_singular() ) {
        if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
           $gridhot_sticky_sidebar_active = FALSE;
        }
    } else {
        $gridhot_sticky_sidebar_active = FALSE;
    }
    if ( $gridhot_sticky_sidebar_active ) {
        wp_enqueue_script('ResizeSensor', get_template_directory_uri() .'/assets/js/ResizeSensor.min.js', array( 'jquery' ), NULL, true);
        wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() .'/assets/js/theia-sticky-sidebar.min.js', array( 'jquery' ), NULL, true);
    }

    wp_enqueue_script('gridhot-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), NULL, true );
    wp_enqueue_script('gridhot-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), NULL, true );
    wp_enqueue_script('gridhot-customjs', get_template_directory_uri() .'/assets/js/custom.js', array( 'jquery', 'imagesloaded' ), NULL, true);

    wp_localize_script( 'gridhot-customjs', 'gridhot_ajax_object',
        array(
            'ajaxurl' => esc_url_raw( admin_url( 'admin-ajax.php' ) ),
            'primary_menu_active' => $gridhot_primary_menu_active,
            'secondary_menu_active' => $gridhot_secondary_menu_active,
            'sticky_sidebar_active' => $gridhot_sticky_sidebar_active,
            'fitvids_active' => $gridhot_fitvids_active,
            'backtotop_active' => $gridhot_backtotop_active,
        )
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script('gridhot-html5shiv-js', get_template_directory_uri() .'/assets/js/html5shiv.js', array('jquery'), NULL, true);

    wp_localize_script('gridhot-html5shiv-js','gridhot_custom_script_vars',array(
        'elements_name' => esc_html__('abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video', 'gridhot'),
    ));
}
add_action( 'wp_enqueue_scripts', 'gridhot_scripts' );

/**
 * Enqueue IE compatible scripts and styles.
 */
function gridhot_ie_scripts() {
    wp_enqueue_script( 'respond', get_template_directory_uri(). '/assets/js/respond.min.js', array(), NULL, false );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'gridhot_ie_scripts' );

/**
 * Enqueue customizer styles.
 */
function gridhot_enqueue_customizer_styles() {
    wp_enqueue_style( 'gridhot-customizer-styles', get_template_directory_uri() . '/inc/admin/css/customizer-style.css', array(), NULL );
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), NULL );
}
add_action( 'customize_controls_enqueue_scripts', 'gridhot_enqueue_customizer_styles' );