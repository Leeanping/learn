<?php
namespace Controller\Index;

use Core\Controller\TAction;
/**
 * vpcvcms
 * 企业拓展页面
 */
class Company extends TAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
	}
    public function indexAction()
    {
		$this->display('company/index.tpl');
    }

    public function bookingAction()
    {
    	$kind = $this->getParam('kind');

    	$this->assign('kind', $kind);
    	$this->display('company/booking.tpl');
    }

    public function infoAction()
    {
    	$kind = $this->getParam('kind');
        $destination = $this->getParam('destination');
        $starttime = $this->getParam('starttime');
        $day = $this->getParam('day');
        $people = $this->getParam('people');
        $realname = $this->getParam('realname');
        $telephone = $this->getParam('telephone');
    	if(!$kind)
    		$this->showmsg('请选择定制类型', 'company');
        if(empty($destination))
            $this->showmsg('请填写目的地', 'company/booking/kind/' . $kind);
        if(empty($starttime))
            $this->showmsg('请填写出发时间', 'company/booking/kind/' . $kind);
        if(empty($day))
            $this->showmsg('请填写旅行天数', 'company/booking/kind/' . $kind);
        if(empty($people))
            $this->showmsg('请填写旅行人数', 'company/booking/kind/' . $kind);
        if(empty($realname))
            $this->showmsg('请填写联系人姓名', 'company/booking/kind/' . $kind);
        if(empty($telephone))
            $this->showmsg('请填写手机号码', 'company/booking/kind/' . $kind);
    	$data = array(
    		'kind' => $kind,
    		'destination' => $this->getParam('destination'),
    		'starttime' => $this->getParam('starttime'),
    		'day' => $this->getParam('day'),
    		'people' => $this->getParam('people'),
    		'money' => $this->getParam('money'),
    		'content' => $this->getParam('content'),
    		'realname' => $this->getParam('realname'),
    		'telephone' => $this->getParam('telephone'),
    		'company' => $this->getParam('company'),
    		'qq' => $this->getParam('qq'),
    		'useable' => 0,
    		'addtime' => CURTIME
    	);

    	if(M('booking')->add($data))
    	{
    		$this->showmsg('需求提交成功，请等待客服联系', 'company');
    	}
    	else
    	{
    		$this->showmsg('需求提交失败', 'company/booking/kind/' . $kind);
    	}
    }
}