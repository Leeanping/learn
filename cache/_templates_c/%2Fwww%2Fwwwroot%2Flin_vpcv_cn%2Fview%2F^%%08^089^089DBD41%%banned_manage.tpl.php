<?php /* vpcvcms compiled created on 2018-11-08 16:21:58
         compiled from admin/banned_manage.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul>
        <li class="btn btn-info" onclick="Controoler.reload();">禁止IP</li>
    </ul>
</div>
<form name="lpform" method="post" action="/admin/banned/manage" id="lpform">
    <input type="hidden" name="action" value="manage" />
    <table class="tb tb2 ">
        <tr class="header">
            <th>选择</th>
            <th class="tdl">IP 地址</th>
            <th>添加者</th>
        </tr>
        <?php $_from = $this->_tpl_vars['ipbanneds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ipbanned']):
?>
        <tr class="hover">
            <td class="td25"><input class="checkbox" type="checkbox" name="delete[]" value="<?php echo $this->_tpl_vars['ipbanned']['id']; ?>
"/></td>
            <td class="tdl"><?php echo $this->_tpl_vars['ipbanned']['ip']; ?>
</td>
            <td><?php echo $this->_tpl_vars['ipbanned']['username']; ?>
</td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr class="hover">
            <td>新增:</td>
            <td class="tdl">
                <input type="text" class="txt" id="ip1new" name="ip1new" value="" size="3" maxlength="3">.
                <input type="text" class="txt" id="ip2new" name="ip2new" value="" size="3" maxlength="3">.
                <input type="text" class="txt" id="ip3new" name="ip3new" value="" size="3" maxlength="3">.
                <input type="text" class="txt" id="ip4new" name="ip4new" value="" size="3" maxlength="3">
                可以使用“*”作为通配符禁止某段地址。
            </td>
            <td></td>
        </tr>
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'delete[]')">全选</button></td>
            <td class="tdl">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/banned/', 'more')">提交</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/banned/', 'delete')">删除</button>
            </td>
            <td align="right"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/pages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
        </tr>
    </table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>