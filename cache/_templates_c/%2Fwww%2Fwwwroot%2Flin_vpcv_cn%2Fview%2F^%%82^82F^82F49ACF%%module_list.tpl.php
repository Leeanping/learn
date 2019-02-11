<?php /* vpcvcms compiled created on 2018-11-08 15:24:39
         compiled from admin/module_list.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
var rowtypedata = [
		[[1,'<input name="newtitle[]" value="" size="15" type="text" class="txt">', 'tdl'], [1, '<input name="newmark[]" value="" size="15" type="text" class="txt">', 'td25'],[1, '<input name="newcomment[]" value="" size="15" type="text" class="txt">', 'td25'],[1, '&nbsp;', 'td25']]
	];
</script>
<form method="post" action="/admin/module/list" name="lpform" id="lpform">
    <table class="tb tb2">
        <tr class="header">
            <th class="tdl">名称</th>
            <th>标识</th>
            <th>描述</th>
            <th>操作</th>
        </tr>
        <?php $_from = $this->_tpl_vars['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module']):
?>
        <tr class="hover">
            <td class="tdl">
                <?php echo $this->_tpl_vars['module']['title']; ?>

            </td>
            <td class="td25"><?php echo $this->_tpl_vars['module']['mark']; ?>
</td>
            <td class="td25">
                <?php echo $this->_tpl_vars['module']['comment']; ?>

            </td>
            <td class="td25">
                <?php if ($this->_tpl_vars['module']['mark'] != 'article' && $this->_tpl_vars['module']['mark'] != 'shop' && $this->_tpl_vars['module']['mark'] != 'case'): ?>
                <a href="javascript:;" onclick="Controller.deleteOne('admin/module/deletemodule/id/<?php echo $this->_tpl_vars['module']['id']; ?>
')">删除</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr>
            <td colspan="4" class="tdl">
                <div>
                    <a class="addtr" onclick="addrow(this, 0, 0)" href="javascript:;">添加模型</a>
                </div>
            </td>
        </tr>
        <tr>
            <td class="tdl" colspan="4">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/module/', 'more')">提交</button>
            </td>
        </tr>
    </table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>