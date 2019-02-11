<?php /* vpcvcms compiled created on 2018-11-08 10:57:05
         compiled from admin/upload.tpl */ ?>
<div class="tabbody">
    <div id="upload" class="panel focus">
        <div id="queueList" class="queueList">
            <div class="statusBar element-invisible">
                <div class="progress">
                    <span class="text">0%</span>
                    <span class="percentage"></span>
                </div>
                <div class="uploadinfo"></div>
                <div class="btns">
                    <div id="filePickerBtn"></div>
                    <div class="uploadBtn">开始上传</div>
                </div>
            </div>
            <div id="dndArea" class="placeholder">
                <div class="filePickerContainer">
                    <div id="filePickerReady"></div>
                </div>
            </div>
            <ul class="filelist element-invisible">
                <li id="filePickerBlock" class="filePickerBlock"></li>
            </ul>
        </div>
    </div>
</div>
<div class="tabbody" style="display:none;">
    <div id="upload" class="panel focus">
        <div class="queueList">
            <ul class="ufilelist" id="ufilelist">
                <?php $_from = $this->_tpl_vars['gallerylist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gallery']):
?>
                <li id="upfile-<?php echo $this->_tpl_vars['gallery']['id']; ?>
" data-thumb="<?php echo $this->_tpl_vars['gallery']['thumburl']; ?>
" data-pic="<?php echo $this->_tpl_vars['gallery']['imgurl']; ?>
">
                	<img src="<?php echo $this->_tpl_vars['gallery']['thumburl']; ?>
" width="113" height="113" />
                    <?php if ($this->_tpl_vars['gallery']['thumburl'] == $this->_tpl_vars['thumb']): ?><span class="icon"></span><?php endif; ?>
                	<div class="ufile-panel">
						<b class="ucancel" data-id="<?php echo $this->_tpl_vars['gallery']['id']; ?>
">删除</b>
                    </div>
                </li>
                <input name="file_id[]" type="hidden" value="<?php echo $this->_tpl_vars['gallery']['id']; ?>
" />
                <?php endforeach; endif; unset($_from); ?>
            </ul>
            <input name="thumb" type="hidden" id="thumb" />
			<input name="pic" type="hidden" id="pic" />
        </div>
    </div>
</div>