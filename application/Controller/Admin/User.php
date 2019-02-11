<?php
namespace Controller\Admin;

use Core\Controller\Action;
/**
 * 用户设置
 *
 * @author Snake.L
 */
class User extends Action
{
	/**
	 * 添加用户
	 */
	public function addAction()
	{
		//queryString加密码
		$securecode = 'adminuseradd';
		$memberModel = new \Model\User\Member();
		$groupModel = new \Model\User\Group();
		if (trim($this->getParam('action'))=='add')
		{
			$conditions['gid'] = trim($this->getParam('gid'));
			$conditions['username'] = trim($this->getParam('username'));
			$conditions['realname'] = trim($this->getParam('realname'));
			$password = trim($this->getParam('password'));
			$conditions['email'] = trim($this->getParam('email'));
			//将从表单取得的数据拼接到queryString
			$conditionstr = implode('||', $conditions);
			$md5str = md5($conditionstr.$securecode);
			$errorBackUrl = 'admin/user/add/conditions/'.$conditionstr.'/code/'.$md5str.'/';
			//验证表单取得的数据
			$errorMessage = '';
			$checkResult = array();
			$checkResult[] = $this->checkUsername($memberModel, $conditions['username']);
			$checkResult[] = $this->checkNickName($conditions['realname']);
			$checkResult[] = $this->checkPassword($password);
			$checkResult[] = $this->checkEmail($memberModel, $conditions['email']);
			foreach ($checkResult as $result)
			{
				!empty($result) && $errorMessage .= $result['message'];
			}
			if(empty($errorMessage))
			{
				//加密密码
				$salt = $memberModel->getSalt();
				$password = $memberModel->formatPassword($password, $salt);
				$userInfo = array(	'username' => $conditions['username']
									,'realname' => $conditions['realname']
									,'gid' => $conditions['gid']
									,'password' => $password
									,'salt' => $salt
									,'email' => $conditions['email']
									,'regtime' => CURTIME
									,'regip' => \Core\Comm\Util::getClientIp()
									,'lastvisit' => CURTIME
									,'lastip' => \Core\Comm\Util::getClientIp()
									);
				if($uid = $memberModel->addUser($userInfo))
				{
					if($conditions['gid'] == 1)
					{
						$accessArr = array(
							'index_index',
							'index_home',
							'login_index',
							'login_login',
							'login_logout',
							'swfupload_upload',
							'ajax_pic',
							'swfupload_drop',
							'swfupload_setindex',
							'article_autosave',
							'article_module',
							'article_softupload',
							'ajax_locked'
						);

						M('User_Access')->setAccess($accessArr, $uid);
					}
					
					echo $this->returnJson(1, '添加用户成功');
				}
				else 
				{
					echo $this->returnJson(0, '添加用户失败');
				}
			}
			else 
			{
				echo $this->returnJson(0, $errorMessage);
			}
			exit;
		}
		//从queryString取得数据
		$conditionstr = trim($this->getParam('conditions'));
		$code = trim($this->getParam('code'));
		if(!empty($code) && strlen($conditionstr) > 0 && md5($conditionstr.$securecode)==$code) 
		{
			$tmpconditions = explode('||', $conditionstr);
			$conditions['username'] = trim($tmpconditions[0]);
			$conditions['realname'] = trim($tmpconditions[1]);
			$conditions['email'] = trim($tmpconditions[2]);
		}
		//取得用户组信息列表
		$groupList = $groupModel->getGroupList(null, 'gid');
		foreach ($groupList as $value)
			$usergroups[$value['gid']] = array('type'=>$value['type'], 'title'=>$value['title']);
		$this->assign('usergroups', $usergroups);
		$this->assign('conditions', $conditions);
		
		$this->display('admin/user_add.tpl');
	}
	
	/**
	 * 编辑用户
	 */
	public function editAction()
	{		

		//queryString加密码
		$securecode = 'adminuseredit';
		$memberModel = new \Model\User\Member();
		$groupModel = new \Model\User\Group();
		$conditions['uid'] = intval($this->getParam('uid'));
		if (trim($this->getParam('action'))=='edit')
		{
			$conditions['username'] = trim($this->getParam('username'));
			$password = trim($this->getParam('password'));
			$conditions['realname'] = trim($this->getParam('realname'));
			$conditions['gid'] = trim($this->getParam('gid'));
			$gender = intval($this->getParam('gender'));
			$marry = intval($this->getParam('marry'));
			$birthyear = intval($this->getParam('birthyear'));
			$birthmonth = intval($this->getParam('birthmonth'));
			$birthday = intval($this->getParam('birthday'));
			$occupation = intval($this->getParam('occupation'));
			$conditions['email'] = trim($this->getParam('email'));
			$conditions['telephone'] = trim($this->getParam('telephone'));
			$summary = trim($this->getParam('summary'));
			$userInfo = $conditions;
			if(strlen($password) > 0)
			{
				$userInfo['salt'] = $memberModel->getSalt();
				$userInfo['password'] = $memberModel->formatPassword($password, $userInfo['salt']);
			}

	        //if($this->checkEmail($memberModel, $userInfo['email'], $userInfo['uid']))
		        //$this->showmsg('邮箱已被注册！', '');
		    
			if($memberModel->editUserInfo($userInfo))
			{
				$birth = \Core\Fun::strtotime($birthyear . '-' . $birthmonth . '-' . $birthday);
				$data = array(
					'gender' => $gender,
					'birthday' => $birth,
					'occupation' => $occupation,
					'summary' => $summary,
					'marry' => $marry
				);
				M('user_Detail')->editDetail($userInfo['uid'], $data);
				echo $this->returnJson(1, '用户资料更改成功！');
			}
			else
			{ 
				echo $this->returnJson(0, '用户资料更改失败！');
			}
		}
		else
		{
			//取得用户组信息列表
			$groupList = $groupModel->getGroupList(null, 'gid');
			foreach ($groupList as $value)
				$usergroups[$value['gid']] = array('type'=>$value['type'], 'title'=>$value['title']);
			$this->assign('usergroups', $usergroups);
	
			$conditions = $memberModel->getUserInfoByUid($conditions['uid']);
			$detail = M('User_Detail')->getInfoByUid($conditions['uid']);
			$conditions['gender'] = $detail['gender'];
			$conditions['occupation'] = $detail['occupation'];
			$conditions['summary'] = $detail['summary'];
			$conditions['marry'] = $detail['marry'];
			$birth = explode('-', \Core\Fun::date('Y-m-d', $detail['birthday']));
			
			$conditions['birthyear'] = empty($birth[0]) ? 1950 : $birth[0];
			$conditions['birthmonth'] = empty($birth[1]) ? 1 : $birth[1];
			$conditions['birthday'] = empty($birth[2]) ? 1 : $birth[2];
			$this->assign('conditions', $conditions);

			//取得个人设置配置信息
			$setting = include CONFIG_PATH . 'setting.php';
			$this->assign('setting', $setting);
			$this->assign('sgid', $_SESSION['isadmin']);
			$this->display('admin/user_edit.tpl');
		}
	}
	
	public function changeAction()
	{
		$uid = intval($this->getParam('uid'));
		$field = $this->getParam('field');
		$value = intval($this->getParam('value'));
		M('User_Member')->editUserInfo(array(
			'uid' => $uid,
			$field => $value
		));
		$this->showmsg('用户资料更改成功！', 'admin/user/search');
	}

	/**
	 * 搜索用户
	 */
	public function searchAction()
	{
		//queryString加密码
		$securecode = 'adminusersearch';
		$memberModel = new \Model\User\Member();
		$groupModel = new \Model\User\Group();
		//取得数据
		$conditionstr = trim($this->getParam('conditions'));
		$code = trim($this->getParam('code'));
		if(!empty($code) && strlen($conditionstr) > 0 && md5($conditionstr.$securecode)==$code) 
		{
			$tmpconditions = explode('||', $conditionstr);
			$conditions['type'] = trim($tmpconditions[0]);
			$conditions['keyword'] = trim($tmpconditions[1]);
			$conditions['gid'] = intval($tmpconditions[2]);
			$conditions['gender'] = intval($tmpconditions[3]);
			$conditions['regdate'] = intval($tmpconditions[4]);
			$conditions['lastvisit'] = intval($tmpconditions[5]);
		}
		else
		{
			$conditions['type'] = trim($this->getParam('type'));
			$conditions['keyword'] = trim($this->getParam('keyword'));
			$conditions['gid'] = intval($this->getParam('gid'));
			$conditions['gender'] = intval($this->getParam('gender'));
			$conditions['regdate'] = intval($this->getParam('regdate'));
			$conditions['lastvisit'] = intval($this->getParam('lastvisit'));
		}
		$whereArr = array();
		//$whereArr = array(array('isbig', 1, '!='), array('ismarry', 1, '!='), array('isbrand', 1, '!='));
		!empty($conditions['keyword']) && $whereArr[] = array($conditions['type'], $conditions['keyword'], 'LIKE');
		!empty($conditions['gid']) && $whereArr[] = array('gid', $conditions['gid']);
		!empty($conditions['gender']) && $whereArr[] = array('gender', $conditions['gender']);
		$istec = trim($this->getParam('istec'));
		!empty($istec) && $whereArr[] = array('istec', 1);
		switch ($conditions['regdate'])
		{
			case 1:
				$whereArr[] = array('regtime', strtotime('-7 day'), '>');
				break;
			case 2:
				$whereArr[] = array('regtime', strtotime('-14 day'), '>');
				break;
			case 3:
				$whereArr[] = array('regtime', strtotime('-30 day'), '>');
				break;
			case 4:
				$whereArr[] = array('regtime', strtotime('-180 day'), '>');
				break;
			case 5:
				$whereArr[] = array('regtime', strtotime('-365 day'), '>');
				break;
			case 6:
				$whereArr[] = array('regtime', strtotime('-365 day'), '<=');
				break;
			default :
				break;
		}
		switch ($conditions['lastvisit'])
		{
			case 1:
				$whereArr[] = array('lastvisit', strtotime('-7 day'), '>');
				break;
			case 2:
				$whereArr[] = array('lastvisit', strtotime('-14 day'), '>');
				break;
			case 3:
				$whereArr[] = array('lastvisit', strtotime('-30 day'), '>');
				break;
			case 4:
				$whereArr[] = array('lastvisit', strtotime('-180 day'), '>');
				break;
			case 5:
				$whereArr[] = array('lastvisit', strtotime('-365 day'), '>');
				break;
			case 6:
				$whereArr[] = array('lastvisit', strtotime('-365 day'), '<=');
				break;
			default :
				break;
		}
		//用户数量
		$userCount = $memberModel->getUserCount($whereArr);
		$this->assign('userscount', $userCount);
		//分页
		$perpage = C('admin_page_size', 'basic', 20);
		$curpage = $this->getParam('page') ? intval($this->getParam('page')) : 1;
		$conditionstr = implode('||', $conditions);
		$md5str = md5($conditionstr.$securecode);
		$mpurl = 'admin/user/search/conditions/'.$conditionstr.'/code/'.$md5str.'/';
		$multipage = $this->multipage($userCount, $perpage, $curpage, $mpurl);
		$this->assign('multipage', $multipage);
		//用户列表
		$userList = $memberModel->getUserList($whereArr, 'uid desc', array($perpage, $perpage*($curpage-1)));
		foreach($userList AS $u)
		{
			$memberModel->editUserInfo(array(
				'uid' => $u['uid'],
				'tecview' => 1
			));
		}
		$this->assign('users', $userList);
		//用户组列表
		$groupList = $groupModel->getGroupList(null, 'gid');
		foreach ($groupList as $value)
		{
			$usergroups[$value['gid']] = array('type'=>$value['type'], 'title'=>$value['title']);
		}
		$this->assign('usergroups', $usergroups);
		//查询条件
		$this->assign('conditions', $conditions);
		
		$this->assign('sgid', $_SESSION['isadmin']);
		
		$this->display('admin/user_search.tpl');
	}
	
	/**
	 * 屏蔽用户
	 */
	public function shieldAction()
	{

		$memberModel = new \Model\User\Member();
		$gid = intval($this->getParam('gid'));
		$uid = intval($this->getParam('uid'));
		if($memberModel->editUserInfo(array('uid'=>$uid, 'gid'=>$gid)))
			$this->showmsg('操作成功');
		else
			$this->showmsg('操作失败');
	}
	
	/**
	 * 删除用户
	 */
	public function deleteAction()
	{
		$memberModel = new \Model\User\Member();
		$deleteids = is_array($this->getParam('id')) ? $this->getParam('id') : array();
		$ucrt=1;
        if($ucrt){
			foreach ($deleteids as $id)
			{
				$memberModel->deleteUserByUid(intval($id));
			}
        }
		echo $this->returnJson(1, '用户列表更新成功');
	}
	
	public function privAction()
	{
		$uid = $this->getParam('uid');
		$memberModel = new \Model\User\Member();
		if (trim($this->getParam('action'))=='access')
		{
			$accessnew = $this->getParam('accessnew');
			M('User_Access')->setAccess($accessnew, $uid);
			echo $this->returnJson(1, '编辑用户权限成功');
		}
		else
		{
			//取得用户权限
			$accessList = M('User_Access')->getAccess($uid);

			//取得权限列表
			$authTree = include CONFIG_PATH . 'authtree.php';
			$this->assign('adminprivs', $authTree['admin']);
			$this->assign('admin_checkboxes', $authTree['admin']);
			$this->assign('admin_checked', $accessList);
			$this->assign('privuser', $memberModel->getUserInfoByUid($uid));
			$this->display('admin/user_priv.tpl');
		}
		
	}
	
	/**
     * 输出国家JSON列表
     */
	public function getnationAction($citys)
    {
    	$citys = \Core\Comm\City::$cityConfig;
    	foreach ($citys as $key => $value)
    	{
    		$list[$key] = $value['name'];
    	}
    	echo json_encode($list);
    }
    
    /**
     * 输出省份JSON列表
     */
    public function getprovinceAction()
    {
    	$citys = \Core\Comm\City::$cityConfig;
    	$nationIndex = trim($this->getParam('nation'));
    	if(!empty($nationIndex))
    	{
			foreach ($citys[$nationIndex]['province'] as $key => $value)
	    	{
	    		$list[$key] = $value['name'];
	    	}
	    	echo json_encode($list);
    	}
    }
    
    /**
     * 输出城市JSON列表
     */
    public function getcityAction()
    {
    	$citys = \Core\Comm\City::$cityConfig;
    	$nationIndex = trim($this->getParam('nation'));
    	$provinceIndex = trim($this->getParam('province'));
    	if(!empty($nationIndex)) 
    	{
			foreach ($citys[$nationIndex]['province'][$provinceIndex]['city'] as $key => $value)
	    	{
	    		$list[$key] = $value;
	    	}
	    	echo json_encode($list);
    	}
    }
    
	/**
	 * 验证字符串长度
	 *
	 * @param string $str
	 * @param int $minlen
	 * @param int $maxlen
	 * @return boolean
	 */
	public function checkLength($str, $minlen, $maxlen) 
	{
		$len = strlen($str);
		if($len > $maxlen || $len < $minlen) 
		{
			return 1;
		}
		return 0;
	}
	
	/**
	 * 验证用户名
	 *
	 * @param string $username
	 * @return array
	 */
	public function checkUsername($memberModel, $username) 
	{
		$minlen = 3;
		$maxlen = 30;
		if($this->checkLength($username, $minlen, $maxlen)) 
		{
			return array('errorcode'=>'1', 'message'=>'用户名长度不符合字符数'.$minlen.'-'.$maxlen.'的要求<br>');
		}
		
	    $guestexp = '\xA1\xA1|\xAC\xA3|^Guest|^\xD3\xCE\xBF\xCD|\xB9\x43\xAB\xC8';
		if(preg_match("/\s+|^c:\\con\\con|[%,\*\"\s\<\>\&]|$guestexp/is", $username))
	    {
			return array('errorcode'=>'1', 'message'=>'帐号格式不正确<br>');
		}		
		
		return 0;
	}
	
	/**
	 * 验证昵称
	 *
	 * @param string $nickname
	 * @return array
	 */
	public function checkNickName($nickname) 
	{
		$minlen = 1;
		$maxlen = 32;
		if($this->checkLength($nickname, $minlen, $maxlen)) 
		{
			return array('errorcode'=>'3', 'message'=>'姓名长度不符合字符数'.$minlen.'-'.$maxlen.'的要求<br>');
		}
		return 0;
	}
	
	/**
	 * 验证密码
	 *
	 * @param string $password
	 * @return array
	 */
	public function checkPassword($password) 
	{
		if(strlen($password) < 1)
		{
			return array('errorcode'=>'4', 'message'=>'密码不能为空<br>');
		}
		return 0;
	}
	
	/**
	 * 验证邮箱
	 *
	 * @param string $email
	 * @return array
	 */
	public function checkEmail($memberModel, $email, $uid=0) 
	{
		if($memberModel->checkEmailExists($email, $uid)) 
		{
			return array('errorcode'=>'2', 'message'=>'邮箱已被注册<br>');
		}
		return 0;
	}
}
