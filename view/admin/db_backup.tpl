{{include file="admin/header.tpl"}}
<div class="floattop">
    <ul>
        <li class="btn btn-info"><span>数据库备份 <span style="color:red">(数据备份文件位于 网站路径/data 目录下, 请确保该目录外部不可见!)</span></li>
    </ul>
</div>
<div class="floattopempty"></div>
<form method="post" autocomplete="off" action="/admin/db/backup/step/1">
	<table class="mtb">
		<tr><td colspan="2" class="td27">数据备份类型:</td></tr>
		<tr class="noborder">
    		<td class="vtop rowform">
                <ul class="nofloat" >
                    <li class="checked"><input class="radio" type="radio" name="type" value="ALL" checked onclick="$('#showtables').hide();">&nbsp;站点全部数据</li><li><input class="radio" type="radio" name="type" value="custom" onclick="$('#showtables').show();">&nbsp;自定义备份</li>
                </ul>
            </td>
    		<td class="vtop tips2"></td>
		</tr>
		<tbody id="showtables" style="display:none">
    	<tr>
        	<td><button name="chkall" id="chkall" class="btn" title="删除" type="button" onclick="checkAll(this.form, 't[]')">全选</button></td>
    	</tr>
    	<tr>
        	<td colspan="2">
                <ul class="dblist" >
                {{foreach name=tables item=tab key=i from=$tables}}
                    {{if $smarty.foreach.tables.index % 3 === 0  && $smarty.foreach.tables.index > 0}}
                </ul>
                <ul class="dblist">
                    {{/if}}
                    <li class="checked">
                        &nbsp;<input type="checkbox" name="t[]" value="{{$i}}" class="checkbox" checked="checked" /> {{$tab}}
                    </li>
                {{/foreach}}
                </ul>
        	</td>
    	</tr>
		</tbody>
		<tbody id="advanceoption" >
		<tr><td colspan="2" class="td27">分卷大小设置:</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
                 <input type="text" class="txt" size="40" name="fs" value="2048" />
            </td><td class="vtop tips2"></td>
        </tr>
        </tbody>
	</table>
    <div class="btnfix">
    	<input type="submit" name="editsubmit" value="提交" class="btn btn-success" tabindex="3" />
    </div>
</form>
</div>
{{include file="admin/footer.tpl"}}