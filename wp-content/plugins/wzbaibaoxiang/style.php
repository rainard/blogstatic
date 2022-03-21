
		<div class="websitebox_box">
			
			<div class="websitebox_news">
				<ul>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox' ); ?>" ><li>常规设置</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=11' ); ?>" ><li>WP优化</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=1' ); ?>" class="websitebox_adm"><li>侧边客服</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=9' ); ?>" ><li>手机客服</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=3' ); ?>"><li>留言板</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=4' ); ?>"><li>网站背景</li></a>
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
					<span>侧边风格</span>
					<input type="hidden" name="websitebox" value="2">
				  	 <input type="hidden" name="action" value="websitebox">
				  	 <input type="hidden" name="phone_cls" value="<?php if(isset($websitebox_phone['cls'])){echo $websitebox_phone['cls'];}?>">
				  	 <input type="hidden" name="qq_cls" value="<?php if(isset($websitebox_qq['cls'])){echo $websitebox_qq['cls'];}?>">
				  	 <input type="hidden" name="qqqun_cls" value="<?php if(isset($websitebox_qqqun['cls'])){echo $websitebox_qqqun['cls'];}?>">
				  	 <input type="hidden" name="mail_cls" value="<?php if(isset($websitebox_mail['cls'])){echo $websitebox_mail['cls'];}?>">
				  	 <input type="hidden" name="wb_cls" value="<?php if(isset($websitebox_wb['cls'])){echo $websitebox_wb['cls'];}?>">
				  	 <input type="hidden" name="qrcode_cls" value="<?php if(isset($websitebox_qrcode['cls'])){echo $websitebox_qrcode['cls'];}?>">
				  	 <input type="hidden" name="qrcode" value="<?php if(isset($websitebox_qrcode['qrcode']) && $websitebox_qrcode['qrcode']){echo $websitebox_qrcode['qrcode'];} ?>">
				  	 <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('websitebox');?>">
					 <button type="submit" class="layui-btn websitebox_bot" lay-submit="" lay-filter="demo1">保存设置</button>
				</div>
				
					<div class="websitebox_wystyle">
						 <div class="layui-form-item websitebox_bor" pane="">
    					   <label class="layui-form-label">启用侧边栏</label>
    					   <div class="layui-input-block">
    					        <?php 
    					            if(isset($websitebox_kefu['kefu']) && ($websitebox_kefu['kefu']==1)){
    					                echo '<input type="checkbox" name="kefu" lay-skin="switch" lay-text="开|关" checked="">';
    					            }else{
    					                echo '<input type="checkbox" name="kefu" lay-skin="switch" lay-text="开|关">';
    					            }
    					       ?>
    						  <span class="websitebox_zxc">选择是否启用侧边插件</span>
    					   </div>
    					 </div>
    					 <div class="websitebox_wystyle">
						 	 <div class="websitebox_wystyle1">
						 			<span>设置背景颜色</span>
						 	 </div>
						 	  <div class="layui-input-inline" style="width: 120px;">
                                    <input type="text" name="bg" placeholder="请选择颜色" class="layui-input" id="test-form-input1" value="<?php if(isset($websitebox_kefu['bg']) && $websitebox_kefu['bg']){echo $websitebox_kefu['bg'];} ?>">
                                  </div>
                                  <div class="layui-inline" style="left: 10px;">
                                    <div id="test1"></div>
                                  </div>
						 </div>
						 <div class="websitebox_wystyle">
						 	 <div class="websitebox_wystyle1">
						 			<span>设置图标颜色</span>
						 	 </div>
						 	<div class="layui-input-inline" style="width: 120px;">
                                    <input type="text" name="icon" placeholder="请选择颜色" class="layui-input" id="test-form-input2" value="<?php if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){echo $websitebox_kefu['icon'];} ?>">
                                  </div>
                                  <div class="layui-inline" style="left: 10px;">
                                    <div id="test2"></div>
                                  </div>
						 </div>
						 <div class="websitebox_fodong" pane="">
						    <label class="layui-form-label">风格一</label>
						    <div class="layui-input-block">
						      <input type="radio" name="type" lay-filter="radio" value="1"  <?php if((isset($websitebox_kefu['type']) && $websitebox_kefu['type']==1)||(!isset($websitebox_kefu['type']))){echo 'checked=""';}?> >
							  
						    </div>
						  </div>
						  <div class="websitebox_fodong" pane="">
						     <label class="layui-form-label">风格二</label>
						     <div class="layui-input-block">
						       <input type="radio" name="type" value="2" lay-filter="radio"   <?php if((isset($websitebox_kefu['type']) && $websitebox_kefu['type']==2)){echo 'checked=""';}?>>
						     </div>
						   </div>
						   <div class="websitebox_fodong" pane="">
						      <label class="layui-form-label">风格三</label>
						      <div class="layui-input-block">
						        <input type="radio" name="type" value="3"  lay-filter="radio"  <?php if((isset($websitebox_kefu['type']) && $websitebox_kefu['type']==3)){echo 'checked=""';}?>>
						      </div>
						    </div>
							<div class="websitebox_fodong" pane="">
							   <label class="layui-form-label">风格四</label>
							   <div class="layui-input-block">
								 <input type="radio" name="type" lay-filter="radio" value="4"  <?php if((isset($websitebox_kefu['type']) && $websitebox_kefu['type']==4)){echo 'checked=""';}?>>
							   </div>
							</div>
							<div class="websitebox_fodong" pane="">
							   <label class="layui-form-label">风格五</label>
							   <div class="layui-input-block">
								 <input type="radio" name="type" lay-filter="radio" value="5"  <?php if((isset($websitebox_kefu['type']) && $websitebox_kefu['type']==5)){echo 'checked=""';}?>>
							   </div>
							</div>
							<div class="websitebox_fodong" pane="">
							   <label class="layui-form-label">风格六</label>
							   <div class="layui-input-block">
								 <input type="radio" name="type" lay-filter="radio" value="6"  <?php if((isset($websitebox_kefu['type']) && $websitebox_kefu['type']==6)){echo 'checked=""';}?>>
							   </div>
							</div>
							<div style="clear: both;"></div> 
					</div>
				
				<div class="websitebox_myfengge clearfix">
					<div>
						<img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/xuanfu1.png" >
						<p>风格一</p>
					</div>
					<div>
						<img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/xuanfu2.png" >
						<p>风格二</p>
					</div>
					<div>
						<img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/xuanfu3.png" >
						<p>风格三</p>
					</div>
					<div>
				       <img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/xuanfu4.png" >
				       <p>风格四</p>
					</div>
					<div>
				       <img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/xuanfu5.jpg" >
				       <p>风格五</p>
					</div>
					<div>
				       <img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE ); ?>images/xuanfu6.png" >
				       <p>风格六</p>
					</div>
				</div>
				<div class="websitebox_wystyle" style="padding:10px 0;">
					 <div class="layui-collapse" lay-filter="test" style="padding:10px;">
                      <div class="layui-colla-item">
                        <h2 class="layui-colla-title">电话设置</h2>
                        <div class="layui-colla-content">
                          <div class="websitebox_wystyle">
    						 <div class="websitebox_wystyle1">
    								<span>电话设置</span>
    						 </div> 
    						 <div class="layui-form-item">
    						     <label class="layui-form-label">联系号码</label>
    						     <div class="layui-input-inline">
    						       <input type="text" name="phone"  placeholder="请输入" autocomplete="off" class="layui-input" value="<?php if(isset($websitebox_phone['phone'])){echo $websitebox_phone['phone'];} ?>">
    						     </div>
    						 </div>
    					  </div>
						  <div class="websitebox_wystyle" style="overflow: hidden;">
						 	 <div class="websitebox_wystyle1">
						 			<span>设置图标</span>
						 	 </div>
							 <div class="websitebox_tubiao websitebox_tubiao_phone">
								 <ul>
                                     <li>
									 	<i class="layui-icon layui-icon-cellphone" style="font-size: 30px;"></i> 
									 </li>
									 <li>
									 	<i class="websitebox websitebox-whatsapp1" icon-class="websitebox-whatsapp1" style="font-size:29px;"></i> 
									 </li>
									 <li>
									 	<i class="websitebox websitebox-whatsapp" icon-class="websitebox-whatsapp" style="font-size:29px;"></i> 
									 </li>
									<li>
									    <i class="websitebox websitebox-phone" icon-class="websitebox-phone" style="font-size:29px;"></i>
									</li>
									<li>
									    <i class="websitebox websitebox-iconfontcolor39" icon-class="websitebox-iconfontcolor39" style="font-size:29px;"></i>
									</li>
									<li>
									    <i class="websitebox websitebox-mobilephone" icon-class="websitebox-mobilephone" style="font-size:29px;"></i>
									</li>
								 </ul>
							 </div>
						 </div>
                        </div>
                      </div>
                      <div class="layui-colla-item">
                        <h2 class="layui-colla-title">QQ设置</h2>
                        <div class="layui-colla-content">
                            <div class="websitebox_wystyle">
        						 <div class="websitebox_wystyle1">
        								<span>QQ设置</span>
        						 </div> 
        						 <div class="layui-form-item">
        						     <label class="layui-form-label">QQ号码</label>
        						     <div class="layui-input-inline">
        						       <input type="text" name="qq"  placeholder="请输入" autocomplete="off" class="layui-input" value="<?php if(isset($websitebox_qq['qq'])){echo $websitebox_qq['qq'];}?>">
        						     </div>
        						 </div>
        					</div>
    						 <div class="websitebox_wystyle" style="overflow: hidden;">
    						 	 <div class="websitebox_wystyle1">
    						 			<span>设置图标</span>
    						 	 </div>
    							 <div class="websitebox_tubiao websitebox_tubiao_qq">
    								 <ul>
    									 <li>
    									 	<i class="layui-icon layui-icon-login-qq" style="font-size: 30px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-qq" icon-class="websitebox-qq" style="font-size:29px;"></i>
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-qq1" icon-class="websitebox-qq1" style="font-size:29px;"></i>
    									 </li>
    								 </ul>
    							 </div>
    						 </div>
					        
					      </div>
                      </div>
                      <div class="layui-colla-item">
                        <h2 class="layui-colla-title">二维码设置</h2>
                        <div class="layui-colla-content">
                          <div class="websitebox_wystyle">
						 <div class="websitebox_wystyle1">
								<span>二维码设置</span>
						 </div> 
						 <div class="layui-upload">
						   <button type="button" class="layui-btn" id="test30">上传图片</button>
						   <div class="layui-upload-list">
						     <div style="display: inline-block;position: relative;margin-top: 10px;margin-left: 110px;border: 1px solid #ccc;width:110px;height:110px;line-height: 100px;">
						        <?php 
        					        if(isset($websitebox_qrcode['qrcode']) && $websitebox_qrcode['qrcode']){
        					            echo '<img class="layui-upload-img" id="demo30" style="width:110px;" src="'.$websitebox_qrcode['qrcode'].'">';
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
						 
						 		<div class="websitebox_wystyle" style="overflow: hidden;">
    						 	 <div class="websitebox_wystyle1">
    						 			<span>设置图标</span>
    						 	 </div>
    							 <div class="websitebox_tubiao websitebox_tubiao_qrcode">
    								 <ul>
    									 <li>
    									 	<i class="websitebox websitebox-erweima" icon-class="websitebox-erweima" style="font-size:29px;"></i>
    									 </li>
    									 <li>
    									 	<i class="layui-icon layui-icon-login-wechat" style="font-size: 30px;"></i>
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-weixin-copy" icon-class="websitebox-weixin-copy" style="font-size:29px;"></i>
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-liaotian2" icon-class="websitebox-liaotian2" style="font-size:29px;"></i>
    									 </li>
    								 </ul>
    								 
    								 
    							 </div>
    
    						 </div>
    					</div>
                      </div>
                      <div class="layui-colla-item">
                        <h2 class="layui-colla-title">邮箱设置</h2>
                        <div class="layui-colla-content">
                          <div class="websitebox_wystyle">
    						 <div class="websitebox_wystyle1">
    								<span>邮箱设置</span>
    						 </div> 
    						 <div class="layui-form-item">
    						     <label class="layui-form-label">邮箱号码</label>
    						     <div class="layui-input-inline">
    						       <input type="text" name="mail"  placeholder="请输入" autocomplete="off" class="layui-input" value="<?php if(isset($websitebox_mail['mail']) && $websitebox_mail['mail']){echo $websitebox_mail['mail'];} ?>">
    						     </div>
    						 </div>
    					   </div>
    						 <div class="websitebox_wystyle" style="overflow: hidden;">
    						 	 <div class="websitebox_wystyle1">
    						 			<span>设置图标</span>
    						 	 </div>
    							 <div class="websitebox_tubiao websitebox_tubiao_mail">
    								 <ul>
    									 <li>
    									 	<i class="layui-icon layui-icon-email" style="font-size: 30px;"></i>
    									 </li>
    								 </ul>
    							 </div>
                        </div>
                      </div>
                      </div>
                      <div class="layui-colla-item">
                        <h2 class="layui-colla-title">链接设置</h2>
                        <div class="layui-colla-content">
                          <div class="websitebox_wystyle">
    						 <div class="websitebox_wystyle1">
    								<span>链接设置</span>
    						 </div> 
    						 <div class="layui-form-item">
    						     <label class="layui-form-label">链接</label>
    						     <div class="layui-input-inline">
    						       <input type="text" name="wb"  placeholder="请输入" autocomplete="off" class="layui-input" value="<?php if(isset($websitebox_wb['wb'])){echo $websitebox_wb['wb'];}?>">
    						     </div>
    						     
    						    </div>
    						    <p style="margin-left: 110px;">链接地址开头必须包含  http(s):// </p>
    						 </div>
    						 <div class="websitebox_wystyle" style="overflow: hidden;">
    						 	 <div class="websitebox_wystyle1">
    						 			<span>设置图标</span>
    						 	 </div>
    							 <div class="websitebox_tubiao websitebox_tubiao_wb">
    								 <ul>
    									 <li>
    									 	<i class="layui-icon layui-icon-login-weibo" style="font-size: 30px;"></i>
    									 </li>
    									 <li>
    									 	<i class="layui-icon layui-icon-home" style="font-size: 30px;"></i>
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-xiaolian3" icon-class="websitebox-xiaolian3" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-favorite" icon-class="websitebox-favorite" style="font-size:29px;"></i> 
    									 </li> 
    									 <li>
    									 	<i class="websitebox websitebox-viewlist" icon-class="websitebox-viewlist" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-set" icon-class="websitebox-set" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-success" icon-class="websitebox-success" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-wangwang" icon-class="websitebox-wangwang" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-qqqun" icon-class="websitebox-qqqun" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-ren" icon-class="websitebox-ren" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-taobao" icon-class="websitebox-taobao" style="font-size:29px;"></i> 
    									 </li>
    									 
    									 <li>
    									 	<i class="websitebox websitebox-weixin-copy" icon-class="websitebox-weixin-copy" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-qq1" icon-class="websitebox-qq1" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-douban-copy" icon-class="websitebox-douban-copy" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-googleplus" icon-class="websitebox-googleplus" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-facebook" icon-class="websitebox-facebook" style="font-size:29px;"></i> 
    									 </li>
    									 
    									  <li>
    									 	<i class="websitebox websitebox-tengxunweibo" icon-class="websitebox-tengxunweibo" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-qq" icon-class="websitebox-qq" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-qqkongjian1" icon-class="websitebox-douban-qqkongjian1" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-gouwuche1" icon-class="websitebox-gouwuche1" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-facebook" icon-class="websitebox-facebook" style="font-size:29px;"></i> 
    									 </li>
    									  <li>
    									 	<i class="websitebox websitebox-wangwang-b" icon-class="websitebox-wangwang-b" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-xinlang" icon-class="websitebox-xinlang" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-top" icon-class="websitebox-top" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-erweima" icon-class="websitebox-erweima" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-buchongiconsvg02" icon-class="websitebox-buchongiconsvg02" style="font-size:29px;"></i> 
    									 </li>
    									  <li>
    									 	<i class="websitebox websitebox-gouwucheshoppingcart" icon-class="websitebox-gouwucheshoppingcart" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-twitter1" icon-class="websitebox-twitter1" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-twitter" icon-class="websitebox-twitter" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-kefu" icon-class="websitebox-kefu" style="font-size:29px;"></i> 
    									 </li>
    									 <li>
    									 	<i class="websitebox websitebox-google26" icon-class="websitebox-google26" style="font-size:29px;"></i> 
    									 </li>
    									<li>
    									    <i class="websitebox websitebox-phone" icon-class="websitebox-phone" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-qqkongjian" icon-class="websitebox-qqkongjian" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-liaotian2" icon-class="websitebox-liaotian2" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-iconfontcolor39" icon-class="websitebox-iconfontcolor39" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-googleplussquare" icon-class="websitebox-googleplussquare" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-skype" icon-class="websitebox-skype" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-douban" icon-class="websitebox-douban" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-gouwuche" icon-class="websitebox-gouwuche" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-bags" icon-class="websitebox-bags" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-apparel" icon-class="websitebox-apparel" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-password" icon-class="websitebox-password" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-trust" icon-class="websitebox-trust" style="font-size:29px;"></i>
    									</li>
    									 
    									<li>
    									    <i class="websitebox websitebox-task-management" icon-class="websitebox-task-management" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-earth" icon-class="websitebox-earth" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-video" icon-class="websitebox-video" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-Calculator" icon-class="websitebox-Calculator" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-originalimage" icon-class="websitebox-originalimage" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-pic-filling" icon-class="websitebox-pic-filling" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-favorites" icon-class="websitebox-favorites" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-browse1" icon-class="websitebox-browse1" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-trade" icon-class="websitebox-trade" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-ship" icon-class="websitebox-ship" style="font-size:29px;"></i>
    									</li>
    									
    									
    									<li>
    									    <i class="websitebox websitebox-yuyin" icon-class="websitebox-yuyin" style="font-size:29px;"></i>
    									</li>
    										<li>
    									    <i class="websitebox websitebox-mian" icon-class="websitebox-mian" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-7" icon-class="websitebox-7" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-zhiliangbz" icon-class="websitebox-zhiliangbz" style="font-size:29px;"></i>
    									</li>
    										<li>
    									    <i class="websitebox websitebox-zhifubaofukuan" icon-class="websitebox-zhifubaofukuan" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-zhengpinbz" icon-class="websitebox-zhengpinbz" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-suyuanzhijianbz" icon-class="websitebox-suyuanzhijianbz" style="font-size:29px;"></i>
    									</li>
    										<li>
    									    <i class="websitebox websitebox-shenduyanshang" icon-class="websitebox-shenduyanshang" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-shendurz" icon-class="websitebox-shendurz" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-posunbuji" icon-class="websitebox-posunbuji" style="font-size:29px;"></i>
    									</li>
    										<li>
    									    <i class="websitebox websitebox-maijiabz" icon-class="websitebox-maijiabz" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-jisukuikuan" icon-class="websitebox-jisukuikuan" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-jinpaigongyings" icon-class="websitebox-jinpaigongyings" style="font-size:29px;"></i>
    									</li>
    										<li>
    									    <i class="websitebox websitebox-jingpaicaigoushang" icon-class="websitebox-jingpaicaigoushang" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-jiaoqibz" icon-class="websitebox-jiaoqibz" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-save" icon-class="websitebox-save" style="font-size:29px;"></i>
    									</li>
    										<li>
    									    <i class="websitebox websitebox-copy" icon-class="websitebox-copy" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-huo" icon-class="websitebox-huo" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-ju1" icon-class="websitebox-ju1" style="font-size:29px;"></i>
    									</li>
    										<li>
    									    <i class="websitebox websitebox-hua" icon-class="websitebox-hua" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-ju" icon-class="websitebox-ju" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-accountfilling" icon-class="websitebox-accountfilling" style="font-size:29px;"></i>
    									</li>
    										<li>
    									    <i class="websitebox websitebox-favoritesfilling" icon-class="websitebox-favoritesfilling" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-mobilephone" icon-class="websitebox-mobilephone" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-shoes" icon-class="websitebox-shoes" style="font-size:29px;"></i>
    									</li>
    										<li>
    									    <i class="websitebox websitebox-share" icon-class="websitebox-share" style="font-size:29px;"></i>
    									</li>
    									<li>
    									    <i class="websitebox websitebox-security" icon-class="websitebox-security" style="font-size:29px;"></i>
    									</li>
    									 
    									 
    									 
    								 </ul>
    								 
    								 
    							 </div>
    
    						 </div>
                        </div>
                      </div>
                      <div class="layui-colla-item">
                        <h2 class="layui-colla-title">QQ群设置</h2>
                        <div class="layui-colla-content">
                          <div class="websitebox_wystyle">
						 <div class="websitebox_wystyle1">
								<span>QQ群设置</span>
						 </div> 
						 <div class="layui-form-item">
						     <label class="layui-form-label">QQ群号码</label>
						     <div class="layui-input-inline">
						       <input type="text" name="qqqun"  placeholder="请输入" autocomplete="off" class="layui-input" value="<?php if(isset($websitebox_qqqun['qqqun'])){echo $websitebox_qqqun['qqqun'];}?>">
						     </div>
						 </div>
						</div>
						 <div class="websitebox_wystyle" style="overflow: hidden;">
						 	 <div class="websitebox_wystyle1">
						 			<span>设置图标</span>
						 	 </div>
							 <div class="websitebox_tubiao websitebox_tubiao_qqqun">
								 <ul>
									 <li>
									 	<i class="websitebox websitebox-qqqun" icon-class="websitebox-qqqun" style="font-size:29px;"></i> 
									 </li>
									 
									 
								 </ul>
								 
								 
							 </div>

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
		.layui-form-radio>i:hover, .layui-form-radioed>i {
		    color: #007DDB;
		}
		#wpwrap {
		    background-color: #fff;
		}
		.websitebox_myfengge img {
		    transition: all 0.5s;
		}
		.websitebox_myfengge img:hover {
		    transform:scale(2);
		}
        .clearfix:after{/*伪元素是行内元素 正常浏览器清除浮动方法*/
            content: "";
            display: block;
            height: 0;
            clear:both;
            visibility: hidden;
        }
        .clearfix{
            *zoom: 1;/*ie6清除浮动的方式 *号只有IE6-IE7执行，其他浏览器不执行*/
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
            $('input[name="qrcode"]').val('');
        })
		layui.use(['form', 'layer','element','colorpicker'], function(){
            var form = layui.form
            ,layer = layui.layer
            var colorpicker = layui.colorpicker;
            
             //常规使用
		  colorpicker.render({
		    elem: '#test1'//绑定元素
			 ,color: '<?php if(isset($websitebox_kefu['bg']) && $websitebox_kefu['bg']){echo $websitebox_kefu['bg'];} ?>'
		    ,done: function(color){
              $('#test-form-input1').val(color);
            }
		  });
		   colorpicker.render({
		      elem: '#test2'
		      ,color: '<?php if(isset($websitebox_kefu['icon']) && $websitebox_kefu['icon']){echo $websitebox_kefu['icon'];} ?>'
		      ,done: function(color){
                  $('#test-form-input2').val(color);
                }
		    });
          
            form.on('radio(radio)', function(data){
                if(data.value==1){
                    $('.style_color').css('display','none');
                    $('.style_title').css('display','none');
                }else if(data.value==2){
                    $('.style_color').css('display','none');
                    $('.style_title').css('display','none');
                }else if(data.value==3){
                    $('.style_color').css('display','block');
                    $('.style_title').css('display','none');
                }else if(data.value==4){
                    $('.style_color').css('display','block');
                    $('.style_title').css('display','block');
                }
            }); 
            var phone_cls = "<?php if(isset($websitebox_phone['cls'])){echo $websitebox_phone['cls'];}?>";
    		if(phone_cls){
    		    $(".websitebox_tubiao_phone li i").each(function(){
    		        if($(this).attr('class')==phone_cls){
    		            $(this).parent('li').addClass("websitebox_xuanzhong").siblings("li").removeClass("websitebox_xuanzhong");
    		        }
    		    })
    		}
    		$(".websitebox_tubiao_phone li").click(function(){
    		    var phone_cls = $(this).find('i').attr('class');
    			$('input[name="phone_cls"]').val(phone_cls);
    		    $(this).addClass("websitebox_xuanzhong").siblings("li").removeClass("websitebox_xuanzhong");
    		})
    		var qq_cls = "<?php if(isset($websitebox_qq['cls'])){echo $websitebox_qq['cls'];}?>";
    		if(qq_cls){
    		    $(".websitebox_tubiao_qq li i").each(function(){
    		        if($(this).attr('class')==qq_cls){
    		            $(this).parent('li').addClass("websitebox_xuanzhong").siblings("li").removeClass("websitebox_xuanzhong");
    		        }
    		    })
    		}
    		$(".websitebox_tubiao_qq li").click(function(){
    		    var qq_cls = $(this).find('i').attr('class');
    			$('input[name="qq_cls"]').val(qq_cls);
    		    $(this).addClass("websitebox_xuanzhong").siblings("li").removeClass("websitebox_xuanzhong");
    		})
    		
    		var mail_cls = "<?php if(isset($websitebox_mail['cls'])){echo $websitebox_mail['cls'];}?>";
    		if(mail_cls){
    		    $(".websitebox_tubiao_mail li i").each(function(){
    		        if($(this).attr('class')==mail_cls){
    		            $(this).parent('li').addClass("websitebox_xuanzhong").siblings("li").removeClass("websitebox_xuanzhong");
    		        }
    		    })
    		}
    		$(".websitebox_tubiao_mail li").click(function(){
    		    var mail_cls = $(this).find('i').attr('class');
    			$('input[name="mail_cls"]').val(mail_cls);
    		    $(this).addClass("websitebox_xuanzhong").siblings("li").removeClass("websitebox_xuanzhong");
    		})
    		var wb_cls = "<?php if(isset($websitebox_wb['cls'])){echo $websitebox_wb['cls'];}?>";
    		if(wb_cls){
    		    $(".websitebox_tubiao_wb li i").each(function(){
    		        if($(this).attr('class')==wb_cls){
    		            $(this).parent('li').addClass("websitebox_xuanzhong").siblings("li").removeClass("websitebox_xuanzhong");
    		        }
    		    })
    		}
    		$(".websitebox_tubiao_wb li").click(function(){
    		    var wb_cls = $(this).find('i').attr('class');
    			$('input[name="wb_cls"]').val(wb_cls);
    		    $(this).addClass("websitebox_xuanzhong").siblings("li").removeClass("websitebox_xuanzhong");
    		})
    		var qqqun_cls = "<?php if(isset($websitebox_qqqun['cls'])){echo $websitebox_qqqun['cls'];}?>";
    		if(qqqun_cls){
    		    $(".websitebox_tubiao_qqqun li i").each(function(){
    		        if($(this).attr('class')==qqqun_cls){
    		            $(this).parent('li').addClass("websitebox_xuanzhong").siblings("li").removeClass("websitebox_xuanzhong");
    		        }
    		    })
    		}
    		$(".websitebox_tubiao_qqqun li").click(function(){
    		    var qqqun_cls = $(this).find('i').attr('class');
    			$('input[name="qqqun_cls"]').val(qqqun_cls);
    		    $(this).addClass("websitebox_xuanzhong").siblings("li").removeClass("websitebox_xuanzhong");
    		})
    		var qrcode_cls = "<?php if(isset($websitebox_qrcode['cls'])){echo $websitebox_qrcode['cls'];}?>";
    		if(qrcode_cls){
    		    $(".websitebox_tubiao_qrcode li i").each(function(){
    		        if($(this).attr('class')==qrcode_cls){
    		            $(this).parent('li').addClass("websitebox_xuanzhong").siblings("li").removeClass("websitebox_xuanzhong");
    		        }
    		    })
    		}
    		$(".websitebox_tubiao_qrcode li").click(function(){
    		    var qrcode_cls = $(this).find('i').attr('class');
    			$('input[name="qrcode_cls"]').val(qrcode_cls);
    		    $(this).addClass("websitebox_xuanzhong").siblings("li").removeClass("websitebox_xuanzhong");
    		})
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
					
					$('input[name="qrcode"]').val(attachment.url);   
					$('#demo30').attr('src',attachment.url);
				});	   
				upload_frame.open();   
		  })
            //监听折叠
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
	});
	</script>


