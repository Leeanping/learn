<?php
namespace Controller\Index;

use Core\Controller\TAction;
/**
 * CD
 * 会员操作页面
 * Snake.L
 */
class U extends TAction
{
	private $userModel;

	public function preDispatch() 
	{
        parent::preDispatch();
		$this->userModel = new \Model\User\Member();
		$this->assign('current', 'home');
	}
	
	public function entryAction()
	{
		$cUser = $this->userModel->onGetCurrentUser();
		if(!empty($cUser['uid']))
		{
			$this->showmsg('', 'home', 0);
		}
		else
		{
			$this->display('reg/entry.tpl');
		}
	}
	
	public function regAction()
	{
		$cUser = $this->userModel->onGetCurrentUser();
		if(!empty($cUser['uid']))
		{
			$this->showmsg('', 'home', 0);
		}
		else
		{
			$gid = $this->getParam('gid');
			$gid = $gid ? $gid : 14;
			$this->assign('gid', $gid);
			$this->display('reg/reg.tpl');
		}
	}
	
	public function doregAction()
	{
		$username = $this->getParam('username');
        $pwd = $this->getParam('password');
        $pwdconfirm = $this->getParam('cpassword');
		$gid = $this->getParam('gid');
        $email = $this->getParam('email');
		if(empty($username))
			$this->showmsg('请输入用户名');
		//邮箱格式不正确
        if (!\Core\Comm\Validator::isEmail($email))
            $this->showmsg('邮箱格式不正确');
		if(empty($pwd))
			$this->showmsg('请输入密码');
        //密码不匹配
        if ($pwd != $pwdconfirm)
            $this->showmsg('两次密码输入不一致');
        
		/*if (!\Core\Lib\Gdcheck::check($this->getParam('gdkey')))
			$this->showmsg('验证码不正确');*/

		if ($this->userModel->checkUsernameExists($username))
			$this->showmsg('用户名已经存在');
		$uid = $this->userModel->onRegister($username, $pwd, $email);
		
		//注册成功
        if ($uid) 
		{
            //设置会话保持
            $this->userModel->onSetCurrentUser($uid, null, null);
            $userInfo['uid'] = $uid;
			$userInfo['username'] = $username;
			$userInfo['gid'] = $gid;
			$userInfo['regip'] = \Core\Comm\Util::getClientIp();
			$userInfo['regtime'] = CCURTIME;
            $this->userModel->editUserInfo($userInfo);
            $this->userModel->onSetCurrentUser($uid, $userInfo['username'], $gid);
        	$this->showmsg('', 'home', 0);
		}
	}
	
	public function loginAction()
	{
		$cUser = $this->userModel->onGetCurrentUser();
		if(!empty($cUser['uid']))
		{
			$this->showmsg('', 'home', 0);
		}
		else
		{
			$referurl = \Core\Fun::iurldecode($this->getParam('refer'));
			$refer = !empty($referurl) ? $referurl : '';
			$this->assign('refer', $refer);
			$this->display('login/login.tpl');
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
        $autologin = $this->getParam('autologin');
		if(empty($username))
			$this->showmsg('请输入用户名');
		//邮箱格式不正确
        /*if (!Core_Comm_Validator::isEmail($username))
            $this->showmsg('邮箱格式不正确');*/
		if(empty($pwd))
			$this->showmsg('请输入密码');
		$user = $this->userModel->onLogin($username, $pwd);

		if(empty($user))
		{
        	$this->showmsg('用户名或密码错误', 'u/login');
		}
		$this->userModel->onSetCurrentUser($user['uid'], $user['username'], $user['gid']);
		$tokenModel = new \Model\Base\Token();
        $sign = \Core\Comm\Token::_generate_key();
        if($autologin && $tokenModel->addToken(array('uid' => $user['uid'], 'sign' => $sign)))
		//if($tokenModel->addToken(array('uid' => $user['uid'], 'sign' => $sign)))
		{
            $this->setCookie('vpcv_token', \Core\Comm\Token::authcode($user['uid'] . "\t" . $sign, 'ENCODE'), 3600 * 24 * 30);
		}
		$this->userModel->onSetLastVisit($user['uid']);
		$refer = $this->getParam('refer');
		$url = $refer ? $refer : \Core\Fun::getreffer();
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
				$email = $this->getParam('email');
				//用户名为空
				if(empty($username))
					$this->showmsg('用户名不能为空', 'u/find');
				//用户不存在
				if(! $user = $this->userModel->getUserInfoByUsername($username))
					$this->showmsg('用户不存在', 'u/find');
				if($email != $user['email'])
					$this->showmsg('用户信息不匹配', 'u/find');
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
		$this->display('login/find.tpl');
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
				$this->showmsg('密码重置成功', 'home');
			}
			else
			{
				$this->showmsg('修改密码失败');
			}
        }

        if(!$_SESSION['changeuser'])
        	$this->showmsg('', 'login', 0);
		$this->assign('changeuser', $_SESSION['changeuser']);

        $this->display('login/change.tpl');
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
				$this->showmsg('', 'index', 0);
			}
			else
			{
				$rand = mt_rand(0, 99999);
				$openuser = \Core\Outapi\Qc::GetUserInfo($openid, $token);
				C::M('User_Member')->addUser(array(
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
				$this->showmsg('', 'index', 0);
			} 
		}
		else
		{
			$this->showmsg('登陆错误', 'index');
		}
	}
	
	public function sinaAction()
	{
		include_once( ROOT . 'sina/config.php' );
		include_once( ROOT . 'sina/saetv2.ex.class.php' );
		$o = new \SaeTOAuthV2( WB_AKEY , WB_SKEY );

		$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );

		$this->showmsg('', $code_url, 0);
	}

	public function sinabindAction()
	{
		include_once( ROOT . 'sina/config.php' );
		include_once( ROOT . 'sina/saetv2.ex.class.php' );
		$o = new \SaeTOAuthV2( WB_AKEY , WB_SKEY );
		if (isset($_REQUEST['code'])) 
		{
			$keys = array();
			$keys['code'] = $_REQUEST['code'];
			$keys['redirect_uri'] = WB_CALLBACK_URL;
			$token = $o->getAccessToken( 'code', $keys ) ;
		}
		if ($token) 
		{
			$sinauid = $o->get_uid();
			$connect = $this->userModel->getUserInfoByConnectid($sinauid);
			
			if(!empty($connect))
			{
				$user = $this->userModel->onLoginByConnectid($sinauid);
				if(empty($user))
				{
					$this->showmsg('登陆错误', 'index');
				}
				$this->userModel->onSetCurrentUser($user['uid'], $user['username']);
				$this->userModel->onSetLastVisit($user['uid']); 
				$this->showmsg('', 'index', 0);
			}
			else
			{
				$rand = mt_rand(0, 99999);
				C::M('User_Member')->addUser(array(
					'username' => 'sina' . $rand,
					'connectid' => $sinauid,
					'roleid' => 1,
					'regtime' => time (),
            		'regip' => \Core\Comm\Util::getClientIp (),
            		'lastvisit' => time (),
            		'lastip' => \Core\Comm\Util::getClientIp ()
				));
				$user = $this->userModel->onLoginByConnectid($sinauid);
				$this->userModel->onSetCurrentUser($user['uid'], $user['username']);
				$this->userModel->onSetLastVisit($user['uid']); 
				$this->showmsg('', 'index', 0);
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
}
?>