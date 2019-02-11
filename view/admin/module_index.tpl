{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
         <li class="btn"><a onclick="Controller.controller('添加字段','admin/module/add/kind/{{$kind}}')" href="javascript:void(0);"><span>添加字段</span></a></li>
    </ul>
</div>
<table class="tb tb2" id="sTable">
    <tr class="header">
        <th>字段</th>
        <th>类型</th>
        <th>描述</th>
        <th>操作</th>
    </tr>
    {{foreach from=$columns item=column}}
    <tr class="hover">
        <td class="td25">
            {{$column.field}}
        </td>
        <td class="td25">
        	{{$column.type}}
        </td>
        <td class="td25">
        	{{$column.comment}}
        </td>
        <td class="td25">
            {{if $column.field != 'id' && $column.field != 'aid'}}
            <a href="javascript:;" onclick="Controller.deleteOne('admin/module/delete/kind/{{$kind}}/field/{{$column.field}}')">删除</a>
            {{/if}}
        </td>
    </tr>
    {{/foreach}}
</table>
{{include file='admin/footer.tpl'}}