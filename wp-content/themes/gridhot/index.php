<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
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

<?php if ( !(gridhot_get_option('hide_posts_heading')) ) { ?>
<?php if(is_home() && !is_paged()) { ?>
<?php if ( gridhot_get_option('posts_heading') ) : ?>
<div class="gridhot-posts-header"><div class="gridhot-posts-header-inside"><h2 class="gridhot-posts-heading"><span class="gridhot-posts-heading-inside"><?php echo esc_html( gridhot_get_option('posts_heading') ); ?></span></h2></div></div>
<?php else : ?>
<div class="gridhot-posts-header"><div class="gridhot-posts-header-inside"><h2 class="gridhot-posts-heading"><span class="gridhot-posts-heading-inside"><?php esc_html_e( 'Recent Posts', 'gridhot' ); ?></span></h2></div></div>
<?php endif; ?>
<?php } ?>
<?php } ?>

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