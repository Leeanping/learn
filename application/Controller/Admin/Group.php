<?php
namespace Controller\Admin;

use Core\Controller\Action;
/**

 * 组设置

 */

class Group extends Action

{

	/**

	 * 管理组权限

	 */

	public function accessAction()

	{

		$groupModel = new \Model\User\Group();

		$gid = intval($this->getParam('gid'));

		if (trim($this->getParam('action'))=='access')

		{

			$accessnew = is_array($this->getParam('accessnew')) ? $this->getParam('accessnew') : array();

			$accessArr = array();

			foreach ($accessnew as $value)

			{

				$accessArr[trim($value)] = 1;

			}

			\Model\User\Access::delAccess($gid);

			\Model\User\Access::setAccess($accessArr, $gid);

			$this->showmsg('编辑组权限成功', 'admin/group/access/gid/'.$gid);

		}

		//取得组信息

		$group = $groupModel->getGroupInfoByGid($gid);

		$this->assign('group', $group);

		//取得组权限

		$accessArr = \Model\User\Access::getAccess($gid);

		$accessList = array();

		foreach ((array)$accessArr as $key => $value)

		{

			$value && $accessList[] = $key;

		}

		//取得权限列表

		$authTree = include CONFIG_PATH . 'authtree.php';

		$this->assign('user_checkboxes', $authTree['user']);

		$this->assign('user_checked', $accessList);

		$this->assign('admin_checkboxes', $authTree['admin']);

		$this->assign('admin_checked', $accessList);

		

		$this->display('admin/group_access.tpl');

	}

	

	/**

	 * 管理组

	 */

	public function manageAction()

	{

		$groupModel = new \Model\User\Group();

		$type = $this->getParam('type');

		if(trim($this->getParam('action'))=='manage')

		{

			$errorMessage = '';

			$deleteids = is_array($this->getParam('deleteids')) ? $this->getParam('deleteids') : array();

			foreach ($deleteids as $id)

			{

				$groupModel->deleteGroupByGid(intval($id));

			}

			

			$titlenew = is_array($this->getParam('titlenew')) ? $this->getParam('titlenew') : array();

			$mins = $this->getParam('min');

			$maxs = $this->getParam('max');

			$starnums = $this->getParam('starnum');

			$colors = $this->getParam('color');

			foreach($titlenew as $gid => $title) 

			{

				$gid = intval($gid);

				$title = trim($title);

				$min = $mins[$gid];

				$max = $maxs[$gid];

				$starnum = $starnums[$gid];

				$color = $colors[$gid];

				$groupModel->editGroupInfo(array('gid'=>$gid, 'title'=>$title, 'min' => $min, 'max' => $max, 'starnum' => $starnum, 'color' => $color));

			}

			if($this->getParam('newtitle'))

			{

				$title = $this->getParam('newtitle');

				$mins = $this->getParam('newmin');

				$maxs = $this->getParam('newmax');

				$starnums = $this->getParam('newstarnum');

				$type = $this->getParam('type');

				foreach($title AS $i => $t)

				{

					$data = array(

						'title' => $t,

						'min' => $mins[$i],

						'max' => $maxs[$i],

						'starnum' => $starnums[$i],

						'type' => $type,

						'kind' => 1

					);

					$groupModel->addGroup($data);

				}

			}

			

			$this->showmsg('更新组列表成功');

		}

		//取得组列表

		$groupList = $groupModel->getGroupList(array(array('type', $type)), 'gid');

		array_unshift($groupList," ");	 

		unset($groupList[0]);

		foreach ($groupList as $value)

		{

			$usergroups[$value['gid']] = array('type'=>$value['type'], 'title'=>$value['title'], 'kind' => $value['kind'], 'min' => $value['min'], 'max' => $value['max'], 'starnum' => $value['starnum'], 'color' => $value['color']);

		}

		$userModel = new \Model\User\Member();

		foreach ($usergroups as $key=>$value)

		{

			$usergroups[$key]['usernum'] = $userModel->getUserCount(array(array('gid', $key)));

			$conditionstr = 'nickname||||'.$key.'||0||0||0';

			$code = md5($conditionstr.'adminusersearch');

			$usergroups[$key]['url'] = '/admin/user/search/conditions/'.$conditionstr.'/code/'.$code;

		}

		$this->assign('usergroups', $usergroups);

		$this->assign('type', $type);

		$this->display('admin/group_manage.tpl');

	}

}

