<!doctype html>
<html>
    <head>
    	<title>大咖_{{TO->cfg key="site_name" group="basic" default="致茂网络"}}</title>
    	<meta name="keywords" content="{{TO->cfg key="index_keywords" group="basic" default="首页"}}" />
		<meta name="description" content="{{TO->cfg key="index_description" group="basic" default="首页"}}" />
        {{include file='common/style.tpl'}}
        <script type="text/javascript" src="/resource/js/daka.js"></script>
    </head>
    
    <body>
    	{{include file='common/header.tpl'}}
        <div class="dkbanner">
            {{TO->ad tag="DermIndex"}}
        </div>
        <!--// end ad-->
        <div class="wrap clearfix block">
            <div class="picScroll-left">
                <div class="hd">
                    <a class="next"></a>                
                    <a class="prev"></a>
                    <strong>摄影大咖</strong>
                    <span class="pageState"></span>
                </div>
                <div class="bd">
                    <ul class="picList">
                        {{vplist from='derm' item='sy' num='3' roleid='1'}}
                        <li>
                            <div class="pic"><a href="/derm/show/id/{{$sy.uid}}" target="_blank"><img width="280" height="400" src="{{$sy.headpic}}" /></a></div>
                            <div class="title">
                                <h2>{{$sy.realname}}</h2>
                                <p class="title-nr">{{$sy.summary}}</p>
                                <p class="title-gz"><a class="gz-rs" href="javascript:;" onclick="postBest(this, 'derm', '{{$sy.uid}}')">{{$sy.bestnum}}</a><a class="gz-fx" href="#">分享</a><a class="gz-gz" href="javascript:;" onclick="postStow('derm', '{{$sy.uid}}', '{{$sy.realname}}')">关注</a></p>
                                <a class="title-det" href="/derm/show/id/{{$sy.uid}}">查看TA的详情</a>
                            </div>
                        </li>
                        {{/vplist}}
                    </ul>
                </div>
            </div>
            <div class="picScroll-left">
                <div class="hd">
                    <a class="next"></a>                
                    <a class="prev"></a>
                    <strong>化妆大咖</strong>
                    <span class="pageState"></span>
                </div>
                <div class="bd">
                    <ul class="picList">
                        {{vplist from='derm' item='hz' num='3' roleid='2'}}
                        <li>
                            <div class="pic"><a href="/derm/show/id/{{$hz.uid}}" target="_blank"><img width="280" height="400" src="{{$hz.headpic}}" /></a></div>
                            <div class="title">
                                <h2>{{$hz.realname}}</h2>
                                <p class="title-nr">{{$hz.summary}}</p>
                                <p class="title-gz"><a class="gz-rs" href="#">{{$hz.bestnum}}</a><a class="gz-fx" href="#">分享</a><a class="gz-gz" href="#">关注</a></p>
                                <a class="title-det" href="/derm/show/id/{{$hz.uid}}">查看TA的详情</a>
                            </div>
                        </li>
                        {{/vplist}}
                    </ul>
                </div>
            </div>
            <div class="picScroll-left">
                <div class="hd">
                    <a class="next"></a>                
                    <a class="prev"></a>
                    <strong>设计大咖</strong>
                    <span class="pageState"></span>
                </div>
                <div class="bd">
                    <ul class="picList">
                        {{vplist from='derm' item='sj' num='3' roleid='3'}}
                        <li>
                            <div class="pic"><a href="/derm/show/id/{{$sj.uid}}" target="_blank"><img width="280" height="400" src="{{$sj.headpic}}" /></a></div>
                            <div class="title">
                                <h2>{{$sj.realname}}</h2>
                                <p class="title-nr">{{$sj.summary}}</p>
                                <p class="title-gz"><a class="gz-rs" href="#">{{$sj.bestnum}}</a><a class="gz-fx" href="#">分享</a><a class="gz-gz" href="#">关注</a></p>
                                <a class="title-det" href="/derm/show/id/{{$sj.uid}}">查看TA的详情</a>
                            </div>
                        </li>
                        {{/vplist}}
                    </ul>
                </div>
            </div>
            <div class="picScroll-left">
                <div class="hd">
                    <a class="next"></a>                
                    <a class="prev"></a>
                    <strong>婚礼大咖</strong>
                    <span class="pageState"></span>
                </div>
                <div class="bd">
                    <ul class="picList">
                        {{vplist from='derm' item='hl' num='3' roleid='4'}}
                        <li>
                            <div class="pic"><a href="/derm/show/id/{{$hl.uid}}" target="_blank"><img width="280" height="400" src="{{$hl.headpic}}" /></a></div>
                            <div class="title">
                                <h2>{{$hl.realname}}</h2>
                                <p class="title-nr">{{$hl.summary}}</p>
                                <p class="title-gz"><a class="gz-rs" href="#">{{$hl.bestnum}}</a><a class="gz-fx" href="#">分享</a><a class="gz-gz" href="#">关注</a></p>
                                <a class="title-det" href="/derm/show/id/{{$hl.uid}}">查看TA的详情</a>
                            </div>
                        </li>
                        {{/vplist}}
                    </ul>
                </div>
            </div>
        </div>
        {{include file='common/footer.tpl'}}
    </body>
</html>