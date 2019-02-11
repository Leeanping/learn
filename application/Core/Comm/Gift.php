<?php
namespace Core\Comm;
/**

 * 格式化礼物

 * @param 

 * @return

 * @author Snake.L

 * @package /application/common/

 */



class Gift

{

	

	private static function getGifts()

	{

		return "001|橄榄球帽,002|足球,003|边裁旗,004|运动鞋,005|马术用具,006|泰迪熊,007|礼物盒,008|玫瑰花,009|橄榄球,010|高尔夫,011|奖杯,012|奖牌,013|篮球,014|溜冰鞋,015|排球,016|乒乓球,017|拳套,018|头盔,019|网球,020|泳镜泳帽,021|指南针,022|啤酒,023|冰块,024|生日蛋糕,025|劳动奖章";

	}

	//格式化礼物为数组格式

	public static function getGiftsArr()

	{	

		$returnArray=array();

		$s = self::getGifts();

		foreach(explode(",",$s) as $e)

		{

			$faceArr=array();

		 	$f=explode("|",$e);

		 	$faceArr["id"]=$f[0];

		 	$faceArr["name"]=$f[1];

		 	$returnArray[]=$faceArr;	

		}

		return $returnArray;

	}	

	//转换礼物

	public static function replaceGifts($giftid)

	{

		$giftArr = explode(',', $giftid);

        $preUrl = SITEURL;

		$str = '';

		foreach($giftArr AS $gift)

		{

			$str .= '<img alt="'.$e['name'].'" src=\''.$preUrl.'resource/images/gift/'.$gift.'.gif\' valign="middle" class="vmiddle" />';

		}

		return $str;

	}

}

?>