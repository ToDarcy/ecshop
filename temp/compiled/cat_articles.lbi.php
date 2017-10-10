<?php if ($this->_var['script_name'] == 'index'): ?>
<div class="chosen-box clf">
<dt class="solid">
<h3 class="h_title h_title2 clf">
<?php if ($this->_var['article_categories']): ?>
    <?php $_from = $this->_var['article_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat_0_65759400_1505981945');if (count($_from)):
    foreach ($_from AS $this->_var['cat_0_65759400_1505981945']):
?>
<?php if ($this->_var['cat_0_65759400_1505981945']['id'] > 3): ?>
<a class="h_title_none" href="<?php echo $this->_var['cat_0_65759400_1505981945']['url']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['articles_cat']['name']); ?></a>
<span class="clear_none">
<?php $_from = $this->_var['cat_0_65759400_1505981945']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'child_0_65788400_1505981945');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['k'] => $this->_var['child_0_65788400_1505981945']):
        $this->_foreach['name']['iteration']++;
?>
<a href="<?php echo $this->_var['child_0_65788400_1505981945']['url']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['child_0_65788400_1505981945']['name']); ?></a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</span>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endif; ?>
</h3>
</dt>
<dd class="h_mt8">
<div class="product-item clf">
 <?php $_from = $this->_var['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
 <a href="<?php echo $this->_var['article']['url']; ?>" target="_blank">
 <?php if ($this->_var['article']['file_url'] != ""): ?>
<img alt="<?php echo htmlspecialchars($this->_var['article']['title']); ?>" 
src="<?php echo $this->_var['article']['file_url']; ?>">
<?php else: ?>
<img width="220" height="300" alt="<?php echo htmlspecialchars($this->_var['article']['title']); ?>" 
src="themes/chengren/images/no_img.gif">
<?php endif; ?>
<p><?php echo htmlspecialchars($this->_var['article']['title']); ?></p></a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</dd>
</div>
<?php elseif ($this->_var['script_name'] == 'category'): ?>
<div id="market">
        <div class="mt">
          <h2><?php echo htmlspecialchars($this->_var['articles_cat']['name']); ?></h2>
        </div>
        <div class="mc">
          <ul>
          <?php $_from = $this->_var['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article_item');if (count($_from)):
    foreach ($_from AS $this->_var['article_item']):
?>
            <li>·<a href="<?php echo $this->_var['article_item']['url']; ?>" target="_blank"><?php echo $this->_var['article_item']['short_title']; ?></a></li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
          </ul>
        </div>
      </div>
<?php else: ?>
      <div class="mt">
        <h2><?php echo htmlspecialchars($this->_var['articles_cat']['name']); ?></h2>
      </div>
      <div class="mc">
        <ul>
          <?php $_from = $this->_var['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article_item');if (count($_from)):
    foreach ($_from AS $this->_var['article_item']):
?>
          <li>·<a target="_blank" href="<?php echo $this->_var['article_item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['article_item']['title']); ?>"><?php echo $this->_var['article_item']['short_title']; ?></a></li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
       
        </ul>
      </div>

<?php endif; ?>
