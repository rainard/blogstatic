<?php

$prem_blog_list_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  4,
        'offset'            =>  1,
    );

$prem_blog_list_item  = new WP_Query( $prem_blog_list_args );

?>

<div class="ct-more-post">
    <div class="container">
    <div class="row">
        <div class="col-md-12 ct-mag-box">
            <div class="ct-alignright-content">
                <h2 class="ct-smart-listing-title"><?php esc_html_e( 'More Posts', 'prem-blog' ); ?></h2>
            </div>
            <div class="ct-tagged-posts">
                <div class="ct-post-list-items">
                    <?php
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post(); ?>
                    <div class="ct-featured-right">
                        <div class="ct-post-item">
                            <a href="<?php the_permalink(); ?>" class="ct-post-thumb">
                                <?php the_post_thumbnail( 'prem-blog-250x220' ); ?>
                            </a>
                        </div>
                        <div class="ct-post-details">
                            <a href="<?php the_permalink(); ?>"><h2><span class="animated-underline"><?php the_title(); ?></span></h2></a>
                            <p class="ct-more-excerpt"><?php echo esc_html( prem_blog_excerpt( 35 ) ); ?></p>
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
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif;
                    wp_reset_postdata();
                ?>
                </div>
            </div>
            <?php
            // Pagination
            get_template_part( 'template-parts/pagination/pagination', get_post_format() );
            ?>
        </div>
    </div>
</div>

</div>
