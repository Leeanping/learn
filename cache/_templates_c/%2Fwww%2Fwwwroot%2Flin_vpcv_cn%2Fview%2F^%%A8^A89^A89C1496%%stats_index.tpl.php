<?php /* vpcvcms compiled created on 2018-11-08 16:28:59
         compiled from admin/stats_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin/stats_index.tpl', 40, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul>
         <li class="btn current btn-info"><span>访问列表</span></li>
    </ul>
</div>
<form method="post" action="/admin/stats/more" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">IP</th>
            <th>来源</th>
            <th>进入</th>
            <th>浏览器</th>
            <th>系统</th>
            <th>访问时间</th>
        </tr>
        <?php $_from = $this->_tpl_vars['stats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['stat']):
?>
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="delete[]" value="<?php echo $this->_tpl_vars['stat']['id']; ?>
" />
                <input type="hidden" name="id[<?php echo $this->_tpl_vars['stat']['id']; ?>
]" value="<?php echo $this->_tpl_vars['stat']['id']; ?>
" />
            </td>
            <td class="tdl">
            	<?php echo $this->_tpl_vars['stat']['ip']; ?>

            </td>
            <td class="td25">
            	<?php if ($this->_tpl_vars['stat']['refererdomain']): ?><?php echo $this->_tpl_vars['stat']['refererdomain']; ?>
<?php echo $this->_tpl_vars['stat']['refererpath']; ?>
<?php else: ?>未知<?php endif; ?>
            </td>
            <td class="td25">
            	<?php echo $this->_tpl_vars['stat']['accessurl']; ?>

            </td>
            <td class="td25">
            	<?php echo $this->_tpl_vars['stat']['browser']; ?>

            </td>
            <td class="td25">
            	<?php echo $this->_tpl_vars['stat']['system']; ?>

            </td>
            <td class="td25">
            	<?php echo ((is_array($_tmp=$this->_tpl_vars['stat']['accesstime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M')); ?>

            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'delete[]')">全选</button></td>
            <td class="tdl">
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/stats/', 'delete')">删除</button>
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