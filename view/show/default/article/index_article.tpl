<!doctype html>
<html>
    <head>
    	<title>{{$nav.seotitle}}_{{TO->cfg key="site_name" group="site" default="致茂网络"}}</title>
    	<meta name="keywords" content="{{$nav.keywords}}" />
        <meta name="description" content="{{$nav.description}}" />
        {{include file='common/style.tpl'}}
    </head>
    
    <body>
    	{{include file='common/header.tpl'}}
        <div class="ban clearfix">{{vpadsingle tagname='NavAdFivth' typeid='$nav.id'}}</div>
        <!-- 内容 -->
        <div class="main">
            <div class="wp">
                <div class="m-cur">
                    <span>您现在所在位置：</span>
                    <a href="/">首页</a>
                    {{$crumb}}
                </div>
                <div class="m-tab">
                    {{vplist from='channel' item='child' parentid='9'}}
                    <a href="{{$child.url}}"{{if $child.id == $nav.id}} class="on"{{/if}}>{{$child.name}}</a>
                    {{/vplist}}
                </div>
                <div class="m-about">
                    <div class="con">
                        {{$nav.body}}
                    </div>
                </div>
            </div>
        </div>
        <!-- 内容 end -->
        {{include file='common/footer.tpl'}}
    </body>
</html>
<script type="text/javascript">
$(function(){
    $('.m-about .con').find('img').each(function(index, el) {
        if($(el).width() > 1140){
            $(el).css('width', '100%');
        }else{
            $(el).css('width', 'auto');
        }
    });
})
</script>