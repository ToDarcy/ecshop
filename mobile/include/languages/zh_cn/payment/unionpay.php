<?php

/**
 * ECTouch Open Source Project
 * ============================================================================
 * Copyright (c) 2012-2014 http://ectouch.cn All rights reserved.
 * ----------------------------------------------------------------------------
 * 文件名称：unionpay.php
 * ----------------------------------------------------------------------------
 * 功能描述：银联网关支付插件语言包
 * ----------------------------------------------------------------------------
 * Licensed ( http://www.ectouch.cn/docs/license.txt )
 * ----------------------------------------------------------------------------
 */

/* 访问控制 */
if (! defined('IN_ECTOUCH')) {
    die('Deny Access');
}

$_LANG['unionpay'] = '银联wap支付';
$_LANG['unionpay_desc'] = '银联在线支付网关是中国银联联合各商业银行为持卡人提供的集成化、综合性互联网支付工具，主要支持输入卡号付款、用户登录支付、网银支付、迷你付（IC卡支付）等多种支付方式，为持卡人提供境内外网上购物、水电煤缴费、商旅预订等支付服务。';
$_LANG['mer_id'] = '商户代码';
$_LANG['sign_cert_path'] = '签名证书路径';
$_LANG['sign_cert_pwd'] = '签名证书密码';
$_LANG['verify_cert_dir'] = '验签证书路径';
$_LANG['front_trans_url'] = '前台请求地址';
$_LANG['back_trans_url'] = '后台请求地址';
$_LANG['front_notify_url'] = '前台通知地址 (商户自行配置通知地址)';
$_LANG['back_notify_url'] ='后台通知地址 (商户自行配置通知地址)';
$_LANG['file_down_path'] ='文件下载目录';
$_LANG['log_file_path'] = '日志 目录';
$_LANG['log_level'] = '日志级别';

return $_LANG;