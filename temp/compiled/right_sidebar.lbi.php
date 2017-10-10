<?php echo $this->smarty_insert_scripts(array('files'=>'user.js')); ?>
<div class="right-sidebar-con">
	<div class="right-sidebar-main">
        <div class="right-sidebar-panel">
            <div id="quick-links" class="quick-links">
            	<ul>
                    <li class="quick-area quick-login">
                        <a href="javascript:;" class="quick-links-a"><i class="setting"></i></a>
                        <div class="sidebar-user quick-sidebar">
                        	<i class="arrow-right"></i>
                            <?php 
$k = array (
  'name' => 'member_info2',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
                        </div>
                    </li>
                    <li class="sidebar-tabs">
                        <div class="cart-list quick-links-a" id="collectBox">
                            <i class="cart"></i>
                            <div class="span">购物车</div>
                            <span class="ECS_CARTINFO" id="ECS_CARTINFO"><?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></span>
                        </div>
                    </li>
                    <li class="sidebar-tabs">
                        <a href="javascript:void(0);" class="mpbtn_history quick-links-a"><i class="history"></i></a>
                        <div class="popup">
                            <font id="mpbtn_histroy">我看过的</font>
                            <i class="arrow-right"></i>
                        </div>
                    </li>
                     <li class="sidebar-tabs">
                        <a href="javascript:void(0);" class="mpbtn_history quick-links-a"><i class="collect"></i></a>
                        <div class="popup">
                            <font id="mpbtn_histroy">我的收藏</font>
                            <i class="arrow-right"></i>
                        </div>
                    </li>
                    <li id="collectGoods">
                        <a href="user.php?act=account_log" target="_blank" class="mpbtn_collect quick-links-a"><i class="account"></i></a>
                        <div class="popup" style="left: -121px; visibility: hidden;">
                            我的资产
                            <i class="arrow-right"></i>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="quick-toggle">
            	<ul>
                    <li class="quick-area">
                    	<a class="quick-links-a" href="javascript:;"><i class="customer-service"></i></a>
                        <div class="sidebar-service quick-sidebar">
                        	<i class="arrow-right"></i>
                            <?php $_from = $this->_var['qq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
                             <?php if ($this->_var['im']): ?>
                         <div class="customer-service">
                         <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->_var['im']; ?>&site=<?php echo $this->_var['shop_name']; ?>&menu=yes" alt="点击这里给我发消息" title="点击这里给我发消息"><span class="icon-qq"></span>联系QQ客服</a>
                        </div>
                        <?php endif; ?>
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php $_from = $this->_var['ww']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
                    <?php if ($this->_var['im']): ?>
                        <div class="customer-service">
                         <a target="_blank" href="http://amos1.taobao.com/msg.ww?v=2&uid=<?php echo urlencode($this->_var['im']); ?>&s=2" alt="点击这里给我发消息" title="点击这里给我发消息"><span class="icon-ww"></span>联系旺旺客服</a>
                        </div> 
                         <?php endif; ?>
                         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>                            
                        </div>
                    </li>
                    <li class="quick-area">
                    	<a class="quick-links-a" href="javascript:;"><i class="qr-code"></i></a>
                        <div class="sidebar-code quick-sidebar">
                        	<i class="arrow-right"></i>
                            <img src="themes/chengren/images/weixin.jpg"/>
                        </div>
                    </li>
                    <li class="returnTop">
                        <a href="javascript:;" class="return_top quick-links-a"><i class="top"></i></a>
                        <div class="popup">
                        	返回顶部
                        	<i class="arrow-right"></i>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="">
        	
        	<div id="ECS_CARTINFO_content" class="ECS_CARTINFO right-sidebar-panels"><?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
        	
            
        	<div class="right-sidebar-panels">
				<h3 class="sidebar-panel-header">
                	<a href="javascript:;" class="title"><i></i><em class="title">我的足迹</em></a>
                    <span class="close-panel"></span>
                </h3>
          		<div class="sidebar-panel-main">
            		<div class="sidebar-panel-content">
              			<div class="history-panel">
              				<ul>
                				<?php 
$k = array (
  'name' => 'right_history',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
                			</ul>
     		  			</div>
            		</div>
          		</div>
        	</div>
        	
             
        	<div class="right-sidebar-panels">
				<h3 class="sidebar-panel-header">
                	<a href="javascript:;" class="title"><i class="bonus-icon"></i><em class="title">我的收藏</em></a>
                    <span class="close-panel"></span>
                </h3>
          		<div class="sidebar-panel-main">
            		<div class="sidebar-panel-content">
              			<div class="history-panel">
              				<ul>
                				<?php 
$k = array (
  'name' => 'right_collect',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
                			</ul>
     		  			</div>
            		</div>
          		</div>
        	</div>
        	
        </div>
    </div>
</div>

<div class="pop-main pop-compare">
	<div class="pop-header">
    	<span>温馨提示</span>
        <a class="pop-close" href="javascript:;" title="关闭"></a>
    </div>
    <div class="pop-con">
    	<i class="pop-icon"></i>
        <p class="pop-text"></p>
        <a href="javascript:;" class="pop-sure main-bg-color">确定</a><a href="javascript:;" class="cancel-btn none">取消</a>
    </div>
</div>


<div class="pop-main pop-compare-small">
	<div class="pop-header">
    	<span>温馨提示</span>
        <a class="pop-close" href="javascript:;" title="关闭"></a>
    </div>
    <div class="pop-con">
    	<i class="pop-icon"></i>
        <p class="pop-text"></p>
        <a href="javascript:;" class="cancel-btn">关闭</a>
    </div>
</div>

<div class="pop-main pop-success">
	<div class="pop-header"><span>温馨提示</span><a href="javascript:;" title="关闭" class="pop-close"></a></div>
    <div class="pop-con">
        <i class="pop-icon"></i>
        <p class="pop-text"></p>
        <a href="javascript:;" class="cancel-btn">关闭</a>
    </div>
</div>
<div id="tell-me-result" class="tell-me-form" style="display:none;">
	<div class="pop-header"><span>温馨提示</span><a href="javascript:closeDiv1()" title="关闭" class="tell-me-close"></a></div>
    <div class="tell-me-content">
    	<div class="tell-me-result">
            <div class="result-icon"></div>
            <div class="result-text">
            	<div class="title"></div>
                <div class="bottom">
                	<span onclick="javascript:closeDiv1();" class="cancel-btn">关闭</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pop-mask"></div>
                            <div class="pop-main pop-login">
  <div class="pop-header"> <span>您尚未登录</span><a class="pop-close" href="javascript:;" title="关闭"></a></div>
  <div class="pop-con">
    <form name="formLogin" action="user.php" method="post" onSubmit="return ajax_user_login();">
      <div class="form">
      	<div class="mt">
        	<h2>用户登陆</h2><a href="user.php?act=register" class="right_register main-color"><span class="text">立即注册</span><i class="icon"></i></a>
        </div>
        <div class="mc">
        	<div class="msg-wrap">
            	<div class="msg-error">
                	<i class="msg-icon"></i><span id="msg-error-text" class="msg-error-text"></span>
                </div>
            </div>
        	<div class="item item-name">
            	<i class="icon"></i>
                <input name="username" id="username" type="text" class="text" value="" tabindex="1" placeholder="手机号/用户名/邮箱"/>
            </div>
            <div class="item item-password">
                <i class="icon"></i>
                <input type="password" name="password" id="password" class="text" value="" tabindex="2" placeholder="密码"/>
            </div>
            <?php if ($this->_var['enabled_captcha']): ?>
            <div class="item item-authcode" id="o-authcode">
            	<div class="item-detail fl">
                    <i class="icon"></i>
                    <input type="text" id="authcode" name="captcha" class="text text-1" tabindex="3" placeholder="验证码"/>
                </div>
                <label class="img fl">
                    <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" />
                </label>
            </div>
            <?php endif; ?>
            <div class="safety" id="autoentry">
                <input type="checkbox" value="1" name="remember" id="remember" class="checkbox"/>
                <label for="remember" class="mar-b">请保存我这次的登录信息</label>
                <a class="forget_password fr" href="findPwd.php">忘记密码？</a> 
            </div>
            <div class="login-btn">
              <input type="hidden" name="act" value="act_login" />
              <input type="hidden" name="back_act"  value=''/>
              <input type="submit" name="submit" class="btn-img" id="loginsubmit" value="立即登录" />
            </div>
            <div class="item-coagent">
		    	<a href="user.php?act=oath&type=weixin"><i class="weixin"></i>微信</a>
            	<a href="user.php?act=oath&type=qq"><i class="qq"></i>QQ</a>
            	<a href="user.php?act=oath&type=weibo"><i class="sina"></i>新浪</a>
            	<a href="user.php?act=oath&type=alipay" class="last"><i class="alipay"></i>支付宝</a>
            </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">	
$(window).scroll(function(){ 
	if($(this).scrollTop() > $(window).height() ){ 
		$('.returnTop').show();
	}else{ 
		$('.returnTop').hide();
	} 
}) 
$('.cart-panel-content').height($(window).height()-90);
$('.bonus-panel-content').height($(window).height()-40);
$(".returnTop").click(function(){
	$('body,html').animate({scrollTop:0},800);
	return false;
});
$('.quick-area').hover(function(){
	$(this).find('.quick-sidebar').toggle();
})
//移动图标出现文字
$(".right-sidebar-panel li").mouseenter(function(){
	$(this).children(".popup").stop().animate({left:-92,queue:true});
	$(this).children(".popup").css("visibility","visible");
	$(this).children(".ibar_login_box").css("display","block");
});
$(".right-sidebar-panel li").mouseleave(function(){
	$(this).children(".popup").css("visibility","hidden");
	$(this).children(".popup").stop().animate({left:-121,queue:true});
	$(this).children(".ibar_login_box").css("display","none");
});
//点击购物车、用户信息以及浏览历史事件
$('.sidebar-tabs').click(function(){
	if($('.right-sidebar-main').hasClass('right-sidebar-main-open')&&$(this).hasClass('current')){
		$('.right-sidebar-main').removeClass('right-sidebar-main-open');
		$(this).removeClass('current');
		$('.right-sidebar-panels').eq($(this).index()-1).removeClass('animate-in').addClass('animate-out').css('z-index',1);
	}else{
		$(this).addClass('current').siblings('.sidebar-tabs').removeClass('current');
		$('.right-sidebar-main').addClass('right-sidebar-main-open');
		$('.right-sidebar-panels').eq($(this).index()-1).addClass('animate-in').removeClass('animate-out').css('z-index',2).siblings('.right-sidebar-panels').removeClass('animate-in').addClass('animate-out').css('z-index',1);
	}
});
$(".right-sidebar-panels").on('click', '.close-panel', function () {
	$('.sidebar-tabs').removeClass('current');
	$('.right-sidebar-main').removeClass('right-sidebar-main-open');
	$('.right-sidebar-panels').removeClass('animate-out');
});
$(document).click(function(e){ 
	var target = $(e.target); 
	if(target.closest('.right-sidebar-con').length == 0){ 
		$('.right-sidebar-main').removeClass('right-sidebar-main-open');
		$('.sidebar-tabs').removeClass('current');
		$('.right-sidebar-panels').removeClass('animate-in').addClass('animate-out').css('z-index',1);
	} 
}) 

$('.pop-login').css('top',($(window).height()-$('.pop-login').height())/2);
$('.pop-close').click(function(){
	$('.pop-main,.pop-mask').hide();
	$('form[name="formLogin"]').find('.msg-wrap').css('visibility','hidden');
	$('.pop-login .item,.pop-login .item-detail').removeClass('item-error');
	$('.pop-login .text').val('');
})
$('.pop-login .item .text').focus(function(){
	$(this).addClass('')	
})
</script>