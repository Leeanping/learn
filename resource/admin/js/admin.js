$(function() {
	LOCK.init();
	locationHref();
	PANNEL.setsize();
	$('#sidebar').perfectScrollbar();
	$('#mainWrapper').perfectScrollbar();

	$('#sidebar .sub-menu > a').click(function () {
		$('.sub-menu').removeClass('open');
		//$('.sub').slideUp(200);
		$('.pitem').find('i.icon-angle').removeClass('icon-angle-down').addClass('icon-angle-right');
		var sub = $(this).next();
		if (sub.is(":visible")) {
			$(this).parent().removeClass("open");
			$(this).parent().find('.pitem').find('i.icon-angle').removeClass('icon-angle-down').addClass('icon-angle-right');
			sub.slideUp(200);
		} else {
			$(this).parent().addClass("open");
			$(this).parent().find('.pitem').find('i.icon-angle').removeClass('icon-angle-right').addClass('icon-angle-down');
			sub.slideDown(200);
		}
		$('#sidebar').perfectScrollbar('update');
	});

	function responsiveView() {
		var wSize = $(window).width();
		if (wSize <= 768) {
			$('#container').addClass('sidebar-close');
			$('#sidebar > ul').hide();
		}

		if (wSize > 768) {
			$('#container').removeClass('sidebar-close');
			$('#sidebar > ul').show();
		}
	}
	$(window).on('load', responsiveView);
	$(window).on('resize', responsiveView);
	$(window).resize(function(){
		$('#sidebar').perfectScrollbar('update');
		$('#mainWrapper').perfectScrollbar('update');
		PANNEL.setsize();
	});
	
	$('.sub li a').click(function(){
		var targetLink = $(this).attr('data-href');
		Controller.main(targetLink);
		$('.item').removeClass('active');
		$(this).addClass('active');
		document.location.hash = $(this).parent().parent().parent().attr("index")+"_"+$(this).parent().attr("index");
	});

	function locationHref(){
		var s = document.location.hash;
		if(s == undefined || s == ""){ s = "#0_0";}
		s = s.slice(1);
		var navIndex = s.split("_");
		var targetLink=$(".sidebar-menu").find(".sub-menu:eq("+navIndex[0]+")")
										 .find("li:eq("+navIndex[1]+")")
										 .find("a").attr("data-href");
		Controller.main(targetLink);
		$('.sub-menu .sub').eq(navIndex[0]).show().slideDown(200, function(){
			$('.item').removeClass('active');
			$(this).find('a').eq(navIndex[1]).addClass('active');
		});
	}
	
	$('.total a').click(function(){
		var href = $(this).attr('href');
		$("#win").attr("src", href);
		$(this).parent().parent().parent().removeClass('open');
	});
	
	$('div.li').each(function(index, element) {
        $(element).click(function(){
			$(this).siblings().removeClass('open');
			if($(this).hasClass('open')){
				$(this).removeClass('open');
			}else{
				$(this).addClass('open');
			}
		});
		$(element).on("click", ".sub", function() {
			return false
		});
    });

	$('.lock').on('click', function(){LOCK.lock();});
	$('.menu').on('click', function(){
		if($(this).hasClass('open')){
			$(this).removeClass('open');
			$(this).find('.child').html('<div class="loading"></div>');
		}else{
			$(this).addClass('open');
			$.getJSON(SITE_URL + 'admin/ajax/map', {}, function(json){
				$('.menu').find('.child').html(json.html);
				$('.menu').find('a').click(function(){
					var href = $(this).attr('href');
					$("#win").attr("src", href);
					$('.menu').removeClass('open');
				});
			});
		}
	});
	
	$('.menu').on("click", ".child", function() {
		return false
	});
});
window.PANNEL = new (function PANNEL(){
	var that = this;
	
	that.setsize = function(){
		$('#mainWrapper').height($(window).height() - 50);
		$('#mainWrapper').width($(window).width() - 210);
		$('#sidebar').height($(window).height() - 50);
	}
})();
window.LOCK = new (function LOCK(){
	var that = this;
	that.islocked = false;
	that.init = function(){
		var lockBoxDesk = $('<div id="lockBox"><div class="title"><div class="time">' + that.time() + '</div><div class="week">' + that.week() + '</div></div><div id="lockBox-info"><h2>解除锁定</h2><div class="password"><input type="password" placeholder="请输入解锁密码" id="password" class="input"></div><div class="password"><input type="button" value="解 锁" id="lockbtn" class="btn" /></div></div><div class="tip">点击屏幕开锁</div></div>');
		$('body').append(lockBoxDesk);
		$('#lockBox').css('top', -$(window).height());
		$(window).resize(function() {
			$('#lockBox').css('top', -$(window).height());
		});
		that.locked();
	}
	
	that.locked = function(){
		$.getJSON(SITE_URL + "admin/ajax/locked", '', function(json){
			if (json.msg == 1) {
				that.lock();
				that.islocked = true;
			} else {
				return false;
			}
		})
	}
	
	that.lock = function(){
		that.show();
		$.getJSON(SITE_URL + "admin/ajax/lock", '', function(json){
			if (json.msg == 1) {
				that.unlock();
			} else {
				return false;
			}
		})
	}
	
	that.unlock = function(){
		$('body').on('click', function(){
			var lockbox = $('#lockBox-info');
			if(lockbox.css('display') == 'none'){
				$('.title').animate({'top': -200}, 500);
				$('.tip').animate({'top': '100%'}, 500);
				lockbox.fadeIn();
			}else{
				lockbox.fadeOut();
				$('.title').animate({'top': '10%'}, 500);
				$('.tip').animate({'top': '80%'}, 500);
			}
		})
		$("body").on("click", "#lockBox-info", function() {
			return false
		});
		$("body").on("click", "#lockbtn", function() {
			if ($("#password").val() != "") {
				$.ajax({
					type: "POST",
					url: SITE_URL + "admin/ajax/unlock",
					data: "password=" + $("#password").val(),
					dataType : 'json',
					success: function(json){
						if (json.msg == 1) {
							that.islocked = false;
							that.hide();
							Controller.reload();
						} else {
							$("#password").val("").focus();
						}
					}
				});
			}
		});
		$("body").on("keydown", "#password", function(e) {
			if (e.keyCode == "13") {
				$("#lockbtn").click()
			}
		});
	}
	
	that.time = function(){
		var date = new Date(), hour = date.getHours() < 10 ? '0' + date.getHours() : date.getHours(), minutes = date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes();
		return hour + ':' + minutes;
	}
	
	that.week = function(){
		var date = new Date(), year = date.getFullYear(), month = (date.getMonth() + 1) < 10 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1), day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate(), week = ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'];
		return year + '/' + month + '/' + day + ' ' + week[date.getDay()];
	}
	
	that.show = function(){
		$("#lockBox").animate({top: 0}, 500);
	}
	
	that.hide = function(){
		$("#lockBox").animate({top: -$(window).height()}, 500, function(){
			$(this).remove();
		});
	}
})()