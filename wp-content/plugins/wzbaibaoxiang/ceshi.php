
		<div class="websitebox_box">
			
			<div class="websitebox_news">
				<ul>
						<a href="<?php echo esc_url(admin_url( 'admin.php?page=websitebox&nonce='.esc_attr(wp_create_nonce('websitebox')))); ?>" ><li>常规设置</li></a>
        			<a href="<?php echo esc_url(admin_url( 'admin.php?page=websitebox&book=11&nonce='.esc_attr(wp_create_nonce('websitebox')))); ?>" ><li>WP优化</li></a>
        			<a href="<?php echo esc_url(admin_url( 'admin.php?page=websitebox&book=1&nonce='.esc_attr(wp_create_nonce('websitebox')))); ?>" ><li>侧边客服</li></a>
        			<a href="<?php echo esc_url(admin_url( 'admin.php?page=websitebox&book=9&nonce='.esc_attr(wp_create_nonce('websitebox')))); ?>" ><li>手机客服</li></a>
        			<a href="<?php echo esc_url(admin_url( 'admin.php?page=websitebox&book=3&nonce='.esc_attr(wp_create_nonce('websitebox')))); ?>"><li>留言板</li></a>
        			<a href="<?php echo esc_url(admin_url( 'admin.php?page=websitebox&book=4&nonce='.esc_attr(wp_create_nonce('websitebox')))); ?>"><li>网站背景</li></a>
        			<a href="<?php echo esc_url(admin_url( 'admin.php?page=websitebox&book=5&nonce='.esc_attr(wp_create_nonce('websitebox')))); ?>"><li>提示框</li></a>
        			<a href="<?php echo esc_url(admin_url( 'admin.php?page=websitebox&book=6&nonce='.esc_attr(wp_create_nonce('websitebox')))); ?>" class="websitebox_adm"><li>滚动公告</li></a>
        			<a href="<?php echo esc_url(admin_url( 'admin.php?page=websitebox&book=7&nonce='.esc_attr(wp_create_nonce('websitebox')))); ?>"><li>图片水印</li></a>
        			<a href="<?php echo esc_url(admin_url( 'admin.php?page=websitebox&book=8&nonce='.esc_attr(wp_create_nonce('websitebox')))); ?>"><li>三合一</li></a>
        			<a href="<?php echo esc_url(admin_url( 'admin.php?page=websitebox&book=10&nonce='.esc_attr(wp_create_nonce('websitebox')))); ?>" class="websitebox_adm"><li>鼠标特效</li></a>
				</ul>
			</div>
			<div class="websitebox_centen">
			    <form class="layui-form" action="" lay-filter="example">
				<div class="websitebox_cenh3">
					<span>设置滚动公告</span>
					<input type="hidden" name="websitebox" value="7">
				  	 <input type="hidden" name="action" value="websitebox">
				  	 <input type="hidden" name="nonce" value="<?php echo esc_attr(wp_create_nonce('websitebox'));?>">
					 <button type="submit" class="layui-btn websitebox_bot" lay-submit="" lay-filter="demo1">保存设置</button>
				</div>
			
					<div class="layui-form-item websitebox_bor" pane="">
					   <label class="layui-form-label">启用滚动公告</label>
					   <div class="layui-input-block">
					       <?php 
					            if(isset($websitebox_scroll['auto']) && $websitebox_scroll['auto']==1){
					                 echo '<input type="checkbox" name="close" lay-skin="switch" lay-filter="switchgd" lay-text="开|关" checked="">';
					            }else{
					                echo '<input type="checkbox" name="close" lay-skin="switch" lay-filter="switchgd" lay-text="开|关">';
					            }
					       ?>
					     
						  <span class="websitebox_zxc">选择是否启用滚动公告</span>
					   </div>
					 </div>
					 <div class="websitebox_wystyle">
					 	 <div class="websitebox_wystyle1">
					 			<span>公告背景色</span>
					 	 </div>
					 	 <div class="layui-input-inline" style="width: 120px;">
                            <input type="text" name="bg" placeholder="请选择颜色" class="layui-input" id="test-form-input1" value="<?php if(isset($websitebox_scroll['bg']) && $websitebox_scroll['bg']){echo esc_attr($websitebox_scroll['bg']);}else{echo '#fff';}?>">
                          </div>
                          <div class="layui-inline" style="left: 10px;">
                            <div id="test1"></div>
                          </div> 
					 </div>
					 <div class="websitebox_wystyle">
					 	 <div class="websitebox_wystyle1">
					 			<span>公告文字色</span>
					 	 </div>
					 	 <div class="layui-input-inline" style="width: 120px;">
                            <input type="text" name="word" placeholder="请选择颜色" class="layui-input" id="test-form-input2" value="<?php if(isset($websitebox_scroll['word']) && $websitebox_scroll['word']){echo esc_attr($websitebox_scroll['word']);}else{echo '#000';}?>">
                          </div>
                          <div class="layui-inline" style="left: 10px;">
                            <div id="test2"></div>
                          </div>
					 </div>
					 <div class="websitebox_wystyle">
					 	 <div class="websitebox_wystyle1">
					 			<span>公告滚动速度</span>
					 	 </div>
					 	 <div class="layui-input-inline" style="width: 120px;">
                            <input type="text" name="speed" placeholder="请选择速度" class="layui-input" id="test-form-input3" value="<?php if(isset($websitebox_scroll['speed']) && $websitebox_scroll['speed']){echo esc_attr($websitebox_scroll['speed']);}else{echo '10';}?>">
                          </div>
                          <div class="layui-inline" style="left: 10px;">
                            <div id="test3"><span class="websitebox_zxc">滚动速度的值越大滚动速度越小</span></div>
                          </div>
					 </div>
					 <div class="websitebox_wystyle">
					 	 <div class="websitebox_wystyle1">
					 			<span>滚动公告内容</span>
					 	 </div> 
					 	 <div class="layui-form-item">
					 	     <label class="layui-form-label">公告内容</label>
					 	     <div>
					 	       <textarea rows=""  cols="" class="websitebox_wenben" name="content"><?php if(isset($websitebox_scroll['content']) && $websitebox_scroll['content']){echo esc_textarea($websitebox_scroll['content']);}?></textarea>
					 	     </div>
					 	 </div>
					</div>
					<div class="websitebox_wystyle">
						 <div class="websitebox_wystyle1">
								<span></span>
						 </div>
						 <div style="margin-left: 30px;">
						   <div id="test8"></div>
						   <div id="test9" style="margin-left: 30px;"></div>
						 </div>
					</div>
					
				</form>
			</div>			
		</div>
			<style>
		*{
			padding: 0;
			margin: 0;
			text-decoration: none;
		}
		.tj_lianjie{
			width:100%;
			margin: 0 auto;
			display: flex;
			justify-content: space-between;
		}
		.tj_lianjie1 a{
			display: block;
			width:550px;
			border: 1px solid #ccc;
			box-sizing: border-box;
			height: 150px;
			padding:10px;
			box-shadow: 6px 4px 10px #ccc;
			border-radius: 4px;
		}
		.tj_lianjie1 a>div{
			width:100%;
			display: flex;
			justify-content: space-between;
		}
		.tj_logo{
			width:120px;
			height:120px;
			margin-right:10px;
		}
		.tj_neirong h2{
			font-size:16px;
			line-height:30px;
			color: #000000;
		}
		.tj_neirong  p{
			font-size:12px;
			color: #000000;
		}
		.tj_neirong  span{
			font-size:14px;
			color: #000000;
		}
		.tj_anzhuang{
			width: 120px;
			height: 24px;
			border: 1px solid #ccc;
			text-align: center;
			line-height: 24px;
			border-radius: 3px;		
    	}
		.layui-form-onswitch {
		    border-color: #007DDB;
            background-color: #007DDB;
		}
		#wpwrap {
		    background-color: #fff;
		}
	</style>
		<div style="width: 1200px;padding: 10px;">
		  <h2 style="line-height: 40px;font-size: 16px;font-weight: 600;">相关推荐</h2>
		  <div class="tj_lianjie">
		  <div class="tj_lianjie1">
			  <a href="<?php echo esc_url_raw(admin_url('plugin-install.php?tab=plugin-information&plugin=baiduseo'));?>">
				  <div class="tj_neirong">
					 <img src="<?php echo esc_url(plugins_url('images/icon-256x256.png',__FILE__)); ?>" class="tj_logo">  
					   <div>
						   <h2>百度站长SEO合集</h2>
						   <p>含百度站长、百度地图sitemap、关键词排名查询监控、网站蜘蛛、robots、图片alt标签、天级推送、死链查询、百度自动推送、批量提交URL到站长、百度收录查询、批量推送未收录、301/404等功能。</p>
						   <span>作者:沃之涛科技</span>
					   </div>
					   <div class="tj_anzhuang">
						   <span>安装</span>
					   </div> 
				  </div>
				   
			  </a>
		  </div>
		  <div class="tj_lianjie1">
			  <a href="<?php echo esc_url_raw(admin_url('plugin-install.php?tab=plugin-information&plugin=auto-reply-wechat'));?>">
				  <div class="tj_neirong">
					 <img src="<?php echo esc_url(plugins_url('images/icon_weixin.png',__FILE__)); ?>" class="tj_logo">  
					   <div>
						   <h2>公众号自动回复</h2>
						   <p>本插件适用于订阅号（未认证也可以）、服务号。根据关键词自动获取网站相关文章：用户通过公众号发送关键词，公众号即可根据用户的关键词读取wordpress网站内相关的内容，推送URL回复用户。</p>
						   <span>作者:沃之涛科技</span>
					   </div>
					   <div class="tj_anzhuang">
						   <span>安装</span>
					   </div> 
				  </div>
			  </a>
		  </div>
	  </div>
		</div> 
	
	<script>
	jQuery(document).ready(function($){
	    if($("input[name='close']").attr("checked") == "checked") {
             $("textarea[name='content']").attr("lay-verify","required")
        }
	layui.use(['form', 'layedit', 'laydate','colorpicker'], function(){
	  var form = layui.form
	  ,layer = layui.layer
	  ,colorpicker = layui.colorpicker;
	  //常规使用
    	  colorpicker.render({
                elem: '#test1'
            ,color: '<?php  
                        if(isset($websitebox_scroll['bg']) && $websitebox_scroll['bg']){
                        echo esc_attr($websitebox_scroll['bg']);
                        }else{
                        echo '#fff';
                        } ?>'
            ,done: function(color){
              $('#test-form-input1').val(color);
            }
        });
         colorpicker.render({
                elem: '#test2'
            ,color: '<?php  
                        if(isset($websitebox_scroll['word']) && $websitebox_scroll['word']){
                        echo esc_attr($websitebox_scroll['word']);
                        }else{
                        echo '#000';
                        } ?>'
            ,done: function(color){
              $('#test-form-input2').val(color);
            }
        });
        //监听指定开关
        form.on('switch(switchgd)', function(data){
            console.log(this.checked)
            if(this.checked) {
                $("textarea[name='content']").attr("lay-verify","required")
            }else {
                $("textarea[name='content']").removeAttr("lay-verify")
            }
        });
        form.on('submit(demo1)', function(data){
                var index = layer.load(1, {
                    shade: [0.7,'#111'] //0.1透明度的白色背景
                });
    		  	$.ajax({
    		  		url:'',
    		  		data:{data:JSON.stringify(data.field)},
    		  		type:'post',
    		  		dataType:'json',
    		  		success:function(data){
    		  		    layer.close(index);
    		  			if(data.msg==3){
    		  				layer.confirm('该功能,点击‘确定’后登录官网进行授权', {
    						  btn: ['确定','取消'] //按钮
    						}, function(){
    						  window.location.href='https://www.rbzzz.com/qxcp.html';
    						}, function(){
    					  
    						});
    		  			}else if(data.msg==1){
    		  				layer.alert('保存成功');
    		  			}else{
    		  				layer.msg('保存失败，请刷新后重试');
    		  			}
    		  		}
    		  	})
    		    return false;
    		});
        
	});
	})
	</script>

