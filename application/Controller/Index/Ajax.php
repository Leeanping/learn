<?php
namespace Controller\Index;

use Core\Controller\TAction;
/**
 * CD
 * 异步操作
 */
class Ajax extends TAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
		if(!\Core\Fun::isAjax())
		{
			exit('ERROR');
		}
	}
	
	public function loginAction()
	{
		$username = $this->getParam('username');
        $pwd = $this->getParam('password');
        $autologin = $this->getParam('autologin');
		
		$user = M('User_Member')->onLogin($username, $pwd);
		
		if(empty($user))
		{
        	$arr['msg'] = -1;
		}
		else
		{
			M('User_Member')->onSetCurrentUser($user['uid'], $user['username']);
			
			$sign = \Core\Comm\Token::_generate_key();
			if($autologin && M('Base_Token')->addToken(array('uid' => $user['uid'], 'sign' => $sign)))
			{
				$this->setCookie('st_token', \Core\Comm\Token::authcode($user['uid'] . "\t" . $sign, 'ENCODE'), 3600 * 24 * 30);
			}
	
			M('User_Member')->onSetLastVisit($user['uid']);
			$arr['msg'] = 1;
		}
		echo \Core\Fun::array2json($arr);
	}

	public function feedlistAction()
	{
		//$pagenum = $this->getParam('pagenum');
		$pagenum = 1;
		$perpage = C('page_size', 'basic', 20);
		$type = $this->getParam('type');
		$postid = $this->getParam('postid');
		
		$feeds = M('feedback')->queryAll(array(array('type', $type), array('postid', $postid)), 'addtime DESC', array($perpage, $perpage * ($pagenum - 1)));
		$html = '';
		if($feeds)
		{
			foreach($feeds AS $feed)
			{
				$headpic = M('User_Member')->getInfoByUid('headpic50', $feed['uid']);
				$realname = M('User_Member')->getInfoByUid('username', $feed['uid']);
				$headpic = $headpic ? $headpic : \Core\Fun::getPathroot() . 'resource/images/user_head_img.gif';
				$realname = $realname ? $realname : '匿名';
				$html .= '<li><em><img width="52" height="52" src="' . $headpic . '"></em><h5>' . $realname . '&bull;<span>' . Core_Fun::date('Y-m-d', $feed['addtime']) . '</span></h5><p>' . $feed['content'] . '</p></li>';
			}
			$arr['msg'] = 1;
			$arr['html'] = $html;
			$arr['pagenum'] = $pagenum + 1;
		}
		else
		{
			$arr['msg'] = 0;
			$arr['html'] = '';
		}
		echo \Core\Fun::array2json($arr);
	}

	public function postfeedAction()
	{
		$cUser = $this->getUser();
		$postid = $this->getParam('postid');
		$type = $this->getParam('type');
		$posttitle = $this->getParam('posttitle');
		$content = htmlspecialchars($this->getParam('content'));
		$time = CURTIME;
		//$isfeed = C::M('Feedback')->isFeedBack($cUser['uid'], $postid, $type);
		if(empty($cUser['uid']))
		{
			$arr['msg'] = -1;
		}
		/*elseif($isfeed > 0)
		{
			$arr['msg'] = -2;
		}*/
		else
		{
			$data = array(
				'uid' => $cUser['uid'],
				'postid' => $postid,
				'type' => $type,
				'posttitle' => $posttitle,
				'status' => 1,
				'content' => $content,
				'addtime' => $time
			);
			$feedid = M('Feedback')->add($data);
			if($feedid > 0)
			{
				M('article')->updateNum($postid, 'feednum');
				$headpic = M('User_Member')->getInfoByUid('headpic50', $cUser['uid']);
				$realname = M('User_Member')->getInfoByUid('realname', $cUser['uid']);
				$headpic = $headpic ? $headpic : \Core\Fun::getPathroot() . 'resource/images/user_head_img.gif';
				$realname = $realname ? $realname : '匿名';
				$html = '<li><em><img width="52" height="52" src="' . $headpic . '"></em><h5>' . $realname . '&bull;<span>' . Core_Fun::date('Y-m-d', $time) . '</span></h5><p>' . $content . '</p></li>';
				$arr['msg'] = 1;
				$arr['html'] = $html;
			}
			else
			{
				$arr['msg'] = 0;
			}
		}
		echo \Core\Fun::array2json($arr);
	}

	public function postbestAction()
	{
		$postid = $this->getParam('postid');
		$type = $this->getParam('type');
		if($type == 'derm' || $type == 'wedding' || $type == 'shop' || $type == 'photo' || $type == 'brand')
		{
			$r = M('User_Member')->editUserInfo(array(
				'uid' => $postid,
				'bestnum' => 1
			));
		}
		else
		{
			$model = $type == ('product' || 'case') ? 'article' : $type;
			$r = M($model)->updateNum($postid, 'bestnum');
		}
		if($r)
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}

		echo \Core\Fun::array2json($arr);
	}

	public function poststowAction()
	{
		$cUser = $this->getUser();
		$stowid = $this->getParam('postid');
		$stowtype = $this->getParam('type');
		$stowtitle = $this->getParam('posttitle');
		$time = CURTIME;
		$isstow = M('stow')->checkStow($cUser['uid'], $stowid, $stowtype);
		if(empty($cUser['uid']))
		{
			$arr['msg'] = -1;
		}
		elseif(!$isstow)
		{
			$arr['msg'] = -2;
		}
		else
		{
			$data = array(
				'uid' => $cUser['uid'],
				'stowid' => $stowid,
				'stowtype' => $stowtype,
				'stowtitle' => $stowtitle,
				'useable' => 1,
				'ip' => \Core\Comm\Util::getClientIp(),
				'addtime' => $time
			);
			$r = M('stow')->add($data);
			if($r > 0)
			{
				$arr['msg'] = 1;
			}
			else
			{
				$arr['msg'] = 0;
			}
		}
		echo \Core\Fun::array2json($arr);
	}

	public function delstowAction()
	{
		$stowid = $this->getParam('stowid');
		$r = M('stow')->remove($stowid);
		if($r)
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo \Core\Fun::array2json($arr);
	}

	public function delstowbythreadidAction()
	{
		$threadid = $this->getParam('threadid');
		$r = M('stow')->removeall("stowid = '$threadid' AND stowtype = 'thread'");
		if($r)
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo \Core\Fun::array2json($arr);
	}

	public function calendarAction()
	{
		$year = $this->getParam('year');
		$month = $this->getParam('month');
		$dermid = $this->getParam('dermid');
		$uid = $this->getParam('uid');
		$html = \Core\Comm\Calendar::display($year, $month, $dermid, $uid);
		echo \Core\Fun::array2json(array('html' => $html));
	}

	public function bookingAction()
	{
		$cUser = $this->getUser();
		$date = $this->getParam('date');
		$date = explode('-', $date);
		$dermid = $this->getParam('dermid');
		$telephone = $this->getParam('telephone');

		if(!M('booking')->myBooking($dermid, $cUser['uid'], $date[0], $date[1], $date[2]))
		{
			$arr['msg'] = -1;
		}
		else
		{
			$data = array(
				'dermid' => $dermid,
				'uid' => $cUser['uid'],
				'telephone' => $telephone,
				'year' => $date[0],
				'month' => $date[1],
				'day' => $date[2],
				'isbooking' => 0,
				'addtime' => CURTIME
			);
			if(M('booking')->add($data))
			{
				$arr['msg'] = 1;
			}
			else
			{
				$arr['msg'] = 0;
			}

		}
		echo \Core\Fun::array2json($arr);
	}

	public function bbsreplyAction()
	{
		$cUser = $this->getUser();
		$postid = $this->getParam('postid');
		$threadid = $this->getParam('threadid');
		$forumid = $this->getParam('forumid');
		$post = M('Forumpost')->find($postid);
		$thread = M('Forumthread')->find($threadid);
		$rush = M('Forumrush')->getRushByThreadId($threadid);
		if(!empty($cUser['uid']))
		{
			$html = '<div class="fast-reply-box"><dl>RE：' . $thread['title'] . '</dl><dl class="c"><blockquote>' . $post['username'] . ' 发表于 ' . \Core\Fun::date('Y-m-d H:m:s', $post['addtime']) . '<br />' . \Core\Comm\Util::utfSubstr(\Core\Comm\Util::Html2text($post['content']), 100, '...') . '</blockquote></dl><dl><textarea class="fr-txt" id="fastreply"></textarea></dl></div>';
		}
		else
		{
			$html = 1;
		}
		if($thread['isrush'] == 1)
		{
			$postnum = M('Forumpost')->getPostsByUidAndThreadId($cUser['uid'], $threadid);
			if($postnum >= $rush['usertimes'])
			{
				$html = 2;
			}
		}
		echo $html;
	}
	
	public function replyAction()
	{
		$cUser = $this->getUser();
		$postid = $this->getParam('postid');
		$threadid = $this->getParam('threadid');
		$forumid = $this->getParam('forumid');
		$content = $this->getParam('content');
		$post = M('Forumpost')->find($postid);
		$thread = M('Forumthread')->find($threadid);
		
		$reply = $post['username'] . ' 发表于 ' . \Core\Fun::date('Y-m-d H:m:s') . '<br />' . $post['content'];
		$time = CURTIME;
		$postData = array(
			'forumid' => $forumid,
			'threadid' => $threadid,
			'isfirst' => 0,
			'username' => $cUser['username'],
			'uid' => $cUser['uid'],
			'title' => '',
			'content' => $content,
			'reply' => $reply,
			'useable' => 1,
			'addtime' => $time,
			'postip' => \Core\Comm\Util::getClientIp()
		);
		$postid = M('Forumpost')->add($postData);
		if($postid > 0)
		{
			$forum['id'] = $forumid;
			$forum['posts'] = 1;
			$forum['lastpost'] = $time;
			M('Forum')->editForum($forum);
			$threaddata['id'] = $threadid;
			$threaddata['replies'] = 1;
			$threaddata['lastpost'] = $time;
			$threaddata['lastpostuid'] = $cUser['uid'];
			$threaddata['lastposter'] = $cUser['username'];
			M('Forumthread')->editForumThread($threaddata);
			/*$sum = C::M('Credit')->getSumByUidAndDay($cUser['uid'], 'thread_reply');
			if($sum < 50)
			{
				C::M('User_Member')->updateUserScore($cUser['uid'], Core_Comm_Util::getUserCredit('thread_reply'));
				C::M('Credit')->addCredit($cUser['uid'], $threadid, 'thread_reply');
			}*/
			if($thread['replycredit'] > 0)
			{
				$creditrule = M('Forumcredit')->getCreditByThreadId($threadid);
				if(!empty($creditrule['times']))
				{
					$havecredit = M('Credit')->getCountByUidAndPostId($cUser['uid'], $threadid, 'thread_replycredit');
					if($creditrule['usertimes'] - $havecredit > 0 && $thread['replycredit'] - $creditrule['credit'] >= 0)
					{
						if($creditrule['random'] > 0) {
							$rand = rand(1, 100);
							$rand_replycredit = $rand <= $creditrule['random'] ? true : false ;
						} else {
							$rand_replycredit = true;
						}
						if($rand_replycredit)
						{
							//C::M('User_Member')->updateUserScore($cUser['uid'], $creditrule['credit']);
							//C::M('Credit')->addCredit($cUser['uid'], $threadid, 'thread_replycredit', $creditrule['credit']);
							M('Forumpost')->update(array('id' => $postid, 'replycredit' => $creditrule['credit']));
						}
					}
				}
			}
			if($thread['isrush'] == 1)
			{
				$rush = M('Forumrush')->getRushByThreadId($threadid);
				$postallnum = M('Forumpost')->getCount();
				if($rush['stopfloor'] > 0 && $postallnum <= $rush['stopfloor'] && strpos($rush['rewardfloor'], $postallnum + 1) !== false && $rush['starttime'] <= CURTIME && $rush['endtime'] >= CURTIME)
				{
					M('Forumpost')->update(array('id' => $postid, 'isrush' => 1));
				}
			}
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo \Core\Fun::array2json($arr);
	}
	
	public function stampAction()
	{
		$threadid = $this->getParam('threadid');
		$stamp = $this->getParam('stamp');
		$update = M('Forumthread')->update(array('id' => $threadid, 'stamp' => $stamp));
		if($update)
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo \Core\Fun::array2json($arr);
	}
	
	public function isAction()
	{
		$threadid = $this->getParam('threadid');
		$type = $this->getParam('type');
		$val = $this->getParam('val');
		$update = M('Forumthread')->update(array('id' => $threadid, $type => $val));
		if($update)
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo \Core\Fun::array2json($arr);
	}
	
	public function sheildAction()
	{
		$postid = $this->getParam('postid');
		$val = $this->getParam('val');
		$update = M('Forumpost')->update(array('id' => $postid, 'useable' => $val));
		if($update)
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo \Core\Fun::array2json($arr);
	}

	public function getthreadAction()
	{
		$forumid = $this->getParam('forumid');
		$pagenum = $this->getParam('pagenum');
		$pagenum = $pagenum ? $pagenum : 1;
		$perpage = C('page_size', 'basic', 20);
		$limit = $perpage * ($pagenum - 1);
		$where = array(array('useable', 1), array('isbest', 1));
		if($forumid != 0)
		{
			$where[] = array('forumid', $forumid);
		}

		$threads = M('forumthread')->queryAll($where, 'addtime DESC', array($perpage, $limit));

		$html = '';
		foreach($threads AS $thread)
		{
			$pic = $thread['attach'] ? $thread['attach'] : \Core\Fun::getPathroot() . 'resource/images/default.jpg';
			$html .= '<li><a href="' . \Core\Fun::getPathroot() . 'bbs/display/forumid/' . $thread['forumid'] . '/threadid/' . $thread['id'] . '" target="_blank"><span><img onload="imageResize(this, 215, 160)" src="' . $pic . '"></span><p>' . \Core\Comm\Util::utfSubstr($thread['title'], 6) . '</p></a></li>';
		}

		//分页
		$count = M('forumthread')->getCount($where);
		$pages = ceil($count / $perpage);
		for($i = 1; $i <= $pages; $i++)
		{
			if($i == $pagenum)
			{
				$pagehtml .= '<strong>' . $i . '</strong>';
			}
			else
			{
				$pagehtml .= '<a href="javascript:;" onclick="getThreadList(\'' . $forumid . '\', \'\', \'' . $i . '\')">' . $i . '</a>';
			}
		}


		echo \Core\Fun::array2json(array('html' => $html, 'pagehtml' => $pagehtml));
	}

	public function getarticleAction()
	{
		$catid = $this->getParam('catid');
		$pagenum = $this->getParam('pagenum');
		$pagenum = $pagenum ? $pagenum : 1;
		$perpage = C('page_size', 'basic', 20);
		$limit = $perpage * ($pagenum - 1);
		$catid = $catid ? $catid : 1;
		$where = array(array('useable', 1));
		if($catid != 0)
		{
			$where[] = array('catarr', $catid, 'FIND_IN_SET');
		}

		$articles = M('article')->queryAll($where, 'addtime DESC', array($perpage, $limit));

		$html = $pagehtml = '';
		foreach($articles AS $article)
		{
			$title = \Core\Comm\Util::utfSubstr(\Core\Comm\Util::Html2text($article['title']), 16);
			$pic = $article['articlepic'] ? $article['articlepic'] : \Core\Fun::getPathroot() . 'resource/images/default.jpg';
			$html .= '<li><h2><a href="' . \Core\Fun::getPathroot() . 'article/show/id/' . $article['id'] . '" target="_blank"><img onload="imageResize(this, 335, 185)" src="' . $pic . '"></a></h2><h3><a href="' . \Core\Fun::getPathroot() . 'article/show/id/' . $article['id'] . '">' . $title . '</a></h3><p><span>' . \Core\Fun::date('Y-m-d H:i:s', $article['addtime']) . '</span><em><i></i> ' . $article['feednum'] . '</em><em><i class="show"></i> ' . $article['shownum'] . '</em></p></li>';
		}

		//分页
		$count = M('article')->getCount($where);
		$pages = ceil($count / $perpage);
		for($i = 1; $i <= $pages; $i++)
		{
			if($i == $pagenum)
			{
				$pagehtml .= '<strong>' . $i . '</strong>';
			}
			else
			{
				$pagehtml .= '<a href="javascript:;" onclick="getArticleList(\'' . $catid . '\', \'\', \'' . $i . '\')">' . $i . '</a>';
			}
		}


		echo \Core\Fun::array2json(array('html' => $html, 'pagehtml' => $pagehtml));
	}

	public function getcatAction()
	{
		$pid = $this->getParam('pid');
		$catid = $catid ? $catid : 1;

		$categories = M('category')->getCategoryList($pid);

		$html = '<a href="javascript:;" onclick="getArticleList(' . $pid . ', this)" class="hwds-subtitact">全部</a>';
		foreach($categories AS $cat)
		{
			$html .= '<a href="javascript:;" onclick="getArticleList(' . $cat['id'] . ', this)">' . $cat['catname'] . '</a>';
		}
		$html .= '<a href="/article/category/catid/' . $pid . '">更多</a>';

		echo \Core\Fun::array2json(array('html' => $html));
	}

	public function updateadnumAction()
	{
		$id = $this->getParam('id');
		$update = M('ad')->editAd(array('id' => $id, 'shownum' => 1));
		if($update)
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo \Core\Fun::array2json($arr);
	}
}
?>