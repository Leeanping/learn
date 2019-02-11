<?php /* vpcvcms compiled created on 2018-11-08 00:32:12
         compiled from common/multipage.tpl */ ?>
<?php if ($this->_tpl_vars['multipage']): ?>
<div class="pages clearfix">
	<ul>
    <?php $_from = $this->_tpl_vars['multipage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
        <?php if ($this->_tpl_vars['page']['1']): ?>
            <li><a <?php if ($this->_tpl_vars['page']['2']): ?>class="<?php echo $this->_tpl_vars['page']['2']; ?>
"<?php endif; ?> href="<?php echo $this->_tpl_vars['page']['1']; ?>
"><?php echo $this->_tpl_vars['page']['0']; ?>
</a></li>
        <?php else: ?>
            <li><?php echo $this->_tpl_vars['page']['0']; ?>
</li>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    </ul>
</div>
<?php endif; ?>