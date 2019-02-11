{{include file="admin/header.tpl"}}
<div class="floattop">
    <ul id="mtab">
        <li class="btn active btn-info" tab="general">基本信息</li>
        <li class="btn btn-info" tab="seo">优化信息</li>
    </ul>
</div>
<form name="cpform" method="post" action="/admin/nav/edit" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr class="noborder">
            <td class="first">导航名称</td>
        	<td class="next">
                <input name="name" value="{{$nav.name}}" type="text" class="txt" />
            </td>
            <td class="first">英文名称</td>
            <td class="next">
                <input name="ename" value="{{$nav.ename}}" type="text" class="txt" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">导航图标</td>
            <td class="next">
                <div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                        {{if $nav.icon}}
                        <img width="120" height="90" src="{{$nav.icon}}" />
                        {{/if}}
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" id="icon" name="icon" value="{{$nav.icon}}">
                {{include file='admin/upload_single.tpl'}}
            </td>
            <td class="first">链接/目录</td>
            <td class="next">
                <input name="pinyin" value="{{$nav.pinyin}}" type="text" class="txt" datatype="Require" msg="" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">是否启用</td>
        	<td class="next">
                <input type="radio" name="useable" value="1" {{if $nav.useable == '1'}}checked="checked"{{/if}} />可用
                <input type="radio" name="useable" value="0" {{if $nav.useable == '0'}}checked="checked"{{/if}} />不可用
            </td>
            <td class="first">浏览权限</td>
            <td class="next">
                <input type="radio" name="isview" value="1" {{if $nav.isview == '1'}}checked="checked"{{/if}} /> 注册访问
                <input type="radio" name="isview" value="0" {{if $nav.isview == '0'}}checked="checked"{{/if}} /> 开放访问
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">模型</td>
            <td class="next">
                <select name="moduleid">
                    <option value="">请选择模型</option>
                    {{vplist from='module' item='module'}}
                    <option value="{{$module.mark}}"{{if $nav.moduleid == $module.mark}} selected{{/if}}>{{$module.title}}</option>
                    {{/vplist}}
                </select>
            </td>
            <td class="first">新窗口打开</td>
            <td class="next">
                <input type="radio" name="newwindow" value="1" {{if $nav.newwindow == '1'}}checked="checked"{{/if}} />是
                <input type="radio" name="newwindow" value="0" {{if $nav.newwindow == '0'}}checked="checked"{{/if}} />否
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">类型</td>
            <td class="next" colspan="3">
                <input type="radio" name="style" value="1" {{if $nav.style == '1'}}checked="checked"{{/if}} />列表
                <input type="radio" name="style" value="2" {{if $nav.style == '2'}}checked="checked"{{/if}} />封面
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">封面模版</td>
            <td class="next" colspan="3">
                <input name="tempindex" value="{{$nav.tempindex}}" type="text" class="txt" datatype="Require" msg="" />
                <a class="btn btn-info gettemplate" href="javascript:;">选择</a>
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">列表模版</td>
            <td class="next" colspan="3">
                <input name="templist" value="{{$nav.templist}}" type="text" class="txt" datatype="Require" msg="" />
                <a class="btn btn-info gettemplate" href="javascript:;">选择</a>
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">文章模版</td>
            <td class="next" colspan="3">
                <input name="temparticle" value="{{$nav.temparticle}}" type="text" class="txt" datatype="Require" msg="" />
                <a class="btn btn-info gettemplate" href="javascript:;">选择</a>
            </td>
        </tr>
        
        <tr class="noborder">
            <td class="td27 first">导航描述</td>
        	<td class="vtop next" colspan="3">
            {{$body}}
            </td>
        </tr>
    </table>
    <table class="mtb mtb-hide" id="seo-table">
        <tr class="noborder">
            <td class="first">META Title</td>
        	<td class="vtop next" colspan="3">
                <input name="seotitle" type="text" class="txt" value="{{$nav.seotitle}}" size="100" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">META Keywords</td>
        	<td class="vtop next" colspan="3">
                <input name="keywords" type="text" class="txt" value="{{$nav.keywords}}" size="100" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">META Description</td>
        	<td class="vtop next" colspan="3">
                <textarea  rows="6" name="description" cols="100" class="tarea">{{$nav.description}}</textarea>
            </td>
        </tr>
    </table>
    <!-- <div class="btnfix"> -->
        <input type="hidden" name="action" value="edit" />
        <input type="hidden" name="id" value="{{$nav.id}}" />
        <!-- <input type="submit" class="btn btn-success" name="submit" value="提交" /> -->
    <!-- </div> -->
</form>
