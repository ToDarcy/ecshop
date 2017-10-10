<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_var['lang']['cp_home']; ?><?php if ($this->_var['ur_here']): ?> - <?php echo $this->_var['ur_here']; ?><?php endif; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />

<style type="text/css">
body,html {
  height: 100%;
  overflow: hidden;
}
body {
	overflow: hidden;
	background: #fff;
	font: normal 12px/22px 宋体;
	position:relative;
	background:#2f4158 url(images/login_bg02.jpg) 50% 50%; background-size: cover;
}
img {
	border: 0;
}
a {
	text-decoration: none;
	color: #333;
}
<?php if ($this->_var['gd_version'] > 0): ?>
.login_con{margin: 1.5% auto 0 auto;}
<?php endif; ?>
</style>

<?php echo $this->smarty_insert_scripts(array('files'=>'../js/jquery.js,../js/jquery_json.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,validator.js')); ?>
<script language="JavaScript">
<!--
// 这里把JS用到的所有语言都赋值到这里
<?php $_from = $this->_var['lang']['js_languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

if (window.parent != window)
{
  window.top.location.href = location.href;
}

//-->
</script>
</head>
<body>
<div class="login_box">
<div class="login_con">
<div class="login_logo"><a href=" http://down.duodl.com/" target="_blank"><img src="images/logo.png" class="img-circle"/></a></div>
<div class="login_h"></div>
<div class="login_c">
<form method="post" action="privilege.php" name='theForm' onsubmit="return validate()">
  <table cellspacing="0" cellpadding="0" border="0" align="center" width="320">
    <tr>
      <td height="70" align="center" valign="middle" style="font-size:30px; color:#333; font-family:'宋体';">ECShop管理中心</td>
    </tr>
    <tr>
      <td align="center" >
      	<table>
          <tr>
            <td colspan="2">
            	<label class="label">
                    <i><img src="images/login_icon01.png" /></i>
                    <input type="text" name="username" class="login_input" placeholder="<?php echo $this->_var['lang']['label_username']; ?>"/>
                </label>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="padding-top:18px;">
            	<label class="label">
                    <i><img src="images/login_icon02.png" /></i>
                    <input type="password" name="password" class="login_input" placeholder="<?php echo $this->_var['lang']['label_password']; ?>"/>
                </label>
            </td>
          </tr>
          <?php if ($this->_var['gd_version'] > 0): ?>
          <tr>
            <td colspan="2" style="padding-top:18px;">
            	<label class="label">
                	<i><img src="images/login_icon03.png" /></i>
                    <input type="text" name="captcha" class="login_input" placeholder="<?php echo $this->_var['lang']['label_captcha']; ?>"/>
                    <img src="index.php?act=captcha&<?php echo $this->_var['random']; ?>" alt="CAPTCHA" onclick= this.src="index.php?act=captcha&"+Math.random() title="<?php echo $this->_var['lang']['click_for_another']; ?>" class="gb_version" />
                </label>
            </td>
          </tr>
          <?php endif; ?>
          <tr>
            <td  align="center" style="padding-top:18px;">
          <input type="submit" value="<?php echo $this->_var['lang']['signin_now']; ?>" class="button"/></td>
          </tr>
          <tr>
            <td colspan="2" style="padding:18px 0;">
            	<div class="jizhu_label">
                <input type="checkbox" value="1" name="remember" id="remember" />
                <label for="remember"><?php echo $this->_var['lang']['remember']; ?></label>
                </div>
               <a class="jizhu_label link-forget cl-link-blue" href="get_password.php?act=forget_pwd"><?php echo $this->_var['lang']['forget_pwd']; ?></a>
              <a class="jizhu_label link-home cl-link-blue" href="../"><?php echo $this->_var['lang']['back_home']; ?></a>
            </td>
            </tr>
        </table>
        </td>
    </tr>
    <tr>
    </tr>
  </table>
  <input type="hidden" name="act" value="signin" />
</form>
</div>
<div class="login_f"></div>
</div>
</div>
<script language="JavaScript">
<!--
  document.forms['theForm'].elements['username'].focus();
  
  /**
   * 检查表单输入的内容
   */
  function validate()
  {
    var validator = new Validator('theForm');
    validator.required('username', user_name_empty);
    //validator.required('password', password_empty);
    if (document.forms['theForm'].elements['captcha'])
    {
      validator.required('captcha', captcha_empty);
    }
    return validator.passed();
  }
  
//-->
</script>
</body>