<?php /* vpcvcms compiled created on 2018-11-08 10:57:02
         compiled from admin/pages.tpl */ ?>
<?php if ($this->_tpl_vars['multipage']): ?>
<div id="pagination" class="pagination">
	<?php $_from = $this->_tpl_vars['multipage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
        <?php if ($this->_tpl_vars['page']['1']): ?>
            <a class="btn<?php if ($this->_tpl_vars['page']['2']): ?> <?php echo $this->_tpl_vars['page']['2']; ?>
<?php endif; ?>" href="javascript:;" onclick="Controller.main('<?php echo $this->_tpl_vars['page']['1']; ?>
')"><?php echo $this->_tpl_vars['page']['0']; ?>
</a>
        <?php else: ?>
            <button class="btn" disabled="disabled"><?php echo $this->_tpl_vars['page']['0']; ?>
</button>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>