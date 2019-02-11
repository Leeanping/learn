<?php /* vpcvcms compiled created on 2018-11-08 16:19:09
         compiled from admin/config_water.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<style type="text/css">
.radio-label{ border-top:1px solid #e4e2e2; border-left:1px solid #e4e2e2}
.radio-label td{ border-right:1px solid #e4e2e2; border-bottom:1px solid #e4e2e2;background:#f6f9fd; padding:4px 0 4px 8px; text-align:center;}
</style>
<div class="floattop">
    <ul>
        <li class="btn btn-info"><span>水印设置</span></li>
    </ul>
</div>
<form action="/admin/config/water" method="post" id="cpform" name="cpform">
    <table class="mtb">
    	<tr>
            <td class="td27" colspan="2">是否开启水印：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <?php $this->assign('_enable',  $this->_reg_objects['TO'][0]->cfg(array('key' => 'enable','group' => 'water','default' => '0'), $this));?>
                <label><input type="radio" class="radio" name="config[water][enable]"<?php if ($this->_tpl_vars['_enable'] == 1): ?> checked="checked"<?php endif; ?> value="1" />开启</label>
                <label><input type="radio" class="radio" name="config[water][enable]"<?php if ($this->_tpl_vars['_enable'] == 0): ?> checked="checked"<?php endif; ?> value="0" />关闭</label>
            </td>
            <td class="vtop tips2">是否开启上传图片附加水印</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">水印类型：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <?php $this->assign('_marktype',  $this->_reg_objects['TO'][0]->cfg(array('key' => 'marktype','group' => 'water','default' => 'text'), $this));?>
                <label><input type="radio" class="radio" name="config[water][marktype]"<?php if ($this->_tpl_vars['_marktype'] == 'text'): ?> checked="checked"<?php endif; ?> value="text" />文字</label>
                <label><input type="radio" class="radio" name="config[water][marktype]"<?php if ($this->_tpl_vars['_marktype'] == 'image'): ?> checked="checked"<?php endif; ?> value="image" />图片</label>
            </td>
            <td class="vtop tips2">选择水印的类型,图片支持gif、png格式</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">水印图片：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'markimg','group' => 'water','default' => 'resource/images/water.png'), $this);?>
" name="config[water][markimg]" />
            </td>
            <td class="vtop tips2">选择水印类型为图片时水印图片地址</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">水印文字：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'marktext','group' => 'water','default' => 'HST'), $this);?>
" name="config[water][marktext]" />
            </td>
            <td class="vtop tips2">选择水印类型为文字时所填写的文字</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">水印文字大小：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'fontsize','group' => 'water','default' => '12'), $this);?>
" name="config[water][fontsize]" />
            </td>
            <td class="vtop tips2">选择水印类型为文字时字体的大小</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">水印透明度：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform">
                <input type="text" class="txt" value="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'diaphaneity','group' => 'water','default' => '90'), $this);?>
" name="config[water][diaphaneity]" /></td><td class="vtop tips2">水印透明度（0—100，值越小越透明）</td>
        </tr>
        <tr>
            <td class="td27" colspan="2">水印位置：</td>
        </tr>
        <tr class="noborder">
            <td class="vtop rowform" colspan="2">
            	<?php $this->assign('_markpos',  $this->_reg_objects['TO'][0]->cfg(array('key' => 'markpos','group' => 'water','default' => '0'), $this));?>
            	<table width="100%" class="radio-label">
                	<tr>
                    	<td rowspan="3">
                        <input class="checkbox" name="config[water][markpos]" value="0" type="radio"<?php if ($this->_tpl_vars['_markpos'] == '0'): ?> checked="checked"<?php endif; ?> />
                        <label>随机位置</label>
                        </td>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="1" type="radio"<?php if ($this->_tpl_vars['_markpos'] == '1'): ?> checked="checked"<?php endif; ?> />
                        <label>顶部居左</label>
                        </td>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="2" type="radio"<?php if ($this->_tpl_vars['_markpos'] == '2'): ?> checked="checked"<?php endif; ?> />
                        <label>顶部居中</label>
                        </td>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="3" type="radio"<?php if ($this->_tpl_vars['_markpos'] == '3'): ?> checked="checked"<?php endif; ?> />
                        <label>顶部居右</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="4" type="radio"<?php if ($this->_tpl_vars['_markpos'] == '4'): ?> checked="checked"<?php endif; ?> />
                        <label>左边居中</label>
                        </td>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="5" type="radio"<?php if ($this->_tpl_vars['_markpos'] == '5'): ?> checked="checked"<?php endif; ?> />
                        <label>图片中心</label>
                        </td>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="6" type="radio"<?php if ($this->_tpl_vars['_markpos'] == '6'): ?> checked="checked"<?php endif; ?> />
                        <label>右边居中</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="7" type="radio"<?php if ($this->_tpl_vars['_markpos'] == '7'): ?> checked="checked"<?php endif; ?> />
                        <label>底部居左</label>
                        </td>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="8" type="radio"<?php if ($this->_tpl_vars['_markpos'] == '8'): ?> checked="checked"<?php endif; ?> />
                        <label>底部居中</label>
                        </td>
                        <td>
                        <input class="checkbox" name="config[water][markpos]" value="9" type="radio"<?php if ($this->_tpl_vars['_markpos'] == '9'): ?> checked="checked"<?php endif; ?> />
                        <label>底部居右</label>
                        </td>
                    </tr>
                </table>
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