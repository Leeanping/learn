<?php /* vpcvcms compiled created on 2018-11-08 16:29:16
         compiled from admin/config_add.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form action="/admin/config/add" method="post" id="scpform" name="scpform">
    <table class="mtb">
        <tr class="noborder">
            <td class="first">变量名</td>
            <td class="vtop next" colspan="3">
				<input type="text" class="txt" value="" name="cfgname" />
                填写变量名，默认会加上 "<?php echo $this->_tpl_vars['group']; ?>
_add_" 前缀，请勿重复
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">变量值</td>
            <td class="vtop next" colspan="3">
                <input type="text" class="txt" value="" name="config" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">标题</td>
            <td class="vtop next" colspan="3">
				<input type="text" class="txt" value="" name="title" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">提示信息</td>
            <td class="vtop next" colspan="3">
                <input type="text" class="txt" value="" name="tips" />
            </td>
        </tr>
    </table>
    <!-- <div class="btnfix"> -->
        <input type="hidden" name="action" value="add" />
        <input type="hidden" name="group" value="<?php echo $this->_tpl_vars['group']; ?>
" />
    <!-- </div> -->
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>