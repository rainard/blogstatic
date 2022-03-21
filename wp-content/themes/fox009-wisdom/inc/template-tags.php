<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Fox009_wisdom
 */

if ( ! function_exists( 'fox009_wisdom_post_date' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function fox009_wisdom_post_date() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s"><i class="fa fa-calendar"></i>%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="updated" datetime="%3$s"><i class="fa fa-calendar"></i>%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		echo '<span class="meta-span post-date">' . $time_string . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'fox009_wisdom_post_author' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function fox009_wisdom_post_author() {
		$post_author = '<a class="author-link" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i>' . esc_html( get_the_author() ) . '</a>';

		echo '<span class="meta-span post-author">' . $post_author . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'fox009_wisdom_post_categories' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function fox009_wisdom_post_categories() {
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
			$post_categories = '';
			foreach($categories as $category){
				$post_categories .='<a href="'.esc_url( get_category_link( $category->term_id ) ).'"rel="category" class="cat-link"><i class="fa fa-folder"></i>'.esc_html( $category->name ).'</a>';
			}
			echo '<span class="meta-span post-categories">' . $post_categories . '</span>';
        }
	}
endif;

if ( ! function_exists( 'fox009_wisdom_post_comment_number' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function fox009_wisdom_post_comment_number() {
		$post_comment_number = '<a class="comment-link" href="' . get_permalink() . 
		'#comments"><i class="fa fa-comments"></i>' . get_comments_number_text( '(0)', '(1)', '(%)' ) . '</a>';

		echo '<span class="meta-span post-comment-number">' . $post_comment_number . '</span>'; 

	}
endif;

if ( ! function_exists( 'fox009_wisdom_post_tags' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function fox009_wisdom_post_tags() {
        $tags = get_the_tags();
        if ( ! empty( $tags ) ) {
			foreach($tags as $tag){
				$post_tags ='<a href="'.esc_url( get_tag_link( $tag->term_id ) ).'"rel="tag" class="tag-link"><i class="fa fa-tag"></i>'.esc_html( $tag->name ).'</a>';
				echo '<span class="meta-span post-tag">' . $post_tags . '</span>';
			}

        }
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
