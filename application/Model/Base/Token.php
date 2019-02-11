<?php
namespace Model\Base;

use Core\Model;
/**
 * 令牌操作类
 * 
 * @author Snake.L
 */
class Token extends Model
{
	/**
	 * 表名
	 * 
	 * @var string
	 */
	public $_tableName = 'base_token';
	
	/**
	 * 字段列表
	 * 
	 * @var array
	 */
	public $_fields = array('tid', 'uid', 'sign', 'created');
	
	/**
	 * 主键字段名
	 * 
	 * @var string
	 */
	public $_idkey = 'tid';
	
	/**
	 * 添加(替换)令牌
	 *
	 * @param array $tokenInfo
	 * @return int $tid
	 */
	public function addToken($tokenInfo) 
	{
		return $this->add($tokenInfo, $this->tokenTableSafeColumu, true);
	}
	
	/**
	 * 根据令牌编号删除令牌
	 *
	 * @param int|array $tid
	 * @return boolean
	 */
	public function deleteTokenByTid($tid) 
	{
		return $this->remove($tid);
	}
	
	/**
	 * 根据用户编号删除令牌
	 *
	 * @param int $uid
	 * @return boolean
	 */
	public function deleteTokenByUid($uid) 
	{
		if(!$tokenInfo = $this->getTokenInfoByUid($uid))
			return true;
		return $this->remove($tokenInfo['tid']);
	}
	
	/**
	 * 根据用户编号取得令牌
	 *
	 * @param int $uid
	 * @return array
	 */
	public function getTokenInfoByUid($uid){
		return $this->queryOne('*', array(array('uid', $uid)));
	}
	
	/**
	 * 根据用户编号和签名取得令牌
	 *
	 * @param int $uid
	 * @param string $sign
	 * @return array
	 */
	public function getTokenInfoByUidAndSign($uid, $sign){
		return $this->queryOne('*', array(array('uid', $uid), array('sign', $sign)));
	}
}
