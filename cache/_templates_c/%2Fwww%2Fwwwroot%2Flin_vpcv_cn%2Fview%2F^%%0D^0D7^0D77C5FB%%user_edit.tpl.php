<?php /* vpcvcms compiled created on 2018-11-08 16:28:30
         compiled from admin/user_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'idate', 'admin/user_edit.tpl', 45, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form id="cpform" name="cpform" method="post" action="/admin/user/edit">
<input type="hidden" name="action" value="edit" />
<input type="hidden" name="uid" value="<?php echo $this->_tpl_vars['conditions']['uid']; ?>
" />
<input type="hidden" name="username" value="<?php echo $this->_tpl_vars['conditions']['username']; ?>
" />
<table class="mtb">
    <tr class="noborder">
        <td class="first">账号</td>
        <td class="vtop next"><?php echo $this->_tpl_vars['conditions']['username']; ?>
</td>
    </tr>
    <tr class="noborder">
        <td class="first">密码</td>
        <td class="vtop next"><input type="password" class="txt" id="password" name="password" /> 留空则不修改</td>
    </tr>
    <tr class="noborder">
        <td class="first">用户组</td>
        <td class="vtop next">
            <select name="gid" datatype="Require" msg="用户组">
                <option value="">请选择用户组</option>
                <?php $_from = $this->_tpl_vars['usergroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['group']):
?>
                <option value="<?php echo $this->_tpl_vars['key']; ?>
"<?php if ($this->_tpl_vars['conditions']['gid'] == $this->_tpl_vars['key']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['group']['title']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
            </select>
        </td>
    </tr>
    <tr class="noborder">
        <td class="first">姓名</td>
        <td class="vtop next"><input type="text" class="txt" id="realname" name="realname" value="<?php echo $this->_tpl_vars['conditions']['realname']; ?>
" datatype="Require"  msg="请填写姓名"/></td>
    </tr>
    <tr class="noborder">
        <td class="first">Email</td>
        <td class="vtop next"><input type="text" class="txt" id="email" name="email" value="<?php echo $this->_tpl_vars['conditions']['email']; ?>
" datatype="Email" msg="请填写正确的Email地址"/></td>
    </tr>
    <tr class="noborder">
        <td class="first">电话</td>
        <td class="vtop next"><input type="text" class="txt" id="telephone" name="telephone" value="<?php echo $this->_tpl_vars['conditions']['telephone']; ?>
" /></td>
    </tr>
    <tr class="noborder">
        <td class="first">注册IP</td>
        <td class="vtop next"><?php echo $this->_tpl_vars['conditions']['regip']; ?>
</td>
    </tr>
    <tr class="noborder">
        <td class="first">注册时间</td>
        <td class="vtop next"><?php echo ((is_array($_tmp=$this->_tpl_vars['conditions']['regtime'])) ? $this->_run_mod_handler('idate', true, $_tmp, 'Y-m-d') : smarty_modifier_idate($_tmp, 'Y-m-d')); ?>
</td>
    </tr>
    <tr class="noborder">
        <td class="first">最后访问IP</td>
        <td class="vtop next"><?php echo $this->_tpl_vars['conditions']['lastip']; ?>
</td>
    </tr>
    <tr class="noborder">
        <td class="first">最后访问时间</td>
        <td class="vtop next"><?php echo ((is_array($_tmp=$this->_tpl_vars['conditions']['lastvisit'])) ? $this->_run_mod_handler('idate', true, $_tmp, 'Y-m-d') : smarty_modifier_idate($_tmp, 'Y-m-d')); ?>
</td>
    </tr>
</table>
<!-- <div class="btnfix">
    <input type="submit" class="btn btn-success" name="vpbtn" value="点击提交" />
</div> -->
</form>
<script type="text/javascript">
    $(function(){
        //setDate(<?php echo $this->_tpl_vars['conditions']['birthyear']; ?>
, <?php echo $this->_tpl_vars['conditions']['birthmonth']; ?>
, <?php echo $this->_tpl_vars['conditions']['birthday']; ?>
);
    })
    function setDate(yearVal, monthVal, dayVal){
        var year = $("#birthyear");
        var month = $("#birthmonth");
        var day = $("#birthday");
        var daysInMonth = [31,31,28,31,30,31,30,31,31,30,31,30,31];
        if(((yearVal%4 == 0) && (yearVal%100 != 0)) || (yearVal%400 == 0))
        {
            daysInMonth[2] = 29;
        }
        var dayCount = daysInMonth[monthVal];
        year.get(0).options.length = 0;
        var curData = new Date();
        for(var i=1950;i<=curData.getFullYear();i++)
        {
            var option = new Option(i+'年', i);
            if (i == yearVal) {
                option.selected = true;
            }
            year.get(0).options.add(option);
        }
        month.get(0).options.length = 0;
        for(var i=1;i<=12;i++)
        {
            var option = new Option(i+'月', i);
            if (i == monthVal) {
                option.selected = true;
            }
            month.get(0).options.add(option);
        }
        day.get(0).options.length = 0;
        for(var i=0;i<dayCount;i++)
        {
            option = new Option(i+1+'日', i+1);
            if(i == dayVal-1)
            {
                option.selected = true;
            }
            day.get(0).options.add(option);
        }
        $('#star').html(star(monthVal, dayVal));
    }
    function star(month, day){
        var num = month * 100 + day * 1;
        if (num >= 120 && num <= 218){
            return "水瓶座";
        }else if (num >= 219 && num <= 320){
            return "双鱼座";
        }else if (num >= 321 && num <= 420){
            return "白羊座";
        }else if (num >= 421 && num <= 520){
            return "金牛座";
        }else if (num >= 521 && num <= 621){
            return "双子座";
        }else if (num >= 622 && num <= 722){
            return "巨蟹座";
        }else if (num >= 723 && num <= 822){
            return "狮子座";
        }else if (num >= 823 && num <= 922){
            return "处女座";
        }else if (num >= 923 && num <= 1022){
            return "天秤座";
        }else if (num >= 1023 && num <= 1121){
            return "天蝎座";
        }else if (num >= 1122 && num <= 1221){
            return "射手座";
        }else if (num >= 1222 || num <= 119){
            return "摩羯座";
        }
    }
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>