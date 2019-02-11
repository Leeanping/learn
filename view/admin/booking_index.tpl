{{include file='admin/header.tpl'}}
<script language="javascript">
function _onFormSubmit(){
	if($("#pform > input[name='teleohone']").val() == '请输入手机号') {
   		$("#pform > input[name='teleohone']").val('');
	}
}
</script>
<div class="floattop">
    <ul>
        <li class="btn"><a href="/admin/booking/index"><span>定制管理</span></a></li>
    </ul>
</div>
<div class="input-append">
	<form method="post" action="/admin/booking/index" id="pform">
        <input type="text" name="teleohone" id="teleohone" value="{{if $teleohone}}{{$teleohone}}{{else}}请输入手机号{{/if}}" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="submit" onclick="_onFormSubmit()"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/booking/more" name="lpform" id="lpform">
    <table class="tb">
        <tr class="header">
            <th>选择</th>
            <th class="tdl">类型</th>
            <th>目的地</th>
            <th>出发时间</th>
            <th>天数</th>
            <th>人数</th>
            <th>预算</th>
            <th>其他</th>
            <th>姓名</th>
            <th>电话</th>
            <th>公司名</th>
            <th>邮箱/QQ</th>
            <th>状态</th>
            <th>提交时间</th>
        </tr>
        {{foreach from=$bookings item=booking}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="id[]" value="{{$booking.id}}" />
            </td>
            <td class="tdl">
                {{if $booking.kind == 1}}玩乐{{/if}}
                {{if $booking.kind == 2}}徒步{{/if}}
                {{if $booking.kind == 3}}登山{{/if}}
                {{if $booking.kind == 4}}溯溪{{/if}}
                {{if $booking.kind == 5}}野营{{/if}}
                {{if $booking.kind == 6}}深度游{{/if}}
            </td>
            <td class="td25">
                {{$booking.destination}}
            </td>
            <td class="td25">
                {{$booking.starttime}}
            </td>
            <td class="td25">
                {{$booking.day}}
            </td>
            <td class="td25">
                {{$booking.people}}
            </td>
            <td class="td25">
                {{$booking.money}}
            </td>
            <td class="td25">
                {{$booking.content}}
            </td>
            <td class="td25">
                {{$booking.realname}}
            </td>
            <td class="td25">
                {{$booking.telephone}}
            </td>
            <td class="td25">
                {{$booking.company}}
            </td>
            <td class="td25">
                {{$booking.qq}}
            </td>
            <td class="td25">
                <select name="useable[{{$booking.id}}]" style="width:100px;">
                    <option value="0"{{if $booking.useable == 0}} selected{{/if}}>未确认</option>
                    <option value="1"{{if $booking.useable == 1}} selected{{/if}}>已确认</option>
                </select>
            </td>
            <td class="td25">
                {{$booking.addtime|date_format:'%Y-%m-%d'}}
            </td>
        </tr>
        {{/foreach}}
        <tr>
            <td>
                <button name="chkall" id="chkall" class="btn" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button>
            </td>
            <td class="tdl" colspan="2">
                <button class="btn" type="button" onclick="formController('admin/booking/', 'more')">修改</button>
                <button class="btn" type="button" onclick="formController('admin/booking/', 'delete')">删除</button>
            </td>
            <td colspan="11" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}