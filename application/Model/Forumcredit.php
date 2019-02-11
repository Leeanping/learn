<?php
namespace Model;

use Core\Model;
/*
 * 回帖奖励模型
 */
class Forumcredit extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'bbs_forum_replycredit';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'threadid', 'credit', 'times', 'usertimes', 'random');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ();
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function addCredit($data)
	{
		$num = $this->getCount(array(array('threadid', $data['threadid'])));
		if($num > 0)
		{
			return $this->updateall("threadid = '$data[threadid]'", $data);
		}
		else
		{
			return $this->add($data);
		}
	}
	
	public function getCreditByThreadId($threadid)
	{
		return $this->queryOne('*', array(array('threadid', $threadid)));
	}
}
?>