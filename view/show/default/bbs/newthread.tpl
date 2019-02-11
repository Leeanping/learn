<!doctype html>
<html>
    <head>
    	<title>发表新帖_{{$seo.seotitle}}_{{TO->cfg key="site_name" group="basic" default="致茂网络"}}</title>
    	{{include file="common/style.tpl"}}
    </head>

    <body>
    	{{include file='common/header.tpl'}}
        <div class="wrap clearfix">
            <div class="breadcrumb">
                <p class="block"><a href="/">首页</a>&gt;<a href="/bbs">论坛</a>&gt;<a href="###">发表新帖</a></p>
            </div>
            <form id="pform" method="post" enctype="multipart/form-data" action="/bbs/{{$_postName}}">
            <div class="tiezi">
                <h3 class="futitle"><span id="returnmessage">发表帖子</span></h3>
                <div class="pbt clearfix">
                <input type="file" name="attach" />
                </div>
                <div class="pbt clearfix">
                <div class="pbt_select needdown">
                <div class="pbt_select_option_box showdowndiv" style="height: 500px; display: none;">
                {{foreach from=$forums item=forum}}
                <a hid="{{$forum.id}}" href="javascript:;">{{$forum.name}}</a>
                {{foreach from=$forum.son item=son}}
                <a hid="{{$son.id}}" href="javascript:;">--{{$son.name}}</a>
                {{/foreach}}
                {{/foreach}}
                </div>
                <span>
                <input type="hidden" id="forumid" name="forumid" value="{{$forumid}}"><span id="forumname">{{if $forumname}}{{$forumname}}{{else}}选择板块{{/if}}</span>
                </span>
                </div>
                <div class="pbt_title">
                <span><input type="text" name="title" id="title" class="px" tabindex="1" style="color: rgb(148, 148, 148);" value=""></span>
                </div>
                </div>
                <div class="fhtie">
                    <div class="editor">
                        <div class="editor-zone">
                            {{$content}}
                        </div>
                        <div class="tijiaobutton">
                            <button type="submit" id="postsubmit" class="pn pnc ft" value="true" name="topicsubmit"></button>
                            <input type="hidden" name="threadid" value="{{$threadid}}" />
                            <input type="hidden" name="action" value="{{$_postName}}" />
                        </div>
                    </div>

                </div>

            </div>
            </form>
        </div>
        {{include file='common/footer.tpl'}}
    </body>
</html>
<script language="JavaScript">
jQuery(function(){
jQuery('.needdown').hover(function(event){
jQuery(this).children('.showdowndiv').show();
}, function(event){
jQuery(this).children('.showdowndiv').hide();
});
jQuery('.pbt_select_option_box>a').each(function(i, el){
    jQuery(el).click(function(event){
        jQuery('#forumid').val(jQuery(this).attr('hid'));
        jQuery('#forumname').text(jQuery(this).text());
        jQuery(this).parent().hide();
    });
});

if(jQuery('.pbt_select_option_box').height() > 500){jQuery('.pbt_select_option_box').height('500px');}

jQuery('.pbt_title input[type=text]').blur(function(){
var tempSubjecttips = jQuery(this).parents('.pbt_title').find('.subject_tips');
if(jQuery(this).val().length == 0){
jQuery(this).val(tempSubjecttips.val()).css('color', '#949494');
}
}).focus(function(){
var tempSubjecttips = jQuery(this).parents('.pbt_title').find('.subject_tips');
if(jQuery(this).val() == tempSubjecttips.val()){
jQuery(this).val('').css('color', '');
}
}).blur();
});

function check_subject(){
jQuery.noConflict();
;(function($){
$('.pbt_title').each(function(){
var tempSubject     = jQuery(this).find('input[type=text]');
var tempSubjecttips = jQuery(this).find('.subject_tips');
if(tempSubject.val() == tempSubjecttips.val()){
tempSubject.val('');
setTimeout(function(){
tempSubject.val(tempSubjecttips.val());
},1000);
}
});
})(jQuery);
}
function reloadgd(el,f){
	if(f || !el.gdloaded){
		el.src=el.getAttribute('gd') + '?' + +new Date();
		el.style.display='block';
		el.gdloaded = true;
	}
}
</script>