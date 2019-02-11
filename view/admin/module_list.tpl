{{include file="admin/header.tpl"}}
<script type="text/javascript">
var rowtypedata = [
		[[1,'<input name="newtitle[]" value="" size="15" type="text" class="txt">', 'tdl'], [1, '<input name="newmark[]" value="" size="15" type="text" class="txt">', 'td25'],[1, '<input name="newcomment[]" value="" size="15" type="text" class="txt">', 'td25'],[1, '&nbsp;', 'td25']]
	];
</script>
<form method="post" action="/admin/module/list" name="lpform" id="lpform">
    <table class="tb tb2">
        <tr class="header">
            <th class="tdl">名称</th>
            <th>标识</th>
            <th>描述</th>
            <th>操作</th>
        </tr>
        {{foreach item=module from=$modules}}
        <tr class="hover">
            <td class="tdl">
                {{$module.title}}
            </td>
            <td class="td25">{{$module.mark}}</td>
            <td class="td25">
                {{$module.comment}}
            </td>
            <td class="td25">
                {{if $module.mark != 'article' && $module.mark != 'shop' && $module.mark != 'case'}}
                <a href="javascript:;" onclick="Controller.deleteOne('admin/module/deletemodule/id/{{$module.id}}')">删除</a>
                {{/if}}
            </td>
        </tr>
        {{/foreach}}
        <tr>
            <td colspan="4" class="tdl">
                <div>
                    <a class="addtr" onclick="addrow(this, 0, 0)" href="javascript:;">添加模型</a>
                </div>
            </td>
        </tr>
        <tr>
            <td class="tdl" colspan="4">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/module/', 'more')">提交</button>
            </td>
        </tr>
    </table>
</form>
{{include file="admin/footer.tpl"}}