<?php
namespace Controller\Wap;

use Core\Controller\WapAction;
/**
 * vpcvcms
 * 手机首页
 */
class Member extends WapAction
{
	private $_cUser;
	public function preDispatch() 
	{
        parent::preDispatch();
		$user = $this->getUser();
		if(!$user['uid'])
			$this->showmsg('', 'wap/u/login', 0);
		$this->_cUser = $user;
		$this->assign('current', 'home');
	}
	
    public function indexAction()
    {
		$this->showmsg('', 'wap/home', 0);
    }
	
	public function courseAction()
	{
		$uid = $this->_cUser['uid'];
		$organid = M('organ')->getOrganIdByUid($uid);
		if(!M('organ')->isCheck($organid))
			$this->showmsg('机构审核中...', 'wap/home');
		if(!$organid)
			$this->showmsg('', 'wap/home/organ', 0);
		$action = $this->getParam('action');
		if($action && $action == 'course')
		{
			$district = $this->getParam('district');
			$road = $this->getParam('road');
			$address = $this->getParam('address');
			$geo = \Core\Comm\Area::getLngLat('北京市' . $district . $road . $address);
			$timeyear = $this->getParam('timeyear');
			$timemonth = $this->getParam('timemonth');
			$timeday = $this->getParam('timeday');
			$endyear = $this->getParam('endyear');
			$endmonth = $this->getParam('endmonth');
			$endday = $this->getParam('endday');
			$endtime = \Core\Fun::strtotime($timeyear . '-' . $timemonth . '-' . $timeday);
			$enddate = \Core\Fun::strtotime($endyear . '-' . $endmonth . '-' . $endday);
			$mark = $this->getParam('mark');
			$mark = str_replace("\n", "<br />", $mark);
			$catid = $this->getParam('catid');
			$catarr = M('category')->getParendIds($catid);
			$data = array(
				'uid' => $uid,
				'organid' => $organid,
				'catid' => $catid,
				'catarr' => $catarr,
				'coursename' => $this->getParam('coursename'),
				'district' => $district,
				'road' => $road,
				'address' => $address,
				'lng' => $geo['lng'],
				'lat' => $geo['lat'],
				'brief' => $this->getParam('brief'),
				'price' => $this->getParam('price'),
				'pricebrief' => $this->getParam('pricebrief'),
				'mark' => $mark,
				'timelong' => $this->getParam('timelong'),
				'people' => $this->getParam('people'),
				'age' => $this->getParam('age'),
				'endtime' => $endtime,
				'enddate' => $enddate,
				'begintime' => $this->getParam('begintime'),
				'useable' => 1,
				'ip' => \Core\Comm\Util::getClientIp(),
				'addtime' => \Core\Fun::time()
			);
			
			if('' != $_FILES['coursepic']['tmp_name'])
			{
				$fileUrl = \Core\Util\Upload::upload('coursepic', '/course', 'jpg,png,gif,JPG,JPEG', false, false, false);
				$data['coursepic'] = $fileUrl['link'];
			}
			if('' != $_FILES['markpic']['tmp_name'])
			{
				$fileUrl = \Core\Util\Upload::upload('markpic', '/mark', 'jpg,png,gif,JPG,JPEG', false, false, false);
				$data['markpic'] = $fileUrl['link'];
			}
			
			if(M('course')->add($data))
			{
				$this->showmsg('课程发布成功', 'wap/home');
			}
			else
			{
				$this->showmsg('课程发布失败', 'wap/home/course');
			}
		}
		else
		{
			$organ = M('organ')->getOrganByUid($uid);
			$districts = M('region')->getRegionList(52);
			$this->assign('districts', $districts);
			$this->assign('organ', $organ);
			$catlist = M('category')->getCategoryTree(0, 2, '', '--');
			$this->assign('catlist', $catlist);
			$this->display('wap/course.tpl');
		}
	}
	
	public function eventAction()
	{
		$uid = $this->_cUser['uid'];
		$organid = M('organ')->getOrganIdByUid($uid);
		if(!M('organ')->isCheck($organid))
			$this->showmsg('机构审核中...', 'wap/home');
		if(!$organid)
			$this->showmsg('', 'wap/home/organ', 0);
		$action = $this->getParam('action');
		if($action && $action == 'event')
		{
			$district = $this->getParam('district');
			$road = $this->getParam('road');
			$address = $this->getParam('address');
			$geo = \Core\Comm\Area::getLngLat('北京市' . $district . $road . $address);
			$timeyear = $this->getParam('timeyear');
			$timemonth = $this->getParam('timemonth');
			$timeday = $this->getParam('timeday');
			$endtime = \Core\Fun::strtotime($timeyear . '-' . $timemonth . '-' . $timeday);
			$eventyear = $this->getParam('eventyear');
			$eventmonth = $this->getParam('eventmonth');
			$eventday = $this->getParam('eventday');
			$begintime = \Core\Fun::strtotime($eventyear . '-' . $eventmonth . '-' . $eventday);
			$endyear = $this->getParam('endyear');
			$endmonth = $this->getParam('endmonth');
			$endday = $this->getParam('endday');
			$enddate = \Core\Fun::strtotime($endyear . '-' . $endmonth . '-' . $endday);
			$mark = $this->getParam('mark');
			$mark = str_replace("\n", "<br />", $mark);
			$catid = $this->getParam('catid');
			$catarr = M('category')->getParendIds($catid);
			$data = array(
				'uid' => $uid,
				'organid' => $organid,
				'catid' => $catid,
				'catarr' => $catarr,
				'kind' => $this->getParam('kind'),
				'eventname' => $this->getParam('eventname'),
				'district' => $district,
				'road' => $road,
				'address' => $address,
				'lng' => $geo['lng'],
				'lat' => $geo['lat'],
				'brief' => $this->getParam('brief'),
				'price' => $this->getParam('price'),
				'mark' => $mark,
				'people' => $this->getParam('people'),
				'age' => $this->getParam('age'),
				'endtime' => $endtime,
				'begintime' => $begintime,
				'beginhour' => $this->getParam('eventhour'),
				'beginminute' => $this->getParam('eventminute'),
				'enddate' => $enddate,
				'endhour' => $this->getParam('endhour'),
				'endminute' => $this->getParam('endminute'),
				'useable' => 1,
				'ip' => \Core\Comm\Util::getClientIp(),
				'addtime' => \Core\Fun::time()
			);
			
			if('' != $_FILES['eventpic']['tmp_name'])
			{
				$fileUrl = \Core\Util\Upload::upload('eventpic', '/event', 'jpg,png,gif,JPG,JPEG', false, false, false);
				$data['eventpic'] = $fileUrl['link'];
			}
			if('' != $_FILES['markpic']['tmp_name'])
			{
				$fileUrl = \Core\Util\Upload::upload('markpic', '/mark', 'jpg,png,gif,JPG,JPEG', false, false, false);
				$data['markpic'] = $fileUrl['link'];
			}
			
			if(M('event')->add($data))
			{
				$this->showmsg('活动发布成功', 'wap/home');
			}
			else
			{
				$this->showmsg('活动发布失败', 'wap/home/event');
			}
		}
		else
		{
			$organ = M('organ')->getOrganByUid($uid);
			$districts = M('region')->getRegionList(52);
			$this->assign('districts', $districts);
			$this->assign('organ', $organ);
			$catlist = M('category')->getCategoryTree(0, 2, '', '--');
			$this->assign('catlist', $catlist);
			$kindlist = M('category')->getCategoryTree(0, 3, '', '--');
			$this->assign('kindlist', $kindlist);
			$this->display('wap/event.tpl');
		}
	}
	
	public function activeAction()
	{
		$uid = $this->_cUser['uid'];
		$organid = M('organ')->getOrganIdByUid($uid);
		if(!M('organ')->isCheck($organid))
			$this->showmsg('机构审核中...', 'wap/home');
		if(!$organid)
			$this->showmsg('', 'wap/home/organ', 0);
		$action = $this->getParam('action');
		if($action && $action == 'active')
		{
			$data = array(
				'uid' => $uid,
				'organid' => $organid,
				'brief' => $this->getParam('brief'),
				'useable' => 1,
				'ip' => \Core\Comm\Util::getClientIp(),
				'addtime' => \Core\Fun::time()
			);
			
			if('' != $_FILES['activepic']['tmp_name'])
			{
				$fileUrl = \Core\Util\Upload::upload('activepic', '/active', 'jpg,jpeg,png,gif,JPG,JPEG', false, false, false);
				$data['activepic'] = $fileUrl['link'];
			}
			
			if(M('active')->add($data))
			{
				$this->showmsg('动态发布成功', 'wap/home');
			}
			else
			{
				$this->showmsg('动态发布失败', 'wap/home/active');
			}
		}
		else
		{
			$organ = M('organ')->getOrganByUid($uid);
			$this->assign('organ', $organ);
			$this->display('wap/active.tpl');
		}
	}
	
	public function headAction()
	{
		$this->display('wap/head.tpl');
	}
	
	public function headpicAction()
	{
		$uid = $this->_cUser['uid'];
		$imgurl = $_POST['imgurl'];
		if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $imgurl, $result))
		{
			$type = $result[2];
			$new_file = \Core\Fun::date("YmdHis") . mt_rand(1000,9999) . '.' . $type;
			if(!file_exists(HTDOCS_ROOT . 'uploadfile/headpic'))
			{
				\Core\Fun\File::makeDir(HTDOCS_ROOT . 'uploadfile/headpic');
				fclose(fopen(HTDOCS_ROOT . 'uploadfile/headpic' . '/index.htm', 'w'));
			}
			if (file_put_contents(HTDOCS_ROOT . 'uploadfile/headpic/' . $new_file, base64_decode(str_replace($result[1], '', $imgurl)))){
				$headpic = \Core\Fun::getWebroot() . 'uploadfile/headpic/' . $new_file;
			}
		}
		else
		{
			$headpic = '';
		}

		$data = array(
			'uid' => $uid,
			'headpic' => $headpic,
			'headpic30' => $headpic,
			'headpic150' => $headpic,
			'headpic50' => $headpic
		);
		$update = M('User_Member')->editUserInfo($data);
		if($update)
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo \Core\Fun::array2json($arr);
	}
	
	public function spicAction()
	{
		if($_FILES['spic']['tmp_name'] == '')
		{
			$ret['msg'] = 0;
			$ret['imgurl'] = '';
		}
		else
		{
			$fileUrl = \Core\Util\Upload::upload('spic', '/headpic', 'jpg,jpeg,JPG,JPEG,png,gif', false, true, true);
			$ret['headpic'] = $fileUrl['link'];
			$ret['imgurl'] = $fileUrl['thumb'];
			$ret['msg'] = 1;
		}
		echo \Core\Fun::array2json($ret);
	}
	
	public function saveheadAction()
	{
		$uid = $this->_cUser['uid'];
		$data = array(
			'uid' => $uid,
			'headpic' => $this->getParam('headpic'),
			'headpic30' => $this->getParam('imgurl'),
			'headpic150' => $this->getParam('imgurl'),
			'headpic50' => $this->getParam('imgurl')
		);
		$update = M('User_Member')->editUserInfo($data);
		if($update)
		{
			$arr['msg'] = 1;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo \Core\Fun::array2json($arr);
	}
}