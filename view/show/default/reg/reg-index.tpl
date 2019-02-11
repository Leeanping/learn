<!doctype html>
<html>
    <head>
    <title>会员注册_{{TO->cfg key="site_name" group="basic" default="成都上班族"}}</title>
    {{include file="common/style.tpl"}}
    <link rel="stylesheet" href='/resource/min/index.php?b=css&f=common.css,thirdparty/artDialog/skins/default.css,reg.css' type="text/css" media="screen, projection">
        <script src="/resource/min/index.php?b=js&f=thirdparty/jquery/jquery.min.js,common.js,thirdparty/artDialog/jquery.artDialog.js,user.js"></script>
    </head>

    <body>
    	<div class="new-reg">
        	<div class="reg-header"><img src="/resource/images/llogo.png" alt="" /></div>
            <div class="clearfix">
            	<div class="item left">
                    <div class="hd"><img src="/resource/images/1-5.jpg" /></div>
                    <div class="bd">
                        <div class="dd">
                            <a href="/u/regc">厂家注册入口</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hd"><img src="/resource/images/1-6.jpg" /></div>
                    <div class="bd">
                        <div class="dd">
                            <a href="/u/regp">商家注册入口</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p">请选择适合你的会员类型进行注册</div>
            <div class="app clearfix">
                <div class="text">
                    卖点啥手机客户端下载
                </div>
                <div class="download">
                	<a href="#"><img src="/resource/images/android.jpg" /></a>
                </div>
                <div class="download">
                	<a href="#"><img src="/resource/images/apple.jpg" /></a>
                </div>
            </div>
        </div>
        <div class="footer-user">
        	<div class="new-block">
                <p>
                	{{vplist from='category' num='4' vitem='cat' itemid='4' field='id,catname'}}
                    <a href="/help/{{$cat.id}}">{{$cat.catname}}</a>
                    {{/vplist}}
                </p>
                <p>
                    {{TO->cfg key="site_powerby" group="basic" default=""}} 营业执照注册号:{{TO->cfg key="site_znum" group="basic" default=""}}
                    ICP备案号：<a href="http://www.miibeian.gov.cn" target="_blank">{{TO->cfg key="site_beian" group="basic" default=""}}</a> {{TO->cfg key="site_powerby" group="basic" default=""}}
                </p>
            </div>
        </div>
    </body>
</html>