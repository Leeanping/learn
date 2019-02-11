<?php /* vpcvcms compiled created on 2018-11-08 16:19:10
         compiled from admin/config_template.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul>
        <li class="btn btn-info"><span>模板设置</span></li>
    </ul>
</div>
<form action="/admin/config/template" method="post" id="cpform" name="cpform">
    <table class="mtb">
        <tr>
            <td class="td27" colspan="2">设置前台显示模板：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
				<input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'template','group' => 'template','default' => 'default'), $this);?>
" datatype="Require" msg="请填写模板" name="config[template][template]" />
            </td>
            <td class="vtop tips2">填写前台显示的模板,默认为default</td>
        </tr>
    </table>
    <div class="btnfix">
    	<input type="submit" name="editsubmit" value="提交" class="btn btn-success" tabindex="3" />
    </div>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>