<?php
namespace Controller\Index;

use Core\Controller\TAction;
/**
 * vpcvcms
 * 搜索
 */
class Search extends TAction
{
	
	public function bbsAction()
	{
		$q = $this->getParam('q');
		$_search = array(
			array('title', 'LIKE', $q),
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
		$mpurl = '/search/bbs' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$threads = M('Forumthread')->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($threads AS $idx => $thread)
		{
			$threads[$idx]['headpic'] = M('User_Member')->getInfoByUid('headpic30', $thread['uid']);
			$threads[$idx]['icon'] = M('Forumthread')->formatIcon($thread);
		}
		$this->assign('threads', 		$threads);
		$this->assign('q', 		$q);
		$this->assign ('multipage', 	$multipage);
		$this->display('search/threads.tpl');
	}

	public function articleAction()
	{
		$q = $this->getParam('q');
		$_search = array(
			array('title', 'LIKE', $q),
			array('useable', '', 1)
		);
		$_searchArr = $this->setWhereCondition($_search);
		$_orderby = "addtime DESC";
		
		$Num = M('article')->getCount($_searchArr['where']);
		$perpage = C('page_size', 'basic', 20);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = \Core\Comm\Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/search/article' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$articles = M('article')->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($articles AS $idx => $article)
		{
			$articles[$idx]['catname'] = M('category')->getCatNameByCatId($article['catid']);
		}
		$this->assign('articles', 		$articles);
		$this->assign('q', 		$q);
		$this->assign ('multipage', 	$multipage);
		$this->display('search/article.tpl');
	}
}
?>