<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.js,jquery_json.js,easydialog.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'transport_jquery.js,utils.js,jquery_SuperSlide.js,lizi_common.js')); ?>
<?php if ($this->_var['script_name'] == 'login' || $this->_var['script_name'] == 'register' || $this->_var['script_name'] == 'qpassword' || $this->_var['script_name'] == 'flow'): ?>
<div id="header">
    <div class="topbar">
  <div class="wrap clf">
   <ul class="topbar-welcome fl" id="ECS_MEMBERZONE">
   <?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
    </ul>
    <ul class="topbar-nav fr">
      <li><i class="i-global i-topbar-order"></i><a href="user.php?act=order_list" rel="nofollow">我的订单</a></li>
      <li class="tb-qrcode relative"><i class="i-global i-topbar-download"></i><a title="<?php echo $this->_var['shop_name']; ?>手机商城" href="/mobile" target="_blank">手机商城</a><i class="qrcode qrcode-tb hide"></i></li>
      <li><i class="i-global i-topbar-favorites"></i><a id="favorite_wb" href="javascript:;" rel="nofollow">收藏本站</a></li>
      <li id="topbar-map-btn" class="topbar-map-btn relative"><i class="i-global i-topbar-nav"></i><a href="javascript:;">网站导航</a><span class="i-triangle i-triangle-map"></span></li>
      <li><i class="i-global i-topbar-phone"></i>服务热线：<?php echo $this->_var['service_phone']; ?></li>
    </ul>
  </div>
  <div class="topbar-map relative hide">
    <div class="wrap topbar-map-content">
      <div class="topbar-map-list clf">
        <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['categories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['categories']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['categories']['iteration']++;
?>
        <dl class="topbar-map-column">
          <dt><a href="<?php echo $this->_var['cat']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['cat']['name']); ?>"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a></dt>
          <dd class="clf">
          <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>          
       <a href="<?php echo $this->_var['child']['url']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a>          
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </dd>
        </dl>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>
    </div>
    <div class="topbar-map-bg"></div>
  </div>
</div>
<?php else: ?>
<?php $_from = get_advlist_by_id(1); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
   <div class="tophotad j-aCloseDiv">
	<p style="background:url(<?php echo $this->_var['ad']['image']; ?>) no-repeat center;">
    <a href="<?php echo $this->_var['ad']['url']; ?>" rel="nofollow" target="_blank"><?php echo $this->_var['ad']['name']; ?></a>
    </p>
    <a href="javascript:;" title="收起" class="a-close">×</a>
   </div>
   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<div id="header">
  <div class="topbar">
  <div class="wrap clf">
    <ul class="topbar-welcome fl" id="ECS_MEMBERZONE">
   <?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
    </ul>
    <ul class="topbar-nav fr">
      <li><i class="i-global i-topbar-order"></i><a href="user.php?act=order_list" rel="nofollow">我的订单</a></li>
      <li class="tb-qrcode relative"><i class="i-global i-topbar-download"></i><a title="<?php echo $this->_var['shop_name']; ?>手机商城" href="/mobile" target="_blank">手机商城</a><i class="qrcode qrcode-tb hide"></i></li>
      <li><i class="i-global i-topbar-favorites"></i><a id="favorite_wb" href="javascript:;" rel="nofollow">收藏本站</a></li>
      <li id="topbar-map-btn" class="topbar-map-btn relative"><i class="i-global i-topbar-nav"></i><a href="javascript:;">网站导航</a><span class="i-triangle i-triangle-map"></span></li>
      <li><i class="i-global i-topbar-phone"></i>服务热线：<?php echo $this->_var['service_phone']; ?></li>
    </ul>
  </div>
  <div class="topbar-map relative hide">
    <div class="wrap topbar-map-content">
      <div class="topbar-map-list clf">
        <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['categories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['categories']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['categories']['iteration']++;
?>
        <dl class="topbar-map-column">
          <dt><a href="<?php echo $this->_var['cat']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['cat']['name']); ?>"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a></dt>
          <dd class="clf">
          <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>          
       <a href="<?php echo $this->_var['child']['url']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a>          
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </dd>
        </dl>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>
    </div>
    <div class="topbar-map-bg"></div>
  </div>
</div>
  <div class="header">
  <div class="wrap clf">
    <div class="logo fl">
      <a href="index.php" title="<?php echo $this->_var['shop_name']; ?>"><img src="themes/chengren/images/logo.png" width="300px" alt="<?php echo $this->_var['shop_name']; ?>"></a>
  </div>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script> 
  <script type="text/javascript">
    
    <!--
    function checkSearchForm()
    {
        if(document.getElementById('keyword').value)
        {
            return true;
        }
        else
        {
            alert("<?php echo $this->_var['lang']['no_keywords']; ?>");
            return false;
        }
    }
    -->
    
    </script>
    <div class="search-box fl">
      <div class="search-wraper">
        <div class="search">
        <form action="search.php" method="get" id="searchForm" name="searchForm" class="clf" onsubmit="return checkSearchForm()">
        <label></label>
        <input type="text" name="keywords" id="keyword" class="search-kw fl" placeholder="请输入要查找的商品名称" autocomplete="off">
		 <input type="hidden" value="k1" name="dataBi">
         <input id="searchBtn" type="submit" class="search-btn fl" value="搜 索">
       </form>
        </div>
        <?php if ($this->_var['searchkeywords']): ?>
        <p class="kw-hot">
        <?php $_from = $this->_var['searchkeywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');$this->_foreach['val'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['val']['total'] > 0):
    foreach ($_from AS $this->_var['val']):
        $this->_foreach['val']['iteration']++;
?>
	<a href="search.php?keywords=<?php echo urlencode($this->_var['val']); ?>"><?php echo $this->_var['val']; ?></a>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>           
        </p>
        <?php endif; ?>
       </div>
    </div>
    <div class="header-cart fl relative"> 
    <a href="flow.php?step=cart" rel="nofollow">我的购物车</a>
   <i class="i-global i-header-num"></i>    
    </div>
  </div>
</div>
</div>

<div class="nav-box" id="nav" style="position: static; top: auto;">
  <div class="nav-wrap wrap clf">
    <div id="menu" class="menu relative fl">
      <p class="menu-all relative"><a href="javascript:void(0)">所有商品分类</a>
      <i class="i-global i-nav-menu"></i></p>
      <div class="submenu hide">
         <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['categories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['categories']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['categories']['iteration']++;
?>
	    <?php if ($this->_foreach['categories']['iteration'] < 8): ?>
        <div class="submenu-item">
        <p class="submenu-title i-global i-menu-<?php echo $this->_foreach['categories']['iteration']; ?>">
         <?php echo htmlspecialchars($this->_var['cat']['name']); ?><i class="i-global submenu-arrow"></i>
         <i class="submenu-shelter hide" style="display: none;"></i>
        </p>
        <ul class="submenu-hot clf">
       <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
          <li><a target="_blank" title="<?php echo htmlspecialchars($this->_var['child']['name']); ?>" href="<?php echo $this->_var['child']['url']; ?>" rel="nofollow"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a></li>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
         </ul>
        <dl class="submenu-detail hide" style="display: none;">
         <dt class="submenu-detail-title"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></dt>
          <dd class="menu-column">
            <ul class="submenu-list clf">
            <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
              <li><a target="_blank" title="<?php echo htmlspecialchars($this->_var['child']['name']); ?>" href="<?php echo $this->_var['child']['url']; ?>" rel="nofollow"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a></li>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </ul>
          </dd>
          <dt class="submenu-detail-title">知名品牌</dt>
          <dd class="menu-column">
            <ul class="submenu-list clf">
    <?php $_from = $this->_var['cat']['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');$this->_foreach['brands'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['brands']['total'] > 0):
    foreach ($_from AS $this->_var['brand']):
        $this->_foreach['brands']['iteration']++;
?>
              <?php if ($this->_foreach['brands']['iteration'] < 10): ?>
              <li><a target="_blank" title="<?php echo htmlspecialchars($this->_var['brand']['brand_name']); ?>" href="<?php echo $this->_var['brand']['url']; ?>" rel="nofollow"><?php echo htmlspecialchars($this->_var['brand']['brand_name']); ?></a></li>
             <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </ul>
          </dd>
      
          
        </dl>
      </div>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
    </div>
    <ul class="nav fl">
    <li <?php if ($this->_var['navigator_list']['config']['index'] == 1): ?> class="current"<?php endif; ?>> <a title="<?php echo $this->_var['lang']['home']; ?>" href="index.php"><?php echo $this->_var['lang']['home']; ?></a></li>
    <?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
    <li <?php if ($this->_var['nav']['active'] == 1): ?> class="current"<?php endif; ?>><a href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?>target="_blank" <?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a></li>
       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
    </div>
</div>
<?php endif; ?>
