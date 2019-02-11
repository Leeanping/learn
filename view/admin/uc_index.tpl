{{include file="admin/header.tpl"}}
<div class="floattop">
    <ul>
        <li class="btn"><span>UCenter设置</span></li>
    </ul>
</div>
<form id="cpform" name="cpform" method="post" action="/admin/uc/index">
    <input type="hidden" name="action" value="setup" />
    <table class="mtb">
        {{foreach from=$ucArr key=key item=value}}
        <tr>
            <td>
                {{if $key=='connect'}}
                    连接方式
                {{elseif $key=='dbhost'}}
                    数据库主机
                {{elseif $key=='dbuser'}}
                    数据库用户名
                {{elseif $key=='dbpw'}}
                    数据库密码
                {{elseif $key=='dbname'}}
                    数据库名称
                {{elseif $key=='dbcharset'}}
                    数据库字符集
                {{elseif $key=='dbtablepre'}}
                    数据库表前缀
                {{elseif $key=='key'}}
                    通信密钥
                {{elseif $key=='api'}}
                    UC URL地址
                {{elseif $key=='charset'}}
                    UC 字符集
                {{elseif $key=='ip'}}
                    UC IP
                {{elseif $key=='appid'}}
                    当前应用ID
                {{else}}
                    {{$key}}
                {{/if}}
            </td>
            <td>
                <input type="{{if $key=='dbpw'}}password{{else}}text{{/if}}" size="50" value="{{$value}}" name="config[uc][{{$key}}]" />
            </td>
            <td>
                {{if $key=='connect'}}
                    连接 UCenter 的方式: mysql/NULL, 默认为空时为 fscoketopen()<br>
                    mysql 是直接连接的数据库, 为了效率, 建议采用 mysql
                {{elseif $key=='dbhost'}}
                    UCenter 数据库主机
                {{elseif $key=='dbuser'}}
                    UCenter 数据库用户名
                {{elseif $key=='dbpw'}}
                    UCenter 数据库密码
                {{elseif $key=='dbname'}}
                    UCenter 数据库名称
                {{elseif $key=='dbcharset'}}
                    UCenter 数据库字符集
                {{elseif $key=='dbtablepre'}}
                    UCenter 数据库表前缀
                {{elseif $key=='key'}}
                    与 UCenter 的通信密钥, 要与 UCenter 保持一致
                {{elseif $key=='api'}}
                    UCenter 的 URL 地址, 在调用头像时依赖此常量
                {{elseif $key=='charset'}}
                    UCenter 的字符集
                {{elseif $key=='ip'}}
                    UCenter 的 IP, 当 UC_CONNECT 为非 mysql 方式时, 并且当前应用服务器解析域名有问题时, 请设置此值
                {{elseif $key=='appid'}}
                    当前应用的 ID
                {{/if}}
            </td>
        </tr>
        {{/foreach}}
    </table>
	<div class="btnfix">
    	<input type="submit" name="editsubmit" value="提交" class="btn" tabindex="3" />
    </div>
</form>
{{include file="admin/footer.tpl"}}