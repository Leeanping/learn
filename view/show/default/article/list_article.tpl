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
        <div class="block">
            <div class="crumb">
                <a href="{{$_pathroot}}"><i class="icon-home"></i> 首页</a>
                {{$crumb}}
            </div>
            <div class="article clearfix">
                <div class="article-l fl">
                    <ul class="list">
                        {{foreach from=$articles item=news}}
                        <li class="clearfix">
                            <a href="{{$news.url}}" target="_blank">
                                <div class="image"><img src="{{$news.origin}}" width="100%"></div>
                                <div class="body">
                                    <h4>{{$news.title}}</h4>
                                    <p class="des">{{$news.cutstr}}...</p>
                                    <p class="info">
                                        <span>{{$news.updatetime|date_format:'%Y-%m-%d'}}</span>
                                        <span>
                                            <i class="icon-eye-open"></i> {{$news.shownum}}
                                        </span>
                                    </p>
                                </div>
                            </a>
                        </li>
                        {{/foreach}}
                    </ul>
                    {{include file='common/multipage.tpl'}}
                </div>
                <div class="article-r fr">
                    <h3>为你推荐</h3>
                    <ul class="list">
                        {{vplist from='article' item='rec' isspecial='1' num='10'}}
                        <li><a href="{{$rec.url}}">{{$rec.title}}</a></li>
                        {{/vplist}}
                    </ul>
                </div>
            </div>
        </div>
        {{include file='common/footer.tpl'}}
    </body>
</html>