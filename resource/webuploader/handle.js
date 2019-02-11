//(function () {
	var uploadImage;
	
	/*window.onload = function(){
		uploadImage = uploadImage || new UploadImage('queueList');
		list = uploadImage.getInsertList();
		var count = uploadImage.getQueueCount();
		if (count) {
			$('.uploadinfo', '#queueList').html('<span style="color:red;">' + '还有2个未上传文件'.replace(/[\d]/, count) + '</span>');
		}
	}*/
	
	/* 上传图片 */
	function UploadImage(target) {
		this.$wrap = target.constructor == String ? $('#' + target) : $(target);
		this.init();
	}
	UploadImage.prototype = {
		init: function () {
			this.imageList = [];
			this.initContainer();
			this.initUploader();
		},
		initContainer: function () {
			this.$queue = this.$wrap.find('.filelist');
		},
		/* 初始化容器 */
		initUploader: function () {
			var _this = this,
				$ = jQuery,    // just in case. Make sure it's not an other libaray.
				$wrap = _this.$wrap,
			// 图片容器
				$queue = $wrap.find('.filelist'),
			// 状态栏，包括进度和控制按钮
				$statusBar = $wrap.find('.statusBar'),
			// 文件总体选择信息。
				$info = $statusBar.find('.uploadinfo'),
			// 上传按钮
				$upload = $wrap.find('.uploadBtn'),
			// 上传按钮
				$filePickerBtn = $wrap.find('.filePickerBtn'),
			// 上传按钮
				$filePickerBlock = $wrap.find('.filePickerBlock'),
			// 没选择文件之前的内容。
				$placeHolder = $wrap.find('.placeholder'),
			// 总体进度条
				$progress = $statusBar.find('.progress').hide(),
			// 添加的文件数量
				fileCount = 0,
			// 添加的文件总大小
				fileSize = 0,
			// 优化retina, 在retina下这个值是2
				ratio = window.devicePixelRatio || 1,
			// 缩略图大小
				thumbnailWidth = 113 * ratio,
				thumbnailHeight = 113 * ratio,
			// 可能有pedding, ready, uploading, confirm, done.
				state = '',
			// 所有文件的进度信息，key为file id
				percentages = {},
				supportTransition = (function () {
					var s = document.createElement('p').style,
						r = 'transition' in s ||
							'WebkitTransition' in s ||
							'MozTransition' in s ||
							'msTransition' in s ||
							'OTransition' in s;
					s = null;
					return r;
				})(),
			// WebUploader实例
				uploader,
				actionUrl = SITE_URL + 'swfupload/swfupload/upload',
				params = uploadOptions[0],
				imageCompressEnable = true,
				acceptExtensions = [".png", ".jpg", ".jpeg", ".gif", ".bmp"].join('').replace(/\./g, ',').replace(/^[,]/, ''),
				imageMaxSize = 2048000,
				imageCompressBorder = 1600;
			if (!WebUploader.Uploader.support()) {
				$('#filePickerReady').after($('<div>').html('不支持')).hide();
				return;
			}
	
			uploader = _this.uploader = WebUploader.create({
				pick: {
					id: '#filePickerReady',
					label: '点击选择图片'
				},
				accept: {
					title: 'Images',
					extensions: acceptExtensions,
					mimeTypes: 'image/gif,image/jpg,image/jpeg,image/png'
				},
				swf: SITE_URL + 'resource/webuploader/Uploader.swf',
				server: actionUrl,
				fileVal: 'upfile',
				duplicate: true,
				fileSingleSizeLimit: imageMaxSize,    // 默认 2 M
				compress: imageCompressEnable ? {
					width: imageCompressBorder,
					height: imageCompressBorder,
					// 图片质量，只有type为`image/jpeg`的时候才有效。
					quality: 90,
					// 是否允许放大，如果想要生成小图的时候不失真，此选项应该设置为false.
					allowMagnify: false,
					// 是否允许裁剪。
					crop: false,
					// 是否保留头部meta信息。
					preserveHeaders: true
				}:false
			});
			uploader.addButton({
				id: '#filePickerBlock'
			});
			uploader.addButton({
				id: '#filePickerBtn',
				label: '继续添加'
			});
	
			setState('pedding');
	
			// 当有文件添加进来时执行，负责view的创建
			function addFile(file) {
				var $li = $('<li id="' + file.id + '">' +
						'<p class="title">' + file.name + '</p>' +
						'<p class="imgWrap"></p>' +
						'<p class="progress"><span></span></p>' +
						'</li>'),
	
					$btns = $('<div class="file-panel">' +
						'<span class="cancel">删除</span>' +
						'<span class="rotateRight">向右旋转</span>' +
						'<span class="rotateLeft">向左旋转</span></div>').appendTo($li),
					$prgress = $li.find('p.progress span'),
					$wrap = $li.find('p.imgWrap'),
					$info = $('<p class="error"></p>').hide().appendTo($li),
	
					showError = function (code) {
						switch (code) {
							case 'exceed_size':
								text = '文件大小超出';
								break;
							case 'interrupt':
								text = '文件传输中断';
								break;
							case 'http':
								text = 'http请求错误';
								break;
							case 'not_allow_type':
								text = '图片格式不正确';
								break;
							default:
								text = '上传失败，请重试';
								break;
						}
						$info.text(text).show();
					};
	
				if (file.getStatus() === 'invalid') {
					showError(file.statusText);
				} else {
					$wrap.text('不能预览');
					if (_getBrowser().msie && _getBrowser().version <= 7) {
						$wrap.text('不能预览');
					} else {
						uploader.makeThumb(file, function (error, src) {
							if (error || !src) {
								$wrap.text('不能预览');
							} else {
								var $img = $('<img src="' + src + '">');
								$wrap.empty().append($img);
								$img.on('error', function () {
									$wrap.text('不能预览');
								});
							}
						}, thumbnailWidth, thumbnailHeight);
					}
					percentages[ file.id ] = [ file.size, 0 ];
					file.rotation = 0;
	
					/* 检查文件格式 */
					if (!file.ext || acceptExtensions.indexOf(file.ext.toLowerCase()) == -1) {
						showError('not_allow_type');
						uploader.removeFile(file);
					}
				}
	
				file.on('statuschange', function (cur, prev) {
					if (prev === 'progress') {
						$prgress.hide().width(0);
					} else if (prev === 'queued') {
						$li.off('mouseenter mouseleave');
						$btns.remove();
					}
					// 成功
					if (cur === 'error' || cur === 'invalid') {
						showError(file.statusText);
						percentages[ file.id ][ 1 ] = 1;
					} else if (cur === 'interrupt') {
						showError('interrupt');
					} else if (cur === 'queued') {
						percentages[ file.id ][ 1 ] = 0;
					} else if (cur === 'progress') {
						$info.hide();
						$prgress.css('display', 'block');
					} else if (cur === 'complete') {
					}
	
					$li.removeClass('state-' + prev).addClass('state-' + cur);
				});
	
				$li.on('mouseenter', function () {
					$btns.stop().animate({height: 30});
				});
				$li.on('mouseleave', function () {
					$btns.stop().animate({height: 0});
				});
	
				$btns.on('click', 'span', function () {
					var index = $(this).index(),
						deg;
	
					switch (index) {
						case 0:
							uploader.removeFile(file);
							return;
						case 1:
							file.rotation += 90;
							break;
						case 2:
							file.rotation -= 90;
							break;
					}
	
					if (supportTransition) {
						deg = 'rotate(' + file.rotation + 'deg)';
						$wrap.css({
							'-webkit-transform': deg,
							'-mos-transform': deg,
							'-o-transform': deg,
							'transform': deg
						});
					} else {
						$wrap.css('filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation=' + (~~((file.rotation / 90) % 4 + 4) % 4) + ')');
					}
	
				});
	
				$li.insertBefore($filePickerBlock);
			}
	
			// 负责view的销毁
			function removeFile(file) {
				var $li = $('#' + file.id);
				delete percentages[ file.id ];
				updateTotalProgress();
				$li.off().find('.file-panel').off().end().remove();
			}
	
			function updateTotalProgress() {
				var loaded = 0,
					total = 0,
					spans = $progress.children(),
					percent;
				$.each(percentages, function (k, v) {
					total += v[ 0 ];
					loaded += v[ 0 ] * v[ 1 ];
				});
				
				percent = total ? loaded / total : 0;
				
				spans.eq(0).text(Math.round(percent * 100) + '%');
				spans.eq(1).css('width', Math.round(percent * 100) + '%');
				updateStatus();
			}
	
			function setState(val, files) {
	
				if (val != state) {
	
					var stats = uploader.getStats();
	
					$upload.removeClass('state-' + state);
					$upload.addClass('state-' + val);
	
					switch (val) {
	
						/* 未选择文件 */
						case 'pedding':
							$queue.addClass('element-invisible');
							$statusBar.addClass('element-invisible');
							$placeHolder.removeClass('element-invisible');
							$progress.hide(); $info.hide();
							uploader.refresh();
							break;
	
						/* 可以开始上传 */
						case 'ready':
							$placeHolder.addClass('element-invisible');
							$queue.removeClass('element-invisible');
							$statusBar.removeClass('element-invisible');
							$progress.hide(); $info.show();
							$upload.text('开始上传');
							uploader.refresh();
							break;
	
						/* 上传中 */
						case 'uploading':
							$progress.show(); $info.hide();
							$upload.text('暂停上传');
							break;
	
						/* 暂停上传 */
						case 'paused':
							$progress.show(); $info.hide();
							$upload.text('继续上传');
							break;
	
						case 'confirm':
							$progress.show(); $info.hide();
							$upload.text('开始上传');
	
							stats = uploader.getStats();
							if (stats.successNum && !stats.uploadFailNum) {
								setState('finish');
								return;
							}
							break;
	
						case 'finish':
							$progress.hide(); $info.show();
							if (stats.uploadFailNum) {
								$upload.text('重新上传');
							} else {
								$upload.text('开始上传');
							}
							break;
					}
	
					state = val;
					updateStatus();
	
				}
	
				if (!_this.getQueueCount()) {
					$upload.addClass('disabled')
				} else {
					$upload.removeClass('disabled')
				}
	
			}
	
			function updateStatus() {
				var text = '', stats;
	
				if (state === 'ready') {
					text = '选中_张图片，共_KB。'.replace('_', fileCount).replace('_KB', WebUploader.formatSize(fileSize));
				} else if (state === 'confirm') {
					stats = uploader.getStats();
					if (stats.uploadFailNum) {
						text = '已成功上传_张照片，_张照片上传失败'.replace('_', stats.successNum).replace('_', stats.successNum);
					}
				} else {
					stats = uploader.getStats();
					text = '共_张（_KB），_张上传成功'.replace('_', fileCount).
						replace('_KB', WebUploader.formatSize(fileSize)).
						replace('_', stats.successNum);
	
					if (stats.uploadFailNum) {
						text += '，_张上传失败。'.replace('_', stats.uploadFailNum);
					}
				}
				$info.html(text);
			}
	
			uploader.on('fileQueued', function (file) {
				fileCount++;
				fileSize += file.size;
	
				if (fileCount === 1) {
					$placeHolder.addClass('element-invisible');
					$statusBar.show();
				}
	
				addFile(file);
			});
	
			uploader.on('fileDequeued', function (file) {
				fileCount--;
				fileSize -= file.size;
	
				removeFile(file);
				updateTotalProgress();
			});
	
			uploader.on('filesQueued', function (file) {
				if (!uploader.isInProgress() && (state == 'pedding' || state == 'finish' || state == 'confirm' || state == 'ready')) {
					setState('ready');
				}
				updateTotalProgress();
			});
	
			uploader.on('all', function (type, files) {
				switch (type) {
					case 'uploadFinished':
						setState('confirm', files);
						break;
					case 'startUpload':
						/* 添加额外的参数 */
						uploader.option('server', actionUrl + '?item_id=' + params.item_id + '&belong=' + params.belong + '&kindid=' + params.kindid + '&m=' + params.m);
						setState('uploading', files);
						break;
					case 'stopUpload':
						setState('paused', files);
						break;
				}
			});
	
			uploader.on('uploadBeforeSend', function (file, data, header) {
				//这里可以通过data对象添加POST参数
				header['X_Requested_With'] = 'XMLHttpRequest';
			});
	
			uploader.on('uploadProgress', function (file, percentage) {
				var $li = $('#' + file.id),
					$percent = $li.find('.progress span');
	
				$percent.css('width', percentage * 100 + '%');
				percentages[ file.id ][ 1 ] = percentage;
				updateTotalProgress();
			});
	
			uploader.on('uploadSuccess', function (file, ret) {
				var $file = $('#' + file.id);
				try {
					var json = ret;
					if (json.state == 'SUCCESS') {
						_this.imageList.push(json);
						$file.append('<span class="success"></span>');
						$('#ufilelist').append('<li id="upfile-' + json.file_id + '" data-thumb="' + json.thumb + '" data-pic="' + json.url + '"><img src="' + json.url + '" width="113" height="113" /><input type="hidden" name="newfile_id[]" value="' + json.file_id + '" /><div class="ufile-panel"><b class="ucancel" data-id="' + json.file_id + '">删除</b></div></li>');
						upfileEvent();
					} else {
						$file.find('.error').text(json.state).show();
					}
				} catch (e) {
					$file.find('.error').text('服务器返回出错').show();
				}
			});
	
			uploader.on('uploadError', function (file, code) {
			});
			uploader.on('error', function (code, file) {
				if (code == 'Q_TYPE_DENIED' || code == 'F_EXCEED_SIZE') {
					addFile(file);
				}
			});
			uploader.on('uploadComplete', function (file, ret) {
			});
	
			$upload.on('click', function () {
				if ($(this).hasClass('disabled')) {
					return false;
				}
	
				if (state === 'ready') {
					uploader.upload();
				} else if (state === 'paused') {
					uploader.upload();
				} else if (state === 'uploading') {
					uploader.stop();
				}
			});
	
			$upload.addClass('state-' + state);
			updateTotalProgress();
		},
		getQueueCount: function () {
			var file, i, status, readyFile = 0, files = this.uploader.getFiles();
			for (i = 0; file = files[i++]; ) {
				status = file.getStatus();
				if (status == 'queued' || status == 'uploading' || status == 'progress') readyFile++;
			}
			return readyFile;
		},
		destroy: function () {
			this.$wrap.remove();
		},
		getInsertList: function () {
			var i, data, list = [],
				align = 'none',
				prefix = '';
			for (i = 0; i < this.imageList.length; i++) {
				data = this.imageList[i];
				list.push({
					src: prefix + data.url,
					_src: prefix + data.url,
					title: data.title,
					alt: data.original,
					floatStyle: align
				});
			}
			return list;
		}
	};
//})()