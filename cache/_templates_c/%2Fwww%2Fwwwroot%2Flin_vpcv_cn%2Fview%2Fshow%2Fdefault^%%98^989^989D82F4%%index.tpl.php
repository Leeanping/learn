<?php /* vpcvcms compiled created on 2018-11-08 15:56:44
         compiled from wap/index.tpl */ ?>
<!doctype html>
<html>
    <head>
    	<title><?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_seotitle','group' => 'site','default' => "首页"), $this);?>
_<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'site_name','group' => 'site','default' => "致茂网络"), $this);?>
</title>
    	<meta name="keywords" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_keywords','group' => 'site','default' => "首页"), $this);?>
" />
		<meta name="description" content="<?php echo $this->_reg_objects['TO'][0]->cfg(array('key' => 'index_description','group' => 'site','default' => "首页"), $this);?>
" />
    	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "wap/style.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </head>
    <body class="ok">
        <div class="phone-head">
            <a href="/" class="logo">
                <img src="/resource/wap/images/logo.png"alt="">
            </a>
            <div class="menuBtn"></div>
        </div>
        <ul class="nav-phone">
            <li>
                <a href="/wap" class="v1">首页</a>
            </li>
            <?php $_from = T('channel')->getList(array());if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['channel']):
?>
            <li>
                <?php if ($this->_tpl_vars['channel']['id'] != '10'): ?>
                <a href="javascript:void(0);" class="v1"><?php echo $this->_tpl_vars['channel']['name']; ?>
</a>
                <?php else: ?>
                <a href="<?php echo $this->_tpl_vars['channel']['url']; ?>
" class="v1"><?php echo $this->_tpl_vars['channel']['name']; ?>
</a>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['channel']['id'] != '10'): ?>
                <dl>
                    <?php $_from = T('channel')->getList(array('parentid' => $this->_tpl_vars['channel']['id']));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
                    <dd><a href="<?php echo $this->_tpl_vars['child']['url']; ?>
"><?php echo $this->_tpl_vars['child']['name']; ?>
</a></dd>
                    <?php endforeach; endif; unset($_from); ?>
                </dl>
                <?php endif; ?>
            </li>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
        <div class="slider">
            <ul class="autoplay1 banner">
                <?php $_from = T('ad')->getList(array('tagname' => 'IndexFocus'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
                <li>
                    <a href="<?php echo $this->_tpl_vars['adlist']['linkurl']; ?>
">
                        <img src="<?php echo $this->_tpl_vars['adlist']['imgurl']; ?>
"  alt="">
                    </a>
                </li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </div>
        <div class="ind-main">
            <div class="wp">
                <div class="small-nav">
                    <ul>
                        <?php $_from = T('channel')->getList(array('parentid' => '2'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['childer']):
?>
                        <li>
                            <a href="<?php echo $this->_tpl_vars['childer']['url']; ?>
" class="inner">
                                <i class="i<?php echo $this->_tpl_vars['childer']['key']; ?>
"></i>
                                <p><?php echo $this->_tpl_vars['childer']['name']; ?>
</p>
                            </a>
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </div>
                <div class="m-part1">
                    <h3 class="m-tit0">促销产品</h3>
                    <ul class="ul-list0">
                        <?php $_from = T('article')->getList(array('catid' => '10', 'num' => '4', 'extend' => 'price,marketprice', 'isindex' => '1'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cp']):
?>
                        <li>
                            <a href="<?php echo $this->_tpl_vars['cp']['url']; ?>
" class="inner">
                                <div class="img">
                                    <img src="<?php echo $this->_tpl_vars['cp']['image']; ?>
" alt="" />
                                </div>
                                <div class="txt">
                                    <p><?php echo $this->_tpl_vars['cp']['title']; ?>
</p>
                                    <em>¥<?php echo $this->_tpl_vars['cp']['extend']['price']; ?>
</em><span>¥<?php echo $this->_tpl_vars['cp']['extend']['marketprice']; ?>
</span>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </div>
            </div>
            <div class="m-adver clearfix">
                <?php echo $this->_reg_objects['TO'][0]->ad(array('tag' => 'IndexAdFirst'), $this);?>

            </div>
            <div class="m-part1">
                <div class="wp">
                    <div class="m-part1">
                        <h3 class="m-tit0">古筝产品</span></h3>
                        <ul class="ul-list0">
                            <?php $_from = T('article')->getList(array('catid' => '6', 'num' => '6', 'extend' => 'price,marketprice', 'isindex' => '1'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gp']):
?>
                            <li>
                                <a href="<?php echo $this->_tpl_vars['gp']['url']; ?>
" class="inner">
                                    <div class="img">
                                        <img src="<?php echo $this->_tpl_vars['gp']['image']; ?>
" alt="" />
                                    </div>
                                    <div class="txt">
                                        <p><?php echo $this->_tpl_vars['gp']['title']; ?>
</p>
                                        <em>¥<?php echo $this->_tpl_vars['gp']['extend']['price']; ?>
</em><span>¥<?php echo $this->_tpl_vars['gp']['extend']['marketprice']; ?>
</span>
                                    </div>
                                </a>
                            </li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                        <a href="/wap/article/gz" class="more-1">
                            查看更多
                        </a>
                    </div>
                </div>
            </div>
            <div class="m-adver clearfix"><?php echo $this->_reg_objects['TO'][0]->ad(array('tag' => 'IndexAdThird'), $this);?>
</div>
            <div class="m-part1">
                <div class="wp"> 
                    <h3 class="m-tit0">钢琴产品</span></h3>
                    <ul class="ul-list0">
                        <?php $_from = T('article')->getList(array('catid' => '14', 'num' => '6', 'extend' => 'price,marketprice', 'isindex' => '1'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['piano']):
?>
                        <li>
                            <a href="<?php echo $this->_tpl_vars['piano']['url']; ?>
" class="inner">
                                <div class="img">
                                    <img src="<?php echo $this->_tpl_vars['piano']['image']; ?>
" alt="" />
                                </div>
                                <div class="txt">
                                    <p><?php echo $this->_tpl_vars['piano']['title']; ?>
</p>
                                    <em>¥<?php echo $this->_tpl_vars['piano']['extend']['price']; ?>
</em><span>¥<?php echo $this->_tpl_vars['piano']['extend']['marketprice']; ?>
</span>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                    <a href="/wap/article/gq" class="more-1">
                        查看更多
                    </a>
                    </div>
                </div>
            </div>
            <div class="m-part1">
                <div class="wp"> 
                    <h3 class="m-tit0">其他国乐产品</span></h3>
                    <ul class="ul-list0">
                        <?php $_from = T('article')->getList(array('catid' => '15,16,17', 'num' => '6', 'isindex' => '1', 'extend' => 'price,marketprice'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['op']):
?>
                        <li>
                            <a href="<?php echo $this->_tpl_vars['op']['url']; ?>
" class="inner">
                                <div class="img">
                                    <img src="<?php echo $this->_tpl_vars['op']['image']; ?>
" alt="" />
                                </div>
                                <div class="txt">
                                    <p><?php echo $this->_tpl_vars['op']['title']; ?>
</p>
                                    <em>¥<?php echo $this->_tpl_vars['op']['extend']['price']; ?>
</em><span>¥<?php echo $this->_tpl_vars['op']['extend']['marketprice']; ?>
</span>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                    <a href="/wap/article/qxcp" class="more-1">
                        查看更多
                    </a>
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
<script src="/resource/wap/js/jquery.js"></script>
<script src="/resource/wap/js/lib.js"></script>

<link rel="stylesheet" href="/resource/wap/css/slick.css">
<script src="/resource/wap/js/slick.min.js"></script>
<script>
$(document).ready(function() {
    $('.banner').slick({
        dots:true,
        arrows:false,
        autoplay:true,
        slidesToShow: 1,
        autoplaySpeed: 5000,
        pauseOnHover:false,
        lazyLoad: 'ondemand'
    });

});
</script>