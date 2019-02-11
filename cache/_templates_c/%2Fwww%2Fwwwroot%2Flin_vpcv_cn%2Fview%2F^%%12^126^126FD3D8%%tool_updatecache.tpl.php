<?php /* vpcvcms compiled created on 2018-11-08 15:24:36
         compiled from admin/tool_updatecache.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form action="/admin/tool/updatecache" method="post" name="cpform" id="cpform">
    <div class="opt">
    	<input type="hidden" name="updatecache" value="1" />
    	<input type="submit" name="submit" value="更新缓存" class="btn btn-success" />
    </div>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>