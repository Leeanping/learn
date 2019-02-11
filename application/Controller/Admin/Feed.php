<?php
namespace Controller\Admin;

use Core\Controller\Action;
/*
 * 评论管理
 * @author Snake.L
 */
class Feed extends Action
{
	private $_feedbackModel = null;
	
	public function __construct($params)
	{
		parent::__construct($params);
		$this->_feedbackModel = new \Model\Feedback();
	}
	
	/**
     * 分类首页
     */
    public function indexAction()
    {
		$_userModel = new \Model\User\Member();
		//搜索
		$_search = array(
			array('content', 'LIKE')
		);
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "addtime DESC";
		
		$Num = $this->_feedbackModel->getCount($_searchArr['where']);
		
		$perpage = C('admin_page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/admin/feed/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$feeds = $this->_feedbackModel->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($feeds AS $idx => $feed)
		{
			$feeds[$idx]['username'] = $_userModel->getInfoByUid('username', $feed['uid']);
		}
        $this->assign ('multipage', $multipage);
		$this->assign('feeds', $feeds);
		$this->display('admin/feed_index.tpl');
    }
	
	public function moreAction()
	{
		//删除
        if ($this->getParam ('delete')) 
		{
            $ids = (array)$this->getParam ('delete');
            $this->_feedbackModel->remove ($ids);
        }
		
		//修改
        if ($this->getParam ('status')) 
		{
            $_ids = $this->getParam ('id');
			$_useables = $this->getParam ('status');
            foreach ($_ids as $i => $_id)
            {
                $_data = array (
                    'id' => intval ($_id),
					'status' => intval ($_useables[$i])
                );
                $this->_feedbackModel->update ($_data);
            }
            $this->showmsg ('操作成功，正在返回...');
        }
	}
	
	public function replyAction()
	{
		$id = $this->getParam('id');
		$action = $this->getParam('action');
		if($action && $action == 'edit')
		{
			$data = array(
				'id' => $id,
				'reply' => htmlspecialchars($this->getParam('reply')),
				'content' => htmlspecialchars($this->getParam('content')),
				'replytime' => CURTIME
			);
			$this->_feedbackModel->update($data);
			$this->showmsg ('回复成功，正在返回...', 'admin/feed/index');
		}
		else
		{
			$feed = $this->_feedbackModel->find($id);
			$this->assign('feed', $feed);
			$this->display('admin/feed_info.tpl');
		}
	}
}