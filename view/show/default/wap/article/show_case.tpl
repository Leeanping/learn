<!doctype html>
<html>
    <head>
    	<title>{{$article.seotitle}}_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    	<meta name="keywords" content="{{$article.keywords}}" />
		<meta name="description" content="{{$article.description}}" />
        {{include file='wap/style.tpl'}}
    </head>
    
    <body>
    	<div class="header">
            <h3 class="m-top">产品详情<a href="javascript:history.go(-1);"></a></h3>
        </div>
        <div class="main">
            <div class="m-con">
                <img src="{{$article.articlepic}}" alt="" />
                <div class="wp">
                    <div class="txt">
                        <h3>{{$article.title}}</h3>
                        <em>优惠价：￥{{$article.extend.price}}元</em>
                        <span>市场价：￥{{$article.extend.marketprice}}元</span>
                        <p>品　牌 : {{$article.extend.brand}}</p>
                        <p>外　观 : {{$article.extend.wg}}</p>
                        <p>规　格 : {{$article.extend.spec}}</p>
                        <p>产　地 : {{$article.extend.place}}</p>
                        <p>重　量 : {{$article.extend.weight}}</p>
                    </div>
                </div>
                <div class="con">
                    {{$article.content}}
                </div>
            </div>
        </div>
        {{include file='wap/footer.tpl'}}
    </body>
</html>