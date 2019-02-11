<?php
namespace Model;

use Core\Model;
/*
 * 论坛主题模型
 */
class Forumthread extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'bbs_forum_thread';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'forumid', 'username', 'realname', 'uid', 'title', 'addtime', 'attach', 
							   'stows', 'isprize', 'lastpost', 'lastpostuid', 'lastposter', 
							   'views', 'replies', 'sort', 'istop', 'isbest', 
							   'stamp', 'useable', 'ishot', 'ispic', 'isgood', 'isrec', 'iscreate', 
							   'isbao', 'titlecolor', 'special', 'replycredit', 'isrush');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ('views', 'replies', 'stows');
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function editForumThread($threadInfo, $plus = '+')
	{
		$update = $this->update ($threadInfo, $this->_fields, $this->UnsetColumu, $plus);
        return $update;
	}
	
	public function getThreadList($forumid = 0, $num = 10, $orderby = 'addtime DESC', $ex = '')
	{
		$_userModel = new \Model\User\Member();
		$whereArr = array();
		$whereArr[] = array('useable', 1);
		$forumid && $whereArr[] = array('forumid', $forumid);
		$ex && $whereArr[] = array($ex, 1);
		$threads = $this->queryAll($whereArr, $orderby, array($num, 0));
		foreach($threads AS $idx => $thread)
		{
			$threads[$idx]['headpic'] = $_userModel->getInfoByUid('headpic', $thread['uid']);
			$threads[$idx]['icon'] = $this->formatIcon($thread);
		}
		return $threads;
	}
	
	public function getThreadsByUid($uid)
	{
		return $this->getCount(array(array('uid', $uid)));
	}
	
	public function updateForumViews($threadid)
	{
		$data['id'] = $threadid;
		$data['views'] = 1;
		return $this->editForumThread($data);
	}
	
	public function getThreadsByTime($time = 1)
	{
		$now = \Core\Fun::time();
    	$prev = \Core\Fun::strtotime("-1 day");

    	$nowstime = \Core\Fun::strtotime(\Core\Fun::date('Y-m-d', $now) . ' 0:0:0');
    	$nowetime = \Core\Fun::strtotime(\Core\Fun::date('Y-m-d', $now) . ' 23:59:59');

    	$prevstime = \Core\Fun::strtotime(\Core\Fun::date('Y-m-d', $prev) . ' 0:0:0');
    	$prevetime = \Core\Fun::strtotime(\Core\Fun::date('Y-m-d', $prev) . ' 23:59:59');

    	if($time == 1) //今日
    	{
    		return $this->getCount(array(array('addtime', $nowstime, '>='), array('addtime', $nowetime, '<=')));
    	}
    	else //昨日
    	{
    		return $this->getCount(array(array('addtime', $prevstime, '>='), array('addtime', $prevetime, '<=')));
    	}
	}

	public function formatIcon($thread, $issmall = true)
	{
		$str = '';
		$picType = $issmall ? '.small' : '';
		if($thread['stamp'] == 'istop')
		{
			$str .= '<img src="/resource/images/stamp/005' . $picType . '.gif" class="vmiddle" />';
		}
		if($thread['stamp'] == 'isbest')
		{
			$str .= '<img src="/resource/images/stamp/001' . $picType . '.gif" class="vmiddle" />';
		}
		if($thread['stamp'] == 'ishot')
		{
			$str .= '<img src="/resource/images/stamp/002' . $picType . '.gif" class="vmiddle" />';
		}
		if($thread['stamp'] == 'ispic')
		{
			$str .= '<img src="/resource/images/stamp/003' . $picType . '.gif" class="vmiddle" />';
		}
		if($thread['stamp'] == 'isgood')
		{
			$str .= '<img src="/resource/images/stamp/004' . $picType . '.gif" class="vmiddle" />';
		}
		if($thread['stamp'] == 'isrec')
		{
			$str .= '<img src="/resource/images/stamp/006' . $picType . '.gif" class="vmiddle" />';
		}
		if($thread['stamp'] == 'iscreate')
		{
			$str .= '<img src="/resource/images/stamp/007' . $picType . '.gif" class="vmiddle" />';
		}
		if($thread['stamp'] == 'isbao')
		{
			$str .= '<img src="/resource/images/stamp/009' . $picType . '.gif" class="vmiddle" />';
		}
		return $str;
	}
}
?>