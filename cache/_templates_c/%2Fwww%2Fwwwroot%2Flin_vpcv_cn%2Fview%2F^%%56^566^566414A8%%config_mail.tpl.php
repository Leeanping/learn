<?php /* vpcvcms compiled created on 2018-11-08 16:19:09
         compiled from admin/config_mail.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $this->assign('mail_auth',  $this->_reg_objects['TO'][0]->cfg(array('key' => 'auth','group' => 'mail','default' => '0'), $this));?>
<div class="floattop">
    <ul>
        <li class="btn btn-info"><span>邮件设置</span></li>
    </ul>
</div>
<form action="/admin/config/mail" method="post" id="cpform" name="cpform">
    <table class="mtb">
        <tr>
            <td class="td27" colspan="2">开启邮件发送功能：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <?php $this->assign('mail_on',  $this->_reg_objects['TO'][0]->cfg(array('key' => 'open','group' => 'mail','default' => '0'), $this));?>
                <label><input type="radio" class="radio" name="config[mail][open]"<?php if ($this->_tpl_vars['mail_on'] == 1): ?> checked="checked"<?php endif; ?> value="1" onclick="showObj('mail_on');$('#mail_mail').attr('checked','checked');"/>是</label>
                <label><input type="radio" class="radio" name="config[mail][open]"<?php if ($this->_tpl_vars['mail_on'] == 0): ?> checked="checked"<?php endif; ?> value="0" onclick="hideObj('mail_on');hideObj('mail_sendmail');hideObj('mail_smtp');hideObj('mail_smtp_auth');"/>否</label>
            </td>
            <td class="vtop tips2">找回密码等功能需要开启邮件功能</td>
        </tr>
        <tbody id="mail_on" <?php if ($this->_tpl_vars['mail_on'] == 0): ?>style="display: none;"<?php endif; ?>>
            <tr>
                <td class="td27" colspan="2">邮件发送方式:</td>
            </tr>
            <tr class="noborder">
                <td class="vtop rowform" colspan="2">
                <?php $this->assign('mail_type',  $this->_reg_objects['TO'][0]->cfg(array('key' => 'type','group' => 'mail','default' => 'mail'), $this));?>
                    <label><input type="radio" class="radio" name="config[mail][type]"<?php if ($this->_tpl_vars['mail_type'] == 'smtp'): ?> checked="checked"<?php endif; ?> value="smtp" onclick="showObj('mail_smtp');<?php if ($this->_tpl_vars['mail_auth'] == 1): ?>showObj('mail_smtp_auth');<?php endif; ?>hideObj('mail_sendmail');"/>通过 SOCKET 连接 SMTP 服务器发送（支持 ESMTP 验证）</label><br />
                    <label><input type="radio" class="radio" name="config[mail][type]"<?php if ($this->_tpl_vars['mail_type'] == 'sendmail'): ?> checked="checked"<?php endif; ?> value="sendmail" onclick="showObj('mail_sendmail');hideObj('mail_smtp');hideObj('mail_smtp_auth');"/>直接使用 sendmail 发送（适用于类 UNIX 系统）</label>
                </td>
            </tr>
        </tbody>
        <tbody id="mail_smtp" <?php if ($this->_tpl_vars['mail_type'] != 'smtp' || $this->_tpl_vars['mail_on'] == 0): ?>style="display: none;"<?php endif; ?>>
            <tr>
                <td class="td27" colspan="2">SMTP 服务器地址：</td>
            </tr>
            <tr class="noborder">
                <td class="vtop rowform">
                    <input type="text" class="txt" name="config[mail][smtp_server]" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'smtp_server','group' => 'mail','default' => ""), $this);?>
" datatype="Require" msg="请填写SMTP 服务器地址"/>
                </td>
                <td class="vtop tips2"><span info="config[mail][smtp_server]"></span></td>
            </tr>
            <tr>
                <td class="td27" colspan="2">SMTP 服务器端口：</td>
            </tr>
            <tr class="noborder">
                <td class="vtop rowform">
                    <input type="text" class="txt" name="config[mail][smtp_port]" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'smtp_port','group' => 'mail','default' => ""), $this);?>
" datatype="Number" msg="请填写正确的端口号"/>
                </td>
                <td class="vtop tips2"><span info="config[mail][smtp_port]"></span></td>
            </tr>
            <tr>
                <td class="td27" colspan="2">发信人邮件地址：</td>
            </tr>
            <tr class="noborder">
                <td class="vtop rowform">
                    <input type="text" class="txt" name="config[mail][sender]" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'sender','group' => 'mail','default' => ""), $this);?>
" datatype="Email" msg="请填写正确的邮箱地址"/>
                </td>
                <td class="vtop tips2"><span info="config[mail][sender]"></span></td>
            </tr>
            <tr>
                <td class="td27" colspan="2">是否需要验证：</td>
            </tr>
            <tr class="noborder">
                <td class="vtop rowform">
                    <label><input type="radio" class="radio" name="config[mail][auth]"<?php if ($this->_tpl_vars['mail_auth'] == 1): ?> checked="checked"<?php endif; ?> value="1"  onclick="showObj('mail_smtp_auth');" />是</label>
                    <label><input type="radio" class="radio" name="config[mail][auth]"<?php if ($this->_tpl_vars['mail_auth'] == 0): ?> checked="checked"<?php endif; ?> value="0"  onclick="hideObj('mail_smtp_auth');"/>否</label>
                </td>
                <td class="vtop tips2"></td>
            </tr>
            <tbody id="mail_smtp_auth" <?php if ($this->_tpl_vars['mail_type'] != 'smtp' || $this->_tpl_vars['mail_on'] == 0 || $this->_tpl_vars['mail_auth'] == 0): ?>style="display: none;"<?php endif; ?>>
            <tr>
                <td class="td27" colspan="2">SMTP 身份验证用户名：</td>
            </tr>
            <tr class="noborder">
                <td class="vtop rowform">
                    <input type="text" class="txt" name="config[mail][smtp_user]" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'smtp_user','group' => 'mail','default' => ""), $this);?>
"/>
                </td>
                <td class="vtop tips2"></td>
            </tr>
            <tr>
                <td class="td27" colspan="2">SMTP 身份验证密码：</td>
            </tr>
            <tr class="noborder">
                <td class="vtop rowform">
                    <input type="password" class="txt" name="config[mail][smtp_pwd]" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'smtp_pwd','group' => 'mail','default' => ""), $this);?>
"/>
                </td>
                <td class="vtop tips2"></td>
            </tr>
            </tbody>
        </tbody>
        <tbody id="mail_sendmail" <?php if ($this->_tpl_vars['mail_type'] != 'sendmail' || $this->_tpl_vars['mail_on'] == 0): ?>style="display: none;"<?php endif; ?>>
            <tr>
                <td class="td27" colspan="2">sendmail 路径：</td>
            </tr>
            <tr class="noborder">
                <td class="vtop rowform">
                    <input type="text" class="txt" name="config[mail][sendmail_path]" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'sendmail_path','group' => 'mail','default' => ""), $this);?>
"/>
                </td>
                <td class="vtop tips2"></td>
            </tr>
            <tr>
                <td class="td27" colspan="2">sendmail 参数：</td>
            </tr>
            <tr class="noborder">
                <td class="vtop rowform">
                    <input type="text" class="txt" name="config[mail][sendmail_args]" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'sendmail_args','group' => 'mail','default' => ""), $this);?>
"/>
                </td>
                <td class="vtop tips2"></td>
            </tr>
        </tbody>
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