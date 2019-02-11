{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
        <li class="btn btn-info" onclick="Controller.controller('发布内容','admin/article/add')">添加</li>
    </ul>
</div>
<div class="input-append">
	<form method="post" action="/admin/article/index" id="pform">
        <select name="catid">
            <option value="">请选择栏目</option>
            {{vplist from='channel' item='channel' useable='0' channel='all'}}
            <option value="{{$channel.id}}"{{if $conditions.catid == $channel.id}} selected{{/if}}>{{$channel.name}}</option>
            {{vplist from='channel' item='child' parentid='$channel.id' channel='all'}}
            <option value="{{$child.id}}"{{if $conditions.catid == $child.id}} selected{{/if}}>--{{$child.name}}</option>
            {{vplist from='channel' item='childer' parentid='$child.id' channel='all'}}
            <option value="{{$childer.id}}"{{if $conditions.catid == $childer.id}} selected{{/if}}>----{{$childer.name}}</option>
            {{/vplist}}
            {{/vplist}}
            {{/vplist}}
        </select>
        <select name="moduleid">
            <option value="">请选择模型</option>
            {{vplist from='module' item='module'}}
            <option value="{{$module.mark}}"{{if $conditions.moduleid == $module.mark}} selected{{/if}}>{{$module.title}}</option>
            {{/vplist}}
        </select>
        <input type="text" name="title" id="title" placeholder="请输入关键字" value="{{if $conditions.title}}{{$conditions.title}}{{/if}}" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="button" onclick="Controller.search('admin/article/index')"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/article/more" name="lpform" id="lpform">
    <table class="tb">
        <tr>
            <td>
                <button name="chkall" id="chkall" class="btn btn-primary" title="全选" type="button" onclick="checkAll(this.form, 'id[]')">全选</button>
            </td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/article/', 'more')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/article/', 'delete')">删除</button>
            </td>
            <td colspan="10" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
        <tr class="header">
            <th width="60">选择</th>
            <th width="60">ID</th>
            <th width="60">排序</th>
            <th class="tdl">标题</th>
            <th>分类</th>
            <th>模块</th>
            <th>显示</th>
            <th>置顶</th>
            <th>推荐</th>
            <th>首页显示</th>
            <th>点击量</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>
        {{foreach from=$articles item=article}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="id[]" value="{{$article.id}}" />
            </td>
            <td class="td25">
                {{$article.id}}
            </td>
            <td class="td25">
                <input type="text" size="2" name="sort[{{$article.id}}]" value="{{$article.sort}}" />
                
            </td>
            <td class="tdl">
                {{$article.title}}
            </td>
            <td class="td25">
                {{$article.catname}}
            </td>
            <td class="td25">
                {{$article.modulename}}
            </td>
            <td class="td25">
                <input type="checkbox" name="useable[{{$article.id}}]" value="1"{{if $article.useable}} checked{{/if}} />
            </td>
            <td class="td25">
                <input type="checkbox" name="istop[{{$article.id}}]" value="1"{{if $article.istop}} checked{{/if}} />
                
            </td>
            <td class="td25">
                <input type="checkbox" name="isspecial[{{$article.id}}]" value="1"{{if $article.isspecial}} checked{{/if}} />
                
            </td>
            <td class="td25">
                <input type="checkbox" name="isindex[{{$article.id}}]" value="1"{{if $article.isindex}} checked{{/if}} />
                
            </td>
            <td class="td25">
                {{$article.shownum}}
            </td>
            <td class="td25">
                {{$article.addtime|date_format:'%Y-%m-%d'}}
            </td>
            <td class="td25">
                <a href="javascript:void(0);" onclick="Controller.controller('修改内容','admin/article/edit/id/{{$article.id}}')">编辑</a>
            </td>
        </tr>
        {{/foreach}}
        <tr>
            <td>
                <button name="chkall" id="chkall" class="btn btn-primary" title="全选" type="button" onclick="checkAll(this.form, 'id[]')">全选</button>
            </td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/article/', 'more')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/article/', 'delete')">删除</button>
            </td>
            <td colspan="10" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}