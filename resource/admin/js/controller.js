window.Controller = new (function Controller(){

	/*pform(搜索表单专用id)*/
	/*lpform(列表表单专用id)*/
	/*cpform(操作表单专用id)*/
	/**
	 * 后台表单操作控制器
	 * @author Lee
	 * @copyright 2016 ~ NaN 致茂网络
	 * use Controller.***
	 * init 初始化cpform操作框
	 * resize 调整cpform操作框
	 * close 关闭cpform操作框（支持ESC关闭）
	 * getWidthHeight 定义cpform操作框宽高
	 * show 展示cpform操作框
	 * controller 加载操作框内容
	 * main 列表显示
	 * reload 重载列表
	 * submit cpform表单提交
	 * showRequest cpform表单提交预加载
	 * showResponse cpform表单提交完成返回
	 * loading 预加载框
	 * search 列表搜索
	 * update 列表修改
	 * delete 列表删除
	 */
	var that = this;

	that.height = 0;
	that.width = 0;
	that.issubmit = 0;
	that.formOptions = {
		method: 'POST',
		beforeSubmit:  function(){that.showRequest();},
		success:       function(json){that.showResponse(json);},
		dataType:  'json'
	}

	var der, mainWrapper, controllerbox, controllertitle, controllerclose, controllerinner;
	(function(){
		der = $.Deferred();
		$(function(){
			mainWrapper = $('#mainWrapper');
			controllerbox = $('.controller-box');
			controllerheader = $('.controller-header');
			controllertitle = $('.controller-title');
			controllerclose = $('.controller-close');
			controllerinner = $('.controller-inner');
			controllerbottom = $('.controller-bottom');

			that.init();
			controllerclose.click(function(){
				that.close();
			});

			$(document).keyup(function(e){
    			if (e.keyCode == 27) {
    				if($('#cpform').length == 0) return;
     				layer.confirm('当前正在编辑，确定关闭吗？', {
			  			btn: ['确定','取消'] //按钮
					}, function(){
						that.close();
						layer.closeAll();
					}, function(){
						layer.closeAll();
			  			return false;
					});
    			}
			}); 

			$(window).resize(function(){that.resize();});
			der.resolve();
		});
	})();

	that.init = function(){
		that.getWidthHeight();
		controllerbox.css({'width': that.width, 'height': that.height, 'right': -that.width - 100});
		controllerheader.css({'width': that.width - 40, 'right': -that.width - 100});
		controllerbottom.css({'width': that.width - 40, 'right': -that.width - 100});
	};

	that.resize = function(){
		that.getWidthHeight();
		controllerbox.css({'height': that.height});
		controllerbox.perfectScrollbar('update');
	};

	that.close = function(){
		controllerbox.animate({'right': -that.width-100}, 'linear', function() {
			controllerbox.hide();
			controllerinner.html('');
		});
		controllerheader.animate({'right': -that.width-100}, 'linear', function() {
			controllertitle.text('');
		});
		controllerbottom.animate({'right': -that.width-100}, 'linear', function() {
			controllertitle.text('');
		});

		if(typeof autotimer != 'undefined'){
			clearInterval(autotimer);
		}
	};

	that.getWidthHeight = function(){
		that.height = $(window).height() - 80;
		that.width = ($(window).width() - 150) * 0.8;
	};

	that.show = function(title, url){
		controllertitle.text(title);
		controllerbox.show();
		controllerheader.show();
		controllerbottom.show();
		controllerheader.animate({'right': 0}, 'linear', function() {});
		controllerbottom.animate({'right': 0}, 'linear', function() {});
		controllerbox.animate({'right': 0}, 'linear', function() {
			$.get(SITE_URL + url, {}, function(data){
				controllerinner.removeClass('loading');
				controllerinner.html(data);
				controllerbox.perfectScrollbar();
				//that.submit();
				that.initTab();
				if($('#queueList').length > 0){
					that.initWebuploader();
				}
				//$('input[type="button"][name="vpbtn"]').attr('disabled', false);
				$('input[type="button"][name="vpbtn"]').on('click', function(){
					if(that.issubmit == 1) {
						layer.msg('不要重复提交');
						return;
					}
					//$(this).attr('disabled', true);
					if($('#scpform').length){
						$('#scpform').ajaxSubmit(that.formOptions); 
					}else{
						$('#cpform').ajaxSubmit(that.formOptions); 
					}
					return false;
				});
				if($('.gettemplate').length > 0){
					that.getFile();
				}
			})
		});
		
	};

	that.controller = function(title, url){
		$.getJSON(SITE_URL + "admin/ajax/locked", '', function(json){
			if (json.msg == 1) {
				layer.msg('请刷新页面解除锁定');
			}else if(json.msg == -1){
				window.location.href = SITE_URL + 'admin/login/index';
			}else{
				controllerinner.addClass('loading');
				that.show(title, url);
			}
		})
	};

	that.main = function(url){
		$(document).keyup(function(e){
			if (e.keyCode == 13) {
 				return false;
			}
		}); 
		$(document).keydown(function(e){
			if (e.keyCode == 13) {
 				return false;
			}
		});
		mainWrapper.html('<div class="mainWrapper-loading"><img src="' + SITE_URL + 'resource/admin/images/loading.gif" /></div>');
		$.getJSON(SITE_URL + "admin/ajax/locked", '', function(json){
			if (json.msg == 1) {
				layer.msg('请刷新页面解除锁定');
			}else if(json.msg == -1){
				window.location.href = SITE_URL + 'admin/login/index';
			}else{
				$.get(url, {}, function(data){
					mainWrapper.html(data);
					mainWrapper.perfectScrollbar('update');
					if(/issingle/.test(url)){
						that.submit();
					}
				});
				that.close();
			}
		})
	};

	that.reload = function(){
		var s = document.location.hash;
		if(s == undefined || s == ""){ s = "#0_0";}
		s = s.slice(1);
		var navIndex = s.split("_");
		var targetLink=$(".sidebar-menu").find(".sub-menu:eq("+navIndex[0]+")")
										 .find("li:eq("+navIndex[1]+")")
										 .find("a").attr("data-href");
		that.main(targetLink);
		$('.sub-menu .sub').eq(navIndex[0]).show().slideDown(200, function(){
			$('.item').removeClass('active');
			$(this).find('a').eq(navIndex[1]).addClass('active');
		});
	}

	that.submit = function(){
		$('#cpform').submit(function() { 
   			$(this).ajaxSubmit(that.formOptions); 
    		return false; 
		});
	};

	that.showRequest = function(){
		that.issubmit = 1;
		that.loading();
		return true;
	};

	that.showResponse = function(json){
		layer.closeAll('loading');
		layer.msg(json.msg);
		if(json.ret == 1){
			that.issubmit = 0;
			that.close();
			that.reload();
		}else{
			that.issubmit = 0;
		}
	};

	that.loading = function(){
		layer.load(1, {
			shade: [0.7, '#000']
		});
	};

	that.search = function(url){
		var data = $('#pform').serializeArray();
		var param = '';
		$.each(data, function(i, field){
			param += '/' + field.name + '/' + field.value;
		});
		that.main(SITE_URL + url + param);
	};

	that.update = function(action, type){
		$('#lpform').attr('action', SITE_URL + action + type);
		$('#lpform').submit(function() { 
			var cl = $("input[type='checkbox'][name='id[]']:checked").length;
			var cln = $("input[type='checkbox'][name='id[]']").length;
			if(cl == 0 && cln != 0){
				layer.msg('请选择要操作的项');
  				return false;
			}
   			$(this).ajaxSubmit(that.formOptions); 
    		return false; 
		});
	};

	that.delete = function(action, type, tip){
		tip = typeof tip == 'undefined' ? '删除后不能恢复，确定删除吗？' : tip;
		$('#lpform').attr('action', SITE_URL + action + type);
		$('#lpform').submit(function() { 
			var cl = $("input[type='checkbox'][name='id[]']:checked").length;
			if(cl == 0){
				layer.msg('请选择要删除的项');
  				return false;
			}else{
				layer.confirm(tip, {
		  			btn: ['确定', '取消'] //按钮
				}, function(){
					$('#lpform').ajaxSubmit(that.formOptions); 
	   				layer.closeAll();
				}), function(){
					layer.msg('取消操作');
		  			return false;
				};
			}
			
    		return false; 
		});
	};

	that.deleteOne = function(url){
		layer.confirm('确定删除吗？', {
  			btn: ['确定','取消'] //按钮
		}, function(){
			that.loading();
			$.getJSON(SITE_URL + url, {}, function(json){
				layer.closeAll('loading');
				layer.msg(json.msg);
				if(json.ret == 1){
					that.reload();
				}
			});
		}, function(){
  			layer.msg('取消操作');
  			return false;
		});
	};

	that.initTab = function(){
		$('#mtab li').each(function(index, element) {
			$(element).click(function(){
				var tab = $(this).attr('tab');
				$(this).siblings().removeClass('active');
				$(this).addClass('active');
				if(typeof tab != 'undefined'){
					$('.mtb').hide();
					$('#' + tab + '-table').show();
				}
			});
		});
		
		$('#uptab a').each(function(index, element) {
			$(element).click(function(){
				$(this).siblings().removeClass('active');
				$(this).addClass('active');
				$('.tabbody').hide();
				$('.tabbody').eq(index).show();
			});
		});
		upfileEvent();
	}

	that.initWebuploader = function(){
		var uploadImage = uploadImage || new UploadImage('queueList');
		list = uploadImage.getInsertList();
		var count = uploadImage.getQueueCount();
		if (count) {
			$('.uploadinfo', '#queueList').html('<span style="color:red;">' + '还有2个未上传文件'.replace(/[\d]/, count) + '</span>');
		}
	}

	that.getFile = function(){
		$('.gettemplate').each(function(index, el){
			$(el).on('click', function(){
				that.loading();
				var filelist = '';
				$.getJSON(SITE_URL + 'admin/ajax/getfile', {}, function(json){
					for(var i in json){
						filelist += '<a href="javascript:;" onclick="Controller.setFile(this, ' + index + ')">' + json[i] + '</a>';
					}
					layer.closeAll('loading');
					layer.open({
						type: 1,
						offset: 'auto',
						title: '选择模板',
						content: '<div class="tempbox">' + filelist + '</div>',
						area: '420px',
						btn: '关闭',
						btnAlign: 'c',
						yes: function(){
	    					layer.closeAll();
	  					}
					});
				});
			});
		});
	}

	that.setFile = function(obj, index){
		var file = $(obj).text();
		$('.gettemplate').eq(index).parent().find('input').val(file);
		layer.closeAll();
	}
})();