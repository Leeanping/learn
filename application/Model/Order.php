<?php
namespace Model;

use Core\Model;
/**
 * 订单模型
 * @author: Snake.L
 */
class Order extends Model
{
    /**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'order_order';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'ordersn', 'goodsid', 'uid', 'type', 'num', 
	                           'amount', 'payment', 'status', 'goodsname', 
							   'addtime', 'isfeed');
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function getOrder($id)
	{
		$order = $this->find($id);
		$order['count'] = M('ordergoods')->getCount(array(array('orderid', $order['id'])));
		$order['state'] = $this->getOrderStatus($order['status']);
		$order['goods'] = M('ordergoods')->getOrderGoods($order['id']);
		return $order;
	}
	
	public function getOrderStatus($status)
	{
		$statuses = array(
			'-1' => '订单取消',
			'1' => '等待付款',
			'2' => '买家已付款',
			'3' => '卖家已发货',
			'4' => '交易成功',
			'5' => '买家已收货',
			'6' => '退款订单'
		);
		return $statuses[$status];
	}
	
	public function delOrder($id)
	{
		$this->remove($id);
		M('ordergoods')->removeall("orderid = '$id'");
		return true;
	}
}
