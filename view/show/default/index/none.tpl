<!doctype html>
<html>
    <head>
    	<title>404_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
        <style type="text/css">
        html{background:url({{$_pathroot}}resource/images/paper.jpg)!important;}
        a,fieldset,img{border:0;}
        a{color:#221919;text-decoration:none;outline:none;}
        a:hover{color:#3366cc;text-decoration:underline;}
        body{font-size:24px;color:#B7AEB4; font-family: "Microsoft yahei"}
        #wrapper{text-align:center;margin:100px auto;width:594px;}
        a.link{text-shadow:0px 1px 2px white;font-weight:600;color:#3366cc;}
        h1{text-shadow:0px 1px 2px white;font-size:24px;}
        p{text-shadow:0px 1px 2px white;font-weight:normal;font-weight:200;}
        .fade{opacity:1;}
        @media only screen and (min-device-width:320px) and (max-device-width:480px){
            #wrapper{margin:40px auto;text-align:center;width:280px;}
        }
        </style>
    </head>

    <body>
    	<div id="wrapper">
            <a href="/"><img src="{{$_pathroot}}resource/images/404_icon.png"></a>
            <div>
                <h1>唉呀!</h1>
                <p>您正在寻找的页面无法找到!<a style="color:#ff6600;" href="/">返回首页</a></p>
            </div>
        </div>
    </body>
</html>