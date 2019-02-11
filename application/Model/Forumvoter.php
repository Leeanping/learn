<?php
namespace Model;

use Core\Model;
/*
 * 投票者模型
 */
class Forumvoter extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'bbs_forum_voter';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'threadid', 'uid', 'username', 'voteid', 'addtime');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ();
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
}
?>