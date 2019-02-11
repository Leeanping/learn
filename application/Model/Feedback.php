<?php
namespace Model;

use Core\Model;
/*
 * 评论模型
 */
class Feedback extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'user_feedback';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'uid', 'postid', 'posttitle', 'type', 'score', 'content', 'status', 'addtime', 'reply', 'replytime');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ();
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	protected $_relativeTable = '##__user_member';
	
	/*获取平均分*/
	public function getScoreStr($postid, $type)
	{
		$postid = (int) $postid;
		$whereArr = array(
			array('postid', $postid),
			array('type', $type),
			array('status', 1)
		);
		$num = $this->getCount($whereArr);
		
		$data = $this->queryAll($whereArr, '', '' , 'score');
		$score = 0;
		foreach($data AS $v)
		{
			$score += $v['score'];
		}
		
		$avu = round($score / $num) < 1 ? 2 : round($score / $num);
		for($i = 1; $i <= $avu; $i++)
		{
			$str .= '<img src="/resource/js/thirdparty/raty/img/star-on.png" alt="' . $i . '" />';
		}
		return $str;
	}
	
	public function formatScore($score)
	{
		for($i = 1; $i <= $score; $i++)
		{
			$str .= '<img src="' . \Core\Fun::getPathroot() . 'resource/js/thirdparty/raty/img/star-on.png" class="feed-score" alt="' . $i . '" />';
		}
		return $str;
	}
	
	public function getFeed($postid, $type)
	{
		$postid = (int) $postid;
		$whereArr = array(
			array('postid', $postid),
			array('type', $type),
			array('status', 1)
		);
		$num = $this->getCount($whereArr);
		
		$data = $this->queryAll($whereArr, 'addtime DESC');
	}
	
	/*获取评论列表*/
	public function getFeedList($postid, $type, $num)
	{
		$exsql = $postid ? "AND a.postid = '$postid'" : "";
		$type && $exsql .= " AND a.type = '$type'";
		$sql = "SELECT a.*,b.headpic30,b.username FROM " . $this->getTableName() . 
			   " AS a LEFT JOIN " . $this->_relativeTable . " AS b ON a.uid = b.uid " . 
			   "WHERE a.status = '1' {$exsql} ORDER BY addtime DESC LIMIT 0," . $num;
		$feeds = $this->getAll($sql);
		foreach($feeds AS $idx => $feed)
		{
			$feeds[$idx]['headpic'] = $feed['headpic30'];
		}
		return $feeds;
	}
	
	public function isFeedBack($uid, $postid, $type = 'course')
	{
		$uid = (int) $uid;
		$postid = (int) $postid;
		$num = $this->getCount(array(array('uid', $uid), array('postid', $postid), array('type', $type)));
		if($num > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function getNumByUid($uid)
	{
		return $this->getCount(array(array('uid', $uid)));
	}
}
?>