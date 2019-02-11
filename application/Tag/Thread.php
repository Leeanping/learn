<?php
namespace Tag;
/*
 *  调用论坛列表
 *  snake.L
 */
class Thread
{
	public function getList($params)
	{
		$forumid = $params['forumid'] ? $params['forumid'] : '';
		$num = $params['num'] ? $params['num'] : 5;
		$threads = M('forumthread')->getThreadList($forumid, $num);
		return $threads;
	}
}
?>