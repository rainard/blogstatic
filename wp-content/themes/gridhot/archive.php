<?php
/**
* The template for displaying archive pages.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class="gridhot-main-wrapper gridhot-clearfix" id="gridhot-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="gridhot-main-wrapper-inside gridhot-clearfix">

<?php gridhot_before_main_content(); ?>

<div class="gridhot-posts-wrapper" id="gridhot-posts-wrapper">

<div class="gridhot-page-header-outside">
<header class="gridhot-page-header">
<div class="gridhot-page-header-inside">
<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
</div>
</header>
</div>

<div class="gridhot-posts-content">

<?php if (have_posts()) : ?>

    <?php if ( !(gridhot_get_option('disable_posts_grid')) ) { ?>

    <div class="gridhot-posts gridhot-posts-grid">
    <?php $gridhot_post_counter=1; while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/content-grid' ); ?>

    <?php $gridhot_post_counter++; endwhile; ?>
    </div>

    <?php } else { ?>

    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part( 'template-parts/content-nongrid' ); ?>
    <?php endwhile; ?>

    <?php } ?>
    <div class="clear"></div>

    <?php gridhot_posts_navigation(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</div>

</div><!--/#gridhot-posts-wrapper -->

<?php gridhot_after_main_content(); ?>

</div>
</div>
</div><!-- /#gridhot-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>