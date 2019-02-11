<!doctype html>
<html>
<head>
<title>{{TO->cfg key="site_name" group="site" default="system"}}-后台管理中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="apple-touch-icon-precomposed" href="/resource/vpcv.png" />
<link rel="shortcut icon" href="/favicon.ico"/>
<link rel="stylesheet" href="/resource/admin/css/vpcv.css">
<link rel="stylesheet" href="/resource/admin/css/default.css" id="window-skin">
<link rel="stylesheet" href="/resource/admin/css/font-awesome.min.css">
<link rel="stylesheet" href="/resource/admin/css/perfect-scrollbar.min.css">
<link rel="stylesheet" href="/resource/admin/css/form/global.css">
<link rel="stylesheet" href="/resource/admin/css/form/bootstrap/bootstrap.custom.vpcv.css">
<link rel="stylesheet" href="/resource/admin/css/form/manage.css">
<link rel="stylesheet" type="text/css" href="/resource/webuploader/webuploader.css">
<script type="text/javascript" src="/resource/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/resource/admin/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="/resource/admin/js/controller.js"></script>
<script type="text/javascript" src="/resource/admin/js/admin.js"></script>
<script type="text/javascript" src="/resource/js/thirdparty/layer/layer.js"></script>
<script type="text/javascript" src="/resource/js/thirdparty/laydate/laydate.js"></script>
<script type="text/javascript" src="/resource/admin/js/common.js"></script>
<script type="text/javascript" src="/resource/admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="/resource/webuploader/webuploader.min.js"></script>
<script type="text/javascript" src="/resource/admin/js/jquery.form.min.js"></script>
<script>var SITE_URL = '{{$_pathroot}}';</script>
<script type="text/javascript">window.UEDITOR_HOME_URL='{{$_pathroot}}resource/ueditor/';</script>
<script type="text/javascript" src="{{$_pathroot}}resource/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="{{$_pathroot}}resource/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="{{$_pathroot}}resource/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
    <div id="append_parent"></div>
	<div class="header">
    	<div class="logo"><img src="/resource/admin/images/logo.png" height="50" /></div>
        <div class="notice fr clearfix">
        	<a class="li home" title="网站首页" href="/" target="_blank"><i class="icon-home"></i><em>主页</em></a>
            <a class="li exit" title="设置" href="javascript:;" onclick="Controller.main('{{$_pathroot}}admin/config/site/issingle/1')"><i class="icon-cog"></i><em>设置</em></a>
            <a class="li lock" title="锁定" href="javascript:;"><i class="icon-key"></i><em>锁定</em></a>
            <a class="li exit" title="登出" href="/admin/login/logout"><i class="icon-signout"></i><em>登出</em></a>
            <div class="user">
                <span class="headpic"><img src="/resource/admin/images/user.gif" width="32" height="32" alt="{{$adminname}}" /></span>
                <div class="info">
                    <span class="name">当前用户：{{$adminname}}</span>
                    <span class="group">身份：{{$groupname.title}}</span>
                </div>
            </div>
            <!-- <div class="chat"><i class="icon-comments"></i></div> -->
        </div>
    </div>
    <div id="sidebar">
        <div class="search"></div>
        <!--menu-->
        <ul class="sidebar-menu">
            {{foreach key=key item=menu from=$menulist name=topmenu}}
            <li class="sub-menu" index="{{$smarty.foreach.topmenu.index}}" data-search="{{$key}}">
                <a href="javascript:void(0);" class="pitem">
                    <i class="{{if $menu.0.icon}}{{$menu.0.icon}}{{else}}icon-circle-blank{{/if}}"></i>
                    <span>{{$key}}</span>
                    {{$key}}
                    <i class="icon-angle icon-angle-down"></i>
                </a>
                <ul class="sub">
                    {{foreach item=item from=$menu name=nav}}
                    <li index="{{$smarty.foreach.nav.index}}">
                        <a href="javascript:;" data-href="{{$item.url}}" class="item">
                            {{$item.name}}
                        </a>
                    </li>
                    {{/foreach}}
                    {{if $key == '界面管理'}}
                        {{foreach from=$modules item=module key=mk}}
                        <li index="{{$mk+4}}">
                            <a href="javascript:;" data-href="{{$_pathroot}}admin/module/index/kind/{{$module.mark}}" class="item">
                                {{$module.title}}
                            </a>
                        </li>
                        {{/foreach}}
                    {{/if}}
                </ul>
            </li>
            {{/foreach}}
        </ul>
        <!--menu-->
    </div>
    <div id="mainWrapper">
        <div class="mainWrapper-loading"><img src="/resource/admin/images/loading.gif" /></div>
    </div>
    <!--controller box-->
    <div class="controller-box">
        <div class="controller-inner"></div>
    </div>
    <div class="controller-header clearfix">
        <span class="controller-title">标题</span>
        <span class="controller-close">X</span>
    </div>
    <div class="controller-bottom"><input type="button" class="btn btn-success" name="vpbtn" value="点击提交" /></div>
    <!--controller box-->
</body>
</html>