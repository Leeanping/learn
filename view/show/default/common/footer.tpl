<footer>
	<div class="block">
		<div class="link">
			<a href="javascropt:;">友情链接：</a>
			{{vplist from='link' item='link'}}
			<a href="{{$link.link}}" target="_blank">{{$link.name}}</a>
			{{/vplist}}
		</div>
		<div class="txt">
			<p>{{TO->cfg key="site_powerby" group="site" default=""}}</p>
			<p>{{TO->cfg key="site_beian" group="site" default=""}}</p>
			<p>联系电话：{{TO->cfg key="site_telephone" group="site" default=""}}</p>
		</div>
	</div>
</footer>
{{TO->cfg key="site_tj" group="site" default=""}}