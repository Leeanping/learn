{{include file='admin/header.tpl'}}
<script language="javascript">
function _onFormSubmit(){
	if($("#pform > input[name='goodsname']").val() == '请输入商品名称') {
   		$("#pform > input[name='goodsname']").val('');
	}
}
</script>
<div class="floattop">
    <ul>
         <li class="btn{{if 'index' == $_actionName}} current{{/if}}"><a href="/admin/goods/index"><span>管理</span></a></li>
         <li class="btn{{if 'add' == $_actionName}} current{{/if}}"><a onclick="vpcvAction('添加广告','admin/goods/add')" href="javascript:void(0);"><span>添加</span></a></li>
    </ul>
</div>
<div class="input-append">
    <form method="post" action="/admin/goods/index" id="pform">
    	<select name="catid" id="catid">
            <option value="">请选择分类</option>
            {{$catList}}
        </select>
        <input id="input_name" type="text" name="goodsname" value="{{if $goodsname}}{{$goodsname}}{{else}}请输入商品名称{{/if}}" class="txt" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="submit" onclick="_onFormSubmit()"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/goods/more" name="lpform" id="lpform">
	<table class="tb tb2" id="sTable">
        <tr class="header">
            <th width="60">选择</th>
            <th class="tdl" width="60">排序</th>
            <th>商家</th>
            <th width="150">名称</th>
            <th>类别</th>
            <th>分类</th>
            <th width="150">属性</th>
            <th>热门</th>
            <th>推荐</th>
            <th>显示</th>
            <th>操作</th>
        </tr>
        {{foreach from=$goods item=good}}
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="delete[]" value="{{$good.id}}" />
                <input type="hidden" name="id[{{$good.id}}]" value="{{$good.id}}" />
            </td>
            <td class="td25">
            	<input type="text" name="sort[{{$good.id}}]" size="2" value="{{$good.sort}}" />
            </td>
            <td class="td25">
                {{$good.realname}}
            </td>
            <td class="td25">
            	{{$good.goodsname}}
            </td>
            <td class="td25">
                {{if $good.kind == 1}}礼服{{/if}}
                {{if $good.kind == 3}}喜酒{{/if}}
                {{if $good.kind == 2}}化妆{{/if}}
                {{if $good.kind == 4}}珠宝{{/if}}
                {{if $good.kind == 5}}蜜月{{/if}}
            </td>
            <td class="td25">
            	{{$good.catname}}
            </td>
            <td class="td25">
            	{{if $good.kind == 1}}颜色：{{$good.color}}<br />尺码：{{$good.size}}{{/if}}
                {{if $good.kind == 3}}版本：{{$good.attr}}{{/if}}
                {{if $good.kind == 2}}无{{/if}}
            </td>
            <td class="td25">
            	<input type="checkbox"{{if $good.ishot == 1}} checked="checked"{{/if}} value="1" name="ishot[{{$good.id}}]" />
            </td>
            <td class="td25">
            	<input type="checkbox"{{if $good.isspecial == 1}} checked="checked"{{/if}} value="1" name="isspecial[{{$good.id}}]" />
            </td>
            <td class="td25">
            	<input type="checkbox"{{if $good.useable == 1}} checked="checked"{{/if}} value="1" name="useable[{{$good.id}}]" />
            </td>
            <td class="td25">
                <a href="/admin/goods/edit/id/{{$good.id}}" >编辑</a>
            </td>
        </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn" title="删除" type="button" onclick="checkAll(this.form, 'delete[]')">全选</button></td>
            <td class="tdl">
                <button id="submit" class="btn" type="submit">提交</button>
            </td>
            <td colspan="9" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
</form>
{{include file='admin/footer.tpl'}}