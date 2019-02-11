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
                {{foreach from=$gallerylist item=gallery}}
                <li id="upfile-{{$gallery.id}}" data-thumb="{{$gallery.thumburl}}" data-pic="{{$gallery.imgurl}}">
                	<img src="{{$gallery.thumburl}}" width="113" height="113" />
                    {{if $gallery.thumburl == $thumb}}<span class="icon"></span>{{/if}}
                	<div class="ufile-panel">
						<b class="ucancel" data-id="{{$gallery.id}}">删除</b>
                    </div>
                </li>
                <input name="file_id[]" type="hidden" value="{{$gallery.id}}" />
                {{/foreach}}
            </ul>
            <input name="thumb" type="hidden" id="thumb" />
			<input name="pic" type="hidden" id="pic" />
        </div>
    </div>
</div>