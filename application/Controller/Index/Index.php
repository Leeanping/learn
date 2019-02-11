<?php
namespace Controller\Index;

use Core\Controller\TAction;
/**
 * vpcvcms
 * 网站首页
 */
class Index extends TAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
	}
    public function indexAction()
    {
		$this->display('index/index.tpl');
    }

    public function noneAction()
    {
    	$this->display('index/none.tpl');
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

        if(C::M('leaving')->add($data))
            $this->showmsg('留言成功');
        else
            $this->showmsg('留言失败');
    }
}