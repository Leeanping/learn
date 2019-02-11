<?php /* vpcvcms compiled created on 2018-11-08 16:19:27
         compiled from admin/config_sec.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul>
        <li class="btn btn-info"><span>防灌水设置</span></li>
    </ul>
</div>
<form action="/admin/config/sec" method="post" id="cpform" name="cpform">
    <table class="mtb">
        <tr>
            <td class="td27" colspan="2">注册开启验证码：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <?php $this->assign('_code_on_reg',  $this->_reg_objects['TO'][0]->cfg(array('key' => 'code_on_reg','group' => 'sec','default' => '0'), $this));?>
                <label><input type="radio" class="radio" name="config[sec][code_on_reg]"<?php if ($this->_tpl_vars['_code_on_reg'] == 1): ?> checked="checked"<?php endif; ?> value="1" />开启</label>
                <label><input type="radio" class="radio" name="config[sec][code_on_reg]"<?php if ($this->_tpl_vars['_code_on_reg'] == 0): ?> checked="checked"<?php endif; ?> value="0" />关闭</label>
            </td>
            <td class="vtop tips2">&nbsp;</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">登录开启验证码：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <?php $this->assign('_code_on_login',  $this->_reg_objects['TO'][0]->cfg(array('key' => 'code_on_login','group' => 'sec','default' => '0'), $this));?>
                <label><input type="radio" class="radio" name="config[sec][code_on_login]"<?php if ($this->_tpl_vars['_code_on_login'] == 1): ?> checked="checked"<?php endif; ?> value="1" />开启</label>
                <label><input type="radio" class="radio" name="config[sec][code_on_login]"<?php if ($this->_tpl_vars['_code_on_login'] == 0): ?> checked="checked"<?php endif; ?> value="0" />关闭</label>
            </td>
            <td class="vtop tips2">&nbsp;</td>
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