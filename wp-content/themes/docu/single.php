<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Docu
 * @since Docu 0.8
 */

get_header(); ?>
<?php get_sidebar(); ?>
	<div id="content" class="content">
		<div class="content-inner">
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php docu_post_nav(); ?>
				<?php comments_template(); ?>

			<?php endwhile; ?>

		</div><!-- .content-inner -->
	</div><!-- #content -->
<?php get_footer();