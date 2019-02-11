<?php /* vpcvcms compiled created on 2018-11-08 15:24:06
         compiled from wap/article/about.tpl */ ?>
<!doctype html>
<html>
    <head>
        <title><?php echo $this->_tpl_vars['nav']['seotitle']; ?>
_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
        <meta name="keywords" content="<?php echo $this->_tpl_vars['nav']['keywords']; ?>
" />
        <meta name="description" content="<?php echo $this->_tpl_vars['nav']['description']; ?>
" />
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/style.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </head>
    
    <body>
        <div class="header">
            <h3 class="m-top"><?php echo $this->_tpl_vars['nav']['name']; ?>
<a href="javascript:history.go(-1);"></a></h3>
        </div>
        <div class="main">
            <ul class="ul-tab tab2">
                <?php $_from = T('channel')->getList(array('parentid' => '12'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
                <?php if ($this->_tpl_vars['child']['id'] != 69): ?>
                <li<?php if ($this->_tpl_vars['child']['id'] == $this->_tpl_vars['nav']['id']): ?> class="on"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['child']['url']; ?>
"><?php echo $this->_tpl_vars['child']['name']; ?>
</a></li>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
            <div class="m-about">
                <div class="wp">
                    <div class="txt">
                        <?php echo $this->_tpl_vars['nav']['body']; ?>

                    </div>
                </div>
            </div>
        </div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </body>
</html>