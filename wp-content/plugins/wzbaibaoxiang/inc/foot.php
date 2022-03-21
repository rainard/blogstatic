<?php
class websitebox_foot{
    function __construct() {
        add_action('wp_footer',[$this, 'websitebox_footpage']);
    }
    public  function websitebox_footpage(){
        $websitebox_base = get_option('websitebox_base');
        //禁止复制
        if(isset($websitebox_base['copy']) && ($websitebox_base['copy']==1)){
            echo '
                <script language="Javascript">  
                document.oncontextmenu=new Function("event.returnValue=false");  
                document.onselectstart=new Function("event.returnValue=false");  
                </script>';   
        }
        //禁止查看源码
        if(isset($websitebox_base['look']) && ($websitebox_base['look']==1)){
            echo '<script>
                document.oncontextmenu = function () {
                     return false; 
                    }; 
                        document.onkeydown = function () { 
                            if (window.event && window.event.keyCode == 123) { 
                                event.keyCode = 0; 
                                event.returnValue = false; 
                                return false; 
                            } 
                    };
            </script>';
        }
        //评论弹幕只在内页显示
        if(is_single()){
            if(isset($websitebox_base['barrage']) && ($websitebox_base['barrage']==1)){
                    global $post;
                    $content = get_comments('status=approve&type=comment&post_id='.$post->ID);
                    $comment_content = [];
                    foreach($content as $key=>$val){
                        $comment_content[$key]['text'] = $val->comment_content;
                    }
                    
                    $str = '';
                    wp_enqueue_script( 'websitebox_new', plugin_dir_url( WEBSITEBOX_FILE ).'js/websitebox_new.js', array('jquery'), '', true);
                    $str .= '
                               <style type="text/css">
                                    /*组件主样式*/
                                    
                                    .overflow-text {
                                        display: block;
                                        white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        opacity: 0;
                                        clear: both;
                                        padding: 0 10px;
                                        border-radius: 10px;
                                        box-sizing: border-box;
                                        max-width: 100%;
                                        color: #fff;
                                        animation: colorchange 3s infinite alternate;
                                        -webkit-animation: colorchange 3s infinite alternate;
                                        /*Safari and Chrome*/
                                    }
                                    
                                    @keyframes colorchange {
                                        0% {
                                            color: red;
                                        }
                                        50% {
                                            color: green;
                                        }
                                        100% {
                                            color: #6993f9;
                                        }
                                    }
                                </style>
                           
                            <script>
                            jQuery(document).ready(function($){
                                window.onload = function(){
                                    // 数据初始化
                                    var bodys = document.getElementsByTagName("body");
                                    var Obj = $("body").barrage({
                                        data: '.json_encode($comment_content).', //数据列表
                                        row: '.count($comment_content).', //显示行数
                                        time: 2500, //间隔时间
                                        gap: 20, //每一个的间隙
                                        position: "fixed", //绝对定位
                                        direction: "bottom right", //方向
                                        ismoseoverclose: true, //悬浮是否停止
                                        height: 30, //设置单个div的高度
                                    })
                                    Obj.start();
                                
                                    $("#open").click(function() {
                                        Obj.start();
                                    })
                                    $("#stop").click(function() {
                                        Obj.close();
                                    })
                                }
                            })
                            </script>
                            ';
    		        echo $str;
            }
        }
        //留言
            $websitebox_liuyan = get_option('websitebox_liuyan');
            if(isset($websitebox_liuyan['auto']) && $websitebox_liuyan['auto']==1){
                echo '
                    <div class="websitebox_cebian4" id="websitebox_cebian4">
                    
            		  <h3 style="background:'.$websitebox_liuyan['color'].'">'.$websitebox_liuyan['title'].' <span class="websitebox_j1">+</span><span class="websitebox_j2">—</span></h3>
            		  <div class="websitebox_cebian4-1">
            		    <textarea id="websitebox_contently" name="websitebox_content" placeholder="请写下您的评价，对他人的帮助很大哦"></textarea>
            		  </div>
            		  <div class="websitebox_cebian4-2">
            			  <a href="javascript:;" class="websitebox_fasong" style="background:'.$websitebox_liuyan['color'].'">发送</a>
            		  </div>
            		
            		</div>
            		<script>
            		jQuery(document).ready(function($){
            		    $(".websitebox_fasong").click(function(){
            		        var content = $("textarea[name=\'websitebox_content\']").val();
            		        console.log(content)
            		        if(!content) {
            		            alert("留言内容不可为空！！")
            		            return false
            		        }
            		        $.ajax({
                                url:"/",
                		  	    data:{data:\'{"websitebox":"15","nonce":"'.wp_create_nonce('websitebox').'","action":"websitebox","content":"\'+content+\'"}\'},
                		  		type:"post",
                		  		dataType:"json",
                		  		success:function(data){
                		  		   	layui.use(["layer"], function(){
                		  		   	    layer=layui.layer
                    		  			if(data.msg==1){
                    		  				layer.alert("留言成功");
                    		  			    $("#websitebox_contently").val("")
                    		  			}else{
                    		  				layer.msg("留言失败，请刷新后重试");
                    		  			}
                		  		   	})
        		  		
                		        }
            		        })
            		    })
            		    $(".websitebox_j1").click(function() {
            		        $(".websitebox_cebian4").css("bottom","203px")
            		        $(this).hide()
            		        $(".websitebox_j2").show()
            		    })
            		    $(".websitebox_j2").click(function() {
            		        $(".websitebox_cebian4").css("bottom","-1px")
            		        $(this).hide()
            		        $(".websitebox_j1").show()
            		    })
            		})
            		</script>';
            }
            //侧边客服
            $websitebox_kefu = get_option('websitebox_kefu');
            if(isset($websitebox_kefu['kefu']) && $websitebox_kefu['kefu']==1){
                $websitebox_phone = get_option('websitebox_phone');
                $websitebox_qrcode = get_option('websitebox_qrcode');
                $websitebox_qq = get_option('websitebox_qq');
                $websitebox_mail = get_option('websitebox_mail');
                $websitebox_qqqun = get_option('websitebox_qqqun');
                $websitebox_wb = get_option('websitebox_wb');
                if($websitebox_kefu['type']==1){
                
                    if(isset($websitebox_kefu['bg']) && $websitebox_kefu['bg']){
                        echo '
                        <div style="right:-230px;background:'.$websitebox_kefu['bg'].'" class="websitebox_contactusdiyou_1" >
                    
                	    <div class="websitebox_hoverbtn_1" style="background:'.$websitebox_kefu['bg'].'">';
                    }else{
                        echo '<div style="right:-230px;" class="websitebox_contactusdiyou_1" ><div class="websitebox_hoverbtn_1" >';
                    }
                		echo '<span>联</span><span>系</span><span>我</span><span>们</span>
                		<img class="websitebox_hoverimg_1" src="'.plugin_dir_url( WEBSITEBOX_FILE ).'images/hoverbtnbg.gif" height="9" width="13">
                	</div>
                	<div class="websitebox_conter_1">';
                	    if(!empty($websitebox_phone) && isset($websitebox_phone['phone']) && $websitebox_phone['phone']){
                    		echo '<div class="websitebox_con1_1"> 
                    			<dl class="websitebox_fn_cle_1">';
                    			if(isset($websitebox_phone['cls']) && $websitebox_phone['cls']){
                    			    if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                    			        echo '<dt class="'.$websitebox_phone['cls'].'" style="color:'.$websitebox_kefu['icon'].'"></dt>';
                    			    }else{
                    			        echo '<dt class="'.$websitebox_phone['cls'].'" style="color:#fff;"></dt>';
                    			    }
                    			}else{
                    			    echo '<dt></dt>';
                    			}
                    			
                				echo '<dd class="websitebox_f1_1">咨询热线</dd>';
                				
                				echo '<dd class="websitebox_f2_1" ><a class="ph_num_1" style="font-size: 16px;color: #fff;" href="tel:'.$websitebox_phone['phone'].'">'.$websitebox_phone['phone'].'</a></dd>';
                				
                    			echo '</dl>
                    		</div>'; 
                	    }
                	    if(!empty($websitebox_qq) && isset($websitebox_qq['qq']) && $websitebox_qq['qq']){
                	        echo '<div class="websitebox_blank0_1"></div>
                        		<div class="websitebox_qqcall_1"> 
                        			<dl class="websitebox_fn_cle_1">';
                        			    if(isset($websitebox_qq['cls']) && $websitebox_qq['cls']){
                        			        if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                        			            echo '<dt class="'.$websitebox_qq['cls'].'" style="color:'.$websitebox_kefu['icon'].'"></dt>';
                        			        }else{
                        			            echo '<dt class="'.$websitebox_qq['cls'].'" style="color:#fff;"></dt>';
                        			        }
                        				    
                        			    }else{
                        			        echo '<dt></dt>';
                        			    }
                        				echo '<dd class="websitebox_f1_1 websitebox_f_s14_1">QQ客服</dd>
                        				<dd class="websitebox_f2_1 websitebox_kefuQQ_1">';
                        					
                        					if(isset($websitebox_qq['qq']) && $websitebox_qq['qq']){
                        					    echo '<a target="_blank" style="font-size: 16px;color: #fff;" href="http://wpa.qq.com/msgrd?v=3&amp;uin='.$websitebox_qq['qq'].'&amp;site=qq&amp;menu=yes">'.$websitebox_qq['qq'].'</a>';
                        					}else{
                        					    echo '<a target="_blank" style="font-size: 16px;color: #fff;" href="http://wpa.qq.com/msgrd?v=3&amp;uin=&amp;site=qq&amp;menu=yes">请在后台设置</a>';
                        					}
                        					
                        				echo '</dd>
                        			</dl>
                        			<div class="websitebox_blank0_1"></div>           
                        		</div>';
                		}
                		if(!empty($websitebox_qrcode) && isset($websitebox_qrcode['qrcode']) && $websitebox_qrcode['qrcode'] ){
                    		echo '<div class="websitebox_blank0_1"></div>
                    		<div class="websitebox_weixincall_1"> 
                    			<dl class="websitebox_fn_cle_1">';
                    			    if(isset($websitebox_qrcode['cls']) && $websitebox_qrcode['cls']){
                    			        if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                    			            echo '<dt class="'.$websitebox_qrcode['cls'].'" style="color:'.$websitebox_kefu['icon'].'"></dt>';
                    			        }else{
                    			            echo '<dt class="'.$websitebox_qrcode['cls'].'" style="color:#fff;"></dt>';
                    			        }
                    				    
                    			    }else{
                    			        echo '<dt></dt>';
                    			    }
                    				echo '<dd class="websitebox_f1_1">二维码</dd>';
                    				if(isset($websitebox_qrcode['qrcode']) && $websitebox_qrcode['qrcode'] ){
                    				    echo '<dd class="websitebox_f3_1"><img src="'.$websitebox_qrcode['qrcode'].'" height="73" width="73"></dd>';
                    				}else{
                    				    echo '<dd class="websitebox_f3_1"></dd>';
                    				}
                    			echo '</dl>
                    		</div>';
                		}
                		if(!empty($websitebox_mail) && isset($websitebox_mail['mail']) && $websitebox_mail['mail'] ){
                    		echo '<div class="websitebox_blank0_1"></div>
                    		<div class="websitebox_weixincall_1"> 
                    			<dl class="websitebox_fn_cle_1">';
                    			    if(isset($websitebox_mail['cls']) && $websitebox_mail['cls']){
                    			        if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                    			            echo '<dt class="'.$websitebox_mail['cls'].'" style="color:'.$websitebox_kefu['icon'].'"></dt>';
                    			        }else{
                    			            echo '<dt class="'.$websitebox_mail['cls'].'" style="color:#fff;"></dt>';
                    			        }
                    				    
                    			    }else{
                    			        echo '<dt></dt>';
                    			    }
                    				echo '<dd class="websitebox_f1_1">邮箱</dd>';
                    				if(isset($websitebox_mail['mail']) && $websitebox_mail['mail'] ){
                    				    echo '<dd class="websitebox_f2_1" style="color:#fff;font-size:16px;text-overflow:ellipsis;overflow:hidden;">'.$websitebox_mail['mail'].'</dd>';
                    				}else{
                    				    echo '<dd class="websitebox_f2_1"></dd>';
                    				}
                    			echo '</dl>
                    		</div>';
                		}
                		if(!empty($websitebox_wb) && isset($websitebox_wb['wb']) && $websitebox_wb['wb'] ){
                    		echo '<div class="websitebox_blank0_1"></div>
                    		<div class="websitebox_weixincall_1"> 
                    			<dl class="websitebox_fn_cle_1">';
                    			    if(isset($websitebox_wb['cls']) && $websitebox_wb['cls']){
                    			        if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                    			            echo '<dt class="'.$websitebox_wb['cls'].'" style="color:'.$websitebox_kefu['icon'].'"></dt>';
                    			        }else{
                    			            echo '<dt class="'.$websitebox_wb['cls'].'" style="color:#fff;"></dt>';
                    			        }
                    				    
                    			    }else{
                    			        echo '<dt></dt>';
                    			    }
                    				echo '<dd class="websitebox_f1_1">链接</dd>';
                    				if(isset($websitebox_wb['wb']) && $websitebox_wb['wb'] ){
                    				    echo '<dd class="websitebox_f2_1" ><a href="'.$websitebox_wb['wb'].'" style="width:100%;color:#fff;font-size:16px;text-overflow:ellipsis;overflow:hidden;display: block;white-space:nowrap;">'.$websitebox_wb['wb'].'</a></dd>';
                    				}else{
                    				    echo '<dd class="websitebox_f2_1"></dd>';
                    				}
                    			echo '</dl>
                    		</div>';
                		}
                		echo '<div class="websitebox_blank0_1"></div>
                		<div class="websitebox_dytimer_1">
                			<span><a href="/" style="color:#fff;font-size:16px;overflow:hidden;text-overflow:ellipsis; white-space:nowrap;display: block;" >'.str_replace("https://","",str_replace('http://','',get_option('siteurl'))).'</a></span>
                		</div>
                	</div>
                </div>
                
                <div class="websitebox_diyoumask_1" style="height: 2000px;" ></div>

                <script type="text/javascript">
                jQuery(document).ready(function($){
                	$(".websitebox_contactusdiyou_1").hover(function() {
                		$(".websitebox_hoverimg_1").attr("src","'.plugin_dir_url( WEBSITEBOX_FILE ).'images/hoverbtnbg1.gif");
                		$(".websitebox_diyoumask_1").fadeIn();
                		$(".websitebox_contactusdiyou_1").animate({right:"0"},300); 
                	}, function() {
                		$(".websitebox_hoverimg_1").attr("src","'.plugin_dir_url( WEBSITEBOX_FILE ).'images/hoverbtnbg.gif");
                		$(".websitebox_contactusdiyou_1").animate({right:"-230px"},300,function(){});
                		$(".websitebox_diyoumask_1").fadeOut();
                	});
                });
                </script>';
                }elseif($websitebox_kefu['type']==2){
                  
                    echo '<div class="websitebox_all_2">';
                            if(!empty($websitebox_phone) && isset($websitebox_phone['phone']) && $websitebox_phone['phone']){
                                
                                echo '<div class="websitebox_box_2">';
                                    if(isset($websitebox_phone['phone']) && $websitebox_phone['phone']){
                                        
                                        echo '<a href="tel:'.$websitebox_phone['phone'].'">                  
                                            <div class="websitebox_card_2 websitebox_bg-01_2" style="color:#fff;">';
                                                if(isset($websitebox_phone['cls']) && $websitebox_phone['cls']){
                                                
                    			                    if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                        echo '<i class="'.$websitebox_phone['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                    			                    }else{
                    			                        echo '<i class="'.$websitebox_phone['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                    			                    }
                                                }else{
                                                    echo '<i class="websitebox websitebox-iconfontcolor39" icon-class="websitebox-iconfontcolor39" style="font-size:29px;"></i>';
                                                }
                                                
                                                echo '<span class="websitebox_card-content_2">'.$websitebox_phone['phone'].'</span>
                                            </div>       
                                        </a>';
                                    }
                                echo '</div>';
                            }
                            if(!empty($websitebox_qq) && isset($websitebox_qq['qq']) && $websitebox_qq['qq']){
                                echo '<div class="websitebox_box_2">';
                                     if(isset($websitebox_qq['qq']) && $websitebox_qq['qq']){
                                        echo '<a href="http://wpa.qq.com/msgrd?v=3&amp;uin='.$websitebox_qq['qq'].'&amp;site=qq&amp;menu=yes">                  
                                            <div class="websitebox_card_2 websitebox_bg-02_2" style="color:#fff;">';
                                                if(isset($websitebox_qq['cls']) && $websitebox_qq['cls']){
                                                
                    			                    if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                        echo '<i class="'.$websitebox_qq['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                    			                    }else{
                    			                        echo '<i class="'.$websitebox_qq['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                    			                    }
                                                }else{
                                                    echo '<i class="websitebox websitebox-qq1" icon-class="websitebox-qq1" style="font-size:29px;"></i>';
                                                }
                                                echo '
                                                <span class="websitebox_card-content_2">'.$websitebox_qq['qq'].'</span>
                                            </div>            
                                        </a>';
                                     }else{
                                          echo '<a href="javascript:;">                  
                                            <div class="websitebox_card_2 websitebox_bg-02_2" style="color:#fff;" >
                                                <i class="websitebox websitebox-qq1" icon-class="websitebox-qq1" style="font-size:29px;"></i>
                                                <span class="websitebox_card-content_2">请在后台设置</span>
                                            </div>            
                                        </a>';
                                     }
                                echo '</div>';
                            }
                            if(!empty($websitebox_mail)  ){
                                if(isset($websitebox_mail['mail']) && $websitebox_mail['mail']){
                                    echo '<div class="websitebox_box_2">
                                        <a href="javascript:;">                  
                                            <div class="websitebox_card_2 websitebox_bg-03_2" style="color:#fff;">';
                                                if(isset($websitebox_mail['cls']) && $websitebox_mail['cls']){
                                                
                    			                    if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                        echo '<i class="'.$websitebox_mail['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                    			                    }else{
                    			                        echo '<i class="'.$websitebox_mail['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                    			                    }
                                                }else{
                                                    echo '<i class="layui-icon layui-icon-cellphone" style="font-size: 30px;"></i>';
                                                }
                                                echo '
                                                <span class="websitebox_card-content_2">'.$websitebox_mail['mail'].'</span>
                                            </div>            
                                        </a>
                                    </div>';
                                }
                            }
                             if(!empty($websitebox_qqqun)){
                                if(isset($websitebox_qqqun['qqqun']) && $websitebox_qqqun['qqqun']){
                                    echo '<div class="websitebox_box_2">
                                        <a href="javascript:;">                  
                                            <div class="websitebox_card_2 websitebox_bg-04_2" style="color:#fff;">';
                                                if(isset($websitebox_qqqun['cls']) && $websitebox_qqqun['cls']){
                                                
                    			                    if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                        echo '<i class="'.$websitebox_qqqun['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                    			                    }else{
                    			                        echo '<i class="'.$websitebox_qqqun['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                    			                    }
                                                }else{
                                                    echo '<i class="websitebox websitebox-qqqun" icon-class="websitebox-qqqun" style="font-size:29px;"></i>';
                                                }
                                                echo '
                                                <span class="websitebox_card-content_2">'.$websitebox_qqqun['qqqun'].'</span>
                                            </div>            
                                        </a>
                                    </div>';
                                }
                            }
                            if(!empty($websitebox_wb)){
                                if(isset($websitebox_wb['wb']) && $websitebox_wb['wb']){
                                    echo '<div class="websitebox_box_2">
                                        <a href="'.$websitebox_wb['wb'].'">                  
                                            <div class="websitebox_card_2 websitebox_bg-05_2" style="color:#fff;">';
                                                if(isset($websitebox_wb['cls']) && $websitebox_wb['cls']){
                                                
                    			                    if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                        echo '<i class="'.$websitebox_wb['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                    			                    }else{
                    			                        echo '<i class="'.$websitebox_wb['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                    			                    }
                                                }else{
                                                    echo '<i class="websitebox websitebox-xinlang" icon-class="websitebox-xinlang" style="font-size:29px;"></i>';
                                                }
                                                echo '
                                                <span class="websitebox_card-content_2">'.$websitebox_wb['wb'].'</span>
                                            </div>            
                                        </a>
                                    </div>';
                                }
                            }
                            
                    echo '</div>
                    ';
                    
                }elseif($websitebox_kefu['type']==3){ 
                    if(isset($websitebox_kefu['bg']) && $websitebox_kefu['bg']){
                        $kefu3_back = $websitebox_kefu['bg'];
                    }else{
                        $kefu3_back = '#009aff';
                    }
                    echo '
                        <style>
                            .websitebox_ul_3 li{
                                background:'.$kefu3_back.';
                            }
                            .websitebox_li1_3_box{
                                background:'.$kefu3_back.';
                            }
                        </style>
                    	<ul class="websitebox_ul_3" >';
                    	    if(!empty($websitebox_phone) &&isset($websitebox_phone['phone']) && $websitebox_phone['phone']){
                        		echo '<li class="websitebox_li1_3">';
                        		    if(isset($websitebox_phone['cls']) && $websitebox_phone['cls']){
                                                
        			                    if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                            echo '<i class="'.$websitebox_phone['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
        			                    }else{
        			                        echo '<i class="'.$websitebox_phone['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:#fff;" ></i>';
        			                    }
                                    }else{
                                        echo '<i class="websitebox websitebox-iconfontcolor39" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'"></i>';
                                    }
                        		    
                        		    echo '<div class="websitebox_li1_3_box">';
                        		        if(isset($websitebox_phone['phone']) && $websitebox_phone['phone']){
                            		        echo '<span><a href="tel:'.$websitebox_phone['phone'].'">'.$websitebox_phone['phone'].'</a></span>';
                        		        }else{
                        		            echo '<span style="width: 140px;display: block;"><a href="javascript:;">请在后台设置</a></span>';
                        		        }
                        		    echo '</div>
                        		</li>';
                    	    }
                    	    if(!empty($websitebox_qq) && isset($websitebox_qq['qq']) && $websitebox_qq['qq']){
                		        echo '<li class="websitebox_li2_3">';
                		            if(isset($websitebox_qq['cls']) && $websitebox_qq['cls']){
                                                
        			                    if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                            echo '<i class="'.$websitebox_qq['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
        			                    }else{
        			                        echo '<i class="'.$websitebox_qq['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:#fff;" ></i>';
        			                    }
                                    }else{
                                        echo '<i class="websitebox websitebox-qq1" icon-class="websitebox-qq1" style="font-size:29px;color:'.$websitebox_kefu['icon'].'"></i>';
                                    }
                        			
                        		    echo '<div class="websitebox_li1_3_box">';
                        		         if(isset($websitebox_qq['cls']) && $websitebox_qq['cls']){
                        		             echo '<span><a href="http://wpa.qq.com/msgrd?v=3&amp;uin='.$websitebox_qq['qq'].'&amp;site=qq&amp;menu=yes">'.$websitebox_qq['qq'].'</a></span>';
                        		         }else{
                        		            echo '<span style="width: 140px;display: block;"><a href="javascript:;">请在后台设置</a></span>';
                        		         }
                        		    echo '</div>
                        		</li>';
                    	    }
                    	    if(!empty($websitebox_mail) && isset($websitebox_mail['mail']) && $websitebox_mail['mail']){
                                
                        		echo '<li class="websitebox_li3_3">';
                                    if(isset($websitebox_mail['cls']) && $websitebox_mail['cls']){
                                                
                                        if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                            echo '<i class="'.$websitebox_mail['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                        }else{
                                           echo '<i class="'.$websitebox_mail['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:#fff;" ></i>';
                                        }
                                    }else{
                                        echo '<i class="layui-icon layui-icon-cellphone" style="font-size: 30px;color:'.$websitebox_kefu['icon'].'"></i>';
                                    }
                               
                                    echo '<div class="websitebox_li1_3_box">';
                                      if(isset($websitebox_mail['mail']) && $websitebox_mail['mail']){
                                          echo '<span >'.$websitebox_mail['mail'].'</span>';
                                      }else{
                                          echo '<spanstyle="width: 140px;display: block;">请在后台设置</span>';
                                      }
                                  echo '</div>
                              </li>';
                                
                    		}
                    		if(!empty($websitebox_qqqun) && isset($websitebox_qqqun['qqqun']) && $websitebox_qqqun['qqqun']){
                        		echo '<li class="websitebox_li4_3">';
                        		    if(isset($websitebox_qqqun['cls']) && $websitebox_qqqun['cls']){
                                                
                                        if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                            echo '<i class="'.$websitebox_qqqun['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                        }else{
                                           echo '<i class="'.$websitebox_qqqun['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:#fff;" ></i>';
                                        }
                                    }else{
                                        echo '<i class="websitebox websitebox-qqqun" icon-class="websitebox-qqqun" style="font-size:29px;color:'.$websitebox_kefu['icon'].'"></i>';
                                    }
                        			
                        		    echo '<div class="websitebox_li1_3_box">';
                        		        if(isset($websitebox_qqqun['qqqun']) && $websitebox_qqqun['qqqun']){
                                          echo '<span>'.$websitebox_qqqun['qqqun'].'</span>';
                                      }else{
                                          echo '<span style="width: 140px;display: block;">请在后台设置</span>';
                                      }
                        		    echo '</div>
                        		</li>';
                    		}
                    		if(!empty($websitebox_wb) && isset($websitebox_wb['wb']) && $websitebox_wb['wb']){
                        		echo '<li class="websitebox_li5_3">';
                        		    if(isset($websitebox_wb['cls']) && $websitebox_wb['cls']){
                                                
                                        if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                            echo '<i class="'.$websitebox_wb['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                        }else{
                                           echo '<i class="'.$websitebox_wb['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:#fff;" ></i>';
                                        }
                                    }else{
                                        echo '<i class="websitebox websitebox-xinlang" icon-class="websitebox-xinlang" style="font-size:29px;color:'.$websitebox_kefu['icon'].'"></i>';
                                    }
                        			
                        		    echo '<div class="websitebox_li1_3_box">';
                        		        if(isset($websitebox_wb['wb']) && $websitebox_wb['wb']){
                                          echo '<span><a href="'.$websitebox_wb['wb'].'">'.$websitebox_wb['wb'].'</a></span>';
                                        }else{
                                              echo '<span style="width: 140px;display: block;">请在后台设置</span>';
                                        }
                        		        
                        		    echo '</div>
                        		</li>';
                    		}
                    		if(!empty($websitebox_qrcode) && isset($websitebox_qrcode['qrcode']) && $websitebox_qrcode['qrcode']){
                        		echo '<li class="websitebox_li6_3">';
                        		    if(isset($websitebox_qrcode['cls']) && $websitebox_qrcode['cls']){
                                                
                                        if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                            echo '<i class="'.$websitebox_qrcode['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                        }else{
                                           echo '<i class="'.$websitebox_qrcode['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:#fff;" ></i>';
                                        }
                                    }else{
                                        echo '<i class="websitebox websitebox-erweima" icon-class="websitebox-erweima" style="font-size:29px;color:'.$websitebox_kefu['icon'].'"></i>';
                                    }
                        		    echo '<div class="websitebox_li1_3_box">';
                        		        if(isset($websitebox_qrcode['qrcode']) && $websitebox_qrcode['qrcode']){
                        		            echo '<img src="'.$websitebox_qrcode['qrcode'].'">';
                        		        }
                        		    echo '</div>
                        		</li>';
                    		}
                    		 if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                    		echo '<li class="websitebox_li7_3">
                    		    <i class="websitebox websitebox-top" icon-class="websitebox-top" style="font-size:29px;color:'.$websitebox_kefu['icon'].'"></i>
                    		</li>';
                    		}else{
                    		    echo '<li class="websitebox_li7_3">
                    		        <i class="websitebox websitebox-top" icon-class="websitebox-top" style="font-size:29px;color:#fff;"></i>
                    		    </li>';
                    		}
                    	echo '</ul>
                    
                    <script >
                         jQuery(document).ready(function($){
                            $(".websitebox_li7_3").hide();
                            $(".websitebox_li7_3").on("click", function() {
                                $("html, body").animate({
                                    scrollTop: 0
                                }, 400);
                                return false;
                            })
                            $(window).bind("scroll resize", function() {
                                if ($(window).scrollTop() <= 400) {
                                    $(".websitebox_li7_3").hide();
                                } else {
                                    $(".websitebox_li7_3").show();
                                }
                            })
                        })
                    </script>';
                }elseif($websitebox_kefu['type']==4){
                    if(isset($websitebox_kefu['bg']) && $websitebox_kefu['bg']){
                        $kefu4_back = $websitebox_kefu['bg'];
                    }else{
                        $kefu4_back = '#009aff';
                    }
                    echo '
                        <style>
                            .websitebox_side_4 ul li {
                                background-color:'.$kefu4_back.';
                            }
                        </style>
                        <script type="text/javascript">
                        jQuery(document).ready(function($){
                        	$(".websitebox_side_4 ul li").hover(function(){
                        		$(this).find(".websitebox_sidebox_4").stop().animate({"width":"220px"},200).css({"opacity":"1","filter":"Alpha(opacity=100)","background-color":"'.$kefu4_back.'"})	
                        	},function(){
                        		$(this).find(".websitebox_sidebox_4").stop().animate({"width":"54px"},200).css({"opacity":"1","filter":"Alpha(opacity=100)","background-color":"'.$kefu4_back.'"})
                        	});
                        // 	function goTop(){
                        //     	$("html").animate({"scrollTop":0},600);
                        //     }
                            $("#goTop4").click(function() {
                                $("html,body").animate({"scrollTop":0},600);
                            })
                            if ($(window).scrollTop() <= 400) {
                                $("#goTop4").hide();
                            }
                            $(window).bind("scroll resize", function() {
                                if ($(window).scrollTop() <= 400) {
                                    $("#goTop4").hide();
                                } else {
                                    $("#goTop4").show();
                                }
                            })
                        });
                        
                    </script>
                    <div class="websitebox_side_4" >
                    	<ul style="margin:0;padding: 0;">';
                    	     if(!empty($websitebox_phone)){
                    	         if(isset($websitebox_phone['phone']) && $websitebox_phone['phone']){
                    		        echo '<li>
                    		                <a href="tel:'.$websitebox_phone['phone'].'">
                    		                   <div class="websitebox_sidebox_4">';
                    		                        if(isset($websitebox_phone['cls']) && $websitebox_phone['cls']){
                                                
                                                        if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                            echo '<i class="'.$websitebox_phone['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                                        }else{
                                                           echo '<i class="'.$websitebox_phone['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:#fff;" ></i>';
                                                        }
                                                    }else{
                                                        echo '<i class="websitebox websitebox-iconfontcolor39" icon-class="websitebox-iconfontcolor39" style="font-size:29px;"></i>';
                                                    }
                    		                        echo $websitebox_phone['phone'].'
                    		                   </div>
                    		                </a>
                    		              </li>';
                    	         }
                    	     }
                    	     if(!empty($websitebox_mail)){
                    	         if(isset($websitebox_mail['mail']) && $websitebox_mail['mail']){
                        		    echo '<li><div class="websitebox_sidebox_4">';
                        		            if(isset($websitebox_mail['cls']) && $websitebox_mail['cls']){
                                                
                                                if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                    echo '<i class="'.$websitebox_mail['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                                }else{
                                                   echo '<i class="'.$websitebox_mail['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:#fff;" ></i>';
                                                }
                                            }else{
                                                echo '<i class="layui-icon layui-icon-cellphone" style="font-size: 30px;"></i>';
                                            }
                        		            echo $websitebox_mail['mail'].'
                        		           </div>
                        		      </li>';
                    	         }
                    	     }
                    	     if(!empty($websitebox_qqqun)){
                    	         if(isset($websitebox_qqqun['qqqun']) && $websitebox_qqqun['qqqun']){
                        		    echo '<li><div class="websitebox_sidebox_4">';
                        		            if(isset($websitebox_qqqun['cls']) && $websitebox_qqqun['cls']){
                                                
                                                if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                    echo '<i class="'.$websitebox_qqqun['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                                }else{
                                                   echo '<i class="'.$websitebox_qqqun['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:#fff;" ></i>';
                                                }
                                            }else{
                                                echo '<i class="websitebox websitebox-qqqun" icon-class="websitebox-qqqun" style="font-size:29px;"></i>';
                                            }
                        		            
                        		            echo $websitebox_qqqun['qqqun'].'
                        		            </div>
                        		          </li>';
                    	         }
                    	     }
                    	     if(!empty($websitebox_qq)){
                    	         if(isset($websitebox_qq['qq']) && $websitebox_qq['qq']){
                            		echo '<li>
                            		        <a href="http://wpa.qq.com/msgrd?v=3&amp;uin='.$websitebox_qq['qq'].'&amp;site=qq&amp;menu=yes" ><div class="websitebox_sidebox_4">';
                            		            if(isset($websitebox_qq['cls']) && $websitebox_qq['cls']){
                                                
                                                    if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                        echo '<i class="'.$websitebox_qq['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                                    }else{
                                                       echo '<i class="'.$websitebox_qq['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:#fff;" ></i>';
                                                    }
                                                }else{
                                                    echo '<i class="websitebox websitebox-qq1" icon-class="websitebox-qq1" style="font-size:29px;"></i>';
                                                }
                                    		    echo $websitebox_qq['qq'].'
                                    		    </div>
                            		        </a>
                            		    </li>';
                    	         }
                    	     }
                            if(!empty($websitebox_wb)){
                                if(isset($websitebox_wb['wb']) && $websitebox_wb['wb']){
                            		echo '<li><a href="'.$websitebox_wb['wb'].'" >
                            		        <div class="websitebox_sidebox_4">';
                            		            if(isset($websitebox_wb['cls']) && $websitebox_wb['cls']){
                                                
                                                    if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                        echo '<i class="'.$websitebox_wb['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                                    }else{
                                                       echo '<i class="'.$websitebox_wb['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:#fff;" ></i>';
                                                    }
                                                }else{
                                                    echo '<i class="websitebox websitebox-xinlang" icon-class="websitebox-xinlang" style="font-size:29px;"></i>';
                                                }
                            		            
                            		            echo $websitebox_wb['wb'].'
                            		            </div>
                            		            </a>
                            		        </li>';
                                }
                            }
                    		echo '<li style="border:none;" id="goTop4"><a href="javascript:;" class="websitebox_sidetop_4" ><img src="'.plugin_dir_url( WEBSITEBOX_FILE ).'images/side_icon05.png"></a></li>
                    	</ul>
                    </div> ';
                }elseif($websitebox_kefu['type']==5){
                    if(isset($websitebox_kefu['bg']) && $websitebox_kefu['bg']){
                        $kefu5_back = $websitebox_kefu['bg'];
                    }else{
                        $kefu5_back = '#0085cd';
                    }
                    echo '
                        <style>
                            .websitebox_right_nav li{
                                background:'.$kefu5_back.';
                            }
                            .websitebox_right_nav li:hover{background:'.$kefu5_back.'}
                        </style>
                        <ul class="websitebox_right_nav">';
                        if(!empty($websitebox_qq)){
                            if(isset($websitebox_qq['qq']) && $websitebox_qq['qq']){
                              echo '<li>
                                <div class="websitebox_iconBox websitebox_oln_ser">'; 
                                    
                                    if(isset($websitebox_qq['cls']) && $websitebox_qq['cls']){
                                                
                                        if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                            echo '<i class="'.$websitebox_qq['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                        }else{
                                           echo '<i class="'.$websitebox_qq['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                                        }
                                    }else{
                                        echo '<i class="websitebox websitebox-qq1" icon-class="websitebox-qq1" style="font-size:29px;"></i>';
                                    }
                                    echo '<h4>在线客服</h4>
                                </div>
                                 <div class="websitebox_hideBox">
                                    <div class="websitebox_hb">
                                       <h5>在线咨询</h5>
                                       <div class="websitebox_qqtalk">
                                          <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin='.$websitebox_qq['qq'].'&site=qq&menu=yes">
                                             <span>';
                                             if(isset($websitebox_qq['cls']) && $websitebox_qq['cls']){
                                                
                                                if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                    echo '<i class="'.$websitebox_qq['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                                }else{
                                                   echo '<i class="'.$websitebox_qq['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                                                }
                                            }else{
                                                echo '<i class="websitebox websitebox-qq1" icon-class="websitebox-qq1" style="font-size:29px;"></i>';
                                            }
                                            echo '</span>
                                             <p>'.$websitebox_qq['qq'].'</p>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </li>';
                            }
                        }
                        if(!empty($websitebox_phone)){
                            if(isset($websitebox_phone['phone']) && $websitebox_phone['phone']){
                                echo '<li>
                                     <div class="websitebox_iconBox websitebox_phe_num">';
                                        if(isset($websitebox_phone['cls']) && $websitebox_phone['cls']){
                                                
                                            if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                echo '<i class="'.$websitebox_phone['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                            }else{
                                               echo '<i class="'.$websitebox_phone['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                                            }
                                        }else{
                                            echo '<i class="websitebox websitebox-iconfontcolor39" icon-class="websitebox-iconfontcolor39" style="font-size:29px;"></i>';
                                        }
                                        
                                        echo '<h4>联系电话</h4>
                                     </div>
                                     <div class="websitebox_hideBox">
                                        <div class="websitebox_hb">
                                           <h5>热线电话</h5>
                                           <div class="websitebox_qqtalk">
                                               <span>';
                                                 if(isset($websitebox_phone['cls']) && $websitebox_phone['cls']){
                                                    
                                                    if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                        echo '<i class="'.$websitebox_phone['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                                    }else{
                                                       echo '<i class="'.$websitebox_phone['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                                                    }
                                                }else{
                                                    echo '<i class="websitebox websitebox-qq1" icon-class="websitebox-qq1" style="font-size:29px;"></i>';
                                                }
                                                echo '</span>
                                               <p>'.$websitebox_phone['phone'].'</p>
                                            </div>
                                        </div>
                                     </div>
                                  </li>';
                            }
                        }
                        if(!empty($websitebox_qqqun)){
                            if(isset($websitebox_qqqun['qqqun']) && $websitebox_qqqun['qqqun']){
                              echo '<li>
                                <div class="websitebox_iconBox websitebox_oln_ser">'; 
                                    
                                    if(isset($websitebox_qqqun['cls']) && $websitebox_qqqun['cls']){
                                                
                                        if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                            echo '<i class="'.$websitebox_qqqun['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                        }else{
                                           echo '<i class="'.$websitebox_qqqun['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                                        }
                                    }else{
                                        echo '<i class="websitebox websitebox-qqqun" icon-class="websitebox-qqqun" style="font-size:29px;">';
                                    }
                                    echo '<h4>QQ群</h4>
                                </div>
                                 <div class="websitebox_hideBox">
                                    <div class="websitebox_hb">
                                       <h5>QQ群</h5>
                                       <div class="websitebox_qqtalk">
                                         
                                             <span>';
                                            if(isset($websitebox_qqqun['cls']) && $websitebox_qqqun['cls']){
                                                        
                                                if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                    echo '<i class="'.$websitebox_qqqun['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                                }else{
                                                   echo '<i class="'.$websitebox_qqqun['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                                                }
                                            }else{
                                                echo '<i class="websitebox websitebox-qqqun" icon-class="websitebox-qqqun" style="font-size:29px;">';
                                            }
                                            echo '</span>
                                             <p>'.$websitebox_qqqun['qqqun'].'</p>
                                          
                                       </div>
                                    </div>
                                 </div>
                              </li>';
                            }
                        }
                        if(!empty($websitebox_mail)){
                            if(isset($websitebox_mail['mail']) && $websitebox_mail['mail']){
                              echo '<li>
                                <div class="websitebox_iconBox websitebox_oln_ser">'; 
                                    
                                    if(isset($websitebox_mail['cls']) && $websitebox_mail['cls']){
                                                
                                        if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                            echo '<i class="'.$websitebox_mail['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                        }else{
                                           echo '<i class="'.$websitebox_mail['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                                        }
                                    }else{
                                        echo '<i class="websitebox websitebox-qq1" icon-class="websitebox-qq1" style="font-size:29px;"></i>';
                                    }
                                    echo '<h4>邮箱</h4>
                                </div>
                                 <div class="websitebox_hideBox">
                                    <div class="websitebox_hb">
                                       <h5>邮箱</h5>
                                       <div class="websitebox_qqtalk">
                                          
                                             <span>';
                                             if(isset($websitebox_mail['cls']) && $websitebox_mail['cls']){
                                                
                                                if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                    echo '<i class="'.$websitebox_mail['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                                }else{
                                                   echo '<i class="'.$websitebox_mail['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                                                }
                                            }else{
                                                echo '<i class="websitebox websitebox-qq1" icon-class="websitebox-qq1" style="font-size:29px;"></i>';
                                            }
                                            echo '</span>
                                             <p>'.$websitebox_qq['qq'].'</p>
                                          
                                       </div>
                                    </div>
                                 </div>
                              </li>';
                            }
                        }
                        if(!empty($websitebox_qrcode)){
                            if(isset($websitebox_qrcode['qrcode']) && $websitebox_qrcode['qrcode']){
                                echo '<li>
                                     <div class="websitebox_iconBox">';
                                        if(isset($websitebox_qrcode['cls']) && $websitebox_qrcode['cls']){
                                                
                                            if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                echo '<i class="'.$websitebox_qrcode['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                            }else{
                                               echo '<i class="'.$websitebox_qrcode['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                                            }
                                        }else{
                                            echo '<i class="websitebox websitebox-erweima" icon-class="websitebox-erweima" style="font-size:29px;"></i>';
                                        }
                                        echo '<h4>二维码</h4>
                                     </div>
                                     <div class="websitebox_hideBox">
                                        <div class="websitebox_hb">
                                           <h5>手机扫一扫打开</h5>
                                           <img src="'.$websitebox_qrcode['qrcode'].'">
                                        </div>
                                     </div>
                                  </li>';
                            }
                        }
                        if(!empty($websitebox_wb)){
                            if(isset($websitebox_wb['wb']) && $websitebox_wb['wb']){
                                echo '
                                   <li>
                                     <div class="websitebox_iconBox">';
                                        if(isset($websitebox_wb['cls']) && $websitebox_wb['cls']){
                                                
                                            if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                echo '<i class="'.$websitebox_wb['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                            }else{
                                               echo '<i class="'.$websitebox_wb['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                                            }
                                        }else{
                                            echo '<i class="websitebox websitebox-xinlang" icon-class="websitebox-xinlang" style="font-size:29px;"></i>';
                                        }
                                        
                                        echo '<h4><a href="'.$websitebox_wb['wb'].'" style="color:#fff;">链接</a></h4>
                                     </div>
                                  </li>';
                            }
                        }
                        echo '<li>
                             <div class="websitebox_iconBox websitebox_top">
                                <i class="websitebox websitebox-top" icon-class="websitebox-top" style="font-size:29px;"></i>
                                <h4>回到顶部</h4>
                             </div>
                          </li>
                       </ul>';
                }elseif($websitebox_kefu['type']==6){
                    if(isset($websitebox_kefu['bg']) && $websitebox_kefu['bg']){
                        $kefu5_back = $websitebox_kefu['bg'];
                    }else{
                        $kefu5_back = '#fff';
                    }
                    echo '
                        <div class="websitebox_suspension">
                            <div class="websitebox_consult" style="background:'.$kefu5_back.'">';
                                if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                    echo '<i class="layui-icon layui-icon-home" icon-class="websitebox-iconfontcolor39" style="font-size:29px;"></i>';
                                }else{
                                     echo '<i class="layui-icon layui-icon-home" icon-class="websitebox-iconfontcolor39" style="font-size:29px;"></i>';
                                }
                                echo '<div class="websitebox_suspension-list" style="display:none;">
                                    <div class="websitebox_suspension-list-content">
                                        <ul style="padding:0;">';
                                            if(!empty($websitebox_phone)){
                                                if(isset($websitebox_phone['phone']) && $websitebox_phone['phone']){
                                                    echo '<li>
                                                        <div href="javascript:;" class="service-phone">';
                                                            if(isset($websitebox_phone['cls']) && $websitebox_phone['cls']){
                                                
                                                                if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                                    echo '<i class="'.$websitebox_phone['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                                                }else{
                                                                   echo '<i class="'.$websitebox_phone['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                                                                }
                                                            }else{
                                                                echo '<i class="websitebox websitebox-iconfontcolor39" icon-class="websitebox-iconfontcolor39" style="font-size:29px;"></i>';
                                                            }
                                                            
                                                            echo '<span class="websitebox_info-name">客服热线</span>
                                                            <span class="websitebox_info-value"><a href="tel:'.$websitebox_phone['phone'].'">'.$websitebox_phone['phone'].'</a></span>
                                                        </div>
                                                    </li>';
                                                }
                                            }
                                            if(!empty($websitebox_qq)){
                                                if(isset($websitebox_qq['qq']) && $websitebox_qq['qq']){
                                                    echo '<li>
                                                        <div href="javascript:;" class="websitebox_service-qq">';
                                                            if(isset($websitebox_qq['cls']) && $websitebox_qq['cls']){
                                                
                                                                if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                                    echo '<i class="'.$websitebox_qq['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                                                }else{
                                                                   echo '<i class="'.$websitebox_qq['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                                                                }
                                                            }else{
                                                                echo '<i class="websitebox websitebox-qq1" icon-class="websitebox-qq1" style="font-size:29px;top: 22px;"></i>';
                                                            }
                                                            
                                                            echo '<span class="websitebox_info-name">在线客服</span>
                                                            <span class="websitebox_info-value">
                                                                <a href="http://wpa.qq.com/msgrd?v=3&amp;uin='.$websitebox_qq['qq'].'&amp;site=qq&amp;menu=yes">
                                                                '.$websitebox_qq['qq'].'
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </li>';
                                                }
                                            }
                                            if(!empty($websitebox_qqqun)){
                                                if(isset($websitebox_qqqun['qqqun']) && $websitebox_qqqun['qqqun']){
                                                    echo '<li class="websitebox_suspension-list-bottom">
                                                        <div href="javascript:;" class="service-proposal">';
                                                            if(isset($websitebox_qqqun['cls']) && $websitebox_qqqun['cls']){
                                                
                                                                if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                                    echo '<i class="'.$websitebox_qqqun['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                                                }else{
                                                                   echo '<i class="'.$websitebox_qqqun['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                                                                }
                                                            }else{
                                                                echo '<i class="websitebox websitebox-qqqun" icon-class="websitebox-qqqun" style="font-size:29px;top: 22px;"></i>';
                                                            }
                                                            
                                                            echo '<span class="websitebox_info-name">QQ群</span>
                                                            <span class="websitebox_info-value" style="font-size: 18px;font-weight: 700;color: #f90;">'.$websitebox_qqqun['qqqun'].'</span>
                                                        </div>
                                                    </li>';
                                                }
                                            }
                                            if(!empty($websitebox_mail)){
                                                if(isset($websitebox_mail['mail']) && $websitebox_mail['mail']){
                                                    echo '<li class="websitebox_suspension-list-bottom">
                                                        <div href="javascript:;" class="service-proposal">';
                                                            if(isset($websitebox_mail['cls']) && $websitebox_mail['cls']){
                                                
                                                                if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                                    echo '<i class="'.$websitebox_mail['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                                                }else{
                                                                   echo '<i class="'.$websitebox_mail['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                                                                }
                                                            }else{
                                                                echo '<i class="websitebox websitebox-qq1" icon-class="websitebox-qq1" style="font-size:29px;"></i>';
                                                            }
                                                            
                                                            echo '<span class="websitebox_info-name">邮箱</span>
                                                            <span class="websitebox_info-value" style="font-size: 18px;font-weight: 700;color: #f90;">'.$websitebox_mail['mail'].'</span>
                                                        </div>
                                                    </li>';
                                                }
                                            }
                                            if(!empty($websitebox_wb)){
                                                if(isset($websitebox_wb['wb']) && $websitebox_wb['wb']){
                                                    echo '<li class="websitebox_suspension-list-bottom">
                                                        <div href="javascript:;" class="service-proposal">';
                                                            if(isset($websitebox_wb['cls']) && $websitebox_wb['cls']){
                                                
                                                                if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){
                                                                    echo '<i class="'.$websitebox_wb['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;color:'.$websitebox_kefu['icon'].'" ></i>';
                                                                }else{
                                                                   echo '<i class="'.$websitebox_wb['cls'].'" icon-class="websitebox-iconfontcolor39" style="font-size:29px;" ></i>';
                                                                }
                                                            }else{
                                                                echo '<i class="websitebox websitebox-xinlang" icon-class="websitebox-xinlang" style="font-size:29px;top: 22px;"></i>';
                                                            }
                                                            
                                                            echo '<span class="websitebox_info-name">新浪微博</span>
                                                            <span class="websitebox_info-value"><a href="'.$websitebox_wb['wb'].'">'.$websitebox_wb['wb'].'</a></span>
                                                        </div>
                                                    </li>';
                                                }
                                            }
                                            
                                        echo '</ul>
                                    </div>
                                </div>
                            </div>';
                            if(!empty($websitebox_qrcode) && isset($websitebox_qrcode['qrcode']) && $websitebox_qrcode['qrcode']){
                            echo '<div class="websitebox_cart" >
                                <i class="websitebox websitebox-erweima" icon-class="websitebox-erweima" style="font-size:29px;"></i>
                                <div class="websitebox_pic">
                                    <div class="websitebox_pic-content">
                                       <img style="width:100%;" src="'.$websitebox_qrcode['qrcode'].'">
                                    </div>
                                </div>
                            </div>';
                            }
                            echo '<div class="websitebox_back-top" style="display: block;">
                                <i class="websitebox websitebox-top" icon-class="websitebox-top" style="font-size:29px;"></i>
                            </div>
                        </div>
                        
                        <script >
                             jQuery(document).ready(function($){
                                $(".websitebox_back-top").hide();
                                $(".websitebox_back-top").on("click", function() {
                                    $("html, body").animate({
                                        scrollTop: 0
                                    }, 400);
                                    return false;
                                })
                                $(window).bind("scroll resize", function() {
                                    if ($(window).scrollTop() <= 400) {
                                        $(".websitebox_back-top").hide();
                                    } else {
                                        $(".websitebox_back-top").show();
                                    }
                                })
                            })
                        </script>
                    ';
                }
            }
            //手机客服
            $websitebox_shoujikefu = get_option('websitebox_shoujikefu');
            if(isset($websitebox_shoujikefu['auto']) && ($websitebox_shoujikefu['auto']==1)){
               echo '<div class="websitebox_container">
            		<div class="websitebox_spliter"></div>
            		<div class="websitebox_wave websitebox_solid websitebox_warning">
            			<div class="websitebox_circle"></div>
            			<div class="websitebox_content">';
            			if(isset($websitebox_shoujikefu['phone']) && $websitebox_shoujikefu['phone']){
            			    echo '<a href="tel:'.$websitebox_shoujikefu['phone'].'">';
            			}else{
            			    echo '<a href="tel:400-0000-688">';
            			}
            			if(isset($websitebox_shoujikefu['kefuicon']) && $websitebox_shoujikefu['kefuicon']){
            				 echo '<img src="'.$websitebox_shoujikefu['kefuicon'].'" style="width:50px;height:50px;border-radius:50%;vertical-align: middle;">';
            			}else{
            			     echo ' <img src="'.plugin_dir_url( WEBSITEBOX_FILE ).'images/wztbbxkf.png" style="width:50px;height:50px;border-radius:50%;vertical-align: middle;">';
            			}
            			echo '	</a>
            			</div>
            		</div>
            	</div>
               ';
            }
            $websitebox_sitebg = get_option('websitebox_sitebg');
            if(isset($websitebox_sitebg['auto'])&&$websitebox_sitebg['auto']){
                if(!isset($websitebox_sitebg['mobile_auto']) || !$websitebox_sitebg['mobile_auto']){
                        // 手机隐藏
                        echo '
                        <style>
                        @media screen and (max-width:750px){
                            .smhide {
                                display:none!important;
                            }
                            #bgCanvas {
                                display:none!important;
                            }
                            .snowfall-flakes {
                                display:none!important;
                            }
                            .stars {
                                display:none!important;
                            }
                            body {
                                background: none!important;
                                background-color: #fff!important;
                            }
                        }
                        </style>
                        ';
                    }
                if(isset($websitebox_sitebg['type']) && $websitebox_sitebg['type']==3){
                    
                    if($websitebox_sitebg['texiao']==1){
                         wp_enqueue_script( 'cav', plugin_dir_url( WEBSITEBOX_FILE ).'js/cav.js', array('jquery'), '', false);
                        wp_enqueue_script( 'getstart', plugin_dir_url( WEBSITEBOX_FILE ).'js/getstart.js', array('jquery'), '', false);
                         echo '<div id="container" class="smhide" style="position: fixed; bottom: 0;top: 0;left: 0; right: 0;z-index: -1;">
                            <div id="anitOut" class="anitOut" style="width:800px; height:100%;">
                            </div>
                            </div>';
                    }elseif($websitebox_sitebg['texiao']==2){
                        wp_enqueue_script( 'ribbon', plugin_dir_url( WEBSITEBOX_FILE ).'js/ribbon.js', array('jquery'), '', false);
                    }elseif($websitebox_sitebg['texiao']==3){
                        echo '<div align="center" class="smhide" style=" position:fixed; left:0; top:0px; width:100%;bottom:0; height:100%;z-index:-1;">
                        <canvas id="q" width="1440" height="1000"></canvas>
                        </div><script>
                            
                                    //设备宽度
                                    var s = window.screen;
                                     var width = q.width = s.width;
                                    var height = q.height;
                                    var yPositions = Array(300).join(0).split("");
                                     var ctx = q.getContext("2d");
                                    var draw = function() {
                                             ctx.fillStyle = "rgba(0,0,0,.05)";
                                             ctx.fillRect(0, 0, width, height);
                                             ctx.fillStyle = "green";/*代码颜色*/
                                             ctx.font = "10pt Georgia";
                                             yPositions.map(function(y, index) {
                                                     text = String.fromCharCode(1e2 + Math.random() * 330);
                                                     x = (index * 10) + 10;
                                                     q.getContext("2d").fillText(text, x, y);
                                                     if (y > Math.random() * 1e4) {
                                                            yPositions[index] = 0;
                                                         } else {
                                                            yPositions[index] = y + 10;
                                                         }
                                                });
                                         };
                                    RunMatrix();
                                   function RunMatrix() {
                                            Game_Interval = setInterval(draw,30);
                                         }
                         </script>
                         ';
                    }elseif($websitebox_sitebg['texiao']==4){
                        wp_enqueue_script( 'snowfall', plugin_dir_url( WEBSITEBOX_FILE ).'js/snowfall.jquery.js', array('jquery'), '', false);
                        echo '<script>
                        jQuery(document).ready(function($){
                            window.onload=function(){
                            $(document).snowfall("clear");
                            $(document).snowfall({
                                image: "'.plugin_dir_url( WEBSITEBOX_FILE ).'images/huaban.png",
                                flakeCount:30,
                                minSize: 5,
                                maxSize: 22
                            });
                            }
                        })
                            
                                </script>';
                    }elseif($websitebox_sitebg['texiao']==5){
                        wp_enqueue_script( 'particle', plugin_dir_url( WEBSITEBOX_FILE ).'js/canvas-particle.js', array('jquery'), '', false);
                        echo '<div id="mydiv" class="smhide" style="position:absolute;top:0px;left:0px;width:100%;height:100%;z-index:-1"></div><script type="text/javascript">
                        		
                        		window.onload =function() {
                        		    //配置
                        			var width = window.innerWeight || document.documentElement.clientWidth || document.body.clientWidth;
                        			var height = window.innerWeight || document.documentElement.clientHeight || document.body.clientHeight;
                        
                        		    var config = {
                        		        vx: 4,	//小球x轴速度,正为右，负为左
                        		        vy: 4,	//小球y轴速度
                        		        height: 2,	//小球高宽，其实为正方形，所以不宜太大
                        		        width: 2,
                        		        count: 200,		//点个数
                        		        color: "121, 162, 185", 	//点颜色
                        		        stroke: "130,255,255", 		//线条颜色
                        		        dist: 6000, 	//点吸附距离
                        		        e_dist: 20000, 	//鼠标吸附加速距离
                        		        max_conn: 10 	//点到点最大连接数
                        		    }
                        
                        		    //调用
                        		    CanvasParticle(config);
                        		}
                        		
                        </script>';
                        
                    }elseif($websitebox_sitebg['texiao']==6){
                        echo '<style>
                        body {
                          background: radial-gradient(200% 100% at bottom center, #f7f7b6, #e96f92, #75517d, #1b2947);
                          background: radial-gradient(220% 105% at top center, #1b2947 10%, #75517d 40%, #e96f92 65%, #f7f7b6);
                          background-attachment: fixed;
                        }
                        
                        @keyframes rotate {
                          0% {
                            transform: perspective(400px) rotateZ(20deg) rotateX(-40deg) rotateY(0);
                          }
                          100% {
                            transform: perspective(400px) rotateZ(20deg) rotateX(-40deg) rotateY(-360deg);
                          }
                        }
                        .stars {
                          transform: perspective(500px);
                          transform-style: preserve-3d;
                          position: fixed;
                          bottom: 0;
                          perspective-origin: 50% 100%;
                          left: 50%;
                          z-index:-1;
                          animation: rotate 90s infinite linear;
                        }
                        
                        .star {
                          width: 2px;
                          height: 2px;
                          background: #F7F7B6;
                          position: absolute;
                          top: 0;
                          left: 0;
                          transform-origin: 0 0 -300px;
                          transform: translate3d(0, 0, -300px);
                          backface-visibility: hidden;
                        }
                        .table{
                        	width: 400px;
                        	height: 350px;
                        	margin: 80px auto;
                        }
                        .table form{
                        	width: 100%;
                        }
                        .table .name{
                        	width: 280px;
                        	margin: 20px auto 30px auto;
                        	display: block;
                        	height: 30px;
                        	border-radius: 20px;
                        	border: none;
                        	background: rgba(0,0,0,0.2);
                        	text-indent: 0.5em;
                        }
                        .table .btn{
                        	width: 100px;
                        	height: 30px;
                        	background: rgba(0,0,0,0.1);
                        	border-radius: 8px;
                        	border: none;
                        	color: white;
                        	margin: 0 auto;
                        	display: block;
                        }</style>
                        <div class="stars"></div>
                        <script>
                        jQuery(document).ready(function($){
                          var stars=800;  /*星星的密集程度，数字越大越多*/
                          var $stars=$(".stars");
                          var r=800;   /*星星的看起来的距离,值越大越远,可自行调制到自己满意的样子*/
                          for(var i=0;i<stars;i++){
                            var $star=$("<div/>").addClass("star");
                            $stars.append($star);
                          }
                          $(".star").each(function(){
                            var cur=$(this);
                            var s=0.2+(Math.random()*1);
                            var curR=r+(Math.random()*300);
                            cur.css({ 
                              transformOrigin:"0 0 "+curR+"px",
                              transform:" translate3d(0,0,-"+curR+"px) rotateY("+(Math.random()*360)+"deg) rotateX("+(Math.random()*-50)+"deg) scale("+s+","+s+")"
                               
                            })
                          })
                        })
                        </script>';
                    }elseif($websitebox_sitebg['texiao']==7){
                        echo '<div class="canvaszz smhide"> </div>
            			<canvas id="canvas" class="smhide" style="position:fixed;top: 0px;z-index:-1;bottom:0px;"></canvas>
            		<script>
            			//宇宙特效
            			"use strict";
            			var canvas = document.getElementById("canvas"),
            				ctx = canvas.getContext("2d"),
            				w = canvas.width = window.innerWidth,
            				h = canvas.height = document.body.clientHeight,
            
            				hue = 217,
            				stars = [],
            				count = 0,
            				maxStars = 1300; //星星数量
            
            			var canvas2 = document.createElement("canvas"),
            				ctx2 = canvas2.getContext("2d");
            			canvas2.width = 100;
            			canvas2.height = 100;
            			var half = canvas2.width / 2,
            				gradient2 = ctx2.createRadialGradient(half, half, 0, half, half, half);
            			gradient2.addColorStop(0.025, "#CCC");
            			gradient2.addColorStop(0.1, "hsl(" + hue + ", 61%, 33%)");
            			gradient2.addColorStop(0.25, "hsl(" + hue + ", 64%, 6%)");
            			gradient2.addColorStop(1, "transparent");
            
            			ctx2.fillStyle = gradient2;
            			ctx2.beginPath();
            			ctx2.arc(half, half, half, 0, Math.PI * 2);
            			ctx2.fill();
            
            			// End cache
            
            			function random(min, max) {
            				if (arguments.length < 2) {
            					max = min;
            					min = 0;
            				}
            
            				if (min > max) {
            					var hold = max;
            					max = min;
            					min = hold;
            				}
            
            				return Math.floor(Math.random() * (max - min + 1)) + min;
            			}
            
            			function maxOrbit(x, y) {
            				var max = Math.max(x, y),
            					diameter = Math.round(Math.sqrt(max * max + max * max));
            				return diameter / 2;
            				//星星移动范围，值越大范围越小，
            			}
            
            			var Star = function() {
            
            				this.orbitRadius = random(maxOrbit(w, h));
            				this.radius = random(60, this.orbitRadius) / 8;
            				//星星大小
            				this.orbitX = w / 2;
            				this.orbitY = h / 2;
            				this.timePassed = random(0, maxStars);
            				this.speed = random(this.orbitRadius) / 50000;
            				//星星移动速度
            				this.alpha = random(2, 10) / 10;
            
            				count++;
            				stars[count] = this;
            			}
            
            			Star.prototype.draw = function() {
            				var x = Math.sin(this.timePassed) * this.orbitRadius + this.orbitX,
            					y = Math.cos(this.timePassed) * this.orbitRadius + this.orbitY,
            					twinkle = random(10);
            
            				if (twinkle === 1 && this.alpha > 0) {
            					this.alpha -= 0.05;
            				} else if (twinkle === 2 && this.alpha < 1) {
            					this.alpha += 0.05;
            				}
            
            				ctx.globalAlpha = this.alpha;
            				ctx.drawImage(canvas2, x - this.radius / 2, y - this.radius / 2, this.radius, this.radius);
            				this.timePassed += this.speed;
            			}
            
            			for (var i = 0; i < maxStars; i++) {
            				new Star();
            			}
            
            			function animation() {
            				ctx.globalCompositeOperation = "source-over";
            				ctx.globalAlpha = 0.5; //尾巴
            				ctx.fillStyle = "hsla(" + hue + ", 64%, 6%, 2)";
            				ctx.fillRect(0, 0, w, h)
            
            				ctx.globalCompositeOperation = "lighter";
            				for (var i = 1, l = stars.length; i < l; i++) {
            					stars[i].draw();
            				};
            
            				window.requestAnimationFrame(animation);
            			}
            
            			animation();
            		</script>';
                    }elseif($websitebox_sitebg['texiao']==8){
                        echo '
                        
                        <style>
                            .bbxscene .wall {
                                background: url('.plugin_dir_url( WEBSITEBOX_FILE ).'images/wztxingkong.jpg);
                                background-size: cover;
                            }
                            
                            body {
                                background-color: #111;
                            }
                            
                            .bbxscene {
                                z-index: -1;
                                display: inline-block;
                                vertical-align: middle;
                                perspective: 5px;
                                perspective-origin: 50% 50%;
                                position: fixed;
                                top: 50%;
                                left: 50%;
                            }
                            
                            .bbxwrap {
                                position: absolute;
                                width: 1000px;
                                height: 1000px;
                                left: -500px;
                                top: -500px;
                                transform-style: preserve-3d;
                                animation: move 12s infinite linear;
                                animation-fill-mode: forwards;
                            }
                            
                            .bbxwrap:nth-child(2) {
                                animation: move 12s infinite linear;
                                animation-delay: 6s;
                            }
                            
                            .bbxscene .wall {
                                width: 100%;
                                height: 100%;
                                position: absolute;
                                opacity: 0;
                                animation: fade 12s infinite linear;
                                animation-delay: 0;
                            }
                            
                            .bbxwrap:nth-child(2) .wall {
                                animation-delay: 6s;
                            }
                            
                            .wall-right {
                                transform: rotateY(90deg) translateZ(500px);
                            }
                            
                            .wall-left {
                                transform: rotateY(-90deg) translateZ(500px);
                            }
                            
                            .wall-top {
                                transform: rotateX(90deg) translateZ(500px);
                            }
                            
                            .wall-bottom {
                                transform: rotateX(-90deg) translateZ(500px);
                            }
                            
                            .wall-back {
                                transform: rotateX(180deg) translateZ(500px);
                            }
                            
                            @keyframes move {
                                0% {
                                    transform: translateZ(-500px) rotate(0deg);
                                }
                                100% {
                                    transform: translateZ(500px) rotate(0deg);
                                }
                            }
                            
                            @keyframes fade {
                                0% {
                                    opacity: 0;
                                }
                                25% {
                                    opacity: 1;
                                }
                                75% {
                                    opacity: 1;
                                }
                                100% {
                                    opacity: 0;
                                }
                            }
                        </style>
                        <div class="bbxscene smhide" >
                            <div class="bbxwrap smhide" >
                                <div class="wall wall-right"></div>
                                <div class="wall wall-left"></div>
                                <div class="wall wall-top"></div>
                                <div class="wall wall-bottom"></div>
                                <div class="wall wall-back"></div>
                            </div>
                            <div class="bbxwrap" class="smhide">
                                <div class="wall wall-right"></div>
                                <div class="wall wall-left"></div>
                                <div class="wall wall-top"></div>
                                <div class="wall wall-bottom"></div>
                                <div class="wall wall-back"></div>
                            </div>
                        </div>
                        ';
                    }elseif($websitebox_sitebg['texiao']==9){
                        echo '
                        <style>
                            /*澶╃┖*/
                            
                            .sky {
                                position: absolute;
                                left: 0;
                                top: 0;
                                width: 100%;
                                height: 90%;
                                background: -webkit-linear-gradient(top, #7da2e8, #c3deee 30%, #f7fcff);
                                background: -moz-linear-gradient(top, #7da2e8, #c3deee 30%, #f7fcff);
                                background: -ms-linear-gradient(top, #7da2e8, #c3deee 30%, #f7fcff);
                                background: linear-gradient(top, #7da2e8, #c3deee 30%, #f7fcff);
                            }
                            /*娴锋磱*/
                            
                            .sea {
                                position: absolute;
                                left: 0;
                                bottom: 0;
                                width: 100%;
                                height: 20%;
                                z-index: 4;
                                background: -webkit-linear-gradient(top, #e7eef8, #89a0c4 35%, #455d83 70%, #23375e);
                                background: -moz-linear-gradient(top, #e7eef8, #89a0c4 35%, #455d83 70%, #23375e);
                                background: -ms-linear-gradient(top, #e7eef8, #89a0c4 35%, #455d83 70%, #23375e);
                                background: linear-gradient(top, #e7eef8, #89a0c4 35%, #455d83 70%, #23375e);
                            }
                            /*澶槼*/
                            
                            .sun {
                                position: absolute;
                                width: 200%;
                                height: 200%;
                                left: -50%;
                                top: -25%;
                                z-index: 2;
                                background: -webkit-radial-gradient(center center, circle, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.1) 6%, rgba(255, 255, 255, 0));
                                background: -moz-radial-gradient(center center, circle, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.1) 6%, rgba(255, 255, 255, 0));
                                background: -ms-radial-gradient(center center, circle, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.1) 6%, rgba(255, 255, 255, 0));
                                background: radial-gradient(center center, circle, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.1) 6%, rgba(255, 255, 255, 0));
                            }
                            
                            .sun .kernel {
                                position: absolute;
                                width: 100%;
                                height: 100%;
                                top: 0;
                                left: 0;
                                background: -webkit-radial-gradient(center center, circle, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.1) 4%, rgba(255, 255, 255, 0));
                                background: -moz-radial-gradient(center center, circle, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.1) 4%, rgba(255, 255, 255, 0));
                                background: -ms-radial-gradient(center center, circle, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.1) 4%, rgba(255, 255, 255, 0));
                                background: radial-gradient(center center, circle, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.1) 4%, rgba(255, 255, 255, 0));
                            }
                            /*姘旀场*/
                            
                            .bubble {
                                position: absolute;
                                font-size: 0;
                                line-height: 0;
                                width: 10px;
                                height: 10px;
                                border-radius: 50%;
                                bottom: 0px;
                                border-radius: 50%;
                                box-shadow: 0px 0px 2px rgba(255, 255, 255, 0.6) inset, -1px 1px 2px -1px rgba(0, 204, 255, 0.1);
                                transform: skew(0deg, 2deg);
                                animation: bubbleRise 4s linear infinite;
                            }
                            
                            .bubble1 {
                                left: 20px;
                                width: 3px;
                                height: 3px;
                                animation: bubbleRise 6s linear infinite;
                            }
                            
                            .bubble2 {
                                left: 60px;
                                width: 5px;
                                height: 4px;
                                animation: bubbleRise 5s linear infinite;
                            }
                            
                            .bubble3 {
                                left: 120px;
                                width: 4px;
                                height: 3px;
                                animation: bubbleRise 7s linear infinite;
                            }
                            
                            .bubble4 {
                                right: 30px;
                                width: 5px;
                                height: 4px;
                                animation: bubbleRise 4s linear infinite;
                            }
                            
                            .bubble5 {
                                right: 70px;
                                width: 4px;
                                height: 4px;
                                animation: bubbleRise 6s linear infinite;
                            }
                            
                            .bubble6 {
                                right: 160px;
                                width: 5px;
                                height: 4px;
                                animation: bubbleRise 7s linear infinite;
                            }
                            
                            .bubble7 {
                                right: 120px;
                                width: 8px;
                                height: 7px;
                                animation: bubbleRise 5s linear infinite;
                            }
                            
                            @keyframes bubbleRise {
                                0% {
                                    transform: translate(0px, 0px);
                                    opacity: 0;
                                    border-color: rgba(255, 255, 255, 0.2);
                                }
                                10% {
                                    transform: translate(0px, 0px);
                                    opacity: 1;
                                }
                                30% {
                                    transform: translate(-1px, -30px);
                                }
                                50% {
                                    transform: translate(1px, -60px);
                                }
                                75% {
                                    transform: translate(-1px, -90px) scale(1.2);
                                }
                                98% {
                                    opacity: 1;
                                    border-color: rgba(255, 255, 255, 0.35);
                                }
                                100% {
                                    transform: translate(0px, -120px) scale(1.4);
                                    opacity: 0;
                                    border-color: rgba(255, 255, 255, 0.2);
                                }
                            }
                            
                            @keyframes bubbleRise {
                                0% {
                                    transform: translate(0px, 0px);
                                    opacity: 0;
                                    border-color: rgba(255, 255, 255, 0.1);
                                }
                                10% {
                                    transform: translate(0px, 0px);
                                    opacity: 1;
                                }
                                30% {
                                    transform: translate(-1px, -15px);
                                }
                                50% {
                                    transform: translate(1px, -30px);
                                }
                                75% {
                                    transform: translate(-1px, -50px) scale(1.2);
                                }
                                98% {
                                    opacity: 1;
                                    border-color: rgba(255, 255, 255, 0.25);
                                }
                                100% {
                                    transform: translate(0px, -67px) scale(1.4);
                                    opacity: 0;
                                    border-color: rgba(255, 255, 255, 0.1);
                                }
                            }
                            /*姘存瘝*/
                            
                            .jellyfish1 {
                                right: 50px;
                                bottom: 65px;
                            }
                            
                            .jellyfish2 {
                                left: 120px;
                                bottom: 30px;
                            }
                            
                            .jellyfish {
                                position: absolute;
                                -webkit-animation: jellyfishSwimming 4s linear infinite alternate;
                                -moz-animation: jellyfishSwimming 4s linear infinite alternate;
                                animation: jellyfishSwimming 4s linear infinite alternate;
                                opacity: 0.5;
                            }
                            
                            .jellyfish_head {
                                position: absolute;
                                left: 0px;
                                top: 0px;
                                display: block;
                                height: 15px;
                                width: 20px;
                                background: rgba(255, 255, 255, 0.15);
                                border: 1px solid rgba(255, 255, 255, 0.5);
                                border-radius: 20px 20px 10px 10px/20px 20px 16px 16px;
                                box-shadow: 0px 0px 4px rgba(255, 255, 255, 0.5) inset, 1px 1px 2px rgba(255, 255, 255, 0.2) inset, 3px 3px 1px rgba(255, 255, 255, 0.2) inset, -1px -1px 1px rgba(255, 255, 255, 0.1) inset;
                                animation: jellyfish_headChange 4s linear infinite alternate;
                            }
                            
                            .jellyfish_head:after {
                                content: " ";
                                display: block;
                                height: 3px;
                                width: 5px;
                                background: rgba(255, 255, 255, 0.4);
                                position: absolute;
                                left: 3px;
                                top: 2px;
                                border-radius: 5px/3px;
                                box-shadow: 0px 0px 1px rgba(255, 255, 255, 0.8) inset;
                                transform: rotate(-15deg);
                            }
                            
                            .jellyfish_tail {
                                position: absolute;
                                left: 2px;
                                top: 15px;
                                display: block;
                                height: 20px;
                                width: 18px;
                                border: 0.5px solid rgba(255, 255, 255, 0.4);
                                border-top: none;
                                border-bottom: none;
                                border-radius: 10px 10px 16px 6px/20px 20px 6px 6px;
                                box-shadow: 0px 0px 3px rgba(255, 255, 255, 0.3) inset, 0px 4px 3px rgba(255, 255, 255, 0.1) inset;
                                -webkit-transform-origin: 50% 0%;
                                -webkit-animation: jellyfish_tailChange 4s linear infinite alternate;
                                -moz-transform-origin: 50% 0%;
                                -moz-animation: jellyfish_tailChange 4s linear infinite alternate;
                            }
                            
                            .jellyfish_tail:after {
                                content: " ";
                                position: absolute;
                                left: 0.5px;
                                top: 1px;
                                display: block;
                                height: 21px;
                                width: 15.5px;
                                border: 0.5px solid rgba(255, 255, 255, 0.3);
                                border-right-color: rgba(255, 255, 255, 0.4);
                                border-top: none;
                                border-bottom: none;
                                border-radius: 10px/10px 20px 16px 16px;
                                box-shadow: 0px 0px 3px rgba(255, 255, 255, 0.3) inset, 0px 3px 3px rgba(255, 255, 255, 0.2) inset;
                            }
                            
                            .jellyfish_tail:before {
                                content: " ";
                                position: absolute;
                                left: 1.5px;
                                top: 1px;
                                display: block;
                                height: 17px;
                                width: 17px;
                                border-right: 0.5px solid rgba(255, 255, 255, 0.4);
                                border-radius: 15px 10px 16px 16px/30px 30px 8px 8px;
                                shadow: 0px 0px 3px rgba(255, 255, 255, 0.3) inset;
                                -webkit-transform: rotate(-6deg);
                                -moz-transform: rotate(-6deg);
                            }
                            
                            .jellyfish_tail_in {
                                position: absolute;
                                left: -0.5px;
                                top: 0px;
                                display: block;
                                height: 16px;
                                width: 10px;
                                border-left: 0.5px solid rgba(255, 255, 255, 0.4);
                                border-radius: 10px 20px 16px 10px/20px 20px 6px 20px;
                                box-shadow: 3px 0px 3px rgba(255, 255, 255, 0.2) inset;
                                -webkit-transform: rotate(14deg);
                                -moz-transform: rotate(14deg);
                            }
                            
                            @keyframes jellyfishSwimming {
                                0% {
                                    transform: translate(0px, 0px) rotate(-4deg) scale(0.8);
                                }
                                20% {
                                    transform: translate(-1px, -3px) rotate(-6deg) scale(0.8);
                                }
                                50% {
                                    transform: translate(-2px, -1px) rotate(-3deg) scale(0.8);
                                }
                                70% {
                                    transform: translate(-1px, -3px) rotate(-6deg) scale(0.8);
                                }
                                100% {
                                    transform: translate(0px, 0px) rotate(-4deg) scale(0.8);
                                }
                            }
                            
                            @keyframes jellyfish_tailChange {
                                0% {
                                    transform: scale(0.8);
                                }
                                5% {
                                    transform: scale(0.9, 0.75);
                                }
                                20% {
                                    transform: scale(0.7, 1);
                                }
                                50% {
                                    transform: scale(0.8);
                                }
                                55% {
                                    transform: scale(0.9, 0.75);
                                }
                                70% {
                                    transform: scale(0.7, 1);
                                }
                                100% {
                                    transform: scale(0.8);
                                }
                            }
                            
                            @keyframes jellyfish_tailChange {
                                0% {
                                    transform: scale(0.8);
                                }
                                5% {
                                    transform: scale(0.9, 0.75);
                                }
                                20% {
                                    transform: scale(0.7, 1);
                                }
                                50% {
                                    transform: scale(0.8);
                                }
                                55% {
                                    transform: scale(0.9, 0.75);
                                }
                                70% {
                                    transform: scale(0.7, 1);
                                }
                                100% {
                                    transform: scale(0.8);
                                }
                            }
                            
                            .yangguang {
                                z-index: -1;
                                width: 100%;
                                height: 100%;
                                overflow: hidden;
                                position: fixed;
                                top: 0;
                                left: 0;
                            }
                        </style>
                        <div class="yangguang smhide">
                            <div class="sky"></div>
                    
                            <div class="sun">
                                <div class="kernel"></div>
                                <div class="shine"></div>
                            </div>
                    
                            <div class="sea">
                                <div class="bubble bubble1"></div>
                                <div class="bubble bubble2"></div>
                                <div class="bubble bubble3"></div>
                                <div class="bubble bubble4"></div>
                                <div class="bubble bubble5"></div>
                                <div class="bubble bubble6"></div>
                                <div class="bubble bubble7"></div>
                                <div class="jellyfish jellyfish1">
                                    <div class="jellyfish_head"></div>
                                    <div class="jellyfish_tail">
                                        <div class="jellyfish_tail_in"></div>
                                    </div>
                                </div>
                                <div class="jellyfish jellyfish2">
                                    <div class="jellyfish_head"></div>
                                    <div class="jellyfish_tail">
                                        <div class="jellyfish_tail_in"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                }
            } 
        //鼠标特效
        $websitebox_sbtexiao= get_option('websitebox_sbtexiao'); 
        if(isset($websitebox_sbtexiao['sb_texiao']) && $websitebox_sbtexiao['sb_texiao']==1){
            if($websitebox_sbtexiao['fengge']==1){
                $fengge = 'drop';
            }elseif($websitebox_sbtexiao['fengge']==2){
                $fengge = 'spread';
            }elseif($websitebox_sbtexiao['fengge']==3){
                $fengge = 'sudoku';
            }
            if($websitebox_sbtexiao['sb_tantiao']==1){
                $sb_tantiao = 'true';
            }else{
                $sb_tantiao = 'false';
            }
            if($websitebox_sbtexiao['sb_huadong']==1){
                $sb_huadong = 'true';
            }else{
                $sb_huadong = 'false';
            }
            if($websitebox_sbtexiao['sb_touming']==1){
                $sb_touming = 'true';
            }else{
                $sb_touming = 'false';
            }
            if($websitebox_sbtexiao['nav']==1){
                 echo '<script>
                    jQuery(document).ready(function($){
                    $("body").addClass("websitebox_body");
                    let vsClick = new VsClick({
                          effect: "'.$fengge.'",
                          dom:"websitebox_body",
                          timer: "'.$websitebox_sbtexiao["sb_shixu"].'",
                          height: "'.$websitebox_sbtexiao["sb_gaodu"].'",
                          width: "'.$websitebox_sbtexiao["sb_kuandu"].'",
                          spring: "'.$sb_tantiao.'",
                          slide: "'.$sb_huadong.'", 
                            lucency: "'.$sb_touming.'"
                        })
                    })
                </script>';
            }elseif($websitebox_sbtexiao['nav']==2){
                echo '<script>
                    jQuery(document).ready(function($){
                    $("body").addClass("websitebox_body");
                    let vsClick = new VsClick({
                          effect: "'.$fengge.'",
                          dom:"websitebox_body",
                          emoji: ["🍋", "🍌", "🍉", "🍎", "🍒", "🍓", "🌽"],
                          timer: "'.$websitebox_sbtexiao["sb_shixu"].'",
                         
                           width: "'.$websitebox_sbtexiao["sb_kuandu"].'",
                          spring: "'.$sb_tantiao.'",
                          slide: "'.$sb_huadong.'", 
                            lucency: "'.$sb_touming.'"
                        })
                    })
                </script>';
            }elseif($websitebox_sbtexiao['nav']==3){
                echo '<script>
                    jQuery(document).ready(function($){
                    $("body").addClass("websitebox_body");
                    let vsClick = new VsClick({
                          effect: "'.$fengge.'",
                          dom:"websitebox_body",
                          emoji: ["😍", "😆", "😀", "😂", "🤣", "😒", "😘", "😁", "😉", "😎"],
                          timer: "'.$websitebox_sbtexiao["sb_shixu"].'",
                         
                           width: "'.$websitebox_sbtexiao["sb_kuandu"].'",
                          spring: "'.$sb_tantiao.'",
                          slide: "'.$sb_huadong.'", 
                            lucency: "'.$sb_touming.'"
                        })
                    })
                </script>';
            }elseif($websitebox_sbtexiao['nav']==4){
                $title = explode(',',$websitebox_sbtexiao['title']);
                 echo '<script>
                    jQuery(document).ready(function($){
                    $("html").addClass("websitebox_body");
                    let vsClick = new VsClick({
                          effect: "'.$fengge.'",
                          dom:"websitebox_body",
                          emoji: '.json_encode($title).',
                          timer: "'.$websitebox_sbtexiao["sb_shixu"].'",
                         
                           width: "'.$websitebox_sbtexiao["sb_kuandu"].'",
                          spring: "'.$sb_tantiao.'",
                          slide: "'.$sb_huadong.'", 
                            lucency: "'.$sb_touming.'"
                        })
                    })
                </script>';
            }
           
        }
        
        if(is_home() || is_front_page()){
            $websitebox_alert = get_option('websitebox_alert');
            if(isset($websitebox_alert['auto']) && $websitebox_alert['auto']==1){
                if(isset($websitebox_alert['pic_auto']) && $websitebox_alert['pic_auto']==1){
                    //弹出图片
                    echo '
                    <div class="websitebox_wztbaibao_box"></div>
                    <div class="websitebox_imgpopup">
                        <img src="'.$websitebox_alert['pic'].'" alt="">
                        <span class="websitebox_imgpopupgb"><img src="'.plugin_dir_url( WEBSITEBOX_FILE ).'images/wzt_chahao.png"></span>
                    </div>
                    <script>
                    jQuery(document).ready(function($){
                		$(".websitebox_wztbaibao_box").click(function(event){
                			$(this).hide()
                			$(".websitebox_imgpopup").hide()
                		})
                		$(".websitebox_imgpopupgb").click(function(event){
                			$(".websitebox_wztbaibao_box").hide()
                			$(".websitebox_imgpopup").hide()
                		})
        			})
        			</script>
                    ';
                }else{
                    echo '<div class="websitebox_wztbaibao_box">
    			
    	                </div>
                		<div class="websitebox_wztbaibao_box1">
            				<h3 style="background:'.$websitebox_alert['bg'].';color:'.$websitebox_alert['word'].';text-align: center;">'.$websitebox_alert['title'].'</h3>
            				<div class="websitebox_wztbaibao_box2">
            				<p style="color:'.$websitebox_alert['content_color'].'">'.$websitebox_alert['content'].'</p>
            				</div>
            			</div>
            			<script>
            			jQuery(document).ready(function($){
                    		$(".websitebox_wztbaibao_box").click(function(event){
                    			$(".websitebox_wztbaibao_box").css("display","none")
                    			$(".websitebox_wztbaibao_box1").css("display","none")
                    		})
            			})
                    	</script>';
                }
            }
            $websitebox_scroll = get_option('websitebox_scroll');
            if(isset($websitebox_scroll['auto']) && $websitebox_scroll['auto']==1){
                $websitebox_scroll['speed'] = isset($websitebox_scroll['speed'])&& $websitebox_scroll['speed']?$websitebox_scroll['speed']:10;
                echo '<div class="websitebox_demo" style="background:'.$websitebox_scroll['bg'].';position: fixed;top: 0;z-index: 999999;">
                        <div>
            				<div class="websitebox_demo-cont">
            					<div class="websitebox_txt-scroll websitebox_txt-scroll-curs">
            						<div class="websitebox_scrollbox">
            							<div class="websitebox_txt" style="color:'.$websitebox_scroll['word'].'">
            							    '.$websitebox_scroll['content'].'
            							</div>
            						</div>
            					</div>
            				</div>
            			</div>
            		</div>
		        </div>
		        <script>
		        jQuery(document).ready(function($){
		            $.fn.txtscroll = function(options) {
                        var settings = $.extend({
                            "speed": 10
                        },
                        options);
                        return this.each(function() {
                            var $this = $(this);
                            var $settings = settings;
                            var scrollbox = $(".websitebox_scrollbox", $this);
                            var txt_begin = $(".websitebox_txt", $this);
                            var txt_end = $("<div class=\'websitebox_txt-clone\'></div>");
                            var scrollVaue = 0;
                            function marquee() {
                                if (txt_end.width() - scrollbox.scrollLeft() <= 0) {
                                    scrollVaue = scrollbox.scrollLeft() - txt_begin.width();
                                    scrollbox.scrollLeft(scrollVaue);
                                } else {
                                    scrollVaue = scrollVaue + 1;
                                    scrollbox.scrollLeft(scrollVaue);
                                }
                            }
                            begin_scroll();
                            function begin_scroll(){
                                if (txt_begin.width() > scrollbox.width()) {
                                    txt_end.html(txt_begin.html());
                                    txt_end.css("color",txt_begin.css("color"))
                                    scrollbox.append(txt_end);
                                    var setmarquee = setInterval(marquee, $settings.speed);
                                    $this.on("mouseover",
                                    function() {
                                        clearInterval(setmarquee);
                                    });
                                    $this.on("mouseout",
                                    function() {
                                        setmarquee = setInterval(marquee, $settings.speed);
                                    });
                                }else {
                                    txt_begin.append("&nbsp;");
                                    
                                    begin_scroll();
                                    
                                }
                            }
                        });
                    };
                    $(".websitebox_txt-scroll-curs").txtscroll({
                				"speed": '.$websitebox_scroll['speed'].'
                			});
		        })
                </script>
		        ';
		      
            }
        }
    }
}