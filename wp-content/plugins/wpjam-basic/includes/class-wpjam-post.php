<?php
class WPJAM_Post{
	private $id;
	private $excerpt	= null;
	private $viewd		= false;

	private function __construct($id){
		$this->id	= (int)$id;
	}

	public function __get($key){
		if(in_array($key, ['id', 'post_id'])){
			return $this->id;
		}elseif($key == 'post'){
			return get_post($this->id);
		}elseif($key == 'views'){
			return (int)get_post_meta($this->id, 'views', true);
		}elseif($key == 'thumbnail'){
			if($this->supports('thumbnail')){
				if($thumbnail = get_the_post_thumbnail_url($this->id, 'full')){
					return $thumbnail;
				}
			}

			return apply_filters('wpjam_post_thumbnail_url', '', $this->post);
		}elseif($key == 'thumbnail_size'){
			$pt_obj	= get_post_type_object($this->post_type);

			return !empty($pt_obj->thumbnail_size) ? $pt_obj->thumbnail_size : 'thumbnail';
		}elseif($key == 'viewable'){
			return is_post_type_viewable($this->post_type);
		}else{
			$post	= $this->post;

			if(isset($post->$key)){
				return $post->$key;
			}else{
				$key	= 'post_'.$key;

				return $post->$key ?? null;
			}
		}
	}

	public function __set($key, $value){
		if($key == 'views'){
			update_post_meta($this->id, 'views', $value);
		}elseif($key == 'thumbnail_id'){
			set_post_thumbnail($this->id, $value);
		}
	}

	public function __call($method, $args){
		if($method == 'supports'){
			return post_type_supports($this->post_type, ...$args);
		}elseif($method == 'get_taxonomies'){
			return get_object_taxonomies($this->post_type, ...$args);
		}elseif(function_exists($method)){
			trigger_error($method);
			return call_user_func($method, $this->post_type, ...$args);
		}
	}

	public function get_excerpt($length=0, $more=''){
		if($excerpt = $this->post_excerpt){
			return wp_strip_all_tags($excerpt, true);
		}

		if(is_null($this->excerpt)){
			$excerpt	= $this->get_content(true);
			$excerpt	= strip_shortcodes($excerpt);
			$excerpt	= excerpt_remove_blocks($excerpt);

			// remove_filter('the_content', 'wp_filter_content_tags');
			// $excerpt	= $this->filter_content($excerpt);
			// add_filter('the_content', 'wp_filter_content_tags');

			$this->excerpt	= wp_strip_all_tags($excerpt, true);
		}

		$length	= $length ?: apply_filters('excerpt_length', 200);
		$more	= $more   ?: apply_filters('excerpt_more', ' '.'&hellip;');

		return mb_strimwidth($this->excerpt, 0, $length, $more, 'utf-8');
	}

	public function filter_content($content){
		return str_replace(']]>', ']]&gt;', apply_filters('the_content', $content));
	}

	public function get_content($raw=false){
		$content	= get_the_content('', false, $this->post);

		return $raw ? $content : $this->filter_content($content);
	}

	public function get_thumbnail_url($size='thumbnail', $crop=1){
		if($this->thumbnail){
			$size	= $size ?: $this->thumbnail_size;
			
			return wpjam_get_thumbnail($this->thumbnail, $size, $crop);
		}

		return '';
	}

	public function get_first_image_url($size='full'){
		if($content	= $this->content){
			preg_match_all('/class=[\'"].*?wp-image-([\d]*)[\'"]/i', $content, $matches);

			if($matches && isset($matches[1]) && isset($matches[1][0])){
				return wp_get_attachment_image_url($matches[1][0], $size);
			}

			preg_match_all('/<img.*?src=[\'"](.*?)[\'"].*?>/i', $content, $matches);

			if($matches && isset($matches[1]) && isset($matches[1][0])){	  
				return wpjam_get_thumbnail($matches[1][0], $size);
			}
		}

		return '';
	}

	public function get_author($size=200){
		$wpjam_user	= WPJAM_User::get_instance($this->author);

		return ($wpjam_user && !is_wp_error($wpjam_user)) ? $wpjam_user->parse_for_json() : null;
	}

	public function get_views($addon=false){
		$addon	= $addon ? (int)apply_filters('wpjam_post_views_addon', 0, $this->id) : 0;

		return $this->views + $addon;
	}

	public function get_related_query($number=5){
		$post_type	= [$this->post_type];
		$tt_ids		= [];

		foreach($this->get_taxonomies('objects') as $taxonomy => $tax_obj){
			$post_type	= array_merge($post_type, $tax_obj->object_type);

			if($terms = get_the_terms($this->id, $taxonomy)){
				$tt_ids = array_merge($tt_ids, array_column($terms, 'term_taxonomy_id'));
			}
		}

		$post_type	= array_unique($post_type);
		$tt_ids		= array_unique(array_filter($tt_ids));

		return new WP_Query([
			'cache_it'				=> 'query_vars',
			'no_found_rows'			=> true,
			'ignore_sticky_posts'	=> true,
			'cache_results'			=> true,
			'related_query'			=> true,
			'post_status'			=> 'publish',
			'post_type'				=> $post_type,
			'posts_per_page'		=> $number ?: 5,
			'post__not_in'			=> [$this->id],
			'term_taxonomy_ids'		=> $tt_ids
		]);
	}

	public function view(){
		if(!$this->viewd){	// 确保只加一次
			$this->viewd	= true;
			$this->views	= $this->views + 1;
		}
	}

	public function parse_for_json($args=[]){
		$args	= wp_parse_args($args, [
			'list_query'		=> false,
			'content_required'	=> false,
			'raw_content'		=> false,
			'sticky_posts'		=> []
		]);

		$GLOBALS['post']	= $this->post;

		setup_postdata($this->post);

		$post_json	= [];

		$post_json['id']		= $this->id;
		$post_json['post_type']	= $this->post_type;
		$post_json['status']	= $this->status;

		if($this->password){
			$post_json['password_protected']	= true;
			$post_json['password_required']		= post_password_required($this->post);
		}

		$post_json['timestamp']			= (int)strtotime(get_gmt_from_date($this->date));
		$post_json['time']				= wpjam_human_time_diff($post_json['timestamp']);
		$post_json['date']				= wp_date('Y-m-d', $post_json['timestamp']);
		$post_json['modified_timestamp']= (int)strtotime($this->modified_gmt);
		$post_json['modified_time']		= wpjam_human_time_diff($post_json['modified_timestamp']);
		$post_json['modified_date']		= wp_date('Y-m-d', $post_json['modified_timestamp']);

		if($this->viewable){
			$post_json['name']		= urldecode($this->name);
			$post_json['post_url']	= str_replace(home_url(), '', get_permalink($this->id));
		}

		if($this->supports('title')){
			$post_json['title']		= html_entity_decode(get_the_title($this->post));
		}else{
			$post_json['title']		= '';
		}

		if(isset($args['thumbnail_size'])){
			$thumbnail_size	= $args['thumbnail_size'];
		}elseif(isset($args['size'])){
			$thumbnail_size	= $args['size'];
		}else{
			$thumbnail_size	= '';
		}

		$post_json['thumbnail']		= $this->get_thumbnail_url($thumbnail_size);

		if($this->supports('author')){
			$post_json['author']	= $this->get_author();
		}

		if($this->supports('excerpt')){
			$post_json['excerpt']	= html_entity_decode(get_the_excerpt($this->post));
		}

		if($this->supports('page-attributes')){
			$post_json['menu_order']	= (int)$this->menu_order;
		}

		if($this->supports('post-formats')){
			$post_json['format']	= get_post_format($this->post) ?: '';
		}

		$post_json['views']	= $this->get_views();

		if($args['list_query']){
			return $post_json;
		}

		foreach($this->get_taxonomies() as $taxonomy){
			if($taxonomy != 'post_format'){
				if($terms = get_the_terms($this->id, $taxonomy)){
					$post_json[$taxonomy]	= array_map(function($term){ return wpjam_get_term($term); }, $terms);
				}else{
					$post_json[$taxonomy]	= [];
				}
			}
		}

		if(is_singular($this->post_type) || $args['content_required']){
			if($this->supports('editor')){
				if($args['raw_content']){
					$post_json['raw_content']	= $this->get_content(true);
				}

				$post_json['content']	= $this->get_content();

				global $page, $numpages, $multipage;

				$post_json['multipage']	= (bool)$multipage;

				if($multipage){
					$post_json['numpages']	= $numpages;
					$post_json['page']		= $page;
				}
			}

			if(is_singular($this->post_type)){
				$this->view();
			}
		}

		foreach(WPJAM_Post_Option::get_registereds() as $object){
			if($object->is_available_for_post_type($this->post_type) && !$object->update_callback){
				foreach($object->get_fields($this->id) as $meta_key => $field){
					if($show_in_rest = wpjam_parse_field_show_in_rest($field, $type, $default)){
						$args	= [
							'object_subtype'	=> $this->post_type,
							'single'			=> true,
							'type'				=> $type,
							'show_in_rest'		=> $show_in_rest
						];

						if(isset($default)){
							$args['default']	= $default;
						}

						register_meta('post', $meta_key, $args);
					}
				}
			}
		}

		$meta_obj	= self::get_meta_instance($this->post_type);

		if($meta = $meta_obj->get_value($this->id, null)){
			$post_json	= array_merge($post_json, $meta);
		}

		return apply_filters('wpjam_post_json', $post_json, $this->id, $args);
	}

	private static $instances		= [];
	private static $meta_instances	= [];

	public static function get_instance($post=null){
		$post	= self::get_post($post);

		if(!($post instanceof WP_Post)){
			return new WP_Error('post_not_exists', '文章不存在');
		}

		if(!post_type_exists($post->post_type)){
			return new WP_Error('post_type_not_exists', '文章类型不存在');
		}

		$post_id	= $post->ID;

		if(!isset($instances[$post_id])){
			$instances[$post_id]	= new self($post_id);
		}

		return $instances[$post_id];
	}

	public static function get_meta_instance($post_type){
		if(!isset(self::$meta_instances[$post_type])){
			self::$meta_instances[$post_type]	= new WP_REST_Post_Meta_Fields($post_type);
		}

		return self::$meta_instances[$post_type];
	}

	public static function parse_query($wp_query, $args=[]){
		$posts_json	= [];

		if($wp_query->have_posts()){
			$filter	= $args['filter'] ?? 'wpjam_related_post_json';
			$args	= array_merge($args, ['list_query'=>true]);

			while($wp_query->have_posts()){
				$wp_query->the_post();

				$post_id		= get_the_ID();
				$post_json		= self::get_instance($post_id)->parse_for_json($args);
				$posts_json[]	= apply_filters($filter, $post_json, $post_id, $args);
			}
		}

		wp_reset_postdata();

		return $posts_json;
	}

	public static function render_query($wp_query, $args=[]){
		$output = '';

		if($wp_query->have_posts()){
			$item_callback	= wpjam_array_pull($args, 'item_callback');

			if(!$item_callback || !is_callable($item_callback)){
				$item_callback	= [self::class, 'list_item_callback'];
			}

			$title_number	= wpjam_array_pull($args, 'title_number');
			$total_number	= count($wp_query->posts);	

			while($wp_query->have_posts()){
				$wp_query->the_post();

				if($title_number){
					$args['title_number']	= zeroise($wp_query->current_post+1, strlen($total_number));
				}

				$output .= call_user_func($item_callback, get_the_ID(), $args);
			}
		}

		wp_reset_postdata();

		$wrap_callback	= wpjam_array_pull($args, 'wrap_callback');

		if(!$wrap_callback || !is_callable($wrap_callback)){
			$wrap_callback	= [self::class, 'list_wrap_callback'];
		}

		if(!empty($wrap_callback) && is_callable($wrap_callback)){
			$output	= call_user_func($wrap_callback, $output, $args); 
		}

		return $output;
	}

	public static function list_item_callback($post_id, $args){
		$args	= wp_parse_args($args, [
			'title_number'	=> 0,
			'style'			=> 'list',
			'excerpt'		=> false,
			'thumb'			=> true,
			'crop'			=> true,
			'size'			=> 'thumbnail',
			'thumb_class'	=> 'wp-post-image'
		]);

		$item	= get_the_title($post_id);

		if($args['title_number']){
			$item	= '<span class="title-number">'.$args['title_number'].'</span>. '.$item;
		}

		if($args['thumb'] || $args['excerpt']){
			$item = '<h4>'.$item.'</h4>';

			if($args['thumb']){
				$item	= get_the_post_thumbnail($post_id, $args['size'], ['class'=>$args['thumb_class']])."\n".$item;
			}

			if($args['excerpt']){
				$item	= $item."\n".wpautop(get_the_excerpt($post_id));
			}
		}

		if(!is_singular() || (is_singular() && get_queried_object_id() != $post_id)){
			$item	= '<a href="'.get_permalink($post_id).'" title="'.the_title_attribute(['post'=>$post_id, 'echo'=>false]).'">'.$item.'</a>';
		}

		if($args['style'] == 'list'){
			$item	= '<li>'.$item.'</li>'."\n";
		}

		return $item;
	}

	public static function list_wrap_callback($output, $args){
		$args	= wp_parse_args($args, [
			'title'		=> '',
			'div_id'	=> '',
			'class'		=> '',
			'thumb'		=> true,
			'wrap'		=> '<ul %1$s>%2$s</ul>'
		]);

		if($args['thumb']){
			$args['class']	= $args['class'].' has-thumb';
		}

		$class	= $args['class'] ? ' class="'.$args['class'].'"' : '';

		if($args['wrap']){
			$output	= sprintf($args['wrap'], $class, $output)."\n";
		}

		if($args['title']){
			$output	= '<h3>'.$args['title'].'</h3>'."\n".$output;
		}

		if($args['div_id']){
			$output	= '<div id="'.$args['div_id'].'">'."\n".$output.'</div>'."\n";
		}

		return $output;
	}

	public static function get($post){
		return self::get_post($post, ARRAY_A);
	}

	public static function insert($data){
		$data	= wp_parse_args($data, [
			'post_type'		=> 'post',
			'post_status'	=> 'publish',
			'post_author'	=> get_current_user_id(),
			'post_date'		=> get_date_from_gmt(date('Y-m-d H:i:s', time())),
		]);

		if(!post_type_exists($data['post_type'])){
			return new WP_Error('invalid_post_type', __('Invalid post type.'));
		}

		$data	= apply_filters('wpjam_pre_insert_post', $data, $data['post_type']);

		if(is_wp_error($data)){
			return $data;
		}

		return wp_insert_post(wp_slash($data), true, true);
	}

	public static function update($post_id, $data){
		$data['ID'] = $post_id;

		return wp_update_post(wp_slash($data), true, true);
	}

	public static function delete($post_id, $force_delete=true){
		if(!get_post($post_id)){
			return new WP_Error('post_not_exists', '文章不存在');
		}

		$result	= wp_delete_post($post_id, $force_delete);

		return $result ? true : new WP_Error('delete_failed', '删除失败');
	}

	public static function value_callback($meta_key, $post_id){
		return self::get_meta($post_id, $meta_key);
	}

	public static function get_meta($post_id, ...$args){
		return WPJAM_Meta::get_data('post', $post_id, ...$args);
	}

	public static function update_meta($post_id, ...$args){
		return WPJAM_Meta::update_data('post', $post_id, ...$args);
	}

	public static function update_metas($post_id, $data, $meta_keys=[]){
		return WPJAM_Meta::update_data('post', $post_id, $data, $meta_keys);
	}

	public static function duplicate($post_id){
		$post_arr	= get_post($post_id, ARRAY_A);
		$post_arr	= wpjam_array_except($post_arr, ['ID', 'post_date_gmt', 'post_modified_gmt', 'post_name']);

		$post_arr['post_status']	= 'draft';
		$post_arr['post_author']	= get_current_user_id();
		$post_arr['post_date_gmt']	= $post_arr['post_modified_gmt']	= date('Y-m-d H:i:s', time());
		$post_arr['post_date']		= $post_arr['post_modified']		= get_date_from_gmt($post_arr['post_date_gmt']);

		$tax_input	= [];

		foreach(get_object_taxonomies($post_arr['post_type']) as $taxonomy){
			$tax_input[$taxonomy]	= wp_get_object_terms($post_id, $taxonomy, ['fields' => 'ids']);
		}

		$post_arr['tax_input']	= $tax_input;

		$new_post_id	= wp_insert_post(wp_slash($post_arr), true);

		if(is_wp_error($new_post_id)){
			return $new_post_id;
		}

		$meta_keys	= get_post_custom_keys($post_id);

		foreach ($meta_keys as $meta_key) {
			if($meta_key == 'views' || is_protected_meta($meta_key, 'post')){
				continue;
			}

			$meta_values	= get_post_meta($post_id, $meta_key);
			foreach ($meta_values as $meta_value){
				add_post_meta($new_post_id, $meta_key, $meta_value, false);
			}
		}

		return $new_post_id;
	}

	public static function get_by_ids($post_ids, $args=[]){
		return self::update_caches($post_ids, $args);
	}

	public static function update_caches($post_ids, $args=[]){
		if($post_ids){
			$post_ids 	= array_unique(array_filter($post_ids));
		}

		if(!$post_ids){
			return [];
		}

		_prime_post_caches($post_ids, false, false);

		$ptypes	= $pids	= $authors = [];

		if(function_exists('wp_cache_get_multiple')){
			$cache_values	= wp_cache_get_multiple($post_ids, 'posts');

			foreach($post_ids as $post_id){
				if(empty($cache_values[$post_id])){
					wp_cache_add($post_id, false, 'posts', 10);	// 防止大量 SQL 查询。
				}else{
					$cache		= $cache_values[$post_id];

					$pids[]		= $post_id;
					$ptypes[]	= $cache->post_type;
					$authors[]	= $cache->post_author;
				}
			}
		}else{
			$cache_values	= [];

			foreach($post_ids as $post_id){
				$cache	= wp_cache_get($post_id, 'posts');

				if($cache !== false){
					$cache_values[$post_id]	= $cache;

					$pids[]		= $post_id;
					$ptypes[]	= $cache->post_type;
					$authors[]	= $cache->post_author;
				}
			}
		}

		if(!empty($ptypes)){
			$ptypes	= array_unique($ptypes);

			if(!empty($args['update_post_term_cache'])){
				update_object_term_cache($pids, $ptypes);
			}elseif(!isset($args['lazy_load_term']) || $args['lazy_load_term']){
				wpjam_lazyload('post_term', $pids, $ptypes);
			}
		}

		if(!empty($args['update_post_meta_cache'])){
			update_postmeta_cache($pids);
		}else{
			wpjam_lazyload('post_meta', $pids);
		}

		if($authors = array_unique(array_filter($authors))){
			wpjam_lazyload('user', $authors);
		}

		return $cache_values;
	}

	public static function get_post($post, $output=OBJECT, $filter='raw'){
		if($post && is_numeric($post)){	// 不存在情况下的缓存优化
			$found	= false;
			$cache	= wp_cache_get($post, 'posts', false, $found);

			if($found){
				if(is_wp_error($cache)){
					return $cache;
				}elseif(!$cache){
					return null;
				}
			}else{
				$_post	= WP_Post::get_instance($post);

				if(!$_post){	// 防止重复 SQL 查询。
					wp_cache_add($post, false, 'posts', 10);
					return null;
				}
			}
		}

		return get_post($post, $output, $filter);
	}

	public static function validate($post_id, $post_type=''){
		$instance	= self::get_instance($post_id);

		if(is_wp_error($instance)){
			return $instance;
		}

		if($post_type && $post_type != 'any' && $post_type != $instance->post_type){
			return new WP_Error('invalid_post_type', '无效的文章类型');
		}

		return self::get_post($post_id);
	}

	public static function get_id_field($post_type='', $args=[]){
		$title	= wpjam_array_pull($args, 'title');

		if(is_null($title)){
			$pt_obj	= ($post_type && is_string($post_type)) ? get_post_type_object($post_type) : null;
			$title	= $pt_obj ? $pt_obj->label : '';
		}

		return wp_parse_args($args, [
			'title'			=> $title,
			'type'			=> 'text',	
			'class'			=> 'all-options',	
			'data_type'		=> 'post_type',	
			'post_type'		=> $post_type,
			'placeholder'	=> '请输入'.$title.'ID或者输入关键字筛选'
		]);
	}

	public static function find_by_name($post_name, $post_type='', $post_status='publish'){
		global $wpdb;

		$post_type		= $post_type == 'any' ? '' : $post_type; 
		$post_status	= $post_status == 'any' ? '' : $post_status;

		// find by old slug 
		if($post_ids = $wpdb->get_col($wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_wp_old_slug' AND meta_value = %s", $post_name))){
			if($posts = wpjam_list_filter(self::get_by_ids($post_ids), compact('post_status'))){
				if($post_type){
					if($filtered = wpjam_list_filter($posts, ['post_type'=>$post_type])){
						return current($filtered);
					}
				}

				return current($posts);
			}	
		}

		// find by name like name% 
		$post_types	= get_post_types(['public'=>true, 'hierarchical'=>false, 'exclude_from_search'=>false]);
		$post_types	= wpjam_array_except($post_types, 'attachment');

		$where		= "post_type in ('" . implode( "', '", array_map('esc_sql', $post_types)) . "')";
		$where		.= ' AND '.$wpdb->prepare("post_name LIKE %s", $wpdb->esc_like($post_name).'%');

		if($post_status){
			$where	.= ' AND '."post_status in ('" . implode( "', '", array_map('esc_sql', (array)$post_status)) . "')";;
		}

		if($post_ids = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE $where")){
			if($posts = self::get_by_ids($post_ids)){
				if($post_type){
					if($filtered = wpjam_list_filter($posts, ['post_type'=>$post_type])){
						return current($filtered);
					}
				}

				return current($posts);
			}	
		}

		return null;
	}

	public static function get_list($wp_query, $args=[]){
		// _deprecated_function(__METHOD__, 'WPJAM Basic 5.0');
		$parse_for_json	= $args['parse_for_json'] ?? true;

		if($parse_for_json){
			return self::parse_query($wp_query, $args);
		}else{
			return self::render_query($wp_query, $args);
		}
	}
}

class WPJAM_Post_Type{
	use WPJAM_Register_Trait;

	public function parse_args(){
		$args	= wp_parse_args($this->args, [
			'public'			=> true,
			'show_ui'			=> true,
			'hierarchical'		=> false,
			'rewrite'			=> true,
			'permastruct'		=> false,
			'thumbnail_size'	=> '',
			'supports'			=> ['title']
		]);

		if(isset($args['taxonomies']) && !$args['taxonomies']){
			unset($args['taxonomies']);
		}

		if($args['hierarchical']){
			$args['supports'][]	= 'page-attributes';

			if($args['permastruct'] && (strpos($args['permastruct'], '%post_id%') || strpos($args['permastruct'], '%'.$this->name.'_id%'))){
				$args['permastruct']	= false;
			}
		}else{
			if($args['permastruct'] && (strpos($args['permastruct'], '%post_id%') || strpos($args['permastruct'], '%'.$this->name.'_id%'))){
				$args['permastruct']	= str_replace('%post_id%', '%'.$this->name.'_id%', $args['permastruct']);
				$args['query_var']		= $args['query_var'] ?? false;
			}
		}

		if($args['permastruct'] && empty($args['rewrite'])){
			$args['rewrite']	= true;
		}

		if($args['rewrite']){
			$args['rewrite']	= is_array($args['rewrite']) ? $args['rewrite'] : [];
			$args['rewrite']	= wp_parse_args($args['rewrite'], ['with_front'=>false, 'feeds'=>false]);
		}

		return $args;
	}

	public static function on_registered($name, $pt_obj){
		if(!empty($pt_obj->permastruct)){
			$permastruct	= $pt_obj->permastruct;

			if(strpos($permastruct, '%'.$name.'_id%')){
				$GLOBALS['wp_rewrite']->extra_permastructs[$name]['struct']	= $permastruct;

				add_rewrite_tag('%'.$name.'_id%', '([0-9]+)', 'post_type='.$name.'&p=');

				remove_rewrite_tag('%'.$name.'%');
			}elseif(strpos($permastruct, '%postname%')){
				$GLOBALS['wp_rewrite']->extra_permastructs[$name]['struct'] = $permastruct;
			}
		}

		$registered_callback	= $pt_obj->registered_callback ?? '';

		if($registered_callback && is_callable($registered_callback)){
			call_user_func($registered_callback, $name, $pt_obj);
		}
	}

	public static function filter_labels($labels){
		$name		= str_replace('post_type_labels_', '', current_filter());
		$args		= self::get($name)->to_array();
		$_labels	= $args['labels'] ?? [];

		$labels		= (array)$labels;
		$name		= $labels['name'];

		$search		= empty($args['hierarchical']) ? ['撰写新', '写文章', '文章', 'post', 'Post'] : ['撰写新', '写文章', '页面', 'page', 'Page'];
		$replace	= ['新建', '新建'.$name, $name, $name, ucfirst($name)];

		foreach ($labels as $key => &$label) {
			if($label && empty($_labels[$key])){
				if($key == 'all_items'){
					$label	= '所有'.$name;
				}elseif($label != $name){
					$label	= str_replace($search, $replace, $label);
				}
			}
		}

		return $labels;
	}

	public static function filter_link($post_link, $post){
		$name	= $post->post_type;

		if(array_search('%'.$name.'_id%', $GLOBALS['wp_rewrite']->rewritecode, true)){
			$post_link	= str_replace('%'.$name.'_id%', $post->ID, $post_link);
		}

		if(strpos($post_link, '%') !== false && ($taxonomies = get_object_taxonomies($name, 'objects'))){
			foreach ($taxonomies as $taxonomy=>$taxonomy_object) {
				if($taxonomy_rewrite = $taxonomy_object->rewrite){

					if(strpos($post_link, '%'.$taxonomy_rewrite['slug'].'%') === false){
						continue;
					}

					if($terms = get_the_terms($post->ID, $taxonomy)){
						$post_link	= str_replace('%'.$taxonomy_rewrite['slug'].'%', current($terms)->slug, $post_link);
					}else{
						$post_link	= str_replace('%'.$taxonomy_rewrite['slug'].'%', $taxonomy, $post_link);
					}
				}
			}
		}

		return $post_link;
	}

	public static function filter_clauses($clauses, $wp_query){
		global $wpdb;

		if($wp_query->get('related_query')){
			if($term_taxonomy_ids = $wp_query->get('term_taxonomy_ids')){
				$clauses['fields']	.= ", count(tr.object_id) as cnt";
				$clauses['join']	.= "INNER JOIN {$wpdb->term_relationships} AS tr ON {$wpdb->posts}.ID = tr.object_id";
				$clauses['where']	.= " AND tr.term_taxonomy_id IN (".implode(",",$term_taxonomy_ids).")";
				$clauses['groupby']	.= " tr.object_id";
				$clauses['orderby']	= " cnt DESC, {$wpdb->posts}.ID DESC";
			}
		}else{
			$orderby	= $wp_query->get('orderby');
			$order		= $wp_query->get('order') ?: 'DESC';

			if($orderby == 'views'){
				$clauses['fields']	.= ", (COALESCE(jam_pm.meta_value, 0)+0) as {$orderby}";
				$clauses['join']	.= "LEFT JOIN {$wpdb->postmeta} jam_pm ON {$wpdb->posts}.ID = jam_pm.post_id AND jam_pm.meta_key = '{$orderby}' ";
				$clauses['orderby']	= "{$orderby} {$order}, " . $clauses['orderby'];
			}elseif(in_array($orderby, ['', 'date', 'post_date'])){
				$clauses['orderby']	.= ", {$wpdb->posts}.ID {$order}";
			}
		}

		return $clauses;
	}

	public static function filter_post_password_required($required, $post){
		if(!$required){
			return $required;
		}

		$hash	= wpjam_get_parameter('post_password', ['method'=>'REQUEST']);

		if(empty($hash) || 0 !== strpos($hash, '$P$B')){
			return true;
		}

		require_once ABSPATH . WPINC . '/class-phpass.php';

		$hasher	= new PasswordHash(8, true);

		return !$hasher->CheckPassword($post->post_password, $hash);
	}

	public static function filter_data_type_field_value($value, $field){
		if($field['data_type'] == 'post_type'){
			if($field['type'] == 'mu-text'){
				foreach($value as &$item){
					$item	= self::filter_data_type_field_value($item, array_merge($field, ['type'=>'text']));
				}

				$value	= array_filter($value);
			}else{
				return (is_numeric($value) && get_post($value)) ? (int)$value : null;
			}
		}

		return $value;
	}
}

class WPJAM_Post_Option{
	use WPJAM_Register_Trait;

	public function parse_args(){
		$args	= wp_parse_args($this->args, ['fields'=>[],	'priority'=>'default']);

		if(!isset($args['post_type'])){
			if($post_types = wpjam_array_pull($args, 'post_types')){
				$args['post_type']	= $post_types;
			}
		}

		if(empty($args['value_callback']) || !is_callable($args['value_callback'])){
			$args['value_callback']	= ['WPJAM_Post', 'value_callback'];
		}

		return $args;
	}

	public function is_available_for_post_type($post_type){
		return is_null($this->post_type) || in_array($post_type, (array)$this->post_type);
	}

	public function get_fields($post_id=null){
		if(is_callable($this->fields)){
			return call_user_func($this->fields, $post_id, $this->name);
		}else{
			return $this->fields;
		}
	}
}

class_alias('WPJAM_Post', 'WPJAM_PostType');