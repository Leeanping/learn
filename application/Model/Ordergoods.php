<?php
namespace Model;

use Core\Model;
/**
 * 订单模型
 * @author: Snake.L
 */
class Ordergoods extends Model
{
    /**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'order_goods';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'orderid', 'goodsid', 'goodsname', 'marketprice', 
	                           'price', 'attr', 'color', 'size', 'num', 'amount', 'addtime',
							   'isfeed');
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function getOrderGoods($orderid)
	{
		$goods = $this->queryAll(array(array('orderid', $orderid)));
		foreach($goods AS $idx => $good)
		{
			$goods[$idx]['goodspic'] = M('goods')->getOneById('goodspic', $good['goodsid']);
		}
		return $goods;
	}
}
