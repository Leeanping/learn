<!doctype html>
<html>
    <head>
    	<title>{{$thread.title}}_{{TO->cfg key="site_name" group="basic" default="致茂网络"}}</title>
    	{{include file="common/style.tpl"}}
        <link rel="stylesheet" href='/resource/css/thirdparty/artDialog/skins/default.css' type="text/css" media="screen, projection">
        <link rel="stylesheet" href='/resource/css/bbs.css' type="text/css" media="screen, projection">
        <script src="/resource/js/thirdparty/artDialog/jquery.artDialog.js"></script>
        <script type="text/javascript" src="/resource/js/bbs.js"></script>
    </head>

    <body class="bgf2">
    	{{include file='common/header.tpl'}}
        <div class="wrap clearfix">
            <div class="breadcrumb">
                <p class="block"><a href="/">首页</a>&gt;<a href="/bbs">论坛</a>&gt;<a href="/bbs/threads-{{$forumid}}">{{$forumname}}</a>&gt;<a href="#">{{$thread.title|utruncate:40}}</a></p>
            </div>
        </div>
        <div class="block shadow">
        	<div class="bbs-forum-thread bbs-forum-thread-line">
                <div class="post clearfix">
                	<a class="post-btn fl yahei" href="#reply">回复</a>
                    <div class="pages fr">
                	{{include file='common/multipage.tpl'}}
                	</div>
                </div>
            </div>
            {{if $user.gid == 1}}
            <div class="bbs-forum-thread color-5 bbs-forum-thread-line">
                <a href="javascript:void(0);" onClick="CD.BBS.stamp('{{$thread.id}}', '{{$thread.stamp}}')" class="color-2">图章</a> | 
                {{if $thread.isbest == 1}}<a href="javascript:void(0);" onClick="CD.BBS.setIs(0, 'isbest', '{{$thread.id}}')" class="color-2">取消精华</a>{{else}}<a href="javascript:void(0);" onClick="CD.BBS.setIs(1, 'isbest', '{{$thread.id}}')" class="color-2">精华</a>{{/if}} | 
                {{if $thread.istop == 1}}<a href="javascript:void(0);" onClick="CD.BBS.setIs(0, 'istop', '{{$thread.id}}')" class="color-2">取消置顶</a>{{else}}<a href="javascript:void(0);" onClick="CD.BBS.setIs(1, 'istop', '{{$thread.id}}')" class="color-2">置顶</a>{{/if}}
            </div>
            {{/if}}
            <div class="bbs-p-list">
            	<div class="stamp">{{$thread.icon}}</div>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="ls pbn ptn">
                            <div class="num">
                                <span>浏览：</span>
                                <span class="color-1">{{$thread.views}}</span>
                                <span>回复：</span>
                                <span class="color-1">{{$thread.replies}}</span>
                            </div>
                        </td>
                        <td class="lc pbn ptn"><b>{{$thread.title}}</b>{{if $user.uid == $thread.uid || $user.gid == 1}} <a class="color-1" href="/bbs/edit-{{$thread.forumid}}-{{$thread.id}}">[编辑]</a>{{/if}} 
                        {{if $isstow}}
                        <a class="color-1" href="javascript:;" onclick="postStow('thread', '{{$thread.id}}', '{{$thread.title}}')">[收藏]</a>
                        {{else}}
                        <a class="color-1" href="javascript:;" onclick="delStowByThreadid('{{$thread.id}}')">[取消收藏]</a>
                        {{/if}}
                        </td>
                    </tr>
                </table>
                {{if $thread.replycredit}}
                <table cellpadding="0" cellspacing="0">
                	<tr class="ad">
                    	<td class="pls">
                        </td>
                        <td class="plc"></td>
                    </tr>
                    <tr>
                        <td class="ls pbn ptn">
                        	<div class="num"><span class="color-1">[奖] <b>{{$thread.replycredit}}</b> 积分</span></div>
                        </td>
                        <td class="lc pbn ptn">
                        	<span class="color-1">回复本帖可获得 {{$credit.credit}} 积分奖励! 每人限 {{$credit.usertimes}} 次</span> <span class="color-2">(中奖概率 {{if $credit.random > 0}}{{$credit.random}}{{else}}100{{/if}}%)</span>
                        </td>
                    </tr>
                </table>
                {{/if}}
                {{if $thread.isrush}}
                <table cellpadding="0" cellspacing="0">
                	<tr class="ad">
                    	<td class="pls">
                        </td>
                        <td class="plc"></td>
                    </tr>
                    <tr>
                        <td class="ls pbn ptn">
                        	<div class="num"><span class="color-2">[抢] <b>抢楼</b></span></div>
                        </td>
                        <td class="lc pbn ptn">
                        	<span class="color-2">本帖为抢楼帖，欢迎抢楼! 开始时间：{{$rush.starttime|date_format:'%Y-%m-%d'}} 结束时间：{{$rush.endtime|date_format:'%Y-%m-%d'}}  截止楼层：{{$rush.stopfloor}}  奖励楼层: {{$rush.rewardfloor}}  </span>
                            {{if !$isrush}}
                            <span class="fr fbold"><a class="color-2" href="/bbs/display-{{$forumid}}-{{$threadid}}-1">查看抢中楼层</a></span>
                            {{else}}
                            <span class="fr fbold"><a class="color-2" href="/bbs/display-{{$forumid}}-{{$threadid}}">返回</a></span>
                            {{/if}}
                        </td>
                    </tr>
                </table>
                {{/if}}
                {{foreach from=$posts item=post name=post}}
                <table class="bor" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="pls">
                        </td>
                        <td class="plc"></td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="pls yahei">
                            <div class="pi">
                                <span class="bold"><em class="{{if $post.isfirst}}color-3{{else}}color-2{{/if}}">{{$post.username}}</em></span>
                            </div>
                            <div class="avter shadow-1">
                                <img src="{{if $post.headpic}}{{$post.headpic}}{{else}}/resource/images/user_head_img.gif{{/if}}" width="120" height="120" />
                            </div>
                            <div class="ple clearfix">
                            	<span><p>{{$post.threadsnum}}</p>主题</span>
                                <span><p>{{$post.postsnum}}</p>帖子</span>
                                <span class="score"><p>0</p>积分</span>
                            </div>
                            <div class="ple">{{$post.group}}</div>
                            <div class="ple clearfix"><span class="lti">注册时间</span><span class="rti">{{$post.regtime|date_format:'%Y-%m-%d'}}</span></div>
                            <div class="ple clearfix"><span class="lti">最后登录</span><span class="rti">{{$post.lastvisit|date_format:'%Y-%m-%d'}}</span></div>
                            <div class="ple clearfix"><span class="lti">主题</span><span class="rti">{{$post.threadsnum}}</span></div>
                        </td>
                        <td class="plc lc">
                            <div class="pti {{if $post.isfirst}}manage{{else}}player{{/if}}">
                                <span>发表于 {{$post.addtime|date_format:'%Y-%m-%d %H:%M:%S'}} {{if $post.replycredit && $post.isfirst != 1}}<em class="color-3 fbold">奖励 {{$post.replycredit}} 积分</em>{{/if}}</span>
                                <span class="close color-2 fbold">{{if $post.isfirst == 1}}楼主{{elseif $smarty.foreach.post.iteration == 2}}沙发{{elseif $smarty.foreach.post.iteration == 3}}板凳{{else}}{{$smarty.foreach.post.iteration}}F{{/if}}</span>
                                {{if $post.isrush}}
                                <span class="rush color-3 fbold">抢中本楼</span>
                                {{/if}}
                            </div>
                            <div class="b-c">
                                {{if $post.useable}}
                                	{{if $post.reply}}
                                    <div class="quote">
                                    	<blockquote>{{$post.reply}}</blockquote>
                                    </div>
                                    {{/if}}
                                    <div class="bbs-content">{{$post.content}}</div>
                                    {{if $thread.special && $post.isfirst == 1}}
                                    <ul class="bbs-vote">
                                    	<li class="usernum">共有 {{$votes.usernum}} 人参与投票</li>
                                        {{foreach from=$votes.votes item=vote name=vote}}
                                        <li>
                                        	<b class="fl">{{$smarty.foreach.vote.iteration}}、{{$vote.votename}}</b>
                                            <div class="clearfix">
                                            	<div class="percent">
                                                	<div class="cur" style="width:{{$vote.percent}}%;"></div>
                                                </div>
                                            	<div class="voteuid">{{$vote.percent}}% ({{$vote.voteuids}})</div>
                                                <div class="votepost">
                                                	<a href="javascript:void(0);" onClick="CD.BBS.vote('{{$threadid}}', '{{$vote.id}}')">投票</a>
                                                </div>
                                            </div>
                                        </li>
                                        {{/foreach}}
                                    </ul>
                                    {{/if}}
                                {{else}}
                                    <div class="common-tip">该帖已经被屏蔽</div>
                                {{/if}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                    	<td class="pls"></td>
                        <td class="plc lc">
                        	<div class="pth">
                                <a class="fast-reply" href="javascript:void(0);" onClick="CD.BBS.replyPost('{{$post.id}}', '{{$post.threadid}}', '{{$post.forumid}}')">回复</a>
                                {{if $user.gid == 5 || $user.gid == 1}}
                                	{{if $post.useable == 1}}
                                	<a class="sheild" href="javascript:void(0);" onClick="CD.BBS.sheild('{{$post.id}}', 0)">屏蔽</a>
                                    {{else}}
                                    <a class="sheild" href="javascript:void(0);" onClick="CD.BBS.sheild('{{$post.id}}', 1)">取消屏蔽</a>
                                    {{/if}}
                                {{/if}}
                            </div>
                        </td>
                    </tr>
                </table>
                {{/foreach}}
                <table class="bor" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="pls">
                        </td>
                        <td class="plc"></td>
                    </tr>
                </table>
            </div>
            {{if $user.gid == 5 || $user.gid == 1}}
            <div class="bbs-forum-thread color-5 bbs-forum-thread-line">
                <a href="javascript:void(0);" onClick="CD.BBS.stamp('{{$thread.id}}', '{{$thread.stamp}}')" class="color-2">图章</a> | 
                {{if $thread.isbest == 1}}<a href="javascript:void(0);" onClick="CD.BBS.setIs(0, 'isbest', '{{$thread.id}}')" class="color-2">取消精华</a>{{else}}<a href="javascript:void(0);" onClick="CD.BBS.setIs(1, 'isbest', '{{$thread.id}}')" class="color-2">精华</a>{{/if}} | 
                {{if $thread.istop == 1}}<a href="javascript:void(0);" onClick="CD.BBS.setIs(0, 'istop', '{{$thread.id}}')" class="color-2">取消置顶</a>{{else}}<a href="javascript:void(0);" onClick="CD.BBS.setIs(1, 'istop', '{{$thread.id}}')" class="color-2">置顶</a>{{/if}}
            </div>
            {{/if}}
            <div class="bbs-forum-thread bbs-forum-thread-line">
                <div class="post clearfix">
                    <div class="pages fr">
                	{{include file='common/multipage.tpl'}}
                	</div>
                </div>
            </div>
            <form id="pform" method="post" action="/bbs/reply" onsubmit="return checkReply();">
            <div class="bbs-p-list" id="reply">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="pls"><div class="avter shadow-1"><img src="{{if $user.headpic150}}{{$user.headpic150}}{{else}}/resource/images/user_head_img.gif{{/if}}" width="120" height="120" /></div></td>
                        <td class="plc lc">
                            <div class="reply">
                            	{{if $user.uid}}
                                <div class="editor-customer">{{$content}}</div>
                                <div>
                                    <input type="submit" class="bbs-btn" value="发表回复" />
                                    <input type="hidden" name="forumid" value="{{$forumid}}" />
                                    <input type="hidden" name="threadid" value="{{$threadid}}" />
                                    <input type="hidden" name="action" value="post" />
                                </div>
                                {{else}}<div class="no-login">你还没有登录，不能发表回复！<a href="/u/login?refer={{$refer}}" class="color-2">点击登录</a></div>
                                {{/if}}
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            </form>
        </div>
        <div class="h-10"></div>
        <ul id="postmenu" class="shadow border-raidus-b">
        	<li><a href="/bbs/post/forumid/{{$thread.forumid}}">发表帖子</a></li><!-- 
            <li><a href="/bbs/post-{{$thread.forumid}}-1">发表投票</a></li> -->
        </ul>
        {{include file='common/footer.tpl'}}
    </body>
</html>
<script language="JavaScript">
function checkReply(){
	var reply = contentEditor.getContent();
	if(reply == ''){
		layer.msg('留点什么吧！');
		return false;
	}
}
</script>