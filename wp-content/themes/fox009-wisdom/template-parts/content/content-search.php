<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fox009_wisdom
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('shadow'); ?>>
	<div class="post-inner padding20">
		<h2 class="post-title">
			<a href="<?php the_permalink(); ?>">
				<?php echo str_ireplace(get_search_query(), '<span class="search-key">' . get_search_query() . '</span>' , get_the_title()); ?>
			</a>
		</h2>
		<div class="post-content">
			<div class="post-intro">
				<?php 
				if(has_post_thumbnail()){
				?>
					<div class="post-featured-image">
						<?php
						the_post_thumbnail(
							'post-thumbnail',
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
				<div class="post-summary">
					<span>
						<?php the_excerpt(); ?>
					</span>
				</div>
			</div>
			<div class="post-full"></div>
		</div>
		<div class="post-bottom">
			<div class="post-meta">
				<?php
					fox009_wisdom_post_author(); 
					fox009_wisdom_post_categories();
					fox009_wisdom_post_date();
					fox009_wisdom_post_comment_number();
				?>
			</div>
			<div class="post-action">
				<span class="action-span show-intro">
					<a class="action-link" href="#post-<?php the_ID(); ?>"><?php esc_html_e('Collapse', 'fox009-wisdom')?><i class="fa fa-angle-double-up"></i></a>
				</span>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
