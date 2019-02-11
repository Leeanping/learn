{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
         <li class="btn current btn-info"><span>访问列表</span></li>
    </ul>
</div>
<form method="post" action="/admin/stats/more" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">IP</th>
            <th>来源</th>
            <th>进入</th>
            <th>浏览器</th>
            <th>系统</th>
            <th>访问时间</th>
        </tr>
        {{foreach from=$stats item=stat}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="delete[]" value="{{$stat.id}}" />
                <input type="hidden" name="id[{{$stat.id}}]" value="{{$stat.id}}" />
            </td>
            <td class="tdl">
            	{{$stat.ip}}
            </td>
            <td class="td25">
            	{{if $stat.refererdomain}}{{$stat.refererdomain}}{{$stat.refererpath}}{{else}}未知{{/if}}
            </td>
            <td class="td25">
            	{{$stat.accessurl}}
            </td>
            <td class="td25">
            	{{$stat.browser}}
            </td>
            <td class="td25">
            	{{$stat.system}}
            </td>
            <td class="td25">
            	{{$stat.accesstime|date_format:'%Y-%m-%d %H:%M'}}
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'delete[]')">全选</button></td>
            <td class="tdl">
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/stats/', 'delete')">删除</button>
            </td>
            <td colspan="5" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}