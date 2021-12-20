<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Docu
 * @since Docu 0.8
 */

get_header(); ?>
	<?php get_sidebar(); ?>
	<div id="content" class="content">
		<div class="content-inner">
			<?php if ( have_posts() ) : ?>
			
				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>
			
				<?php docu_paging_nav(); ?>
			
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</div><!-- .content-inner -->
	</div><!-- #content -->
<?php get_footer();