<ul>
	<li class="fl index-footer-list"><a href="<?php echo url('index/index');?>"><i class="iconfont">&#xe621;</i><span><?php echo $this->_var['lang']['home']; ?></span></a></li>
	<li class="fl index-footer-list"><a href="<?php echo url('category/top_all');?>"><i class="iconfont">&#xe627;</i><span><?php echo $this->_var['lang']['category']; ?></span></a></li>
	<li class="fl index-footer-list"><a href="javascript:openSearch();"><i class="iconfont">&#xe617;</i><span><?php echo $this->_var['lang']['search']; ?></span></a></li>
	<li class="fl index-footer-list"><a href="<?php echo url('flow/cart');?>"><i class="iconfont">&#xe626;</i><span><?php echo $this->_var['lang']['shopping_cart']; ?></span></a></li>
	<?php if ($this->_var['is_drp']): ?>
	<li class="fl index-footer-list"><a href="<?php echo url('sale/index');?>"><i class="iconfont">&#xe625;</i><span>店铺管理</span></a></li>
	<?php else: ?>
	<li class="fl index-footer-list"><a href="<?php echo url('user/index');?>"><i class="iconfont">&#xe625;</i><span><?php echo $this->_var['lang']['user_center']; ?></span></a></li>
	<?php endif; ?>	
</ul>