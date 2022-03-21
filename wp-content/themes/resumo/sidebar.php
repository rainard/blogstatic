<div class="resumo_fn_widgets">
	<div class="forheight">
		<?php 
			if(is_page()){
				if(function_exists('rwmb_meta')){
					$sidebar = get_post_meta(get_the_ID(),'resumo_fn_page_sidebar', true);
					if ( is_active_sidebar( $sidebar ) ){
						dynamic_sidebar($sidebar);
					}else if ( is_active_sidebar( 'main-sidebar' ) ){
						dynamic_sidebar('Main Sidebar');
					}
				}else{
					if(is_active_sidebar( 'main-sidebar')){
						dynamic_sidebar('Main Sidebar');
					}	
				}
			}else if(is_single()){
				if(function_exists('rwmb_meta')){
					$sidebar = get_post_meta(get_the_ID(),'resumo_fn_page_sidebar', true);
					if ( is_active_sidebar( $sidebar ) ){
						dynamic_sidebar($sidebar);
					}else if ( is_active_sidebar( 'main-sidebar' ) ){
						dynamic_sidebar('Main Sidebar');
					}
				}else{
					if(is_active_sidebar( 'main-sidebar')){
						dynamic_sidebar('Main Sidebar');
					}	
				}
			}else  {
				if(is_active_sidebar( 'main-sidebar')){
					dynamic_sidebar('Main Sidebar');
				}
			}
		?>
	</div>
</div>