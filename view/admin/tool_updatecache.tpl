{{include file="admin/header.tpl"}}
<form action="/admin/tool/updatecache" method="post" name="cpform" id="cpform">
    <div class="opt">
    	<input type="hidden" name="updatecache" value="1" />
    	<input type="submit" name="submit" value="更新缓存" class="btn btn-success" />
    </div>
</form>
{{include file="admin/footer.tpl"}}