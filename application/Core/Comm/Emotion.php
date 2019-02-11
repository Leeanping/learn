<?php
namespace Core\Comm;
/**

 * 格式化表情

 * @author Snake.L

 */



class Emotion

{	//获取表情数据

	

	private static function getEmotions()

	{

		return array(

			'[劳累过度]' => 1,

			'[身体不适]' => 2,

			'[旅游]' => 3,

			'[打篮球]' => 4,

			'[游泳]' => 5,

			'[运动]' => 6,

			'[晴天霹雳]' => 7,

			'[晴天]' => 8,

			'[下雨]' => 9,

			'[郁闷]' => 10,

			'[崩溃]' => 11,

			'[浮云]' => 12,

			'[泪奔]' => 13,

			'[晚安]' => 14,

			'[星期一]' => 15,

			'[星期二]' => 16, 

			'[星期三]' => 17,

			'[星期四]' => 18,

			'[星期五]' => 19,

			'[星期六]' => 20,

			'[星期天]' => 21,

			'[加班]' => 22,

			'[无聊]' => 23,

			'[囧shi了]' => 24

		);

	}

	

	public static function replace($str) 

	{

		$emotions = self::getEmotions();

		$emotionid = $emotions[$str];

		return '/resource/images/mind/m' . $emotionid . '.png';

	}

}

?>