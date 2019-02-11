{{include file="admin/header.tpl"}}
<div class="floattop">
    <ul id="mtab">
        <li class="btn active btn-info" tab="general">基本信息</li>
        <li class="btn btn-info" tab="seo">优化信息</li>
        <li class="btn btn-info" tab="other">分类内容</li>
    </ul>
</div>
<form name="cpform" method="post" action="/admin/category/edit" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr><td colspan="2" class="td27">分类名称</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="catname" value="{{$category.catname}}" type="text" class="txt" datatype="Require" msg="请填写分类名称" />
            </td>
            <td class="vtop tips2">请输入分类的名称<span info="catname"></span></td>
        </tr>
        <tr><td colspan="2" class="td27">分类排序</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="sort" value="{{$category.sort}}" type="text" class="txt" />
            </td>
            <td class="vtop tips2">分类显示的顺序</td>
        </tr>
        <tr><td colspan="2" class="td27">分类图片</td></tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                        {{if $category.catthumb}}
                        <img width="120" height="90" src="{{$category.catthumb}}" />
                        {{/if}}
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" id="catpic" name="catpic" value="{{$category.catpic}}">
                <input type="hidden" id="catthumb" name="catthumb" value="{{$category.category}}">
                {{include file='admin/upload_single.tpl'}}
            </td>
            <td class="vtop tips2">分类图片的显示</td>
        </tr>
        <tr><td colspan="2" class="td27">是否启用</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input type="radio" name="useable" value="1" {{if $category.useable == '1'}}checked="checked"{{/if}} />可用
            <input type="radio" name="useable" value="0" {{if $category.useable == '0'}}checked="checked"{{/if}} />不可用
            </td>
            <td class="vtop tips2">分类的开启与关闭</td>
        </tr>
        <tr><td colspan="2" class="td27">分类简介</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
              <textarea  rows="6" name="catbrief" cols="50">{{$category.catbrief}}</textarea>
            </td>
            <td class="vtop tips2">请输入简介</td>
        </tr>
    </table>
    <table class="mtb mtb-hide" id="seo-table">
    	<tr><td colspan="2" class="td27">META Title</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="seotitle" type="text" class="txt" value="{{$category.seotitle}}" />
            </td>
            <td class="vtop tips2">针对搜索引擎设置</td>
        </tr>
        <tr><td colspan="2" class="td27">META Keywords</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input name="keywords" type="text" class="txt" value="{{$category.keywords}}" />
            </td>
            <td class="vtop tips2">针对搜索引擎设置</td>
        </tr>
        <tr><td colspan="2" class="td27">META Description</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <textarea  rows="6" name="description" cols="50">{{$category.description}}</textarea>
            </td>
            <td class="vtop tips2">针对搜索引擎设置</td>
        </tr>
    </table>
    <table class="mtb mtb-hide" id="other-table">
        <tr><td colspan="2" class="td27">分类内容</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform line-normal" colspan="2">
            {{$content}}
            </td>
        </tr>
    </table>
    <div class="btnfix">
    	<input type="hidden" name="action" value="edit" />
        <input type="hidden" name="id" value="{{$category.id}}" />
        <input type="hidden" name="item" value="{{$item}}" />
        <input type="submit" class="btn btn-success" name="vpbtn" value="提交" />
    </div>
</form>
{{include file="admin/footer.tpl"}}
