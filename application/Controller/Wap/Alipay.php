<?php
namespace Controller\Wap;

use Core\Controller\WapAction;
/*
 * return
 * Snake.L
 */
class alipay extends WapAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
	}
	
	public function indexAction()
	{
		die('错误操作');
	}
	
	public function returnurlAction()
	{
		require_once(ROOT . "alipay/alipay.config.php");
		require_once(ROOT . "alipay/lib/alipay_notify.class.php");
		$alipayNotify = new \AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyReturn();
		if($verify_result)
		{
			$out_trade_no = $this->getParam('out_trade_no');

			//支付宝交易号

			$trade_no = $this->getParam('trade_no');

			//交易状态
			$trade_status = $this->getParam('trade_status');
			
			if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') 
			{
				$payuid = M('record')->getOne('uid', array(array('ordersn', $out_trade_no)));
				$type = M('record')->getOne('type', array(array('ordersn', $out_trade_no)));
				$money = M('record')->getOne('money', array(array('ordersn', $out_trade_no)));
				if($type == '充值')
				{
					$data = array(
						'payordersn' => $trade_no,
						'status' => 1
					);
					M('record')->updateall("ordersn = '$out_trade_no'", $data);
					
					M('User_Log')->addLog(array(
						'uid' => $payuid,
						'type' => '充值',
						'honor' => $money,
						'loginfo' => '成功充值' . $money . '元'
					));
					$honor = M('User_Member')->getInfoByUid('honor', $payuid);
					M('User_Member')->editUserInfo(array(
						'uid' => $payuid,
						'honor' => $honor + $money
					));
				}
				elseif($type == '购买')
				{
					$data = array(
						'payordersn' => $trade_no,
						'status' => 1
					);
					M('record')->updateall("ordersn = '$out_trade_no'", $data);
					M('shoporder')->updateall("ordersn = '$out_trade_no'", array(
						'status' => 1
					));
					M('User_Log')->addLog(array(
						'uid' => $payuid,
						'type' => '购买',
						'honor' => $money,
						'loginfo' => '成功购买商品' . $money . '元'
					));
				}
				elseif($type == '购买花型')
				{
					$data = array(
						'payordersn' => $trade_no,
						'status' => 1
					);
					M('record')->updateall("ordersn = '$out_trade_no'", $data);
					M('studioorder')->updateall("ordersn = '$out_trade_no'", array(
						'status' => 1
					));
					M('User_Log')->addLog(array(
						'uid' => $payuid,
						'type' => '购买花型',
						'honor' => $money,
						'loginfo' => '成功购买商品' . $money . '元'
					));
				}
				if($type == '购买花型')
				{
					$id = M('studioorder')->getOne('goodsid', array(array('ordersn', $out_trade_no)));
					$this->showmsg('', 'wap/design/buy/id/' . $id . '/ordersn/' . $out_trade_no, 0);
				}
				else
				{
					$this->display('wap/success.tpl');
				}
			}
			else {
			  echo "支付未成功";
			}
		}
	}
	
	public function notifyurlAction()
	{
		require_once(ROOT . "alipay/alipay.config.php");
		require_once(ROOT . "alipay/lib/alipay_notify.class.php");
		$alipayNotify = new \AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyNotify();
		if($verify_result) 
		{
			$out_trade_no = $this->getParam('out_trade_no');

			//支付宝交易号

			$trade_no = $this->getParam('trade_no');

			//交易状态
			$trade_status = $this->getParam('trade_status');
			if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') 
			{
				$payuid = M('record')->getOne('uid', array(array('ordersn', $out_trade_no)));
				$type = M('record')->getOne('type', array(array('ordersn', $out_trade_no)));
				$money = M('record')->getOne('money', array(array('ordersn', $out_trade_no)));
				if($type == '充值')
				{
					$data = array(
						'payordersn' => $trade_no,
						'status' => 1
					);
					M('record')->updateall("ordersn = '$out_trade_no'", $data);
					
					M('User_Log')->addLog(array(
						'uid' => $payuid,
						'type' => '充值',
						'honor' => $money,
						'loginfo' => '成功充值' . $money . '元'
					));
					$honor = M('User_Member')->getInfoByUid('honor', $payuid);
					M('User_Member')->editUserInfo(array(
						'uid' => $payuid,
						'honor' => $honor + $money
					));
				}
				elseif($type == '购买')
				{
					$data = array(
						'payordersn' => $trade_no,
						'status' => 1
					);
					M('record')->updateall("ordersn = '$out_trade_no'", $data);
					M('shoporder')->updateall("ordersn = '$out_trade_no'", array(
						'status' => 1
					));
					M('User_Log')->addLog(array(
						'uid' => $payuid,
						'type' => '购买',
						'honor' => $money,
						'loginfo' => '成功购买商品' . $money . '元'
					));
				}
				elseif($type == '购买花型')
				{
					$data = array(
						'payordersn' => $trade_no,
						'status' => 1
					);
					M('record')->updateall("ordersn = '$out_trade_no'", $data);
					M('studioorder')->updateall("ordersn = '$out_trade_no'", array(
						'status' => 1
					));
					M('User_Log')->addLog(array(
						'uid' => $payuid,
						'type' => '购买花型',
						'honor' => $money,
						'loginfo' => '成功购买商品' . $money . '元'
					));
				}
				if($type == '购买花型')
				{
					$id = M('studioorder')->getOne('goodsid', array(array('ordersn', $out_trade_no)));
					$arr['url'] = 'wap/design/buy/id/' . $id . '/ordersn/' . $out_trade_no;
				}
			}
			$arr['msg'] = "success";
		}
		else
		{
			$arr['msg'] = "fail";
		}
		echo \Core\Fun::array2json($arr);
	}
}