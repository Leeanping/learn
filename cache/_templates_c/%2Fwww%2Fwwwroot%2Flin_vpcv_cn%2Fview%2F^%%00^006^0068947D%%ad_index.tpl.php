<?php /* vpcvcms compiled created on 2018-11-08 15:22:45
         compiled from admin/ad_index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul>
         <li class="btn btn-info" onclick="Controller.reload()"><span>广告列表</span></li>
         <li class="btn btn-info" onclick="Controller.controller('添加广告','admin/ad/add')"><span>添加广告</span></li>
         <li class="btn btn-info" onclick="Controller.main('<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/ad/type')"><span>广告分类</span></li>
    </ul>
</div>
<div class="input-append">
    <form method="post" action="/admin/ad/index" id="pform">
        <input id="input_name" type="text" name="adname" placeholder="请输入广告名称" value="<?php if ($this->_tpl_vars['adname']): ?><?php echo $this->_tpl_vars['adname']; ?>
<?php endif; ?>" class="txt" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="button" onclick="Controller.search('admin/ad/index')"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/ad/more" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl" width="60">编号</th>
            <th>排序</th>
            <th>名称</th>
            <th>分类名称</th>
            <th>广告图片</th>
            <th>点击量</th>
            <th>操作</th>
        </tr>
        <?php $_from = $this->_tpl_vars['ads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ad']):
?>
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['ad']['id']; ?>
" />
            </td>
            <td class="tdl">
            	<?php echo $this->_tpl_vars['ad']['id']; ?>

            </td>
            <td class="td25">
            	<input type="text" size="5" name="sort[<?php echo $this->_tpl_vars['ad']['id']; ?>
]" class="txt" value="<?php echo $this->_tpl_vars['ad']['sort']; ?>
" />
            </td>
            <td class="td25">
            	<?php echo $this->_tpl_vars['ad']['adname']; ?>

            </td>
            <td class="td25">
            	<?php echo $this->_tpl_vars['ad']['kname']; ?>

            </td>
            <td class="td25">
            	<img src="<?php if ($this->_tpl_vars['ad']['outurl']): ?><?php echo $this->_tpl_vars['ad']['outurl']; ?>
<?php else: ?><?php echo $this->_tpl_vars['ad']['imgurl']; ?>
<?php endif; ?>" width="120" height="50" />
            </td>
            <td class="td25">
            	<?php echo $this->_tpl_vars['ad']['shownum']; ?>

            </td>
            <td class="td25">
                <a href="javascript:;" onclick="Controller.controller('修改广告', 'admin/ad/edit/id/<?php echo $this->_tpl_vars['ad']['id']; ?>
')" >编辑</a>
            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/ad/', 'more')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/ad/', 'delete')">删除</button>
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