<?php

/* ------------------------------------------------------------------------ */
/* Define Sidebars */
/* ------------------------------------------------------------------------ */

add_action( 'widgets_init', 'resumo_fn_widgets_init', 1000 );

function resumo_fn_widgets_init() {
	if (function_exists('register_sidebar')) {
		/* ------------------------------------------------------------------------ */
		/* Main Sidebar
		/* ------------------------------------------------------------------------ */
		register_sidebar(array(
			'name' 			=> esc_html__('Main Sidebar', 'resumo'),
			'id'   			=> 'main-sidebar',
			'description'   => esc_html__('These are widgets for the sidebar.', 'resumo'),
			'before_widget' => '<div id="%1$s" class="widget_block clear %2$s"><div>',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="wid-title"><span>',
			'after_title'   => '</span></div>'
		));
	}
}
    
?>