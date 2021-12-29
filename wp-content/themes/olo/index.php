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
						// Previous/next page navigation.
							the_posts_pagination( array(
							'prev_text'          => __('Previous', 'olo'),
							'next_text'          => __('Next', 'olo'),
							) );
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