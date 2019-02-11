<?php
namespace Controller\Wap;

use Core\Controller\WapAction;
/*
 * 发现
 * snake.L
 */
class Find extends WapAction
{
	public function preDispatch()
	{
		parent::preDispatch();
		$this->assign('oc', 'article');
	}
	
	public function indexAction()
	{
		$this->assign('curr', '发现');
		$this->display('wap/find.tpl');
	}
	
	public function signAction()
	{
		$user = $this->getUser();
		if(!$user['uid'])
			$this->showmsg('', 'wap/u/login?refer=' . \Core\Fun::iurlencode(SITEURL . 'wap/find/sign'), 0);
		$where = array(array('uid', $user['uid']));
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
		$this->assign('curr', '签到');
		$this->display('wap/sign.tpl');
	}
	
	public function setsignAction()
	{
		$user = $this->getUser();
		$data = array(
			'uid' => $user['uid'],
			'score' => 5
		);
		
		if(M('sign')->addSign($data))
		{
			M('User_Member')->editUserInfo(array(
				'uid' => $user['uid'],
				'score' => 5
			));
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo \Core\Fun::array2json($arr);
	}
	
	public function friendAction()
	{
		$kind = $this->getParam('kind');
		$where = array(array('useable', 1), array('kind', $kind));
		$Num = M('findfriend')->getCount($where);
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/find/friend/kind/' . $kind . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$findfriends = M('findfriend')->queryAll($where, 'addtime DESC', array($perpage, $perpage * ($curpage - 1)));
		foreach($findfriends AS $idx => $friend)
		{
			$username = M('User_Member')->getInfoByUid('username', $friend['uid']);
			$findfriends[$idx]['username'] = substr($username, 0, 3) . '****' . substr($username, 7, 4);
			$findfriends[$idx]['location'] = \Core\Comm\Util::getLocation('', '', $friend['district'], $friend['road']);
			$findfriends[$idx]['catname'] = M('category')->getCatNameByCatId($friend['catid']);
			$findfriends[$idx]['feednum'] = M('findfriendreply')->getFeedNum($friend['id']);
			$findfriends[$idx]['headpic150'] = M('User_Member')->getInfoByUid('headpic150', $friend['uid']);
		}
		$this->assign('multipage', $multipage);
		$this->assign('findfriends', $findfriends);
		$this->assign('ac', 'friend');
		$this->assign('kind', $kind);
		$this->assign('curr', '搭伴玩');
		$this->display('wap/friend.tpl');
	}
	
	public function postfriendAction()
	{
		$user = $this->getUser();
		$kind = $this->getParam('kind');
		if(!$user['uid'])
			$this->showmsg('', 'wap/u/login?refer=' . \Core\Fun::iurlencode(SITEURL . 'wap/find/postfriend/kind/' . $kind), 0);
		$districts = M('region')->getRegionList(52);
		$catlist = M('category')->getCategoryTree(0, 2, $organ['catid'], '--');
		$this->assign('catlist', $catlist);
		$this->assign('districts', $districts);
		$this->assign('ac', 'friend');
		$this->assign('kind', $kind);
		$this->assign('curr', $kind == 1 ? '搭伴玩' : '搭伴学');
		$this->display('wap/post_friend.tpl');
	}
	
	public function freplyAction()
	{
		$id = $this->getParam('id');
		$user = $this->getUser();
		if(!$user['uid'])
			$this->showmsg('', 'wap/u/login?refer=' . \Core\Fun::iurlencode(SITEURL . 'wap/find/freply/id/' . $id), 0);
		
		$friend = M('findfriend')->find($id);
		$friend['location'] = \Core\Comm\Util::getLocation('', '', $friend['district'], $friend['road']);
		$friend['catname'] = M('category')->getCatNameByCatId($friend['catid']);
		$this->assign('friend', $friend);
		$this->assign('ac', 'friend');
		$this->assign('curr', $friend['kind'] == 1 ? '搭伴玩' : '搭伴学');
		$this->display('wap/friend_reply.tpl');
	}
	
	public function mfreplyAction()
	{
		$id = $this->getParam('id');
		$friendid = $this->getParam('friendid');
		$user = $this->getUser();
		if(!$user['uid'])
			$this->showmsg('', 'wap/u/login?refer=' . \Core\Fun::iurlencode(SITEURL . 'wap/find/mfreply/id/' . $id), 0);
		
		$reply = M('findfriendreply')->find($id);
		$friend = M('findfriend')->find($friendid);
		$this->assign('friend', $friend);
		$this->assign('reply', $reply);
		$this->assign('ac', 'friend');
		$this->assign('curr', '我的回复');
		$this->display('wap/friend_mreply.tpl');
	}
	
	public function fshowAction()
	{
		$id = $this->getParam('id');
		$friend = M('findfriend')->find($id);
		$username = M('User_Member')->getInfoByUid('username', $friend['uid']);
		$friend['username'] = substr($username, 0, 3) . '****' . substr($username, 7, 4);
		$friend['location'] = \Core\Comm\Util::getLocation('', '', $friend['district'], $friend['road']);
		$friend['catname'] = M('category')->getCatNameByCatId($friend['catid']);
		
		$where = array(array('useable', 1), array('friendid', $id), array('pid', 0));
		$Num = M('findfriendreply')->getCount($where);
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/find/fshow/id/' . $id . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$lists = M('findfriendreply')->queryAll($where, 'addtime DESC', array($perpage, $perpage * ($curpage - 1)));
		foreach($lists AS $idx => $list)
		{
			$username = M('User_Member')->getInfoByUid('username', $list['uid']);
			$lists[$idx]['username'] = substr($username, 0, 3) . '****' . substr($username, 7, 4);
			$lists[$idx]['reply'] = M('findfriendreply')->queryOne('*', array(array('pid', $list['id']), array('friendid', $id)));
			$lists[$idx]['headpic150'] = M('User_Member')->getInfoByUid('headpic150', $list['uid']);
		}
		$this->assign('multipage', $multipage);
		$this->assign('lists', $lists);
		
		$this->assign('friend', $friend);
		$this->assign('ac', 'friend');
		$this->assign('curr', '详细信息');
		$this->display('wap/friend_show.tpl');
	}
	
	public function topicAction()
	{
		$where = array(array('useable', 1));
		$Num = M('topic')->getCount($where);
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/find/topic' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$topics = M('topic')->queryAll($where, 'addtime DESC', array($perpage, $perpage * ($curpage - 1)));
		$this->assign('multipage', $multipage);
		$this->assign('topics', $topics);
		$this->assign('ac', 'topic');
		$this->assign('curr', '话题小组');
		$this->display('wap/topic.tpl');
	}
	
	public function posttopicAction()
	{
		$user = $this->getUser();
		if(!$user['uid'])
			$this->showmsg('', 'wap/u/login?refer=' . \Core\Fun::iurlencode(SITEURL . 'wap/find/posttopic'), 0);
		$this->assign('ac', 'topic');
		$this->assign('curr', '话题小组');
		$this->display('wap/post_topic.tpl');
	}
	
	public function topicshowlistAction()
	{
		$topicid = $this->getParam('topicid');
		$where = array(array('useable', 1), array('isfirst', 1));
		if($topicid)
		{
			$where[] = array('topicid', $topicid);
		}
		$Num = M('topicpost')->getCount($where);
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/find/topicshowlist/topicid/' . $topicid . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$topics = M('topicpost')->queryAll($where, 'addtime DESC', array($perpage, $perpage * ($curpage - 1)));
		foreach($topics AS $idx => $topic)
		{
			$username = M('User_Member')->getInfoByUid('username', $topic['uid']);
			$topics[$idx]['username'] = substr($username, 0, 3) . '****' . substr($username, 7, 4);
			$topics[$idx]['attachs'] = explode(',', $topic['attachlist']);
			$topics[$idx]['isbest'] = M('topicbest')->isBest($topic['uid'], $topic['id']);
			$topics[$idx]['tname'] = M('topic')->getOne('topicname', array(array('id', $topic['topicid'])));
			$topics[$idx]['headpic150'] = M('User_Member')->getInfoByUid('headpic150', $topic['uid']);
			$topics[$idx]['replynum'] = M('topicpost')->getReplyNum($topic['id']);
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
                SITEURL . 'wap/find/topicshow?' . $_SERVER['QUERY_STRING']
                );
		$wxSha1 = sha1($wxOri);
		
		$this->assign('timestamp', $timestamp);
		$this->assign('wxnonceStr', $wxnonceStr);
		$this->assign('wxSha1', $wxSha1);
		
		$this->assign('multipage', $multipage);
		$this->assign('tn', M('topic')->getOne('topicname', array(array('id', $topicid))));
		$this->assign('topics', $topics);
		$this->assign('ac', 'topic');
		$this->assign('curr', '话题小组');
		$this->assign('topicid', $topicid);
		$this->display('wap/topicshowlist.tpl');
	}
	
	public function topicshowAction()
	{
		$topicid = $this->getParam('topicid');
		$where = array(array('useable', 1), array('isfirst', 1));
		if($topicid)
		{
			$where[] = array('topicid', $topicid);
		}
		$Num = M('topicpost')->getCount($where);
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/find/topicshow/topicid/' . $topicid . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$topics = M('topicpost')->queryAll($where, 'addtime DESC', array($perpage, $perpage * ($curpage - 1)));
		foreach($topics AS $idx => $topic)
		{
			$username = M('User_Member')->getInfoByUid('username', $topic['uid']);
			$topics[$idx]['username'] = substr($username, 0, 3) . '****' . substr($username, 7, 4);
			$topics[$idx]['attachs'] = explode(',', $topic['attachlist']);
			$topics[$idx]['isbest'] = M('topicbest')->isBest($topic['uid'], $topic['id']);
			$topics[$idx]['tname'] = M('topic')->getOne('topicname', array(array('id', $topic['topicid'])));
			$topics[$idx]['headpic150'] = M('User_Member')->getInfoByUid('headpic150', $topic['uid']);
			$topics[$idx]['replynum'] = M('topicpost')->getReplyNum($topic['id']);
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
                SITEURL . 'wap/find/topicshow?' . $_SERVER['QUERY_STRING']
                );
		$wxSha1 = sha1($wxOri);
		
		$this->assign('timestamp', $timestamp);
		$this->assign('wxnonceStr', $wxnonceStr);
		$this->assign('wxSha1', $wxSha1);
		
		$this->assign('multipage', $multipage);
		$this->assign('topics', $topics);
		$this->assign('ac', 'topicshow');
		$this->assign('topicid', $topicid);
		$this->assign('curr', '社区广场');
		$this->display('wap/topicshow.tpl');
	}
	
	public function topicpostAction()
	{
		$user = $this->getUser();
		$topicid = $this->getParam('topicid');
		if(!$user['uid'])
			$this->showmsg('', 'wap/u/login?refer=' . \Core\Fun::iurlencode(SITEURL . 'wap/find/topicpost/topicid/' . $topicid), 0);
		$this->assign('topics', M('topic')->queryAll(array(array('useable', 1))));
		$this->assign('ac', 'topicshow');
		$this->assign('topicid', $topicid);
		$this->assign('curr', '社区广场');
		$this->display('wap/topic_post.tpl');
	}
	
	public function tsAction()
	{
		$user = $this->getUser();
		$topicid = $this->getParam('topicid');
		$title = $this->getParam('title');
		$content = $this->getParam('content');
		//if(!$topicid)
			//$this->showmsg('请选择小组', 'wap/find/topicpost');
		if(!$title)
			$this->showmsg('请填写标题', 'wap/find/topicpost');
		if(!$content)
			$this->showmsg('请填写内容', 'wap/find/topicpost');
		$data = array(
			'uid' => $user['uid'],
			'isfirst' => 1,
			'topicid' => $topicid,
			'title' => $title,
			'content' => $content,
			'ip' => \Core\Comm\Util::getClientIp(),
			'useable' => 1,
			'addtime' => \Core\Fun::time()
		);
		$attachs = array();
		for($i = 1; $i <= 5; $i++)
		{
			if($_FILES['attachlist' . $i]['tmp_name'] != '')
			{
				$fileUrl = \Core\Util\Upload::upload('attachlist' . $i, '/topic', 'jpg,png,gif,JPG,JPEG', false, false, false);
				array_push($attachs, $fileUrl['link']);	
			}
		}
		$data['attachlist'] = implode(',', $attachs);
		
		if(M('topicpost')->add($data))
		{
			$this->showmsg('话题发布成功,请等待审核', 'wap/find/topicshow');
		}
		else
		{
			$this->showmsg('话题发布失败', 'wap/find/topicshow');
		}
	}
	
	public function tshowAction()
	{
		$id = $this->getParam('id');
		$topic = M('topicpost')->find($id);
		$username = M('User_Member')->getInfoByUid('username', $topic['uid']);
		$topic['username'] = substr($username, 0, 3) . '****' . substr($username, 7, 4);
		$topic['attachs'] = explode(',', $topic['attachlist']);
		
		$where = array(array('useable', 1), array('isfirst', 1, '!='), array('postid', $id));
		$Num = M('topicpost')->getCount($where);
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/find/tshow/id/' . $id . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$lists = M('topicpost')->queryAll($where, 'addtime DESC', array($perpage, $perpage * ($curpage - 1)));
		foreach($lists AS $idx => $list)
		{
			$username = M('User_Member')->getInfoByUid('username', $list['uid']);
			$lists[$idx]['username'] = substr($username, 0, 3) . '****' . substr($username, 7, 4);
			$lists[$idx]['headpic150'] = M('User_Member')->getInfoByUid('headpic150', $list['uid']);
			$lists[$idx]['reply'] = M('topicpost')->getReply($list['id']);
		}
		$this->assign('multipage', $multipage);
		$this->assign('lists', $lists);
		
		$this->assign('topic', $topic);
		$this->assign('ac', 'topicshow');
		$this->assign('curr', '社区广场');
		$this->display('wap/topic_show.tpl');
	}
	
	public function treplyAction()
	{
		$id = $this->getParam('id');
		$topic = M('topicpost')->find($id);
		$username = M('User_Member')->getInfoByUid('username', $topic['uid']);
		$topic['username'] = substr($username, 0, 3) . '****' . substr($username, 7, 4);
		$this->assign('topic', $topic);
		$this->assign('ac', 'topicshow');
		$this->assign('curr', '社区广场');
		$this->display('wap/topic_reply.tpl');
	}

	public function afeedAction()
	{
		$id = $this->getParam('id');
		$user = $this->getUser();
		if(!$user['uid'])
			$this->showmsg('', 'wap/u/login?refer=' . \Core\Fun::iurlencode(SITEURL . 'wap/find/afeed/id/' . $id), 0);
		$brief = M('active')->getOneById('brief', $id);
		$this->assign('id', $id);
		$this->assign('brief', $brief);
		$this->assign('curr', '回复动态');
		$this->display('wap/organ_afeed.tpl');
	}

	public function afeedshowAction()
	{
		$id = $this->getParam('id');
		$active = M('active')->find($id);
		$username = M('User_Member')->getInfoByUid('username', $active['uid']);
		$active['username'] = substr($username, 0, 3) . '****' . substr($username, 7, 4);
		
		$where = array(array('status', 1), array('postid', $id), array('type', 'active'));
		$Num = M('feedback')->getCount($where);
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/find/afeedshow/id/' . $id . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$lists = M('feedback')->queryAll($where, 'addtime DESC', array($perpage, $perpage * ($curpage - 1)));
		foreach($lists AS $idx => $list)
		{
			$username = M('User_Member')->getInfoByUid('username', $list['uid']);
			$lists[$idx]['username'] = substr($username, 0, 3) . '****' . substr($username, 7, 4);
			$lists[$idx]['headpic150'] = M('User_Member')->getInfoByUid('headpic150', $list['uid']);
		}
		$this->assign('multipage', $multipage);
		$this->assign('lists', $lists);
		
		$this->assign('active', $active);
		$this->assign('ac', 'active');
		$this->assign('curr', '详细信息');
		$this->display('wap/organ_afeed_show.tpl');
	}
}