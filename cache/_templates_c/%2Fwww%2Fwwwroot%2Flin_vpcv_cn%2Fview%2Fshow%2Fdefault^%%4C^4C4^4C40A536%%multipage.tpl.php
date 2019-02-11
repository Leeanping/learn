<?php /* vpcvcms compiled created on 2018-12-12 09:34:52
         compiled from common/multipage.tpl */ ?>
<style type="text/css">
.pages{ padding: 20px 0; }
.pages li{ float: left; font-size: 14px;border:1px solid #f1f1f1;border-left: none;padding: 0; }
.pages li.total,.pages li.totalpage{padding: 9px 15px;background:#fff; color: #666;}
.pages li a{padding: 9px 15px; display: block;background:#fff; color: #666;}
.pages li.total{border-left:1px solid #f1f1f1;}
.pages li.active a,.pages li a:hover{background: #009688; color: #fff;}
</style>
<?php if ($this->_tpl_vars['multipage']): ?>
<div class="pages clearfix">
	<ul>
    <?php $_from = $this->_tpl_vars['multipage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page']):
?>
    	<?php if ($this->_tpl_vars['page']['total']): ?>
    	<li class="total"><?php echo $this->_tpl_vars['page']['total']; ?>
</li>
    	<?php endif; ?>
    	<?php if ($this->_tpl_vars['page']['totalpage']): ?>
    	<li class="totalpage"><?php echo $this->_tpl_vars['page']['totalpage']; ?>
</li>
    	<?php endif; ?>
    	<?php if ($this->_tpl_vars['page']['prev']): ?>
    	<li class="prev"><a href="<?php echo $this->_tpl_vars['page']['prev']['1']; ?>
"><?php echo $this->_tpl_vars['page']['prev']['0']; ?>
</a></li>
    	<?php endif; ?>
    	<?php $_from = $this->_tpl_vars['page']['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
    		<?php if ($this->_tpl_vars['p']['1']): ?>
    		<li><a <?php if ($this->_tpl_vars['p']['2']): ?>class="<?php echo $this->_tpl_vars['p']['2']; ?>
"<?php endif; ?> href="<?php echo $this->_tpl_vars['p']['1']; ?>
"><?php echo $this->_tpl_vars['p']['0']; ?>
</a></li>
    		<?php else: ?>
    		<li class="active"><a href="javascript:;"><?php echo $this->_tpl_vars['p']['0']; ?>
</a></li>
    		<?php endif; ?>
    	<?php endforeach; endif; unset($_from); ?>
    	<?php if ($this->_tpl_vars['page']['next']): ?>
    	<li class="next"><a href="<?php echo $this->_tpl_vars['page']['next']['1']; ?>
"><?php echo $this->_tpl_vars['page']['next']['0']; ?>
</a></li>
    	<?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    </ul>
</div>
<?php endif; ?>