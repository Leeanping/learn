<?php
namespace Model\User;

use Core\Model;
/*
 * 消息模型
 */
class Message extends Model
{
	/**
	 * 表名
	 * 
	 * @var string
	 */
	public $_tableName = 'user_message';
	
	/**
	 * 字段列表
	 * 
	 * @var array
	 */
	public $_fields = array('id', 'fid', 'type', 'status', 'fromuid', 'fromrealname', 'touid', 'folder', 
							'title', 'sendtime', 'writetime', 'hasview', 'isadmin', 'message', 'useable');
	
	/**
	 * 主键字段名
	 * 
	 * @var string
	 */
	public $_idkey = 'id';
	
	public function editMessage($info = array())
	{
		return $this->update($info);
	}
	
	public function addMessage($info = array())
	{
		return $this->add($info);
	}
	
	public function delMessage($id)
	{
		return $this->remove($id);
	}
	
	public function getUserMessages($uid, $folder, $isadmin)
	{
		$where = array(array('touid', $uid), array('folder', $folder), array('useable', 1));
		$isadmin && $where[] = array('isadmin', 1);
		$messages = $this->queryAll($where, 'sendtime DESC');
		return $messages;
	}
	
	public function getMessageById($id)
	{
		return $this->find($id);
	}
	
	public function getMessageIdByFid($fid)
	{
		$message = $this->queryOne('id', array(array('fid', $fid)));
		return $message['id'];
	}
	
	public function getMessageIdByFidAndFolder($fid, $folder)
	{
		$message = $this->queryOne('id', array(array('fid', $fid), array('folder', $folder)));
		return $message['id'];
	}
	
	public function getMessageByFid($fid)
	{
		return $this->queryOne('sendtime', array(array('fid', $fid)));
	}
	
	public function getMessageCountByWhere($where = array())
	{
		return $this->getCount($where);
	}
	
	public function getMessageList($whereArr=array (), $orderByArr=array (), $limitArr=array ())
	{
		return $this->queryAll($whereArr, $orderByArr, $limitArr);
	}
}
?>