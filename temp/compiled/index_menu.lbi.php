<div class="wrap homepage-submenu relative">
  <div class="submenu">
<?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat_0_75716400_1505982259');$this->_foreach['categories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['categories']['total'] > 0):
    foreach ($_from AS $this->_var['cat_0_75716400_1505982259']):
        $this->_foreach['categories']['iteration']++;
?>
	    <?php if ($this->_foreach['categories']['iteration'] < 8): ?>
        <div class="submenu-item">
        <p class="submenu-title i-global i-menu-<?php echo $this->_foreach['categories']['iteration']; ?>">
         <?php echo htmlspecialchars($this->_var['cat_0_75716400_1505982259']['name']); ?><i class="i-global submenu-arrow"></i>
         <i class="submenu-shelter hide" style="display: none;"></i>
        </p>
        <ul class="submenu-hot clf">
       <?php $_from = $this->_var['cat_0_75716400_1505982259']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child_0_75778500_1505982259');if (count($_from)):
    foreach ($_from AS $this->_var['child_0_75778500_1505982259']):
?>
          <li><a target="_blank" title="<?php echo htmlspecialchars($this->_var['child_0_75778500_1505982259']['name']); ?>" href="<?php echo $this->_var['child_0_75778500_1505982259']['url']; ?>" rel="nofollow"><?php echo htmlspecialchars($this->_var['child_0_75778500_1505982259']['name']); ?></a></li>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
         </ul>
        <dl class="submenu-detail hide" style="display: none;">
         <dt class="submenu-detail-title"><?php echo htmlspecialchars($this->_var['cat_0_75716400_1505982259']['name']); ?></dt>
          <dd class="menu-column">
            <ul class="submenu-list clf">
            <?php $_from = $this->_var['cat_0_75716400_1505982259']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child_0_75796600_1505982259');if (count($_from)):
    foreach ($_from AS $this->_var['child_0_75796600_1505982259']):
?>
              <li><a target="_blank" title="<?php echo htmlspecialchars($this->_var['child_0_75796600_1505982259']['name']); ?>" href="<?php echo $this->_var['child_0_75796600_1505982259']['url']; ?>" rel="nofollow"><?php echo htmlspecialchars($this->_var['child_0_75796600_1505982259']['name']); ?></a></li>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </ul>
          </dd>
          <dt class="submenu-detail-title">知名品牌</dt>
          <dd class="menu-column">
            <ul class="submenu-list clf">
            <?php $_from = $this->_var['cat_0_75716400_1505982259']['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand_0_75811700_1505982259');$this->_foreach['brands'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['brands']['total'] > 0):
    foreach ($_from AS $this->_var['brand_0_75811700_1505982259']):
        $this->_foreach['brands']['iteration']++;
?>
              <?php if ($this->_foreach['brands']['iteration'] < 10): ?>
              <li><a target="_blank" title="<?php echo htmlspecialchars($this->_var['brand_0_75811700_1505982259']['brand_name']); ?>" href="<?php echo $this->_var['brand_0_75811700_1505982259']['url']; ?>" rel="nofollow"><?php echo htmlspecialchars($this->_var['brand_0_75811700_1505982259']['brand_name']); ?></a></li>
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
