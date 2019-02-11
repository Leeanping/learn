<?php /* vpcvcms compiled created on 2018-11-08 16:19:06
         compiled from admin/config_wap.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul>
        <li class="btn btn-info"><span>手机版设置</span></li>
    </ul>
</div>
<form action="/admin/config/wap" method="post" id="cpform" name="cpform">
    <table class="mtb">
        <tr>
            <td class="td27" colspan="2">开启手机 (WAP) 版：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
<?php $this->assign('_wap_on',  $this->_reg_objects['TO'][0]->cfg(array('key' => 'wap_on','group' => 'wap','default' => '1'), $this));?>
                <label><input type="radio" class="radio" name="config[wap][wap_on]"<?php if ($this->_tpl_vars['_wap_on'] == 1): ?> checked="checked"<?php endif; ?> value="1" />开启</label>
                <label><input type="radio" class="radio" name="config[wap][wap_on]"<?php if ($this->_tpl_vars['_wap_on'] == 0): ?> checked="checked"<?php endif; ?> value="0" />关闭</label>
            </td>
            <td class="vtop tips2">开启手机版，手机访问时，将跳转到手机版页面，该页面为手机版定制的页面，有利于手机访问</td>
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