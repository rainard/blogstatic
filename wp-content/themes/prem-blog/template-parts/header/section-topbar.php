<?php

    $prem_blog_grid_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  4,
        'order'             =>  'ASC',
    );
    $prem_blog_grid_item  = new WP_Query( $prem_blog_grid_args );
?>
<div class="ct-topbar">
    <div class="container">
        <div class="col-md-8">
            <div class="ct-header-left clearfix">
                <div class="ct-breaking-title">
                    <p><?php esc_html_e('BREAKING NEWS','prem-blog') ?></p>
                </div>
            <div class="ct-breaking-container clearfix">
            <?php
                if ( $prem_blog_grid_item->have_posts() ) :
                    while ( $prem_blog_grid_item->have_posts() ) : $prem_blog_grid_item->the_post();

            ?>
                <div class="ct-breaking-post-title">
                    <a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>


            </div><!-- /.ct-header-left -->
        </div>

        <div class="col-md-4">
            <div class="ct-header-right">
                <span id="ct-datetime"><?php echo esc_html( date("l, F jS, Y") ); ?></span>
            </div><!-- /.ct-header-right -->
        </div>
    </div><!-- /.ct-topbar -->
</div>
