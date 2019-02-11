<?php /* vpcvcms compiled created on 2018-11-08 15:23:47
         compiled from admin/article_info.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="/resource/admin/js/jscolor/jscolor.js"></script>
<script type="text/javascript" src="/resource/admin/js/calendar.js"></script>
<div class="floattop">
    <ul id="mtab">
        <li class="btn active btn-info" tab="general">基本信息</li>
        <li class="btn btn-info" tab="detail">详细信息</li>
        <li class="btn btn-info" tab="seo">优化信息</li>
        <li class="btn btn-info" tab="other">其他信息</li>
    </ul>
</div>
<form name="cpform" method="post" action="/admin/article/<?php echo $this->_tpl_vars['_postName']; ?>
" id="cpform" onsubmit="return $.checkForm(this)" enctype="multipart/form-data">
    <table class="mtb" id="general-table">
        <tr class="noborder">
            <td class="first">标题</td>
        	<td class="vtop next">
                <input name="title" value="<?php echo $this->_tpl_vars['article']['title']; ?>
" type="text" class="txt" />
            </td>
            <td class="first">请选择栏目</td>
            <td class="vtop next">
                <select name="catid" datatype="Require" msg="请选择栏目" onchange="getModule(this)">
                    <option value="">请选择栏目</option>
                    <?php $_from = T('channel')->getList(array('useable' => '0', 'channel' => 'all'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['channel']):
?>
                    <option value="<?php echo $this->_tpl_vars['channel']['id']; ?>
"<?php if ($this->_tpl_vars['article']['catid'] == $this->_tpl_vars['channel']['id']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['channel']['name']; ?>
(<?php if ($this->_tpl_vars['channel']['type'] == 0): ?>主<?php elseif ($this->_tpl_vars['channel']['type'] == 1): ?>顶<?php else: ?>底<?php endif; ?>)</option>
                    <?php $_from = T('channel')->getList(array('parentid' => $this->_tpl_vars['channel']['id'], 'channel' => 'all'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
                    <option value="<?php echo $this->_tpl_vars['child']['id']; ?>
"<?php if ($this->_tpl_vars['article']['catid'] == $this->_tpl_vars['child']['id']): ?> selected<?php endif; ?>>--<?php echo $this->_tpl_vars['child']['name']; ?>
(<?php if ($this->_tpl_vars['child']['type'] == 0): ?>主<?php elseif ($this->_tpl_vars['child']['type'] == 1): ?>顶<?php else: ?>底<?php endif; ?>)</option>
                    <?php $_from = T('channel')->getList(array('parentid' => $this->_tpl_vars['child']['id'], 'channel' => 'all'));if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['childer']):
?>
                    <option value="<?php echo $this->_tpl_vars['childer']['id']; ?>
"<?php if ($this->_tpl_vars['article']['catid'] == $this->_tpl_vars['childer']['id']): ?> selected<?php endif; ?>>----<?php echo $this->_tpl_vars['childer']['name']; ?>
(<?php if ($this->_tpl_vars['childer']['type'] == 0): ?>主<?php elseif ($this->_tpl_vars['childer']['type'] == 1): ?>顶<?php else: ?>底<?php endif; ?>)</option>
                    <?php endforeach; endif; unset($_from); ?>
                    <?php endforeach; endif; unset($_from); ?>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
            </td>
        </tr>
        <tr>
        	<td class="first">缩略图</td>
            <td class="vtop next">
                <div id="uploader-single">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                        <?php if ($this->_tpl_vars['article']['articlethumb']): ?>
                        <img width="120" height="90" src="<?php echo $this->_tpl_vars['article']['articlethumb']; ?>
" />
                        <?php endif; ?>
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
                <input type="hidden" id="articlepic" name="articlepic" value="<?php echo $this->_tpl_vars['article']['articlepic']; ?>
">
                <input type="hidden" id="articlethumb" name="articlethumb" value="<?php echo $this->_tpl_vars['article']['articlethumb']; ?>
">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/upload_single.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </td>
            <td class="first">上传资料</td>
            <td class="vtop next">
                <div id="uploader-single">
                    <!--用来存放item-->
                    <div id="softfileList" class="uploader-list">
                        <?php if ($this->_tpl_vars['article']['fileurl']): ?>
                        已上传
                        <?php endif; ?>
                    </div>
                    <div id="softfilePicker">选择文件</div>
                </div>
                <input type="hidden" id="fileurl" name="fileurl" value="<?php echo $this->_tpl_vars['article']['fileurl']; ?>
">
            </td>
        </tr>
        <?php if ($this->_tpl_vars['classid']): ?>
        <tr class="noborder"><td colspan="4" class="td27 next">分类信息(多个联动选填)</td></tr>
        <?php echo $this->_tpl_vars['classid']; ?>

        <?php endif; ?>
        <tr class="noborder">
            <td class="first">是否显示</td>
        	<td class="vtop next">
            	<input type="radio" name="useable" value="1" <?php if ($this->_tpl_vars['article']['useable'] == 1): ?>checked="checked"<?php endif; ?> />显示
                <input type="radio" name="useable" value="0" <?php if ($this->_tpl_vars['article']['useable'] == 0): ?>checked="checked"<?php endif; ?> />不显示
            </td>
            <td class="first">浏览权限</td>
            <td class="vtop next">
                <input type="radio" name="isview" value="1" <?php if ($this->_tpl_vars['article']['isview'] == '1'): ?>checked="checked"<?php endif; ?> /> 注册访问
                <input type="radio" name="isview" value="0" <?php if ($this->_tpl_vars['article']['isview'] == '0'): ?>checked="checked"<?php endif; ?> /> 开放访问
            </td>
        </tr>
        <tbody id="extends">
        <?php $_from = $this->_tpl_vars['extends']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['extend']):
?>
        <tr class="noborder">
            <td class="first"><?php echo $this->_tpl_vars['extend']['comment']; ?>
</td>
            <td class="vtop next" colspan="3">
            <?php if ($this->_tpl_vars['extend']['type'] == 'int' || $this->_tpl_vars['extend']['type'] == 'tinyint' || $this->_tpl_vars['extend']['type'] == 'char'): ?>
            <input name="<?php echo $this->_tpl_vars['extend']['field']; ?>
" value="<?php echo $this->_tpl_vars['extend']['value']; ?>
" type="text" class="txt"  />
            <?php elseif ($this->_tpl_vars['extend']['type'] == 'varchar'): ?>
            <textarea rows="20" name="<?php echo $this->_tpl_vars['extend']['field']; ?>
"><?php echo $this->_tpl_vars['extend']['value']; ?>
</textarea>
            <?php elseif ($this->_tpl_vars['extend']['type'] == 'text'): ?>
            <?php echo $this->_tpl_vars['extend']['value']; ?>

            <?php elseif ($this->_tpl_vars['extend']['type'] == 'picture'): ?>
            <div id="uploader-single">
                <div id="fileList<?php echo $this->_tpl_vars['extend']['field']; ?>
" class="uploader-list">
                    <img width="120" height="90" src="<?php echo $this->_tpl_vars['extend']['value']; ?>
" />
                </div>
                <div id="filePicker<?php echo $this->_tpl_vars['extend']['field']; ?>
">选择图片</div>
                <input type="hidden" id="<?php echo $this->_tpl_vars['extend']['field']; ?>
" name="<?php echo $this->_tpl_vars['extend']['field']; ?>
" value="<?php echo $this->_tpl_vars['extend']['value']; ?>
">
            </div>
            <script type="text/javascript">
                var picdom<?php echo $this->_tpl_vars['extend']['field']; ?>
 = '<?php echo $this->_tpl_vars['extend']['field']; ?>
';
                $list<?php echo $this->_tpl_vars['extend']['field']; ?>
 = $('#fileList<?php echo $this->_tpl_vars['extend']['field']; ?>
');
                var singleuploader<?php echo $this->_tpl_vars['extend']['field']; ?>
 = WebUploader.create({

                    // 选完文件后，是否自动上传。
                    auto: true,

                    // swf文件路径
                    swf: SITE_URL + 'resource/webuploader/Uploader.swf',

                    // 文件接收服务端。
                    server: SITE_URL + 'admin/ajax/pic',

                    // 选择文件的按钮。可选。
                    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                    pick: '#filePicker<?php echo $this->_tpl_vars['extend']['field']; ?>
',

                    // 只允许选择图片文件。
                    accept: {
                        title: 'Images',
                        extensions: 'gif,jpg,jpeg,bmp,png',
                        mimeTypes: 'image/gif,image/jpg,image/jpeg,image/png'
                    },
                    fileNumLimit: 1,
                    compress: false
                });
                singleuploader<?php echo $this->_tpl_vars['extend']['field']; ?>
.on( 'fileQueued', function( file ) {
                    var $li<?php echo $this->_tpl_vars['extend']['field']; ?>
 = $(
                            '<div id="' + file.id + '" class="file-item thumbnail">' +
                                '<img>' +
                                '<div class="info">' + file.name + '</div>' +
                            '</div>'
                            ),
                        $img<?php echo $this->_tpl_vars['extend']['field']; ?>
 = $li<?php echo $this->_tpl_vars['extend']['field']; ?>
.find('img');


                    // $list为容器jQuery实例
                    $list<?php echo $this->_tpl_vars['extend']['field']; ?>
.html( $li<?php echo $this->_tpl_vars['extend']['field']; ?>
 );

                    // 创建缩略图
                    // 如果为非图片文件，可以不用调用此方法。
                    // thumbnailWidth x thumbnailHeight 为 100 x 100
                    singleuploader<?php echo $this->_tpl_vars['extend']['field']; ?>
.makeThumb( file, function( error, src ) {
                        if ( error ) {
                            $img<?php echo $this->_tpl_vars['extend']['field']; ?>
.replaceWith('<span>不能预览</span>');
                            return;
                        }

                        $img<?php echo $this->_tpl_vars['extend']['field']; ?>
.attr( 'src', src );
                    }, 120, 90 );
                });
                singleuploader<?php echo $this->_tpl_vars['extend']['field']; ?>
.on( 'uploadProgress', function( file, percentage ) {
                    var $li<?php echo $this->_tpl_vars['extend']['field']; ?>
 = $( '#'+file.id ),
                        $percent<?php echo $this->_tpl_vars['extend']['field']; ?>
 = $li<?php echo $this->_tpl_vars['extend']['field']; ?>
.find('.progress span');

                    // 避免重复创建
                    if ( !$percent<?php echo $this->_tpl_vars['extend']['field']; ?>
.length ) {
                        $percent<?php echo $this->_tpl_vars['extend']['field']; ?>
 = $('<p class="progress"><span></span></p>')
                                .appendTo( $li<?php echo $this->_tpl_vars['extend']['field']; ?>
 )
                                .find('span');
                    }

                    $percent<?php echo $this->_tpl_vars['extend']['field']; ?>
.css( 'width', percentage * 100 + '%' );
                });

                // 文件上传成功，给item添加成功class, 用样式标记上传成功。
                singleuploader<?php echo $this->_tpl_vars['extend']['field']; ?>
.on( 'uploadSuccess', function( file, ret ) {
                    $('#' + picdom<?php echo $this->_tpl_vars['extend']['field']; ?>
).val(ret.url);
                    $( '#'+file.id ).addClass('upload-state-done');
                });

                // 文件上传失败，显示上传出错。
                singleuploader<?php echo $this->_tpl_vars['extend']['field']; ?>
.on( 'uploadError', function( file ) {
                    var $li<?php echo $this->_tpl_vars['extend']['field']; ?>
 = $( '#'+file.id ),
                        $error<?php echo $this->_tpl_vars['extend']['field']; ?>
 = $li<?php echo $this->_tpl_vars['extend']['field']; ?>
.find('div.error');

                    // 避免重复创建
                    if ( !$error<?php echo $this->_tpl_vars['extend']['field']; ?>
.length ) {
                        $error<?php echo $this->_tpl_vars['extend']['field']; ?>
 = $('<div class="error"></div>').appendTo( $li<?php echo $this->_tpl_vars['extend']['field']; ?>
 );
                    }

                    $error<?php echo $this->_tpl_vars['extend']['field']; ?>
.text('上传失败');
                });

                // 完成上传完了，成功或者失败，先删除进度条。
                singleuploader<?php echo $this->_tpl_vars['extend']['field']; ?>
.on( 'uploadComplete', function( file ) {
                    $( '#'+file.id ).find('.progress').remove();
                });
            </script>
            <?php else: ?>
            <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        </tbody>
        <tr class="noborder">
            <td colspan="4" class="td27 next" id="uptab">
                <a href="javascript:void(0);" class="btn active">上传图片集</a>
                <a href="javascript:void(0);" class="btn">管理图片集</a>
            </td>
        </tr>
        <tr class="noborder">
            <td class="vtop" colspan="4">
                <?php echo $this->_tpl_vars['swfupload']; ?>

                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/upload.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </td>
        </tr>
    </table>
    <table class="mtb mtb-hide" id="detail-table">
        <tr class="noborder">
            <td class="first">详细内容</td>
        	<td class="vtop next line-normal" colspan="3">
            <?php echo $this->_tpl_vars['content']; ?>

            </td>
        </tr>
    </table>
    <table class="mtb mtb-hide" id="seo-table">
        <tr class="noborder">
            <td class="first">tagword</td>
        	<td class="vtop next" colspan="3">
                <input name="tagword" value="<?php echo $this->_tpl_vars['article']['tagword']; ?>
" type="text" class="txt" size="100" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">seotitle</td>
        	<td class="vtop next" colspan="3">
                <input name="seotitle" value="<?php echo $this->_tpl_vars['article']['seotitle']; ?>
" type="text" class="txt" size="100" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">Keywords</td>
        	<td class="vtop next" colspan="3">
                <input name="keywords" value="<?php echo $this->_tpl_vars['article']['keywords']; ?>
" type="text" class="txt" size="100" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">Description</td>
        	<td class="vtop next" colspan="3">
                <textarea  rows="6" name="description" cols="100"><?php echo $this->_tpl_vars['article']['description']; ?>
</textarea>
            </td>
        </tr>
    </table>
    <table class="mtb mtb-hide" id="other-table">
        <tr class="noborder">
            <td class="first">浏览数</td>
        	<td class="vtop next" colspan="3">
                <input name="shownum" value="<?php echo $this->_tpl_vars['article']['shownum']; ?>
" type="text" class="txt" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">评论数</td>
        	<td class="vtop next" colspan="3">
                <input name="feednum" value="<?php echo $this->_tpl_vars['article']['feednum']; ?>
" type="text" class="txt" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">推荐数</td>
        	<td class="vtop next" colspan="3">
                <input name="bestnum" value="<?php echo $this->_tpl_vars['article']['bestnum']; ?>
" type="text" class="txt" />
            </td>
        </tr>
        <tr class="noborder">
            <td class="first">排序</td>
        	<td class="vtop next" colspan="3">
                <input name="sort" value="<?php echo $this->_tpl_vars['article']['sort']; ?>
" type="text" class="txt" />
            </td>
        </tr>
    </table>
    <!-- <div class="btnfix"> -->
    	<input type="hidden" name="action" value="<?php echo $this->_tpl_vars['_postName']; ?>
" />
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" />
        <input type="hidden" name="moduleid" id="moduleid" value="<?php echo $this->_tpl_vars['article']['moduleid']; ?>
" />
        <!-- <input type="submit" class="btn btn-success" name="vpbtn" value="点击提交" /> -->
    <!-- </div> -->
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
function getModule(obj){
    $.getJSON(SITE_URL + 'admin/article/module/id/' + $(obj).val() + '/aid/<?php echo $this->_tpl_vars['article']['id']; ?>
', {}, function(json){
        $('#moduleid').val(json.moduleid);
        $('#extends').html(json.html);
    });
}

function getSonClass(obj, objid){
    var parentid = $(obj).val();
    if(!parentid) return;
    $.getJSON(SITE_URL + 'admin/article/category/pid/' + parentid, {}, function(json){
        var html = '<select name="classid[]"><option value="">请选择</option>';
        for(var i in json){
            html += '<option value="' + json[i].id + '">' + json[i].catname + '</option>'
        }
        html += '</select>';
        $('#sonclass' + objid).html(html);
    });
}

function autoSaveData(){
    var data = $('#cpform').serialize();
    $.post(SITE_URL + 'admin/article/autosave', {data: data}, function(){});
}
<?php if ($this->_tpl_vars['_postName'] == 'add'): ?>
var autotimer = setInterval('autoSaveData()', 10000);
<?php endif; ?>
$softlist = $('#softfileList');
var softuploader = WebUploader.create({

    // 选完文件后，是否自动上传。
    auto: true,

    // swf文件路径
    swf: SITE_URL + 'resource/webuploader/Uploader.swf',

    // 文件接收服务端。
    server: SITE_URL + 'admin/article/softupload',

    // 选择文件的按钮。可选。
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
    pick: '#softfilePicker',

    // 只允许选择图片文件。
    accept: {
        title: 'file',
        extensions: 'doc,docx,pdf,ppt',
        mimeTypes: '.doc,.docx,.pdf,.ppt'
    },
    fileNumLimit: 1
});
softuploader.on( 'fileQueued', function( file ) {
    var $li = $(
            '<div id="' + file.id + '" class="file-item thumbnail">' +
                '<img>' +
                '<div class="info">' + file.name + '</div>' +
            '</div>'
            ),
        $img = $li.find('img');


    // $list为容器jQuery实例
    $softlist.html( $li );
});
softuploader.on( 'uploadProgress', function( file, percentage ) {
    var $li = $( '#'+file.id ),
        $percent = $li.find('.progress span');

    // 避免重复创建
    if ( !$percent.length ) {
        $percent = $('<p class="progress"><span></span></p>')
                .appendTo( $li )
                .find('span');
    }

    $percent.css( 'width', percentage * 100 + '%' );
});

// 文件上传成功，给item添加成功class, 用样式标记上传成功。
softuploader.on( 'uploadSuccess', function( file, ret ) {
    $('#fileurl').val(ret.url);
    $( '#'+file.id ).addClass('upload-state-done');
});

// 文件上传失败，显示上传出错。
softuploader.on( 'uploadError', function( file ) {
    var $li = $( '#'+file.id ),
        $error = $li.find('div.error');

    // 避免重复创建
    if ( !$error.length ) {
        $error = $('<div class="error"></div>').appendTo( $li );
    }

    $error.text('上传失败');
});

// 完成上传完了，成功或者失败，先删除进度条。
softuploader.on( 'uploadComplete', function( file ) {
    $( '#'+file.id ).find('.progress').remove();
});
</script>