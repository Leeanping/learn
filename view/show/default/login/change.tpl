<!doctype html>
<html>
    <head>
        <title>重置密码_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
        {{include file="common/style.tpl"}}
        <link rel="stylesheet" href='/resource/css/viewthread.css' type="text/css" media="screen, projection">
        <link rel="stylesheet" href='/resource/css/base.css' type="text/css" media="screen, projection">
        <script type="text/javascript" src="/resource/js/viewthread.js"></script>
    </head>
    
    <body>
        {{include file="common/header.tpl"}}
        <div class="wrap clearfix zcdl">
            <div class="block">
                <form action="/u/changepwd" method="post" enctype="multipart/form-data">
                <div class="regzone">
                    <h2><strong>重置密码</strong></h2>
                    <ul>
                        <li class="uname"><input name="pwd" type="password" placeholder="新密码"/></li>
                        <li class="upwd"><input name="pwdconfirm" type="password" placeholder="再次输入"/></li>
                    </ul>
                    <h4><input type="submit" value="确定" class="submit"></h4>
                    <input type="hidden" name="action" value="change" />
                    <input type="hidden" name="refer" value="{{$refer}}" />
                </div>
                </form>
            </div>
        </div>
        {{include file="common/footer.tpl"}}
    </body>
</html>