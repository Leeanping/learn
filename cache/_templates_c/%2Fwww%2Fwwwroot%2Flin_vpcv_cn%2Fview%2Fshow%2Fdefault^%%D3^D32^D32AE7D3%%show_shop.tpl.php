<?php /* vpcvcms compiled created on 2018-11-08 15:24:16
         compiled from article/show_shop.tpl */ ?>
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
    </head>
    
    <body>
    	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div class="ban clearfix"><?php echo $this->_reg_objects['TO'][0]->ad(array('tag' => 'NavAdFivth','typeid' => '$article.catid'), $this);?>
</div>
        <!-- 内容 -->
        <div class="main">
            <div class="wp">
                <div class="m-cur">
                    <span>您现在所在位置：</span>
                    <a href="/">首页</a>
                    <?php echo $this->_tpl_vars['crumb']; ?>

                </div>
                <div class="m-product_qj">
                    <div class="row1">
                        <div class="m-product clearfix">
                            <div class="pic-box">
                                <div class="slider-for">
                                    <?php $_from = $this->_tpl_vars['galleries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gallery']):
?>
                                    <div class="img">
                                        <div class="pic">
                                            <img src="<?php echo $this->_tpl_vars['gallery']['imgurl']; ?>
" alt="" />
                                        </div>
                                    </div>
                                    <?php endforeach; endif; unset($_from); ?>
                                </div>
                                <div class="slider-nav clearfix">
                                    <?php $_from = $this->_tpl_vars['galleries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['thumb']):
?>
                                    <div class="item">
                                        <div class="img">
                                            <img src="<?php echo $this->_tpl_vars['thumb']['imgurl']; ?>
" alt="">
                                        </div>
                                    </div>
                                    <?php endforeach; endif; unset($_from); ?>
                                </div>
                            </div>
                            <div class="txt-box clearfix">
                                <h3><?php echo $this->_tpl_vars['article']['title']; ?>
</h3>
                                <em><?php echo $this->_tpl_vars['article']['extend']['tip']; ?>
</em>
                                <span>品　牌 : <?php echo $this->_tpl_vars['article']['extend']['brand']; ?>
</span>
                                <span>外　观 : <?php echo $this->_tpl_vars['article']['extend']['wg']; ?>
</span>
                                <span>规　格 : <?php echo $this->_tpl_vars['article']['extend']['spec']; ?>
</span>
                                <span>产　地 : <?php echo $this->_tpl_vars['article']['extend']['place']; ?>
</span>
                                <span>重　量 : <?php echo $this->_tpl_vars['article']['extend']['weight']; ?>
</span>
                                <div class="price">
                                    <span class="new">优惠价 : ￥<?php echo $this->_tpl_vars['article']['extend']['price']; ?>
元</span>
                                    <span class="old">市场价 : <?php echo $this->_tpl_vars['article']['extend']['marketprice']; ?>
元</span>
                                </div>
                                <div class="txt">
                                    <h5>产品简介:</h5>
                                    <p style="height: 72px;"><?php echo $this->_tpl_vars['article']['extend']['promo']; ?>
</p>
                                </div>
                                <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $this->_tpl_vars['article']['extend']['qq']; ?>
&amp;site=qq&amp;menu=yes" target="_blank" class="btn-inform">产品咨询</a>
                                <a href="<?php echo $this->_tpl_vars['article']['extend']['tburl']; ?>
" target="_blank" class="btn-inform">在线购买</a>
                            </div>
                        </div>
                    </div>
                    <div class="row2">
                        <div class="col-l">
                            <div class="slide-bar">
                                <h2>推荐商品</h2>
                                <ul class="ul-groom">
                                    <?php $_from = T('article')->getList(array('moduleid' => 'shop', 'num' => '5', 'extend' => 'price,marketprice', 'isspecial' => '1', 'catid' => $this->_tpl_vars['article']['catid']));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['special']):
?>
                                    <li>
                                        <a href="<?php echo $this->_tpl_vars['special']['url']; ?>
">
                                            <div class="pic">
                                                <img src="<?php echo $this->_tpl_vars['special']['articlepic']; ?>
" alt="<?php echo $this->_tpl_vars['special']['title']; ?>
">
                                            </div>
                                            <div class="txt">
                                                <h3><?php echo $this->_tpl_vars['special']['title']; ?>
</h3>
                                                <!--<p class="intro"><?php echo $this->_tpl_vars['special']['cutstr']; ?>
</p>-->
                                                <div class="price">
                                                    <span class="new">￥<?php echo $this->_tpl_vars['special']['extend']['price']; ?>
</span>
                                                    <span class="old">原价<?php echo $this->_tpl_vars['special']['extend']['marketprice']; ?>
元</span>
                                                </div>
                                                <div class="mark"></div>
                                            </a>
                                        </div>
                                    </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-r">
                            <div class="m-parm">
                                <h2>产品详情</h2>
                                <div class="clearfix" style="margin: 10px 0;">
                                    <?php echo \Core\Fun::getAdSingle('NavAdCert', $this->_tpl_vars['article']['catid']);?>
                                </div>
                                <div class="txt"><?php echo $this->_tpl_vars['article']['content']; ?>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 内容 end -->
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </body>
</html>
<link rel="stylesheet" href="/resource/css/slick.css">
<script type="text/javascript" src="/resource/js/slick.min.js"></script>

<script>
    $(document).ready(function() {
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            centerMode: true,
            centerPadding:"0",
            autoplay:true,
            autoplaySpeed: 5000,
            arrows: false,
            focusOnSelect: true,
        });   
    });
</script>