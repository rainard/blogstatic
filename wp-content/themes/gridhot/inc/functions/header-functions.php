<?php
/**
* Header Functions
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function gridhot_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'gridhot_pingback_header' );

// Get custom-logo URL
function gridhot_custom_logo() {
    if ( ! has_custom_logo() ) {return;}
    $gridhot_custom_logo_id = get_theme_mod( 'custom_logo' );
    $gridhot_logo = wp_get_attachment_image_src( $gridhot_custom_logo_id , 'full' );
    $gridhot_logo_src = $gridhot_logo[0];
    return apply_filters( 'gridhot_custom_logo', $gridhot_logo_src );
}

// Site Title
function gridhot_site_title() {
    if ( is_front_page() && is_home() ) { ?>
            <h1 class="gridhot-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( !(gridhot_get_option('hide_tagline')) ) { ?><p class="gridhot-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_home() ) { ?>
            <h1 class="gridhot-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( !(gridhot_get_option('hide_tagline')) ) { ?><p class="gridhot-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_singular() ) { ?>
            <p class="gridhot-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(gridhot_get_option('hide_tagline')) ) { ?><p class="gridhot-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_category() ) { ?>
            <p class="gridhot-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(gridhot_get_option('hide_tagline')) ) { ?><p class="gridhot-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_tag() ) { ?>
            <p class="gridhot-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(gridhot_get_option('hide_tagline')) ) { ?><p class="gridhot-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_author() ) { ?>
            <p class="gridhot-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(gridhot_get_option('hide_tagline')) ) { ?><p class="gridhot-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_archive() && !is_category() && !is_tag() && !is_author() ) { ?>
            <p class="gridhot-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(gridhot_get_option('hide_tagline')) ) { ?><p class="gridhot-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_search() ) { ?>
            <p class="gridhot-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(gridhot_get_option('hide_tagline')) ) { ?><p class="gridhot-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_404() ) { ?>
            <p class="gridhot-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(gridhot_get_option('hide_tagline')) ) { ?><p class="gridhot-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } else { ?>
            <h1 class="gridhot-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( !(gridhot_get_option('hide_tagline')) ) { ?><p class="gridhot-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php }
}

function gridhot_header_image_destination() {
    $url = home_url( '/' );
    if ( gridhot_get_option('header_image_destination') ) {
        $url = gridhot_get_option('header_image_destination');
    }
    return apply_filters( 'gridhot_header_image_destination', $url );
}

function gridhot_header_image_markup() {
    if ( get_header_image() ) {
        if ( gridhot_get_option('remove_header_image_link') ) {
            the_header_image_tag( array( 'class' => 'gridhot-header-img', 'alt' => '' ) );
        } else { ?>
            <a href="<?php echo esc_url( gridhot_header_image_destination() ); ?>" rel="home" class="gridhot-header-img-link"><?php the_header_image_tag( array( 'class' => 'gridhot-header-img', 'alt' => '' ) ); ?></a>
        <?php }
    }
}

function gridhot_header_image_details() {
    $header_image_custom_title = '';
    if ( gridhot_get_option('header_image_custom_title') ) {
        $header_image_custom_title = gridhot_get_option('header_image_custom_title');
    }

    $header_image_custom_description = '';
    if ( gridhot_get_option('header_image_custom_description') ) {
        $header_image_custom_description = gridhot_get_option('header_image_custom_description');
    }

    if ( !(gridhot_get_option('hide_header_image_details')) ) {
    if ( gridhot_get_option('header_image_custom_text') ) {
        if ( $header_image_custom_title || $header_image_custom_description ) { ?>
            <div class="gridhot-header-image-info">
            <div class="gridhot-header-image-info-inside">
                <?php if ( !(gridhot_get_option('hide_header_image_title')) ) { ?><?php if ( $header_image_custom_title ) { ?><p class="gridhot-header-image-site-title gridhot-header-image-block"><?php echo wp_kses_post( force_balance_tags( do_shortcode($header_image_custom_title) ) ); ?></p><?php } ?><?php } ?>
                <?php if ( !(gridhot_get_option('hide_header_image_description')) ) { ?><?php if ( $header_image_custom_description ) { ?><p class="gridhot-header-image-site-description gridhot-header-image-block"><?php echo wp_kses_post( force_balance_tags( do_shortcode($header_image_custom_description) ) ); ?></p><?php } ?><?php } ?>
            </div>
            </div>
        <?php }
    } else { ?>
        <div class="gridhot-header-image-info">
        <div class="gridhot-header-image-info-inside">
            <?php if ( !(gridhot_get_option('hide_header_image_title')) ) { ?><p class="gridhot-header-image-site-title gridhot-header-image-block"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p><?php } ?>
            <?php if ( !(gridhot_get_option('hide_header_image_description')) ) { ?><p class="gridhot-header-image-site-description gridhot-header-image-block"><?php bloginfo( 'description' ); ?></p><?php } ?>
        </div>
        </div>
    <?php }
    }
}

function gridhot_header_image_wrapper() {
    ?><div class="gridhot-header-image gridhot-clearfix">
    <?php gridhot_header_image_markup(); ?>
    <?php gridhot_header_image_details(); ?>
    </div><?php
}

function gridhot_header_image() {
    if ( gridhot_get_option('hide_header_image') ) { return; }
    if ( get_header_image() ) {
        gridhot_header_image_wrapper();
    }
}