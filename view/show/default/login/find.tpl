<!doctype html>
<html>
    <head>
        <title>找回密码_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
        {{include file="common/style.tpl"}}
        <link rel="stylesheet" href='/resource/css/viewthread.css' type="text/css" media="screen, projection">
        <link rel="stylesheet" href='/resource/css/base.css' type="text/css" media="screen, projection">
        <script type="text/javascript" src="/resource/js/viewthread.js"></script>
    </head>
    
    <body>
        {{include file="common/header.tpl"}}
        <div class="wrap clearfix zcdl">
            <div class="block">
                <form action="/u/find" method="post" enctype="multipart/form-data">
                <div class="regzone">
                    <h2><strong>找回密码</strong><a href="/u/reg">没有账号？现在注册</a></h2>
                    <ul>
                        <li class="uname"><input name="username" type="text" placeholder="用户名"/></li>
                        <li class="upwd"><input name="email" type="text" placeholder="邮箱"/></li>
                    </ul>
                    <h4><input type="submit" value="确定" class="submit"></h4>
                    <input type="hidden" name="action" value="find" />
                    <input type="hidden" name="refer" value="{{$refer}}" />
                </div>
                </form>
            </div>
        </div>
        {{include file="common/footer.tpl"}}
    </body>
</html>