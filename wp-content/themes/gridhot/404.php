<?php
/**
* The template for displaying 404 pages (not found).
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class='gridhot-main-wrapper gridhot-clearfix' id='gridhot-main-wrapper' itemscope='itemscope' itemtype='http://schema.org/Blog' role='main'>
<div class='theiaStickySidebar'>
<div class="gridhot-main-wrapper-inside gridhot-clearfix">

<div class='gridhot-posts-wrapper' id='gridhot-posts-wrapper'>

<div class='gridhot-posts gridhot-box'>
<div class="gridhot-box-inside">

<div class="gridhot-page-header-outside">
<header class="gridhot-page-header">
<div class="gridhot-page-header-inside">
    <?php if ( gridhot_get_option('error_404_heading') ) : ?>
    <h1 class="page-title"><?php echo esc_html( gridhot_get_option('error_404_heading') ); ?></h1>
    <?php else : ?>
    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can not be found.', 'gridhot' ); ?></h1>
    <?php endif; ?>
</div>
</header><!-- .gridhot-page-header -->
</div>

<div class='gridhot-posts-content'>

    <?php if ( gridhot_get_option('error_404_message') ) : ?>
    <p><?php echo wp_kses_post( force_balance_tags( gridhot_get_option('error_404_message') ) ); ?></p>
    <?php else : ?>
    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'gridhot' ); ?></p>
    <?php endif; ?>

    <?php if ( !(gridhot_get_option('hide_404_search')) ) { ?><?php get_search_form(); ?><?php } ?>

</div>

</div>
</div>

</div><!--/#gridhot-posts-wrapper -->

<?php gridhot_404_widgets(); ?>

</div>
</div>
</div><!-- /#gridhot-main-wrapper -->

<?php get_footer(); ?>