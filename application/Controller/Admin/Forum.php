<?php
namespace Controller\Admin;

use Core\Controller\Action;
/**
 * ST
 * 论坛管理
 * @author: Snake.L
 */
class Forum extends Action
{
	//分类Model.
    private $_forumModel = null;
	private $_threadModel = null;
	private $_postModel = null;

    public function __construct($params)
    {
        parent::__construct($params);
        $this->_forumModel = new \Model\Forum();
		$this->_threadModel = new \Model\Forumthread();
		$this->_postModel = new \Model\Forumpost();
    }

    /**
     * 版块首页
     */
    public function indexAction()
    {
        $forums = $this->_forumModel->getForumList();
		foreach($forums AS $idx => $forum)
		{
			$forums[$idx]['son'] = $this->_forumModel->getForumList($forum['id']);
		}
		$this->assign('forums', $forums);
		
		$this->display('admin/forum_index.tpl');
    }
	
	public function moreAction()
	{
		//增加
		if ($this->getParam ('newname')) {
            $_newparentids = $this->getParam ('newpid');
            $_newnames = $this->getParam ('newname');
			$_newtypes = $this->getParam ('newtype');
            $_newsorts = $this->getParam ('newsort');
			$time = Core_Fun::time();
            foreach ($_newparentids as $i => $_newparentid)
            {
                $data = array (
                    'pid' => intval ($_newparentid),
                    'name' => htmlspecialchars(trim ($_newnames[$i])),
                    'sort' => htmlspecialchars($_newsorts[$i]),
                    'status' => 1,
					'type' => $_newtypes[$i],
					'allowview' => 1,
					'allowpost' => 1,
					'allowreply' => 1,
					'addtime' => $time
                );
                $this->_forumModel->add ($data);
            }
        }
		
		//修改
        if ($this->getParam ('name')) {
            $_ids = $this->getParam ('fid');
            $_parentids = $this->getParam ('pid');
            $_names = $this->getParam ('name');
            $_sorts = $this->getParam ('sort');
			$_allowviews = $this->getParam ('allowview');
			$_allowposts = $this->getParam ('allowpost');
			$_allowreplys = $this->getParam ('allowreply');
            $_statuses = $this->getParam ('status');
			$_prizes = $this->getParam ('prize');
			$_bests = $this->getParam ('isbest');
            foreach ($_parentids as $i => $_parentid)
            {
                $data = array (
                    'id' => $_ids[$i],
                    'pid' => intval ($_parentid),
                    'name' => htmlspecialchars(trim ($_names[$i])),
                    'sort' => htmlspecialchars($_sorts[$i]),
					'allowview' => $_allowviews[$i],
					'allowpost' => $_allowposts[$i],
					'allowreply' => $_allowreplys[$i],
					'prize' => $_prizes[$i],
					'isbest' => $_bests[$i],
                    'status' => $_statuses[$i],
                );
				
                $this->_forumModel->update ($data);
            }
			echo $this->returnJson (1, '操作成功，正在返回...');
        }
	}
	
	public function editAction()
	{
		$action = $this->getParam('action');
		$fid = $this->getParam('fid');
		$forum = $this->_forumModel->find($fid, array('template', 'forumpic', 'forumsummary'));
		if($action && $action == 'edit')
		{
			$data['id'] = $fid;
			$data['forumsummary'] = $this->getParam('forumsummary');
			if('' != $this->getParam('forumpic') && $this->getParam('forumpic') != $forum['forumpic'])
			{
				\Core\Fun\File::delete(BASEROOT . $forum['forumpic']);
				$data['forumpic'] = $this->getParam('forumpic');
			}

			$update = $this->_forumModel->update($data);
			if($update)
			{
				echo $this->returnJson (1, '板块修改成功');
			}
			else
			{
				echo $this->returnJson (0, '板块修改失败');
			}
		}
		else
		{
			$_swfParams = array(
				'item_id' => $fid, 
				'belong' => BELONG_FORUM,
				'm' => 'forum'
			);
			$this->assign('swfupload', \Core\Fun\Swfupload::_build_upload($_swfParams)); //构建swfupload
			$this->assign('forumsummary', \Core\Fun::getEditor('forumsummary', $forum['forumsummary'], 200, 700, 'bbs'));
			$this->assign('forum', $forum);
			$this->assign('picdom', 'forumpic');
			$this->display('admin/forum_info.tpl');
		}
	}
	
	public function delAction()
	{
		$fid = $this->getParam('fid');
		if(!$fid)
		{
			echo $this->returnJson (0, '请正确操作');
		}
		else
		{
			$num = $this->_forumModel->getCount(array(array('pid', $fid)));
			if($num > 0)
			{
				echo $this->returnJson (-1, '此版块含有子版块不能删除');
			}
			else
			{
				$where = "forumid = '$fid'";
				$this->_threadModel->removeall($where);
				$this->_postModel->removeall($where);
				$delete = $this->_forumModel->remove($fid);
				if($delete)
				{
					echo $this->returnJson (1, '版块删除成功');
				}
				else
				{
					echo $this->returnJson (0, '版块删除失败');
				}
			}
		}
	}
	
	public function threadAction()
	{
		$_search = array(
			array('title', 'LIKE'),
			array('forumid', '')
		);
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "sort ASC";
		
		$Num = $this->_threadModel->getCount($_searchArr['where']);
		
		$perpage = C('admin_page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/forum/thread' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$threads = $this->_threadModel->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($threads AS $idx => $thread)
		{
			$threads[$idx]['name'] = $this->_forumModel->find($thread['forumid'], array('name'));
		}
		$this->assign('forums', $this->_forumModel->getForumTree());
        $this->assign ('multipage', $multipage);
		$this->assign('threads', $threads);
		$this->display('admin/thread_index.tpl');
	}
	
	public function tmoreAction()
	{
		//修改
        if ($this->getParam ('id')) 
		{
			$_userModel = new \Model\User\Member();
            $_ids = $this->getParam ('id');
			$_uids = $this->getParam ('uid');
			$_forumids = $this->getParam ('forumid');
			$_istops = $this->getParam ('istop');
			$_isbests = $this->getParam ('isbest');
			$_ishots = $this->getParam ('ishot');
			$_isprizes = $this->getParam ('isprize');
			$_useables = $this->getParam ('useable');
			$_stamps = $this->getParam ('stamp');
            foreach ($_ids as $i => $_id)
            {
                $_data = array (
                    'id' => intval ($_id),
					'istop' => intval ($_istops[$_id]),
					'isbest' => intval($_isbests[$_id]),
					'ishot' => intval($_ishots[$_id]),
					'isprize' => intval($_isprizes[$_id]),
					'useable' => intval($_useables[$_id]),
					'stamp' => $_stamps[$_id]
                );
				/*if($_isbests[$i] == 1)
				{
					$_creditModel = new Model_Credit();
					$_userModel->updateUserScore($_uids[$i], Core_Comm_Util::getUserCredit('thread_best'));
					$_creditModel->addCredit($_uids[$i], $_id, 'thread_best');
				}
				if($_isprizes[$i] == 1)
				{
					$userInfo['uid'] = $_uids[$i];
					$userInfo['score'] = $this->_forumModel->getForumPrize($_forumids[$i]);
					$_userModel->editUserInfo($userInfo);
				}*/
                $this->_threadModel->update ($_data);
            }
        }
        echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function tdeleteAction()
	{
		//删除
        if ($this->getParam ('id')) 
		{
            $ids = (array)$this->getParam ('id');
            $this->_threadModel->remove ($ids);
			$this->_postModel->removeall("threadid IN (" . implode(',', $ids) . ")");
        }
		echo $this->returnJson(1, '操作成功，正在返回...');
	}
	
	public function threadaddAction()
	{
		$action = $this->getParam('action');
		if($action && $action == 'threadadd')
		{
			$forumid = $this->getParam('forumid');
			$content = $this->getParam('content');
			$attach = $this->getParam('attach');
			$time = CURTIME;
			$data = array(
				'forumid' => $forumid,
				'realname' => C('site_name', 'basic', ''),
				'uid' => 1,
				'title' => $this->getParam('title'),
				'addtime' => $time,
				'lastpost' => $time,
				'lastpostuid' => 1,
				'lastposter' => C('site_name', 'basic', ''),
				'views' => 1,
				'useable' => 1,
				'replies' => 0
			);
			if($attach != '')
			{
				$data['attach'] = $attach;
			}
			else
			{
				$attach = \Core\Comm\Util::getAttch($content);
				$data['attach'] = $attach;
			}
			
			$threadid = $this->_threadModel->add($data);
			if($threadid > 0)
			{
				$forum['id'] = $forumid;
				$forum['threads'] = 1;
				$forum['posts'] = 1;
				$forum['lastpost'] = $time;
				$this->_forumModel->editForum($forum);
				
				$postData = array(
					'forumid' => $forumid,
					'threadid' => $threadid,
					'isfirst' => 1,
					'realname' => C('site_name', 'basic', ''),
					'uid' => 1,
					'title' => $this->getParam('title'),
					'content' => $content,
					'useable' => 1,
					'addtime' => $time,
					'postip' => \Core\Comm\Util::getClientIp()
				);
				$this->_postModel->add($postData);
				echo $this->returnJson(1, '发布帖子成功');
			}
			else
			{
				echo $this->returnJson(0, '发布帖子失败');
			}
		}
		else
		{
			$this->assign('picdom', 'attach');
			$this->assign('forums', $this->_forumModel->getForumTree());
			$this->assign('content', \Core\Fun::getEditor('content', '', 200, 797, 'bbs'));
			$this->assign('_postName', 'threadadd');
			$this->display('admin/thread_info.tpl');
		}
	}
	
	public function threadeditAction()
	{
		$action = $this->getParam('action');
		$threadid = $this->getParam('id');
		$thread = $this->_threadModel->find($threadid);
		$thread['content'] = $this->_postModel->getThreadContent($threadid);
		if($action && $action == 'threadedit')
		{
			$forumid = $this->getParam('forumid');
			$time = CURTIME;
			$content = $this->getParam('content');
			$title = $this->getParam('title');
			$attach = $this->getParam('attach');
			$data = array(
				'id' => $threadid,
				'title' => $title,
				'forumid' => $forumid
			);
			if($attach != '' && $attach != $thread['attach'])
			{
				\Core\Fun\File::delete(BASEROOT . $thread['attach']);
				$data['attach'] = $attach;
			}
			else
			{
				$attach = \Core\Comm\Util::getAttch($content);
				\Core\Fun\File::delete(BASEROOT . $thread['attach']);
				$data['attach'] = $attach;
			}
			
			$update = $this->_threadModel->update($data);
			if($update > 0)
			{
				$postid = $this->_postModel->getPostId($threadid);
				$postData = array(
					'id' => $postid,
					'title' => $title,
					'forumid' => $forumid,
					'content' => $content
				);
				$this->_postModel->update($postData);
				//$this->showmsg ('修改帖子成功', 'admin/forum/thread');
				echo $this->returnJson(1, '修改帖子成功');
			}
			else
			{
				//$this->showmsg ('修改帖子失败', 'admin/forum/threadedit/id/' . $threadid);
				echo $this->returnJson(0, '修改帖子失败');
			}
		}
		else
		{
			$this->assign('picdom', 'attach');
			$this->assign('forums', $this->_forumModel->getForumTree());
			$this->assign('content', \Core\Fun::getEditor('content', $thread['content'], 200, 797, 'bbs'));
			$this->assign('_postName', 'threadedit');
			$this->assign('thread', $thread);
			$this->display('admin/thread_info.tpl');
		}
	}
	
	public function postAction()
	{
		$_search = array(
			array('isfirst', '!=', 1),
			array('title', 'LIKE'),
			array('content', 'LIKE')
		);
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "addtime DESC";
		
		$Num = $this->_postModel->getCount($_searchArr['where']);
		
		$perpage = C('admin_page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/forum/post' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$posts = $this->_postModel->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($posts AS $idx => $post)
		{
			$posts[$idx]['name'] = $this->_forumModel->find($post['forumid'], array('name'));
		}
        $this->assign ('multipage', $multipage);
		$this->assign('posts', $posts);
		$this->display('admin/post_index.tpl');
	}
	
	public function pmoreAction()
	{
		//修改
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
			$_useables = $this->getParam ('useable');
            foreach ($_ids as $i => $_id)
            {
                $_data = array (
                    'id' => intval ($_id),
					'useable' => intval ($_useables[$_id])
                );
                $this->_postModel->update ($_data);
            }
        }
		echo $this->returnJson (1, '操作成功，正在返回...');
	}

	public function pdeleteAction()
	{
		//删除
        if ($this->getParam ('id')) 
		{
            $ids = (array)$this->getParam ('id');
			foreach($ids AS $id)
			{
				$post = $this->_postModel->find($id);
				$info = array(
					'id' => $post['threadid'],
					'replies' => 1
				);
				$this->_threadModel->editForumThread($info, $plus = '-');
			}
            $this->_postModel->remove ($ids);
        }

		echo $this->returnJson (1, '操作成功，正在返回...');
	}
	
	public function getcAction()
	{
		$id = $this->getParam('id');
		$post = $this->_postModel->find($id);
		echo $post['content'];
	}
}