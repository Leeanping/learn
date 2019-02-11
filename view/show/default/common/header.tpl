<!-- 头部 -->
<header>
	<div class="block clearfix">
		<div id="logo"></div>
		<ul id="menu">
			<li><a href="/" class="{{if !$topid}}menuactive{{/if}}">主页</a></li>
			{{vplist from='channel' item='channel'}}
			<li><a href="{{$channel.url}}" class="{{if $channel.id == $topid}}menuactive{{else}}{{/if}}">{{$channel.name}}</a></li>
			{{/vplist}}
		</ul>
		<div class="search">
			<form action="/index/index/search" method="post">
				<input type="text" class="input" name="keyword" value="{{$keyword}}" />
				<button class="submit"><i class="icon-search"></i></button>
			</form>
		</div>
	</div>
</header>
<!-- 头部 END -->