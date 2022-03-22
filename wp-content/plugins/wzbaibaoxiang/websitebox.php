<?php  
/*
Plugin Name: 网站百宝箱
Description: 置顶, 网页宠物, 哀悼, 禁止复制, 禁止查看源码, 弹幕, WP优化, 在线客服, 留言板, 手机客服, 网站背景, 公告, 跑马灯, 水印, 分享, 打赏, 海报图, 鼠标事件特效。
Version: 0.0.8
Author: 沃之涛科技
Author URI: https://www.rbzzz.com
*/
add_action('wp_footer', 'tagmanage_wztkjbbx');
function tagmanage_wztkjbbx(){
    echo '<script>
    console.log("网站百宝箱插件 作者：沃之涛科技\n官网地址：www.rbzzz.com\n联系QQ：1500351892")
    </script>';
}
if(!defined('ABSPATH'))exit;
// 声明全局变量
global $wpdb;
define('WEBSITEBOX_FILE',__FILE__);
define('WEBSITEBOX_NAME',plugin_basename(__FILE__));
define('WEBSITEBOX_URL','http://wp.seohnzz.com');
define('WEBSITEBOX_SALT','seohnzz.com');
require plugin_dir_path( WEBSITEBOX_FILE ) . 'inc/index.php';
if(!is_admin()){
    require plugin_dir_path( WEBSITEBOX_FILE ) . 'inc/head.php';
    require plugin_dir_path( WEBSITEBOX_FILE ) . 'inc/foot.php';
    new websitebox_head();
    new websitebox_foot();
}
require plugin_dir_path( WEBSITEBOX_FILE ) . 'inc/post.php';
$websitebox_youhua = get_option('websitebox_youhua');
if($websitebox_youhua!==false){
    require plugin_dir_path( WEBSITEBOX_FILE ) . 'inc/youhua.php';
    new websitebox_youhua($websitebox_youhua);
}


websitebox_tongji();

function websitebox_tongji(){
    $websitebox_tongji = get_option('websitebox_tongji');
    if(!$websitebox_tongji || (isset($websitebox_tongji) && $websitebox_tongji['time']<time()) ){
        $wp_version =  get_bloginfo('version');
        $data = websitebox_url();
    	$url = "http://wp.seohnzz.com/api/websitebox/index?url={$data}&type=5&url1=".md5($data.'seohnzz.com')."&theme_version=0.0.8&php_version=".PHP_VERSION."&wp_version={$wp_version}";
    	$defaults = array(
            'timeout' => 120,
            'connecttimeout'=>120,
            'redirection' => 3,
            'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
            'sslverify' => FALSE,
        );
        $result = wp_remote_get($url,$defaults);
        if($websitebox_tongji!==false){
            update_option('websitebox_tongji',['time'=>time()+7*3600*24]);
        }else{
            add_option('websitebox_tongji',['time'=>time()+7*3600*24]);
        }
    }
}
function websitebox_url(){
    $url1 = get_option('siteurl');
    $url1 = str_replace('https://','',$url1);
    $url1 = str_replace('http://','',$url1);
    $url1 = trim($url1,'/');
    return $url1;
}
//授权
function websitebox_paymoney($root){
	$data =  websitebox_url();
	$url = WEBSITEBOX_URL.$root."?url={$data}&type=5&url1=".md5($data.WEBSITEBOX_SALT);
	$defaults = array(
        'timeout' => 120,
        'connecttimeout'=>120,
        'redirection' => 3,
        'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
        'sslverify' => FALSE,
    );
	$result = wp_remote_get($url,$defaults);
	
	if(!is_wp_error($result)){
        $content = wp_remote_retrieve_body($result);
        if($content){
            return $content;
        }else{
            return websitebox_paymoney1();
        }
    	    
	}else{
	    return websitebox_paymoney1();
	}

}
function websitebox_paymoney1(){
    $data =  websitebox_url();
	$url = "https://www.rbzzz.com/api/money/pay_money?url={$data}&type=5&url1=".md5($data.WEBSITEBOX_SALT);
	$defaults = array(
        'timeout' => 120,
        'connecttimeout'=>120,
        'redirection' => 3,
        'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
        'sslverify' => FALSE,
    );
	$result = wp_remote_get($url,$defaults);
	if(!is_wp_error($result)){
        $content = wp_remote_retrieve_body($result);
    	if($content){
    		return $content;
	    }
	}
	
}
$websitebox = new websitebox();



