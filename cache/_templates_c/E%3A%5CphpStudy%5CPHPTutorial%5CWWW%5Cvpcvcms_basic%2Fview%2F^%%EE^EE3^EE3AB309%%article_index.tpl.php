<?php /* vpcvcms compiled created on 2018-11-08 10:57:02
         compiled from admin/article_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin/article_index.tpl', 98, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="floattop">
    <ul>
        <li class="btn btn-info" onclick="Controller.controller('发布内容','admin/article/add')">添加</li>
    </ul>
</div>
<div class="input-append">
	<form method="post" action="/admin/article/index" id="pform">
        <select name="catid">
            <option value="">请选择栏目</option>
            <?php $_from = T('channel')->getList(array('useable' => '0', 'channel' => 'all'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['channel']):
?>
            <option value="<?php echo $this->_tpl_vars['channel']['id']; ?>
"<?php if ($this->_tpl_vars['conditions']['catid'] == $this->_tpl_vars['channel']['id']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['channel']['name']; ?>
</option>
            <?php $_from = T('channel')->getList(array('parentid' => $this->_tpl_vars['channel']['id'], 'channel' => 'all'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
            <option value="<?php echo $this->_tpl_vars['child']['id']; ?>
"<?php if ($this->_tpl_vars['conditions']['catid'] == $this->_tpl_vars['child']['id']): ?> selected<?php endif; ?>>--<?php echo $this->_tpl_vars['child']['name']; ?>
</option>
            <?php $_from = T('channel')->getList(array('parentid' => $this->_tpl_vars['child']['id'], 'channel' => 'all'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['childer']):
?>
            <option value="<?php echo $this->_tpl_vars['childer']['id']; ?>
"<?php if ($this->_tpl_vars['conditions']['catid'] == $this->_tpl_vars['childer']['id']): ?> selected<?php endif; ?>>----<?php echo $this->_tpl_vars['childer']['name']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
            <?php endforeach; endif; unset($_from); ?>
            <?php endforeach; endif; unset($_from); ?>
        </select>
        <select name="moduleid">
            <option value="">请选择模型</option>
            <?php $_from = T('module')->getList(array());if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module']):
?>
            <option value="<?php echo $this->_tpl_vars['module']['mark']; ?>
"<?php if ($this->_tpl_vars['conditions']['moduleid'] == $this->_tpl_vars['module']['mark']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['module']['title']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
        <input type="text" name="title" id="title" placeholder="请输入关键字" value="<?php if ($this->_tpl_vars['conditions']['title']): ?><?php echo $this->_tpl_vars['conditions']['title']; ?>
<?php endif; ?>" onclick="this.value=''" size="15"/>
        <button id="search" class="btn" type="button" onclick="Controller.search('admin/article/index')"><i class="icon-search"></i></button>
    </form>
</div>
<form method="post" action="/admin/article/more" name="lpform" id="lpform">
    <table class="tb">
        <tr>
            <td>
                <button name="chkall" id="chkall" class="btn btn-primary" title="全选" type="button" onclick="checkAll(this.form, 'id[]')">全选</button>
            </td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/article/', 'more')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/article/', 'delete')">删除</button>
            </td>
            <td colspan="10" align="right"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/pages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
        </tr>
        <tr class="header">
            <th width="60">选择</th>
            <th width="60">ID</th>
            <th width="60">排序</th>
            <th class="tdl">标题</th>
            <th>分类</th>
            <th>模块</th>
            <th>显示</th>
            <th>置顶</th>
            <th>推荐</th>
            <th>首页显示</th>
            <th>点击量</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>
        <?php $_from = $this->_tpl_vars['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
        <tr class="hover">
            <td class="td25">
                <input class="checkbox" type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />
            </td>
            <td class="td25">
                <?php echo $this->_tpl_vars['article']['id']; ?>

            </td>
            <td class="td25">
                <input type="text" size="2" name="sort[<?php echo $this->_tpl_vars['article']['id']; ?>
]" value="<?php echo $this->_tpl_vars['article']['sort']; ?>
" />
                
            </td>
            <td class="tdl">
                <?php echo $this->_tpl_vars['article']['title']; ?>

            </td>
            <td class="td25">
                <?php echo $this->_tpl_vars['article']['catname']; ?>

            </td>
            <td class="td25">
                <?php echo $this->_tpl_vars['article']['modulename']; ?>

            </td>
            <td class="td25">
                <input type="checkbox" name="useable[<?php echo $this->_tpl_vars['article']['id']; ?>
]" value="1"<?php if ($this->_tpl_vars['article']['useable']): ?> checked<?php endif; ?> />
            </td>
            <td class="td25">
                <input type="checkbox" name="istop[<?php echo $this->_tpl_vars['article']['id']; ?>
]" value="1"<?php if ($this->_tpl_vars['article']['istop']): ?> checked<?php endif; ?> />
                
            </td>
            <td class="td25">
                <input type="checkbox" name="isspecial[<?php echo $this->_tpl_vars['article']['id']; ?>
]" value="1"<?php if ($this->_tpl_vars['article']['isspecial']): ?> checked<?php endif; ?> />
                
            </td>
            <td class="td25">
                <input type="checkbox" name="isindex[<?php echo $this->_tpl_vars['article']['id']; ?>
]" value="1"<?php if ($this->_tpl_vars['article']['isindex']): ?> checked<?php endif; ?> />
                
            </td>
            <td class="td25">
                <?php echo $this->_tpl_vars['article']['shownum']; ?>

            </td>
            <td class="td25">
                <?php echo ((is_array($_tmp=$this->_tpl_vars['article']['addtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>

            </td>
            <td class="td25">
                <a href="javascript:void(0);" onclick="Controller.controller('修改内容','admin/article/edit/id/<?php echo $this->_tpl_vars['article']['id']; ?>
')">编辑</a>
            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr>
            <td>
                <button name="chkall" id="chkall" class="btn btn-primary" title="全选" type="button" onclick="checkAll(this.form, 'id[]')">全选</button>
            </td>
            <td class="tdl" colspan="2">
                <button class="btn btn-success" type="submit" onclick="Controller.update('admin/article/', 'more')">修改</button>
                <button class="btn btn-danger" type="submit" onclick="Controller.delete('admin/article/', 'delete')">删除</button>
            </td>
            <td colspan="10" align="right"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/pages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
        </tr>
    </table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>