<?php
namespace Controller\Wap;

use Core\Controller\WapAction;
/**
 * vpcvcms
 * 活动控制器
 */
class Event extends WapAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
	}
    
	public function indexAction()
    {
    	$kind = $this->getParam('kind');
		$road = $this->getParam('road');
		$district = $this->getParam('district');
		$orderby = $this->getParam('orderby');
		$orderby = $orderby ? $orderby : 5;
		$where = array(array('useable', 1));
		$ishot = $this->getParam('ishot');
		$isspecial = $this->getParam('isspecial');
		$conditions = array();
		if($ishot)
		{
			$where[] = array('ishot', $ishot);
			$conditions['ishot'] = $ishot;
		}
		if($isspecial)
		{
			$where[] = array('isspecial', $isspecial);
			$conditions['isspecial'] = $isspecial;
		}
		if($kind)
		{
			$where[] = array('kind', $kind);
			$conditions['kind'] = $kind;
			$this->assign('catname', M('category')->getCatNameByCatId($kind));
		}
		if($road)
		{
			$where[] = array('road', $road);
			$conditions['road'] = $road;
			$this->assign('regionname', M('region')->getRegionName($road));
		}
		if($district)
		{
			$where[] = array('district', $district);
			$conditions['district'] = $district;
			$this->assign('regionname', M('region')->getRegionName($district));
		}
		if($orderby == 1)
		{
			$_orderby = "joinnum DESC";
			$this->assign('orderby', '报名人数');
		}
		elseif($orderby == 2)
		{
			$_orderby = "feednum DESC";
			$this->assign('orderby', '评论数');
		}
		elseif($orderby == 3)
		{
			$_orderby = "price ASC";
			$this->assign('orderby', '价格由低到高');
		}
		elseif($orderby == 4)
		{
			$_orderby = "price DESC";
			$this->assign('orderby', '价格由高到低');
		}
		elseif($orderby == 5)
		{
			$_orderby = "km ASC";
			$this->assign('orderby', '距离');
		}
		else
		{
			$_orderby = "addtime DESC";
		}
		
		$mylng = $_SESSION['mylng'];
		$mylat = $_SESSION['mylat'];

		$Num = M('event')->getCount($where);
		$perpage = C('page_size', 'basic', 20);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = \Core\Comm\Util::map2str ($conditions, '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/event/index' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$events = M('event')->queryAll($where, $_orderby, array($perpage, $perpage * ($curpage - 1)), array('*', 'GETDISTANCE(lat,lng,'.$mylat.','.$mylng.') AS km'));
		foreach($events AS $idx => $event)
		{
			$events[$idx]['location'] = \Core\Comm\Util::getLocation('', '', $event['district'], $event['road']);
			$events[$idx]['organname'] = M('organ')->getOrganIdByUid($event['uid'], 'organname');
			$events[$idx]['catname'] = M('category')->getCatNameByCatId($event['catid']);
		}
		$this->assign('events', $events);
		$this->assign ('multipage', $multipage);
		$this->assign('conditions', $conditions);
		$this->assign('curr', '活动列表');
		$this->display('wap/event_index.tpl');
    }
	
	public function distanceAction()
    {
		$road = $this->getParam('road');
		$catid = $this->getParam('catid');
		$where = array(array('useable', 1));
		$conditions = array();
		if($road)
		{
			$where[] = array('road', $road);
			$conditions['road'] = $road;
		}
		if($catid)
		{
			$where[] = array('catarr', $catid, 'FIND_IN_SET');
			$conditions['catid'] = $catid;
		}
		$this->assign('curr', 'course');
		$this->display('wap/course_index.tpl');
    }
	
	public function showAction()
	{
		$id = $this->getParam('id');
		$event = M('event')->find($id);
		if(!$event['id'] || !$event['useable'])
			$this->showmsg('该活动不存在或者正在审核中', 'wap/event');
		M('event')->updateNum($id, 'shownum');
		$event = $this->formatHourMinute($event);
		$event['location'] = \Core\Comm\Util::getLocation('', '', $event['district'], $event['road']);
		$event['organname'] = M('organ')->getOrganIdByUid($event['uid'], 'organname');
		$this->assign('event', $event);
		$this->assign('curr', '活动详情');
		$this->assign('stowid', $id);
		$this->assign('stowtype', 'event');
		$this->assign('stowtitle', $event['eventname']);
		$this->assign('orders', M('order')->getOrderList('event', $id));
		$this->display('wap/event_show.tpl');
	}
	
	public function feedAction()
	{
		$id = $this->getParam('id');
		$user = $this->getUser();
		if(!$user['uid'])
			$this->showmsg('', 'wap/u/login?refer=' . \Core\Fun::iurlencode(SITEURL . 'wap/event/feed/id/' . $id), 0);
		$eventname = M('event')->getOneById('eventname', $id);
		$this->assign('id', $id);
		$this->assign('eventname', $eventname);
		$this->assign('curr', '点评活动');
		$this->assign('stowid', $id);
		$this->assign('stowtype', 'event');
		$this->assign('stowtitle', $eventname);
		$this->display('wap/event_feed.tpl');
	}

	public function formatHourMinute($event)
	{
		if($event['beginhour'] != '')
		{
			if($event['beginhour'] < 10)
			{
				$event['beginhour'] = '0' . $event['beginhour'];
			}
			else
			{
				$event['beginhour'] = $event['beginhour'];
			}
		}
		if($event['beginminute'] != '')
		{
			if($event['beginminute'] < 10)
			{
				$event['beginminute'] = '0' . $event['beginminute'];
			}
			else
			{
				$event['beginminute'] = $event['beginminute'];
			}
		}
		if($event['endhour'] != '')
		{
			if($event['endhour'] < 10)
			{
				$event['endhour'] = '0' . $event['endhour'];
			}
			else
			{
				$event['endhour'] = $event['endhour'];
			}
		}
		if($event['endminute'] != '')
		{
			if($event['endminute'] < 10)
			{
				$event['endminute'] = '0' . $event['endminute'];
			}
			else
			{
				$event['endminute'] = $event['endminute'];
			}
		}

		return $event;
	}
}