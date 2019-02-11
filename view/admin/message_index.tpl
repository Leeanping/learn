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
        <li class="btn"><a href="javascript:void(0);"><span>消息管理</span></a></li>
        <li class="btn"><a href="javascript:void(0);" onclick="vpcvAction('发消息', 'admin/message/send')"><span>发送消息</span></a></li>
    </ul>
</div>
<div class="input-append">
    <form method="post" action="/admin/stow/index" id="pform">
        <input id="input_name" type="text" name="title" value="{{if $title}}{{$title}}{{else}}请输入查找内容{{/if}}" class="txt" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="submit" onclick="_onFormSubmit()"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/message/more" name="lpform" id="lpform">
	<table class="tb">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">发送人</th>
            <th>消息标题</th>
            <th>内容</th>
            <th>发送时间</th>
            <th>是否显示</th>
        </tr>
        {{foreach from=$messages item=message}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="delete[]" value="{{$message.id}}" />
                <input type="hidden" name="id[{{$message.id}}]" value="{{$message.id}}" />
            </td>
            <td class="tdl">
            	{{if $message.realname}}{{$message.realname}}{{else}}无{{/if}}
            </td>
            <td class="td25">
            	{{if $message.title}}{{$message.title}}{{else}}<b style="color:#ff0000;">意见反馈</b>{{/if}}
            </td>
            <td class="td25">
            	{{$message.message}}
            </td>
            <td class="td25">
            	{{$message.sendtime|date_format:'%Y-%m-%d %H:%M'}}
            </td>
            <td class="td25">
            	<input type="checkbox" name="useable[{{$message.id}}]" value="1"{{if $message.useable == 1}} checked="checked"{{/if}} />
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td>
                <button name="chkall" id="chkall" class="btn" title="删除" type="button" onclick="checkAll(this.form, 'delete[]')">全选</button>
            </td>
            <td class="tdl"><button id="submit" class="btn" type="submit">提交</button></td>
            <td colspan="4" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}