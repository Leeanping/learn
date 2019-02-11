<!doctype html>
<html>
    <head>
    	<title>{{$group.name}}_{{TO->cfg key="site_name" group="basic" default="致茂网络"}}</title>
    	<meta name="keywords" content="{{$group.name}}" />
		<meta name="description" content="{{$group.name}}" />
    	{{include file="common/style.tpl"}}
    	<link rel="stylesheet" href='/resource/min/b=css&f=common.css,thirdparty/artDialog/skins/default.css,bbs.css' type="text/css" media="screen, projection">
        <script src="/resource/min/b=js&f=thirdparty/jquery/jquery.min.js,common.js,thirdparty/artDialog/jquery.artDialog.js,bbs.js"></script>
    </head>

    <body>
    	{{include file='common/header2.tpl'}}
        <div class="block">
            <div class="main shadow">
                <div class="mbx clearfix">
                    <span class="first"></span>
                    <span><a href="{{$_pathroot}}">网站首页</a></span>
                    <span class="text">&raquo;</span>
                    <span class="text"><a href="/bbs">{{$seo.name}}</a></span>
                    <span class="text">&raquo;</span>
                    <span class="text">{{$group.name}}</span>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="bbs-in-block shadow">
                <div class="t"><h2>{{$group.name}}</h2></div>
                <ul class="clearfix">
                	{{foreach from=$forums item=forum}}
                    <li class="clearfix">
                    	<div class="bbs-icon">
                        	<img src="{{if $forum.forumpic}}{{$forum.forumpic}}{{else}}/resource/images/forum_new.gif{{/if}}" width="31" height="29" />
                        </div>
                        <dl>
                        	<dt>
                            	<a href="/bbs/threads-{{$forum.id}}">{{$forum.name}}</a>
                            </dt>
                            <dd>主题：{{$forum.threads}},贴数：{{$forum.posts}}</dd>
                            <dd>最后发表：{{$forum.lastpost|date_format:'%Y-%m-%d %H:%M'}}</dd>
                        </dl>
                    </li>
                    {{/foreach}}
                </ul>
            </div>
        </div>
        {{include file='common/footer.tpl'}}
    </body>
</html>