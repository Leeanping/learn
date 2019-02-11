<?php
namespace Controller\Wap;

use Core\Controller\WapAction;
/**
 * CD
 * 会员操作页面
 * Snake.L
 */
class U extends WapAction
{
	private $userModel;

	public function preDispatch() 
	{
        parent::preDispatch();
		$this->userModel = new \Model\User\Member();
		$this->assign('current', 'home');
	}
	
	public function regAction()
	{
		$cUser = $this->userModel->onGetCurrentUser();
		if(!empty($cUser['uid']))
		{
			$this->showmsg('', 'wap/home', 0);
		}
		else
		{
			$this->display('wap/reg.tpl');
		}
	}
	
	public function doregAction()
	{
		$username = $this->getParam('username');
        $pwd = $this->getParam('password');
        $pwdconfirm = $this->getParam('cpassword');
		$roleid = $this->getParam('roleid');
        //$email = $this->getParam('email');
		$telephone = $username;
		$uvalid = $this->getParam('vaild');
		if(empty($uvalid))
			$this->showmsg('请输入验证码');
		if(empty($username))
			$this->showmsg('请输入用户名');
		if(empty($pwd))
			$this->showmsg('请输入密码');
        //密码不匹配
        if ($pwd != $pwdconfirm)
            $this->showmsg('两次密码输入不一致');
		//邮箱格式不正确
        //if (!Core_Comm_Validator::isEmail($email))
            //$this->showmsg('邮箱格式不正确');
		
		$uvalid = strtolower($uvalid);
		$valid = M('Base_Valid')->getValidInfoByTelephoneAndType($username, 'reg');
		$sign = strtolower($valid['sign']);
		if($sign && $uvalid && $sign == $uvalid)
		{
			if ($this->userModel->checkUsernameExists($username))
				$this->showmsg('用户名已经存在');
			$uid = $this->userModel->onRegister($username, $pwd, '');
			
			//注册成功
			if ($uid) 
			{
				M('Base_Valid')->updateValidByTelephoneAndType($username, 'reg');
				//设置会话保持
				$this->userModel->onSetCurrentUser($uid, null, null);
				$userInfo['uid'] = $uid;
				$userInfo['username'] = $username;
				$userInfo['gid'] = 2;
				$userInfo['roleid'] = $roleid;
				$userInfo['telephone'] = $telephone;
				$userInfo['regip'] = \Core\Comm\Util::getClientIp();
				$userInfo['regtime'] = CURTIME;
				$this->userModel->editUserInfo($userInfo);
				$this->userModel->onSetCurrentUser($uid, $userInfo['username'], $roleid);
				if($roleid == 2)
				{
					$this->showmsg('注册成功', 'wap/home');
				}
				else
				{
					$this->showmsg('', 'wap/home', 0);
			    }
			}
		}
		else
		{
			$this->showmsg('验证码不正确');
		}
	}
	
	public function loginAction()
	{
		$cUser = $this->userModel->onGetCurrentUser();
		if(!empty($cUser['uid']))
		{
			$this->showmsg('', 'wap/home', 0);
		}
		else
		{
			$referurl = \Core\Fun::iurldecode($this->getParam('refer'));
			$refer = !empty($referurl) ? $referurl : '';
			$this->assign('refer', $refer);
			$this->display('wap/login.tpl');
		}
	}
	
	public function checkuserAction()
	{
		$username = $this->getParam('username');
		if(preg_match('/^[0-9]+$/', $username) && strlen($username) == 6)
		{
			$arr['user'] = 2;
		}
		else
		{
			$arr['user'] = 1;
		}
		$user = $this->userModel->checkUsernameExists($username);
		if($user > 0)
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo \Core\Fun::array2json($arr);
	}
	
	public function dologinAction()
	{
		$username = $this->getParam('username');
        $pwd = $this->getParam('password');
        //$autologin = $this->getParam('autologin');
		if(empty($username))
			$this->showmsg('请输入用户名');
		//邮箱格式不正确
        //if (!Core_Comm_Validator::isEmail($username))
            //$this->showmsg('邮箱格式不正确');
		if(empty($pwd))
			$this->showmsg('请输入密码');
		$user = $this->userModel->onLogin($username, $pwd);
		
		if(empty($user))
		{
        	$this->showmsg('用户名或密码错误', 'index');
		}
		$this->userModel->onSetCurrentUser($user['uid'], $user['username'], $user['roleid']);
		$tokenModel = new \Model\Base\Token();
        $sign = \Core\Comm\Token::_generate_key();
        if($autologin && $tokenModel->addToken(array('uid' => $user['uid'], 'sign' => $sign)))
		{
            $this->setCookie('vpcv_token', \Core\Comm\Token::authcode($user['uid'] . "\t" . $sign, 'ENCODE'), 3600 * 24 * 30);
		}
		$this->userModel->onSetLastVisit($user['uid']);
		$refer = $this->getParam('refer');
		$url = $refer ? $refer : 'wap/home/index';
        $this->showmsg('', $url, 0);
	}
	
	public function logoutAction()
	{
		$this->userModel->onLogout();
        $this->showmsg('', 'index', 0);
	}
	
	public function findAction()
	{
		if($this->getParam('action') == 'find')
		{
			if(C('open', 'mail', false))
			{
				$username = $this->getParam('username');
				$email = $username;
				//用户名为空
				if(empty($username))
					$this->showmsg('用户名不能为空', 'u/find');
				//用户不存在
				if(! $user = $this->userModel->getUserInfoByUsername($username))
					$this->showmsg('用户不存在', 'u/find');
				//生成令牌
				$tokenModel = new \Model\Base\Token();
				if(!$token = $tokenModel->getTokenInfoByUid($user['uid']))
				{
					$sign = \Core\Comm\Token::_generate_key();
					if($tokenModel->addToken(array('uid' => $user['uid'], 'sign' => $sign)))
						$tokenSign = $sign;
				}
				else
				{
					$tokenSign = $token['sign'];
				}
				//令牌生成失败，报发送邮件失败
				if(!$tokenSign)
					$this->showmsg('邮件发送失败', 'u/find');
				//发送邮件
				$url = \Core\Fun::getPathroot() . 'u/changepwd?uid='.$user['uid'].'&sign='.$tokenSign;
				$sendIsSucceed = \Core\Mail::send($user['email'], '找回密码',
										'亲爱的用户 '.$user['username'].' 你好<br /><br />
										请点击下面的链接修改你的密码，如果不能打开，请将地址拷贝到浏览器地址栏打开<br /><br />
										<a href="'.$url.'" target="_blank">'.$url.'</a><br /><br />
										如果这不是你发起的申请，请忽略该邮件<br /><br />谢谢', 0);
				//邮件已发送
				$sendIsSucceed && $this->showmsg('找回密码连接已发到邮箱，请点击更改密码', 'u/find');
				//邮件发送失败
				$this->showmsg('邮件发送失败，请联系管理员', 'u/find');
			}
			else
			{
				$this->assign('msg', '请联系管理员是否开启邮箱服务');
			}
		}
		$this->display('wap/find.tpl');
	}
	
	public function changepwdAction()
	{
		if($this->getParam('uid') && $this->getParam('sign'))
        {
            $tokenModel = new \Model\Base\Token();
            //令牌已失效
            if(! $tokenModel->getTokenInfoByUidAndSign($this->getParam('uid'), $this->getParam('sign')))
            	$this->showmsg('已失效，请重新找回', 'u/find');
            //用户被删除
            if(! $user = $this->userModel->getUserInfoByUid($this->getParam('uid')))
            	$this->showmsg('该用户不存在', 'u/login');
            $_SESSION['changeuser'] = $user['username'];
        }

        if($this->getParam('action') == 'change')
        {
        	$pwd = $this->getParam('pwd');
        	$pwdconfirm = $this->getParam('pwdconfirm');
            //用户被删除
            if(! $user = $this->userModel->getUserInfoByUsername($_SESSION['changeuser']))
            	$this->showmsg('该用户不存在', 'u/login');
            //密码不匹配
            if($pwd != $pwdconfirm)
            	$this->showmsg('两次输入密码不一致');
            $conditions['uid'] = intval($user['uid']);
			$conditions['salt'] = $this->userModel->getSalt();
			$conditions['password'] = $this->userModel->formatPassword($pwd, $conditions['salt']);
			//将密码更新到数据库
			if($this->userModel->editUserInfo($conditions))
			{
				//将登录状态赋给用户
				$this->userModel->onSetCurrentUser($user['uid'], $user['username']);
				$_SESSION['ucsynlogin']=1;
				$this->showmsg('', 'home', 0);
			}
			else
			{
				$this->showmsg('修改密码失败');
			}
        }

        if(!$_SESSION['changeuser'])
        	$this->showmsg('', 'login', 0);
		$this->assign('changeuser', $_SESSION['changeuser']);

        $this->display('wap/change.tpl');
	}
	
	public function qqAction()
	{
		$callback = SITEURL . 'u/qqbind';
		\Core\Outapi\Qc::setAppid();
		\Core\Outapi\Qc::setAppkey();
		\Core\Outapi\Qc::setCallback($callback);
		$url = \Core\Outapi\Qc::LoginUrl();
		$this->showmsg('', $url, 0);
	}
	
	public function qqbindAction()
	{
		$code = $this->getParam('code');
		$callback = SITEURL . 'u/qqbind';
		\Core\Outapi\Qc::setAppid();
		\Core\Outapi\Qc::setAppkey();
		\Core\Outapi\Qc::setCallback($callback);
		$token = \Core\Outapi\Qc::AccessToken($code);
		$openid = \Core\Outapi\Qc::GetOpenid($token);
		if(!empty($openid))
		{
			$connect = $this->userModel->getUserInfoByConnectid($openid);
			
			if(!empty($connect))
			{
				$user = $this->userModel->onLoginByConnectid($openid);
				if(empty($user))
				{
					$this->showmsg('登陆错误', 'index');
				}
				$this->userModel->onSetCurrentUser($user['uid'], $user['username']);
				$this->userModel->onSetLastVisit($user['uid']); 
				$this->showmsg('', 'home', 0);
			}
			else
			{
				$openuser = \Core\Outapi\Qc::GetUserInfo($openid, $token);
				M('User_Member')->addUser(array(
					'username' => 'qq' . $rand,
					'connectid' => $openid,
					'roleid' => 1,
					'regtime' => time (),
            		'regip' => \Core\Comm\Util::getClientIp (),
            		'lastvisit' => time (),
            		'lastip' => \Core\Comm\Util::getClientIp ()
				));
				$user = $this->userModel->onLoginByConnectid($openid);
				$this->userModel->onSetCurrentUser($user['uid'], $user['username']);
				$this->userModel->onSetLastVisit($user['uid']); 
				$this->showmsg('', 'home/index?nickname=' . $openuser['nickname'], 0);
			} 
		}
		else
		{
			$this->showmsg('登陆错误', 'index');
		}
	}
	
	public function ajaxcheckuserAction()
	{
		$username = $this->getParam('username');
		$num = $this->userModel->checkUsernameExists($username);
		if($num > 0)
		{
			$msg = 1;
		}
		else
		{
			$msg = 0;
		}
		echo \Core\Fun::array2json(array('msg' => $msg));
	}
	
	public function ajaxselectuserAction()
	{
		$username = $this->getParam('username');
		$num = $this->userModel->checkUsernameExists($username);
		if($num > 0)
		{
			$msg = 1;
		}
		else
		{
			$msg = 0;
		}
		echo \Core\Fun::array2json(array('msg' => $msg));
	}
	
	public function ajaxcheckemailAction()
	{
		$email = $this->getParam('email');
		$num = $this->userModel->checkEmailExists($email);
		if($num > 0)
		{
			$msg = 1;
		}
		else
		{
			$msg = 0;
		}
		echo \Core\Fun::array2json(array('msg' => $msg));
	}

	public function getprovinceAction()
    {
		$pid = $this->getParam('pid');
		$pid = $pid ? $pid : 1;
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
	
	public function findpasswordAction()
	{
		$cUser = $this->userModel->onGetCurrentUser();
		if(!empty($cUser['uid']))
		{
			$this->showmsg('', 'wap/home', 0);
		}
		else
		{
			$referurl = \Core\Fun::iurldecode($this->getParam('refer'));
			$refer = !empty($referurl) ? $referurl : '';
			$this->assign('refer', $refer);
			$this->display('wap/findpassword.tpl');
		}
	}
	
	public function dofindAction()
	{
		$username = $this->getParam('username');
        $pwd = $this->getParam('password');
        $pwdconfirm = $this->getParam('cpassword');
		$telephone = $username;
		$uvalid = $this->getParam('vaild');
		if(empty($uvalid))
			$this->showmsg('请输入验证码');
		if(empty($pwd))
			$this->showmsg('请输入密码');
        //密码不匹配
        if ($pwd != $pwdconfirm)
            $this->showmsg('两次密码输入不一致');
		
		$uvalid = strtolower($uvalid);
		$valid = M('Base_Valid')->getValidInfoByTelephoneAndType($username, 'find');
		$sign = strtolower($valid['sign']);
		if($sign && $uvalid && $sign == $uvalid)
		{
			$uid = M('User_Member')->getInfoByUsername('uid', $username);
			$conditions['uid'] = intval($uid);
			$conditions['salt'] = M('User_Member')->getSalt();
			$conditions['password'] = M('User_Member')->formatPassword($pwd, $conditions['salt']);
			if(M('User_Member')->editUserInfo($conditions))
			{
				M('Base_Valid')->updateValidByTelephoneAndType($username, 'find');
				$this->showmsg('密码修改成功', 'wap/u/login');
			}
			else
			{
				$this->showmsg('密码修改失败');
			}
		}
		else
		{
			$this->showmsg('验证码不正确');
		}
	}
}
?>