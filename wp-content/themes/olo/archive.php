<?php get_header(); ?>
<div id="oloContainer">
	<div id="oloContent">
		<div class="oloPosts">
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<?php get_template_part( 'inc/content' ); ?>
				
				<?php endwhile; ?>
					
					<nav class="oloNav">
						<?php
							if(function_exists('wp_page_numbers')) {
								wp_page_numbers();
							}
							elseif(function_exists('wp_pagenavi')) {
								wp_pagenavi();
							} else {
								global $wp_query;
								$total_pages = $wp_query->max_num_pages;
								if ( $total_pages > 1 ) {
										posts_nav_link(' | ', __('&laquo; Previous page','olo'), __('Next page &raquo;','olo'));
								}
							}
						?>
					</nav>

			<?php else : ?>

			<?php get_template_part( 'inc/content', 'none' ); ?>

			<?php endif; ?>
		</div><!--#oloPosts-->
<?php if(!IsMobile) get_sidebar(); ?>		
	</div><!-- #oloContent-->
</div><!-- #oloContainer-->
<?php get_footer(); ?>