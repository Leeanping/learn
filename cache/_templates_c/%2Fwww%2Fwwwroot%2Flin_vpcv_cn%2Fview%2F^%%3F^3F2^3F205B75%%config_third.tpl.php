<?php /* vpcvcms compiled created on 2018-11-08 16:19:33
         compiled from admin/config_third.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul>
        <li class="btn btn-info"><span>三方设置</span></li>
    </ul>
</div>
<form action="/admin/config/third" method="post" id="cpform" name="cpform">
    <table class="mtb">
        <tr>
            <td class="td27" colspan="2">QQ appid：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
				<input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'qqappid','group' => 'third','default' => ''), $this);?>
" datatype="Require" msg="请填写appid" name="config[third][qqappid]" />
            </td>
            <td class="vtop tips2">填写QQ登录的appid</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">QQ appkey：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
				<input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'qqappkey','group' => 'third','default' => ''), $this);?>
" datatype="Require" msg="请填写qqappkey" name="config[third][qqappkey]" />
            </td>
            <td class="vtop tips2">填写QQ登录的appkey</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">新浪微博登录 appid：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'sinaappid','group' => 'third','default' => ''), $this);?>
" datatype="Require" msg="请填写appid" name="config[third][sinaappid]" />
            </td>
            <td class="vtop tips2">填写新浪微博登录的appid</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">新浪微博登录 appkey：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'sinaappkey','group' => 'third','default' => ''), $this);?>
" datatype="Require" msg="请填写appkey" name="config[third][sinaappkey]" />
            </td>
            <td class="vtop tips2">填写新浪微博登录的appkey</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">短信帐号：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
				<input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'smsuser','group' => 'third','default' => ''), $this);?>
" datatype="Require" msg="请填写短信帐号" name="config[third][smsuser]" />
            </td>
            <td class="vtop tips2">填写短信帐号</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">短信密码：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
				<input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'smspwd','group' => 'third','default' => ''), $this);?>
" datatype="Require" msg="请填写短信密码" name="config[third][smspwd]" />
            </td>
            <td class="vtop tips2">填写短信密码</td>
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