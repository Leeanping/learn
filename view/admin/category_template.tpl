{{include file="admin/header.tpl"}}
<div class="floattop">
    <ul>
        <li class="btn"><span>分类模版管理</span></li>
        <li class="btn"><a href="/admin/category/tmpadd"><span>添加</span></a>
    </ul>
</div>
<form name="cpform" method="post" action="/admin/category/tmpmore" id="cpform" onsubmit="return $.checkForm(this)">
    <table class="tb tb2">
    	<tbody>
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl" width="120">顺序</th>
            <th width="120">分类</th>
            <th>图片</th>
            <th>可用</th>
            <th>操作</th>
        </tr>
        </tbody>
        {{foreach key=key item=tmp from=$templates}}
        <tbody>
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="delete[]" value="{{$tmp.id}}" />
            </td>
            <td class="tdl">
                <input type="hidden" class="txt" name="id[{{$tmp.id}}]" value="{{$tmp.id}}" size="2" />
                <input type="text" class="txt" name="sort[{{$tmp.id}}]" value="{{$tmp.sort}}" size="2" /></td>
            <td>
                {{$tmp.catname}}
            </td>
            <td>
                <img src="{{$tmp.avter}}" width="72" height="72" />
            </td>
            <td class="td25">
                <input type="checkbox" value="1" name="useable[{{$tmp.id}}]" class="checkbox" {{if $tmp.useable == '1'}}checked="checked"{{/if}}>
            </td>
            <td class="td25" align="center">
            	<a href="/admin/category/tmpedit/id/{{$tmp.id}}">编辑</a>
            </td>
        </tr>
        </tbody>
        {{/foreach}}
        <tbody>
        <tr>
        	<td>
            	<button name="chkall" id="chkall" class="btn" title="删除" type="button" onclick="checkAll(this.form, 'delete[]')">全选</button>
            </td>
            <td class="tdl">
            	<button id="submit" class="btn" type="submit">提交</button>
            </td>
            <td colspan="4"></td>
        </tr>
        </tbody>
    </table>
</form>
{{include file="admin/footer.tpl"}}