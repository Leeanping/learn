{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul id="mtab">
        <li class="btn active btn-info" tab="general">基本信息</li>
    </ul>
</div>
<form name="cpform" method="post" action="/admin/link/{{$_postName}}" id="cpform" onsubmit="return $.checkForm(this)" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">网站名称</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="name" value="{{$link.name}}" type="text" class="txt" datatype="Require" msg="请填写标题" />
            </td>
            <td class="vtop tips2">网站名称<span info="name"></span></td>
        </tr>
        <tr><td colspan="2" class="td27">链接</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
            <input name="link" value="{{$link.link}}" type="text" class="txt" datatype="Require" msg="请填写链接" />
            </td>
            <td class="vtop tips2">请填写链接<span info="link"></span></td>
        </tr>
        <tr class="noborder">
        	<td class="vtop" colspan="2">
                <div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                        {{if $link.linkpic}}
                        <img width="120" height="90" src="{{$link.linkpic}}" />
                        {{/if}}
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" id="linkpic" name="linkpic" value="{{$link.linkpic}}">
                {{include file='admin/upload_single.tpl'}}
            </td>
        </tr>

        <tr><td colspan="2" class="td27">是否显示</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	<input type="radio" name="useable" value="1" {{if $link.useable == 1}}checked="checked"{{/if}} />显示
                <input type="radio" name="useable" value="0" {{if $link.useable == 0}}checked="checked"{{/if}} />不显示
            </td>
            <td class="vtop tips2"></td>
        </tr>
    </table>
    <div class="btnfix">
    	<input type="hidden" name="action" value="{{$_postName}}" />
        <input type="hidden" name="id" value="{{$link.id}}" />
        <input type="submit" class="btn btn-success" name="vpbtn" value="点击提交" />
    </div>
</form>
{{include file='admin/footer.tpl'}}