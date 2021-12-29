<div class="post-hor-2">
    <div class="prr-sbs-post-excerpt clearfix">
            <?php if ( has_post_thumbnail() ): ?>
                <div class="content-left">
                    <div class="featured-single-image">
                        <?php the_post_thumbnail() ?>
                    </div><!-- /.image-container -->
                </div><!-- .content-left -->
        <div class="content-right">
            <?php endif; ?>
            <div class="prr-block-post-meta clearfix">
                <div class="prr-category">
                    <?php the_category( ' ' ); ?>
                </div><!-- .prr-category -->
            </div>
            <a href="<?php the_permalink(); ?>"><?php the_title( '<h2><span class="animated-underline">', '</span></h2>' ); ?></a>
            <div class="prr-times-read-area clearfix">
                <span class="icofont-clock-time"></span>
                <span class="prr-times-read"><?php prem_blog_post_read_time( get_the_ID() ); ?></span>
            </div><!-- .prr-times-read-area -->
            <div class="prr-excerpt">
                <?php the_excerpt(); ?>
            </div>
        <?php if ( has_post_thumbnail() ): ?>
        </div><!-- .content-right -->
        <?php endif; ?>
    </div><!-- .prr-sbs-post-excerpt -->
</div><!-- .post-slide-hor -->
