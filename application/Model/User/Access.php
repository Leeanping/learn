<?php
namespace Model\User;

use Core\Model;
/**
 * 组权限操作类
 *
 * @author Lee
 */
class Access extends Model 
{
    /**
     * 表名
     *
     * @var string
     */
    protected $_tableName = 'user_access';

    /**
     * 字段列表
     *
     * @var array
     */
    protected $_fields = array ('id', 'uid', 'access');

    /**
     * 主键字段名
     *
     * @var string
     */
    public $_idkey = 'id';
	/**
	 * 设置组权限
	 *
	 * @param array $accessList
	 * @param int $gid
	 */
	public function setAccess($accessList, $uid)
	{
		$access = $this->where('uid', $uid)->getField('id');
		if($access){
			$data['access'] = implode(',', $accessList);
			return $this->where('uid', $uid)->update($data);
		}else{
			$data['uid'] = $uid;
			$data['access'] = implode(',', $accessList);
			return $this->add($data);
		}
	}
	
	/**
	 * 清除用户权限
	 *
	 * @param int $gid
	 */
	public function delAccess($uid)
	{
		return $this->where('uid', $uid)->delete();
	}
	
	/**
	 * 取得用户权限
	 *
	 * @param int $gid
	 * @return array
	 */
	public function getAccess($uid)
	{
		$access = $this->where('uid', $uid)->getField('access');
		$accesses = explode(',', $access);
		return $accesses;
	}
	
	/**
	 * 验证一个模块组权限
	 *
	 * @param int $gid
	 * @param string $model
	 * @return boolean
	 */
	public function checkAccessByUidAndModel($uid, $model)
	{
		$accesses = $this->getAccess($uid);
		if(in_array($model, $accesses)){
			return true;
		}else{
			return false;
		}
	}
}
