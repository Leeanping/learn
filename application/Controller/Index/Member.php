<?php
namespace Controller\Index;

use Core\Controller\MAction;
/**
 * vpcvcms
 * 会员操作页面
 * Snake.L
 */
class Member extends MAction
{

	public function preDispatch() 
	{
        parent::preDispatch();
	}

	public function profileAction()
	{
		$uid = $this->user['uid'];
		$data = array(
			'uid' => $uid,
			'realname' => $this->getParam('realname'),
			'email' => $this->getParam('email'),
			'qq' => $this->getParam('qq'),
            'wbname' => $this->getParam('wbname')
		);
		if(M('User_Member')->editUserInfo($data))
		{
			M('User_Detail')->editDetail($uid, array(
				'birthday' => \Core\Fun::strtotime($this->getParam('birthday')),
                'province' => $this->getParam('province'),
                'city' => $this->getParam('city'),
				'summary' => $this->getParam('summary'),
                'signature' => $this->getParam('signature')
			));

			$this->showmsg('资料更新成功', 'home');
		}
		else
		{
			$this->showmsg('资料更新失败', 'home');
		}
	}

	public function passwordAction()
	{
		$oldpwd = trim($this->getParam('oldpwd'));
		$pwd = trim($this->getParam('pwd'));
		$pwdconfirm = trim($this->getParam('pwdconfirm'));
		
		if(! \Model\User\Validator::checkPassword($pwd))
			$this->showmsg('密码为3~15位字符', 'home');
		if($pwd != $pwdconfirm)
			$this->showmsg('两次密码不一致', 'home');

		if(! M('User_Member')->checkUserOldPassword($this->user['username'], $oldpwd))
			$this->showmsg('旧密码不正确', 'home');
		$conditions['uid'] = intval($this->user['uid']);
		$conditions['salt'] = M('User_Member')->getSalt();
		$conditions['password'] = M('User_Member')->formatPassword($pwd, $conditions['salt']);
		//将密码更新到数据库
		if(M('User_Member')->editUserInfo($conditions))
			$this->showmsg('密码修改成功', 'home');
		else
			$this->showmsg('密码修改失败', 'home');
	}

	public function changefaceAction()
    {
    	$uid = $this->user['uid'];
        $img = $this->getParam('img');
		$x = $this->getParam('x');
		$y = $this->getParam('y');
		$w = $this->getParam('w');
		$h = $this->getParam('h');
		$rt = \Core\Util\Upload::thumbPic($img, $x, $y, $w, $h);

		if($rt['result_code'] == 1)
		{
			$user = M('User_Member')->getUserInfoByUid($uid);
			\Core\Fun\File::delete(BASEROOT . $user['headpic']);
			\Core\Fun\File::delete(BASEROOT . $user['headpic30']);
			\Core\Fun\File::delete(BASEROOT . $user['headpic50']);
			\Core\Fun\File::delete(BASEROOT . $user['headpic150']);
			$data = array(
				'uid' => $uid,
				'headpic' => $rt['result_des']['normal'],
				'headpic30' => $rt['result_des']['small'],
				'headpic150' => $rt['result_des']['big'],
				'headpic50' => $rt['result_des']['middle']
			);
			$update = M('User_Member')->editUserInfo($data);
			if($update)
			{
				$arr['msg'] = 1;
				$arr['imgurl'] = $rt['result_des']['big'];
			}
			else
			{
				$arr['msg'] = 0;
				$arr['imgurl'] = '';
			}
		}
		else
		{
			$arr['msg'] = 0;
			$arr['imgurl'] = '';
		}
		echo \Core\Fun::array2json($arr);
    }

    /**
     * 输出地区JSON列表
     */
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
}
?>