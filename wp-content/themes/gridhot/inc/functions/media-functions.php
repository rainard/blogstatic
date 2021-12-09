<?php
/**
* Media functions
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_media_content_grid() {
    global $post; ?>
    <?php if ( !(gridhot_get_option('hide_thumbnail_home')) ) { ?>
    <?php if ( has_post_thumbnail($post->ID) ) { ?>
    <div class="gridhot-grid-post-thumbnail gridhot-grid-post-block">
        <?php if ( gridhot_get_option('thumbnail_link_home') == 'no' ) { ?>
            <?php the_post_thumbnail('gridhot-360w-270h-image', array('class' => 'gridhot-grid-post-thumbnail-img', 'title' => the_title_attribute('echo=0'))); ?>
        <?php } else { ?>
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="gridhot-grid-post-thumbnail-link" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'gridhot' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail('gridhot-360w-270h-image', array('class' => 'gridhot-grid-post-thumbnail-img', 'title' => the_title_attribute('echo=0'))); ?></a>
        <?php } ?>
        <?php gridhot_grid_datebox(); ?>
    </div>
    <?php } else { ?>
    <?php if ( !(gridhot_get_option('hide_default_thumbnail')) ) { ?>
    <div class="gridhot-grid-post-thumbnail gridhot-grid-post-thumbnail-default gridhot-grid-post-block">
        <?php if ( gridhot_get_option('thumbnail_link_home') == 'no' ) { ?>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/no-image-360-270.jpg' ); ?>" class="gridhot-grid-post-thumbnail-img"/>
        <?php } else { ?>
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="gridhot-grid-post-thumbnail-link" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'gridhot' ), the_title_attribute( 'echo=0' ) ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/no-image-360-270.jpg' ); ?>" class="gridhot-grid-post-thumbnail-img"/></a>
        <?php } ?>
        <?php gridhot_grid_datebox(); ?>
    </div>
    <?php } ?>
    <?php } ?>
    <?php } ?>
<?php }

function gridhot_media_content_single() {
    global $post;
    if ( has_post_thumbnail() ) {
        if ( !(gridhot_get_option('hide_thumbnail')) ) {
            if ( gridhot_get_option('thumbnail_link') == 'no' ) { ?>
                <div class="gridhot-post-thumbnail-single">
                <?php
                if ( is_page_template( array( 'template-full-width-post.php' ) ) ) {
                    the_post_thumbnail('gridhot-1222w-autoh-image', array('class' => 'gridhot-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                } else {
                    the_post_thumbnail('gridhot-897w-autoh-image', array('class' => 'gridhot-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                }
                ?>
                </div>
            <?php } else { ?>
                <div class="gridhot-post-thumbnail-single">
                <?php if ( is_page_template( array( 'template-full-width-post.php' ) ) ) { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'gridhot' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="gridhot-post-thumbnail-single-link"><?php the_post_thumbnail('gridhot-1222w-autoh-image', array('class' => 'gridhot-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php } else { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'gridhot' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="gridhot-post-thumbnail-single-link"><?php the_post_thumbnail('gridhot-897w-autoh-image', array('class' => 'gridhot-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php } ?>
                </div>
    <?php   }
        }
    }
}

function gridhot_media_content_single_location() {
    if( gridhot_get_option('featured_media_under_post_title') ) {
        add_action('gridhot_after_single_post_title', 'gridhot_media_content_single', 10 );
    } else {
        add_action('gridhot_before_single_post_title', 'gridhot_media_content_single', 10 );
    }
}
add_action('template_redirect', 'gridhot_media_content_single_location', 100 );

function gridhot_media_content_page() {
    global $post; ?>
    <?php
    if ( has_post_thumbnail() ) {
        if ( !(gridhot_get_option('hide_page_thumbnail')) ) {
            if ( gridhot_get_option('thumbnail_link_page') == 'no' ) { ?>
                <div class="gridhot-post-thumbnail-single">
                <?php
                if ( is_page_template( array( 'template-full-width-page.php' ) ) ) {
                    the_post_thumbnail('gridhot-1222w-autoh-image', array('class' => 'gridhot-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                } else {
                    the_post_thumbnail('gridhot-897w-autoh-image', array('class' => 'gridhot-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                }
                ?>
                </div>
            <?php } else { ?>
                <div class="gridhot-post-thumbnail-single">
                <?php if ( is_page_template( array( 'template-full-width-page.php' ) ) ) { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'gridhot' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="gridhot-post-thumbnail-single-link"><?php the_post_thumbnail('gridhot-1222w-autoh-image', array('class' => 'gridhot-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php } else { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'gridhot' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="gridhot-post-thumbnail-single-link"><?php the_post_thumbnail('gridhot-897w-autoh-image', array('class' => 'gridhot-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php } ?>
                </div>
    <?php   }
        }
    }
    ?>
<?php }

function gridhot_media_content_page_location() {
    if( gridhot_get_option('featured_media_under_page_title') ) {
        add_action('gridhot_after_single_page_title', 'gridhot_media_content_page', 10 );
    } else {
        add_action('gridhot_before_single_page_title', 'gridhot_media_content_page', 10 );
    }
}
add_action('template_redirect', 'gridhot_media_content_page_location', 110 );

function gridhot_media_content_nongrid() {
    global $post;
    if ( has_post_thumbnail() ) {
        if ( !(gridhot_get_option('hide_thumbnail')) ) {
            if ( gridhot_get_option('thumbnail_link') == 'no' ) { ?>
                <div class="gridhot-post-thumbnail-single">
                <?php
                if ( is_page_template( array( 'template-full-width-post.php' ) ) ) {
                    the_post_thumbnail('gridhot-1222w-autoh-image', array('class' => 'gridhot-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                } else {
                    the_post_thumbnail('gridhot-897w-autoh-image', array('class' => 'gridhot-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                }
                ?>
                </div>
            <?php } else { ?>
                <div class="gridhot-post-thumbnail-single">
                <?php if ( is_page_template( array( 'template-full-width-post.php' ) ) ) { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'gridhot' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="gridhot-post-thumbnail-single-link"><?php the_post_thumbnail('gridhot-1222w-autoh-image', array('class' => 'gridhot-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php } else { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'gridhot' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="gridhot-post-thumbnail-single-link"><?php the_post_thumbnail('gridhot-897w-autoh-image', array('class' => 'gridhot-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php } ?>
                </div>
    <?php   }
        }
    }
}

function gridhot_media_content_nongrid_location() {
    if( gridhot_get_option('featured_nongrid_media_under_post_title') ) {
        add_action('gridhot_after_nongrid_post_title', 'gridhot_media_content_nongrid', 10 );
    } else {
        add_action('gridhot_before_nongrid_post_title', 'gridhot_media_content_nongrid', 10 );
    }
}
add_action('template_redirect', 'gridhot_media_content_nongrid_location', 120 );