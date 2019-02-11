<?php
namespace Model;

use Core\Model;
/*
 * 友情链接模型
 */
class Link extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'base_link';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'name', 'link', 'linkpic', 'useable', 'addtime');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ();
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function getLinks()
	{
		return $this->where('useable', 1)->order('addtime desc')->select();
	}
}
?>