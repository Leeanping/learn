{{include file="admin/header.tpl"}}
<script type="text/javascript">
var rowtypedata = [
		[[1, '', 'td25'], [1, '', 'td25'], [1,'<input name="newsort[]" value="" size="2" type="text" class="txt">', 'tdl'], [1, '<input name="newcatname[]" value="" size="15" type="text" class="txt">', 'tdl'],[1,''],[3, '<input type="hidden" name="newpid[]" value="0" />']],
		[[1, '', 'td25'], [1, '', 'td25'], [1,'<input name="newsort[]" value="" size="2" type="text" class="txt">', 'tdl'], [1, '<div class=\"board\"><input name="newcatname[]" value="" size="15" type="text" class="txt"></div>', 'tdl'], [1,'',''], [3, '<input type="hidden" name="newpid[]" value="{1}" />']],
		[[1, '', 'td25'], [1, '', 'td25'], [1,'<input name="newsort[]" value="" size="2" type="text" class="txt">', 'tdl'], [1, '<div class=\"childboard\"><input name="newcatname[]" value="" size="15" type="text" class="txt"></div>', 'tdl'], [1,'',''], [3, '<input type="hidden" name="newpid[]" value="{1}" />']]
	];
</script>
<form method="post" action="/admin/category/index" name="lpform" id="lpform">
    <table class="tb tb2">
    	<tbody>
        <tr class="header">
            <th width="60">选择</th>
            <th width="60">ID</th>
            <th class="tdl">顺序</th>
            <th class="tdl">名称</th>
            <th>可用</th>
        </tr>
        </tbody>
        {{foreach key=key item=cat from=$categoryList}}
        <tbody>
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="id[]" value="{{$cat.id}}" />
            </td>
            <td class="td25">
                {{$cat.id}}
            </td>
            <td class="tdl">
                <input type="hidden" class="txt" name="pid[{{$cat.id}}]" value="{{$cat.pid}}" size="2" />
                <input type="text" class="txt" name="sort[{{$cat.id}}]" value="{{$cat.sort}}" size="2"  datatype="Require" msg="请填写序列号"></td>
            <td class="tdl">
                <div>
                	<input type="text" class="txt" name="catname[{{$cat.id}}]" value="{{$cat.catname}}" size="15" datatype="Require" msg="请填写分类名称">
                </div>
            </td>
            <td class="td25">
                <input type="checkbox" value="1" name="useable[{{$cat.id}}]" class="checkbox" {{if $cat.useable == '1'}}checked="checked"{{/if}}>
            </td>
        </tr>
        </tbody>
        <tbody id="child_{{$cat.id}}">
        	{{foreach from=$cat.son item=son}}
            <tr class="hover">
                <td class="td25">
                    <input class="checkbox" type="checkbox" name="id[]" value="{{$son.id}}" />
                </td>
                <td class="td25">
                    {{$son.id}}
                </td>
                <td class="tdl">
                    <input type="hidden" class="txt" name="pid[{{$son.id}}]" value="{{$son.pid}}" size="2" />
                    <input type="text" class="txt" name="sort[{{$son.id}}]" value="{{$son.sort}}" size="2"  datatype="Require" msg="请填写序列号"></td>
                <td class="tdl">
                    <div class="board">
                        <input type="text" class="txt" name="catname[{{$son.id}}]" value="{{$son.catname}}" size="15" datatype="Require" msg="请填写分类名称">
                        <a class="addchildboard" href="javascript:;" onclick="addrowdirect=1;addrow(this, 2, {{$son.id}})">添加下级分类</a>
                    </div>
                </td>
                <td class="td25">
                    <input type="checkbox" value="1" name="useable[{{$son.id}}]" class="checkbox" {{if $son.useable == '1'}}checked="checked"{{/if}}>
                </td>
            </tr>
            	{{foreach from=$son.son item=child}}
            	<tr class="hover">
                    <td class="td25">
                        <input class="checkbox" type="checkbox" name="id[]" value="{{$child.id}}" />
                    </td>
                    <td class="td25">
                        {{$child.id}}
                    </td>
                    <td class="tdl">
                        <input type="hidden" class="txt" name="pid[{{$child.id}}]" value="{{$child.pid}}" size="2" />
                        <input type="text" class="txt" name="sort[{{$child.id}}]" value="{{$child.sort}}" size="2"  datatype="Require" msg="请填写序列号"></td>
                    <td class="tdl">
                        <div class="childboard">
                            <input type="text" class="txt" name="catname[{{$child.id}}]" value="{{$child.catname}}" size="15" datatype="Require" msg="请填写分类名称">
                        </div>
                    </td>
                    <td class="td25">
                        <input type="checkbox" value="1" name="useable[{{$child.id}}]" class="checkbox" {{if $child.useable == '1'}}checked="checked"{{/if}}>
                    </td>
                </tr>
            	{{/foreach}}
            {{/foreach}}
        </tbody>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td colspan="8" class="tdl">
            	<div class="lastboard">
                    <a class="addtr" onclick="addrow(this, 1, {{$cat.id}})" href="javascript:;">添加二级分类</a>
                </div>
            </td>
        </tr>
        </tbody>
        {{/foreach}}
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td colspan="8" class="tdl">
            	<div>
                    <a class="addtr" onclick="addrow(this, 0, 0)" href="javascript:;">添加一级分类</a>
                </div>
            </td>
        </tr>
        </tbody>
        <tbody>
        <tr>
        	<td>
            	<button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button>
            </td>
            <td class="tdl" colspan="3">
            	<button class="btn btn-success" type="submit" onclick="Controller.update('admin/category/', 'more')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/category/', 'delete')">删除</button>
                <input type="hidden" name="item" value="{{$itemid}}" />
                <input type="hidden" name="kindid" value="{{$kindid}}" />
            </td>
            <td colspan="6"></td>
        </tr>
        </tbody>
    </table>
</form>
{{include file="admin/footer.tpl"}}