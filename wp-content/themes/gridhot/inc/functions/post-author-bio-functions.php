<?php
/**
* Author bio box
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_add_author_bio_box() {
    $content='';
    if (is_single()) {
        $content .= '
            <div class="gridhot-author-bio">
            <div class="gridhot-author-bio-inside">
            <div class="gridhot-author-bio-top">
            <span class="gridhot-author-bio-gravatar">
                '. get_avatar( get_the_author_meta('email') , 80 ) .'
            </span>
            <div class="gridhot-author-bio-text">
                <div class="gridhot-author-bio-name">'.esc_html__( 'Author: ', 'gridhot' ).'<span>'. get_the_author_link() .'</span></div><div class="gridhot-author-bio-text-description">'. wp_kses_post( get_the_author_meta('description',get_query_var('author') ) ) .'</div>
            </div>
            </div>
            </div>
            </div>
        ';
    }
    return apply_filters( 'gridhot_add_author_bio_box', $content );
}