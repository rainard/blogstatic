<?php
/**
* Upgrade to pro options
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license licennse URI, for example : http://www.gnu.org/licenses/gpl-2.0.html
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridhot_upgrade_to_pro($wp_customize) {

    $wp_customize->add_section( 'gridhot_section_upgrade', array( 'title' => esc_html__( 'Upgrade to Pro Version', 'gridhot' ), 'priority' => 400 ) );
    
    $wp_customize->add_setting( 'gridhot_options[upgrade_text]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );
    
    $wp_customize->add_control( new GridHot_Customize_Static_Text_Control( $wp_customize, 'gridhot_upgrade_text_control', array(
        'label'       => esc_html__( 'GridHot Pro', 'gridhot' ),
        'section'     => 'gridhot_section_upgrade',
        'settings' => 'gridhot_options[upgrade_text]',
        'description' => esc_html__( 'Do you enjoy GridHot? Upgrade to GridHot Pro now and get:', 'gridhot' ).
            '<ul class="gridhot-customizer-pro-features">' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Color Options', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Font Options', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( '1/2/3/4/5/6/7/8/9/10 Columns Options for Posts Grids', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( '10+ Thumbnail Sizes Options for Posts Grids', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Switch between CSS only Grid and Masonry Grid (JavaScript based)', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Display Ads/Custom Contents between Posts in the Grid', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Switch between Boxed or Full Layout Type', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( '10+ Layout Styles for Posts/Pages', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( '10+ Layout Styles for Non-Singular Pages', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Width Change Options for Full Website/Main Content/Left Sidebar/Right Sidebar', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( '10+ Custom Page Templates', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( '10+ Custom Post Templates', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( '3 Header Layouts with Width options - (Logo + Primary Menu + Social Buttons) / (Logo + Header Banner) / (Full Width Header)', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Footer with Layout Options (1/2/3/4/5/6 columns)', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Ability to Change Website Width/Layout Type/Layout Style/Header Style/Footer Style of any Post/Page', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Capability to Add Different Header Images for Each Post/Page with Unique Link, Title and Description', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Grid Featured Posts Widget (Recent/Categories/Tags/PostIDs based) - with capability to display posts according to Likes/Views/Comments/Dates/... and there are many options', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'List Featured Posts Widget (Recent/Categories/Tags/PostIDs based) - with capability to display posts according to Likes/Views/Comments/Dates/... and there are many options', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Tabbed Widget (Recent/Categories/Tags/PostIDs based) - with capability to display posts according to Likes/Views/Comments/Dates/... and there are many options.', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'About and Social Widget - 60+ Social Buttons', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'News Ticker (Recent/Categories/Tags/PostIDs based) - It can display posts according to Likes/Views/Comments/Dates/... and there are many options.', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Settings Panel to Control Options in Each Post', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Settings Panel to Control Options in Each Page', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Built-in Posts Views Counter', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Built-in Posts Likes System', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Built-in Infinite Scroll and Load More Button', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Post Share Buttons Styles with Options - 25+ Social Networks are Supported', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Related Posts (Categories/Tags/Author/PostIDs based) with Many Options - For both single posts and post summaries', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Sticky Header/Sticky Sidebars with enable/disable capability', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Author Bio Box with Social Buttons - 60+ Social Buttons', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Ability to Enable/Disable Mobile View from Primary and Secondary Menus', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Post Navigation with Thumbnails', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Ability to add Ads under Post Title and under Post Content', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Ability to Disable Google Fonts - for faster loading', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'More Widget Areas', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Built-in Contact Form', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'WooCommerce Compatible', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Yoast SEO Breadcrumbs Support', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Full RTL Language Support', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Search Engine Optimized', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Random Posts Button in Header', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Many Useful Customizer Theme options', 'gridhot' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'More Features...', 'gridhot' ) . '</li>' .
            '</ul>'.
            '<strong><a href="'.GRIDHOT_PROURL.'" class="button button-primary" target="_blank"><i class="fas fa-shopping-cart" aria-hidden="true"></i> ' . esc_html__( 'Upgrade To GridHot PRO', 'gridhot' ) . '</a></strong>'
    ) ) );

}