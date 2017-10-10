
<?php if ($this->_var['cat_best']): ?>
<?php $_from = $this->_var['cat_best']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat_best');$this->_foreach['cat_best'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_best']['total'] > 0):
    foreach ($_from AS $this->_var['cat_best']):
        $this->_foreach['cat_best']['iteration']++;
?>
<div class="index-more-icon"><span><?php echo $this->_var['cat_best']['cat_name']; ?></span></div>

    <?php $_from = $this->_var['cat_best']['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat_goods');$this->_foreach['cat_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_goods']['total'] > 0):
    foreach ($_from AS $this->_var['cat_goods']):
        $this->_foreach['cat_goods']['iteration']++;
?> 
    <div class="single_item">
    <?php if ($this->_foreach['cat_goods']['iteration'] % 2 == 0): ?>
    <li class="fr" style="background-color: #FFFFFF;">
    <?php else: ?>
    <li class="fl" style="background-color: #FFFFFF;">
    <?php endif; ?>
      <a href="<?php echo $this->_var['cat_goods']['url']; ?>"><img src="<?php echo $this->_var['cat_goods']['goods_img']; ?>" alt="<?php echo $this->_var['cat_goods']['name']; ?>" /></a>
      <a href="<?php echo $this->_var['cat_goods']['url']; ?>"><p><?php echo $this->_var['cat_goods']['name']; ?></p></a>
      <span><?php if ($this->_var['cat_goods']['promote_price']): ?><?php echo $this->_var['cat_goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['cat_goods']['shop_price']; ?><?php endif; ?></span>
    </li>
    </div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
<?php endif; ?>
