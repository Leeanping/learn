<?php
namespace Controller\Admin;

use Core\Controller\Action;
/*
 * 消息管理
 * @author Snake.L
 */
class Message extends Action
{
	private $_stowModel = null;
	
	public function __construct($params)
	{
		parent::__construct($params);
		$this->_messageModel = new \Model\User\Message();
	}
	
	/**
     * 分类首页
     */
    public function indexAction()
    {
		$_userModel = new \Model\User\Member();
		//搜索
		$_search = array(
			array('title', 'LIKE')
		);
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "sendtime DESC";
		
		$Num = $this->_messageModel->getMessageCountByWhere($_searchArr['where']);
		
		$perpage = C('admin_page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/admin/message/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$messages = $this->_messageModel->getMessageList($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($messages AS $idx => $message)
		{
			$messages[$idx]['realname'] = $_userModel->getInfoByUid('realname', $message['fromuid']);
		}
        $this->assign ('multipage', $multipage);
		$this->assign('messages', $messages);
		$this->display('admin/message_index.tpl');
    }
	
	public function moreAction()
	{
		//删除
        if ($this->getParam ('delete')) 
		{
            $ids = (array)$this->getParam ('delete');
            $this->_messageModel->delMessage ($ids);
        }
		
		//修改
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
			$_useables = $this->getParam ('useable');
            foreach ($_ids as $i => $_id)
            {
                $_data = array (
                    'id' => intval ($_id),
					'useable' => intval ($_useables[$i])
                );
                $this->_messageModel->editMessage ($_data);
            }
            $this->showmsg ('操作成功，正在返回...');
        }
	}
	
	public function sendAction()
	{
		$_userModel = new \Model\User\Member();
		$action = $this->getParam('action');
		if($action && $action == 'message')
		{
			$whereArr = array();
			$whereArr[] = array('gid', 1, '!=');
			$kind = $this->getParam('kind');
			$title = $this->getParam('title');
			$message = $this->getParam('message');
			$uid = $this->getParam('uid');
			$time = CURTIME;
			if(!empty($uid))
			{
				$userid = \Core\Db::getOne("SELECT uid FROM ##__user_member WHERE usersn LIKE '%$uid%' OR username LIKE '%$uid%'");
				$messagedata = array(
					'type' => 'system',
					'fromuid' => 1,
					'touid' => $userid,
					'folder' => 'admin',
					'title' => $title,
					'sendtime' => $time,
					'writetime' => $time,
					'hasview' => 0,
					'isadmin' => 1,
					'message' => $message,
					'useable' => 1
				);
				$this->_messageModel->addMessage($messagedata);
			}
			else
			{
				if($kind == 1)
				{
					$whereArr[] = array('gid', 10, '!=');
				}
				else if($kind == 2)
				{
					$whereArr[] = array('gid', 10);
				}
				$userList = $_userModel->getUserList($whereArr, 'uid asc');
				//$onceTotal = 200; //每次最多处理200个
				//$requests = array_chunk ($userList, $onceTotal);
				foreach($userList AS $r)
				{
					$messagedata = array(
						'type' => 'system',
						'fromuid' => 1,
						'touid' => $r['uid'],
						'folder' => 'admin',
						'title' => $title,
						'sendtime' => $time,
						'writetime' => $time,
						'hasview' => 0,
						'isadmin' => 1,
						'message' => $message,
						'useable' => 1
					);
					$this->_messageModel->addMessage($messagedata);
				}
			}
			$this->showmsg('消息发送成功', 'admin/message');
		}
		else
		{
			$whereArr = array();
			$whereArr[] = array('gid', 1, '!=');
			$users = $_userModel->getUserList($whereArr, 'uid asc');
			$this->assign('users', $users);
			$this->display('admin/message_send.tpl');
		}
	}
}