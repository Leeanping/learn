<?php /* vpcvcms compiled created on 2018-11-08 16:29:01
         compiled from admin/link_index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
var rowtypedata = [
		[[1, '', 'td25'], [1,'<input name="newname[]" value="" size="15" type="text" class="txt">', 'tdl'], [1, '<input name="newlink[]" value="" size="30" type="text" class="txt">', 'tdl'],[1,'']]
	];
</script>
<div class="floattop">
    <ul>
        <li class="btn btn-info">友情链接管理</li>
    </ul>
</div>
<form method="post" action="/admin/link/index" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">网站名称</th>
            <th class="tdl">网站链接</th>
            <th>是否显示</th>
            <th>操作</th>
        </tr>
        <?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
        <tr class="hover">
            <td class="td25">
                <?php if ($this->_tpl_vars['link']['id'] != 1): ?>
                <input class="checkbox" type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['link']['id']; ?>
" />
                <?php endif; ?>
            </td>
            <td class="tdl">
                <?php if ($this->_tpl_vars['link']['id'] != 1): ?>
            	<input type="text" size="15" name="name[<?php echo $this->_tpl_vars['link']['id']; ?>
]" class="txt" value="<?php echo $this->_tpl_vars['link']['name']; ?>
" />
                <?php else: ?>
                <?php echo $this->_tpl_vars['link']['name']; ?>

                <?php endif; ?>
            </td>
            <td class="tdl">
                <?php if ($this->_tpl_vars['link']['id'] != 1): ?>
            	<input type="text" size="30" name="link[<?php echo $this->_tpl_vars['link']['id']; ?>
]" class="txt" value="<?php echo $this->_tpl_vars['link']['link']; ?>
" />
                <?php else: ?>
                <?php echo $this->_tpl_vars['link']['link']; ?>

                <?php endif; ?>
            </td>
            <td class="td25">
                <?php if ($this->_tpl_vars['link']['id'] != 1): ?>
            	<input type="checkbox"<?php if ($this->_tpl_vars['link']['useable'] == 1): ?> checked="checked"<?php endif; ?> value="1" name="useable[<?php echo $this->_tpl_vars['link']['id']; ?>
]" />
                <?php endif; ?>
            </td>
            <td class="td25">
                <?php if ($this->_tpl_vars['link']['id'] != 1): ?>
                <a href="javascript:;" onclick="Controller.controller('修改友情链接','admin/link/edit/id/<?php echo $this->_tpl_vars['link']['id']; ?>
')">编辑</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr>
            <td></td>
            <td colspan="4" class="tdl">
            	<div>
                    <a class="addtr" onclick="addrow(this, 0, 0)" href="javascript:;">添加友情链接</a>
                </div>
            </td>
        </tr>
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/link/', 'more')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/link/', 'delete')">删除</button>
            </td>
            <td colspan="3" align="right"></td>
        </tr>
    </table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>