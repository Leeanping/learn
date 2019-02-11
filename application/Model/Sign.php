<?php
namespace Model;

use Core\Model;
/*
 * 签到模型
 * snake.L
 */
class Sign extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'user_sign';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'uid', 'score', 'year', 'month', 'day', 'addtime');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ();
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function getSignNum($uid)
	{
		return $this->getCount(array(array('uid', $uid)));
	}
	
	public function addSign($data)
	{
		$date = \Core\Fun::date('Y-m-d', CURTIME);
		$date = explode('-', $date);
		$num = $this->getCount(array(array('uid', $data['uid']), array('year', $date[0]), array('month', $date[1]), array('day', $date[2])));
		if($num == 0 && !empty($data['uid']))
		{
			$data['year'] = $date[0];
			$data['month'] = $date[1];
			$data['day'] = $date[2];
			$data['addtime'] = CURTIME;
			return $this->add($data);
		}
		else
		{
			return false;
		}
	}
}
?>