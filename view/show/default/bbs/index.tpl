<!doctype html>
<html>
    <head>
    	<title>论坛_{{TO->cfg key="site_name" group="basic" default="致茂网络"}}</title>
    	<meta name="keywords" content="{{$seo.keywords}}" />
		<meta name="description" content="{{$seo.description}}" />
    	{{include file="common/style.tpl"}}
    </head>

    <body>
    	{{include file='common/header.tpl'}}
        <div class="wrap clearfix hww">
            <div class="breadcrumb clearfix">
                <p class="block"><a href="/">首页</a>&gt;<a href="/bbs">户外论坛</a><a href="/article/video" style="float:right;">更多视频&gt;</a></p>
            </div>
            <div class="huwai block clearfix">
                <div class="hwvideo">
                    {{vplist from='article' item='article' num='1' catid='2' istop='1'}}
                        {{$article.video}}
                    {{/vplist}}
                </div>
                <!--tongji-->
                <div class="hw-sum">
                    <i></i><span>今日：<strong>{{$nownum}}</strong></span><span>昨日：<strong>{{$prevnum}}</strong></span><span>帖子：<strong>{{$postsnum}}</strong></span><span>会员：<strong>{{$usernum}}</strong></span></span><!-- <span>欢迎新会员：<strong>CCBvhO93</strong></span> -->
                </div>
                <!--tongji-->
                {{foreach from=$forums item=forum}}
                {{if $forum.son}}
                <div class="outdoor">
                    <h1>{{$forum.name}}</h1>
                    <ul>
                        {{foreach from=$forum.son item=son}}
                        <li>
                            <a href="/bbs/threads/forumid/{{$son.id}}"><img src="{{if $son.forumpic}}{{$son.forumpic}}{{else}}/resource/images/forum_new.gif{{/if}}" class="leftPic"></a>
                            <div class="titText">
                                <h2><a href="/bbs/threads/forumid/{{$son.id}}">{{$son.name}} <span>({{$son.threads}})</span></a></h2>
                                <h3>{{$son.forumsummary}}</h3>
                                <h3>最后发表：{{$son.lastpost|date_format:'%Y-%m-%d %H:%M'}}</h3>
                            </div>
                            <div class="countNum">
                                <span class="cmt">{{$son.threads}}</span>
                                <span class="read">{{$son.posts}}</span>
                            </div>
                        </li>
                        {{/foreach}}
                    </ul>
                </div>
                {{/if}}
                {{/foreach}}
            </div>
            {{include file='common/bbs.tpl'}}
        </div>
        {{include file='common/footer.tpl'}}
    </body>
</html>