{{include file='admin/header.tpl'}}
<script language="javascript">
function _onFormSubmit(){
	if($("#pform > input[name='mind']").val() == '请输入查找内容') {
   		$("#pform > input[name='mind']").val('');
	}
}
</script>
<div class="floattop">
    <ul>
        <li class="btn"><a href="javascript:void(0);"><span>心情管理</span></a></li>
    </ul>
</div>
<div class="input-append">
    <form method="post" action="/admin/mind/index" id="pform">
        <input id="input_name" type="text" name="mind" value="{{if $mind}}{{$mind}}{{else}}请输入查找内容{{/if}}" class="txt" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="submit" onclick="_onFormSubmit()"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/mind/more" name="lpform" id="lpform">
	<table class="tb">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">发布人</th>
            <th>心情</th>
            <th>发布时间</th>
            <th>是否显示</th>
        </tr>
        {{foreach from=$minds item=mind}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="delete[]" value="{{$mind.id}}" />
                <input type="hidden" name="id[{{$mind.id}}]" value="{{$mind.id}}" />
            </td>
            <td class="tdl">
            	{{$mind.realname}}
            </td>
            <td class="td25">
            	<img src="{{$mind.img}}" />{{$mind.mind}}
            </td>
            <td class="td25">
            	{{$mind.addtime|date_format:'%Y-%m-%d %H:%M'}}
            </td>
            <td class="td25">
            	<input type="checkbox" name="useable[{{$mind.id}}]" value="1"{{if $mind.useable == 1}} checked="checked"{{/if}} />
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td>
                <button name="chkall" id="chkall" class="btn" title="删除" type="button" onclick="checkAll(this.form, 'delete[]')">全选</button>
            </td>
            <td class="tdl"><button id="submit" class="btn" type="submit">提交</button></td>
            <td colspan="3" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}