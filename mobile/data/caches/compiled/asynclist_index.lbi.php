
<?php if ($this->_var['goods']): ?>
<?php if ($this->_var['goods']['iteration'] % 2 == 0): ?>
<li class="fr">
<?php else: ?>
<li class="fl">
<?php endif; ?>
  <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo $this->_var['goods']['name']; ?>" /></a>
  <a href="<?php echo $this->_var['goods']['url']; ?>"><p><?php echo $this->_var['goods']['name']; ?></p></a>
  <span><?php if ($this->_var['goods']['promote_price']): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></span>
</li>
<?php endif; ?> 
 