<?php /* vpcvcms compiled created on 2018-11-08 15:22:43
         compiled from admin/nav_index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
var rowtypedata = [
	[
		[1, '', 'td25'], 
        [1, '', 'td25'], 
		[1,'<input name="newdisplayorder[]" value="" size="2" type="text" class="txt" />', 'tdl'], 
		[1, '<input name="newname[]" value="" style="width:100px;" type="text" class="txt" datatype="Require" msg="请填写名称">', 'tdl'],
		[1, '<input type="hidden" name="newparentid[]" value="0" />', 'td25'],
		[1, '<input type="text" class="txt" name="newperpage[]" value="0" size="2" />', 'td25'],
		[1, '', 'td25'],
		[2, '', 'td25']
	],
	[
		[1, '', 'td25'], 
        [1, '', 'td25'], 
		[1,'<input name="newdisplayorder[]" value="" size="2" type="text" class="txt" />', 'tdl'], 
		[1, '<div class="board"><input name="newname[]" style="width:100px;" type="text" class="txt" datatype="Require" msg="请填写名称"></div>', 'tdl'], 
		[1, '<input type="hidden" name="newparentid[]" value="{1}" />', 'td25'],
		[1, '<input type="text" class="txt" name="newperpage[]" value="0" size="2" />', 'td25'],
		[1, '', 'td25'],
		[2, '', 'td25']
	],
    [
        [1, '', 'td25'], 
        [1, '', 'td25'],
        [1,'<input name="newdisplayorder[]" value="" size="2" type="text" class="txt" />', 'tdl'], 
        [1, '<div class="childboard"><input name="newname[]" style="width:100px;" type="text" class="txt" datatype="Require" msg="请填写名称"></div>', 'tdl'], 
        [1, '<input type="hidden" name="newparentid[]" value="{1}" />', 'td25'],
        [1, '<input type="text" class="txt" name="newperpage[]" value="0" size="2" />', 'td25'],
        [1, '', 'td25'],
        [2, '', 'td25']
    ]
];
</script>
<div class="floattop">
    <ul>
         <?php $_from = $this->_tpl_vars['nav_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['_nav']):
?>
        <li class="btn btn-info<?php if ($this->_tpl_vars['type'] == $this->_tpl_vars['key']): ?> current<?php endif; ?>" onclick="Controller.main('<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/nav/index/type/<?php echo $this->_tpl_vars['key']; ?>
')"><?php echo $this->_tpl_vars['_nav']; ?>
</a></li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
</div>
<form name="cpform" method="post" action="/admin/nav/index" name="lpform" id="lpform" onsubmit="return $.checkForm(this)">
    <input type="hidden" name="type" value="<?php echo $this->_tpl_vars['type']; ?>
" />
    <table class="tb tb2">
        <tr class="header">
            <th width="60">选择</th>
            <th width="60">ID</th>
            <th class="tdl">顺序</th>
            <th class="tdl">名称</th>
            <th>目录/链接</th>
            <th>列表显示数量</th>
            <th>新窗口</th>
            <th>可用</th>
            <th>操作</th>
        </tr>
        <?php $_from = $this->_tpl_vars['navs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['nav']):
?>
        <tbody>
        <tr class="hover">
            <td class="td25"><input class="checkbox" type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['nav']['id']; ?>
" ></td>
            <td class="td25">
                <?php echo $this->_tpl_vars['nav']['id']; ?>

            </td>
            <td class="tdl">
                <input type="hidden" class="txt" name="parentid[<?php echo $this->_tpl_vars['nav']['id']; ?>
]" value="<?php echo $this->_tpl_vars['nav']['parentid']; ?>
" size="2" />
                <input type="text" class="txt" name="displayorder[<?php echo $this->_tpl_vars['nav']['id']; ?>
]" value="<?php echo $this->_tpl_vars['nav']['displayorder']; ?>
" size="2"  datatype="Require" msg="请填写序列号"></td>
            <td class="tdl">
                <?php echo $this->_tpl_vars['nav']['name']; ?>

            </td>
            <td class="td25">
                <?php echo $this->_tpl_vars['nav']['pinyin']; ?>

            </td>
            <td class="td25">
                <input type="text" class="txt" name="perpage[<?php echo $this->_tpl_vars['nav']['id']; ?>
]" value="<?php echo $this->_tpl_vars['nav']['perpage']; ?>
" size="2" />
            </td>
            <td class="td25">
                <input type="checkbox" value="1" name="newwindow[<?php echo $this->_tpl_vars['nav']['id']; ?>
]" class="checkbox" <?php if ($this->_tpl_vars['nav']['newwindow'] == '1'): ?>checked="checked"<?php endif; ?>>
            </td>
            <td class="td25">
                <input type="checkbox" value="1" name="useable[<?php echo $this->_tpl_vars['nav']['id']; ?>
]" class="checkbox" <?php if ($this->_tpl_vars['nav']['useable'] == '1'): ?>checked="checked"<?php endif; ?>>
            </td>
            <td class="td25">
                <a href="javascript:void(0);" onclick="Controller.controller('修改导航-<?php echo $this->_tpl_vars['nav']['name']; ?>
', 'admin/nav/edit/id/<?php echo $this->_tpl_vars['nav']['id']; ?>
')">编辑</a>
            </td>
        </tr>
        </tbody>
        <tbody id="child_<?php echo $this->_tpl_vars['nav']['id']; ?>
">
        	<?php $_from = $this->_tpl_vars['nav']['son']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['son']):
?>
            <tr class="hover">
                <td class="td25">
                    <input class="checkbox" type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['son']['id']; ?>
" />
                </td>
                <td class="td25">
                    <?php echo $this->_tpl_vars['son']['id']; ?>

                </td>
                <td class="tdl">
                    <input type="hidden" class="txt" name="parentid[<?php echo $this->_tpl_vars['son']['id']; ?>
]" value="<?php echo $this->_tpl_vars['son']['parentid']; ?>
" size="2" />
                    <input type="text" class="txt" name="displayorder[<?php echo $this->_tpl_vars['son']['id']; ?>
]" value="<?php echo $this->_tpl_vars['son']['displayorder']; ?>
" size="2"  datatype="Require" msg="请填写序列号"></td>
                <td class="tdl">
                    <div class="board">
                        <?php echo $this->_tpl_vars['son']['name']; ?>

                        <a class="addchildboard" href="javascript:;" onclick="addrowdirect=1;addrow(this, 2, <?php echo $this->_tpl_vars['son']['id']; ?>
)">添加下级分类</a>
                    </div>
                </td>
                <td class="td25">
                    <?php echo $this->_tpl_vars['son']['pinyin']; ?>

                </td>
                <td class="td25">
                    <input type="text" class="txt" name="perpage[<?php echo $this->_tpl_vars['son']['id']; ?>
]" value="<?php echo $this->_tpl_vars['son']['perpage']; ?>
" size="2" />
                </td>
                <td class="td25">
                    <input type="checkbox" value="1" name="newwindow[<?php echo $this->_tpl_vars['son']['id']; ?>
]" class="checkbox" <?php if ($this->_tpl_vars['son']['newwindow'] == '1'): ?>checked="checked"<?php endif; ?>>
                </td>
                <td class="td25">
                    <input type="checkbox" value="1" name="useable[<?php echo $this->_tpl_vars['son']['id']; ?>
]" class="checkbox" <?php if ($this->_tpl_vars['son']['useable'] == '1'): ?>checked="checked"<?php endif; ?>>
                </td>
                <td class="td25">
                    <a href="javascript:void(0);" onclick="Controller.controller('修改导航-<?php echo $this->_tpl_vars['son']['name']; ?>
', 'admin/nav/edit/id/<?php echo $this->_tpl_vars['son']['id']; ?>
')">编辑</a>
                </td>
            </tr>
            <?php $_from = T('channel')->getList(array('parentid' => $this->_tpl_vars['son']['id']));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['childer']):
?>
                <tr class="hover">
                    <td class="td25">
                        <input class="checkbox" type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['childer']['id']; ?>
" />
                    </td>
                    <td class="td25">
                        <?php echo $this->_tpl_vars['childer']['id']; ?>

                    </td>
                    <td class="tdl">
                        <input type="hidden" class="txt" name="parentid[<?php echo $this->_tpl_vars['childer']['id']; ?>
]" value="<?php echo $this->_tpl_vars['childer']['parentid']; ?>
" size="2" />
                        <input type="text" class="txt" name="displayorder[<?php echo $this->_tpl_vars['childer']['id']; ?>
]" value="<?php echo $this->_tpl_vars['childer']['displayorder']; ?>
" size="2"  datatype="Require" msg="请填写序列号"></td>
                    <td class="tdl">
                        <div class="childboard">
                            <?php echo $this->_tpl_vars['childer']['name']; ?>

                        </div>
                    </td>
                    <td class="td25">
                        <?php echo $this->_tpl_vars['childer']['pinyin']; ?>

                    </td>
                    <td class="td25">
                        <input type="text" class="txt" name="perpage[<?php echo $this->_tpl_vars['childer']['id']; ?>
]" value="<?php echo $this->_tpl_vars['childer']['perpage']; ?>
" size="2" />
                    </td>
                    <td class="td25">
                        <input type="checkbox" value="1" name="newwindow[<?php echo $this->_tpl_vars['childer']['id']; ?>
]" class="checkbox" <?php if ($this->_tpl_vars['childer']['newwindow'] == '1'): ?>checked="checked"<?php endif; ?>>
                    </td>
                    <td class="td25">
                        <input type="checkbox" value="1" name="useable[<?php echo $this->_tpl_vars['childer']['id']; ?>
]" class="checkbox" <?php if ($this->_tpl_vars['childer']['useable'] == '1'): ?>checked="checked"<?php endif; ?>>
                    </td>
                    <td class="td25">
                        <a href="javascript:void(0);" onclick="Controller.controller('修改导航-<?php echo $this->_tpl_vars['childer']['name']; ?>
', 'admin/nav/edit/id/<?php echo $this->_tpl_vars['childer']['id']; ?>
')">编辑</a>
                    </td>
                </tr>
            <?php endforeach; endif; unset($_from); ?>
            <?php endforeach; endif; unset($_from); ?>
        </tbody>
        <tbody>
        <tr>
            <td colspan="2"></td>
            <td colspan="8" class="tdl">
            	<div class="lastboard">
                    <a class="addtr" onclick="addrow(this, 1, <?php echo $this->_tpl_vars['nav']['id']; ?>
)" href="javascript:;">添加二级分类</a>
                </div>
            </td>
        </tr>
        </tbody>
        <?php endforeach; endif; unset($_from); ?>
        <tr>
            <td></td>
            <td colspan="8" class="tdl"><div>
                    <a class="addtr" onclick="addrow(this, 0, 0)" href="javascript:;">添加</a>
                </div></td>
        </tr>
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/nav/', 'more')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/nav/', 'delete')">删除</button>
            </td>
            <td class="td25" colspan="6">
            </td>
        </tr>
    </table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>