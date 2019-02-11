<?php
namespace Model;

use Core\Model;
/*
 * 访问模型
 */
class Stats extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'base_stats';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'accesstime', 'ip', 'visits', 'browser', 'system', 'language', 
							   'area', 'refererdomain', 'refererpath', 'accessurl');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ();
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function addStats($info)
	{
		return $this->add($info);
	}
	
	public function getTodayStats()
	{
		$time = \Core\Fun::time();
		$today  = getdate($time);
		$where = mktime(0, 0, 0, $today['mon'], $today['mday'], $today['year']);
		$num = $this->getCount(array(array('accesstime', $where, '>')));
		return $num;
	}
	
	public function getTodayIP()
	{
		$time = \Core\Fun::time();
		$today  = getdate($time);
		$where = mktime(0, 0, 0, $today['mon'], $today['mday'], $today['year']);
		$row = $this->queryOne('COUNT(DISTINCT ip) ip', array(array('accesstime', $where, '>')));
		return $row['ip'];
	}
}
?>