{{include file="admin/header.tpl"}}
<div class="floattop">
    <ul>
        <li class="btn btn-info" onclick="Controller.main('{{$_pathroot}}admin/config/site/issingle/1')"><span>站点设置</span></li>
        <li class="btn btn-info" onclick="Controller.main('{{$_pathroot}}admin/config/site/issingle/1/isadd/1')"><span>附加设置</span></li>
        <li class="btn btn-info" onclick="Controller.controller('增加站点设置','admin/config/add/group/site')"><span>增加设置</span></li>
    </ul>
</div>
<form action="/admin/config/site?postFlag" method="post" enctype="multipart/form-data" id="cpform" name="cpform">
    <table class="mtb">
        {{foreach from=$configs item=config}}
        <tr class="noborder">
            <td class="first">
                <a href="javascript:;" onclick="Controller.deleteOne('admin/config/delete/cfgname/{{$config.cfgname}}/group/site')">[删除]</a>
                {{$config.title}}
            </td>
            <td class="vtop next" colspan="3">
                <input type="text" class="txt" value="{{$config.config}}" name="config[site][{{$config.cfgname}}]" />
                {{$config.cfgname}}
            </td>
        </tr>
        {{/foreach}}
    </table>
    <div class="btnfix">
    	<input type="submit" name="editsubmit" value="提交" class="btn btn-success" tabindex="3" />
    </div>
</form>
{{include file="admin/footer.tpl"}}