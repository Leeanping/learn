<?php
namespace Core\Fun;
/*

 * swfupload 上传

 * @author snake.L

 */

class Swfupload

{

    

    /**

     *    使用swfupload

     *

     *    @author    Snake.L

     *    @param     array $params

     *    @return    string

     */

    public static function _build_upload($params = array(), $uploadKind = 'swfupload')

    {

		if($uploadKind == 'swfupload')

		{

			$site_url = \Core\Fun::getPathroot();

			$resource = $site_url . 'resource/webuploader/';

			$belong = isset($params['belong']) ? $params['belong']: 0; 

			$item_id = isset($params['item_id']) ? $params['item_id']: 0; //所属模型的ID

			$kindid = isset($params['kindid']) ? $params['kindid'] : 0;

			$m = isset($params['m']) ? $params['m'] : '';

			$include_js = '<script type="text/javascript" charset="utf-8" src="' . $resource . 'handle.js"></script>';

            $include_css = '';

			$str = <<<EOT
<script type="text/javascript">var uploadOptions = [{'belong': {$belong},'item_id': {$item_id},'kindid': {$kindid},'m': "{$m}"}];
</script>
{$include_js}
{$include_css}

EOT;

        	return $str;

		}
    }

    

    public static function getCkPlayer($params)

	{

		$site_url = \Core\Fun::getPathroot();

        $thirdurl = $site_url . 'resource/js/thirdparty/';

		$resource = $site_url . 'resource/js/thirdparty/ckplayer/';

		$include_js = '<script type="text/javascript" charset="utf-8" src="' . $resource . 'ckplayer.js"></script>';

        $mp3_js = '<script type="text/javascript" charset="utf-8" src="' . $thirdurl . 'mp3/jquery.jplayer.min.js"></script>';

        $mp3_css = '<link href="' . $thirdurl . 'mp3/blue.css" rel="stylesheet" type="text/css" />';

        $videofile = $params['videofile'];
        
        $videohtml5 = isset($params['videohtml5']) ? $params['videohtml5'] : '';

        $videobj = isset($params['obj']) ? $params['obj'] : 'video';

        $width = isset($params['width']) ? $params['width'] : 730;

        $height = isset($params['height']) ? $params['height'] : 500;

        $videotype = isset($params['videotype']) ? $params['videotype'] : '';

        if($videotype == '')

        {

        	$str = <<<EOT

{$include_js}

<script type="text/javascript">

var flashvars={
		f:'{$videofile}',//视频地址
		c:'0',//是否读取文本配置,0不是，1是
        p:2,
        lv:'0',
        b:1

};
var video=[{$videohtml5}];
CKobject.embed('{$resource}ckplayer.swf','{$videobj}','ckplayer_{$videobj}','{$width}','{$height}',false,flashvars,video);

</script>

EOT;

		}

        else if($videotype == '优酷视频')

        {

        	$str = "<embed type=\"application/x-shockwave-flash\" src=\"{$videofile}\" id=\"movie_player\" name=\"movie_player\" bgcolor=\"#FFFFFF\" quality=\"high\" allowfullscreen=\"true\" flashvars=\"isShowRelatedVideo=false&showAd=0&show_pre=1&show_next=1&isAutoPlay=true&isDebug=false&UserID=&winType=interior&playMovie=true&MMControl=false&MMout=false&RecordCode=1001,1002,1003,1004,1005,1006,2001,3001,3002,3003,3004,3005,3007,3008,9999\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" width=\"{$width}\" height=\"{$height}\">";

       	}

        else if($videotype == '土豆视频')

        {

        	$str = "<object><param name=\"movie\" value=\"{$videofile}\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param><param name=\"wmode\" value=\"opaque\"></param><embed src=\"{$videofile}\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" wmode=\"opaque\" width=\"{$width}\" height=\"{$height}\"></embed></object>";

       	}

        else if($videotype == 'Qvod视频(快播)')

        {

        	$str = "<object classid='clsid:F3D0D36F-23F8-4682-A195-74C92B03D4AF' HEIGHT={$height} WIDTH={$width} id='QvodPlayer' name='QvodPlayer' onError=if(window.confirm('请您先安装QvodPlayer软件,然后刷新本页才可以正常播放.')){window.open('http://www.qvod.com/download.htm')}else{self.location='http://www.qvod.com/'}>

			<PARAM NAME='URL' VALUE='{$videofile}'>

			<PARAM NAME='Autoplay' VALUE='1'>

			</object>";

       	}

        else if($videotype == 'Gvod视频(迅播)')

        {

        	$str = "<object classid='clsid:7040AE7C-D539-4ABB-BEA1-B5E58A3D2654' HEIGHT={$height} WIDTH={$width} id='GvodPlayer' name='GvodPlayer' onError=if(window.confirm('请您先安装迅播GVOD 播放器,然后刷新本页才可以正常播放.')){window.open('http://gvod.down.xunlei.com/gvod/gvod.exe')}else{self.location='http://gvod.xunlei.com/'}>

			<PARAM NAME='URL' VALUE='{$videofile}'>

			<PARAM NAME='Autoplay' VALUE='1'>

			</object>";

       	}

        else if($videotype == 'mp3音乐')

        {

        	$str = <<<EOT

{$mp3_css}

{$mp3_js}

<script type="text/javascript">

$(function(){

	$("#mp3player").jPlayer({

        ready: function (event) {

            $(this).jPlayer("setMedia", {

                mp3:"{$site_url}{$videofile}"

            }).jPlayer("play");

        },

        swfPath: "{$thirdurl}mp3",

        supplied: "mp3",

        wmode: "window",

        smoothPlayBar: true,

        keyEnabled: true

    });

})

</script>  

EOT;

       	}

        else

        {

        	$str = '';

       	}

        return $str;

	}

}

?>