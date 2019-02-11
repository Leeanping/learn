var CD = window.CD || {};
CD.BBS = (function(){
	return {
		getGD: function(){
			$('#gdImg').show();
		},
		replyPost: function(postid, threadid, forumid){
			$.ajax({
				type: 'POST',
				url: SITE_URL + 'ajax/bbsreply',
				data: {postid: postid, threadid: threadid, forumid: forumid},
				success: function(json){
					if(json == 1){
						layer.msg('请登录');
					}else if(json == 2){
						layer.msg('对不起，你已经达到本主题的回帖上限。');
					}else{
						$.dialog({
							title: '参与/回复主题',
							content: json,
							width: 500,
							okVal: '点击回复',
							ok: function(){
								var replytxt = $('#fastreply').val(), bool = false;
								if(replytxt == ''){
									layer.msg('请输入回复内容');
									return false;
								}
								CD.BBS.replyAction(postid, threadid, forumid, replytxt);
								window.location.reload();
							}
						});
					}
				}
			});
		},
		replyAction: function(postid, threadid, forumid, content){
			$.ajax({
				type: 'POST',
				url: SITE_URL + 'ajax/reply',
				data: {postid: postid, threadid: threadid, forumid: forumid, content: content},
				dataType: 'json',
				async: false,
				success: function(json){
					if(json.msg == 1){
						return true;
					}else{
						return false;
					}
				}
			});
		},
		stamp: function(threadid, chk){
			var optionts = ['', 'istop', 'isbest', 'ishot', 'ispic', 'isgood', 'isrec', 'iscreate', 'isbao'],
				optioncs = ['无图章', '置顶', '精华', '热门', '美图', '优秀', '推荐', '原创', '爆料'],
				option = [];
			for(var i = 0, n = optionts.length; i < n; i++)
			{
				var selected = optionts[i] == chk ? ' selected="selected"' : '';
				option.push('<option value="' + optionts[i] + '"' + selected + '>' + optioncs[i] + '</option>');
			}
			$.dialog({
				title: '主题图章设置',
				content: '<div class="stamp"><select id="stamp">' + option.join('') + '</select></div>',
				ok: function(){
					var stamp = $('#stamp').val(), bool = false;
					$.ajax({
						type: 'POST',
						url: SITE_URL + 'ajax/stamp',
						data: {stamp: stamp, threadid: threadid},
						async: false,
						dataType: 'json',
						success: function(json){
							if(json.msg == 1){
								bool = true;
							}else{
								layer.msg('图章设置失败');
							}
						}
					});
					if(!bool){
						return false;
					}else{
						setTimeout(function(){window.location.reload()}, 1000);
					}
					layer.msg('图章设置成功');
				}
			});
		},
		setIs: function(val, type, threadid){
			$.getJSON(SITE_URL + 'ajax/is', {threadid: threadid, type: type, val: val}, function(json){
				if(json.msg == 1){
					layer.msg('设置成功');
					setTimeout(function(){window.location.reload()}, 1000);
				}
			})
		},
		sheild: function(postid, val){
			$.getJSON(SITE_URL + 'ajax/sheild', {postid: postid, val: val}, function(json){
				if(json.msg == 1){
					layer.msg('操作成功，等待返回');
					setTimeout(function(){window.location.reload()}, 1000);
				}
			})
		},
		postMenu: function(id){
			var that = $(id);
			var offset = that.offset(), $menu = $('#postmenu');
			$menu.css({'position': 'absolute', 'left': offset.left + 1, 'top': offset.top + 33});
			$menu.show();
			$menu.on('mouseleave', function(){
				$menu.hide();
			});
			$menu.on('mouseenter', function(){
				$menu.show();
			});
			that.on('mouseleave', function(){
				$menu.hide();
			})
		},
		addVote: function(){
			var that = $('#votecontent'),
				html = '<p><input type="text" name="newvotename[]" class="input" value="" /><a href="javascript:void(0);" onclick="CD.BBS.removeVote(this)">删除</a></p>',
				l = $('#votecontent p').length;
			if(l >= 5){
				layer.msg('投票选项不能大于5个');
				return false;
			}
			that.append(html);
		},
		removeVote: function(id, isdata){
			isdata = typeof isdata == 'undefined' ? false : isdata;
			var that = $('#votecontent'),
				l = $('#votecontent p').length;
			if(l == 1){
				return false;
			}
			if(!isdata){
				$(id).parent().remove();
			}else{
				$.getJSON(SITE_URL + 'bbs/delvote', {id: isdata}, function(json){
					if(json.msg == 1){
						$(id).parent().remove();
					}
				})
			}
		},
		vote: function(threadid, voteid){
			var getvote = common.getcookie('votepost');
			if(getvote != '' && getvote == 'vote' + threadid){
				layer.msg('你已经投过票了');
				return false;
			}
			$.getJSON(SITE_URL + 'bbs/vote', {threadid: threadid, voteid: voteid}, function(json){
				if(json.msg == 1){
					common.setcookie('votepost', 'vote' + threadid);
					window.location.reload();
				}else{
					layer.msg('系统繁忙,请稍候再试');
				}
			})
		}
	}
})()