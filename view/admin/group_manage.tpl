{{include file="admin/header.tpl"}}
<script type="text/javascript" src="/resource/admin/js/jscolor/jscolor.js"></script>
<script type="text/JavaScript">
var rowtypedata = [
	[
		[1, '', 'td25'],
		[1, '<input type="text" class="txt" name="newtitle[]" size="5" />', 'tdl'],
		[1, '', 'td25'],
		[1, '', 'td25'],
		[1, '<input type="text" name="newmin[]" class="txt" size="5" /> ~ <input type="text" name="newmax[]" class="txt" size="5" />', 'td25'],
		[1, '<input type="text" class="txt" name="newstarnum[]" size="5" />', 'td25'],
		[1, '', 'td24'],
		[1, '', 'td25']
	]
];
</script>
<div class="floattop">
    <ul>
        <li class="btn"><a href="javascript:void(0);"><span>组管理</span></a></li>
    </ul>
</div>
<form id="lpform" name="lpform" method="post" action="/admin/group/manage">
    <input type="hidden" name="action" value="manage" />
    <table class="tb tb2 fixpadding">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">名称</th>
            <th>类型</th>
            <th>成员数</th>
            <th>积分区间(管理组不需要填写)</th>
            <th>星星数</th>
            <th>头衔颜色</th>
            <th>&nbsp;</th>
        </tr>
        {{foreach from=$usergroups key=gid item=group}}
            <tr class="hover">
                <td class="td25">{{if $group.kind == '1'}}<input type="checkbox" name="deleteids[]" value="{{$gid}}" />{{/if}}</td>
                <td class="tdl">
                    <input type="text" name="titlenew[{{$gid}}]" value="{{$group.title}}" size="5"{{if $group.type == 0}} readonly{{/if}} />
                </td>
                <td class="td25">{{if $group.kind == '1'}}自定义{{else}}内置{{/if}}</td>
                <td><a href="{{$group.url}}">{{$group.usernum}}</a></td>
                <td class="td25">
                	{{if $type == 1}}
                    <input type="text" name="min[{{$gid}}]" value="{{$group.min}}" size="5" />
                    ~
                    <input type="text" name="max[{{$gid}}]" value="{{$group.max}}" size="5" />
                    {{/if}}
                </td>
                <td class="td25">
                    <input type="text" name="starnum[{{$gid}}]" value="{{$group.starnum}}" size="5" />
                </td>
                <td class="td24">
                    <input type="text" name="color[{{$gid}}]" value="{{$group.color}}" class="txt color {required:false}" />
                </td>
                <td><!--{{if $gid == 1}}编辑{{elseif $group.type == 0}}<a href="/admin/group/access/gid/{{$gid}}">编辑</a>{{else}}{{/if}}--></td>
            </tr>
        {{/foreach}}
        {{if $type == 1}}
        <tr>
            <td></td>
            <td colspan="7" class="tdl">
            	<div>
                    <a class="addtr" onclick="addrow(this, 0, 0)" href="javascript:;">添加分组</a>
                </div>
            </td>
        </tr>
        {{/if}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn" title="删除" type="button" onclick="checkAll(this.form, 'deleteids[]')">全选</button></td>
            <td class="tdl">
            	<input type="hidden" name="type" value="{{$type}}" />
                <button id="submit" class="btn" type="submit">确定</button>
            </td>
            <td colspan="6">
                
            </td>
        </tr>
    </table>
</form>
</div>
{{include file="admin/footer.tpl"}}