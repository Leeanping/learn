<?php
namespace Core\Comm;
/**
 * 中奖
 * @param 
 * @return
 * @author Snake.L
 * @package /application/common/
 */

class Prize
{
	
	public static function getPrizes($type = 'member', $prizeid)
	{
		$prizeArr = array(
			'member' => array(
				'1' => '女生版会员卡一张',
				'2' => '积分+200',
				'3' => '荣誉币+10',
				'4' => '谢谢参与',
				'5' => '男生版会员卡一张',
				'6' => '谢谢参与',
				'7' => '荣誉币+50',
				'8' => '积分+100',
				'9' => '积分+50',
				'10' => '谢谢参与'
			),
			'eat' => array(
				'1' => '试吃名额1位',
				'2' => '积分+200',
				'3' => '荣誉币+10',
				'4' => '谢谢参与',
				'5' => '谢谢参与',
				'6' => '谢谢参与',
				'7' => '荣誉币+50',
				'8' => '积分+100',
				'9' => '积分+50',
				'10' => '谢谢参与'
			)
		);
		return $prizeArr[$type][$prizeid];
	}
	
	public static function getPrizeValues($type = 'member', $prizeid)
	{
		$prizeArr = array(
			'member' => array(
				'1' => '',
				'2' => '200',
				'3' => '10',
				'4' => '',
				'5' => '',
				'6' => '',
				'7' => '50',
				'8' => '100',
				'9' => '50',
				'10' => ''
			),
			'eat' => array(
				'1' => '',
				'2' => '200',
				'3' => '10',
				'4' => '',
				'5' => '',
				'6' => '',
				'7' => '50',
				'8' => '100',
				'9' => '50',
				'10' => ''
			)
		);
		return $prizeArr[$type][$prizeid];
	}
	
	public static function getRand()
	{
		$randnum = 0.1;
		$rand = mt_rand(0, 10000);
		$prizenum = $randnum * 10000;
		if($rand < $prizenum)
		{
			return mt_rand(1, 10);
		}
		else
		{
			return 10;
		}
	}
	
	public static function getChance($total)
	{
		$chance = 0.2;
		$win = floor(($chance * $total) / 100);
		$other = $total-$win;
		$return = array();
 		for ($i=0; $i < $win; $i++)
 		{
  			$return[] = 1;
 		}
 		for ($n=0;$n<$other;$n++)
 		{
  			$return[] = 0;
 		}
 		shuffle($return);
 		return $return[array_rand($return)];
	}
	
	public static function getEatRand()
	{
		return mt_rand(1, 10);
	}
	
	public static function setPrize($type, $prizeid, $uid)
	{
		$_userModel = new \Model\User\Member();
		$prize = self::getPrizeValues($type, $prizeid);
		$data = array(
			'uid' => $uid
		);
		if($prizeid == '2' || $prizeid == '8' || $prizeid == '9')
		{
			$data['score'] = $prize;
		}
		if($prizeid == '3' || $prizeid == '7')
		{
			$data['honor'] = $prize;
		}
		return $_userModel->editUserInfo($data);
	}
}
?>