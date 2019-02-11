<?php
namespace Model;

use Core\Model;
/*
 * 留言模型
 */
class Leaving extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'article_leaving';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'realname', 'telephone', 'email', 'qq', 'message', 'addtime');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ();
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
}
?>