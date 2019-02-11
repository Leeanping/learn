<?php /* vpcvcms compiled created on 2018-11-09 09:32:11
         compiled from admin/ad_type.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
var rowtypedata = [
		[[1, '', 'td25'], [1,'<input name="newname[]" value="" type="text" class="txt">', 'tdl'], [1, '<input name="newtag[]" value="" size="15" type="text" class="txt">', 'tdl'],[1,'<select name="newisslide" style="width: 100px"><option value="0">否</option><option value="1">是</option></select>'],[1, '']]
	];
</script>
<div class="floattop">
    <ul>
         <li class="btn btn-info" onclick="Controller.reload()"><span>广告列表</span></li>
         <li class="btn btn-info" onclick="Controller.controller('添加广告','admin/ad/add')"><span>添加广告</span></li>
         <li class="btn btn-info" onclick="Controller.main('<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/ad/type')"><span>广告分类</span></li>
    </ul>
</div>
<form method="post" action="/admin/ad/tmore" name="lpform" id="lpform">
    <table class="tb tb2">
    	<tbody>
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">名称</th>
            <th class="tdl">tagname</th>
            <th>是否轮播</th>
            <th>可用</th>
        </tr>
        </tbody>
        <?php $_from = $this->_tpl_vars['types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type']):
?>
        <tbody>
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['type']['id']; ?>
" />
            </td>
            <td class="tdl">
                <input type="text" class="txt" name="name[<?php echo $this->_tpl_vars['type']['id']; ?>
]" value="<?php echo $this->_tpl_vars['type']['name']; ?>
" ></td>
            <td class="tdl">
                <div>
                	<input type="text" class="txt" style="width:100px;" name="tag[<?php echo $this->_tpl_vars['type']['id']; ?>
]" value="<?php echo $this->_tpl_vars['type']['tag']; ?>
" size="20">
                </div>
            </td>
            <td class="td25">
                <select name="isslide[<?php echo $this->_tpl_vars['type']['id']; ?>
]" style="width: 100px">
                    <option value="0"<?php if (! $this->_tpl_vars['type']['isslide']): ?> selected<?php endif; ?>>否</option>
                    <option value="1"<?php if ($this->_tpl_vars['type']['isslide'] == 1): ?> selected<?php endif; ?>>是</option>
                </select>
            </td>
            <td class="td25">
                <input type="checkbox" value="1" name="useable[<?php echo $this->_tpl_vars['type']['id']; ?>
]" class="checkbox" <?php if ($this->_tpl_vars['type']['useable'] == '1'): ?>checked="checked"<?php endif; ?>>
            </td>
        </tr>
        </tbody>
        <?php endforeach; endif; unset($_from); ?>
        <tbody>
        <tr>
            <td></td>
            <td colspan="8" class="tdl">
            	<div>
                    <a class="addtr" onclick="addrow(this, 0, 0)" href="javascript:;">添加分类</a>
                </div>
            </td>
        </tr>
        </tbody>
        <tbody>
        <tr>
        	<td>
            	<button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button>
            </td>
            <td class="tdl" colspan="2">
            	<button class="btn btn-success" type="submit" onclick="Controller.update('admin/ad/', 'tmore')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/ad/', 'tdelete')">删除</button>
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