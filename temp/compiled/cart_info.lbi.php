<form id="formCart" name="formCart" method="post" action="flow.php" >
	<span class="cart_num"><?php echo $this->_var['number']; ?></span>
	<div class="sidebar-cart-box">
        <h3 class="sidebar-panel-header">
            <a href="javascript:;" class="title"><i class="cart-icon"></i><em class="title">购物车</em></a>
            <span class="close-panel"></span>
        </h3>
        <div class="cart-panel-main">
            <div class="cart-panel-content">
                <?php if ($this->_var['cart_list']): ?>
                <div class="cart-list">
                   <?php $_from = $this->_var['cart_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_69320800_1505981945');if (count($_from)):
    foreach ($_from AS $this->_var['goods_0_69320800_1505981945']):
?>
                    <div class="cart-item">
                        <div class="item-goods">
                            <span class="p-img"><a href="<?php echo $this->_var['goods_0_69320800_1505981945']['url']; ?>"><img src="<?php if ($this->_var['goods_0_69320800_1505981945']['goods_thumb'] == 'package_img'): ?>../images/jmpic/ico_cart_package.gif<?php else: ?><?php echo $this->_var['goods_0_69320800_1505981945']['thumb']; ?><?php endif; ?>" width="50" height="50" alt="<?php echo $this->_var['goods_0_69320800_1505981945']['short_name']; ?>"></a></span>
                        <div class="p-name"><a href="<?php echo $this->_var['goods_0_69320800_1505981945']['url']; ?>" title="<?php echo $this->_var['goods_0_69320800_1505981945']['short_name']; ?>"><?php echo $this->_var['goods_0_69320800_1505981945']['short_name']; ?></a></div>
                        <div class="p-price"><strong><?php echo $this->_var['goods_0_69320800_1505981945']['shop_price']; ?></strong>×<?php echo $this->_var['goods_0_69320800_1505981945']['goods_number']; ?></div>
                        <a href="javascript:;" class="p-del" onClick="deleteCartGoods(<?php echo $this->_var['goods_0_69320800_1505981945']['rec_id']; ?>)">删除</a>
                        </div>
                    </div>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
                <?php else: ?>
                <div class="tip-box">
                  <i class="tip-icon"></i>
                  <div class="tip-text">您的购物车里什么都没有哦<br/><a class="main-color" href="./">再去看看吧</a></div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($this->_var['cart_list']): ?>
        <div class="cart-panel-footer">
            <div class="cart-footer-checkout">
                <div class="number">共<strong class="count"><?php echo $this->_var['number']; ?></strong>件商品</div>
                <div class="sum">共计：<strong class="total"><?php echo $this->_var['amount']; ?></strong>元</div>
                <a class="btn" href="flow.php" target="_blank">去购物车结算</a>
            </div>
        </div>
        <?php endif; ?>
    </div>
<script type="text/javascript">
function deleteCartGoods(rec_id){
	Ajax.call('delete_cart_goods.php', 'id='+rec_id, deleteCartGoodsResponse, 'POST', 'JSON');
}

/**
 * 接收返回的信息
 */
function deleteCartGoodsResponse(res){
  if (res.error){
    alert(res.err_msg);
  }else{
      $('.ECS_CARTINFO').html(res.content);
	  $('.cart-panel-content').height($(window).height()-90);
  }
}
</script> 
</form>
