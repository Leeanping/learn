<?php
namespace Core\Comm;
/**

 * 获取播放器

 * @param 

 * @return

 * @author Snake

 */

class Video

{

	public static $adConfig;

	

	public static function getPlayVideo($players)

	{

		if($players=='Flash视频')

		{

			$play ="<embed class=\"BDE_Flash\" height=\"{$height}\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" width=\"{$width}\" src=\"{$url}\" scale=\"noborder\" allowscriptaccess=\"never\" menu=\"false\" loop=\"false\" play=\"true\" wmode=\"transparent\" allowfullscreen=\"true\">";

		}

		else if($players=='media视频(wmv/asf等格式)')

		{

			$play = "<object id=\"player\" height=\"{$height}\" width=\"{$width}\" classid=\"CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6\"> 

			<param name=\"AutoStart\" VALUE=\"-1\"> 

			<param name=\"url\" value=\"{$url}\"> 

			<param name=\"PlayCount\" VALUE=\"1\"> 

			<param name=\"volume\" value=\"50\"> 

			<param name=\"mute\" value=\"0\"> 

			<param name=\"uiMode\" value=\"full\"> 

			<param name=\"windowlessVideo\" value=\"0\"> 

			<param name=\"fullScreen\" value=\"0\"> 

			<param name=\"enableErrorDialogs\" value=\"-1\"> 

			<embed SRC type=\"audio/x-pn-realaudio-plugin\" CONSOLE=\"Clip1\" CONTROLS=\"ImageWindow,controlpanel\" HEIGHT=\"{$height}\" WIDTH=\"{$width}\" AUTOSTART=\"true\"> 

			</object>";

		}

		else if($players=='real视频(rm/rmvb等格式)')

		{

			$play = "

			<OBJECT ID=video1 CLASSID=\"clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA\" HEIGHT={$height} WIDTH={$width}> 

			<param name=\"_ExtentX\" value=\"9313\"> 

			<param name=\"_ExtentY\" value=\"7620\"> 

			<param name=\"AUTOSTART\" value=\"1\"> 

			<param name=\"SHUFFLE\" value=\"0\"> 

			<param name=\"PREFETCH\" value=\"0\"> 

			<param name=\"NOLABELS\" value=\"0\"> 

			<param name=\"SRC\" value=\"{$url}\"> 

			<param name=\"CONTROLS\" value=\"ImageWindow,controlpanel\"> 

			<param name=\"CONSOLE\" value=\"Clip1\"> 

			<param name=\"LOOP\" value=\"0\"> 

			<param name=\"NUMLOOP\" value=\"0\"> 

			<param name=\"CENTER\" value=\"0\"> 

			<param name=\"MAINTAINASPECT\" value=\"0\"> 

			<param name=\"BACKGROUNDCOLOR\" value=\"#000000\">

			<embed SRC type=\"audio/x-pn-realaudio-plugin\" CONSOLE=\"Clip1\" CONTROLS=\"ImageWindow,controlpanel\" HEIGHT=\"{$height}\" WIDTH=\"{$width}\" AUTOSTART=\"true\"> 

			</OBJECT> ";

		}

		else if($players=='FLV视频')

		{

			$play = "<embed src=\"/plus/flvplayer.swf?file={$url}\"  type=\"application/x-shockwave-flash\" width=\"{$width}\" height=\"{$height}\"></embed>";

		}

		else if($players=='Qvod视频(快播)')

		{

			$play = "<object classid='clsid:F3D0D36F-23F8-4682-A195-74C92B03D4AF' HEIGHT={$height} WIDTH={$width} id='QvodPlayer' name='QvodPlayer' onError=if(window.confirm('请您先安装QvodPlayer软件,然后刷新本页才可以正常播放.')){window.open('http://www.qvod.com/download.htm')}else{self.location='http://www.qvod.com/'}>

			<PARAM NAME='URL' VALUE='{$url}'>

			<PARAM NAME='Autoplay' VALUE='1'>

			</object>";

		}

		else if($players=='mp3音乐')

		{

			$play = "<object id=\"player\" height=\"{$height}\" width=\"{$width}\" classid=\"CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6\"> 

			<param name=\"AutoStart\" VALUE=\"-1\"> 

			<param name=\"url\" value=\"{$url}\"> 

			<param name=\"PlayCount\" VALUE=\"1\"> 

			<param name=\"volume\" value=\"50\"> 

			<param name=\"mute\" value=\"0\"> 

			<param name=\"uiMode\" value=\"full\"> 

			<param name=\"windowlessVideo\" value=\"0\"> 

			<param name=\"fullScreen\" value=\"0\"> 

			<param name=\"enableErrorDialogs\" value=\"-1\"> 

			<embed SRC type=\"audio/x-pn-realaudio-plugin\" CONSOLE=\"Clip1\" CONTROLS=\"controlpanel\" HEIGHT=\"{$height}\" WIDTH=\"{$width}\" AUTOSTART=\"true\"> 

			</object>";

		}

		else if($players=='Gvod视频(迅播)')

		{

			$play = "<object classid='clsid:7040AE7C-D539-4ABB-BEA1-B5E58A3D2654' HEIGHT={$height} WIDTH={$width} id='GvodPlayer' name='GvodPlayer' onError=if(window.confirm('请您先安装迅播GVOD 播放器,然后刷新本页才可以正常播放.')){window.open('http://gvod.down.xunlei.com/gvod/gvod.exe')}else{self.location='http://gvod.xunlei.com/'}>

			<PARAM NAME='URL' VALUE='{$url}'>

			<PARAM NAME='Autoplay' VALUE='1'>

			</object>";

		}

		else if($players=='优酷视频')

		{

			$play = "<embed type=\"application/x-shockwave-flash\" src=\"{$url}\" id=\"movie_player\" name=\"movie_player\" bgcolor=\"#FFFFFF\" quality=\"high\" allowfullscreen=\"true\" flashvars=\"isShowRelatedVideo=false&showAd=0&show_pre=1&show_next=1&isAutoPlay=true&isDebug=false&UserID=&winType=interior&playMovie=true&MMControl=false&MMout=false&RecordCode=1001,1002,1003,1004,1005,1006,2001,3001,3002,3003,3004,3005,3007,3008,9999\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" width=\"{$width}\" height=\"{$height}\">";

		}

		else if($players=='土豆视频')

		{

			$play = "<object><param name=\"movie\" value=\"{$url}\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param><param name=\"wmode\" value=\"opaque\"></param><embed src=\"{$url}\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" wmode=\"opaque\" width=\"{$width}\" height=\"{$height}\"></embed></object>";

		}

		else

		{

			$play = '';

		}

		return $play;

	}

}

?>