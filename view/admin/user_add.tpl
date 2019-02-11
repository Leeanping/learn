{{include file="admin/header.tpl"}}
<form id="cpform" name="cpform" method="post" action="/admin/user/add">
<input type="hidden" name="action" value="add" />
<table class="mtb">
    <tr class="noborder">
        <td class="first">帐号</td>
        <td class="vtop next"><input type="text" class="txt" id="username" name="username" value="{{$conditions.username}}" datatype="Require"  msg="请填写帐号"/></td>
    </tr>
    <tr class="noborder">
        <td class="first">用户组</td>
        <td class="vtop next">
        	<select name="gid" datatype="Require" msg="用户组">
            	<option value="">请选择用户组</option>
                {{foreach from=$usergroups item=group key=key}}
                <option value="{{$key}}">{{$group.title}}</option>
                {{/foreach}}
            </select>
        </td>
    </tr>
    <tr class="noborder">
        <td class="first">密码</td>
        <td class="vtop next"><input type="password" class="txt" id="password" name="password" maxlength="15" datatype="Require" msg="请输入密码"/></td>
    </tr>
    <tr class="noborder">
        <td class="first">姓名</td>
        <td class="vtop next"><input type="text" class="txt" id="realname" name="realname" value="{{$conditions.realname}}" datatype="Require"  msg="请填写姓名"/></td>
    </tr>
    <tr class="noborder">
        <td class="first">邮箱</td>
        <td class="vtop next"><input type="text" class="txt" id="email" name="email" value="{{$conditions.email}}" datatype="Email"  msg="请填写正确的Email地址" /></td>
    </tr>
</table>
<!-- <div class="btnfix">
    <input type="submit" class="btn btn-success" name="vpbtn" value="点击提交" />
</div> -->
</form>
{{include file="admin/footer.tpl"}}