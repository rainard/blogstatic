<?php
/**
 * The template for displaying posts in the Aside post format.
 *
 * @package WordPress
 * @subpackage Docu
 * @since Docu 0.8
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-meta">
		<?php if ( is_single() ) : ?>
			<?php docu_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'docu' ), '<span class="edit-link">', '</span>' ); ?>

			<?php if ( get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
				<?php get_template_part( 'author-bio' ); ?>
			<?php endif; ?>

		<?php else : ?>
			<?php docu_entry_date(); ?>
			<?php edit_post_link( __( 'Edit', 'docu' ), '<span class="edit-link">', '</span>' ); ?>
		<?php endif; // is_single() ?>
	</header><!-- .entry-meta -->
	
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'docu' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'docu' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
</article><!-- #post -->
