<?php /* vpcvcms compiled created on 2018-11-26 12:10:16
         compiled from admin/showmsg.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="/resource/admin/css/form/global.css">
<link rel="stylesheet" href="/resource/admin/css/form/bootstrap/bootstrap.custom.vpcv.css">
<link rel="stylesheet" href="/resource/admin/css/form/manage.css">
<div class="infobox">
    <h2>提示信息 - <span><?php echo $this->_tpl_vars['msg']; ?>
</span></h2>
    <div class="postbox">
    	<meta http-equiv="refresh" content="<?php echo $this->_tpl_vars['time']; ?>
; url=<?php echo $this->_tpl_vars['seogourl']; ?>
" />
        <p class="marginbot"><a href="<?php echo $this->_tpl_vars['gourl']; ?>
">点击返回</a></p>
    </div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>