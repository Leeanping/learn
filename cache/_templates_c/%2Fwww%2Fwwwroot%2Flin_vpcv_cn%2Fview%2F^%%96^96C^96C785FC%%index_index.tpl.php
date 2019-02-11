<?php /* vpcvcms compiled created on 2018-11-08 15:22:24
         compiled from admin/index_index.tpl */ ?>
<!doctype html>
<html>
<head>
<title><?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => 'system'), $this);?>
-后台管理中心</title>
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
<script>var SITE_URL = '<?php echo $this->_tpl_vars['_pathroot']; ?>
';</script>
<script type="text/javascript">window.UEDITOR_HOME_URL='<?php echo $this->_tpl_vars['_pathroot']; ?>
resource/ueditor/';</script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['_pathroot']; ?>
resource/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['_pathroot']; ?>
resource/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['_pathroot']; ?>
resource/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
    <div id="append_parent"></div>
	<div class="header">
    	<div class="logo"><img src="/resource/admin/images/logo.png" height="50" /></div>
        <div class="notice fr clearfix">
        	<a class="li home" title="网站首页" href="/" target="_blank"><i class="icon-home"></i><em>主页</em></a>
            <a class="li exit" title="设置" href="javascript:;" onclick="Controller.main('<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/config/site/issingle/1')"><i class="icon-cog"></i><em>设置</em></a>
            <a class="li lock" title="锁定" href="javascript:;"><i class="icon-key"></i><em>锁定</em></a>
            <a class="li exit" title="登出" href="/admin/login/logout"><i class="icon-signout"></i><em>登出</em></a>
            <div class="user">
                <span class="headpic"><img src="/resource/admin/images/user.gif" width="32" height="32" alt="<?php echo $this->_tpl_vars['adminname']; ?>
" /></span>
                <div class="info">
                    <span class="name">当前用户：<?php echo $this->_tpl_vars['adminname']; ?>
</span>
                    <span class="group">身份：<?php echo $this->_tpl_vars['groupname']['title']; ?>
</span>
                </div>
            </div>
            <!-- <div class="chat"><i class="icon-comments"></i></div> -->
        </div>
    </div>
    <div id="sidebar">
        <div class="search"></div>
        <!--menu-->
        <ul class="sidebar-menu">
            <?php $_from = $this->_tpl_vars['menulist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['topmenu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['topmenu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['menu']):
        $this->_foreach['topmenu']['iteration']++;
?>
            <li class="sub-menu" index="<?php echo ($this->_foreach['topmenu']['iteration']-1); ?>
" data-search="<?php echo $this->_tpl_vars['key']; ?>
">
                <a href="javascript:void(0);" class="pitem">
                    <i class="<?php if ($this->_tpl_vars['menu']['0']['icon']): ?><?php echo $this->_tpl_vars['menu']['0']['icon']; ?>
<?php else: ?>icon-circle-blank<?php endif; ?>"></i>
                    <span><?php echo $this->_tpl_vars['key']; ?>
</span>
                    <?php echo $this->_tpl_vars['key']; ?>

                    <i class="icon-angle icon-angle-down"></i>
                </a>
                <ul class="sub">
                    <?php $_from = $this->_tpl_vars['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['nav'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['nav']['iteration']++;
?>
                    <li index="<?php echo ($this->_foreach['nav']['iteration']-1); ?>
">
                        <a href="javascript:;" data-href="<?php echo $this->_tpl_vars['item']['url']; ?>
" class="item">
                            <?php echo $this->_tpl_vars['item']['name']; ?>

                        </a>
                    </li>
                    <?php endforeach; endif; unset($_from); ?>
                    <?php if ($this->_tpl_vars['key'] == '界面管理'): ?>
                        <?php $_from = $this->_tpl_vars['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mk'] => $this->_tpl_vars['module']):
?>
                        <li index="<?php echo $this->_tpl_vars['mk']+4; ?>
">
                            <a href="javascript:;" data-href="<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/module/index/kind/<?php echo $this->_tpl_vars['module']['mark']; ?>
" class="item">
                                <?php echo $this->_tpl_vars['module']['title']; ?>

                            </a>
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endforeach; endif; unset($_from); ?>
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