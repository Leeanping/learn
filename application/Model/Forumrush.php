<?php
namespace Model;

use Core\Model;
/*
 * 抢楼模型
 */
class Forumrush extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'bbs_forum_rush';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'threadid', 'starttime', 'endtime', 'stopfloor', 'usertimes', 'rewardfloor');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ();
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function addRush($data)
	{
		if($data['isrush'] == 1)
		{
			$num = $this->getCount(array(array('threadid', $data['threadid'])));
			if($num > 0)
			{
				$this->updateall("threadid = '$data[threadid]'", $data);
			}
			else
			{
				$this->add($data);
			}
		}
		else
		{
			$this->removeall("threadid = '$data[threadid]'");
		}
		return true;
	}
	
	public function getRushByThreadId($threadid)
	{
		return $this->queryOne('*', array(array('threadid', $threadid)));
	}
}
?>