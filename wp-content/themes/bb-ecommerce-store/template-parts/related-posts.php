<?php $related_posts = bb_ecommerce_store_related_posts();
if(get_theme_mod('bb_ecommerce_store_show_related_post',true)==1){ ?>
<?php if ( $related_posts->have_posts() ): ?>
    <div class="related-posts">
        <?php if ( get_theme_mod('bb_ecommerce_store_related_post_title','Related Posts') != '' ) {?>
            <h3 class="my-3"><?php echo esc_html( get_theme_mod('bb_ecommerce_store_related_post_title',__('Related Posts','bb-ecommerce-store')) ); ?></h3>
        <?php }?>
        <div class="row">
            <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="related-box mb-3 p-3">
                        <?php if(has_post_thumbnail()) { ?>
                            <div class="box-image mb-3">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php }?>
                        <h4><?php the_title(); ?></h4>
                        <div class="entry-content"><p class="my-2"><?php $excerpt = get_the_excerpt(); echo esc_html( bb_ecommerce_store_string_limit_words( $excerpt, esc_attr(get_theme_mod('bb_ecommerce_store_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('bb_ecommerce_store_post_suffix_option','...') ); ?></p></div>
                        <?php if( get_theme_mod('bb_ecommerce_store_button_text','READ MORE') != ''){ ?>
                            <div class="read-btn">
                                <a href="<?php the_permalink(); ?>" class="blogbutton-small" title="<?php esc_attr_e( 'READ MORE', 'bb-ecommerce-store' ); ?>"><?php echo esc_html(get_theme_mod('bb_ecommerce_store_button_text','READ MORE'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('bb_ecommerce_store_button_text','READ MORE'));?></span></a>
                            </div>
                        <?php }?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); }?>