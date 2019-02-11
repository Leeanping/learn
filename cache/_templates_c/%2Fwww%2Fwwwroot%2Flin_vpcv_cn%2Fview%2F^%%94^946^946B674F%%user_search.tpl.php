<?php /* vpcvcms compiled created on 2018-11-08 16:20:00
         compiled from admin/user_search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'idate', 'admin/user_search.tpl', 71, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul>
        <li class="btn btn-info">用户管理</li>
        <li class="btn btn-info" onclick="Controller.controller('添加用户','admin/user/add')">添加用户</li>
    </ul>
</div>
<div class="input-append">
    <form id="pform" name="pform" method="post" action="/admin/user/search">
        <select name="type">
            <option value="email" <?php if ($this->_tpl_vars['conditions']['type'] == 'email'): ?>selected<?php endif; ?>>Email</option>
            <option value="username" <?php if ($this->_tpl_vars['conditions']['type'] == 'username'): ?>selected<?php endif; ?>>帐号</option>
        </select>
        <input type="text" name="keyword" placeholder="关键字" value="<?php if ($this->_tpl_vars['conditions']['keyword']): ?><?php echo $this->_tpl_vars['conditions']['keyword']; ?>
<?php endif; ?>" class="txt" onclick="this.value=''" size="8" />
        <select id="gid" name="gid">
            <option value="0">用户组</option>
            <?php $_from = $this->_tpl_vars['usergroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gid'] => $this->_tpl_vars['group']):
?>
                <option value="<?php echo $this->_tpl_vars['gid']; ?>
" <?php if ($this->_tpl_vars['conditions']['gid'] == $this->_tpl_vars['gid']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['group']['title']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
        <select name="regdate">
            <option value="0">注册时间</option>
            <option value="1" <?php if ($this->_tpl_vars['conditions']['regdate'] == 1): ?>selected<?php endif; ?>>一周内</option>
            <option value="2" <?php if ($this->_tpl_vars['conditions']['regdate'] == 2): ?>selected<?php endif; ?>>两周内</option>
            <option value="3" <?php if ($this->_tpl_vars['conditions']['regdate'] == 3): ?>selected<?php endif; ?>>一月内</option>
            <option value="4" <?php if ($this->_tpl_vars['conditions']['regdate'] == 4): ?>selected<?php endif; ?>>半年内</option>
            <option value="5" <?php if ($this->_tpl_vars['conditions']['regdate'] == 5): ?>selected<?php endif; ?>>一年内</option>
            <option value="6" <?php if ($this->_tpl_vars['conditions']['regdate'] == 6): ?>selected<?php endif; ?>>一年前</option>
        </select>
        <select name="lastvisit">
            <option value="0">最后访问</option>
            <option value="1" <?php if ($this->_tpl_vars['conditions']['lastvisit'] == 1): ?>selected<?php endif; ?>>一周内</option>
            <option value="2" <?php if ($this->_tpl_vars['conditions']['lastvisit'] == 2): ?>selected<?php endif; ?>>两周内</option>
            <option value="3" <?php if ($this->_tpl_vars['conditions']['lastvisit'] == 3): ?>selected<?php endif; ?>>一月内</option>
            <option value="4" <?php if ($this->_tpl_vars['conditions']['lastvisit'] == 4): ?>selected<?php endif; ?>>半年内</option>
            <option value="5" <?php if ($this->_tpl_vars['conditions']['lastvisit'] == 5): ?>selected<?php endif; ?>>一年内</option>
            <option value="6" <?php if ($this->_tpl_vars['conditions']['lastvisit'] == 6): ?>selected<?php endif; ?>>一年前</option>
        </select>
        <button id="search" class="btn" type="button" onclick="Controller.search('admin/user/search')"><i class="icon-search"></i></button>
    </form>
</div>
<?php if ($this->_tpl_vars['users']): ?>
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
        <?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
            <tr>
                <td>
                	<?php if ($this->_tpl_vars['user']['uid'] != '1' && $this->_tpl_vars['user']['uid'] != $this->_tpl_vars['cuid']): ?>
                	<input type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['user']['uid']; ?>
" />
                    <?php endif; ?>
                </td>
                <td><?php echo $this->_tpl_vars['user']['uid']; ?>
</td>
                <td class="tdl"><a href="javascript:void(0);" onclick="Controller.controller('修改用户', 'admin/user/edit/uid/<?php echo $this->_tpl_vars['user']['uid']; ?>
')"><?php echo $this->_tpl_vars['user']['username']; ?>
</a></td>
                <td><?php echo $this->_tpl_vars['user']['realname']; ?>
</td>
                <td><?php echo $this->_tpl_vars['usergroups'][$this->_tpl_vars['user']['gid']]['title']; ?>
</td>
                <td><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
                <td><?php echo $this->_tpl_vars['user']['regip']; ?>
</td>
                <td><?php echo $this->_tpl_vars['user']['lastip']; ?>
</td>
                <td><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['regtime'])) ? $this->_run_mod_handler('idate', true, $_tmp, "Y-m-d") : smarty_modifier_idate($_tmp, "Y-m-d")); ?>
</td>
                <td>
                    <?php if ($this->_tpl_vars['sgid'] == 1): ?>
                        <a href="javascript:;" onclick="Controller.controller('修改用户', 'admin/user/edit/uid/<?php echo $this->_tpl_vars['user']['uid']; ?>
')">编辑</a>
                        <?php if ($this->_tpl_vars['user']['gid'] == 1 && $this->_tpl_vars['user']['uid'] != 1): ?>
                        <a href="javascript:;" onclick="Controller.controller('设置权限', 'admin/user/priv/uid/<?php echo $this->_tpl_vars['user']['uid']; ?>
')">权限</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr>
        	<td><button name="chkall" id="chkall" class="btn btn-primary" title="删除" type="button" onclick="checkAll(this.form, 'id[]')">全选</button></td>
            <td class="tdl">
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/user/', 'delete')">删除</button>
            </td>
            <td colspan="11" align="right"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/pages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
        </tr>
    </table>
    </form>
<?php else: ?>
    <table class="tb tb2">
        <tr>
            <th class="partition" colspan="12">未找到符合条件的用户</th>
        </tr>
    </table>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>