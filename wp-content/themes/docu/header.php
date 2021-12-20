<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section
 *
 * @package WordPress
 * @subpackage Docu
 * @since Docu 0.8
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="header" class="header">
        <div class="container clearfix">
            <a class="home-link" href="<?php echo home_url( '/' ); ?>"><?php bloginfo('name'); ?></a>
            <div class="main-search"><?php get_search_form(); ?><i class="icon-search"></i></div>
        </div>
    </header><!-- end #header -->
    <div id="navbar" class="navbar">
        <div class="container clearfix">
            <nav id="nav" class="nav">
                <?php wp_nav_menu(array('container'=>false, 'menu_class' => 'clearfix nav-menu', 'theme_location'=>'primary', 'walker' => '' )); ?>
            </nav><!-- end #nav -->
        </div>
    </div>
    <div id="main" class="main">
        <div class="container clearfix">