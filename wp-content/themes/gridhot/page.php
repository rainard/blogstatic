<?php
/**
* The template for displaying all pages.
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site may use a
* different template.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
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

<?php gridhot_before_main_content(); ?>

<div class='gridhot-posts-wrapper' id='gridhot-posts-wrapper'>

<?php while (have_posts()) : the_post();

    get_template_part( 'template-parts/content', 'page' );

    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;

endwhile; ?>

<div class="clear"></div>
</div><!--/#gridhot-posts-wrapper -->

<?php gridhot_after_main_content(); ?>

</div>
</div>
</div><!-- /#gridhot-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>