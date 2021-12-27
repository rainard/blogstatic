<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fox009_wisdom
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-inner padding20">
		<?php
		if(has_post_thumbnail() && fox009_wisdom_theme_options('enable_featured_image')){
		?>
			<div class="post-featured-image">
				<?php
				the_post_thumbnail(
					'full',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</div>
		<?php
		}
		?>	
		<div class="post-info">
			<h2 class="post-title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>
			<?php fox009_wisdom_post_meta(); ?>
			<div class="post-content">
				<?php 
				the_content();

				wp_link_pages( 
					array(
						'before' => '<div class="page-links"><span class="pages">' . esc_html__( 'Pages:', 'fox009-wisdom' ) . '</span>',
						'after'  => '</div>',
					)
				);
				?>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
