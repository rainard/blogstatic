<?php
/**
 * The sidebar containing the footer widget area
 *
 * If no active widgets in this sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Docu
 * @since Docu 0.8
 */

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="sidebar" class="sidebar" role="complementary">
		<div class="sidebar-inner">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- .sidebar-inner -->
	</div><!-- #sidebar -->
	<div id="sidebar-bg" class="sidebar-bg">
		<a class="sidebar-toggler" href="#">
			<span class="collapse">&laquo;</span>
			<span class="expand">&raquo;</span>
		</a>
	</div><!-- #sidebar-bg -->
<?php endif; ?>