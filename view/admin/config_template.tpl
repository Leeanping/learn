{{include file="admin/header.tpl"}}
<div class="floattop">
    <ul>
        <li class="btn btn-info"><span>模板设置</span></li>
    </ul>
</div>
<form action="/admin/config/template" method="post" id="cpform" name="cpform">
    <table class="mtb">
        <tr>
            <td class="td27" colspan="2">设置前台显示模板：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
				<input type="text" class="txt" value="{{TO->cfg key='template' group='template' default='default'}}" datatype="Require" msg="请填写模板" name="config[template][template]" />
            </td>
            <td class="vtop tips2">填写前台显示的模板,默认为default</td>
        </tr>
    </table>
    <div class="btnfix">
    	<input type="submit" name="editsubmit" value="提交" class="btn btn-success" tabindex="3" />
    </div>
</form>
{{include file="admin/footer.tpl"}}