<?php /* vpcvcms compiled created on 2018-11-08 00:31:00
         compiled from wap/article/show_shop.tpl */ ?>
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
$this->_smarty_include(array('smarty_include_tpl_file' => 'wap/style.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </head>
    
    <body>
    	<div class="header">
            <h3 class="m-top">产品详情<a href="javascript:history.go(-1);"></a></h3>
        </div>
        <div class="main">
            <div class="m-con">
                <img src="<?php echo $this->_tpl_vars['article']['articlepic']; ?>
" alt="" />
                <div class="wp">
                    <div class="txt">
                        <h3><?php echo $this->_tpl_vars['article']['title']; ?>
</h3>
                        <em>优惠价：￥<?php echo $this->_tpl_vars['article']['extend']['price']; ?>
元</em>
                        <span>市场价：￥<?php echo $this->_tpl_vars['article']['extend']['marketprice']; ?>
元</span>
                        <p>品　牌 : <?php echo $this->_tpl_vars['article']['extend']['brand']; ?>
</p>
                        <p>外　观 : <?php echo $this->_tpl_vars['article']['extend']['wg']; ?>
</p>
                        <p>规　格 : <?php echo $this->_tpl_vars['article']['extend']['spec']; ?>
</p>
                        <p>产　地 : <?php echo $this->_tpl_vars['article']['extend']['place']; ?>
</p>
                        <p>重　量 : <?php echo $this->_tpl_vars['article']['extend']['weight']; ?>
</p>
                    </div>
                </div>
                <div class="con">
                    <?php echo $this->_tpl_vars['article']['content']; ?>

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