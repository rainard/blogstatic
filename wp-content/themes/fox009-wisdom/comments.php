<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fox009_wisdom
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<div class="comments-title-container padding20">
			<h2 class="comments-title">
				<?php
				$fox009_wisdom_comment_count = get_comments_number();
				if($fox009_wisdom_comment_count == 1) {
					printf(esc_html__( 'One Comment', 'fox009-wisdom' ));
				} else {
					printf( 
						/* translators: comment count number */
						esc_html_x('%s Comments', 'comments title', 'fox009-wisdom'),
						esc_html(number_format_i18n( $fox009_wisdom_comment_count ))
					);
				}
				?>
			</h2><!-- .comments-title -->
		</div>
		<div class="comments-list-container">
			<ul class="comments-list">
				<?php
				wp_list_comments(
					array(
						'style'      => 'ul',
						'short_ping' => false,
						'avatar_size'=> 42,
					)
				);
				?>
			</ol><!-- .comment-list -->
		</div>
		<?php
		the_comments_navigation();
		
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
		?>
			<div class="comments-closed-container padding20">
				<h2 class="no-comments"><?php esc_html_e( 'Comments are closed.', 'fox009-wisdom' ); ?></h2>
			</div>
		<?php
		endif;

	endif; // Check for have_comments().
	?>
	<?php 
	comment_form(
		array(
			'class_container'	 => 'comments-form-container padding20',
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'	 => '</h2>',
		)
	);
	?>
	
</div><!-- #comments -->
