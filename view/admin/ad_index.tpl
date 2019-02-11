{{include file='admin/header.tpl'}}
<div class="floattop">
    <ul>
         <li class="btn btn-info" onclick="Controller.reload()"><span>广告列表</span></li>
         <li class="btn btn-info" onclick="Controller.controller('添加广告','admin/ad/add')"><span>添加广告</span></li>
         <li class="btn btn-info" onclick="Controller.main('{{$_pathroot}}admin/ad/type')"><span>广告分类</span></li>
    </ul>
</div>
<div class="input-append">
    <form method="post" action="/admin/ad/index" id="pform">
        <input id="input_name" type="text" name="adname" placeholder="请输入广告名称" value="{{if $adname}}{{$adname}}{{/if}}" class="txt" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="button" onclick="Controller.search('admin/ad/index')"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/ad/more" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl" width="60">编号</th>
            <th>排序</th>
            <th>名称</th>
            <th>分类名称</th>
            <th>广告图片</th>
            <th>点击量</th>
            <th>操作</th>
        </tr>
        {{foreach from=$ads item=ad}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="id[]" value="{{$ad.id}}" />
            </td>
            <td class="tdl">
            	{{$ad.id}}
            </td>
            <td class="td25">
            	<input type="text" size="5" name="sort[{{$ad.id}}]" class="txt" value="{{$ad.sort}}" />
            </td>
            <td class="td25">
            	{{$ad.adname}}
            </td>
            <td class="td25">
            	{{$ad.kname}}
            </td>
            <td class="td25">
            	<img src="{{if $ad.outurl}}{{$ad.outurl}}{{else}}{{$ad.imgurl}}{{/if}}" width="120" height="50" />
            </td>
            <td class="td25">
            	{{$ad.shownum}}
            </td>
            <td class="td25">
                <a href="javascript:;" onclick="Controller.controller('修改广告', 'admin/ad/edit/id/{{$ad.id}}')" >编辑</a>
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/ad/', 'more')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/ad/', 'delete')">删除</button>
            </td>
            <td colspan="5" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}