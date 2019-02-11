<?php
namespace Controller\Wap;

use Core\Controller\WapAction;
/**
 * vpcvcms
 * 购买控制器
 */
class Order extends WapAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
	}
	
	public function indexAction()
	{
		exit('None');
	}
	
	public function buyAction()
	{
		$id = $this->getParam('id');
		$buytype = $this->getParam('buytype');
		$user = $this->getUser();
		if(!$user['uid'])
			$this->showmsg('', 'wap/u/login?refer=' . \Core\Fun::iurlencode(\Core\Fun::getPathroot() . 'wap/order/buy/id/' . $id . '/buytype/' . $buytype), 0);
		if(!$id || !$buytype)
			$this->showmsg('不要提交未知订单', 'wap');
		if($buytype == 'course')
		{
			$cart = M('course')->find($id);
			$cart['title'] = $cart['coursename'];
		}
		else
		{
			$cart = M('event')->find($id);
			$cart['title'] = $cart['eventname'];
		}
		
		$this->assign('cart', $cart);
		$this->assign('buytype', $buytype);
		$this->assign('curr', '订单');
		$this->assign('ac', 'order');
		$this->assign('stowid', $id);
		$this->assign('stowtype', $buytype);
		$this->assign('stowtitle', $cart['title']);
		$this->display('wap/buy.tpl');
	}
	
	public function payAction()
	{
		include ROOT . "WxPayPubHelper"."/WxPayPubHelper.php";
		$ordersn = $this->getParam('ordersn');
		$order = M('order')->getOrderByOrderSn($ordersn);
		if(!$order['id'])
			$this->showmsg('该订单不存在', 'wap');
		$jsApi = new \JsApi_pub();
		
		$out_trade_no = $ordersn;
		$money = $order['amount'] * 100;
		if (!isset($_GET['code']))
		{
			//触发微信返回code码
			$rurl = 'http://zye.stoneren.cn/wap/order/pay/ordersn/' . $out_trade_no;
			$url = $jsApi->createOauthUrlForCode($rurl);
			header("Location: $url"); 
		}else
		{
			//获取code码，以获取openid
			$code = $_GET['code'];
			$jsApi->setCode($code);
			$openid = $jsApi->getOpenId();
		}

		$unifiedOrder = new \UnifiedOrder_pub();
		$unifiedOrder->setParameter("openid", "$openid");//商品描述
		$unifiedOrder->setParameter("body", 'wm');//商品描述
		//自定义订单号，此处仅作举例
		$timeStamp = time();
		//$out_trade_no = WxPayConf_pub::APPID."$timeStamp";
		$unifiedOrder->setParameter("out_trade_no", "$out_trade_no");//商户订单号 
		$unifiedOrder->setParameter("total_fee", "$money");//总金额
		$unifiedOrder->setParameter("notify_url", WxPayConf_pub::NOTIFY_URL);//通知地址 
		$unifiedOrder->setParameter("trade_type", "JSAPI");//交易类型
		
		$prepay_id = $unifiedOrder->getPrepayId();
		//=========步骤3：使用jsapi调起支付============
		$jsApi->setPrepayId($prepay_id);
	
		$jsApiParameters = $jsApi->getParameters();
		$this->assign('jsApiParameters', $jsApiParameters);
		$this->assign('ordersn', $ordersn);
		$this->assign('money', $money);
		$this->assign('order', $order);
		$this->display('wap/pay.tpl');
	}
	
	public function notifyAction()
	{
		include ROOT . "WxPayPubHelper"."/WxPayPubHelper.php";
		include ROOT . "WxPayPubHelper"."/log_.php";
		$notify = new \Notify_pub();

		//存储微信的回调
		$xml = $GLOBALS['HTTP_RAW_POST_DATA'];
		$notify->saveData($xml);
		if($notify->checkSign() == FALSE){
			$notify->setReturnParameter("return_code","FAIL");//返回状态码
			$notify->setReturnParameter("return_msg","签名失败");//返回信息
		}else{
			$notify->setReturnParameter("return_code","SUCCESS");//设置返回码
		}

		if($notify->checkSign() == TRUE)
		{
			if ($notify->data["return_code"] == "SUCCESS")
			{
				$out_trade_no = $notify->data["out_trade_no"];
				$order = M('order')->getOrderByOrderSn($out_trade_no);
				if(!$order['id'])
					exit;
				if($order['state'] == 1)
					exit;
				$data = array(
					'ordersn' => $out_trade_no,
					'state' => 1
				);
				
				M('order')->updateByOrderSn($data);
			}
		}
	}
	
	public function successAction()
	{
		$ordersn = $this->getParam('ordersn');
		$order = M('order')->getOrderByOrderSn($ordersn);
		/*$telephone = M('order')->getTelephoneByOrganId($order['organid']);
		$smsuser = Core_Config::get('smsuser', 'third', '');
		$smspwd = Core_Config::get('smspwd', 'third', '');
		$url = "http://114.113.154.5/smsJson.aspx";
		$buytype = $order['buytype'] == 'course' ? '课程：' : '活动：';
		$params = array(
			'action' => 'send',
			'userid' => '4030',
			'account' => $smsuser,
			'password' => strtoupper(md5($smspwd)),
			'mobile' => $telephone,
			'content' => "您的" . $buytype . "[" . $order['goodsname'] . "]已经有人报名,请查看【优学网】"
		);
		Core_Lib_Curl::makeRequest($url, $params);*/
		$this->showmsg('支付成功', 'wap/home/order');
	}

	public function cancelAction()
	{
		$orderid = $this->getParam('orderid');
		$data = array(
			'id' => $orderid,
			'state' => 3
		);
		M('order')->update($data);
		$this->showmsg('支付超时', 'wap/home/order');
	}

	public function bookingAction()
	{
		$step = $this->getParam('step');
		$orderid = $this->getParam('orderid');
		$order = M('order')->find($orderid);
		$weeks  = array('周日','周一','周二','周三','周四','周五','周六');
		$week = \Core\Fun::date('w', $order['booktime']);
		$order['week'] = $weeks[$week];
		if($step == 3)
		{
			$cat = M('category')->find($order['catid']);
			$cat['i'] = $this->getCatPic($order['catid']);
			$this->assign('cat', $cat);
			$this->assign('shopname', $order['shopname']);
		}
		elseif($step == 4)
		{
			$this->assign('calendar', \Core\Comm\Calendarwap::display('', '', $orderid));
			$this->assign('shopname', $order['shopname']);
		}
		elseif($step == 5)
		{
			$this->assign('timestr', \Core\Comm\Calendarwap::displayTime($order['shopid']));
		}
		$this->assign('order', $order);
		$this->assign('orderid', $orderid);
		$this->display('wap/order_step_' . $step . '.tpl');
	}

	public function doneAction()
	{
		$step = $this->getParam('step');
		if($step == 1)
		{
			$ordersn = \Core\Fun::getOrdersn('wm');
			$shopid = $this->getParam('shopid');
			$shopname = M('shop')->getOneById('shopname', $shopid);
			$data = array(
				'ordersn' => $ordersn,
				'shopid' => $shopid,
				'shopname' => $shopname,
				'state' => 0,
				'ip' => \Core\Comm\Util::getClientIp()
			);
			$orderid = M('order')->add($data);
			if($orderid)
			{
				$this->showmsg('', 'wap/order/booking/step/2/orderid/' . $orderid, 0);
			}
			else
			{
				$this->showmsg('订单提交出错,请重新填写...', 'wap/order/booking/step/1');
			}
		}
		elseif($step == 2)
		{
			$orderid = $this->getParam('orderid');
			$catid = $this->getParam('catid');
			$price = M('category')->getOneById('price', $catid);
			$data = array(
				'id' => $orderid,
				'catid' => $catid,
				'price' => $price,
				'num' => 1,
				'amount' => $price * 1
			);
			if(M('order')->update($data))
			{
				$this->showmsg('', 'wap/order/booking/step/3/orderid/' . $orderid, 0);
			}
			else
			{
				$this->showmsg('订单提交出错,请重新填写...', 'wap/order/booking/step/2/orderid' . $orderid);
			}
		}
		elseif($step == 4)
		{
			$orderid = $this->getParam('orderid');
			$date = $this->getParam('date');
			$data = array(
				'id' => $orderid,
				'booktime' => $date
			);
			if(M('order')->update($data))
			{
				$this->showmsg('', 'wap/order/booking/step/5/orderid/' . $orderid, 0);
			}
			else
			{
				$this->showmsg('订单提交出错,请重新填写...', 'wap/order/booking/step/4/orderid' . $orderid);
			}
		}
		elseif($step == 5)
		{
			$orderid = $this->getParam('orderid');
			$time = $this->getParam('time');
			$hour = substr($time, 0, 2);
			$minute = substr($time, -2);
			$data = array(
				'id' => $orderid,
				'hour' => $hour,
				'minute' => $minute
			);
			if(M('order')->update($data))
			{
				$this->showmsg('', 'wap/order/booking/step/6/orderid/' . $orderid, 0);
			}
			else
			{
				$this->showmsg('订单提交出错,请重新填写...', 'wap/order/booking/step/5/orderid' . $orderid);
			}
		}
		elseif($step == 6)
		{
			$orderid = $this->getParam('orderid');
			$ordersn = M('order')->getOneById('ordersn', $orderid);
			$realname = $this->getParam('realname');
			$sex = $this->getParam('sex');
			$telephone = $this->getParam('telephone');
			$email = $this->getParam('email');
			$data = array(
				'id' => $orderid,
				'realname' => $realname,
				'telephone' => $telephone,
				'email' => $email,
				'sex' => $sex,
				'state' => 2, //0 未提交 1 已完成 2 已提交，未支付 3取消
				'addtime' => \Core\Fun::time()
			);
			if(M('order')->update($data))
			{
				$this->showmsg('', 'wap/order/pay/ordersn/' . $ordersn, 0);
			}
			else
			{
				$this->showmsg('订单提交出错,请重新填写...', 'wap/order/booking/step/6/orderid' . $orderid);
			}
		}
	}

	private function getCatPic($catid)
	{
		$pics = array(
			'16' => 1,
			'17' => 2,
			'18' => 3,
			'19' => 4,
			'20' => 5,
			'21' => 6
		);

		return $pics[$catid];
	}
}