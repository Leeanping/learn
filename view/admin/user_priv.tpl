{{include file="admin/header.tpl"}}
<form action="/admin/user/priv" method="post" id="cpform" name="cpform">
    <input type="hidden" name="action" value="access" />
    <input type="hidden" name="uid" value="{{$privuser.uid}}" />
    <table class="mtb">
        <tr>
            <td class="td27" colspan="2">用户名:</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">{{$privuser.username}}</td>
            <td class="vtop tips2"></td>
        </tr>
        <tr>
            <td class="td27">
                允许使用的管理权限:<label for="chkall1"><input class="checkbox" name="chkall1" onclick="checkAll(this.form, 'accessnew[]')" id="chkall1" type="checkbox"> 全选</label>
            </td>
        </tr>
        {{foreach from=$adminprivs key=key item=priv}}
        <tr>
            <td class="td27" colspan="2">{{$key}}</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform" colspan="2">
            	<ul class="dblist">
                    <li>{{html_checkboxes name="accessnew" options=$priv checked=$admin_checked separator="</li><li>"}}</li>
                </ul>
            </td>
        </tr>
        {{/foreach}}
    </table>
</form>
{{include file="admin/footer.tpl"}}