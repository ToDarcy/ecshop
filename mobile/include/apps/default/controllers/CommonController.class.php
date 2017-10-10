<?php

/**
 * ECTouch Open Source Project
 * ============================================================================
 * Copyright (c) 2012-2014 http://ectouch.cn All rights reserved.
 * ----------------------------------------------------------------------------
 * 文件名称：CommonControoller.class.php
 * ----------------------------------------------------------------------------
 * 功能描述：公共控制器
 * ----------------------------------------------------------------------------
 * Licensed ( http://www.ectouch.cn/docs/license.txt )
 * ----------------------------------------------------------------------------
 */

/* 访问控制 */
defined('IN_ECTOUCH') or die('Deny Access');

class CommonController extends BaseController
{

    protected static $user = NULL;

    protected static $sess = NULL;

    protected static $view = NULL;

    public function __construct()
    {
        parent::__construct();
        $this->ecshop_init();
        // 微信oauth处理
        if(class_exists('WechatController')){
            if (method_exists('WechatController', 'snsapi_userinfo')) {
                call_user_func(array('WechatController', 'snsapi_userinfo'));
                
            }
        }
		//是否显示关注按钮
        $condition['openid'] = !empty($_SESSION['openid']) ? $_SESSION['openid'] : 0;		
        $userinfo = $this->model->table('wechat_user')->field('subscribe')->where($condition)->find();
        $this->assign('subscribe', $userinfo['subscribe']);

        /* 语言包 */
        $this->assign('lang', L());
        /* 页面标题 */
        $page_info = get_page_title();
        self::$view->assign('page_title', $page_info['title']);
        self::$view->assign('meta_keywords', C('shop_keywords'));
        self::$view->assign('meta_description', C('shop_desc'));
        C('show_asynclist', 1);
        /* 模板赋值 */
        assign_template();
    }

    static function user()
    {
        return self::$user;
    }

    static function sess()
    {
        return self::$sess;
    }

    static function view()
    {
        return self::$view;
    }

    protected function fetch($filename, $cache_id = '')
    {
        return self::$view->fetch($filename, $cache_id);
    }

    protected function assign($tpl_var, $value = '')
    {
        self::$view->assign($tpl_var, $value);
    }

    protected function display($tpl = '', $cache_id = '', $return = false)
    {
        self::$view->display($tpl, $cache_id);
    }

    protected function ecshop_init()
    {
        header('Cache-control: private');
        header('Content-type: text/html; charset=utf-8');
        
        $shop_closed = C('shop_closed');
        if (! empty($shop_closed)) {
            $close_comment = C('close_comment');
            $close_comment = empty($close_comment) ? 'closed.':$close_comment;
            exit('<h1 style="font-size: 5rem;text-align: center;margin-top: 40%;">'.$close_comment.'</h1>');
        }
        //NULL
        // 初始化session
        self::$sess = new EcsSession(self::$db, self::$ecs->table('sessions'), self::$ecs->table('sessions_data'), C('COOKIE_PREFIX').'touch_id');
        define('SESS_ID', self::$sess->get_session_id());
        
        // 创建 Smarty 对象
        self::$view = new EcsTemplate();
        self::$view->cache_lifetime = C('cache_time');
        self::$view->template_dir = ROOT_PATH . 'themes/' . C('template');
        self::$view->cache_dir = ROOT_PATH . 'data/caches/caches';
        self::$view->compile_dir = ROOT_PATH . 'data/caches/compiled';
        
        if ((DEBUG_MODE & 2) == 2) {
            self::$view->direct_output = true;
            self::$view->force_compile = true;
        } else {
            self::$view->direct_output = false;
            self::$view->force_compile = false;
        }
        self::$view->caching = true;
        
        // 会员信息
        self::$user = init_users();
        if (empty($_SESSION['user_id'])) {
            if (self::$user->get_cookie()) {
                // 如果会员已经登录并且还没有获得会员的帐户余额、积分以及优惠券
                if ($_SESSION['user_id'] > 0 && ! isset($_SESSION['user_money'])) {
                    model('Users')->update_user_info();
                }
            } else {
                $_SESSION['user_id'] = 0;
                $_SESSION['user_name'] = '';
                $_SESSION['email'] = '';
                $_SESSION['user_rank'] = 0;
                $_SESSION['discount'] = 1.00;
            }
        }
        
        // 判断是否支持gzip模式
        if (gzip_enabled()) {
            ob_start('ob_gzhandler');
        }
        
        // 设置推荐会员
        if (isset($_GET['u'])) {
            set_affiliate();
        }
        
        // session不存在，检查cookie
        if (! empty($_COOKIE['ECS']['user_id']) && ! empty($_COOKIE['ECS']['password'])) {
            // 找到cookie,验证信息
            $where['user_id'] = $_COOKIE['ECS']['user_id'];
            $where['password'] = $_COOKIE['ECS']['password'];
            $row = $this->model->table('users')
                ->field('user_id, user_name, password')
                ->where($where)
                ->find();
            if ($row) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
                model('Users')->update_user_info();
            } else {
                // 没有找到这个记录
                $time = time() - 3600;
                setcookie("ECS[user_id]", '', $time, '/');
                setcookie("ECS[password]", '', $time, '/');
            }
        }
        
        // search 关键词
        $search_keywords = C('search_keywords');
        if (!empty($search_keywords) && is_string($search_keywords)) {
            $keywords = explode(',', $search_keywords);
            $this->assign('hot_search_keywords', $keywords);
        }

        if (!empty($_COOKIE['ECS']['keywords'])) {
            $histroy = explode(',',$_COOKIE['ECS']['keywords']);
            foreach ($histroy as $key=>$val) {
                if($key < 10){
                    $histroy_list[$key] = $val;
                }
            }
            $this->assign('search_histroy', $histroy_list);
        }

        // 模板替换
        defined('__TPL__') or define('__TPL__', __ROOT__ . '/themes/' . C('template'));
        $stylename = C('stylename');
        if (! empty($stylename)) {
            $this->assign('ecs_css_path', __ROOT__ . '/themes/' . C('template') . '/css/style_' . C('stylename') . '.css');
        } else {
            $this->assign('ecs_css_path', __ROOT__ . '/themes/' . C('template') . '/css/style.css');
        }

        // 设置parent_id
        session('parent_id',$_SESSION['user_id'] ? 0 : $_GET['u'] ? $_GET['u'] : 0);
    }
    
    
}

class_alias('CommonController', 'ECTouch');
