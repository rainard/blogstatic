<?php
/**
* The file for displaying the sidebars.
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<?php if ( is_singular() ) { ?>

<?php if(!is_page_template(array( 'template-full-width-page.php', 'template-full-width-post.php' ))) { ?>
<div class="gridhot-sidebar-one-wrapper gridhot-sidebar-widget-areas gridhot-clearfix" id="gridhot-sidebar-one-wrapper" itemscope="itemscope" itemtype="http://schema.org/WPSideBar" role="complementary">
<div class="theiaStickySidebar">
<div class="gridhot-sidebar-one-wrapper-inside gridhot-clearfix">

<?php gridhot_sidebar_one(); ?>

</div>
</div>
</div><!-- /#gridhot-sidebar-one-wrapper-->
<?php } ?>

<?php } ?>