<?php
/**
* The template for displaying the footer
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

</div>

</div><!--/#gridhot-content-wrapper -->
</div><!--/#gridhot-wrapper -->

<?php gridhot_bottom_wide_widgets(); ?>

<?php if ( 'before-footer' === gridhot_secondary_menu_location() ) { ?><?php gridhot_secondary_menu_area(); ?><?php } ?>

<?php gridhot_before_footer(); ?>

<?php if ( !(gridhot_hide_footer_widgets()) ) { ?>
<?php if ( is_active_sidebar( 'gridhot-footer-1' ) || is_active_sidebar( 'gridhot-footer-2' ) || is_active_sidebar( 'gridhot-footer-3' ) || is_active_sidebar( 'gridhot-footer-4' ) || is_active_sidebar( 'gridhot-top-footer' ) || is_active_sidebar( 'gridhot-bottom-footer' ) ) : ?>
<div class='gridhot-clearfix' id='gridhot-footer-blocks' itemscope='itemscope' itemtype='http://schema.org/WPFooter' role='contentinfo'>
<div class='gridhot-container gridhot-clearfix'>
<div class="gridhot-outer-wrapper">

<?php if ( is_active_sidebar( 'gridhot-top-footer' ) ) : ?>
<div class='gridhot-clearfix'>
<div class='gridhot-top-footer-block'>
<?php dynamic_sidebar( 'gridhot-top-footer' ); ?>
</div>
</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'gridhot-footer-1' ) || is_active_sidebar( 'gridhot-footer-2' ) || is_active_sidebar( 'gridhot-footer-3' ) || is_active_sidebar( 'gridhot-footer-4' ) ) : ?>
<div class='gridhot-footer-block-cols gridhot-clearfix'>

<div class="gridhot-footer-block-col gridhot-footer-4-col" id="gridhot-footer-block-1">
<?php dynamic_sidebar( 'gridhot-footer-1' ); ?>
</div>

<div class="gridhot-footer-block-col gridhot-footer-4-col" id="gridhot-footer-block-2">
<?php dynamic_sidebar( 'gridhot-footer-2' ); ?>
</div>

<div class="gridhot-footer-block-col gridhot-footer-4-col" id="gridhot-footer-block-3">
<?php dynamic_sidebar( 'gridhot-footer-3' ); ?>
</div>

<div class="gridhot-footer-block-col gridhot-footer-4-col" id="gridhot-footer-block-4">
<?php dynamic_sidebar( 'gridhot-footer-4' ); ?>
</div>

</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'gridhot-bottom-footer' ) ) : ?>
<div class='gridhot-clearfix'>
<div class='gridhot-bottom-footer-block'>
<?php dynamic_sidebar( 'gridhot-bottom-footer' ); ?>
</div>
</div>
<?php endif; ?>

</div>
</div>
</div><!--/#gridhot-footer-blocks-->
<?php endif; ?>
<?php } ?>

<?php if ( 'after-footer' === gridhot_secondary_menu_location() ) { ?><?php gridhot_secondary_menu_area(); ?><?php } ?>

<?php gridhot_after_footer(); ?>

<div class='gridhot-clearfix' id='gridhot-copyright-area'>
<div class='gridhot-copyright-area-inside gridhot-container'>
<div class="gridhot-outer-wrapper">

<div class='gridhot-copyright-area-inside-content gridhot-clearfix'>

<?php if ( gridhot_get_option('footer_text') ) : ?>
  <p class='gridhot-copyright'><?php echo esc_html(gridhot_get_option('footer_text')); ?></p>
<?php else : ?>
  <p class='gridhot-copyright'><?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'gridhot' ), esc_html(date_i18n(__('Y','gridhot'))) . ' ' . esc_html(get_bloginfo( 'name' ))  ); ?></p>
<?php endif; ?>
<p class='gridhot-credit'><a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'gridhot' ), 'ThemesDNA.com' ); ?></a></p>

</div>

</div>
</div>
</div><!--/#gridhot-copyright-area -->

<?php if ( gridhot_is_backtotop_active() ) { ?><button class="gridhot-scroll-top" title="<?php esc_attr_e('Scroll to Top','gridhot'); ?>"><i class="fas fa-arrow-up" aria-hidden="true"></i><span class="gridhot-sr-only"><?php esc_html_e('Scroll to Top', 'gridhot'); ?></span></button><?php } ?>

<?php wp_footer(); ?>
</body>
</html>