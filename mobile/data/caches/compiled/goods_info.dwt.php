<div class="goods-info ect-padding-tb">
  	
      <section class="user-tab ect-border-bottom0">
        <div id="is-nav-tabs" style="height:3.15em; display:none;"></div>
        
        <ul class="nav nav-tabs text-center" style="position: static;">
          <li class="col-xs-6 active"><a href="#one" role="tab" data-toggle="tab"><?php echo $this->_var['lang']['goods_brief']; ?></a></li>
           <li class="col-xs-6"><a  href="<?php echo url('goods/comment_list',array('id'=>$this->_var['goods']['goods_id']));?>"><span>商品评论（<?php echo $this->_var['comments']['count']; ?>）</span> </a></li>
        </ul>
        
        <div class="tab-content">
          <div class="tab-pane tab-info active" id="one"> <?php echo $this->_var['goods']['goods_desc']; ?></div>
          <div class="tab-pane tab-att" id="two">
            <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#dddddd">
              <?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
?>
              <tr>
                <th colspan="2" bgcolor="#FFFFFF"><?php echo htmlspecialchars($this->_var['key']); ?></th>
              </tr>
              <?php $_from = $this->_var['property_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'property');if (count($_from)):
    foreach ($_from AS $this->_var['property']):
?>
              <tr>
                <td bgcolor="#FFFFFF" align="left" width="30%" class="f1">[<?php echo htmlspecialchars($this->_var['property']['name']); ?>]</td>
                <td bgcolor="#FFFFFF" align="left" width="70%"><?php echo $this->_var['property']['value']; ?></td>
              </tr>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </table>
          </div>
        </div>
      </section>
 </div> 


