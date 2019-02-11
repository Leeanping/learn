<?php
namespace Model;

use Core\Model;
/**
 * 购物车模型
 * @author: Snake.L
 */
class Cart extends Model
{
    /**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'base_cart';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'uid', 'sessionid', 'type', 
							   'goodsid', 'goodsname', 'price', 'attr', 
							   'color', 'size', 'num');
    //用户表可操作表达式字段
    protected $UnsetColumu = array ();
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
    public function editCart($cartInfo, $plus = '+')
	{
		return $this->update($cartInfo, $this->_fields, $this->UnsetColumu, $plus);
	}

	public function updateCart($update)
	{
		$cart = $this->queryOne('id',array(array('sessionid', SESS_ID), array('goodsid', $update['goodsid']), array('uid', $update['uid'])));
		if($cart['id'])
		{
			$data = array(
				'id' => $cart['id'],
				'num' => $update['num']
			);
			$this->clearNoneCart();
			return $this->update($data);
		}
		else
		{
			$data = array(
				'uid' => $update['uid'],
				'num' => $update['num'],
				'sessionid' => SESS_ID,
				'goodsid' => $update['goodsid'],
				'goodsname' => $update['goodsname'],
				'attr' => $update['attr'],
				'color' => $update['color'],
				'size' => $update['size'],
				'type' => $update['type'],
				'price' => $update['price'],
			);
			$this->clearNoneCart();
			return $this->add($data);
		}
	}
	
	public function clearNoneCart()
	{
		return $this->removeall("sessionid = '" . SESS_ID . "' AND num = '0'");
	}
	
	public function clearCart()
	{
		return $this->removeall("sessionid = '" . SESS_ID . "'");
	}
	
	public function getCarts($uid)
	{
		$carts = $this->queryAll(array(array('sessionid', SESS_ID), array('uid', $uid)));
		foreach($carts AS $idx => $cart)
		{
			$carts[$idx]['amount'] = $cart['price'] * $cart['num'];
		}
		return $carts;
	}
	
	public function getCart($uid, $goodsid)
	{
		$cart = $this->queryOne('*', array(array('sessionid', SESS_ID), array('uid', $uid), array('goodsid', $goodsid)));
		$cart['amount'] = $cart['price'] * $cart['num'];
		return $cart;
	}
	
	public function getCartNum($uid)
	{
		return $this->getCount(array(array('uid', $uid), array('sessionid', SESS_ID)));
	}
	
	public function getAmount($uid)
	{
		$carts = $this->queryAll(array(array('sessionid', SESS_ID), array('uid', $uid)));
		$amount = 0;
		$amounts = array();
		$goodsid = array();
		$goodsname = array();
		$num = array();
		$type = array();
		foreach($carts AS $idx => $cart)
		{
			$amount += $cart['price'] * $cart['num'];
			array_push($goodsid, $cart['goodsid']);
			array_push($num, $cart['num']);
			array_push($type, $cart['type']);
			array_push($goodsname, $cart['goodsname']);
		}
		$amounts['amount'] = $amount;
		$amounts['goodsid'] = implode(',', $goodsid);
		$amounts['num'] = implode(',', $num);
		$amounts['type'] = implode(',', $type);
		$amounts['goodsname'] = implode(',', $goodsname);
		return $amounts;
	}
}
