<!doctype html>
<html>
    <head>
    	<title>{{$forum.name}}_{{TO->cfg key="site_name" group="basic" default="致茂网络"}}</title>
    	<meta name="keywords" content="{{$navInfo.keywords}}" />
		<meta name="description" content="{{$navInfo.description}}" />
    	{{include file="common/style.tpl"}}
    	<script type="text/javascript" src="/resource/js/bankuai.js"></script>
    </head>

    <body>
    	{{include file='common/header.tpl'}}
        <div class="wrap clearfix">
            <div class="breadcrumb">
                <p class="block"><a href="/">首页</a>&gt;<a href="/bbs">论坛</a>&gt;<a href="/bbs/threads/forumid/{{$forum.id}}">{{$forum.name}}</a></p>
            </div>
            <!-- 论坛板块列表 -->
            <div class="bankuai">
                <div class="layout ptb16 hght">
                    <div class="forum_post">
                        <span class="forum_post_button" id="btn_box">
                            <a href="#" style="display: block; width:133px; height:43px;"></a>
                            <em class="forum_post_outcon" id="btn_list">
                                <em class="forum_post_out">
                                    <a href="/bbs/post/forumid/{{$forum.id}}">发表帖子</a></em>
                            </em>
                        </span>
                    </div>
                    <style>.dfxlcon{float: left;margin-top: 13px;margin-left: 10px;} .dfxlcon a{ color:#585858; text-decoration:none;} .dfxlcon a:hover{ color:#162833; text-decoration:none;}</style>
                    <div class="dfxlcon"></div>
                    <div class="list_pager">
                        {{include file='common/multipage.tpl'}}
                    </div>
                </div>
                <!-- end top -->
                <div class="layout n_m_s_t" style="position: relative;">
                    <div class="layout forum_category">
                        <a href="/bbs/threads/forumid/{{$forum.id}}" class="zhong">全部</a>
                    </div>
                    <div class=" layout forum_screeningwarpten">
                        <div class="forum_screening_l">
                            <a href="/bbs/threads/forumid/{{$forum.id}}"{{if !$orderby}} class="zhong"{{/if}}>全部</a>
                            <a href="/bbs/threads/forumid/{{$forum.id}}/orderby/best"{{if $orderby == 'best'}} class="zhong"{{/if}}>精华</a>
                            <a href="/bbs/threads/forumid/{{$forum.id}}/orderby/views"{{if $orderby == 'views'}} class="zhong"{{/if}}>热门</a>
                        </div>
                        <div class="forum_screening_r">
                            <a href="/bbs/threads/forumid/{{$forum.id}}/orderby/lastpost" class="reply{{if $orderby == 'lastpost'}} zhong{{/if}}"></a>
                            <a href="/bbs/threads/forumid/{{$forum.id}}/orderby/addtime" class="publish{{if $orderby == 'addtime'}} zhong{{/if}}"></a>
                        </div>
                    </div>
                    <table width="0" border="0" cellspacing="0" cellpadding="0" class="bbslistbox">
                        <tr>
                            <th colspan="2" class="t_i26">{{$forum.name}} 本版置顶</th>
                            <th>作者/发布时间</th>
                            <th>回复/查看</th>
                            <th>最后回复</th>
                        </tr>
                        {{foreach from=$bests item=best}}
                        <tr id="stickthread_2278252">
                            <td class="tb_">
                                <img src="/resource/images/pin_1.gif" alt="{{$best.title}}" />
                            </td>
                            <td class="w660">
                                <table width="0" border="0" cellspacing="0" cellpadding="0" class="titletable">
                                    <tr>
                                        <td class="fl_17_no"></td>
                                        <td class="fl_17_no"></td>
                                        <td>
                                            <div class="title_o_t_s">
                                                <h2 style="display:inline">
                                                    <a{{if $best.titlecolor}} style="color:#{{$best.titlecolor}}"{{/if}} href="/bbs/display/forumid/{{$best.forumid}}/threadid/{{$best.id}}" style="font-weight: bold;color: #EE1B2E" target="_blank" class="f_16">{{$best.title}}</a>
                                                    {{if $best.replycredit}}<em>[回帖奖励 {{$best.replycredit}}]</em>{{/if}}{{if $best.isrush}}<em class="rush">[本帖为抢楼贴,欢迎抢楼]</em>{{/if}}<b class="b-icon">{{$best.icon}}</b>
                                                </h2>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td class="w105">
                                <span class="d_block">
                                    <a href="#" rel="nofollow">{{$best.username}}</a></span>
                                <em class="d_block">{{$best.addtime|date_format:'%Y-%m-%d %H:%M'}}</em></td>
                            <td class="w70">
                                <span class="d_block">
                                    <a class="blue">{{$best.replies}}</a></span>
                                <em class="d_block">{{$best.views}}</em></td>
                            <td class="w105">
                                <span class="d_block">
                                    <a href="###" class="blue" c="1" rel="nofollow">{{$best.lastposter}}</a></span>
                                <span class="d_block">
                                    <a href="###" class="gray" rel="nofollow">{{$best.lastpost|date_format:'%Y-%m-%d %H:%M'}}</a></span>
                            </td>
                        </tr>
                        {{/foreach}}
                    </table>
                    <table width="0" border="0" cellspacing="0" cellpadding="0" class="bbslistbox">
                        <tr>
                            <th colspan="5" class="t_i26">{{$forum.name}} 帖子标题</th>
                        </tr>
                        {{foreach from=$threads item=thread}}
                        <tr id="normalthread_5246678">
                            <td class="tb_">
                                <img src="/resource/images/{{if $thread.special}}pollsmall{{else}}folder_new{{/if}}.gif" alt="{{$thread.title}}" />
                            </td>
                            <td class="w660">
                                <table width="0" border="0" cellspacing="0" cellpadding="0" class="titletable">
                                    <tr>
                                        <td class="fl_17_no"></td>
                                        <td class="fl_17_no"></td>
                                        <td>
                                            <div class="title_o_t_s">
                                                <h2 style="display:inline">
                                                    <a target="_blank" class="f_16" href="/bbs/display/forumid/{{$thread.forumid}}/threadid/{{$thread.id}}"{{if $thread.titlecolor}} style="color:#{{$thread.titlecolor}}"{{/if}}>{{$thread.title}}</a>{{if $thread.replycredit}}<em>[回帖奖励 {{$thread.replycredit}}]</em>{{/if}}{{if $thread.isrush}}<em class="rush">[本帖为抢楼贴,欢迎抢楼]</em>{{/if}}<b class="b-icon">{{$thread.icon}}</b>
                                                </h2>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td class="w105">
                                <span class="d_block">
                                    <a href="###" rel="nofollow">{{$thread.username}}</a></span>
                                <em class="d_block">{{$thread.addtime|date_format:'%Y-%m-%d %H:%M'}}</em></td>
                            <td class="w70">
                                <span class="d_block">
                                    <a class="blue">{{$thread.replies}}</a></span>
                                <em class="d_block">{{$thread.views}}</em></td>
                            <td class="w105">
                                <span class="d_block">
                                    <a href="###" class="blue" c="1" rel="nofollow">{{$thread.lastposter}}</a></span>
                                <span class="d_block">
                                    <a href="###" class="gray" rel="nofollow">{{$thread.lastpost|date_format:'%Y-%m-%d %H:%M'}}</a></span>
                            </td>
                        </tr>
                        {{/foreach}}
                    </table>
                </div>
                <div class="layout ptb16 hght">
                    <div class="forum_post">
                        <span class="forum_post_button" id="btn_box">
                            <a href="#" style="display: block; width:133px; height:43px;"></a>
                            <em class="forum_post_outcon" id="btn_list">
                                <em class="forum_post_out">
                                    <a href="/bbs/post/forumid/{{$forum.id}}">发表帖子</a></em>
                            </em>
                        </span>
                    </div>
                    <style>.dfxlcon{float: left;margin-top: 13px;margin-left: 10px;} .dfxlcon a{ color:#585858; text-decoration:none;} .dfxlcon a:hover{ color:#162833; text-decoration:none;}</style>
                    <div class="dfxlcon"></div>
                    <div class="list_pager">
                        {{include file='common/multipage.tpl'}}
                    </div>
                </div>
            </div>
            <!-- 论坛板块列表 -->
        </div>
        {{include file='common/bbs.tpl'}}
        {{include file='common/footer.tpl'}}
    </body>
</html>