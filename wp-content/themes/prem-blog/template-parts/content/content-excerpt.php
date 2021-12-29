<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>
<div class="col-md-4">
    <div class="prr-post-excerpt">
        <?php if ( has_post_thumbnail() ): ?>
            <div class="featured-single-image">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'prem-blog-400-1x1' ) ?></a>
            </div><!-- /.image-container -->
        <?php endif; ?>
        <div class="prr-block-post-meta clearfix">
            <div class="prr-category">
                <?php the_category( ' - ' ); ?>
            </div><!-- .prr-category -->
            <div class="prr-times-read-area">
                <span class="icofont-clock-time"></span>
                <span class="prr-times-read"><?php echo esc_html( get_the_date() ); ?></span>
            </div><!-- .prr-times-read-area -->
        </div>
        <a href="<?php the_permalink(); ?>"><?php the_title( '<h3><span class="animated-underline">', '</span></h3>' ); ?></a>
    </div><!-- .prr-post-excerpt -->
</div><!-- .col-md-4 -->
