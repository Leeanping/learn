<?php
namespace Controller\Index;

use Core\Controller\MAction;
/**
 * vpcvcms
 * 会员个人页面
 * Snake.L
 */
class Home extends MAction
{

	public function preDispatch() 
	{
        parent::preDispatch();
	}

	public function indexAction()
	{
		$this->display('user/profile.tpl');
	}

	public function headpicAction()
	{
		$this->display('user/headpic.tpl');
	}

	public function bbsAction()
	{
		$_search = array(
			array('uid', '', $this->user['uid']),
			array('useable', '', 1)
		);
		$_searchArr = $this->setWhereCondition($_search);
		if($orderby == 'best')
			$order = "isbest DESC";
		if($orderby == 'views')
			$order = "views DESC, replies DESC";
		$_orderby = $orderby ? $order : "addtime DESC";
		
		$Num = M('Forumthread')->getCount($_searchArr['where']);
		$perpage = C('page_size', 'basic', 20);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = \Core\Comm\Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/home/bbs' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$threads = M('Forumthread')->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($threads AS $idx => $thread)
		{
			$threads[$idx]['headpic'] = M('User_Member')->getInfoByUid('headpic30', $thread['uid']);
			$threads[$idx]['icon'] = M('Forumthread')->formatIcon($thread);
		}
		$this->assign('threads', 		$threads);

		$_search = array(
			array('uid', '', $this->user['uid']),
			array('useable', '', 1),
			array('isfirst', '!=', 1)
		);
		$_searchArr = $this->setWhereCondition($_search);
		$_orderby = "addtime DESC";
		
		$Num = M('Forumpost')->getCount($_searchArr['where']);
		$perpage = C('page_size', 'basic', 20);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = '/home/bbs';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$posts = M('Forumpost')->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($posts AS $idx => $post)
		{
			$posts[$idx]['ttitle'] = M('Forumthread')->getOneById('title', $post['threadid']);
		}
		$this->assign('posts', 		$posts);

		$this->assign ('multipage', 	$multipage);
		$this->display('user/bbs.tpl');
	}

	public function stowAction()
	{
		$uid = $this->user['uid'];
		$where = array(
			array('uid', $uid)
		);
		
		$_orderby = "addtime DESC";
		
		$Num = M('stow')->getCount($where);
		
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/home/stow' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$stows = M('stow')->queryAll($where, $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($stows AS $idx => $stow)
		{
			$stows[$idx]['forumid'] = M('Forumthread')->getOneById('forumid', $stow['stowid']);
			$stows[$idx]['username'] = M('Forumthread')->getOneById('username', $stow['stowid']);
			$stows[$idx]['addtime'] = M('Forumthread')->getOneById('addtime', $stow['stowid']);
			$stows[$idx]['replies'] = M('Forumthread')->getOneById('replies', $stow['stowid']);
			$stows[$idx]['views'] = M('Forumthread')->getOneById('views', $stow['stowid']);
			$stows[$idx]['lastposter'] = M('Forumthread')->getOneById('lastposter', $stow['stowid']);
			$stows[$idx]['lastpost'] = M('Forumthread')->getOneById('lastpost', $stow['stowid']);
		}
        $this->assign ('multipage', $multipage);
		$this->assign('stows', $stows);
		$this->display('user/stow.tpl');
	}

	public function getmsgAction()
	{
		$num = M('User_Message')->getMessageCountByWhere(array(array('hasview', 0), array('touid', $this->user['uid'])));
		echo "document.write('".$num."');\r\n";
	}

	public function messageAction()
	{
		$uid = $this->user['uid'];
		$where = array(
			array('touid', $uid)
		);
		
		$_orderby = "sendtime DESC";
		
		$Num = M('User_Message')->getMessageCountByWhere($where);
		
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str (array(), '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/home/message' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$messages = M('User_Message')->getMessageList($where, $_orderby, array($perpage, $perpage * ($curpage - 1)));
        $this->assign ('multipage', $multipage);
		$this->assign('messages', $messages);
		$this->display('user/message.tpl');
	}
}