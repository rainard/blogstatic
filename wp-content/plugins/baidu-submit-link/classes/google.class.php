<?php

/**
 * google indexing api
 *
 */

class WB_BSL_Google
{

    public static function init(){

        //add_action('edit_post',array(__CLASS__,'bsl_edit_post'),91,2);
        add_action('wp_insert_post',array(__CLASS__,'bsl_edit_post'),91,2);
        add_action('wb_push_post',array(__CLASS__,'bsl_edit_post'),91,2);
        add_action('wp_trash_post',array(__CLASS__,'bsl_trash_post'),91);
    }
    public static function bsl_trash_post($post_id)
    {

        if(!get_option('wb_bsl_ver',0)){
            return;
        }

        static $post_ids = array();
        do {
            if (isset($post_ids[$post_id])) return;
            $post_ids[$post_id] = 1;

            $active = WB_BSL_Conf::cnf('google');
            if(!$active){
                break;
            }
            $api_key = WB_BSL_Conf::cnf('google_key');
            if(!$api_key){
                break;
            }
            $post = get_post($post_id);
            if($post->post_status != 'publish'){
                break;
            }

            $type = 31;//30=>google update,31=>google delete
            $log = WB_BSL_Utils::push_log($post_id, $type);

            if($log && current_time('timestamp') - strtotime($log->create_date) < 300){
                break;
            }

            $post_url = get_permalink($post_id);
            if(!preg_match('#^https?://#',$post_url)){
                $post_url = home_url($post_url);
            }

            WB_BSL_Utils::run_log('Google删除推送，推送url：','收录推送');
            WB_BSL_Utils::run_log($post_url,'收录推送');
            $ret = self::push_url($post_url,'URL_DELETED');
            WB_BSL_Utils::run_log('推送结果【'.$ret['desc'].'】','收录推送');

            WB_BSL_Utils::add_push_log($type,$post_id,$post_url,$ret);


        }while(0);

    }

    public static function bsl_edit_post($post_id,$post){

        if(wp_is_post_revision($post)){
            return;
        }
        if(!get_option('wb_bsl_ver',0)){
            return;
        }

        static $post_ids = array();
        do{
            if(isset($post_ids[$post_id]))return;
            $post_ids[$post_id] = 1;
            $active = WB_BSL_Conf::cnf('google');
            if(!$active){
                break;
            }
            $api_key = WB_BSL_Conf::cnf('google_key');
            if(!$api_key){
                break;
            }

            if(!WB_BSL_Conf::check_post_type($post)){
                break;
            }

            $msg = array();

            $type = 30;//30=>google update,31=>google delete
            $log = WB_BSL_Utils::push_log($post_id,$type);
            if($log && current_time('timestamp') - strtotime($log->create_date) < 300){
                break;
            }

            $post_url = get_permalink($post);
            if(!preg_match('#^https?://#',$post_url)){
                $post_url = home_url($post_url);
            }

            WB_BSL_Utils::run_log('Google更新推送，推送url：','收录推送');
            WB_BSL_Utils::run_log($post_url,'收录推送');
            $ret = self::push_url($post_url, 'URL_UPDATED');
            WB_BSL_Utils::run_log('推送结果【'.$ret['desc'].'】','收录推送');

            WB_BSL_Utils::add_push_log($type,$post_id,$post_url,$ret);


        }while(false);
    }

    public static function push_url($url,$type = 'URL_UPDATED')
    {
        $obj = new self();
        $ret = $obj->indexing($url, $type);
        if($ret){
            return ['desc'=>'success','code'=>0];
        }
        return ['desc'=>'fail','code'=>1];
    }

    public function txt_log($msg){
        WB_BSL_Utils::run_log($msg,'收录推送');
    }

    public function assertion()
    {
        $api_key = WB_BSL_Conf::cnf('google_key');
        $conf = json_decode( $api_key, true );
        if(!$conf || !is_array($conf)){
            $this->txt_log('Google推送配置无效[1]');
            return false;
        }
        if(!isset($conf['client_email']) || !isset($conf['private_key'])){
            $this->txt_log('Google推送配置无效[2]');
            return false;
        }
        if(!($conf['client_email']) || !($conf['private_key'])){
            $this->txt_log('Google推送配置无效[3]');
            return false;
        }

        /*const DEFAULT_EXPIRY_SECONDS = 3600; // 1 hour
        const DEFAULT_SKEW_SECONDS = 60; // 1 minute
        const JWT_URN = 'urn:ietf:params:oauth:grant-type:jwt-bearer';*/
        $time = time();//current_time('U');
        $assertion  = [
            'iss' => $conf['client_email'],
            'exp' => $time + 3600,
            'iat' => $time - 60,
            'aud' => 'https://oauth2.googleapis.com/token',
            'scope' => 'https://www.googleapis.com/auth/indexing',
        ];
        return $this->encode($assertion,$conf['private_key']);
    }

    public function sign($msg, $key)
    {
        $signature = '';
        $success = openssl_sign($msg, $signature, $key, 'SHA256');
        if(!$success){
            $this->txt_log('Google推送sign data fail');
            return false;
        }
        return $signature;
    }


    public function urlEncode($input)
    {
        return str_replace('=', '', strtr(base64_encode($input), '+/', '-_'));
    }

    public function encode($payload, $key, $alg = 'RS256')
    {
        $header = array('typ' => 'JWT', 'alg' => $alg);
        $segments = array();
        $segments[] = $this->urlEncode(json_encode($header));
        $segments[] = $this->urlEncode(json_encode($payload));
        $signing_input = implode('.', $segments);
        $signature = $this->sign($signing_input, $key);
        $segments[] = $this->urlEncode($signature);
        return implode('.', $segments);
    }

    public function token()
    {
        do{
            $cache = get_option('bsl_google_jwt_token');
            if(!$cache || !is_array($cache)){
                break;
            }
            if(!isset($cache['access_token']) || !isset($cache['expires_in'])){
                break;
            }
            if(!$cache['access_token'] || !$cache['expires_in']){
                break;
            }
            if(time() > $cache['expires_in']){
                break;
            }
            return $cache['access_token'];
        }while(0);

        $param = [
            'timeout'=>5,
            'sslverify'=>false,
            'body'=>[
                'grant_type'=>'urn:ietf:params:oauth:grant-type:jwt-bearer',
                'assertion' => $this->assertion(),
            ]
        ];
        //$api_host = 'oauth2.googleapis.com';
        $api_host = 'oauth2.googleapis.picpapa.com';
        $auth_api = 'https://'.$api_host.'/token';
        $http = wp_remote_post($auth_api,$param);
        if(is_wp_error($http)){
            //print_r([]);
            $this->txt_log('Google推送获取token失败。错误信息:');
            $this->txt_log($http->get_error_message());
            return false;
        }

        $body = wp_remote_retrieve_body($http);

        $content_type = wp_remote_retrieve_header($http,'content-type');
        $data = [];
        if(preg_match('#application/json#i',$content_type)){
            $data = json_decode($body,true);
        }else if(preg_match('#application/x-www-form-urlencoded#i',$content_type)){
            $data = [];
            parse_str($body, $data);
        }
        if(empty($data)){
            $this->txt_log('Google推送失败,token为空[1]');
            return false;
        }
        if(!isset($data['access_token']) || empty($data['access_token'])){
            $this->txt_log('Google推送失败,token为空[2]');
            return false;
        }
        if(!isset($data['expires_in']) || !$data['expires_in']){
            $data['expires_in'] = 3000;
        }
        $cache = $data;
        $cache['expires_in'] = time() + (int)$cache['expires_in'];
        update_option('bsl_google_jwt_token',$cache,false);
        return $cache['access_token'];
    }

    public function indexing($url,$type = 'URL_UPDATED')
    {

        //$types = ['URL_DELETED','URL_UPDATED'];
        $token = $this->token();
        if(!$token){
            return false;
        }
        //
        //$api_host = 'indexing.googleapis.com';
        $api_host = 'indexing.googleapis.picpapa.com';
        $api = 'https://'.$api_host.'/v3/urlNotifications:publish';
        $param = [
            'timeout'=>5,
            'sslverify'=>false,
            'headers' =>[
                'content-type' => 'application/json',
                'authorization' => 'Bearer '.$token,
            ],
            'body'=>json_encode([
                'url'=>$url,
                'type' => $type,
            ])
        ];
        $http = wp_remote_post($api,$param);
        if(is_wp_error($http)){
            //print_r([$http->get_error_message()]);
            $this->txt_log('Google推送失败。错误信息:');
            $this->txt_log($http->get_error_message());
            return false;
        }
        $body = wp_remote_retrieve_body($http);
        if(empty($body)){
            $this->txt_log('Google推送失败。响应为空');
            return false;
        }
        $content_type = wp_remote_retrieve_header($http,'content-type');
        $data = [];
        if(preg_match('#application/json#i',$content_type)){
            $data = json_decode($body,true);
        }else if(preg_match('#application/x-www-form-urlencoded#i',$content_type)){
            $data = [];
            parse_str($body, $data);
        }
        if(empty($data)){
            $this->txt_log('Google推送失败。数据解析为空');
            return false;
        }
        if(isset($data['error'])){
            $this->txt_log('Google推送失败,原因:');
            $this->txt_log($data['error']['message']);
            return false;
        }

        return true;
    }


}