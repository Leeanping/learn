<!doctype html>
<html>
    <head>
    	<title>{{vpconfig key="index_seotitle" group="site" default="首页"}}_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    	<meta name="keywords" content="{{TO->cfg key="index_keywords" group="site" default="首页"}}" />
		<meta name="description" content="{{TO->cfg key="index_description" group="site" default="首页"}}" />
        {{include file='common/style.tpl'}}
        <link type="text/css" href="/resource/css/index.css" rel="stylesheet" />
        <link type="text/css" href="/resource/css/swiper.min.css" rel="stylesheet" />
        <script type="text/javascript" src="/resource/js/swiper.min.js"></script>
    </head>
    
    <body>
    	{{include file='common/header.tpl'}}
        <!-- banner -->
        <div class="banner">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    {{vplist from='ad' item='adlist' tagname='pcindexFocus'}}
                    <div class="swiper-slide">
                        <a href="{{$adlist.linkurl}}">
                            <img src="{{$adlist.imgurl}}" width="100%" />
                        </a>
                    </div>
                    {{/vplist}}
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!-- banner END-->
        <section class="section-1">
            <h2>科技改变生活(演示板块一)</h2>
            <p class="brief">科技正用你无法想象的速度在改变世界，改变人们的生活</p>
            <ul class="block">
                <li>
                    <i class="icon-inbox"></i>
                    <h3>板块一</h3>
                    <p>板块一的简介，根据后台数据变换</p>
                </li>
                <li>
                    <i class="icon-heart"></i>
                    <h3>板块二</h3>
                    <p>板块二的简介，根据后台数据变换</p>
                </li>
                <li>
                    <i class="icon-leaf"></i>
                    <h3>板块三</h3>
                    <p>板块三的简介，根据后台数据变换</p>
                </li>
                <li>
                    <i class="icon-desktop"></i>
                    <h3>板块四</h3>
                    <p>板块四的简介，根据后台数据变换</p>
                </li>
            </ul>
        </section>
        <section class="section-2">
            {{vplist from='type' item='ptop' catid='3'}}
            <h2>{{$ptop.name}}(演示板块)</h2>
            <p class="brief">{{$ptop.description}}</p>
            <ul class="block child">
                <li>
                    <a class="active" href="{{$ptop.url}}">全部</a>
                </li>
                {{vplist from='channel' item='pt' parentid='$ptop.id'}}
                <li>
                    <a href="{{$pt.url}}">{{$pt.name}}</a>
                </li>
                {{/vplist}}
            </ul>
            {{/vplist}}
            <div class="list block">
                <ul>
                    {{vplist from='article' item='good' catid='3' isindex='1' num='8' extend='price'}}
                    <li>
                        <a href="{{$good.url}}" target="_blank">
                            <div class="pic"><img src="{{$good.origin}}" width="100%" height="204"></div>
                            <h4>{{$good.title}}</h4>
                            <p class="price">￥{{$good.extend.price}}</p>
                        </a>
                    </li>
                    {{/vplist}}
                </ul>
            </div>
        </section>
        <section>
            <h2>案例展示(演示板块)</h2>
            <p class="brief">分享最新科给你最美的展示</p>
            <div class="section-4 clearfix">
                {{vplist from='article' item='case' catid='4' isindex='1' num='8'}}
                <div class="item">
                    <a href="{{$news.url}}" target="_blank"><img src="{{$case.origin}}" width="100%"></a>
                </div>
                {{/vplist}}
            </div>
        </section>
        <section>
            <h2>新闻资讯(演示板块)</h2>
            <p class="brief">分享最新科技资讯，关注智能硬件</p>
            <div class="section-3 block">
                <div class="list">
                    <ul class="clearfix">
                        {{vplist from='article' item='news' catid='2' isindex='1' num='8'}}
                        <li class="clearfix">
                            <a href="{{$news.url}}" target="_blank">
                                <div class="image"><img src="{{$news.origin}}" width="100%"></div>
                                <div class="body">
                                    <h4>{{$news.title}}</h4>
                                    <p class="des">{{$news.cutstr}}...</p>
                                    <p class="info">
                                        <span>{{$news.updatetime|date_format:'%Y-%m-%d'}}</span>
                                        <span>
                                            <i class="icon-eye-open"></i> {{$news.shownum}}
                                        </span>
                                    </p>
                                </div>
                            </a>
                        </li>
                        {{/vplist}}
                    </ul>
                </div>
            </div>
        </section>
        <section class="section-5">
            {{vplist from='type' item='about' catid='1'}}
            <h2>{{$about.name}}(演示板块)</h2>
            <p class="brief">{{$about.description}}</p>
            <div class="txt block">
                {{$about.body}}
            </div>
            {{/vplist}}
        </section>
        {{include file='common/footer.tpl'}}
    </body>
</html>
<script>
var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true,
    autoHeight: true,
    loop: true,
    autoplay: 5000
});
</script>