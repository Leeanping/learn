{{include file="admin/header.tpl"}}
<form action="/admin/config/add" method="post" id="scpform" name="scpform">
    <table class="mtb">
        <tr class="noborder">
            <td class="first">变量名</td>
            <td class="vtop next" colspan="3">
				<input type="text" class="txt" value="" name="cfgname" />
                填写变量名，默认会加上 "{{$group}}_add_" 前缀，请勿重复
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">变量值</td>
            <td class="vtop next" colspan="3">
                <input type="text" class="txt" value="" name="config" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">标题</td>
            <td class="vtop next" colspan="3">
				<input type="text" class="txt" value="" name="title" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">提示信息</td>
            <td class="vtop next" colspan="3">
                <input type="text" class="txt" value="" name="tips" />
            </td>
        </tr>
    </table>
    <!-- <div class="btnfix"> -->
        <input type="hidden" name="action" value="add" />
        <input type="hidden" name="group" value="{{$group}}" />
    <!-- </div> -->
</form>
{{include file="admin/footer.tpl"}}