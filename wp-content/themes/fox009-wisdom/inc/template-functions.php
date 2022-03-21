<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Fox009_wisdom
 */
if( ! function_exists( 'fox009_wisdom_body_classes' ) ) {
	function fox009_wisdom_body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		$classes[] = 'sidebar-' . fox009_wisdom_sidebar_layout();
		$classes[] = 'thumbnail-' . fox009_wisdom_theme_options('thumbnail_position');

		return $classes;
	}
}
add_filter( 'body_class', 'fox009_wisdom_body_classes' );

if( ! function_exists( 'fox009_wisdom_sidebar_layout' ) ) {	
	function fox009_wisdom_sidebar_layout(){
		$sidebar_layout = 'default';
		if(is_home()){
			$sidebar_layout = fox009_wisdom_theme_options('sidebar_layout_home');
		}else if(is_archive()){
			$sidebar_layout = fox009_wisdom_theme_options('sidebar_layout_archive');
		}else if(is_search()){
			$sidebar_layout = fox009_wisdom_theme_options('sidebar_layout_search');
		}else  if(is_single()){
			$sidebar_layout = fox009_wisdom_theme_options('sidebar_layout_single');
		}else if(is_page()){
			$sidebar_layout = fox009_wisdom_theme_options('sidebar_layout_page');
		}else if(is_404()){
			$sidebar_layout = fox009_wisdom_theme_options('sidebar_layout_404');
		}
		
		if($sidebar_layout == 'default'){
			$sidebar_layout = fox009_wisdom_theme_options('default_sidebar_layout');
		}
		return $sidebar_layout;
	}
}

if( ! function_exists( 'fox009_wisdom_pingback_header' ) ) {
	function fox009_wisdom_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
}
add_action( 'wp_head', 'fox009_wisdom_pingback_header' );

if( ! function_exists( 'fox009_wisdom_default_theme_options' ) ) {
	function fox009_wisdom_default_theme_options(){
        $defaults = array(
			'container_layout'				=> 'limit',
			'container_max_width'			=> 1240,
			'primary_color'           		=> '#0066ff',
			'font_size'						=> 14,
			'default_sidebar_layout'		=> 'right',
			'sidebar_layout_home'			=> 'default',
			'sidebar_layout_archive'		=> 'default',
			'sidebar_layout_search'			=> 'default',
			'sidebar_layout_single'			=> 'default',
			'sidebar_layout_page'			=> 'default',
			'sidebar_layout_404'			=> 'none',
			'sidebar_width'					=> 30,
			'enable_breadcrumbs'			=> 1,
			'disable_breadcrumbs_home'		=> 1,
			'disable_breadcrumbs_archive'	=> 0,
			'disable_breadcrumbs_search'	=> 1,
			'disable_breadcrumbs_single' 	=> 0,
			'disable_breadcrumbs_page'		=> 1,
			'disable_breadcrumbs_404'		=> 1,
			'breadcrumbs_separator'			=> '/',
			'button_color'					=> '#ffffff',
			'button_border_radius'			=> 4,
            'header_main_menu'         		=> 1,
			'header_social_menu'			=> 1,
			'site_title_font_size'			=> 2,
			'main_menu_transform'			=> 'uppercase',
			'main_menu_padding'				=> 10,
			'main_menu_text'				=> esc_html__('Menu', 'fox009-wisdom'),
			'thumbnail_position'        	=> 'left',		
            'archive_excerpt_length'    	=> 280,
			'archive_excerpt_lines'			=> 5,
            'archive_read_more'         	=> esc_html__('Read More', 'fox009-wisdom'),	
			'archive_post_meta'				=> array(
													'auther',
													'categories',
													'date',
													'comments',
												),
			'single_featured_image'			=> 1,
			'single_post_tags'				=> 1,
			'single_post_meta'				=> array(
													'auther',
													'categories',
													'date',
													'comments',
												),												
			'custom_copyright_text'     	=> sprintf(
													/* translators: 1: copyright year, 2: blogname. */
													__('&copy; Copyright %1$s %2$s All Rights Reserved.', 'fox009-wisdom'),
													date_i18n(esc_html__('Y', 'fox009-wisdom')),
													'<a href="' . esc_url(home_url('/')) . '">'. 
													esc_html(get_bloginfo('name')) . '</a>'
												),			

			
							
			/*


            'sticky_sidebar'    => 'enable',

            

            'show_archive_auther'       => 1,
            'show_archive_category'     => 1,
            'show_archive_date'         => 1,
            'show_archive_comment'      => 1,

            'show_single_realted_post'      => 'enable',
            'single_realted_post_title'     => esc_html__('Related Posts', 'fox009-wisdom'),
            'show_single_auther'       => 1,
            'show_single_category'     => 1,
            'show_single_date'         => 1,
            'show_single_comment'      => 1,
                                            )
			*/
        ); 
		return $defaults;
	}
}

if( ! function_exists( 'fox009_wisdom_theme_options' ) ) {
	function fox009_wisdom_theme_options($key) {
		//fox009_wisdom_default_theme_options
		return get_theme_mod('fox009_wisdom_' . $key, fox009_wisdom_default_theme_options()[$key]);
	}
}

if( ! function_exists( 'fox009_wisdom_menu_fallback' ) ) {
	function fox009_wisdom_menu_fallback($args){
		if ( current_user_can( 'edit_theme_options' ) ) {	
			$container       = $args['container'];
			$container_id    = $args['container_id'];
			$container_class = $args['container_class'];
			$menu_class      = $args['menu_class'];
			$menu_id         = $args['menu_id'];

			$menu_html = '';
			
			if ( $container ) {
				$menu_html .= '<' . esc_attr( $container );
				if ( $container_id ) {
					$menu_html .= ' id="' . esc_attr( $container_id ) . '"';
				}
				if ( $container_class ) {
					$menu_html .= ' class="' . esc_attr( $container_class ) . '"';
				}
				$menu_html .= '>';
			}
			
			$menu_html .= '<ul';
			if ( $menu_id ) {
				$menu_html .= ' id="' . esc_attr( $menu_id ) . '"'; }
			if ( $menu_class ) {
				$menu_html .= ' class="' . esc_attr( $menu_class ) . '"'; }
			$menu_html .= '>';
			
			$menu_html .= '<li><a href="' . esc_url( admin_url( 'nav-menus.php?action=locations' ) ) . '">' . esc_html__( 'Click to set menu', 'fox009-wisdom' ) . '</a></li>';
			
			$menu_html .= '</ul>';
			
			if ( $container ) {
				$menu_html .= '</' . esc_attr( $container ) . '>';
			}
			
			if ( array_key_exists( 'echo', $args ) && $args['echo'] ) {
				echo $menu_html;
			} else {
				return $menu_html;
			}
		}
	}
}

if( ! function_exists( 'fox009_wisdom_posts_navigation' ) ) {
	function fox009_wisdom_posts_navigation(){
		if($GLOBALS['wp_query']->max_num_pages>1){
		?>
			<div class="posts-navigation-container padding20">			
				<?php 
				the_posts_pagination(
					array(
						'prev_text'          => __( 'Previous', 'fox009-wisdom' ),
						'next_text'          => __( 'Next', 'fox009-wisdom' ),
						'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'fox009-wisdom' ) . ' </span>',
						'mid_size' => 2
					)
				);
				?>				
			</div>
		<?php
		}
	}
}

if( ! function_exists( 'fox009_wisdom_post_navigation' ) ) {
	function fox009_wisdom_post_navigation(){
	?>
		<div class="post-navigation-container padding20">
			<?php
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle"><i class="fa fa-arrow-left"></i> ' . esc_html__( 'Previous', 'fox009-wisdom' ) . '</span><span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'fox009-wisdom' ) . ' <i class="fa fa-arrow-right"></i></span><span class="nav-title">%title</span>',
				)
			);
			?>
		</div>
	<?php
	}
}

if( ! function_exists( 'fox009_wisdom_post_meta' ) ) {
	function fox009_wisdom_post_meta(){
		$prefix = (is_single() || is_page()) ? 'single_' : 'archive_';
		?>
		<div class="post-meta">
			<?php
			$post_meta = fox009_wisdom_theme_options($prefix . 'post_meta');
			foreach($post_meta as $item){
				switch($item){
					case 'auther':
						fox009_wisdom_post_author(); 
						break;
					case 'categories':
						fox009_wisdom_post_categories();
						break;
					case 'date':
						fox009_wisdom_post_date();
						break;
					case 'comments':
						fox009_wisdom_post_comment_number();
						break;
				}
			}
			?>
		</div>
	<?php
	}
}

if( ! function_exists( 'fox009_wisdom_the_excerpt' ) ) {
	function fox009_wisdom_the_excerpt($excerpt){
		if(is_search()){
			if($pos = stripos($excerpt, fox009_wisdom_read_more())){
				$text = substr($excerpt, 0, $pos);
				$more = substr($excerpt, $pos);
			}else{
				$text = $excerpt;
				$more = '';
			}
			$search_key = get_search_query();
			$excerpt = str_ireplace($search_key, '<span class="search-key">' . $search_key . '</span>' , $text);
			$excerpt .= $more;
		}
		return $excerpt;
	}
}
add_filter( 'the_excerpt', 'fox009_wisdom_the_excerpt' );

if( ! function_exists( 'fox009_wisdom_get_the_excerpt' ) ) {
	function fox009_wisdom_get_the_excerpt( $text = '', $post = null ) {
		$raw_excerpt = $text;

		if ( '' === trim( $text ) ) {
			$post = get_post( $post );
			$text = get_the_content( '', false, $post );

			$text = strip_shortcodes( $text );
			$text = excerpt_remove_blocks( $text );

			$text = apply_filters( 'the_content', $text );
			$text = str_replace( ']]>', ']]&gt;', $text );
			$text = wp_strip_all_tags( $text );
			$text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $text ), ' ' );

			$excerpt_length = fox009_wisdom_theme_options('archive_excerpt_length');

			$excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
			$text         = mb_substr( $text, 0, $excerpt_length) . $excerpt_more;
		}

		/**
		 * Filters the trimmed excerpt string.
		 *
		 * @since 2.8.0
		 *
		 * @param string $text        The trimmed text.
		 * @param string $raw_excerpt The text prior to trimming.
		 */
		return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
	}
}
add_filter( 'get_the_excerpt', 'fox009_wisdom_get_the_excerpt', 9, 2);

if( ! function_exists( 'fox009_wisdom_read_more' ) ) {
	function fox009_wisdom_read_more(){
		$html = '<a class="read-more" href="#"><span class="read-more-text">' . 
			esc_html(fox009_wisdom_theme_options('archive_read_more')) . 
			' </span><i class="fa fa-angle-double-down"></i></a>';
		return $html;
	}
}
add_filter( 'excerpt_more', 'fox009_wisdom_read_more' );

if( ! function_exists( 'fox009_wisdom_post_full' ) ) {
	function fox009_wisdom_post_full(){
		if(array_key_exists('action', $_POST) 
			&& array_key_exists('id', $_POST) 
			&& $_POST['action'] == 'post_full'
			&& $_POST['id'] != ''
		) {
			$id = $_POST["id"];
			$post = get_post($id);
			if(!$post){
				$output = array('success' => false);
			}
			else{
				$output =  array(
					'id' => $id,
					'content' => get_post($id)->post_content,
					'success' => true,
				);
			}
			echo wp_json_encode($output);
			die();
		 }
	}
}
// 将接口加到 init 中
add_action('init', 'fox009_wisdom_post_full');