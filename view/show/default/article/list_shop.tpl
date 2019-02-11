<!doctype html>
<html>
    <head>
    	<title>{{$nav.seotitle}}_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    	<meta name="keywords" content="{{$nav.keywords}}" />
		<meta name="description" content="{{$nav.description}}" />
        {{include file='common/style.tpl'}}
        <link rel="stylesheet" type="text/css" href="/resource/css/article.css">
    </head>
    
    <body>
    	{{include file='common/header.tpl'}}
        <div class="channel">
            <h2>{{$nav.name}}</h2>
        </div>
        {{include file='common/footer.tpl'}}
    </body>
</html>