<?php
namespace Controller\Wap;

use Core\Controller\WapAction;
/**
 * vpcvcms
 * 手机首页
 */
class Index extends WapAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
	}
    public function indexAction()
    {
		$this->display('wap/index.tpl');
    }

    public function leavingAction()
    {
        $realname = $this->getParam('realname');
        $telephone = $this->getParam('telephone');
        $email = $this->getParam('email');
        $qq = $this->getParam('qq');
        $message = $this->getParam('message');

        if(empty($realname))
            $this->showmsg('请输入您的姓名');
        if(empty($telephone))
            $this->showmsg('请输入联系电话');
        if(empty($message))
            $this->showmsg('请输入您的留言');

        $data = array(
            'realname' => $realname,
            'telephone' => $telephone,
            'email' => $email,
            'qq' => $qq,
            'message' => $message,
            'addtime' => CURTIME
        );

        if(M('leaving')->add($data))
            $this->showmsg('留言成功');
        else
            $this->showmsg('留言失败');
    }
}