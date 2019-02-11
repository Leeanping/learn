<?php /* vpcvcms compiled created on 2018-11-08 00:32:04
         compiled from index/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'index/index.tpl', 112, false),)), $this); ?>
<!doctype html>
<html>
    <head>
    	<title><?php echo C('index_seotitle', 'site', '首页');?>_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
    	<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
		<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/style.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <link type="text/css" href="/resource/css/index.css" rel="stylesheet" />
        <link type="text/css" href="/resource/css/swiper.min.css" rel="stylesheet" />
        <script type="text/javascript" src="/resource/js/swiper.min.js"></script>
    </head>
    
    <body>
    	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <!-- banner -->
        <div class="banner">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php $_from = T('ad')->getList(array('tagname' => 'pcindexFocus'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
                    <div class="swiper-slide">
                        <a href="<?php echo $this->_tpl_vars['adlist']['linkurl']; ?>
">
                            <img src="<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
" width="100%" />
                        </a>
                    </div>
                    <?php endforeach; endif; unset($_from); ?>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!-- banner END-->
        <section class="section-1">
            <h2>科技改变生活(演示板块一)</h2>
            <p class="brief">科技正用你无法想象的速度在改变世界，改变人们的生活</p>
            <ul class="block">
                <li>
                    <i class="icon-inbox"></i>
                    <h3>板块一</h3>
                    <p>板块一的简介，根据后台数据变换</p>
                </li>
                <li>
                    <i class="icon-heart"></i>
                    <h3>板块二</h3>
                    <p>板块二的简介，根据后台数据变换</p>
                </li>
                <li>
                    <i class="icon-leaf"></i>
                    <h3>板块三</h3>
                    <p>板块三的简介，根据后台数据变换</p>
                </li>
                <li>
                    <i class="icon-desktop"></i>
                    <h3>板块四</h3>
                    <p>板块四的简介，根据后台数据变换</p>
                </li>
            </ul>
        </section>
        <section class="section-2">
            <?php $_from = T('type')->getList(array('catid' => '3'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ptop']):
?>
            <h2><?php echo $this->_tpl_vars['ptop']['name']; ?>
(演示板块)</h2>
            <p class="brief"><?php echo $this->_tpl_vars['ptop']['description']; ?>
</p>
            <ul class="block child">
                <li>
                    <a class="active" href="<?php echo $this->_tpl_vars['ptop']['url']; ?>
">全部</a>
                </li>
                <?php $_from = T('channel')->getList(array('parentid' => $this->_tpl_vars['ptop']['id']));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pt']):
?>
                <li>
                    <a href="<?php echo $this->_tpl_vars['pt']['url']; ?>
"><?php echo $this->_tpl_vars['pt']['name']; ?>
</a>
                </li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
            <?php endforeach; endif; unset($_from); ?>
            <div class="list block">
                <ul>
                    <?php $_from = T('article')->getList(array('catid' => '3', 'isindex' => '1', 'num' => '8', 'extend' => 'price'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['good']):
?>
                    <li>
                        <a href="<?php echo $this->_tpl_vars['good']['url']; ?>
" target="_blank">
                            <div class="pic"><img src="<?php echo $this->_tpl_vars['good']['origin']; ?>
" width="100%" height="204"></div>
                            <h4><?php echo $this->_tpl_vars['good']['title']; ?>
</h4>
                            <p class="price">￥<?php echo $this->_tpl_vars['good']['extend']['price']; ?>
</p>
                        </a>
                    </li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
            </div>
        </section>
        <section>
            <h2>案例展示(演示板块)</h2>
            <p class="brief">分享最新科给你最美的展示</p>
            <div class="section-4 clearfix">
                <?php $_from = T('article')->getList(array('catid' => '4', 'isindex' => '1', 'num' => '8'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['case']):
?>
                <div class="item">
                    <a href="<?php echo $this->_tpl_vars['news']['url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['case']['origin']; ?>
" width="100%"></a>
                </div>
                <?php endforeach; endif; unset($_from); ?>
            </div>
        </section>
        <section>
            <h2>新闻资讯(演示板块)</h2>
            <p class="brief">分享最新科技资讯，关注智能硬件</p>
            <div class="section-3 block">
                <div class="list">
                    <ul class="clearfix">
                        <?php $_from = T('article')->getList(array('catid' => '2', 'isindex' => '1', 'num' => '8'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
                </div>
            </div>
        </section>
        <section class="section-5">
            <?php $_from = T('type')->getList(array('catid' => '1'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['about']):
?>
            <h2><?php echo $this->_tpl_vars['about']['name']; ?>
(演示板块)</h2>
            <p class="brief"><?php echo $this->_tpl_vars['about']['description']; ?>
</p>
            <div class="txt block">
                <?php echo $this->_tpl_vars['about']['body']; ?>

            </div>
            <?php endforeach; endif; unset($_from); ?>
        </section>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </body>
</html>
<script>
var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true,
    autoHeight: true,
    loop: true,
    autoplay: 5000
});
</script>