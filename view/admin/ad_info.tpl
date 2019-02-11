{{include file='admin/header.tpl'}}
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/ad/{{$_postName}}" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr class="noborder">
            <td class="first">广告名称</td>
        	<td class="vtop next" colspan="3">
                <input name="adname" value="{{$ad.adname}}" type="text" class="txt" size="40" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">广告分类</td>
            <td class="vtop next" colspan="3">
                <select name="tagname" id="tagname" datatype="Require" msg="请选择广告分类">
                    <option value="">请选择</option>
                    {{html_options options=$adposition selected=$ad.tagname}}
                </select>
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">栏目</td>
            <td class="vtop next" colspan="3">
                <select name="typeid" id="typeid" datatype="Require" msg="请选择栏目">
                    <option value="">请选择栏目</option>
                    {{vplist from='channel' item='channel' useable='0' channel='all'}}
                    <option value="{{$channel.id}}"{{if $ad.typeid == $channel.id}} selected{{/if}}>{{$channel.name}}</option>
                    {{vplist from='channel' item='child' parentid='$channel.id' channel='all'}}
                    <option value="{{$child.id}}"{{if $ad.typeid == $child.id}} selected{{/if}}>--{{$child.name}}</option>
                    {{vplist from='channel' item='childer' parentid='$child.id' channel='all'}}
                    <option value="{{$childer.id}}"{{if $ad.typeid == $childer.id}} selected{{/if}}>----{{$childer.name}}</option>
                    {{/vplist}}
                    {{/vplist}}
                    {{/vplist}}
                </select>
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">广告链接</td>
            <td class="vtop next" colspan="3">
                <input name="linkurl" value="{{$ad.linkurl}}" type="text" class="txt" size="80" />
            </td>
        </tr>
        <!--<tr><td colspan="2" class="td27">开始投放时间</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input type="text" name="starttime" id="starttime" value="{{$ad.starttime|date_format:'%Y-%m-%d'}}" class="input" readonly onclick="showcalendar(0, event, this)" />
            </td>
            <td class="vtop tips2">请选择开始展示广告的时间</td>
        </tr>
        <tr><td colspan="2" class="td27">结束投放时间</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input type="text" name="endtime" id="endtime" value="{{$ad.endtime|date_format:'%Y-%m-%d'}}" class="input" readonly onclick="showcalendar(0, event, this)" />
            </td>
            <td class="vtop tips2">请选择结束展示广告的时间</td>
        </tr>-->
        <tr class="noborder">
            <td class="first">外部图片链接</td>
        	<td class="vtop next" colspan="3">
                <input name="outurl" value="{{$ad.outurl}}" type="text" class="txt" size="80" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">上传图片</td>
        	<td class="vtop" colspan="3">
            	<div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                        {{if $ad.imgurl}}
                        <img width="120" height="90" src="{{$ad.imgurl}}" />
                        {{/if}}
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" id="imgurl" name="imgurl" value="{{$ad.imgurl}}">
                {{include file='admin/upload_single.tpl'}}
            </td>
        </tr>
    </table>
    <!-- <div class="btnfix"> -->
        <input type="hidden" name="action" value="{{$_postName}}" />
        <input type="hidden" name="id" value="{{$ad.id}}" />
        <!-- <input type="submit" class="btn" name="submit" value="点击提交" /> -->
    <!-- </div> -->
</form>
{{include file='admin/footer.tpl'}}