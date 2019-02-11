<!doctype html>
<html>
    <head>
    	<title>{{$guidetxt}}_{{$seo.seotitle}}_{{TO->cfg key="site_name" group="basic" default="致茂网络"}}</title>
    	<meta name="keywords" content="{{$navInfo.keywords}}" />
		<meta name="description" content="{{$navInfo.description}}" />
    	{{include file="common/style.tpl"}}
    	<link rel="stylesheet" href='/resource/min/b=css&f=common.css,thirdparty/artDialog/skins/default.css,bbs.css' type="text/css" media="screen, projection">
        <script src="/resource/min/b=js&f=thirdparty/jquery/jquery.min.js,common.js,thirdparty/artDialog/jquery.artDialog.js,bbs.js,formvalidator.js,formvalidatorregex.js"></script>
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
                    <span class="text">{{$guidetxt}}</span>
                </div>
            </div>
        </div>
        <div class="block">
        	<div class="bbs-forum-thread">
            	<h4 class="f14 yahei clearfix">查看{{$guidetxt}}</h4>
                <ul class="child-forum clearfix">
                	<li{{if $ac == 'my'}} class="active"{{/if}}><a href="/bbs/guide-my">我的帖子</a></li>
                    <li{{if $ac == 'best'}} class="active"{{/if}}><a href="/bbs/guide-best">精华帖子</a></li>
                    <li{{if $ac == 'hot'}} class="active"{{/if}}><a href="/bbs/guide-hot">热门帖子</a></li>
                </ul>
                <div class="bbs-block" id="threads">
                    <ul>
                        <li class="title clearfix">
                            <span class="title-2">
                                标题
                            </span>
                            <span class="forumu1">
                                作者
                            </span>
                            <span class="threads">回复/查看</span>
                            <span class="lastpost">最后发表</span>
                        </li>
                        {{foreach from=$notices item=notice}}
                        <li class="title-t clearfix">
                            <span class="title-2 fbold">
                            	<em class="icon"><img src="/resource/images/bbs-notice.gif" alt="官方公告" /></em>
                                <a class="yaihei f14 color-3" href="/bbs/display-{{$notice.forumid}}-{{$notice.id}}">{{$notice.title}}</a>
                            </span>
                            <span class="forumu1">
                                <cite>{{$notice.username}}</cite>
                                <cite class="color-5">{{$notice.addtime|date_format:'%Y-%m-%d'}}</cite>
                            </span>
                            <span class="threads"></span>
                            <span class="lastpost"></span>
                        </li>
                        {{/foreach}}
                        <li class="thr yahei fbold">主题列表</li>
                        {{foreach from=$threads item=thread}}
                        <li class="title-t clearfix">
                            <span class="title-2 bold">
                            	<em class="icon"><img src="/resource/images/{{if $thread.special}}pollsmall{{else}}folder_new{{/if}}.gif" alt="{{$thread.title}}" /></em>
                                <a class="th-t fnormal" href="/bbs/display-{{$thread.forumid}}-{{$thread.id}}"{{if $thread.titlecolor}} style="color:#{{$thread.titlecolor}}"{{/if}}>{{$thread.title}}</a>{{if $thread.replycredit}}<em>[回帖奖励 {{$thread.replycredit}}]</em>{{if $thread.isrush}}<em class="rush">[本帖为抢楼贴,欢迎抢楼]</em>{{/if}}{{/if}}<b class="b-icon">{{$thread.icon}}</b>
                            </span>
                            <span class="forumu1 clearfix">
                            	<div class="headpic fl">
                                	<img width="24" height="24" src="{{if $thread.headpic}}{{$thread.headpic}}{{else}}/resource/images/user_head_img.gif{{/if}}" />
                                </div>
                                <div class="fl">
                                	<cite>{{$thread.realname}}</cite>
                                	<cite class="color-5">{{$thread.addtime|date_format:'%Y-%m-%d'}}</cite>
                                </div>
                            </span>
                            <span class="threads"><cite>{{$thread.replies}}</cite><cite class="color-5">{{$thread.views}}</cite></span>
                            <span class="lastpost"><cite>{{$thread.lastposter}}</cite><cite class="color-5">{{$thread.lastpost|date_format:'%Y-%m-%d %H:%M'}}</cite></span>
                        </li>
                        {{/foreach}}
                    </ul>
                </div>
            </div>
        </div>
        {{include file='common/footer.tpl'}}
    </body>
</html>