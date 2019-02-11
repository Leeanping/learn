{{if $multipage}}
<div id="pagination" class="pagination">
	{{foreach from=$multipage item=page}}
		{{if $page.total}}
		<button class="btn total" disabled="disabled">{{$page.total}}</button>
		{{/if}}
		{{if $page.totalpage}}
		<button class="btn totalpage" disabled="disabled">{{$page.totalpage}}</button>
		{{/if}}
		{{if $page.prev}}
		<a class="btn prev" href="javascript:;" onclick="Controller.main('{{$page.prev.1}}')">{{$page.prev.0}}</a>
		{{/if}}
		{{foreach from=$page.pages item=p}}
			{{if $p.1}}
			<a class="btn" href="javascript:;" onclick="Controller.main('{{$p.1}}')">{{$p.0}}</a>
			{{else}}
			<button class="btn active" disabled="disabled">{{$p.0}}</button>
			{{/if}}
		{{/foreach}}
		{{if $page.next}}
		<a class="btn prev" href="javascript:;" onclick="Controller.main('{{$page.next.1}}')">{{$page.next.0}}</a>
		{{/if}}
	{{/foreach}}
</div>
{{/if}}