<?php
/**
* Template part for displaying posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<?php $gridhot_grid_post_content = get_the_content(); ?>
<div id="post-<?php the_ID(); ?>" class="gridhot-grid-post gridhot-4-col">
<div class="gridhot-grid-post-inside">

    <?php gridhot_media_content_grid(); ?>

    <?php gridhot_grid_header_meta(); ?>

    <?php if ( !(gridhot_get_option('hide_post_title_home')) ) { ?>
    <?php if ( gridhot_get_option('post_title_link_home') == 'no' ) { ?>
        <div class="gridhot-grid-post-header gridhot-grid-post-block gridhot-clearfix"><div class="gridhot-grid-post-header-inside gridhot-clearfix"><?php the_title( '<h3 class="gridhot-grid-post-title">', '</h3>' ); ?></div></div>
    <?php } else { ?>
        <div class="gridhot-grid-post-header gridhot-grid-post-block gridhot-clearfix"><div class="gridhot-grid-post-header-inside gridhot-clearfix"><?php the_title( sprintf( '<h3 class="gridhot-grid-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?></div></div>
    <?php } ?>
    <?php } ?>

    <?php if ( !(gridhot_get_option('hide_post_snippet')) ) { ?>
    <?php if ( !empty( $gridhot_grid_post_content ) ) { ?><div class="gridhot-grid-post-snippet gridhot-grid-post-block"><div class="gridhot-grid-post-snippet-inside"><?php the_excerpt(); ?></div></div><?php } ?>
    <?php } ?>

    <?php gridhot_grid_footer_meta(); ?>

    <?php if ( !(gridhot_get_option('hide_share_buttons_home')) ) { echo wp_kses_post( force_balance_tags( gridhot_small_share_buttons() ) ); } ?>

</div>
</div>