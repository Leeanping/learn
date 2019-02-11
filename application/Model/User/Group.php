<?php
namespace Model\User;

use Core\Model;
/**
 * 用户组操作类
 *
 * @author lvfeng
 */
class Group extends Model
{
	/**

	 * 表名

	 * 

	 * @var string

	 */

	public $_tableName = 'user_group';

	

	/**

	 * 字段列表

	 * 

	 * @var array

	 */

	public $_fields = array('gid', 'type', 'title', 'kind', 'starnum', 'color', 'min', 'max');

	

	/**

	 * 主键字段名

	 * 

	 * @var string

	 */

	public $_idkey = 'gid';
	
	/**
	 * 添加组
	 *
	 * @param array $groupInfo
	 * @return int $gid
	 */
	public function addGroup($groupInfo) 
	{
		return $this->add($groupInfo, $this->groupTableSafeColumu);
	}
	
	/**
	 * 根据组编号编辑组
	 *
	 * @param array $groupInfo
	 * @return boolean
	 */
	public function editGroupInfo($groupInfo)
	{
		return $this->update($groupInfo, $this->groupTableSafeColumu);
	}
	
	/**
	 * 根据组编号删除组
	 *
	 * @param int|array $gid
	 * @return int boolean
	 */
	public function deleteGroupByGid($gid)
	{
		return $this->remove($gid);
	}
	
	/**
	 * 根据组编号取得组信息
	 *
	 * @param int $gid
	 * @return array
	 */
	public function getGroupInfoByGid($gid)
	{
		return $this->queryOne('*', array(array('gid', $gid)));
	}
	
	/**
	 * 取得组信息列表
	 *
	 * @param array $whereArr
	 * @param array $orderByArr
	 * @param array $limitArr
	 * @return array
	 */
	public function getGroupList($whereArr=array(), $orderByArr=array(), $limitArr=array())
	{
		return $this->queryAll($whereArr, $orderByArr, $limitArr);
	}
	
	/**
	 * 验证用户组名是否已存在
	 *
	 * @param string $title
	 * @param int $gid
	 * @return boolean
	 */
	public function checkTitleExists($title, $gid=0) 
	{
		$whereArr = array(array('title', $title));
		!empty($gid) && $whereArr[] = array('gid', $gid, '<>');
		return $this->getCount($whereArr);
	}
	
	public function getGroupName($gid)
	{
		return $this->queryOne('title', array(array('gid', $gid)));
	}
	
	public function getGroupByScore($score)
	{
		return $this->queryOne('gid', array(array('type', 1), array('min', $score, '>='), array('max', $score, '<')));
	}
	
	public function changeUserGroup($score, $userModel, $uid)
	{
		$user = M('User_Member')->getUserInfoByUid($uid);
		$group = $this->getGroupInfoByGid($user['gid']);
		if($group['type'] == 1 && !($score >= $group['min'] && $score < $group['max']))
		{
			$newgid = $this->getGroupByScore($score);
			M('User_Member')->editUserInfo(array('uid' => $uid, 'gid' => $group['gid']));
		}
		return true;
	}
}
