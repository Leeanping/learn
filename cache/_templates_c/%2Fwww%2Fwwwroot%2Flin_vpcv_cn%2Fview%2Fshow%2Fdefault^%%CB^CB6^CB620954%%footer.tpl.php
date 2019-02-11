<?php /* vpcvcms compiled created on 2018-11-08 15:21:43
         compiled from common/footer.tpl */ ?>
<footer>
	<div class="block">
		<div class="link">
			<a href="javascropt:;">友情链接：</a>
			<?php $_from = T('link')->getList(array());if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
			<a href="<?php echo $this->_tpl_vars['link']['link']; ?>
" target="_blank"><?php echo $this->_tpl_vars['link']['name']; ?>
</a>
			<?php endforeach; endif; unset($_from); ?>
		</div>
		<div class="txt">
			<p><?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_powerby','group' => 'site','default' => ""), $this);?>
</p>
			<p><?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_beian','group' => 'site','default' => ""), $this);?>
</p>
			<p>联系电话：<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_telephone','group' => 'site','default' => ""), $this);?>
</p>
		</div>
	</div>
</footer>
<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_tj','group' => 'site','default' => ""), $this);?>