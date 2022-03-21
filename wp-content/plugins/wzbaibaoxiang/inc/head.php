<?php
class websitebox_head{
    function __construct() {
        add_action( 'wp_enqueue_scripts', [$this,'websitebox_enqueue'] );
        add_action('wp_head',[$this, 'websitebox_headpage']);
        
    }
    public function websitebox_enqueue(){
        wp_enqueue_script("jquery");
        wp_enqueue_style( 'websitebox_index.css',  plugin_dir_url( WEBSITEBOX_FILE ). 'css/websitebox_index.css',false,'','all');
        $websitebox_base = get_option('websitebox_base');
        //网站宠物
        if(isset($websitebox_base['zoo']) && ($websitebox_base['zoo']==1)){
            wp_enqueue_style( 'font-awesome.min.css',  plugin_dir_url( WEBSITEBOX_FILE ).'css/font-awesome.min.css',false,'','all');
            wp_enqueue_script( 'autoload.js', plugin_dir_url( WEBSITEBOX_FILE ).'js/autoload.js', array('jquery'), '', false);
        }
        $websitebox_kefu = get_option('websitebox_kefu');
        $websitebox_liuyan = get_option('websitebox_liuyan');
        if((isset($websitebox_kefu['kefu'])&&$websitebox_kefu['kefu'])||(isset($websitebox_liuyan['auto'])&& $websitebox_liuyan['auto']==1) ){
            wp_enqueue_style( 'layui.css',  plugin_dir_url( WEBSITEBOX_FILE ). 'layui/css/layui.css',false,'','all');
        
            wp_enqueue_script( 'layui.js', plugin_dir_url( WEBSITEBOX_FILE ).'layui/layui.js', array('jquery'), '', false);
            wp_enqueue_script( 'xuanfu5js', plugin_dir_url( WEBSITEBOX_FILE ).'js/xuanfu5.js', array('jquery'), '', false);
        }
         $websitebox_sbtexiao= get_option('websitebox_sbtexiao'); 
        if(isset($websitebox_sbtexiao['sb_texiao']) && $websitebox_sbtexiao['sb_texiao']==1){
            wp_enqueue_script( 'vsclick', plugin_dir_url( WEBSITEBOX_FILE ).'js/vsclick.min.js', array('jquery'), '', false);
        }
        
    }
    public  function websitebox_headpage(){
        // echo '<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">';
        $websitebox_base = get_option('websitebox_base');
        //哀悼色
        if(isset($websitebox_base['grey']) && ($websitebox_base['grey']==1)){
            echo '<style>
    			 body *{
        			-webkit-filter: grayscale(100%); 
        			-moz-filter: grayscale(100%); 
        			-ms-filter: grayscale(100%); 
        			-o-filter: grayscale(100%); 
        			filter: grayscale(100%);
        			filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1); 
        			filter:gray; 
    			} 
    		</style>';
        }
            $websitebox_sitebg = get_option('websitebox_sitebg');
            if(isset($websitebox_sitebg['auto'])&&$websitebox_sitebg['auto']){
                if($websitebox_sitebg['type']==1){
                    echo '<style>
                        body{
                            background:'.$websitebox_sitebg['bg'].';
                        }
                    </style>';
                }elseif($websitebox_sitebg['type']==2){
                    echo '<style>
                        body{
                            background:url('.$websitebox_sitebg['back'].');
                            background-size:100%;
                        }
                    </style>';
                }
            }
        
       
        if(is_single()){
            add_action( 'the_content', [$this,'websitebox_sanheyi']);
        }
    }
    public function websitebox_sanheyi($content){
        wp_enqueue_style( 'share.min.css',  plugin_dir_url( WEBSITEBOX_FILE ). 'css/share.min.css',false,'','all');
        wp_enqueue_style( 'jsmodern-1.1.1.min.css',  plugin_dir_url( WEBSITEBOX_FILE ). 'css/jsmodern-1.1.1.min.css',false,'','all');
        wp_enqueue_script( 'jsmodern-1.1.1.min.js', plugin_dir_url( WEBSITEBOX_FILE ).'js/jsmodern-1.1.1.min.js', array('jquery'), '', false);
       
        $websitebox_sanheyi = get_option('websitebox_sanheyi');
        $str ='';
        $str .='<div class="websitebox_wy">
			<ul>';
			if(isset($websitebox_sanheyi['open']) && $websitebox_sanheyi['open']){
			     wp_enqueue_script( 'qrcode', plugin_dir_url( WEBSITEBOX_FILE ).'layui/qrcode.js', array('jquery'), '', true);
				$str .='<li class="websitebox_haibao">海报</li>';
			}
			if((isset($websitebox_sanheyi['wx']) && $websitebox_sanheyi['wx'])||(isset($websitebox_sanheyi['ali']) && $websitebox_sanheyi['ali'])){
				$str .='<li class="websitebox_dashan">打赏</li>';
			}
			if(isset($websitebox_sanheyi['share']) && $websitebox_sanheyi['share']){
				$str .='<li class="websitebox_fenxiang">分享</li>';
			}
				
		$str .=	'</ul></div>';
		if(isset($websitebox_sanheyi['open']) && $websitebox_sanheyi['open']){
		$str .='<div class="websitebox_box_shy">
			<div class="websitebox_box1">
			    <div class="websitebox_wzt_chahao">
			        <img src="'.plugin_dir_url( WEBSITEBOX_FILE ).'images/wzt_chahao.png">
			    </div>
				<canvas id="myCanvas" width="350" height="350" style=" z-index:999999;width:100%;vertical-align: bottom;border-radius: 5px;background-color: #fff;display:none;"></canvas>
				<canvas id="myCanvaskuan" width="500" height="300" style=" z-index:999999;width:100%;vertical-align: bottom;border-radius: 5px;background-color: #fff;display:none;"></canvas>
				<div id="code" style="display:none"  Canvas.Left="20" Canvas.Top="20"></div>
				<img src="" id="imgshu" style="border-radius:5px;display:none;" class="websitebox_imgshu">
				<img src="" id="imgkuan" style="border-radius:5px;" class="websitebox_imgkuan">
				<div class="websitebox_wenzitishi">海报图正在生成中...</div>
				<div class="websitebox_haibaoxuanze">
				    <a href="javascript:;" class="websitebox_haibaoxuanze_s">竖版</a>
				    <a href="javascript:;" class="websitebox_haibaoxuanze_k">宽版</a>
				</div>
			</div>
		</div>';
		}
	    if(isset($websitebox_sanheyi['share']) && $websitebox_sanheyi['share']){
		$str .='<div class="websitebox_box-1">
			<div class="websitebox_box1-1">
			    <div class="websitebox_wzt_box1-1chahao">
			        <div style="font-size: 16px;">分享到...</div>
			        <img src="'.plugin_dir_url( WEBSITEBOX_FILE ).'images/wzt_chahao.png">
			    </div>
				<div class="websitebox_box2-1">
					<div >
						<div id="bbxshare-11" style="display: flex;justify-content: space-between;"></div>
						<div id="share-qrcode" title="二维码分享"></div> 
            			<div id="share-douban" title="豆瓣分享"></div>
            			<div id="share-qzone" title="QQ空间分享"></div>
            			<div id="share-sina" title="新浪微博分享"></div>
            			<div id="share-qq" title="QQ好友分享"></div>
					</div>
				</div>
			</div>
		</div>';
	    }
		if((isset($websitebox_sanheyi['wx']) && $websitebox_sanheyi['wx'])||(isset($websitebox_sanheyi['ali']) && $websitebox_sanheyi['ali'])){
		$str .='<div class="websitebox_box-2">
			<div class="websitebox_box1-2">
				<div class="websitebox_wzt_box1-2chahao">
			        <div style="font-size: 16px;">请选择打赏方式</div>
			        <img src="'.plugin_dir_url( WEBSITEBOX_FILE ).'images/wzt_chahao.png">
			    </div>
				<div class="websitebox_box2-2">
					<div class="websitebox_box2img">
						<img src="'.$websitebox_sanheyi['wx'].'" alt="" style="display: block;">
						<img src="'.$websitebox_sanheyi['ali'].'" alt="">
					</div>
					<ul class="websitebox_box2ul" style="display: flex;justify-content: center;padding:0;margin: 0;">
						<li class="websitebox_box2ul1">微信</li>
						<li>支付宝</li>
					</ul>
				</div>
			</div>
		</div>';
		}
		$description = strip_tags($content);
		$pattern = '/\s/';//去除空白
        $description = get_the_title();  
	   
	    if(!$description){
	        $description= '';
	    }else{
	       $description = str_replace("/",'',str_replace(']','',str_replace('[','',$description)));
	    }
	    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
	    if(isset($matches[1][0])){
            $first_img = $matches[1][0];
	    }else{
	         $first_img = '';
	    }
        
		$str .='<script>
		 jQuery(document).ready(function($){
		    if($(".websitebox_wy>ul>li").length = 0) {
		        console.log(11)
		        $(".websitebox_wy").css("display","none")
		    }
			$(".websitebox_haibao").click(function(){
				$(".websitebox_box_shy").toggle()
			})
			$(".websitebox_box1>.websitebox_wzt_chahao").click(function(){
				$(".websitebox_box_shy").css("display","none")
			})
			$(".websitebox_fenxiang").click(function(){
				$(".websitebox_box-1").toggle()
			})
			$(".websitebox_box1-1>.websitebox_wzt_box1-1chahao>img").click(function(){
				$(".websitebox_box-1").css("display","none")
			})
			
			$(".websitebox_dashan").click(function(){
				console.log(111)
				$(".websitebox_box-2").toggle()
			})
			$(".websitebox_box1-2>.websitebox_wzt_box1-2chahao>img").click(function(){
				$(".websitebox_box-2").css("display","none")
			})
			$(".websitebox_box2ul li").click(function(){
				// Var i=$(this).index;
				$(this).addClass("websitebox_box2ul1").siblings("li").removeClass("websitebox_box2ul1")
				$(".websitebox_box2img>img").hide().eq($(this).index()).show();
			})
// 			$("#bbxshare-11").share();
            jsModern.share({
			    qrcode: "#share-qrcode",
			    douban: "#share-douban",
			    qzone: "#share-qzone",
			    sina: "#share-sina",
			    qq: "#share-qq"
			});  
			$(".websitebox_haibaoxuanze_k").click(function() {
			    $(".websitebox_box1").css({"width":"500px","min-height":"340px"})
			    $(".websitebox_imgshu").css("display","none")
			    $(".websitebox_imgkuan").css("display","block")
			    $(this).css({"color":"#fff","background-color":"#0066cc"}).siblings().css({"color":"#0066cc","background-color":"#fff"})
			})
			$(".websitebox_haibaoxuanze_s").click(function() {
			    $(".websitebox_box1").css({"width":"350px","min-height":"394px"})
			    $(".websitebox_imgshu").css("display","block")
			    $(".websitebox_imgkuan").css("display","none")
			    $(this).css({"color":"#fff","background-color":"#0066cc"}).siblings().css({"color":"#0066cc","background-color":"#fff"})
			})
		   })
		</script>';
        if(isset($websitebox_sanheyi['open']) && $websitebox_sanheyi['open']){
		$str .='<script>
		jQuery(document).ready(function($){
	    	  window.onload=function(){
    		    var qrcode = new QRCode(document.getElementById("code"), {
            	     width : 201,
            	     height : 201
            	})
            	var url = location.href
            	qrcode.makeCode(url.replace("invitation","main"))
            	var type="image/png";
            	var src = $("#code").find("canvas").get(0).toDataURL(type).replace("image/png", "image/octet-stream");
	            var c=document.getElementById("myCanvas");
	            var d=document.getElementById("myCanvaskuan");
				var ctxh = c.getContext("2d");
				var ctxhk = d.getContext("2d");
                ctxh.fillStyle="#fff";
                ctxh.fillRect(0,0,350,450);
                ctxhk.fillStyle="#fff";
                ctxhk.fillRect(0,0,350,450);
		        var imgObj = new Image();
				var imgObj1 = new Image();
				var row = "'.$description.'";
		        imgObj.src = "'.$first_img.'";
		        imgObj.onload = function(){
		               ctxh.drawImage(this, 20,20,310,190);
		               ctxhk.drawImage(this, 0,0,500,300);
		        }
                for(var b = 0; b < Math.ceil(row.length/24); b++){
                    ctxh.fillStyle="#111";
					ctxh.font="14px Arial";
					ctxh.fillText(row.substr(b*24,24),20,220+(b+1)*15,310);
					ctxhk.fillText(row.substr(b*24,24),20,220+(b+1)*15,100);
				}
				
				var wztbbx_wenzi = setInterval(function() {
				    ctxh.font="14px Arial";
			    	ctxh.fillStyle="#111";
				    ctxh.fillText("'.get_option('siteurl').'",110,270);
				    ctxhk.fillText("'.get_option('siteurl').'",110,225);
				    ctxh.fillStyle="#111";
				    ctxh.fillText("长按即可保存图片",110,305);
				    ctxhk.fillText("长按即可保存图片",110,260);
				    clearInterval(wztbbx_wenzi)
				},1000)
				
				imgObj1.src =src;
				imgObj1.shadowColor = "rgba(100, 100, 100, 0.5)";
				imgObj1.onload = function(){
				    ctxh.save(); 
				    ctxh.drawImage(this, 20,250,80,80);
				    ctxhk.drawImage(this, 20,200,80,80);
				}

		        var wztbbx_int= setInterval(function() {
		            var src2 = c.toDataURL(type)
		            var src3 = d.toDataURL(type)
    		        $("#imgshu").attr("src",src2)
    		        $("#imgkuan").attr("src",src3)
    		        $(".websitebox_wenzitishi").css("display","none")
    		        $(".websitebox_haibaoxuanze").css("display","block")
    		        $(".websitebox_haibaoxuanze_k").click()
    		        clearInterval(wztbbx_int)
		        },2000);
	    	}
		})
		</script>
        ';
        }
		return $content.$str;
    }
}