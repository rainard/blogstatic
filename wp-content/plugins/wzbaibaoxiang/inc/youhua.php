<?php
class websitebox_youhua{
    function __construct($data) {
        
        $this->websitebox_youhua_type($data);
    }
    public function websitebox_youhua_type($data){
        if(isset($data['thumb']) && $data['thumb']){
            $this->websitebox_thumb();
        }
        
        if(isset($data['head_dy']) && $data['head_dy']){
            $this->websitebox_head_dy();
        }
        if(isset($data['xml_rpc']) && $data['xml_rpc']){
            $this->websitebox_xml_rpc();
        }
        if(isset($data['feed']) && $data['feed']){
            $this->websitebox_feed();
        }
        if(isset($data['post_thumb']) && $data['post_thumb']){
            $this->websitebox_post_thumb();
        }
        if(isset($data['gravatar']) && $data['gravatar']){
            $this->websitebox_gravatar();
        }
        if(isset($data['lan']) && $data['lan']){
            $this->websitebox_lan();
        }
    }
    public function websitebox_thumb(){
        add_filter('pre_option_thumbnail_size_w',	'__return_zero');
    	add_filter('pre_option_thumbnail_size_h',	'__return_zero');
    	add_filter('pre_option_medium_size_w',		'__return_zero');
    	add_filter('pre_option_medium_size_h',		'__return_zero');
    	add_filter('pre_option_large_size_w',		'__return_zero');
    	add_filter('pre_option_large_size_h',		'__return_zero');
    }
    public function websitebox_head_dy(){
        remove_action( 'wp_head', 'feed_links', 2 ); //移除feed
    	remove_action( 'wp_head', 'feed_links_extra', 3 ); //移除feed
    	remove_action( 'wp_head', 'rsd_link' ); //移除离线编辑器开放接口
    	remove_action( 'wp_head', 'wlwmanifest_link' );  //移除离线编辑器开放接口
    	remove_action( 'wp_head', 'index_rel_link' );//去除本页唯一链接信息
    	remove_action('wp_head', 'parent_post_rel_link', 10, 0 );//清除前后文信息
    	remove_action('wp_head', 'start_post_rel_link', 10, 0 );//清除前后文信息
    	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    	remove_action( 'wp_head', 'locale_stylesheet' );
    	remove_action('publish_future_post','check_and_publish_future_post',10, 1 );
    	remove_action( 'wp_head', 'noindex', 1 );
    	remove_action( 'wp_head', 'wp_generator' ); //移除WordPress版本
    	remove_action( 'wp_head', 'rel_canonical' );
    	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
    	remove_action( 'template_redirect', 'wp_shortlink_header', 11, 0 );
    }
    public function websitebox_xml_rpc(){
        add_filter( 'xmlrpc_methods', [$this,'websitebox_remove_xmlrpc_pingback_ping'] );
        
    }
    public function websitebox_remove_xmlrpc_pingback_ping( $methods ) {
    	unset( $methods['pingback.ping'] );
    	return $methods;
    }
    public function websitebox_feed(){
    	add_action('do_feed', [$this,'websitebox_digwp_disable_feed'], 1);
    	add_action('do_feed_rdf', [$this,'websitebox_digwp_disable_feed'], 1);
    	add_action('do_feed_rss', [$this,'websitebox_digwp_disable_feed'], 1);
    	add_action('do_feed_rss2', [$this,'websitebox_digwp_disable_feed'], 1);
    	add_action('do_feed_atom', [$this,'websitebox_digwp_disable_feed'], 1);
    }
    public function websitebox_digwp_disable_feed(){
        wp_die('<h1>Feed已经关闭, 请访问网站<a href="'.esc_url(get_bloginfo('url')).'">首页</a>!</h1>');
    }
    public function websitebox_post_thumb(){
        add_action('before_delete_post', [$this,'websitebox_delete_post_and_attachments']);
    }
    public function websitebox_delete_post_and_attachments($post_ID){
        global $wpdb;
            //删除特色图片
            $thumbnails = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->postmeta WHERE meta_key = '_thumbnail_id' AND post_id = %d",$post_ID));
            foreach ( $thumbnails as $thumbnail ) {
            wp_delete_attachment( $thumbnail->meta_value, true );
            }
            //删除图片附件
            $attachments = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_parent = %d AND post_type = 'attachment'",$post_ID));
            foreach ( $attachments as $attachment ) {
            wp_delete_attachment( $attachment->ID, true );
            }
            $wpdb->query($wpdb->prepare("DELETE FROM $wpdb->postmeta WHERE meta_key = '_thumbnail_id' AND post_id = %d",$post_ID));
    }
    public function websitebox_gravatar(){
        add_filter( 'get_avatar', function ($avatar) {
    		return '';
    	}, 10, 3 );
    }
    public function websitebox_lan(){
        add_filter( 'locale', [$this,'websitebox_language'] );
    }
    public function websitebox_language($locale) {
		$locale = ( is_admin() ) ? $locale : 'en_US';
		return $locale;
	}
    
}
?>