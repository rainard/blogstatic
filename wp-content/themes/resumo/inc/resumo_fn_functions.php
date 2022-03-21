<?php
/*-----------------------------------------------------------------------------------*/
/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
/*-----------------------------------------------------------------------------------*/	

global $resumo_fn_option, $post;


use Frel\Frel_Helper;

if ( class_exists( 'Resumo_Block_Patterns_Registry' ) ) {register_block_pattern();}

function resumo_fn_right_part(){
	$html = '';
	global $post,$resumo_fn_option;
	
	// trigger
	$trigger = '<a href="#" class="menu_trigger"><span class="text">'.esc_html__('Menu', 'resumo').'</span><span class="hamb"><span></span><span></span><span></span></span></a>';
	
	$sidebar = resumo_fn_sidebar_page();
	if($sidebar != ''){
		$contentHTML = $sidebar;
	}else{
		// right image
		$rb_image = RESUMO_URI.'/assets/img/right.jpg';
		if(isset($resumo_fn_option['rb_image']['url']) && $resumo_fn_option['rb_image']['url'] != ''){
			$rb_image = $resumo_fn_option['rb_image']['url'];
		}
		// right title
		$rb_title = esc_html__('Hi There! I am', 'resumo');
		if(isset($resumo_fn_option['rb_title']) && $resumo_fn_option['rb_title'] != ''){
			$rb_title = $resumo_fn_option['rb_title'];
		}
		// animated text
		$rb_animatedtext = array();
		$rb_animatedtext[] = esc_html__('Bruce Wilson','resumo');
		$rb_animatedtext[] = esc_html__('Web Developer','resumo');
		$rb_animatedtext[] = esc_html__('Freelancer','resumo');
		$rb_animatedtext[] = esc_html__('Photographer','resumo');
		if(isset($resumo_fn_option['rb_animatedtext'])){
			$list = $resumo_fn_option['rb_animatedtext'];
			if(!empty($list)){
				foreach ($list as $key => $value) {
					if (empty($value)) { unset($list[$key]);}
				}
			}
			
		}
		if(isset($list) && !empty($list)){$rb_animatedtext = $list;}
		$animatedTitle = '<span class="animated_title">';
		foreach($rb_animatedtext as $text){
			$animatedTitle .= '<span class="title_in">'.$text.'</span>';
		}
		$animatedTitle .= '</span>';
		
		
		// since v1.0.2
		$rb_bottom_link = 'enabled';
		if(isset($resumo_fn_option['rb_bottom_link'])){
			$rb_bottom_link = $resumo_fn_option['rb_bottom_link'];
		}
		$rb_link_url = '#contact';
		if(isset($resumo_fn_option['rb_link_url'])){
			$rb_link_url = $resumo_fn_option['rb_link_url'];
		}
		$rb_link_text = esc_html__('I am available for a freelance job. Hire me', 'resumo');
		if(isset($resumo_fn_option['rb_link_text'])){
			$rb_link_text = $resumo_fn_option['rb_link_text'];
		}
		$bottom = '';
		if($rb_bottom_link == 'enabled'){
			$bottom = '<div class="right_bottom">
							<a href="'.$rb_link_url.'">
								<span class="circle"></span>
								<span class="text">'.$rb_link_text.'</span>
							</a>
						</div>';
		}
		
		$contentHTML = '<div class="resumo_fn_ava"><div class="right_top">
							<div class="border1"></div><div class="border2"></div>
							<div class="img_holder">
								<a href="'.esc_url(home_url('/')).'" title="'.esc_attr__( 'Home', 'resumo' ).'"><img src="'.RESUMO_URI.'/assets/img/thumb/square.jpg" alt="'.esc_attr__( 'Image', 'resumo' ).'" /></a>
								<div class="abs_img" data-fn-bg-img="'.$rb_image.'"></div>
							</div>
							<div class="title_holder">
								<h5>'.$rb_title.'</h5>
								<h3>'.$animatedTitle.'</h3>
							</div>
						</div>
						'.$bottom.'
						</div>';
	}
	
	$content = '<div class="right_in">';
	$content .= $contentHTML;
	$content .= '</div>';
	
	$html = '<div class="resumo_fn_right">';
	$html .= $trigger;
	$html .= $content;
	$html .= '</div>';
	
	return $html;
}

function resumo_fn_sidebar_page($output = 'sidebar'){
	global $post;
	$is_true = false;
	if(empty($post->post_password) && (is_single() || is_page() || (( is_home() || is_front_page() ) && have_posts()) || is_archive())){
		$is_true = true;
	}
	if($is_true){
		$page_style	= 'ws';
		if(is_page()){$page_style = '';}
		if(is_page_template('page-blog.php')){$page_style = 'ws';}
		if($post->post_type === 'resumo-project'){$page_style = 'full';}
		if(isset(get_post_meta(get_the_ID())['resumo_fn_page_style'])){
			$page_style = get_post_meta(get_the_ID(), 'resumo_fn_page_style', true);
		}
		if($page_style == 'ws' && !resumo_fn_if_has_sidebar()){$page_style = 'full';}
		if($output == 'class'){
			if($page_style == 'ws'){
				return 'fn__sidebarpage';
			}else{
				return '';
			}
		}
		if($page_style == 'ws'){
			ob_start();
			get_sidebar();
			$sidebar = ob_get_contents();
			ob_end_clean();
			return $sidebar;
		}
	}
	return '';
}

add_filter( 'body_class','resumo_body_classes' );
function resumo_body_classes( $classes ) {
 	global $resumo_fn_option;
	
	// if core is ready to use
	if(isset($resumo_fn_option)){$core_ready = 'core_ready';}else{$core_ready = 'core_absent';}
	$classes[] = esc_html($core_ready);
	$classes[] = esc_html(resumo_fn_sidebar_page('class'));
     
    return $classes;
     
}


function resumo_fn_prevnext(){
	global $resumo_fn_option;
	$previous_post 		= get_adjacent_post(false, '', true);
	$next_post 			= get_adjacent_post(false, '', false);
	$prevtext			= esc_html__('(p) Prev Post', 'resumo');
	$nexttext			= esc_html__('(n) Next Post', 'resumo');
	$noImage			= esc_html__('No Image', 'resumo');
	$animation			= 3;
	$prevImgURL = $nextImgURL = $prevPostURL = $prevPostTitle = $nextPostURL = $nextPostTitle = '';
	if(!empty($previous_post)) {
		$prevPostTitle 	= $previous_post->post_title;
		$prevPostID		= $previous_post->ID;
		$prevPostURL	= '<a class="resumo_fn_hotlink__prev_post" href="'.get_permalink($previous_post->ID).'"></a>';
		$thumbID 		= get_post_thumbnail_id( $prevPostID );
		if($thumbID){
			$prevImgURL = wp_get_attachment_image_src( $thumbID, 'full')[0];
		}
	}
	if(!empty($next_post)) {
		$nextPostTitle 	= $next_post->post_title;
		$nextPostID		= $next_post->ID;
		$nextPostURL	= '<a class="resumo_fn_hotlink__next_post" href="'.get_permalink($next_post->ID).'"></a>';
		$thumbID 		= get_post_thumbnail_id( $nextPostID );
		if($thumbID){
			$nextImgURL = wp_get_attachment_image_src( $thumbID, 'full')[0];
		}
	}
	
	$arrow				= resumo_fn_getSVG_theme('arrow-r');
	
	$prevArrow			= '';	
	$nextArrow			= '';
	if ($previous_post && $next_post) { 
		$prevnext		= 'yes';
		$nextArrow		= $arrow;
		$prevArrow		= $arrow;
	}else if(!$previous_post && $next_post){
		$prevnext		= 'next';
		$prevtext 		= '';
		$prevArrow		= '';
		$nextArrow		= $arrow;
	}else if($previous_post && !$next_post){
		$prevnext		= 'prev';
		$nexttext 		= '';
		$nextArrow		= '';
		$prevArrow		= $arrow;
	}else{
		$prevnext		= 'no';
	}

	$prevPostBg		= '<div class="abs_img" data-fn-bg-img="'.$prevImgURL.'" data-alt="'.$noImage.'"><div></div></div>';
	$nextPostBg		= '<div class="abs_img" data-fn-bg-img="'.$nextImgURL.'" data-alt="'.$noImage.'"><div></div></div>';
	
	if($animation == 3){
		$prevPost		= '<div class="prev_post n_post">'.$prevPostBg.$prevPostURL.'<div class="prev_in n_post_in">'.$prevArrow.'<p>'.$prevtext.'</p><h3>'.$prevPostTitle.'</h3></div></div>';
		$nextPost		= '<div class="next_post n_post">'.$nextPostBg.$nextPostURL.'<div class="next_in n_post_in">'.$nextArrow.'<p>'.$nexttext.'</p><h3>'.$nextPostTitle.'</h3></div></div>';
	}else{
		$prevPost		= '<div class="prev_post n_post">'.$prevPostURL.'<div class="prev_in n_post_in">'.$prevPostBg.$prevArrow.'<p>'.$prevtext.'</p><h3>'.$prevPostTitle.'</h3></div></div>';
		$nextPost		= '<div class="next_post n_post">'.$nextPostURL.'<div class="next_in n_post_in">'.$nextPostBg.$nextArrow.'<p>'.$nexttext.'</p><h3>'.$nextPostTitle.'</h3></div></div>';
	}
		
	
	$prevNextBox	= '<div class="resumo_fn_prevnext" data-switch="'.esc_attr($prevnext).'" data-hotkey="enabled" data-alpha-animation="3">';
			$prevNextBox	.= '<div class="prevnext_inner">';
				$prevNextBox	.= $prevPost;
				$prevNextBox	.= $nextPost;
			$prevNextBox	.= '</div>';
		$prevNextBox	.= '</div>';
	return $prevNextBox;
}


function resumo_fn_search_form( $form ) {
    $form = '<form method="get" class="searchform" action="' . esc_url(home_url( '/' )) . '" ><div class="search-wrapper"><input type="text" value="' . get_search_query() . '" name="s" placeholder="'.esc_attr__('Search anything...', 'resumo').'" /><input type="submit" value="" /><span>'.resumo_fn_getSVG_theme('search').'</span></div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'resumo_fn_search_form', 100 );

function resumo_fn_custom_password_form() {
    global $post;
 
    $loginurl = esc_url(home_url()) . '/wp-login.php?action=postpass';
    ob_start();
    ?>
    <div class="container-custom">            
        <form action="<?php echo esc_attr( $loginurl ) ?>" method="post" class="center-custom search-form" >
            <input name="post_password" class="input post-password-class" type="password" />
            <input type="submit" name="Submit" class="button" value="<?php echo esc_attr__( 'Authenticate', 'resumo' ); ?>" />            
        </form>
    </div>
 
    <?php
    return ob_get_clean();
}   
add_filter( 'the_password_form', 'resumo_fn_custom_password_form', 9999 );

function resumo_fn_post_taxanomy($post_type = 'post'){	
		$selectedPostTaxonomies = array();
		
		if( $post_type != 'page' && $post_type != '' ){
			$taxonomys 	= get_object_taxonomies( $post_type );
			$exclude 	= array( 'post_tag', 'post_format' );
			if(!empty($taxonomys)){
				foreach($taxonomys as $key => $taxonomy){
					if( in_array( $taxonomy, $exclude ) ) { continue; }
					$selectedPostTaxonomies[$key] = $taxonomy;
				}
			}
		}
	
		return $selectedPostTaxonomies;
	}

function resumo_fn_html5_search_form( $form ) {
     $form  = '<section class="search"><form method="get" action="' . esc_url(home_url( '/' )) . '" >';
		 $form .= '<label class="screen-reader-text" for="s"></label>';
		 $form .= '<input type="text" value="' . get_search_query() . '" name="s" placeholder="'. esc_attr__('Search', 'resumo') .'" />';
		 $form .= '<input type="submit" value="'. esc_attr__('Search', 'resumo') .'" />';
	 $form .= '</form></section>';
     return $form;
}

 add_filter( 'get_search_form', 'resumo_fn_html5_search_form' );



function resumo_fn_get_category($postID, $count = 1, $postType = 'post'){
	$taxonomy = resumo_fn_post_taxanomy($postType)[0];
	return '<span class="category_name">'.resumo_fn_taxanomy_list($postID, $taxonomy, false, $count).'</span>';
}


function resumo_fn_read_more(){
	return '<div class="resumo_fn_read"><a href="'.get_the_permalink().'">'.esc_html__('Read More', 'resumo').'</a></div>';
}

add_filter('wp_list_categories', 'resumo_fn_cat_count_span');
function resumo_fn_cat_count_span($links) {
  	$links = str_replace('</a> (', '</a> <span class="count">', $links);
  	$links = str_replace(')', '</span>', $links);
  	return $links;
}

function resumo_fn_if_has_sidebar(){
	if ( is_active_sidebar( 'main-sidebar' ) ){return true;}
	return false;
}

function resumo_fn_getSVG_core($name = '', $class = ''){
	return '<img class="fn__svg '.$class.'" src="'.RESUMO_CORE_SHORTCODE_URL.'assets/svg/'.$name.'.svg" alt="svg" />';
}

function resumo_fn_getSVG_theme($name = '', $class = ''){
	return '<img class="fn__svg '.$class.'" src="'.get_template_directory_uri().'/assets/svg/'.$name.'.svg" alt="svg" />';
}

function resumo_fn_portfolio_url($postID = ''){
	if(!is_int($postID)){
		$postID = get_the_ID();
	}
	$gallery = $soundcloud = $vimeo = $youtube = '';
	if(function_exists('rwmb_meta')){
		$youtube 	= rwmb_meta( 'resumo_fn_portfolio_youtube_url', 'true', $postID );
		$vimeo 		= rwmb_meta( 'resumo_fn_portfolio_vimeo_url', 'true', $postID );
		$soundcloud = rwmb_meta( 'resumo_fn_portfolio_soundcloud_url', 'true', $postID );
		$gallery	= rwmb_meta( 'resumo_fn_portfolio_images', 'type=image&size=full', $postID );
		if($youtube != ''){
			return array('resumo_popup_youtube',esc_url($youtube));
		}
		if($vimeo != ''){
			return array('resumo_popup_vimeo',esc_url($vimeo));
		}
		if($soundcloud != ''){
			return array('resumo_popup_soundcloude mfp-iframe audio',esc_url($soundcloud));
		}
		if(!empty($gallery)){
			$list='';$k=0;
			foreach($gallery as $item){
				$href  = wp_get_attachment_image_src( $item['ID'], 'full' )[0];
				$list .= '<a class="zoom zoom_'.$k.'" href="'.$href.'"></a>';
				$k++;
			}
			return array('resumo_popup_gallery',$list);
		}
	}
	return '';
}
function resumo_fn_getSocialList(){
	global $resumo_fn_option, $post;
	
	$socialPosition 			= array();
	if(isset($resumo_fn_option['social_position'])){
		$socialPosition 		= $resumo_fn_option['social_position'];
	}
	$socialType 				= 'icon';
	if(isset($resumo_fn_option['social_type'])){
		$socialType 			= $resumo_fn_option['social_type'];
	}


	$socialHTML				= '';
	$socialList				= '';
	foreach($socialPosition as $key => $sPos){
		if($sPos == 1){
			if(isset($resumo_fn_option[$key.'_helpful']) && $resumo_fn_option[$key.'_helpful'] != ''){
				$icon			= $key;
				if($socialType == 'icon'){
					if($key == 'google'){
						$icon	= 'gplus';
					}else if($key == 'rocketchat'){
						$icon	= 'rocket';
					}else if($key == 'youtube'){
						$icon	= 'youtube-play';
					}
					$aInner		= '<i class="fn-icon-'.$icon.'"></i>';
				}else{
					$aInner = $resumo_fn_option[$key.'_abbr'];
				}
				
				$socialList .= '<li><a href="'.esc_url($resumo_fn_option[$key.'_helpful']).'" target="_blank">'.$aInner.'</a></li>';
			}
		}
	}

	if($socialList != ''){
		$socialHTML .= '<div class="resumo_fn_social_list"><ul>';
			$socialHTML .= $socialList;
		$socialHTML .= '</ul></div>';
	}

	return $socialHTML;
	
}

function resumo_fn_get_posts(){
	$filter_page = '';
	$only_thumb = '';
	$post_number = 4;
	if(!empty($_POST['filter_page'])){
		$filter_page 			= $_POST['filter_page'];
	}
	if(!empty($_POST['post_number'])){
		$post_number 			= $_POST['post_number'];
	}
	if(!empty($_POST['only_thumb'])){
		$only_thumb 			= $_POST['only_thumb'];
	}
	
	$paged 						= (int)$filter_page;
	$query_args = array(
		'post_type' 			=> 'post',
		'post_status' 			=> 'publish',
	);
	if($only_thumb == 'yes'){
		$query_args['meta_query'] = array( array('key' => '_thumbnail_id') );
	}
	$query_args['paged'] = $paged;
	$query_args2 = array(
		'post_type' 			=> 'post',
		'post_status' 			=> 'publish',
	);
	if($only_thumb == 'yes'){
		$query_args2['meta_query'] = array( array('key' => '_thumbnail_id') );
	}


	$query_args['posts_per_page'] = -1;
	$loop2 						= new \WP_Query($query_args);
	$all_posts_count			= count($loop2->posts);
	$query_args['posts_per_page'] = $post_number;
	$loop 						= new \WP_Query($query_args);
	$specified_posts_count		= count($loop->posts);

	$list = '';
	
	
	if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); 
		$key++;
		$postID 		= get_the_id();
		$permalink 		= get_the_permalink();
		$title			= get_the_title();
		$fullImageURL	= get_the_post_thumbnail_url($postID,'full');
		$hasImage		= $fullImageURL == '' ? 0 : 1; 



		// Left Part
		$left_part		= '';
		if($hasImage == 1){
			$post_image	= '<a href="'.esc_url($permalink).'"></a><div class="abs_img" data-fn-bg-img="'.$fullImageURL.'"></div><img src="'.RESUMO_URI.'/assets/img/thumb/square.jpg" alt="'.esc_attr__('Image','resumo').'" />';
			$left_part	= '<div class="img_holder">'.$post_image.'</div>';
		}

		// Title
		$post_title		= '';
		if($title !== ''){
			$post_title = '<div class="post_title"><h3><a class="fn__link" href="'.esc_url($permalink).'">'.$title.'</a></h3></div>';
		}

		// Opener and closer
		$post_header 	= '<li class="be_animated new_item fn_post_item_'.$key.'"><div class="item" data-has="'.$hasImage.'">';
		$post_footer 	= '</div></li>';


		// Title Holder
		$title_holder	= '<div class="title_holder"><p class="date">'.get_the_date().'</p>'.$post_title.'</div>';


		// echo
		$list .= $post_header;
			$list .= $left_part;
			$list .= $title_holder;
		$list .= $post_footer;
	
	endwhile; endif; wp_reset_postdata();
	
	
	
	$disabled = '';
	if(($specified_posts_count + ($post_number*($paged-1))) >= $all_posts_count){
		$disabled = 'disabled';
	}
	
	
	$buffyArray = array(
		'data' 			=> $list,
		'disabled' 		=> $disabled,
    );
	
	die(json_encode($buffyArray));
}


function resumo_fn_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' 			=> get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' 		=> $attachment->post_excerpt,
		'description' 	=> $attachment->post_content,
		'href' 			=> get_permalink( $attachment->ID ),
		'src' 			=> $attachment->guid,
		'video_URL' 	=> $attachment->_image_video_url,
		'external_URL' 	=> $attachment->_image_fn_url,
		'title' 		=> $attachment->post_title
	);
}

function resumo_fn_get_logo($from = '', $for = 'desktop'){
	global $resumo_fn_option;
	$description  = get_bloginfo( 'description', 'display' );
	if(isset($resumo_fn_option['logo_location']) && $resumo_fn_option['logo_location'] === 'own'){
		if(isset($resumo_fn_option[$for.'_logo']['url']) && $resumo_fn_option[$for.'_logo']['url'] != ''){
			return '<a href="'.esc_url(home_url('/')).'"><img src="'.$resumo_fn_option[$for.'_logo']['url'].'" alt="'.esc_html( $description ).'" title="'.esc_html( $description ).'" /></a>';
		}
	}
	$blog_info    = get_bloginfo( 'name' );
	$show_title   = display_header_text();
	$header_class = $show_title ? 'site-title' : 'screen-reader-text';
	if (has_custom_logo() && $from == ''){
		return get_custom_logo();
	}
	$result		 = '';
	if ( ($blog_info && $from == '') || ($blog_info && $from == 'top' && $show_title && has_custom_logo()) ){
		if ( is_front_page() && ! is_paged() ){
			$result .= '<h1 class="'. esc_attr( $header_class ) . '"><span>'. esc_html( $blog_info ) . '</span></h1>';
		}else if ( is_front_page() && ! is_home() ){
			$result .= '<h1 class="' .esc_attr( $header_class ) . '"><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( $blog_info ) . '</a></h1>';
		}else{
			$result .= '<p class="' . esc_attr( $header_class ) . '"><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( $blog_info ) . '</a></p>';
		}
	}
	if ( ($description && $from == '') || ($description && $show_title && has_custom_logo() && $from == 'top') ){
		$result .= '<p class="site-description">';
			$result .= 	$description;
		$result .= '</p>';
	}
	if($from == 'top' && $result !== ''){
		$result = '<div class="site-branding">'.$result.'</div>';
	}
	return $result;
}



function resumo_fn_protectedpage(){
	$protected = '<div class="resumo-fn-protected"><div class="fn-container">';
		$protected .= '<div class="message_holder">';
			$protected .= '<span class="icon">'.resumo_fn_getSVG_theme('lock').'</span>';
			$protected .= '<h3>'.esc_html__('Protected Page','resumo').'</h3>';
			$protected .= '<p>'.esc_html__('Please, enter the password to have access to this page.','resumo').'</p>';
			$protected .= get_the_password_form();
		$protected .= '</div>';
	$protected .= '</div></div>';
	return $protected;
}


function resumo_fn_get_category_info($postID, $categoryCount = 2){
	$categoryCount		= (int)$categoryCount;
	$taxonomy			= 'category';
	$catHolder			= '';
	if(resumo_fn_taxanomy_list($postID, $taxonomy, false, $categoryCount) != ""){
		$catHolder		= resumo_fn_taxanomy_list($postID, $taxonomy, false, $categoryCount, ' , ', 'fn_category fn__link');
	}else{
		return '';
	}
	
	return '<div class="resumo_fn_category_info">'.esc_html__('In ', 'resumo').$catHolder.'</div>';
}
function resumo_fn_taxanomy_list($postid, $taxanomy, $echo = false, $max = 2, $seporator = ' , ', $class = ''){
	$terms = $term_list = $term_link = $cat_count = '';
	$terms = get_the_terms($postid, $taxanomy);

	if($terms != ''){

		$cat_count = sizeof($terms);
		if($cat_count >= $max){$cat_count = $max;}

		for($i = 0; $i < $cat_count; $i++){
			$term_link 		= get_term_link( $terms[$i]->slug, $taxanomy );
			$lastItem 		= '';
			if($i == ($cat_count-1)){
				$lastItem 	= 'fn_last_category';
			}
			$term_list .= '<a class="' . esc_attr($class) .' '. esc_attr($lastItem) .'" href=" '. esc_url($term_link) . '">' . $terms[$i]->name . '</a>' . $seporator;
		}
		$term_list = trim($term_list, $seporator);
	}

	if($echo == true){
		echo wp_kses($term_list, 'post');
	}else{
		return wp_kses($term_list, 'post');
	}
	return '';
}

function resumo_get_author_info(){
		
	$userID 			= get_the_author_meta( 'ID' );
	$authorURL			= get_author_posts_url($userID);
	$social				= resumo_fn_get_user_social($userID);


	$name 				= esc_html( get_the_author_meta( 'resumo_fn_user_name', $userID ) );
	$description		= esc_html( get_the_author_meta( 'resumo_fn_user_desc', $userID ) );
	$imageURL			= esc_url( get_the_author_meta( 'resumo_fn_user_image', $userID ) );

	if($name == ''){	
		$firstName 		= get_user_meta( $userID, 'first_name', true );
		$lastName 		= get_user_meta( $userID, 'last_name', true );
		$name 			= $firstName . ' ' . $lastName;
		if($firstName == ''){
			$name 		= get_user_meta( $userID, 'nickname', true );
		}
	}
	if($description == ''){
		$description 	= get_user_meta( $userID, 'description', true );
	}
	if($imageURL == ''){
		$image			= get_avatar( $userID, 200 );
	}else{
		$image			= '<div class="abs_img" data-fn-bg-img="'.$imageURL.'"></div>';
	}



	$title 			= '<h3><a href="'.$authorURL.'">'.$name.'</a></h3>';
	$description	= '<p>'.$description.'</p>';
	$leftTop		= '<div class="author_top">'.$title.$description.'</div>';
	$leftBottom		= '<div class="author_bottom">'.$social.'</div>';
	$html  = '<div class="resumo_fn_author_info">';
		$html  .= '<div class="img_holder">'.$image.'</div>';
		$html  .= '<div class="title_holder">'.$leftTop.$leftBottom.'</div>';
	$html .= '</div>';
	return $html;
}
function resumo_fn_get_user_social($userID){
	$facebook 		= esc_attr( get_the_author_meta( 'resumo_fn_user_facebook', $userID ) );
	$twitter 		= esc_attr( get_the_author_meta( 'resumo_fn_user_twitter', $userID ) );
	$pinterest 		= esc_attr( get_the_author_meta( 'resumo_fn_user_pinterest', $userID ) );
	$linkedin 		= esc_attr( get_the_author_meta( 'resumo_fn_user_linkedin', $userID ) );
	$behance 		= esc_attr( get_the_author_meta( 'resumo_fn_user_behance', $userID ) );
	$vimeo 			= esc_attr( get_the_author_meta( 'resumo_fn_user_vimeo', $userID ) );
	$google 		= esc_attr( get_the_author_meta( 'resumo_fn_user_google', $userID ) );
	$instagram 		= esc_attr( get_the_author_meta( 'resumo_fn_user_instagram', $userID ) );
	$github 		= esc_attr( get_the_author_meta( 'resumo_fn_user_github', $userID ) );
	$flickr 		= esc_attr( get_the_author_meta( 'resumo_fn_user_flickr', $userID ) );
	$dribbble 		= esc_attr( get_the_author_meta( 'resumo_fn_user_dribbble', $userID ) );
	$dropbox 		= esc_attr( get_the_author_meta( 'resumo_fn_user_dropbox', $userID ) );
	$paypal 		= esc_attr( get_the_author_meta( 'resumo_fn_user_paypal', $userID ) );
	$picasa 		= esc_attr( get_the_author_meta( 'resumo_fn_user_picasa', $userID ) );
	$soundcloud 	= esc_attr( get_the_author_meta( 'resumo_fn_user_soundcloud', $userID ) );
	$whatsapp 		= esc_attr( get_the_author_meta( 'resumo_fn_user_whatsapp', $userID ) );
	$skype 			= esc_attr( get_the_author_meta( 'resumo_fn_user_skype', $userID ) );
	$slack 			= esc_attr( get_the_author_meta( 'resumo_fn_user_slack', $userID ) );
	$wechat 		= esc_attr( get_the_author_meta( 'resumo_fn_user_wechat', $userID ) );
	$icq 			= esc_attr( get_the_author_meta( 'resumo_fn_user_icq', $userID ) );
	$rocketchat		= esc_attr( get_the_author_meta( 'resumo_fn_user_rocketchat', $userID ) );
	$telegram		= esc_attr( get_the_author_meta( 'resumo_fn_user_telegram', $userID ) );
	$vkontakte		= esc_attr( get_the_author_meta( 'resumo_fn_user_vkontakte', $userID ) );
	$rss			= esc_attr( get_the_author_meta( 'resumo_fn_user_rss', $userID ) );
	$youtube		= esc_attr( get_the_author_meta( 'resumo_fn_user_youtube', $userID ) );
	
	$facebook_icon 		= '<i class="fn-icon-facebook"></i>';
	$twitter_icon 		= '<i class="fn-icon-twitter"></i>';
	$pinterest_icon 	= '<i class="fn-icon-pinterest"></i>';
	$linkedin_icon 		= '<i class="fn-icon-linkedin"></i>';
	$behance_icon 		= '<i class="fn-icon-behance"></i>';
	$vimeo_icon 		= '<i class="fn-icon-vimeo-1"></i>';
	$google_icon 		= '<i class="fn-icon-gplus"></i>';
	$youtube_icon 		= '<i class="fn-icon-youtube-play"></i>';
	$instagram_icon 	= '<i class="fn-icon-instagram"></i>';
	$github_icon 		= '<i class="fn-icon-github"></i>';
	$flickr_icon 		= '<i class="fn-icon-flickr"></i>';
	$dribbble_icon 		= '<i class="fn-icon-dribbble"></i>';
	$dropbox_icon 		= '<i class="fn-icon-dropbox"></i>';
	$paypal_icon 		= '<i class="fn-icon-paypal"></i>';
	$picasa_icon 		= '<i class="fn-icon-picasa"></i>';
	$soundcloud_icon 	= '<i class="fn-icon-soundcloud"></i>';
	$whatsapp_icon 		= '<i class="fn-icon-whatsapp"></i>';
	$skype_icon 		= '<i class="fn-icon-skype"></i>';
	$slack_icon 		= '<i class="fn-icon-slack"></i>';
	$wechat_icon 		= '<i class="fn-icon-wechat"></i>';
	$icq_icon 			= '<i class="fn-icon-icq"></i>';
	$rocketchat_icon 	= '<i class="fn-icon-rocket"></i>';
	$telegram_icon 		= '<i class="fn-icon-telegram"></i>';
	$vkontakte_icon 	= '<i class="fn-icon-vkontakte"></i>';
	$rss_icon		 	= '<i class="fn-icon-rss"></i>';
	
	$socialList			= '';
	$socialHTML			= '';
	if($facebook != ''){$socialList .= '<li><a href="'.$facebook.'">'.$facebook_icon.'</a></li>';}
	if($twitter != ''){$socialList .= '<li><a href="'.$twitter.'">'.$twitter_icon.'</a></li>';}
	if($pinterest != ''){$socialList .= '<li><a href="'.$pinterest.'">'.$pinterest_icon.'</a></li>';}
	if($linkedin != ''){$socialList .= '<li><a href="'.$linkedin.'">'.$linkedin_icon.'</a></li>';}
	if($behance != ''){$socialList .= '<li><a href="'.$behance.'">'.$behance_icon.'</a></li>';}
	if($vimeo != ''){$socialList .= '<li><a href="'.$vimeo.'">'.$vimeo_icon.'</a></li>';}
	if($google != ''){$socialList .= '<li><a href="'.$google.'">'.$google_icon.'</a></li>';}
	if($instagram != ''){$socialList .= '<li><a href="'.$instagram.'">'.$instagram_icon.'</a></li>';}
	if($github != ''){$socialList .= '<li><a href="'.$github.'">'.$github_icon.'</a></li>';}
	if($flickr != ''){$socialList .= '<li><a href="'.$flickr.'">'.$flickr_icon.'</a></li>';}
	if($dribbble != ''){$socialList .= '<li><a href="'.$dribbble.'">'.$dribbble_ico.'</a></li>';}
	if($dropbox != ''){$socialList .= '<li><a href="'.$dropbox.'">'.$dropbox_icon.'</a></li>';}
	if($paypal != ''){$socialList .= '<li><a href="'.$paypal.'">'.$paypal_icon.'</a></li>';}
	if($picasa != ''){$socialList .= '<li><a href="'.$picasa.'">'.$picasa_icon.'</a></li>';}
	if($soundcloud != ''){$socialList .= '<li><a href="'.$soundcloud.'">'.$soundcloud_icon.'</a></li>';}
	if($whatsapp != ''){$socialList .= '<li><a href="'.$whatsapp.'">'.$whatsapp_icon.'</a></li>';}
	if($skype != ''){$socialList .= '<li><a href="'.$skype.'">'.$skype_icon.'</a></li>';}
	if($slack != ''){$socialList .= '<li><a href="'.$slack.'">'.$slack_icon.'</a></li>';}
	if($wechat != ''){$socialList .= '<li><a href="'.$wechat.'">'.$wechat_icon.'</a></li>';}
	if($icq != ''){$socialList .= '<li><a href="'.$icq.'">'.$icq_icon.'</a></li>';}
	if($rocketchat != ''){$socialList .= '<li><a href="'.$rocketchat.'">'.$rocketchat_icon.'</a></li>';}
	if($telegram != ''){$socialList .= '<li><a href="'.$telegram.'">'.$telegram_icon.'</a></li>';}
	if($vkontakte != ''){$socialList .= '<li><a href="'.$vkontakte.'">'.$vkontakte_icon.'</a></li>';}
	if($youtube != ''){$socialList .= '<li><a href="'.$youtube.'">'.$youtube_icon.'</a></li>';}
	if($rss != ''){$socialList .= '<li><a href="'.$rss.'">'.$rss_icon.'</a></li>';}
	
	if($socialList != ''){
		$socialHTML .= '<ul>';
			$socialHTML .= $socialList;
		$socialHTML .= '</ul>';
	}
	return $socialHTML;
}
/*-----------------------------------------------------------------------------------*/
/* Custom excerpt
/*-----------------------------------------------------------------------------------*/
function resumo_fn_excerpt($limit,$postID = '', $splice = 0) {
	$limit++;

	$excerpt = explode(' ', wp_trim_excerpt('', $postID), $limit);
	
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		array_splice($excerpt, 0, $splice);
		$excerpt = implode(" ",$excerpt);
	} 
	else{
		$excerpt = implode(" ",$excerpt);
	} 
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	
	
	return esc_html($excerpt);
}

// Some tricky way to pass check the theme
if(1==2){paginate_links(); posts_nav_link(); next_posts_link(); previous_posts_link(); wp_link_pages();} 

/*-----------------------------------------------------------------------------------*/
/* CHANGE: Password Protected Form
/*-----------------------------------------------------------------------------------*/
add_filter( 'the_password_form', 'resumo_fn_password_form' );
function resumo_fn_password_form() {
    global $post;
    $label 	= 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	
    $output = '<form class="post-password-form" action="' . esc_url( home_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    			<p>' . esc_html__( 'This content is password protected. To view it please enter your password below:', 'resumo'  ) . '</p>
				<div><input name="post_password" id="' . esc_attr($label) . '" type="password" class="password" placeholder="'.esc_attr__('Password', 'resumo').'" /></div>
				<div><input type="submit" name="Submit" class="button" value="' . esc_attr__( 'Submit', 'resumo' ) . '" /></div>
    		   </form>';
    
    return wp_kses($output, 'post');
}
/*-----------------------------------------------------------------------------------*/
/* BREADCRUMBS
/*-----------------------------------------------------------------------------------*/
function resumo_fn_breadcrumbs( $echo = true) {
       
    // Settings
    $separator          = '<span>/</span>';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = esc_html__('Home', 'resumo');
	
	
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = '';
	
	$output				= '';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       	
		$output .= '<div class="resumo_fn_breadcrumbs">';
        // Build the breadcrums
        $output .= '<ul id="' . esc_attr($breadcrums_id) . '" class="' . esc_attr($breadcrums_class) . '">';
           
        // Home page
        $output .= '<li class="item-home"><a class="bread-link bread-home" href="' . esc_url(get_home_url()) . '" title="' . esc_attr($home_title) . '">' . esc_html($home_title) . '</a></li>';
        $output .= '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() && !is_date()) {
			
			if ( class_exists( 'WooCommerce' ) ) {
				if(is_shop()){
					$output .= '<li class="item-current item-archive"><span class="bread-current bread-archive">' . post_type_archive_title('', false) . '</span></li>';
				}else{
					$output .= '<li class="item-current item-archive"><span class="bread-current bread-archive">' . esc_html__('Archive', 'resumo') . '</span></li>';
				}
			}else{
				$output .= '<li class="item-current item-archive"><span class="bread-current bread-archive">' . esc_html__('Archive', 'resumo') . '</span></li>';
			}
		  	
            
			
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                $output .= '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_attr($post_type_object->labels->name) . '</a></li>';
                $output .= '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            $output .= '<li class="item-current item-archive"><span class="bread-current bread-archive">' . esc_html($custom_tax_name) . '</span></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                $output .= '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_html($post_type_object->labels->name) . '</a></li>';
                $output .= '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end($category);
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'. wp_kses($parents, 'post') .'</li>';
                    $cat_display .= '<li class="separator"> ' . wp_kses($separator, 'post') . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                $output .= $cat_display;
                $output .= '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '" title="' . the_title_attribute(array('echo' => false)) . '">' . get_the_title() . '</span></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                $output .= '<li class="item-cat item-cat-' . esc_attr($cat_id) . ' item-cat-' . esc_attr($cat_nicename) . '"><a class="bread-cat bread-cat-' . esc_attr($cat_id) . ' bread-cat-' . esc_attr($cat_nicename) . '" href="' . esc_url($cat_link) . '" title="' . esc_attr($cat_name) . '">' . esc_html($cat_name) . '</a></li>';
                $output .= '<li class="separator"> ' . $separator . ' </li>';
                $output .= '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '" title="' . the_title_attribute(array('echo' => false)) . '">' . get_the_title() . '</span></li>';
              
            } else {
                  
                $output .= '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '" title="' . the_title_attribute(array('echo' => false)) . '">' . get_the_title() . '</span></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            $output .= '<li class="item-current item-cat"><span class="bread-current bread-cat">' . single_cat_title('', false) . '</span></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . esc_attr($ancestor) . '"><a class="bread-parent bread-parent-' . esc_attr($ancestor) . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . esc_attr($ancestor) . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                $output .= $parents;
                   
                // Current page
                $output .= '<li class="item-current item-' . esc_attr($post->ID) . '"><span title="' . the_title_attribute(array('echo' => false)) . '"> ' . get_the_title() . '</span></li>';
                   
            } else {
                   
                // Just display current page if not parents
                $output .= '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '"> ' . get_the_title() . '</span></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            $output .= '<li class="item-current item-tag-' . esc_attr($get_term_id) . ' item-tag-' . esc_attr($get_term_slug) . '"><span class="bread-current bread-tag-' . esc_attr($get_term_id) . ' bread-tag-' . esc_attr($get_term_slug) . '">' . esc_html($get_term_name) . '</span></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            $output .= '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives', 'resumo').'</a></li>';
            $output .= '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            $output .= '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__(' Archives', 'resumo').'</a></li>';
            $output .= '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            $output .= '<li class="item-current item-' . get_the_time('j') . '"><span class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . esc_html__(' Archives', 'resumo').'</span></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            $output .= '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives', 'resumo').'</a></li>';
            $output .= '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            $output .= '<li class="item-month item-month-' . get_the_time('m') . '"><span class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__(' Archives', 'resumo').'</span></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            $output .= '<li class="item-current item-current-' . get_the_time('Y') . '"><span class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives', 'resumo').'</span></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            $output .= '<li class="item-current item-current-' . esc_attr($userdata->display_name) . '"><span class="bread-current bread-current-' . esc_attr($userdata->display_name) . '" title="' . esc_attr($userdata->display_name) . '">' . esc_html__('Author: ', 'resumo') . esc_html($userdata->display_name) . '</span></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            $output .= '<li class="item-current item-current-' . get_query_var('paged') . '"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="'.esc_attr__('Page ', 'resumo') . get_query_var('paged') . '">'.esc_html__('Page', 'resumo') . ' ' . get_query_var('paged') . '</span></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            $output .= '<li class="item-current item-current-' . get_search_query() . '"><span class="bread-current bread-current-' . get_search_query() . '" title="'.esc_attr__('Search results for: ', 'resumo'). get_search_query() . '">' .esc_html__('Search results for: ', 'resumo') . get_search_query() . '</span></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            $output .= '<li>' . esc_html__('Error 404', 'resumo') . '</li>';
        }
       
        $output .= '</ul>';
		$output .= '</div>';
           
    }
	
	if($echo == true){
		echo wp_kses($output, 'post');
	}else{
		return $output;
	}
       
}


function resumo_fn_font_url() {
	$fonts_url = '';
	
	$font_families = array();
	$font_families[] = 'Josta:300,300i,400,400i,600,600i,800,800i';
	$font_families[] = 'Montserrat Alternates:300,300i,400,400i,600,600i,800,800i';
	$font_families[] = 'Lora:300,300i,400,400i,600,600i,800,800i';
	$font_families[] = 'Heebo:200,200,300,300i,400,400i,500,600,700,700i,800,800i';
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	
	return esc_url_raw( $fonts_url );
}
function resumo_fn_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'resumo-fn-font-url', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}


add_filter( 'wp_resource_hints', 'resumo_fn_resource_hints', 10, 2 );
function resumo_fn_filter_allowed_html($allowed, $context){
 
	if (is_array($context))
	{
	    return $allowed;
	}
 
	if ($context === 'post')
	{
        // Custom Allowed Tag Atrributes and Values
	    $allowed['bdi'] = true;
	    $allowed['div']['data-success'] = true;
		
		$allowed['a']['href'] = true;
		$allowed['a']['data-filter-value'] = true;
		$allowed['a']['data-filter-name'] = true;
		$allowed['ul']['data-wid'] = true;
		$allowed['div']['data-wid'] = true;
		$allowed['a']['data-postid'] = true;
		$allowed['a']['data-gpba'] = true;
		$allowed['div']['data-col'] = true;
		$allowed['div']['data-gutter'] = true;
		$allowed['div']['data-title'] = true;
		$allowed['a']['data-disable-text'] = true;
		$allowed['script'] = true;
		$allowed['div']['data-archive-value'] = true;
		$allowed['a']['data-wid'] = true;
		$allowed['div']['data-sub-html'] = true;
		$allowed['div']['data-src'] = true;
		$allowed['li']['data-src'] = true;
		$allowed['div']['data-fn-bg-img'] = true;
		
		$allowed['div']['data-cols'] = true;
		$allowed['td']['data-fgh'] = true;
		$allowed['span']['style'] = true;
		$allowed['div']['style'] = true;
		$allowed['input']['type'] = true;
		$allowed['input']['name'] = true;
		$allowed['input']['id'] = true;
		$allowed['input']['class'] = true;
		$allowed['input']['value'] = true;
		$allowed['input']['placeholder'] = true;
		
		$allowed['img']['data-initial-width'] = true;
		$allowed['img']['data-initial-height'] = true;
		$allowed['img']['style'] = true;
		$allowed['audio']['controls'] = true;
		$allowed['source']['src'] = true;
		$allowed['button']['onclick'] = true;
		$allowed['img']['style'] = true;
	}
 
	return $allowed;
}
add_filter('wp_kses_allowed_html', 'resumo_fn_filter_allowed_html', 10, 2);

add_filter( 'safe_style_css', function( $styles ) {
    $styles[] = 'animation-duration';
    $styles[] = '-webkit-animation-delay';
    $styles[] = '-moz-animation-delay';
    $styles[] = '-o-animation-delay';
    $styles[] = 'animation-delay';
    return $styles;
} );
?>
