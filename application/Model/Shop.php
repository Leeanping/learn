<?php
namespace Model;

use Core\Model;
/**
 * CD
 * 店铺模型
 * @author: Snake.L
 */
class Shop extends Model
{
    /**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'shop_shop';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'shopname', 'address', 'telephone', 'qq', 'starthour', 'startminute', 'endhour', 'endminute');
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
}
