<div class="floattop">
    <ul>
        <li class="btn btn-info" onclick="Controller.reload()">管理</li>
        <li class="btn btn-info" onclick="Controller.controller('论坛发帖','admin/forum/threadadd')">添加</li>
    </ul>
</div>
<div class="input-append">
    <form method="post" action="/admin/forum/thread" id="pform">
        <select name="forumid">
            <option value="">请选择板块</option>
            {{foreach from=$forums item=forum}}
            <option value="{{$forum.id}}"{{if $forum.id == $forumid}} selected="selected"{{/if}}>{{$forum.name}}</option>
            {{foreach from=$forum.son item=child}}
            <option value="{{$child.id}}"{{if $child.id == $forumid}} selected="selected"{{/if}}>--{{$child.name}}</option>
            {{/foreach}}
            {{/foreach}}
        </select>
        <input id="input_name" type="text" name="title" placeholder="请输入标题" value="{{if $title}}{{$title}}{{/if}}" class="txt" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="button" onclick="Controller.search('admin/forum/thread')"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/forum/tmore" name="lpform" id="lpform">
	<table class="tb">
        <tr class="header">
        	<th>选择</th>
            <th class="tdl">标题</th>
            <th>发帖人</th>
            <th>版块名称</th>
            <th>回复数</th>
            <th>浏览数</th>
            <th>置顶</th>
            <th>加精</th>
            <th>热帖</th>
            <th>奖励</th>
            <th>显示</th>
            <th>图章</th>
            <th>发表时间</th>
            <th>操作</th>
        </tr>
        {{foreach from=$threads item=thread}}
        <tr class="hover">
        	<td class="td25">
                <input class="checkbox" type="checkbox" name="id[]" value="{{$thread.id}}" />
                <input type="hidden" name="uid[{{$thread.id}}]" value="{{$thread.uid}}" />
                <input type="hidden" name="forumid[{{$thread.id}}]" value="{{$thread.forumid}}" />
            </td>
            <td class="tdl">
            	{{$thread.title|utruncate:'10':'...'}}
            </td>
            <td class="td25">
                {{$thread.username || $thread.realname}}
            </td>
            <td class="td25">
            	{{$thread.name.name}}
            </td>
            <td class="td25">
            	{{$thread.replies}}
            </td>
            <td class="td25">
            	{{$thread.views}}
            </td>
            <td class="td25">
                <input type="checkbox" name="istop[{{$thread.id}}]" value="1"{{if $thread.istop == '1'}} checked="checked"{{/if}} />
            </td>
            <td class="td25">
            	<input type="checkbox" name="isbest[{{$thread.id}}]" value="1"{{if $thread.isbest == '1'}} checked="checked"{{/if}} />
            </td>
            <td class="td25">
            	<input type="checkbox" name="ishot[{{$thread.id}}]" value="1"{{if $thread.ishot == '1'}} checked="checked"{{/if}} />
            </td>
            <td class="td25">
            	<input type="checkbox" name="isprize[{{$thread.id}}]" value="1"{{if $thread.isprize == '1'}} checked="checked"{{/if}} />
            </td>
            <td class="td25">
            	<input type="checkbox" name="useable[{{$thread.id}}]" value="1"{{if $thread.useable == '1'}} checked="checked"{{/if}} />
            </td>
            <td class="td25">
            	<select style="width:70px;" name="stamp[{{$thread.id}}]">
                	<option value="">图章</option>
                    <option value="istop"{{if $thread.stamp == 'istop'}} selected="selected"{{/if}}>置顶</option>
                    <option value="isbest"{{if $thread.stamp == 'isbest'}} selected="selected"{{/if}}>精华</option>
                    <option value="ishot"{{if $thread.stamp == 'ishot'}} selected="selected"{{/if}}>热门</option>
                    <option value="ispic"{{if $thread.stamp == 'ispic'}} selected="selected"{{/if}}>美图</option>
                    <option value="isgood"{{if $thread.stamp == 'isgood'}} selected="selected"{{/if}}>优秀</option>
                    <option value="isrec"{{if $thread.stamp == 'isrec'}} selected="selected"{{/if}}>推荐</option>
                    <option value="iscreate"{{if $thread.stamp == 'iscreate'}} selected="selected"{{/if}}>原创</option>
                    <option value="isbao"{{if $thread.stamp == 'isbao'}} selected="selected"{{/if}}>爆料</option>
                </select>
            </td>
            <td class="td25">
            	{{$thread.addtime|date_format:'%Y-%m-%d %H:%M:%S'}}
            </td>
            <td class="td25">
            	<a href="javascript:void(0);" onclick="Controller.controller('修改主题-{{$thread.title}}','admin/forum/threadedit/id/{{$thread.id}}')">编辑</a>
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/forum/', 'tmore')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/forum/', 'tdelete')">删除</button>
            </td>
            <td colspan="12" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>