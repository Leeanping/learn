<!doctype html>
<html>
    <head>
    	<title>{{$article.seotitle}}_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    	<meta name="keywords" content="{{$article.keywords}}" />
		<meta name="description" content="{{$article.description}}" />
        {{include file='common/style.tpl'}}
    </head>
    
    <body>
    	{{include file='common/header.tpl'}}
        <div class="ban clearfix">{{TO->ad tag='NavAdFivth' typeid='$article.catid'}}</div>
        <!-- 内容 -->
        <div class="main">
            <div class="wp">
                <div class="m-cur">
                    <span>您现在所在位置：</span>
                    <a href="/">首页</a>
                    {{$crumb}}
                </div>
                <div class="m-product_qj">
                    <div class="row1">
                        <div class="m-product clearfix">
                            <div class="pic-box">
                                <div class="slider-for">
                                    {{foreach from=$galleries item=gallery}}
                                    <div class="img">
                                        <div class="pic">
                                            <img src="{{$gallery.imgurl}}" alt="" />
                                        </div>
                                    </div>
                                    {{/foreach}}
                                </div>
                                <div class="slider-nav clearfix">
                                    {{foreach from=$galleries item=thumb}}
                                    <div class="item">
                                        <div class="img">
                                            <img src="{{$thumb.imgurl}}" alt="">
                                        </div>
                                    </div>
                                    {{/foreach}}
                                </div>
                            </div>
                            <div class="txt-box clearfix">
                                <h3>{{$article.title}}</h3>
                                <em>{{$article.extend.tip}}</em>
                                <span>品　牌 : {{$article.extend.brand}}</span>
                                <span>外　观 : {{$article.extend.wg}}</span>
                                <span>规　格 : {{$article.extend.spec}}</span>
                                <span>产　地 : {{$article.extend.place}}</span>
                                <span>重　量 : {{$article.extend.weight}}</span>
                                <div class="price">
                                    <span class="new">优惠价 : ￥{{$article.extend.price}}元</span>
                                    <span class="old">市场价 : {{$article.extend.marketprice}}元</span>
                                </div>
                                <div class="txt">
                                    <h5>产品简介:</h5>
                                    <p style="height: 72px;">{{$article.extend.promo}}</p>
                                </div>
                                <a href="http://wpa.qq.com/msgrd?v=3&amp;uin={{$article.extend.qq}}&amp;site=qq&amp;menu=yes" target="_blank" class="btn-inform">产品咨询</a>
                                <a href="{{$article.extend.tburl}}" target="_blank" class="btn-inform">在线购买</a>
                            </div>
                        </div>
                    </div>
                    <div class="row2">
                        <div class="col-l">
                            <div class="slide-bar">
                                <h2>推荐商品</h2>
                                <ul class="ul-groom">
                                    {{vplist from='article' item='special' moduleid='shop' num='5' extend='price,marketprice' isspecial='1' catid='$article.catid'}}
                                    <li>
                                        <a href="{{$special.url}}">
                                            <div class="pic">
                                                <img src="{{$special.articlepic}}" alt="{{$special.title}}">
                                            </div>
                                            <div class="txt">
                                                <h3>{{$special.title}}</h3>
                                                <!--<p class="intro">{{$special.cutstr}}</p>-->
                                                <div class="price">
                                                    <span class="new">￥{{$special.extend.price}}</span>
                                                    <span class="old">原价{{$special.extend.marketprice}}元</span>
                                                </div>
                                                <div class="mark"></div>
                                            </a>
                                        </div>
                                    </li>
                                    {{/vplist}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-r">
                            <div class="m-parm">
                                <h2>产品详情</h2>
                                <div class="clearfix" style="margin: 10px 0;">
                                    {{vpadsingle tagname='NavAdCert' typeid='$article.catid'}}
                                </div>
                                <div class="txt">{{$article.content}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 内容 end -->
        {{include file='common/footer.tpl'}}
    </body>
</html>
<link rel="stylesheet" href="/resource/css/slick.css">
<script type="text/javascript" src="/resource/js/slick.min.js"></script>

<script>
    $(document).ready(function() {
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            centerMode: true,
            centerPadding:"0",
            autoplay:true,
            autoplaySpeed: 5000,
            arrows: false,
            focusOnSelect: true,
        });   
    });
</script>