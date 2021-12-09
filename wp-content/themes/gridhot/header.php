<?php
/**
* The header for GridHot theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="gridhot-site-body" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#gridhot-posts-wrapper"><?php esc_html_e( 'Skip to content', 'gridhot' ); ?></a>

<?php if ( 'before-header' === gridhot_secondary_menu_location() ) { ?><?php gridhot_secondary_menu_area(); ?><?php } ?>

<?php gridhot_before_header(); ?>

<?php gridhot_header_image(); ?>

<div class="gridhot-site-header gridhot-container" id="gridhot-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
<div class="gridhot-head-content gridhot-clearfix" id="gridhot-head-content">

<?php if ( gridhot_is_header_content_active() ) { ?>
<div class="gridhot-header-inside gridhot-clearfix">
<div class="gridhot-header-inside-content gridhot-clearfix">
<div class="gridhot-outer-wrapper">
<div class="gridhot-header-inside-container">

<div class="gridhot-logo">
<?php if ( has_custom_logo() ) : ?>
    <div class="site-branding site-branding-full">
    <div class="gridhot-custom-logo-image">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="gridhot-logo-img-link">
        <img src="<?php echo esc_url( gridhot_custom_logo() ); ?>" alt="" class="gridhot-logo-img"/>
    </a>
    </div>
    <div class="gridhot-custom-logo-info"><?php gridhot_site_title(); ?></div>
    </div>
<?php else: ?>
    <div class="site-branding">
      <?php gridhot_site_title(); ?>
    </div>
<?php endif; ?>
</div>

<?php if ( gridhot_is_primary_menu_active() ) { ?>
<div class="gridhot-header-menu">
<div class="gridhot-container gridhot-primary-menu-container gridhot-clearfix">
<div class="gridhot-primary-menu-container-inside gridhot-clearfix">
<nav class="gridhot-nav-primary" id="gridhot-primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'gridhot' ); ?>">
<button class="gridhot-primary-responsive-menu-icon" aria-controls="gridhot-menu-primary-navigation" aria-expanded="false"><?php echo esc_html( gridhot_primary_menu_text() ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'gridhot-menu-primary-navigation', 'menu_class' => 'gridhot-primary-nav-menu gridhot-menu-primary', 'fallback_cb' => 'gridhot_fallback_menu', 'container' => '', ) ); ?>
</nav>
</div>
</div>
</div>
<?php } ?>

</div>
</div>
</div>
</div>
<?php } else { ?>
<div class="gridhot-no-header-content">
  <?php gridhot_site_title(); ?>
</div>
<?php } ?>

</div><!--/#gridhot-head-content -->
</div><!--/#gridhot-header -->

<?php if ( 'after-header' === gridhot_secondary_menu_location() ) { ?><?php gridhot_secondary_menu_area(); ?><?php } ?>

<?php gridhot_after_header(); ?>

<div id="gridhot-header-end"></div>

<?php gridhot_top_wide_widgets(); ?>

<div class="gridhot-outer-wrapper" id="gridhot-wrapper-outside">

<div class="gridhot-container gridhot-clearfix" id="gridhot-wrapper">
<div class="gridhot-content-wrapper gridhot-clearfix" id="gridhot-content-wrapper">