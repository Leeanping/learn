<?php /* vpcvcms compiled created on 2018-11-14 09:26:40
         compiled from admin/pages.tpl */ ?>
<?php if ($this->_tpl_vars['multipage']): ?>
<div id="pagination" class="pagination">
	<?php $_from = $this->_tpl_vars['multipage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
		<?php if ($this->_tpl_vars['page']['total']): ?>
		<button class="btn total" disabled="disabled"><?php echo $this->_tpl_vars['page']['total']; ?>
</button>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['page']['totalpage']): ?>
		<button class="btn totalpage" disabled="disabled"><?php echo $this->_tpl_vars['page']['totalpage']; ?>
</button>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['page']['prev']): ?>
		<a class="btn prev" href="javascript:;" onclick="Controller.main('<?php echo $this->_tpl_vars['page']['prev']['1']; ?>
')"><?php echo $this->_tpl_vars['page']['prev']['0']; ?>
</a>
		<?php endif; ?>
		<?php $_from = $this->_tpl_vars['page']['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
			<?php if ($this->_tpl_vars['p']['1']): ?>
			<a class="btn" href="javascript:;" onclick="Controller.main('<?php echo $this->_tpl_vars['p']['1']; ?>
')"><?php echo $this->_tpl_vars['p']['0']; ?>
</a>
			<?php else: ?>
			<button class="btn active" disabled="disabled"><?php echo $this->_tpl_vars['p']['0']; ?>
</button>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		<?php if ($this->_tpl_vars['page']['next']): ?>
		<a class="btn prev" href="javascript:;" onclick="Controller.main('<?php echo $this->_tpl_vars['page']['next']['1']; ?>
')"><?php echo $this->_tpl_vars['page']['next']['0']; ?>
</a>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>