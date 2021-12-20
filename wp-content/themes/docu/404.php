<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Docu
 * @since Docu 0.8
 */

get_header(); ?>
	<?php get_sidebar(); ?>
	<div id="content" class="content">
		<div class="content-inner">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not found', 'docu' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content">
					<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'docu' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'docu' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- .content-inner -->
	</div><!-- #content -->
<?php get_footer();