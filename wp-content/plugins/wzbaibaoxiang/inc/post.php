<?php
class websitebox_post{
    const data =[];
    function __construct($data) {
        $this->data = $data;
    }
    public function post(){
        $pay = websitebox_paymoney('/api/index/pay_money');
        
        if(!$pay){
            echo wp_json_encode(['msg'=>3]);exit;
        }
        $data = $this->data;
        if(isset($data['nonce']) && isset($data['action']) && wp_verify_nonce($data['nonce'],$data['action'])){
            
            switch($data['websitebox']){
                case 1:
                    $list = [];
                    $list['zoo'] =$data['zoo']; 
                    $list['grey'] =$data['grey'];
                    $list['copy'] =$data['copy']; 
                    $list['look'] =$data['look']; 
                    $list['barrage'] =$data['barrage']; 
                    $list['art_cron'] = $data['art_cron'];
                    
                    $get = get_option('websitebox_base');
                    if(!$get){
                        add_option('websitebox_base',$list);
                    }else{
                        update_option('websitebox_base',$list);
                    }
                    echo wp_json_encode(['msg'=>1]);exit;
                    break;
                case 2:
                    
                    $list = [];
                    $list['kefu'] = $data['kefu'];
                    $list['type'] = (int)$data['type'];
                    $list['bg'] = sanitize_text_field($data['bg']);
                    $list['icon'] = sanitize_text_field($data['icon']);
                    $get = get_option('websitebox_kefu');
                    if($get===false){
                        add_option('websitebox_kefu',$list);
                    }else{
                        update_option('websitebox_kefu',$list);
                    }
                    $list1 = [];
                    $list1['phone'] = sanitize_text_field($data['phone']);
                    $list1['cls'] = sanitize_text_field($data['phone_cls']);
                    $get1 = get_option('websitebox_phone');
                    if($get1===false){
                        add_option('websitebox_phone',$list1);
                    }else{
                        update_option('websitebox_phone',$list1);
                    }
                    $list2 = [];
                    $list2['qq'] = sanitize_text_field($data['qq']);
                    
                    $list2['cls'] = sanitize_text_field($data['qq_cls']);
                    $get2 = get_option('websitebox_qq');
                    if($get2===false){
                        add_option('websitebox_qq',$list2);
                    }else{
                        update_option('websitebox_qq',$list2);
                    }
                    $list3 = [];
                    $list3['qrcode'] = sanitize_url($data['qrcode']);
                   
                    $list3['cls'] = sanitize_text_field($data['qrcode_cls']);
                    $get3 = get_option('websitebox_qrcode');
                    if($get3===false){
                        add_option('websitebox_qrcode',$list3);
                    }else{
                        update_option('websitebox_qrcode',$list3);
                    }
                     $list4 = [];
                    $list4['mail'] = sanitize_text_field($data['mail']);
                    
                    $list4['cls'] = sanitize_text_field($data['mail_cls']);
                    $get4 = get_option('websitebox_mail');
                    if($get4===false){
                        add_option('websitebox_mail',$list4);
                    }else{
                        update_option('websitebox_mail',$list4);
                    }
                    
                    $list5 = [];
                    $list5['qqqun'] = sanitize_text_field($data['qqqun']);
                    $list5['cls'] = sanitize_text_field($data['qqqun_cls']);
                   
                    $get5 = get_option('websitebox_qqqun');
                    if($get5===false){
                        add_option('websitebox_qqqun',$list5);
                    }else{
                        update_option('websitebox_qqqun',$list5);
                    }
                    $list6 = [];
                    $list6['wb'] = sanitize_text_field($data['wb']);
                    $list6['cls'] = sanitize_text_field($data['wb_cls']);
                    $get6 = get_option('websitebox_wb');
                    if($get6===false){
                        add_option('websitebox_wb',$list6);
                    }else{
                        update_option('websitebox_wb',$list6);
                    }
                    echo wp_json_encode(['msg'=>1]);exit;
                    break;
                case 4:
                    $list = [];
                    
                    $list['auto'] = $data['auto'];
                    $list['color'] = sanitize_text_field($data['color']);
                    $list['title'] = sanitize_text_field($data['title']);
                    $get = get_option('websitebox_liuyan');
                    if(!$get){
                        add_option('websitebox_liuyan',$list);
                    }else{
                        update_option('websitebox_liuyan',$list);
                    }
                    echo wp_json_encode(['msg'=>1]);exit;
                    break;
                case 5:
                    $list = [];
                    $list['auto'] = $data['auto'];
                    $list['mobile_auto'] = $data['mobile_auto'];
                    $list['type'] = (int)$data['type'];
                    $list['bg'] = sanitize_text_field($data['bg']);
                    $list['back'] = sanitize_url($data['back']);
                    $list['texiao'] = (int)$data['texiao'];
                    $get = get_option('websitebox_sitebg');
                    if(!$get){
                        add_option('websitebox_sitebg',$list);
                    }else{
                        update_option('websitebox_sitebg',$list);
                    }
                    echo json_encode(['msg'=>1]);exit;
                    break;
                case 6:
                    $list = [];
                    $list['auto'] = $data['auto'];
                    $list['pic_auto'] = $data['pic_auto'];
                    $list['pic'] = $data['pic'];
                    $list['title'] = sanitize_text_field($data['title']);
                    $list['bg'] = sanitize_text_field($data['bg']);
                    $list['word'] = sanitize_text_field($data['word']);
                    $list['content'] = sanitize_textarea_field($data['content']);
                    $list['content_color'] = sanitize_text_field($data['content_color']);
                    $get = get_option('websitebox_alert');
                    if(!$get){
                        add_option('websitebox_alert',$list);
                    }else{
                        update_option('websitebox_alert',$list);
                    }
                    echo wp_json_encode(['msg'=>1]);exit;
                    break;
                case 7:
                    $list = [];
                     $list['auto'] = $data['auto'];
                    $list['bg'] = sanitize_text_field($data['bg']);
                    $list['word'] = sanitize_text_field($data['word']);
                    $list['content'] = sanitize_textarea_field($data['content']);
                     $list['speed'] = (int)$data['speed'];
                    $get = get_option('websitebox_scroll');
                    if(!$get){
                        add_option('websitebox_scroll',$list);
                    }else{
                        update_option('websitebox_scroll',$list);
                    }
                    echo wp_json_encode(['msg'=>1]);exit;
                    break;
                case 10:
                    $list = [];
                     $list['auto'] = $data['auto'];
                    $list['title'] = sanitize_text_field($data['title']);
                    $list['word'] = sanitize_text_field($data['word']);
                    $list['size'] = (int)$data['size'];
                    $list['type'] = (int)$data['type'];
                    $get = get_option('websitebox_shuiyin');
                    if(!$get){
                        add_option('websitebox_shuiyin',$list);
                    }else{
                        update_option('websitebox_shuiyin',$list);
                    }
                    echo wp_json_encode(['msg'=>1]);exit;
                    break;
                case 11:
                    $list = [];
                   
                    $list['share'] = $data['share'];
                    $list['open'] = $data['open'];
                    $list['wx'] = sanitize_url($data['wx']);
                    $list['ali'] = sanitize_url($data['ali']);
                    $get = get_option('websitebox_sanheyi');
                    if(!$get){
                        add_option('websitebox_sanheyi',$list);
                    }else{
                        update_option('websitebox_sanheyi',$list);
                    }
                    echo wp_json_encode(['msg'=>1]);exit;
                    break;
                case 15:
                    global $wpdb;
                    $content = sanitize_textarea_field($data['content']);
                    $res = $wpdb->insert($wpdb->prefix."websitebox_liuyan",['content'=>$content]);
                    
                    if($res){
                        echo wp_json_encode(['msg'=>1]);exit;
                    }else{
                        echo wp_json_encode(['msg'=>0]);exit;
                    }
                    break;
                case 16:
                    global $wpdb;
                    $id = (int)$data['id'];
                    $wpdb->query($wpdb->prepare("DELETE FROM " . $wpdb->prefix . "websitebox_liuyan where id=  %d",$id));
                    echo wp_json_encode(['msg'=>1]);exit;
                    break;
                case 17:
                    $list = [];
                    $list['auto'] = $data['auto'];
                    $list['phone'] = sanitize_text_field($data['phone']);
                    $list['kefuicon'] = sanitize_text_field($data['kefuicon']);
                    $get = get_option('websitebox_shoujikefu');
                    if(!$get){
                        add_option('websitebox_shoujikefu',$list);
                    }else{
                        update_option('websitebox_shoujikefu',$list);
                    }
                    echo wp_json_encode(['msg'=>1]);exit;
                    break;
                case 18:
                    $list = [];
                    $list['fengge'] = (int)$data['fengge'];
                    $list['nav'] = (int)$data['nav'];
                    $list['title'] = sanitize_text_field($data['title']);
                    $list['sb_gaodu'] = (int)$data['sb_gaodu'];
                    $list['sb_kuandu'] = (int)$data['sb_kuandu'];
                    $list['sb_shixu'] = (int)$data['sb_shixu'];
                    $list['sb_texiao'] = (int)$data['sb_texiao'];
                    $list['sb_tantiao'] = (int)$data['sb_tantiao'];
                    $list['sb_huadong'] = (int)$data['sb_huadong'];
                    $list['sb_touming'] = (int)$data['sb_touming'];
                    $get = get_option('websitebox_sbtexiao');
                    if(!$get){
                        add_option('websitebox_sbtexiao',$list);
                    }else{
                        update_option('websitebox_sbtexiao',$list);
                    }
                    echo wp_json_encode(['msg'=>1]);exit;
                    break;
                case 19:
                    $list = [];
                    $list['thumb'] = (int)$data['thumb'];
                    $list['head_dy'] = (int)$data['head_dy'];
                    $list['xml_rpc'] = (int)$data['xml_rpc'];
                    $list['feed'] = (int)$data['feed'];
                    $list['post_thumb'] = (int)$data['post_thumb'];
                    $list['gravatar'] = (int)$data['gravatar'];
                    $list['lan'] = (int)$data['lan'];
                    $get = get_option('websitebox_youhua');
                    if(!$get){
                        add_option('websitebox_youhua',$list);
                    }else{
                        update_option('websitebox_youhua',$list);
                    }
                    echo wp_json_encode(['msg'=>1]);exit;
                    break;
                case 20:
                    $key = sanitize_text_field($_POST['website_key']);
                    $data =  websitebox_url();
                    $url1 = sanitize_text_field($_SERVER['SERVER_NAME']);
                    $url = 'https://www.rbzzz.com/api/money/log2?url='.$data.'&url1=111&key='.$key;
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
                            $baiduseo_wzt_log = get_option('website_key');
                            if($baiduseo_wzt_log!==false){
                    	        update_option('website_key',$key);
                    	    }else{
                    	        add_option('website_key',$key);
                    	    }
                            echo wp_json_encode(['status'=>1]);exit;
                        }
                	}
                	echo wp_json_encode(['status'=>0]);exit;
                    break;
                
                
            }
        }
    }
}
?>