<?php /* vpcvcms compiled created on 2018-11-08 16:29:07
         compiled from admin/config_site_add.tpl */ ?>
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
        <?php $_from = $this->_tpl_vars['configs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['config']):
?>
        <tr class="noborder">
            <td class="first">
                <a href="javascript:;" onclick="Controller.deleteOne('admin/config/delete/cfgname/<?php echo $this->_tpl_vars['config']['cfgname']; ?>
')">[删除]</a>
                <?php echo $this->_tpl_vars['config']['title']; ?>

            </td>
            <td class="vtop next" colspan="3">
                <input type="text" class="txt" value="<?php echo $this->_tpl_vars['config']['config']; ?>
" name="config[site][<?php echo $this->_tpl_vars['config']['cfgname']; ?>
]" />
                <?php echo $this->_tpl_vars['config']['cfgname']; ?>

            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
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