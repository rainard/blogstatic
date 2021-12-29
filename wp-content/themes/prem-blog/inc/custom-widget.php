<?php

function prem_blog_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'prem-blog' ),
        'id'            => 'prem_blog-main-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in your single post sidebar area.', 'prem-blog' ),
        'before_widget' => '<div id="%1$s" class="%2$s sidebar-widgetarea widgetarea">',
        'after_widget'  => '</div><!-- /.sidebar-widgetarea -->',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Left', 'prem-blog' ),
        'id'            => 'prem_blog-footer-left',
        'description'   => esc_html__( 'Add widgets here to appear on your left footer section.', 'prem-blog' ),
        'before_widget' => '<div id="%1$s" class="%2$s widgetarea">',
        'after_widget'  => '</div><!-- /.widgetarea -->',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Middle', 'prem-blog' ),
        'id'            => 'prem_blog-footer-middle',
        'description'   => esc_html__( 'Add widgets here to appear on your middle footer section.', 'prem-blog' ),
        'before_widget' => '<div id="%1$s" class="%2$s widgetarea">',
        'after_widget'  => '</div><!-- /.widgetarea -->',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Right', 'prem-blog' ),
        'id'            => 'prem_blog-footer-right',
        'description'   => esc_html__( 'Add widgets here to appear on your right footer section.', 'prem-blog' ),
        'before_widget' => '<div id="%1$s" class="%2$s widgetarea">',
        'after_widget'  => '</div><!-- /.widgetarea -->',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}


add_action( 'widgets_init', 'prem_blog_widgets_init' );
