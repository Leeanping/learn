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
            <ul class="ul-tab tab1">
                {{vplist from='channel' item='child' parentid='2'}}
                <li{{if $child.id == $nav.id}} class="on"{{/if}}><a href="{{$child.url}}">{{$child.name}}</a></li>
                {{/vplist}}
            </ul>
            <div class="wp">
                <ul class="ul-list0">
                    {{foreach from=$articles item=article}}
                    <li>
                        <a href="{{$article.url}}" class="inner">
                            <div class="img">
                                <img src="{{$article.image}}" alt="" />
                            </div>
                            <div class="txt">
                                <p>{{$article.title}}</p>
                                <em>¥{{$article.extend.price}}</em><span>¥{{$article.extend.marketprice}}</span>
                            </div>
                        </a>
                    </li>
                    {{/foreach}}
                </ul>
            </div>
            <!-- <div class="wp">
                <div class="m-page">
                    <ul>
                        <li><a href="">首页</a></li>
                        <li><a href="">上一页</a></li>
                        <li><a href="">下一页</a></li>
                        <li><a href="">末页</a></li>
                    </ul>
                </div>
            </div> -->
        </div>
        {{include file='wap/footer.tpl'}}
    </body>
</html>