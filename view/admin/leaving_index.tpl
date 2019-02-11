{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
        <li class="btn btn-info" onclick="Controller.reload()">留言管理</li>
    </ul>
</div>
<form method="post" action="/admin/leaving/more" name="lpform" id="lpform">
    <table class="tb">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">姓名</th>
            <th>电话</th>
            <th>邮箱</th>
            <th>QQ</th>
            <th>留言</th>
            <th>时间</th>
        </tr>
        {{foreach from=$leavings item=leaving}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="id[]" value="{{$leaving.id}}" />
            </td>
            <td class="tdl">
                {{$leaving.realname}}
            </td>
            <td class="td25">
                {{$leaving.telephone}}
            </td>
            <td class="td25">
                {{$leaving.email}}
            </td>
            <td class="td25">
                {{$leaving.qq}}
            </td>
            <td class="td25">
                {{$leaving.message}}
            </td>
            <td class="td25">
                {{$leaving.addtime|date_format:'%Y-%m-%d'}}
            </td>
        </tr>
        {{/foreach}}
        <tr>
            <td>
                <button name="chkall" id="chkall" class="btn btn-primary" title="全选" type="button" onclick="checkAll(this.form, 'id[]')">全选</button>
            </td>
            <td class="tdl">
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/leaving/', 'delete')">删除</button>
            </td>
            <td colspan="5" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}