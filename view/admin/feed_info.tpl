{{include file='admin/header.tpl'}}
<form name="cpform" method="post" action="/admin/feed/reply" id="cpform">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">评论标题</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	{{$feed.posttitle}}
            </td>
            <td class="vtop tips2"></td>
        </tr>
        <tr><td colspan="2" class="td27">评论时间</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	{{$feed.addtime|date_format:'%Y-%m-%d'}}
            </td>
            <td class="vtop tips2"></td>
        </tr>
        <tr><td colspan="2" class="td27">评论内容</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	<textarea  rows="6" name="content" cols="50">{{$feed.content}}</textarea>
            </td>
            <td class="vtop tips2"></td>
        </tr>
        <tr><td colspan="2" class="td27">回复</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	<textarea  rows="6" name="reply" cols="50">{{$feed.reply}}</textarea>
            </td>
            <td class="vtop tips2"></td>
        </tr>
    </table>
    <div class="btnfix">
    	<input type="hidden" name="action" value="edit" />
        <input type="hidden" name="id" value="{{$feed.id}}" />
        <input type="submit" class="btn" name="vpbtn" value="点击提交" />
    </div>
</form>
{{include file='admin/footer.tpl'}}