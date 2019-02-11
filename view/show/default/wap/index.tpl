<!doctype html>
<html>
    <head>
    	<title>{{TO->cfg key="index_seotitle" group="site" default="首页"}}_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    	<meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
		<meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
    	{{include file="wap/style.tpl"}}
    </head>
    <body class="ok">
        <div class="phone-head">
            <a href="/" class="logo">
                <img src="/resource/wap/images/logo.png"alt="">
            </a>
            <div class="menuBtn"></div>
        </div>
        <ul class="nav-phone">
            <li>
                <a href="/wap" class="v1">首页</a>
            </li>
            {{vplist from='channel' item='channel'}}
            <li>
                {{if $channel.id != '10'}}
                <a href="javascript:void(0);" class="v1">{{$channel.name}}</a>
                {{else}}
                <a href="{{$channel.url}}" class="v1">{{$channel.name}}</a>
                {{/if}}
                {{if $channel.id != '10'}}
                <dl>
                    {{vplist from='channel' item='child' parentid='$channel.id'}}
                    <dd><a href="{{$child.url}}">{{$child.name}}</a></dd>
                    {{/vplist}}
                </dl>
                {{/if}}
            </li>
            {{/vplist}}
        </ul>
        <div class="slider">
            <ul class="autoplay1 banner">
                {{vplist from='ad' item='adlist' tagname='IndexFocus'}}
                <li>
                    <a href="{{$adlist.linkurl}}">
                        <img src="{{$adlist.imgurl}}"  alt="">
                    </a>
                </li>
                {{/vplist}}
            </ul>
        </div>
        <div class="ind-main">
            <div class="wp">
                <div class="small-nav">
                    <ul>
                        {{vplist from='channel' item='childer' parentid='2'}}
                        <li>
                            <a href="{{$childer.url}}" class="inner">
                                <i class="i{{$childer.key}}"></i>
                                <p>{{$childer.name}}</p>
                            </a>
                        </li>
                        {{/vplist}}
                    </ul>
                </div>
                <div class="m-part1">
                    <h3 class="m-tit0">促销产品</h3>
                    <ul class="ul-list0">
                        {{vplist from='article' item='cp' catid='10' num='4' extend='price,marketprice' isindex='1'}}
                        <li>
                            <a href="{{$cp.url}}" class="inner">
                                <div class="img">
                                    <img src="{{$cp.image}}" alt="" />
                                </div>
                                <div class="txt">
                                    <p>{{$cp.title}}</p>
                                    <em>¥{{$cp.extend.price}}</em><span>¥{{$cp.extend.marketprice}}</span>
                                </div>
                            </a>
                        </li>
                        {{/vplist}}
                    </ul>
                </div>
            </div>
            <div class="m-adver clearfix">
                {{TO->ad tag='IndexAdFirst'}}
            </div>
            <div class="m-part1">
                <div class="wp">
                    <div class="m-part1">
                        <h3 class="m-tit0">古筝产品</span></h3>
                        <ul class="ul-list0">
                            {{vplist from='article' item='gp' catid='6' num='6' extend='price,marketprice' isindex='1'}}
                            <li>
                                <a href="{{$gp.url}}" class="inner">
                                    <div class="img">
                                        <img src="{{$gp.image}}" alt="" />
                                    </div>
                                    <div class="txt">
                                        <p>{{$gp.title}}</p>
                                        <em>¥{{$gp.extend.price}}</em><span>¥{{$gp.extend.marketprice}}</span>
                                    </div>
                                </a>
                            </li>
                            {{/vplist}}
                        </ul>
                        <a href="/wap/article/gz" class="more-1">
                            查看更多
                        </a>
                    </div>
                </div>
            </div>
            <div class="m-adver clearfix">{{TO->ad tag='IndexAdThird'}}</div>
            <div class="m-part1">
                <div class="wp"> 
                    <h3 class="m-tit0">钢琴产品</span></h3>
                    <ul class="ul-list0">
                        {{vplist from='article' item='piano' catid='14' num='6' extend='price,marketprice' isindex='1'}}
                        <li>
                            <a href="{{$piano.url}}" class="inner">
                                <div class="img">
                                    <img src="{{$piano.image}}" alt="" />
                                </div>
                                <div class="txt">
                                    <p>{{$piano.title}}</p>
                                    <em>¥{{$piano.extend.price}}</em><span>¥{{$piano.extend.marketprice}}</span>
                                </div>
                            </a>
                        </li>
                        {{/vplist}}
                    </ul>
                    <a href="/wap/article/gq" class="more-1">
                        查看更多
                    </a>
                    </div>
                </div>
            </div>
            <div class="m-part1">
                <div class="wp"> 
                    <h3 class="m-tit0">其他国乐产品</span></h3>
                    <ul class="ul-list0">
                        {{vplist from='article' item='op' catid='15,16,17' num='6' isindex='1' extend='price,marketprice'}}
                        <li>
                            <a href="{{$op.url}}" class="inner">
                                <div class="img">
                                    <img src="{{$op.image}}" alt="" />
                                </div>
                                <div class="txt">
                                    <p>{{$op.title}}</p>
                                    <em>¥{{$op.extend.price}}</em><span>¥{{$op.extend.marketprice}}</span>
                                </div>
                            </a>
                        </li>
                        {{/vplist}}
                    </ul>
                    <a href="/wap/article/qxcp" class="more-1">
                        查看更多
                    </a>
                </div>
            </div>

        </div>
        {{include file='wap/footer.tpl'}}
    </body>
</html>
<script src="/resource/wap/js/jquery.js"></script>
<script src="/resource/wap/js/lib.js"></script>

<link rel="stylesheet" href="/resource/wap/css/slick.css">
<script src="/resource/wap/js/slick.min.js"></script>
<script>
$(document).ready(function() {
    $('.banner').slick({
        dots:true,
        arrows:false,
        autoplay:true,
        slidesToShow: 1,
        autoplaySpeed: 5000,
        pauseOnHover:false,
        lazyLoad: 'ondemand'
    });

});
</script>