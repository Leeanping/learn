<?php
return array(
	L('menu::menu_index') => array(
		array('url'=>'/admin/index/home','name'=>L('menu::menu_index_index'),'auth'=>'index_home', 'icon' => 'icon-desktop')
	),
	L('menu::menu_nav') => array(
		array('url'=>'/admin/nav/index','name'=>L('menu::menu_nav_index'),'auth'=>'nav_index', 'icon' => 'icon-sitemap'),
		array('url'=>'/admin/ad/index','name'=>L('menu::menu_nav_ad'),'auth'=>'ad_index', 'icon' => 'icon-facetime-video'),
		array('url'=>'/admin/category/index/item/1','name'=>'联动类别','auth'=>'category_index', 'icon' => 'icon-facetime-video'),
		array('url'=>'/admin/module/list','name'=>'模型列表','auth'=>'module_list', 'icon' => 'icon-facetime-video')
	),
	/*L('menu::menu_category') => array(
		array('url' => '/admin/category/index/item/1', 'name' => '品牌类别', 'auth' => 'category_index', 'icon' => 'icon-reorder')
	),*/
	L('menu::menu_article') => array(
		array('url' => '/admin/article/index', 'name' => '内容列表', 'auth' => 'article_index', 'icon' => 'icon-file-alt'),
		array('url' => '/admin/leaving/index', 'name' => '留言列表', 'auth' => 'leaving_index', 'icon' => 'icon-file-alt')
	),
	/*L('menu::menu_forum') => array(
		array('url'=>'/admin/forum/index','name'=>L('menu::menu_forum_index'),'auth'=>'forum_index', 'icon' => 'icon-book'),
		array('url'=>'/admin/forum/thread','name'=>L('menu::menu_forum_thread'),'auth'=>'forum_thread', 'icon' => 'icon-file-alt'),
		array('url'=>'/admin/forum/post','name'=>L('menu::menu_forum_post'),'auth'=>'forum_post', 'icon' => 'icon-comment')
	),*/
	L('menu::menu_user') => array(
		array('url'=>'/admin/user/search','name'=>L('menu::menu_user_search'),'auth'=>'user_search', 'icon' => 'icon-user'),
		array('url'=>'/admin/banned/manage','name'=>L('menu::menu_user_banned'),'auth'=>'banned_manage', 'icon' => 'icon-info-sign')
	),
	L('menu::menu_tool') => array(
		array('url'=>'/admin/db/backup/issingle/1','name'=>L('menu::menu_tool_backup'),'auth'=>'db_backup'),
		array('url'=>'/admin/db/restore','name'=>L('menu::menu_tool_restore'),'auth'=>'db_restore'),
		array('url'=>'/admin/tool/updatecache/issingle/1','name'=>L('menu::menu_tool_upcache'),'auth'=>'tool_updatecache'),
		array('url'=>'/admin/stats/index','name'=>L('menu::menu_tool_stats'),'auth'=>'stats_index'),
		array('url'=>'/admin/link/index','name'=>L('menu::menu_tool_link'),'auth'=>'link_index')
	),
	L('menu::menu_setting') => array(
        array('url'=>'/admin/config/site/issingle/1','name'=>L('menu::menu_setting_site'),'auth'=>'config_site','icon' => 'icon-cog'),
		array('url'=>'/admin/config/basic/issingle/1','name'=>L('menu::menu_setting_basic'),'auth'=>'config_basic', 'icon' => 'icon-asterisk'),
		array('url'=>'/admin/config/wap/issingle/1','name'=>L('menu::menu_setting_wap'),'auth'=>'config_wap', 'icon' => 'icon-tablet'),
		array('url'=>'/admin/config/sec/issingle/1','name'=>L('menu::menu_setting_gd'),'auth'=>'config_sec', 'icon' => 'icon-lock'),
		array('url'=>'/admin/config/mail/issingle/1','name'=>L('menu::menu_setting_email'),'auth'=>'config_mail', 'icon' => 'icon-envelope'),
		array('url'=>'/admin/config/water/issingle/1','name'=>L('menu::menu_setting_water'),'auth'=>'config_water', 'icon' => 'icon-tag'),
		array('url'=>'/admin/config/template/issingle/1','name'=>L('menu::menu_setting_template'),'auth'=>'config_template', 'icon' => 'icon-folder-close-alt'),
		array('url'=>'/admin/config/third/issingle/1','name'=>L('menu::menu_setting_third'),'auth'=>'config_third', 'icon' => 'icon-cloud-upload')
	)
);
