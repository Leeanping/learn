<form name="cpform" method="post" action="/admin/forum/{{$_postName}}" id="cpform" enctype="multipart/form-data">
    <table class="mtb">
        <tr><td colspan="2" class="td27">版块名称</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            	<select name="forumid" datatype="Require">
                	<option value="">版块</option>
                    {{foreach from=$forums item=forum}}
                    <option value="{{$forum.id}}"{{if $forum.id == $thread.forumid}} selected="selected"{{/if}}>{{$forum.name}}</option>
                    {{foreach from=$forum.son item=child}}
                    <option value="{{$child.id}}"{{if $child.id == $thread.forumid}} selected="selected"{{/if}}>--{{$child.name}}</option>
                    {{/foreach}}
                    {{/foreach}}
                </select>
            </td>
            <td class="vtop tips2"></td>
        </tr>
        <tr><td colspan="2" class="td27">标题</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input type="text" name="title" value="{{$thread.title}}" class="txt" datatype="Require" />
            </td>
            <td class="vtop tips2"></td>
        </tr>
        <tr>
            <td colspan="2" class="td27">
                <a href="javascript:void(0);" class="btn active">封面图</a>
            </td>
        </tr>
        <tr class="noborder">
            <td class="vtop" colspan="2">
                <div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                        {{if $thread.attach}}
                        <img width="120" height="90" src="{{$thread.attach}}" />
                        {{/if}}
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" id="attach" name="attach" value="{{$thread.attach}}">
                {{include file='admin/upload_single.tpl'}}
            </td>
        </tr>
        <tr><td colspan="2" class="td27">内容</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform" colspan="2">
            {{$content}}
            </td>
        </tr>
    </table>
    <div class="btnfix">
        <input type="hidden" name="action" value="{{$_postName}}" />
        <input type="hidden" name="id" value="{{$thread.id}}" />
        <input type="submit" class="btn btn-success" value="提交" />
    </div>
</form>