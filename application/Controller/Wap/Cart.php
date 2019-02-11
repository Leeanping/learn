<?php
namespace Controller\Wap;

use Core\Controller\WapAction;
/**
 * vpcvcms
 * 手机首页
 */
class Cart extends WapAction
{
	private $_cUser;
	public function preDispatch() 
	{
        parent::preDispatch();
		$user = $this->getUser();
		if(!$user['uid'])
			$this->showmsg('', 'wap/u/login', 0);
		$this->_cUser = $user;
	}
    public function indexAction()
    {
		$_search = array(
			array('uid', $this->_cUser['uid'])
		);
		
		$_orderby = "addtime DESC";
		
		$Num = M('studioorder')->getCount($_search);
		
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = '/wap/cart/index';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$orders = M('studioorder')->queryAll($_search, $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($orders AS $idx => $order)
		{
			$orders[$idx]['username'] = M('User_Member')->getInfoByUid('username', $order['uid']);
		}
        $this->assign ('multipage', $multipage);
		$this->assign('orders', $orders);
		$this->display('wap/cart.tpl');
    }
	
	public function delAction()
	{
		$id = $this->getParam('id');
		if(M('studioorder')->remove($id))
		{
			$this->showmsg('删除成功', 'wap/cart');
		}
		else
		{
			$this->showmsg('删除失败', 'wap/cart');
		}
	}
	
	public function payAction()
	{
		require_once(ROOT . "alipay/alipay.config.php");
		require_once(ROOT . "alipay/lib/alipay_submit.class.php");
		$id = $this->getParam('id');
		$order = M('studioorder')->find($id);
		$user = $this->getUser();
		if(empty($order['amount']))
			$this->showmsg('金额不正确', 'wap/cart');
		
		$data = array(
			'uid' => $this->_cUser['uid'],
			'type' => '购买花型',
			'ordersn' => $order['ordersn'],
			'money' => $order['amount'],
			'status' => 0,
			'log' => '购买花型[' . $order['goodsname'] . ']' . $amount . '元',
			'addtime' => CURTIME
		);
		M('record')->add($data);
		
		$payment_type = "1";
		//服务器异步通知页面路径
		$notify_url = "http://www.bzhidao.com/wap/alipay/notifyurl";

		//页面跳转同步通知页面路径
		$return_url = "http://www.bzhidao.com/wap/alipay/returnurl";

		//卖家支付宝帐户
		$seller_email = $alipay_config['seller_email'];

		$out_trade_no = $order['ordersn'];
		//订单名称
		$subject = $order['ordersn'];
		$total_fee = $order['amount'];

		$body = '';
		$show_url = '';
		$anti_phishing_key = "";
		$exter_invoke_ip = "";
		
		$parameter = array(
				"service" => "alipay.wap.create.direct.pay.by.user",
				"partner" => trim($alipay_config['partner']),
				"seller_id" => trim($alipay_config['seller_email']),
				"payment_type"	=> $payment_type,
				"notify_url"	=> $notify_url,
				"return_url"	=> $return_url,
				"out_trade_no"	=> $out_trade_no,
				"subject"	=> $subject,
				"total_fee"	=> $total_fee,
				"show_url"	=> $show_url,
				"body"	=> $body,
				"it_b_pay"	=> $it_b_pay,
				"extern_token"	=> '',//钱包
				"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
		);

		//建立请求
		$alipaySubmit = new \AlipaySubmit($alipay_config);
		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
		echo $html_text;
	}
}