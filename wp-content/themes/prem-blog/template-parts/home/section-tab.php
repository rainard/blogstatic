<?php
        $prem_blog_args = array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'ignore_sticky_posts' => true,
        );

        $prem_blog_query = new WP_Query( $prem_blog_args );

        $prem_blog_list_args = array(
          'post_type'         =>  'post',
          'posts_per_page'    =>  4,
          'offset'            =>  2,
          'ignore_sticky_posts' => 1
        );
        $prem_blog_list_item  = new WP_Query( $prem_blog_list_args );

        $prem_blog_tax = 'category';
        $prem_blog_terms = get_terms( $prem_blog_tax );
        $prem_blog_count = count( $prem_blog_terms );
?>

<!-- Tab Section -->
<div class="container post-tags prr-spacing-bottom">
    <div class="row">
        <div class="col-md-12">
            <div class="ct-tab-content ct-mag-box">
                <div class="container-wrapper">
                    <div class="ct-mag-box-title ct-the-global-title">
                        <div class="ct-alignright-content">
                            <h2 class="ct-smart-listing-title"><?php esc_html_e('Trending News','prem-blog'); ?></h2>
                            <div class="mag-box-options">
                                <ul class="mag-box-filter-links is-flex-tabs" style="opacity: 1;">
                                    <?php
                                        echo '<li><a href="#ct-all" class="tax-filter">' . esc_html__( 'All', 'prem-blog' ) . '</a></li>';

                                        $prem_blog_count = 0;
                                        foreach ( $prem_blog_terms as $prem_blog_term ) {
                                            if ( $prem_blog_count <= 4 ) {
                                                $prem_blog_term_link = get_term_link( $prem_blog_term, $prem_blog_tax );
                                                echo '<li><a href="' . $prem_blog_term_link . '" class="tax-filter" title="' . $prem_blog_term->slug . '">' . $prem_blog_term->name . '</a></li>';
                                            }
                                            $prem_blog_count++;
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="ct-mag-box-container clearfix tagged-posts">
                        <?php if ( $prem_blog_query->have_posts() ): ?>
                        <div class="ct-posts-list-container ct-posts-items">
                            <?php while ( $prem_blog_query->have_posts() ) : $prem_blog_query->the_post(); ?>
                            <div class="ct-post-item ct-featured-left">
                                <div class="ct-big-thumb-left-box-inner" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat scroll center center / cover;">
                                </div>
                                <div class="ct-block-content">
                                     <a href="<?php the_permalink(); ?>"><h1><span class="animated-underline"><?php the_title(); ?></span></h1></a>
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
                            <?php else: ?>
                            <div class="tagged-posts js-tagged-posts">
                                <h2><?php esc_html_e( 'No posts found', 'prem-blog' ); ?></h2>
                            </div>
                            <?php endif; ?>
                            <?php if ( $prem_blog_list_item->have_posts() ): ?>
                            <div class="tagged-posts js-tagged-posts">
                                <div class="ct-post-list-items">
                                    <?php while ( $prem_blog_list_item->have_posts() ) : $prem_blog_list_item->the_post(); ?>
                                    <div class="ct-featured-right">
                                        <div class="ct-post-item">
                                            <a href="<?php the_permalink(); ?>" class="ct-post-thumb">
                                                <?php the_post_thumbnail('prem-blog-250x220'); ?>
                                            </a>
                                        </div>
                                        <div class="ct-post-details">
                                            <a href="<?php the_permalink(); ?>"><h2><span class="animated-underline"><?php the_title(); ?></span></h2></a>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>

                                </div>
                            </div>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
