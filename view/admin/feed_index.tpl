{{include file='admin/header.tpl'}}
<script language="javascript">
function _onFormSubmit(){
	if($("#pform > input[name='content']").val() == '请输入查找内容') {
   		$("#pform > input[name='content']").val('');
	}
}
</script>
<div class="floattop">
    <ul>
        <li class="btn"><a href="javascript:void(0);"><span>评论管理</span></a></li>
    </ul>
</div>
<div class="input-append">
    <form method="post" action="/admin/feed/index" id="pform">
        <input id="input_name" type="text" name="content" value="{{if $content}}{{$content}}{{else}}请输入查找内容{{/if}}" class="txt" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="submit" onclick="_onFormSubmit()"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/feed/more" name="lpform" id="lpform">
	<table class="tb">
        <tr class="header">
            <th>选择</th>
            <th class="tdl">评论人</th>
            <th>评论标题</th>
            <th>类型</th>
            <th>内容</th>
            <th>评论时间</th>
            <th>状态</th>
            <th>是否显示</th>
        </tr>
        {{foreach from=$feeds item=feed}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="delete[]" value="{{$feed.id}}" />
                <input type="hidden" name="id[{{$feed.id}}]" value="{{$feed.id}}" />
            </td>
            <td class="tdl">
            	{{$feed.username}}
            </td>
            <td class="td25">
            	{{$feed.posttitle}}
            </td>
            <td class="td25">
            	{{if $feed.type == 'course'}}课程{{/if}}
                {{if $feed.type == 'event'}}活动{{/if}}
                {{if $feed.type == 'organ'}}机构{{/if}}
                {{if $feed.type == 'active'}}动态{{/if}}
            </td>
            <td class="td25">
            	{{$feed.content}}
            </td>
            <td class="td25">
            	{{$feed.addtime|date_format:'%Y-%m-%d %H:%M'}}
            </td>
            <td class="td25">
            	{{if $feed.status == 1}}已审核{{else}}未审核{{/if}}
            </td>
            <td class="td25">
            	<input type="checkbox" name="status[{{$feed.id}}]" value="1"{{if $feed.status == 1}} checked="checked"{{/if}} />
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td>
                <button name="chkall" id="chkall" class="btn" title="删除" type="button" onclick="checkAll(this.form, 'delete[]')">全选</button>
            </td>
            <td class="tdl"><button id="submit" class="btn" type="submit">提交</button></td>
            <td colspan="6" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}