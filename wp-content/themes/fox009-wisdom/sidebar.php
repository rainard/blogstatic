<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fox009_wisdom
 */

if(!is_active_sidebar('sidebar-1')
	|| fox009_wisdom_sidebar_layout() == 'none'){
	return;
}
?>

<aside id="secondary" class="sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
