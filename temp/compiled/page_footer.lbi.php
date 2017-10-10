  <?php echo $this->smarty_insert_scripts(array('files'=>'common_min.js')); ?>
 <?php echo $this->smarty_insert_scripts(array('files'=>'index_min.js')); ?>
<div id="footer">
  <?php if ($this->_var['helps']): ?>
  <div class="footer">
    <div class="wrap">
      <div class="footer-wrap">
        <?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');$this->_foreach['helps'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['helps']['total'] > 0):
    foreach ($_from AS $this->_var['help_cat']):
        $this->_foreach['helps']['iteration']++;
?>
        <dl class="footer-column">
          <dt class="footer-title">
          <i class="i-global i-footer-<?php echo $this->_foreach['helps']['iteration']; ?>"></i><?php echo $this->_var['help_cat']['cat_name']; ?></dt>
          <dd class="footer-content">
        <?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
         <p><a href="help.php?id=<?php echo $this->_var['item']['article_id']; ?>" target="_blank" rel="nofollow"><?php echo $this->_var['item']['short_title']; ?></a></p>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </dd>
        </dl>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
       <dl class="footer-column footer-service">
          <dt class="footer-title"><i class="i-global i-footer-rx"></i>客服热线</dt>
          <dd class="footer-content">
            <p class="footer-telephone">
            <?php if ($this->_var['service_phone']): ?>
             <?php echo $this->_var['service_phone']; ?>
             <?php endif; ?>
               </p>
            <p>周一至周日 9:00-21:00</p>
          </dd>
        </dl>
        <dl class="footer-column footer-qrcode">
          <dt class="footer-title"><i class="i-global i-footer-xz"></i>商城APP</dt>
          <dd class="footer-content">
            <i class="qrcode qrcode-footer"></i>
            <p>下载APP,购物更隐私</p>
          </dd>
        </dl>
      </div>
    </div>
  </div>  
   <?php endif; ?>
  <div class="copyright">
    <div class="wrap">
      <div class="copyright-wrap clf">
        <p class="copyright-content fr">
          <a class="footer-police" href="http://www.miibeian.gov.cn/publish/query/indexFirst.action" target="_blank"><i class="i-global i-footer-police"></i></a>
<?php echo $this->_var['copyright']; ?>	 
<?php if ($this->_var['icp_number']): ?>
  <a href="http://www.miibeian.gov.cn/publish/query/indexFirst.action" target="_blank"><?php echo $this->_var['icp_number']; ?></a>
  <?php endif; ?>
        </p>
        <ul class="copyright-nav fl">
          <li><a href="javascript:;" rel="nofollow" onclick="AddFavorite('<?php echo $this->_var['shop_name']; ?>',location.href)">加入收藏</a></li>
		  <?php if ($this->_var['navigator_list']['bottom']): ?>
         <?php $_from = $this->_var['navigator_list']['bottom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav_0_66578900_1505981945');$this->_foreach['nav_bottom_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_bottom_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav_0_66578900_1505981945']):
        $this->_foreach['nav_bottom_list']['iteration']++;
?>
       <li><a href="<?php echo $this->_var['nav_0_66578900_1505981945']['url']; ?>" <?php if ($this->_var['nav_0_66578900_1505981945']['opennew'] == 1): ?> target="_blank" <?php endif; ?>><?php echo $this->_var['nav_0_66578900_1505981945']['name']; ?></a></li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php endif; ?>
      </ul>
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
<?php echo $this->smarty_insert_scripts(array('files'=>'common_min.js')); ?>
