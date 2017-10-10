<?php

/**
 * 
 * prize_data.php UTF-8
 * User: djks
 * Date: 2013-11-28
 * link http://www.weixincaihong.com
 * 
 */

define('IN_ECS', true);
error_reporting(0);
require(dirname(__FILE__) . '/../includes/init.php');
$pid  = $_GET['pid'];

$sql = "SELECT * FROM ". $GLOBALS['ecs']->table('weixin_prize_append') ." WHERE `prize_id` = '$pid'";
$prize_arr = $db->getAll($sql);

foreach ($prize_arr as $key => $val) {
    if(empty($val['prize_value']))
    {
        unset($prize_arr[$key]);
    }
}
$temp_count = count($prize_arr) -1;

//奖品数量 统计 少了就没有了

foreach($prize_arr as $k => $v)
{

    $ck_cnum = $db->getOne("SELECT `pid` FROM ". $GLOBALS['ecs']->table('weixin_prize_cnum') ." WHERE `pid` = '$v[prize_id]' ");
    //大转盘位置
    switch($k){
        case 0:$prize_arr[$k]['dzp'] = 1;break;//一等奖
        case 1:$prize_arr[$k]['dzp'] = 9;break;//二等奖
        case 2:$prize_arr[$k]['dzp'] = 5;break;//三等奖
        case 3:$prize_arr[$k]['dzp'] = 3;break;//四等奖
        case 4:$prize_arr[$k]['dzp'] = 7;break;//五等奖
        case 5:$prize_arr[$k]['dzp'] = 11;break;//六等奖
    }

    if ($temp_count == $k) {
        if (empty($ck_cnum)) {
            $insert_sql = "INSERT INTO ". $GLOBALS['ecs']->table('weixin_prize_cnum') ." (`paid`, `pid`, `prize_name`, `prize_value` , `user_count`) VALUES ('$v[id]', '$v[prize_id]', '$v[prize_name]', '$v[prize_value]' ,'1');";
        } else {


            $insert_sql = "UPDATE ". $GLOBALS['ecs']->table('weixin_prize_cnum') ." SET `user_count` = `user_count` +1 WHERE `paid` ='$v[id]';";

        }
        $prize_arr[$k]['state'] = 'no';

    } else {
        $prize_arr[$k]['state'] = 'yes';
    }
    if ($insert_sql) {
        $db->query($insert_sql);
    }
    //奖品对比
    $ck_prize_num = $db->getOne("SELECT `user_count` FROM ". $GLOBALS['ecs']->table('weixin_prize_cnum') ." WHERE `paid` = '$v[id]'");

    if ($ck_prize_num >= $v['prize_value']) {
        //消除记录
        if($prize_arr[$k]['state'] == 'yes')
        {
            unset($prize_arr[$k]);
        }

    }


}



//中奖机率
foreach ($prize_arr as $key => $val) {
    if(!empty($val['prize_value']))
    {
        $arr[$val['id']] = $val['prize_value'];
    }
}

$fun  = $_GET['pzfun'];
$rid = getRand($arr); //根据概率获取奖项id

$dzp_un = array(2,4,6,8,10,12);

$dzp_un_c = count($dzp_un)-1;
foreach($prize_arr as $v)
{
    if($v['state'] == 'no')
    {
        if($v['id'] == $rid)
        {
            $temp_id = mt_rand(0,$dzp_un_c);

            $prize_arr[$k]['dzp'] = $dzp_un[$temp_id];
        }
    }

}


$wxid = $_GET['wxid'];


//检测抽奖次数
$query_sql = "SELECT `count` FROM ". $GLOBALS['ecs']->table('weixin_prize_count') ." WHERE `wxid` = '$wxid' AND `pid` = '$pid'";
//echo $query_sql;exit;
$res['num'] = $db->getOne("SELECT `num` FROM ". $GLOBALS['ecs']->table('weixin_prize') ." WHERE `pid` = '$pid' ");
$prize_count = $db->getOne($query_sql);



//用户剩余积分
$query_sql1 = "SELECT `pay_points` FROM " . $GLOBALS['ecs']->table('users')." WHERE `wxid` = '$wxid' ";
$user_point = $db->getOne($query_sql1);
//每次金蛋扣除积分
$prize['point'] = $db->getOne("SELECT `point` FROM ". $GLOBALS['ecs']->table('weixin_prize') ." WHERE `pid` = '$pid' ");

if(( $prize_count >= $res['num']))
{
    $res['msg'] = 2;
    $res['prize'] = '您抽奖的机会用完了';
    $res['num'] = 0;
    echo json_encode($res);exit;
}
elseif($prize['point']>$user_point)
{
	$res['msg'] = 4;
	$res['prize'] = '您的积分用完了';
	$res['num'] = 0;
	echo json_encode($res);
	exit;

}
else
{
    foreach($prize_arr as $k=>$v)
    {
        $prize_rand[$v['id']] = $v;
    }


    $res['msg'] = ($rid==12)?0:1;
    $res['pid'] = $prize_rand[$rid]['prize_id'];    //id
    $res['prize'] = $prize_rand[$rid]['prize_name']; //中奖内容
    if($prize_rand[$rid]['state'] == 'no')
    {
        $res['msg'] = 0;
    }
    else
    {
        $res['msg'] = 1;
    }
    if($res['num'] <= 0)
    {
        $res['num'] = 0;
    }
    else
    {
        $res['num'] = $res['num'] - $prize_count;
    }
//    echo $res['num'].'--'.$prize_count;
//    exit;
	$res['point']=$user_point-$prize['point'];
	$point=$user_point-$prize['point'];
    $res['pid'] = $pid;
    $res['pzfun'] = $fun;
    $res['yn'] = $prize_rand[$rid]['state'];
    $res['paid'] = $prize_rand[$rid]['id'];
    $res['prize_name'] = $res['prize'];
    $res['prize_value'] = $prize_rand[$rid]['prize_value'];
    $res['dzp'] = $prize_rand[$rid]['dzp'];

    $lasttime = time();
    //互动人数统计
    $db->query("UPDATE ". $GLOBALS['ecs']->table('weixin_prize') ." SET `count` = `count`+1 WHERE `pid` = '$pid';");
	$db->query("UPDATE ". $GLOBALS['ecs']->table('users') ." SET `pay_points` ='$point' WHERE `wxid` = '$wxid';");
    echo json_encode($res);exit;

}


//计算概率
function getRand($proArr) {
	$result = '';

	//概率数组的总概率精度
	$proSum = array_sum($proArr);

	//概率数组循环
	foreach ($proArr as $key => $proCur) {
		$randNum = mt_rand(1, $proSum);
		if ($randNum <= $proCur) {
			$result = $key;
			break;
		} else {
			$proSum -= $proCur;
		}
	}
	unset ($proArr);

	return $result;
}