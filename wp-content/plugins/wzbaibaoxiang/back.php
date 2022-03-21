       <style>
           .websitebox_wystyle2-1 img{
               width:284px;
               height: 213px;
           }
       </style>
		<div class="websitebox_box" style="">
			
			<div class="websitebox_news">
				<ul>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox' ); ?>" ><li>常规设置</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=11' ); ?>" ><li>WP优化</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=1' ); ?>" ><li>侧边客服</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=9' ); ?>" ><li>手机客服</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=3' ); ?>" ><li>留言板</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=4' ); ?>" class="websitebox_adm"><li>网站背景</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=5' ); ?>"><li>提示框</li></a>
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
					 <span>网站背景</span>
					 <input type="hidden" name="websitebox" value="5">
				  	 <input type="hidden" name="action" value="websitebox">
				  	 <input type="hidden" name="back" value=" <?php 
    					        if(isset($websitebox_sitebg['back']) && $websitebox_sitebg['back']){ echo $websitebox_sitebg['back'];}?>">
    			    <input type="hidden" name="texiao" value=" <?php 
    					        if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']){ echo $websitebox_sitebg['texiao'];}?>">
				  	 <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('websitebox');?>">
					 <button type="submit" class="layui-btn websitebox_bot" lay-submit="" lay-filter="demo1">保存设置</button>
				</div>
				    <div class="layui-form-item bor" pane="">
					   <label class="layui-form-label">启用背景</label>
					   <div class="layui-input-block">
					       <?php 
					            if(isset($websitebox_sitebg['auto']) && $websitebox_sitebg['auto']==1){
					                echo '<input type="checkbox" name="close" lay-skin="switch" lay-text="开|关" checked>';
					            }else{
					                echo '<input type="checkbox" name="close" lay-skin="switch" lay-text="开|关">';
					            }
					       ?>
					     
						  <span class="websitebox_zxc">选择是否启用背景</span>
					   </div>
					</div>
					<div class="layui-form-item bor" pane="">
					    <label class="layui-form-label">手机展示</label>
					    <div class="layui-input-block">
					        <?php 
					            if(isset($websitebox_sitebg['mobile_auto']) && $websitebox_sitebg['mobile_auto']==1){
					                echo '<input type="checkbox" name="mobile_auto" lay-skin="switch" lay-text="开|关" checked>';
					            }else{
					                echo '<input type="checkbox" name="mobile_auto" lay-skin="switch" lay-text="开|关">';
					            }
					       ?>
					     
						    <span class="websitebox_zxc">手机版是否展示</span>
					   </div>
					</div>
                    <div class="websitebox_wystyle">
                        <label class="layui-form-label">选择类型</label>
						 <div class="layui-input-inline">
						 <select name="type" lay-filter="back_type">

                            <option value="2" <?php if(isset($websitebox_sitebg['type']) && $websitebox_sitebg['type']==2 ){ echo 'selected';} ?>>背景图片</option>
                            <option value="1" <?php if(isset($websitebox_sitebg['type']) && $websitebox_sitebg['type']==1 ){ echo 'selected';} ?>>背景颜色</option>
                            <option value="3"  <?php if(isset($websitebox_sitebg['type']) && $websitebox_sitebg['type']==3 ){ echo 'selected';} ?>>背景特效</option>
                          </select>
                        </div>
				    </div>
				    
					<div class="websitebox_wystyle websitebox_bg_hide"  style="display:<?php if(!isset($websitebox_sitebg['type']) ||(isset($websitebox_sitebg['type']) && $websitebox_sitebg['type']!=1) ){ echo 'none';} ?>">
						 <div class="websitebox_wystyle1">
								<span>设置背景颜色</span>
						 </div>
						  <div class="layui-input-inline" style="width: 120px;">
                            <input type="text" name="bg" placeholder="请选择颜色" class="layui-input" id="test-form-input1" value="<?php  
                            if(isset($websitebox_sitebg['bg']) && $websitebox_sitebg['bg']){
                            echo $websitebox_sitebg['bg'];
                            }else{
                            echo '#fff';
                            } ?>">
                          </div>
                          <div class="layui-inline" style="left: 10px;">
                            <div id="test1"></div>
                          </div>
					</div>
					<div class="websitebox_wystyle websitebox_img_hide" style="display:<?php if(isset($websitebox_sitebg['type']) && $websitebox_sitebg['type']==2 ){ echo 'block';}else{ echo 'none';} ?>" >
						 <div class="websitebox_wystyle1">
								<span>上传背景图片</span>
						 </div> 
						 <div class="layui-upload">
						   <button type="button" class="layui-btn" id="test30">上传图片</button>
						   <div class="layui-upload-list">
    						   <div style="display: inline-block;position: relative;margin-top: 10px;margin-left: 110px;border: 1px solid #ccc;width:110px;height:110px;line-height: 100px;">
    						        <?php 
            					        if(isset($websitebox_sitebg['back']) && $websitebox_sitebg['back']){
            					            echo '<img class="layui-upload-img" id="demo30" style="width:110px;" src="'.$websitebox_sitebg['back'].'">';
            					        }else{
            					            echo '<img class="layui-upload-img" id="demo30" style="width:110px;">';
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
					<div class="websitebox_wystyle websitebox_tx_hide" style="display:<?php if(isset($websitebox_sitebg['type']) && $websitebox_sitebg['type']==3 ){ echo 'block';}else{ echo 'none';} ?>" >
						 <div class="websitebox_wystyle1">
								<span>背景特效</span>
						 </div>
						 <div class="websitebox_wystyle2">
							 <div class="websitebox_wystyle2-1" title="qq闪烁">
								 <figure>
									 <a href="#"><img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/bei1.png" style="width: 100%;"></a>
									 <figcaption><button  class="websitebox_qiyong <?php if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==1){ echo 'websitebox_xuanzhongh';}?>" type="button" data-texiao="1"><?php 
    					        if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==1){ echo '已启用';}else{echo '启用';}?></button></figcaption>
								 </figure>
							 </div>
							 <div class="websitebox_wystyle2-1" title="彩带">
								 <figure>
									 <a href="#"><img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/bei2.png" style="width: 100%;"></a>
									 <figcaption><button class="websitebox_qiyong <?php if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==2){ echo 'websitebox_xuanzhongh';}?>" type="button" data-texiao="2"><?php 
    					        if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==2){ echo '已启用';}else{echo '启用';}?></button></figcaption>
								 </figure>
							 </div>
							 <div class="websitebox_wystyle2-1" title="黑客帝国">
								 <figure>
									 <a href="#"><img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/bei3.png" style="width: 100%;"></a>
									 <figcaption><button class="websitebox_qiyong <?php if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==3){ echo 'websitebox_xuanzhongh';}?>" type="button" data-texiao="3"><?php 
    					        if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==3){ echo '已启用';}else{echo '启用';}?></button></figcaption>
								 </figure>
							 </div>
							<div class="websitebox_wystyle2-1" title="花瓣">
								 <figure>
									 <a href="#"><img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/bei4.png" style="width: 100%;"></a>
									 <figcaption><button class="websitebox_qiyong <?php if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==4){ echo 'websitebox_xuanzhongh';}?>" type="button" data-texiao="4"><?php 
    					        if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==4){ echo '已启用';}else{echo '启用';}?></button></figcaption>
								 </figure>
							</div>
							 <div class="websitebox_wystyle2-1" title="漂浮">
								 <figure>
									 <a href="#"><img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/bei5.png" style="width: 100%;"></a>
									 <figcaption><button class="websitebox_qiyong <?php if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==5){ echo 'websitebox_xuanzhongh';}?>" type="button" data-texiao="5"><?php 
    					        if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==5){ echo '已启用';}else{echo '启用';}?></button></figcaption>
								 </figure>
							 </div>
							 <div class="websitebox_wystyle2-1" title="星空1">
								 <figure>
									 <a href="#"><img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/bei6.png" style="width: 100%;"></a>
									 <figcaption><button class="websitebox_qiyong <?php if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==6){ echo 'websitebox_xuanzhongh';}?>" type="button" data-texiao="6"><?php 
    					        if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==6){ echo '已启用';}else{echo '启用';}?></button></figcaption>
								 </figure>
							 </div>
							 <div class="websitebox_wystyle2-1" title="星空2">
								 <figure>
									 <a href="#"><img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/p7.png" style="width: 100%;"></a>
									 <figcaption><button class="websitebox_qiyong <?php if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==7){ echo 'websitebox_xuanzhongh';}?>" type="button" data-texiao="7"><?php 
    					        if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==7){ echo '已启用';}else{echo '启用';}?></button></figcaption>
								 </figure>
							 </div>
							 <div class="websitebox_wystyle2-1" title="星际穿梭">
								 <figure>
									 <a href="#"><img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/wztxingkong.png" style="width: 100%;"></a>
									 <figcaption><button class="websitebox_qiyong <?php if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==8){ echo 'websitebox_xuanzhongh';}?>" type="button" data-texiao="8"><?php 
    					        if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==8){ echo '已启用';}else{echo '启用';}?></button></figcaption>
								 </figure>
							 </div>
							 <div class="websitebox_wystyle2-1" title="海洋">
								 <figure>
									 <a href="#"><img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/wztyangguang.png" style="width: 100%;"></a>
									 <figcaption><button class="websitebox_qiyong <?php if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==9){ echo 'websitebox_xuanzhongh';}?>" type="button" data-texiao="9"><?php 
    					        if(isset($websitebox_sitebg['texiao']) && $websitebox_sitebg['texiao']==9){ echo '已启用';}else{echo '启用';}?></button></figcaption>
								 </figure>
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
    	.websitebox_xuanzhongh {
    	    background-color: #ffca3c;
    	}
    	.layui-form-onswitch {
            border-color: #007DDB;
            background-color: #007DDB;
        }	
        .layui-btn {
            background-color: #007DDB;
        }
        .layui-form-select dl dd.layui-this {
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
            $('input[name="back"]').val('');
        })
    	layui.use(['form', 'layedit', 'laydate','colorpicker'], function(){
    	  var form = layui.form
    	  ,layer = layui.layer
    	  ,colorpicker = layui.colorpicker;
    	   form.on('select(back_type)', function(data){
                if(data.value==1){
                    $('.websitebox_bg_hide').css('display','block');
                    $('.websitebox_img_hide').css('display','none');
                    $('.websitebox_tx_hide').css('display','none');
                }else if(data.value==2){
                    $('.websitebox_bg_hide').css('display','none');
                    $('.websitebox_img_hide').css('display','block');
                    $('.websitebox_tx_hide').css('display','none');
                }else if(data.value==3){
                    $('.websitebox_bg_hide').css('display','none');
                    $('.websitebox_img_hide').css('display','none');
                    $('.websitebox_tx_hide').css('display','block');
                }
            });  
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
					
					$('input[name="back"]').val(attachment.url);   
					$('#demo30').attr('src',attachment.url);
				});	   
				upload_frame.open();   
		  })
    	  colorpicker.render({
                elem: '#test1'
                ,color: '<?php  
                            if(isset($websitebox_sitebg['bg']) && $websitebox_sitebg['bg']){
                            echo $websitebox_sitebg['bg'];
                            }else{
                            echo '#fff';
                            } ?>'
                ,done: function(color){
                  $('#test-form-input1').val(color);
                }
            });
            $('.websitebox_qiyong').click(function(){
                $('.websitebox_qiyong').html('启用').css("background-color","#007DDB");
                $(this).html('已启用').css("background-color","#ffca3c");
                $('input[name="texiao"]').val($(this).attr('data-texiao'));
            })
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

