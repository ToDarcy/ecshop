<?php

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
include_once('includes/cls_json.php');
require(ROOT_PATH . 'includes/lib_sms.php');

require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/sms.php');

if (!isset($_REQUEST['step']))
{
    $_REQUEST['step'] = "";
}

$result = array('error' => 0, 'message' => '');
$json = new JSON;

$mobile = trim($_POST['mobile']);

$old_log = '';
if(file_exists("request.log")){
	$old_log = file_get_contents("request.log");
}
$log = "ip=".real_ip()." mobile=".$mobile." time=".date('Y-m-d H:i:s',time())."\r\n";
$new_log = $old_log.$log;
file_put_contents("request.log",$new_log);

$denied_log = '';
if(file_exists("denied.log")){
	$denied_log = file_get_contents("denied.log");
}

$ip_array = explode(",", $denied_log);

if(in_array(real_ip(), $ip_array)) {
	$result['error'] = 6;
	$result['message'] = $_LANG['invalid_mobile_phone'];
	die($json->encode($result));
}

$count = $db->getOne("SELECT COUNT(id) FROM " . $ecs->table('verifycode') ." WHERE getip='" . real_ip() . "' AND dateline>'" . gmtime() ."'-86400");

if ($count >= 5 && !stristr($denied_log, $_G['clientip']))
{
	$log = real_ip().",";
	$new_log = $denied_log.$log;
	file_put_contents("denied.log",$new_log);

	$result['error'] = 6;
	$result['message'] = $_LANG['invalid_mobile_phone'];
	die($json->encode($result));
}

if ($_REQUEST['step'] == 'getverifycode1')
{
	/* 是否开启手机短信验证注册 */
	if($_CFG['ecsdxt_mobile_reg'] == '0') {
		$result['error'] = 1;
		$result['message'] = $_LANG['ecsdxt_mobile_reg_closed'];
        die($json->encode($result));
	}
	
	/* 提交的手机号是否正确 */
	if (!ismobile($mobile))
	{
		$result['error'] = 2;
		$result['message'] = $_LANG['invalid_mobile_phone'];
        die($json->encode($result));
	}

	/* 提交的手机号是否已经注册帐号 */
    $sql = "SELECT COUNT(user_id) FROM " . $ecs->table('users') ." WHERE mobile_phone = '$mobile'";

    if ($db->getOne($sql) > 0)
    {
        $result['error'] = 3;
		$result['message'] = $_LANG['mobile_phone_registered'];
        die($json->encode($result));
    }

	/* 获取验证码请求是否获取过 */
	$sql = "SELECT COUNT(id) FROM " . $ecs->table('verifycode') ." WHERE status=1 AND getip='" . real_ip() . "' AND dateline>'" . gmtime() ."'-".$_CFG['ecsdxt_smsgap'];

    if ($db->getOne($sql) > 0)
    {
        $result['error'] = 4;
		$result['message'] = sprintf($_LANG['get_verifycode_excessived'], $_CFG['ecsdxt_smsgap']);
        die($json->encode($result));
    }

	$verifycode = getverifycode();

    $smarty->assign('shop_name',	$_CFG['shop_name']);
    $smarty->assign('user_mobile',	$mobile);
    $smarty->assign('verify_code',  $verifycode);

    $content = $smarty->fetch('str:' . $_CFG['ecsdxt_mobile_reg_value']);
	
	/* 发送注册手机短信验证 */
	$ret = sendsms($mobile, $content);
	
	if($ret === true)
	{
		//插入获取验证码数据记录
		$sql = "INSERT INTO " . $ecs->table('verifycode') . "(mobile, getip, verifycode, dateline) VALUES ('" . $mobile . "', '" . real_ip() . "', '$verifycode', '" . gmtime() ."')";
		$db->query($sql);

		$result['error'] = 0;
		$result['message'] = $_LANG['send_mobile_verifycode_successed'];
		die($json->encode($result));
	}
	else
	{
		$statusStr = array(
		"0" => "短信发送成功",
		"-1" => "参数不全",
		"-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
		"30" => "密码错误",
		"40" => "账号不存在",
		"41" => "余额不足",
		"42" => "帐户已过期",
		"43" => "IP地址限制",
		"50" => "内容含有敏感词"
	);
		
		$result['error'] = 5;
		$result['message'] = $_LANG['send_mobile_verifycode_failured'] .$statusStr[$ret];
		die($json->encode($result));
	}
}

elseif ($_REQUEST['step'] == 'getverifycode2')
{
	/* 是否开启手机绑定 */
	if($_CFG['ecsdxt_mobile_bind'] == '0') {
		$result['error'] = 1;
		$result['message'] = $_LANG['ecsdxt_mobile_bind_closed'];
        die($json->encode($result));
	}
	
	/* 提交的手机号是否正确 */
	if (!ismobile($mobile))
	{
		$result['error'] = 2;
		$result['message'] = $_LANG['invalid_mobile_phone'];
        die($json->encode($result));
	}

	/* 提交的手机号是否已经绑定帐号 */
    $sql = "SELECT COUNT(user_id) FROM " . $ecs->table('users') ." WHERE mobile_phone = '$mobile'";

    if ($db->getOne($sql) > 0)
    {
        $result['error'] = 3;
		$result['message'] = $_LANG['mobile_phone_binded'];
        die($json->encode($result));
    }

	/* 获取验证码请求是否获取过 */
	$sql = "SELECT COUNT(id) FROM " . $ecs->table('verifycode') ." WHERE (status=4 or status=5) AND getip='" . real_ip() . "' AND dateline>'" . gmtime() ."'-".$_CFG['ecsdxt_smsgap'];

    if ($db->getOne($sql) > 0)
    {
        $result['error'] = 4;
		$result['message'] = sprintf($_LANG['get_verifycode_excessived'], $_CFG['ecsdxt_smsgap']);
        die($json->encode($result));
    }

	$verifycode = getverifycode();

    $smarty->assign('shop_name',	$_CFG['shop_name']);
    $smarty->assign('user_mobile',	$mobile);
    $smarty->assign('verify_code',  $verifycode);

    $content = $smarty->fetch('str:' . $_CFG['ecsdxt_mobile_bind_value']);
	
	/* 发送注册手机短信验证 */
	$ret = sendsms($mobile, $content);
	
	if($ret === true)
	{
		//插入获取验证码数据记录
		$sql = "INSERT INTO " . $ecs->table('verifycode') . "(mobile, getip, verifycode, dateline, status) VALUES ('" . $mobile . "', '" . real_ip() . "', '$verifycode', '" . gmtime() ."', 4)";
		$db->query($sql);

		$result['error'] = 0;
		$result['message'] = $_LANG['bind_mobile_verifycode_successed'];
		die($json->encode($result));
	}
	else
	{
		$result['error'] = 5;
		$result['message'] = $_LANG['bind_mobile_verifycode_failured'] . $ret;
		die($json->encode($result));
	}
}

?>