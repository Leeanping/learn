<?php
namespace Model;

use Core\Model;
/*
 * 论坛帖子模型
 */
class Forumpost extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'bbs_forum_post';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'forumid', 'threadid', 'isfirst', 'username', 'realname', 'uid', 
						       'replycredit', 'title', 'useable', 'addtime', 'content', 
							   'reply', 'postip', 'special', 'isrush');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ();
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function editForumPost($threadInfo)
	{
		$update = $this->update ($threadInfo, $this->_fields, $this->UnsetColumu);
        return $update;
	}
	
	public function getPostList($forumid = 0)
	{
		$whereArr = array();
		$forumid && $whereArr[] = array('forumid', $forumid);
		return $this->queryAll($whereArr, 'isfirst DESC');
	}
	
	public function getThreadContent($threadid)
	{
		return $this->getOne('content', array(array('threadid', $threadid), array('isfirst', 1)));
	}
	
	public function getPostId($threadid)
	{
		return $this->getOne('id', array(array('threadid', $threadid), array('isfirst', 1)));
	}
	
	public function getPostsByUid($uid)
	{
		return $this->getCount(array(array('uid', $uid)));
	}
	
	public function getPostsByUidAndThreadId($uid, $threadid)
	{
		return $this->getCount(array(array('uid', $uid), array('threadid', $threadid)));
	}
}
?>