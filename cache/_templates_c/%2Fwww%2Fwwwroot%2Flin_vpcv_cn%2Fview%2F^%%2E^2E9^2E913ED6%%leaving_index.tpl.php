<?php /* vpcvcms compiled created on 2018-11-08 16:18:46
         compiled from admin/leaving_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin/leaving_index.tpl', 39, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul>
        <li class="btn btn-info" onclick="Controller.reload()">留言管理</li>
    </ul>
</div>
<form method="post" action="/admin/leaving/more" name="lpform" id="lpform">
    <table class="tb">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">姓名</th>
            <th>电话</th>
            <th>邮箱</th>
            <th>QQ</th>
            <th>留言</th>
            <th>时间</th>
        </tr>
        <?php $_from = $this->_tpl_vars['leavings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['leaving']):
?>
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['leaving']['id']; ?>
" />
            </td>
            <td class="tdl">
                <?php echo $this->_tpl_vars['leaving']['realname']; ?>

            </td>
            <td class="td25">
                <?php echo $this->_tpl_vars['leaving']['telephone']; ?>

            </td>
            <td class="td25">
                <?php echo $this->_tpl_vars['leaving']['email']; ?>

            </td>
            <td class="td25">
                <?php echo $this->_tpl_vars['leaving']['qq']; ?>

            </td>
            <td class="td25">
                <?php echo $this->_tpl_vars['leaving']['message']; ?>

            </td>
            <td class="td25">
                <?php echo ((is_array($_tmp=$this->_tpl_vars['leaving']['addtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>

            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr>
            <td>
                <button name="chkall" id="chkall" class="btn btn-primary" title="全选" type="button" onclick="checkAll(this.form, 'id[]')">全选</button>
            </td>
            <td class="tdl">
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/leaving/', 'delete')">删除</button>
            </td>
            <td colspan="5" align="right"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/pages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
        </tr>
    </table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>