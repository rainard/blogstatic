<?php 
global $post,$resumo_fn_option;
$key = 0;
$postType	= 'post';
$list 		= '';
if(is_front_page()) {
	$paged = (get_query_var('page')) ? get_query_var('page') : 1;
} else {
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}
if(!is_search() && !is_archive() && !is_home()){
	query_posts('posts_per_page=&paged='.esc_html($paged));
}


$from_page			= 'blog';
if (isset($args['from_page'])) {
	$from_page 		= $args['from_page'];
}
if (have_posts()) : while (have_posts()) : the_post();
	$key++;
	$postID 		= get_the_id();
	$permalink 		= get_the_permalink();
	$title			= get_the_title();
	$fullImageURL	= get_the_post_thumbnail_url($postID,'full');
	$hasImage		= $fullImageURL == '' ? 0 : 1; 
	$postClasses  	= 'class="'.implode(' ', get_post_class()).' item item_'. $hasImage . '"';

	

	// Left Part
	$left_part		= '';
	if($hasImage == 1){
		$post_image	= '<a href="'.esc_url($permalink).'"></a><div class="abs_img" data-fn-bg-img="'.$fullImageURL.'"></div><img src="'.RESUMO_URI.'/assets/img/thumb/square.jpg" alt="'.esc_attr__('Image','resumo').'" />';
		$left_part	= '<div class="left_part"><div class="img_holder">'.$post_image.'</div></div>';
	}
	
	// Title
	$post_title		= '';
	if($title !== ''){
		$post_title = '<div class="post_title"><h3><a class="fn__link" href="'.esc_url($permalink).'">'.$title.'</a></h3></div>';
	}
	
	// Read More Button
	$post_read 		= resumo_fn_read_more();

	// Opener and closer
	$post_header 	= '<li class="fn_post_item_'.$key.'" id="post-'.$postID.'"><div '.$postClasses.' data-has="'.$hasImage.'">';
	$post_footer 	= '</div></li>';
	
	$desc = '<p class="fn__desc">'.resumo_fn_excerpt(55,$postID).'</p>';

	// Title Holder
	$title_holder	= '<div class="right_part"><div class="title_holder"><p class="date">'.get_the_date().'</p>'.$post_title.$desc.$post_read.'</div></div>';


	// echo
	$list .= $post_header;
		$list .= $left_part;
		$list .= $title_holder;
	$list .= $post_footer;

endwhile; endif; wp_reset_postdata();
echo wp_kses($list, 'post');
?>