<?php

/**
 * ECSHOP 多点乐资源下载站二次开发函数库
 * ============================================================================
 * * 版权所有 2005-2020 多点乐资源下载站，并保留所有权利。
 * 网站地址:  http://down.duodl.com；
 * ----------------------------------------------------------------------------
 * ============================================================================
 * $Id: www.ld-web.com.php 1.0 2015-10-30 $
*/

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}


/**
* 获得cat_id热销列表。
*
* @access  private
* @param   integer
* @return  array
*/
function cat_hot_list($cat_id, $num)
{
    $sql = 'Select g.goods_id, g.goods_name, g.goods_name_style, g.market_price, g.shop_price, g.promote_price, ' .
                "promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, goods_img, " .
                "g.is_best, g.is_new, g.is_hot, g.is_promote " .
            'FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g ' .
            "Where g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND g.is_best = 1 AND (" . $cat_id . " OR " . get_extension_goods($cat_id) .")";
 
$cats = get_children($cat_id);
$where = !empty($cats) ? "AND ($cats OR " . get_extension_goods($cats) . ") " : '';
$sql .=$where." LIMIT $num";
    $res = $GLOBALS['db']->getAll($sql);
 
    $goods = array();
    foreach ($res AS $idx => $row)
    {
        $goods[$idx]['id']           = $row['article_id'];
        $goods[$idx]['id']           = $row['goods_id'];
        $goods[$idx]['name']         = $row['goods_name'];
        $goods[$idx]['brief']        = $row['goods_brief'];
        $goods[$idx]['brand_name']   = $row['brand_name'];
        $goods[$idx]['goods_style_name']   = add_style($row['goods_name'],$row['goods_name_style']);
 
        $goods[$idx]['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                           sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
        $goods[$idx]['short_style_name']   = add_style($goods[$idx]['short_name'],$row['goods_name_style']);
        $goods[$idx]['market_price'] = price_format($row['market_price']);
        $goods[$idx]['shop_price']   = price_format($row['shop_price']);
        $goods[$idx]['thumb']        = empty($row['goods_thumb']) ? $GLOBALS['_CFG']['no_picture'] : $row['goods_thumb'];
        $goods[$idx]['goods_img']    = empty($row['goods_img'])   ? $GLOBALS['_CFG']['no_picture'] : $row['goods_img'];
        $goods[$idx]['url']          = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
    }
 
    return $goods;
}



/**
* 获得cat_id精品列表。
*
* @access  private
* @param   integer
* @return  array
*/
function get_cat_id_goods_best_list($cat_id, $num)
{
    $sql = 'Select g.goods_id, g.goods_name, g.goods_name_style, g.market_price, g.shop_price, g.promote_price, ' .
                "promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, goods_img, " .
                "g.is_best, g.is_new, g.is_hot, g.is_promote " .
            'FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g ' .
            "Where g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND g.is_best = 1 AND (" . $cat_id . " OR " . get_extension_goods($cat_id) .")";
 
$cats = get_children($cat_id);
$where = !empty($cats) ? "AND ($cats OR " . get_extension_goods($cats) . ") " : '';
$sql .=$where." LIMIT $num";
    $res = $GLOBALS['db']->getAll($sql);
 
    $goods = array();
    foreach ($res AS $idx => $row)
    {
        $goods[$idx]['id']           = $row['article_id'];
        $goods[$idx]['id']           = $row['goods_id'];
        $goods[$idx]['name']         = $row['goods_name'];
        $goods[$idx]['brief']        = $row['goods_brief'];
        $goods[$idx]['brand_name']   = $row['brand_name'];
        $goods[$idx]['goods_style_name']   = add_style($row['goods_name'],$row['goods_name_style']);
 
        $goods[$idx]['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                           sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
        $goods[$idx]['short_style_name']   = add_style($goods[$idx]['short_name'],$row['goods_name_style']);
        $goods[$idx]['market_price'] = price_format($row['market_price']);
        $goods[$idx]['shop_price']   = price_format($row['shop_price']);
        $goods[$idx]['thumb']        = empty($row['goods_thumb']) ? $GLOBALS['_CFG']['no_picture'] : $row['goods_thumb'];
        $goods[$idx]['goods_img']    = empty($row['goods_img'])   ? $GLOBALS['_CFG']['no_picture'] : $row['goods_img'];
        $goods[$idx]['url']          = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
    }
 
    return $goods;
}

 
/**
* 根据广告位获得广告列表
*/
function get_advlist_by_id($id)
{
	switch($id)
	{
		case 1:
		return get_advlist('首页-顶部通栏广告', 1);
		break;
		case 2:
		return get_advlist('首页-轮播右侧广告', 1);
		break;
		case 3:
		return get_advlist('首页-茶生活广告1', 1);
		break;
		case 4:
		return get_advlist('首页-茶生活广告2', 1);
		break;
		case 5:
		return get_advlist('首页-茶生活广告3', 1);
		break;
		case 6:
		return get_advlist('首页-茶生活广告4', 1);
		break;
		case 7:
		return get_advlist('首页-茶生活广告5', 1);
		break;
		case 8:
		return get_advlist('文章页-右侧广告', 1);
		break;

	}	
}

function get_left_ad_cat_id($id)
{
	return get_advlist('首页-分类ID' . $id . '-左侧广告', 1);
}

function get_cat_arts_1($id)
{
	return get_cat_arts($id, 7);
}
function get_cat_arts_2($id)
{
	return get_cat_arts($id, 1);
}
function get_cat_arts_3($id)
{
	return get_cat_arts($id, 7);
}

function get_advlist($position, $num=0)
{
   $arr=array();
   $limit_string = '';
   if ($num > 0)
   {
   		$limit_string = 'limit '.$num;
   }
   $sql = "select ap.ad_width,ap.ad_height,ad.ad_id,ad.ad_name,ad.ad_code,ad.ad_link,ad.ad_id,ad.link_man from ".$GLOBALS['ecs']->table('ad_position')." as ap left join ".$GLOBALS['ecs']->table('ad')." as ad on ad.position_id = ap.position_id where ap.position_name='".$position."' and UNIX_TIMESTAMP()>ad.start_time and UNIX_TIMESTAMP()<ad.end_time and ad.enabled=1 $limit_string";
   
     $res = $GLOBALS['db']->getAll($sql);
	 foreach($res as $idx => $row)
	 {
	    $arr[$row['ad_id']]['name'] = $row['ad_name'];
		$arr[$row['ad_id']]['title'] = $row['link_man'];
		$arr[$row['ad_id']]['url'] = "affiche.php?ad_id=".$row['ad_id']."&uri=".$row['ad_link'];
		$arr[$row['ad_id']]['image'] = 'data/afficheimg/'.$row['ad_code'];
		$arr[$row['ad_id']]['ad_code'] = $row['ad_code'];
		$arr[$row['ad_id']]['content'] = "<a href='".$arr[$row['ad_id']]['url']."' title='".$row['ad_name']."' target='_blank'><img src='data/afficheimg/".$row['ad_code']."' title='".$row['ad_name']."' alt='".$row['ad_name']."'/></a>";
		
	 }
	 return $arr;
}

function get_advs($position, $num=0)
{
   $arr=array();
   $limit_string = '';
   if ($num > 0)
   {
   		$limit_string = 'limit '.$num;
   }
   $sql = "select ap.ad_width,ap.ad_height,ad.ad_id,ad.ad_name,ad.ad_code,ad.ad_link,ad.ad_id from ".$GLOBALS['ecs']->table('ad_position')." as ap left join ".$GLOBALS['ecs']->table('ad')." as ad on ad.position_id = ap.position_id where ap.position_name='".$position."' and UNIX_TIMESTAMP()>ad.start_time and UNIX_TIMESTAMP()<ad.end_time and ad.enabled=1 $limit_string";
   
     $res = $GLOBALS['db']->getAll($sql);
	 foreach($res as $idx => $row)
	 {
	    $arr[$row['ad_id']]['name'] = $row['ad_name'];
		$arr[$row['ad_id']]['url'] = $row['ad_link'];
		$arr[$row['ad_id']]['image'] = 'data/afficheimg/'.$row['ad_code'];
		$arr[$row['ad_id']]['ad_code'] = $row['ad_code'];
		$arr[$row['ad_id']]['content'] = "<a href='".$arr[$row['ad_id']]['url']."' target='_blank'><img src='data/afficheimg/".$row['ad_code']."' width='".$row['ad_width']."' height='".$row['ad_height']."' /></a>";
		
	 }
	 return $arr;
}

function get_cat_arts($cat_id, $size = 20)
{
    //取出所有非0的文章
    if ($cat_id == '-1')
    {
        $cat_str = 'cat_id > 0';
    }
    else
    {
        $cat_str = get_article_children($cat_id);
    }
    //增加搜索条件，如果有搜索内容就进行搜索    

        
    $sql = 'SELECT article_id, title, author, add_time, file_url, description, open_type' .
               ' FROM ' .$GLOBALS['ecs']->table('article') .
               ' WHERE is_open = 1 AND ' . $cat_str .
               ' ORDER BY article_type ASC, article_id ASC';
			   

    $res = $GLOBALS['db']->selectLimit($sql, $size);

    $arr = array();
    if ($res)
    {
        while ($row = $GLOBALS['db']->fetchRow($res))
        {
            $article_id = $row['article_id'];

            $arr[$article_id]['id']          = $article_id;
            $arr[$article_id]['title']       = $row['title'];
			$arr[$article_id]['file_url']    = $row['file_url'];
			$arr[$article_id]['description'] = $row['description'];
            $arr[$article_id]['short_title'] = $GLOBALS['_CFG']['article_title_length'] > 0 ? sub_str($row['title'], $GLOBALS['_CFG']['article_title_length']) : $row['title'];
            $arr[$article_id]['author']      = empty($row['author']) || $row['author'] == '_SHOPHELP' ? $GLOBALS['_CFG']['shop_name'] : $row['author'];
            $arr[$article_id]['url']         = build_uri('article', array('aid'=>$article_id), $row['title']);
            $arr[$article_id]['add_time']    = date($GLOBALS['_CFG']['date_format'], $row['add_time']);
        }
    }

    return $arr;
}

/**
* 获得某个分类下的品牌列表
*
* @access  public
* @param   int     $cat
* @return  array
*/
function get_cat_brands($cat = 0, $app = 'brand' ,$limnum=0,$sort='tag DESC, b.sort_order ASC')
{
    global $page_libs;
    $template = basename(PHP_SELF);
    $template = substr($template, 0, strrpos($template, '.'));
    include_once(ROOT_PATH . ADMIN_PATH . '/includes/lib_template.php');
    static $static_page_libs = null;
    if ($static_page_libs == null)
    {
            $static_page_libs = $page_libs;
    }

    $children = ($cat > 0) ? ' AND ' . get_children($cat) : '';

    $sql = "SELECT b.brand_id, b.brand_name, b.brand_logo, b.brand_desc, COUNT(*) AS goods_num, IF(b.brand_logo > '', '1', '0') AS tag ".
            "FROM " . $GLOBALS['ecs']->table('brand') . "AS b, ".
                $GLOBALS['ecs']->table('goods') . " AS g ".
            "WHERE g.brand_id = b.brand_id $children AND is_show = 1 " .
            " AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".
            "GROUP BY b.brand_id HAVING goods_num > 0 ORDER BY $sort";
	
	if($limnum>0)
	{
		$num=$limnum;
		$sql .= " LIMIT $num ";
	}
	else
	{
      if (isset($static_page_libs[$template]['/library/brands.lbi']))
      {
        $num = get_library_number("brands");
        $sql .= " LIMIT $num ";
      }
	}
	
    $row = $GLOBALS['db']->getAll($sql);

    foreach ($row AS $key => $val)
    {
        $row[$key]['url'] = build_uri($app, array('cid' => $cat, 'bid' => $val['brand_id']), $val['brand_name']);
        $row[$key]['brand_desc'] = htmlspecialchars($val['brand_desc'],ENT_QUOTES);
    }

    return $row;
}

/**
* 获得首页主广告
*/
function get_flash_xml()
{
    $flashdb = array();
    if (file_exists(ROOT_PATH . DATA_DIR . '/flash_data.xml'))
    {

        // 兼容v2.7.0及以前版本
        if (!preg_match_all('/item_url="([^"]+)"\slink="([^"]+)"\stext="([^"]*)"\ssort="([^"]*)"/', file_get_contents(ROOT_PATH . DATA_DIR . '/flash_data.xml'), $t, PREG_SET_ORDER))
        {
            preg_match_all('/item_url="([^"]+)"\slink="([^"]+)"\stext="([^"]*)"/', file_get_contents(ROOT_PATH . DATA_DIR . '/flash_data.xml'), $t, PREG_SET_ORDER);
        }

        if (!empty($t))
        {
            foreach ($t as $key => $val)
            {
                $val[4] = isset($val[4]) ? $val[4] : 0;
                $flashdb[] = array('src'=>$val[1],'url'=>$val[2],'text'=>$val[3],'sort'=>$val[4]);
            }
        }
    }
    return $flashdb;
}

function  is_exist_prod($first_arr, $one, $prod_exist_arr)

{

	if (empty($prod_exist_arr))

	{

		return 0;

	}

	$first_arr[]=$one;



	$all_valid =0;

	foreach($prod_exist_arr AS $item_exist)

	{		

		$first_exist=1;

		foreach($first_arr AS $first)

		{			

			if (!strstr($item_exist, '|'. $first .'|'))

			{

				$first_exist=0;

				break;

			}

		}

		if($first_exist)

		{

			$all_valid=1;

			break;

		}

	}

	return $all_valid;

}
?>