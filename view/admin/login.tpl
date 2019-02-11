<!doctype html>
<html>
    <head>
        <title>{{TO->cfg key="site_name" group="site" default="system"}}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta content="qq Inc." name="Copyright">
        <link rel="apple-touch-icon-precomposed" href="/resource/st.png" />
        <link rel="shortcut icon" href="/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href='/resource/admin/css/login.css'>
        <link rel="stylesheet" href="/resource/admin/css/font-awesome.min.css">
        <script type="text/javascript" src="/resource/admin/js/jquery.min.js"></script>
        <script type="text/javascript" src="/resource/admin/js/lib/lib.js"></script>
        <script type="text/javascript" src="/resource/admin/js/canvas-particle.js"></script>
        <script>var SITE_URL = '{{$_pathroot}}';</script>
    </head>
    <body>
        <!-- 登入界面 -->
        <div class="loginmask"></div>
        <div class="loading"></div>
        <div class="login">
        	<div class="header">
        		<img src="/resource/admin/images/login-logo.png" />
        	</div>
        	<div class="container" id="container">
        		<div class="canvas" id="canvas"></div>
        		<div class="block clearfix">
	                <div class="login-box">
	                    <h1>VPCV-CMS</h1>
	                    <p class="tip">请填写登陆信息</p>
	                    <p class="inbox clearfix">
	                    	<span><i class="icon-user"></i></span>
	                    	<input autocomplete="off" type="text" id="username" placeholder="{{TO->language key="admin::login_username"}}" name="username" tabindex="1">
	                    </p>
	                    <p class="inbox clearfix">
	                    	<span><i class="icon-lock"></i></span>
	                    	<input type="password" id="password" placeholder="{{TO->language key="admin::login_password"}}" name="password" tabindex="2">
	                    </p>
	                    <p class="gdkey inbox clearfix">
	                    	<span><i class="icon-key"></i></span>
	                    	<input autocomplete="off" type="text" id="gdkey" placeholder="{{TO->language key="admin::login_gdkey"}}" name="gdkey" onfocus="reloadgd(document.getElementById('gdField'))" tabindex="3"><input type="button" class="submit" tabindex="4">
	                    </p>
	                    <p>
	                    	<img id="gdField" src="" gd="{{$_pathroot}}{{$_gdurl}}" onclick="reloadgd(this, true)" alt="{{TO->language key="admin::login_gdkey_tip"}}" title="{{TO->language key="admin::login_gdkey_tip"}}" style="cursor: pointer;margin:6px 0;" />
	                    </p>
	                </div>
                </div>
            </div>
            <p class="bottom">广州致茂网络科技有限公司版权所有</p>
        </div>
    </body>
</html>
<script type="text/javascript">
$(function(){
	reloadgd(document.getElementById('gdField'));
	setTimeout(function(){$('#username').val('').focus()}, 500);
	if(_getBrowser().browser == 'msie' && _getBrowser().version <= 7){
		$('.login').html('<div class="update_browser">'+
			'<div class="subtitle">您正在使用的IE浏览器版本过低，<br>我们建议您升级或者更换浏览器，以便体验顺畅、兼容、安全的互联网。</div>'+
			'<div class="title">选择一款<span>新</span>浏览器吧</div>'+
			'<div class="browser">'+
				'<a href="http://windows.microsoft.com/zh-CN/internet-explorer/downloads/ie" class="ie" target="_blank" title="ie浏览器">ie浏览器</a>'+
				'<a href="http://www.google.cn/chrome/intl/zh-CN/landing_chrome.html" class="chrome" target="_blank" title="谷歌浏览器">谷歌浏览器</a>'+
				'<a href="http://www.firefox.com.cn" class="firefox" target="_blank" title="火狐浏览器">火狐浏览器</a>'+
				'<a href="http://www.opera.com" class="opera" target="_blank" title="opera浏览器">opera浏览器</a>'+
				'<a href="http://www.apple.com.cn/safari" class="safari" target="_blank" title="safari浏览器">safari浏览器</a>'+
			'</div>'+
		'</div>');
	}
	if((_getBrowser().browser == 'msie' && _getBrowser().version > 8) || _getBrowser().browser != 'msie'){
		$('.container').removeClass('login-bg');
		var config = {
			vx: 4,
			vy:  4,
			height: 2,
			width: 2,
			count: 100,
			color: "121, 162, 185",
			stroke: "100,200,180",
			dist: 6000,
			e_dist: 20000,
			max_conn: 10
		}
		CanvasParticle(config);
	}else{
		$('.container').addClass('login-bg');
	}
	
	$(".container .login-box").bind("keyup",function(e){
		if(e.keyCode == 13){$('.login-box .submit').click();}
	});

	$('#username,#password,#gdkey').placeholder({labelMode:true,labelStyle:{left:44,top:8,fontSize:'14px'},labelAlpha:true,labelAcross:true});
	$('.login-box .submit').click(function(){
		if($('#username').val()!="" && $('#password').val()!="" && $('#gdkey').val()!=""){
			$('.login-box .submit').addClass('sloading');
			$.ajax({
				type:'POST',
				url: SITE_URL + 'admin/login/login',
				data:'username='+$('#username').val()+'&password='+$('#password').val() + '&gdkey=' + $('#gdkey').val(),
				dataType: 'json',
				success:function(json){
					$('.login-box .submit').show();
					if(json.msg == 1){
						$('.loading').hide();
						$('.loginmask').fadeIn(500,function(){
							location.href = SITE_URL + 'admin/index/index';
						});
					}else if(json.msg == -2){
						$('.login-box .submit').removeClass('sloading');
						$('.login-box .tip').text('{{TO->language key="admin::login_user_empty"}}');
					}else if(json.msg == -3){
						$('.login-box .submit').removeClass('sloading');
						$('.login-box .tip').text('{{TO->language key="admin::login_gdkey_fail"}}');
						reloadgd(document.getElementById('gdField'), true);
					}else if(json.msg == -1){
						$('.login-box .submit').removeClass('sloading');
						$('.login-box .tip').text('{{TO->language key="admin::login_user_fail"}}');
					}else{
						$('.login-box .submit').removeClass('sloading');
						$('.login-box .tip').text('{{TO->language key="admin::login_failed"}}');
					}
				}
			});
		}else{
			$('.login-box .tip').text('{{TO->language key="admin::login_info"}}');
		}
	});
	
	$('.loading').fadeOut(500);
	$('.login').show();
	//var height = ($(window).height() - $('.container').outerHeight()) / 2;
	//$('.container').css('margin-top', height);
});
function reloadgd(el,f){
	if(f || !el.gdloaded){
		el.src=el.getAttribute('gd') + '?' + +new Date();
		el.style.display='block';
		el.gdloaded = true;
	}
}
</script>