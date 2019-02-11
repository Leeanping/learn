{{include file="admin/header.tpl"}}
<script type="text/javascript">
var rowtypedata = [
		[[1, '', 'td25'], [1,'<input name="newname[]" value="" type="text" class="txt">', 'tdl'], [1, '<input name="newtag[]" value="" size="15" type="text" class="txt">', 'tdl'],[1,'<select name="newisslide" style="width: 100px"><option value="0">否</option><option value="1">是</option></select>'],[1, '']]
	];
</script>
<div class="floattop">
    <ul>
         <li class="btn btn-info" onclick="Controller.reload()"><span>广告列表</span></li>
         <li class="btn btn-info" onclick="Controller.controller('添加广告','admin/ad/add')"><span>添加广告</span></li>
         <li class="btn btn-info" onclick="Controller.main('{{$_pathroot}}admin/ad/type')"><span>广告分类</span></li>
    </ul>
</div>
<form method="post" action="/admin/ad/tmore" name="lpform" id="lpform">
    <table class="tb tb2">
    	<tbody>
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">名称</th>
            <th class="tdl">tagname</th>
            <th>是否轮播</th>
            <th>可用</th>
        </tr>
        </tbody>
        {{foreach item=type from=$types}}
        <tbody>
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="id[]" value="{{$type.id}}" />
            </td>
            <td class="tdl">
                <input type="text" class="txt" name="name[{{$type.id}}]" value="{{$type.name}}" ></td>
            <td class="tdl">
                <div>
                	<input type="text" class="txt" style="width:100px;" name="tag[{{$type.id}}]" value="{{$type.tag}}" size="20">
                </div>
            </td>
            <td class="td25">
                <select name="isslide[{{$type.id}}]" style="width: 100px">
                    <option value="0"{{if !$type.isslide}} selected{{/if}}>否</option>
                    <option value="1"{{if $type.isslide == 1}} selected{{/if}}>是</option>
                </select>
            </td>
            <td class="td25">
                <input type="checkbox" value="1" name="useable[{{$type.id}}]" class="checkbox" {{if $type.useable == '1'}}checked="checked"{{/if}}>
            </td>
        </tr>
        </tbody>
        {{/foreach}}
        <tbody>
        <tr>
            <td></td>
            <td colspan="8" class="tdl">
            	<div>
                    <a class="addtr" onclick="addrow(this, 0, 0)" href="javascript:;">添加分类</a>
                </div>
            </td>
        </tr>
        </tbody>
        <tbody>
        <tr>
        	<td>
            	<button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button>
            </td>
            <td class="tdl" colspan="2">
            	<button class="btn btn-success" type="submit" onclick="Controller.update('admin/ad/', 'tmore')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/ad/', 'tdelete')">删除</button>
            </td>
            <td colspan="6"></td>
        </tr>
        </tbody>
    </table>
</form>
{{include file="admin/footer.tpl"}}