<?php
/**
 * The template part for displaying Image content
 *
 * @package advance-pet-care
 * @subpackage advance-pet-care
 * @since advance-pet-care 1.0
 */
?>	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>
        <div class="entry-attachment">
            <div class="attachment">
                <?php advance_pet_care_the_attached_image(); ?>
            </div>
            <?php if ( has_excerpt() ) : ?>
                <div class="entry-caption">
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>    
        <?php
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'advance-pet-care' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>    
    <?php edit_post_link( __( 'Edit', 'advance-pet-care' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
            comments_template();

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav text-uppercase p-2">Published in</span><span class="post-title my-2 mx-0">%title</span>', 'Parent post link', 'advance-pet-care' ),
            ) );
        }   elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav text-uppercase p-2" aria-hidden="true">' . __( 'Next', 'advance-pet-care' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'advance-pet-care' ) . '</span> ' .
                    '<span class="post-title my-2 mx-0">%title</span>',
                'prev_text' => '<span class="meta-nav text-uppercase p-2" aria-hidden="true">' . __( 'Previous', 'advance-pet-care' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'advance-pet-care' ) . '</span> ' .
                    '<span class="post-title my-2 mx-0">%title</span>',
            )   );
        }
    ?>
</article>