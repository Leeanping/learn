<!doctype html>
<html>
    <head>
    	<title>{{$article.seotitle}}_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    	<meta name="keywords" content="{{$article.keywords}}" />
		<meta name="description" content="{{$article.description}}" />
        {{include file='wap/style.tpl'}}
    </head>
    
    <body>
    	<div class="header">
            <h3 class="m-top">详情<a href="javascript:history.go(-1)"></a></h3>
        </div>
        <div class="main">
            <div class="m-about">
                <h3 class="tit">{{$article.title}}</h3>
                <div class="wp">
                    <div class="txt">
                        {{$article.content}}
                    </div>
                </div>
            </div>
        </div>
        {{include file='wap/footer.tpl'}}
    </body>
</html>