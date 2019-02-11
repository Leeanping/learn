<?php
namespace Controller\Wap;

use Core\Controller\WapAction;
/**
 * vpcvcms
 * 手机首页
 */
class Home extends WapAction
{
	private $_cUser;
	public function preDispatch() 
	{
        parent::preDispatch();
		$user = $this->getUser();
		$this->_cUser = $user;
	}
    public function indexAction()
    {
		$this->display('wap/home.tpl');
    }
	
    public function orderAction()
    {
    	$where = array(array(
    		'uid' => $this->_cUser['uid']
    	));

    	$orders = M('order')->queryAll($where, 'addtime DESC');
    }

	public function profileAction()
	{
		$this->display('wap/profile.tpl');
	}
	
	public function passwordAction()
	{
		$uid = $this->_cUser['uid'];
		$user = M('User_Member')->getUserInfoByUid(intval($uid));
		$oldpwd = trim($this->getParam('oldpwd'));
		$password = trim($this->getParam('password'));
		$pwdconfirm = trim($this->getParam('pwdconfirm'));
		
		if(! \Model\User\Validator::checkPassword($password))
		{
			$arr['msg'] = 0;
			$arr['html'] = '密码为3~15位字符';
		}
		elseif($password != $pwdconfirm)
		{
			$arr['msg'] = 0;
			$arr['html'] = '两次密码不一致';
		}
		elseif(! M('User_Member')->checkUserOldPassword($user['username'], $oldpwd))
		{
			$arr['msg'] = 0;
			$arr['html'] = '旧密码不正确';
		}
		else
		{
			$conditions['uid'] = intval($uid);
			$conditions['salt'] = M('User_Member')->getSalt();
			$conditions['password'] = M('User_Member')->formatPassword($password, $conditions['salt']);
			//将密码更新到数据库
			if(M('User_Member')->editUserInfo($conditions))
			{
				$arr['msg'] = 1;
			}
			else
			{
				$arr['msg'] = 0;
				$arr['html'] = '密码修改失败';
			}
		}
		
		echo \Core\Fun::array2json($arr);
	}
	
	public function infoAction()
	{
		$uid = $this->_cUser['uid'];
		$realname = trim($this->getParam('realname'));
		
		$conditions['uid'] = intval($uid);
		$conditions['realname'] = $realname;

		if(M('User_Member')->editUserInfo($conditions))
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
			$arr['html'] = '昵称修改失败';
		}
		
		echo \Core\Fun::array2json($arr);
	}
	
	public function telephoneAction()
	{
		$uid = $this->_cUser['uid'];
		$telephone = trim($this->getParam('telephone'));
		$uvalid = trim($this->getParam('valid'));
		
		$uvalid = strtolower($uvalid);
		$valid = M('Base_Valid')->getValidInfoByTelephoneAndType($telephone, 'new');
		$sign = strtolower($valid['sign']);
		if($sign != $uvalid)
		{
			$arr['msg'] = -1;
			$arr['html'] = '验证码不正确';
		}
		else
		{
			$conditions['uid'] = intval($uid);
			$conditions['username'] = $telephone;
			$conditions['telephone'] = $telephone;
			if(M('User_Member')->editUserInfo($conditions))
			{
				$arr['msg'] = 1;
			}
			else
			{
				$arr['msg'] = 0;
				$arr['html'] = '手机号修改失败';
			}
		}
		
		echo \Core\Fun::array2json($arr);
	}
	
	public function organAction()
	{
		$uid = $this->_cUser['uid'];
		$action = $this->getParam('action');
		if($action && $action == 'organ')
		{
			$district = $this->getParam('district');
			$road = $this->getParam('road');
			$address = $this->getParam('address');
			$geo = \Core\Comm\Area::getLngLat('北京市' . $district . $road . $address);
			$catid = $this->getParam('catid');
			$catarr = M('category')->getParendIds($catid);
			$data = array(
				'uid' => $uid,
				'catid' => $catid,
				'catarr' => $catarr,
				'manager' => $this->getParam('manager'),
				'telephone' => $this->getParam('telephone'),
				'organname' => $this->getParam('organname'),
				'district' => $district,
				'road' => $road,
				'address' => $address,
				'lng' => $geo['lng'],
				'lat' => $geo['lat'],
				'brief' => $this->getParam('brief')
			);
			
			if('' != $_FILES['organpic']['tmp_name'])
			{
				$fileUrl = \Core\Util\Upload::upload('organpic', '/organ', 'jpg,jpeg,png,gif,JPG,JPEG', false, false, false);
				$data['organpic'] = $fileUrl['link'];			
			}
			if('' != $_FILES['markpic']['tmp_name'])
			{
				$fileUrl = \Core\Util\Upload::upload('markpic', '/mark', 'jpg,jpeg,png,gif,JPG,JPEG', false, false, false);
				$data['markpic'] = $fileUrl['link'];			
			}
			if('' != $_FILES['qrcode']['tmp_name'])
			{
				$fileUrl = \Core\Util\Upload::upload('qrcode', '/qrcode', 'jpg,jpeg,png,gif,JPG,JPEG', false, false, false);
				$data['qrcode'] = $fileUrl['link'];			
			}
			if(M('organ')->addOrgan($data))
			{
				$this->showmsg('机构更新成功', 'wap/home');
			}
			else
			{
				$this->showmsg('机构更新失败', 'wap/home/organ');
			}
		}
		else
		{
			$organ = M('organ')->getOrganByUid($uid);
			$districts = M('region')->getRegionList(52);
			$catlist = M('category')->getCategoryTree(0, 2, $organ['catid'], '--');
			$this->assign('catlist', $catlist);
			$this->assign('districts', $districts);
			$this->assign('organ', $organ);
			$this->display('wap/organ.tpl');
		}
	}
	
	public function getprovinceAction()
    {
		$pid = $this->getParam('pid');
		$pid = $pid ? $pid : 52;
    	$provinces = M('region')->getRegionList($pid);
    	if(!empty($provinces))
    	{
			foreach ($provinces as $key => $value)
	    	{
	    		$list[$value['id']] = $value['regionname'];
	    	}
	    	echo json_encode($list);
    	}
    }
	
	public function courseAction()
	{
		$uid = $this->_cUser['uid'];
		$catid = $this->getParam('catid');
		$status = $this->getParam('status');
		$time = \Core\Fun::time();
		$where = " WHERE a.uid = '$uid' AND a.state = '1' AND a.buytype = 'course'";
		$conditions = array();
		if($catid)
		{
			$where .= " AND FIND_IN_SET('$catid', b.catarr)";
			$conditions['catid'] = $catid;
			$this->assign('catname', M('category')->getCatNameByCatId($catid));
		}
		if($status && $status == 1)
		{
			$where .= " AND b.enddate >= '$time'";
			$conditions['status'] = 1;
			$this->assign('status', '进行中');
		}
		elseif($status && $status == 2)
		{
			$where .= " AND b.enddate < '$time'";
			$conditions['status'] = 2;
			$this->assign('status', '已结业');
		}else
		{
		}
		
		$numsql = "SELECT count(*) as dd FROM ##__order_order AS a LEFT JOIN ##__course_course AS b ON a.goodsid = b.id" . $where;
		$Num = \Core\Db::fetchOne($numsql);
		$Num = $Num['dd'];
		
		$_orderby = "a.addtime DESC";

		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str ($conditions, '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/home/course' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$sql = "SELECT a.goodsid,b.* FROM ##__order_order AS a LEFT JOIN ##__course_course AS b ON a.goodsid = b.id" . $where . ' ORDER BY ' . $_orderby . " LIMIT " . $perpage * ($curpage - 1) . ',' . $perpage;
		$orders = Core_Db::fetchAll($sql);
		foreach($orders AS $idx => $order)
		{
			$orders[$idx]['organname'] = M('organ')->getOrganIdByUid($order['uid'], 'organname');
			$orders[$idx]['location'] = \Core\Comm\Util::getLocation('', '', $order['district'], $order['road']);
		}
		
        $this->assign ('multipage', $multipage);
		$this->assign('orders', $orders);
		$this->assign('conditions', $conditions);
		$this->assign('curr', '我的课程');
		$this->assign('oc', 'article');
		$this->display('wap/mycourse.tpl');
	}
	
	public function eventAction()
	{
		$uid = $this->_cUser['uid'];
		$catid = $this->getParam('catid');
		$status = $this->getParam('status');
		$time = \Core\Fun::time();
		$where = " WHERE a.uid = '$uid' AND a.state = '1' AND a.buytype = 'event'";
		$conditions = array();
		if($catid)
		{
			$where .= " AND FIND_IN_SET('$catid', b.catarr)";
			$conditions['catid'] = $catid;
			$this->assign('catname', M('category')->getCatNameByCatId($catid));
		}
		if($status && $status == 1)
		{
			$where .= " AND b.endtime >= '$time'";
			$conditions['status'] = 1;
			$this->assign('status', '进行中');
		}
		elseif($status && $status == 2)
		{
			$where .= " AND b.endtime < '$time'";
			$conditions['status'] = 2;
			$this->assign('status', '已结束');
		}else
		{
		}
		
		$numsql = "SELECT count(*) as dd FROM ##__order_order AS a LEFT JOIN ##__event_event AS b ON a.goodsid = b.id" . $where;
		$Num = \Core\Db::fetchOne($numsql);
		$Num = $Num['dd'];
		
		$_orderby = "a.addtime DESC";

		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str ($conditions, '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/home/event' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$sql = "SELECT a.goodsid,b.* FROM ##__order_order AS a LEFT JOIN ##__event_event AS b ON a.goodsid = b.id" . $where . ' ORDER BY ' . $_orderby . " LIMIT " . $perpage * ($curpage - 1) . ',' . $perpage;
		$orders = \Core\Db::fetchAll($sql);
		foreach($orders AS $idx => $order)
		{
			$orders[$idx]['organname'] = M('organ')->getOrganIdByUid($order['uid'], 'organname');
			$orders[$idx]['location'] = \Core\Comm\Util::getLocation('', '', $order['district'], $order['road']);
		}
		
        $this->assign ('multipage', $multipage);
		$this->assign('orders', $orders);
		$this->assign('conditions', $conditions);
		$this->assign('curr', '我的活动');
		$this->assign('oc', 'article');
		$this->display('wap/myevent.tpl');
	}
	
	public function bbsAction()
	{
		$uid = $this->_cUser['uid'];
		$where = array(array('uid', $uid), array('isfirst', 1), array('useable', 1));

		$_orderby = "addtime DESC";
		
		$Num = M('topicpost')->getCount($where);
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/home/bbs' . $topicid . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$topics = M('topicpost')->queryAll($where, 'addtime DESC', array($perpage, $perpage * ($curpage - 1)));
		foreach($topics AS $idx => $topic)
		{
			$username = M('User_Member')->getInfoByUid('username', $topic['uid']);
			$topics[$idx]['username'] = substr($username, 0, 3) . '****' . substr($username, 7, 4);
			$topics[$idx]['attachs'] = explode(',', $topic['attachlist']);
			$topics[$idx]['isbest'] = M('topicbest')->isBest($topic['uid'], $topic['id']);
		}
		
		//微信分享
		if($_SESSION['wx_token'])
		{
			$token = $_SESSION['wx_token'];
		}
		else
		{
			$res = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxc4768891362c9df0&secret=f665dbae36ab38c6ce2c2ef894fc24cf');
			$res = json_decode($res, true);
			$token = $res['access_token'];
			$_SESSION['wx_token'] = $token;
		}
		
		if($_SESSION['wx_ticket'])
		{
			$ticket = $_SESSION['wx_ticket'];
		}
		else
		{
			$url2 = sprintf("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=%s&type=jsapi", $token);
			$res2 = file_get_contents($url2);
        	$res2 = json_decode($res2, true);
        	$ticket = $res2['ticket'];
			$_SESSION['wx_ticket'] = $ticket;
		}

		$timestamp = \Core\Fun::time();
		$wxnonceStr = "9A0A8659F005D6984697E2CA0A9C8888";
		$wxOri = sprintf("jsapi_ticket=%s&noncestr=%s&timestamp=%s&url=%s",
                $ticket, $wxnonceStr, $timestamp,
                \Core\Fun::getPathroot() . 'wap/find/topicshow?' . $_SERVER['QUERY_STRING']
                );
		$wxSha1 = sha1($wxOri);
		
		$this->assign('timestamp', $timestamp);
		$this->assign('wxnonceStr', $wxnonceStr);
		$this->assign('wxSha1', $wxSha1);
		
		$this->assign('topics', $topics);
		$this->assign ('multipage', $multipage);
		$this->assign('curr', '我的帖子');
		$this->assign('oc', 'article');
		$this->display('wap/mybbs.tpl');
	}
	
	public function feedAction()
	{
		$uid = $this->_cUser['uid'];
		$where = array(array('uid', $uid), array('status', 1), array('type', 'active', '!='));

		$_orderby = "addtime DESC";
		
		$Num = M('feedback')->getCount($where);
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/home/feed' . $topicid . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$feeds = M('feedback')->queryAll($where, 'addtime DESC', array($perpage, $perpage * ($curpage - 1)));
		foreach($feeds AS $idx => $feed)
		{
			$headpic = M('User_Member')->getInfoByUid('headpic50', $feed['uid']);
			$realname = M('User_Member')->getInfoByUid('realname', $feed['uid']);
			$headpic = $headpic ? $headpic : \Core\Fun::getPathroot() . 'resource/images/user_head_img.gif';
			$realname = $realname ? $realname : '匿名';
			$score = M('feedback')->formatScore($feed['score']);
			$feeds[$idx]['headpic'] = $headpic;
			$feeds[$idx]['realname'] = $realname;
			$feeds[$idx]['score'] = $score;
		}
		
		$this->assign('feeds', $feeds);
		$this->assign ('multipage', $multipage);
		$this->assign('curr', '我的点评');
		$this->assign('oc', 'article');
		$this->display('wap/myfeed.tpl');
	}
	
	public function scoreAction()
	{
		$uid = $this->_cUser['uid'];
		$where = array(array('uid', $uid));
		$Num = M('sign')->getCount($where);
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/find/sign' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$signs = M('sign')->queryAll($where, 'addtime DESC', array($perpage, $perpage * ($curpage - 1)));
		foreach($signs AS $idx => $sign)
		{
			$signs[$idx]['times'] = \Core\Util\Tutil::tTimeFormat($sign['addtime']);
		}
		$this->assign('multipage', $multipage);
		$this->assign('signs', $signs);
		$this->assign('curr', '我的积分');
		$this->assign('oc', 'article');
		$this->display('wap/myscore.tpl');
	}
	
	public function dfeedAction()
	{
		$uid = $this->_cUser['uid'];
		$where = array(array('uid', $uid), array('state', 1));
		$orders = M('order')->queryAll($where, 'addtime DESC');
		$arr = array();
		foreach($orders AS $idx => $order)
		{
			if(!M('feedback')->isFeedBack($order['uid'], $order['goodsid'], $order['buytype']))
			{
				if($order['buytype'] == 'course')
				{
					$good = M('course')->getCourseById($order['goodsid']);
					$good['title'] = $good['coursename'];
					$good['pic'] = $good['coursepic'];
				}
				else
				{
					$good = M('event')->getEventById($order['goodsid']);
					$good['title'] = $good['eventname'];
					$good['pic'] = $good['eventpic'];
				}
				if($good['title'])
				{
					$arr[$idx]['buytype'] = $order['buytype'];
					$arr[$idx]['goodsid'] = $order['goodsid'];
					$arr[$idx]['good'] = $good;
				}
			}
		}
		$this->assign('arrs', $arr);
		$this->assign('curr', '待评价');
		$this->assign('oc', 'article');
		$this->display('wap/mydfeed.tpl');
	}
	
	public function payAction()
	{
		$uid = $this->_cUser['uid'];
		$where = array(array('uid', $uid), array('state', 2));
		$Num = M('order')->getCount($where);
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/home/pay' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$orders = M('order')->queryAll($where, 'addtime DESC', array($perpage, $perpage * ($curpage - 1)));
		$this->assign('multipage', $multipage);
		$this->assign('orders', $orders);
		$this->assign('curr', '待支付');
		$this->assign('oc', 'article');
		$this->display('wap/mypay.tpl');
	}
	
	public function stowAction()
	{
		$uid = $this->_cUser['uid'];
		$where = array(array('uid', $uid), array('useable', 1));

		$_orderby = "addtime DESC";
		
		$Num = M('stow')->getCount($where);
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/home/stow' . $topicid . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$stows = M('stow')->queryAll($where, 'addtime DESC', array($perpage, $perpage * ($curpage - 1)));
		foreach($stows AS $idx => $stow)
		{
			$headpic = M('User_Member')->getInfoByUid('headpic50', $stow['uid']);
			$realname = M('User_Member')->getInfoByUid('realname', $stow['uid']);
			$headpic = $headpic ? $headpic : \Core\Fun::getPathroot() . 'resource/images/user_head_img.gif';
			$realname = $realname ? $realname : '匿名';
			$stows[$idx]['headpic'] = $headpic;
			$stows[$idx]['realname'] = $realname;
		}
		
		$this->assign('stows', $stows);
		$this->assign ('multipage', $multipage);
		$this->assign('curr', '我的关注');
		$this->assign('oc', 'article');
		$this->display('wap/mystow.tpl');
	}
}