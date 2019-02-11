<?php /* vpcvcms compiled created on 2018-11-08 15:57:11
         compiled from article/list_article.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'article/list_article.tpl', 32, false),)), $this); ?>
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
        <div class="channel">
            <h2><?php echo $this->_tpl_vars['nav']['name']; ?>
</h2>
        </div>
        <div class="block">
            <div class="crumb">
                <a href="<?php echo $this->_tpl_vars['_pathroot']; ?>
"><i class="icon-home"></i> 首页</a>
                <?php echo $this->_tpl_vars['crumb']; ?>

            </div>
            <div class="article clearfix">
                <div class="article-l fl">
                    <ul class="list">
                        <?php $_from = $this->_tpl_vars['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>
                        <li class="clearfix">
                            <a href="<?php echo $this->_tpl_vars['news']['url']; ?>
" target="_blank">
                                <div class="image"><img src="<?php echo $this->_tpl_vars['news']['origin']; ?>
" width="100%"></div>
                                <div class="body">
                                    <h4><?php echo $this->_tpl_vars['news']['title']; ?>
</h4>
                                    <p class="des"><?php echo $this->_tpl_vars['news']['cutstr']; ?>
...</p>
                                    <p class="info">
                                        <span><?php echo ((is_array($_tmp=$this->_tpl_vars['news']['updatetime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</span>
                                        <span>
                                            <i class="icon-eye-open"></i> <?php echo $this->_tpl_vars['news']['shownum']; ?>

                                        </span>
                                    </p>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/multipage.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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