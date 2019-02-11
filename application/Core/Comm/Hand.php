<?php
namespace Core\Comm;
/**

 * 格式化动一下

 * @param 

 * @return

 * @author Snake.L

 * @package /application/common/

 */



class Hand

{

	

	private static function getHands()

	{

		return "1|打一顿,2|再见,3|表扬,4|逗一下,5|动一下,6|抛媚眼,7|鄙视,8|调侃,9|亲亲,10|想蹭饭,11|献殷勤,12|摆阔,13|生日快乐,14|送鸡汤,15|邀请度假";

	}

	

	private static function getHandsName()

	{

		return array(

			"1" => "狠狠的打了你一顿",

			"2" => "含情脉脉的说再见", 

			"3" => "给你颁发最佳人品奖",

			"4" => "摸摸你的肚子说，几个月了？",

			"5" => "用手指戳了你一下",

			"6" => "向你抛了一个媚眼",

			"7" => "对你翻白眼说，咱能丢这个人吗？",

			"8" => "对你说还是回火星去吧，地球不适合你",

			"9" => "狠狠的亲了你一口",

			"10" => "对你说，好几天没吃饭了，可怜可怜我吧",

			"11" => "热情的为你端来一盆洗脚水说，喝吧", 

			"12" => "对你说，随便刷",

			"13" => "对你说生日快乐",

			"14" => "为你端来一碗送鸡汤",

			"15" => "邀请你去原始部落度假"

		);

	}

	

	//格式化动一下为数组格式

	public static function getHandsArr()

	{	

		$returnArray=array();

		$s = self::getHands();

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

	

	public static function replaceHand($handid)

	{

		$preUrl = SITEURL;

		return '<img class="vmiddle" src="' . $preUrl . 'resource/images/hand/' . $handid . '.gif" width="24" height="24" />';

	}

	

	public static function getHandName($handid)

	{

		$nameArr = self::getHandsName();

		return $nameArr[$handid];

	}

}

?>