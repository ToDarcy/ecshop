<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link href="themes/chengren/goods.css" rel="stylesheet" type="text/css" />
<link href="themes/chengren/quick_buy.css" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'magiczoom_plus.js,common.js')); ?>
<script language="javascript">
function shows_number(result)
{
     if(result.product_number !=undefined){
         document.getElementById('shows_number').innerHTML = result.product_number+'<?php if ($this->_var['goods']['measure_unit']): ?><?php echo $this->_var['goods']['measure_unit']; ?><?php else: ?>件<?php endif; ?>';
     }else{
         document.getElementById('shows_number').innerHTML = '无库存';
     }
}
//默认就显示第一个属性库存
function changeKucun()
{
var frm=document.forms['ECS_FORMBUY'];
spec_arr = getSelectedAttributes(frm);
    if(spec_arr==''){
         document.getElementById('shows_number').innerHTML = '<?php echo $this->_var['goods']['goods_number']; ?><?php if ($this->_var['goods']['measure_unit']): ?><?php echo $this->_var['goods']['measure_unit']; ?><?php else: ?>件<?php endif; ?>';
    }else{
         Ajax.call('goods.php?act=get_products_info', 'id=' + spec_arr+ '&goods_id=' + goods_id, shows_number, 'GET', 'JSON');
    }
}
</script>
<script type="text/javascript">
function $id(element)
{
  return document.getElementById(element);
}
//切屏--是按钮，_v是内容平台，_h是内容库
function reg(str)
{
  var bt=$id(str+"_b").getElementsByTagName("h2");
  for(var i=0;i<bt.length;i++)
{
    bt[i].subj=str;
    bt[i].pai=i;
    bt[i].style.cursor="pointer";
    bt[i].onclick=function()
{
      $id(this.subj+"_v").innerHTML=$id(this.subj+"_h").getElementsByTagName("blockquote")[this.pai].innerHTML;
      for(var j=0;j<$id(this.subj+"_b").getElementsByTagName("h2").length;j++)
{
        var _bt=$id(this.subj+"_b").getElementsByTagName("h2")[j];
        var ison=j==this.pai;
        _bt.className=(ison"":"h2bg");
      }
    }
  }
  $id(str+"_h").className="none";
  $id(str+"_v").innerHTML=$id(str+"_h").getElementsByTagName("blockquote")[0].innerHTML;
}
</script>
<?php echo $this->smarty_insert_scripts(array('files'=>'quick_buy.js')); ?>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'magiczoomplus.js,lizi_goods.js')); ?>
<div id="wrapper">
  <div class="breadcrumbs cle"> 
  <?php echo $this->fetch('library/ur_here_goods.lbi'); ?> 
    <?php if ($this->_var['goods']['goods_brand'] != "" && $this->_var['cfg']['show_brand']): ?>
    <div class="right"> <i class="iconfont"></i> <a href="<?php echo $this->_var['goods']['goods_brand_url']; ?>" target="_blank">进入<?php echo $this->_var['goods']['goods_brand']; ?>品牌馆</a> </div>
    <?php endif; ?> 
  </div>
  <div class="detail cle"> 
     
    <?php echo $this->fetch('library/goods_gallery.lbi'); ?>
    <form action="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
      
      
      <div class="item-info" id="item-info">
        <dl class="loaded">
          
          <dt class="product_name">
            <h1><?php echo $this->_var['goods']['goods_style_name']; ?></h1>
            <p class="desc"> <span class="gray"><?php echo $this->_var['goods']['goods_brief']; ?></span> </p>
			
          </dt>
          
          
          <dd class="property">
            <ul>
              <?php if ($this->_var['cfg']['show_goodssn']): ?>
              <li> <span class="lbl"><?php echo $this->_var['lang']['goods_sn']; ?></span> <em><?php echo $this->_var['goods']['goods_sn']; ?></em> </li>
              
              <?php endif; ?> 
              
              <?php if ($this->_var['cfg']['show_addtime']): ?>
              <li> <span class="lbl"><?php echo $this->_var['lang']['add_time']; ?></span> <em><?php echo $this->_var['goods']['add_time']; ?></em> </li>
              
              <?php endif; ?> 
              <?php if ($this->_var['cfg']['show_goodsweight']): ?>
              <li> <span class="lbl"><?php echo $this->_var['lang']['goods_weight']; ?></span> <em><?php echo $this->_var['goods']['goods_weight']; ?></em> </li>
              
              <?php endif; ?> 
              
              <?php if ($this->_var['cfg']['show_marketprice']): ?>
              <li> <span class="lbl"><?php echo $this->_var['lang']['market_price']; ?></span> <em class="cancel"><?php echo $this->_var['goods']['market_price']; ?></em> </li>
              <?php endif; ?>
              <li> 
         <?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?> 
                <?php echo $this->smarty_insert_scripts(array('files'=>'lefttime.js')); ?>
          <span class="icon_promo">抢购</span> <span class="lbl"><?php echo $this->_var['lang']['promote_price']; ?></span> <span class="unit"> <strong class="nala_price red" id="ECS_SHOPPRICE"><?php echo $this->_var['goods']['promote_price']; ?></strong> </span>  <span class="timedown" id="timedown"><i class="iconfont">:</i>剩余时间：<strong id="leftTime" class="font_w"><?php echo $this->_var['lang']['please_waiting']; ?></strong></span> 
                <?php else: ?> 
                <span class="lbl"><?php echo $this->_var['lang']['shop_price']; ?></span> <span class="unit"> <strong class="nala_price red" id="ECS_SHOPPRICE"><?php echo $this->_var['goods']['shop_price_formated']; ?></strong> </span>  
                
                <?php if ($this->_var['rank_prices']): ?> 
                <a href="javascript:;" id="membership" data-type="normal" class="membership">高级会员购买享有折扣<i class="iconfont"></i></a>
                <div class="membership_con">
                  <div class="how-bd">
                    <h3>会员价格</h3>
                    <table width="100%">
                      <tbody>
                        <tr>
                          <td width="50%">会员等级</td>
                          <td width="50%">会员价格</td>
                        </tr>
                        <?php $_from = $this->_var['rank_prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'rank_price');$this->_foreach['rank_price'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rank_price']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['rank_price']):
        $this->_foreach['rank_price']['iteration']++;
?>
                        <tr id="ECS_RANKPRICE_<?php echo $this->_var['key']; ?>">
                          <td><?php echo $this->_var['rank_price']['rank_name']; ?></td>
                          <td><?php echo $this->_var['rank_price']['price']; ?></td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php endif; ?> 
                
                <?php endif; ?> 
              </li>
              
              <?php if ($this->_var['goods']['give_integral'] > 0): ?>
              
              <li><span><?php echo $this->_var['lang']['goods_give_integral']; ?>可获<em class="red"><?php echo $this->_var['goods']['give_integral']; ?></em><?php echo $this->_var['points_name']; ?></span></li>
              <?php endif; ?> 
              
              <?php if ($this->_var['cfg']['use_integral']): ?>
              <li><span><?php echo $this->_var['lang']['goods_integral']; ?><em class="red"><?php echo $this->_var['goods']['integral']; ?></em><?php echo $this->_var['points_name']; ?></span></li>
              <?php endif; ?>              
            <?php if ($this->_var['goods']['is_shipping']): ?>
              <li>
              <span class="icon-coupon icon-coupon-minus fl">
             <i class="icon-coupon"><?php echo $this->_var['lang']['goods_baoyou']; ?></i>              </span>
             <div class="details-coupon-detal">
             <p><?php echo $this->_var['lang']['goods_free_shipping']; ?></p>
             </div>
             </li>              
              <?php endif; ?> 
              <?php if ($this->_var['promotion']): ?>
              <li> 
    <?php $_from = $this->_var['promotion']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?> 
              <?php if ($this->_var['item']['type'] == "snatch"): ?> 
              <span class="icon-coupon icon-coupon-minus fl">
             <i class="icon-coupon"><?php echo $this->_var['lang']['snatch']; ?></i>              </span>
             <div class="details-coupon-detal">
            <a href="snatch.php" title="<?php echo $this->_var['lang']['snatch']; ?>"></a> 
             </div>
             <?php elseif ($this->_var['item']['type'] == "group_buy"): ?> 
             <span class="icon-coupon icon-coupon-minus fl">
             <i class="icon-coupon"><?php echo $this->_var['lang']['group_buy']; ?></i>              </span>
             <div class="details-coupon-detal">
            <a href="group_buy.php" title="<?php echo $this->_var['lang']['group_buy']; ?>"></a> 
             </div>
                <?php elseif ($this->_var['item']['type'] == "auction"): ?>
             <span class="icon-coupon icon-coupon-minus fl">
             <i class="icon-coupon"><?php echo $this->_var['lang']['auction']; ?></i>              </span>
             <div class="details-coupon-detal">
            <a href="auction.php" title="<?php echo $this->_var['lang']['auction']; ?>"></a> 
             </div> 
                <?php elseif ($this->_var['item']['type'] == "favourable"): ?> 
              <span class="icon-coupon icon-coupon-minus fl">
             <i class="icon-coupon"><?php echo $this->_var['lang']['favourable']; ?></i>              </span>
             <div class="details-coupon-detal">
            <a href="activity.php" title="<?php echo $this->_var['lang']['favourable']; ?>"></a> 
             </div>
                <?php endif; ?> 
                <a href="<?php echo $this->_var['item']['url']; ?>" title="<?php echo $this->_var['lang'][$this->_var['item']['type']]; ?> <?php echo $this->_var['item']['act_name']; ?><?php echo $this->_var['item']['time']; ?>" style="font-weight:100; color:#e5004a;"><?php echo $this->_var['item']['act_name']; ?></a><br />
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
              </li>
              <?php endif; ?>
              
              <li><span class="lbl">销&nbsp;&nbsp;&nbsp;量</span><span>最近售出<em class="red"><?php echo $this->_var['sales_count']; ?></em>件</span>（已有<a href="#pjxqitem" id="pjxqitem_trig"><?php echo $this->_var['goods']['comments_number']; ?></a>人评价）</li>
            </ul>
          </dd>
          
           
          
          
          
          <dd class="tobuy-box cle">
            <ul class="sku">
              
               
              <?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
?>
                <div> 
                 <span class="lbl2"><?php echo $this->_var['spec']['name']; ?></span>
                   
                  <?php if ($this->_var['spec']['attr_type'] == 1): ?> 
                  <?php if ($this->_var['cfg']['goodsattr_style'] == 1): ?> 
                  
                  <input type="hidden" name="spec_attr_type" value="<?php echo $this->_var['spec_key']; ?>">
                  <div class="ys_xuan" id="xuan_<?php echo $this->_var['spec_key']; ?>">
                    <div class="catt" id="catt_<?php echo $this->_var['spec_key']; ?>"> 
                      <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?> 
                      <a <?php if ($this->_var['value']['disabled']): ?>class="wuxiao"<?php else: ?><?php if ($this->_var['value']['selected_key_mb5'] == '1'): ?>class="cattsel"<?php endif; ?><?php endif; ?> onclick="<?php if ($this->_var['value']['disabled']): ?><?php else: ?>show_attr_status(this,<?php echo $this->_var['goods']['goods_id']; ?><?php if ($this->_var['attr_id']): ?>,<?php echo $this->_var['attr_id']; ?><?php endif; ?>);<?php if ($this->_var['spec_key'] == $this->_var['attr_id']): ?>get_gallery_attr(<?php echo $this->_var['id']; ?>, <?php echo $this->_var['value']['id']; ?>);<?php endif; ?><?php endif; ?>" name="<?php echo $this->_var['value']['id']; ?>" id="xuan_a_<?php echo $this->_var['value']['id']; ?>">
		      <p <?php if ($this->_var['value']['thumb_url']): ?>class="padd" style="background:url(<?php echo $this->_var['value']['thumb_url']; ?>) no-repeat transparent;"<?php elseif ($this->_var['value']['hex_color'] != ''): ?>style="background:#<?php echo $this->_var['value']['hex_color']; ?>; height:40px; width:40px"<?php else: ?>style="padding:6px 10px;"<?php endif; ?> title="<?php echo $this->_var['value']['label']; ?>">
		      <?php if ($this->_var['value']['thumb_url']): ?>
		      <img src="<?php echo $this->_var['value']['thumb_url']; ?>" width="40" height="40" alt="<?php echo $this->_var['value']['label']; ?>">
		      <?php elseif ($this->_var['value']['hex_color']): ?>
		      <?php else: ?>
                      <em><?php echo $this->_var['value']['label']; ?></em>
                      <?php endif; ?>
                      <i></i>
                      </p>
                      <input style="display:none" id="spec_value_<?php echo $this->_var['value']['id']; ?>" type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" <?php if ($this->_var['value']['selected_key_mb5'] == '1'): ?>checked<?php endif; ?> />
                      </a> 
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                    </div>
                  </div>
                  <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                   
                  <?php else: ?>
                  <select name="spec_<?php echo $this->_var['spec_key']; ?>">
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
                  <label for="spec_value_<?php echo $this->_var['value']['id']; ?>">
                    <input type="checkbox" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>" onclick="changePrice()" />
                    <?php echo $this->_var['value']['label']; ?> [<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?> <?php echo $this->_var['value']['format_price']; ?>] </label>
                  <br />
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                  <?php endif; ?> 
                </div>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
              
              <script type="text/javascript">
var myString=new Array();

<?php $_from = $this->_var['prod_exist_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('pkey', 'prod');if (count($_from)):
    foreach ($_from AS $this->_var['pkey'] => $this->_var['prod']):
?>
myString[<?php echo $this->_var['pkey']; ?>]="<?php echo $this->_var['prod']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

</script> 
               
              
              
              <li class="skunum_li cle"> <span class="lbl">数&nbsp;&nbsp;&nbsp;量</span>
                <div class="skunum" id="skunum"> <span class="minus" title="减少1个数量"><i class="iconfont">-</i></span>
                  <input id="number" name="number" type="text" min="1" value="1" onchange="countNum(0)">
                  <span class="add" title="增加1个数量"><i class="iconfont">+</i></span> <cite class="storage"> 件 </cite> 
		</div>
		<div class="skunum" id="skunum">
              <?php if ($this->_var['goods']['goods_number'] != "" && $this->_var['cfg']['show_goodsnumber']): ?> 
             <cite class="storage">(<font id="shows_number">载入中···</font>)</cite>
              <?php endif; ?> 
		</div>
              </li>
              
              
              <li class="add_cart_li"> 
              <a href="javascript:addToCart1(<?php echo $this->_var['goods']['goods_id']; ?>)" class="btn"><i class="iconfont"></i>立即购买</a> 
              <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="btn" id="buy_btn"><i class="iconfont">ŭ</i>加入购物车</a> 
              <a id="fav-btn" class="graybtn" href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>)"><i class="iconfont">Ū</i>收藏</a>  
               <!--<a href="javascript:;" class="btn_wap" id="phone">去手机购买<div style="display: none;" id="phone_tan"> <span class="arr"></span>
                  <div class="m-qrcode-wrap"> <img src="erweima_png.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" height="100" width="100"> </div>
                </div>
	      </a>-->
              <script type="text/javascript">
		$("#phone").mouseover( function(){	
			$( "#phone_tan" ).show();
		});
		$("#phone").mouseleave( function(){
			$( "#phone_tan" ).hide();
		});
              </script> </li>
	    </ul>
          </dd>
        </dl>
        <div class="privileges cle">
         <ul class="cle">
        <li><i class="icon-tick"></i>全国货到付款</li>
        <li><i class="icon-tick icon-tick-2"></i>支持在线支付</li>
        <li><i class="icon-tick icon-tick-3"></i>100%正品</li>
        <li><i class="icon-tick icon-tick-4"></i>7天内退换货</li>
         </ul>
         </div>
         </div>
    </form>
    <?php echo $this->fetch('library/history.lbi'); ?> </div>
  <div class="detail_bgcolor">
    <div class="z-detail-box cle">
      <div class="z-detail-left">
      
      <?php echo $this->fetch('library/goods_fittings.lbi'); ?> 

        <div class="tabs_bar_warp">
          <div class="tabs_bar" id="tabs_bar">
            <ul>
              <li class="current_select"> <a class="spxqitem" rel="nofollow" href="javascript:void(0);">商品详情</a> </li>
              <li class=""><a class="pjxqitem" href="javascript:void(0);" name="pjxqitem" rel="nofollow">评价详情(<em><?php echo $this->_var['goods']['comments_number']; ?></em>)</a></li>
              <li class="tab-buy" id="tab-buy"><strong id="ECS_SHOPPRICE_TOP"><?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></strong><a class="btn" href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>);">购 买</a> </li>
            </ul>
          </div>
        </div>
        <div class="product_tabs">
          <div class="sectionbox z-box" id="spxqitem">
            <div class="spxq_main">
              <div>
                <div>
                  <table>
                    <tbody>
                      <tr>
                        <td width="20%" class="th"> 产品名称 :</td>
                        <td width="80%"> <?php echo $this->_var['goods']['goods_name']; ?></td>
                      </tr>
                      <?php if ($this->_var['goods']['goods_brand'] != "" && $this->_var['cfg']['show_brand']): ?>
                      <tr>
                        <td width="20%" class="th"> 产品品牌 :</td>
                        <td width="80%"> <?php echo $this->_var['goods']['goods_brand']; ?></td>
                      </tr>
                      <?php endif; ?> 
                      
                      <?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
?> 
                      
                      <?php $_from = $this->_var['property_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'property');if (count($_from)):
    foreach ($_from AS $this->_var['property']):
?>
                      <tr>
                        <td width="64" class="th"> <?php echo htmlspecialchars($this->_var['property']['name']); ?>:</td>
                        <td> <?php echo $this->_var['property']['value']; ?></td>
                      </tr>
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                      
                    </tbody>
                  </table>
                </div>
                <p>&nbsp; </p>
              </div>
              <div class="spxq_dec"><?php echo $this->_var['goods']['goods_desc']; ?></div>
            </div>
          </div>
          <div class="z-box sectionbox">
	<?php echo $this->fetch('library/comments.lbi'); ?>
    
          </div>
        </div>
      </div>
	  
	  <div class="z-detail-right">
	  	<div class="tabs_bar_right">
			<div class="tabs_bar2">热卖商品</div>
		</div>
	  	<div class="hot_box">
			<ul>
				<?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_47295400_1505981962');if (count($_from)):
    foreach ($_from AS $this->_var['goods_0_47295400_1505981962']):
?>
				<li>
					<a href="<?php echo $this->_var['goods_0_47295400_1505981962']['url']; ?>" target="_self">
						<img width="194px" height="194px" src="<?php echo $this->_var['goods_0_47295400_1505981962']['thumb']; ?>" />
						<p><?php echo $this->_var['goods_0_47295400_1505981962']['short_style_name']; ?></p>
						<p class="hot_price">
							<?php if ($this->_var['goods_0_47295400_1505981962']['promote_price'] != ""): ?>
          					<?php echo $this->_var['goods_0_47295400_1505981962']['promote_price']; ?>
          					<?php else: ?>
          					<?php echo $this->_var['goods_0_47295400_1505981962']['shop_price']; ?>
          					<?php endif; ?>
						</p>
					</a>
				</li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
		</div>
	  </div>
	  
	  
    </div>
  </div>
</div>

<div class="add_ok" id="cart_show">
    <div class="tip">
        <i class="iconfont"></i>商品已成功加入购物车
    </div>
    <div class="go">
        <a href="javascript:easyDialog.close();" class="back">&lt;&lt;继续购物</a>
        <a href="flow.php" class="btn">去结算</a>
    </div>
</div>


<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/quick_buy.lbi'); ?>
<?php echo $this->fetch('library/right_sidebar.lbi'); ?>
</body>
<script type="text/javascript">
var goods_id = <?php echo $this->_var['goods_id']; ?>;
var goodsattr_style = <?php echo empty($this->_var['cfg']['goodsattr_style']) ? '1' : $this->_var['cfg']['goodsattr_style']; ?>;
var gmt_end_time = <?php echo empty($this->_var['promote_end_time']) ? '0' : $this->_var['promote_end_time']; ?>;
<?php $_from = $this->_var['lang']['goods_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var goodsId = <?php echo $this->_var['goods_id']; ?>;
var now_time = <?php echo $this->_var['now_time']; ?>;


onload = function(){
  changePrice();
  changeKucun();//这里是添加的
  fixpng();
  try {onload_leftTime();}
  catch (e) {}
}

/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */
function changePrice()
{
  var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);

  var qty = document.forms['ECS_FORMBUY'].elements['number'].value;

  Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
}

/**
 * 接收返回的信息
 */
function changePriceResponse(res)
{
  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
  }
  else
  {
    
    if (document.getElementById('ECS_SHOPPRICE'))
      document.getElementById('ECS_SHOPPRICE').innerHTML = res.result;
	 if (document.getElementById('ECS_SHOPPRICE_TOP'))
      document.getElementById('ECS_SHOPPRICE_TOP').innerHTML = res.result;
    if (document.getElementById('ECS_GOODS_AMOUNT'))
      document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
	
  }
}

</script>
</html>
