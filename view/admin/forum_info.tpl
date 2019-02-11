{{include file="admin/header.tpl"}}
<div class="floattop">
    <ul id="mtab">
        <li class="btn btn-info" tab="general">版块信息</li>
    </ul>
</div>
<form name="cpform" method="post" action="/admin/forum/edit" id="cpform" enctype="multipart/form-data">
    <table class="mtb">
        <tr><td colspan="2" class="td27">板块名称</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
                {{$forum.name}}
            </td>
            <td class="vtop tips2">若为空将展示默认模板</td>
        </tr>
    	<tr><td colspan="2" class="td27">自定义模板</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="sort" value="{{$forum.template}}" type="text" class="txt" />
            </td>
            <td class="vtop tips2">若为空将展示默认模板</td>
        </tr>
        <tr><td colspan="2" class="td27">板块图标</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                        {{if $forum.forumpic}}
                        <img width="120" height="90" src="{{$forum.forumpic}}" />
                        {{/if}}
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" id="forumpic" name="forumpic" value="{{$forum.forumpic}}">
                {{include file='admin/upload_single.tpl'}}
            </td>
            <td class="vtop tips2">板块的小图标</td>
        </tr>
        <tr><td colspan="2" class="td27">版块介绍</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform" colspan="2">
            {{$forumsummary}}
            </td>
        </tr>
        <tr><td colspan="15">
        <div class="btnfix">
        <input type="hidden" name="action" value="edit" />
        <input type="hidden" name="fid" value="{{$forum.id}}" />
        <input type="submit" class="btn btn-success" name="submit" value="提交" />
        </div></td></tr>
    </table>
</form>
{{include file="admin/footer.tpl"}}
