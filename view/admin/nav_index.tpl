{{include file="admin/header.tpl"}}
<script type="text/javascript">
var rowtypedata = [
	[
		[1, '', 'td25'], 
        [1, '', 'td25'], 
		[1,'<input name="newdisplayorder[]" value="" size="2" type="text" class="txt" />', 'tdl'], 
		[1, '<input name="newname[]" value="" style="width:100px;" type="text" class="txt" datatype="Require" msg="请填写名称">', 'tdl'],
		[1, '<input type="hidden" name="newparentid[]" value="0" />', 'td25'],
		[1, '<input type="text" class="txt" name="newperpage[]" value="0" size="2" />', 'td25'],
		[1, '', 'td25'],
		[2, '', 'td25']
	],
	[
		[1, '', 'td25'], 
        [1, '', 'td25'], 
		[1,'<input name="newdisplayorder[]" value="" size="2" type="text" class="txt" />', 'tdl'], 
		[1, '<div class="board"><input name="newname[]" style="width:100px;" type="text" class="txt" datatype="Require" msg="请填写名称"></div>', 'tdl'], 
		[1, '<input type="hidden" name="newparentid[]" value="{1}" />', 'td25'],
		[1, '<input type="text" class="txt" name="newperpage[]" value="0" size="2" />', 'td25'],
		[1, '', 'td25'],
		[2, '', 'td25']
	],
    [
        [1, '', 'td25'], 
        [1, '', 'td25'],
        [1,'<input name="newdisplayorder[]" value="" size="2" type="text" class="txt" />', 'tdl'], 
        [1, '<div class="childboard"><input name="newname[]" style="width:100px;" type="text" class="txt" datatype="Require" msg="请填写名称"></div>', 'tdl'], 
        [1, '<input type="hidden" name="newparentid[]" value="{1}" />', 'td25'],
        [1, '<input type="text" class="txt" name="newperpage[]" value="0" size="2" />', 'td25'],
        [1, '', 'td25'],
        [2, '', 'td25']
    ]
];
</script>
<div class="floattop">
    <ul>
         {{foreach key="key" item="_nav" from=$nav_type}}
        <li class="btn btn-info{{if $type == $key}} current{{/if}}" onclick="Controller.main('{{$_pathroot}}admin/nav/index/type/{{$key}}')">{{$_nav}}</a></li>
        {{/foreach}}
    </ul>
</div>
<form name="cpform" method="post" action="/admin/nav/index" name="lpform" id="lpform" onsubmit="return $.checkForm(this)">
    <input type="hidden" name="type" value="{{$type}}" />
    <table class="tb tb2">
        <tr class="header">
            <th width="60">选择</th>
            <th width="60">ID</th>
            <th class="tdl">顺序</th>
            <th class="tdl">名称</th>
            <th>目录/链接</th>
            <th>列表显示数量</th>
            <th>新窗口</th>
            <th>可用</th>
            <th>操作</th>
        </tr>
        {{foreach key=key item=nav from=$navs}}
        <tbody>
        <tr class="hover">
            <td class="td25"><input class="checkbox" type="checkbox" name="id[]" value="{{$nav.id}}" ></td>
            <td class="td25">
                {{$nav.id}}
            </td>
            <td class="tdl">
                <input type="hidden" class="txt" name="parentid[{{$nav.id}}]" value="{{$nav.parentid}}" size="2" />
                <input type="text" class="txt" name="displayorder[{{$nav.id}}]" value="{{$nav.displayorder}}" size="2"  datatype="Require" msg="请填写序列号"></td>
            <td class="tdl">
                {{$nav.name}}
            </td>
            <td class="td25">
                {{$nav.pinyin}}
            </td>
            <td class="td25">
                <input type="text" class="txt" name="perpage[{{$nav.id}}]" value="{{$nav.perpage}}" size="2" />
            </td>
            <td class="td25">
                <input type="checkbox" value="1" name="newwindow[{{$nav.id}}]" class="checkbox" {{if $nav.newwindow == '1'}}checked="checked"{{/if}}>
            </td>
            <td class="td25">
                <input type="checkbox" value="1" name="useable[{{$nav.id}}]" class="checkbox" {{if $nav.useable == '1'}}checked="checked"{{/if}}>
            </td>
            <td class="td25">
                <a href="javascript:void(0);" onclick="Controller.controller('修改导航-{{$nav.name}}', 'admin/nav/edit/id/{{$nav.id}}')">编辑</a>
            </td>
        </tr>
        </tbody>
        <tbody id="child_{{$nav.id}}">
        	{{foreach from=$nav.son item=son}}
            <tr class="hover">
                <td class="td25">
                    <input class="checkbox" type="checkbox" name="id[]" value="{{$son.id}}" />
                </td>
                <td class="td25">
                    {{$son.id}}
                </td>
                <td class="tdl">
                    <input type="hidden" class="txt" name="parentid[{{$son.id}}]" value="{{$son.parentid}}" size="2" />
                    <input type="text" class="txt" name="displayorder[{{$son.id}}]" value="{{$son.displayorder}}" size="2"  datatype="Require" msg="请填写序列号"></td>
                <td class="tdl">
                    <div class="board">
                        {{$son.name}}
                        <a class="addchildboard" href="javascript:;" onclick="addrowdirect=1;addrow(this, 2, {{$son.id}})">添加下级分类</a>
                    </div>
                </td>
                <td class="td25">
                    {{$son.pinyin}}
                </td>
                <td class="td25">
                    <input type="text" class="txt" name="perpage[{{$son.id}}]" value="{{$son.perpage}}" size="2" />
                </td>
                <td class="td25">
                    <input type="checkbox" value="1" name="newwindow[{{$son.id}}]" class="checkbox" {{if $son.newwindow == '1'}}checked="checked"{{/if}}>
                </td>
                <td class="td25">
                    <input type="checkbox" value="1" name="useable[{{$son.id}}]" class="checkbox" {{if $son.useable == '1'}}checked="checked"{{/if}}>
                </td>
                <td class="td25">
                    <a href="javascript:void(0);" onclick="Controller.controller('修改导航-{{$son.name}}', 'admin/nav/edit/id/{{$son.id}}')">编辑</a>
                </td>
            </tr>
            {{vplist from='channel' item='childer' parentid='$son.id'}}
                <tr class="hover">
                    <td class="td25">
                        <input class="checkbox" type="checkbox" name="id[]" value="{{$childer.id}}" />
                    </td>
                    <td class="td25">
                        {{$childer.id}}
                    </td>
                    <td class="tdl">
                        <input type="hidden" class="txt" name="parentid[{{$childer.id}}]" value="{{$childer.parentid}}" size="2" />
                        <input type="text" class="txt" name="displayorder[{{$childer.id}}]" value="{{$childer.displayorder}}" size="2"  datatype="Require" msg="请填写序列号"></td>
                    <td class="tdl">
                        <div class="childboard">
                            {{$childer.name}}
                        </div>
                    </td>
                    <td class="td25">
                        {{$childer.pinyin}}
                    </td>
                    <td class="td25">
                        <input type="text" class="txt" name="perpage[{{$childer.id}}]" value="{{$childer.perpage}}" size="2" />
                    </td>
                    <td class="td25">
                        <input type="checkbox" value="1" name="newwindow[{{$childer.id}}]" class="checkbox" {{if $childer.newwindow == '1'}}checked="checked"{{/if}}>
                    </td>
                    <td class="td25">
                        <input type="checkbox" value="1" name="useable[{{$childer.id}}]" class="checkbox" {{if $childer.useable == '1'}}checked="checked"{{/if}}>
                    </td>
                    <td class="td25">
                        <a href="javascript:void(0);" onclick="Controller.controller('修改导航-{{$childer.name}}', 'admin/nav/edit/id/{{$childer.id}}')">编辑</a>
                    </td>
                </tr>
            {{/vplist}}
            {{/foreach}}
        </tbody>
        <tbody>
        <tr>
            <td colspan="2"></td>
            <td colspan="8" class="tdl">
            	<div class="lastboard">
                    <a class="addtr" onclick="addrow(this, 1, {{$nav.id}})" href="javascript:;">添加二级分类</a>
                </div>
            </td>
        </tr>
        </tbody>
        {{/foreach}}
        <tr>
            <td></td>
            <td colspan="8" class="tdl"><div>
                    <a class="addtr" onclick="addrow(this, 0, 0)" href="javascript:;">添加</a>
                </div></td>
        </tr>
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/nav/', 'more')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/nav/', 'delete')">删除</button>
            </td>
            <td class="td25" colspan="6">
            </td>
        </tr>
    </table>
</form>
{{include file="admin/footer.tpl"}}