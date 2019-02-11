# <?php exit();?> 

# Table: g_article_article 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_article_article;
CREATE TABLE `g_article_article` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `catarr` varchar(100) DEFAULT NULL,
  `moduleid` char(50) NOT NULL DEFAULT 'article',
  `brandid` int(4) unsigned DEFAULT '0',
  `classid` char(50) DEFAULT NULL,
  `title` varchar(120) NOT NULL DEFAULT '',
  `titlecolor` char(20) DEFAULT NULL,
  `content` text,
  `cutstr` varchar(100) DEFAULT NULL,
  `articlepic` varchar(255) DEFAULT NULL,
  `articlethumb` varchar(255) DEFAULT NULL,
  `attachlist` text,
  `fileurl` varchar(255) DEFAULT NULL,
  `tagword` varchar(100) DEFAULT NULL,
  `seotitle` varchar(100) DEFAULT NULL,
  `keywords` char(100) DEFAULT NULL,
  `description` mediumtext,
  `sort` tinyint(3) unsigned DEFAULT '0',
  `istop` tinyint(2) unsigned DEFAULT '0',
  `isspecial` tinyint(2) unsigned DEFAULT '0',
  `isindex` tinyint(2) unsigned DEFAULT '0',
  `useable` tinyint(2) unsigned DEFAULT '1',
  `uid` int(10) unsigned DEFAULT '0',
  `realname` char(20) DEFAULT NULL,
  `comefrom` varchar(100) DEFAULT NULL,
  `addtime` int(10) unsigned DEFAULT '0',
  `updatetime` int(10) unsigned DEFAULT '0',
  `shownum` int(10) unsigned DEFAULT '0',
  `feednum` int(6) unsigned DEFAULT '0',
  `bestnum` int(6) unsigned DEFAULT '0',
  `stownum` int(6) unsigned DEFAULT '0',
  `isview` tinyint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `status` (`useable`,`sort`,`id`),
  KEY `sort` (`catid`,`useable`,`sort`,`id`),
  KEY `catid` (`catid`,`useable`,`id`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_article_leaving 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_article_leaving;
CREATE TABLE `g_article_leaving` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `realname` char(50) NOT NULL,
  `telephone` char(50) NOT NULL,
  `email` char(50) NOT NULL,
  `qq` char(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;


# Table: g_base_ad 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_ad;
CREATE TABLE `g_base_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` int(4) unsigned DEFAULT '0',
  `tagname` char(50) NOT NULL,
  `adname` varchar(100) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `imgurl` varchar(255) DEFAULT NULL,
  `bigurl` varchar(255) DEFAULT NULL,
  `starttime` int(10) unsigned DEFAULT '0',
  `endtime` int(10) unsigned DEFAULT '0',
  `addtime` int(10) unsigned DEFAULT '0',
  `outurl` varchar(255) DEFAULT NULL,
  `sort` tinyint(4) unsigned DEFAULT '0',
  `shownum` int(6) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_base_ad_type 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_ad_type;
CREATE TABLE `g_base_ad_type` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  `tag` char(50) DEFAULT '',
  `isslide` tinyint(2) unsigned DEFAULT '0',
  `useable` tinyint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_base_cart 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_cart;
CREATE TABLE `g_base_cart` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `sessionid` varchar(100) NOT NULL,
  `type` tinyint(2) unsigned NOT NULL COMMENT '1礼服',
  `goodsid` int(10) unsigned NOT NULL,
  `goodsname` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `attr` char(100) NOT NULL,
  `color` char(100) NOT NULL,
  `size` char(100) NOT NULL,
  `num` int(4) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;


# Table: g_base_category 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_category;
CREATE TABLE `g_base_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned DEFAULT '0',
  `itemid` int(4) unsigned DEFAULT '1' COMMENT '1文章，2产品,3地区',
  `catname` char(50) DEFAULT NULL,
  `sort` tinyint(4) unsigned DEFAULT '0',
  `useable` tinyint(2) unsigned DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_base_config 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_config;
CREATE TABLE `g_base_config` (
  `group` varchar(50) NOT NULL,
  `cfgname` varchar(100) NOT NULL,
  `config` text NOT NULL,
  `title` text NOT NULL,
  `tips` text NOT NULL,
  UNIQUE KEY `cfgname` (`cfgname`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;


# Table: g_base_credit_log 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_credit_log;
CREATE TABLE `g_base_credit_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `postid` int(10) unsigned NOT NULL,
  `type` char(20) NOT NULL,
  `typename` char(20) NOT NULL,
  `credit` int(4) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;


# Table: g_base_link 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_link;
CREATE TABLE `g_base_link` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `linkpic` varchar(255) DEFAULT NULL,
  `useable` tinyint(2) unsigned DEFAULT '1',
  `addtime` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_base_menu 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_menu;
CREATE TABLE `g_base_menu` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(6) unsigned NOT NULL,
  `mid` int(6) unsigned NOT NULL,
  `type` char(10) NOT NULL,
  `name` char(20) NOT NULL,
  `url` char(100) NOT NULL,
  `icon` char(50) NOT NULL,
  `isresize` tinyint(1) unsigned NOT NULL,
  `width` int(4) unsigned NOT NULL,
  `height` int(4) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_base_module 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_module;
CREATE TABLE `g_base_module` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(50) DEFAULT NULL,
  `mark` char(50) DEFAULT NULL,
  `comment` char(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_base_module_article 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_module_article;
CREATE TABLE `g_base_module_article` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(6) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_base_module_case 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_module_case;
CREATE TABLE `g_base_module_case` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(6) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_base_module_shop 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_module_shop;
CREATE TABLE `g_base_module_shop` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(6) unsigned NOT NULL,
  `price` int(10) unsigned NOT NULL COMMENT '销售价',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_base_nav 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_nav;
CREATE TABLE `g_base_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(10) unsigned DEFAULT '0' COMMENT '上级菜单',
  `name` varchar(255) DEFAULT NULL COMMENT '导航名称',
  `ename` char(100) DEFAULT NULL COMMENT '英文名称',
  `icon` varchar(255) DEFAULT NULL,
  `moduleid` char(50) DEFAULT 'article',
  `style` tinyint(2) unsigned DEFAULT '1',
  `tempindex` char(100) DEFAULT NULL,
  `templist` char(100) DEFAULT NULL,
  `temparticle` char(100) DEFAULT NULL,
  `perpage` tinyint(3) unsigned DEFAULT '10',
  `head` char(50) DEFAULT NULL,
  `pinyin` varchar(255) DEFAULT NULL,
  `system` tinyint(1) unsigned DEFAULT '0' COMMENT '是否内置导航',
  `type` tinyint(4) DEFAULT '0' COMMENT '导航类别 0:顶部导航 1:头部导航',
  `displayorder` tinyint(3) unsigned DEFAULT '0' COMMENT '显示顺序',
  `newwindow` tinyint(4) unsigned DEFAULT '0' COMMENT '是否新窗口打开',
  `useable` tinyint(1) unsigned DEFAULT '1' COMMENT '是否启用',
  `body` text,
  `seotitle` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `isview` tinyint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_base_region 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_region;
CREATE TABLE `g_base_region` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `regionname` varchar(120) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_base_stats 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_stats;
CREATE TABLE `g_base_stats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `accesstime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `visits` smallint(5) unsigned NOT NULL DEFAULT '1',
  `browser` varchar(60) NOT NULL DEFAULT '',
  `system` varchar(20) NOT NULL DEFAULT '',
  `language` varchar(20) NOT NULL DEFAULT '',
  `area` varchar(30) NOT NULL DEFAULT '',
  `refererdomain` varchar(100) NOT NULL DEFAULT '',
  `refererpath` varchar(200) NOT NULL DEFAULT '',
  `accessurl` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `accesstime` (`accesstime`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;


# Table: g_base_token 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_token;
CREATE TABLE `g_base_token` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `sign` char(64) NOT NULL COMMENT '标识',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tid`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_base_valid 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_base_valid;
CREATE TABLE `g_base_valid` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `telephone` char(20) NOT NULL,
  `type` char(20) NOT NULL,
  `sign` char(20) NOT NULL COMMENT '标识',
  `isvalid` tinyint(2) unsigned NOT NULL,
  `created` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;


# Table: g_bbs_forum 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_bbs_forum;
CREATE TABLE `g_bbs_forum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `type` char(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(2) unsigned NOT NULL,
  `sort` tinyint(4) unsigned NOT NULL,
  `threads` int(10) unsigned NOT NULL,
  `posts` int(10) unsigned NOT NULL,
  `forumpic` varchar(255) NOT NULL,
  `forumsummary` mediumtext NOT NULL,
  `lastpost` int(10) unsigned NOT NULL,
  `allowview` tinyint(4) unsigned NOT NULL,
  `allowpost` tinyint(4) unsigned NOT NULL,
  `allowreply` tinyint(4) unsigned NOT NULL,
  `istop` tinyint(2) unsigned NOT NULL,
  `isbest` tinyint(2) unsigned NOT NULL,
  `prize` int(6) unsigned NOT NULL,
  `template` char(50) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_bbs_forum_post 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_bbs_forum_post;
CREATE TABLE `g_bbs_forum_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `forumid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `threadid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `isfirst` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(15) NOT NULL,
  `realname` char(50) NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title` varchar(80) NOT NULL DEFAULT '',
  `useable` tinyint(1) NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  `reply` mediumtext NOT NULL,
  `replycredit` int(4) unsigned NOT NULL,
  `isrush` tinyint(2) unsigned NOT NULL,
  `postip` varchar(15) NOT NULL DEFAULT '',
  `special` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `forumid` (`forumid`),
  KEY `uid` (`uid`),
  KEY `addtime` (`addtime`),
  KEY `useable` (`useable`),
  KEY `isfirst` (`threadid`,`isfirst`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_bbs_forum_replycredit 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_bbs_forum_replycredit;
CREATE TABLE `g_bbs_forum_replycredit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `threadid` int(10) unsigned NOT NULL,
  `credit` int(4) unsigned NOT NULL,
  `times` tinyint(4) unsigned NOT NULL,
  `usertimes` tinyint(4) unsigned NOT NULL,
  `random` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;


# Table: g_bbs_forum_rush 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_bbs_forum_rush;
CREATE TABLE `g_bbs_forum_rush` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `threadid` int(10) unsigned NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  `stopfloor` int(2) unsigned NOT NULL,
  `usertimes` int(2) NOT NULL,
  `rewardfloor` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;


# Table: g_bbs_forum_thread 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_bbs_forum_thread;
CREATE TABLE `g_bbs_forum_thread` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `forumid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` char(15) NOT NULL,
  `realname` char(50) NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title` char(80) NOT NULL DEFAULT '',
  `titlecolor` char(20) NOT NULL,
  `stamp` char(20) NOT NULL COMMENT '图章',
  `attach` varchar(255) NOT NULL,
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `lastpost` int(10) unsigned NOT NULL DEFAULT '0',
  `lastpostuid` int(10) unsigned NOT NULL,
  `lastposter` char(15) NOT NULL DEFAULT '',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `replies` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `stows` int(6) unsigned NOT NULL,
  `special` tinyint(2) unsigned NOT NULL,
  `replycredit` int(4) unsigned NOT NULL,
  `isrush` tinyint(2) unsigned NOT NULL,
  `sort` tinyint(1) NOT NULL DEFAULT '0',
  `istop` tinyint(1) NOT NULL DEFAULT '0',
  `isbest` tinyint(1) NOT NULL DEFAULT '0',
  `ishot` tinyint(2) unsigned NOT NULL COMMENT '热帖',
  `ispic` tinyint(2) unsigned NOT NULL COMMENT '美图',
  `isgood` tinyint(2) unsigned NOT NULL COMMENT '优秀',
  `isrec` tinyint(2) unsigned NOT NULL COMMENT '推荐',
  `iscreate` tinyint(2) unsigned NOT NULL COMMENT '原创',
  `isbao` tinyint(2) unsigned NOT NULL COMMENT '爆料',
  `isprize` tinyint(2) unsigned NOT NULL,
  `useable` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `isbest` (`isbest`),
  KEY `sort` (`forumid`,`sort`,`lastpost`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_bbs_forum_vote 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_bbs_forum_vote;
CREATE TABLE `g_bbs_forum_vote` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `threadid` int(10) unsigned NOT NULL,
  `votes` int(6) unsigned NOT NULL,
  `sort` int(4) unsigned NOT NULL,
  `votename` varchar(100) NOT NULL,
  `voteuids` int(6) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;


# Table: g_bbs_forum_voter 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_bbs_forum_voter;
CREATE TABLE `g_bbs_forum_voter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `threadid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `username` char(50) NOT NULL,
  `voteid` int(10) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;


# Table: g_goods_goods 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_goods_goods;
CREATE TABLE `g_goods_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(6) unsigned NOT NULL,
  `catid` int(6) unsigned NOT NULL,
  `catarr` varchar(100) NOT NULL,
  `kind` tinyint(2) unsigned NOT NULL,
  `goodsname` varchar(100) NOT NULL,
  `goodsbrief` varchar(100) NOT NULL,
  `goodsthumb` varchar(255) NOT NULL,
  `goodspic` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `marketprice` decimal(10,0) NOT NULL,
  `attr` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `ml` char(50) NOT NULL,
  `sellnum` int(5) unsigned NOT NULL,
  `feednum` int(5) unsigned NOT NULL,
  `bestnum` int(5) unsigned NOT NULL,
  `stownum` int(5) unsigned NOT NULL,
  `tags` varchar(102) NOT NULL,
  `service` text NOT NULL,
  `content` text NOT NULL,
  `ishot` tinyint(2) unsigned NOT NULL,
  `isnew` tinyint(2) unsigned NOT NULL,
  `isspecial` tinyint(2) unsigned NOT NULL,
  `isonsale` tinyint(2) unsigned NOT NULL,
  `sort` int(4) unsigned NOT NULL,
  `useable` tinyint(2) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_order_goods 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_order_goods;
CREATE TABLE `g_order_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` int(10) unsigned NOT NULL,
  `goodsid` int(10) unsigned NOT NULL,
  `goodsname` char(50) NOT NULL,
  `marketprice` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `attr` char(100) NOT NULL,
  `color` char(100) NOT NULL,
  `size` char(100) NOT NULL,
  `num` tinyint(4) unsigned NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `isfeed` tinyint(2) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_order_order 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_order_order;
CREATE TABLE `g_order_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ordersn` varchar(100) NOT NULL,
  `goodsid` char(50) NOT NULL,
  `goodsname` varchar(255) NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `type` tinyint(2) unsigned NOT NULL,
  `num` char(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` tinyint(2) NOT NULL COMMENT '-1订单取消,1等待买家付款,2买家已付款,3卖家已发货,4交易成功,5买家已收货,6退款订单',
  `payment` char(50) NOT NULL,
  `isfeed` tinyint(2) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_product_gallery 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_product_gallery;
CREATE TABLE `g_product_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` int(10) unsigned NOT NULL,
  `belong` tinyint(2) unsigned NOT NULL,
  `kindid` int(10) unsigned NOT NULL DEFAULT '0',
  `imgurl` varchar(255) NOT NULL,
  `thumburl` varchar(255) NOT NULL,
  `imginfo` char(100) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_user_access 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_user_access;
CREATE TABLE `g_user_access` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(6) unsigned NOT NULL,
  `access` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_user_banned 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_user_banned;
CREATE TABLE `g_user_banned` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` char(15) NOT NULL COMMENT 'IP',
  `username` char(32) NOT NULL COMMENT '创建者',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_user_booking 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_user_booking;
CREATE TABLE `g_user_booking` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kind` tinyint(2) unsigned NOT NULL,
  `destination` varchar(100) NOT NULL,
  `starttime` varchar(100) NOT NULL,
  `day` char(50) NOT NULL,
  `people` char(50) NOT NULL,
  `money` char(100) NOT NULL,
  `content` varchar(255) NOT NULL,
  `realname` char(50) NOT NULL,
  `telephone` char(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `qq` char(50) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `useable` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_user_detail 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_user_detail;
CREATE TABLE `g_user_detail` (
  `uid` int(10) unsigned NOT NULL,
  `gender` tinyint(2) unsigned NOT NULL,
  `birthday` int(10) unsigned NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `marry` tinyint(2) unsigned NOT NULL,
  `knowsource` char(50) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province` int(4) unsigned NOT NULL,
  `city` int(4) unsigned NOT NULL,
  `signature` varchar(255) NOT NULL,
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;


# Table: g_user_feedback 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_user_feedback;
CREATE TABLE `g_user_feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `postid` int(10) unsigned NOT NULL,
  `posttitle` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL COMMENT 'course课程,event活动',
  `score` tinyint(4) unsigned NOT NULL,
  `content` mediumtext NOT NULL,
  `reply` varchar(255) NOT NULL,
  `replytime` int(10) unsigned NOT NULL,
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_user_gdsession 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_user_gdsession;
CREATE TABLE `g_user_gdsession` (
  `id` varchar(8) NOT NULL,
  `number` varchar(12) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;


# Table: g_user_group 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_user_group;
CREATE TABLE `g_user_group` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '组编号',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '组类型,0管理组，1用户组',
  `kind` tinyint(2) unsigned NOT NULL COMMENT '0内置，1自定义',
  `title` char(32) NOT NULL DEFAULT '' COMMENT '组名称',
  `starnum` tinyint(4) unsigned NOT NULL,
  `color` char(20) NOT NULL,
  `min` int(6) unsigned NOT NULL,
  `max` int(6) unsigned NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_user_log 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_user_log;
CREATE TABLE `g_user_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `logtime` int(11) unsigned NOT NULL,
  `uid` int(6) unsigned NOT NULL,
  `username` char(50) NOT NULL,
  `type` char(20) NOT NULL,
  `score` int(4) unsigned NOT NULL,
  `honor` int(6) unsigned NOT NULL,
  `loginfo` varchar(100) NOT NULL,
  `logip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_user_medal 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_user_medal;
CREATE TABLE `g_user_medal` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `useable` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `sort` tinyint(3) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `expiration` smallint(6) unsigned NOT NULL DEFAULT '0',
  `permission` mediumtext NOT NULL,
  `credit` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `price` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `displayorder` (`sort`),
  KEY `available` (`useable`,`sort`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_user_member 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_user_member;
CREATE TABLE `g_user_member` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `gid` int(10) unsigned NOT NULL DEFAULT '14' COMMENT '组编号',
  `roleid` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `username` char(100) NOT NULL COMMENT '用户名',
  `realname` char(50) NOT NULL,
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `email` char(50) NOT NULL,
  `isemail` tinyint(2) unsigned NOT NULL,
  `qq` char(50) NOT NULL,
  `telephone` char(20) NOT NULL,
  `istelephone` tinyint(2) unsigned NOT NULL,
  `headpic` varchar(255) NOT NULL,
  `headpic30` varchar(255) NOT NULL,
  `headpic50` varchar(255) NOT NULL,
  `headpic150` varchar(255) NOT NULL,
  `salt` char(6) NOT NULL DEFAULT '',
  `islocked` tinyint(2) unsigned NOT NULL,
  `exp` int(10) unsigned NOT NULL,
  `score` decimal(10,1) NOT NULL DEFAULT '0.0' COMMENT '喵咪币',
  `honor` decimal(10,1) NOT NULL DEFAULT '0.0' COMMENT 'money',
  `medals` varchar(255) NOT NULL,
  `regtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `regip` char(15) NOT NULL DEFAULT '' COMMENT '注册IP',
  `lastvisit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后访问时间',
  `lastip` char(15) NOT NULL DEFAULT '' COMMENT '最后访问IP',
  `connectid` varchar(100) NOT NULL,
  `wbname` char(50) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_user_message 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_user_message;
CREATE TABLE `g_user_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fid` varchar(20) NOT NULL DEFAULT '',
  `type` char(20) NOT NULL,
  `status` tinyint(2) unsigned NOT NULL,
  `fromuid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fromrealname` varchar(100) NOT NULL,
  `touid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `folder` char(50) DEFAULT NULL,
  `title` varchar(60) NOT NULL,
  `sendtime` int(10) unsigned NOT NULL DEFAULT '0',
  `writetime` int(10) unsigned NOT NULL DEFAULT '0',
  `hasview` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `message` text,
  `useable` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sendtime` (`sendtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_user_sign 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_user_sign;
CREATE TABLE `g_user_sign` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `score` tinyint(2) unsigned NOT NULL,
  `year` int(4) unsigned NOT NULL,
  `month` int(4) unsigned NOT NULL,
  `day` int(4) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;


# Table: g_user_stow 
# Version: 2.0
# Date: 2018-11-26 12:13 

DROP TABLE IF EXISTS g_user_stow;
CREATE TABLE `g_user_stow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `stowid` int(6) unsigned NOT NULL,
  `stowtitle` varchar(255) NOT NULL,
  `stowtype` char(50) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `useable` tinyint(2) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8;
