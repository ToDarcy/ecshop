<div class="goods-info ect-padding-tb"> 
  
  <section class="user-tab ect-border-bottom0">
    <div id="is-nav-tabs" style="height:3.15em; display:none;"></div>
    
    <ul class="nav nav-tabs text-center">
      <li class="col-xs-3<?php if ($this->_var['rank'] == 0): ?> active<?php endif; ?>"><a href="#one" role="tab" data-toggle="tab"><?php echo $this->_var['lang']['all_comment']; ?></a></li>
      <li class="col-xs-3<?php if ($this->_var['rank'] == 1): ?> active<?php endif; ?>"><a href="#two" role="tab" data-toggle="tab"><?php echo $this->_var['lang']['favorable_comment']; ?></a></li>
      <li class="col-xs-3<?php if ($this->_var['rank'] == 2): ?> active<?php endif; ?>"><a href="#three" role="tab" data-toggle="tab"><?php echo $this->_var['lang']['medium_comment']; ?></a></li>
      <li class="col-xs-3<?php if ($this->_var['rank'] == 3): ?> active<?php endif; ?>"><a href="#four" role="tab" data-toggle="tab"><?php echo $this->_var['lang']['bad_comment']; ?></a></li>
    </ul>
    
    <div class="tab-content">
      <div class="tab-pane tab-msg <?php if ($this->_var['rank'] == 0): ?> active<?php endif; ?>" id="one">
        <ul class="msg">
          <?php $_from = $this->_var['comment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'comment');if (count($_from)):
    foreach ($_from AS $this->_var['comment']):
?>
          <li>
            <p><span class="pull-left"><?php echo $this->_var['lang']['username']; ?>：<?php if ($this->_var['comment']['username']): ?><?php echo htmlspecialchars($this->_var['comment']['username']); ?><?php else: ?><?php echo $this->_var['lang']['anonymous']; ?><?php endif; ?></span><span class="pull-right"><?php echo $this->_var['comment']['add_time']; ?></span></p>
            <p><?php echo $this->_var['lang']['comment_rank']; ?>：<span><img src="__TPL__/images/stars<?php echo $this->_var['comment']['rank']; ?>.png" class="star" alt="<?php echo $this->_var['comment']['comment_rank']; ?>" /></span></p>
            <p><?php echo $this->_var['comment']['content']; ?></p>
            <?php if ($this->_var['comment']['re_content']): ?>
            <p><font class="f1"><?php echo $this->_var['lang']['admin_username']; ?></font><?php echo $this->_var['comment']['re_content']; ?></p>
            <?php endif; ?>
          </li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        
        <div id="pagebar" class="f_r">
          <form name="selectPageForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <?php if ($this->_var['pager']['styleid'] == 0): ?>
            <div id="pager" style="padding:1em 0" class="text-right"> <?php echo $this->_var['lang']['pager_1']; ?><?php echo $this->_var['pager']['record_count']; ?><?php echo $this->_var['lang']['pager_2']; ?><?php echo $this->_var['lang']['pager_3']; ?><?php echo $this->_var['pager']['page_count']; ?><?php echo $this->_var['lang']['pager_4']; ?> <span> <a href="<?php echo $this->_var['pager']['page_prev']; ?>"><?php echo $this->_var['lang']['page_prev']; ?></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_var['pager']['page_next']; ?>"><?php echo $this->_var['lang']['page_next']; ?></a> </span> 
              <?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
              <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item']; ?>" />
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            </div>
            <?php else: ?> 
            <?php endif; ?>
          </form>
        </div>
         
      </div>
      <div class="tab-pane tab-msg<?php if ($this->_var['rank'] == 1): ?> active<?php endif; ?>" id="two">
        <ul class="msg">
          <?php $_from = $this->_var['comment_fav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'comment');if (count($_from)):
    foreach ($_from AS $this->_var['comment']):
?>
          <li>
            <p><?php echo $this->_var['comment']['content']; ?></p>
            <p><?php echo $this->_var['lang']['comment_rank']; ?>：<span><img src="__TPL__/images/stars<?php echo $this->_var['comment']['rank']; ?>.png" class="star" alt="<?php echo $this->_var['comment']['comment_rank']; ?>" /></span></p>
            <p><span class="pull-left"><?php echo $this->_var['lang']['username']; ?>：<?php if ($this->_var['comment']['username']): ?><?php echo htmlspecialchars($this->_var['comment']['username']); ?><?php else: ?><?php echo $this->_var['lang']['anonymous']; ?><?php endif; ?></span><span class="pull-right"><?php echo $this->_var['comment']['add_time']; ?></span></p>
          </li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        
        <div id="pagebar" class="f_r">
          <form name="selectPageForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <?php if ($this->_var['pager_fav']['styleid'] == 0): ?>
            <div id="pager" style="padding:1em 0" class="text-right"> <?php echo $this->_var['lang']['pager_1']; ?><?php echo $this->_var['pager_fav']['record_count']; ?><?php echo $this->_var['lang']['pager_2']; ?><?php echo $this->_var['lang']['pager_3']; ?><?php echo $this->_var['pager_fav']['page_count']; ?><?php echo $this->_var['lang']['pager_4']; ?> <span> <a href="<?php echo $this->_var['pager_fav']['page_prev']; ?>"><?php echo $this->_var['lang']['page_prev']; ?></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_var['pager_fav']['page_next']; ?>"><?php echo $this->_var['lang']['page_next']; ?></a> </span> 
              <?php $_from = $this->_var['pager_fav']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
              <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item']; ?>" />
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            </div>
            <?php else: ?> 
            <?php endif; ?>
          </form>
        </div>
         
      </div>
      <div class="tab-pane tab-msg<?php if ($this->_var['rank'] == 2): ?> active<?php endif; ?>" id="three">
        <ul class="msg">
          <?php $_from = $this->_var['comment_med']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'comment');if (count($_from)):
    foreach ($_from AS $this->_var['comment']):
?>
          <li>
            <p><?php echo $this->_var['comment']['content']; ?></p>
            <p><?php echo $this->_var['lang']['comment_rank']; ?>：<span><img src="__TPL__/images/stars<?php echo $this->_var['comment']['rank']; ?>.png" class="star" alt="<?php echo $this->_var['comment']['comment_rank']; ?>" /></span></p>
            <p><span class="pull-left"><?php echo $this->_var['lang']['username']; ?>：：<?php if ($this->_var['comment']['username']): ?><?php echo htmlspecialchars($this->_var['comment']['username']); ?><?php else: ?><?php echo $this->_var['lang']['anonymous']; ?><?php endif; ?></span><span class="pull-right"><?php echo $this->_var['comment']['add_time']; ?></span></p>
          </li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        
        <div id="pagebar" class="f_r">
          <form name="selectPageForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <?php if ($this->_var['pager_med']['styleid'] == 0): ?>
            <div id="pager" style="padding:1em 0" class="text-right"> <?php echo $this->_var['lang']['pager_1']; ?><?php echo $this->_var['pager_med']['record_count']; ?><?php echo $this->_var['lang']['pager_2']; ?><?php echo $this->_var['lang']['pager_3']; ?><?php echo $this->_var['pager_med']['record_count']; ?><?php echo $this->_var['lang']['pager_4']; ?> <span> <a href="<?php echo $this->_var['pager_med']['page_prev']; ?>"><?php echo $this->_var['lang']['page_prev']; ?></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_var['pager_bad']['page_next']; ?>"><?php echo $this->_var['lang']['page_next']; ?></a> </span> 
              <?php $_from = $this->_var['pager_med']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
              <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item']; ?>" />
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            </div>
            <?php else: ?> 
            <?php endif; ?>
          </form>
        </div>
         
      </div>
      <div class="tab-pane tab-msg<?php if ($this->_var['rank'] == 3): ?> active<?php endif; ?>" id="four">
        <ul class="msg">
          <?php $_from = $this->_var['comment_bad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'comment');if (count($_from)):
    foreach ($_from AS $this->_var['comment']):
?>
          <li>
            <p><?php echo $this->_var['comment']['content']; ?></p>
            <p><?php echo $this->_var['lang']['comment_rank']; ?>：<span><img src="__TPL__/images/stars<?php echo $this->_var['comment']['rank']; ?>.png" class="star" alt="<?php echo $this->_var['comment']['comment_rank']; ?>" /></span></p>
            <p><span class="pull-left"><?php echo $this->_var['lang']['username']; ?>：：<?php if ($this->_var['comment']['username']): ?><?php echo htmlspecialchars($this->_var['comment']['username']); ?><?php else: ?><?php echo $this->_var['lang']['anonymous']; ?><?php endif; ?></span><span class="pull-right"><?php echo $this->_var['comment']['add_time']; ?></span></p>
          </li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        
        <div id="pagebar" class="f_r">
          <form name="selectPageForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <?php if ($this->_var['pager_bad']['styleid'] == 0): ?>
            <div id="pager" style="padding:1em 0" class="text-right"> <?php echo $this->_var['lang']['pager_1']; ?><?php echo $this->_var['pager_bad']['record_count']; ?><?php echo $this->_var['lang']['pager_2']; ?><?php echo $this->_var['lang']['pager_3']; ?><?php echo $this->_var['pager_bad']['record_count']; ?><?php echo $this->_var['lang']['pager_4']; ?> <span> <a href="<?php echo $this->_var['pager_bad']['page_prev']; ?>"><?php echo $this->_var['lang']['page_prev']; ?></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_var['pager_bad']['page_next']; ?>"><?php echo $this->_var['lang']['page_next']; ?></a> </span> 
              <?php $_from = $this->_var['pager_bad']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
              <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item']; ?>" />
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            </div>
            <?php else: ?> 
            <?php endif; ?>
          </form>
        </div>
         
      </div>
    </div>    
  </section>
   
</div>
<script type="text/javascript">
//<![CDATA[
<?php $_from = $this->_var['lang']['cmt_lang']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

/**
 * 提交评论信息
*/
function submitComment(frm)
{
  var cmt = new Object;

  //cmt.username        = frm.elements['username'].value;
  cmt.email           = frm.elements['email'].value;
  cmt.content         = frm.elements['content'].value;
  cmt.type            = frm.elements['cmt_type'].value;
  cmt.id              = frm.elements['id'].value;
  cmt.enabled_captcha = frm.elements['enabled_captcha'] ? frm.elements['enabled_captcha'].value : '0';
  cmt.captcha         = frm.elements['captcha'] ? frm.elements['captcha'].value : '';
  cmt.rank            = 0;

  for (i = 0; i < frm.elements['comment_rank'].length; i++)
  {
    if (frm.elements['comment_rank'][i].checked)
    {
       cmt.rank = frm.elements['comment_rank'][i].value;
     }
  }

//  if (cmt.username.length == 0)
//  {
//     alert(cmt_empty_username);
//     return false;
//  }

  if (cmt.email.length > 0)
  {
     if (!(Utils.isEmail(cmt.email)))
     {
        alert(cmt_error_email);
        return false;
      }
   }
   else
   {
        alert(cmt_empty_email);
        return false;
   }

   if (cmt.content.length == 0)
   {
      alert(cmt_empty_content);
      return false;
   }

   if (cmt.enabled_captcha > 0 && cmt.captcha.length == 0 )
   {
      alert(captcha_not_null);
      return false;
   }
	
   $.post('<?php echo url('comment/index');?>', {'cmt':$.toJSON(cmt)}, function(data){
   	commentResponse(data);
   }, 'json');
   //Ajax.call('<?php echo url('comment/index');?>', 'cmt=' + cmt.toJSONString(), commentResponse, 'POST', 'JSON');
   return false;
}

/**
 * 处理提交评论的反馈信息
*/
  function commentResponse(result)
  {
    if (result.message)
    {
      alert(result.message);
    }

    if (result.error == 0)
    {
      var layer = document.getElementById('ECS_COMMENT');

      if (layer)
      {
        layer.innerHTML = result.content;
      }
    }
  }

//]]>
</script>