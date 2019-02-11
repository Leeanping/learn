{{include file="admin/header.tpl"}}
<div class="floattop">
    <ul>
        <li class="btn btn-info"><span>手机版设置</span></li>
    </ul>
</div>
<form action="/admin/config/wap" method="post" id="cpform" name="cpform">
    <table class="mtb">
        <tr>
            <td class="td27" colspan="2">开启手机 (WAP) 版：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
{{TO->cfg key="wap_on" group="wap" assign="_wap_on" default="1"}}
                <label><input type="radio" class="radio" name="config[wap][wap_on]"{{if $_wap_on == 1}} checked="checked"{{/if}} value="1" />开启</label>
                <label><input type="radio" class="radio" name="config[wap][wap_on]"{{if $_wap_on == 0}} checked="checked"{{/if}} value="0" />关闭</label>
            </td>
            <td class="vtop tips2">开启手机版，手机访问时，将跳转到手机版页面，该页面为手机版定制的页面，有利于手机访问</td>
        </tr>
    </table>
    <div class="btnfix">
    	<input type="submit" name="editsubmit" value="提交" class="btn btn-success" tabindex="3" />
    </div>
</form>
{{include file="admin/footer.tpl"}}