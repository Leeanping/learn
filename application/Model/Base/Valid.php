<?php
namespace Model\Base;

use Core\Model;
/**
 * 验证码操作类
 * 
 * @author Snake.L
 */
class Valid extends Model
{
	/**
	 * 表名
	 * 
	 * @var string
	 */
	public $_tableName = 'base_valid';
	
	/**
	 * 字段列表
	 * 
	 * @var array
	 */
	public $_fields = array('id', 'telephone', 'type', 'sign', 'created', 'isvalid');
	
	/**
	 * 主键字段名
	 * 
	 * @var string
	 */
	public $_idkey = 'id';
	
	/**
	 * 添加验证码
	 *
	 * @param array $validInfo
	 * @return int $id
	 */
	public function addValid($validInfo) 
	{
		$validInfo['created'] = CURTIME;
		$validInfo['isvalid'] = 0;
		return $this->add($validInfo);
	}
	
	/**
	 * 根据令牌编号删除验证码
	 *
	 * @param int|array $id
	 * @return boolean
	 */
	public function deleteValidById($id) 
	{
		return $this->remove($id);
	}
	
	/**
	 * 根据用户编号删除验证码
	 *
	 * @param int $uid
	 * @return boolean
	 */
	public function deleteValidByTelephone($telephone) 
	{
		if(!$validInfo = $this->getValidInfoByTelephone($telephone))
			return true;
		return $this->remove($validInfo['id']);
	}
	
	/**
	 * 根据用户编号取得验证码
	 *
	 * @param int $uid
	 * @return array
	 */
	public function getValidInfoByTelephone($telephone){
		return $this->queryOne('*', array(array('telephone', $telephone)));
	}
	
	/**
	 * 根据用户编号和签名取得验证码
	 *
	 * @param int $uid
	 * @param string $sign
	 * @return array
	 */
	public function getValidInfoByTelephoneAndSign($telephone, $sign){
		return $this->queryOne('*', array(array('telephone', $telephone), array('sign', $sign)));
	}
	
	/**
	 * 根据用户编号和类型取得验证码
	 *
	 * @param int $uid
	 * @param string $type
	 * @return array
	 */
	public function getValidInfoByTelephoneAndType($telephone, $type){
		return $this->queryOne('*', array(array('telephone', $telephone), array('type', $type), array('isvalid', 0)), 'created DESC');
	}
	
	public function updateValidByTelephoneAndType($telephone, $type){
		$valid = $this->queryOne('*', array(array('telephone', $telephone), array('type', $type)), 'created DESC');
		return $this->update(array('id' => $valid['id'], 'isvalid' => 1));
	}
}
