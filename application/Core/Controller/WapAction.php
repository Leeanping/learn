<?php
namespace Core\Controller;

use Core\Controller\Action;


/** 

 * wap模块控制器基类 => 如果wap

 *

 * @version $Id: Core_Controller_WapAction.php $

 * @package Core

 * @time 2013/01/28

 */

class WapAction extends Action

{

    

    //登录用户信息

    protected $userInfo = array();



    /**

     * 分发前执行的操作

     * 如有需要请重载

     * @author Icehu

     */

    public function preDispatch()

    {

        parent::preDispatch();

        

        //Wap是否关闭

        $wapOn = C('wap_on', 'wap', true);

        if(! $wapOn)

        {

            header('HTTP/1.1 404 Not Found');

            header("status: 404 Not Found");

            exit();

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
				
				if(! M('Base_Token')->getTokenInfoByUidAndSign($authTokenArr[0], $authTokenArr[1]))
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
        $front = \Core\Controller\Front::getInstance();

        $pathinfo = $front->getPathinfo();

        $this->userInfo['pathinfo'] = $pathinfo;

        $this->assign('pathinfo', $pathinfo); //原始的pathinfo

        $this->assign('rawpathinfo', \Core\Fun::iurlencode($pathinfo)); //做过安全转义的url，使用需要Core_Fun::iurldecode
		$this->assign('user', $userInfo);

    }

	public function getUser()
	{
        $cUser = M('User_Member')->onGetCurrentUser();
		return $cUser;
	}

}