<?php get_header(); ?>
<div id="oloContainer">
	<div id="oloContent">
		<div class="oloPosts">
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<?php get_template_part( 'inc/content' ); ?>
				
				<?php comments_template( '', true ); ?>
				<?php endwhile; ?>

			<?php else : ?>

			<?php get_template_part( 'inc/content', 'none' ); ?>

			<?php endif; ?>
		</div><!--#oloPosts-->
<?php if(!IsMobile) get_sidebar(); ?>	
	</div><!-- #oloContent-->
</div><!-- #oloContainer-->
<?php get_footer(); ?>