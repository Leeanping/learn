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
        <tr class="noborder">
            <td class="first">网站名称</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][site_name]" value="{{TO->cfg key="site_name" group="site" default="致茂网络"}}" size="50" /> site_name</td>
        </tr>
        <tr class="noborder">
            <td class="first">主页名称</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][index_name]" value="{{TO->cfg key="index_name" group="site" default="首页"}}" size="50" /> index_name</td>
        </tr>
        <tr class="noborder">
            <td class="first">Email</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][site_email]" value="{{TO->cfg key="site_email" group="site" default=""}}" datatype="Email" msg="请填写管理Email" size="50"/> site_email</td>
        </tr>
        <tr class="noborder">
            <td class="first">联系电话</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][site_telephone]" value="{{TO->cfg key="site_telephone" group="site" default=""}}" size="50" /> site_telephone</td>
        </tr>
        <tr class="noborder">
            <td class="first">版权信息</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][site_powerby]" value="{{TO->cfg key="site_powerby" group="site" default="Power By - 2014 致茂网络" isreplace="1"}}" size="50" /> site_powerby</td>
        </tr>
        <tr class="noborder">
            <td class="first">备案号</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][site_beian]" value="{{TO->cfg key="site_beian" group="site" isreplace="1"}}" size="50" /> site_beian</td>
        </tr>
        <tr class="noborder">
            <td class="first">站点缓存</td>
            <td class="vtop next" colspan="3">
                {{TO->cfg key="site_cache" group="site" assign="_site_cache" default="0"}}
                <input type="radio" class="radio" name="config[site][site_cache]"{{if $_site_cache == 1}} checked="checked"{{/if}} value="1" />开启
                <input type="radio" class="radio" name="config[site][site_cache]"{{if $_site_cache == 0}} checked="checked"{{/if}} value="0" />关闭
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">站点关闭</td>
            <td class="vtop next" colspan="3">
                {{TO->cfg key="site_closed" group="site" assign="_site_closed" default="0"}}
                <input type="radio" class="radio" name="config[site][site_closed]"{{if $_site_closed == 1}} checked="checked"{{/if}} value="1" onclick="showObj('site_close');" />是
                <input type="radio" class="radio" name="config[site][site_closed]"{{if $_site_closed == 0}} checked="checked"{{/if}} value="0" onclick="hideObj('site_close');"/>否
            </td>
        </tr>
        <tbody id="site_close" {{if $site_closed == 0}}style="display: none;"{{/if}}>
            <tr class="noborder">
                <td class="first">关闭原因</td>
                <td class="vtop next" colspan="3">
                    <textarea  rows="6" name="config[site][site_close_prompt]" id="_site_close_prompt" cols="50" class="tarea">{{TO->cfg key="site_close_prompt" group="site" default="系统维护中，请稍候......"}}</textarea>
                </td>
            </tr>
        </tbody>
        <tr class="noborder">
            <td class="first">首页 META TITLE</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][index_seotitle]" value="{{TO->cfg key="index_seotitle" group="site" default="vpcv"}}" size="50" /> index_seotitle</td>
        </tr>
        <tr class="noborder">
            <td class="first">首页 META KEYWORDS</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][index_keywords]" value="{{TO->cfg key="index_keywords" group="site" default="vpcv"}}" size="50" /> index_keywords</td>
        </tr>
        <tr class="noborder">
            <td class="first">首页 META DESCRIPTION</td>
            <td class="vtop next" colspan="3">
                <textarea  rows="6" name="config[site][index_description]" id="index_description" cols="50" class="tarea">{{TO->cfg key="index_description" group="site" default="vpcv"}}</textarea>
                index_description
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">站点二维码(site_weixin)</td>
            <td class="vtop next" colspan="3">
                {{TO->cfg key="site_weixin" group="site" assign="_site_weixin" default=""}}
                <div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                        {{if $_site_weixin}}
                        <img width="100" height="100" src="{{$_site_weixin}}" />
                        {{/if}}
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" name="config[site][site_weixin]" id="site_weixin" value="{{$_site_weixin}}">
                {{include file='admin/upload_single.tpl'}}
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">统计代码</td>
            <td class="vtop next" colspan="3">
                <textarea  rows="6" name="config[site][site_tj]" id="site_tj" cols="50" class="tarea">{{TO->cfg key="site_tj" group="site" default=""}}</textarea>
                site_tj
            </td>
        </tr>
    </table>
    <div class="btnfix">
    	<input type="submit" name="editsubmit" value="提交" class="btn btn-success" tabindex="3" />
    </div>
</form>
{{include file="admin/footer.tpl"}}