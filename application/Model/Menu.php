<?php
namespace Model;

use Core\Model;
/*
 * 后台目录模型
 * 
 * author snake.L
 *
 * @web http://www.vpcv.com/
 */
class Menu extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'base_menu';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'pid', 'mid', 'name', 'url', 'icon', 'isresize', 'width', 
							   'height');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ();
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function getMenuByAdminId($adminid)
	{
		return $this->queryAll(array(array('mid', $adminid), array('pid', 0)));
	}
	
	public function getMenuByPId($menuid)
	{
		return $this->queryAll(array(array('pid', $menuid)));
	}
	
	public function getMenuByMenuId($menuid, $type)
    {
        $menuid = (int) $menuid;
		return $this->queryOne('*', array(array('id', $menuid), array('type', $type)));
    }
}
?>