<!doctype html>
<html>
    <head>
    	<title>{{$nav.seotitle}}_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
        <meta name="keywords" content="{{$nav.keywords}}" />
        <meta name="description" content="{{$nav.description}}" />
        {{include file='wap/style.tpl'}}
    </head>
    
    <body>
    	<div class="header">
            <h3 class="m-top">{{$nav.name}}<a href="javascript:history.go(-1);"></a></h3>
        </div>
        <div class="main">
            <ul class="ul-tab tab2">
                {{vplist from='channel' item='child' parentid='11'}}
                <li{{if $child.id == $nav.id}} class="on"{{/if}}><a href="{{$child.url}}">{{$child.name}}</a></li>
                {{/vplist}}
            </ul>
            <div class="wp">
                <ul class="ul-list3">
                    {{foreach from=$articles item=article}}
                    <li>
                        <div class="left">
                            <em>{{$article.id}}</em>
                            <span>{{$article.addtime|date_format:'%Y-%m-%d'}}</span>
                            <p>{{$article.catname}}</p>
                        </div>
                        <div class="right">
                            <h3>
                                <a href="{{$article.url}}">{{$article.title}}</a>
                            </h3>
                            <p>{{$article.cutstr}}</p>
                            <a href="{{$article.url}}" class="more">查看详情 &gt;</a>
                        </div>
                    </li>
                    {{/foreach}}
                </ul>
            </div>
        </div>
        {{include file='wap/footer.tpl'}}
    </body>
</html>