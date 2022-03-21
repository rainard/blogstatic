<?php
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'fox009-wisdom',
		array( 'label' => esc_html__( 'Fox009 Wisdom', 'fox009-wisdom' ) )
	);
}


if ( function_exists( 'register_block_pattern' ) ) {

	// Large Text.
	register_block_pattern(
		'fox009-wisdom/copyright-notice',
		array(
			'title'         => esc_html__( 'Copyright Notice', 'fox009-wisdom' ),
			'categories'    => array( 'fox009-wisdom' ),
			'viewportWidth' => 1240,
			'content'       => '<!-- wp:paragraph {"className":"is-style-fox009-wisdom-copyright-notice"} -->
<p class="is-style-fox009-wisdom-copyright-notice has-black-color has-text-color has-background"><strong>' . esc_html__('Statement:', 'fox009-wisdom' ) . '</strong>' . esc_html__(' All articles on this website, if there is no special explanation or annotation, are originally published by this website. Any individual or organization is forbidden to copy, embezzle, collect and publish the content of this website to any website, books and other media platforms without the consent of this website. If the content of this website infringes the legitimate rights and interests of the original author, please contact us to deal with it.', 'fox009-wisdom' ) . '</p>
<!-- /wp:paragraph -->',
		)
	);
	
	register_block_pattern(
		'fox009-wisdom/reprint-statement',
		array(
			'title'         => esc_html__( 'Reprint Statement', 'fox009-wisdom' ),
			'categories'    => array( 'fox009-wisdom' ),
			'viewportWidth' => 1240,
			'content'       => '<!-- wp:quote {"className":"is-style-fox009-wisdom-reprint-statement"} -->
<blockquote class="wp-block-quote is-style-fox009-wisdom-reprint-statement"><p><strong>' . esc_html__('Note:', 'fox009-wisdom' ) . '</strong>' . esc_html__(' The content of this article is from xxxxxx.com, please indicate the source of reprint.', 'fox009-wisdom' ) . '</p></blockquote>
<!-- /wp:quote -->',
		)
	);
}
