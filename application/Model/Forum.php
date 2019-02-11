<?php
namespace Model;

use Core\Model;
/*
 * 论坛分类模型
 */
class Forum extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'bbs_forum';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'pid', 'type', 'name', 'status', 'sort', 'threads', 'posts', 
							   'forumpic', 'forumsummary', 'allowview', 'allowpost', 
							   'allowreply', 'istop', 'isbest', 'addtime', 'lastpost', 'prize', 'template');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ('threads', 'posts');
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function editForum($forumInfo)
	{
		$update = $this->update ($forumInfo, $this->_fields, $this->UnsetColumu);
        return $update;
	}
	
	public function getForumList($pid = 0, $useable = false)
	{
		$pid = (int) $pid;
		$whereArr = array(
			array('pid', $pid)
		);
		$useable && $whereArr[] = array('status', 1);
		return $this->queryAll($whereArr, 'sort ASC');
	}
	
	public function getForumPrize($forumid)
	{
		return $this->getOne('prize', array(array('id', $forumid)));
	}
	
	public function checkForumPrivOne($field, $forumid)
	{
		$priv = $this->getOne($field, array(array('id', $forumid)));
		if($priv == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function getForumTree($pid = 0, $useable = false)
	{
		$forums = $this->getForumList($pid, $teamid, $clubid, $matchid, $useable);
		foreach($forums AS $idx => $forum)
		{
			$forums[$idx]['son'] = $this->getForumList($forum['id'], $useable);
		}
		return $forums;
	}
	
	public function getSonId($pid)
	{
		$son = $this->queryAll(array(array('pid', $pid)), '', '', 'id');
		$ids = '';
		foreach($son AS $s)
		{
			$ids .= $s['id'] . ',';
		}
		return substr($ids, 0, strlen($ids) - 1);
	}
}
?>