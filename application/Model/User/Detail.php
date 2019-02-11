<?php
namespace Model\User;

use Core\Model;
/*
 * 会员详细资料模型
 */
class Detail extends Model
{
	/**
	 * 表名
	 * 
	 * @var string
	 */
	public $_tableName = 'user_detail';
	
	/**
	 * 字段列表
	 * 
	 * @var array
	 */
	public $_fields = array('uid', 'gender', 'birthday', 'occupation', 'marry', 'knowsource', 'summary', 'address', 'province', 'city', 'signature');
	
	/**
	 * 主键字段名
	 * 
	 * @var string
	 */
	public $_idkey = 'uid';
	
	public function getCountByUid($uid)
	{
		return $this->getCount(array(array('uid', $uid)));
	}
	
	public function editDetail($uid, $info = array())
	{
		$num = $this->getCountByUid($uid);
		if($num > 0)
		{
			return $this->updateall("uid = '$uid'", $info);
		}
		else
		{
			$info['uid'] = $uid;
			return $this->add($info);
		}
	}
	
	public function getInfoByUid($uid)
	{
		return $detail = $this->queryOne('*', array(array('uid', $uid)));
	}

	public function getOneByUid($uid, $field)
	{
		return $detail = $this->getOne($field, array(array('uid', $uid)));
	}
}
?>