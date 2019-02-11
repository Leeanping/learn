<?php /* vpcvcms compiled created on 2018-11-08 16:19:07
         compiled from admin/config_site.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul>
        <li class="btn btn-info" onclick="Controller.main('<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/config/site/issingle/1')"><span>站点设置</span></li>
        <li class="btn btn-info" onclick="Controller.main('<?php echo $this->_tpl_vars['_pathroot']; ?>
admin/config/site/issingle/1/isadd/1')"><span>附加设置</span></li>
        <li class="btn btn-info" onclick="Controller.controller('增加站点设置','admin/config/add/group/site')"><span>增加设置</span></li>
    </ul>
</div>
<form action="/admin/config/site?postFlag" method="post" enctype="multipart/form-data" id="cpform" name="cpform">
    <table class="mtb">
        <tr class="noborder">
            <td class="first">网站名称</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][site_name]" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
" size="50" /> site_name</td>
        </tr>
        <tr class="noborder">
            <td class="first">主页名称</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][index_name]" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_name','group' => 'site','default' => "首页"), $this);?>
" size="50" /> index_name</td>
        </tr>
        <tr class="noborder">
            <td class="first">Email</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][site_email]" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_email','group' => 'site','default' => ""), $this);?>
" datatype="Email" msg="请填写管理Email" size="50"/> site_email</td>
        </tr>
        <tr class="noborder">
            <td class="first">联系电话</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][site_telephone]" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_telephone','group' => 'site','default' => ""), $this);?>
" size="50" /> site_telephone</td>
        </tr>
        <tr class="noborder">
            <td class="first">版权信息</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][site_powerby]" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_powerby','group' => 'site','default' => "Power By - 2014 致茂网络",'isreplace' => '1'), $this);?>
" size="50" /> site_powerby</td>
        </tr>
        <tr class="noborder">
            <td class="first">备案号</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][site_beian]" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_beian','group' => 'site','isreplace' => '1'), $this);?>
" size="50" /> site_beian</td>
        </tr>
        <tr class="noborder">
            <td class="first">站点缓存</td>
            <td class="vtop next" colspan="3">
                <?php $this->assign('_site_cache',  $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_cache','group' => 'site','default' => '0'), $this));?>
                <input type="radio" class="radio" name="config[site][site_cache]"<?php if ($this->_tpl_vars['_site_cache'] == 1): ?> checked="checked"<?php endif; ?> value="1" />开启
                <input type="radio" class="radio" name="config[site][site_cache]"<?php if ($this->_tpl_vars['_site_cache'] == 0): ?> checked="checked"<?php endif; ?> value="0" />关闭
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">站点关闭</td>
            <td class="vtop next" colspan="3">
                <?php $this->assign('_site_closed',  $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_closed','group' => 'site','default' => '0'), $this));?>
                <input type="radio" class="radio" name="config[site][site_closed]"<?php if ($this->_tpl_vars['_site_closed'] == 1): ?> checked="checked"<?php endif; ?> value="1" onclick="showObj('site_close');" />是
                <input type="radio" class="radio" name="config[site][site_closed]"<?php if ($this->_tpl_vars['_site_closed'] == 0): ?> checked="checked"<?php endif; ?> value="0" onclick="hideObj('site_close');"/>否
            </td>
        </tr>
        <tbody id="site_close" <?php if ($this->_tpl_vars['site_closed'] == 0): ?>style="display: none;"<?php endif; ?>>
            <tr class="noborder">
                <td class="first">关闭原因</td>
                <td class="vtop next" colspan="3">
                    <textarea  rows="6" name="config[site][site_close_prompt]" id="_site_close_prompt" cols="50" class="tarea"><?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_close_prompt','group' => 'site','default' => "系统维护中，请稍候......"), $this);?>
</textarea>
                </td>
            </tr>
        </tbody>
        <tr class="noborder">
            <td class="first">首页 META TITLE</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][index_seotitle]" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_seotitle','group' => 'site','default' => 'vpcv'), $this);?>
" size="50" /> index_seotitle</td>
        </tr>
        <tr class="noborder">
            <td class="first">首页 META KEYWORDS</td>
            <td class="vtop next" colspan="3"><input type="text" class="txt" name="config[site][index_keywords]" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => 'vpcv'), $this);?>
" size="50" /> index_keywords</td>
        </tr>
        <tr class="noborder">
            <td class="first">首页 META DESCRIPTION</td>
            <td class="vtop next" colspan="3">
                <textarea  rows="6" name="config[site][index_description]" id="index_description" cols="50" class="tarea"><?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => 'vpcv'), $this);?>
</textarea>
                index_description
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">站点二维码(site_weixin)</td>
            <td class="vtop next" colspan="3">
                <?php $this->assign('_site_weixin',  $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_weixin','group' => 'site','default' => ""), $this));?>
                <div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                        <?php if ($this->_tpl_vars['_site_weixin']): ?>
                        <img width="100" height="100" src="<?php echo $this->_tpl_vars['_site_weixin']; ?>
" />
                        <?php endif; ?>
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" name="config[site][site_weixin]" id="site_weixin" value="<?php echo $this->_tpl_vars['_site_weixin']; ?>
">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/upload_single.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">统计代码</td>
            <td class="vtop next" colspan="3">
                <textarea  rows="6" name="config[site][site_tj]" id="site_tj" cols="50" class="tarea"><?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_tj','group' => 'site','default' => ""), $this);?>
</textarea>
                site_tj
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