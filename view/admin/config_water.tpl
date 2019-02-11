{{include file="admin/header.tpl"}}
<style type="text/css">
.radio-label{ border-top:1px solid #e4e2e2; border-left:1px solid #e4e2e2}
.radio-label td{ border-right:1px solid #e4e2e2; border-bottom:1px solid #e4e2e2;background:#f6f9fd; padding:4px 0 4px 8px; text-align:center;}
</style>
<div class="floattop">
    <ul>
        <li class="btn btn-info"><span>水印设置</span></li>
    </ul>
</div>
<form action="/admin/config/water" method="post" id="cpform" name="cpform">
    <table class="mtb">
    	<tr>
            <td class="td27" colspan="2">是否开启水印：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                {{TO->cfg key="enable" group="water" assign="_enable" default="0"}}
                <label><input type="radio" class="radio" name="config[water][enable]"{{if $_enable == 1}} checked="checked"{{/if}} value="1" />开启</label>
                <label><input type="radio" class="radio" name="config[water][enable]"{{if $_enable == 0}} checked="checked"{{/if}} value="0" />关闭</label>
            </td>
            <td class="vtop tips2">是否开启上传图片附加水印</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">水印类型：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                {{TO->cfg key="marktype" group="water" assign="_marktype" default="text"}}
                <label><input type="radio" class="radio" name="config[water][marktype]"{{if $_marktype == 'text'}} checked="checked"{{/if}} value="text" />文字</label>
                <label><input type="radio" class="radio" name="config[water][marktype]"{{if $_marktype == 'image'}} checked="checked"{{/if}} value="image" />图片</label>
            </td>
            <td class="vtop tips2">选择水印的类型,图片支持gif、png格式</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">水印图片：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input type="text" class="txt" value="{{TO->cfg key='markimg' group='water' default='resource/images/water.png'}}" name="config[water][markimg]" />
            </td>
            <td class="vtop tips2">选择水印类型为图片时水印图片地址</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">水印文字：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input type="text" class="txt" value="{{TO->cfg key='marktext' group='water' default='HST'}}" name="config[water][marktext]" />
            </td>
            <td class="vtop tips2">选择水印类型为文字时所填写的文字</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">水印文字大小：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input type="text" class="txt" value="{{TO->cfg key="fontsize" group="water" default="12"}}" name="config[water][fontsize]" />
            </td>
            <td class="vtop tips2">选择水印类型为文字时字体的大小</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">水印透明度：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input type="text" class="txt" value="{{TO->cfg key="diaphaneity" group="water" default="90"}}" name="config[water][diaphaneity]" /></td><td class="vtop tips2">水印透明度（0—100，值越小越透明）</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">水印位置：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform" colspan="2">
            	{{TO->cfg key="markpos" group="water" assign="_markpos" default="0"}}
            	<table width="100%" class="radio-label">
                	<tr>
                    	<td rowspan="3">
                        <input class="checkbox" name="config[water][markpos]" value="0" type="radio"{{if $_markpos == '0'}} checked="checked"{{/if}} />
                        <label>随机位置</label>
                        </td>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="1" type="radio"{{if $_markpos == '1'}} checked="checked"{{/if}} />
                        <label>顶部居左</label>
                        </td>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="2" type="radio"{{if $_markpos == '2'}} checked="checked"{{/if}} />
                        <label>顶部居中</label>
                        </td>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="3" type="radio"{{if $_markpos == '3'}} checked="checked"{{/if}} />
                        <label>顶部居右</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="4" type="radio"{{if $_markpos == '4'}} checked="checked"{{/if}} />
                        <label>左边居中</label>
                        </td>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="5" type="radio"{{if $_markpos == '5'}} checked="checked"{{/if}} />
                        <label>图片中心</label>
                        </td>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="6" type="radio"{{if $_markpos == '6'}} checked="checked"{{/if}} />
                        <label>右边居中</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="7" type="radio"{{if $_markpos == '7'}} checked="checked"{{/if}} />
                        <label>底部居左</label>
                        </td>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="8" type="radio"{{if $_markpos == '8'}} checked="checked"{{/if}} />
                        <label>底部居中</label>
                        </td>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="9" type="radio"{{if $_markpos == '9'}} checked="checked"{{/if}} />
                        <label>底部居右</label>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <div class="btnfix">
    	<input type="submit" name="editsubmit" value="提交" class="btn btn-success" tabindex="3" />
    </div>
</form>
{{include file="admin/footer.tpl"}}