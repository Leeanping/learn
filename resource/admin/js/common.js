var addrowdirect = 0;
var addrowkey = 0;
function _getBrowser(){var ua = navigator.userAgent.toLowerCase();var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) || /(webkit)[ \/]([\w.]+)/.exec( ua ) || /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) || /(msie) ([\w.]+)/.exec( ua ) || ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) || [];return {browser: match[ 1 ] || "",version: match[ 2 ] || "0"};};
function checkAll(form, name) {for(var i = 0; i < form.elements.length; i++) {var e = form.elements[i];if(e.type == 'checkbox' && e.name == name){if(e.checked){e.checked = false;}else{e.checked = true;}}}};
function show(obj, sobj){if($(sobj).css('display') == 'none'){$(obj).addClass('togchildboard').text('合并');$(sobj).show();}else{$(obj).removeClass('togchildboard').text('展开');$(sobj).hide();}};
function addrow(obj, type) {var table = obj.parentNode.parentNode.parentNode.parentNode.parentNode;if(!addrowdirect) {var row = table.insertRow(obj.parentNode.parentNode.parentNode.rowIndex);} else {var row = table.insertRow(obj.parentNode.parentNode.parentNode.rowIndex + 1);}var typedata = rowtypedata[type];for(var i = 0; i <=typedata.length - 1; i++) {var cell = row.insertCell(i);cell.colSpan = typedata[i][0];var tmp = typedata[i][1];if(typedata[i][2]) {cell.className = typedata[i][2];}tmp = tmp.replace(/\{(n)\}/g, function($1) {return addrowkey;});tmp = tmp.replace(/\{(\d+)\}/g, function($1, $2) {return addrow.arguments[parseInt($2) + 1];});cell.innerHTML = tmp;}addrowkey ++;addrowdirect = 0;};
function deleterow(obj) {var table = obj.parentNode.parentNode.parentNode.parentNode.parentNode;var tr = obj.parentNode.parentNode.parentNode;table.deleteRow(tr.rowIndex);};
function upfileEvent(){
	$('#ufilelist li').each(function(index, element) {
		var btn = $(element).find('.ufile-panel');
		$(element).on('mouseenter', function(){
			btn.stop().animate({height: 30});
		});
		$(element).on('mouseleave', function(){
			btn.stop().animate({height: 0});
		});
		var cancel = btn.find('.ucancel');
		cancel.click(function(){
			var file_id = $(this).attr('data-id');
			$.getJSON(SITE_URL + 'swfupload/swfupload/drop/file_id/' + file_id, {}, function(json){
				if(json.msg == 'ok'){
					layer.msg('删除成功');
					$('#upfile-' + file_id).remove();
				}else{
					layer.msg('删除失败');
				}
			});
		});
	});
}
function showObj(obj){$('#' + obj).show();};function hideObj(obj){$('#' + obj).hide();}
document.getCookie = function(sName){
	var aCookie = document.cookie.split("; ");
	for (var i=0; i < aCookie.length; i++){
		var aCrumb = aCookie[i].split("=");
		if (sName == aCrumb[0])
		  	return decodeURIComponent(aCrumb[1]);
	}
	return null;
}

document.setCookie = function(sName, sValue, sExpires){
	var sCookie = sName + "=" + encodeURIComponent(sValue);
	if (sExpires != null){
	  	sCookie += "; expires=" + sExpires;
	}
  
	document.cookie = sCookie;
}

document.removeCookie = function(sName,sValue){
  	document.cookie = sName + "=; expires=Fri, 31 Dec 1999 23:59:59 GMT;";
}