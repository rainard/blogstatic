<?php
/**
* Css Classes Functions
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Category ids in post class
function gridhot_category_id_class($classes) {
    global $post;
    foreach((get_the_category($post->ID)) as $category) {
        $classes[] = 'wpcat-' . $category->cat_ID . '-id';
    }
    return apply_filters( 'gridhot_category_id_class', $classes );
}
add_filter('post_class', 'gridhot_category_id_class');


// Adds custom classes to the array of body classes.
function gridhot_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'gridhot-group-blog';
    }

    if ( !(gridhot_get_option('disable_loading_animation')) ) {
        $classes[] = 'gridhot-animated gridhot-fadein';
    }

    $classes[] = 'gridhot-theme-is-active';

    if ( get_header_image() ) {
        $classes[] = 'gridhot-header-image-active';
    }

    if ( has_custom_logo() ) {
        $classes[] = 'gridhot-custom-logo-active';
    }

    $classes[] = 'gridhot-layout-type-full';
    $classes[] = 'gridhot-masonry-inactive';
    $classes[] = 'gridhot-flexbox-grid';

    if ( !(is_singular()) ) {
        if ( gridhot_get_option('featured_nongrid_media_under_post_title') ) {
            $classes[] = 'gridhot-nongrid-media-under-title';
        }
    }

    if ( is_singular() ) {
        if( is_single() ) {
            if ( gridhot_get_option('featured_media_under_post_title') ) {
                $classes[] = 'gridhot-single-media-under-title';
            }
        }
        if( is_page() ) {
            if ( gridhot_get_option('featured_media_under_page_title') ) {
                $classes[] = 'gridhot-single-media-under-title';
            }
        }

        if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
           $classes[] = 'gridhot-layout-full-width';
        } else {
            $classes[] = 'gridhot-layout-c-s1';
        }
    } else {
        $classes[] = 'gridhot-layout-full-width';
    }

    if ( !(gridhot_is_primary_menu_active()) ) {
        $classes[] = 'gridhot-header-full-active';
    } else {
        $classes[] = 'gridhot-header-menu-active';
    }

    if ( gridhot_get_option('hide_tagline') ) {
        $classes[] = 'gridhot-tagline-inactive';
    }

    if ( 'beside-title' === gridhot_get_option('logo_location') ) {
        $classes[] = 'gridhot-logo-beside-title';
    } elseif ( 'above-title' === gridhot_get_option('logo_location') ) {
        $classes[] = 'gridhot-logo-above-title';
    } else {
        $classes[] = 'gridhot-logo-above-title';
    }

    if ( gridhot_is_primary_menu_active() ) {
        $classes[] = 'gridhot-primary-menu-active';
    } else {
        $classes[] = 'gridhot-primary-menu-inactive';
    }
    $classes[] = 'gridhot-primary-mobile-menu-active';

    if ( gridhot_is_secondary_menu_active() ) {
        $classes[] = 'gridhot-secondary-menu-active';
    } else {
        $classes[] = 'gridhot-secondary-menu-inactive';
    }
    $classes[] = 'gridhot-secondary-mobile-menu-active';
    if ( gridhot_get_option('center_secondary_menu') ) {
        $classes[] = 'gridhot-secondary-menu-centered';
    }

    if ( 'before-header' === gridhot_secondary_menu_location() ) {
        $classes[] = 'gridhot-secondary-menu-before-header';
    } elseif ( 'after-header' === gridhot_secondary_menu_location() ) {
        $classes[] = 'gridhot-secondary-menu-after-header';
    } elseif ( 'before-footer' === gridhot_secondary_menu_location() ) {
        $classes[] = 'gridhot-secondary-menu-before-footer';
    } elseif ( 'after-footer' === gridhot_secondary_menu_location() ) {
        $classes[] = 'gridhot-secondary-menu-after-footer';
    } else {
        $classes[] = 'gridhot-secondary-menu-before-header';
    }

    if ( gridhot_is_social_buttons_active() ) {
        $classes[] = 'gridhot-social-buttons-active';
    } else {
        $classes[] = 'gridhot-social-buttons-inactive';
    }

    if ( gridhot_get_option('hide_posted_date_year_home') ) {
        $classes[] = 'gridhot-small-datebox';
    }

    if ( gridhot_get_option('date_box_style') == 'round' ) {
        $classes[] = 'gridhot-round-datebox';
    } else {
        $classes[] = 'gridhot-square-datebox';
    }

    return apply_filters( 'gridhot_body_classes', $classes );
}
add_filter( 'body_class', 'gridhot_body_classes' );