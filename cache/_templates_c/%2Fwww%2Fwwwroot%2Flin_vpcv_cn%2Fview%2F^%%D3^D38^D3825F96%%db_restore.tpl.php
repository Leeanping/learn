<?php /* vpcvcms compiled created on 2018-11-29 11:55:17
         compiled from admin/db_restore.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul>
        <li class="btn btn-info"><span>数据库恢复 <span style="color:red">(数据备份文件位于 网站路径/data 目录下, 请确保该目录外部不可见!)</span></li>
    </ul>
</div>
<div class="floattopempty"></div>
<form method="post" autocomplete="off" action="/admin/db/restore/del/1">
	<table class="tb">
		<tr class="header">
        	<th width="60">选择</th>
            <th class="tdl">文件名</th>
            <th>版本</th>
            <th>时间</th>
            <th>尺寸</th>
            <th>卷数</th>
            <th>操作</th>
        </tr>
		<?php $_from = $this->_tpl_vars['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['files'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['files']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['file']):
        $this->_foreach['files']['iteration']++;
?>
        <tr class="hover">
            <td><input class="checkbox" type="checkbox" name="dir[]" value="<?php echo $this->_tpl_vars['i']; ?>
"></td>
            <td class="tdl"><a href="javascript:void(0);" onclick="if($('#<?php echo $this->_tpl_vars['i']; ?>
').css('display')=='none'){$('.sqlfile').hide();$('#<?php echo $this->_tpl_vars['i']; ?>
').show();}else{$('#<?php echo $this->_tpl_vars['i']; ?>
').hide();}"><?php echo $this->_tpl_vars['i']; ?>
</a></td>
            <td><?php echo $this->_tpl_vars['file']['ver']; ?>
</td>
            <td><?php echo $this->_tpl_vars['file']['date']; ?>
</td>
            <td><?php echo $this->_tpl_vars['file']['size']; ?>
 KB</td>
            <td><?php echo $this->_tpl_vars['file']['num']; ?>
</td>
            <td><a class="act" href="/admin/db/restore/d/<?php echo $this->_tpl_vars['i']; ?>
" class="act">导入</a></td>
        </tr>
        <tbody id="<?php echo $this->_tpl_vars['i']; ?>
" style="display:none" class="sqlfile">
        <?php $_from = $this->_tpl_vars['file']['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['f'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['f']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['f']):
        $this->_foreach['f']['iteration']++;
?>
        <tr class="hover">
            <td></td>
            <td class="tdl"><?php echo $this->_tpl_vars['f']['file']; ?>
</td>
            <td></td>
            <td><?php echo $this->_tpl_vars['f']['date']; ?>
</td>
            <td><?php echo $this->_tpl_vars['f']['size']; ?>
 KB</td>
            <td>1</td>
            <td></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        </tbody>
		<?php endforeach; endif; unset($_from); ?>
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'dir[]')">全选</button></td>
            <td class="tdl">
                <button id="submit" class="btn btn-danger" type="submit">删除</button>
            </td>
            <td colspan="5">
            </td>
        </tr>
	</table>
</form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>