<?php /* vpcvcms compiled created on 2018-11-08 15:22:49
         compiled from admin/nav_info.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul id="mtab">
        <li class="btn active btn-info" tab="general">基本信息</li>
        <li class="btn btn-info" tab="seo">优化信息</li>
    </ul>
</div>
<form name="cpform" method="post" action="/admin/nav/edit" id="cpform" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr class="noborder">
            <td class="first">导航名称</td>
        	<td class="next">
                <input name="name" value="<?php echo $this->_tpl_vars['nav']['name']; ?>
" type="text" class="txt" />
            </td>
            <td class="first">英文名称</td>
            <td class="next">
                <input name="ename" value="<?php echo $this->_tpl_vars['nav']['ename']; ?>
" type="text" class="txt" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">导航图标</td>
            <td class="next">
                <div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                        <?php if ($this->_tpl_vars['nav']['icon']): ?>
                        <img width="120" height="90" src="<?php echo $this->_tpl_vars['nav']['icon']; ?>
" />
                        <?php endif; ?>
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" id="icon" name="icon" value="<?php echo $this->_tpl_vars['nav']['icon']; ?>
">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/upload_single.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </td>
            <td class="first">链接/目录</td>
            <td class="next">
                <input name="pinyin" value="<?php echo $this->_tpl_vars['nav']['pinyin']; ?>
" type="text" class="txt" datatype="Require" msg="" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">是否启用</td>
        	<td class="next">
                <input type="radio" name="useable" value="1" <?php if ($this->_tpl_vars['nav']['useable'] == '1'): ?>checked="checked"<?php endif; ?> />可用
                <input type="radio" name="useable" value="0" <?php if ($this->_tpl_vars['nav']['useable'] == '0'): ?>checked="checked"<?php endif; ?> />不可用
            </td>
            <td class="first">浏览权限</td>
            <td class="next">
                <input type="radio" name="isview" value="1" <?php if ($this->_tpl_vars['nav']['isview'] == '1'): ?>checked="checked"<?php endif; ?> /> 注册访问
                <input type="radio" name="isview" value="0" <?php if ($this->_tpl_vars['nav']['isview'] == '0'): ?>checked="checked"<?php endif; ?> /> 开放访问
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">模型</td>
            <td class="next">
                <select name="moduleid">
                    <option value="">请选择模型</option>
                    <?php $_from = T('module')->getList(array());if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module']):
?>
                    <option value="<?php echo $this->_tpl_vars['module']['mark']; ?>
"<?php if ($this->_tpl_vars['nav']['moduleid'] == $this->_tpl_vars['module']['mark']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['module']['title']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
            </td>
            <td class="first">新窗口打开</td>
            <td class="next">
                <input type="radio" name="newwindow" value="1" <?php if ($this->_tpl_vars['nav']['newwindow'] == '1'): ?>checked="checked"<?php endif; ?> />是
                <input type="radio" name="newwindow" value="0" <?php if ($this->_tpl_vars['nav']['newwindow'] == '0'): ?>checked="checked"<?php endif; ?> />否
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">类型</td>
            <td class="next" colspan="3">
                <input type="radio" name="style" value="1" <?php if ($this->_tpl_vars['nav']['style'] == '1'): ?>checked="checked"<?php endif; ?> />列表
                <input type="radio" name="style" value="2" <?php if ($this->_tpl_vars['nav']['style'] == '2'): ?>checked="checked"<?php endif; ?> />封面
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">封面模版</td>
            <td class="next" colspan="3">
                <input name="tempindex" value="<?php echo $this->_tpl_vars['nav']['tempindex']; ?>
" type="text" class="txt" datatype="Require" msg="" />
                <a class="btn btn-info gettemplate" href="javascript:;">选择</a>
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">列表模版</td>
            <td class="next" colspan="3">
                <input name="templist" value="<?php echo $this->_tpl_vars['nav']['templist']; ?>
" type="text" class="txt" datatype="Require" msg="" />
                <a class="btn btn-info gettemplate" href="javascript:;">选择</a>
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">文章模版</td>
            <td class="next" colspan="3">
                <input name="temparticle" value="<?php echo $this->_tpl_vars['nav']['temparticle']; ?>
" type="text" class="txt" datatype="Require" msg="" />
                <a class="btn btn-info gettemplate" href="javascript:;">选择</a>
            </td>
        </tr>
        
        <tr class="noborder">
            <td class="td27 first">导航描述</td>
        	<td class="vtop next" colspan="3">
            <?php echo $this->_tpl_vars['body']; ?>

            </td>
        </tr>
    </table>
    <table class="mtb mtb-hide" id="seo-table">
        <tr class="noborder">
            <td class="first">META Title</td>
        	<td class="vtop next" colspan="3">
                <input name="seotitle" type="text" class="txt" value="<?php echo $this->_tpl_vars['nav']['seotitle']; ?>
" size="100" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">META Keywords</td>
        	<td class="vtop next" colspan="3">
                <input name="keywords" type="text" class="txt" value="<?php echo $this->_tpl_vars['nav']['keywords']; ?>
" size="100" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">META Description</td>
        	<td class="vtop next" colspan="3">
                <textarea  rows="6" name="description" cols="100" class="tarea"><?php echo $this->_tpl_vars['nav']['description']; ?>
</textarea>
            </td>
        </tr>
    </table>
    <!-- <div class="btnfix"> -->
        <input type="hidden" name="action" value="edit" />
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['nav']['id']; ?>
" />
        <!-- <input type="submit" class="btn btn-success" name="submit" value="提交" /> -->
    <!-- </div> -->
</form>