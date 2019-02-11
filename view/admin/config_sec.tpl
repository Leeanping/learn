{{include file="admin/header.tpl"}}
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
                {{TO->cfg key="code_on_reg" group="sec" assign="_code_on_reg" default="0"}}
                <label><input type="radio" class="radio" name="config[sec][code_on_reg]"{{if $_code_on_reg == 1}} checked="checked"{{/if}} value="1" />开启</label>
                <label><input type="radio" class="radio" name="config[sec][code_on_reg]"{{if $_code_on_reg == 0}} checked="checked"{{/if}} value="0" />关闭</label>
            </td>
            <td class="vtop tips2">&nbsp;</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">登录开启验证码：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                {{TO->cfg key="code_on_login" group="sec" assign="_code_on_login" default="0"}}
                <label><input type="radio" class="radio" name="config[sec][code_on_login]"{{if $_code_on_login == 1}} checked="checked"{{/if}} value="1" />开启</label>
                <label><input type="radio" class="radio" name="config[sec][code_on_login]"{{if $_code_on_login == 0}} checked="checked"{{/if}} value="0" />关闭</label>
            </td>
            <td class="vtop tips2">&nbsp;</td>
        </tr>
    </table>
    <div class="btnfix">
    	<input type="submit" name="editsubmit" value="提交" class="btn btn-success" tabindex="3" />
    </div>
</form>
{{include file="admin/footer.tpl"}}