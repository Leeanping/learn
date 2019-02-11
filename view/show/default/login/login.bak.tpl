<!doctype html>
<html>
    <head>
    <title>会员登录_{{TO->cfg key="site_name" group="basic" default="成都上班族"}}</title>
    {{include file="common/style.tpl"}}
    <link rel="stylesheet" href='/resource/min/index.php?b=css&f=common.css,thirdparty/artDialog/skins/default.css,reg.css' type="text/css" media="screen, projection">
        <script src="/resource/min/index.php?b=js&f=thirdparty/jquery/jquery.min.js,common.js,thirdparty/artDialog/jquery.artDialog.js,user.js"></script>
    </head>
    
    <body>
    	<!--header-->
        <div class="login-header">
        	<div class="block">
            	<div class="logo">
                	<a href="/"><img src="{{TO->cfg key="site_logo" group="basic" default="/resource/images/login.png"}}" width="200" height="36" alt="{{TO->cfg key="site_name" group="basic" default="VPCV网站系统"}}" /></a>
                </div>
            </div>
        </div>
        <!--header-->
        <!--box-->
        <div class="block login-ad clearfix">
            <div class="login-box lr fr">
                <div id="lform">
                    <ul id="tab" class="clearfix">
                        <li>会员登录</li>
                    </ul>
                    <form id="pform" action="/u/dologin" method="post" onSubmit="return user.check();">
                        <div class="form-txt">
                            <dl class="clearfix">
                                <dt>&nbsp;</dt>
                                <dd><div id="userTip">请输入用户名</div></dd>
                            </dl>
                            <dl class="clearfix">
                                <dt>账号</dt>
                                <dd><input type="text" name="username" id="username" class="t-txt" /></dd>
                            </dl>
                            <dl class="clearfix">
                                <dt class="fl">密码</dt>
                                <dd class="fl"><input type="password" name="password" id="password" class="t-txt" /></dd>
                            </dl>
                            <dl class="gdl clearfix">
                                <dt class="fl">验证码</dt>
                                <dd class="fl">
                                    <input type="text" id="gdkey" name="gdkey" class="t-txt" onfocus="reloadgd(document.getElementById('gdField'))" />
                                </dd>
                            </dl>
                            <dl class="clearfix">
                                <dt class="fl gd">&nbsp;</dt>
                                <dd class="fl gd">
                                <img id="gdField" src="" gd="{{$_resource}}{{$_gdurl}}" onclick="reloadgd(this, true)" alt="看不清？换一张" title="看不清？换一张" style="cursor: pointer;" />
                                </dd>
                            </dl>
                            <dl class="clearfix">
                                <dt class="fl">&nbsp;</dt>
                                <dd class="fl">
                                    <input type="submit" name="do" id="do" class="dosub yahei" value="点击登录" />
                                </dd>
                            </dl>
                            <dl class="clearfix">
                                <dt class="fl">&nbsp;</dt>
                                <dd class="fl">
                                    <input type="checkbox" name="autologin" id="autologin" class="vmiddle" value="1" />
                                    <label class="vmiddle">自动登录</label>
                                </dd>
                            </dl>
                            <dl class="clearfix">
                                <dt class="fl">&nbsp;</dt>
                                <dd class="fl">
                                    <a href="/u/find">找回密码</a>
                                    |
                                    <a href="/u/reg">免费注册</a>
                                </dd>
                            </dl>
                        </div>
                        <input type="hidden" name="refer" value="{{$refer}}" />
                    </form>
                </div>
            </div>
        </div>
        <!--box-->
        <div class="login-footer">
        {{include file='common/footer.tpl'}}
        </div>
    </body>
</html>
{{$ucsynlogout}}
<script language="JavaScript">
$(function(){
	reloadgd(document.getElementById('gdField'));
});
function reloadgd(el,f){
	if(f || !el.gdloaded){
		el.src=el.getAttribute('gd') + '?' + +new Date();
		el.style.display='block';
		el.gdloaded = true;
	}
}
</script>