<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-meta">
        <div class="prr-post-meta">
            <span class="icon icofont-user-alt-3"></span>
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="author-name"><?php the_author(); ?></span><!-- /.author-name --></a>
            <span class="icon icofont-comment"></span>
            <span class="prr-times-read"><?php echo esc_html( get_comments_number() ); ?> <?php echo esc_html( 'Comments', 'prem-blog' ); ?></span>
            <span class="icon icofont-clock-time"></span>
            <span class="prr-times-read"><?php prem_blog_post_read_time( get_the_ID() ); ?></span>
        </div><!-- .prr-post-meta -->
    </div>

    <div class="post-content clearfix">
        <?php
            the_content(
                sprintf(
                    /* translators: %s: Name of current post */
                    __( '<span class="screen-reader-text"> "%s"</span>', 'prem-blog' ),
                    get_the_title()
                )
            );

            wp_link_pages(
                array(
                    'before'      => '<div class="link-pages-wrap clearfix"><div class="link-pages">' . esc_html__( 'Continue Reading:', 'prem-blog' ),
                    'after'       => '</div></div>',
                    'link_before' => '<span class="page-numbers button">',
                    'link_after'  => '</span>',
                )
            );
        ?>
    </div><!-- /.post-content -->
</div>

<div class="display-meta clearfix">
    <div class="display-tag">
        <?php
            if( $prem_blog_tags = get_the_tags() ) {
                echo '<span class="meta-sep"></span>';
                foreach( $prem_blog_tags as $prem_blog_tags ) {
                    $prem_blog_sep = ( $prem_blog_tags === end( $prem_blog_tags ) ) ? '' : ' ';
                    echo '<a href="' . esc_url( get_term_link( $prem_blog_tags, $prem_blog_tags->taxonomy ) ) . '">#' . esc_html( $prem_blog_tags->name ) . '</a>' . esc_html( $prem_blog_sep );
                }
            }
        ?>
    </div><!-- /.display-tag -->
</div><!-- /.display-meta -->

<div class="pagination-single">
    <div class="pagination-nav clearfix">
        <?php $prem_blog_prev_post = get_adjacent_post( false, '', false ); ?>
        <?php if ( is_a( $prem_blog_prev_post, 'WP_Post' ) ) { ?>
        <div class="previous-post-wrap">
            <div class="previous-post"><a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', false )->ID ) ); ?>"><?php esc_html_e( 'Previous Post', 'prem-blog' ); ?></a></div><!-- /.previous-post -->
            <a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', false)->ID ) ); ?>" class="prev"><?php echo esc_html( get_the_title( $prem_blog_prev_post->ID ) ); ?></a>
        </div><!-- /.previous-post-wrap -->
        <?php } ?>

        <?php $prem_blog_next_post = get_adjacent_post( false, '', true ); ?>
        <?php if ( is_a( $prem_blog_next_post, 'WP_Post' ) ) { ?>
        <div class="next-post-wrap">
            <div class="next-post"><a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', true)->ID ) ); ?>"><?php esc_html_e( 'Next Post', 'prem-blog' ); ?></a></div><!-- /.next-post -->
            <a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', true)->ID ) ); ?>" class="next"><?php echo esc_html( get_the_title( $prem_blog_next_post->ID ) ); ?></a>
        </div><!-- /.next-post-wrap -->
        <?php } ?>
    </div><!-- /.pagination-nav -->
</div><!-- /.pagination-single-->

<div class="entry-footer prr-author-about">
    <div class="author-info vertical-align">
        <div class="author-image">
            <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
        </div><!-- /.author-image -->
        <div class="author-details">
            <p class="entry-author-label"><?php echo esc_html__( 'About the author', 'prem-blog' ) ?></p>
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="author-name"><?php the_author(); ?></span><!-- /.author-name --></a>
            <?php if ( get_the_author_meta( 'description' ) ) : ?>
                <p><?php the_author_meta( 'description' ); ?></p>
            <?php endif; ?>
            <div class="author-link">
                <?php if ( get_the_author_meta( 'user_url' ) ): ?>
                    <a href="<?php the_author_meta( 'user_url' ); ?>"><?php esc_html_e( 'Visit Website', 'prem-blog' );?></a>
                <?php endif ?>
            </div><!-- /.author-link -->
        </div><!-- /.author-details -->
    </div><!-- /.author-info -->
</div><!-- /.entry-footer -->
