<!doctype html>
<html>
    <head>
        <title>会员登录_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
        {{include file="common/style.tpl"}}
        <link rel="stylesheet" href='/resource/css/viewthread.css' type="text/css" media="screen, projection">
        <link rel="stylesheet" href='/resource/css/base.css' type="text/css" media="screen, projection">
        <script type="text/javascript" src="/resource/js/viewthread.js"></script>
    </head>
    
    <body>
        {{include file="common/header.tpl"}}
        <div class="wrap clearfix zcdl">
            <div class="block">
                <form action="/u/dologin" method="post" enctype="multipart/form-data" onsubmit="return check();">
                <div class="regzone">
                    <h2><strong>登录</strong><a href="/u/reg">没有账号？现在注册</a></h2>
                    <ul>
                        <li class="uname"><input name="username" id="username" type="text" placeholder="用户名"/></li>
                        <li class="upwd"><input name="password" id="password" type="password" placeholder="设置密码"/></li>
                    </ul>
                    <h3><span>忘记密码？</span><a href="/u/find">点击找回</a></h3>
                    <h4><input type="submit" value="登录" class="submit"></h4>
                    <input type="hidden" name="refer" value="{{$refer}}" />
                </div>
                </form>
            </div>
        </div>
        {{include file="common/footer.tpl"}}
    </body>
</html>
<script type="text/javascript">
function check(){
    var username = $('#username').val();
    var password = $('#password').val();
    if(username.length === 0){
        alert('请输入用户名');
        return false;
    }

    if (password.length === 0){
        alert('请输入密码');
        return false;
    }
}
</script>