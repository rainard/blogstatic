<?php

/**
 * 百度搜索资源推送
 * Class WB_BSL_Site
 */

class WB_BSL_Site
{
    public static function init(){


        add_action('wp_head',array(__CLASS__,'wp_head'),100);

        //add_action('edit_post',array(__CLASS__,'bsl_edit_post'),91,2);
        add_action('wp_insert_post',array(__CLASS__,'bsl_edit_post'),91,2);
        add_action('wb_push_post',array(__CLASS__,'bsl_edit_post'),91,2);

    }

    public static function baidu_manual_push($post_id)
    {
        $ret = ['code'=>1,'desc'=>'fail'];
        if(!is_array($post_id)){
            $ret['desc'] = 'param error';
            return $ret;
        }
        $pc_active = WB_BSL_Conf::cnf('pc_active2');
        if(!$pc_active){
            $ret['desc'] = 'config error 1';
            return $ret;
        }
        $token = WB_BSL_Conf::cnf('token');
        if(!$token){
            $ret['desc'] = 'config error 2';
            return $ret;
        }
        foreach($post_id as $id){
            $id = intval($id);
            if(!$id){
                continue;
            }
            $post = get_post($id);
            if(!WB_BSL_Conf::check_post_type($post)){
                continue;
            }
            $post_url = get_permalink($post);
            if(!preg_match('#^https?://#',$post_url)){
                $post_url = home_url($post_url);
            }
            $url = array(
                $post_url,
            );
            $type = 3;
            //WB_BSL_Utils::run_log('普通收录，推送url：','收录推送');
            //WB_BSL_Utils::run_log($post_url,'收录推送');
            $push_ret = WB_BSL_Baidu::pc_push($url,$type);
            //WB_BSL_Utils::run_log('推送结果【'.$ret['desc'].'】','收录推送');

            WB_BSL_Utils::add_push_log($type,$id,$post_url,$push_ret);
        }
        $ret['code'] = 0;
        $ret['desc'] = 'success';

        return $ret;
    }


    public static function bsl_edit_post($post_id,$post){


        //static $post_ids = array();

        if(wp_is_post_revision($post)){
            return;
        }

        if(!WB_BSL_Conf::check_post_type($post)){
            return;
        }

        do{
            /*if(isset($post_ids[$post_id]))return;
            $post_ids[$post_id] = 1;*/

            $pc_active = WB_BSL_Conf::cnf('pc_active');
            if(!$pc_active){
                break;
            }
            $token = WB_BSL_Conf::cnf('token');
            if(!$token){
                break;
            }


            $type = 1;
            $log = WB_BSL_Utils::push_log($post_id,$type);
            if($log && $log->push_status == 1){
                break;
            }

            if($log && current_time('timestamp') - strtotime($log->create_date) < 300){
                break;
            }
            $log = WB_BSL_Utils::push_log($post_id,2);
            if($log && $log->push_status == 1){
                break;
            }

            $post_url = get_permalink($post);
            if(!preg_match('#^https?://#',$post_url)){
                $post_url = home_url($post_url);
            }
            $url = array(
                $post_url,
            );
            WB_BSL_Utils::run_log('普通收录，推送url：','收录推送');
            WB_BSL_Utils::run_log($post_url,'收录推送');
            $ret = WB_BSL_Baidu::pc_push($url,1);
            WB_BSL_Utils::run_log('推送结果【'.$ret['desc'].'】','收录推送');

            WB_BSL_Utils::add_push_log($type,$post_id,$post_url,$ret);


        }while(false);


        do{
            /*if(isset($post_ids[$post_id]))return;
            $post_ids[$post_id] = 1;*/


            $api = WB_BSL_Conf::cnf('sm_api');
            if(!$api){
                break;
            }


            $type = 21;
            $log = WB_BSL_Utils::push_log($post_id,$type);
            if($log && $log->push_status == 1){
                break;
            }
            if($log && current_time('timestamp') - strtotime($log->create_date) < 300){
                break;
            }

            $post_url = get_permalink($post);
            if(!preg_match('#^https?://#',$post_url)){
                $post_url = home_url($post_url);
            }
            $url = array(
                $post_url,
            );
            WB_BSL_Utils::run_log('神马收录，推送url：','收录推送');
            WB_BSL_Utils::run_log($post_url,'收录推送');
            $ret = self::sm_push($api,$url);
            WB_BSL_Utils::run_log('推送结果【'.$ret['desc'].'】','收录推送');

            WB_BSL_Utils::add_push_log($type,$post_id,$post_url,$ret);


        }while(false);

    }


    public static function wp_head(){

        $is_baidu = 0;
        $is_360 = 1;
        $is_byte = 1;

        if(!is_single())return;
        $post = get_post();
        if(!$post){
            return;
        }
        if($post->post_status != 'publish'){
            return;
        }
        if(!WB_BSL_Conf::check_post_type($post)){
            return;
        }
        add_action('wp_footer',array(__CLASS__,'wp_footer'),500);

        if($is_baidu){
            wp_enqueue_script('wb-baidu-push',plugin_dir_url(BSL_BASE_FILE).'assets/baidu_push.js',array(),null,true);

            $type = 4;
            $log = WB_BSL_Utils::push_log($post->ID,$type);

            $ymd = current_time('Y-m-d');
            if($log && preg_match('#'.$ymd.'#',$log->create_date)){
                return;
            }
            WB_BSL_Utils::add_push_log($type,$post->ID,get_permalink($post),array('code'=>0,'desc'=>null));
        }

        if($is_360 && $js = WB_BSL_Conf::cnf('qhjs')){
            $type = 20;
            $log = WB_BSL_Utils::push_log($post->ID,$type);
            $ymd = current_time('Y-m-d');
            if($log && preg_match('#'.$ymd.'#',$log->create_date)){
                return;
            }
            WB_BSL_Utils::add_push_log($type,$post->ID,get_permalink($post),array('code'=>0,'desc'=>null));
        }


        if($is_byte && $js = WB_BSL_Conf::cnf('byte_js')){

            $type = 22;
            $log = WB_BSL_Utils::push_log($post->ID,$type);

            $ymd = current_time('Y-m-d');
            if($log && preg_match('#'.$ymd.'#',$log->create_date)){
                return;
            }
            WB_BSL_Utils::add_push_log($type,$post->ID,get_permalink($post),array('code'=>0,'desc'=>null));
        }

    }

    public static function wp_footer(){
        do{
            $js =  WB_BSL_Conf::cnf('qhjs');
            if(empty($js)){
                break;
            }
            $batch = WB_BSL_Conf::cnf('qh_batch');
            if(get_option('wb_bsl_ver',0) && $batch && preg_match('#\.js\?([a-z0-9]+)"#s',$js,$match)){
                echo "<script>var qhcode = '".$match[1]."';</script>".PHP_EOL;
                echo '<script src="'.plugin_dir_url(BSL_BASE_FILE).'assets/360.js?v=1.1"></script>'.PHP_EOL;
            }else{
                if(!preg_match('#<script#i',$js)){
                    $js = '<script>'.$js.'</script>'.PHP_EOL;
                }
                echo $js;

            }
        }while(0);

        do{
            $js =  WB_BSL_Conf::cnf('byte_js');
            if(empty($js)){
                break;
            }
            if(!preg_match('#<script#i',$js)){
                $js = '<script>'.$js.'</script>'.PHP_EOL;
            }
            echo $js;

            $batch = WB_BSL_Conf::cnf('byte_batch');
            if(get_option('wb_bsl_ver',0) && $batch){
                echo '<script src="'.plugin_dir_url(BSL_BASE_FILE).'assets/toutiao.js?v=1.0"></script>'.PHP_EOL;
            }
        }while(0);

    }

    public static function sm_push($api,$url)
    {

        $param = array(
            'body'=>$url
        );
        $http = wp_remote_post($api,$param);
        if(is_wp_error($http)){
            return ['code'=>1,'desc'=>'API请求错误。'.$http->get_error_message()];
        }
        $body = wp_remote_retrieve_body($http);
        $ret = json_decode($body,true);
        if($ret && isset($ret['returnCode'])){
            if($ret['returnCode']=='200'){
                return ['code'=>0,'desc'=>'success'];
            }
            $error = ['201'=>'token不合法','202'=>'当日流量已用完','400'=>'请求参数有误','500'=>'服务器内部错误'];
            return ['code'=>1,'desc'=>isset($error[$ret['returnCode']])?$error[$ret['returnCode']]:'code['.$ret['returnCode'].']','msg'=>$ret['errorMsg']];
        }

        return ['code'=>1,'desc'=>'API返回失败'];
    }
}