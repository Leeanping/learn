{{include file="admin/header.tpl"}}
<script type="text/javascript">
	var rowtypedata = [
		[[1,'<input name="newsort[]" value="" size="2" type="text" class="txt">', 'td25'], [1, '<div><input name="newname[]" value="" type="text" size="10"> <a class="deleterow" onclick="deleterow(this)" href="javascript:;">删除</a></div>', 'tdl'],[1,''],[5, '<input type="hidden" name="newpid[]" value="0" /><input type="hidden" name="newtype[]" value="group" />']],
		[[1,'<input name="newsort[]" value="" size="2" type="text" class="txt">', 'td25'], [1, '<div class=\"board\"><input name="newname[]" value="" type="text" size="10"> <a class="deleterow" href="javascript:;" onclick="deleterow(this)">删除</a></div>', 'tdl'], [1,'',''], [5, '<input type="hidden" name="newpid[]" value="{1}" /><input type="hidden" name="newtype[]" value="forum" />']]
];
</script>
<div class="floattop">
    <div class="itemtitle">
        <h3>版块管理</h3>
    </div>
</div>
<form method="post" action="/admin/forum/more" id="lpform" name="lpform">
    <table class="tb tb2" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
        <tr class="header">
            <th width="60">顺序</th>
            <th class="tdl">名称</th>
            <th>可用</th>
            <th>精选</th>
            <th>允许浏览</th>
            <th>允许发帖</th>
            <th>允许回复</th>
            <th>操作</th>
        </tr>
        </tbody>
        {{foreach key=key item=forum from=$forums}}
        <tbody>
        <tr class="hover">
            <td>
                <input type="hidden" name="pid[{{$forum.id}}]" value="{{$forum.pid}}" />
                <input type="hidden" name="fid[{{$forum.id}}]" value="{{$forum.id}}"  />
                <input type="text" class="txt" name="sort[{{$forum.id}}]" value="{{$forum.sort}}" size="2" /></td>
            <td class="tdl">
                <div>
                    <input type="text" size="10" name="name[{{$forum.id}}]" value="{{$forum.name}}" datatype="Require" msg="请填写名称"{{if $forum.id == '7'}} readonly{{/if}}>
                    <a class="addchildboard" href="javascript:;" onclick="addrowdirect=1;addrow(this, 1, {{$forum.id}})">添加版块</a>
                </div>
            </td>
            <td class="td25">
                <input type="checkbox" value="1" name="status[{{$forum.id}}]" class="checkbox" {{if $forum.status == '1'}}checked="checked"{{/if}}>
            </td>
            <td class="td25">
                {{if $forum.pid != '0'}}
                <input type="checkbox" value="1" name="allowview[{{$forum.id}}]" class="checkbox" {{if $forum.allowview == '1'}}checked="checked"{{/if}}>
                {{/if}}
            </td>
            <td class="td25">
                {{if $forum.pid != '0'}}
                <input type="checkbox" value="1" name="allowpost[{{$forum.id}}]" class="checkbox" {{if $forum.allowpost == '1'}}checked="checked"{{/if}}>
                {{/if}}
            </td>
            <td class="td25">
                {{if $forum.pid != '0'}}
                <input type="checkbox" value="1" name="allowreply[{{$forum.id}}]" class="checkbox" {{if $forum.allowreply == '1'}}checked="checked"{{/if}}>
                {{/if}}
            </td>
            <td class="td25"></td>
            <td class="td25">
                <a href="javascript:void(0);" onclick="Controller.controller('编辑板块', 'admin/forum/edit/fid/{{$forum.id}}')">编辑</a>
                <a href="javascript:void(0);" onclick="Controller.deleteOne('admin/forum/del/fid/{{$forum.id}}')">删除版块</a>
            </td>
        </tr>
        </tbody>
        <tbody id="child_{{$forum.id}}">
            {{foreach from=$forum.son item=child}}
            <tr class="hover">
                <td class="td25">
                    <input type="hidden" name="pid[{{$child.id}}]" value="{{$child.pid}}" />
                    <input type="hidden" name="fid[{{$child.id}}]" value="{{$child.id}}"  />
                    <input type="text" class="txt" name="sort[{{$child.id}}]" value="{{$child.sort}}" size="2" /></td>
                <td class="tdl">
                    <div class="board">
                        <input type="text" size="10" name="name[{{$child.id}}]" value="{{$child.name}}" datatype="Require" msg="请填写名称">
                    </div>
                </td>
                <td class="td25">
                    <input type="checkbox" value="1" name="status[{{$child.id}}]" class="checkbox" {{if $child.status == '1'}}checked="checked"{{/if}}>
                </td>
                <td class="td25">
                    <input type="checkbox" value="1" name="isbest[{{$child.id}}]" class="checkbox" {{if $child.isbest == '1'}}checked="checked"{{/if}}>
                </td>
                <td class="td25">
                    <input type="checkbox" value="1" name="allowview[{{$child.id}}]" class="checkbox" {{if $child.allowview == '1'}}checked="checked"{{/if}}>
                </td>
                <td class="td25">
                    <input type="checkbox" value="1" name="allowpost[{{$child.id}}]" class="checkbox" {{if $child.allowpost == '1'}}checked="checked"{{/if}}>
                </td>
                <td class="td25">
                    <input type="checkbox" value="1" name="allowreply[{{$child.id}}]" class="checkbox" {{if $child.allowreply == '1'}}checked="checked"{{/if}}>
                </td>
                <td class="td25">
                	<a href="javascript:void(0);" onclick="Controller.controller('编辑板块', 'admin/forum/edit/fid/{{$child.id}}')">编辑</a>
                    <a href="javascript:void(0);" onclick="Controller.deleteOne('admin/forum/del/fid/{{$child.id}}')">删除版块</a>
                </td>
            </tr>
            {{/foreach}}
        </tbody>
        {{/foreach}}
        <tbody>
        <tr>
            <td class="td25"></td>
            <td colspan="7" class="tdl">
                <div>
                    <a class="addtr" onclick="addrow(this, 0, 0)" href="javascript:;">添加新分区</a>
                </div>
            </td>
        </tr>
        <tr>
            <td class="td25"><button class="btn btn-success" type="submit" onclick="Controller.update('admin/forum/', 'more')">修改</button></td>
            <td colspan="7" class="tdl">
            	
            </td>
        </tr>
        </tbody>
    </table>
</form>
{{include file="admin/footer.tpl"}}