<style type="text/css">
.pages{ padding: 20px 0; }
.pages li{ float: left; font-size: 14px;border:1px solid #f1f1f1;border-left: none;padding: 0; }
.pages li.total,.pages li.totalpage{padding: 9px 15px;background:#fff; color: #666;}
.pages li a{padding: 9px 15px; display: block;background:#fff; color: #666;}
.pages li.total{border-left:1px solid #f1f1f1;}
.pages li.active a,.pages li a:hover{background: #009688; color: #fff;}
</style>
{{if $multipage}}
<div class="pages clearfix">
	<ul>
    {{foreach from=$multipage item=page}}
    	{{if $page.total}}
    	<li class="total">{{$page.total}}</li>
    	{{/if}}
    	{{if $page.totalpage}}
    	<li class="totalpage">{{$page.totalpage}}</li>
    	{{/if}}
    	{{if $page.prev}}
    	<li class="prev"><a href="{{$page.prev.1}}">{{$page.prev.0}}</a></li>
    	{{/if}}
    	{{foreach from=$page.pages item=p}}
    		{{if $p.1}}
    		<li><a {{if $p.2}}class="{{$p.2}}"{{/if}} href="{{$p.1}}">{{$p.0}}</a></li>
    		{{else}}
    		<li class="active"><a href="javascript:;">{{$p.0}}</a></li>
    		{{/if}}
    	{{/foreach}}
    	{{if $page.next}}
    	<li class="next"><a href="{{$page.next.1}}">{{$page.next.0}}</a></li>
    	{{/if}}
    {{/foreach}}
    </ul>
</div>
{{/if}}