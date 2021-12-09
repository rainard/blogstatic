<?php
/**
* Menu Functions
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a "Home" link as the first item
function gridhot_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'gridhot_page_menu_args' );

function gridhot_primary_menu_text() {
   $menu_text = esc_html__( 'Menu', 'gridhot' );
    if ( gridhot_get_option('primary_menu_text') ) {
        $menu_text = gridhot_get_option('primary_menu_text');
    }
   return apply_filters( 'gridhot_primary_menu_text', $menu_text );
}

function gridhot_secondary_menu_text() {
   $menu_text = esc_html__( 'Menu', 'gridhot' );
    if ( gridhot_get_option('secondary_menu_text') ) {
        $menu_text = gridhot_get_option('secondary_menu_text');
    }
   return apply_filters( 'gridhot_secondary_menu_text', $menu_text );
}

function gridhot_top_fallback_menu() {
   wp_page_menu( array(
        'sort_column'  => 'menu_order, post_title',
        'menu_id'      => 'gridhot-menu-secondary-navigation',
        'menu_class'   => 'gridhot-secondary-nav-menu gridhot-menu-secondary',
        'container'    => 'ul',
        'echo'         => true,
        'link_before'  => '',
        'link_after'   => '',
        'before'       => '',
        'after'        => '',
        'item_spacing' => 'discard',
        'walker'       => '',
    ) );
}

function gridhot_fallback_menu() {
   wp_page_menu( array(
        'sort_column'  => 'menu_order, post_title',
        'menu_id'      => 'gridhot-menu-primary-navigation',
        'menu_class'   => 'gridhot-primary-nav-menu gridhot-menu-primary',
        'container'    => 'ul',
        'echo'         => true,
        'link_before'  => '',
        'link_after'   => '',
        'before'       => '',
        'after'        => '',
        'item_spacing' => 'discard',
        'walker'       => '',
    ) );
}

function gridhot_secondary_menu_location() {
    $secondary_menu_location = 'before-header';
    if ( gridhot_get_option('secondary_menu_location') ) {
        $secondary_menu_location = gridhot_get_option('secondary_menu_location');
    }
    return apply_filters( 'gridhot_secondary_menu_location', $secondary_menu_location );
}

function gridhot_secondary_menu_area() {
if ( gridhot_is_menu_social_bar_active() ) { ?>
<div class="gridhot-container gridhot-secondary-menu-container gridhot-clearfix">
<div class="gridhot-secondary-menu-container-inside gridhot-clearfix">
<nav class="gridhot-nav-secondary" id="gridhot-secondary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Secondary Menu', 'gridhot' ); ?>">
<div class="gridhot-outer-wrapper">

<?php if ( gridhot_is_secondary_menu_active() ) { ?>
<button class="gridhot-secondary-responsive-menu-icon" aria-controls="gridhot-menu-secondary-navigation" aria-expanded="false"><?php echo esc_html( gridhot_secondary_menu_text() ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'gridhot-menu-secondary-navigation', 'menu_class' => 'gridhot-secondary-nav-menu gridhot-menu-secondary', 'fallback_cb' => 'gridhot_top_fallback_menu', 'container' => '', ) ); ?>
<?php } ?>

<?php if ( gridhot_is_social_buttons_active() ) { ?>
<?php gridhot_social_buttons(); ?>

<?php if ( !(gridhot_get_option('hide_search_button')) ) { ?>
<div id="gridhot-search-overlay-wrap" class="gridhot-search-overlay">
  <div class="gridhot-search-overlay-content">
    <?php get_search_form(); ?>
  </div>
  <button class="gridhot-search-closebtn" aria-label="<?php esc_attr_e( 'Close Search', 'gridhot' ); ?>" title="<?php esc_attr_e('Close Search','gridhot'); ?>">&#xD7;</button>
</div>
<?php } ?>
<?php } ?>

</div>
</nav>
</div>
</div>
<?php }
}