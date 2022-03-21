
		<div class="websitebox_box">
			
			<div class="websitebox_news">
				<ul>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox' ); ?>" ><li>常规设置</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=11' ); ?>" ><li>WP优化</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=1' ); ?>" ><li>侧边客服</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=9' ); ?>" class="websitebox_adm"><li>手机客服</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=3' ); ?>" ><li>留言板</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=4' ); ?>"><li>网站背景</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=5' ); ?>" ><li>提示框</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=6' ); ?>"><li>滚动公告</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=7' ); ?>"><li>图片水印</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=8' ); ?>"><li>三合一</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=10' ); ?>"><li>鼠标特效</li></a>
					<!--<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=12' ); ?>"><li>常见问题</li></a>-->
				</ul>
			</div>
			<div class="websitebox_centen">
			    <form class="layui-form" action="" lay-filter="example">
				<div class="websitebox_cenh3">
					<span>手机客服设置</span>
					<input type="hidden" name="websitebox" value="17">
				  	 <input type="hidden" name="action" value="websitebox">
				  	 <input type="hidden" name="kefuicon" value="<?php if(isset($websitebox_shoujikefu['kefuicon']) && $websitebox_shoujikefu['kefuicon']){echo $websitebox_shoujikefu['kefuicon'];}?>">
				  	 <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('websitebox');?>">
					 <button type="submit" class="layui-btn websitebox_bot" lay-submit="" lay-filter="demo1">保存设置</button>
				</div>
				
			
					<div class="websitebox_wystyle">
						 <div class="layui-form-item websitebox_bor" pane="">
					   <label class="layui-form-label">是否启用</label>
					   <div class="layui-input-block">
					       <?php 
					            if(isset($websitebox_shoujikefu['auto']) && $websitebox_shoujikefu['auto']==1){
					                echo '<input type="checkbox" name="close" lay-skin="switch" lay-filter="switchsj" lay-text="开|关" checked>';
					            }else{
					                echo '<input type="checkbox" name="close" lay-skin="switch" lay-filter="switchsj" lay-text="开|关">';
					            }
					       ?>
					     
						  <span class="websitebox_zxc">仅限在手机版显示，而且可以一键拨打电话。</span>
					   </div>
					 </div>
						 <div class="layui-form-item">
						     <label class="layui-form-label">手机号</label>
						     <div class="layui-input-inline">
						       <input type="text" name="phone" placeholder="请输入" autocomplete="off" class="layui-input" value="<?php if(isset($websitebox_shoujikefu['phone'])){echo $websitebox_shoujikefu['phone'];}?>">
						     </div>
						 </div>
						<div class="websitebox_wystyle">
						<label class="layui-form-label">客服图标</label>
						 <div class="layui-upload">
						   <button type="button" class="layui-btn" id="test30">客服图标上传</button>
						   <span style="padding:0 0 0 10px;color:red;">推荐尺寸 120*120 </span>
						   <div class="layui-upload-list">
						       <div style="display: inline-block;position: relative;margin-top: 10px;margin-left: 110px;border: 1px solid #ccc;width: 120px;height: 120px;line-height: 110px;">
        						   <?php 
            					        if(isset($websitebox_shoujikefu['kefuicon']) && $websitebox_shoujikefu['kefuicon']){
            					            echo '<img class="layui-upload-img" id="demo30" style="width:120px;" src="'.$websitebox_shoujikefu['kefuicon'].'">';
            					        }else{
            					            echo '<img class="layui-upload-img" id="demo30" style="width:120px;" src="'. plugin_dir_url( WEBSITEBOX_FILE ).'images/wztbbxkf.png">';
            					        }
        					        ?>
        					        <p class="delete_pic">
        					            <img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/wzt_chahao.png">
        					        </p>
						       </div>
						     <p id="demoText"></p>
						   </div>
						 </div> 
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
		.delete_pic {
		    display: inline-block;
            position: absolute;
            top: -13px;
            right: -13px;
            width: 25px;
            height: 25px;
            background-color: #cecece;
            border-radius: 50%;
            opacity: 0.8;
		}
		.delete_pic img {
		    width: 100%;
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
		.layui-btn {
		    background-color: #007DDB;
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
			  <a href="/wp-admin/plugin-install.php?tab=plugin-information&plugin=baiduseo&TB_iframe=true&width=772&height=524">
				  <div class="tj_neirong">
					 <img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/icon-256x256.png" class="tj_logo"> 
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
			  <a href="/wp-admin/plugin-install.php?tab=plugin-information&plugin=auto-reply-wechat">
				  <div class="tj_neirong">
					 <img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/icon_weixin.png" class="tj_logo"> 
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
	    $('.delete_pic').click(function(){
            $(this).siblings("img").attr('src','');
            $('input[name="kefuicon"]').val('');
        })
        if($("input[name='close']").attr("checked") == "checked") {
             $("input[name='phone']").attr("lay-verify","required")
        }
		layui.use(['form', 'layer'], function(){
		  var form = layui.form
		  ,layer = layui.layer;
		  $('#test30').click(function(){     
				event.preventDefault();   
				
				upload_frame = wp.media({   
					title: '添加图片',   
					button: {   
						text: '选择图片',   
					},   
					multiple: false   
				});   
				upload_frame.on('select',function(){   
					attachment = upload_frame.state().get('selection').first().toJSON(); 
					
					$('input[name="kefuicon"]').val(attachment.url);   
					$('#demo30').attr('src',attachment.url);
				});	   
				upload_frame.open();   
		  }) 
		//监听指定开关
        form.on('switch(switchsj)', function(data){
            console.log(this.checked)
            if(this.checked) {
                $("input[name='phone']").attr("lay-verify","required")
            }else {
                $("input[name='phone']").removeAttr("lay-verify")
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
			$(".cenh4>ul>li>a").click(function(){
				$(this).siblings("ul").toggle(500);
			})
		});
	})
	</script>


