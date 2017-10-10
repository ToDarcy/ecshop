<?php if ($this->_var['goods_list']): ?>
<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_70287900_1505981945');if (count($_from)):
    foreach ($_from AS $this->_var['goods_0_70287900_1505981945']):
?>
 <li>
 <div class="p-img">
 <a target="_blank" href="<?php echo $this->_var['goods_0_70287900_1505981945']['url']; ?>">
 <img src="<?php echo $this->_var['goods_0_70287900_1505981945']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods_0_70287900_1505981945']['goods_name']; ?>">
 </a>
 </div>
 <div class="p-name">
 <a target="_blank" href="<?php echo $this->_var['goods_0_70287900_1505981945']['url']; ?>"><?php echo $this->_var['goods_0_70287900_1505981945']['goods_name']; ?>
 </a> 
 </div>
 <div class="p-comm">
 <span class="p-price main-color">
  <?php if ($this->_var['goods_0_70287900_1505981945']['promote_price'] != ""): ?> 
  <?php echo $this->_var['goods_0_70287900_1505981945']['promote_price']; ?> 
  <?php else: ?> 
  <?php echo $this->_var['goods_0_70287900_1505981945']['shop_price']; ?> 
   <?php endif; ?> 
 </span> 
 </div>
</li>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>    
<?php else: ?>
 <div class="cart-panel-main">
<div class="cart-panel-content" style="height: 489px;">
<div class="tip-box">
<i class="tip-icon"></i>
<?php if ($this->_var['user_id'] > 0): ?>
<div class="tip-text">您的收藏夹里什么都没有哦<br>
<a class="main-color" href="./">再去看看吧</a></div>
  <?php else: ?> 
<div class="tip-text">你还没登陆，无法查看收藏夹哦<br>
<a class="quick-login-a main-color" href="javascript:;">登陆查看</a></div>  
   <?php endif; ?> 
</div>
</div>
</div>
<?php endif; ?>
<script type="text/javascript">	
<?php if (! $_SESSION['user_id'] > 0): ?>
//点击用户图标弹出登录框
$('.quick-login .quick-links-a,.tip-text .quick-login-a,.quick-login .quick-login-a,.customer-service-online a').click(function(){
	$('.pop-login,.pop-mask').show();
})
<?php endif; ?>
</script>