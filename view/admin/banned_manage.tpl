{{include file="admin/header.tpl"}}
<div class="floattop">
    <ul>
        <li class="btn btn-info" onclick="Controoler.reload();">禁止IP</li>
    </ul>
</div>
<form name="lpform" method="post" action="/admin/banned/manage" id="lpform">
    <input type="hidden" name="action" value="manage" />
    <table class="tb tb2 ">
        <tr class="header">
            <th>选择</th>
            <th class="tdl">IP 地址</th>
            <th>添加者</th>
        </tr>
        {{foreach from=$ipbanneds item=ipbanned}}
        <tr class="hover">
            <td class="td25"><input class="checkbox" type="checkbox" name="delete[]" value="{{$ipbanned.id}}"/></td>
            <td class="tdl">{{$ipbanned.ip}}</td>
            <td>{{$ipbanned.username}}</td>
        </tr>
        {{/foreach}}
        <tr class="hover">
            <td>新增:</td>
            <td class="tdl">
                <input type="text" class="txt" id="ip1new" name="ip1new" value="" size="3" maxlength="3">.
                <input type="text" class="txt" id="ip2new" name="ip2new" value="" size="3" maxlength="3">.
                <input type="text" class="txt" id="ip3new" name="ip3new" value="" size="3" maxlength="3">.
                <input type="text" class="txt" id="ip4new" name="ip4new" value="" size="3" maxlength="3">
                可以使用“*”作为通配符禁止某段地址。
            </td>
            <td></td>
        </tr>
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'delete[]')">全选</button></td>
            <td class="tdl">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/banned/', 'more')">提交</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/banned/', 'delete')">删除</button>
            </td>
            <td align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file="admin/footer.tpl"}}