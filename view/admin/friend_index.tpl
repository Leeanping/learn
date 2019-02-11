{{include file='admin/header.tpl'}}
<script language="javascript">
function _onFormSubmit(){
	if($("#pform > input[name='content']").val() == '请输入关键词') {
   		$("#pform > input[name='content']").val('');
	}
}
</script>
<div class="floattop">
    <ul>
        <li class="btn"><a href="/admin/friend/index"><span>呼朋引伴与攒班管理</span></a></li>
    </ul>
</div>
<div class="input-append">
	<form method="post" action="/admin/friend/index" id="pform">
        <input type="text" name="content" id="content" value="{{if $content}}{{$content}}{{else}}请输入关键词{{/if}}" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="submit" onclick="_onFormSubmit()"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/friend/more" name="lpform" id="lpform">
    <table class="tb">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl" width="60">会员</th>
            <th>类型</th>
            <th>内容</th>
            <th>其他</th>
            <th>显示</th>
            <th>ip</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>
        {{foreach from=$friends item=friend}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="delete[]" value="{{$friend.id}}" />
                <input type="hidden" name="id[{{$friend.id}}]" value="{{$friend.id}}" />
            </td>
            <td class="tdl">
                {{$friend.realname}} / {{$friend.username}}
            </td>
            <td>
                {{if $friend.kind == 1}}呼朋引伴{{else}}攒班{{/if}}
            </td>
            <td>
                {{$friend.content}}
            </td>
            <td>
                {{$friend.msg}}
            </td>
            <td class="td25">
                {{if $friend.useable == 1}}显示{{else}}不显示{{/if}}
            </td>
            <td class="td25">
                {{$friend.ip}}
            </td>
            <td class="td25">
                {{$friend.addtime|date_format:'%Y-%m-%d'}}
            </td>
            <td class="td25">
                <a href="/admin/friend/edit/id/{{$friend.id}}">编辑</a>
            </td>
        </tr>
        {{/foreach}}
        <tr>
            <td>
                <button name="chkall" id="chkall" class="btn" title="删除" type="button" onclick="checkAll(this.form, 'delete[]')">全选</button>
            </td>
            <td class="tdl"><button id="submit" class="btn" type="submit">删除</button></td>
            <td colspan="7" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}