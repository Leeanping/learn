<?php /* vpcvcms compiled created on 2019-02-11 10:02:11
         compiled from admin/category_index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
var rowtypedata = [
		[[1, '', 'td25'], [1, '', 'td25'], [1,'<input name="newsort[]" value="" size="2" type="text" class="txt">', 'tdl'], [1, '<input name="newcatname[]" value="" size="15" type="text" class="txt">', 'tdl'],[1,''],[3, '<input type="hidden" name="newpid[]" value="0" />']],
		[[1, '', 'td25'], [1, '', 'td25'], [1,'<input name="newsort[]" value="" size="2" type="text" class="txt">', 'tdl'], [1, '<div class=\"board\"><input name="newcatname[]" value="" size="15" type="text" class="txt"></div>', 'tdl'], [1,'',''], [3, '<input type="hidden" name="newpid[]" value="{1}" />']],
		[[1, '', 'td25'], [1, '', 'td25'], [1,'<input name="newsort[]" value="" size="2" type="text" class="txt">', 'tdl'], [1, '<div class=\"childboard\"><input name="newcatname[]" value="" size="15" type="text" class="txt"></div>', 'tdl'], [1,'',''], [3, '<input type="hidden" name="newpid[]" value="{1}" />']]
	];
</script>
<form method="post" action="/admin/category/index" name="lpform" id="lpform">
    <table class="tb tb2">
    	<tbody>
        <tr class="header">
            <th width="60">选择</th>
            <th width="60">ID</th>
            <th class="tdl">顺序</th>
            <th class="tdl">名称</th>
            <th>可用</th>
        </tr>
        </tbody>
        <?php $_from = $this->_tpl_vars['categoryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['cat']):
?>
        <tbody>
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['cat']['id']; ?>
" />
            </td>
            <td class="td25">
                <?php echo $this->_tpl_vars['cat']['id']; ?>

            </td>
            <td class="tdl">
                <input type="hidden" class="txt" name="pid[<?php echo $this->_tpl_vars['cat']['id']; ?>
]" value="<?php echo $this->_tpl_vars['cat']['pid']; ?>
" size="2" />
                <input type="text" class="txt" name="sort[<?php echo $this->_tpl_vars['cat']['id']; ?>
]" value="<?php echo $this->_tpl_vars['cat']['sort']; ?>
" size="2"  datatype="Require" msg="请填写序列号"></td>
            <td class="tdl">
                <div>
                	<input type="text" class="txt" name="catname[<?php echo $this->_tpl_vars['cat']['id']; ?>
]" value="<?php echo $this->_tpl_vars['cat']['catname']; ?>
" size="15" datatype="Require" msg="请填写分类名称">
                </div>
            </td>
            <td class="td25">
                <input type="checkbox" value="1" name="useable[<?php echo $this->_tpl_vars['cat']['id']; ?>
]" class="checkbox" <?php if ($this->_tpl_vars['cat']['useable'] == '1'): ?>checked="checked"<?php endif; ?>>
            </td>
        </tr>
        </tbody>
        <tbody id="child_<?php echo $this->_tpl_vars['cat']['id']; ?>
">
        	<?php $_from = $this->_tpl_vars['cat']['son']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
                    <input type="hidden" class="txt" name="pid[<?php echo $this->_tpl_vars['son']['id']; ?>
]" value="<?php echo $this->_tpl_vars['son']['pid']; ?>
" size="2" />
                    <input type="text" class="txt" name="sort[<?php echo $this->_tpl_vars['son']['id']; ?>
]" value="<?php echo $this->_tpl_vars['son']['sort']; ?>
" size="2"  datatype="Require" msg="请填写序列号"></td>
                <td class="tdl">
                    <div class="board">
                        <input type="text" class="txt" name="catname[<?php echo $this->_tpl_vars['son']['id']; ?>
]" value="<?php echo $this->_tpl_vars['son']['catname']; ?>
" size="15" datatype="Require" msg="请填写分类名称">
                        <a class="addchildboard" href="javascript:;" onclick="addrowdirect=1;addrow(this, 2, <?php echo $this->_tpl_vars['son']['id']; ?>
)">添加下级分类</a>
                    </div>
                </td>
                <td class="td25">
                    <input type="checkbox" value="1" name="useable[<?php echo $this->_tpl_vars['son']['id']; ?>
]" class="checkbox" <?php if ($this->_tpl_vars['son']['useable'] == '1'): ?>checked="checked"<?php endif; ?>>
                </td>
            </tr>
            	<?php $_from = $this->_tpl_vars['son']['son']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
            	<tr class="hover">
                    <td class="td25">
                        <input class="checkbox" type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['child']['id']; ?>
" />
                    </td>
                    <td class="td25">
                        <?php echo $this->_tpl_vars['child']['id']; ?>

                    </td>
                    <td class="tdl">
                        <input type="hidden" class="txt" name="pid[<?php echo $this->_tpl_vars['child']['id']; ?>
]" value="<?php echo $this->_tpl_vars['child']['pid']; ?>
" size="2" />
                        <input type="text" class="txt" name="sort[<?php echo $this->_tpl_vars['child']['id']; ?>
]" value="<?php echo $this->_tpl_vars['child']['sort']; ?>
" size="2"  datatype="Require" msg="请填写序列号"></td>
                    <td class="tdl">
                        <div class="childboard">
                            <input type="text" class="txt" name="catname[<?php echo $this->_tpl_vars['child']['id']; ?>
]" value="<?php echo $this->_tpl_vars['child']['catname']; ?>
" size="15" datatype="Require" msg="请填写分类名称">
                        </div>
                    </td>
                    <td class="td25">
                        <input type="checkbox" value="1" name="useable[<?php echo $this->_tpl_vars['child']['id']; ?>
]" class="checkbox" <?php if ($this->_tpl_vars['child']['useable'] == '1'): ?>checked="checked"<?php endif; ?>>
                    </td>
                </tr>
            	<?php endforeach; endif; unset($_from); ?>
            <?php endforeach; endif; unset($_from); ?>
        </tbody>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td colspan="8" class="tdl">
            	<div class="lastboard">
                    <a class="addtr" onclick="addrow(this, 1, <?php echo $this->_tpl_vars['cat']['id']; ?>
)" href="javascript:;">添加二级分类</a>
                </div>
            </td>
        </tr>
        </tbody>
        <?php endforeach; endif; unset($_from); ?>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td colspan="8" class="tdl">
            	<div>
                    <a class="addtr" onclick="addrow(this, 0, 0)" href="javascript:;">添加一级分类</a>
                </div>
            </td>
        </tr>
        </tbody>
        <tbody>
        <tr>
        	<td>
            	<button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button>
            </td>
            <td class="tdl" colspan="3">
            	<button class="btn btn-success" type="submit" onclick="Controller.update('admin/category/', 'more')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/category/', 'delete')">删除</button>
                <input type="hidden" name="item" value="<?php echo $this->_tpl_vars['itemid']; ?>
" />
                <input type="hidden" name="kindid" value="<?php echo $this->_tpl_vars['kindid']; ?>
" />
            </td>
            <td colspan="6"></td>
        </tr>
        </tbody>
    </table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>