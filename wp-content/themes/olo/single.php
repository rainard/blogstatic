<?php get_header(); ?>
<div id="oloContainer">
	<div id="oloContent">
		<div class="oloPosts">
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<?php get_template_part( 'inc/content' ); ?>
				
				<?php comments_template( '', true ); ?>
				<?php endwhile; ?>
				<div class="clear"></div>
					<nav id="nav-single">
						<p class="nav-previous"><?php previous_post_link( '%link', __( 'Previous: %title', 'olo' ) ); ?></p>
						<p class="nav-next"><?php next_post_link( '%link', __( 'Next: %title', 'olo' ) ); ?></p>
					</nav><!-- #nav-single -->

			<?php else : ?>

			<?php get_template_part( 'inc/content', 'none' ); ?>

			<?php endif; ?>
		</div><!--#oloPosts-->
<?php if(!IsMobile) get_sidebar(); ?>	
	</div><!-- #oloContent-->
</div><!-- #oloContainer-->
<?php get_footer(); ?>