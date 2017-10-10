<?php
/*
// 修改的文件
admin/goods.php
admin/includes/inc_menu.php
admin/templates/goods_info.htm
include\language\zh_cn\admin\common.php

default/controller/CommonController.class.php

// 删除的文件
admin/drp.php
admin/templates/drp_*

default/controller/SaleController.class.php
default/controller/MY_*

default/model/SaleModel.class.php
default/model/MY_*

themes/default/sale/*
themes/default/sale_*
themes/default/library/sale_*

include\language\zh_cn\admin\drp.php
include\apps\default\language\zh_cn\sale.php

推荐分成

// 数据库

ecs_drp_*
ALTER TABLE `ecs_users` ADD COLUMN `apply_sale` int(1) unsigned NOT NULL DEFAULT '0';
ecs_wechat_template 清空

/*DRP_START*/

