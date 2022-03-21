<div class="websitebox_box">
			
			<div class="websitebox_news">
				<ul>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox' ); ?>" ><li>常规设置</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=11' ); ?>" ><li>WP优化</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=1' ); ?>" ><li>侧边客服</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=9' ); ?>" ><li>手机客服</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=3' ); ?>" ><li>留言板</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=4' ); ?>"><li>网站背景</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=5' ); ?>" ><li>提示框</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=6' ); ?>"><li>滚动公告</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=7' ); ?>"><li>图片水印</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=8' ); ?>"><li>三合一</li></a>
					<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=10' ); ?>" class="websitebox_adm"><li>鼠标特效</li></a>
					<!--<a href="<?php echo admin_url( 'admin.php?page=websitebox&book=12' ); ?>"><li>常见问题</li></a>-->
				</ul>
			</div>
			<div class="websitebox_centen">
			    <form class="layui-form" action="" lay-filter="example">
    				<div class="websitebox_cenh3">
    					<span>鼠标特效设置</span>
    					<input type="hidden" name="websitebox" value="18">
    				  	 <input type="hidden" name="action" value="websitebox">
    				  	 <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('websitebox');?>">
    					 <button type="submit" class="layui-btn websitebox_bot" lay-submit="" lay-filter="demo1">保存设置</button>
    				</div>
    				<div class="layui-form-item websitebox_bor_bt">
                        <label class="layui-form-label layui-form-label">是否开启特效</label>
                        <div class="layui-input-block">
                        <?php if(isset($websitebox_sbtexiao['sb_texiao']) && $websitebox_sbtexiao['sb_texiao']==1){?>
                          <input type="checkbox"  name="sb_texiao" lay-skin="switch" lay-filter="switchTest" lay-text="开|关" checked>
                         <?php }else{?>
                         <input type="checkbox"  name="sb_texiao" lay-skin="switch" lay-filter="switchTest" lay-text="开|关">
                         <?php }?>
                          <span class="websitebox_sb_zxc">是否开启鼠标特效</span>
                        </div>
                      </div>
                      <div class="layui-form-item">
                        <label class="layui-form-label">特效选择</label>
                        <div class="layui-input-block">
                          <input type="radio" name="fengge" value="1" lay-filter="fengge" title="掉落风格" <?php if((isset($websitebox_sbtexiao['fengge']) && $websitebox_sbtexiao['fengge']==1)||(!isset($websitebox_sbtexiao['fengge'])) ){echo 'checked=""';}?> >
                          <input type="radio" name="fengge" value="2" lay-filter="fengge" title="烟花风格" <?php if(isset($websitebox_sbtexiao['fengge']) && $websitebox_sbtexiao['fengge']==2){echo 'checked=""';}?>>
                          <input type="radio" name="fengge" value="3" lay-filter="fengge" title="马赛克风格" <?php if(isset($websitebox_sbtexiao['fengge']) && $websitebox_sbtexiao['fengge']==3){echo 'checked=""';}?>>
                        </div>
                        <span class="websitebox_sb_zxc">点击下方白色区域,即可浏览效果</span>
                        <div class="websitebox_sb_dome">
                            <div class="websitebox_sb_dome1" style="display:block;"></div>
                            <div class="websitebox_sb_dome2"></div>
                            <div class="websitebox_sb_dome3"></div>
                        </div>
                      </div>
                     <div class="layui-form-item">
                        <label class="layui-form-label">特效内容选择</label>
                        <div class="layui-input-block">
                          <input type="radio" name="nav" value="1" lay-filter="nav" title="粒子" <?php if((isset($websitebox_sbtexiao['nav']) && $websitebox_sbtexiao['nav']==1)||(!isset($websitebox_sbtexiao['nav'])) ){echo 'checked=""';}?>>
                          <input type="radio" name="nav" value="2" lay-filter="nav" title="水果图标" <?php if(isset($websitebox_sbtexiao['nav']) && $websitebox_sbtexiao['nav']==2){echo 'checked=""';}?>>
                          <input type="radio" name="nav" value="3" lay-filter="nav" title="表情图标" <?php if(isset($websitebox_sbtexiao['nav']) && $websitebox_sbtexiao['nav']==3){echo 'checked=""';}?>>
                          <input type="radio" name="nav" value="4" lay-filter="nav" title="文字(可自定义)" <?php if(isset($websitebox_sbtexiao['nav']) && $websitebox_sbtexiao['nav']==4){echo 'checked=""';}?>>
                        </div>
                        <span class="websitebox_sb_zxc">点击下方白色区域,即可浏览效果</span>
                        <div class="websitebox_sb_nav">
                            <div class="websitebox_sb_nav1" style="display:block;"></div>
                            <div class="websitebox_sb_nav2"></div>
                            <div class="websitebox_sb_nav3"></div>
                            <div class="websitebox_sb_nav4"></div>
                        </div>
                      </div>
                      <div class="layui-form-item websitebox_sb_wenzi">
                        <label class="layui-form-label">文字</label>
                        <div class="layui-input-inline websitebox_sb_chang">
                          <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入文字" class="layui-input" value="<?php if(isset($websitebox_sbtexiao['title'])  ){echo $websitebox_sbtexiao['title'];}?>">
                          <span class="websitebox_sb_zxc">请使用英文逗号分离</span>
                        </div>
                      </div>
                       <div class="layui-form-item websitebox_sb_gaodu">
                        <label class="layui-form-label">粒子的高度</label>
                        <div class="layui-input-inline">
                          <input type="number" name="sb_gaodu" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input" value="<?php if(isset($websitebox_sbtexiao['sb_gaodu'])  ){echo $websitebox_sbtexiao['sb_gaodu'];}else{echo 5;}?>">
                          <span class="websitebox_sb_zxc">默认为5</span>
                        </div>
                      </div>
                      <div class="layui-form-item">
                        <label class="layui-form-label">宽度</label>
                        <div class="layui-input-inline">
                          <input type="number" name="sb_kuandu" lay-verify="required" placeholder="也可以控制emoji的字体大小" autocomplete="off" class="layui-input" value="<?php if(isset($websitebox_sbtexiao['sb_kuandu'])  ){echo $websitebox_sbtexiao['sb_kuandu'];}else{echo 5;}?>">
                          <span class="websitebox_sb_zxc">默认为5,控制字体大小</span>
                         </div>
                      </div>
                      <div class="layui-form-item">
                        <label class="layui-form-label">动画持续时间</label>
                        <div class="layui-input-inline">
                          <input type="number" name="sb_shixu" lay-verify="required" placeholder="1000为1秒" autocomplete="off" class="layui-input" value="<?php if(isset($websitebox_sbtexiao['sb_shixu'])  ){echo $websitebox_sbtexiao['sb_shixu'];}else{echo 1000;}?>">
                          <span class="websitebox_sb_zxc">默认为1000,1000为1秒</span>
                          </div>
                      </div>
                      <div class="layui-form-item">
                        <label class="layui-form-label">是否弹跳</label>
                        <div class="layui-input-block">
                            <?php if(isset($websitebox_sbtexiao['sb_tantiao']) && $websitebox_sbtexiao['sb_tantiao']==1){?>
                          <input type="checkbox"  name="sb_tantiao" lay-skin="switch" lay-filter="switchTest" lay-text="开|关" checked>
                         <?php }else{?>
                         <input type="checkbox"  name="sb_tantiao" lay-skin="switch" lay-filter="switchTest" lay-text="开|关">
                         <?php }?>
                          
                          <span class="websitebox_sb_zxc">默认为关闭</span>
                        </div>
                      </div>
                      <div class="layui-form-item">
                        <label class="layui-form-label">是否滑动</label>
                        <div class="layui-input-block">
                             <?php if(isset($websitebox_sbtexiao['sb_huadong']) && $websitebox_sbtexiao['sb_huadong']==1){?>
                          <input type="checkbox"  name="sb_huadong" lay-skin="switch" lay-filter="switchTest" lay-text="开|关" checked>
                         <?php }else{?>
                         <input type="checkbox"  name="sb_huadong" lay-skin="switch" lay-filter="switchTest" lay-text="开|关">
                         <?php }?>
                         
                          <span class="websitebox_sb_zxc">默认为关闭</span>
                        </div>
                      </div>
                      <div class="layui-form-item">
                        <label class="layui-form-label">是否逐渐透明</label>
                        <div class="layui-input-block">
                            <?php if(isset($websitebox_sbtexiao['sb_touming']) && $websitebox_sbtexiao['sb_touming']==1){?>
                          <input type="checkbox"  name="sb_touming" lay-skin="switch" lay-filter="switchTest" lay-text="开|关" checked>
                         <?php }else{?>
                         <input type="checkbox"  name="sb_touming" lay-skin="switch" lay-filter="switchTest" lay-text="开|关">
                         <?php }?>
                        
                          <span class="websitebox_sb_zxc">默认为关闭</span>
                        </div>
                      </div>
				</form>
			</div>
        </div>
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
<script>
jQuery(document).ready(function($){
    
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
              ,layer = layui.layer
              ,layedit = layui.layedit
              ,laydate = layui.laydate;
        //监听指定开关
          form.on('radio(fengge)', function (data) {
            　　console.log( data );　　//打印当前选择的信息
                if( data.value == "1"){　　　　　
                    $(".websitebox_sb_dome1").css("display","block").siblings().css("display","none")
                }
                if( data.value == "2"){　　　　
                    $(".websitebox_sb_dome2").css({"display":"block","opacity":"1"}).siblings().css("display","none")
                }
                if( data.value == "3"){　　　　　　
                    $(".websitebox_sb_dome3").css({"display":"block","opacity":"1"}).siblings().css("display","none")
                }
            　　var value = data.value;   //  当前选中的value值
            });
            if($( "input[name='fengge']")[0].checked) {
                $(".websitebox_sb_dome1").css({"display":"block","opacity":"1"}).siblings().css("display","none")
            }
            if($( "input[name='fengge']")[1].checked) {
                $(".websitebox_sb_dome2").css({"display":"block","opacity":"1"}).siblings().css("display","none")
            }
            if($( "input[name='fengge']")[2].checked) {
                $(".websitebox_sb_dome3").css({"display":"block","opacity":"1"}).siblings().css("display","none")
            }
          form.on('radio(nav)', function (data) {
        　　console.log( data );
        　　if( data.value == "1"){　　　　　
                console.log(11);
                $(".websitebox_sb_nav1").css({"display":"block","opacity":"1"}).siblings().css("display","none")
                $(".websitebox_sb_gaodu").css("display","block")
            }else {
                $(".websitebox_sb_gaodu").css("display","none")
            }
            if( data.value == "2"){　　　　　
                $(".websitebox_sb_nav2").css({"display":"block","opacity":"1"}).siblings().css("display","none")
            }
            if( data.value == "3"){　　　　　
                $(".websitebox_sb_nav3").css({"display":"block","opacity":"1"}).siblings().css("display","none")
            }
            if( data.value == "4"){　　　　　　
                $(".websitebox_sb_nav4").css({"display":"block","opacity":"1"}).siblings().css("display","none")
                $(".websitebox_sb_wenzi").css("display","block")
            }else {
                $(".websitebox_sb_wenzi").css("display","none")
            }
        　　var value = data.value;   //  当前选中的value值
        });
        if($( "input[name='nav']")[0].checked) {
            $(".websitebox_sb_nav1").css({"display":"block","opacity":"1"}).siblings().css("display","none")
        }
        if($( "input[name='nav']")[1].checked) {
            $(".websitebox_sb_nav2").css({"display":"block","opacity":"1"}).siblings().css("display","none")
            $(".websitebox_sb_gaodu").css("display","none")
        }
        if($( "input[name='nav']")[2].checked) {
            $(".websitebox_sb_nav3").css({"display":"block","opacity":"1"}).siblings().css("display","none")
            $(".websitebox_sb_gaodu").css("display","none")
        }
        if($( "input[name='nav']")[3].checked) {
            $(".websitebox_sb_nav4").css({"display":"block","opacity":"1"}).siblings().css("display","none")
            $(".websitebox_sb_wenzi").css("display","block")
        }
        //监听提交
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
    })
    let sb_dome1 = new VsClick({
      dom: 'websitebox_sb_dome1',
      timer: 3000,
      height: 5,
      width: 5,
      spring: true
    })
    let sb_dome2 = new VsClick({
      effect: 'spread',
      dom: 'websitebox_sb_dome2',
      timer: 3000,
      height: 5,
      width: 5,
      lucency: true
    })
    let sb_dome3 = new VsClick({
      effect: 'sudoku',
      dom: 'websitebox_sb_dome3',
      timer: 700,
      height: 5,
      width: 5,
      spring: true
    })
    let sb_nav1 = new VsClick({
      dom: 'websitebox_sb_nav1',
      timer: 3000,
      height: 5,
      width: 5,
      spring: true
    })
    let sb_nav2 = new VsClick({
      dom: 'websitebox_sb_nav2',
      timer: 3000,
      emoji: ['🍋', '🍌', '🍉', '🍎', '🍒', '🍓', '🌽'],
      spring: true
    })
    let sb_nav3 = new VsClick({
      dom: 'websitebox_sb_nav3',
      timer: 3000,
      emoji: ['😍', '😆', '😀', '😂', '🤣', '😒', '😘', '😁', '😉', '😎'],
      spring: true
    })
    let sb_nav4 = new VsClick({
      dom: 'websitebox_sb_nav4',
      emoji: ['富强', '民主', '文明', '和谐', '自由', '平等', '公正', '法制', '爱国', '敬业'],
      timer: 3000,
      spring: true
    })
})
</script>
<style>
    .layui-form-label {
        width: 100px;
    }
    .websitebox_sb_chang {
        width: 80%!important;
    }
    .websitebox_sb_wenzi {
        display: none;
    }
    .websitebox_sb_dome,
    .websitebox_sb_nav {
        margin-left: 130px;
        overflow: hidden;
    }
    .websitebox_sb_dome1,
    .websitebox_sb_dome2,
    .websitebox_sb_dome3 {
        position: relative;
        /*display: none;*/
        float: left;
        width: 200px;
        height: 200px;
        background-color: #fff;
        border: 1px solid #111;
    }
    .websitebox_sb_dome2,
    .websitebox_sb_dome3 {
        opacity: 0;
    }
    .websitebox_sb_nav1,
    .websitebox_sb_nav2,
    .websitebox_sb_nav3,
    .websitebox_sb_nav4 {
        position: relative;
        /*display: none;*/
        float: left;
        width: 200px;
        height: 200px;
        background-color: #fff;
        border: 1px solid #111;
    }
    .websitebox_sb_nav2,
    .websitebox_sb_nav3,
    .websitebox_sb_nav4 {
        opacity: 0;
    }
    .websitebox_box {
        -moz-user-select:none;/*火狐*/
        -webkit-user-select:none;/*webkit浏览器*/
        -ms-user-select:none;/*IE10*/
        -khtml-user-select:none;/*早期浏览器*/
        user-select:none;
    }
    .websitebox_bor_bt {
        padding-bottom: 15px;
        border-bottom: 1px solid #ccc;
    }
    .websitebox_sb_zxc {
        color: #b5b5b5;
        vertical-align: -webkit-baseline-middle;
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
</style>