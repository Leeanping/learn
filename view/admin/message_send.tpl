{{include file="admin/header.tpl"}}
{{TO->cfg key="auth" group="mail" assign="mail_auth" default="0"}}
<div class="floattop">
    <ul>
        <li class="btn"><a href="javascript:void(0);"><span>发送消息</span></a></li>
    </ul>
</div>
<form action="/admin/message/send" method="post" id="cpform" name="cpform">
    <table class="mtb">
        <tr>
            <td class="td27" colspan="2">发送类型：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <label><input type="radio" class="radio" name="kind" checked="checked" value="1" />所有注册会员</label>
            </td>
            <td class="vtop tips2">发送系统消息</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
            	<input type="text" class="txt" name="uid" />
            </td>
            <td class="vtop tips2">这里输入单个会员UID或者帐号时,上面的所有会员不会生效</td>
        </tr>
        <tbody id="mail_smtp">
            <tr>
                <td class="td27" colspan="2">标题：</td>
            </tr>
            <tr class="noborder">
                <td class="vtop rowform">
                    <input type="text" class="txt" name="title" value="" datatype="Require" msg="请输入消息标题"/>
                </td>
                <td class="vtop tips2"><span info="title"></span></td>
            </tr>
            <tr>
                <td class="td27" colspan="2">内容：</td>
            </tr>
            <tr class="noborder">
                <td class="vtop rowform">
                    <textarea  rows="6" name="message" cols="50" class="tarea"></textarea>
                </td>
                <td class="vtop tips2"></td>
            </tr>
        </tbody>
    </table>
    <div class="btnfix">
    	<input type="hidden" name="action" value="message" />
        <input type="submit" class="btn" name="vpbtn" value="点击发送" />
    </div>
</form>
{{include file="admin/footer.tpl"}}