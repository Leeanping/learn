{{include file="admin/header.tpl"}}
<div class="floattop">
    <ul>
        <li class="btn btn-info"><span>数据库恢复 <span style="color:red">(数据备份文件位于 网站路径/data 目录下, 请确保该目录外部不可见!)</span></li>
    </ul>
</div>
<div class="floattopempty"></div>
<form method="post" autocomplete="off" action="/admin/db/restore/del/1">
	<table class="tb">
		<tr class="header">
        	<th width="60">选择</th>
            <th class="tdl">文件名</th>
            <th>版本</th>
            <th>时间</th>
            <th>尺寸</th>
            <th>卷数</th>
            <th>操作</th>
        </tr>
		{{foreach name=files item=file key=i from=$files}}
        <tr class="hover">
            <td><input class="checkbox" type="checkbox" name="dir[]" value="{{$i}}"></td>
            <td class="tdl"><a href="javascript:void(0);" onclick="if($('#{{$i}}').css('display')=='none'){$('.sqlfile').hide();$('#{{$i}}').show();}else{$('#{{$i}}').hide();}">{{$i}}</a></td>
            <td>{{$file.ver}}</td>
            <td>{{$file.date}}</td>
            <td>{{$file.size}} KB</td>
            <td>{{$file.num}}</td>
            <td><a class="act" href="/admin/db/restore/d/{{$i}}" class="act">导入</a></td>
        </tr>
        <tbody id="{{$i}}" style="display:none" class="sqlfile">
        {{foreach name=f item=f key=k from=$file.files}}
        <tr class="hover">
            <td></td>
            <td class="tdl">{{$f.file}}</td>
            <td></td>
            <td>{{$f.date}}</td>
            <td>{{$f.size}} KB</td>
            <td>1</td>
            <td></td>
        </tr>
        {{/foreach}}
        </tbody>
		{{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'dir[]')">全选</button></td>
            <td class="tdl">
                <button id="submit" class="btn btn-danger" type="submit">删除</button>
            </td>
            <td colspan="5">
            </td>
        </tr>
	</table>
</form>
</div>
{{include file="admin/footer.tpl"}}