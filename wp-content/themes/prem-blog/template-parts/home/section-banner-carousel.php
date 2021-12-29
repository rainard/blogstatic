<?php
    $prem_blog_grid_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  4,
        'cat'               =>  $prem_blog_cat_id,
        'order'             =>  'DESC',
    );
    $prem_blog_grid_item  = new WP_Query( $prem_blog_grid_args );
?>

<div class="ct-banner-carousel">
    <div class="mw-100">
        <div class="ct-posts ct-layout-carousel">
            <div class="ct-posts-wrapper">
                <?php
                    if ( $prem_blog_grid_item->have_posts() ) :
                        while ( $prem_blog_grid_item->have_posts() ) : $prem_blog_grid_item->the_post();

                ?>
                <div class="ct-post-slide">
                    <div class="ct-home-banner-slider">
                        <div class="ct-banner-slider">
                            <div class="ct-slider-featured-img" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat scroll center center / cover;">
                            </div>
                            <div class="ct-block-content">
                                <div class="ct-category">
                                    <?php the_category( ' ' ); ?>
                                </div><!-- .prr-category -->
                                <a href="<?php the_permalink(); ?>"><h3><span class="animated-underline"><?php the_title(); ?></span></h3></a>
                                <div class="ct-excerpt-meta">
                                    <div class="ct-post-meta">
                                        <div class="ct-block">
                                            <span class="ct-icon icofont-user-alt-3"></span>
                                            <span class="ct-meta ct-author"><?php the_author(); ?></span><!-- .ct-author -->
                                        </div><!-- /.ct-block -->
                                        <div class="ct-block">
                                            <span class="ct-icon icofont-clock-time"></span>
                                            <span class="ct-meta ct-times-read"><?php echo esc_html( get_the_date() ); ?></span>
                                        </div><!-- .ct-block -->
                                    </div><!-- .ct-post-meta -->
                                    <div class="ct-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        endwhile;
                    else :
                        get_template_part( 'template-parts/post/content', 'none' );
                    endif;

                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>



