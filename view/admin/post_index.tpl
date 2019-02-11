{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
        <li class="btn btn-info" onclick="Controller.reload()">管理帖子</li>
    </ul>
</div>
<div class="input-append">
    <form method="post" action="/admin/forum/post" id="pform">
        <input id="input_name" type="text" placeholder="请输入标题" name="title" value="{{if $title}}{{$title}}{{/if}}" class="txt" onclick="this.value=''" size="15"/>
        <input id="input_name" type="text" placeholder="请输入内容" name="content" value="{{if $content}}{{$content}}{{/if}}" class="txt" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="button" onclick="Controller.search('admin/forum/post')"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/forum/pmore" name="lpform" id="lpform">
	<table class="tb">
        <tr class="header">
        	<th width="60">选择</th>
            <th class="tdl">标题</th>
            <th>版块名称</th>
            <th>发表人</th>
            <th>发表时间</th>
            <th>是否显示</th>
            <th>操作</th>
        </tr>
        {{foreach from=$posts item=post}}
        <tr class="hover">
        	<td class="td25">
            	{{if $post.isfirst != 1}}
                <input class="checkbox" type="checkbox" name="id[]" value="{{$post.id}}" />
                {{else}}
                <input type="hidden" name="id[]" value="{{$post.id}}" />
                {{/if}}
            </td>
            <td class="tdl">
            	{{if $post.title}}{{$post.title}}{{else}}无{{/if}}
            </td>
            <td class="td25">
            	{{$post.name.name}}
            </td>
            <td class="td25">
            	{{$post.username || $post.realname}}
            </td>
            <td class="td25">
            	{{$post.addtime|date_format:'%Y-%m-%d %H:%M:%S'}}
            </td>
            <td class="td25">
                <input type="checkbox" name="useable[{{$post.id}}]" value="1"{{if $post.useable == '1'}} checked="checked"{{/if}} />
            </td>
            <td class="td25">
            	<a href="javascript:;" onclick="Controller.controller('查看内容','admin/forum/getc/id/{{$post.id}}')">查看内容</a>
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl">
                 <button class="btn btn-success" type="submit" onclick="Controller.update('admin/forum/', 'pmore')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/forum/', 'pdelete')">删除</button>
            </td>
            <td colspan="5" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}