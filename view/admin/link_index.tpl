{{include file="admin/header.tpl"}}
<script type="text/javascript">
var rowtypedata = [
		[[1, '', 'td25'], [1,'<input name="newname[]" value="" size="15" type="text" class="txt">', 'tdl'], [1, '<input name="newlink[]" value="" size="30" type="text" class="txt">', 'tdl'],[1,'']]
	];
</script>
<div class="floattop">
    <ul>
        <li class="btn btn-info">友情链接管理</li>
    </ul>
</div>
<form method="post" action="/admin/link/index" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">网站名称</th>
            <th class="tdl">网站链接</th>
            <th>是否显示</th>
            <th>操作</th>
        </tr>
        {{foreach from=$links item=link}}
        <tr class="hover">
            <td class="td25">
                {{if $link.id != 1}}
                <input class="checkbox" type="checkbox" name="id[]" value="{{$link.id}}" />
                {{/if}}
            </td>
            <td class="tdl">
                {{if $link.id != 1}}
            	<input type="text" size="15" name="name[{{$link.id}}]" class="txt" value="{{$link.name}}" />
                {{else}}
                {{$link.name}}
                {{/if}}
            </td>
            <td class="tdl">
                {{if $link.id != 1}}
            	<input type="text" size="30" name="link[{{$link.id}}]" class="txt" value="{{$link.link}}" />
                {{else}}
                {{$link.link}}
                {{/if}}
            </td>
            <td class="td25">
                {{if $link.id != 1}}
            	<input type="checkbox"{{if $link.useable == 1}} checked="checked"{{/if}} value="1" name="useable[{{$link.id}}]" />
                {{/if}}
            </td>
            <td class="td25">
                {{if $link.id != 1}}
                <a href="javascript:;" onclick="Controller.controller('修改友情链接','admin/link/edit/id/{{$link.id}}')">编辑</a>
                {{/if}}
            </td>
        </tr>
        {{/foreach}}
        <tr>
            <td></td>
            <td colspan="4" class="tdl">
            	<div>
                    <a class="addtr" onclick="addrow(this, 0, 0)" href="javascript:;">添加友情链接</a>
                </div>
            </td>
        </tr>
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/link/', 'more')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/link/', 'delete')">删除</button>
            </td>
            <td colspan="3" align="right"></td>
        </tr>
    </table>
</form>
{{include file="admin/footer.tpl"}}