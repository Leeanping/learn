{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/friend/{{$_postName}}" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">会员</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            {{$friend.realname}} / {{$friend.username}}
            </td>
            <td class="vtop tips2"></td>
        </tr>
        <tr><td colspan="2" class="td27">类型</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            {{if $friend.kind == 1}}呼朋引伴{{else}}攒班{{/if}}
            </td>
            <td class="vtop tips2"></td>
        </tr>
        <tr><td colspan="2" class="td27">是否显示</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	<input type="radio" name="useable" value="1" {{if $friend.useable == 1}}checked="checked"{{/if}} />显示
                <input type="radio" name="useable" value="0" {{if $friend.useable == 0}}checked="checked"{{/if}} />不显示
            </td>
            <td class="vtop tips2">是否显示</td>
        </tr>
        <tr><td colspan="2" class="td27">内容</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform" colspan="2">
            <textarea cols="50" rows="6" name="content">{{$friend.content}}</textarea>
            </td>
        </tr>
        <tr><td colspan="2" class="td27">其他</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform" colspan="2">
            <textarea cols="50" rows="6" name="msg">{{$friend.msg}}</textarea>
            </td>
        </tr>
        
    </table>
    <div class="btnfix">
        <input type="hidden" name="action" value="{{$_postName}}" />
        <input type="hidden" name="id" value="{{$friend.id}}" />
        <input type="submit" class="btn" name="submit" value="点击提交" />
    </div>
</form>
{{include file='admin/footer.tpl'}}