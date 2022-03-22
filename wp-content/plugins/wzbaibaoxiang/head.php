<?php $pay = websitebox_paymoney('/api/index/pay_money');?>
	<blockquote class="layui-elem-quote layui-text" style="width: 1202px;margin-top: 10px;margin-left: 10px;box-sizing: border-box;">
  		官网：<a href="https://www.rbzzz.com">www.rbzzz.com</a> &nbsp;&nbsp;客服QQ：1500351892 &nbsp;&nbsp;交流QQ群1：1077537009 &nbsp;&nbsp;交流QQ群2：185975495  &nbsp;&nbsp;论坛：<a href="https://luntan.rbzzz.com">https://luntan.rbzzz.com</a>
  		<?php if(!$pay){?>
  		<a href="https://www.rbzzz.com" target="_blank" class="wzt_qcpopup_keybox" id="wzt_qcpopup_keyshow">授权key</a>
  		<?php }?>
	</blockquote>
    <style>
        em {
            font-style: normal;
        }
        .wzt_qcpopup_keybox {
            background: #fff;
            color: #333;
            border: 1px solid #c3c3c3;
            border-radius: 3px;
            line-height: 35px;
            padding: 0 10px;
            font-size: 14px;
            margin-left: 10px;
            display: inline-block;
        }
		.wzt_qcpopup_key {
            display: none; 
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10000;
            width: 360px;
            /* height: 250px; */
            background-color: #FFF;
            border-radius: 5px;
            box-shadow: 1px 1px 50px rgb(0 0 0 / 30%);
            overflow: hidden;
        }
        .wzt_linkpopup_hd {
            height: 42px;
            line-height: 42px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
            color: #333;
            background-color: #F8F8F8;
            box-sizing: border-box;
            padding: 0 80px 0 20px;
        }
        .wzt_linkpopup_bd {
            position: relative;
            padding: 20px;
            line-height: 24px;
            word-break: break-all;
            overflow: hidden;
            font-size: 14px;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .wzt_linkpopup_btn {
            padding: 0 15px 12px;
            text-align: right;
        }
        .wzt_linkpopup_btn em {
            display: inline-block;
            height: 40px;
            line-height: 40px;
            padding: 0 18px;
            background-color: #0099FF;
            color: #fff;
            white-space: nowrap;
            text-align: center;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .wzt_masks {
            display: none; 
            position: fixed;
            width: 100%;
            height: 100%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }
</style>
<!-- 授权遮罩 -->
<div class="wzt_masks"></div>
<!-- 授权弹出 -->
<div class="wzt_qcpopup_key">
    <div class="wzt_linkpopup_hd">请输入key密钥</div>
    <div class="wzt_linkpopup_bd" style="text-align: center;">
        <input type="text" name="website_key" placeholder="请输入key密钥" style="width: 100%;">
        <a href="https://www.rbzzz.com/qxcp.html" style="color: red;" target="_blank">点击进入官网购买授权key</a>
    </div>
    <div class="wzt_linkpopup_btn">
        <em class="wzt_btn wzt_queding" id="wzt_qcpopup_keyqd">确定</em>
        <em class="wzt_btn wzt_qx" style="background-color: #b9b9b9;">取消</em>
    </div>
</div>
<!-- js -->
<script>
jQuery(document).ready(function($){
    $("#wzt_qcpopup_keyshow").click(function() {
        $(".wzt_masks").fadeIn()
        $(".wzt_qcpopup_key").fadeIn()
        return false
    })
    
    $(".wzt_qx").click(function() {
        $(".wzt_masks").fadeOut()
        $(".wzt_qcpopup_key").fadeOut()
    })
    layui.use(['form', 'layedit', 'laydate','colorpicker'], function(){
    	  var form = layui.form
    	  ,layer = layui.layer
        $('#wzt_qcpopup_keyqd').click(function(){
            
                var website_key = $('input[name="website_key"]').val();
                var index = layer.load(1, {
                    shade: [0.7,'#111'] //0.1透明度的白色背景
                });
                $.ajax({
                    url:"",
    		  	    data:{data:'{"websitebox":"20","nonce":"<?php echo esc_attr(wp_create_nonce('websitebox'));?>","action":"websitebox","website_key":"'+website_key+'"}'},
    		  		type:"post",
    		  		dataType:"json",
    		  		success:function(data){
    		  		    layer.close(index);
    		  			if(data.msg==1){
    		  				layer.alert("授权成功");
    		  				window.location.reload();
    		  			}else{
    		  				layer.msg("授权key不正确");
    		  			}
      		
    		        }
    	        })
            
        })
    })
})
</script>