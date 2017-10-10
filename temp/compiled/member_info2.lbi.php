 <div class="sidebar-user-info">
                            <?php if (! $_SESSION['user_id'] > 0): ?>                                <div class="user-pic">
                                	<div class="user-pic-mask"></div>
                                    <img src="themes/chengren/images/people.gif" />
                                </div>
                                <p>你好！请<a href="javascript:;" class="quick-login-a main-color">登录</a>|<a href="user.php?act=register" class="main-color">注册</a></p>
                                <?php else: ?>
                                <div class="user-have-login">
                                	<div class="user-pic">
                                        <div class="user-pic-mask"></div>
                                        <?php if ($_SESSION['headimg']): ?>
                                        <img src="<?php echo $_SESSION['headimg']; ?>" />
                                        <?php else: ?>
                                        <img src="themes/chengren/images/people.gif" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="user-info">
                                    	<p>用户名：<?php echo $this->_var['user_info']['username']; ?></p>
                                        <p>级　别：<?php echo $this->_var['user_info']['user_rank_name']; ?></p>
                                    </div>
                                </div>
                                <p class="mt10">
                                	<a class="btn order-btn" href="user.php?act=order_list">订单中心</a>
									<a class="btn account-btn" href="user.php?act=account_detail">帐户中心</a>
                                </p>
                             <?php endif; ?>
                            </div>

<script type="text/javascript">	
<?php if (! $_SESSION['user_id'] > 0): ?>
//点击用户图标弹出登录框
$('.quick-login .quick-links-a,.quick-login .quick-login-a,.customer-service-online a').click(function(){
	$('.pop-login,.pop-mask').show();
})
<?php endif; ?>
</script>