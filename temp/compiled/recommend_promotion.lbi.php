<?php if ($this->_var['promotion_goods']): ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'Sales_time.js')); ?>
<style>
.timediv{position:absolute;top:0;left:330px;display: none;}
.time1{display: block;}
</style>
<div class="sale" id="sale">
<div class="sale-top clf">
<i class="i-sale i-clock"></i>
<i class="i-sale i-sale-tips"></i>
<span class="sale-status fl">距离本场结束：</span>
<ul class="i-sale i-sale-time" id="Sales_Time"/></ul>
<div class="sale-right fr">
<a href="search.php?intro=promotion" target="_blank" class="i-sale-all fl">查看所有<i class="i-sale-arrow"></i></a>
</div>
</div>
<ul class="sale-list clf" id="sale-list">
<?php $_from = $this->_var['promotion_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
<li class="sale-item">
<div class="sale-item-pic">
<a target="_blank" href="<?php echo $this->_var['goods']['url']; ?>">
<img src="<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">
<span class="sale-item-discount">直降<?php echo $this->_var['goods']['zhekou']; ?>%</span></a>
</div>
<p class="sale-item-name">
<a target="_blank" href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo htmlspecialchars($this->_var['goods']['name']); ?></a></p>
<div class="clf">
<p class="sale-item-price">
<i><?php echo $this->_var['goods']['market_price']; ?></i>
<span><?php echo $this->_var['goods']['promote_price']; ?></span>
</p>
 <?php if ($this->_var['goods']['goods_number'] == 0): ?>
   <a class="disable">已抢光</a>
  <?php else: ?>
 <a target="_blank" href="<?php echo $this->_var['goods']['url']; ?>" class="sale-item-btn">去抢购</a>
  <?php endif; ?> 
</div>
</li>
<script type="text/javascript">
var now_time = <?php echo $this->_var['now_time']; ?>;
var gmt_end_time = <?php echo empty($this->_var['goods']['gmt_end_time']) ? '0' : $this->_var['goods']['gmt_end_time']; ?>;
var day = "";
var hour = "";
var minute = "";
var second = "";
var end = "";
onload_Sales_Time();
</script>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>          
</ul>
</div>
<?php endif; ?>