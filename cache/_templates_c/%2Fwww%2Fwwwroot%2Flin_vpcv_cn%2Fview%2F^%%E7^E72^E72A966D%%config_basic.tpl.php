<?php /* vpcvcms compiled created on 2018-11-09 18:44:41
         compiled from admin/config_basic.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'idate', 'admin/config_basic.tpl', 61, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul>
        <li class="btn btn-info" onclick="Controller.main('<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/config/basic/issingle/1')"><span>基本设置</span></li>
        <li class="btn btn-info" onclick="Controller.main('<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/config/basic/issingle/1/isadd/1')"><span>附加设置</span></li>
        <li class="btn btn-info" onclick="Controller.controller('增加基础设置','admin/config/add/group/basic')"><span>增加设置</span></li>
    </ul>
</div>
<form action="/admin/config/basic" method="post" id="cpform" name="cpform">
    <table class="mtb">
        <tr class="noborder">
            <td class="first">缩略图宽度</td>
            <td class="vtop next">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'thumb_width','group' => 'basic','default' => '240'), $this);?>
" datatype="Require" msg="请填写宽度" name="config[basic][thumb_width]" /> thumb_width
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">缩略图高度</td>
            <td class="vtop next">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'thumb_height','group' => 'basic','default' => '180'), $this);?>
" datatype="Require" msg="请填写高度" name="config[basic][thumb_height]" /> thumb_height
            </td>
        </tr>
        <tr class="noborder">
            <td  class="first">每页显示数量(前台)</td>
            <td class="vtop next">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'page_size','group' => 'basic','default' => '20'), $this);?>
" datatype="Require" msg="请填写每页数量" name="config[basic][page_size]" /> page_size
            </td>
        </tr>
        <tr class="noborder">
            <td  class="first">每页显示数量(后台)</td>
            <td class="vtop next">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'admin_page_size','group' => 'basic','default' => '20'), $this);?>
" datatype="Require" msg="请填写每页数量" name="config[basic][admin_page_size]" /> admin_page_size
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">Cookie 前缀</td>
            <td class="vtop next">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'cookiepre','group' => 'basic','default' => 't_'), $this);?>
" datatype="Require" msg="请填写Cookie前缀" name="config[basic][cookiepre]" /> 用于区分本站 cookie，默认为 t_，请不要随便修改
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">Cookie 域</td>
            <td class="vtop next">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'cookiedomain','group' => 'basic','default' => ""), $this);?>
" name="config[basic][cookiedomain]" />
                默认为空，建议不要随便修改
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">会话保持时间（分钟）</td>
            <td class="vtop next">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'cookietime','group' => 'basic','default' => '30'), $this);?>
"  datatype="Number" msg="请填写Cookie时间" name="config[basic][cookietime]" /> 默认为 30</td>
        </tr>
        <tr class="noborder">
            <td class="first">默认时区</td>
            <td class="vtop next">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'timezone','group' => 'basic','default' => '8'), $this);?>
" name="config[basic][timezone]" datatype="Number" msg="请填写默认时区" /> 当地时间与 GMT 的时差，默认为 8（北京时区），请不要随便修改</td>
        </tr>
        <tr class="noborder">
            <td class="first">时间修正(秒)</td>
            <td class="vtop next">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'timemodify','group' => 'basic','default' => '0'), $this);?>
" name="config[basic][timemodify]" datatype="Int" msg="请填写时间修正" /> 当服务器时间误差时使用此功能 修正后时间<?php echo ((is_array($_tmp=$this->_tpl_vars['righttime'])) ? $this->_run_mod_handler('idate', true, $_tmp, "m月d日 H:i") : smarty_modifier_idate($_tmp, "m月d日 H:i")); ?>
</td>
        </tr>
        <tr class="noborder">
            <td class="first">默认日志标识</td>
            <td class="vtop next">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'logprefix','group' => 'basic','default' => '___'), $this);?>
" name="config[basic][logprefix]" datatype="Require" msg="请填写日志标识" />  请不要随便修改</td>
        </tr>
        <tr class="noborder">
            <td class="first">开启访问列表</td>
            <td class="vtop next">
                <?php $this->assign('_stat',  $this->_reg_objects['TO'][0]->cfg(array('key' => 'stat','group' => 'basic','default' => '0'), $this));?>
                <label><input type="radio" class="radio" name="config[basic][stat]"<?php if ($this->_tpl_vars['_stat'] == 1): ?> checked="checked"<?php endif; ?> value="1" />开启</label>
                <label><input type="radio" class="radio" name="config[basic][stat]"<?php if ($this->_tpl_vars['_stat'] == 0): ?> checked="checked"<?php endif; ?> value="0" />关闭</label>
                是否记录用户的访问
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">Debug 模式</td>
            <td class="vtop next">
                <?php $this->assign('_rundebug',  $this->_reg_objects['TO'][0]->cfg(array('key' => 'rundebug','group' => 'basic','default' => '0'), $this));?>
                <label><input type="radio" class="radio" name="config[basic][rundebug]"<?php if ($this->_tpl_vars['_rundebug'] == 1): ?> checked="checked"<?php endif; ?> value="1" />开启</label>
                <label><input type="radio" class="radio" name="config[basic][rundebug]"<?php if ($this->_tpl_vars['_rundebug'] == 0): ?> checked="checked"<?php endif; ?> value="0" />关闭</label>
                网站出现问题时的调试，默认为关闭
            </td>
        </tr>
    </table>
    <div class="btnfix">
    	<input type="submit" name="editsubmit" value="提交" class="btn btn-success" tabindex="3" />
    </div>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>