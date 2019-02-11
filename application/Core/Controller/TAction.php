<?php
namespace Core\Controller;

use Core\Controller\Action;
/**
 * 控制器基类
 *
 * @author Snake.L
 * @version $Id: Controller_Index_U.php $
 * @package Core
 * @time 2013/01/28
 */
class TAction extends Action
{
    //登录用户信息
    protected $userInfo = array();

    /**
     * 分发前执行的操作
     * 如有需要请重载
     * @author Snake.L
     */
    public function preDispatch()
    {
        parent::preDispatch();
        
        //Wap是否关闭
        $wapOn = \Core\Config::get('wap_on', 'wap', true);
        if(\Core\Comm\Validator::isMobile() && $wapOn)
        {
        	$url = str_replace($_SERVER['HTTP_HOST'], SITEURL . 'wap', $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
            $this->showmsg('', $url, 0);
            //$this->showmsg('', 'wap', 0);
            exit();
        }
		$statOn = \Core\Config::get('stat', 'basic', 0);
		if($statOn)
		{
			\Core\Util\Tutil::setStats();
		}
        $cUser = M('User_Member')->onGetCurrentUser();
        //验证用户是否已本地登录
        if(empty($cUser['uid']))
        {
            //验证是否有令牌
            if(! $token = $this->getCookie('vpcv_token'))
			{
				$userInfo = array();
			}
            else
			{
				//验证令牌
				$authTokenArr = explode("\t", \Core\Comm\Token::authcode($token));
				
				if(M('Base_Token')->getTokenInfoByUidAndSign($authTokenArr[0], $authTokenArr[1]))
				{
					\Core\Fun::setcookie('vpcv_token', null);
				}
				//验证用户是否存在
				if(! $localUser = M('User_Member')->getUserInfoByUid($authTokenArr[0]))
				{
					\Core\Fun::setcookie('vpcv_token', null);
				}
				
				//验证用户是否在屏蔽组
				if($localUser['gid'] == 9)
				{
					\Core\Fun::setcookie('vpcv_token', null);
					$this->showmsg('', 'index', 0);
				}
				
				//将登录状态赋给用户
				M('User_Member')->onSetCurrentUser($localUser['uid'], $localUser['username'], $localUser['roleid']);
				$userInfo = $localUser;
			}
        }
        else
        {
            //验证用户是否存在
            if(! $localUser = M('User_Member')->getUserInfoByUid($cUser['uid']))
            {
                M('User_Member')->onLogout();
            }
			else
			{
				$userInfo = $localUser;
				//验证用户是否在屏蔽组
				if($localUser['gid'] == 9)
				{
					M('User_Member')->onLogout();
					$this->showmsg('', 'index', 0);
				}
			}
        }
        $userInfo['detail'] = M('User_Detail')->getInfoByUid($userInfo['uid']);
        $this->userInfo = $userInfo;

        //设置导航栏
		$this->assign('user', $userInfo);
    }
	
	public function getUser()
	{
        $cUser = M('User_Member')->onGetCurrentUser();
		return $cUser;
	}
	
	public function getNavByModel($action)
	{
		return \Model\Nav::getNavByAction($action);
	}
	
	public function checkLogged()
	{
		$bool = false;
		if(M('User_Member')->checkLogged())
		{
			$bool = true;
		}
		return $bool;
	}
}
