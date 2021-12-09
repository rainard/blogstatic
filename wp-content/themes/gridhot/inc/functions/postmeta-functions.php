<?php
/**
* Post meta functions
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_post_cat_links_text() {
    if ( gridhot_is_option_set('cat_links_text') ) {
        $cat_links_text = gridhot_get_option('cat_links_text');
    } else {
        $cat_links_text = esc_html__( 'Posted in', 'gridhot' );
    }
    return apply_filters( 'gridhot_post_cat_links_text', $cat_links_text );
}


function gridhot_post_tag_links_text() {
    if ( gridhot_is_option_set('tag_links_text') ) {
        $tag_links_text = gridhot_get_option('tag_links_text');
    } else {
        $tag_links_text = esc_html__( 'Tagged', 'gridhot' );
    }
    return apply_filters( 'gridhot_post_tag_links_text', $tag_links_text );
}

if ( ! function_exists( 'gridhot_post_tags' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function gridhot_post_tags() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'gridhot' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<span class="gridhot-tags-links"><i class="fas fa-tags" aria-hidden="true"></i> ' . esc_html__( 'Tagged %1$s', 'gridhot' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;


if ( ! function_exists( 'gridhot_grid_cats' ) ) :
function gridhot_grid_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'gridhot' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="gridhot-grid-post-categories">' . __( '<span class="gridhot-sr-only">Posted in </span>%1$s', 'gridhot' ) . '</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;


if ( ! function_exists( 'gridhot_grid_datebox' ) ) :
function gridhot_grid_datebox() { ?>
    <?php global $post; ?>
    <?php if ( gridhot_get_option('show_posted_date_box_home') ) { ?>
    <div class="gridhot-grid-datebox"><div class="gridhot-grid-datebox-inside"><div class="gridhot-grid-datebox-day"><?php echo esc_html( get_the_date('d') ); ?></div><div class="gridhot-grid-datebox-month"><?php echo esc_html( get_the_date('M') ); ?></div><?php if ( !(gridhot_get_option('hide_posted_date_year_home')) ) { ?><div class="gridhot-grid-datebox-year"><?php echo esc_html( get_the_date('Y') ); ?></div><?php } ?></div></div>
    <?php } ?>
<?php }
endif;


function gridhot_author_image_size() {
    global $post;
    $gravatar_size = 28;
    return apply_filters( 'gridhot_author_image_size', $gravatar_size );
}


if ( ! function_exists( 'gridhot_author_image' ) ) :
function gridhot_author_image( $size = '' ) {
    global $post;
    if ( $size ) {
        $gravatar_size = $size;
    } else {
        $gravatar_size = gridhot_author_image_size();
    }
    $author_email   = get_the_author_meta( 'user_email' );
    $gravatar_args  = apply_filters(
        'gridhot_gravatar_args',
        array(
            'size' => $gravatar_size,
        )
    );

    $avatar_url = '';
    if( get_the_author_meta('themesdna_userprofile_image',get_query_var('author') ) ) {
        $avatar_url = get_the_author_meta( 'themesdna_userprofile_image' );
    } else {
        $avatar_url = get_avatar_url( $author_email, $gravatar_args );
    }

    //$avatar_url     = get_avatar_url( $author_email, $gravatar_args );
    if ( gridhot_get_option('author_image_link') ) {
        $avatar_markup  = '<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'" title="'.esc_attr( get_the_author() ).'"><img class="gridhot-grid-post-author-image" alt="' . esc_attr( get_the_author() ) . '" src="' . esc_url( $avatar_url ) . '" /></a>';
    } else {
        $avatar_markup  = '<img class="gridhot-grid-post-author-image" alt="' . esc_attr( get_the_author() ) . '" src="' . esc_url( $avatar_url ) . '" />';
    }
    return apply_filters( 'gridhot_author_image', $avatar_markup );
}
endif;


if ( ! function_exists( 'gridhot_grid_header_meta' ) ) :
function gridhot_grid_header_meta() { ?>
    <?php global $post; ?>
    <?php if ( !(gridhot_get_option('hide_post_author_home')) || !(gridhot_get_option('hide_post_author_image_home')) || !(gridhot_get_option('hide_posted_date_home')) ) { ?>
    <div class="gridhot-grid-header-meta gridhot-grid-post-block">
    <div class="gridhot-grid-header-meta-inside gridhot-clearfix">
    <?php if ( !(gridhot_get_option('hide_post_author_image_home')) ) { ?><?php echo wp_kses_post( gridhot_author_image() ); ?><?php } ?>
    <?php if ( !(gridhot_get_option('hide_post_author_home')) ) { ?><span class="gridhot-grid-post-author gridhot-grid-post-meta"><i class="far fa-user" aria-hidden="true"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(gridhot_get_option('hide_posted_date_home')) ) { ?><span class="gridhot-grid-post-date gridhot-grid-post-meta"><i class="far fa-clock" aria-hidden="true"></i><?php echo esc_html(get_the_date()); ?></span><?php } ?>
    </div>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'gridhot_grid_footer_meta' ) ) :
 /**
  * Prints HTML with meta information for the categories, tags and comments.
  */
function gridhot_grid_footer_meta() {
    global $post; ?>
    <?php if ( (!(gridhot_get_option('hide_post_categories_home')) && has_category()) || (!(gridhot_get_option('hide_post_tags_home')) && has_tag()) || (!(gridhot_get_option('hide_comments_link_home')) && (! post_password_required() && ( comments_open() || get_comments_number() ))) ) { ?>
    <div class="gridhot-grid-footer-meta gridhot-grid-post-block">
    <div class="gridhot-grid-footer-meta-inside">
    <?php if ( (!(gridhot_get_option('hide_comments_link_home')) && (! post_password_required() && ( comments_open() || get_comments_number() ))) ) { ?>
    <div class="gridhot-summary-post-likes-views-comments gridhot-grid-footer-meta-block">
    <?php if ( gridhot_get_option('comments_count_home') ) { ?>
    <span class="gridhot-grid-post-comments gridhot-grid-footer-sub-meta-block"><i class="far fa-comments" aria-hidden="true"></i><?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( '0<span class="gridhot-sr-only"> Comment on %s</span>', 'gridhot' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ), sprintf( wp_kses( /* translators: %s: post title */ __( '1<span class="gridhot-sr-only"> Comment on %s</span>', 'gridhot' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ), sprintf( wp_kses( /* translators: %s: post title */ __( '%1$s<span class="gridhot-sr-only"> Comments on %2$s</span>', 'gridhot' ), array( 'span' => array( 'class' => array(), ), ) ), number_format_i18n( get_comments_number() ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } else { ?>
    <span class="gridhot-grid-post-comments gridhot-grid-footer-sub-meta-block"><i class="far fa-comments" aria-hidden="true"></i><?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( '0 Comment<span class="gridhot-sr-only"> on %s</span>', 'gridhot' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?>
    </div>
    <?php } ?>

    <?php
    if ( !(gridhot_get_option('hide_post_categories_home')) && has_category() ) {
        if ( 'post' == get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( esc_html__( ', ', 'gridhot' ) );
            if ( $categories_list ) { ?>
                <div class="gridhot-summary-post-cat-links gridhot-grid-footer-meta-block"><i class="far fa-folder-open" aria-hidden="true"></i><?php echo wp_kses_post( $categories_list ); ?></div>
            <?php }
        }
    }

    if ( !(gridhot_get_option('hide_post_tags_home')) && has_tag() ) {
        if ( 'post' == get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'gridhot' ) );
            if ( $tags_list ) { ?>
                <div class="gridhot-summary-post-tags-links gridhot-grid-footer-meta-block"><i class="fas fa-tags" aria-hidden="true"></i><?php echo wp_kses_post( $tags_list ); ?></div>
            <?php }
        }
    }
    ?>
    </div>
    </div>
    <?php } ?>
    <?php
}
endif;


if ( ! function_exists( 'gridhot_nongrid_postmeta' ) ) :
function gridhot_nongrid_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( !(gridhot_get_option('hide_post_author_home')) || !(gridhot_get_option('hide_posted_date_home')) || !(gridhot_get_option('hide_comments_link_home')) || !(gridhot_get_option('hide_post_categories_home')) ) { ?>
    <div class="gridhot-entry-meta-single">
    <?php if ( !(gridhot_get_option('hide_post_author_home')) ) { ?><span class="gridhot-entry-meta-single-author"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(gridhot_get_option('hide_posted_date_home')) ) { ?><span class="gridhot-entry-meta-single-date"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php echo esc_html( get_the_date() ); ?></span><?php } ?>
    <?php if ( !(gridhot_get_option('hide_comments_link_home')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="gridhot-entry-meta-single-comments"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="gridhot-sr-only"> on %s</span>', 'gridhot' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?><?php } ?>
    <?php if ( !(gridhot_get_option('hide_post_categories_home')) ) { ?><?php gridhot_single_cats(); ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'gridhot_single_cats' ) ) :
function gridhot_single_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( ', ', 'gridhot' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<span class="gridhot-entry-meta-single-cats"><i class="far fa-folder-open" aria-hidden="true"></i>&nbsp;' . __( '<span class="gridhot-sr-only">Posted in </span>%1$s', 'gridhot' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;


if ( ! function_exists( 'gridhot_single_postmeta' ) ) :
function gridhot_single_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( !(gridhot_get_option('hide_post_author')) || !(gridhot_get_option('hide_posted_date')) || !(gridhot_get_option('hide_comments_link')) || !(gridhot_get_option('hide_post_categories')) || !(gridhot_get_option('hide_post_edit')) ) { ?>
    <div class="gridhot-entry-meta-single">
    <?php if ( !(gridhot_get_option('hide_post_author')) ) { ?><span class="gridhot-entry-meta-single-author"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(gridhot_get_option('hide_posted_date')) ) { ?><span class="gridhot-entry-meta-single-date"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php echo esc_html( get_the_date() ); ?></span><?php } ?>
    <?php if ( !(gridhot_get_option('hide_comments_link')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="gridhot-entry-meta-single-comments"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="gridhot-sr-only"> on %s</span>', 'gridhot' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?><?php } ?>
    <?php if ( !(gridhot_get_option('hide_post_categories')) ) { ?><?php gridhot_single_cats(); ?><?php } ?>
    <?php if ( !(gridhot_get_option('hide_post_edit')) ) { ?><?php edit_post_link( sprintf( wp_kses( /* translators: %s: Name of current post. Only visible to screen readers */ __( 'Edit<span class="gridhot-sr-only"> %s</span>', 'gridhot' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ), '<span class="edit-link">&nbsp;&nbsp;<i class="far fa-edit" aria-hidden="true"></i> ', '</span>' ); ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'gridhot_page_postmeta' ) ) :
function gridhot_page_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( !(gridhot_get_option('hide_page_author')) || !(gridhot_get_option('hide_page_date')) || !(gridhot_get_option('hide_page_comments')) ) { ?>
    <div class="gridhot-entry-meta-single">
    <?php if ( !(gridhot_get_option('hide_page_author')) ) { ?><span class="gridhot-entry-meta-single-author"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(gridhot_get_option('hide_page_date')) ) { ?><span class="gridhot-entry-meta-single-date"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php echo esc_html( get_the_date() ); ?></span><?php } ?>
    <?php if ( !(gridhot_get_option('hide_page_comments')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="gridhot-entry-meta-single-comments"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="gridhot-sr-only"> on %s</span>', 'gridhot' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;