<?php

/**
 * ECTouch Open Source Project
 * ============================================================================
 * Copyright (c) 2012-2014 http://ectouch.cn All rights reserved.
 * ----------------------------------------------------------------------------
 * 文件名称：IndexController.class.php
 * ----------------------------------------------------------------------------
 * 功能描述：ECTouch分销店铺控制器
 * ----------------------------------------------------------------------------
 * Licensed ( http://www.ectouch.cn/docs/license.txt )
 * ----------------------------------------------------------------------------
 */
/* 访问控制 */
defined('IN_ECTOUCH') or die('Deny Access');

class StoreController extends CommonController {

    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
        $this->check();
    }

    /**
     * 首页信息
     */
    public function index() {
        $drp_shop = $_SESSION['drp_shop'];
        $this->assign('drp_info',$drp_shop);
        $this->assign('news_goods_num',model('Index')->get_pro_goods('new'));
        $this->assign('promotion_goods_num', count(model('Index')->get_promote_goods()));
        $cat_rec = model('Index')->get_recommend_res(10,4);
        $this->assign('cat_best', $cat_rec[1]);
        $this->assign('cat_new', $cat_rec[2]);
        $this->assign('cat_hot', $cat_rec[3]);
        if($_SESSION['user_id']){
            $drp_id = $this->model->table('drp_shop')->where(array('user_id'=>$_SESSION['user_id']))->field('id')->find();
            $this->assign('is_drp', $drp_id ? 1 : 0);
        }
        $this->display('sale_shop.dwt');
    }

    /**
     * 检测店铺权限
     */
    public function check(){
        $action = ACTION_NAME;
		$drp_show = $this->model->table('drp_shop')->where(array('user_id'=>$_SESSION['user_id']))->field('id, open, audit')->find();
		if($action == 'index' && $drp_show['audit'] != 1){
		   show_message('开店已成功！请等待等待管理员审核','进入商城',url('index/index'));
        }
        if($action == 'index' && $drp_show['open'] != 1){
		   show_message('您的店铺未开启！请联系管理员','进入商城',url('index/index'));
        }		
    }

    /**
     * 检测是否拥有自己的小店
     */
    public function check_store(){
        if($_SESSION['user_id']){
            $drp_id = $this->model->table('drp_shop')->where(array('user_id'=>$_SESSION['user_id']))->field('id')->find();
            if(!$drp_id){
                redirect(url('sale/set'));
            }else{
                redirect(url('store/index'));
            }
        }else{
            redirect(url('user/login'));
        }
    }
}
