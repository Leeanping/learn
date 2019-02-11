<!doctype html>
<html>
    <head>
        <title>会员注册_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
        {{include file="common/style.tpl"}}
        <link rel="stylesheet" href='/resource/css/viewthread.css' type="text/css" media="screen, projection">
        <link rel="stylesheet" href='/resource/css/base.css' type="text/css" media="screen, projection">
        <script type="text/javascript" src="/resource/js/viewthread.js"></script>
    </head>

    <body>
    	<!--header-->
        {{include file='common/header.tpl'}}
        <!--header-->
        <form id="pform" action="/u/doreg" method="post" enctype="multipart/form-data" onsubmit="return check()">
        <div class="wrap clearfix zczh">
            <div class="block">
                <div class="regzone">
                    <h2><strong>注册</strong><a href="/u/login">已有账号？现在登录</a></h2>
                    <ul>
                        <li class="uname"><input name="username" id="username" type="text" placeholder="用户名"/></li>
                        <li class="upwd"><input name="password" id="password" type="password" placeholder="设置密码"/></li>
                        <li class="urepwd"><input name="cpassword" id="cpassword" type="password" placeholder="再次输入密码"/></li>
                        <li class="uemail"><input name="email" type="text" placeholder="邮件地址"/></li>
                    </ul>
                    <h3><input class="checkbox" type="checkbox" checked="checked" /><span>我已经阅读并同意K2的</span><a href="/server/show/id/8" target="_blank">《隐私声明》</a></h3>
                    <h4><input type="submit" value="注册" class="submit"></h4>
                    <input type="hidden" name="refer" value="{{$refer}}" />
                    <input type="hidden" name="gid" value="{{$gid}}" />
                </div>
            </div>
        </div>
        </form>
        {{include file='common/footer.tpl'}}
    </body>
</html>
<script language="JavaScript">
$(function(){
    //reloadgd(document.getElementById('gdField'));
});
function reloadgd(el,f){
    if(f || !el.gdloaded){
        el.src=el.getAttribute('gd') + '?' + +new Date();
        el.style.display='block';
        el.gdloaded = true;
    }
}
function check(){
    var username = $('#username').val();
    var password = $('#password').val();
    var cpassword = $('#cpassword').val();
    if(username.length === 0){
        alert('请输入用户名');
        return false;
    }

    if (password.length < 6 || !(/\d/.test(password) && /[a-zA-Z]/.test(password) && /^[a-zA-Z0-9]+$/.test(password))){
        alert('密码必须大于6位且是字母和数字的组合');
        return false;
    }

    if(password != cpassword){
        alert('两次密码不一致');
        return false;
    }
}
</script>