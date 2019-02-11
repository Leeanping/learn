<?php /* vpcvcms compiled created on 2019-02-11 10:02:09
         compiled from admin/module_index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul>
         <li class="btn"><a onclick="Controller.controller('添加字段','admin/module/add/kind/<?php echo $this->_tpl_vars['kind']; ?>
')" href="javascript:void(0);"><span>添加字段</span></a></li>
    </ul>
</div>
<table class="tb tb2" id="sTable">
    <tr class="header">
        <th>字段</th>
        <th>类型</th>
        <th>描述</th>
        <th>操作</th>
    </tr>
    <?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['column']):
?>
    <tr class="hover">
        <td class="td25">
            <?php echo $this->_tpl_vars['column']['field']; ?>

        </td>
        <td class="td25">
        	<?php echo $this->_tpl_vars['column']['type']; ?>

        </td>
        <td class="td25">
        	<?php echo $this->_tpl_vars['column']['comment']; ?>

        </td>
        <td class="td25">
            <?php if ($this->_tpl_vars['column']['field'] != 'id' && $this->_tpl_vars['column']['field'] != 'aid'): ?>
            <a href="javascript:;" onclick="Controller.deleteOne('admin/module/delete/kind/<?php echo $this->_tpl_vars['kind']; ?>
/field/<?php echo $this->_tpl_vars['column']['field']; ?>
')">删除</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>