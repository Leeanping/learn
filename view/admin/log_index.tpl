{{include file='admin/header.tpl'}}
<script language="javascript">
function _onFormSubmit(){
	if($("#pform > input[name='username']").val() == '用户名筛选') {
   		$("#pform > input[name='username']").val('');
	}
}
</script>
<div class="floattop">
    <ul>
        <li class="btn"><a href="/admin/log/index"><span>会员记录管理</span></a></li>
    </ul>
</div>
<div class="input-append">
	<form method="post" action="/admin/log/index" id="pform">
        <input type="text" name="username" id="username" value="{{if $username}}{{$username}}{{else}}用户名筛选{{/if}}" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="submit" onclick="_onFormSubmit()"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/log/more" name="lpform" id="lpform">
    <table class="tb">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl">会员</th>
            <th>类型</th>
            <th>记录</th>
            <th>IP</th>
            <th>记录时间</th>
        </tr>
        {{foreach from=$logs item=log}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="delete[]" value="{{$log.id}}" />
                <input type="hidden" name="id[{{$log.id}}]" value="{{$log.id}}" />
            </td>
            <td class="tdl">
                {{$log.username}}
            </td>
            <td class="td25">
                {{$log.type}}
            </td>
            <td class="td25">
                {{$log.loginfo}}
            </td>
            <td class="td25">
                {{$log.logip}}
            </td>
            <td class="td25">
                {{$log.logtime|date_format:'%Y-%m-%d'}}
            </td>
        </tr>
        {{/foreach}}
        <tr>
            <td>
                <button name="chkall" id="chkall" class="btn" title="删除" type="button" onclick="checkAll(this.form, 'delete[]')">全选</button>
            </td>
            <td class="tdl"><button id="submit" class="btn" type="submit">删除</button></td>
            <td colspan="6" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}