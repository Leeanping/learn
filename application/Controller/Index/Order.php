<?php
namespace Controller\Index;

use Core\Controller\TAction;
/**
 * vpcvcms
 * 案例页面
 */
class Order extends TAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
	}

    public function cartAction()
    {
        $user = $this->getUser();
        $carts = M('cart')->getCarts($user['uid']);
        $total = 0;
        foreach($carts AS $cart)
        {
            $total += $cart['amount'];
        }
        $this->assign('total', $total);
        $this->assign('carts', $carts);
        $this->assign('num', count($carts));
        $this->display('order/cart.tpl');
    }

    public function checkoutAction()
    {
        $user = $this->getUser();
        $carts = M('cart')->getCarts($user['uid']);
        $this->assign('carts', $carts);
        $this->assign('num', M('cart')->getCartNum($user['uid']));
        $this->assign('amount', M('cart')->getAmount($user['uid']));
        $this->display('order/checkout.tpl');
    }

    public function addcartAction()
    {
        $user = $this->getUser();
        $goodsid = $this->getParam('goodsid');
        $type = $this->getParam('type');
        $num = $this->getParam('goodsnum');
        $color = $this->getParam('color');
        $size = $this->getParam('size');
        $attr = $this->getParam('attr');
        $data = array(
            'uid' => $user['uid'],
            'goodsid' => $goodsid,
            'goodsname' => M('goods')->getOneById('goodsname', $goodsid),
            'type' => $type,
            'price' => M('goods')->getOneById('price', $goodsid),
            'num' => $num,
            'attr' => $attr,
            'color' => $color,
            'size' => $size
        );
        $cart = M('cart')->updateCart($data);
        if($cart)
        {
            $arr['msg'] = 1;
        }
        else
        {
            $arr['msg'] = 0;
        }
        echo \Core\Fun::array2json($arr);
    }

    public function changenumAction()
    {
        if(!\Core\Fun::isAjax())
        {
            $arr['msg'] = 0;
        }
        else
        {
            $user = $this->getUser();
            $goodsid = $this->getParam('goodsid');
            $num = $this->getParam('num');
            $update = array(
                'uid' => $user['uid'],
                'goodsid' => $goodsid,
                'num' => $num
            );
            $cart = M('cart')->updateCart($update);
            if($cart)
            {
                $cart = M('cart')->getCart($user['uid'], $goodsid);
                $arr['msg'] = 1;
                $arr['amount'] = $cart['amount'];
            }
            else
            {
                $arr['msg'] = 0;
            }
        }
        echo \Core\Fun::array2json($arr);
    }

    public function trashAction()
    {
        if(!\Core\Fun::isAjax())
        {
            $arr['msg'] = 0;
        }
        else
        {
            $id = $this->getParam('id');
            $cart = M('cart')->remove($id);
            if($cart)
            {
                $arr['msg'] = 1;
            }
            else
            {
                $arr['msg'] = 0;
            }
        }
        echo \Core\Fun::array2json($arr);
    }

    public function payAction()
    {
        $user = $this->getUser();
        $time = CURTIME;
        $carts = C::M('cart')->getCarts($user['uid']);
        $ordersn = \Core\Fun::getOrdersn();
        if($carts)
        {
            $ordercarts = M('cart')->getAmount($user['uid']);
            $data = array(
                'uid' => $user['uid'],
                'goodsid' => $ordercarts['goodsid'],
                'goodsname' => $ordercarts['goodsname'],
                'type' => $ordercarts['type'],
                'num' => $ordercarts['num'],
                'ordersn' => $ordersn,
                'amount' => $ordercarts['amount'],
                'addtime' => $time,
                'status' => 1
            );
            $orderid = M('order')->add($data);
            foreach($carts AS $cart)
            {
                $amount = $cart['price'] * $cart['num'];
                if($orderid > 0)
                {
                    $goods = array(
                        'goodsid' => $cart['goodsid'],
                        'orderid' => $orderid,
                        'goodsname' => M('goods')->getOneById('goodsname', $cart['goodsid']),
                        'marketprice' => M('goods')->getOneById('marketprice', $cart['goodsid']),
                        'price' => $cart['price'],
                        'attr' => $cart['attr'],
                        'color' => $cart['color'],
                        'size' => $cart['size'],
                        'num' => $cart['num'],
                        'amount' => $amount,
                        'addtime' => $time
                    );
                    M('ordergoods')->add($goods);
                }
            }
            M('cart')->clearCart();
            $arr['msg'] = 1;
            $arr['orderid'] = $orderid;
            $arr['amount'] = $ordercarts['amount'];
        }
        else
        {
            $arr['msg'] = 0;
        }
        echo \Core\Fun::array2json($arr);
    }
    
    public function paymentAction()
    {
        $user = $this->getUser();
        $orderid = $this->getParam('orderid');
        $amount = $this->getParam('amount');
        $order = M('order')->find($orderid);
        if(!$order)
            $this->showmsg('该订单不存在', 'order/my');
        if($amount != $order['amount'])
            $this->showmsg('你的订单存在安全风险，请重新支付', 'order/payment/orderid/' . $order['id'] . '/amount/' . $order['amount']);
        if($order['addtime'] + (3600 * 24) < CURTIME)
        {
            M('order')->update(array(
                'id' => $order['id'],
                'status' => -1
            ));
            $this->showmsg('该订单已过期，请重新下单');
        }
        $this->assign('amount', $amount);
        $this->assign('order', $order);
        $this->assign('count', M('ordergoods')->getCount(array(array('orderid', $order['id']))));
        $this->display('order/pay.tpl');
    }
}