<?php echo $this->smarty_insert_scripts(array('files'=>'quick_buy1.js')); ?>

<div class="quickBoxOuter" id="quickBoxOuter">

      <div class="quickBoxInner clearfix">
        <div class="title-bar">
          <h2>快速订购<font>(闪电下单，无需走购物车流程，简单方便更快捷！)</font></h2>
          <a href="javascript:closeLogin('quickBoxOuter')" class="close_quick"></a>
          </div>
        <div class="quickBox clearfix">
          <form action="quick_buy.php" method="post" name="ECS_FORMQUICKBUY" id="ECS_FORMQUICKBUY" onsubmit="return checkOrderForm(this)">
            <input name="goods_id" type="hidden" value="<?php echo $this->_var['goods']['goods_id']; ?>"/>
            <input name="goods_sn" type="hidden" value="<?php echo $this->_var['goods']['goods_sn']; ?>"/>
            <input name="goods_weight" type="hidden" value="<?php echo $this->_var['goods']['goods_weight']; ?>"/>
            <input name="market_price" type="hidden" value="<?php echo $this->_var['goods']['market_price']; ?>"/>
            <ul class="QuickProductBox clearfix">
              <li><em>商品名称：</em>
                <input name="goods_name" type="text" class="textInput" value="<?php echo $this->_var['goods']['goods_name']; ?>" readonly style="width:300px" />
              </li>
              
              <?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
?>
              <li> <em><?php echo $this->_var['spec']['name']; ?>：</em>
                
                <?php if ($this->_var['spec']['attr_type'] == 1): ?>
                <?php if ($this->_var['cfg']['goodsattr_style'] == 1): ?>
				<div class="sku_box2">
				 <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                <label class="<?php if ($this->_var['key'] == 0): ?>selected<?php endif; ?> sku_list2" for="spec_quick_value_<?php echo $this->_var['value']['id']; ?>">
                  <input style="display:none;" type="radio" name="spec_quick_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_quick_value_<?php echo $this->_var['value']['id']; ?>" <?php if ($this->_var['key'] == 0): ?>checked<?php endif; ?> onclick="quick_to_cart(<?php echo $this->_var['goods']['goods_id']; ?>)" />
                  <?php echo $this->_var['value']['label']; ?> <span class="icon_bg">已选中</span></label>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
				
				
				
                <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                <?php else: ?>
                <select name="spec_quick_<?php echo $this->_var['spec_key']; ?>" onchange="quick_to_cart(<?php echo $this->_var['goods']['goods_id']; ?>)">
                  <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                  <option label="<?php echo $this->_var['value']['label']; ?>" value="<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['label']; ?> <?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?><?php if ($this->_var['value']['price'] != 0): ?><?php echo $this->_var['value']['format_price']; ?><?php endif; ?></option>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </select>
                <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                <?php endif; ?>
                <?php else: ?>
                <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                <label for="spec_quick_value_<?php echo $this->_var['value']['id']; ?>">
                  <input type="checkbox" name="spec_quick_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_quick_value_<?php echo $this->_var['value']['id']; ?>" onclick="quick_to_cart(<?php echo $this->_var['goods']['goods_id']; ?>)" />
                  <?php echo $this->_var['value']['label']; ?> [<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?> <?php echo $this->_var['value']['format_price']; ?>] </label>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                <?php endif; ?>
              </li>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              
            </ul>
            <ul class="quickAddressBox clearfix">
              
              <li class="w150"><em>购物数量：</em><input name="qty" type="text" value="1" class="textInput" id="textNum"  onblur="quick_to_cart(<?php echo $this->_var['goods']['goods_id']; ?>)"/></li>
              <li class="w150"><em>商品总价：</em><span class="total_price" id="total_price">&nbsp;</span></li>
              
              
              <li class="w150" style="clear:both"><em>收货人姓名：</em> <input name="consignee" class="textInput" value="<?php echo $this->_var['consignee']['consignee']; ?>" type="text" /> <font>*</font></li>
              
              <li class="w150"> <em>联系电话：</em><input name="tel" class="textInput" value="<?php echo $this->_var['consignee']['tel']; ?>" type="text" /><font>*</font> </li> 
              
                
              <li><em>配送区域：</em>
                <input name="country" id="country" type="hidden" value="1" />
                <select name="province" id="selProvinces_1" onchange="region.changed(this, 2, 'selCities_1');quick_to_cart(0);" style="border:1px solid #ccc;">
                  <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['1']; ?></option>
                  <?php $_from = $this->_var['shop_province_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'province');if (count($_from)):
    foreach ($_from AS $this->_var['province']):
?>
                  <option value="<?php echo $this->_var['province']['region_id']; ?>" <?php if ($this->_var['consignee']['province'] == $this->_var['province']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['province']['region_name']; ?></option>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </select>
                <select name="city" id="selCities_1" onchange="region.changed(this, 3, 'selDistricts_1');quick_to_cart(0);" style="border:1px solid #ccc;">
                  <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['2']; ?></option>
                  <?php $_from = $this->_var['city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?>
                  <option value="<?php echo $this->_var['city']['region_id']; ?>" <?php if ($this->_var['consignee']['city'] == $this->_var['city']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['city']['region_name']; ?></option>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </select>
                <select name="district" id="selDistricts_1" <?php if (! $this->_var['district_list']): ?>style="display:none"<?php endif; ?> onchange="quick_to_cart(0);" style="border:1px solid #ccc;">
                  <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></option>
                  <?php $_from = $this->_var['district_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'district');if (count($_from)):
    foreach ($_from AS $this->_var['district']):
?>
                  <option value="<?php echo $this->_var['district']['region_id']; ?>" <?php if ($this->_var['consignee']['district'] == $this->_var['district']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['district']['region_name']; ?></option>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </select>
                <font>*</font> </li>
              <li><em>街道地址：</em>
                <input name="address" class="textInput" value="<?php echo $this->_var['consignee']['address']; ?>" type="text" style="width:300px;" />
                <font>*</font> </li>
             
              <li style="display:none"><em>手机：</em>
                <input name="mobile" class="textInput" value="<?php echo $this->_var['consignee']['mobile']; ?>" type="text" />
              </li>
              <li style="display:none"><em>email：</em>
                <input name="email" class="textInput" value="<?php echo $this->_var['consignee']['email']; ?>" type="text" />
              </li>
              <li style="display:none"><em>备注信息：</em>
                <textarea name="postscript" cols="50" rows="3" id="postscript" style="border:1px solid #ccc;"></textarea>
              </li>
              <input name="address_id" class="textInput" value="<?php echo $this->_var['consignee']['address_id']; ?>" type="hidden" />
              <li id="shipping_list" style="display:none;"></li>
              <li id="payment_list">
			  	<em>支付方式：</em>
				<div class="sku_box2">
				<?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['payment']):
?>
				<label class="<?php if ($this->_var['key'] == 0): ?>selected<?php endif; ?> sku_list2" for="pay_quick_value_<?php echo $this->_var['payment']['pay_id']; ?>"><input type="radio" name="payment" id="pay_quick_value_<?php echo $this->_var['payment']['pay_id']; ?>" value="<?php echo $this->_var['payment']['pay_id']; ?>" <?php if ($this->_var['key'] == 0): ?> checked<?php endif; ?> isCod="<?php echo $this->_var['payment']['is_cod']; ?>"  onClick="quick_to_cart(<?php echo $this->_var['goods']['goods_id']; ?>);" style="display:none;"/><?php echo strip_tags($this->_var['payment']['pay_name']); ?><span class="icon_bg">已选中</span></label>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
			  </li>
            </ul>
            <ul class="quickAddressBox clearfix" style="display:none">
              
            </ul>
            <ul class="quickAddressBox clearfix">
              <li style="clear:both"> <em>&nbsp;</em>
                <input type="image" src="themes/chengren/images/zt_cart_bg05.jpg" value="" style="cursor:pointer; border:0px;" />
              </li>
            </ul>
          </form>
        </div>
      </div>
      
      <?php echo $this->smarty_insert_scripts(array('files'=>'region.js')); ?>
      <script language="javascript">
/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */


region.isAdmin = false;
<?php $_from = $this->_var['lang1']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_50405200_1505981962');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_50405200_1505981962']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item_0_50405200_1505981962']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

var flow_no_payment = "<?php echo $this->_var['lang1']['flow_no_payment']; ?>";
        var flow_no_shipping = "<?php echo $this->_var['lang1']['flow_no_shipping']; ?>";

 </script>
</div>

    <div id="fade" class="black_overlay"></div>

