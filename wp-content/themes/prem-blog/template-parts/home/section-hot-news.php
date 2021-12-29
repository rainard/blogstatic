<?php
$prem_blog_cat_id = intval( get_theme_mod( 'prem_blog_banner_list_category_setting', 1 ) );
$prem_block_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  1,
        'cat'               =>  $prem_blog_cat_id,
    );

$prem_block_item  = new WP_Query( $prem_block_args );


$prem_list_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  4,
        'offset'            =>  1,
        'cat'               =>  $prem_blog_cat_id,
    );

$prem_list_item  = new WP_Query( $prem_list_args );


$prem_blog_cat_id2 = intval( get_theme_mod( 'prem_blog_banner_list_right_category_setting', 1 ) );
$prem_block_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  1,
        'cat'               =>  $prem_blog_cat_id2,
    );

$prem_block_item2  = new WP_Query( $prem_block_args );


$prem_list_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  4,
        'offset'            =>  1,
        'cat'               =>  $prem_blog_cat_id2,
    );

$prem_list_item2  = new WP_Query( $prem_list_args );

?>

<div class="container">
    <div class="row">
        <div class="col-md-6 ct-mag-box">
            <div class="ct-alignright-content">
                <h2 class="ct-smart-listing-title"><?php echo get_theme_mod('prem_blog_hot_category_name_setting','Hot News'); ?></h2>
            </div>
            <div class="header-sidebar ct-list-margin">
                <?php
                      if ( $prem_block_item->have_posts() ) :
                            while ( $prem_block_item->have_posts() ) : $prem_block_item->the_post();
                 ?>

                <div class="ct-post-vid-thumbnail ct-top-block">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="ct-block-bg" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat scroll center center / cover;"></div>
                    <?php endif ?>
                    <div class="ct-block-content">
                         <a href="<?php the_permalink(); ?>"><h3><span class="animated-underline"><?php the_title(); ?></span></h3></a>
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
                 <?php
                      endwhile;
                      else :
                            get_template_part( 'template-parts/post/content', 'none' );
                      endif;

                      wp_reset_postdata();
                 ?>
            </div><!-- /.header-sidebar -->
            <?php if ( $prem_list_item->have_posts() ): ?>
            <div class="ct-tagged-posts">
                <div class="ct-post-list-items">
                    <?php while ( $prem_list_item->have_posts() ) : $prem_list_item->the_post(); ?>
                    <div class="ct-featured-right">
                        <div class="ct-post-item">
                            <a href="<?php the_permalink(); ?>" class="ct-post-thumb">
                                <?php the_post_thumbnail('prem-blog-250x220'); ?>
                            </a>
                        </div>
                        <div class="ct-post-details">
                            <a href="<?php the_permalink(); ?>"><h2><span class="animated-underline"><?php the_title(); ?></span></h2></a>
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

                </div>
            </div>

            <?php endif;
              wp_reset_postdata();
            ?>
        </div>
        <div class="col-md-6 ct-mag-box">
            <div class="ct-alignright-content">
                <h2 class="ct-smart-listing-title"><?php echo get_theme_mod('prem_blog_hot2_category_name_setting','Hot News'); ?></h2>
            </div>
            <div class="header-sidebar ct-list-margin">
                <?php
                      if ( $prem_block_item2->have_posts() ) :
                            while ( $prem_block_item2->have_posts() ) : $prem_block_item2->the_post();
                 ?>

                <div class="ct-top-block">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="ct-block-bg" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat scroll center center / cover;"></div>
                    <?php endif ?>
                    <div class="ct-block-content">
                         <a href="<?php the_permalink(); ?>"><h3><span class="animated-underline"><?php the_title(); ?></span></h3></a>
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
                 <?php
                      endwhile;
                      else :
                            get_template_part( 'template-parts/post/content', 'none' );
                            wp_reset_postdata();
                      endif;

                      wp_reset_postdata();
                 ?>
            </div><!-- /.header-sidebar -->
            <?php if ( $prem_list_item2->have_posts() ): ?>
            <div class="ct-tagged-posts">
                <div class="ct-post-list-items">
                    <?php while ( $prem_list_item2->have_posts() ) : $prem_list_item2->the_post(); ?>
                    <div class="ct-featured-right">
                        <div class="ct-post-item">
                            <a href="<?php the_permalink(); ?>" class="ct-post-thumb">
                                <?php the_post_thumbnail('prem-blog-250x220'); ?>
                            </a>
                        </div>
                        <div class="ct-post-details">
                            <a href="<?php the_permalink(); ?>"><h2><span class="animated-underline"><?php the_title(); ?></span></h2></a>
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

                </div>
            </div>

            <?php endif;
              wp_reset_postdata();
            ?>
        </div>
    </div>
</div>

