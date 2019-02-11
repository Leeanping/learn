<?php
namespace Model;

use Core\Model;
/*
 * 区域模型
 * snake.L
 */
class Region extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'base_region';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'pid', 'regionname');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ();
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function getRegionList($pid = 0)
	{
		return $this->queryAll(array(array('pid', $pid)), 'id ASC');
	}
	
	public function getRegionName($id)
	{
		return $this->getOne('regionname', array(array('id', $id)));
	}
	
	public function getRegionArea ($pid = 52)
    {
		$pid = (int) $pid;
		$regions = $this->getRegionList($pid);
		foreach($regions AS $idx => $region)
		{
			$regions[$idx]['son'] = $this->getRegionArea($region['id']);
		}
		return $regions;
    }
}
?>