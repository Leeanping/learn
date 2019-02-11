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
                {{vplist from='channel' item='child' parentid='9'}}
                <li{{if $child.id == $nav.id}} class="on"{{/if}}><a href="{{$child.url}}">{{$child.name}}</a></li>
                {{/vplist}}
            </ul>
            <div class="m-about">
                <div class="wp">
                    <div class="txt">
                        {{$nav.body}}
                    </div>
                </div>
            </div>
        </div>
        {{include file='wap/footer.tpl'}}
    </body>
</html>