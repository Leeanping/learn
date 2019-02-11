<!doctype html>
<html>
    <head>
    	<title>{{$article.seotitle}}_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    	<meta name="keywords" content="{{$article.keywords}}" />
		<meta name="description" content="{{$article.description}}" />
        {{include file='common/style.tpl'}}
        <link rel="stylesheet" type="text/css" href="/resource/css/article.css">
    </head>
    
    <body>
    	{{include file='common/header.tpl'}}
        <div class="block">
            <div class="crumb">
                <a href="{{$_pathroot}}"><i class="icon-home"></i> 首页</a>
                {{$crumb}}
            </div>
            <div class="article clearfix">
                <div class="article-l fl">
                    <div class="body-head">
                        <h2>{{$article.title}}</h2>
                        <div class="info">
                            <span>{{$article.updatetime|date_format:'%Y-%m-%d %H:%M'}}</span>
                            <span>
                                <i class="icon-eye-open"></i> {{$article.shownum}}
                            </span>
                        </div>
                    </div>
                    <div>{{vpfun func='showBriefOne' params='$article'}}</div>
                    <div>{{vpfun func='showBriefTwo' params='1,2,3'}}</div>
                    <div>{{vpfun func='showBriefTwo' params='$article.id,$article.title'}}</div>
                    <div>{{vpfun func='showBriefTwo' params='$article.id,dd'}}</div>
                    <div class="body">{{$article.content}}</div>
                    <div class="link clearfix">
                        {{if $prevnext.prev.id}}
                        <a href="{{$prevnext.prev.url}}" class="fl">上一篇：{{$prevnext.prev.title}}</a>
                        {{else}}
                        <a href="javascript:;" class="fl">上一篇：没有了</a>
                        {{/if}}
                        {{if $prevnext.next.id}}
                        <a href="{{$prevnext.next.url}}" class="fr">下一篇：{{$prevnext.next.title}}</a>
                        {{else}}
                        <a href="javascript:;" class="fr">下一篇：没有了</a>
                        {{/if}}
                    </div>
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