{{include file="admin/header.tpl"}}
<script type="text/javascript">
var rowtypedata = [
		[[1, '', 'td25'], [1, '<input name="newregionname[]" value="" size="15" type="text" class="txt"><input type="hidden" name="newpid[]" value="0" />', 'tdl']],
		[[1, '', 'td25'], [1, '<div class=\"board\"><input name="newregionname[]" value="" size="15" type="text" class="txt"></div><input type="hidden" name="newpid[]" value="{1}" />', 'tdl']]
	];
</script>
<div class="floattop">
    <ul>
        <li class="btn"><span>分类管理</span></li>
    </ul>
</div>
<form name="cpform" method="post" action="/admin/region/index" id="cpform" onsubmit="return $.checkForm(this)">
    <table class="tb tb2">
    	<tbody>
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">名称</th>
        </tr>
        </tbody>
        {{foreach key=key item=region from=$regionlist}}
        <tbody>
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="delete[]" value="{{$region.id}}" />
            </td>
            <td class="tdl">
            	<input type="hidden" class="txt" name="pid[{{$region.id}}]" value="{{$region.pid}}" size="2" />
                <input type="hidden" class="txt" name="id[{{$region.id}}]" value="{{$region.id}}" size="2" />
                <div>
                	<input type="text" class="txt" style="width:100px;" name="regionname[{{$region.id}}]" value="{{$region.regionname}}" size="20" />
                </div>
            </td>
        </tr>
        </tbody>
        <tbody>
        	{{foreach from=$region.son item=son}}
            <tr class="hover">
                <td class="td25">
                    <input class="checkbox" type="checkbox" name="delete[]" value="{{$son.id}}" />
                </td>
                <td class="tdl">
                	<input type="hidden" class="txt" name="pid[{{$son.id}}]" value="{{$son.pid}}" size="2" />
                    <input type="hidden" class="txt" name="id[{{$son.id}}]" value="{{$son.id}}" size="2" />
                    <div class="board">
                        <input type="text" class="txt" style="width:100px;" name="regionname[{{$son.id}}]" value="{{$son.regionname}}" size="20" />
                    </div>
                </td>
            </tr>
            {{/foreach}}
        </tbody>
        <tbody>
        <tr>
            <td></td>
            <td colspan="8" class="tdl">
            	<div class="lastboard">
                    <a class="addtr" onclick="addrow(this, 1, {{$region.id}})" href="javascript:;">添加街道</a>
                </div>
            </td>
        </tr>
        </tbody>
        {{/foreach}}
        <tbody>
        <tr>
            <td></td>
            <td colspan="8" class="tdl">
            	<div>
                    <a class="addtr" onclick="addrow(this, 0, 0)" href="javascript:;">添加区域</a>
                </div>
            </td>
        </tr>
        </tbody>
        <tbody>
        <tr>
        	<td>
            	<button name="chkall" id="chkall" class="btn" title="删除" type="button" onclick="checkAll(this.form, 'delete[]')">全选</button>
            </td>
            <td class="tdl">
            	<button id="submit" class="btn" type="submit">提交</button>
            </td>
            <td colspan="7"></td>
        </tr>
        </tbody>
    </table>
</form>
{{include file="admin/footer.tpl"}}