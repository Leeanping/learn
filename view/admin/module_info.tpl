{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/module/{{$_postName}}" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr class="noborder">
            <td class="first">描述(字段名称)</td>
        	<td class="vtop next" colspan="3">
                <input name="comment" value="" type="text" class="txt" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">字段(英文)</td>
        	<td class="vtop next" colspan="3">
                <input name="field" value="" type="text" class="txt" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">类型</td>
            <td class="vtop next" colspan="3">
                <select name="type">
                    <option value="">请选择类型</option>
                    <option value="int">int(10)</option>
                    <option value="tinyint">tinyint(4)</option>
                    <option value="varchar">varchar(255)</option>
                    <option value="char">char(100)</option>
                    <option value="text">text</option>
                    <option value="picture">picture</option>
                </select>
            </td>
        </tr>
    </table>
    <!-- <div class="btnfix"> -->
        <input type="hidden" name="action" value="{{$_postName}}" />
        <input type="hidden" name="kind" value="{{$kind}}" />
        <!-- <input type="submit" class="btn" name="submit" value="点击提交" /> -->
    <!-- </div> -->
</form>
{{include file='admin/footer.tpl'}}