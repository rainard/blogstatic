<?php
function resumo_fn_pagination($pages = '', $range = 10, $home = 0){  
	$currentPage 	= '';
	$showitems 		= ($range * 1) + 1;
	$output			= '';
	
	global $resumo_fn_paged;
    
	if(get_query_var('paged')){
		$resumo_fn_paged = get_query_var('paged');
	}elseif(get_query_var('page')) {
		$resumo_fn_paged = get_query_var('page');
	}else {
		$resumo_fn_paged = 1;
	}

	global $wp_query;
	if($pages == ''){
		$pages = $wp_query->max_num_pages;
		if(!$pages){$pages = 1;}
	}


	if(1 != $pages){
		$output .= '<div class="resumo_fn_pagination"><div class="container"><ul>';
		$list = '';
		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages &&( !($i >= $resumo_fn_paged+$range+1 || $i <= $resumo_fn_paged-$range-1) || $pages <= $showitems )){
				if($home == 1){
					if($resumo_fn_paged == $i){
						$list .= "<li><span class='current'>".esc_html($i)."</span></li>";
					}else{
						$list .= "<li><a href='".esc_url(add_query_arg( 'page', $i))."' class='inactive' >".esc_html($i)."</a></li>";
					}
				}else{
					if($resumo_fn_paged == $i){
						$list .= "<li class='active'><span class='current'>".esc_html($i)."</span></li>";
					}else{
						$list .= "<li><a href='".esc_url( get_pagenum_link($i))."' class='inactive' >".esc_html($i)."</a></li>";
					}
				}
				if($resumo_fn_paged == $i){
					$currentPage = $i;
				}
			}
		}
		if($currentPage != 1){
			$output .= "<li class='prev'><a href='".esc_url( get_pagenum_link($currentPage-1))."' class='inactive'>".esc_html__('Prev','resumo')."<span class='arrow'></span></a></li>";
		}
		$output .= $list;

		if($currentPage < $pages){
			$output .= "<li class='next'><a href='".esc_url( get_pagenum_link($currentPage+1))."' class='inactive'>".esc_html__('Next','resumo')."<span class='arrow'></span></a></li>";
		}
		
		$default_posts_per_page = get_option( 'posts_per_page' );
		$total_posts_in_this_page = $wp_query->post_count;
		$all 			= $wp_query->found_posts;
		$currentStart 	= ($currentPage - 1) * $default_posts_per_page + 1;
		$currentEnd 	= $currentStart + $total_posts_in_this_page - 1;
		$results 		= $currentStart .' - ' . $currentEnd;

		$output .= "</ul></div></div>\n";
	}
	echo wp_kses($output, 'post');
}



?>
