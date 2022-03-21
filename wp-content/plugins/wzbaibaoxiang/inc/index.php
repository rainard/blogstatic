<?php
class websitebox{
    const book=0;
    function __construct($book) {
        $websitebox_base = get_option('websitebox_base');
        if(isset($websitebox_base['art_cron']) && $websitebox_base['art_cron']){
            $this->websitebox_art_cron();
        }
        if($_POST){
            if(isset($_POST['data']) && is_string($_POST['data'])){
                $websitebox = json_decode($_POST['data'],true);
                $website['content'] = sanitize_textarea_field($websitebox['content']);
                $website['websitebox'] = (int)$websitebox['websitebox'];
                $website['action'] = sanitize_text_field($websitebox['action']);
                $website['nonce'] = sanitize_text_field($websitebox['nonce']);
                if(isset($website['websitebox']) && $website['websitebox']==15){
                    $websitebox_post = new websitebox_post($website);
                    add_action('init',[$websitebox_post,'post']);
                }
            }
        }
        if(is_admin()){
            $this->book = $book;
            add_action( 'admin_enqueue_scripts', [$this,'websitebox_enqueue'] );
            add_filter('plugin_action_links_'.WEBSITEBOX_NAME, [$this,'websitebox_plugin_action_links']);
            add_action('admin_menu',[$this, 'websitebox_addpages']);
            if($_POST){
                if(isset($_POST['data']) && is_string($_POST['data'])){
                    $websitebox = json_decode($_POST['data'],true);
                    
                    if(isset($websitebox['websitebox'])){
                        $website1['action'] = sanitize_text_field($websitebox['action']);
                        $website1['nonce'] = sanitize_text_field($websitebox['nonce']);
                        $website1['websitebox'] =(int)$websitebox['websitebox'];
                        switch($websitebox['websitebox']){
                            case 1:
                                if(isset($websitebox['zoo'])){
                                    $website1['zoo'] =1; 
                                }else{
                                    $website1['zoo'] =0; 
                                }
                                if(isset($websitebox['grey'])){
                                    $website1['grey'] =1;
                                }else{
                                    $website1['grey'] =0; 
                                }
                                if(isset($websitebox['copy'])){
                                    $website1['copy'] =1; 
                                }else{
                                    $website1['copy'] =0; 
                                }
                                if(isset($websitebox['look'])){
                                    $website1['look'] =1; 
                                }else{
                                    $website1['look'] =0; 
                                }
                                if(isset($websitebox['barrage'])){
                                    $website1['barrage'] =1; 
                                }else{
                                    $website1['barrage'] =0; 
                                }
                                if(isset($websitebox['art_cron'])){
                                    $website1['art_cron'] =1; 
                                }else{
                                    $website1['art_cron'] =0; 
                                }
                                break;
                            case 2:
                               
                                if(isset($websitebox['kefu'])){
                                    $website1['kefu'] = 1;
                                }else{
                                    $website1['kefu'] = 0;
                                }
                                $website1['type'] = (int)$websitebox['type'];
                                $website1['bg'] = sanitize_text_field($websitebox['bg']);
                                $website1['icon'] = sanitize_text_field($websitebox['icon']);
                                $website1['phone'] = sanitize_text_field($websitebox['phone']);
                                $website1['phone_cls'] = sanitize_text_field($websitebox['phone_cls']);
                                $website1['qq'] = sanitize_text_field($websitebox['qq']);
                                $website1['qq_cls'] = sanitize_text_field($websitebox['qq_cls']);
                                $website1['qrcode'] = esc_url($websitebox['qrcode']);
                                $website1['qrcode_cls'] = sanitize_text_field($websitebox['qrcode_cls']);
                                $website1['mail'] = sanitize_text_field($websitebox['mail']);
                                $website1['qqqun'] = sanitize_text_field($websitebox['qqqun']);
                                $website1['mail_cls'] = sanitize_text_field($websitebox['mail_cls']);
                                $website1['qqqun_cls'] = sanitize_text_field($websitebox['qqqun_cls']);
                                $website1['wb'] = sanitize_text_field($websitebox['wb']);
                                $website1['wb_cls'] = sanitize_text_field($websitebox['wb_cls']);
                                
                                break;
                            
                            case 4:
                                
                                if(isset($websitebox['close'])){
                                    $website1['auto'] = 1;
                                }else{
                                    $website1['auto'] = 0;
                                }
                                $website1['color'] = sanitize_text_field($websitebox['color']);
                                $website1['title'] = sanitize_text_field($websitebox['title']);
                                
                                break;
                            case 5:
                                
                                if(isset($websitebox['close'])){
                                    $website1['auto'] = 1;
                                }else{
                                    $website1['auto'] = 0;
                                }
                                if(isset($websitebox['mobile_auto'])){
                                    $website1['mobile_auto'] = 1;
                                }else{
                                    $website1['mobile_auto'] = 0;
                                }
                                $website1['type'] = (int)$websitebox['type'];
                                $website1['bg'] = sanitize_text_field($websitebox['bg']);
                                $website1['back'] = esc_url($websitebox['back']);
                                $website1['texiao'] = (int)$websitebox['texiao'];
                               
                                break;
                            case 6:
                                
                                if(isset($websitebox['close'])){
                                    $website1['auto'] = 1;
                                }else{
                                    $website1['auto'] = 0;
                                }
                                if(isset($websitebox['pic_auto'])){
                                    $website1['pic_auto'] = 1;   
                                }else{
                                    $website1['pic_auto'] = 0;   
                                }
                                $website1['title'] = sanitize_text_field($websitebox['title']);
                                $website1['bg'] = sanitize_text_field($websitebox['bg']);
                                $website1['word'] = sanitize_text_field($websitebox['word']);
                                $website1['content'] = sanitize_textarea_field($websitebox['content']);
                                $website1['content_color'] = sanitize_text_field($websitebox['content_color']);
                                $website1['pic'] = esc_url($websitebox['pic']);
                                break;
                            case 7:
                               
                                if(isset($websitebox['close'])){
                                    $website1['auto'] = 1;
                                }else{
                                    $website1['auto'] = 0;
                                } 
                                $website1['speed'] = (int)$websitebox['speed'];
                                $website1['bg'] = sanitize_text_field($websitebox['bg']);
                                $website1['word'] = sanitize_text_field($websitebox['word']);
                                $website1['content'] = sanitize_textarea_field($websitebox['content']);
                                
                                break;
                           
                                
                            case 10:
                                
                                if(isset($websitebox['close'])){
                                    $website1['auto'] = 1;
                                }else{
                                    $website1['auto'] = 0;
                                } 
                                $website1['title'] = sanitize_text_field($websitebox['title']);
                                $website1['word'] = sanitize_text_field($websitebox['word']);
                                $website1['size'] = (int)$websitebox['size'];
                                $website1['type'] = (int)$websitebox['type'];
                               
                                break;
                            case 11:
                                
                                if(isset($websitebox['close'])){
                                    $website1['share'] = 1;
                                }else{
                                    $website1['share'] = 0;
                                } 
                                if(isset($websitebox['open'])){
                                    $website1['open'] = 1;
                                }else{
                                    $website1['open'] = 0;
                                }
                                $website1['wx'] = esc_url($websitebox['wx']);
                                $website1['ali'] = esc_url($websitebox['ali']);
                                
                                break;
                           
                            case 16:
                                $website1['id'] = (int)$websitebox['id'];
                               
                                break;
                            case 17:
                                
                                if(isset($websitebox['close'])){
                                    $website1['auto'] = 1;
                                }else{
                                    $website1['auto'] = 0;
                                } 
                                $website1['phone'] = sanitize_text_field($websitebox['phone']);
                                $website1['kefuicon'] = sanitize_text_field($websitebox['kefuicon']);
                                break;
                            case 18:
                                if(isset($websitebox['sb_texiao'])){
                                    $website1['sb_texiao'] = 1;
                                }else{
                                    $website1['sb_texiao'] = 0;
                                }
                                $website1['fengge'] = (int)$websitebox['fengge'];
                                $website1['nav'] = (int)$websitebox['nav'];
                                $website1['title'] = sanitize_text_field($websitebox['title']);
                                $website1['sb_gaodu'] = (int)$websitebox['sb_gaodu'];
                                $website1['sb_kuandu'] = (int)$websitebox['sb_kuandu'];
                                $website1['sb_shixu'] = (int)$websitebox['sb_shixu'];
                                if(isset($websitebox['sb_tantiao'])){
                                    $website1['sb_tantiao'] = 1;
                                }else{
                                    $website1['sb_tantiao'] = 0;
                                }
                                if(isset($websitebox['sb_huadong'])){
                                    $website1['sb_huadong'] = 1;
                                }else{
                                    $website1['sb_huadong'] = 0;
                                }
                                if(isset($websitebox['sb_touming'])){
                                    $website1['sb_touming'] = 1;
                                }else{
                                    $website1['sb_touming'] = 0;
                                }
                                break;
                            case 19:
                                if(isset($websitebox['thumb'])){
                                    $website1['thumb'] = 1;
                                }else{
                                    $website1['thumb'] = 0;
                                }
                                 if(isset($websitebox['head_dy'])){
                                    $website1['head_dy'] = 1;
                                }else{
                                    $website1['head_dy'] = 0;
                                }
                                 if(isset($websitebox['xml_rpc'])){
                                    $website1['xml_rpc'] = 1;
                                }else{
                                    $website1['xml_rpc'] = 0;
                                }
                                 if(isset($websitebox['feed'])){
                                    $website1['feed'] = 1;
                                }else{
                                    $website1['feed'] = 0;
                                }
                                 if(isset($websitebox['post_thumb'])){
                                    $website1['post_thumb'] = 1;
                                }else{
                                    $website1['post_thumb'] = 0;
                                }
                                 if(isset($websitebox['gravatar'])){
                                    $website1['gravatar'] = 1;
                                }else{
                                    $website1['gravatar'] = 0;
                                }
                                 if(isset($websitebox['lan'])){
                                    $website1['lan'] = 1;
                                }else{
                                    $website1['lan'] = 0;
                                }
                                break;
                            case 20:
                                $website1['website_key'] = sanitize_text_field($websitebox['website_key']);
                                break;
                            
                        }
                       
                        $websitebox_post = new websitebox_post($website1);
                        add_action('init',[$websitebox_post,'post']);
                        
                    }
                }
            }
            
        }
        add_filter( 'wp_handle_upload', [$this,'websitebox_watermark'] );
        register_activation_hook(WEBSITEBOX_FILE, [$this,'websitebox_pluginaction']);
    }
    public function websitebox_art_cron(){
        require plugin_dir_path( WEBSITEBOX_FILE ) . 'inc/websitebox_art_cron.php';
    }
    public function websitebox_enqueue($hook){
        if( 'toplevel_page_websitebox' != $hook ) return;
        wp_enqueue_style( 'websitebox_admin.css',  plugin_dir_url( WEBSITEBOX_FILE ). 'css/websitebox_admin.css',false,'','all');
        wp_enqueue_style( 'layui.css',  plugin_dir_url( WEBSITEBOX_FILE ). 'layui/css/layui.css',false,'','all');
        wp_enqueue_script( 'layui.js', plugin_dir_url( WEBSITEBOX_FILE ).'layui/layui.js', array('jquery'), '', false);
        wp_enqueue_script( 'vsclick.min', plugin_dir_url( WEBSITEBOX_FILE ).'js/vsclick.min.js', array('jquery'), '', false);
        wp_enqueue_media();
        
    }
    public function websitebox_plugin_action_links ( $links) {
        $links[] = '<a href="' . admin_url( 'admin.php?page=websitebox' ) . '">设置</a>';
        return $links;
    }
    public  function websitebox_addpages(){
        add_menu_page(__('网站百宝箱','websitebox'), __('网站百宝箱','websitebox'), 'manage_options', 'websitebox', [$this,'websitebox_toplevelpage'] );
        
    }
    public  function websitebox_toplevelpage(){
        global $wpdb;
        require plugin_dir_path( WEBSITEBOX_FILE ) . 'head.php';
        switch ($this->book) {
            case 0:
                $websitebox_base = get_option('websitebox_base');
                
                
                require plugin_dir_path( WEBSITEBOX_FILE ) . 'index.php';
                break;
            case 1:
                $websitebox_qq = get_option('websitebox_qq');
                $websitebox_qrcode = get_option('websitebox_qrcode');
                $websitebox_mail = get_option('websitebox_mail');
                
                $websitebox_qqqun = get_option('websitebox_qqqun');
                $websitebox_wb = get_option('websitebox_wb');
                $websitebox_phone = get_option('websitebox_phone');
                $websitebox_kefu = get_option('websitebox_kefu');
                require plugin_dir_path( WEBSITEBOX_FILE ) . 'style.php';
                break;
            case 3:
                global $wpdb;
                $count = $wpdb->query('select * from '.$wpdb->prefix . 'websitebox_liuyan',ARRAY_A);
                $totalpage = ceil($count/35);
                $page = isset($_GET['pages'])?(int)$_GET['pages']:1;
                $start = ($page-1)*35;
                $liuyan = $wpdb->get_results('select * from '.$wpdb->prefix . 'websitebox_liuyan order by id desc limit '.$start.',35',ARRAY_A);
                $websitebox_liuyan = get_option('websitebox_liuyan');
                require plugin_dir_path( WEBSITEBOX_FILE ) . 'liuyan.php';
                break;
            case 4:
                
                $websitebox_sitebg = get_option('websitebox_sitebg');
                require plugin_dir_path( WEBSITEBOX_FILE ) . 'back.php';
                break;
            case 5:
                $websitebox_alert = get_option('websitebox_alert');
                require plugin_dir_path( WEBSITEBOX_FILE ) . 'tankuang.php';
                break;
            case 6:
                $websitebox_scroll = get_option('websitebox_scroll');
                require plugin_dir_path( WEBSITEBOX_FILE ) . 'ceshi.php';
                break;
            case 7:
                $websitebox_shuiyin = get_option('websitebox_shuiyin');
                require plugin_dir_path( WEBSITEBOX_FILE ) . 'shuiyin.php';
                break;
            case 8:
                $websitebox_sanheyi = get_option('websitebox_sanheyi');
                require plugin_dir_path( WEBSITEBOX_FILE ) . 'sanhheyi.php';
                break;
            case 9:
                $websitebox_shoujikefu = get_option('websitebox_shoujikefu');
                require plugin_dir_path( WEBSITEBOX_FILE ) . 'shoujikefu.php';
                break;
            case 10:
                $websitebox_sbtexiao = get_option('websitebox_sbtexiao');
                require plugin_dir_path( WEBSITEBOX_FILE ) . 'shubiaotexiao.php';
                break;
            case 11:
                $websitebox_youhua = get_option('websitebox_youhua');
                require plugin_dir_path( WEBSITEBOX_FILE ) . 'youhua.php';
                break;
            case 12:
                $websitebox_youhua = get_option('websitebox_changjianwt');
                require plugin_dir_path( WEBSITEBOX_FILE ) . 'changjianwt.php';
                break;
            default:
                // code...
                break;
        }
        
    }
    public function websitebox_pluginaction(){
        global $wpdb;
        $charset_collate = '';
        
        if (!empty($wpdb->charset)) {
          $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
        }
    
        if (!empty( $wpdb->collate)) {
          $charset_collate .= " COLLATE {$wpdb->collate}";
        }
        $sql = "CREATE TABLE " . $wpdb->prefix . "websitebox_liuyan (
                id int(10) NOT NULL AUTO_INCREMENT,
                time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                content text NOT NULL,
                UNIQUE KEY id (id)
            ) $charset_collate;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql);
    }
    public function websitebox_watermark($upload){
        $websitebox_shuiyin = get_option('websitebox_shuiyin');
        if(isset($websitebox_shuiyin['auto']) && $websitebox_shuiyin['auto']==1){
            $this->websitebox_watermark_create($upload['file'],$upload['file'],$websitebox_shuiyin['title'],'30',$websitebox_shuiyin['size'],$websitebox_shuiyin['word'],$websitebox_shuiyin['type']);
        }
        return $upload;
    }
    public function websitebox_watermark_create($imgurl, $newimgurl, $text, $margin='30', $fontSize = '14', $color = '#790000', $point = '1', $font = 'STXINGKA.TTF', $angle = '0', $watermark_margin = '80'){
        	$margin = intval($margin);
    	$angle = intval($angle);
    	$watermark_margin = intval($watermark_margin);
    	$imageCreateFunArr = array(
    		'image/jpeg' => 'imagecreatefromjpeg', 'image/png' => 'imagecreatefrompng', 'image/gif' => 'imagecreatefromgif'
    	);
    	$imageOutputFunArr = array('image/jpeg' => 'imagejpeg', 'image/png' => 'imagepng', 'image/gif' => 'imagegif');
    	$imgsize = getimagesize($imgurl);
    	if (empty($imgsize)) { return false; }
    	$imgWidth = $imgsize[0];
    	$imgHeight = $imgsize[1];
    	$imgMime = $imgsize['mime'];
    	if (!isset($imageCreateFunArr[$imgMime])) { return false; }
    	if (!isset($imageOutputFunArr[$imgMime])) { return false; }
    	$imageCreateFun = $imageCreateFunArr[$imgMime];
    	$imageOutputFun = $imageOutputFunArr[$imgMime];
    	$im = $imageCreateFun($imgurl);
    	$color = explode(',', $this->websitebox_hex2rgb($color));
    	$text_color = imagecolorallocate($im, intval($color[0]), intval($color[1]), intval($color[2]));
    	$point = intval($point) >= 0 && intval($point) <= 10 ? intval($point) : 1;
    	$fontSize = intval($fontSize) > 0 ? intval($fontSize) : 14;
    	$angle = ($angle >= 0 && $angle < 90 || $angle > 270 && $angle < 360) ? $angle : 0;
    	$fontUrl = plugin_dir_path( WEBSITEBOX_FILE ) . 'fonts/STXINGKA.TTF' ;
    	$text = explode('|', $text);
    	$textLength = count($text) - 1;
    	$maxtext = 0;
    	foreach ($text as $val) {
    		$maxtext = strlen($val) > strlen($maxtext) ? $val : $maxtext;
    	}
    	$textSize = imagettfbbox($fontSize, 0, $fontUrl, $maxtext);
    	$textWidth = $textSize[2] - $textSize[1];
    	$textHeight = $textSize[1] - $textSize[7];
    	$lineHeight = $textHeight + 3;
    	if ($textWidth + 40 > $imgWidth || $lineHeight * $textLength + 40 > $imgHeight) { return false; }
    	
    	if ($point == 10) {
    		$position = array('pointLeft' => $margin, 'pointTop' => $margin);
    		if ($angle != 0) {
    			$position = $this->websitebox_SetAngle($angle, $point, $position, $textWidth, $imgHeight);
    		}
    		$x_length = $imgWidth - $margin;
    		$y_length = $imgHeight - $margin;
    		for  ($x = $position['pointLeft']; $x < $x_length; $x++ ) {
    			for ($y = $position['pointTop']; $y < $y_length; $y++) {
    				foreach ($text as $key => $val) {
    					imagettftext($im, $fontSize, $angle, $x, $y + $key * $lineHeight, $text_color, $fontUrl, $val);
    				}
    				$y += ($lineHeight * count($text) + $watermark_margin);
    			}
    			$x += ($textWidth + $watermark_margin);
    		}
    	} else {
    		if ( $point == 0 ) {
    			$point = mt_rand(1, 9);
    		}
    		$position = $this->websitebox_position($point, $imgWidth, $imgHeight, $textWidth, $textLength, $lineHeight, $margin);
    		if ($angle != 0) {
    			$position = $this->websitebox_SetAngle($angle, $point, $position, $textWidth, $imgHeight);
    		}
    		foreach ($text as $key => $val) {
    	    	imagettftext($im, $fontSize, $angle, $position['pointLeft'], $position['pointTop'] + $key * $lineHeight, $text_color, $fontUrl, $val);
    		}
    	}
    	if ( $imgMime == 'image/jpeg' ) {
    		$imageOutputFun($im, $newimgurl, 100);
    	} else {
    		$imageOutputFun($im, $newimgurl);
    	}
    	imagedestroy($im);
    	return $newimgurl;
        
    }
    public function  websitebox_hex2rgb($hexColor) {
    	$color = str_replace('#', '', $hexColor);
    	if (strlen($color) > 3) {
    		$rgb = array(
    			'r' => hexdec(substr($color, 0, 2)),
    			'g' => hexdec(substr($color, 2, 2)),
    			'b' => hexdec(substr($color, 4, 2))
    		);
    	} else {
    		$color = $hexColor;
    		$r = substr($color, 0, 1) . substr($color, 0, 1);
    		$g = substr($color, 1, 1) . substr($color, 1, 1);
    		$b = substr($color, 2, 1) . substr($color, 2, 1);
    		$rgb = array(
    			'r' => hexdec($r),
    			'g' => hexdec($g),
    			'b' => hexdec($b)
    		);
    	}
    	return $rgb['r'].','.$rgb['g'].','.$rgb['b'];
    }
    public function websitebox_SetAngle ( $angle, $point, $position, $textWidth, $imgHeight ) {
    	if ($angle < 90) {
    		$diffTop = ceil(sin(deg2rad($angle)) * $textWidth);
    
    		if (in_array($point, array(1, 2, 3))) {
    			$position['pointTop'] += $diffTop;
    		} elseif (in_array($point, array(4, 5, 6))) {
    			if ($textWidth > ceil($imgHeight / 2)) {
    				$position['pointTop'] += ceil(($textWidth - $imgHeight / 2) / 2);
    			}
    		}
    	} elseif ($angle > 270) {
    		$diffTop = ceil(sin(deg2rad(360 - $angle)) * $textWidth);
    
    		if (in_array($point, array(7, 8, 9))) {
    			$position['pointTop'] -= $diffTop;
    		} elseif (in_array($point, array(4, 5, 6))) {
    			if ($textWidth > ceil($imgHeight / 2)) {
    				$position['pointTop'] = ceil(($imgHeight - $diffTop) / 2);
    			}
    		}
    	}
    	return $position;
    }
    public function websitebox_position($point, $imgWidth, $imgHeight, $textWidth, $textLength, $lineHeight, $margin) {
    	$pointLeft = $margin;
    	$pointTop = $margin;
    	switch ($point) {
    		case 1:
    			$pointLeft = $margin;
    			$pointTop = $margin;
    			break;
    		case 2:
    			$pointLeft = floor(($imgWidth - $textWidth) / 2);
    			$pointTop = $margin;
    			break;
    		case 3:
    			$pointLeft = $imgWidth - $textWidth - $margin;
    			$pointTop = $margin;
    			break;
    		case 4:
    			$pointLeft = $margin;
    			$pointTop = floor(($imgHeight - $textLength * $lineHeight) / 2);
    			break;
    		case 5:
    			$pointLeft = floor(($imgWidth - $textWidth) / 2);
    			$pointTop = floor(($imgHeight - $textLength * $lineHeight) / 2);
    			break;
    		case 6:
    			$pointLeft = $imgWidth - $textWidth - $margin;
    			$pointTop = floor(($imgHeight - $textLength * $lineHeight) / 2);
    			break;
    		case 7:
    			$pointLeft = $margin;
    			$pointTop = $imgHeight - $textLength * $lineHeight - $margin;
    			break;
    		case 8:
    			$pointLeft = floor(($imgWidth - $textWidth) / 2);
    			$pointTop = $imgHeight - $textLength * $lineHeight - $margin;
    			break;
    		case 9:
    			$pointLeft = $imgWidth - $textWidth - $margin;
    			$pointTop = $imgHeight - $textLength * $lineHeight - $margin;
    			break;
    	}
    	return array('pointLeft' => $pointLeft, 'pointTop' => $pointTop);
    }
    
}
?>