<?php
class WPJAM_Field{
	private	static $del_item_icon	= ' <a href="javascript:;" class="del-item-icon dashicons dashicons-no-alt wpjam-del-item"></a>';
	private	static $del_img_icon	= ' <a href="javascript:;" class="del-item-icon dashicons dashicons-no-alt wpjam-del-img"></a>';
	private	static $mu_action_icon	= ' <a href="javascript:;" class="button wpjam-del-item">删除</a> <span class="dashicons dashicons-menu"></span>';
	private	static $dismiss_icon	= ' <span class="dashicons dashicons-dismiss"></span>';
	
	private static $tmpls	= [];

	private $field = [];

	public function __construct($field){
		foreach($field as $attr => $value){
			if(is_numeric($attr)){
				$value = strtolower(trim($value));

				if(!self::is_boolean_attribute($value)){
					continue;
				}

				$attr	= $value;
			}else{
				$attr	= strtolower(trim($attr));
			
				if(self::is_boolean_attribute($attr)){
					if(!$value){
						continue;
					}

					$value	= $attr;
				}elseif(in_array($attr, ['options', 'show_if'], true)){
					if(!is_array($value)){
						$value	= wp_parse_args($value);
					}
				}elseif(in_array($attr, ['total', 'max_items'], true)){
					$value	= (int)$value;
				}
			}

			$this->field[$attr]	= $value;
		}

		if(empty($this->field['type'])){
			$this->field['type']		= 'text';
		}

		if(empty($this->field['options'])){
			$this->field['options']		= [];
		}
	}

	public function __get($key){
		return $this->field[$key] ?? null;
	}

	public function __set($key, $value){
		$this->field[$key]	= $value;
	}

	public function __isset($key){
		return isset($this->field[$key]);
	}

	public function __unset($key){
		unset($this->field[$key]);
	}

	public function to_array(){
		return $this->field;
	}

	public function validate($value, $validate=true){
		$title		= $this->title ? '「'.$this->title.'」' : '「'.$this->key.'」';
		$required	= $validate ? isset($this->required) : false;

		if(is_null($value) && $required){
			return new WP_Error('value_required', $title.'的值不能为空');
		}

		if($this->validate_callback && is_callable($this->validate_callback)){
			$result	= call_user_func($this->validate_callback, $value);

			if($result === false){
				return $validate ? new WP_Error('invalid_value', $title.'的值无效') : null;
			}elseif(is_wp_error($result)){
				return $validate ? $result : null;
			}
		}

		if($this->type == 'checkbox'){
			if($this->options){
				$value	= is_array($value) ? $value : [];
				$value	= $value ? array_values(array_intersect(array_map('strval', array_keys($this->options)), $value)) : [];

				if(empty($value) && $required){
					$value	= null;
				}
			}else{
				if($validate){
					$value	= (int)$value;
				}
			}
		}elseif(self::is_mu_type($this->type)){
			if($value){
				if(!is_array($value)){
					$value	= wpjam_json_decode($value);
				}else{
					$value	= wpjam_array_filter($value, function($item){ return !empty($item) || is_numeric($item); });
				}
			}

			if(empty($value) || is_wp_error($value)){
				$value	= null;
			}else{
				$value	= array_values($value);

				if($this->max_items && count($value) > $this->max_items){
					$value	= array_slice($value, 0, $this->max_items);
				}
			}
		}else{
			if(empty($value) && !is_numeric($value) && $required){
				$value	= null;
			}else{
				if($this->type == 'radio'){
					if(!in_array($value, array_map('strval', array_keys($this->options)))){
						$value	= null;
					}
				}elseif($this->type == 'select'){
					$allows	= [];

					foreach($this->options as $opt_value => $opt_title){
						if(!empty($opt_title['optgroup'])){
							foreach($opt_title['options'] as $sub_opt_value => $sub_opt_title){
								$allows[]	= (string)$sub_opt_value;
							}
						}else{
							$allows[]	= (string)$opt_value;
						}
					}

					if(!in_array($value, $allows)){
						$value	= null;
					}
				}elseif(in_array($this->type, ['number', 'range'])){
					if(!is_null($value)){
						if($this->step && ($this->step == 'any' || strpos($this->step, '.'))){
							$value	= (float)$value;
						}else{
							$value	= (int)$value;
						}

						if($this->min && is_numeric($this->min)){
							if($value < $this->min){
								$value	= $this->min;
							}
						}

						if($this->max && is_numeric($this->max)){
							if($value > $this->max){
								$value	= $this->max;
							}
						}
					}
				}else{
					if(!is_null($value)){
						if($validate){
							if($this->minlength && is_numeric($this->minlength)){
								if(mb_strlen($value) < $this->minlength){
									return new WP_Error('invalid_value', $title.'的长度小于最小长度'.$this->minlength);
								}
							}

							if($this->maxlength && is_numeric($this->maxlength)){
								if(mb_strlen($value) > $this->maxlength){
									return new WP_Error('invalid_value', $title.'的长度大于最大长度'.$this->maxlength);
								}
							}
						}

						if($this->type == 'textarea'){
							$value	= str_replace("\r\n", "\n", $value);
						}
					}
				}
			}
		}

		if($this->data_type && $value){
			$value	= apply_filters('wpjam_data_type_field_value', $value, $this->field);
		}

		if(is_null($value) && $required){
			return new WP_Error('value_required', $title.'的值为空或无效');
		}

		if($this->sanitize_callback && is_callable($this->sanitize_callback)){
			$value	= call_user_func($this->sanitize_callback, $value);
		}

		return $value;
	}

	private function callback($args=[]){
		if(empty($args['is_add'])){
			$this->value	= $this->parse_value($args);
		}

		if(!empty($args['name'])){
			$this->name	= $args['name'].self::generate_sub_name($this->name);
		}

		if(!empty($args['show_if_keys']) && in_array($this->key, $args['show_if_keys'])){
			$this->show_if_key	= true;
		}

		return self::render($this->field);
	}

	public function parse_value($args=[]){
		$default	= is_admin() ? $this->value : $this->defaule;
		$cb_args	= isset($args['id']) ? $args['id'] : $args;

		$name		= $this->name ?: $this->key;
		$name_obj	= wpjam_get_field_name_object($name);
		$name		= $name_obj->top_name;

		if($this->value_callback){
			if(!is_callable($this->value_callback)){
				wp_die($this->key.'的 value_callback「'.$this->value_callback.'」无效');
			}

			$value	= call_user_func($this->value_callback, $name, $cb_args);
		}else{
			if(in_array($this->type, ['view', 'br','hr']) && !is_null($default)){
				return $default;
			}

			if(!empty($args['data']) && isset($args['data'][$name])){
				$value	= $args['data'][$name];
			}elseif(!empty($args['value_callback'])){
				$value	= call_user_func($args['value_callback'], $name, $cb_args);
			}else{
				$value	= null;
			}
		}

		$value	= $name_obj->parse_value($value);

		return is_null($value) ? $default : $value;
	}

	public static function is_mu_type($type){
		return in_array($type, ['mu-image', 'mu-file', 'mu-text', 'mu-img', 'mu-fields'], true);
	}

	public static function is_boolean_attribute($attr){
		return in_array($attr, ['allowfullscreen', 'allowpaymentrequest', 'allowusermedia', 'async', 'autofocus', 'autoplay', 'checked', 'controls', 'default', 'defer', 'disabled', 'download', 'formnovalidate', 'hidden', 'ismap', 'itemscope', 'loop', 'multiple', 'muted', 'nomodule', 'novalidate', 'open', 'playsinline', 'readonly', 'required', 'reversed', 'selected', 'typemustmatch'], true);
	}

	public static function generate_sub_name($name){
		return wpjam_get_field_name_object($name)->sub_name;
	}

	private static function parse_option_title($opt_title, &$attr, $checked=false){
		$attr	= $class	= [];

		if($checked){
			$class[]	= 'checked';
		}

		if(is_array($opt_title)){
			foreach($opt_title as $k => $v){
				if($k == 'show_if'){
					if($show_if = wpjam_parse_show_if($v)){
						$class[]	= 'show-if-'.$show_if['key'];

						$attr['show_if']	= $show_if;
					}
				}elseif($k == 'class'){
					$class	= array_merge($class, explode(' ', $v));
				}elseif($k != 'title' && !is_array($v)){
					$attr[$k]	= $v;
				}
			}

			$opt_title	= $opt_title['title'];
		}

		$attr	= $attr ? wpjam_data_attribute_string($attr) : '';
		$attr	.= $class ? ' class="'.implode(' ', $class).'"' : '';

		return $opt_title;
	}

	public  static function render($field){
		$field['key']	= $key	= $field['key'] ?? '';
		$field['name']	= $name	= $field['name'] ?? $key;
		$field['id']	= $id	= $field['id'] ?? $key;;

		if(is_numeric($key)){
			trigger_error('Field 的 key「'.$key.'」'.'为纯数字');
			return;
		}

		if(isset($field['value'])){
			$value	= $field['value'];
		}else{
			if($field['type'] == 'radio' && $field['options']){
				$value	= $field['value']	= current(array_keys($field['options']));
			}else{
				$value	= $field['value']	= '';
			}
		}

		if(self::is_mu_type($field['type'])){
			if(isset($field['max_items'])){
				$max_items	= wpjam_array_pull($field, 'max_items');
			}else{
				$max_items	= wpjam_array_pull($field, 'total') ?: 0;
			}

			$max_reached	= false;

			if($value && is_array($value)){
				$value	= wpjam_array_filter($value, function($item){ 
					return !empty($item) || is_numeric($item); 
				});

				if($max_items && count($value) >= $max_items){
					$max_reached	= true;
					$value			= array_slice($value, 0, $max_items);
				}
			}else{
				$value	= [];
			}

			$field['value']	= $value;
		}

		if(!isset($field['class'])){
			if($field['type'] == 'textarea'){
				$field['class']	= ['large-text'];
			}elseif(in_array($field['type'], ['text', 'url', 'image', 'file', 'mu-file', 'mu-image'], true)){
				$field['class']	= ['regular-text'];
			}elseif($field['type'] == 'mu-text'){
				// do nothing
			}else{
				$field['class']	= [];
			}
		}elseif($field['class']){
			if(!is_array($field['class'])){
				$field['class']	= explode(' ', $field['class']);
			}
		}else{
			$field['class']	= [];
		}

		if(isset($field['disabled'])){
			$field['class'][]	= 'disabled';
		}

		if(wpjam_array_pull($field, 'show_if_key') || in_array($field['type'], ['checkbox', 'radio', 'select'], true)){
			$field['class'][]	= 'show-if-key';
		}

		if(!empty($field['description'])){
			if($field['type'] == 'checkbox'){
				$description	= ' '.$field['description'];
			}else{
				$description	= '<span class="description">'.$field['description'].'</span>';

				if($field['type'] != 'mu-text' && $field['class'] && array_intersect(['large-text','regular-text'], $field['class'])){
					$description	= '<br />'.$description;
				}else{
					$description	= ''.$description;
				}
			}

			$field['description']	= $description;
		}else{
			$field['description']	= $description = '';
		}

		$editable	= !isset($field['readonly']) && !isset($field['disabled']);
		$html		= '';
		$items		= [];

		if(in_array($field['type'], ['view','br'], true)){
			if($field['options']){
				$value	= $value ?: 0;
				$html	= $field['options'][$value] ?? $value;
			}else{
				$html	= $value;
			}
		}elseif($field['type'] == 'hr'){
			$html	= '<hr />';
		}elseif($field['type'] == 'hidden'){
			$html	= self::render_input($field);
		}elseif($field['type'] == 'textarea'){
			$html = self::render_input(wp_parse_args($field, ['rows'=>6, 'cols'=>50]));
		}elseif($field['type'] == 'range'){
			$html	= self::render_input($field).' <span>'.$value.'</span>';
		}elseif($field['type'] == 'color'){
			$field['class'][]	= 'color';
			$field['type']		= 'text';

			$html	= self::render_input($field);
		}elseif($field['type'] == 'checkbox'){
			if($field['options']){
				$html	= self::render_options_field($field);
			}else{
				$field['checked']	= $value == 1 ? 'checked' : false;
				$field['value']		= 1;

				$html	= self::render_input($field);
			}
		}elseif($field['type'] == 'radio'){
			if($field['options']){
				$html	= self::render_options_field($field);
			}
		}elseif($field['type'] == 'select'){
			if($field['options']){
				$field['options']	= self::render_select_options($field['options'], $value);
			}

			$html	= self::render_input($field);
		}elseif(in_array($field['type'], ['file', 'image'], true)){
			if(current_user_can('upload_files')){
				$field['class'][]	= 'wpjam-file-input';

				$button	= '<a class="wpjam-file button" data-item_type="%s">选择%s</a>';
				$button	= $field['type'] == 'image' ? sprintf($button, 'image', '图片') : sprintf($button, '', '文件');
				$html	= self::render_input(array_merge($field, ['type'=>'url', 'description'=>''])).' '.$button.$description;
			}
		}elseif($field['type'] == 'img'){
			if(current_user_can('upload_files')){
				$attr	= [];
				
				$attr['item_type']	= $field['item_type'] ?? '';

				if($size = wpjam_array_pull($field, 'size')){
					$size	= wpjam_parse_size($size);

					list($width, $height)	= wp_constrain_dimensions($size['width'], $size['height'], 600, 600);

					$attr['img_style']	= $width > 1 ? 'width:'.($width/2).'px;' : '';
					$attr['img_style']	.= $height > 1 ? ' height:'.($height/2).'px;' : '';

					$attr['thumb_args']	= wpjam_get_thumbnail('',$size);
				}else{
					$attr['img_style']	= 'max-width:200px;';
					$attr['thumb_args']	= wpjam_get_thumbnail('', 400);
				}

				$class		= '';
				$img_tag	= '';

				if(!empty($value)){
					$img_url	= $attr['item_type'] == 'url' ? $value : wp_get_attachment_url($value);

					if($img_url){
						$class		.= ' has-img';
						$img_tag	= '<img style="'.$attr['img_style'].'" src="'.wpjam_get_thumbnail($img_url, $size).'" alt="" />';
					}
				}

				if($editable){
					$img_tag	.= self::$del_img_icon;
					$img_tag	.= '<div class="wp-media-buttons"><button type="button" class="button insert-media add_media"><span class="wp-media-buttons-icon"></span> 添加图片</button></div>';
				}else{
					$class	.= ' readonly';
				}

				$html	= '<div class="wpjam-img'.$class.'" '.wpjam_data_attribute_string($attr).'>'.$img_tag.'</div>';
				$html	.= ($editable ? self::render_input(array_merge($field, ['type'=>'hidden'])) : '').$description;
			}
		}elseif($field['type'] == 'editor'){
			$field['id']= 'editor_'.$field['id'];
			$settings	= wpjam_array_pull($field, 'settings') ?: [];
			$settings	= wp_parse_args($settings, [
				'tinymce'		=>[
					'wpautop'	=> true,
					'plugins'	=> 'charmap colorpicker compat3x directionality hr image lists media paste tabfocus textcolor wordpress wpautoresize wpdialogs wpeditimage wpemoji wpgallery wplink wptextpattern wpview',
					'toolbar1'	=> 'bold italic underline strikethrough | bullist numlist | blockquote hr | alignleft aligncenter alignright alignjustify | link unlink | wp_adv',
					'toolbar2'	=> 'formatselect forecolor backcolor | pastetext removeformat charmap | outdent indent | undo redo | wp_help'
				],
				'quicktags'		=> true,
				'mediaButtons'	=> true
			]);

			if(wp_doing_ajax()){
				$field['type']	= 'textarea';
				$field['class']	= array_merge($field['class'], ['wpjam-editor', 'large-text']);
				$field['rows']	= $field['rows'] ?? 12;
				$field['cols']	= $field['cols'] ?? 50;

				$field['data-settings']	= wpjam_json_encode($settings);

				$html	= self::render_input($field);
			}else{
				ob_start();

				wp_editor($value, $field['id'], $settings);

				$editor	= ob_get_clean();

				$style	= isset($field['style']) ? ' style="'.$field['style'].'"' : '';
				$html 	= '<div'.$style.'>'.$editor.'</div>';

				$html	.= $description;
			}	
		}elseif($field['type'] == 'mu-img'){
			if(current_user_can('upload_files')){
				$item_type	= $field['item_type'] ?? '';
				$item_class	= 'mu-item mu-img';
				$item_field	= array_merge($field, ['type'=>'hidden', 'name'=>$name.'[]']);

				foreach($value as $img){
					$img_url	= $item_type == 'url' ? $img : wp_get_attachment_url($img);
					$img_tag	= '<img src="'.wpjam_get_thumbnail($img_url, 200, 200).'" alt="">';
					$img_tag	= '<a href="'.$img_url.'" class="wpjam-modal">'.$img_tag.'</a>';

					if($editable){
						$item_field	= array_merge($item_field, ['id'=>'', 'value'=>esc_attr($img)]);
						$img_tag	= $img_tag.self::render_input($item_field).self::$del_item_icon;
					}

					$items[]	= $img_tag;
				}

				if($editable){
					$attr	= ['name'=>$name.'[]', 'item_class'=>$item_class, 'item_type'=>$item_type, 'thumb_args'=>wpjam_get_thumbnail('', [200,200])];
					$button	= '<div class="wpjam-mu-img dashicons dashicons-plus-alt2" '.wpjam_data_attribute_string($attr).'></div>';
					$class	= '';
				}else{
					$button	= '';
					$class	= ' readonly';
				}

				$html	= $items ? '<div class="'.$item_class.'">'.implode('</div> <div class="mu-item mu-img">', $items).'</div>' : '';
				$html	= '<div class="mu-imgs'.$class.'" id="'.$field['id'].'" data-max_items="'.$max_items.'">'.$html.$button.'</div>'.$description;
			}
		}elseif(in_array($field['type'], ['mu-file', 'mu-image'], true)){
			if(current_user_can('upload_files')){
				$item_type	= $field['type'] == 'mu-image' ? 'image' : '';
				$item_field	= array_merge($field, ['type'=>'url', 'id'=>'', 'name'=>$name.'[]', 'description'=>'']);

				$i	= 0;

				foreach($value as $file){
					$i++;

					$item_field['value']	= esc_attr($file);

					if(!$max_items || $i < $max_items){
						$items[]	= self::render_input($item_field).self::$mu_action_icon;
					}
				}

				if(!$max_reached){
					$item_field['value']	= '';
				}

				$title		= $item_type == 'image' ? '图片' : '文件';
				$attr		= ['name'=>$name.'[]', 'item_class'=>'mu-item', 'item_type'=>$item_type,	'title'=>'选择'.$title];
				$button		= '<a class="wpjam-mu-file button" '.wpjam_data_attribute_string($attr).'>选择'.$title.'[多选]</a>';

				$items[]	= self::render_input($item_field).$button;

				$html		= '<div class="mu-item">'.implode('</div> <div class="mu-item">', $items).'</div>';
				$html		= '<div class="mu-files" id="'.$field['id'].'" data-max_items="'.$max_items.'">'.$html.'</div>'.$description;
			}
		}elseif($field['type'] == 'mu-text'){
			$item_type	= $field['item_type'] ?? 'text';
			$item_field	= array_merge($field, ['type'=>$item_type, 'id'=>'', 'name'=>$name.'[]', 'description'=>'']);
			$item_field	= wpjam_array_except($item_field, 'required');	// validate 再验证

			$i	= 0;

			foreach($value as $item){
				$i++;

				$item_field['value']	= $item;

				if(!$max_items || $i < $max_items){
					$items[]	= self::render($item_field).self::$mu_action_icon;
				}
			}

			if(!$max_reached){
				$item_field['value']	= '';
			}

			$items[]	= self::render($item_field).' <a class="wpjam-mu-text button">添加选项</a>';

			$html	= '<div class="mu-item">'.implode('</div> <div class="mu-item">', $items).'</div>';
			$html 	= '<div class="mu-texts" id="'.$field['id'].'" data-max_items="'.$max_items.'">'.$html.'</div>'.$description;
		}elseif($field['type'] == 'mu-fields'){
			if(!empty($field['fields'])){
				$i	= 0;

				foreach($value as $item){
					$i++;

					$item_html	= self::render_mu_fields($name, $field['fields'], $i, $item);

					if(!$max_items || $i < $max_items){
						$items[]	= $item_html.self::$mu_action_icon;
					}
				}

				if(!$max_reached){
					$item_html	= self::render_mu_fields($name, $field['fields'], ($i+1));
				}

				$item_class	= 'mu-item';
				
				if(wpjam_array_pull($field, 'group')){
					$item_class	.= ' field-group';
				}

				$tmpl_id	= md5($name);
				$button		= ' <a class="wpjam-mu-fields button" data-i="%s" data-item_class="'.$item_class.'" data-tmpl_id="wpjam-'.$tmpl_id.'">添加选项</a>';
				$items[]	= $item_html.sprintf($button, $i+1);

				$html	= '<div class="'.$item_class.'">'.implode('</div> <div class="'.$item_class.'">', $items).'</div>';
				$html	= '<div class="mu-fields" id="mu_fields_'.$id.'" data-max_items="'.$max_items.'">'.$html.'</div>';

				self::$tmpls[$tmpl_id]	= self::render_mu_fields($name, $field['fields'], '{{ data.i }}').sprintf($button, '{{ data.i }}');
			}
		}else{
			if(!empty($field['data_type'])){
				$field['class'][]		= 'wpjam-autocomplete';
				$field['data-data_type']= $field['data_type'];

				$query_title	= '';
				$query_args		= wpjam_array_pull($field, 'query_args') ?: [];

				if($query_args && !is_array($query_args)){
					$query_args	= wp_parse_args($query_args);
				}

				if($field['data_type'] == 'post_type'){
					if(!empty($field['post_type'])){
						$query_args['post_type']	= $field['post_type'];
					}

					if($value && is_numeric($value) && ($_post = get_post($value))){
						$query_title	= $_post->post_title ?: $_post->ID;
					}
				}elseif($field['data_type'] == 'taxonomy'){
					if(!empty($field['taxonomy'])){
						$query_args['taxonomy']	= $field['taxonomy'];
					}

					if($value && is_numeric($value) && ($_term = get_term($value))){
						$query_title	= $_term->name ?: $_term->term_id;
					}
				}elseif($field['data_type'] == 'model'){
					if(!empty($field['model'])){
						$query_args['model']	= $field['model'];
					}

					$label_key	= $query_args['label_key'] = $query_args['label_key'] ?? 'title'; 
					$id_key		= $query_args['id_key'] = $query_args['id_key'] ?? 'id';

					$model	= $query_args['model'] ?? '';

					if(empty($model) || !class_exists($model)){
						wp_die($key.' model 未定义');
					}

					if($value && ($item = $model::get($value))){
						$query_title	= $item[$label_key] ?: $item[$id_key];
					}
				}

				$field['data-query_args']	= wpjam_json_encode($query_args);

				$class	= 'wpjam-query-title';
				$class	.= $field['class'] ? ' '.implode(' ', array_unique($field['class'])) : '';

				$query_title	= $query_title ? '<span class="wpjam-query-title '.$class.'">'.self::$dismiss_icon.$query_title.'</span>' : '';

				$html	= self::render_input($field).$query_title;
			}else{
				$html	= self::render_input($field);

				if(!empty($field['list']) && $field['options']){
					$html	.= '<datalist id="'.$field['list'].'">';

					foreach($field['options'] as $opt_value => $opt_title){
						$html	.= '<option label="'.esc_attr($opt_title).'" value="'.esc_attr($opt_value).'" />';
					}

					$html	.= '</datalist>';
				}
			}
		}

		return apply_filters('wpjam_field_html', $html, $field);
	}

	private static function render_input($field){
		$field['data-key']	= $field['key'];
		$field['class']		= $field['class'] ? implode(' ', array_unique($field['class'])) : '';

		$keys	= ['type','key','title','value','default','description','options','fields','sortable_column','data_type','parse_required','item_type','show_if','creatable','post_type','taxonomy','sanitize_callback','validate_callback','column_callback','value_callback'];

		$attr	= [];

		foreach($field as $attr_key => $attr_value){
			if(!in_array($attr_key, $keys)){
				if(is_object($attr_value) || is_array($attr_value)){
					trigger_error($attr_key.' '.var_export($attr_value, true).var_export($field, true));
				}elseif(is_int($attr_value) || $attr_value){
					$attr[]	= $attr_key.'="'.esc_attr($attr_value).'"';
				}
			}
		}

		$attr	= implode(' ', $attr);

		if($field['type'] == 'select'){
			$html	= '<select '.$attr.'>'.$field['options'].'</select>' .$field['description'];
		}elseif($field['type'] == 'textarea'){
			$html	= '<textarea '.$attr.'>'.esc_textarea($field['value']).'</textarea>'.$field['description'];
		}else{
			$html	= '<input type="'.esc_attr($field['type']).'" value="'.esc_attr($field['value']).'" '.$attr.' />';

			if($field['description'] && $field['type'] != 'hidden'){
				$html	= '<label id="label_'.esc_attr($field['id']).'" for="'.esc_attr($field['id']).'">'.$html.$field['description'].'</label>';
			}
		}

		return $html;
	}

	private static function render_mu_fields($sup, $fields, $i, $value=[]){
		$show_if_keys	= self::get_show_if_keys($fields);

		$html	= '';

		$group_obj	= wpjam_get_field_group_object();

		foreach($fields as $key=>$field){
			if($field['type'] == 'fieldset'){
				wp_die('mu-fields 不允许内嵌 fieldset');
			}elseif($field['type'] == 'mu-fields'){
				wp_die('mu-fields 不允许内嵌 mu-fields');
			}

			$id		= $field['id'] ?? $key;
			$name	= $field['name'] ?? $key;

			if(preg_match('/\[([^\]]*)\]/', $name)){
				wp_die('mu-fields 类型里面子字段不允许[]模式');
			}

			$field['name']	= $sup.'['.$i.']'.'['.$name.']';

			if($value && isset($value[$name])){
				$field['value']	= $value[$name];
			}

			if($show_if_keys && in_array($key, $show_if_keys)){
				$field['show_if_key']	= true;
			}

			if(isset($field['show_if'])){
				$field['show_if']['key']	.= '__'.$i;
			}

			$field['key']	= $key.'__'.$i;
			$field['id']	= $id.'__'.$i;

			if($field['type'] == 'hidden'){
				$html	.= self::render($field);
			}else{
				$group	= wpjam_array_pull($field, 'group') ?: '';
				$html	.= $group_obj->render($group);

				$title	= $field['title'] ?? ''; 
				$title	= $title ? '<label class="sub-field-label" for="'.$field['id'].'">'.$title.'</label>' : '';

				$html	.= '<div '.self::parse_wrap_attr($field, ['sub-field']).'>'.$title.'<div class="sub-field-detail">'.self::render($field).'</div></div>';
			}
		}
		
		$html	.= $group_obj->reset();

		return $html;
	}

	private static function render_options_field($field){
		$item_field	= wpjam_array_except($field, 'required', 'options');

		if($field['type'] == 'checkbox'){
			$item_field['class'][]	= 'mu-checkbox';
			$item_field['class'][]	= 'checkbox-'.esc_attr($field['key']);
			$item_field['name']		= $field['name'].'[]';
		}

		$item_field['description']	= '';

		foreach($field['options'] as $opt_value => $opt_title){
			if($field['type'] == 'checkbox'){
				$checked	= is_array($field['value']) && in_array($opt_value, $field['value'], true);
			}else{
				$checked	= $opt_value == $field['value'];
			}

			$item_field['id']		= $field['id'].'_'.$opt_value;
			$item_field['data-id']	= $field['id'].'_options';
			$item_field['value']	= $opt_value;
			$item_field['checked']	= $checked ? 'checked' : false;

			$opt_title	= self::parse_option_title($opt_title, $lable_attr, $checked);
			$item_html	= self::render_input($item_field).'&thinsp;'.$opt_title;
			
			$lable_attr	.= ' id="label_'.esc_attr($item_field['id']).'" for="'.esc_attr($item_field['id']).'"';
			
			$items[]	= '<label '.$lable_attr.'>'.$item_html.'</label>';
		}

		$sep	= wpjam_array_pull($field, 'sep', '&emsp;');

		return '<div id="'.$field['id'].'_options">'.implode($sep, $items).'</div>'.$field['description'];
	}

	private static function render_select_options($options, $value){
		foreach($options as $opt_value => $opt_title){
			if(is_array($opt_title) && !empty($opt_title['optgroup'])){
				$sub_opts	= wpjam_array_pull($opt_title, 'options');
				$opt_title	= self::parse_option_title($opt_title, $attr);
				$items[]	= '<optgroup '.$attr.' label="'.esc_attr($opt_title).'" >'.self::render_select_options($sub_opts, $value).'</optgroup>';

			}else{
				$opt_title	= self::parse_option_title($opt_title, $attr);
				$items[]	= '<option '.$attr.' value="'.esc_attr($opt_value).'" '.selected($opt_value, $value, false).'>'.$opt_title.'</option>';;
			}
		}

		return implode('', $items);
	}

	public  static function parse_wrap_attr($field, $class=[]){
		$attr	= [];

		if($wrap_class = wpjam_array_pull($field, 'wrap_class')){
			$class[]	= $wrap_class;
		}

		if(isset($field['show_if'])){
			if($show_if = wpjam_parse_show_if($field['show_if'])){
				$class[]	= 'show-if-'.$show_if['key'];
				$attr[]		= 'data-show_if=\''.wpjam_json_encode($show_if).'\'';
			}
		}

		$attr[]	= $class ? 'class="'.implode(' ', $class).'"' : '';

		return $attr ? implode(' ', $attr) : '';
	}

	private static function get_show_if_keys($fields){
		$show_if_keys	= [];

		foreach($fields as $key => $field){
			if(isset($field['show_if']) && !empty($field['show_if']['key'])){
				$show_if_keys[]	= $field['show_if']['key'];
			}

			if($field['type'] == 'fieldset' && !empty($field['fields'])){
				$show_if_keys	= array_merge($show_if_keys, self::get_show_if_keys($field['fields']));
			}
		}

		return array_unique($show_if_keys);
	}

	public  static function print_media_templates(){
		self::$tmpls	+= [
			'mu-action'	=> self::$mu_action_icon,
			'img'		=> '<img style="{{ data.img_style }}" src="{{ data.img_url }}{{ data.thumb_args }}" alt="" />',
			'mu-img'	=> '<img src="{{ data.img_url }}{{ data.thumb_args }}" /><input type="hidden" name="{{ data.name }}" value="{{ data.img_value }}" />'.self::$del_item_icon,
			'mu-file'	=> '<input type="url" name="{{ data.name }}" class="regular-text" value="{{ data.img_url }}" />'
		];

		echo self::get_tmpls();
		echo '<div id="tb_modal" style="display:none; background: #f1f1f1;"></div>';
	}

	public  static function get_tmpls(){
		$output = '';

		foreach(self::$tmpls as $tmpl_id => $tmpl){
			$output	.= "\n".'<script type="text/html" id="tmpl-wpjam-'.$tmpl_id.'">'."\n";
			$output	.=  $tmpl."\n";
			$output	.=  '</script>'."\n";
		}

		self::$tmpls	= [];

		return $output;
	}

	public  static function get_data($fields, $values=null, $args=[]){
		$get_show_if	= $args['get_show_if'] ?? false;
		$show_if_values	= $args['show_if_values'] ?? [];
		$field_validate	= $get_show_if ? false : ($args['validate'] ?? true);

		$data	= [];

		foreach($fields as $key => &$field){
			if(in_array($field['type'], ['view', 'br','hr']) 
				|| isset($field['disabled']) 
				|| isset($field['readonly'])
				|| wpjam_array_pull($field, 'show_admin_column') === 'only'
			){
				continue;
			}

			$field['key']	= $key;

			$validate	= $field_validate;

			if($validate 
				&& isset($field['show_if']) 
				&& wpjam_show_if($show_if_values, $field['show_if']) === false
			){
				$validate	= false;
			}

			$name	= $field['name'] ?? $key;

			if($field['type'] == 'fieldset'){
				if(!empty($field['fields'])){
					$fieldset_type	= wpjam_array_pull($field, 'fieldset_type');

					if($fieldset_type == 'array'){
						$sub_fields	= [];

						foreach($field['fields'] as $sub_key => $sub_field){
							$sub_name			= $sub_field['name'] ?? $sub_key;
							$sub_field['name']	= $name.self::generate_sub_name($sub_name);

							if($get_show_if){	// show_if 判断是基于 key 并且 fieldset array 的情况下的 key 是 ${key}_{$sub_key}
								$sub_field['key']	= $sub_key	= $key.'_'.$sub_key;
							}

							$sub_fields[$sub_key]	= $sub_field;
						}
					}else{
						$sub_fields	= $field['fields'];
					}

					$value	= self::get_data($sub_fields, $values, array_merge($args, ['validate'=>$validate]));

					if(is_wp_error($value)){
						return $value;
					}else{
						if($fieldset_type == 'array'){
							$value	= array_filter($value, function($item){ return !is_null($item); });
						}
					}

					$data	= wpjam_array_merge($data, $value);
				}
			}else{
				$name_obj	= wpjam_get_field_name_object($name);
				$name		= $name_obj->top_name;
				
				if(isset($values)){
					$value	= $values[$name] ?? null;
				}else{
					$value	= wpjam_get_parameter($name, ['method'=>'POST']);
				}

				$value		= $name_obj->parse_value($value);
				$object		= new self($field);

				if($get_show_if){
					$data[$key]	= $object->validate($value, false);
				}else{
					$value = $object->validate($value, $validate);

					if(is_wp_error($value)){
						return $value;
					}

					if($sub_arr = $name_obj->sub_arr){
						foreach($sub_arr as $sub_name){
							$value	= [$sub_name => $value];
						}

						$data	= wpjam_array_merge($data, [$name=>$value]);
					}else{
						$data[$name]	= $value;
					}
				}
			}
		}

		return $data;
	}

	public  static function fields_validate($fields, $values=null){
		if(is_wp_error($fields)){
			return $fields;
		}

		$show_if_keys	= self::get_show_if_keys($fields);
		$show_if_values	= $show_if_keys ? self::get_data($fields, $values, ['get_show_if'=>true]) : [];

		return self::get_data($fields, $values, ['show_if_values'=>$show_if_values]);
	}

	public  static function fields_callback($fields, $args=[]){
		$output			= '';
		$fields_type	= $args['fields_type'] ?? 'table';

		$args['show_if_keys']	= self::get_show_if_keys($fields);

		foreach($fields as $key => $field){
			if(wpjam_array_pull($field, 'show_admin_column') === 'only'){
				continue;
			}

			$field['key']	= $key;
			$field['name']	= $field['name'] ?? $key;

			$id		= $field['id'] = $field['id'] ?? $key;
			$title	= $field['title'] = $field['title'] ?? '';

			if($field['type'] == 'fieldset'){
				$html	= '<legend class="screen-reader-text"><span>'.$title.'</span></legend>';

				if(!empty($field['fields'])){
					$group_obj		= wpjam_get_field_group_object();
					$fieldset_type	= wpjam_array_pull($field, 'fieldset_type');

					foreach($field['fields'] as $sub_key => &$sub_field){
						if($sub_field['type'] == 'fieldset'){
							wp_die('fieldset 不允许内嵌 fieldset');
						}

						$sub_field['name']	= $sub_field['name'] ?? $sub_key;

						if($fieldset_type == 'array'){
							$sub_key	= $key.'_'.$sub_key;

							$sub_field['name']	= $field['name'].self::generate_sub_name($sub_field['name']);
						}

						$sub_id	= $sub_field['id'] ?? $sub_key;

						$sub_field['key']	= $sub_key;
						$sub_field['id']	= $sub_id;

						$object		= new self($sub_field);
						$sub_html	= $object->callback($args);

						if($sub_field['type'] == 'hidden'){
							$html	.= $sub_html;
						}else{
							$wrap_attr	= self::parse_wrap_attr($sub_field, ['sub-field']);
							$sub_title	= $sub_field['title'] ?? '';
							$sub_title	= $sub_title ? '<label class="sub-field-label" for="'.$sub_id.'">'.$sub_title.'</label>' : '';

							$group	= wpjam_array_pull($sub_field, 'group') ?: '';
							$html	.= $group_obj->render($group);
							$html	.= '<div '.$wrap_attr.' id="div_'.$sub_id.'">'.$sub_title.'<div class="sub-field-detail">'.$sub_html.'</div>'.'</div>';
						}
					}
					
					$html	.= $group_obj->reset();

					unset($sub_field);
				}

				if(!empty($field['description'])){
					$html	.= '<span class="description">'.$field['description'].'</span>';
				}

				if(wpjam_array_pull($field, 'group')){
					$html	= '<div class="field-group">'.$html.'</div>';
				}
			}else{
				$object	= new self($field);
				$html	= $object->callback($args);

				if($field['type'] == 'hidden'){
					$output	.= $html;
					continue;
				}

				if($title){
					$title	= '<label for="'.$key.'">'.$title.'</label>';
				}
			}

			$wrap_class	= [];

			if(!empty($args['wrap_class'])){
				$wrap_class[]	= $args['wrap_class'];
			}

			$wrap_attr	= self::parse_wrap_attr($field, $wrap_class);

			if($fields_type == 'div'){
				$output	.= '<div '.$wrap_attr.' id="div_'.$id.'">'.$title.$html.'</div>';
			}elseif($fields_type == 'list' || $fields_type == 'li'){
				$output	.= '<li '.$wrap_attr.' id="li_'.$id.'">'.$title.$html.'</li>';
			}elseif($fields_type == 'tr' || $fields_type == 'table'){
				$html	= $title ? '<th scope="row">'.$title.'</th><td>'.$html.'</td>' : '<td colspan="2">'.$html.'</td>';
				$output	.= '<tr '.$wrap_attr.' valign="top" '.'id="tr_'.$id.'">'.$html.'</tr>';
			}else{
				$output	.= $title.$html;
			}
		}

		if($fields_type == 'list'){
			$output	= '<ul>'.$output.'</ul>';
		}elseif($fields_type == 'table'){
			$output	= '<table class="form-table" cellspacing="0"><tbody>'.$output.'</tbody></table>';
		}

		if(wp_doing_ajax()){ 
			$output	.= self::get_tmpls();
		}

		if(!isset($args['echo']) || $args['echo']){
			echo $output;
		}else{
			return $output;
		}
	}

	public  static function form_validate($fields, $nonce_action='', $capability='manage_options'){
		check_admin_referer($nonce_action);

		if(!current_user_can($capability)){
			ob_clean();
			wp_die('无权限');
		}

		return self::fields_validate($fields);
	}

	public  static function form_callback($fields, $form_url, $nonce_action='', $submit_text=''){
		echo '<form method="post" action="'.$form_url.'" enctype="multipart/form-data" id="form">';

		echo self::fields_callback($fields);

		wp_nonce_field($nonce_action);
		wp_original_referer_field(true, 'previous');

		if($submit_text!==false){ 
			submit_button($submit_text);
		}

		echo '</form>';
	}

	// 兼容
	public  static function get_value($field, $args=[]){
		return wpjam_get_field_value($field, $args);
	}
}

class WPJAM_Field_Name{
	private $top_name	= '';
	private $name_arr	= [];
	private $sub_arr	= [];

	public function __construct($name){
		if(preg_match('/\[([^\]]*)\]/', $name)){
			$name_arr	= wp_parse_args($name);

			$this->top_name	= current(array_keys($name_arr));
			$this->name_arr	= current(array_values($name_arr));
		}else{
			$this->top_name	= $name;
		}
	}

	public function __get($key){
		if($key == 'sub_name'){
			if($name_arr = $this->name_arr){
				$name	= '['.$this->top_name.']';

				do{
					$name		.='['.current(array_keys($name_arr)).']';
					$name_arr	= current(array_values($name_arr));
				}while($name_arr);

				return $name;
			}else{
				return '['.$this->top_name.']';
			}
		}elseif(in_array($key, ['top_name', 'name_arr', 'sub_arr'])){
			return $this->$key;
		}

		return null;
	}

	public function parse_value($value){
		if($name_arr = $this->name_arr){
			$this->sub_arr	= [];

			do{
				$sub_name	= current(array_keys($name_arr));
				$name_arr	= current(array_values($name_arr));

				if(isset($value) && isset($value[$sub_name])){
					$value	= $value[$sub_name];
				}else{
					$value	= null;
				}

				array_unshift($this->sub_arr, $sub_name);
			}while($name_arr && $value);
		}

		return $value;
	}

	private static $instances	= [];

	public static function get_instance($name){
		if(!isset(self::$instances[$name])){
			self::$instances[$name]	= new self($name);
		}

		return self::$instances[$name];
	}
}

class WPJAM_Field_Group{
	private $group = '';

	public function render($group){
		$return	= '';

		if($group != $this->group){
			if($this->group){
				$return	.= '</div>';
			}

			if($group){
				$return	.= '<div class="field-group" id="field_group_'.esc_attr($group).'">';
			}
		
			$this->group	= $group;
		}

		return $return;
	}

	public function reset(){
		if($this->group){
			$this->group	= '';

			return '</div>';
		}

		return '';
	}

	private static $instance	= null;

	public static function get_instance(){
		if(is_null(self::$instance)){
			self::$instance	= new self();
		}

		return self::$instance;
	}
}