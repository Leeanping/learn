<?php
namespace Model\User;

use Core\Model;
/*
 * 用户地址模型
 */
class Address extends Model
{
	/**
	 * 表名
	 * 
	 * @var string
	 */
	public $_tableName = 'user_address';
	
	/**
	 * 字段列表
	 * 
	 * @var array
	 */
	public $_fields = array('id', 'uid', 'email', 'nation', 'province', 'city', 'district', 'address', 
							'zipcode', 'telephone', 'mobile', 'besttime', 'isdefault', 'realname');
	
	/**
	 * 主键字段名
	 * 
	 * @var string
	 */
	public $_idkey = 'id';
	
	public function updateAddress($info)
	{
		return $this->update($info);
	}
	
	public function addAddress($info)
	{
		return $this->add($info);
	}
	
	public function delAddress($ids)
	{
		return $this->remove($ids);
	}
	
	public function getAddressesByUid($uid)
	{
		return $this->queryOne('*', array(array('uid', $uid)));
	}
	
	public function getDefaultAddressesByUid($uid)
	{
		$address = $this->queryOne('*', array(array('uid', $uid), array('isdefault', 1)));
		$address['location'] = \Core\Comm\Util::getLocation($address['province'], $address['city'], $address['district']);
		return $address;
	}
	
	public function getAddressesById($id)
	{
		return $this->find($id);
	}
	
	public function getAddressCountByWhere($where = array())
	{
		return $this->getCount($where);
	}
	
	public function getAddressCountByUid($uid)
	{
		return $this->getCount(array(array('uid', $uid)));
	}
	
	public function getAddressList($whereArr=array (), $orderByArr=array (), $limitArr=array ())
	{
		$addresses = $this->queryAll($whereArr, $orderByArr, $limitArr);
		foreach($addresses AS $idx => $address)
		{
			$addresses[$idx]['location'] = \Core\Comm\Util::getLocation($address['province'], $address['city'], $address['district']);
			$addresses[$idx]['username'] = M('User_Member')->getInfoByUid('username', $address['uid']);  
		}
		return $addresses;
	}
}
?>