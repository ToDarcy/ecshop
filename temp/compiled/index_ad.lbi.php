<div class="banner-container" id="banner-container">
    <ul class="banner-wrapper" style="width: 9443px; height: 500px; -webkit-transform: translate3d(-6745px, 0px, 0px); transition: 1s; -webkit-transition: 1s;">
         <?php $_from = get_flash_xml(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'flash');$this->_foreach['myflash'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myflash']['total'] > 0):
    foreach ($_from AS $this->_var['flash']):
        $this->_foreach['myflash']['iteration']++;
?>
    <li class="banner-slide swiper-slide-duplicate" style="width: 1349px; height: 500px;">
    <a href="<?php echo $this->_var['flash']['url']; ?>" title="" target="_blank"><img src="<?php echo $this->_var['flash']['src']; ?>" alt=""></a></li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
     </ul>
    <div id="banner-control" class="banner-control wrap relative hide" style="display: block;">
      <div class="banner-pagination" id="banner-pagination">
         <?php $_from = get_flash_xml(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'flash');$this->_foreach['myflash'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myflash']['total'] > 0):
    foreach ($_from AS $this->_var['flash']):
        $this->_foreach['myflash']['iteration']++;
?>
      <span class="swiper-pagination-switch"></span>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>     
      </div>
      <a href="javascript:void(0);" id="banner-prev" class="banner-prev">上一张</a>
      <a href="javascript:void(0);" id="banner-next" class="banner-next">下一张</a>
    </div>
  </div>
