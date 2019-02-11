<?php /* vpcvcms compiled created on 2018-11-08 15:16:41
         compiled from common/header.tpl */ ?>
<!-- 头部 -->
<header>
	<div class="block clearfix">
		<div id="logo"></div>
		<ul id="menu">
			<li><a href="/" class="<?php if (! $this->_tpl_vars['topid']): ?>menuactive<?php endif; ?>">主页</a></li>
			<?php $_from = T('channel')->getList(array());if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['channel']):
?>
			<li><a href="<?php echo $this->_tpl_vars['channel']['url']; ?>
" class="<?php if ($this->_tpl_vars['channel']['id'] == $this->_tpl_vars['topid']): ?>menuactive<?php else: ?><?php endif; ?>"><?php echo $this->_tpl_vars['channel']['name']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
		<div class="search">
			<form action="/index/index/search" method="post">
				<input type="text" class="input" name="keyword" value="<?php echo $this->_tpl_vars['keyword']; ?>
" />
				<button class="submit"><i class="icon-search"></i></button>
			</form>
		</div>
	</div>
</header>
<!-- 头部 END -->