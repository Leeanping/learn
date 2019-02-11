<?php /* vpcvcms compiled created on 2018-11-08 15:24:33
         compiled from admin/db_backup.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul>
        <li class="btn btn-info"><span>数据库备份 <span style="color:red">(数据备份文件位于 网站路径/data 目录下, 请确保该目录外部不可见!)</span></li>
    </ul>
</div>
<div class="floattopempty"></div>
<form method="post" autocomplete="off" action="/admin/db/backup/step/1">
	<table class="mtb">
		<tr><td colspan="2" class="td27">数据备份类型:</td></tr>
		<tr class="noborder">
    		<td class="vtop rowform">
                <ul class="nofloat" >
                    <li class="checked"><input class="radio" type="radio" name="type" value="ALL" checked onclick="$('#showtables').hide();">&nbsp;站点全部数据</li><li><input class="radio" type="radio" name="type" value="custom" onclick="$('#showtables').show();">&nbsp;自定义备份</li>
                </ul>
            </td>
    		<td class="vtop tips2"></td>
		</tr>
		<tbody id="showtables" style="display:none">
    	<tr>
        	<td><button name="chkall" id="chkall" class="btn" title="删除" type="button" onclick="checkAll(this.form, 't[]')">全选</button></td>
    	</tr>
    	<tr>
        	<td colspan="2">
                <ul class="dblist" >
                <?php $_from = $this->_tpl_vars['tables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tables'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tables']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['tab']):
        $this->_foreach['tables']['iteration']++;
?>
                    <?php if (($this->_foreach['tables']['iteration']-1) % 3 === 0 && ($this->_foreach['tables']['iteration']-1) > 0): ?>
                </ul>
                <ul class="dblist">
                    <?php endif; ?>
                    <li class="checked">
                        &nbsp;<input type="checkbox" name="t[]" value="<?php echo $this->_tpl_vars['i']; ?>
" class="checkbox" checked="checked" /> <?php echo $this->_tpl_vars['tab']; ?>

                    </li>
                <?php endforeach; endif; unset($_from); ?>
                </ul>
        	</td>
    	</tr>
		</tbody>
		<tbody id="advanceoption" >
		<tr><td colspan="2" class="td27">分卷大小设置:</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
                 <input type="text" class="txt" size="40" name="fs" value="2048" />
            </td><td class="vtop tips2"></td>
        </tr>
        </tbody>
	</table>
    <div class="btnfix">
    	<input type="submit" name="editsubmit" value="提交" class="btn btn-success" tabindex="3" />
    </div>
</form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>