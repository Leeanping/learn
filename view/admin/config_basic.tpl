{{include file="admin/header.tpl"}}
<div class="floattop">
    <ul>
        <li class="btn btn-info" onclick="Controller.main('{{$_pathroot}}admin/config/basic/issingle/1')"><span>基本设置</span></li>
        <li class="btn btn-info" onclick="Controller.main('{{$_pathroot}}admin/config/basic/issingle/1/isadd/1')"><span>附加设置</span></li>
        <li class="btn btn-info" onclick="Controller.controller('增加基础设置','admin/config/add/group/basic')"><span>增加设置</span></li>
    </ul>
</div>
<form action="/admin/config/basic" method="post" id="cpform" name="cpform">
    <table class="mtb">
        <tr class="noborder">
            <td class="first">缩略图宽度</td>
            <td class="vtop next">
                <input type="text" class="txt" value="{{TO->cfg key='thumb_width' group='basic' default='240'}}" datatype="Require" msg="请填写宽度" name="config[basic][thumb_width]" /> thumb_width
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">缩略图高度</td>
            <td class="vtop next">
                <input type="text" class="txt" value="{{TO->cfg key='thumb_height' group='basic' default='180'}}" datatype="Require" msg="请填写高度" name="config[basic][thumb_height]" /> thumb_height
            </td>
        </tr>
        <tr class="noborder">
            <td  class="first">每页显示数量(前台)</td>
            <td class="vtop next">
                <input type="text" class="txt" value="{{TO->cfg key='page_size' group='basic' default='20'}}" datatype="Require" msg="请填写每页数量" name="config[basic][page_size]" /> page_size
            </td>
        </tr>
        <tr class="noborder">
            <td  class="first">每页显示数量(后台)</td>
            <td class="vtop next">
                <input type="text" class="txt" value="{{TO->cfg key='admin_page_size' group='basic' default='20'}}" datatype="Require" msg="请填写每页数量" name="config[basic][admin_page_size]" /> admin_page_size
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">Cookie 前缀</td>
            <td class="vtop next">
                <input type="text" class="txt" value="{{TO->cfg key='cookiepre' group='basic' default='t_'}}" datatype="Require" msg="请填写Cookie前缀" name="config[basic][cookiepre]" /> 用于区分本站 cookie，默认为 t_，请不要随便修改
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">Cookie 域</td>
            <td class="vtop next">
                <input type="text" class="txt" value="{{TO->cfg key="cookiedomain" group="basic" default=""}}" name="config[basic][cookiedomain]" />
                默认为空，建议不要随便修改
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">会话保持时间（分钟）</td>
            <td class="vtop next">
                <input type="text" class="txt" value="{{TO->cfg key="cookietime" group="basic" default="30"}}"  datatype="Number" msg="请填写Cookie时间" name="config[basic][cookietime]" /> 默认为 30</td>
        </tr>
        <tr class="noborder">
            <td class="first">默认时区</td>
            <td class="vtop next">
                <input type="text" class="txt" value="{{TO->cfg key="timezone" group="basic" default="8"}}" name="config[basic][timezone]" datatype="Number" msg="请填写默认时区" /> 当地时间与 GMT 的时差，默认为 8（北京时区），请不要随便修改</td>
        </tr>
        <tr class="noborder">
            <td class="first">时间修正(秒)</td>
            <td class="vtop next">
                <input type="text" class="txt" value="{{TO->cfg key="timemodify" group="basic" default="0"}}" name="config[basic][timemodify]" datatype="Int" msg="请填写时间修正" /> 当服务器时间误差时使用此功能 修正后时间{{$righttime|idate:"m月d日 H:i"}}</td>
        </tr>
        <tr class="noborder">
            <td class="first">默认日志标识</td>
            <td class="vtop next">
                <input type="text" class="txt" value="{{TO->cfg key='logprefix' group='basic' default='___'}}" name="config[basic][logprefix]" datatype="Require" msg="请填写日志标识" />  请不要随便修改</td>
        </tr>
        <tr class="noborder">
            <td class="first">开启访问列表</td>
            <td class="vtop next">
                {{TO->cfg key="stat" group="basic" assign="_stat" default="0"}}
                <label><input type="radio" class="radio" name="config[basic][stat]"{{if $_stat == 1}} checked="checked"{{/if}} value="1" />开启</label>
                <label><input type="radio" class="radio" name="config[basic][stat]"{{if $_stat == 0}} checked="checked"{{/if}} value="0" />关闭</label>
                是否记录用户的访问
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">Debug 模式</td>
            <td class="vtop next">
                {{TO->cfg key="rundebug" group="basic" assign="_rundebug" default="0"}}
                <label><input type="radio" class="radio" name="config[basic][rundebug]"{{if $_rundebug == 1}} checked="checked"{{/if}} value="1" />开启</label>
                <label><input type="radio" class="radio" name="config[basic][rundebug]"{{if $_rundebug == 0}} checked="checked"{{/if}} value="0" />关闭</label>
                网站出现问题时的调试，默认为关闭
            </td>
        </tr>
    </table>
    <div class="btnfix">
    	<input type="submit" name="editsubmit" value="提交" class="btn btn-success" tabindex="3" />
    </div>
</form>
{{include file="admin/footer.tpl"}}