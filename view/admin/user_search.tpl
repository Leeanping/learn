{{include file="admin/header.tpl"}}
<div class="floattop">
    <ul>
        <li class="btn btn-info">用户管理</li>
        <li class="btn btn-info" onclick="Controller.controller('添加用户','admin/user/add')">添加用户</li>
    </ul>
</div>
<div class="input-append">
    <form id="pform" name="pform" method="post" action="/admin/user/search">
        <select name="type">
            <option value="email" {{if $conditions.type == 'email'}}selected{{/if}}>Email</option>
            <option value="username" {{if $conditions.type == 'username'}}selected{{/if}}>帐号</option>
        </select>
        <input type="text" name="keyword" placeholder="关键字" value="{{if $conditions.keyword}}{{$conditions.keyword}}{{/if}}" class="txt" onclick="this.value=''" size="8" />
        <select id="gid" name="gid">
            <option value="0">用户组</option>
            {{foreach from=$usergroups key=gid item=group}}
                <option value="{{$gid}}" {{if $conditions.gid == $gid}}selected{{/if}}>{{$group.title}}</option>
            {{/foreach}}
        </select>
        <select name="regdate">
            <option value="0">注册时间</option>
            <option value="1" {{if $conditions.regdate == 1}}selected{{/if}}>一周内</option>
            <option value="2" {{if $conditions.regdate == 2}}selected{{/if}}>两周内</option>
            <option value="3" {{if $conditions.regdate == 3}}selected{{/if}}>一月内</option>
            <option value="4" {{if $conditions.regdate == 4}}selected{{/if}}>半年内</option>
            <option value="5" {{if $conditions.regdate == 5}}selected{{/if}}>一年内</option>
            <option value="6" {{if $conditions.regdate == 6}}selected{{/if}}>一年前</option>
        </select>
        <select name="lastvisit">
            <option value="0">最后访问</option>
            <option value="1" {{if $conditions.lastvisit == 1}}selected{{/if}}>一周内</option>
            <option value="2" {{if $conditions.lastvisit == 2}}selected{{/if}}>两周内</option>
            <option value="3" {{if $conditions.lastvisit == 3}}selected{{/if}}>一月内</option>
            <option value="4" {{if $conditions.lastvisit == 4}}selected{{/if}}>半年内</option>
            <option value="5" {{if $conditions.lastvisit == 5}}selected{{/if}}>一年内</option>
            <option value="6" {{if $conditions.lastvisit == 6}}selected{{/if}}>一年前</option>
        </select>
        <button id="search" class="btn" type="button" onclick="Controller.search('admin/user/search')"><i class="icon-search"></i></button>
    </form>
</div>
{{if $users}}
    <form id="lpform" name="lpform" method="post" action="/admin/user/delete">
    <table class="tb tb2">
        <tr class="header">
            <th width="60">选择</th>
            <th width="60">UID</th>
            <th class="tdl">帐号</th>
            <th>姓名</th>
            <th>用户组</th>
            <th>Email</th>
            <th>注册 IP</th>
            <th>最后访问 IP</th>
            <th>注册时间</th>
            <th>操作</th>
        </tr>
        {{foreach from=$users item=user}}
            <tr>
                <td>
                	{{if $user.uid != '1' && $user.uid != $cuid}}
                	<input type="checkbox" name="id[]" value="{{$user.uid}}" />
                    {{/if}}
                </td>
                <td>{{$user.uid}}</td>
                <td class="tdl"><a href="javascript:void(0);" onclick="Controller.controller('修改用户', 'admin/user/edit/uid/{{$user.uid}}')">{{$user.username}}</a></td>
                <td>{{$user.realname}}</td>
                <td>{{$usergroups[$user.gid].title}}</td>
                <td>{{$user.email}}</td>
                <td>{{$user.regip}}</td>
                <td>{{$user.lastip}}</td>
                <td>{{$user.regtime|idate:"Y-m-d"}}</td>
                <td>
                    {{if $sgid==1}}
                        <a href="javascript:;" onclick="Controller.controller('修改用户', 'admin/user/edit/uid/{{$user.uid}}')">编辑</a>
                        {{if $user.gid == 1 && $user.uid != 1}}
                        <a href="javascript:;" onclick="Controller.controller('设置权限', 'admin/user/priv/uid/{{$user.uid}}')">权限</a>
                        {{/if}}
                    {{/if}}
                </td>
            </tr>
        {{/foreach}}
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl">
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/user/', 'delete')">删除</button>
            </td>
            <td colspan="11" align="right">{{include file="admin/pages.tpl"}}</td>
        </tr>
    </table>
    </form>
{{else}}
    <table class="tb tb2">
        <tr>
            <th class="partition" colspan="12">未找到符合条件的用户</th>
        </tr>
    </table>
{{/if}}
{{include file="admin/footer.tpl"}}