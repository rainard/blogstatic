<?php
/**
 * Pagination for blog.
 */

global $wp_query;
$prem_blog_blog = 999999999; // need an unlikely integer

if ( $wp_query->max_num_pages <= 1 ) {
    return;
}
?>
<div class="nav-links">
    <?php
        the_posts_pagination( array(
            'base' => str_replace( $prem_blog_blog, '%#%', esc_url(get_pagenum_link( $prem_blog_blog ) ) ),
            'format' => '?paged=%#%',
            'add_args' => false,
            'current' => max( 1, get_query_var( 'paged' ) ),
            'total' => $wp_query->max_num_pages,
            'mid_size' => 4,
            'prev_text' => esc_html__( 'Prev', 'prem-blog' ),
            'next_text' => esc_html__( 'Next', 'prem-blog' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'prem-blog' ) . ' </span>',
            'prev_text' => esc_html__( 'Prev', 'prem-blog' ),
            'next_text' => esc_html__( 'Next', 'prem-blog' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'prem-blog' ) . ' </span>',
        ) );
    ?>
</div>
