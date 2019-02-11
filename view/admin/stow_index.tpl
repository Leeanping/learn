{{include file='admin/header.tpl'}}
<script language="javascript">
function _onFormSubmit(){
	if($("#pform > input[name='title']").val() == '请输入查找内容') {
   		$("#pform > input[name='title']").val('');
	}
}
</script>
<div class="floattop">
    <ul>
        <li class="btn"><a href="javascript:void(0);"><span>收藏管理</span></a></li>
    </ul>
</div>
<div class="input-append">
    <form method="post" action="/admin/stow/index" id="pform">
        <input id="input_name" type="text" name="title" value="{{if $title}}{{$title}}{{else}}请输入查找内容{{/if}}" class="txt" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="submit" onclick="_onFormSubmit()"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="admin/stow/more" name="lpform" id="lpform">
	<table class="tb">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">收藏人</th>
            <th>收藏标题</th>
            <th>类型</th>
            <th>收藏时间</th>
            <th>是否显示</th>
        </tr>
        {{foreach from=$stows item=stow}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="delete[]" value="{{$stow.id}}" />
                <input type="hidden" name="id[{{$stow.id}}]" value="{{$stow.id}}" />
            </td>
            <td class="tdl">
            	{{$stow.realname}}
            </td>
            <td class="td25">
            	{{$stow.title}}
            </td>
            <td class="td25">
            	{{$stow.typename}}
            </td>
            <td class="td25">
            	{{$stow.addtime|date_format:'%Y-%m-%d %H:%M'}}
            </td>
            <td class="td25">
            	<input type="checkbox" name="useable[{{$stow.id}}]" value="1"{{if $stow.useable == 1}} checked="checked"{{/if}} />
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td>
                <button name="chkall" id="chkall" class="btn" title="删除" type="button" onclick="checkAll(this.form, 'delete[]')">全选</button>
            </td>
            <td class="tdl"><button id="submit" class="btn" type="button" onclick="vpcvPost('lpform')">提交</button></td>
            <td colspan="4" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}