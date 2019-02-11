<?php
namespace Model;

use Core\Model;
/*
 * 投票模型
 */
class Forumvote extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'bbs_forum_vote';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'threadid', 'votes', 'sort', 'votename', 'voteuids');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ('votes', 'voteuids');
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function updateVote($vote)
	{
		return $this->update($vote, $this->_fields, $this->UnsetColumu);
	}
	
	public function addVote($threadid, $votes)
	{
		foreach($votes AS $vote)
		{
			if(!empty($vote))
			{
				$this->add(array('threadid' => $threadid, 'votes' => 0, 'sort' => 0, 'votename' => $vote));
			}
		}
		return true;
	}
	
	public function getVotesByThreadId($threadid)
	{
		$votes = $this->queryAll(array(array('threadid', $threadid)));
		return $votes;
	}
	
	public function getVoteSumUid($threadid)
	{
		$results = $this->queryOne('SUM(voteuids) row_sum', array(array('threadid', $threadid)));
		return $results['row_sum'];
	}
	
	public function getVotes($threadid)
	{
		$votes = $this->getVotesByThreadId($threadid);
		$usernum = $this->getVoteSumUid($threadid);
		$por = array();
		foreach($votes AS $idx => $vote)
		{
			$votes[$idx]['percent'] = round(($vote['voteuids'] / $usernum), 3) * 100;
		}
		$por['usernum'] = $usernum;
		$por['votes'] = $votes;
		return $por;
	}
}
?>