<?php if ($this->_var['user_info']): ?>
<span><?php echo $this->_var['lang']['welcome_return']; ?>！</span>&nbsp;
<a href="user.php" class=""><?php echo $this->_var['user_info']['username']; ?></a>&nbsp;
<span>[</span>
<a class="logout" href="user.php?act=logout">退出</a><span>]</span></li>
<?php else: ?>
<span><?php echo $this->_var['lang']['welcome']; ?>！</span>
<a href="user.php"  class="logininfo" rel="nofollow">请登录</a>
<a href="user.php?act=register" class="topbar-reg" rel="nofollow">免费注册</a>
<?php endif; ?>        
            
