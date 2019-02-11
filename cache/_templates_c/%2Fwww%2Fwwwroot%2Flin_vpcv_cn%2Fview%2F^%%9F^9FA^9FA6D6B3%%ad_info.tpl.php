<?php /* vpcvcms compiled created on 2018-11-08 16:26:00
         compiled from admin/ad_info.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'admin/ad_info.tpl', 16, false),array('modifier', 'date_format', 'admin/ad_info.tpl', 46, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<form name="cpform" method="post" action="/admin/ad/<?php echo $this->_tpl_vars['_postName']; ?>
" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr class="noborder">
            <td class="first">广告名称</td>
        	<td class="vtop next" colspan="3">
                <input name="adname" value="<?php echo $this->_tpl_vars['ad']['adname']; ?>
" type="text" class="txt" size="40" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">广告分类</td>
            <td class="vtop next" colspan="3">
                <select name="tagname" id="tagname" datatype="Require" msg="请选择广告分类">
                    <option value="">请选择</option>
                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['adposition'],'selected' => $this->_tpl_vars['ad']['tagname']), $this);?>

                </select>
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">栏目</td>
            <td class="vtop next" colspan="3">
                <select name="typeid" id="typeid" datatype="Require" msg="请选择栏目">
                    <option value="">请选择栏目</option>
                    <?php $_from = T('channel')->getList(array('useable' => '0', 'channel' => 'all'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['channel']):
?>
                    <option value="<?php echo $this->_tpl_vars['channel']['id']; ?>
"<?php if ($this->_tpl_vars['ad']['typeid'] == $this->_tpl_vars['channel']['id']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['channel']['name']; ?>
</option>
                    <?php $_from = T('channel')->getList(array('parentid' => $this->_tpl_vars['channel']['id'], 'channel' => 'all'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
                    <option value="<?php echo $this->_tpl_vars['child']['id']; ?>
"<?php if ($this->_tpl_vars['ad']['typeid'] == $this->_tpl_vars['child']['id']): ?> selected<?php endif; ?>>--<?php echo $this->_tpl_vars['child']['name']; ?>
</option>
                    <?php $_from = T('channel')->getList(array('parentid' => $this->_tpl_vars['child']['id'], 'channel' => 'all'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['childer']):
?>
                    <option value="<?php echo $this->_tpl_vars['childer']['id']; ?>
"<?php if ($this->_tpl_vars['ad']['typeid'] == $this->_tpl_vars['childer']['id']): ?> selected<?php endif; ?>>----<?php echo $this->_tpl_vars['childer']['name']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                    <?php endforeach; endif; unset($_from); ?>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">广告链接</td>
            <td class="vtop next" colspan="3">
                <input name="linkurl" value="<?php echo $this->_tpl_vars['ad']['linkurl']; ?>
" type="text" class="txt" size="80" />
            </td>
        </tr>
        <!--<tr><td colspan="2" class="td27">开始投放时间</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input type="text" name="starttime" id="starttime" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ad']['starttime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
" class="input" readonly onclick="showcalendar(0, event, this)" />
            </td>
            <td class="vtop tips2">请选择开始展示广告的时间</td>
        </tr>
        <tr><td colspan="2" class="td27">结束投放时间</td></tr>
        <tr class="noborder">
        	<td class="vtop rowform">
            <input type="text" name="endtime" id="endtime" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ad']['endtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
" class="input" readonly onclick="showcalendar(0, event, this)" />
            </td>
            <td class="vtop tips2">请选择结束展示广告的时间</td>
        </tr>-->
        <tr class="noborder">
            <td class="first">外部图片链接</td>
        	<td class="vtop next" colspan="3">
                <input name="outurl" value="<?php echo $this->_tpl_vars['ad']['outurl']; ?>
" type="text" class="txt" size="80" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">上传图片</td>
        	<td class="vtop" colspan="3">
            	<div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                        <?php if ($this->_tpl_vars['ad']['imgurl']): ?>
                        <img width="120" height="90" src="<?php echo $this->_tpl_vars['ad']['imgurl']; ?>
" />
                        <?php endif; ?>
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" id="imgurl" name="imgurl" value="<?php echo $this->_tpl_vars['ad']['imgurl']; ?>
">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/upload_single.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </td>
        </tr>
    </table>
    <!-- <div class="btnfix"> -->
        <input type="hidden" name="action" value="<?php echo $this->_tpl_vars['_postName']; ?>
" />
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['ad']['id']; ?>
" />
        <!-- <input type="submit" class="btn" name="submit" value="点击提交" /> -->
    <!-- </div> -->
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>