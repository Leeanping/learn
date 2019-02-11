{{include file="admin/header.tpl"}}
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="/resource/admin/css/form/global.css">
<link rel="stylesheet" href="/resource/admin/css/form/bootstrap/bootstrap.custom.vpcv.css">
<link rel="stylesheet" href="/resource/admin/css/form/manage.css">
<div class="infobox">
    <h2>提示信息 - <span>{{$msg}}</span></h2>
    <div class="postbox">
    	<meta http-equiv="refresh" content="{{$time}}; url={{$seogourl}}" />
        <p class="marginbot"><a href="{{$gourl}}">点击返回</a></p>
    </div>
</div>
{{include file="admin/footer.tpl"}}