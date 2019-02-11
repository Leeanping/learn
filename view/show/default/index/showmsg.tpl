<!doctype html>
<html>
    <head>
        <title>提示消息</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href='/favicon.ico'/>
        {{include file="common/style.tpl"}}
        <style type="text/css">
        .infobox{ background:#fff;padding:20px; text-align:center; font-size:14px; color:#666;}
        .infobox h3{ height:40px; line-height:40px; color:#ff2985;}
        .infobox p{ padding-bottom:10px;}
        .infobox a{ color:#09c;}
        </style>
    </head>
    <body>
    	{{include file="common/header.tpl"}}
		<div class="block">
        	<div class="infobox">
            	<h3 class="float_ctrl"><em>提示信息</em></h3>
                <div class="postbox">
                	<p>{{$msg}}</p>
                    {{if $button}}
                        {{if $btns}}
                        <p class="marginbot">
                        {{foreach key=key item=btn from=$btns}}
                            <span class="bluebtn"><a href="{{$btn.link}}">{{$btn.text}}</a></span>
                        {{/foreach}}
                        </p>
                        {{else}}
                        <p class="marginbot"><a href="{{$seogourl}}" class="returnbtn">点击返回</a></p>
                        {{/if}}
                    {{else}}
                    	<meta http-equiv="refresh" content="{{$time}}; url={{$seogourl}}" />
                    	<p class="marginbot"><a href="{{$gourl}}" class="returnbtn">如果浏览器没有反应，请点击返回</a></p>
                    {{/if}}
                </div>
            </div>
		</div>
		{{include file="common/footer.tpl"}}
	</body>
</html>