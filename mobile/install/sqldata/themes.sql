--
-- 转存表中的数据 `ecs_touch_ad_position`
--
DELETE FROM `ecs_ad_position` WHERE `position_id` = 256;
INSERT INTO `ecs_ad_position` (`position_id`, `position_name`, `ad_width`, `ad_height`, `position_desc`, `position_style`) VALUES
(256, '手机端首页主题精选广告位', 360, 168, '', '{foreach from=$ads item=ad name=ads}{if $smarty.foreach.ads.iteration % 2 == 0}<li class="fl">{else}<li class="fr">{/if}{$ad}</li>{/foreach}');

DELETE FROM `ecs_ad` WHERE `position_id` = 256;
INSERT INTO `ecs_ad` (`position_id`, `media_type`, `ad_name`, `ad_link`, `ad_code`, `start_time`, `end_time`, `link_man`, `link_email`, `link_phone`, `click_count`, `enabled`) VALUES
(256, 0, '1', '', 'index-theme-icon1.gif', 1396339200, 1525161600, '', '', '', 0, 1),
(256, 0, '1', '', 'index-theme-icon2.gif', 1396339200, 1525161600, '', '', '', 0, 1),
(256, 0, '1', '', 'index-theme-icon3.gif', 1396339200, 1525161600, '', '', '', 0, 1),
(256, 0, '1', '', 'index-theme-icon4.gif', 1396339200, 1525161600, '', '', '', 0, 1),
(256, 0, '1', '', 'index-theme-icon5.gif', 1396339200, 1525161600, '', '', '', 0, 1),
(256, 0, '1', '', 'index-theme-icon6.gif', 1396339200, 1525161600, '', '', '', 0, 1),
(256, 0, '1', '', 'index-theme-icon7.gif', 1396339200, 1525161600, '', '', '', 0, 1),
(256, 0, '1', '', 'index-theme-icon8.gif', 1396339200, 1525161600, '', '', '', 0, 1),
(256, 0, '1', '', 'index-theme-icon9.gif', 1396339200, 1525161600, '', '', '', 0, 1),
(256, 0, '1', '', 'index-theme-icon10.gif', 1396339200, 1525161600, '', '', '', 0, 1);

INSERT INTO `ecs_ad_position` (`position_id`, `position_name`, `ad_width`, `ad_height`, `position_desc`, `position_style`) VALUES
(257, '手机端首页限时促销广告位1', 360, 168, '', '{foreach from=$ads item=ad name=ads}{$ad}{/foreach}');
INSERT INTO `ecs_ad_position` (`position_id`, `position_name`, `ad_width`, `ad_height`, `position_desc`, `position_style`) VALUES
(258, '手机端首页限时促销广告位2', 360, 168, '', '{foreach from=$ads item=ad name=ads}{$ad}{/foreach}');
INSERT INTO `ecs_ad_position` (`position_id`, `position_name`, `ad_width`, `ad_height`, `position_desc`, `position_style`) VALUES
(259, '手机端首页热门活动广告位1', 360, 168, '', '{foreach from=$ads item=ad name=ads}{$ad}{/foreach}');
INSERT INTO `ecs_ad_position` (`position_id`, `position_name`, `ad_width`, `ad_height`, `position_desc`, `position_style`) VALUES
(260, '手机端首页热门活动广告位2', 360, 168, '', '{foreach from=$ads item=ad name=ads}{$ad}{/foreach}');
INSERT INTO `ecs_ad_position` (`position_id`, `position_name`, `ad_width`, `ad_height`, `position_desc`, `position_style`) VALUES
(261, '手机端首页精品推荐广告位1', 360, 168, '', '{foreach from=$ads item=ad name=ads}{$ad}{/foreach}');
INSERT INTO `ecs_ad_position` (`position_id`, `position_name`, `ad_width`, `ad_height`, `position_desc`, `position_style`) VALUES
(262, '手机端首页精品推荐广告位2', 360, 168, '', '{foreach from=$ads item=ad name=ads}{$ad}{/foreach}');
INSERT INTO `ecs_ad_position` (`position_id`, `position_name`, `ad_width`, `ad_height`, `position_desc`, `position_style`) VALUES
(263, '手机端首页品牌街广告位1', 360, 168, '', '{foreach from=$ads item=ad name=ads}{$ad}{/foreach}');
INSERT INTO `ecs_ad_position` (`position_id`, `position_name`, `ad_width`, `ad_height`, `position_desc`, `position_style`) VALUES
(264, '手机端首页品牌街广告位2', 360, 168, '', '{foreach from=$ads item=ad name=ads}{$ad}{/foreach}');

INSERT INTO `ecs_ad` (`position_id`, `media_type`, `ad_name`, `ad_link`, `ad_code`, `start_time`, `end_time`, `link_man`, `link_email`, `link_phone`, `click_count`, `enabled`) VALUES
(257, 0, '1', '', 'http://img30.360buyimg.com/mobilecms/jfs/t1285/301/224079095/27270/fbbc1f40/555c6c90Ncb4fe515.jpg', 1396339200, 1525161600, '', '', '', 0, 1);
INSERT INTO `ecs_ad` (`position_id`, `media_type`, `ad_name`, `ad_link`, `ad_code`, `start_time`, `end_time`, `link_man`, `link_email`, `link_phone`, `click_count`, `enabled`) VALUES
(258, 0, '1', '', 'http://m.360buyimg.com/mobilecms/jfs/t2500/354/5004119/28206/c13fa182/55e5a38fN0b84386b.jpg', 1396339200, 1525161600, '', '', '', 0, 1),
(258, 0, '1', '', 'http://m.360buyimg.com/mobilecms/jfs/t1951/303/313107422/21311/5bc233db/55ffda9bN7c81adbe.jpg', 1396339200, 1525161600, '', '', '', 0, 1);

INSERT INTO `ecs_ad` (`position_id`, `media_type`, `ad_name`, `ad_link`, `ad_code`, `start_time`, `end_time`, `link_man`, `link_email`, `link_phone`, `click_count`, `enabled`) VALUES
(259, 0, '1', '', 'http://m.360buyimg.com/mobilecms/jfs/t1786/20/1237061297/11292/32fb2a76/55e41b2aN73bcf4d3.jpg', 1396339200, 1525161600, '', '', '', 0, 1),
(259, 0, '1', '', 'http://m.360buyimg.com/mobilecms/jfs/t1660/172/1178175164/12107/b84acf01/55e41becN110f0639.jpg', 1396339200, 1525161600, '', '', '', 0, 1);
INSERT INTO `ecs_ad` (`position_id`, `media_type`, `ad_name`, `ad_link`, `ad_code`, `start_time`, `end_time`, `link_man`, `link_email`, `link_phone`, `click_count`, `enabled`) VALUES
(260, 0, '1', '', 'http://m.360buyimg.com/mobilecms/jfs/t1753/282/1346478890/16937/b0c72fa9/55e41ca6N55f0952e.jpg', 1396339200, 1525161600, '', '', '', 0, 1);

INSERT INTO `ecs_ad` (`position_id`, `media_type`, `ad_name`, `ad_link`, `ad_code`, `start_time`, `end_time`, `link_man`, `link_email`, `link_phone`, `click_count`, `enabled`) VALUES
(261, 0, '1', '', 'http://m.360buyimg.com/mobilecms/jfs/t1339/42/1033573654/18650/85fb7e47/55e41d25Ne7fd71e7.jpg', 1396339200, 1525161600, '', '', '', 0, 1);
INSERT INTO `ecs_ad` (`position_id`, `media_type`, `ad_name`, `ad_link`, `ad_code`, `start_time`, `end_time`, `link_man`, `link_email`, `link_phone`, `click_count`, `enabled`) VALUES
(262, 0, '1', '', 'http://m.360buyimg.com/mobilecms/jfs/t1825/226/1292630398/9320/a7003c2f/55e42185N8d6eb615.jpg', 1396339200, 1525161600, '', '', '', 0, 1),
(262, 0, '1', '', 'http://m.360buyimg.com/mobilecms/jfs/t1753/288/1310409506/7943/7beba973/55e4221bN9857b1f4.jpg', 1396339200, 1525161600, '', '', '', 0, 1);

INSERT INTO `ecs_ad` (`position_id`, `media_type`, `ad_name`, `ad_link`, `ad_code`, `start_time`, `end_time`, `link_man`, `link_email`, `link_phone`, `click_count`, `enabled`) VALUES
(263, 0, '1', '', 'http://m.360buyimg.com/mobilecms/jfs/t2293/126/6325541/15463/885e77f2/55e5a839N76e8a8ab.jpg', 1396339200, 1525161600, '', '', '', 0, 1),
(263, 0, '1', '', 'http://m.360buyimg.com/mobilecms/jfs/t2101/138/4648025/12171/7f46ddb9/55e5ac15N3f33b3cd.jpg', 1396339200, 1525161600, '', '', '', 0, 1);
INSERT INTO `ecs_ad` (`position_id`, `media_type`, `ad_name`, `ad_link`, `ad_code`, `start_time`, `end_time`, `link_man`, `link_email`, `link_phone`, `click_count`, `enabled`) VALUES
(264, 0, '1', '', 'http://m.360buyimg.com/mobilecms/jfs/t2317/6/7126462/28018/ea8767a/55e5a70bNb1ffd2fe.jpg', 1396339200, 1525161600, '', '', '', 0, 1);
