{{include file="admin/header.tpl"}}
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
				<input type="text" class="txt" value="{{TO->cfg key='qqappid' group='third' default=''}}" datatype="Require" msg="请填写appid" name="config[third][qqappid]" />
            </td>
            <td class="vtop tips2">填写QQ登录的appid</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">QQ appkey：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
				<input type="text" class="txt" value="{{TO->cfg key='qqappkey' group='third' default=''}}" datatype="Require" msg="请填写qqappkey" name="config[third][qqappkey]" />
            </td>
            <td class="vtop tips2">填写QQ登录的appkey</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">新浪微博登录 appid：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input type="text" class="txt" value="{{TO->cfg key='sinaappid' group='third' default=''}}" datatype="Require" msg="请填写appid" name="config[third][sinaappid]" />
            </td>
            <td class="vtop tips2">填写新浪微博登录的appid</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">新浪微博登录 appkey：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input type="text" class="txt" value="{{TO->cfg key='sinaappkey' group='third' default=''}}" datatype="Require" msg="请填写appkey" name="config[third][sinaappkey]" />
            </td>
            <td class="vtop tips2">填写新浪微博登录的appkey</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">短信帐号：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
				<input type="text" class="txt" value="{{TO->cfg key='smsuser' group='third' default=''}}" datatype="Require" msg="请填写短信帐号" name="config[third][smsuser]" />
            </td>
            <td class="vtop tips2">填写短信帐号</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">短信密码：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
				<input type="text" class="txt" value="{{TO->cfg key='smspwd' group='third' default=''}}" datatype="Require" msg="请填写短信密码" name="config[third][smspwd]" />
            </td>
            <td class="vtop tips2">填写短信密码</td>
        </tr>
    </table>
    <div class="btnfix">
    	<input type="submit" name="editsubmit" value="提交" class="btn btn-success" tabindex="3" />
    </div>
</form>
{{include file="admin/footer.tpl"}}