{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
        <li class="btn"><a href="javascript:void(0);"><span>勋章管理</span></a></li>
    </ul>
</div>
<form method="post" action="/admin/medal/more" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">顺序</th>
            <th>可用</th>
            <th>名称</th>
            <th>描述</th>
            <th>勋章图片</th>
        </tr>
        {{foreach from=$medals item=medal}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="delete[]" value="{{$medal.id}}" />
                <input type="hidden" name="id[{{$medal.id}}]" value="{{$medal.id}}" />
            </td>
            <td class="tdl">
            	<input type="text" class="txt" size="5" name="sort[{{$medal.id}}]" value="{{$medal.sort}}" />
            </td>
            <td class="td25">
            	<input type="checkbox" name="useable[{{$medal.id}}]" value="1"{{if $medal.useable == 1}} checked="checked"{{/if}} />
            </td>
            <td class="td25">
            	<input type="text" class="txt" size="5" name="name[{{$medal.id}}]" value="{{$medal.name}}" />
            </td>
            <td class="td25">
            	<input type="text" class="txt" size="10" name="description[{{$medal.id}}]" value="{{$medal.description}}" />
            </td>
            <td class="td25">
            	<input type="text" class="txt" size="10" name="image[{{$medal.id}}]" value="{{$medal.image}}" /> <img src="/resource/images/medal/{{$medal.image}}" class="vmiddle" />
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn" title="删除" type="button" onclick="checkAll(this.form, 'delete[]')">全选</button></td>
            <td class="tdl">
                <button id="submit" class="btn" type="submit">提交</button>
            </td>
            <td colspan="4" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}