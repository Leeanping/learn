<?php
namespace Model;

use Core\Model;
/**
 * 奖励模型
 * @author: Snake.L
 */
class Credit extends Model
{
	
    /**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'base_credit_log';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'uid', 'postid', 'type', 'typename', 'credit', 'addtime');
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function addCredit($uid, $postid, $type, $credit = '')
	{
		$usercredit = \Core\Comm\Util::userCredits($type);
		$creditvalue = $credit == '' ? $usercredit['credit'] : $credit;
		
		$data = array(
			'uid' => $uid,
			'postid' => $postid,
			'type' => $type,
			'typename' => $usercredit['name'],
			'credit' => $creditvalue,
			'addtime' => CURTIME
		);
		return $this->add($data);
	}
	
	public function getCreditByTid($postid)
	{
		return $this->queryOne('*', array(array('postid', $postid)));
	}
	
	public function getCountByUid($uid, $type)
	{
		return $this->getCount(array(array('uid', $uid), array('type', $type)));
	}
	
	public function getCountByUidAndPostId($uid, $postid, $type)
	{
		return $this->getCount(array(array('uid', $uid), array('postid', $postid), array('type', $type)));
	}
	
	public function getSumByUid($uid, $type)
	{
		$result = $this->queryOne('SUM(credit) AS cr', array(array('uid', $uid), array('type', $type)));
		return $result['cr'];
	}
	
	public function getSumByUidAndDay($uid, $type)
	{
		$todays = strtotime(date("Y-m-d"));
		$todaye = strtotime(date('Y-m-d', strtotime('+1 day')));
		$result = $this->queryOne('SUM(credit) AS cr', array(array('uid', $uid), array('type', $type), array('addtime', $todays, '>='), array('addtime', $todaye, '<=')));
		return $result['cr'];
	}
}