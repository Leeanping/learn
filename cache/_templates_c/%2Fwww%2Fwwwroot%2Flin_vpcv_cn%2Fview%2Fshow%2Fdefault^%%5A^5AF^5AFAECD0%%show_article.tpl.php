<?php /* vpcvcms compiled created on 2018-11-08 15:24:27
         compiled from article/show_article.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'article/show_article.tpl', 23, false),)), $this); ?>
<!doctype html>
<html>
    <head>
    	<title><?php echo $this->_tpl_vars['article']['seotitle']; ?>
_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
    	<meta name="keywords" content="<?php echo $this->_tpl_vars['article']['keywords']; ?>
" />
		<meta name="description" content="<?php echo $this->_tpl_vars['article']['description']; ?>
" />
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/style.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <link rel="stylesheet" type="text/css" href="/resource/css/article.css">
    </head>
    
    <body>
    	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div class="block">
            <div class="crumb">
                <a href="<?php echo $this->_tpl_vars['_pathroot']; ?>
"><i class="icon-home"></i> 首页</a>
                <?php echo $this->_tpl_vars['crumb']; ?>

            </div>
            <div class="article clearfix">
                <div class="article-l fl">
                    <div class="body-head">
                        <h2><?php echo $this->_tpl_vars['article']['title']; ?>
</h2>
                        <div class="info">
                            <span><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['updatetime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M')); ?>
</span>
                            <span>
                                <i class="icon-eye-open"></i> <?php echo $this->_tpl_vars['article']['shownum']; ?>

                            </span>
                        </div>
                    </div>
                    <div class="body"><?php echo $this->_tpl_vars['article']['content']; ?>
</div>
                    <div class="link clearfix">
                        <?php if ($this->_tpl_vars['prevnext']['prev']['id']): ?>
                        <a href="<?php echo $this->_tpl_vars['prevnext']['prev']['url']; ?>
" class="fl">上一篇：<?php echo $this->_tpl_vars['prevnext']['prev']['title']; ?>
</a>
                        <?php else: ?>
                        <a href="javascript:;" class="fl">上一篇：没有了</a>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['prevnext']['next']['id']): ?>
                        <a href="<?php echo $this->_tpl_vars['prevnext']['next']['url']; ?>
" class="fr">下一篇：<?php echo $this->_tpl_vars['prevnext']['next']['title']; ?>
</a>
                        <?php else: ?>
                        <a href="javascript:;" class="fr">下一篇：没有了</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="article-r fr">
                    <h3>为你推荐</h3>
                    <ul class="list">
                        <?php $_from = T('article')->getList(array('isspecial' => '1', 'num' => '10'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rec']):
?>
                        <li><a href="<?php echo $this->_tpl_vars['rec']['url']; ?>
"><?php echo $this->_tpl_vars['rec']['title']; ?>
</a></li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </body>
</html>